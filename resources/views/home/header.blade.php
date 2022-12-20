<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="home/images/logo.svg" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>
      <div></div>
      <div style="margin: 0 auto" id="navbarSupportedContent">
        <form class="form-inline">
          <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
          <div id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('view_cart') }}">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('products') }}">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog_list.html">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('view_order') }}">Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin_view') }}">Dashboard</a>
              </li>

              @if (Route::has('login'))

              @auth
              <li class="">
                <x-app-layout>

                </x-app-layout>
              </li>
              @else

              <li class="nav-item">
                <a class="btn btn-outline-primary mr-2 btn-sm" href="{{ route('login') }}">Login</a>
              </li>

              <li class="nav-item">
                <a class="btn btn-outline-warning btn-sm" href="{{ route('register') }}">Register</a>
              </li>
              @endauth
              @endif
            </ul>
          </div>
    </nav>
  </div>
  @include('admin.successmsg')

  @include('sweetalert::alert')
</header>