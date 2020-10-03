@extends('layout/main')
@section('title','Sertifikat')

@section('container')

<div class="container-fluid" >
    <div class="bannerContainer">
        <div class="bannerBG">
            <div class="bannerTexture ml-0">
              <div class="bannerInside">
                <div class="bannerTextNoBack">
                  <div class="container my-1">
                        <p><strong>Sertifikat</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">

            <div class="container ">
                    <a href="/sertifikat/create"class="btn btn-primary" style="margin:auto;overflow: hidden;">Tambah Data Seminar</a>
            <div>
        @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
                @endif
        <div class="my-3">
        <table class="table hover" id="dt">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Seminar</th>
                    <th scope="col">Topik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Waktu</th> 
                </tr>
            </thead>
            <tbody>
            @foreach ($sertifikat as $s)
            <tr>
                <!-- <a href=""> -->
            <th scope="row">{{$loop->iteration}}</th>
                <td><a style="text-decoration:none;" href="sertifikat/{{$s->id_sertifikat}}" class="sertifikat">
                <h2 style="font-size: 16px;">
                {{$s->nama_seminar}}
                </h2>
                </a></td>
                <td>
                {{$s->nama_topik}}
                </td>
                <td>{{$s->name}}</td>
                <td>{{$s->waktu_mulai}}</td>
                <div class="col-6">
                </div>
            </tr>
            @endforeach
            </tbody>

        </table>
        </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection