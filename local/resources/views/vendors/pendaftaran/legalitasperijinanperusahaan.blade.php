@extends('layout.vendor')
@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Legalitas Perijinan Calon Penyedia Batubara <?php echo $data2->Nama.', '.$data2->BadanUsaha; ?></h2>

        <form action="{{action('VendorController@savelegalitasperijinanperusahaan')}}" method="post">
			<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
			<table class="table table-bordered">
				<tbody>	
				<tr class="success">
					<th colspan="6">Akta Pendirian Perusahaan / Anggaran Dasar</th>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" width="170">Nomor Akta *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan nomor akta pendirian perusahaan">
							<input type='text' class='form-control' name="nomor_akta" id="nomor_akta" value="{{$data->NomorAkta}}" required="required"
								<?php if(($data->NomorAktaCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
								<?php }else if ($data->NomorAktaCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
							></input>
						</div>
						</div>
					</td>
					<td style="border:none; border-top:none;" style="text-align: right;">Tanggal Akta *)</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>			
							<div data-tip="masukan tanggal akta pendirian perusahaan">					
							<input type='text' class='form-control' name="tgl_akta" id="tgl_akta" readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalAkta)) { echo date("d-m-Y", strtotime($data->TanggalAkta)); } ?>"
								<?php if(($data->TanggalAktaCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> 
									readonly="true" >
								<?php echo "<script type='text/javascript'>$('#tgl_akta').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>  
								<?php }else if ($data->TanggalAktaCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
								style="background:#fff; color:555;">
								<?php } ?>
							</input>
						</div>
						</div>
					</td>
				</tr>				
				<tr>
					<td style="border:none; border-top:none;" >Nama Notaris *)</td>
					<td style="border:none; border-top:none;" colspan="6">
						<div class='col-sm-6'>
							<div data-tip="masukan nama notaris akta pendirian perusahaan">
							<input type='text' class='form-control' name="nama_notaris" id="nama_notaris" value="{{$data->NamaNotaris}}" required="required"
								<?php if(($data->NamaNotarisCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
								<?php }else if ($data->NamaNotarisCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
							></input>
						</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" colspan="7"><b>SK Kemenhumkam / Pengesahan Pengadilan / Kementrian Koperasi</b></td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" colspan="2">Nomor SK *)</td>
					<td style="border:none; border-top:none;" >
						<div class='col-sm-12'>
							<div data-tip="masukan nomor SK">
							<input type='text' class='form-control' name="no_pengesahan1" id="no_pengesahan1" value="{{$data->NomorPengesahanKemenhumkam}}" required="required"
								<?php if(($data->NomorPengesahanKemenhumkamCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
								<?php }else if ($data->NomorPengesahanKemenhumkamCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
							></input>
						</div>
						</div>
					</td>
					<td style="border:none; border-top:none;" style="text-align: right;">Tanggal SK *)</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>					
							<div data-tip="masukan tanggal sk">
							<input type='text' class='form-control' name="tgl_pengesahan1" readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalPengesahanKemenhumkam)) { echo date("d-m-Y", strtotime($data->TanggalPengesahanKemenhumkam)); } ?>" id="tgl_pengesahan1"
									<?php if(($data->TanggalPengesahanKemenhumkamCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
								<?php echo "<script type='text/javascript'>$('#tgl_pengesahan').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?> 
								<?php }else if ($data->TanggalPengesahanKemenhumkamCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
								style="background:#fff; color:555;">
								<?php } ?>
							</input>
						</div>
					</td>
				</tr>
				<tr id="akta1">
					<td colspan="6" style="border-top:none;">
						<div class="row">
							<div class="col-lg-12">
								<h5><b>Susunan Pemegang Saham</b></h5>
								<table class="table table-bordered table-hover">
									<thead>
										<th width="50" style="text-align:center;">No</th>
				                        <th width="400" style="text-align:center;">Nama</th>
				                        <th width="200" style="text-align:center;">No. KTP</th>
				                        <!-- <th width="250" style="text-align:center;">Jabatan</th> -->
				                        <th width="180" style="text-align:center;">Aksi</th>
									</thead>
									<tbody>
										<?php if(!is_null($datakomisaris)) { ?>
				                        <?php
				                            $counter = 1;
				                            foreach($datakomisaris as $row){
				                        ?>
				                            <tr>
				                                <td><?php echo $counter ?></td>
				                                <td><?php echo $row->Nama ?></td>
				                                <td><?php echo $row->NoKTP ?></td>
				                                <!-- <td><?php //echo $row->Jabatan ?></td> -->
				                                <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
				                                <td style="text-align:center;">
				                                    <a href="" onclick="document.getElementById('nama_komisaris').value='<?php echo $row->Nama ?>';
				                                                        document.getElementById('nama_komisaris').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_komisaris').value='<?php echo $row->NoKTP ?>';
				                                                        $('#ktp_komisaris').attr('readonly', false);
				                                                        document.getElementById('jabatan_komisaris').value='<?php echo $row->Jabatan ?>';
				                                                        $('#jabatan_komisaris').attr('readonly', false);
				                                                        <?php if(($row->NoKTPCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('ktp_komisaris').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_komisaris').style.background = '#eee'; 
				                                                        document.getElementById('ktp_komisaris').style.color = '#555';
				                                                        <?php } else if($row->NoKTPCk=='0') { ?>
				                                                        document.getElementById('ktp_komisaris').style.background = 'red';
				                                                        document.getElementById('ktp_komisaris').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('ktp_komisaris').style.background = '#FFF';
				                                                        document.getElementById('ktp_komisaris').style.color = '#555';
				                                                        <?php } ?>
				                                                        <?php if(($row->JabatanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('jabatan_komisaris').setAttribute('readOnly','true');
				                                                        document.getElementById('jabatan_komisaris').style.background = '#eee'; 
				                                                        document.getElementById('jabatan_komisaris').style.color = '#555';
				                                                        <?php } else if($row->JabatanCk=='0') { ?>
				                                                        document.getElementById('jabatan_komisaris').style.background = 'red';
				                                                        document.getElementById('jabatan_komisaris').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('jabatan_komisaris').style.background = '#FFF';
				                                                        document.getElementById('jabatan_komisaris').style.color = '#555';
				                                                        <?php } ?>
				                                                        $('#nomor_akta_1').val($('#nomor_akta').val());
																		$('#tgl_akta_1').val($('#tgl_akta').val());
																		$('#nama_notaris_1').val($('#nama_notaris').val());
																		$('#no_pengesahan1_1').val($('#no_pengesahan1').val());
																		$('#tgl_pengesahan1_1').val($('#tgl_pengesahan1').val());
																		$('#nomor_akta_perubahan_1').val($('#nomor_akta_perubahan').val());
																		$('#tgl_akta_perubahan_1').val($('#tgl_akta_perubahan').val());
																		$('#nama_notaris_perubahan_1').val($('#nama_notaris_perubahan').val());
																		$('#no_pengesahan2_1').val($('#no_pengesahan2').val());
																		$('#tgl_pengesahan2_1').val($('#tgl_pengesahan2').val());
																		$('#penerbit_siup_1').val($('#penerbit_siup').val());
																		$('#no_siup_1').val($('#no_siup').val());
																		$('#tgl_siup_1').val($('#tgl_siup').val());
																		$('#tglsd_siup_1').val($('#tglsd_siup').val());
																		$('#penerbit_tdp_1').val($('#penerbit_tdp').val());
																		$('#no_tdp_1').val($('#no_tdp').val());
																		$('#tgl_tdp_1').val($('#tgl_tdp').val());
																		$('#tglsd_tdp_1').val($('#tglsd_tdp').val());
																		$('#penerbit_skdp_1').val($('#penerbit_skdp').val());
																		$('#no_skdp_1').val($('#no_skdp').val());
																		$('#tgl_skdp_1').val($('#tgl_skdp').val());
																		$('#tglsd_skdp_1').val($('#tglsd_skdp').val());" 
				                                        data-toggle="modal" data-target="#komisarisModal1">
				                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
				                                    <a href=""  onclick="document.getElementById('namakomisaris').value='<?php echo $row->Nama ?>';"
				                                        data-toggle="modal" data-target="#confirmKomisarisModal1">
				                                        <i class="fa fa-trash-o"></i> Hapus</a>
				                                </td>
				                                <?php } ?>
				                            </tr> 
				                        <?php $counter++; } ?>
				                        <?php } ?>
									</tbody>
								</table>
								<?php if(!is_null($data)) { ?>
					            <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
								<input type="button" value="Tambah Pemegang Saham" class="btn btn-submit  btn-primary" 
					                    data-toggle="modal" data-target="#komisarisModal1"
					                    onclick="document.getElementById('nama_komisaris').value='';
					                    $('#nama_komisaris').attr('readonly', false);
					                    document.getElementById('nama_komisaris').focus();
					                    document.getElementById('ktp_komisaris').value='';
					                    $('#ktp_komisaris').attr('readonly', false);
					                    document.getElementById('jabatan_komisaris').value='';
					                    $('#jabatan_komisaris').attr('readonly', false);
					                    $('#nomor_akta_1').val($('#nomor_akta').val());
										$('#tgl_akta_1').val($('#tgl_akta').val());
										$('#nama_notaris_1').val($('#nama_notaris').val());
										$('#no_pengesahan1_1').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_1').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_1').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_1').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_1').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_1').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_1').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_1').val($('#penerbit_siup').val());
										$('#no_siup_1').val($('#no_siup').val());
										$('#tgl_siup_1').val($('#tgl_siup').val());
										$('#tglsd_siup_1').val($('#tglsd_siup').val());
										$('#penerbit_tdp_1').val($('#penerbit_tdp').val());
										$('#no_tdp_1').val($('#no_tdp').val());
										$('#tgl_tdp_1').val($('#tgl_tdp').val());
										$('#tglsd_tdp_1').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_1').val($('#penerbit_skdp').val());
										$('#no_skdp_1').val($('#no_skdp').val());
										$('#tgl_skdp_1').val($('#tgl_skdp').val());
										$('#tglsd_skdp_1').val($('#tglsd_skdp').val());" >
					            <?php } ?>
					            <?php }else { ?>
					            <input type="button" value="Tambah Pemegang Saham" class="btn btn-submit  btn-primary" 
					                    data-toggle="modal" data-target="#komisarisModal1"
					                    onclick="document.getElementById('nama_komisaris').value='';
					                    $('#nama_komisaris').attr('readonly', false);
					                    document.getElementById('nama_komisaris').focus();
					                    document.getElementById('ktp_komisaris').value='';
					                    $('#ktp_komisaris').attr('readonly', false);
					                    document.getElementById('jabatan_komisaris').value='';
					                    $('#jabatan_komisaris').attr('readonly', false);$('#nomor_akta_1').val($('#nomor_akta').val());
										$('#tgl_akta_1').val($('#tgl_akta').val());
										$('#nama_notaris_1').val($('#nama_notaris').val());
										$('#no_pengesahan1_1').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_1').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_1').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_1').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_1').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_1').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_1').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_1').val($('#penerbit_siup').val());
										$('#no_siup_1').val($('#no_siup').val());
										$('#tgl_siup_1').val($('#tgl_siup').val());
										$('#tglsd_siup_1').val($('#tglsd_siup').val());
										$('#penerbit_tdp_1').val($('#penerbit_tdp').val());
										$('#no_tdp_1').val($('#no_tdp').val());
										$('#tgl_tdp_1').val($('#tgl_tdp').val());
										$('#tglsd_tdp_1').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_1').val($('#penerbit_skdp').val());
										$('#no_skdp_1').val($('#no_skdp').val());
										$('#tgl_skdp_1').val($('#tgl_skdp').val());
										$('#tglsd_skdp_1').val($('#tglsd_skdp').val());" >
					            <?php } ?>
					            <br /><br />
								<h5><b>Susunan Pengurus Perusahaan</b></h5>
								<table class="table table-bordered table-hover">
				                    <thead>
				                        <th width="50" style="text-align:center;">No</th>
				                        <th width="400" style="text-align:center;">Nama</th>
				                        <th width="200" style="text-align:center;">No. KTP</th>
				                        <th width="250" style="text-align:center;">Jabatan</th>
				                        <th width="180" style="text-align:center;">Aksi</th>
				                    </thead>
				                    <tbody>
				                        <?php if(!is_null($datadireksi)) { ?>
				                        <?php
				                            $counter = 1;
				                            foreach($datadireksi as $row){
				                        ?>
				                            <tr>
				                                <td><?php echo $counter ?></td>
				                                <td><?php echo $row->Nama ?></td>
				                                <td><?php echo $row->NoKTP ?></td>
				                                <td><?php echo $row->Jabatan ?></td>
				                                <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
				                                <td style="text-align:center;">
				                                    <a href="" onclick="document.getElementById('nama_direksi').value='<?php echo $row->Nama ?>';
				                                                        document.getElementById('nama_direksi').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_direksi').value='<?php echo $row->NoKTP ?>';
				                                                        $('#ktp_direksi').attr('readonly', false);
				                                                        document.getElementById('jabatan_direksi').value='<?php echo $row->Jabatan ?>';
				                                                        $('#jabatan_direksi').attr('readonly', false);
				                                                        <?php if(($row->NoKTPCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('ktp_direksi').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_direksi').style.background = '#eee'; 
				                                                        document.getElementById('ktp_direksi').style.color = '#555';
				                                                        <?php } else if($row->NoKTPCk=='0') { ?>
				                                                        document.getElementById('ktp_direksi').style.background = 'red';
				                                                        document.getElementById('ktp_direksi').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('ktp_direksi').style.background = '#FFF';
				                                                        document.getElementById('ktp_direksi').style.color = '#555';
				                                                        <?php } ?>
				                                                        <?php if(($row->JabatanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('jabatan_direksi').setAttribute('readOnly','true');
				                                                        document.getElementById('jabatan_direksi').style.background = '#eee'; 
				                                                        document.getElementById('jabatan_direksi').style.color = '#555';
				                                                        <?php } else if($row->JabatanCk=='0') { ?>
				                                                        document.getElementById('jabatan_direksi').style.background = 'red';
				                                                        document.getElementById('jabatan_direksi').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('jabatan_direksi').style.background = '#FFF';
				                                                        document.getElementById('jabatan_direksi').style.color = '#555';
				                                                        <?php } ?>$('#nomor_akta_2').val($('#nomor_akta').val());
																		$('#tgl_akta_2').val($('#tgl_akta').val());
																		$('#nama_notaris_2').val($('#nama_notaris').val());
																		$('#no_pengesahan1_2').val($('#no_pengesahan1').val());
																		$('#tgl_pengesahan1_2').val($('#tgl_pengesahan1').val());
																		$('#nomor_akta_perubahan_2').val($('#nomor_akta_perubahan').val());
																		$('#tgl_akta_perubahan_2').val($('#tgl_akta_perubahan').val());
																		$('#nama_notaris_perubahan_2').val($('#nama_notaris_perubahan').val());
																		$('#no_pengesahan2_2').val($('#no_pengesahan2').val());
																		$('#tgl_pengesahan2_2').val($('#tgl_pengesahan2').val());
																		$('#penerbit_siup_2').val($('#penerbit_siup').val());
																		$('#no_siup_2').val($('#no_siup').val());
																		$('#tgl_siup_2').val($('#tgl_siup').val());
																		$('#tglsd_siup_2').val($('#tglsd_siup').val());
																		$('#penerbit_tdp_2').val($('#penerbit_tdp').val());
																		$('#no_tdp_2').val($('#no_tdp').val());
																		$('#tgl_tdp_2').val($('#tgl_tdp').val());
																		$('#tglsd_tdp_2').val($('#tglsd_tdp').val());
																		$('#penerbit_skdp_2').val($('#penerbit_skdp').val());
																		$('#no_skdp_2').val($('#no_skdp').val());
																		$('#tgl_skdp_2').val($('#tgl_skdp').val());
																		$('#tglsd_skdp_2').val($('#tglsd_skdp').val());"
				                                        data-toggle="modal" data-target="#direksiModal1">
				                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
				                                    <a href="" onclick="document.getElementById('namadireksi').value='<?php echo $row->Nama ?>';"
				                                        data-toggle="modal" data-target="#confirmDireksiModal1">
				                                        <i class="fa fa-trash-o"></i> Hapus</a>
				                                </td>
				                                <?php } ?>
				                            </tr> 
				                        <?php $counter++; } ?>
				                        <?php } ?>
				                    </tbody>				                    
				                </table>
				                <?php if(!is_null($data)) { ?>
				                <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
				                <input type="button" value="Tambah Pengurus Perusahaan" class="btn btn-submit  btn-primary" 
				                        data-toggle="modal" data-target="#direksiModal1"
				                        onclick="document.getElementById('nama_direksi').value='';
				                        $('#nama_direksi').attr('readonly', false);
				                        document.getElementById('nama_direksi').focus();
				                        document.getElementById('ktp_direksi').value='';
				                        $('#ktp_direksi').attr('readonly', false);
				                        document.getElementById('jabatan_direksi').value='';
				                        $('#jabatan_direksi').attr('readonly', false);$('#nomor_akta_2').val($('#nomor_akta').val());
										$('#tgl_akta_2').val($('#tgl_akta').val());
										$('#nama_notaris_2').val($('#nama_notaris').val());
										$('#no_pengesahan1_2').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_2').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_2').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_2').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_2').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_2').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_2').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_2').val($('#penerbit_siup').val());
										$('#no_siup_2').val($('#no_siup').val());
										$('#tgl_siup_2').val($('#tgl_siup').val());
										$('#tglsd_siup_2').val($('#tglsd_siup').val());
										$('#penerbit_tdp_2').val($('#penerbit_tdp').val());
										$('#no_tdp_2').val($('#no_tdp').val());
										$('#tgl_tdp_2').val($('#tgl_tdp').val());
										$('#tglsd_tdp_2').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_2').val($('#penerbit_skdp').val());
										$('#no_skdp_2').val($('#no_skdp').val());
										$('#tgl_skdp_2').val($('#tgl_skdp').val());
										$('#tglsd_skdp_2').val($('#tglsd_skdp').val());">
				                <?php } ?>
				                <?php }else { ?>
				                <input type="button" value="Tambah Pengurus Perusahaan" class="btn btn-submit  btn-primary" 
				                        data-toggle="modal" data-target="#direksiModal1"
				                        onclick="document.getElementById('nama_direksi').value='';
				                        $('#nama_direksi').attr('readonly', false);
				                        document.getElementById('nama_direksi').focus();
				                        $('#ktp_direksi').attr('readonly', false);
				                        document.getElementById('jabatan_direksi').value='';
				                        $('#jabatan_direksi').attr('readonly', false);$('#nomor_akta_2').val($('#nomor_akta').val());
										$('#tgl_akta_2').val($('#tgl_akta').val());
										$('#nama_notaris_2').val($('#nama_notaris').val());
										$('#no_pengesahan1_2').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_2').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_2').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_2').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_2').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_2').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_2').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_2').val($('#penerbit_siup').val());
										$('#no_siup_2').val($('#no_siup').val());
										$('#tgl_siup_2').val($('#tgl_siup').val());
										$('#tglsd_siup_2').val($('#tglsd_siup').val());
										$('#penerbit_tdp_2').val($('#penerbit_tdp').val());
										$('#no_tdp_2').val($('#no_tdp').val());
										$('#tgl_tdp_2').val($('#tgl_tdp').val());
										$('#tglsd_tdp_2').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_2').val($('#penerbit_skdp').val());
										$('#no_skdp_2').val($('#no_skdp').val());
										$('#tgl_skdp_2').val($('#tgl_skdp').val());
										$('#tglsd_skdp_2').val($('#tglsd_skdp').val());">
				                <?php } ?>
				                <br />
							</div>
						</div>
					</td>
				</tr>
				<tr class="success">
					<th colspan="6">Akta Perubahan Anggaran Dasar Terakhir</th>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" >Nomor Akta Perubahan</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan nomor akta perubahan pendirian perusahaan">
							<input type='text' class='form-control' name="nomor_akta_perubahan" id="nomor_akta_perubahan" value="{{$data->NomorAktaPerubahan}}"
								<?php if(($data->NomorAktaPerubahanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
								<?php }else if ($data->NomorAktaPerubahanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
							</input>
						</div>
						</div>
					</td>
					<td style="border:none; border-top:none;" style="text-align: right;">Tanggal Akta</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal akta perubahan pendirian perusahaan">				
							<input type='text' class='form-control' name="tgl_akta_perubahan" id="tgl_akta_perubahan" readonly="true"
								value="<?php if(!is_null($data->TanggalAktaPerubahan)) { echo date("d-m-Y", strtotime($data->TanggalAktaPerubahan)); } ?>" 
									<?php if(($data->TanggalAktaPerubahanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
								<?php echo "<script type='text/javascript'>$('#tgl_akta_perubahan').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>  
								<?php }else if ($data->TanggalAktaPerubahanCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
								style="background:#fff; color:555;">
								<?php } ?>
								</input>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" >Nama Notaris</td>
					<td style="border:none; border-top:none;" colspan="6">
						<div class='col-sm-6'>
							<div data-tip="masukan nama notaris akta perubahan perusahaan">
							<input type='text' class='form-control' name="nama_notaris_perubahan" id="nama_notaris_perubahan" value="{{$data->NamaNotarisPerubahan}}"
								<?php if(($data->NamaNotarisPerubahanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
								<?php }else if ($data->NamaNotarisPerubahanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
							></input>
						</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" colspan="7"><b>SK Kemenhumkam / Pengesahan Pengadilan / Kementrian Koperasi</b></td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" >Nomor SK</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan nomor sk perubahan">
							<input type='text' class='form-control' name="no_pengesahan2" id="no_pengesahan2" value="{{$data->NomorPengesahanKemenhumkamPerubahan}}"
								<?php if(($data->NomorPengesahanKemenhumkamPerubahanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
								|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
								<?php }else if ($data->NomorPengesahanKemenhumkamPerubahanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
							></input>
						</div>
						</div>
					</td>
					<td style="border:none; border-top:none;" style="text-align: right;">Tanggal SK</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>					
							<div data-tip="masukan tanggal sk perubahan">	
							<input type='text' class='form-control' name="tgl_pengesahan2" readonly="true"
								value="<?php if(!is_null($data->TanggalPengesahanKemenhumkamPerubahan)) { echo date("d-m-Y", strtotime($data->TanggalPengesahanKemenhumkamPerubahan)); } ?>" id="tgl_pengesahan2"
									<?php if(($data->TanggalPengesahanKemenhumkamPerubahanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
								<?php echo "<script type='text/javascript'>$('#tgl_pengesahan').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?> 
								<?php }else if ($data->TanggalPengesahanKemenhumkamPerubahanCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
								style="background:#fff; color:555;">
								<?php } ?>
							</input>
							</div>
						</div>
					</td>
				</tr>
				<tr id="akta2">
					<td colspan="6" style="border-top:none;">
						<div class="row">
							<div class="col-lg-12">
								<h5><b>Susunan Pemegang Saham</b></h5>
								<table class="table table-bordered table-hover">
									<thead>
										<th width="50" style="text-align:center;">No</th>
				                        <th width="400" style="text-align:center;">Nama</th>
				                        <th width="200" style="text-align:center;">No. KTP</th>
				                        <!-- <th width="250" style="text-align:center;">Jabatan</th> -->
				                        <th width="180" style="text-align:center;">Aksi</th>
									</thead>
									<tbody>
										<?php if(!is_null($datakomisarisp)) { ?>
				                        <?php
				                            $counter = 1;
				                            foreach($datakomisarisp as $row){
				                        ?>
				                            <tr>
				                                <td><?php echo $counter ?></td>
				                                <td><?php echo $row->Nama ?></td>
				                                <td><?php echo $row->NoKTP ?></td>
				                                <!-- <td><?php //echo $row->Jabatan ?></td> -->
				                                <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
				                                <td style="text-align:center;">
				                                    <a href="" onclick="document.getElementById('nama_komisaris_perubahan').value='<?php echo $row->Nama ?>';
				                                                        document.getElementById('nama_komisaris_perubahan').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_komisaris_perubahan').value='<?php echo $row->NoKTP ?>';
				                                                        $('#ktp_komisaris_perubahan').attr('readonly', false);
				                                                        document.getElementById('jabatan_komisaris_perubahan').value='<?php echo $row->Jabatan ?>';
				                                                        $('#jabatan_komisaris_perubahan').attr('readonly', false);
				                                                        <?php if(($row->NoKTPCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('ktp_komisaris_perubahan').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_komisaris_perubahan').style.background = '#eee'; 
				                                                        document.getElementById('ktp_komisaris_perubahan').style.color = '#555';
				                                                        <?php } else if($row->NoKTPCk=='0') { ?>
				                                                        document.getElementById('ktp_komisaris_perubahan').style.background = 'red';
				                                                        document.getElementById('ktp_komisaris_perubahan').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('ktp_komisaris_perubahan').style.background = '#FFF';
				                                                        document.getElementById('ktp_komisaris_perubahan').style.color = '#555';
				                                                        <?php } ?>
				                                                        <?php if(($row->JabatanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('jabatan_komisaris_perubahan').setAttribute('readOnly','true');
				                                                        document.getElementById('jabatan_komisaris_perubahan').style.background = '#eee'; 
				                                                        document.getElementById('jabatan_komisaris_perubahan').style.color = '#555';
				                                                        <?php } else if($row->JabatanCk=='0') { ?>
				                                                        document.getElementById('jabatan_komisaris_perubahan').style.background = 'red';
				                                                        document.getElementById('jabatan_komisaris_perubahan').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('jabatan_komisaris_perubahan').style.background = '#FFF';
				                                                        document.getElementById('jabatan_komisaris_perubahan').style.color = '#555';
				                                                        <?php } ?>$('#nomor_akta_3').val($('#nomor_akta').val());
																		$('#tgl_akta_3').val($('#tgl_akta').val());
																		$('#nama_notaris_3').val($('#nama_notaris').val());
																		$('#no_pengesahan1_3').val($('#no_pengesahan1').val());
																		$('#tgl_pengesahan1_3').val($('#tgl_pengesahan1').val());
																		$('#nomor_akta_perubahan_3').val($('#nomor_akta_perubahan').val());
																		$('#tgl_akta_perubahan_3').val($('#tgl_akta_perubahan').val());
																		$('#nama_notaris_perubahan_3').val($('#nama_notaris_perubahan').val());
																		$('#no_pengesahan2_3').val($('#no_pengesahan2').val());
																		$('#tgl_pengesahan2_3').val($('#tgl_pengesahan2').val());
																		$('#penerbit_siup_3').val($('#penerbit_siup').val());
																		$('#no_siup_3').val($('#no_siup').val());
																		$('#tgl_siup_3').val($('#tgl_siup').val());
																		$('#tglsd_siup_3').val($('#tglsd_siup').val());
																		$('#penerbit_tdp_3').val($('#penerbit_tdp').val());
																		$('#no_tdp_3').val($('#no_tdp').val());
																		$('#tgl_tdp_3').val($('#tgl_tdp').val());
																		$('#tglsd_tdp_3').val($('#tglsd_tdp').val());
																		$('#penerbit_skdp_3').val($('#penerbit_skdp').val());
																		$('#no_skdp_3').val($('#no_skdp').val());
																		$('#tgl_skdp_3').val($('#tgl_skdp').val());
																		$('#tglsd_skdp_3').val($('#tglsd_skdp').val());" 
				                                        data-toggle="modal" data-target="#komisarisModal2">
				                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
				                                    <a href=""  onclick="document.getElementById('namakomisarisperubahan').value='<?php echo $row->Nama ?>';"
				                                        data-toggle="modal" data-target="#confirmKomisarisModal2">
				                                        <i class="fa fa-trash-o"></i> Hapus</a>
				                                </td>
				                                <?php } ?>
				                            </tr> 
				                        <?php $counter++; } ?>
				                        <?php } ?>
									</tbody>
								</table>
								<?php if(!is_null($data)) { ?>
					            <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
								<input type="button" value="Tambah Pemegang Saham" class="btn btn-submit  btn-primary" 
					                    data-toggle="modal" data-target="#komisarisModal2"
					                    onclick="document.getElementById('nama_komisaris_perubahan').value='';
					                    $('#nama_komisaris_perubahan').attr('readonly', false);
					                    document.getElementById('nama_komisaris_perubahan').focus();
					                    document.getElementById('ktp_komisaris_perubahan').value='';
					                    $('#ktp_komisaris_perubahan').attr('readonly', false);
					                    document.getElementById('jabatan_komisaris_perubahan').value='';
					                    $('#jabatan_komisaris_perubahan').attr('readonly', false);$('#nomor_akta_3').val($('#nomor_akta').val());
										$('#tgl_akta_3').val($('#tgl_akta').val());
										$('#nama_notaris_3').val($('#nama_notaris').val());
										$('#no_pengesahan1_3').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_3').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_3').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_3').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_3').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_3').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_3').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_3').val($('#penerbit_siup').val());
										$('#no_siup_3').val($('#no_siup').val());
										$('#tgl_siup_3').val($('#tgl_siup').val());
										$('#tglsd_siup_3').val($('#tglsd_siup').val());
										$('#penerbit_tdp_3').val($('#penerbit_tdp').val());
										$('#no_tdp_3').val($('#no_tdp').val());
										$('#tgl_tdp_3').val($('#tgl_tdp').val());
										$('#tglsd_tdp_3').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_3').val($('#penerbit_skdp').val());
										$('#no_skdp_3').val($('#no_skdp').val());
										$('#tgl_skdp_3').val($('#tgl_skdp').val());
										$('#tglsd_skdp_3').val($('#tglsd_skdp').val());" >
					            <?php } ?>
					            <?php }else { ?>
					            <input type="button" value="Tambah Pemegang Saham" class="btn btn-submit  btn-primary" 
					                    data-toggle="modal" data-target="#komisarisModal2"
					                    onclick="document.getElementById('nama_komisaris_perubahan').value='';
					                    $('#nama_komisaris_perubahan').attr('readonly', false);
					                    document.getElementById('nama_komisaris_perubahan').focus();
					                    document.getElementById('ktp_komisaris_perubahan').value='';
					                    $('#ktp_komisaris_perubahan').attr('readonly', false);
					                    document.getElementById('jabatan_komisaris_perubahan').value='';
					                    $('#jabatan_komisaris_perubahan').attr('readonly', false);$('#nomor_akta_3').val($('#nomor_akta').val());
										$('#tgl_akta_3').val($('#tgl_akta').val());
										$('#nama_notaris_3').val($('#nama_notaris').val());
										$('#no_pengesahan1_3').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_3').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_3').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_3').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_3').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_3').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_3').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_3').val($('#penerbit_siup').val());
										$('#no_siup_3').val($('#no_siup').val());
										$('#tgl_siup_3').val($('#tgl_siup').val());
										$('#tglsd_siup_3').val($('#tglsd_siup').val());
										$('#penerbit_tdp_3').val($('#penerbit_tdp').val());
										$('#no_tdp_3').val($('#no_tdp').val());
										$('#tgl_tdp_3').val($('#tgl_tdp').val());
										$('#tglsd_tdp_3').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_3').val($('#penerbit_skdp').val());
										$('#no_skdp_3').val($('#no_skdp').val());
										$('#tgl_skdp_3').val($('#tgl_skdp').val());
										$('#tglsd_skdp_3').val($('#tglsd_skdp').val());" >
					            <?php } ?>
					            <br /><br />
								<h5><b>Susunan Pengurus Perusahaan</b></h5>
								<table class="table table-bordered table-hover">
				                    <thead>
				                        <th width="50" style="text-align:center;">No</th>
				                        <th width="400" style="text-align:center;">Nama</th>
				                        <th width="200" style="text-align:center;">No. KTP</th>
				                        <th width="250" style="text-align:center;">Jabatan</th>
				                        <th width="180" style="text-align:center;">Aksi</th>
				                    </thead>
				                    <tbody>
				                        <?php if(!is_null($datadireksip)) { ?>
				                        <?php
				                            $counter = 1;
				                            foreach($datadireksip as $row){
				                        ?>
				                            <tr>
				                                <td><?php echo $counter ?></td>
				                                <td><?php echo $row->Nama ?></td>
				                                <td><?php echo $row->NoKTP ?></td>
				                                <td><?php echo $row->Jabatan ?></td>
				                                <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
				                                <td style="text-align:center;">
				                                    <a href="" onclick="document.getElementById('nama_direksi_perubahan').value='<?php echo $row->Nama ?>';
				                                                        document.getElementById('nama_direksi_perubahan').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_direksi_perubahan').value='<?php echo $row->NoKTP ?>';
				                                                        $('#ktp_direksi_perubahan').attr('readonly', false);
				                                                        document.getElementById('jabatan_direksi_perubahan').value='<?php echo $row->Jabatan ?>';
				                                                        $('#jabatan_direksi_perubahan').attr('readonly', false);
				                                                        <?php if(($row->NoKTPCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('ktp_direksi_perubahan').setAttribute('readOnly','true');
				                                                        document.getElementById('ktp_direksi_perubahan').style.background = '#eee'; 
				                                                        document.getElementById('ktp_direksi_perubahan').style.color = '#555';
				                                                        <?php } else if($row->NoKTPCk=='0') { ?>
				                                                        document.getElementById('ktp_direksi_perubahan').style.background = 'red';
				                                                        document.getElementById('ktp_direksi_perubahan').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('ktp_direksi_perubahan').style.background = '#FFF';
				                                                        document.getElementById('ktp_direksi_perubahan').style.color = '#555';
				                                                        <?php } ?>
				                                                        <?php if(($row->JabatanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
				                                                        document.getElementById('jabatan_direksi_perubahan').setAttribute('readOnly','true');
				                                                        document.getElementById('jabatan_direksi_perubahan').style.background = '#eee'; 
				                                                        document.getElementById('jabatan_direksi_perubahan').style.color = '#555';
				                                                        <?php } else if($row->JabatanCk=='0') { ?>
				                                                        document.getElementById('jabatan_direksi_perubahan').style.background = 'red';
				                                                        document.getElementById('jabatan_direksi_perubahan').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('jabatan_direksi_perubahan').style.background = '#FFF';
				                                                        document.getElementById('jabatan_direksi_perubahan').style.color = '#555';
				                                                        <?php } ?>$('#nomor_akta_4').val($('#nomor_akta').val());
																		$('#tgl_akta_4').val($('#tgl_akta').val());
																		$('#nama_notaris_4').val($('#nama_notaris').val());
																		$('#no_pengesahan1_4').val($('#no_pengesahan1').val());
																		$('#tgl_pengesahan1_4').val($('#tgl_pengesahan1').val());
																		$('#nomor_akta_perubahan_4').val($('#nomor_akta_perubahan').val());
																		$('#tgl_akta_perubahan_4').val($('#tgl_akta_perubahan').val());
																		$('#nama_notaris_perubahan_4').val($('#nama_notaris_perubahan').val());
																		$('#no_pengesahan2_4').val($('#no_pengesahan2').val());
																		$('#tgl_pengesahan2_4').val($('#tgl_pengesahan2').val());
																		$('#penerbit_siup_4').val($('#penerbit_siup').val());
																		$('#no_siup_4').val($('#no_siup').val());
																		$('#tgl_siup_4').val($('#tgl_siup').val());
																		$('#tglsd_siup_4').val($('#tglsd_siup').val());
																		$('#penerbit_tdp_4').val($('#penerbit_tdp').val());
																		$('#no_tdp_4').val($('#no_tdp').val());
																		$('#tgl_tdp_4').val($('#tgl_tdp').val());
																		$('#tglsd_tdp_4').val($('#tglsd_tdp').val());
																		$('#penerbit_skdp_4').val($('#penerbit_skdp').val());
																		$('#no_skdp_4').val($('#no_skdp').val());
																		$('#tgl_skdp_4').val($('#tgl_skdp').val());
																		$('#tglsd_skdp_4').val($('#tglsd_skdp').val());"
				                                        data-toggle="modal" data-target="#direksiModal2">
				                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
				                                    <a href="" onclick="document.getElementById('namadireksiperubahan').value='<?php echo $row->Nama ?>';"
				                                        data-toggle="modal" data-target="#confirmDireksiModal2">
				                                        <i class="fa fa-trash-o"></i> Hapus</a>
				                                </td>
				                                <?php } ?>
				                            </tr> 
				                        <?php $counter++; } ?>
				                        <?php } ?>
				                    </tbody>				                    
				                </table>
				                <?php if(!is_null($data)) { ?>
				                <?php if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
				                <input type="button" value="Tambah Pengurus Perusahaan" class="btn btn-submit  btn-primary" 
				                        data-toggle="modal" data-target="#direksiModal2"
				                        onclick="document.getElementById('nama_direksi_perubahan').value='';
				                        $('#nama_direksi_perubahan').attr('readonly', false);
				                        document.getElementById('nama_direksi_perubahan').focus();
				                        document.getElementById('ktp_direksi_perubahan').value='';
				                        $('#ktp_direksi_perubahan').attr('readonly', false);
				                        document.getElementById('jabatan_direksi_perubahan').value='';
				                        $('#jabatan_direksi_perubahan').attr('readonly', false);$('#nomor_akta_4').val($('#nomor_akta').val());
										$('#tgl_akta_4').val($('#tgl_akta').val());
										$('#nama_notaris_4').val($('#nama_notaris').val());
										$('#no_pengesahan1_4').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_4').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_4').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_4').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_4').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_4').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_4').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_4').val($('#penerbit_siup').val());
										$('#no_siup_4').val($('#no_siup').val());
										$('#tgl_siup_4').val($('#tgl_siup').val());
										$('#tglsd_siup_4').val($('#tglsd_siup').val());
										$('#penerbit_tdp_4').val($('#penerbit_tdp').val());
										$('#no_tdp_4').val($('#no_tdp').val());
										$('#tgl_tdp_4').val($('#tgl_tdp').val());
										$('#tglsd_tdp_4').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_4').val($('#penerbit_skdp').val());
										$('#no_skdp_4').val($('#no_skdp').val());
										$('#tgl_skdp_4').val($('#tgl_skdp').val());
										$('#tglsd_skdp_4').val($('#tglsd_skdp').val());">
				                <?php } ?>
				                <?php }else { ?>
				                <input type="button" value="Tambah Pengurus Perusahaan" class="btn btn-submit  btn-primary" 
				                        data-toggle="modal" data-target="#direksiModal2"
				                        onclick="document.getElementById('nama_direksi_perubahan').value='';
				                        $('#nama_direksi_perubahan').attr('readonly', false);
				                        document.getElementById('nama_direksi_perubahan').focus();
				                        $('#ktp_direksi_perubahan').attr('readonly', false);
				                        document.getElementById('jabatan_direksi_perubahan').value='';
				                        $('#jabatan_direksi_perubahan').attr('readonly', false);$('#nomor_akta_4').val($('#nomor_akta').val());
										$('#tgl_akta_4').val($('#tgl_akta').val());
										$('#nama_notaris_4').val($('#nama_notaris').val());
										$('#no_pengesahan1_4').val($('#no_pengesahan1').val());
										$('#tgl_pengesahan1_4').val($('#tgl_pengesahan1').val());
										$('#nomor_akta_perubahan_4').val($('#nomor_akta_perubahan').val());
										$('#tgl_akta_perubahan_4').val($('#tgl_akta_perubahan').val());
										$('#nama_notaris_perubahan_4').val($('#nama_notaris_perubahan').val());
										$('#no_pengesahan2_4').val($('#no_pengesahan2').val());
										$('#tgl_pengesahan2_4').val($('#tgl_pengesahan2').val());
										$('#penerbit_siup_4').val($('#penerbit_siup').val());
										$('#no_siup_4').val($('#no_siup').val());
										$('#tgl_siup_4').val($('#tgl_siup').val());
										$('#tglsd_siup_4').val($('#tglsd_siup').val());
										$('#penerbit_tdp_4').val($('#penerbit_tdp').val());
										$('#no_tdp_4').val($('#no_tdp').val());
										$('#tgl_tdp_4').val($('#tgl_tdp').val());
										$('#tglsd_tdp_4').val($('#tglsd_tdp').val());
										$('#penerbit_skdp_4').val($('#penerbit_skdp').val());
										$('#no_skdp_4').val($('#no_skdp').val());
										$('#tgl_skdp_4').val($('#tgl_skdp').val());
										$('#tglsd_skdp_4').val($('#tglsd_skdp').val());">
				                <?php } ?>
				                <br />
							</div>
						</div>
					</td>
				</tr>
				<tr class="success">
					<th colspan="6">Perijinan Perusahaan</th>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" colspan="6"><b>Surat Ijin Usaha Perdagangan (SIUP)</b></td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;">Penerbit *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan penerbit siup">	
								<input type='text' class='form-control' name="penerbit_siup" id="penerbit_siup" value="{{$data->PenerbitSIUP}}" required="required"
									<?php if(($data->PenerbitSIUPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->PenerbitSIUPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
						</div>
					</td>
					<td style="border:none; border-top:none;">Nomor *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan nomor siup">	
								<input type='text' class='form-control' name="no_siup" id="no_siup" value="{{$data->NomorSIUP}}" required="required"
									<?php if(($data->NomorSIUPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->NomorSIUPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;">Tanggal *)</td>
					<td style="border:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal siup">	
							<input type='text' class='form-control' name="tgl_siup"  readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalSIUP)) { echo date("d-m-Y", strtotime($data->TanggalSIUP)); } ?>" id="tgl_siup"
									<?php if(($data->TanggalSIUPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tgl_siup').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data->TanggalSIUPCk=='0') { ?> style="background-color:red; color:white;"  <?php }else{?>
									style="background:#fff; color:555;">
									<?php } ?>
								</input>
							</div>
						</div>
					</td>
					<td style="border:none; border-top:none;">s/d Tanggal *)</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal berakhir siup">	
							<input type='text' class='form-control' name="tglsd_siup" readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalSdSIUP)) { echo date("d-m-Y", strtotime($data->TanggalSdSIUP)); } ?>" id="tglsd_siup"
									<?php if(($data->TanggalSdSIUPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tglsd_siup').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data->TanggalSdSIUPCk=='0') { ?> style="background-color:red; color:white;"  <?php }else{?>
									style="background:#fff; color:555;">
									<?php } ?>
								</input>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="6" style="border:none; border-top:none;"><b>Tanda Daftar Perusahaan (TDP)</b></td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;">Penerbit *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan penerbit tdp">	
								<input type='text' class='form-control' name="penerbit_tdp" id="penerbit_tdp" value="{{$data->PenerbitTDP}}" required="required"
									<?php if(($data->PenerbitTDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->PenerbitTDPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
						</div>
					</td>
					<td style="border:none; border-top:none;">Nomor *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan nomor tdp">	
								<input type='text' class='form-control' name="no_tdp" id="no_tdp" value="{{$data->NomorTDP}}" required="required"
									<?php if(($data->NomorTDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->NomorTDPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;">Tanggal *)</td>
					<td style="border:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal tdp">	
							<input type='text' class='form-control' name="tgl_tdp"  readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalTDP)) { echo date("d-m-Y", strtotime($data->TanggalTDP)); } ?>" id="tgl_tdp"
									<?php if(($data->TanggalTDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tgl_tdp').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data->TanggalTDPCk=='0') { ?> style="background-color:red; color:white;"  <?php }else{?>
									style="background:#fff; color:555;">
									<?php } ?>
								</input>
							</div>
						</div>
					</td>
					<td style="border:none; border-top:none;">s/d Tanggal *)</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal berakhir tdp">	
							<input type='text' class='form-control' name="tglsd_tdp"  readonly="true" required="required" 
								value="<?php if(!is_null($data->TanggalSdTDP)) { echo date("d-m-Y", strtotime($data->TanggalSdTDP)); } ?>" id="tglsd_tdp"
									<?php if(($data->TanggalSdTDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tglsd_tdp').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data->TanggalSdTDPCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
									style="background:#fff; color:555;">
									<?php } ?>
								</input>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="6" style="border:none; border-top:none;"><b>Surat Keterangan Domisili Perusahaan (SKDP)</b></td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;">Penerbit *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan penerbit skdp">	
								<input type='text' class='form-control' name="penerbit_skdp" id="penerbit_skdp" value="{{$data->PenerbitSKDP}}" required="required"
									<?php if(($data->PenerbitSKDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->PenerbitSKDPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
						</div>
					</td>
					<td style="border:none; border-top:none;">Nomor *)</td>
					<td style="border:none; border-top:none;" colspan="2">
						<div class='col-sm-12'>
							<div data-tip="masukan nomor skdp">	
								<input type='text' class='form-control' name="no_skdp" id="no_skdp" value="{{$data->NomorSKDP}}" required="required" 
									<?php if(($data->NomorSKDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->NomorSKDPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
						</div>
					</td>
				<tr>
					<td style="border:none; border-top:none;">Tanggal *)</td>
					<td style="border:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal skdp">	
							<input type='text' class='form-control' name="tgl_skdp" readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalSKDP)) { echo date("d-m-Y", strtotime($data->TanggalSKDP)); } ?>" id="tgl_skdp"
									<?php if(($data->TanggalSKDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tgl_skdp').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data->TanggalSKDPCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
									style="background:#fff; color:555;">
									<?php } ?>
								</input>
							</div>
						</div>
					</td>
					<td style="border:none; border-top:none;">s/d Tanggal *)</td>
					<td style="border-left:none; border-bottom:none; border-top:none;" colspan="2">
						<div class='col-sm-7'>	
							<div data-tip="masukan tanggal berakhir skdp">	
							<input type='text' class='form-control' name="tglsd_skdp" readonly="true" required="required"
								value="<?php if(!is_null($data->TanggalSdSKDP)) { echo date("d-m-Y", strtotime($data->TanggalSdSKDP)); } ?>" id="tglsd_skdp"
									<?php if(($data->TanggalSdSKDPCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tglsd_skdp').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data->TanggalSdSKDPCk=='0') { ?> style="background-color:red; color:white;" <?php }else{?>
									style="background:#fff; color:555;">
									<?php } ?>
								</input>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border:none; border-top:none;" colspan="7">
					</td>
				</tr>
				<tr align=center>
					<td style="border:none; border-top:none;" colspan="7">	
						<p style="text-align:left;"><b>Catatan : *) wajib di isi<b></p>					
						<?php if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
						<a href="<?php echo 'dataadministrasiperusahaan' ?>" class="btn btn-submit btn-primary" id="btnprev">
						<i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
						<button type="submit" class="btn btn-submit btn-primary">Berikutnya
						<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
						<?php } ?>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
    </div>

    <!-- modal komisaris 1 --> 
	<div class="modal fade" id="komisarisModal1" role="dialog" aria-labelledby="komisarisModalLabel">
        <div class="vertical-alignment-helper">
  			<div class="modal-dialog vertical-align-center" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h4 class="modal-title" id="komisarisModalLabel">Pemegang Saham</h4>
      				</div>
      				<div class="modal-body">
        				<form action="{{action('VendorController@savekomisarisperusahaan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="nomor_akta_1" id="nomor_akta_1">
							<input type="hidden" name="tgl_akta_1" id="tgl_akta_1">
							<input type="hidden" name="nama_notaris_1" id="nama_notaris_1">
							<input type="hidden" name="no_pengesahan1_1" id="no_pengesahan1_1">
							<input type="hidden" name="tgl_pengesahan1_1" id="tgl_pengesahan1_1">
							<input type="hidden" name="nomor_akta_perubahan_1" id="nomor_akta_perubahan_1">
							<input type="hidden" name="tgl_akta_perubahan_1" id="tgl_akta_perubahan_1">
							<input type="hidden" name="nama_notaris_perubahan_1" id="nama_notaris_perubahan_1">
							<input type="hidden" name="no_pengesahan2_1" id="no_pengesahan2_1">
							<input type="hidden" name="tgl_pengesahan2_1" id="tgl_pengesahan2_1">
							<input type="hidden" name="penerbit_siup_1" id="penerbit_siup_1">
							<input type="hidden" name="no_siup_1" id="no_siup_1">
							<input type="hidden" name="tgl_siup_1" id="tgl_siup_1">
							<input type="hidden" name="tglsd_siup_1" id="tglsd_siup_1">
							<input type="hidden" name="penerbit_tdp_1" id="penerbit_tdp_1">
							<input type="hidden" name="no_tdp_1" id="no_tdp_1">
							<input type="hidden" name="tgl_tdp_1" id="tgl_tdp_1">
							<input type="hidden" name="tglsd_tdp_1" id="tglsd_tdp_1">
							<input type="hidden" name="penerbit_skdp_1" id="penerbit_skdp_1">
							<input type="hidden" name="no_skdp_1" id="no_skdp_1">
							<input type="hidden" name="tgl_skdp_1" id="tgl_skdp_1">
							<input type="hidden" name="tglsd_skdp_1" id="tglsd_skdp_1">
        					<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; padding-top:15px;" width="80">Nama</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan nama">
        										<input type="text" class="form-control" name="nama_komisaris" 
                                                    id="nama_komisaris"  required="required">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">No. KTP</td>
        								<td style="border:none;">
        									<div class="col-sm-6">
                                                <div data-tip="masukan no. ktp">
        										<input type="text" class="form-control" name="ktp_komisaris"
                                                    id="ktp_komisaris" onkeypress="return isNumber(event)">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<!-- <tr>
        								<td style="border:none; padding-top:15px;">Jabatan</td>
        								<td style="border:none;">
        									<div class="col-sm-9">
                                                <div data-tip="masukan jabatan">-->
        										<input type="hidden" class="form-control" name="jabatan_komisaris"
                                                    id="jabatan_komisaris">
                                                <!--</div>
        									</div>
        								</td>
        							</tr> -->
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
	<!-- modal komisaris 1 -->

	<!-- modal komisaris 2 --> 
	<div class="modal fade" id="komisarisModal2" role="dialog" aria-labelledby="komisarisModalLabel">
        <div class="vertical-alignment-helper">
  			<div class="modal-dialog vertical-align-center" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h4 class="modal-title" id="komisarisModalLabel">Pemegang Saham</h4>
      				</div>
      				<div class="modal-body">
        				<form action="{{action('VendorController@savekomisarisperusahaanperubahan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="nomor_akta_3" id="nomor_akta_3">
							<input type="hidden" name="tgl_akta_3" id="tgl_akta_3">
							<input type="hidden" name="nama_notaris_3" id="nama_notaris_3">
							<input type="hidden" name="no_pengesahan1_3" id="no_pengesahan1_3">
							<input type="hidden" name="tgl_pengesahan1_3" id="tgl_pengesahan1_3">
							<input type="hidden" name="nomor_akta_perubahan_3" id="nomor_akta_perubahan_3">
							<input type="hidden" name="tgl_akta_perubahan_3" id="tgl_akta_perubahan_3">
							<input type="hidden" name="nama_notaris_perubahan_3" id="nama_notaris_perubahan_3">
							<input type="hidden" name="no_pengesahan2_3" id="no_pengesahan2_3">
							<input type="hidden" name="tgl_pengesahan2_3" id="tgl_pengesahan2_3">
							<input type="hidden" name="penerbit_siup_3" id="penerbit_siup_3">
							<input type="hidden" name="no_siup_3" id="no_siup_3">
							<input type="hidden" name="tgl_siup_3" id="tgl_siup_3">
							<input type="hidden" name="tglsd_siup_3" id="tglsd_siup_3">
							<input type="hidden" name="penerbit_tdp_3" id="penerbit_tdp_3">
							<input type="hidden" name="no_tdp_3" id="no_tdp_3">
							<input type="hidden" name="tgl_tdp_3" id="tgl_tdp_3">
							<input type="hidden" name="tglsd_tdp_3" id="tglsd_tdp_3">
							<input type="hidden" name="penerbit_skdp_3" id="penerbit_skdp_3">
							<input type="hidden" name="no_skdp_3" id="no_skdp_3">
							<input type="hidden" name="tgl_skdp_3" id="tgl_skdp_3">
							<input type="hidden" name="tglsd_skdp_3" id="tglsd_skdp_3">
        					<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; padding-top:15px;" width="80">Nama</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan nama">
        										<input type="text" class="form-control" name="nama_komisaris_perubahan" 
                                                    id="nama_komisaris_perubahan"  required="required">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">No. KTP</td>
        								<td style="border:none;">
        									<div class="col-sm-6">
                                                <div data-tip="masukan no. ktp">
        										<input type="text" class="form-control" name="ktp_komisaris_perubahan"
                                                    id="ktp_komisaris_perubahan" onkeypress="return isNumber(event)">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<!-- <tr>
        								<td style="border:none; padding-top:15px;">Jabatan</td>
        								<td style="border:none;">
        									<div class="col-sm-9">
                                                <div data-tip="masukan jabatan">-->
        										<input type="hidden" class="form-control" name="jabatan_komisaris_perubahan"
                                                    id="jabatan_komisaris_perubahan">
                                                <!--</div>
        									</div>
        								</td>
        							</tr> -->
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
	<!-- modal komisaris 2 -->

	<!-- modal direksi 1--> 
	<div class="modal fade" id="direksiModal1" role="dialog" aria-labelledby="direksiModalLabel">
        <div class="vertical-alignment-helper">
  			<div class="modal-dialog vertical-align-center" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h4 class="modal-title" id="direksiModalLabel">Pengurus Perusahaan</h4>
      				</div>
      				<div class="modal-body">
        				<form action="{{action('VendorController@savedireksiperusahaan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="nomor_akta_2" id="nomor_akta_2">
							<input type="hidden" name="tgl_akta_2" id="tgl_akta_2">
							<input type="hidden" name="nama_notaris_2" id="nama_notaris_2">
							<input type="hidden" name="no_pengesahan1_2" id="no_pengesahan1_2">
							<input type="hidden" name="tgl_pengesahan1_2" id="tgl_pengesahan1_2">
							<input type="hidden" name="nomor_akta_perubahan_2" id="nomor_akta_perubahan_2">
							<input type="hidden" name="tgl_akta_perubahan_2" id="tgl_akta_perubahan_2">
							<input type="hidden" name="nama_notaris_perubahan_2" id="nama_notaris_perubahan_2">
							<input type="hidden" name="no_pengesahan2_2" id="no_pengesahan2_2">
							<input type="hidden" name="tgl_pengesahan2_2" id="tgl_pengesahan2_2">
							<input type="hidden" name="penerbit_siup_2" id="penerbit_siup_2">
							<input type="hidden" name="no_siup_2" id="no_siup_2">
							<input type="hidden" name="tgl_siup_2" id="tgl_siup_2">
							<input type="hidden" name="tglsd_siup_2" id="tglsd_siup_2">
							<input type="hidden" name="penerbit_tdp_2" id="penerbit_tdp_2">
							<input type="hidden" name="no_tdp_2" id="no_tdp_2">
							<input type="hidden" name="tgl_tdp_2" id="tgl_tdp_2">
							<input type="hidden" name="tglsd_tdp_2" id="tglsd_tdp_2">
							<input type="hidden" name="penerbit_skdp_2" id="penerbit_skdp_2">
							<input type="hidden" name="no_skdp_2" id="no_skdp_2">
							<input type="hidden" name="tgl_skdp_2" id="tgl_skdp_2">
							<input type="hidden" name="tglsd_skdp_2" id="tglsd_skdp_2">
        					<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; padding-top:15px;" width="80">Nama</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan nama">
        										<input type="text" class="form-control" name="nama_direksi" 
                                                    id="nama_direksi" required="required">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">No. KTP</td>
        								<td style="border:none;">
        									<div class="col-sm-6">
                                                <div data-tip="masukan no. ktp">
        										<input type="text" class="form-control" name="ktp_direksi"
                                                    id="ktp_direksi" onkeypress="return isNumber(event)">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">Jabatan</td>
        								<td style="border:none;">
        									<div class="col-sm-9">
                                                <div data-tip="masukan jabatan">
        										<input type="text" class="form-control" name="jabatan_direksi"
                                                    id="jabatan_direksi">
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
	<!-- modal direksi 1-->

	<!-- modal direksi 2--> 
	<div class="modal fade" id="direksiModal2" role="dialog" aria-labelledby="direksiModalLabel">
        <div class="vertical-alignment-helper">
  			<div class="modal-dialog vertical-align-center" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h4 class="modal-title" id="direksiModalLabel">Pengurus Perusahaan</h4>
      				</div>
      				<div class="modal-body">
        				<form action="{{action('VendorController@savedireksiperusahaanperubahan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="nomor_akta_4" id="nomor_akta_4">
							<input type="hidden" name="tgl_akta_4" id="tgl_akta_4">
							<input type="hidden" name="nama_notaris_4" id="nama_notaris_4">
							<input type="hidden" name="no_pengesahan1_4" id="no_pengesahan1_4">
							<input type="hidden" name="tgl_pengesahan1_4" id="tgl_pengesahan1_4">
							<input type="hidden" name="nomor_akta_perubahan_4" id="nomor_akta_perubahan_4">
							<input type="hidden" name="tgl_akta_perubahan_4" id="tgl_akta_perubahan_4">
							<input type="hidden" name="nama_notaris_perubahan_4" id="nama_notaris_perubahan_4">
							<input type="hidden" name="no_pengesahan2_4" id="no_pengesahan2_4">
							<input type="hidden" name="tgl_pengesahan2_4" id="tgl_pengesahan2_4">
							<input type="hidden" name="penerbit_siup_4" id="penerbit_siup_4">
							<input type="hidden" name="no_siup_4" id="no_siup_4">
							<input type="hidden" name="tgl_siup_4" id="tgl_siup_4">
							<input type="hidden" name="tglsd_siup_4" id="tglsd_siup_4">
							<input type="hidden" name="penerbit_tdp_4" id="penerbit_tdp_4">
							<input type="hidden" name="no_tdp_4" id="no_tdp_4">
							<input type="hidden" name="tgl_tdp_4" id="tgl_tdp_4">
							<input type="hidden" name="tglsd_tdp_4" id="tglsd_tdp_4">
							<input type="hidden" name="penerbit_skdp_4" id="penerbit_skdp_4">
							<input type="hidden" name="no_skdp_4" id="no_skdp_4">
							<input type="hidden" name="tgl_skdp_4" id="tgl_skdp_4">
							<input type="hidden" name="tglsd_skdp_4" id="tglsd_skdp_4">
        					<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; padding-top:15px;" width="80">Nama</td>
        								<td style="border:none;">
        									<div class="col-sm-12">
                                                <div data-tip="masukan nama">
        										<input type="text" class="form-control" name="nama_direksi_perubahan" 
                                                    id="nama_direksi_perubahan" required="required">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">No. KTP</td>
        								<td style="border:none;">
        									<div class="col-sm-6">
                                                <div data-tip="masukan no. ktp">
        										<input type="text" class="form-control" name="ktp_direksi_perubahan"
                                                    id="ktp_direksi_perubahan" onkeypress="return isNumber(event)">
                                                </div>
        									</div>
        								</td>
        							</tr>
        							<tr>
        								<td style="border:none; padding-top:15px;">Jabatan</td>
        								<td style="border:none;">
        									<div class="col-sm-9">
                                                <div data-tip="masukan jabatan">
        										<input type="text" class="form-control" name="jabatan_direksi_perubahan"
                                                    id="jabatan_direksi_perubahan">
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
	<!-- modal direksi 2--> 

	<!-- modal confirm delete komisaris 1-->
    <div class="modal fade" id="confirmKomisarisModal1" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletekomisarisperusahaan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus<input style="border:none;" type="text" 
                                id="namakomisaris" name="namakomisaris"> 
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
    <!-- modal confirm delete komisaris 1-->

    <!-- modal confirm delete komisaris 2-->
    <div class="modal fade" id="confirmKomisarisModal2" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletekomisarisperusahaanperubahan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus <input style="border:none;" type="text" 
                                id="namakomisarisperubahan" name="namakomisarisperubahan"> 
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
    <!-- modal confirm delete komisaris 2-->

    <!-- modal confirm delete direksi 1-->
    <div class="modal fade" id="confirmDireksiModal1" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletedireksiperusahaan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus <input style="border:none;" type="text" 
                                id="namadireksi" name="namadireksi"> 
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
    <!-- modal confirm delete direksi 1-->

    <!-- modal confirm delete direksi 2-->
    <div class="modal fade" id="confirmDireksiModal2" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletedireksiperusahaanperubahan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus data <input style="border:none;" type="text" 
                                id="namadireksiperubahan" name="namadireksiperubahan"> 
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
    <!-- modal confirm delete komisaris 2-->

    <script>
	$("form").submit(function() {
		$.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
		setTimeout($.unblockUI, 800);
	}); 
	$("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
	</script>

@stop()