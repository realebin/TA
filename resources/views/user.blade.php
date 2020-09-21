@extends('layout/main')
@section('title','User')

@section('container')


<div class="container-fluid" >
<div class="bannerContainer">
        <div class="bannerBG" >
            <div class="bannerTexture ml-0">
              <div class="bannerInside">
                <div class="bannerTextNoBack">
                  <div class="container my-1">
                                <p><strong>User</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                    <a href="/user/create"class="btn btn-primary my-2" style="margin:auto;overflow: auto;">Tambah Data User</a>
                </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <!-- <h1 class="mt-3"> Daftar User</h1> -->
                <!--m tuh margin, y tuh y nya -->
                

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
                @endif
                
                <ul class="list-group my-3">
                    @foreach($user as $u)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$u->name}}
                            <a href="user/{{$u->id}}" class="badge badge-info">detail</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection