@extends('layout/main')
@section('title','Topik')

@section('container')

@php
  $counter = 0;
  $angka = 8;
@endphp

<div class="container-fluid" >
      <div class="bannerContainer">
        <div class="bannerBG">
            <div class="bannerTexture ml-0">
              <div class="bannerInside">
                <div class="bannerTextNoBack">
                  <div class="container my-1">
                    <p><strong>Topik</strong></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container">
              <a href="/topik/create" class="btn btn-primary my-2" style="margin:auto;overflow: auto;">Tambah Data Topik</a>
            </div>
      </div>


      <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status')}}
            </div>
            @endif
  <main class="page-content">    
    @foreach ($topik as $t)
        @if($counter==4)
          </main>
          <main class="page-content"> 
          @php
            $counter=0;
          @endphp
        @endif

        @if($counter < 4)
          <div class="cardz">
            <div class="content">
              <h2 class="title">{{$t->nama_topik}}</h2>
              <p class="copy">Jumlah seminar : {{$t->seminar->count()}}</p>
              <a href="topik/{{$t->id_topik}}">
              @if($t->seminar->count() > 0)
                <button class="btn" type="button">View</button>
              @else
                <button class="btn" type="button" disabled style="background:grey">View</button>
              @endif
              </a>
            </div>
          </div>
          @php
            $counter+=1;
          @endphp
        @endif
    @endforeach

  @if($counter!=4)
    </main>
  @endif 
  </div>
</div>
@endsection