@extends('admin.master')
@section('content')
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('/') }}">{{ config('app.name') }}</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" onclick="collapseMe()" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <router-link class="dropdown-item" to="profile">Profile</router-link>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
<input type="hidden" value="{{Auth::user()->id}}" id="authUserId">
                    <sidenav-component></sidenav-component>

                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{Auth::user()->name}}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            <router-view></router-view>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @if(Auth::user())
    <input type="hidden" value="{{ Auth::user()->role }}" id="roleCheck">
    @endif
@endsection
