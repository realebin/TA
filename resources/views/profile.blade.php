@extends('layout/main')
@section('title','Profile User')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8 ">
            <h1 class="mt-3">Profile User</h1>
            
                <!-- csrf supaya kita aman dari hackers-->
                <!-- id bwt nyambungin ke variable di controller & db nya-->
                <div class="card">
                <div class="card-body">
                @csrf
                    <table>
                        <tbody>
                        <tr>
                        <img src="https://is4-ssl.mzstatic.com/image/thumb/Purple123/v4/9a/c1/5d/9ac15dd5-0614-52b5-6fe8-19df1b6dfad6/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/246x0w.png" width="auto" height="90" class="d-inline-block align-top" alt="" loading="lazy" style="border-radius: 50%;">
                        </tr>
                        <tr>
                        <td>
                        &nbsp;
                        </td>
                        <td>
                        &nbsp;
                        </td>
                        </tr>
                            <tr>
                                <td width=50%>
                                Nama user
                                </td>
                                <td>
                                {{$user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Gender
                                </td>
                                <td>
                                {{$user->gender }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Email
                                </td>
                                <td>
                                {{$user->email }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Username
                                </td>
                                <td>
                                {{$user->username }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Nomor Telepon
                                </td>
                                <td>
                                {{$user->telepon_user }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Alamat
                                </td>
                                <td>
                                {{$user->alamat_user }}
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
                            <!-- <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection