@extends('layout.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

  <main class="form-signin w-100 m-auto">

    <form action="/sign_up" method="post">
      <h1 class="h3 mb-3 fw-normal text-center">Sign up <i class="bi bi-clipboard"></i></h1>

      @csrf
  
      <div class="form-floating">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" placeholder="your name" value="{{ old('name') }}">
        <label for="floatingInput" class="text-center">Name</label>

        @error('name')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

      </div>

      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="your email" value="{{ old('email') }}">
        <label for="floatingInput" class="text-center">Email address</label>

        @error('email')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

      </div>

      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword" class="text-center">Password</label>

        @error('password')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

      </div>

      <button class="w-50 btn btn-lg btn-primary" type="submit">Sign up <i class="bi bi-box-arrow-in-right"></i> </button>
    </form>
    <small class="text-center mt-4" style="display: block">already have an account? <a href="/login">login!</a></small>
  </main>
@endsection