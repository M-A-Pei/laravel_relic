@extends('dashboard.layout.main')

@section('container')
    <h1 class="border-bottom mb-4"> {{ $post->title }}</h1>
    @if ($post->image)
    <img class="d-block ml-auto mr-auto mb-5" style="height:400px;" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}">
    @endif
    <span class="border-bottom"><i class="bi bi-person-circle"></i>{{ $post->user->name }}</span> &nbsp; &nbsp; &nbsp; &nbsp; 
    <span class="border-bottom"><i class="bi bi-bookmark-fill"></i>{{ $post->category->name }}</span>
    <p class="mt-4">{{ $post->body }}</p>

    <a href="/dashboard/posts" class="btn btn-success mt-4"> back to my posts <i class="bi bi-arrow-left"></i></a>
@endsection