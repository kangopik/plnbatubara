@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Notifikasi</h2>
        <div class="panel-body">
	        <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh</button> 
	        <br/>
	        <br/>
	        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                    <th style="width:100px; text-align:center;">Pengirim</th>
	                    <th style="text-align:center;">Pesan</th>
	                    <th style="width:100px; text-align:center;">Tanggal</th>
	                    <th style="width:100px; text-align:center;">Detail</th>
	                    <th style="width:100px; text-align:center;">Hapus</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{action('AdminController@deletenotifikasi')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <input type="hidden" value="" name="MessageIdDel" id="MessageIdDel"/>
                <div class="modal-body">
                    <h4>Anda yakin akan menghapus notifikasi ini ?</h4>
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

<!-- modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Notifikasi</h3>
            </div>
            <div class="modal-body form">
                <div class="form-body">
                    <div class="form-group">
                    	<div id="msg">
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<script type="text/javascript">

var table;

$(document).ready(function() {
    table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("notifikasilist") }}',
        orderMulti: true,
        columns: [
            {data: 'Nama', name: 'Nama', orderable: true,},
            {data: 'MessageHeader', name: 'MessageHeader', orderable: true, },
            {data: 'MessageTime', name: 'MessageTime', orderable: true, },
            {data: 'actionDetail', name: 'actionDetail', orderable: false, searchable: false},
            {data: 'actionDelete', name: 'actionDelete', orderable: false, searchable: false}
        ]
    });
});

function reload_table()
{
    table.ajax.reload(null,false);
}

function detail($ms){
	$('#msg').empty();
	$('#msg').html($ms);
}

function deletes(id)
{
    $('#MessageIdDel').val(id);
}

</script>
@stop()