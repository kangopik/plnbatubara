@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#activa_lancar').mask("#.##0", {reverse: true});
	$('#utang_pendek').mask("#.##0", {reverse: true});
	$('#activa_tetap').mask("#.##0", {reverse: true});
	$('#utang_panjang').mask("#.##0", {reverse: true});
	$('#total_activa').mask("#.##0", {reverse: true});
	$('#kekayaan_bersih').mask("#.##0", {reverse: true});
});
</script>
<div class="row">
	<div class="col-lg-11">
		<h2 class="page-header">Data Keuangan Calon Penyedia Batubara <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?></h2>

		<!-- modal --> 
		<div class="modal fade" id="kepemilikanSahamModal" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
  			<div class="vertical-alignment-helper">
	  			<div class="modal-dialog vertical-align-center" role="document">
	    			<div class="modal-content">
	      				<div class="modal-header">
	      					<h4 class="modal-title" id="kepemilikanSahamModalLabel">Kepemilikan Saham</h4>
	      				</div>
	      				<div class="modal-body">
	        				<form action="{{action('VendorController@savekepemilikansaham')}}" method="post">
	        					<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	        					<table class="table table-bordered" style="border:none;">
	        						<tbody>
	        							<tr>
	        								<td style="border:none; padding-top:15px;" width="200">Nama</td>
	        								<td style="border:none;">
	        									<div class="col-sm-12">
	        										<div data-tip="masukan nama komisaris">
	        										<input type="text" class="form-control" name="nama" id="nama" required="required">
	        									</div>
	        									</div>
	        								</td>
	        							</tr>
	        							<tr>
	        								<td style="border:none; padding-top:15px;">No. KTP</td>
	        								<td style="border:none;">
	        									<div class="col-sm-7">
	        										<div data-tip="masukan no. ktp komisaris">
	        										<input type="text" class="form-control" name="ktp" id="ktp" onkeypress="return isNumber(event)">
	        										</div>
	        									</div>
	        								</td>
	        							</tr>
	        							<!-- <tr>
	        								<td style="border:none; padding-top:15px;">Jabatan</td>
	        								<td style="border:none;">
	        									<div class="col-sm-9">
	        										<div data-tip="masukan jabatan komisaris">
	        										<input type="text" class="form-control" name="jabatan" id="jabatan">
	        									</div>
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
		<!-- modal -->

		<!-- modal confirm delete kepemilikan -->
        <div class="modal fade" id="confirmKepemilikanModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('VendorController@deletekepemilikansaham')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus data Kepemilikan Saham <input style="border:none;" type="text" 
                                    id="namakepemilikan" name="namakepemilikan"> 
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
        <!-- modal confirm delete kepemilikan -->

		<div class="row">
			<div class="col-lg-12">
				<h4>&nbsp;</h4>
				<form action="{{action('VendorController@savekeuangan')}}" method="post">
					<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
					<table class="table table-bordered">
						<tbody>
							<tr class="success">
								<th colspan="4">Nomor Pokok Wajib Pajak (NPWP)</th>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="130">No. NPWP</td>
								<td style="border:none; border-top:none;" width="320">
									<div class="col-sm-12">
										<div data-tip="masukan nomor npwp">
										<input type='text' class='form-control' name="no_npwp" value="{{$data2->NomorNPWP}}" readonly="true"
											<?php if(($data2->NomorNPWPCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NomorNPWPCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
										></input>
									</div>
									</div>
								</td>
								<td style="border:none; border-top:none;"></td>
								<td style="border:none; border-top:none;"></td>
							</tr>
							<tr class="success">
								<th colspan="4">Rekening Perusahaan</th>
							</tr>
							<tr>
								<td style="border:none; border-top:none;">No. Rekening *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-12">
										<div data-tip="masukan nomor rekening perusahaan">
										<input type='text' class='form-control' name="no_rekening" value="{{$data2->NoRekening}}" required="required"
											<?php if(($data2->NoRekeningCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NoRekeningCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
										onkeypress="return isNumber(event)"></input>
									</div>
									</div>	
								</td>
								<td style="border:none; border-top:none;" width="100">Nama Bank *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-12">
										<div data-tip="masukan nama bank">
										<input type='text' class='form-control' name="nama_bank" value="{{$data2->NamaBank}}" required="required"
											<?php if(($data2->NamaBankCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NamaBankCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
										></input>
									</div>
									</div>
								</td>
							</tr>
							<tr class="success">
								<th colspan="4">Bukti pelunasan pajak tahunan / Tahun terakhir</th>
							</tr>
							<tr>
								<td style="border:none; border-top:none;">Nomor *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-12">
										<div data-tip="masukan nomor bukti pelunasan pajak">
										<input type='text' class='form-control' name="no_pelunasan" value="{{$data2->NomorBuktiPelunasan}}" required="required"
											<?php if(($data2->NomorBuktiPelunasanCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NomorBuktiPelunasanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
										></input>
									</div>
									</div>	
								</td>
								<td style="border:none; border-top:none;" width="70">Tanggal *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-5">
										<div data-tip="masukan tanggal bukti pelunasan pajak">
										<input type='text' class='form-control' name="tgl_pelunasan"  readonly="true" required="required"
											value="<?php if(!is_null($data2->TglBuktiPelunasan)) { echo date("d-m-Y", strtotime($data2->TglBuktiPelunasan)); } ?>" id="tgl_pelunasan"
											<?php if(($data2->TglBuktiPelunasanCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" >
											<?php echo "<script type='text/javascript'>$('#tgl_pelunasan').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>  
											<?php }else if ($data2->TglBuktiPelunasanCk=='0') { ?> style="background-color:red; color:white;" <?php }
											else{?>
											style="background:#fff; color:555;">
											<?php } ?>
										</input>
									</div>
									</div>
								</td>
							</tr>
							<tr class="success">
								<th colspan="4">Laporan bulanan PPN, PPh tiga Bulan terakhir</th>
							</tr>
							<tr>
								<td style="border:none; border-top:none;">Nomor *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-12">
										<div data-tip="masukan nomor laporan bulanan">
										<input type='text' class='form-control' name="no_bulanan" value="{{$data2->NomorLaporanBulanan}}" required="required"
											<?php if(($data2->NomorLaporanBulananCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NomorLaporanBulananCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
										></input>
									</div>
									</div>
								</td>
								<td style="border:none; border-top:none;">Tanggal *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-5">
										<div data-tip="masukan tanggal laporan bulanan">
										<input type='text' class='form-control' name="tgl_bulanan"  readonly="true" required="required"
											value="<?php if(!is_null($data2->TglLaporanBulanan)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan)); } ?>" id="tgl_bulanan"
											<?php if(($data2->TglLaporanBulananCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" >
											<?php echo "<script type='text/javascript'>$('#tgl_bulanan').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>  
											<?php }else if ($data2->TglLaporanBulananCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
										</input>
									</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;">Nomor *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-12">
										<div data-tip="masukan nomor laporan bulanan">
										<input type='text' class='form-control' name="no_bulanan2" value="{{$data2->NomorLaporanBulanan2}}" required="required"
											<?php if(($data2->NomorLaporanBulanan2Ck=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NomorLaporanBulanan2Ck=='0') { ?> style="background-color:red; color:white;" <?php }?>
										></input>
									</div>
									</div>
								</td>
								<td style="border:none; border-top:none;">Tanggal *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-5">
										<div data-tip="masukan tanggal laporan bulanan">
										<input type='text' class='form-control' name="tgl_bulanan2"  readonly="true" required="required"
											value="<?php if(!is_null($data2->TglLaporanBulanan2)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan2)); } ?>" id="tgl_bulanan2"
											<?php if(($data2->TglLaporanBulanan2Ck=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" >
											<?php echo "<script type='text/javascript'>$('#tgl_bulanan2').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>  
											<?php }else if ($data2->TglLaporanBulanan2Ck=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
										</input>
									</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;">Nomor *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-12">
										<div data-tip="masukan nomor laporan bulanan">
										<input type='text' class='form-control' name="no_bulanan3" value="{{$data2->NomorLaporanBulanan3}}" required="required"
											<?php if(($data2->NomorLaporanBulanan3Ck=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
											<?php }else if ($data2->NomorLaporanBulanan3Ck=='0') { ?> style="background-color:red; color:white;" <?php }?>
										></input>
									</div>
									</div>
								</td>
								<td style="border:none; border-top:none;">Tanggal *)</td>
								<td style="border:none; border-top:none;">
									<div class="col-sm-5">
										<div data-tip="masukan tanggal laporan bulanan">
										<input type='text' class='form-control' name="tgl_bulanan3"  readonly="true" required="required"
											value="<?php if(!is_null($data2->TglLaporanBulanan3)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan3)); } ?>" id="tgl_bulanan3"
											<?php if(($data2->TglLaporanBulanan3Ck=='1') || ($data2->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
											|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" >
											<?php echo "<script type='text/javascript'>$('#tgl_bulanan3').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>  
											<?php }else if ($data2->TglLaporanBulanan3Ck=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
										</input>
									</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h4>&nbsp;</h4>
						<table class="table table-bordered">
							<tbody>
								<tr class="success">
									<th colspan="4">Neraca perusahaan Terakhir</th>
								</tr>
								<tr>
									<td style="border:none; border-top:none;" width="180">Activa Lancar</td>
									<td style="border:none; border-top:none;" width="270"><a style="font-size:16px;">IDR</a>
										<div class="col-sm-10" style="padding-right: 5px;">
											<div data-tip="masukan activa lancar">
											<input type='text' class='form-control' name="activa_lancar" id="activa_lancar" value="{{$data3->ActivaLancar}}" 
												<?php if(($data3->ActivaLancarCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->ActivaLancarCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											onkeypress="return isDecimal(event)"></input>
										</div>
										</div>
									</td>
									<td style="border:none; border-top:none;" width="180">Utang Jangka Pendek</td>
									<td style="border:none; border-top:none;" width="270"><a style="font-size:16px;">IDR</a>
										<div class="col-sm-10" style="padding-right: 5px;">
											<div data-tip="masukan utang jangka pendek">
											<input type='text' class='form-control' name="utang_pendek" id="utang_pendek" value="{{$data3->UtangJangkaPendek}}" 
												<?php if(($data3->UtangJangkaPendekCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->UtangJangkaPendekCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											onkeypress="return isDecimal(event)"></input>
										</div>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border:none; border-top:none;">Activa Tetap</td>
									<td style="border:none; border-top:none;" width="220"><a style="font-size:16px;">IDR</a>
										<div class="col-sm-10" style="padding-right: 5px;">
											<div data-tip="masukan activa tetap">
											<input type='text' class='form-control' name="activa_tetap" id="activa_tetap" value="{{$data3->ActivaTetap}}" 
												<?php if(($data3->ActivaTetapCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->ActivaTetapCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											onkeypress="return isDecimal(event)"></input>
										</div>
										</div>
									</td>
									<td style="border:none; border-top:none;">Utang Jangka Panjang</td>
									<td style="border:none; border-top:none;"><a style="font-size:16px;">IDR</a>
										<div class="col-sm-10" style="padding-right: 5px;">
											<div data-tip="masukan utang jangka panjang">
											<input type='text' class='form-control' name="utang_panjang" id="utang_panjang" value="{{$data3->UtangJangkaPanjang}}" 
												<?php if(($data3->UtangJangkaPanjangCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->UtangJangkaPanjangCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											onkeypress="return isDecimal(event)"></input>
										</div>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border:none; border-top:none;">Total Activa Lancar</td>
									<td style="border:none; border-top:none;" width="220"><a style="font-size:16px;">IDR</a>
										<div class="col-sm-10" style="padding-right: 5px;">
											<div data-tip="masukan total activa lancar">
											<input type='text' class='form-control' name="total_activa" id="total_activa" value="{{$data3->TotalActivaLancar}}" 
												<?php if(($data3->TotalActivaLancarCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->TotalActivaLancarCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											onkeypress="return isDecimal(event)"></input>
										</div>
										</div>
									</td>
									<td style="border:none; border-top:none;">Kekayaan Bersih</td>
									<td style="border:none; border-top:none;"><a style="font-size:16px;">IDR</a>
										<div class="col-sm-10" style="padding-right: 5px;">
											<div data-tip="masukan kekayaan bersih">
											<input type='text' class='form-control' name="kekayaan_bersih" id="kekayaan_bersih" value="{{$data3->TotalKekayaan}}" 
												<?php if(($data3->TotalKekayaanCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->TotalKekayaanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											onkeypress="return isDecimal(event)"></input>
										</div>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border:none; border-top:none;">Auditor</td>
									<td style="border:none; border-top:none;">
										<div class="col-sm-10">
											<div data-tip="masukan nama auditor">
											<input type='text' class='form-control' name="auditor" value="{{$data3->Auditor}}" 
												<?php if(($data3->AuditorCk=='1') || ($data3->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)
												|| ($dataHasil->PersetujuanVerifikasi=='N' && $dataHasil->StatusPakta=='Y')) { ?> readonly="true" 
												<?php }else if ($data3->AuditorCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
										</div>
									</td>
								</tr>
								<tr align=center>
									<td style="border:none; border-top:none;" colspan="7">	
										<p><b>Catatan : *) wajib di isi<b></p>		
										<br />			
										<?php  if($dataHasil->PersetujuanVerifikasi <> 'Y' ^ $dataHasil->Status<>1 || $dataHasil->StatusPakta <> 'Y') { ?>
										<a href="<?php echo 'legalitasperijinantambang' ?>" class="btn btn-submit btn-primary" id="btnprev">
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
			</div>
		</div>
	</div>
</div>

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