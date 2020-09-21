@extends('layout/main')
@section('title','Detail Seminar')

@section('back_button')
<div class="col-1 my-0 mx-3 ml-5 " style="text-align: center;">
            <!-- &#60; teh < -->
            <a class="btn btn-primary" onclick="goBack()" style="color:white;"> &#60;Back </a>

        </div>
        
@endsection

@section('container')
<div class="container ml-0">
    <div class="row">

        <!-- <div class="col-sm-1 my-4 pl-0 ml-0" >
            <a href="/user" class="btn btn-primary">    Back</a>
        </div> -->
        <!-- <a class="btn btn-primary"></a> -->
        <div class="col-8">
            <h1 class="mt-3"> Detail Seminar</h1>
            <div class="card">
                <div class="card-body">




                    <table>
                        <tbody>
                            <tr>
                                <td width=30%> 
                                 ID Seminar
                                </td>
                                
                                <td>
                                {{$seminar->id_seminar}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                Nama Seminar  
                                </td>
                                <td>
                                {{$seminar->nama_seminar}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Topik
                                </td>
                                <td>
                                {{$seminar->topik->nama_topik}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Deskripsi
                                </td>
                                <td>
                                {{$seminar->deskripsi}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Waktu Mulai
                                </td>
                                
                                <td>
                                {{$seminar->waktu_mulai}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Waktu Selesai
                                </td>
                                <td>
                                {{$seminar->waktu_selesai}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Durasi
                                </td>
                                <td>
                                {{$seminar->durasi}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Penyelenggara
                                </td>
                                <td>
                                b
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Pembicara
                                </td>
                                <td>
                                b
                                </td>
                            </tr>


                            <!-- <tr>
                                <td>
                                a
                                </td>
                                <td>
                                b
                                </td>
                            </tr> -->


                            <tr>
                            <td>
                            &nbsp;
                            </td>
                            <td>
                            <a href="{{$seminar->id_seminar}}/edit" class="btn btn-primary">Edit</a>
                            <!--class d-inline biar dia sebaris dan ga kbwh-->
                            <form action="{{$seminar->id_seminar}}" method ="post" class="d-inline"> &nbsp;
                                <!--biar input typenya hidden-->
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <a href="/user" class="card-link">    Back</a> -->
                </div>

                <!-- <table>
                    <tr>
                        <td style="background-color:green;" width="50%" height="50%">
                            <tr><td width="50%" height="50%"
width="50%" height="50%">aduh</td></tr>
                            <tr><td width="50%" height="50%"
width="50%" height="50%">huh</td></tr>
                        </td>
                        <td style="background-color:blue;" width="50%" height="50%">
                            <tr><td width="50%" height="50%"
width="50%" height="50%">ahahaa</td></tr>
                            <tr><td width="50%" height="50%"
width="50%" height="50%">hahay</td></tr>
                        </td>
                    </tr>
                </table> -->

            </div>
        </div>
    </div>
</div>
@endsection