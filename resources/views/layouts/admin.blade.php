<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hospital Management|Admin</title>



    <!-- Styles -->
  <link href="{{ asset('bs4/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

  <link rel="stylesheet" href="{{ asset('DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('DataTables-1.10.18/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/button.min.css')}}">
    <style>

        </style>

</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-sm navbar-dark " style="background:#336699;">
                <div class="container">
                        <a class="navbar-brand" href="/admin">Hospital</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                        <a class="nav-link" href="/administrators">
                            Administrators
                        </a>
                        </li> --}}
                        <li class="nav-item">
                        <a class="nav-link" href="/admin/staff">
                            Staff Management
                        </a>


                        </ul>


                          <ul class="navbar-nav ml-auto">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            {{-- <li class="nav-item">
                              <a class="nav-link" href="#">
                                  <i class="fas fa-bell"></i>
                              </a>
                            </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile">
                                       Profile
                                    </a>
                                </li>

                            {{-- <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-cog"></i> <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarDropdown">

                                            <a href="/admin/faculty" class="dropdown-item" style="font-size:13px">
                                                    <i class="fas fa-building   text-warning "></i> Faculty
                                                </a>
                                                <div class="dropdown-divider"></div>
                                        <a href="/admin/department" class="dropdown-item" style="font-size:13px">
                                            <i class="fas fa-file-upload text-info "></i> Departments
                                        </a>
                                        <div class="dropdown-divider"></div>

                                        <a href="/admin/session" class="dropdown-item" style="font-size:13px">
                                                <i class="fas fa-calendar  text-danger  "></i> Session
                                            </a>

                                            <div class="dropdown-divider"></div>
                                            <a href="/merge" class="dropdown-item" style="font-size:13px">
                                                    <i class="fas fa-code-branch  text-success"></i> Merge
                                                </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li> --}}





                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user-circle    "></i> {{Auth::user()->name}} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" style="font-size:13px;">
                                           logout
                                        </a>



                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                          </ul>
                        </div>
                </div>
                  </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/jquery.printPage.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{ asset('bs4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>

    @yield('js')
</html>
