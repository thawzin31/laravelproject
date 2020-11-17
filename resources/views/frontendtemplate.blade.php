<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('my_asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('my_asset/css/shop-homepage.css')}}" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="{{asset('my_asset/css/style.css')}}">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{route('mainpage')}}" class="nav-item nav-link active">Home</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                          @auth
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                                  </form>
                                </div>
                            </div>
                            @else
                              <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="{{route('signinpage')}}" class="dropdown-item">Login</a>
                                    <a href="{{route('signuppage')}}" class="dropdown-item">Register</a>
                                </div>
                              </div>
                          @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

<!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{asset('my_asset/img/logo.png')}}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                           
                            <a href="{{route('cartpage')}}" class="btn" >
                                <i class="fa fa-shopping-cart"></i>
                                <span id="cart">(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->   
<!--  Navigation -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{route('mainpage')}}">My Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('mainpage')}}">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('cartpage')}}" id="cart">Cart</a>
        </li>
        @auth

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>

      @else
      <li class="nav-item">
        <a class="nav-link" href="{{route('signinpage')}}">Signin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('signuppage')}}">Signup</a>
      </li>
      @endauth
    </ul>
  </div>
</div>
</nav> -->

<!-- Page Content -->
@yield('content')
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('my_asset/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('my_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script type="text/javascript" src="{{asset('my_asset/vendor/bootstrap/js/brand.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

@yield('script')

</body>

</html>
