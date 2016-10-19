@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Calori</h2>
        <div class="panel-body">
		    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_form"
	                        onclick="document.getElementById('idCalori').value='';
	                        document.getElementById('values').value='';
	                        document.getElementById('values').focus();"><i class="glyphicon glyphicon-plus"></i> Tambah Calori</button>
	        <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh</button> 
	        <br/>
	        <br/>
	        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                    <th style="text-align:center;">Calori</th>
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
        ajax: '{{ url("mastercalorilist") }}',
        columns: [
            {data: 'values', name: 'values' },
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
    $('#idCalori').val(mySplitResult[0]);
    $('#values').val(mySplitResult[1]);
}

function deletes(id)
{
    var mySplitResult = id.split("/");
    $('#idCaloriDel').val(mySplitResult[0]);
    $('#valuesDel').val(mySplitResult[1]);
}

</script>

<!-- modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Calori</h3>
            </div>
            <div class="modal-body form">
                <form action="{{action('AdminController@mastercalorisave')}}" id="form" method="post">
                    <input type="hidden" value="" name="idCalori" id="idCalori"/>
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Calori</label>
                            <div class="col-md-9">
                                <input name="values" id="values" placeholder="calori" class="form-control" type="number" required="required">
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
            <form action="{{action('AdminController@mastercaloridelete')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <input type="hidden" value="" name="idCaloriDel" id="idCaloriDel"/>
                <div class="modal-body">
                    <h4>Anda yakin akan menghapus data Calori <input style="background-color: #ffffff;
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