@extends('layout/main')

@section('container')
    <h1> <i class="bi bi-book-half"></i> {{ $title }}</h1>
    @foreach ($categories as $category)
        <h4 class="border-top"><i class="bi bi-bookmark-fill"></i> <a style="text-decoration: none" href="/posts?category={{ $category->slug }}">{{ $category->name }}</a></h4><p>
    @endforeach

    {{ $categories->links() }}
@endsection