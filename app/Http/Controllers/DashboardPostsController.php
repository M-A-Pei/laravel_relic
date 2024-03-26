<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "posts" => post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.posts.newpost", [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->validate([
            "title" => ['required', 'min:5', 'max:60', 'unique:posts'],
            "category_id" => ['required', 'numeric'],
            "body" => ['required', 'min:20', 'max:1000'],
            "image" => ['image', 'file:max:1024'],
        ]);

        $input['snip'] = substr($input['body'],0,120);
        $input['slug'] = strtolower(preg_replace('/\s+/', '-', $input['title']));
        $input['user_id'] = auth()->user()->id;

        if($request->file('image')){
            $input['image'] = $request->file('image')->store('post-image');
        }
        

        post::create($input);

        $request->session()->flash('success', 'Post successfully made!');

        return redirect('/dashboard/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.singlepost', [
            "post" => $post->where('slug', $post->slug)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view("dashboard.posts.edit", [
            'categories' => Category::all(),
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            "title" => ['required', 'min:5', 'max:60', ($request->title == $post->title) ? '' : 'unique:posts'],
            "category_id" => ['required', 'numeric'],
            "body" => ['required', 'min:20', 'max:1000'],
            "image" => ['image', 'file:max:1024'],
        ];

        $input = $request->validate($rules);

        $input['snip'] = substr($input['body'],0,120);
        $input['slug'] = strtolower(preg_replace('/\s+/', '-', $input['title']));
        $input['user_id'] = auth()->user()->id;

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $input['image'] = $request->file('image')->store('post-image');
        }
        

        post::where('id', $post->id)->update($input);

        return redirect('/dashboard/posts')->with('success', 'post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $name = $post->title;
        post::destroy($post->id);
        Storage::delete($post->image);

        return redirect('/dashboard/posts')->with('success', "\"$name\" successfully deleted!");
    }
}
