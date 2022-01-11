@include('header')
<body style="background-color: #666666;">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
  
        <form class="login100-form validate-form" action="{{url('/login')}}" method="post">
          @csrf

          @if (Session::has('error_msg'))
            <div class="alert alert-danger">{{ Session::get('error_msg') }}</div>
          @endif
          <span class="login100-form-title p-b-43">
            Login
          </span>
          
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="email" name="email" required >
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" required >
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
            
          </div>
        </form>

        <div class="login100-more" style="background-image: url('public/images/home-maintenance-resolution.jpg');">
        </div>
      </div>
    </div>
  </div>
  @include('footer')