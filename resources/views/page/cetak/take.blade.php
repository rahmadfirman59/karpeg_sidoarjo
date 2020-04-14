@extends('layouts.app')
@section('addCSS')
    <style>
        #my_camera{
            width: 320px;
            height: 240px;
            border: 1px solid black;
        }
    </style>
@endsection
@section('content')

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url('/dashboard')}}">Aplikasi Cetak Kartu Sidoarjo Pegawai</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
        ><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                {{--<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />--}}
                <div class="input-group-append">
                    {{--<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>--}}
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('nav')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ambil Foto</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-4">
                            <div id="my_camera">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="results" >

                            </div>
                        </div>
                    </div>

                    <br>
                    <input class="btn btn-primary" type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input class="btn btn-primary"  type=button value="Save Snapshot" onClick="saveSnap()">
                    <br>
                    <br>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2019</div>
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
@endsection

@section('addJS')
    <script src="{{ url('public/assets/assets/webcamjs/webcam.js')  }}"></script>

    <script type="text/javascript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );


        var shutter = new Audio();
        shutter.autoplay = true;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

        function take_snapshot() {
            // play sound effect
            // shutter.play();

            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML =
                    '<img id="imageprev" src="'+data_uri+'"/>';
            } );

            Webcam.reset();
        }


        function saveSnap() {
            // Get base64 value from <img id='imageprev'> source
            var base64image = document.getElementById("imageprev").src;

            Webcam.upload(base64image, 'upload.php', function (code, text) {
                console.log('Save successfully');
                //console.log(text);
            });
        }


    </script>
@endsection