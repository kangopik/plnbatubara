@extends('layout.admin')
@section('content')
<!-- modal confirm delete vendor -->
<div class="modal fade" id="confirmVendorModal" tabindex="-1" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <form action="{{action('AdminController@aksideletevendor')}}" method="post">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <input type="hidden" id="vendorid" name="vendorid"> 
                    <div class="modal-body">
                        <h4>Anda yakin akan menghapus data Calon Penyedia Batubara <input style="border:none;" type="text" 
                            id="namavendor" name="namavendor"> 
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal confirm delete vendor -->

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Master Calon Penyedia Batubara</h3>

        <table>
            <form action="{{action('AdminController@carivendoradmin')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <tr>
                    <td width=130>Cari Calon Penyedia Batubara</td>
                    <td width=400>
                        <div data-tip="masukan kata pencarian">
                        <input type="text" class="form-control" name="cari" 
                            id="cari" required="required">
                        </div>
                    </td>                                                
                    <td width=100 style="padding-left:10px;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Cari</button>
                    </td>
                    <td width=100 style="padding-left:10px;">
                        <input type="button" class="btn btn-primary btn-block btn-flat" 
                                onclick="location.href='<?php echo 'mastervendor' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>
        
		<table class="table table-bordered table-hover">
			<thead>
				<th width="50" style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Perusahaan</th>
				<th width="300" style="text-align:center;">Email</th>
				<th width="180" style="text-align:center;">Aksi</th>
			</thead>
			<tbody>
                <?php
                    $counter = 1;
                    foreach($data as $row){
                ?>
                    <tr>
                        <td><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td><?php echo $row->Nama ?></td>
                        <td><?php echo $row->Email ?></td>
                        <td style="text-align:center;">
                            <a href="" onclick="document.getElementById('namavendor').value='<?php echo $row->Nama ?>';
                            					document.getElementById('vendorid').value='<?php echo $row->UserId ?>';"
                                    data-toggle="modal" data-target="#confirmVendorModal">
                                    <i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                    </tr> 
                <?php $counter++; } ?>
			</tbody>
		</table>
	</div>
</div>
@stop()