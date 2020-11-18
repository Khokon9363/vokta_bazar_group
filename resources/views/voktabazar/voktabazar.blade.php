@extends('voktabazar.master')
@section('content')
    <!-- Navigation -->
    <navbar-component></navbar-component>

<!-- <header class="masthead" style="background-image: url('{{ asset('voktabazar/img/home-bg.jpg') }}')"> -->
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ config('app.name') }}</h1>
                        <span class="subheading">নিরাপদ অনলাইন বেচা-কেনার নিশ্চয়তা</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<router-view></router-view>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
@if($socials)
                        <li class="list-inline-item">
                            <a href="https://{{ $socials->facebook }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://{{ $socials->twitter }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://{{ $socials->google }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-google fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://{{ $socials->github }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://{{ $socials->whatsapp }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://{{ $socials->skype }}">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-skype fa-stack-1x fa-inverse"></i>
                  </span>
                            </a>
                        </li>
@endif
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </footer>
    @if(Auth::user())
        <input type="hidden" value="{{ Auth::user()->id }}" id="logedIn">
    @endif
@endsection
