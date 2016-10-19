@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">DAFTAR CALON PENYEDIA TERSELEKSI(DCPT Batubara)</h2>
        <div class="panel-body">
	        <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh</button> 
	        <br/>
	        <br/>
	        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                    <th style="text-align:center;">Nama DCPT</th>
	                    <th style="width:60px; text-align:center;">Jenis Ijin</th>
	                    <th style="text-align:center;">Alamat</th>
	                    <th style="width:150px; text-align:center;">Provinsi</th>
	                    <th style="width:100px; text-align:center;">Kap. Terpasang</th>
                        <th style="width:120px; text-align:center;">Realisasi Th. Lalu</th>
                        <th style="width:80px; text-align:center;">CV(ar)</th>
                        <th style="width:60px; text-align:center;">Aksi</th>
                        <th style="width:60px; text-align:center;"></th>
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
        ajax: '{{ url("dcptlist") }}',
        orderMulti: true,
        columns: [
            {data: 'Nama', name: 'Nama', orderable: true, searchable: true },
            {data: 'JenisIjin', name: 'JenisIjin', orderable: true, searchable: false },            
            {data: 'Alamat', name: 'Alamat', orderable: true, searchable: true },
            {data: 'ProvinsiName', name: 'ProvinsiName', orderable: true, searchable: true},
            {data: 'KapasitasProduksi', name: 'KapasitasProduksi', orderable: true, searchable: true},
            {data: 'RealisasiTargetTahun', name: 'RealisasiTargetTahun', orderable: true, searchable: true},
            {data: 'CV', name: 'CV', orderable: true, searchable: true},
            {data: 'actionViewSpek', name: 'actionViewSpek', orderable: false, searchable: false},
            {data: 'actionViewAll', name: 'actionViewAll', orderable: false, searchable: false}
        ]
    });
});

function reload_table()
{
    table.ajax.reload(null,false);
}
</script>
@stop()