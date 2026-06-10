<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$bheading ?? config('app.name')}} — {{config('app.name')}}</title>
    <!-- Favicon -->
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/images/'.$settings->fav)}}">
    <!-- Admin bundle (CSS) -->
    <link rel="stylesheet" href="{{asset('/backend/css/admin.bundle.css')}}" type="text/css">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    @yield('styles')
</head>
<body>
    <!-- App styles  -->
<div class="preloader">
    {{-- <div class="preloader-icon"></div> --}}
</div>
<div id="main">
    <!-- begin::navigation -->
    <div class="navigation">
        <div class="navigation-menu-tab">
          <div>
                <div class="navigation-menu-tab-header" data-toggle="tooltip" title="Admin" data-placement="right">
                    <a href="{{route('admin.index')}}" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                        {{-- <figure class="avatar avatar-sm">
                                 <img src="{{asset('images/'.$settings->site_logo)}}" height="10px" width="10px">
                        </figure> --}}
                    </a>
                </div>
            </div>
               <div class="flex-grow-1">
               <ul>
                    <li>
                        <a class="active" href="" data-toggle="tooltip" data-placement="right" title="Dashboard"
                           data-nav-target="#dashboards">
                            <i data-feather="bar-chart-2"></i>
                        </a>
                    </li>
                    </ul>
            </div>
              <div>
                <ul>
                    <li>
                        <a href="" data-toggle="tooltip" data-placement="right" title="Settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.logout') }}" onclick="event.preventDefault() 
                                        document.getElementById('logout-form').submit()" data-placement="right" title="Logout">
                            <i data-feather="log-out"></i>
                        </a>
                         <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" >
                                        @csrf
                                    </form> 
                    </li>
                </ul>
            </div>
        </div>

        <!-- begin::navigation menu -->
        <div class="navigation-menu-body">
            <!-- begin::navigation-logo -->
            <div>
                <div id="navigation-logo">
                    <a href="{{route('admin.index')}}">
                        <img class="logo" src="{{asset('images/'.$settings->site_logo)}}" height="auto" width="120px" alt="{{asset('images/'.$settings->site_logo)}}">
                        <img class="logo-light" src="{{asset('images/'.$settings->site_logo)}}" height="auto" width="120px" alt="{{asset('images/'.$settings->site_logo)}}">
                    </a>
                </div>
            </div>
            <!-- end::navigation-logo -->
          @include('layouts.sidebar')
        </div>
        <!-- end::navigation menu -->

    </div>
    
 <div class="main-content">
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>{{$bheading}}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- end::page-header -->
    @yield('content')

    <footer>
        <div class="container-fluid">
            <div>© {{date('Y')}} {{$settings->site_name}}, All Rights Reserved</a></div>
            <div>
                {{-- <nav class="nav">
                    
                    <a href="">Home</a>
                    <a href=""> Pages</a>
                    <a href=""> </a>
                    
                </nav> --}}
            </div>
        </div>
    </footer>
        <!-- end::footer -->

    </div>
    <!-- end::main-content -->

</div>
<!-- end::main -->

<!-- Admin bundle (JS) -->
<script src="{{asset('/backend/js/admin.bundle.js')}}"></script>
<div class="colors"> <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>
<!-- app.min.js is included in admin.bundle.js -->

<script>
    $(document).ready(function (){
        $('#myTable').DataTable();
    });

    // Load CKEditor only on pages that have a rich-text textarea
    if (document.getElementById('summernote')) {
        var ckScript = document.createElement('script');
        ckScript.src = 'https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js';
        ckScript.onload = function () { CKEDITOR.replace('summernote'); };
        document.body.appendChild(ckScript);
    }
</script>

@yield('script')


</body>
</html>