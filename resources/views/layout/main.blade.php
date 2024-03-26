<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">

    <title>{{ $title }}</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container">
        <a class="navbar-brand" href="/" ><i class="bi bi-boxes"></i> <span style="font-size:xx-large">L</span>aravel web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pt-2" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ ($active === "home") ? "active":"" }} " aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{ ($active === "about") ? "active":"" }} " href="/about">about</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{ ($active === "posts") ? "active":"" }} "  href="/posts">posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{ ($active === "category") ? "active":"" }} "  href="/categories">categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{ ($active === "users") ? "active":"" }} "  href="/users">Users</a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            @Auth()
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
                
              </div>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link  {{ ($active === "login") ? "active":"" }} "  href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endAuth
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
        @yield('container')
    </div>
  </body>
</html>