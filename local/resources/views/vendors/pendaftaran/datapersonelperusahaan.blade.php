@extends('layout.vendor')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Data Personel Calon Penyedia Batubara <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?></h2>

		<!-- modal tenaga ahli --> 
		<div class="modal fade" id="personelModal" role="dialog" aria-labelledby="personelModalLabel">
            <div class="vertical-alignment-helper">
      			<div class="modal-dialog vertical-align-center" role="document">
        			<div class="modal-content">
          				<div class="modal-header">
            				<h4 class="modal-title" id="personelModalLabel">Tenaga Ahli</h4>
          				</div>
          				<div class="modal-body">
            				<form action="{{action('VendorController@savepengurusperusahaan')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
            					<table class="table table-bordered" style="border:none;">
            						<tbody>
            							<tr>
            								<td style="border:none; padding-top:15px;" width="180">Nama</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan nama tenaga ahli">
            										<input type="text" class="form-control" name="nama" id="nama" required="required">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Pendidikan</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan pendidikan tenaga ahli">
            										<input type="text" class="form-control" name="pendidikan" id="pendidikan">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Tgl. Lahir</td>
            								<td style="border:none;">
            									<div class="col-sm-5">
                                                    <div data-tip="masukan tanggal lahir tenaga ahli">
            										<input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" readonly="true">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Jabatan</td>
            								<td style="border:none;">
            									<div class="col-sm-8">
                                                    <div data-tip="masukan jabatan tenaga ahli">
            										<input type="text" class="form-control" name="jabatan" id="jabatan">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Pengalaman Kerja</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan pengalaman kerja tenaga ahli">
                                                    <textarea rows='3' class='form-control' name="pengalaman" id="pengalaman" ></textarea>
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Profesi / Keahlian</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan profesi tenaga ahli">
            										<input type="text" class="form-control" name="profesi" id="profesi">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Ijazah / Sertifikat</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan ijazah tenaga ahli">
                                                    <textarea rows='3' class='form-control' name="sertifikat" id="sertifikat" ></textarea>
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
		<!-- modal tenaga ahli --> 

        <!-- modal confirm delete tenaga ahli -->
        <div class="modal fade" id="confirmTenagaAhliModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('VendorController@deletetenagaahli')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus data Tenaga Ahli <input style="border:none;" type="text" 
                                    id="namatenagaahli" name="namatenagaahli"> 
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
        <!-- modal confirm delete tenaga ahli -->

		<div class="row">
			<div class="col-lg-12">
				<table class="table table-bordered table-hover">
					<thead>
						<th width="50" style="text-align:center;">No</th>
						<th style="text-align:center;">Nama</th>
						<th style="text-align:center;">Pendidikan</th>
						<th style="text-align:center;">Tgl. Lahir</th>
						<th style="text-align:center;">Jabatan</th>
						<th width="180" style="text-align:center;">Aksi</th>
					</thead>
					<tbody>
                        <?php if(!is_null($data)) { ?>
                        <?php
                            $counter = 1;
                            foreach($data as $row){
                        ?>
                            <tr>
                                <td><?php echo $counter ?></td>
                                <td><?php echo $row->Nama ?></td>
                                <td><?php echo $row->Pendidikan ?></td>
                                <td><?php if(!is_null($row->TglLahir)) { echo date("d-m-Y", strtotime($row->TglLahir)); } ?></td>
                                <td><?php echo $row->Jabatan ?></td>
                                <td style="text-align:center;">
                                    <a href="" onclick="document.getElementById('nama').value='<?php echo $row->Nama ?>';
                                                        document.getElementById('nama').setAttribute('readOnly','true');
                                                        document.getElementById('pendidikan').value='<?php echo $row->Pendidikan ?>';
                                                        $('#pendidikan').attr('readonly', false);
                                                        document.getElementById('tgl_lahir').value='<?php if(!is_null($row->TglLahir)) { echo date("d-m-Y", strtotime($row->TglLahir)); } ?>';
                                                        document.getElementById('jabatan').value='<?php echo $row->Jabatan ?>';
                                                        $('#jabatan').attr('readonly', false);
                                                        document.getElementById('pengalaman').value='<?php 
                                                                    $a = str_replace(array("\n","\r"), 'a', $row->PengalamanKerja);
                                                                    echo str_replace('aa','\n',$a) ?>';
                                                        $('#pengalaman').attr('readonly', false);
                                                        document.getElementById('profesi').value='<?php echo $row->ProfesiKeahlian ?>';
                                                        $('#profesi').attr('readonly', false);
                                                        document.getElementById('sertifikat').value='<?php 
                                                                    $a = str_replace(array("\n","\r"), 'a', $row->Sertifikat);
                                                                    echo str_replace('aa','\n',$a) ?>';
                                                        $('#sertifikat').attr('readonly', false);
                                                        <?php if(($row->PendidikanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('pendidikan').setAttribute('readOnly','true');
                                                        document.getElementById('pendidikan').style.background = '#eee'; 
                                                        document.getElementById('pendidikan').style.color = '#555';
                                                        <?php } else if($row->PendidikanCk=='0') { ?>
                                                        document.getElementById('pendidikan').style.background = 'red';
                                                        document.getElementById('pendidikan').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('pendidikan').style.background = '#FFF';
                                                        document.getElementById('pendidikan').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->TglLahirCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('tgl_lahir').style.background = '#eee'; 
                                                        document.getElementById('tgl_lahir').style.color = '#555';
                                                        <?php } else if($row->TglLahirCk=='0') { ?>
                                                        document.getElementById('tgl_lahir').style.background = 'red';
                                                        document.getElementById('tgl_lahir').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('tgl_lahir').style.background = '#FFF';
                                                        document.getElementById('tgl_lahir').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->JabatanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('jabatan').setAttribute('readOnly','true');
                                                        document.getElementById('jabatan').style.background = '#eee'; 
                                                        document.getElementById('jabatan').style.color = '#555';
                                                        <?php } else if($row->JabatanCk=='0') { ?>
                                                        document.getElementById('jabatan').style.background = 'red';
                                                        document.getElementById('jabatan').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('jabatan').style.background = '#FFF';
                                                        document.getElementById('jabatan').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->PengalamanKerjaCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('pengalaman').setAttribute('readOnly','true');
                                                        document.getElementById('pengalaman').style.background = '#eee'; 
                                                        document.getElementById('pengalaman').style.color = '#555';
                                                        <?php } else if($row->PengalamanKerjaCk=='0') { ?>
                                                        document.getElementById('pengalaman').style.background = 'red';
                                                        document.getElementById('pengalaman').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('pengalaman').style.background = '#FFF';
                                                        document.getElementById('pengalaman').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->ProfesiKeahlianCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('profesi').setAttribute('readOnly','true');
                                                        document.getElementById('profesi').style.background = '#eee'; 
                                                        document.getElementById('profesi').style.color = '#555';
                                                        <?php } else if($row->ProfesiKeahlianCk=='0') { ?>
                                                        document.getElementById('profesi').style.background = 'red';
                                                        document.getElementById('profesi').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('profesi').style.background = '#FFF';
                                                        document.getElementById('profesi').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->SertifikatCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('sertifikat').setAttribute('readOnly','true');
                                                        document.getElementById('sertifikat').style.background = '#eee'; 
                                                        document.getElementById('sertifikat').style.color = '#555';
                                                        <?php } else if($row->SertifikatCk=='0') { ?>
                                                        document.getElementById('sertifikat').style.background = 'red';
                                                        document.getElementById('sertifikat').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('sertifikat').style.background = '#FFF';
                                                        document.getElementById('sertifikat').style.color = '#555';
                                                        <?php } ?>" 
                                        data-toggle="modal" data-target="#personelModal">
                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                    <a href="" onclick="document.getElementById('namatenagaahli').value='<?php echo $row->Nama ?>';"
                                            data-toggle="modal" data-target="#confirmTenagaAhliModal">
                                            <i class="fa fa-trash-o"></i> Hapus</a>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                        <?php } ?>
					</tbody>
				</table>
                <?php if(!is_null($dataHasil)) { ?>
                <?php  if($dataHasil->PersetujuanVerifikasi<>'Y' || $dataHasil->Status==2) { ?>
				<input type="button" value="Tambah Personel" class="btn btn-submit  btn-primary" 
                    data-toggle="modal" data-target="#personelModal"
                    onclick="document.getElementById('nama').value='';
                            $('#nama').attr('readonly', false);
                            document.getElementById('nama').focus();
                            document.getElementById('pendidikan').value='';
                            $('#pendidikan').attr('readonly', false);
                            document.getElementById('tgl_lahir').value='';
                            document.getElementById('tgl_lahir').style.background = '#FFF';
                            document.getElementById('tgl_lahir').style.color = '#555';
                            document.getElementById('jabatan').value='';
                            $('#jabatan').attr('readonly', false);
                            document.getElementById('pengalaman').value='';
                            $('#pengalaman').attr('readonly', false);
                            document.getElementById('profesi').value='';
                            $('#profesi').attr('readonly', false);
                            document.getElementById('sertifikat').value='';
                            $('#sertifikat').attr('readonly', false);" >
                <?php } ?>
                <?php } else { ?>
                <input type="button" value="Tambah Personel" class="btn btn-submit  btn-primary" 
                    data-toggle="modal" data-target="#personelModal"
                    onclick="document.getElementById('nama').value='';
                            $('#nama').attr('readonly', false);
                            document.getElementById('nama').focus();
                            document.getElementById('pendidikan').value='';
                            $('#pendidikan').attr('readonly', false);
                            document.getElementById('tgl_lahir').value='';
                            document.getElementById('tgl_lahir').style.background = '#FFF';
                            document.getElementById('tgl_lahir').style.color = '#555';
                            document.getElementById('jabatan').value='';
                            $('#jabatan').attr('readonly', false);
                            document.getElementById('pengalaman').value='';
                            $('#pengalaman').attr('readonly', false);
                            document.getElementById('profesi').value='';
                            $('#profesi').attr('readonly', false);
                            document.getElementById('sertifikat').value='';
                            $('#sertifikat').attr('readonly', false);" >
                <?php } ?>
			</div>
		</div>

        <table align=center>
            <tr align=center>
                <td align=center>
                    <?php  if($dataHasil->PersetujuanVerifikasi<>'Y' || $dataHasil->Status==2) { ?>
                    <br />
                    <a href="<?php echo 'legalitasperijinanperusahaan' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                    <a href="<?php echo 'datakeuangan' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                    <?php } ?>
                </td>
            </tr>
        </table>

	</div>
</div>

<script>
    $("#btnnext").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()