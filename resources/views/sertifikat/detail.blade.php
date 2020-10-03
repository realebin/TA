@extends('layout/main')
@section('title','Detail User')

@section('back_button')
<div class="col-1 my-0 mx-3 ml-5 " style="text-align: center;">
            <!-- &#60; teh < -->
            <a href="/user" class="btn btn-primary"> &#60;Back </a>
        </div>
@endsection

@section('container')
<div class="container ml-0">
    <div class="row">

        <!-- <div class="col-sm-1 my-4 pl-0 ml-0" >
            <a href="/user" class="btn btn-primary">    Back</a>
        </div> -->
        <!-- <a class="btn btn-primary"></a> -->
        <div class="col-6">
            <h1 class="mt-3"> Detail User</h1>
            <div class="card" >
                <div class="card-body">



            <table>
                <tbody>
                    <tr>
                        <td>
                            Nama
                        </td>
                        <td>
                        {{$user->name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender
                        </td>
                        <td>
                        {{$user->gender}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Role 
                        </td>
                        <td>
                        {{$user->role->nama_role}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Username
                        </td>
                        <td>
                        {{$user->username}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Email
                        </td>
                        <td>
                        {{$user->email}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Nomor Telepon
                        </td>
                        <td>
                        {{$user->telepon_user}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Alamat 
                        </td>
                        <td>
                        {{$user->alamat_user}}
                        </td>
                    </tr>
                    <tr>
                    <td>
                    <a href="{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                    <!--class d-inline biar dia sebaris dan ga kbwh-->
                    <form action="{{$user->id}}" method ="post" class="d-inline">
                        <!--biar input typenya hidden-->
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                    </tr>
                </tbody>
                
            </table>

                    <!-- <h5 class="card-title">{{$user->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$user->role_id}}</h6>
                    <p class="card-text">{{$user->username}}</p>
                    <p class="card-text">{{$user->email}}</p>
                    <p class="card-text">{{$user->telepon_user}}</p>
                    <p class="card-text">{{$user->alamat_user}}</p>
                    <a href="{{$user->id}}/edit" class="btn btn-primary">Edit</a> -->
                    <!--class d-inline biar dia sebaris dan ga kbwh-->
                    <!-- <form action="{{$user->id}}" method ="post" class="d-inline"> -->
                        <!--biar input typenya hidden-->
                        <!-- @method('delete') -->
                        <!-- @csrf -->
                        <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                    </form>
                    <!-- <a href="/user" class="card-link">    Back</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection