     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a  href="{{ route('product.main') }}""><img src="/logo.png" class="logo"> </a>
      <a  href="{{ route('product.main') }}""><p class="boss">SAM SHOP</p></a>
    <a class="navbar-brand" href="{{ route('product.main') }}""> Store</i></a>
    <a class="navbar-brand" href="{{ route('other.about') }}">About</a>
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          <a class="navbar-brand" href="{{route('product.shoppingCart')}}">
            <i class="fas fa-shopping-cart"></i>
          <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
          </a>

      @if(!Auth::check())
      <a href="{{url('register')}}"><button class="btn btn-outline-success my-0 my-sm-0" type="submit">Sign Up</button></a> 
      @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(!Auth::check())
             Sign In
             @else
             Profile
             @endif
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(!Auth::check())
           
            <a class="dropdown-item" href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i></a>
            
            <div class="dropdown-divider"></div>
            @else
            
            @if(Auth::user()->hasRole('Admin'))
            <a class="dropdown-item" href="{{ route('admin') }}">Admin</a>
            @endif
            @if(Auth::user()->hasRole('User'))
            <a class="dropdown-item" href="{{ route('user') }}">User</a>
            @endif
            @if(Auth::user()->hasRole('Author'))
            <a class="dropdown-item" href="{{ route('author') }}">Author</a>
            @endif

            <a class="dropdown-item" href="{{url('/logout')}}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                <form id="logout-form" action="{{url('/logout')}}" method="POST"  style="display: none;">
                    {{ csrf_field() }} 
                </form>
            @endif
          </div>
        </li>
      </ul>
    </div>
  </nav>