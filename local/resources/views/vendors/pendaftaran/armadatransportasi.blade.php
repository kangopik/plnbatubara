@extends('layout.vendor')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Armada Transportasi Calon Penyedia Batubara
        <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?></h2>

		<!-- modal --> 
		<div class="modal fade" id="armadaModal" tabindex="-1" role="dialog" aria-labelledby="armadaModalLabel">
            <div class="vertical-alignment-helper">
      			<div class="modal-dialog vertical-align-center" role="document">
        			<div class="modal-content">
          				<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            				<h4 class="modal-title" id="armadaModalLabel">Armada Transportasi</h4>
          				</div>
          				<div class="modal-body">
            				<form action="{{action('VendorController@savearmadatransportasi')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
            					<table class="table table-bordered" style="border:none;">
            						<tbody>
            							<tr>
            								<td style="border:none; padding-top:15px;" width="150">Jenis Armada</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan jenis armada">
            										<input type="text" class="form-control" name="jenis" id="jenis" required="required">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Jumlah</td>
            								<td style="border:none;"><a style="font-size:16px;">Unit</a>
            									<div class="col-sm-5" style="padding-right: 5px;">
                                                    <div data-tip="masukan jumlah armada">
            										<input type="text" class="form-control" name="jumlah" id="jumlah" onkeypress="return isNumber(event)">
            									   </div>
                                                </div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Kapasitas</td>
            								<td style="border:none;">
            									<div class="col-sm-5">
                                                    <div data-tip="masukan kapasitas armada">
            										<input type="text" class="form-control" name="kapasitas" id="kapasitas" onkeypress="return isNumber(event)">
            									   </div>
                                                </div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Merk/Type</td>
            								<td style="border:none;">
            									<div class="col-sm-7">
                                                    <div data-tip="masukan merk/type armada">
            										<input type="text" class="form-control" name="merk" id="merk">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Tahun Keluaran</td>
            								<td style="border:none;">
            									<div class="col-sm-5">
                                                    <div data-tip="masukan tahun keluaran armada">
            										<input type="text" class="form-control" name="tahun" id="tahun" onkeypress="return isNumber(event)">
            									   </div>
                                                </div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Kondisi</td>
            								<td style="border:none;">
            									<div class="col-sm-7">
                                                    <div data-tip="masukan kondisi armada">
            										<input type="text" class="form-control" name="kondisi" id="kondisi">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Lokasi Sekarang</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan lokasi armada sekarang">
            										<input type="text" class="form-control" name="lokasi" id="lokasi">
                                                </div>
            									</div>
            								</td>
            							</tr>
            							<tr>
            								<td style="border:none; padding-top:15px;">Bukti Kepemilikan</td>
            								<td style="border:none;">
            									<div class="col-sm-12">
                                                    <div data-tip="masukan bukti kepemilikan armada">
            										<input type="text" class="form-control" name="bukti" id="bukti">
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

        <!-- modal confirm delete armada -->
        <div class="modal fade" id="confirmArmadaModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('VendorController@deletearmada')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus data Armada <input style="border:none;" type="text" 
                                    id="namaarmada" name="namaarmada"> 
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
        <!-- modal confirm delete armada -->

		<div class="row">
				<table class="table table-bordered table-hover">
					<thead>
						<th width="50" style="text-align:center;">No.</th>
						<th style="text-align:center;">Jenis Armada</th>
						<th style="text-align:center;">Jumlah</th>
						<th style="text-align:center;">Kapasitas</th>
						<th style="text-align:center;">Merk/Type</th>
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
                                <td><?php echo $row->JenisArmada ?></td>
                                <td><?php echo $row->Jumlah.' Unit' ?></td>
                                <td><?php echo $row->Kapasitas ?></td>
                                <td><?php echo $row->Merk ?></td>
                                <td style="text-align:center;">
                                    <a href="" onclick="document.getElementById('jenis').value='<?php echo $row->JenisArmada ?>';
                                                        document.getElementById('jenis').setAttribute('readOnly','true');
                                                        document.getElementById('jumlah').value='<?php echo $row->Jumlah ?>';
                                                        $('#jumlah').attr('readonly', false);
                                                        document.getElementById('kapasitas').value='<?php echo $row->Kapasitas ?>';
                                                        $('#kapasitas').attr('readonly', false);
                                                        document.getElementById('merk').value='<?php echo $row->Merk ?>';
                                                        $('#merk').attr('readonly', false);
                                                        document.getElementById('tahun').value='<?php echo $row->TahunKeluaran ?>';
                                                        $('#tahun').attr('readonly', false);
                                                        document.getElementById('kondisi').value='<?php echo $row->Kondisi ?>';
                                                        $('#kondisi').attr('readonly', false);
                                                        document.getElementById('lokasi').value='<?php echo $row->LokasiSekarang ?>';
                                                        $('#lokasi').attr('readonly', false);
                                                        document.getElementById('bukti').value='<?php echo $row->BuktiKepemilikan ?>';
                                                        $('#bukti').attr('readonly', false);
                                                        <?php if(($row->JumlahCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('jumlah').setAttribute('readOnly','true');
                                                        document.getElementById('jumlah').style.background = '#eee'; 
                                                        document.getElementById('jumlah').style.color = '#555';
                                                        <?php } else if($row->JumlahCk=='0') { ?>
                                                        document.getElementById('jumlah').style.background = 'red';
                                                        document.getElementById('jumlah').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('jumlah').style.background = '#FFF';
                                                        document.getElementById('jumlah').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->KapasitasCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('kapasitas').setAttribute('readOnly','true');
                                                        document.getElementById('kapasitas').style.background = '#eee'; 
                                                        document.getElementById('kapasitas').style.color = '#555';
                                                        <?php } else if($row->KapasitasCk=='0') { ?>
                                                        document.getElementById('kapasitas').style.background = 'red';
                                                        document.getElementById('kapasitas').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('kapasitas').style.background = '#FFF';
                                                        document.getElementById('kapasitas').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->MerkCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('merk').setAttribute('readOnly','true');
                                                        document.getElementById('merk').style.background = '#eee'; 
                                                        document.getElementById('merk').style.color = '#555';
                                                        <?php } else if($row->MerkCk=='0') { ?>
                                                        document.getElementById('merk').style.background = 'red';
                                                        document.getElementById('merk').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('merk').style.background = '#FFF';
                                                        document.getElementById('merk').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->TahunKeluaranCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('tahun').setAttribute('readOnly','true');
                                                        document.getElementById('tahun').style.background = '#eee'; 
                                                        document.getElementById('tahun').style.color = '#555';
                                                        <?php } else if($row->TahunKeluaranCk=='0') { ?>
                                                        document.getElementById('tahun').style.background = 'red';
                                                        document.getElementById('tahun').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('tahun').style.background = '#FFF';
                                                        document.getElementById('tahun').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->KondisiCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('kondisi').setAttribute('readOnly','true');
                                                        document.getElementById('kondisi').style.background = '#eee'; 
                                                        document.getElementById('kondisi').style.color = '#555';
                                                        <?php } else if($row->KondisiCk=='0') { ?>
                                                        document.getElementById('kondisi').style.background = 'red';
                                                        document.getElementById('kondisi').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('kondisi').style.background = '#FFF';
                                                        document.getElementById('kondisi').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->LokasiSekarangCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('lokasi').setAttribute('readOnly','true');
                                                        document.getElementById('lokasi').style.background = '#eee'; 
                                                        document.getElementById('lokasi').style.color = '#555';
                                                        <?php } else if($row->LokasiSekarangCk=='0') { ?>
                                                        document.getElementById('lokasi').style.background = 'red';
                                                        document.getElementById('lokasi').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('lokasi').style.background = '#FFF';
                                                        document.getElementById('lokasi').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->BuktiKepemilikanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('bukti').setAttribute('readOnly','true');
                                                        document.getElementById('bukti').style.background = '#eee'; 
                                                        document.getElementById('bukti').style.color = '#555';
                                                        <?php } else if($row->BuktiKepemilikanCk=='0') { ?>
                                                        document.getElementById('bukti').style.background = 'red';
                                                        document.getElementById('bukti').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('bukti').style.background = '#FFF';
                                                        document.getElementById('bukti').style.color = '#555';
                                                        <?php } ?>"
                                        data-toggle="modal" data-target="#armadaModal">
                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                    <a href="" onclick="document.getElementById('namaarmada').value='<?php echo $row->JenisArmada ?>';"
                                            data-toggle="modal" data-target="#confirmArmadaModal">
                                        <i class="fa fa-trash-o"></i> Hapus</a>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                        <?php } ?>
					</tbody>
				</table>
                <?php if(!is_null($dataHasil)) { ?>
                <?php  if($dataHasil->PersetujuanVerifikasi<>'Y' || $dataHasil->Status==2) { ?>
				    <input type="button" value="Tambah Armada" class="btn btn-submit btn-primary" 
                        data-toggle="modal" data-target="#armadaModal"
                        onclick="document.getElementById('jenis').value='';
                                $('#jenis').attr('readonly', false);
                                document.getElementById('jumlah').value='';
                                $('#jumlah').attr('readonly', false);
                                document.getElementById('kapasitas').value='';
                                $('#kapasitas').attr('readonly', false);
                                document.getElementById('merk').value='';
                                $('#merk').attr('readonly', false);
                                document.getElementById('tahun').value='';
                                $('#tahun').attr('readonly', false);
                                document.getElementById('kondisi').value='';
                                $('#kondisi').attr('readonly', false);
                                document.getElementById('lokasi').value='';
                                $('#lokasi').attr('readonly', false);
                                document.getElementById('bukti').value='';
                                $('#bukti').attr('readonly', false);">
                <?php } ?>
                <?php }else { ?>
                    <input type="button" value="Tambah Armada" class="btn btn-submit btn-primary" 
                        data-toggle="modal" data-target="#armadaModal"
                        onclick="document.getElementById('jenis').value='';
                                $('#jenis').attr('readonly', false);
                                document.getElementById('jumlah').value='';
                                $('#jumlah').attr('readonly', false);
                                document.getElementById('kapasitas').value='';
                                $('#kapasitas').attr('readonly', false);
                                document.getElementById('merk').value='';
                                $('#merk').attr('readonly', false);
                                document.getElementById('tahun').value='';
                                $('#tahun').attr('readonly', false);
                                document.getElementById('kondisi').value='';
                                $('#kondisi').attr('readonly', false);
                                document.getElementById('lokasi').value='';
                                $('#lokasi').attr('readonly', false);
                                document.getElementById('bukti').value='';
                                $('#bukti').attr('readonly', false);">
                <?php } ?>
		</div>

        <table align=center>
            <tr align=center>
                <td align=center>
                    <?php  if($dataHasil->PersetujuanVerifikasi<>'Y' || $dataHasil->Status==2) { ?>
                    <br />
                    <a href="<?php echo 'datakeuangan' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                    <a href="<?php echo 'pengalamanperusahaan' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
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