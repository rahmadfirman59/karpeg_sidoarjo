@extends('layouts.app')
@section('addCSS')

@endsection
@section('content')


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
                        <li class="breadcrumb-item active">Ubah Password</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Ubah Password</div>
                        <div class="card-body">
                            <form action="{{url('/save_password')}}" method="post">
                                <div class="row">
                                    {{csrf_field()}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{--<label for="">Nama</label>--}}
                                            <input type="hidden" class="form-control " name="id" value="{{$data->id}}" >
                                            <input type="hidden" class="form-control " name="username" value="{{$data->username}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password Baru</label>
                                            <input type="text" class="form-control " name="password" value="">
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-success" name="button">Simpan</button>
                            </form>
                        </div>
                    </div>
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