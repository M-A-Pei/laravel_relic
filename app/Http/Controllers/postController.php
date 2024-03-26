<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $title = "all posts";
        $active = "posts";

        if(request('category')){
            $title = "posts about " . Category::firstWhere("slug", request('category'))->name; 
            $active = "category";
            if(request('search')){
                $title = "posts with \"".request('search') . "\" in " . Category::firstWhere("slug", request('category'))->name;
            }
        }

        if(request('author')){
            $title = "posts by " . User::firstWhere("slug", request('author'))->name;
            $active = "users";
            if(request('search')){
                $title = "posts with \"". request('search') . "\" by " . User::firstWhere("slug", request('author'))->name;
            } 
        }

        if(request('search') && !request('author') && !request('category')){
            $title = "posts with \"". request('search') . "\"";
        }

        return view('posts', [
            "posts" => post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString(),
            "title" => $title,
            "active" => $active,
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('single_post', [
            "post" => $post,
            "title" => $post->title,
            "active" => "single_post"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
