<!DOCTYPE html>
<html lang="en">
<head>
  @include('include.topHead')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ url('/BPS.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>

<div class="wrapper">
    @include('include.navbarAdmin')

    @include('include.sidebar')

    @yield('content')    
</div>
@include('include.footer')
@include('include.bottomBody')
</body>
</html>
