@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#values').mask("#.##0,00", {reverse: true});
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Brand Calori</h2>
        <div class="panel-body">
		    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_form"
	                        onclick="document.getElementById('idDetailCalori').value='';
	                        document.getElementById('calori_id').value='';
	                        document.getElementById('spesifikasi').value='';
	                        document.getElementById('values').value='';
	                        document.getElementById('filter').value='';
	                        document.getElementById('calori_id').focus();"><i class="glyphicon glyphicon-plus"></i> Tambah Brand Calori</button>
	        <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh</button> 
	        <br/>
	        <br/>
	        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                    <th style="text-align:center;">Calori</th>
	                    <th style="text-align:center;">Spesifikasi</th>
	                    <th style="text-align:center;">Value</th>
	                    <th style="text-align:center;">Filter</th>
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
        ajax: '{{ url("masterdetailcalorilist") }}',
        columns: [
        	{data: 'namaCalori', name: 'namaCalori' },
            {data: 'spesifikasi', name: 'spesifikasi' },
            {data: 'values', name: 'values' },
            {data: 'filter', name: 'filter' },
            {data: 'actionEdit', name: 'actionEdit', orderable: false, searchable: false},
            {data: 'actionDelete', name: 'actionDelete', orderable: false, searchable: false}
        ]
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
    $('#idDetailCalori').val(mySplitResult[0]);
    $('#calori_id').val(mySplitResult[1]);
    $('#spesifikasi').val(mySplitResult[2]);
    $('#values').val(mySplitResult[3]);
    $('#filter').val(mySplitResult[4]);
}

function deletes(id)
{
    var mySplitResult = id.split("/");
    $('#idDetailCaloriDel').val(mySplitResult[0]);
    $('#valuesDel').val(mySplitResult[1]);
}

</script>

<!-- modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kabupaten / Kota</h3>
            </div>
            <div class="modal-body form">
                <form action="{{action('AdminController@mastercaloridetailsave')}}" id="form" method="post">
                    <input type="hidden" value="" name="idDetailCalori" id="idDetailCalori"/>
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Calori</label>
                        <div class="col-md-9">
                            <select name="calori_id" id="calori_id" class="form-control" required="required">
                                <option value="">-- Pilih Brand Calori --</option>
                                <?php
					     			foreach($data as $r){ ?>
					     				<option value="<?= $r->idCalori; ?>"><?= $r->values ?></option>
					     		<?php	}
					     		?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Spesifikasi</label>
                            <div class="col-md-9">
                                <select name='spesifikasi' id='spesifikasi' class='form-control' required="required">
                                    <option value="" selected>- Pilih Spesifikasi -</option> 
                                    <option value="TM">TM</option>
                                    <option value="IM">IM</option>
                                    <option value="ASH">ASH</option>
                                    <option value="VM">VM</option>
                                    <option value="FC">FC</option>
                                    <option value="TS">TS</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Value</label>
                            <div class="col-md-9">
                                <input type='text' class='form-control' name="values" id="values" 
                                                        onkeypress="return isDecimal(event)"></input>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Filter</label>
                            <div class="col-md-9">
                                <select name='filter' id='filter' class='form-control' required="required">
                                    <option value="" selected>- Pilih Filter -</option> 
                                    <option value="*">*</option>
                                    <option value="<"><</option>
                                    <option value=">">></option>
                                    <option value="<>"><></option>
                                    <option value="<="><=</option>
                                    <option value=">=">>=</option>
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
            <form action="{{action('AdminController@mastercaloridetaildelete')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <input type="hidden" value="" name="idDetailCaloriDel" id="idDetailCaloriDel"/>
                <div class="modal-body">
                    <h4>Anda yakin akan menghapus data Brand Calori <input style="background-color: #ffffff;
                            width:100%; border:none;" readonly="true" type="text" 
                        id="valuesDel" name="valuesDel"> 
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