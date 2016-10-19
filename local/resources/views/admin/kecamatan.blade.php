@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Kecamatan</h2>
        <div class="panel-body">
		    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_form"
	                        onclick="document.getElementById('KecamatanId').value='';
	                        document.getElementById('kecamatanName').value='';
	                        document.getElementById('ProvinsiId').value='';
	                        document.getElementById('KabupatenKotaId').value='';"><i class="glyphicon glyphicon-plus"></i> Tambah Kecamatan</button>
	        <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh</button> 
	        <br/>
	        <br/>
	        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                	<th style="text-align:center;">Kecamatan</th>
	                	<th style="text-align:center;">Kabupaten / Kota</th>
	                    <th style="text-align:center;">Provinsi</th>
	                    <th style="width:100px; text-align:center;">Ubah</th>
	                    <th style="width:100px; text-align:center;">Hapus</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
    </div>
</div>

<script type="text/javascript">

var table;

$(document).ready(function() {

    table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("kecamatanlist") }}',
        columns: [
        	{data: 'kecamatanName', name: 'kecamatanName' },
        	{data: 'KabupatenKotaName', name: 'KabupatenKotaName' },
            {data: 'ProvinsiName', name: 'ProvinsiName' },
            {data: 'actionEdit', name: 'actionEdit', orderable: false, searchable: false},
            {data: 'actionDelete', name: 'actionDelete', orderable: false, searchable: false}
        ]
    });  

    $('#ProvinsiId').on('change',function(e){
        var prop_id = $('#ProvinsiId').val();
        if(prop_id > 0){
        	$.ajax({
                url:'kabDropDownData/'+prop_id,
                type:'GET',
                success:function(data){
                    $('#KabupatenKotaId').empty();
                    $('#KabupatenKotaId').append("<option value=''>-- Pilih Kabupaten / Kota --</option>");
                    $('#KabupatenKotaId').append(data);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
        	$('#KabupatenKotaId').empty();
            $('#KabupatenKotaId').append("<option value=''>-- Pilih Kabupaten / Kota --</option>");
        }
    }); 

});

function reload_table()
{
    $('#msg').empty();
    table.ajax.reload(null,false);
}

function edit(id)
{
    var mySplitResult = id.split("/");
    $('#KecamatanId').val(mySplitResult[0]);
    $('#kecamatanName').val(mySplitResult[1]);
    $('#ProvinsiId').val(mySplitResult[2]);

    var prop_id = mySplitResult[2];
    var kab_id = mySplitResult[3];
    if(prop_id > 0){
        $.ajax({
            url:'kabDropDownDataSelected/'+prop_id+'/'+kab_id,
            type:'GET',
            success:function(data){
                $('#KabupatenKotaId').empty();
                $('#KabupatenKotaId').append("<option value=''>-- Pilih Kabupaten / Kota --</option>");
                $('#KabupatenKotaId').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }else{
        $('#KabupatenKotaId').empty();
        $('#KabupatenKotaId').append("<option value=''>-- Pilih Kabupaten / Kota --</option>");
    }
}

function deletes(id)
{
    var mySplitResult = id.split("/");
    $('#KecamatanIdDel').val(mySplitResult[0]);
    $('#KecamatanNameDel').val(mySplitResult[1]);
}

</script>

<!-- modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kecamatan</h3>
            </div>
            <div class="modal-body form">
                <form action="{{action('AdminController@kecamatansave')}}" id="form" method="post">
                    <input type="hidden" value="" name="KecamatanId" id="KecamatanId"/>
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="kecamatanName" id="kecamatanName" placeholder="Nama Kecamatan" class="form-control" type="text" required="required">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                <select name="ProvinsiId" id="ProvinsiId" class="form-control" required="required">
                                    <option value="">-- Pilih Provinsi --</option>
                                    <?php
						     			foreach($dataprov as $r){ ?>
						     				<option value="<?= $r->ProvinsiId; ?>"><?= $r->ProvinsiName ?></option>
						     		<?php	}
						     		?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kabupaten/Kota</label>
                            <div class="col-md-9">
                                <select name="KabupatenKotaId" id="KabupatenKotaId" class="form-control" required="required">
                                    <option value="">-- Pilih Kabupaten / Kota --</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input  type="submit" value="Simpan" class="btn btn-submitbtn-submit btn-primary">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<!-- modal -->
<div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{action('AdminController@kecamatandelete')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <input type="hidden" value="" name="KecamatanIdDel" id="KecamatanIdDel"/>
                <div class="modal-body">
                    <h4>Anda yakin akan menghapus data Kecamatan <input style="background-color: #ffffff;
                            width:100%; border:none;" readonly="true" type="text" 
                        id="KecamatanNameDel" name="KecamatanNameDel"> 
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit btn-primary">Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->

@stop()