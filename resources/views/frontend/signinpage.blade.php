@extends('frontendtemplate')

@section('content')
	<!-- <div class="container my-5">

    <div class="row my-5">

      <div class="col-md-6">
        <img src="">
      </div>

      <div class="col-md-6">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
              </div>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
              </button>

              @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              @endif
            </div>
          </div>
        </form>
      </div>

    </div>
   
  </div> -->

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row mx-5 px-5">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="{{route('login')}}" method="POST">
                     @csrf
                    <div class="form-group">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">

                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user  @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="current-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="" class="btn btn-info btn-user btn-block">
                      <button type="submit" class="btn btn-info mainfullbtncolor ">Login</button>
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{route('signuppage')}}">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>  
@endsection