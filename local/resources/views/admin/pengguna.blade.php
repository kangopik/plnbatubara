@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Master Pengguna</h2>

        <table>
            <form action="{{action('AdminController@caripenggunaadmin')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <tr>
                    <td width=130>Cari Pengguna</td>
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
                                onclick="location.href='<?php echo 'masteradmin' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>

        <!-- modal --> 
        <div class="modal fade" id="penggunaModal" tabindex="-1" role="dialog" aria-labelledby="penggunaModalLabel">
        	<div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="penggunaModalLabel">Pengguna</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('AdminController@aksisavepengguna')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                    <tr>
                                    	<input type="hidden" id="admid" name="admid">
        								<td style="border:none; padding-top:15px;" width="100">Nama</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan nama pengguna">
        										<input type="text" class="form-control" name="nama" id="nama" required="required">
                                            </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">Username</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan username">
        										<input type="text" class="form-control" name="username" id="username" required="required">
                                            </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">Password</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan password">
        										<input type="password" class="form-control" name="password" id="password" required="required">
                                                <div>
        									</div>
        								</td>
        							</tr>
                                    <tr>
                                        <td style="border:none; padding-top:15px;">E-mail</td>
                                        <td style="border:none;">
                                            <div class="col-sm-12">
                                                <div data-tip="masukan email pengguna">
                                                <input type="text" class="form-control" name="email" id="email" required="required">
                                                <div>
                                            </div>
                                        </td>
                                    </tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">Hak Akses</td>
        								<td style="border:none;">
        									<div class='col-sm-12'>
                                                <div data-tip="pilih hak akses pengguna">
												<select name='hakakses' id="hakakses" class='form-control' required="required">
													<option value="">- Pilih Hak Akses -</option>
													<option value="1">Admin</option>
													<option value="2">Pejabat</option>
													<option value="3">Legal Verificator</option>
                                                    <option value="5">Manager</option>
                                                    <option value="6">Finance Verificator</option>
                                                    <option value="7">Technical Verificator</option>
												</select>
                                            </div>
											</div>
        								</td>
        							</tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                <input  type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        	</div>
        </div>
        <!-- modal -->

        <!-- modal confirm delete pengguna -->
        <div class="modal fade" id="confirmPenggunaModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('AdminController@aksideletepengguna')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" id="admid2" name="admid2"> 
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus data Pengguna <input style="border:none;" type="text" 
                                    id="namapengguna" name="namapengguna"> 
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
        <!-- modal confirm delete pengguna -->

		<table class="table table-bordered table-hover">
			<thead>
				<th width="50" style="text-align:center;">No</th>
				<th style="text-align:center;">Nama Pengguna</th>
				<th style="text-align:center;">Hak Akses</th>
				<th width="180" style="text-align:center;">Aksi</th>
			</thead>
			<tbody>
                <?php
                    $counter = 1;
                    foreach($data as $row){
                ?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $row->Nama ?></td>
                        <td><?php echo $row->UserLevelName ?></td>
                        <td style="text-align:center;">
                            <a href="" onclick="document.getElementById('nama').value='<?php echo $row->Nama ?>';
                                                document.getElementById('nama').setAttribute('readOnly','true');
                                                document.getElementById('username').value='<?php echo $row->Username ?>';
                                                document.getElementById('admid').value='<?php echo $row->UserId ?>'
					                            document.getElementById('password').value='<?php echo $row->Password ?>';
					                            document.getElementById('password').setAttribute('readOnly','true');
                                                document.getElementById('email').value='<?php echo $row->EmailUser ?>';
					                            $('#hakakses option').filter(function() {
        											return $(this).attr('value') == <?php echo $row->uli ?>;
    											}).attr('selected', true);" 
                                data-toggle="modal" data-target="#penggunaModal">
                                <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                            <a href="" onclick="document.getElementById('admid2').value='<?php echo $row->UserId ?>';
                            					document.getElementById('namapengguna').value='<?php echo $row->Nama ?>'"
                                    data-toggle="modal" data-target="#confirmPenggunaModal">
                                    <i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                    </tr> 
                <?php $counter++; } ?>
			</tbody>
		</table>        
		<input type="button" value="Tambah Pengguna" class="btn btn-submit  btn-primary" 
                    data-toggle="modal" data-target="#penggunaModal"
                    onclick="document.getElementById('nama').value='';
                            $('#nama').attr('readonly', false);
                            document.getElementById('nama').focus();
                            document.getElementById('username').value='';
                            $('#username').attr('readonly', false);
                            document.getElementById('password').value='';
                            $('#password').attr('readonly', false);
                            document.getElementById('hakakses').value='';" >
    </div>
</div>
@stop()