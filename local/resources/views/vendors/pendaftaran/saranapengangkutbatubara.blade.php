@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#kapasitas_maksimum').mask("#.##0", {reverse: false});
	$('#kapasitas_loading').mask("#.##0", {reverse: false});
	$('#kapasitas_angkut').mask("#.##0", {reverse: false});
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Data Sarana Calon Penyedia Batubara <?php if($data4->BadanUsaha == '1') { $BU = "PT"; }
                          else if($data4->BadanUsaha == '2') { $BU = "CV"; } 
                          else if($data4->BadanUsaha == '3') { $BU = "Koperasi"; }
                          else if($data4->BadanUsaha == '4') { $BU = "Lainnya";} 
                          else { $BU = '';}
                    echo $data4->Nama.','.$BU; 
                    ?></h2>

        <form action="{{action('VendorController@savesaranapengangkut')}}" method="post">
        	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
			<table class="table table-bordered">
				<tbody>
					<tr class="success">
						<th colspan="6">Dermaga</th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="280">Jenis peralatan loading yang tersedia</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-12">
								<div data-tip="masukan jenis peralatan loading">
								<input type='text' class='form-control' name="jenis_peralatan" value="{{$data->JenisPeralatan}}"
									<?php if(($data->JenisPeralatanCk=='1') || ($data->PersetujuanVerifikasi=='Y')) { ?> readonly="true" 
									<?php }else if ($data->JenisPeralatanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="200">Kapasitas maksimum  kapal / tongkang yang dapat sandar</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-3">
								<div data-tip="masukan kapasitas maksimum kapal">
								<input type='text' class='form-control' name="kapasitas_maksimum" id="kapasitas_maksimum" value="{{$data->KapasitasMaksimumKapal}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasMaksimumKapalCk=='1') || ($data->PersetujuanVerifikasi=='Y')) { ?> readonly="true" 
									<?php }else if ($data->KapasitasMaksimumKapalCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="200">Kapasitas loading per hari</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-3">
								<div data-tip="masukan kapasitas loading per hari">
								<input type='text' class='form-control' name="kapasitas_loading" id="kapasitas_loading" value="{{$data->KapasitasLoading}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasLoadingCk=='1') || ($data->PersetujuanVerifikasi=='Y')) { ?> readonly="true" 
									<?php }else if ($data->KapasitasLoadingCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr class="success">
						<th colspan="6">Vesel / Tongkang </th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="200">Tahun pembuatan</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-3">
								<div data-tip="masukan tahun pembuatan vesel/tongkang">
								<input type='text' class='form-control' name="tahun_pembuatan" value="{{$data->TahunPembuatan}}" 
									onkeypress="return isNumber(event)"
									<?php if(($data->TahunPembuatanCk=='1') || ($data->PersetujuanVerifikasi=='Y')) { ?> readonly="true" 
									<?php }else if ($data->TahunPembuatanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="200">Kapasitas angkut</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-3">
								<div data-tip="masukan kapasitas angkut vesel/tongkang">
								<input type='text' class='form-control' name="kapasitas_angkut" id="kapasitas_angkut" value="{{$data->KapasitasAngkut}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasAngkutCk=='1') || ($data->PersetujuanVerifikasi=='Y')) { ?> readonly="true" 
									<?php }else if ($data->KapasitasAngkutCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="200">Kondisi</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-12">
								<div data-tip="masukan kondisi vesel/tongkang">
								<input type='text' class='form-control' name="kondisi" value="{{$data->Kondisi}}"
									<?php if(($data->KondisiCk=='1') || ($data->PersetujuanVerifikasi=='Y')) { ?> readonly="true" 
									<?php }else if ($data->KondisiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<?php  if($data->PersetujuanVerifikasi<>'Y') { ?>
			<input style="width:25%; margin-left:40%; margin-right:40%;" type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
			<?php } ?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</form>
	</div>
</div>
@stop()