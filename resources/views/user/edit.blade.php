@extends('layout/main')
@section('title','Update User')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8 ">
            <h1 class="mt-3"> Update User</h1>
            
            <form method="post" action="/user/{{$user->id}}">
                @method('patch')
                <!-- csrf supaya kita aman dari hackers-->
                <!-- id bwt nyambungin ke variable di controller & db nya-->
                @csrf
                <!-- <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{$user->name}}">
                    @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username" value="{{$user->username}}">
                    @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email" name="email" value="{{$user->email}}">
                    @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password" name="password">
                    @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_user">Alamat</label>
                    <input type="text" class="form-control @error('alamat_user') is-invalid @enderror" id="alamat_user" placeholder="Masukkan alamat" name="alamat_user" value="{{$user->alamat_user}}">
                    @error('alamat_user')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="telepon_user">Nomor Telepon</label>
                    <input type="text" class="form-control @error('telepon_user') is-invalid @enderror" id="telepon_user" placeholder="Masukkan nomor telepon" name="telepon_user" value="{{$user->telepon_user}}">
                    @error('telepon_user')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div> -->



                <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" placeholder="Masukkan Nama" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" placeholder="Masukkan Email" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username }}" placeholder="Masukkan Username" required autocomplete="username" readonly>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telepon_user" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telepon_user" class="form-control @error('telepon_user') is-invalid @enderror" name="telepon_user" value="{{$user->telepon_user }}" placeholder="Masukkan Nomor Telepon" required autocomplete="telepon_user">

                                @error('telepon_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_user" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_user" class="form-control @error('alamat_user') is-invalid @enderror" name="alamat_user" value="{{$user->alamat_user }}" placeholder="Masukkan Alamat" required autocomplete="alamat_user">

                                @error('alamat_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Masukkan Password Lagi" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <input class="form-control @error('role_id') is-invalid @enderror" value="{{$user->role->nama_role}}" readonly>
                                <input id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="{{$user->role_id}}" readonly hidden>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                <!-- <div class="form-group row">
                    <label for="role_id">Role</label>
                    <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id" placeholder="Masukkan role" name="role_id" value="{{$user->role_id}}" readonly>
                    @error('role_id')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div> -->
                <!-- <button type="submit" class="btn btn-primary">Update</button> -->
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