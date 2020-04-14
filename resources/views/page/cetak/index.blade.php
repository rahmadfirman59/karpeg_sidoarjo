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
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                    <div class="card mb-5">
                        <div class="card-body">
                            <h3>Pencarian</h3>
                            <form action="{{url()->current()}}" >
                                <select name="filter" >
                                    <option value=""></option>
                                    <option value="master_pegawai.Nip" @if($filter == 'master_pegawai.Nip') selected @endif > NIP</option>
                                    <option value="master_satker.Nama" @if($filter == 'master_satker.Nama') selected @endif >Satker</option>
                                </select>
                                <input type="text" name="keyword" placeholder="" value="{{ request('keyword') }}">
                                <input type="submit" value="CARI">
                            </form>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i> {{$pegawai->total()}} Pegawai</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button  class="btn btn-primary" > Cetak 10 Depan</button>
                                <button  class="btn btn-primary" > Cetak 10 Belakang</button>
                                <br>
                                <br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Satker</th>
                                        <th>Foto</th>
                                        <th>Menu Foto</th>
                                        <th>Menu Cetak</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pegawai as $key => $value)
                                        <tr>
                                            <td>{{$value->Nip}}</td>
                                            <td>{{$value->Nama}}</td>
                                            <td>{{$value->NamaSatker}}</td>
                                            <td>
                                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($value->Photo)) }}" style="width: 3cm;height: 4cm">
                                            </td>
                                            <td>
                                                {{--<a href="{{url('/cetak_kartu/take/'.$value->Nip) }}">--}}
                                                    {{--<button  class="btn btn-primary" > Ambil Foto</button>--}}
                                                {{--</a>--}}
                                                <a HREF="{{url('/cetak_kartu/upload/'.$value->Nip)}}">
                                                    <button class="btn btn-primary"> Upload Foto</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{url('/cetak_kartu/cetak_depan/'.$value->Nip) }}">
                                                    <button  class="btn btn-primary" > Cetak Depan</button>
                                                </a>
                                                <a HREF="{{url('/cetak_kartu/cetak_belakang/'.$value->Nip)}}">
                                                    <button class="btn btn-secondary"> Cetak Belakang</button>
                                                </a>
                                            </td>
                                            {{--<td>2011/04/25</td>--}}
                                            {{--<td>$320,800</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$pegawai->links()}}
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