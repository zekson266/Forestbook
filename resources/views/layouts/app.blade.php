<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

  <title>ForestBook</title>
  {{-- <script src="../assets/js/color-modes.js"></script> --}}

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Suto">
  <meta name="generator" content="Hugo 0.118.2">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  @include('layouts.header')

  @include('layouts.navbar')

  @yield('content')

  <!-- FOOTER -->

  @include('layouts.footer')

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
