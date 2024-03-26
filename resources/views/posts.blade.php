@extends('layout/main')

@section('container')

<div class="row justify-content-center">
  <div class="col-md-7">
    <h2 class="mb-5">{{ $title }}:</h2> <p>
  </div>
  <div class="col-md-5">
    <form action="/posts">

      @if (request('author'))
          <input type="text" name="author" value={{ request('author') }} hidden>
      @endif

      @if (request('category'))
          <input type="text" name="category" value={{ request('category') }} hidden>
      @endif

      <div class="input-group mb-2 mt-2">
        <input type="text" name="search" class="form-control" placeholder="search post..." value={{ request('search') }}>
          <select class="btn btn-outline-success" name="category">
            <option value="">category</option>
            @foreach ($categories as $category)
                <option class="dropdown-item" {{ ($category->slug == request('category')) ? "selected" : "" }} value="{{ $category->slug }}">{{ $category->name }}</option>
            @endforeach
            <option value="">all posts</option>
          </select>
        </button>
        <button class="btn btn-success" type="submit" id="button-addon2">search</button>
      </div>
    </form>
  </div>
</div>


  @if ($posts->count())
    @foreach ($posts as $p)
      <article class="mb-5 pb-4 border-bottom">
        <img style="height:100px" src="{{ asset('storage/' . $p->image) }}" alt=""> <p>
        <h2><a style="text-decoration: none;" href="/single_post/{{ $p->slug }}"> {{ $p->title }} </a></h2>
        <b><i class="bi bi-person-circle"></i> <a style="text-decoration: none" href="/posts?author={{ $p->user->slug }}">{{ $p->user->name }}</a>, in <a style="text-decoration: none" href="/posts?category={{ $p->category->slug }}">{{ $p->category->name }}</a></b><br>
        <i>{{ $p->snip }}</i><p>
      </article>
    @endforeach
  
  @else 
   <h4>no posts found <i class="bi bi-x-lg"></i></h4> 

  @endif

    {{ $posts->links() }}
@endsection