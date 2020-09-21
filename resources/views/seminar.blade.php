@extends('layout/main')
@section('title','Seminar')
@section('container')

<div class="container-fluid">
<div class="bannerContainer">
        <div class="bannerBG" >
            <div class="bannerTexture ml-0">
              <div class="bannerInside">
                <div class="bannerTextNoBack">
                  <div class="container my-1">
                                <p><strong>Seminar</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">
                    <a href="/seminar/create"class="btn btn-primary" style="margin:auto;overflow: hidden;">Tambah Data Seminar</a>
            </div>
    </div>
    <div class="container my-4">
        <!-- <div class="row"> -->
            <!-- <div class="col-10"> -->
                <!-- <h1 class="mt-3"> Seminar</h1> -->
                <!-- <a href="/seminar/create" class="btn btn-primary my-2">Tambah Data Seminar</a> -->

            <!-- </div> -->
        <!-- </div> -->
        <div>
        @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
                @endif
        <table class="table hover" id="dt">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <!-- <th scope="col">Id</th> -->
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Topik</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Durasi</th>
                    <!-- <th scope="col">Action</th> -->
                    
                </tr>
            </thead>
            <tbody>
            @foreach ($seminar as $sm)
            <tr>
                <!-- <a href=""> -->
            <th scope="row">{{$loop->iteration}}</th>
                <!-- <td>{{$sm->id_seminar}}</td> -->
                <td><a style="text-decoration:none;" href="seminar/{{$sm->id_seminar}}" class="seminar">
                <h2 style="font-size: 16px;">
                {{$sm->nama_seminar}}
                </h2>
                </a></td>
                <td>
            
                {{$sm->topik->nama_topik}}
                </td>
                <td>{{$sm->deskripsi}}</td>
                <td>{{$sm->waktu_mulai}}</td>
                <td>{{$sm->waktu_selesai}}</td>
                <td>{{$sm->durasi}}</td>
                <div class="col-6">

                <!--kira kira buat bikin durasi -->
                <!-- @php
                    $date = new DateTime($sm->waktu);
                    $now = new DateTime();
                    echo $date->diff($now)->format("%d days, %h hours and %i minutes");
                @endphp -->
                </div>


                <!-- <td>
                    <a href="" class="badge badge-success">edit</a>
                    <a href="" class="badge badge-danger">delete</a>

                </td> -->
            </tr>

            @endforeach
            </tbody>

        </table>
        </div>

    </div>
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(document).on('click','.seminar',function(){
    <?php $status="seminar" ?>
});
    </script>
@endsection