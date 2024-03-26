@extends('layout/main')

@section('container')
    <h1> <i class="bi bi-people-fill"></i> {{ $title }}:</h1>
    @foreach ($users as $user)
        <h4 class="border-top"> <i class="bi bi-person-badge"></i> <a style="text-decoration: none" href="/posts?author={{ $user->slug }}">{{ $user->name }}</a></h4><p>
    @endforeach

    {{ $users->links() }}
@endsection