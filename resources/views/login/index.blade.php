@extends('layout.main')

@section('container')

@if(session()->has('loginError'))
<div class="alert alert-danger" role="alert">
  {{ session('loginError') }}
</div>
@endif

  <main class="form-signin w-100 m-auto">
    <form method="post" action="/login">
      <h1 class="h3 mb-3 fw-normal text-center">Login <i class="bi bi-clipboard-check"></i></h1>
  
      @csrf

      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="your email" value="{{ old('email') }}" required>
        <label for="floatingInput" class="text-center">Email address</label>

        @error('email')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="your password" required>
        <label for="floatingPassword" class="text-center">Password</label>

        @error('password')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

      </div>

      <button class="w-50 btn btn-lg btn-primary" type="submit">login <i class="bi bi-box-arrow-in-right"></i></button>
    </form>
    <small class="text-center mt-4" style="display: block">dont have an account? <a href="/sign_up">make one!</a></small>
  </main>
@endsection