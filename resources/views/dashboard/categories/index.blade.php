@extends('dashboard.layout.main')

@section('container')

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
     {{ session('success') }}
  </div>
@endif

    <h1>my posts</h1>

    <a href="/dashboard/posts/create" class="btn btn-outline-success mb-3 mt-3" >Make new category</a>

    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Number of posts</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="col">{{ $loop->iteration }}</th>
                <th scope="col">{{ $category->name }}</th>
                <th scope="col">{{ $category->post->count() }}</th>
                <th scope="col">
                  <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-primary" style="color:lightblue">info &nbsp;<span data-feather="file"></span></a> 

                  <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning" style="color:lightgoldenrodyellow">edit &nbsp;<span data-feather="edit"></span></a> 

                  <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                   @csrf
                   @method('delete')
                   <button type="submit" onclick="return confirm('are you sure you want to delete \'{{ $category->name }}\'')" class="badge bg-danger border-0" style="color:pink;">delete &nbsp;<span data-feather="x-circle"></span></button>
                  </form>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection