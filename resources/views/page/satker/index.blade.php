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
                        <li class="breadcrumb-item active">Satker</li>
                    </ol>
                    <div class="card mb-5">
                        <div class="card-body">
                            <h3>Pencarian</h3>
                            <form action="{{url('/satker/search')}}" method="GET">
                                <input type="text" name="satker" placeholder="Masukkan Nama Satker" value="{{ old('satker') }}">
                                <input type="submit" value="CARI">
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Pegawai</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        {{--<th>NIP</th>--}}
                                        <th>Nama</th>
                                        {{--<th>Office</th>--}}
                                        {{--<th>Age</th>--}}
                                        {{--<th>Start date</th>--}}
                                        {{--<th>Salary</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($satker as $key => $value)
                                        <tr>
{{--                                            <td>{{$value->Nip}}</td>--}}
                                            <td>{{$value->Nama}}</td>
                                            {{--<td>Edinburgh</td>--}}
                                            {{--<td>61</td>--}}
                                            {{--<td>2011/04/25</td>--}}
                                            {{--<td>$320,800</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$satker->links()}}
                            </div>
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