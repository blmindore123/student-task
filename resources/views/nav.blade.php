
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">  {{env('APP_NAME')}} </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}"> User List <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">Logout</a>
      </li>
       
    </ul>
    <span class="form-inline my-2 my-lg-0"> Welcome! &nbsp; <b> {{ ucfirst(Session::get('user_info')['name'])}} </b>
    </span>
  </div>
</nav>