@extends('layout/main')
@section('title','Create Seminar')
@section('css')
<meta name="csrf-token" content="{!! csrf_token() !!}"/>
@stop
@section('container')
<div class="container">
    <div class="row">
        <div class="col-8 ">
            <h1 class="mt-3"> Create Data Seminar</h1>
            <br/>
            
            <form method="post" action="/seminar" id="seminar" name="seminar"> 
                <!-- csrf supaya kita aman dari hackers-->
                <!-- id bwt nyambungin ke variable di controller & db nya-->
                @csrf
                <div class="card" style="background:#EEF0E6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_seminar" class="col-md-4 col-form-label text-md-right">{{ __('Nama Seminar') }}</label>

                            <div class="col-md-6">
                                <input id="nama_seminar" type="text" class="form-control @error('nama_seminar') is-invalid @enderror" name="nama_seminar" value="{{ old('nama_seminar') }}" placeholder="Masukkan Nama Seminar" required autocomplete="nama_seminar" autofocus>

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
                                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi Mengenai Seminar" required autocomplete="deskripsi">

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
                                    <select name="topik_id" id="topik_id" class="mdb-select md-form colorful-select dropdown-primary combox">
                                    <option></option>
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
                                    <input id="waktu_mulai" type="datetime-local" class="form-control @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" value="{{ old('waktu_mulai') }}" placeholder="Masukkan Waktu Mulainya Seminar" required autocomplete="waktu_mulai">
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="waktu_selesai" class="col-md-4 col-form-label text-md-right">{{ __('Waktu Selesai') }}</label>
                                <div class="col-md-6">
                                    <input id="waktu_selesai" type="datetime-local" class="form-control @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" value="{{ old('waktu_selesai') }}" placeholder="Masukkan Waktu Selesainya Seminar" required autocomplete="waktu_selesai">
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="py" class="col-md-4 col-form-label text-md-right">{{ __('Penyelanggara Seminar') }}</label>
                                <div class="col-md-6">
                                    <select name="py" id="py" class="mdb-select md-form colorful-select dropdown-primary combox">
                                    <option></option>
                                        @foreach($user as $u)
                                            <option value="{{$u->id}}">{{$u->name}}</option>
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
                            <label for="pb" class="col-md-4 col-form-label text-md-right">{{ __('Pembicara Seminar') }}</label>
                                <div class="col-md-6">
                                    <select name="pb" id="pb" class="mdb-select md-form colorful-select dropdown-primary combox">
                                        @foreach($user as $u)
                                        <option></option>
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('topik_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                        </div>
                    </div>
                </div>
        <br/>

        <!--multiple row ajax insertion bruh-->

        <div class="card" style="background:#EEF0E6">
			<br/>
			<h3 align="center">Daftar User</h3>
            <h6 align="center">Jika dirasa masih membutuhkan menambah user lagi dengan role lain, bisa ditambahkan disini</h6> 
            <h6 align="center">(Misalkan bendahara, sekretaris, konsumsi, dokumentasi, peserta. dll)</h6> 
            <div class="card-body">
			    <div align="right" style="margin-bottom:5px;">
				    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			    </div>
			    <br />
			    <!-- <form method="post" id="seminar"> -->
				    <div class="table-responsive">
					    <table class="table table-striped table-bordered" id="user_data" name="user_data">
						    <tr>
                                <th>Nama</th>
                                <th>Role Sebagai</th>
                                <th>Details</th>
                                <th>Remove</th>
						    </tr>
					    </table>
				    </div>
				    <!-- <div align="center">
					    <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
				    </div> -->
			    <!-- </form> -->
			    <br />
		    </div>
            <div id="user_dialog" title="Add Data">
                <div class="form-group">
                    <label>Masukkan Nama</label>
                    <select name="nama" id="nama" class="mdb-select md-form colorful-select dropdown-primary combox">
                        @foreach($user as $u)
                        <option></option>
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                    <br/>
                    <!-- <input type="text" name="nama" id="nama" class="form-control" /> -->
                    <span id="error_nama" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label>Masukkan Role Sebagai</label>
                    <input type="text" name="sebagai" id="sebagai" class="form-control" />
                    <span id="error_sebagai" class="text-danger"></span>
                </div>
                <div class="form-group" align="center">
                    <input type="hidden" name="row_id" id="hidden_row_id" />
                    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                </div>
            </div>
		    <div id="action_alert" title="Action">
            </div>
		</div>

                    <!-- yang pake button satu satu -->
                        <!-- <div id="list_deskripsi">

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                        <button type="button" class="btn btn-primary btn-add-user"  > <h5>+</h5> Tambah User (misal : moderator, pembicara, dsb) </button>
                            </div>
                        </div> -->
                    <!--batas-->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <!-- <input type="submit" class="btn btn-primary saveme" text="{{ __('Tambah Data') }}"/> -->
                                <button type="submit" class="btn btn-primary saveme">
                                    {{ __('Tambah Data') }}
                                </button>
                            </div>
                        </div>

            </form>

        </div>
    </div>
</div>

@endsection

@section('jquery')
<!--punya si tambah tombol satu satu-->
<!-- <script type="text/javascript">

$(document).on('click','.btn-add-user',function(){
    var deskripsi_seminar="";
    var value_deskripsi="";
    $('#list_deskripsi').append(
        `
        <div class="form-group row">
                            <label for="sebagai" class="col-md-4 col-form-label text-md-right">{{ __('User Sebagai') }}</label>

                            <div class="col-md-6">
                                <input id="sebagai" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="sebagai" value="{{ old('sebagai') }}" placeholder="Masukkan User Memiliki Jabatan Apa" required autocomplete="sebagai">

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <div class="form-group row">
                            <label for="pb" class="col-md-4 col-form-label text-md-right">{{ __('Pembicara Seminar') }}</label>
                                <div class="col-md-6">
                                    <select name="pb" id="pb" class="mdb-select md-form colorful-select dropdown-primary combox">
                                        @foreach($user as $u)
                                        <option></option>
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('topik_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                        </div>
                        <div class="userrolesama">
                        </div>
        

        
        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                        <button type="button" class="btn btn-primary btn-add-userrole" > <h5>+</h5> Tambah User Dengan Role yang sama</button>
                            </div>
                        </div>
        `
    );
});
</script>


<script type="text/javascript">
$(document).on('click','.btn-add-userrole',function(){
    // console.log("abcdsefsf");
    $('.userrolesama').append(
        `
        <div class="form-group row">
                            <label for="pb" class="col-md-4 col-form-label text-md-right">{{ __('Pembicara Seminar') }}</label>
                                <div class="col-md-6">
                                    <select name="pb" id="pb" class="mdb-select md-form colorful-select dropdown-primary combox">
                                        @foreach($user as $u)
                                        <option></option>
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('topik_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                        </div>
                        `
    );

});
</script> -->
<!-- <script>
    $(document).on('click','.saveme',function(){
        $.ajax({
            type: type,
            url:url,
            data:formData,
            dataType: 'json'
            success: function(data){

            }
            error: function(data){

            }
        });
    });
</script> -->
<!--batas-->

<script type="text/javascript">  
$(document).ready(function(){ 
	
	var count = 0;

	$('#user_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#add').click(function(){
		$('#user_dialog').dialog('option', 'title', 'Add Data');
        // blank buat select2
		$('#nama').val(null).trigger('change');;
		$('#sebagai').val('');
		$('#error_nama').text('');
		$('#error_sebagai').text('');
		$('#nama').css('border-color', '');
		$('#sebagai').css('border-color', '');
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_nama = '';
		var error_sebagai = '';
		var nama = '';
		var sebagai = '';
		if($('#nama').val() == '')
		{
			error_nama = 'Isikan nama';
			$('#error_nama').text(error_nama);
			$('#nama').css('border-color', '#cc0000');
			nama = '';
		}
		else
		{
			error_nama = '';
			$('#error_nama').text(error_nama);
			$('#nama').css('border-color', '');
			nama = $('#nama').val();
		}	
		if($('#sebagai').val() == '')
		{
			error_sebagai = 'Isi user sebagai apa';
			$('#error_sebagai').text(error_sebagai);
			$('#sebagai').css('border-color', '#cc0000');
			sebagai = '';
		}
		else
		{
			error_sebagai = '';
			$('#error_sebagai').text(error_sebagai);
			$('#sebagai').css('border-color', '');
			sebagai = $('#sebagai').val();
		}
		if(error_nama != '' || error_sebagai != '')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';
				output += '<td>'+nama+' <input type="hidden" name="hidden_nama[]" id="nama_user_'+count+'" class="nama" value="'+nama+'" /></td>';
				output += '<td>'+sebagai+' <input type="hidden" name="hidden_sebagai[]" id="role_'+count+'" value="'+sebagai+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
				output = '<td>'+nama+' <input type="hidden" name="hidden_nama[]" id="nama_user_'+row_id+'" class="nama" value="'+nama+'" /></td>';
				output += '<td>'+sebagai+' <input type="hidden" name="hidden_sebagai[]" id="role_'+row_id+'" value="'+sebagai+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
				$('#row_'+row_id+'').html(output);
			}

			$('#user_dialog').dialog('close');
		}
	});

	$(document).on('click', '.view_details', function(){
		var row_id = $(this).attr("id");
		var nama = $('#nama'+row_id+'').val();
		var sebagai = $('#sebagai'+row_id+'').val();
		$('#nama').val(nama);
		$('#sebagai').val(sebagai);
		$('#save').text('Edit');
		$('#hidden_row_id').val(row_id);
		$('#user_dialog').dialog('option', 'title', 'Edit Data');
		$('#user_dialog').dialog('open');
	});

	$(document).on('click', '.remove_details', function(){
		var row_id = $(this).attr("id");
		if(confirm("Apa Anda yakin akan menghapus data pada baris ini?"))
		{
			$('#row_'+row_id+'').remove();
		}
		else
		{
			return false;
		}
	});

	$('#action_alert').dialog({
		autoOpen:false
	});

// formnya dia itu teh
    $(document).on('submit', '#seminar', function(){

		event.preventDefault();
		var count_data = 0;
		$('.nama').each(function(){
			count_data = count_data + 1;
		});
		if(count_data > 0)
		{
            var nama_seminar = $('#nama_seminar').val();
            var waktu_mulai = $('#waktu_mulai').val();
            var waktu_selesai = $('#waktu_selesai').val();
            var topik_id = $('#topik_id').val();
            var deskripsi = $('#deskripsi').val();
            var pb= $('#pb').val();
            var py= $('#py').val();
            var sebagai = [];
            var nama = [];
            $('input[id*=nama_user_]').each(function(index,element){
                nama.push( $(element).val() )
            });
            $('input[id*=role_]').each(function(index,element){
                sebagai.push( $(element).val() )
            });
            var form_data={
                nama_seminar : nama_seminar,
                waktu_mulai : waktu_mulai,
                waktu_selesai : waktu_selesai,
                topik_id : topik_id,
                deskripsi : deskripsi, 
                pb :pb,
                py:py,
                list_user_nama: nama,
                list_user_role: sebagai,
            };
			$.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({

				url:"/seminar",
				type:"POST",
                data:form_data,
                // dataType: 'json',
                // async: false,
            
                
                error: function(data){
                    console.log('Error: ',data);

                },
				success:function(data)
				{
                    
					$('#user_data').find("tr:gt(0)").remove();
                    location.href = "{{ url('/seminar') }}";
				}
			})
		}
		else
		{
            var nama_seminar = $('#nama_seminar').val();
            var waktu_mulai = $('#waktu_mulai').val();
            var waktu_selesai = $('#waktu_selesai').val();
            var topik_id = $('#topik_id').val();
            var deskripsi = $('#deskripsi').val();
            var pb= $('#pb').val();
            var py= $('#py').val();
            
            var form_data={
                nama_seminar : nama_seminar,
                waktu_mulai : waktu_mulai,
                waktu_selesai : waktu_selesai,
                topik_id : topik_id,
                deskripsi : deskripsi, 
                pb :pb,
                py:py,
               
            };
			$.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({

				url:"/seminar",
				type:"POST",
                data:form_data,
                // dataType: 'json',
                // async: false,
            
                
                error: function(data){
                    console.log('Error: ',data);

                },
				success:function(data)
				{
                    
					$('#user_data').find("tr:gt(0)").remove();
                    location.href = "{{ url('/seminar') }}";
				}
			})
		}
	});
	
});  
</script>
@endsection