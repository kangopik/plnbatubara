@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#LuasKonsensi').mask("#.##0", {reverse: true});
	$('#JumlahPIT').mask("#.##0", {reverse: true});
	$('#LuasOpenArea').mask("#.##0", {reverse: true});
	$('#LuasPIT').mask("#.##0", {reverse: true});
	$('#SR').mask("#.##0", {reverse: true});
	$('#BESR').mask("#.##0", {reverse: true});
	$('#JumlahSEAM').mask("#.##0", {reverse: true});
	$('#KemiringanSEAM').mask("#.##0", {reverse: true});
	$('#KetebalanSEAM').mask("#.##0", {reverse: true});
	$('#BDerajat').mask("#.##0,00", {reverse: true});
	$('#BMenit').mask("#.##0,00", {reverse: true});
	$('#BDetik').mask("#.##0,00", {reverse: true});
	$('#LDerajat').mask("#.##0,00", {reverse: true});
	$('#LMenit').mask("#.##0,00", {reverse: true});
	$('#LDetik').mask("#.##0,00", {reverse: true});

	$("#jeniskawasan").hide();
	$("#trcatatan").hide();

	var kawas = $('#KawasanHutan').val();
	if(kawas == 'Masuk Kawasan Hutan'){
		$("#jeniskawasan").show();
	}else if (kawas == 'Tidak Masuk Dan Masuk Kawasan'){
		$("#jeniskawasan").show();
	}else{
		$("#jeniskawasan").hide();
	}

	$('#KawasanHutan').on('change',function(e){
		var kws = $('#KawasanHutan').val();

		if(kws == 'Masuk Kawasan Hutan'){
			$("#jeniskawasan").show();
		}else if (kws == 'Tidak Masuk Dan Masuk Kawasan'){
			$("#jeniskawasan").show();
		}else{
			$("#jeniskawasan").hide();
		}
	});

	var provId = $('#Provinsi').val();
	var kotaId = 0;
	var kecamatanId = 0;
	var kelurahanId = 0;
	
	if(provId > 0){
		var kotaId = $('#KotaId').val();
		$.ajax({
            url:'KotaDDL/'+provId+'/'+kotaId,
            type:'GET',
            success:function(data){
                $('#Kota').empty();
                $('#Kota').append("<option value=''>-- Pilih Kota/Kabupaten --</option>");
                $('#Kota').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });

        var kecamatanId = $('#KecamatanId').val();
        $.ajax({
            url:'KecamatanDDL/'+kotaId+'/'+kecamatanId,
            type:'GET',
            success:function(data){
                $('#Kecamatan').empty();
                $('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
                $('#Kecamatan').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });

        var kelurahanId = $('#KelurahanId').val();
        $.ajax({
            url:'KelurahanDDL/'+kecamatanId+'/'+kelurahanId,
            type:'GET',
            success:function(data){
                $('#Kelurahan').empty();
                $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                $('#Kelurahan').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
	}

	$('#Provinsi').on('change',function(e){
        provId = $('#Provinsi').val();
        if(provId > 0){
        	$.ajax({
                url:'KotaDDL/'+provId+'/0',
                type:'GET',
                success:function(data){
                    $('#Kota').empty();
                    $('#Kota').append("<option value=''>-- Pilih Kota/Kabupaten --</option>");
                    $('#Kota').append(data);
                    $('#Kecamatan').empty();
            		$('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
            		$('#Kelurahan').empty();
            		$('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
        	$('#Kota').empty();
            $('#Kota').append("<option value=''>-- Pilih Kota/Kabupaten --</option>");
            $('#Kecamatan').empty();
    		$('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
    		$('#Kelurahan').empty();
    		$('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
        }
    });

	$('#Kota').on('change',function(e){
        kotaId = $('#Kota').val();
        if(kotaId > 0){
        	$.ajax({
                url:'KecamatanDDL/'+kotaId+'/0',
                type:'GET',
                success:function(data){
                    $('#Kecamatan').empty();
            		$('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
            		$('#Kecamatan').append(data);
            		$('#Kelurahan').empty();
            		$('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
            $('#Kecamatan').empty();
    		$('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
    		$('#Kelurahan').empty();
    		$('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
        }
    });

    $('#Kecamatan').on('change',function(e){
        kecamatanId = $('#Kecamatan').val();
        if(kecamatanId > 0){
        	$.ajax({
                url:'KelurahanDDL/'+kecamatanId+'/0',
                type:'GET',
                success:function(data){
            		$('#Kelurahan').empty();
            		$('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
            		$('#Kelurahan').append(data);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
    		$('#Kelurahan').empty();
    		$('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
        }
    });
});
</script>
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="active">
                            <a href="javascript:void(0);">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datakapasitasproduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'dataeksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datastockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datajetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
        		<input type="hidden" id="KotaId" value="{{$data1->Kota}}">
        		<input type="hidden" id="KecamatanId" value="{{$data1->Kecamatan}}">
        		<input type="hidden" id="KelurahanId" value="{{$data1->Kelurahan}}">
        		<form action="{{action('VendorController@savedatatambang')}}" method="post">
        			<table class="table table-bordered">
        				<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        				<tbody>
        					<tr class="success">
								<th colspan="6">Data Legal</th>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Nama Pemegang IUP</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-12">
										<div data-tip="masukan nama konsensi">
											<input type='text' class='form-control' name="NamaKonsensi" id="NamaKonsensi" value="{{$data1->NamaKonsensi}}" 
													
												<?php if(($data1->NamaKonsensiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->NamaKonsensiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">No. IUP</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-8">
										<input type='text' class='form-control' name="NoIUPOP" id="NoIUPOP" value="{{$data2->NoIUPOP}}" readonly="true"></input>
									</div>
								</td>
							</tr>
							<!-- <tr>
								<td style="border:none; border-top:none;" width="180">Status Kerjasama</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-12">
										<div data-tip="masukan status kerjasama">
											<input type='text' class='form-control' name="StatusKerjasama" id="StatusKerjasama" value="{{$data1->StatusKerjasama}}" 
													
												<?php //if(($data1->StatusKerjasamaCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)) //{ ?> readonly="true"
												<?php //}else if ($data1->StatusKerjasamaCk=='0') //{ ?> style="background-color:red; color:white;" <?php //}?>
											></input>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">No. CNC</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-8">
										<input type='text' class='form-control' name="NoCNC" id="NoCNC" value="{{$data2->NoCNC}}" readonly="true"></input>
									</div>
								</td>
							</tr> -->
							<tr>
								<td style="border:none; border-top:none;" width="180">Luas IUP OP</td>
								<td style="border:none; border-top:none;" colspan="2"><a style="font-size:16px;">Ha</a>
									<div class="col-sm-8">
										<div data-tip="masukan luas iup op">
											<input type='text' class='form-control' name="LuasKonsensi" id="LuasKonsensi" value="{{$data1->LuasKonsensi}}" 
													 onkeypress="return isDecimal(event)"
												<?php if(($data1->LuasKonsensiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->LuasKonsensiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">Jumlah PIT</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-8">
										<div data-tip="masukan jumlah PIT">
											<input type='text' class='form-control' name="JumlahPIT" id="JumlahPIT" value="{{$data1->JumlahPIT}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->JumlahPITCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->JumlahPITCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Luas Open Area IUP OP</td>
								<td style="border:none; border-top:none;" colspan="2"><a style="font-size:16px;">Ha</a>
									<div class="col-sm-8">
										<div data-tip="masukan luas open area iup op">
											<input type='text' class='form-control' name="LuasOpenArea" id="LuasOpenArea" value="{{$data1->LuasOpenArea}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->LuasOpenAreaCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->LuasOpenAreaCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">Luas PIT</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-8">
										<div data-tip="masukan luas PIT">
											<input type='text' class='form-control' name="LuasPIT" id="LuasPIT" value="{{$data1->LuasPIT}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->LuasPITCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->LuasPITCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">S/R</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-8">
										<div data-tip="masukan s/r">
											<input type='text' class='form-control' name="SR" id="SR" value="{{$data1->SR}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->SRCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->SRCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">BESR</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-8">
										<div data-tip="masukan luas BESR">
											<input type='text' class='form-control' name="BESR" id="BESR" value="{{$data1->BESR}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->BESRCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->BESRCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Jumlah SEAM</td>
								<td style="border:none; border-top:none;" colspan="5">
									<div class="col-sm-3">
										<div data-tip="masukan jumlah SEAM">
											<input type='text' class='form-control' name="JumlahSEAM" id="JumlahSEAM" value="{{$data1->JumlahSEAM}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->JumlahSEAMCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->JumlahSEAMCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>								
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Rata-rata Kemiringan SEAM</td>
								<td style="border:none; border-top:none;" colspan="2"><sup>0</sup>
									<div class="col-sm-8">
										<div data-tip="masukan rata-rata kemiringan SEAM">
											<input type='text' class='form-control' name="KemiringanSEAM" id="KemiringanSEAM" value="{{$data1->KemiringanSEAM}}" 
													onkeypress="return isDecimal(event)"
												<?php if(($data1->KemiringanSEAMCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->KemiringanSEAMCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">Rata-rata Ketebalan SEAM (*)</td>
								<td style="border:none; border-top:none;" colspan="2"><a style="font-size:16px;">m</a>
									<div class="col-sm-8">
										<div data-tip="masukan rata-rata ketebalan SEAM">
											<input type='text' class='form-control' name="KetebalanSEAM" id="KetebalanSEAM" value="{{$data1->KetebalanSEAM}}" 
													required="required" onkeypress="return isDecimal(event)"
												<?php if(($data1->KetebalanSEAMCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->KetebalanSEAMCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
											></input>
										</div>
									</div>
								</td>
							</tr>
							<tr class="success">
								<th colspan="6">Data Lokasi</th>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Area IUP OP</td>
								<td style="border:none; border-top:none;" colspan="5">
									<div class="col-sm-4">
										<div data-tip="masukan area iup op">
											<select name='KawasanHutan' id='KawasanHutan' class='form-control'
												<?php if(($data1->KawasanHutanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
												|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->KawasanHutanCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
													<option value="" selected>- Pilih Area IUP OP -</option>
													<?php if($data1->KawasanHutan == 'Masuk Kawasan Hutan') { ?> 
													<option value="Masuk Kawasan Hutan" selected>Masuk Kawasan Hutan</option>
													<?php }else{ ?>
													<option value="Masuk Kawasan Hutan" >Masuk Kawasan Hutan</option> 
													<?php } if($data1->KawasanHutan == 'Tidak Masuk Kawasan Hutan') { ?>
													<option value="Tidak Masuk Kawasan Hutan" selected>Tidak Masuk Kawasan Hutan</option>
													<?php }else{ ?>
													<option value="Tidak Masuk Kawasan Hutan" >Tidak Masuk Kawasan Hutan</option>
													<?php } if($data1->KawasanHutan == 'Tidak Masuk Dan Masuk Kawasan') { ?>
													<option value="Tidak Masuk Dan Masuk Kawasan" selected>Masuk dan Tidak Masuk Kawasan Hutan</option>
													<?php }else{ ?>
													<option value="Tidak Masuk Dan Masuk Kawasan" >Masuk dan Tidak Masuk Kawasan Hutan</option>
													<?php } ?>
												</select>
										</div>
									</div>
								</td>
							</tr>
							<tr id="jeniskawasan">
								<td style="border:none; border-top:none;"></td>
								<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
									<div class='col-sm-10'>
										<input type="radio" name="JenisKawasan" value="Produksi"
											<?php if(($data1->JenisKawasan) == "Produksi"){ ?> checked <?php }  ?>	
											<?php if(($data1->KawasanHutanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
											|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true" 
											<?php } ?>
											> Produksi &nbsp;&nbsp;&nbsp;</input>
										<input type="radio" name="JenisKawasan" value="Lindung" 
											<?php if(($data1->JenisKawasan) == "Lindung"){ ?> checked <?php }  ?>	
											<?php if(($data1->KawasanHutanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
											|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true" 
											<?php } ?>
											> Lindung &nbsp;&nbsp;&nbsp;</input>
										<input type="radio" name="JenisKawasan" value="Lainnya" 
											<?php if(($data1->JenisKawasan) == "Lainnya"){ ?> checked <?php }  ?>	
											<?php if(($data1->KawasanHutanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
											|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true" 
											<?php } ?>
											> Lainnya &nbsp;&nbsp;&nbsp;</input>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Provinsi *)</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-10">
										<div data-tip="pilih provinsi">
											<select name="Provinsi" id="Provinsi" class="form-control" required="required"
			                                    <?php if(($data1->ProvinsiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
			                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->ProvinsiCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
												<?php if(($data1->ProvinsiCk == '1') || ($data1->PersetujuanVerifikasi == 'Y' && $data1->Status==1)
													|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { 
													} else { ?>
													<option value="">- Pilih Provinsi -</option>
												<?php
													}
									     			foreach($dataProvinsi as $r){
									     				if(($data1->ProvinsiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
									     					|| ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) {
									     					if($r->ProvinsiId == $data1->Provinsi){
									     		?>
									     						<option value="<?= $r->ProvinsiId; ?>" selected><?= $r->ProvinsiName ?></option>
									     		<?php
									     					}
									     				}else{
									     					if($r->ProvinsiId == $data1->Provinsi){
									     		?>
									     						<option value="<?= $r->ProvinsiId; ?>" selected><?= $r->ProvinsiName ?></option>
									     		<?php
									     					}else{
									     		?>
									     						<option value="<?= $r->ProvinsiId; ?>"><?= $r->ProvinsiName ?></option>
									     		<?php
									     					}
									     				}
									     			}
									     		?>
			                                </select>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">Kota/Kabupaten</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-10">
										<div data-tip="pilih kota">
											<select name="Kota" id="Kota" class="form-control"
			                                    <?php if(($data1->KotaCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
			                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->KotaCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
												<option value="">- Pilih Kota/Kabupaten -</option>
			                                </select>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none; border-top:none;" width="180">Kecamatan</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-10">
										<div data-tip="pilih kecamatan">
											<select name="Kecamatan" id="Kecamatan" class="form-control"
			                                    <?php if(($data1->KecamatanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
			                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->KecamatanCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
												<option value="">- Pilih Kecamatan -</option>
			                                </select>
										</div>
									</div>
								</td>
								<td style="border:none; border-top:none;" width="180">Kelurahan</td>
								<td style="border:none; border-top:none;" colspan="2">
									<div class="col-sm-10">
										<div data-tip="pilih kelurahan">
											<select name="Kelurahan" id="Kelurahan" class="form-control"
			                                    <?php if(($data1->KelurahanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
			                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
												<?php }else if ($data1->KelurahanCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
												<option value="">- Pilih Kelurahan -</option>
			                                </select>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" colspan="7">
									<table class="table table-bordered table-hover">
										<tbody>
										<?php if($dataKoor != null) { ?>
										<?php
											$counter = 1;
		                            		foreach($dataKoor as $row){
		                        		?>
		                        		<tr>
											<th style="text-align:center;" width=50>Titik</th>
											<th style="text-align:center;" width=120 colspan="3"><?php echo $row->Bujur ?></th>
											<th style="text-align:center;" width=120 colspan="3"><?php echo $row->Lintang ?></th>
											<th style="text-align:center;" width=120></th>	
										</tr>
										<tr>
											<th style="text-align:center;" width=50></th>
											<th style="text-align:center;" width=120><sup>0</sup></th>
											<th style="text-align:center;" width=120>‘</th>
											<th style="text-align:center;" width=120>“</th>
											<th style="text-align:center;" width=120><sup>0</sup></th>
											<th style="text-align:center;" width=120>‘</th>
											<th style="text-align:center;" width=120>“</th>
											<th style="text-align:center;" width=120>Aksi</th>	
										</tr>
			                        	<tr>
		                        			<td> <?php echo $counter ?></td>
	                        				<td> <?php echo $row->BDerajat ?></td>
	                        				<td> <?php echo $row->BMenit ?></td>
	                        				<td> <?php echo $row->BDetik ?></td>
	                        				<td> <?php echo $row->LDerajat ?></td>
	                        				<td> <?php echo $row->LMenit ?></td>
	                        				<td> <?php echo $row->LDetik ?></td>
	                        				<td style="text-align:center;">
	                        					<?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 ^ $data1->StatusPakta == 'N') { ?>
		                        					<a href="" onclick="document.getElementById('Id').value='<?php echo $row->Id ?>';
		                                								document.getElementById('UserId').value='<?php echo $row->UserId ?>';
		                                								document.getElementById('AsalTambang').value='<?php echo $row->AsalTambang ?>';
		                                								document.getElementById('JenisIjin').value='<?php echo $row->JenisIjin ?>';
		                                								document.getElementById('Bujur').value='<?php echo $row->Bujur ?>';
		                                								document.getElementById('Lintang').value='<?php echo $row->Lintang ?>';
		                                								document.getElementById('BDerajat').value='<?php echo $row->BDerajat ?>';
		                                								<?php if($row->BDerajatCk=='1') { ?>
				                                                        document.getElementById('BDerajat').setAttribute('readOnly','true');
				                                                        document.getElementById('BDerajat').style.background = '#eee'; 
				                                                        document.getElementById('BDerajat').style.color = '#555';
				                                                        <?php } else if($row->BDerajatCk=='0') { ?>
				                                                        document.getElementById('BDerajat').style.background = 'red';
				                                                        document.getElementById('BDerajat').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('BDerajat').style.background = '#FFF';
				                                                        document.getElementById('BDerajat').style.color = '#555';
				                                                        <?php } ?>
		                                								document.getElementById('BMenit').value='<?php echo $row->BMenit ?>';
		                                								<?php if($row->BMenitCk=='1') { ?>
				                                                        document.getElementById('BMenit').setAttribute('readOnly','true');
				                                                        document.getElementById('BMenit').style.background = '#eee'; 
				                                                        document.getElementById('BMenit').style.color = '#555';
				                                                        <?php } else if($row->BMenitCk=='0') { ?>
				                                                        document.getElementById('BMenit').style.background = 'red';
				                                                        document.getElementById('BMenit').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('BMenit').style.background = '#FFF';
				                                                        document.getElementById('BMenit').style.color = '#555';
				                                                        <?php } ?>
				                                                        document.getElementById('BDetik').value='<?php echo $row->BDetik ?>';
		                                								<?php if($row->LDetikCk=='1') { ?>
				                                                        document.getElementById('BDetik').setAttribute('readOnly','true');
				                                                        document.getElementById('BDetik').style.background = '#eee'; 
				                                                        document.getElementById('BDetik').style.color = '#555';
				                                                        <?php } else if($row->BDetikCk=='0') { ?>
				                                                        document.getElementById('BDetik').style.background = 'red';
				                                                        document.getElementById('BDetik').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('BDetik').style.background = '#FFF';
				                                                        document.getElementById('BDetik').style.color = '#555';
				                                                        <?php } ?>
				                                                        document.getElementById('LDerajat').value='<?php echo $row->LDerajat ?>';
		                                								<?php if($row->LDerajatCk=='1') { ?>
				                                                        document.getElementById('LDerajat').setAttribute('readOnly','true');
				                                                        document.getElementById('LDerajat').style.background = '#eee'; 
				                                                        document.getElementById('LDerajat').style.color = '#555';
				                                                        <?php } else if($row->LDerajatCk=='0') { ?>
				                                                        document.getElementById('LDerajat').style.background = 'red';
				                                                        document.getElementById('LDerajat').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('LDerajat').style.background = '#FFF';
				                                                        document.getElementById('LDerajat').style.color = '#555';
				                                                        <?php } ?>
		                                								document.getElementById('LMenit').value='<?php echo $row->LMenit ?>';
		                                								<?php if($row->LMenitCk=='1') { ?>
				                                                        document.getElementById('LMenit').setAttribute('readOnly','true');
				                                                        document.getElementById('LMenit').style.background = '#eee'; 
				                                                        document.getElementById('LMenit').style.color = '#555';
				                                                        <?php } else if($row->LMenitCk=='0') { ?>
				                                                        document.getElementById('LMenit').style.background = 'red';
				                                                        document.getElementById('LMenit').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('LMenit').style.background = '#FFF';
				                                                        document.getElementById('LMenit').style.color = '#555';
				                                                        <?php } ?>
				                                                        document.getElementById('LDetik').value='<?php echo $row->LDetik ?>';
		                                								<?php if($row->LDetikCk=='1') { ?>
				                                                        document.getElementById('LDetik').setAttribute('readOnly','true');
				                                                        document.getElementById('LDetik').style.background = '#eee'; 
				                                                        document.getElementById('LDetik').style.color = '#555';
				                                                        <?php } else if($row->LDetikCk=='0') { ?>
				                                                        document.getElementById('LDetik').style.background = 'red';
				                                                        document.getElementById('LDetik').style.color = '#FFF';
				                                                        <?php } else { ?>
				                                                        document.getElementById('LDetik').style.background = '#FFF';
				                                                        document.getElementById('LDetik').style.color = '#555';
				                                                        <?php } ?>
		                                                        		$('#NamaKonsensi_h').val($('#NamaKonsensi').val());
																		$('#StatusKerjasama_h').val($('#StatusKerjasama').val());
																		$('#LuasKonsensi_h').val($('#LuasKonsensi').val());
																		$('#JumlahPIT_h').val($('#JumlahPIT').val());
																		$('#LuasOpenArea_h').val($('#LuasOpenArea').val());
																		$('#LuasPIT_h').val($('#LuasPIT').val());
																		$('#SR_h').val($('#SR').val());
																		$('#BESR_h').val($('#BESR').val());
																		$('#JumlahSEAM_h').val($('#JumlahSEAM').val());
																		$('#KemiringanSEAM_h').val($('#KemiringanSEAM').val());
																		$('#KetebalanSEAM_h').val($('#KetebalanSEAM').val());
																		$('#KawasanHutan_h').val($('#KawasanHutan').val());
																		$('#Provinsi_h').val($('#Provinsi').val());
																		$('#Kota_h').val($('#Kota').val());
																		$('#Kecamatan_h').val($('#Kecamatan').val());
																		$('#Kelurahan_h').val($('#Kelurahan').val());
																		$('#Catatan_h').val($('#Catatan').val());
																		$('#JenisKawasan_h').val($('#JenisKawasan').val());"
		                                        						data-toggle="modal" data-target="#formModal">
		                                        						<i class="fa fa-pencil-square-o"></i> Ubah</a> |
		                                    			<a href="" onclick="document.getElementById('id2').value='<?php echo $row->Id ?>'";
		                                           			 			data-toggle="modal" data-target="#confirmModal">
		                                        						<i class="fa fa-trash-o"></i> Hapus</a>
		                                        	<?php } ?>
		                        				</td>
		                       			 	</tr>
			                        		<?php $counter++; } ?>
			                        		<?php } ?>
										</tbody>
									</table>
									<?php if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 ^ $data1->StatusPakta == 'N') { ?>
									<input type="button" value="Tambah Koordinat" class="btn btn-submit  btn-primary" 
							            data-toggle="modal" data-target="#formModal"
							            onclick="document.getElementById('Id').value='';
                								document.getElementById('Bujur').value='';
                								document.getElementById('BDerajat').value='';
							                    document.getElementById('BMenit').value='';
							                    document.getElementById('BDetik').value='';
				                                document.getElementById('BDerajat').style.background = '#FFF';
				                                document.getElementById('BDerajat').style.color = '#555';
				                                document.getElementById('BMenit').style.background = '#FFF';
				                                document.getElementById('BMenit').style.color = '#555';
				                                document.getElementById('BDetik').style.background = '#FFF';
				                                document.getElementById('BDetik').style.color = '#555';
				                                document.getElementById('Lintang').value='';
                								document.getElementById('LDerajat').value='';
							                    document.getElementById('LMenit').value='';
							                    document.getElementById('LDetik').value='';
				                                document.getElementById('LDerajat').style.background = '#FFF';
				                                document.getElementById('LDerajat').style.color = '#555';
				                                document.getElementById('LMenit').style.background = '#FFF';
				                                document.getElementById('LMenit').style.color = '#555';
				                                document.getElementById('LDetik').style.background = '#FFF';
				                                document.getElementById('LDetik').style.color = '#555';
				                                $('#NamaKonsensi_h').val($('#NamaKonsensi').val());
												$('#StatusKerjasama_h').val($('#StatusKerjasama').val());
												$('#LuasKonsensi_h').val($('#LuasKonsensi').val());
												$('#JumlahPIT_h').val($('#JumlahPIT').val());
												$('#LuasOpenArea_h').val($('#LuasOpenArea').val());
												$('#LuasPIT_h').val($('#LuasPIT').val());
												$('#SR_h').val($('#SR').val());
												$('#BESR_h').val($('#BESR').val());
												$('#JumlahSEAM_h').val($('#JumlahSEAM').val());
												$('#KemiringanSEAM_h').val($('#KemiringanSEAM').val());
												$('#KetebalanSEAM_h').val($('#KetebalanSEAM').val());
												$('#KawasanHutan_h').val($('#KawasanHutan').val());
												$('#Provinsi_h').val($('#Provinsi').val());
												$('#Kota_h').val($('#Kota').val());
												$('#Kecamatan_h').val($('#Kecamatan').val());
												$('#Kelurahan_h').val($('#Kelurahan').val());
												$('#Catatan_h').val($('#Catatan').val());
												$('#JenisKawasan_h').val($('#JenisKawasan').val());" >
							        <?php } ?>
								</td>
							</tr>
							<tr id="trcatatan">
                                <td style="border:none; border-top:none;">Catatan</td>
                                <td style="border:none; border-top:none;" colspan="5">
                                    <div class="col-sm-12">
                                        <div data-tip="masukan catatan">
                                            <textarea class='form-control' name="Catatan" id="Catatan" 
                                                    value="{{$data1->Catatan}}"
                                                    <?php if(($data1->CatatanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->CatatanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>>{{$data1->Catatan}}</textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
        				</tbody>
	        		</table>
	        		<table width="100%">
						<tr>			
							<?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>		
							<td width=50%>
								<a href="<?php echo 'datateknistambang' ?>" class="btn btn-primary btn-block btn-flat" 
					                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
					                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
					                        Sebelumnya</a>
		                    </td>
							<td width=50%>
								<button style="text-transform:none; width:150px;" type="submit" 
									class="btn btn-submit  btn-primary" id="btnnext">
									Selanjutnya
								<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
							</td>
							<?php } ?>
		                </tr>
		            </table>
	        	</form>
        		<p> <br /> (*) Rincian nama SEAM dan ketebalannya <br />
					(**) Probable reserves/proved reserves <br />
				</p>	
        	</div>
        </div>
    </div>
</div>

<!-- modal konfirmasi sumber tambang end -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <form action="{{action('VendorController@deletekortambang')}}" method="post">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <input type="hidden" name="id2" id="id2">
                    <div class="modal-body">
                        <h4>Anda yakin akan menghapus data ini
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
<!-- modal konfirmasi koordinat end -->

<!-- modal koordinat begin -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
            	<div class="modal-header">
    				<h4 class="modal-title" id="koordinatModalLabel">Koordinat</h4>
  				</div>
  				<div class="modal-body">
                	<form action="{{action('VendorController@savekortambang')}}" method="post">
                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                		<input type="hidden" name="Id" id="Id">
                		<input type="hidden" name="UserId" id="UserId">
                		<input type="hidden" name="AsalTambang" id="AsalTambang">
                		<input type="hidden" name="JenisIjin" id="JenisIjin">
                		<input type="hidden" name="NamaKonsensi_h" id="NamaKonsensi_h">
                		<input type="hidden" name="StatusKerjasama_h" id="StatusKerjasama_h">
                		<input type="hidden" name="LuasKonsensi_h" id="LuasKonsensi_h">
                		<input type="hidden" name="JumlahPIT_h" id="JumlahPIT_h">
                		<input type="hidden" name="LuasOpenArea_h" id="LuasOpenArea_h">
                		<input type="hidden" name="LuasPIT_h" id="LuasPIT_h">
                		<input type="hidden" name="SR_h" id="SR_h">
                		<input type="hidden" name="BESR_h" id="BESR_h">
                		<input type="hidden" name="JumlahSEAM_h" id="JumlahSEAM_h">
                		<input type="hidden" name="KemiringanSEAM_h" id="KemiringanSEAM_h">
                		<input type="hidden" name="KetebalanSEAM_h" id="KetebalanSEAM_h">
                		<input type="hidden" name="KawasanHutan_h" id="KawasanHutan_h">
                		<input type="hidden" name="Provinsi_h" id="Provinsi_h">
                		<input type="hidden" name="Kota_h" id="Kota_h">
                		<input type="hidden" name="Kecamatan_h" id="Kecamatan_h">
                		<input type="hidden" name="Kelurahan_h" id="Kelurahan_h">
                		<input type="hidden" name="Catatan_h" id="Catatan_h">
                		<input type="hidden" name="JenisKawasan_h" id="JenisKawasan_h">
                		<table class="table table-bordered" style="border:none;">
    						<tbody>
    							<tr>
    								<td style="border:none; border-top:none;" width=150>Bujur</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan bujur">	
												<select name='Bujur' id='Bujur' class='form-control' required='required'>
													<option value="" selected>- Pilih Bujur -</option>
													<option value="Bujur Timur" >Timur</option>
													<option value="Bujur Barat" >Barat</option> 
												</select>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=150><sup>0</sup></td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan derajat">	
												<input type='text' class='form-control' name="BDerajat" id="BDerajat" 
                                                    onkeypress="return isDecimal(event)" ></input>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>‘</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan menit">	
												<input type='text' class='form-control' name="BMenit" id="BMenit" 
                                                    onkeypress="return isDecimal(event)" ></input>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>“</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan detik">	
												<input type='text' class='form-control' name="BDetik" id="BDetik" 
                                                    onkeypress="return isDecimal(event)" ></input>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=150>Lintang</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan lintang">	
												<select name='Lintang' id='Lintang' class='form-control' required='required'>
													<option value="" selected>- Pilih Lintang -</option>
													<option value="Lintang Utara" >Utara</option>
													<option value="Lintang Selatan" >Selatan</option> 
												</select>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=150><sup>0</sup></td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan derajat">	
												<input type='text' class='form-control' name="LDerajat" id="LDerajat" 
                                                    onkeypress="return isDecimal(event)" ></input>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>‘</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan menit">	
												<input type='text' class='form-control' name="LMenit" id="LMenit" 
                                                    onkeypress="return isDecimal(event)" ></input>
											</div>
										</div>
									</td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>“</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
										<div class='col-sm-6'>
											<div data-tip="masukan detik">	
												<input type='text' class='form-control' name="LDetik" id="LDetik" 
                                                    onkeypress="return isDecimal(event)" ></input>
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
<!-- modal koordinat end -->

<script>
	$("#btnnext").submit(function() {
		$.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
		setTimeout($.unblockUI, 800);
	}); 
	$("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()