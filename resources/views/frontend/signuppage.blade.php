
@extends('frontendtemplate')

@section('content')
  
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body ">
        <!-- Nested Row within Card Body -->
        <div class="row mx-5 px-5">
          
          <div class="col-lg-12">
            <div class="p-2">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="{{ route('user.store')}}" method="post" >
                @csrf
                <div class="form-group ">
                  <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleFirstName" placeholder=" Name">

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" id="Email" placeholder="Email Address">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                  </div>
                </div>

                <a href="" class="btn btn-primary btn-user btn-block">
                  <button type="submit" class="btn btn-primary mainfullbtncolor btn-block"> Create Account </button>
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
                <a class="small" href="{{route('signinpage')}}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
