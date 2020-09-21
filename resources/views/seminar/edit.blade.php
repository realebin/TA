@extends('layout/main')
@section('title','Update User')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8 ">
            <h1 class="mt-3"> Update Seminar</h1>
            
            <form method="post" action="/seminar/{{$seminar->id_seminar}}">
                @method('patch')
                <!-- csrf supaya kita aman dari hackers-->
                <!-- id bwt nyambungin ke variable di controller & db nya-->
                @csrf
                <div class="form-group row">
                            <label for="nama_seminar" class="col-md-4 col-form-label text-md-right">{{ __('Nama Seminar') }}</label>

                            <div class="col-md-6">
                                <input id="nama_seminar" type="text" class="form-control @error('nama_seminar') is-invalid @enderror" name="nama_seminar" value="{{ $seminar->nama_seminar }}" placeholder="Masukkan Nama Seminar" required autocomplete="nama_seminar" autofocus>

                                @error('nama_seminar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi Seminar') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ $seminar->deskripsi }}" placeholder="Masukkan Deskripsi Mengenai Seminar" required autocomplete="deskripsi">

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="topik_id" class="col-md-4 col-form-label text-md-right">{{ __('Topik') }}</label>
                                <div class="col-md-6">
                                    <select name="topik_id" id="topik_id" class="mdb-select md-form colorful-select dropdown-primary">
                                        @foreach($topik as $t)
                                            <option value="{{$t->id_topik}}">{{$t->nama_topik}}</option>
                                        @endforeach
                                    </select>
                                    @error('topik_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu_mulai" class="col-md-4 col-form-label text-md-right">{{ __('Waktu Mulai') }}</label>
                                <div class="col-md-6">
                            <input id="waktu_mulai" type="datetime-local" class="form-control @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" value="{{ $seminar->waktu_mulai }}" placeholder="Masukkan Waktu Mulai Seminar" required autocomplete="waktu_mulai">
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="waktu_selesai" class="col-md-4 col-form-label text-md-right">{{ __('Waktu Selesai') }}</label>
                                <div class="col-md-6">
                            <input id="waktu_selesai" type="datetime-local" class="form-control @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" value="{{ $seminar->waktu_selesai }}" placeholder="Masukkan Waktu Selesai Seminar" required autocomplete="waktu_selesai">
                        </div>
                        </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection