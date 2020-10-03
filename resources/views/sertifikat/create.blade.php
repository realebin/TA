@extends('layout/main')
@section('title','Create Sertifikat')
@section('back_button')
<div class="col-1 my-0 mx-3 ml-5 " style="text-align: center;">
            <!-- &#60; teh < -->
            <a href="/user" class="btn btn-primary"> &#60;Back </a>
        </div>
@endsection
@section('container')
<div class="container ml-0">
    <div class="row">
        <div class="col-8 ">
            <h1 class="mt-3"> Create Sertifikat</h1>
            
            <form method="post" action="/sertifikat">
                <!-- csrf supaya kita aman dari hackers-->
                <!-- id bwt nyambungin ke variable di controller & db nya-->
                @csrf
                <div class="form-group row">
                            <label for="nama_sertifikat" class="col-md-4 col-form-label text-md-right">{{ __('Nama Sertifikat') }}</label>

                            <div class="col-md-6">
                                <input id="nama_sertifikat" type="text" class="form-control @error('nama_sertifikat') is-invalid @enderror" name="nama_sertifikat" value="{{ old('nama_sertifikat') }}" placeholder="Masukkan Nama" required autocomplete="name" autofocus>

                                @error('nama_sertifikat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seminar_id" class="col-md-4 col-form-label text-md-right">{{ __('Seminar') }}</label>

                            <div class="col-md-6">
                                <select name="seminar_id" id="seminar_id" class="mdb-select md-form colorful-select dropdown-primary combox">
                                @foreach($seminar as $s)
                                    <option></option>
                                        <option value="{{$s->id_seminar}}">{{$s->nama_seminar}}</option>
                                @endforeach
                                </select>
                                @error('seminar_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('File Sertifikat') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="file" class="form-control @error('path') is-invalid @enderror" name="path" value="{{ old('path') }}" placeholder="Masukkan path" >

                                @error('path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Sertifikat Milik User') }}</label>

                            <div class="col-md-6">
                            <select name="id" id="id" class="mdb-select md-form colorful-select dropdown-primary combox">
                                @foreach($user as $u)
                                <option></option>
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Data') }}
                                </button>
                            </div>
                        </div>
                <!-- <button type="submit" class="btn btn-primary">Tambah Data</button> -->

            </form>

        </div>
    </div>
</div>
@endsection