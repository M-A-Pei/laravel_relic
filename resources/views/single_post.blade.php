@extends('layout/main')

@section('container')
    <h1 class="border-bottom mb-4"> {{ $post->title }}</h1>
    <img style="height:400px;display: block; margin-left: auto; margin-right: auto;" src="{{ asset('storage/' . $post->image) }}" alt=""> <p>
    <span class="border-bottom"><i class="bi bi-person-circle"></i> <a style="text-decoration: none" href="/posts?author={{ $post->user->slug }}">{{ $post->user->name }}</a></span> &nbsp; &nbsp; &nbsp; &nbsp; 
    <span class="border-bottom"><i class="bi bi-bookmark-fill"></i> <a style="text-decoration: none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></span>
    <p class="mt-4">{{ $post->body }}</p>

    <a href="/posts" class="btn btn-success mt-4"> back to posts <i class="bi bi-arrow-left"></i></a>
@endsection