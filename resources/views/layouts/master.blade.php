<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- vendor css -->
    <link href="{{ asset('assets/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/highlightjs/styles/github.css') }}" rel="stylesheet">
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bracket.css') }}">
    @stack('styles')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>INVENTORY <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{route('home')}}" class="br-menu-link {{ (request()->is('home')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ (request()->is('categories','categories/*/edit','brands','brands/*/edit','units','units/*/edit','suppliers','suppliers/create','suppliers/*/edit')) ? 'active show-sub' : '' }}">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
            <span class="menu-item-label">Master Data</span>
          </a>
          <ul class="br-menu-sub">
            <li class="sub-item">
              <a href="{{route('categories.index')}}" class="sub-link {{ (request()->is('categories','categories/*/edit')) ? 'active' : '' }}">Category</a>
            </li>
            <li class="sub-item">
              <a href="{{route('brands.index')}}" class="sub-link {{ (request()->is('brands','brands/*/edit')) ? 'active' : '' }}">Brands</a>
            </li>
            <li class="sub-item">
              <a href="{{route('units.index')}}" class="sub-link {{ (request()->is('units','units/*/edit')) ? 'active' : '' }}">Items</a>
            </li>
            <li class="sub-item">
              <a href="{{route('suppliers.index')}}" class="sub-link {{ (request()->is('suppliers','suppliers/create','suppliers/*/edit')) ? 'active' : '' }}">Supplier</a>
            </li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="{{route('products.index')}}" class="br-menu-link {{ (request()->is('products','products/*/edit','products/*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Products</span>
          </a>
        </li>
        <li class="br-menu-item">
          <a href="{{route('departments.index')}}" class="br-menu-link {{ (request()->is('departments')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-book-outline tx-22"></i>
            <span class="menu-item-label">Departments</span>
          </a>
        </li>
        <li class="br-menu-item">
          <a href="{{route('employees.index')}}" class="br-menu-link {{ (request()->is('employees')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
            <span class="menu-item-label">Employee</span>
          </a>
        </li>
        <li class="br-menu-item">
          <a href="{{route('users.index')}}" class="br-menu-link {{ (request()->is('users')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
            <span class="menu-item-label">Users</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
          <input id="searchbox" type="text" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
          </span>
        </div>
      </div>
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{ Auth::user()->name }}</span>
              <img src="{{ asset(Auth::user()->avatar)}}" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="{{ asset(Auth::user()->avatar)}}" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname">{{ Auth::user()->name }}</h6>
                <p>{{ Auth::user()->email }}</p>
              </div>
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"></i> Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="br-mainpanel">
      @include('sweetalert::alert')
      @yield('content')
    </div>
    <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bracket.js') }}"></script>
    @stack('scripts')
  </body>
</html>
