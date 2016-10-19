@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#trAdministrasi').hide();
});
</script>
<div class="row">
    <div class="col-lg-11">
		<h2 class="page-header">Data Administrasi Calon Penyedia Batubara 
				<?php echo $data->Nama.', '.$data->BadanUsaha; ?>
		</h2>
			<form action="{{action('VendorController@savedataadministrasiperusahaan')}}" method="post" id="from_submit">
			<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td style="border:none; border-top:none;" width="180">Nama Perusahaan *)</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-7">
								<div data-tip="masukan nama perusahaan anda">
								<input type='text' class='form-control' name="nama" value="{{$data->Nama}}" readonly="true" required="required"
									<?php if(($data->NamaCk=='1') || 
									($data->PersetujuanVerifikasi=='Y' && $data->Status==1) 
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->NamaCk=='0') { ?> readonly="true" style="background-color:red; color:white;" <?php }?> 
								></input>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Badan Usaha *)</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-4">
								<div data-tip="pilih badan usaha perusahaan">
									<input type='text' class='form-control' name="badanusaha" 
										value="{{$data->BadanUsaha}}" readonly="true"
									<?php if(($data->BadanUsahaCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->BadanUsahaCk=='0') { ?> readonly="true" style="background-color:red; color:white;" <?php }?> 
									></input>
								</div>
							</div>
						</td>
					</tr>
					<tr id="trAdministrasi">
						<td style="border:none; border-top:none;">Status Perusahaan Pusat/Cabang *)</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-5">
								<div data-tip="masukan status perusahaan anda">
								<input type='text' class='form-control' name="status" value="{{$data->StatusPerusahaan}}"
									<?php if(($data->StatusPerusahaanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->StatusPerusahaanCk=='0') { ?> style="background-color:red; color:white;" <?php }?> 
								></input>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Alamat *)</td>
						<td style="border:none; border-top:none;" colspan="3"> 
							<div class="col-sm-12">
								<div data-tip="masukan alamat perusahaan anda">
								<textarea rows='2' class='form-control' name="alamat" required="required"
									<?php if(($data->AlamatCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->AlamatCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								><?php echo "{$data->Alamat}" ?></textarea>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" >Tlp Kantor</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-8">
								<div data-tip="masukan no. telepon perusahaan anda">
								<input type='text' class='form-control' name="no_tlp_kantor" value="{{$data->TlpKantor}}" 
									<?php if(($data->TlpKantorCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->TlpKantorCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								onkeypress="return isNumber(event)"></input>
								</div>
							</div>
						</td>
						<td style="border:none; border-top:none;" width="120">Fax Kantor</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-8">
								<div data-tip="masukan no. fax perusahaan anda">
								<input type='text' class='form-control' name="no_fax_kantor" value="{{$data->FaxKantor}}"
									<?php if(($data->FaxKantorCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->FaxKantorCk=='0') { ?> style="background-color:red; color:white;" <?php }?> 
								onkeypress="return isNumber(event)"></input>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Email Perusahaan *)</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-12">
								<div data-tip="masukan nama email perusahaan anda">
								<input type='text' class='form-control' name="email_perusahaan" value="{{$data->Email}}" id="email_perusahaan" readonly="true" 
									<?php if(($data->EmailCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->EmailCk=='0') { ?> readonly="true" style="background-color:red; color:white;" <?php }?>
								onBlur="return cekEmailPerusahaan()" required="required"></input>
								<span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;" id="errorprs"></p></span>
								</div>
							</div>
						</td>
						<td style="border:none; border-top:none;" >Website</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-12">
								<div data-tip="masukan nama website perusahaan anda">
								<input type='text' class='form-control' name="website" value="{{$data->Website}}"
									<?php if(($data->WebsiteCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->WebsiteCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>																	
					</tr>
					<tr>
						<td style="border:none; border-top:none;" >Direktur Utama</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-6">
								<div data-tip="masukan nama direktur utama perusahaan anda">
								<input type='text' class='form-control' name="direktur_utama" value="{{$data->DirekturUtama}}"
									<?php if(($data->DirekturUtamaCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->DirekturUtamaCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Contact Person *)</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-6">
								<div data-tip="masukan nama contact person perusahaan anda">
								<input type='text' class='form-control' name="contact_person" value="{{$data->ContactPerson}}" required="required"
									<?php if(($data->ContactPersonCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->ContactPersonCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" >Tlp Contact Person*)</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-8">
								<div data-tip="masukan no. telepon contact person perusahaan anda">
								<input type='text' class='form-control' name="no_tlp_contact_person" value="{{$data->TlpContactPerson}}" 
									<?php if(($data->TlpContactPersonCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->TlpContactPersonCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								onkeypress="return isNumber(event)" required="required"></input>
								</div>
							</div>
						</td>
						<td style="border:none; border-top:none;">Email Contact Person *)</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-12">
								<div data-tip="masukan nama email contact person perusahaan anda">
								<input type='text' class='form-control' name="email_contact_person" id="email_contact_person" value="{{$data->EmailContactPerson}}" 
									<?php if(($data->EmailContactPersonCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)
									|| ($data->PersetujuanVerifikasi=='N' && $data->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data->EmailContactPersonCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								onBlur="return cekEmailCp()" required="required"></input>
								<span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;" id="errorcp"></p></span>
							</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<p><b>Catatan : *) wajib di isi<b></p>	<?php ?>
			<?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>													
			<button type="submit" id="btnSubmit" class="btn btn-submit btn-primary" style="width:25%; margin-left:40%; margin-right:40%;">Berikutnya
			<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>			
			<?php } ?> 
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</form>
    </div>
</div>

<script>
	$("form").submit(function() {
		$.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
		setTimeout($.unblockUI, 800);
    }); 
</script>

@stop()