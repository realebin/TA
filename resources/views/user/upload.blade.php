@extends('layout/main')
@section('title','Create User')
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
            <h1 class="mt-3"> Create User Via Upload .xls</h1>
            
            <form method="post" action="/uploadUser">
            

                    <!--multiple row ajax insertion bruh-->

        <div class="card" style="background:#EEF0E6">
			<br/>
			<h3 align="center">Daftar User</h3>
            <h6 align="center">Jika menambahkan user dari sini, user akan otomatis menjadi Guest</h6> 
            <h6 align="center">Gunakan template yang sudah disediakan, jangan ada bagian yang kosong</h6> 
            <h6 align="center">(Misalkan pada baris yang sama ada data yang terisi tapi kolom lainnya dibiarkan kosong)</h6> 
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
                                <th>Email</th>
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
                    <label>Masukkan Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                    <span id="error_email" class="text-danger"></span>
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

        </div>
    </div>
</div>
@endsection

@section('jquery')
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
		$('#email').val('');
		$('#error_nama').text('');
		$('#error_email').text('');
		$('#nama').css('border-color', '');
		$('#email').css('border-color', '');
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_nama = '';
		var error_email = '';
		var nama = '';
		var email = '';
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
		if($('#email').val() == '')
		{
			error_email = 'Isi user email apa';
			$('#error_email').text(error_email);
			$('#email').css('border-color', '#cc0000');
			email = '';
		}
		else
		{
			error_email = '';
			$('#error_email').text(error_email);
			$('#email').css('border-color', '');
			email = $('#email').val();
		}
		if(error_nama != '' || error_email != '')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';
				output += '<td>'+nama+' <input type="hidden" name="hidden_nama[]" id="nama'+count+'" class="nama" value="'+nama+'" /></td>';
				output += '<td>'+email+' <input type="hidden" name="hidden_email[]" id="email'+count+'" value="'+email+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
				output = '<td>'+nama+' <input type="hidden" name="hidden_nama[]" id="nama'+row_id+'" class="nama" value="'+nama+'" /></td>';
				output += '<td>'+email+' <input type="hidden" name="hidden_email[]" id="email'+row_id+'" value="'+email+'" /></td>';
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
		var email = $('#email'+row_id+'').val();
		$('#nama').val(nama);
		$('#email').val(email);
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
            var email= $('input[id^=email]').val();
            var nama =  $('input[id^=nama]').val();
            var form_data={
                nama_seminar : nama_seminar,
                waktu_mulai : waktu_mulai,
                waktu_selesai : waktu_selesai,
                topik_id : topik_id,
                deskripsi : deskripsi, 
                pb :pb,
                py:py,
                listUser: {
                    nama:nama,
                    email:email,
                }
            };
			$.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({

				url:"/seminar",
				method:"POST",
                data:form_data,
                dataType: 'json',
            
                
                error: function(data){
                    console.log('Error: ',data);

                },
				success:function(data)
				{
                    console.log("berhasil");
					$('#user_data').find("tr:gt(0)").remove();
					$('#action_alert').html('<p>Data Inserted Successfully</p>');
				}
			})
		}
		else
		{
			$('#action_alert').html('<p>Please Add atleast one data</p>');
			$('#action_alert').dialog('open');
		}
	});
	
});  
</script>
@endsection