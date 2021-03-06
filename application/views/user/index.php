<div class="page">
	<div class="page-header">
		<h1 class="page-title">Pengaturan Pengguna</h1>
		<div class="page-header-actions">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
				<li class="breadcrumb-item active">Users</li>
			</ol>
		</div>
	</div>
	<div class="page-content">
	

		<!-- Panel Basic -->
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
				<!-- <h3 class="panel-title">Basic</h3> -->
				<div class="row col-md-12">
					<div class="col-md-6">
					</div>
                  <div class="col-md-6" style="text-align: right">
                    <br/>
                    <a class="btn btn-primary " style="color:white" onclick="add_data()"><i class="icon glyphicon glyphicon-plus" aria-hidden="true"></i>Add</a>
                    <a class="btn btn-outline-primary" onclick="refresh()"><i class="icon glyphicon glyphicon-refresh" aria-hidden="true"></i>Refresh</a>
                </div> 
            </div>
        </header>
        <br/>
        <div class="panel-body">
           <table class="table table-hover dataTable table-bordered w-full" id="tabel">
              <thead>
                 <tr>
                    <th><center>No</center></th>
                    <th><center>Username</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Role</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>
<!-- End Panel Basic -->
</div>
</div>

<script type="text/javascript">
  var save_method; //for save method string
  var table;
  $(document).ready(function(){
//  console.log('hahaha');
// //       $('#test').click(function(){
// //           alert('cccp');
// //       })
table=$('#tabel').DataTable({
  stateSave: true,
  searching : true,
  processing : true,
  serverSide : true,
  pageLength:20,
  customize : function(doc) {
   doc.styles['td:nth-child(2)'] = { 
     width: '100px',
     'max-width': '100px'
 }
},
ajax: {
    url: "<?php echo site_url('user/ajax_list')?>",
    type: "POST",
    dataType:"JSON",
    data:function ( data ) {
                // data.tgl = $('[name=tgl]').val();
                // data.nopol = $('#nopol').val();
                // console.log(data.tgl);
            }
        },
        iDisplayLength: -1,
        aoColumnDefs: [{
          bSortable: false,
          aTargets: [-1]
      },
      {
          targets: [2],
          className: "dt-body-right",
      }
      ],
      iDisplayLength: 5,
      aLengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
       // sDom: '<"dt-panelmenu clearfix"Bfr>t<"dt-panelfooter clearfix"ip>',
       // buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
   });

// $("input").keyup(function(){
//     $(this).parent().parent().removeClass('has-error');
//     $(this).next().empty();
//     if($(this).attr('name')!=='prefiks_internet')
//     {
//       $(this).val($(this).val().toUpperCase());
//   }

// });
// $("textarea").keyup(function(){
//     $(this).parent().parent().removeClass('has-error');
//     $(this).next().empty();
//     $(this).val($(this).val().toUpperCase());
// });
// $("select").change(function(){
//     $(this).parent().parent().removeClass('has-error');
//     $(this).next().empty();
// });

});

  function add_data()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Pengguna'); // Set Title to Bootstrap modal title
    validation();
}

function edit_level(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.old-password').fadeIn();
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="username"]').val(data.username);
            $('[name="role"]').val(data.role).trigger('change');
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pengguna'); // Set title to Bootstrap modal title
            validation_edit();

        },
        error: function (xhr, status, error)
        {
            error(xhr.responseText);
        }
    });
}

function refresh()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('user/ajax_add')?>";
    } else {
        url = "<?php echo site_url('user/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');           
                refresh();
                success('Data Berhasil Disimpan');
                // swal("Success!", "Data success being saved", "success");
            }
            else
            {
            	error('Data Gagal Disimpan');
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            error(jqXHR);

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_level(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('user/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                refresh();
                success('Data Berhasil Dihapus')
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert('Error deleting data');
                error('Data gagal dihapus');
            }
        });

    }
}

</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Pengguna Form</h3>
			</div>
				<form method="post" id="form" action="#" enctype="multipart/form-data">
			<div class="modal-body form">
					<input type="hidden" value="" name="id"/> 
					<div class="form-body">
						<div class="form-group row">
							<label class="control-label col-md-3">Nama</label>
							<div class="col-md-9">
								<input name="nama" id="nama" placeholder="Nama" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3">Username</label>
							<div class="col-md-9">
								<input name="username" id="username" placeholder="Username" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3">Role</label>
							<div class="col-md-9">
								<select class="form-control" id="role" name="role">
									<option value="">-Silahkan Pilih-</option>
									<option value="admin">Admin</option>
									<option value="operator">Operator</option>
								</select>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row old-password" style="display: none">
							<label class="control-label col-md-3">Password Lama</label>
							<div class="col-md-9">
								<input name="old_password" id="old_password" placeholder="Password Lama" class="form-control" type="password">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-9">
								<input name="password" id="password" placeholder="Password" class="form-control" type="password">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3">Konfirmasi Password</label>
							<div class="col-md-9">
								<input name="password_confirm" id="password_confirm" placeholder="Konfirmasi Password" class="form-control" type="password">
								<span class="help-block"></span>
							</div>
						</div>
					</div>
			</div>
				
			<div class="modal-footer">
				<button type="submit" id="btnSave" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#modal_form').on('hidden.bs.modal', function (e) {
		  $('#form')[0].reset();
		  $('.old-password').fadeOut();
		  $("#form").validate().resetForm();
		})

		$('#form').submit('#btnSave',function(e){
			e.preventDefault();
			// console.log('aaaaa');
			// console.log($(e.currentTarget).valid());
			if($(e.currentTarget).valid()==true)
			{
				save();
			}
		})
	})

	function validation()
	{

		$.validator.addMethod("noSpace", function(value, element) { 
			return value.indexOf(" ") < 0 && value != ""; 
		}, "Silahkan isi username tanpa menggunakan spasi");

		$('#form').validate({
			ignore: [],
			button: {
				selector: "#btnSave",
				disabled: "disabled"
			},
			debug: false,
			errorClass: 'invalid-feedback',
			errorElement: 'div',
			errorPlacement: function(error, e){
				jQuery(e).parents('.form-group div').append(error);
			},
			highlight: function(e) {
				jQuery(e).closest('div').removeClass('is-invalid').addClass('is-invalid');
				document.getElementById("btnSave").style.opacity = "0.5";
				$(e).css('border-color', 'red'); 
			},
			unhighlight: function(e){
				jQuery(e).closest('div').removeClass('is-invalid');
				document.getElementById("btnSave").style.opacity = "1";
				$(e).css("border",'');
				$(e).css('border-color', '#4caf50'); 
			},
			success: function(e){
				jQuery(e).closest('div').removeClass('is-invalid');
				jQuery(e).remove();
				document.getElementById("btnSave").style.opacity = "1";
				$(e).css("border",'');
				$(e).css('border-color', '#4caf50'); 
			},
			rules: {
				'nama': {
					required: true,
					minlength: 1,
					maxlength: 100,
				},
				'role': {
					required: true,
				},
				'username': {
					required: true,
					noSpace: true,     
					remote: {
						url: "<?php echo base_url('index.php/user/username_check'); ?>",
						type: "post",
						data: {
							username: function()
							{
								return $('#form :input[name="username"]').val();
							},
							id:function()
							{
								return $('#form :input[name="id"]').val();
							},
						},
						beforeSend: function () {
							$('#message').fadeIn();
							$("#message").html("<img src='{{asset('images/') }}/ajax-loader.gif' /> Memeriksa...");
						},
						dataFilter: function (data) {
							console.log(data);
							var json = JSON.parse(data);
							$('.ajax-loader').fadeOut();
							if (json.msg == "false") {
								$("#message").html("<img src='{{asset('images/') }}/cross.png' width='20pt' height='25pt'/>");
								return "\"" + "Username sudah digunakan" + "\"";
							} else {
								$("#message").html("<img src='{{asset('images/') }}/tick.png' width='20pt' height='25pt' />");
								return 'true';
							}
						}
					}
				},
				'password': {
					required:true,
					minlength: 8,
				},
				'password_confirm' : {
					required:true,
					minlength : 5,
					equalTo : "#password"
				} 
			},
			messages: {
				'nama': {
					required: 'Silahkan isi form',
					minlength: 'Isian minimal 1 karakter',
					maxlength: 'Isian maksimal 100 karakter',
				},
				'role': {
					required: 'Silahkan isi form',
				},
				'username': {
					required: 'Silahkan isi form',
					remote: $.validator.format("{0} is already taken.")
				},
				'password': {
					required: 'Silahkan isi form',
					minlength: 'Isian minimal 8 karakter',
				},
				'password_confirm': {
					required: 'Silahkan isi form',
					minlength: 'Isian minimal 8 karakter',
					equalTo:'Password yang anda inputkan salah!'
				},   
			}
		});

		$('input').on('focus focusout keyup', function () {
			$(this).valid();
		});
	}

	function validation_edit()
	{

		$.validator.addMethod("noSpace", function(value, element) { 
			return value.indexOf(" ") < 0 && value != ""; 
		}, "Silahkan isi username tanpa menggunakan spasi");

		$('#form').validate({
			ignore: [],
			button: {
				selector: "#btnSave",
				disabled: "disabled"
			},
			debug: false,
			errorClass: 'invalid-feedback',
			errorElement: 'div',
			errorPlacement: function(error, e){
				jQuery(e).parents('.form-group div').append(error);
			},
			highlight: function(e){
				jQuery(e).closest('div').removeClass('is-invalid').addClass('is-invalid');
				document.getElementById("btnSave").style.opacity = "0.5";
				$(e).css('border-color', 'red'); 
			},
			unhighlight: function(e){
				jQuery(e).closest('div').removeClass('is-invalid');
				document.getElementById("btnSave").style.opacity = "1";
				$(e).css("border",'');
				$(e).css('border-color', '#4caf50'); 
			},
			success: function(e){
				jQuery(e).closest('div').removeClass('is-invalid');
				jQuery(e).remove();
				document.getElementById("btnSave").style.opacity = "1";
				$(e).css("border",'');
				$(e).css('border-color', '#4caf50'); 
			},
			rules: {
				'nama': {
					required: true,
					minlength: 1,
					maxlength: 100,
				},
				'role': {
					required: true,
				},
				'username': {
					required: true,
					noSpace: true,     
					remote: {
						url: "<?php echo base_url('index.php/user/username_check'); ?>",
						type: "post",
						data: {
							username: function()
							{
								return $('#form :input[name="username"]').val();
							},
							id:function()
							{
								return $('#form :input[name="id"]').val();
							},
						},
						beforeSend: function () {
							$('#message').fadeIn();
							$("#message").html("<img src='{{asset('images/') }}/ajax-loader.gif' /> Memeriksa...");
						},
						dataFilter: function (data) {
							var json = JSON.parse(data);
							if (json.msg == "false") {
								$("#message").html("<img src='{{asset('images/') }}/cross.png' width='20pt' height='25pt'/>");
								return "\"" + "Username sudah digunakan" + "\"";
							} else {
								$("#message").html("<img src='{{asset('images/') }}/tick.png' width='20pt' height='25pt' />");
								return 'true';
							}
						}
					}
				},
				'old_password': {
                	required:false,
                    // minlength: 8,
                    remote: {
                		url: "<?php echo base_url('index.php/user/password_check'); ?>",
                		type: "post",
                		data: {
                			old: function()
                          {
                              return $('#form :input[name="old_password"]').val();
                          },
                          id:function()
							{
								return $('#form :input[name="id"]').val();
							},
                		},
                		beforeSend: function () {
                			// $('.ajax-loader').fadeIn();
         					// $('#loader').css('width','100%');
                		},
                		dataFilter: function (data) {
                			// console.log(data);
                			var json = JSON.parse(data);
							if (json.msg == "false") {
								$("#message").html("<img src='{{asset('images/') }}/cross.png' width='20pt' height='25pt'/>");
								return "\"" + "Password lama yang anda masukkan salah" + "\"";
							} else {
								$("#message").html("<img src='{{asset('images/') }}/tick.png' width='20pt' height='25pt' />");
								return 'true';
							}
                		}
                	}
                }, 
				'password': {
					required:false,
					minlength: 8,
				},
				'password_confirm' : {
					required:false,
					minlength : 5,
					equalTo : "#password"
				} 
			},
			messages: {
				'nama': {
					required: 'Silahkan isi form',
					minlength: 'Isian minimal 1 karakter',
					maxlength: 'Isian maksimal 100 karakter',
				},
				'role': {
					required: 'Silahkan isi form',
				},
				'username': {
					required: 'Silahkan isi form',
					remote: $.validator.format("{0} is already taken.")
				},
				'old_password': {
                    remote: 'Password lama yang anda isikan salah',
                },
				'password': {
					required: 'Silahkan isi form',
					minlength: 'Isian minimal 8 karakter',
				},
				'password_confirm': {
					required: 'Silahkan isi form',
					minlength: 'Isian minimal 8 karakter',
					equalTo:'Password yang anda inputkan salah!'
				},   
			}
		});

		$('input').on('focus focusout keyup', function () {
			$(this).valid();
		});
	}
</script>
