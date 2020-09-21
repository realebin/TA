@extends('layout/main')
@section('title','Create Topik')
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
            <h1 class="mt-3"> Create Topik</h1>
            
            <form method="post" action="/topik">
                <!-- csrf supaya kita aman dari hackers-->
                <!-- id bwt nyambungin ke variable di controller & db nya-->
                @csrf
                <div class="form-group row">
                            <label for="nama_topik" class="col-md-4 col-form-label text-md-right">{{ __('Nama Topik') }}</label>

                            <div class="col-md-6">
                                <input id="nama_topik" type="text" class="form-control @error('nama_topik') is-invalid @enderror" name="nama_topik" value="{{ old('nama_topik') }}" placeholder="Masukkan Nama" required autocomplete="nama_topik" autofocus>

                                @error('nama_topik')
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