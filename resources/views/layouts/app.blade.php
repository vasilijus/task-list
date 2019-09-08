<!doctype html>
<html>
<head>
  <title>@yield('title')</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <!-- navigation bar -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
        
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="/tasks">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tasks/active">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tasks/done">Done</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tasks/deleted">Deleted</a>
          </li>
        </ul>
        
      </div>
    </div>
  </div>
  <!-- navigation bar ends here -->

  @include('tasks.forms.form-new-todo')

  @yield('content')


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!-- script -->
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>
</html>