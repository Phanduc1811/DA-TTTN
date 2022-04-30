<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">Vật Tư Ngọc Thủy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cửa Hàng</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="#">Cửa Hàng</a>
            <a class="dropdown-item" href="#">Nhà Cung Cấp</a>
            <a class="dropdown-item" href="{{ url('/login') }}">Log-in</a>
            <a class="dropdown-item" href="{{ url('/cart') }}">Giỏ Hàng</a>
          </div>
        </li>
        <li class="nav-item cta cta-colored"><a href="{{ url('/cart') }}" class="nav-link"><span class="icon-shopping_cart"></span>@php echo "[" .Cart::content()->count(). "]" @endphp</a></li>
        <li class="nav-item dropdown">
          @if(Auth::guard('user')->check())
          @php
          $users_name = Auth::guard('user')->user()->Username;

          @endphp
          @if($users_name != null)
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000; margin-top: 10px;">@php echo $users_name @endphp</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{URL::to('/logoutUser')}}">Logout</a>
            </div>
          </div>
          @endif
          @else
          <span class="nav-link">
            <a href="{{ url('/register') }}">Đăng ký/</a>
            <a href="{{ url('/login') }}">Đăng nhập</a>
          </span>
          @endif


          <!-- <a  href="{{ url('/login') }}" class="nav-link">Đăng ký</a>
            <a  href="{{ url('/login') }}" class="nav-link">Đăng nhập</a> -->
        </li>
      </ul>
    </div>
  </div>
</nav>