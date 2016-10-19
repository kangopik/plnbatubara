@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#luas_area').mask("#.##0", {reverse: false});
	$('#perkiraan_volume').mask("#.##0", {reverse: false});
	$('#kapasitas_produksi').mask("#.##0", {reverse: false});
	$('#kapasitas_stock_pile').mask("#.##0", {reverse: false});
	$('#jarak').mask("#.##0", {reverse: false});
	$('#kapasitas_pengangkutan').mask("#.##0", {reverse: false});
	$('#kapasitas_stock_pile_pelabuhan').mask("#.##0", {reverse: false});

	$("#trnomoriupop").hide();
	$("#trnomoriupopk").hide();
	$("#trtanggaliupop").hide();
	$("#trtanggaliupopk").hide();
	$("#trmasaberlakuiupop").hide();
	$("#trmasaberlakuiupopk").hide();
	$("#trnomoriupopk2").hide();
	$("#trtanggaliupopk2").hide();
	$("#trmasaberlakuiupopk2").hide();
	$("#trpilihnomor").hide();

	if (document.getElementById("ijintambang").val == "1") {
		$("#trnomor").hide();
		$("#trtanggal").hide();
		$("#trmasaberlaku").hide();
		$("#trnomoriupop").show();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").show();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").show();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").hide();
	}

	if (document.getElementById("ijintambang").val == "2") {
		$("#trnomor").hide();
		$("#trtanggal").hide();
		$("#trmasaberlaku").hide();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").show();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").show();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").show();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").show();
		var tipe_id = '2';
		jQuery.ajax({
			url:'ddlnomoriupop/'+tipe_id,
            type:'GET',
            success:function(data){
                $("#pilihnoiup").empty();
                $("#pilihnoiup").append('<option value="-1">- Pilih No. IUP OP -</option>');
                $("#pilihnoiup").append(data);
            }
		});
	}

	if (document.getElementById("ijintambang").val == "3") {
		$("#trnomor").show();
		$("#trtanggal").show();
		$("#trmasaberlaku").show();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").hide();
	}

	if (document.getElementById("ijintambang").val == "4") {
		$("#trnomor").hide();
		$("#trtanggal").hide();
		$("#trmasaberlaku").hide();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").show();
		$("#trtanggaliupopk2").show();
		$("#trmasaberlakuiupopk2").show();
		$("#trpilihnomor").show();
		var tipe_id = '4';
		jQuery.ajax({
			url:'ddlnomoriupop/'+tipe_id,
            type:'GET',
            success:function(data){
                $("#pilihnoiup").empty();
                $("#pilihnoiup").append('<option value="-1">- Pilih No. IUP OP -</option>');
                $("#pilihnoiup").append(data);
            }
		});
	}

	$isiijin = $("#ijintambang").val();

	if($isiijin == "1"){
		$("#trnomor").hide();
		$("#trtanggal").hide();
		$("#trmasaberlaku").hide();
		$("#trnomoriupop").show();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").show();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").show();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").hide();
	} else if($isiijin == "2"){
		$("#trnomor").hide();
		$("#trtanggal").hide();
		$("#trmasaberlaku").hide();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").show();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").show();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").show();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").show();
		var tipe_id = '2';
		jQuery.ajax({
			url:'ddlnomoriupop/'+tipe_id,
            type:'GET',
            success:function(data){
                $("#pilihnoiup").empty();
                $("#pilihnoiup").append('<option value="-1">- Pilih No. IUP OP -</option>');
                $("#pilihnoiup").append(data);
            }
		});
	} else if($isiijin == "3") {
		$("#trnomor").show();
		$("#trtanggal").show();
		$("#trmasaberlaku").show();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").hide();
	}else if($isiijin == "4") {
		$("#trnomor").hide();
		$("#trtanggal").hide();
		$("#trmasaberlaku").hide();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").show();
		$("#trtanggaliupopk2").show();
		$("#trmasaberlakuiupopk2").show();
		$("#trpilihnomor").show();
		var tipe_id = '4';
		jQuery.ajax({
			url:'ddlnomoriupop/'+tipe_id,
            type:'GET',
            success:function(data){
                $("#pilihnoiup").empty();
                $("#pilihnoiup").append('<option value="-1">- Pilih No. IUP OP -</option>');
                $("#pilihnoiup").append(data);
            }
		});
	} else {
		$("#trnomor").show();
		$("#trtanggal").show();
		$("#trmasaberlaku").show();
		$("#trnomoriupop").hide();
		$("#trnomoriupopk").hide();
		$("#trtanggaliupop").hide();
		$("#trtanggaliupopk").hide();
		$("#trmasaberlakuiupop").hide();
		$("#trmasaberlakuiupopk").hide();
		$("#trnomoriupopk2").hide();
		$("#trtanggaliupopk2").hide();
		$("#trmasaberlakuiupopk2").hide();
		$("#trpilihnomor").hide();
	}

	$("#ijintambang").change(function () {
		if($(this).val() == "1"){
			$("#trnomor").hide();
			$("#trtanggal").hide();
			$("#trmasaberlaku").hide();
			$("#trnomoriupop").show();
			$("#trnomoriupopk").hide();
			$("#trtanggaliupop").show();
			$("#trtanggaliupopk").hide();
			$("#trmasaberlakuiupop").show();
			$("#trmasaberlakuiupopk").hide();
			$("#trnomoriupopk2").hide();
			$("#trtanggaliupopk2").hide();
			$("#trmasaberlakuiupopk2").hide();
			$("#trpilihnomor").hide();
		}

		else if($(this).val() == "2"){
			$("#trnomor").hide();
			$("#trtanggal").hide();
			$("#trmasaberlaku").hide();
			$("#trnomoriupop").hide();
			$("#trnomoriupopk").show();
			$("#trtanggaliupop").hide();
			$("#trtanggaliupopk").show();
			$("#trmasaberlakuiupop").hide();
			$("#trmasaberlakuiupopk").show();
			$("#trnomoriupopk2").hide();
			$("#trtanggaliupopk2").hide();
			$("#trmasaberlakuiupopk2").hide();
			$("#trpilihnomor").show();
			var tipe_id = '2';
			jQuery.ajax({
				url:'ddlnomoriupop/'+tipe_id,
	            type:'GET',
	            success:function(data){
	                $("#pilihnoiup").empty();
	                $("#pilihnoiup").append('<option value="-1">- Pilih No. IUP OP -</option>');
	                $("#pilihnoiup").append(data);
	            }
			});
		}

		else if($(this).val() == "4"){
			$("#trnomor").hide();
			$("#trtanggal").hide();
			$("#trmasaberlaku").hide();
			$("#trnomoriupop").hide();
			$("#trnomoriupopk").hide();
			$("#trtanggaliupop").hide();
			$("#trtanggaliupopk").hide();
			$("#trmasaberlakuiupop").hide();
			$("#trmasaberlakuiupopk").hide();
			$("#trnomoriupopk2").show();
			$("#trtanggaliupopk2").show();
			$("#trmasaberlakuiupopk2").show();
			$("#trpilihnomor").show();
			var tipe_id = '4';
			jQuery.ajax({
				url:'ddlnomoriupop/'+tipe_id,
	            type:'GET',
	            success:function(data){
	                $("#pilihnoiup").empty();
	                $("#pilihnoiup").append('<option value="-1">- Pilih No. IUP OP -</option>');
	                $("#pilihnoiup").append(data);
	            }
			});
		}

		else if($(this).val() == "3"){
			$("#trnomor").show();
			$("#trtanggal").show();
			$("#trmasaberlaku").show();
			$("#trnomoriupop").hide();
			$("#trnomoriupopk").hide();
			$("#trtanggaliupop").hide();
			$("#trtanggaliupopk").hide();
			$("#trmasaberlakuiupop").hide();
			$("#trmasaberlakuiupopk").hide();
			$("#trnomoriupopk2").hide();
			$("#trtanggaliupopk2").hide();
			$("#trmasaberlakuiupopk2").hide();
			$("#trpilihnomor").hide();
		}
    });

	$("#pilihnoiup").change(function () {
		$ijin = $("#ijintambang").val();
		
		if($ijin == "2"){
			var mySplitResult = $("#pilihnoiup").val();
			mySplitResult = mySplitResult.split("/");
    		$('#nomor_iupopk').val(mySplitResult[0]);
    		$('#tgl_iupopk').val(mySplitResult[1]);
    		$('#JangkaWaktu_iupopk').val(mySplitResult[2]);
		}else if($ijin == "4"){
			var mySplitResult = $("#pilihnoiup").val();
			mySplitResult = mySplitResult.split("/");
    		$('#nomor_iupopk2').val(mySplitResult[0]);
    		$('#tgl_iupopk2').val(mySplitResult[1]);
    		$('#JangkaWaktu_iupopk2').val(mySplitResult[2]);
		}
	});

	var alm = $('#alamat').val();
	if (alm != ''){
		$("#koordinatjudul").show();
		$("#koordinatisi").show();
	}else{
		$("#koordinatjudul").hide();
		$("#koordinatisi").hide();
	}

	$("#alamat").change(function(){
        var alm = $('#alamat').val();
		if (alm != ''){
			$("#koordinatjudul").show();
			$("#koordinatisi").show();
		}else{
			$("#koordinatjudul").hide();
			$("#koordinatisi").hide();
		}
    });
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?></h2>

        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="active">
                            <a href="javascript:void(0);">Data Teknis</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'listspesifikasibatubara' ?>">Spesifikasi Teknis</a>
                        </li>
        			</ul>
        		</div>
        	</div>
        </div>
                    
        <form action="{{action('VendorController@savedatateknistambang')}}" method="post">
        	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
			<table class="table table-bordered">
				<tbody>
					<tr class="success">
						<th colspan="6">Lokasi Tambang</th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;" width="210">Alamat</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-12">
								<div data-tip="masukan alamat lokasi tambang">
								<input type='text' class='form-control' name="alamat" id="alamat" value="{{$data->Alamat}}" required="required"
									<?php if(($data->AlamatCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1) || 
											(!is_null($data->Alamat)) ) { ?> readonly="true"
									<?php }else if ($data->AlamatCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Propinsi</td>
						<td style="border:none; border-top:none;" colspan="3" width="320">
							<div class='col-sm-12'>
								<div data-tip="pilih propinsi lokasi tambang">
								<select name='Provinsi' id='Provinsi' class='form-control' 
									<?php if(($data->PropinsiCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->PropinsiCk=='0') { ?> style="background-color:red; color:white;" <?php }?> 
										>
									<?php if(($data->PropinsiCk == '1') || ($data->PersetujuanVerifikasi == 'Y' && $data->Status==1)) { 
										} else { ?>
										<option value="-1">- Pilih Provinsi -</option>
									<?php
										}
						     			foreach($data2 as $r){
						     				if(($data->PropinsiCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) {
						     					if($r->ProvinsiId == $data->Propinsi){
						     		?>
						     						<option value="<?= $r->ProvinsiId; ?>" selected><?= $r->ProvinsiName ?></option>
						     		<?php
						     					}
						     				}else{
						     					if($r->ProvinsiId == $data->Propinsi){
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
						<td style="border:none; border-top:none;" width="100">Kabupaten</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class='col-sm-12'>
								<div data-tip="pilih kabupaten lokasi tambang">
								<select name='KabupatenKota' id="KabupatenKota" class='form-control' 
								<?php if(($data->KabupatenCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->KabupatenCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
									<?php if(($data->KabupatenCk == '1') || ($data->PersetujuanVerifikasi == 'Y' && $data->Status==1)) { 
										} else { ?>
										<option value="-1">- Pilih Kabupaten -</option>
									<?php
										}
										if(!is_null($data->Kabupaten) && $data->Kabupaten != -1){
						     			foreach($data3 as $r){
						     				if(($data->KabupatenCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) {
						     					if($r->KabupatenKotaId == $data->Kabupaten){
						     		?>
						     						<option value="<?= $r->KabupatenKotaId; ?>" selected><?= $r->KabupatenKotaName ?></option>
						     		<?php
						     					}
						     				}else{
						     					if($r->KabupatenKotaId == $data->Kabupaten){
						     		?>
						     						<option value="<?= $r->KabupatenKotaId; ?>" selected><?= $r->KabupatenKotaName ?></option>
						     		<?php
						     					}else{
						     		?>
						     						<option value="<?= $r->KabupatenKotaId; ?>"><?= $r->KabupatenKotaName ?></option>
						     		<?php
						     					}
						     				}
						     			}
						     		}
						     		?>									
								</select>
							</div>
							</div>
						</td>
					</tr>
					<tr id="koordinatjudul" class="success">
						<th colspan="6">Koordinat Lokasi Tambang</th>
					</tr>
					<tr id="koordinatisi">
						<td style="border:none;" colspan="6">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="text-align:center;" width=120>FID</th>
									<th style="text-align:center;" width=120>Point</th>
									<th style="text-align:center;" width=120>X</th>
									<th style="text-align:center;" width=120>Y</th>
									<th style="text-align:center;" width=120>Direction</th>
									<th style="text-align:center;" width=120>Length</th>
									<th style="text-align:center;" width=150>Aksi</th>
								</thead>
								<tbody>
									<?php if(!is_null($datakoordinat)) { ?>
									<?php
			                            foreach($datakoordinat as $row){
			                        ?>
			                        <tr>
			                        	<td> <?php echo $row->FID ?></td>
			                        	<td> <?php echo $row->Point ?></td>
			                        	<td> <?php echo $row->X ?></td>
			                        	<td> <?php echo $row->Y ?></td>
			                        	<td> <?php echo $row->Direction ?></td>
			                        	<td> <?php echo $row->Length ?></td>
			                        	<td style="text-align:center;">
                                			<a href="" onclick="document.getElementById('koordinatid').value='<?php echo $row->IdKoordinat ?>';
                                								document.getElementById('fid').value='<?php echo $row->FID ?>';
                                								<?php if($row->FIDCk=='1') { ?>
		                                                        document.getElementById('fid').setAttribute('readOnly','true');
		                                                        document.getElementById('fid').style.background = '#eee'; 
		                                                        document.getElementById('fid').style.color = '#555';
		                                                        <?php } else if($row->FIDCk=='0') { ?>
		                                                        document.getElementById('fid').style.background = 'red';
		                                                        document.getElementById('fid').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('fid').style.background = '#FFF';
		                                                        document.getElementById('fid').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('point').value='<?php echo $row->Point ?>';
                                								<?php if($row->PointCk=='1') { ?>
		                                                        document.getElementById('point').setAttribute('readOnly','true');
		                                                        document.getElementById('point').style.background = '#eee'; 
		                                                        document.getElementById('point').style.color = '#555';
		                                                        <?php } else if($row->PointCk=='0') { ?>
		                                                        document.getElementById('point').style.background = 'red';
		                                                        document.getElementById('point').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('point').style.background = '#FFF';
		                                                        document.getElementById('point').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('x').value='<?php echo $row->X ?>';
                                								<?php if($row->XCk=='1') { ?>
		                                                        document.getElementById('x').setAttribute('readOnly','true');
		                                                        document.getElementById('x').style.background = '#eee'; 
		                                                        document.getElementById('x').style.color = '#555';
		                                                        <?php } else if($row->XCk=='0') { ?>
		                                                        document.getElementById('x').style.background = 'red';
		                                                        document.getElementById('x').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('x').style.background = '#FFF';
		                                                        document.getElementById('x').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('y').value='<?php echo $row->Y ?>';
                                								<?php if($row->YCk=='1') { ?>
		                                                        document.getElementById('y').setAttribute('readOnly','true');
		                                                        document.getElementById('y').style.background = '#eee'; 
		                                                        document.getElementById('y').style.color = '#555';
		                                                        <?php } else if($row->YCk=='0') { ?>
		                                                        document.getElementById('y').style.background = 'red';
		                                                        document.getElementById('y').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('y').style.background = '#FFF';
		                                                        document.getElementById('y').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('direction').value='<?php echo $row->Direction ?>';
                                								<?php if($row->DirectionCk=='1') { ?>
		                                                        document.getElementById('direction').setAttribute('readOnly','true');
		                                                        document.getElementById('direction').style.background = '#eee'; 
		                                                        document.getElementById('direction').style.color = '#555';
		                                                        <?php } else if($row->DirectionCk=='0') { ?>
		                                                        document.getElementById('direction').style.background = 'red';
		                                                        document.getElementById('direction').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('direction').style.background = '#FFF';
		                                                        document.getElementById('direction').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('length').value='<?php echo $row->Length ?>';
                                								<?php if($row->LengthCk=='1') { ?>
		                                                        document.getElementById('length').setAttribute('readOnly','true');
		                                                        document.getElementById('length').style.background = '#eee'; 
		                                                        document.getElementById('length').style.color = '#555';
		                                                        <?php } else if($row->LengthCk=='0') { ?>
		                                                        document.getElementById('length').style.background = 'red';
		                                                        document.getElementById('length').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('length').style.background = '#FFF';
		                                                        document.getElementById('length').style.color = '#555';
		                                                        <?php } ?>"
		                                        data-toggle="modal" data-target="#koordinatModal">
		                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
		                                    <a href="" onclick="document.getElementById('koordinatid2').value='<?php echo $row->IdKoordinat ?>';
		                                    					document.getElementById('fid2').value='<?php echo $row->FID ?>';"
		                                            data-toggle="modal" data-target="#confirmKoordinatModal">
		                                        <i class="fa fa-trash-o"></i> Hapus</a>
                                		</td>
			                        </tr>
			                        <?php } ?>
									<?php } ?>
								</tbody>
							</table>
							<?php if(!is_null($datakoordinat)) { ?>
					        <?php  if($data->PersetujuanVerifikasi<>'Y' || $data->Status==2) { ?>
							<input type="button" value="Tambah Koordinat" class="btn btn-submit  btn-primary" 
					            data-toggle="modal" data-target="#koordinatModal"
					            onclick="document.getElementById('fid').value='';
					                    $('#fid').attr('readonly', false);
					                    document.getElementById('point').value='';
					                    $('#point').attr('readonly', false);
					                    document.getElementById('x').value='';
					                    $('#x').attr('readonly', false);
					                    document.getElementById('y').value='';
					                    $('#y').attr('readonly', false);
					                    document.getElementById('direction').value='';
					                    $('#direction').attr('readonly', false);
					                    document.getElementById('length').value='';
					                    $('#length').attr('readonly', false);
					                    document.getElementById('alamatkoordinat').value= $('#alamat').val();" >
					        <?php } ?>
					        <?php } else { ?>
					        <input type="button" value="Tambah Koordinat" class="btn btn-submit  btn-primary" 
					            data-toggle="modal" data-target="#koordinatModal"
					            onclick="document.getElementById('koordinatid').value='';
					            		document.getElementById('fid').value='';
					                    $('#fid').attr('readonly', false);
					                    document.getElementById('point').value='';
					                    $('#point').attr('readonly', false);
					                    document.getElementById('x').value='';
					                    $('#x').attr('readonly', false);
					                    document.getElementById('y').value='';
					                    $('#y').attr('readonly', false);
					                    document.getElementById('direction').value='';
					                    $('#direction').attr('readonly', false);
					                    document.getElementById('length').value='';
					                    $('#length').attr('readonly', false);
					                    document.getElementById('alamatkoordinat').value= $('#alamat').val();" >
					        <?php } ?>
						</td>
					</tr>
					<tr class="success">
						<th colspan="6">Luas Tambang</th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Luas Area Tambang</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">Ha</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan luas area tambang">
								<input type='text' class='form-control' name="luas_area" id="luas_area" value="{{$data->LuasAreaTambang}}" 
								onkeypress="return isDecimal(event)"
									<?php if(($data->LuasAreaTambangCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->LuasAreaTambangCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Perkiraan Volume Cadangan</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">MT</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan perkiraan volume cadangan">
								<input type='text' class='form-control' name="perkiraan_volume" id="perkiraan_volume" value="{{$data->PerkiraanVolumeCadangan}}" 
								onkeypress="return isDecimal(event)"
									<?php if(($data->PerkiraanVolumeCadanganCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->PerkiraanVolumeCadanganCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr class="success">
						<th colspan="6">Ijin Operasi Tambang</th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Ijin Tambang</td>
						<td style="border:none; border-top:none;" colspan="3">
							<div class="col-sm-7">
								<div data-tip="pilih ijin tambang">
									<select name='ijintambang' id='ijintambang' class='form-control' 
									 <?php if(($data->IjinTambangCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									 <?php }else if ($data->IjinTambangCk=='0') { ?> style="background-color:red; color:white;" <?php }?> > 
									 	<?php if($data->IjinTambang == '-1') { ?> 
									 		<option value="-1" selected>- Pilih Ijin Tambang -</option>
									 	<?php }else{ ?> 
									 		<option value="-1">- Pilih Ijin Tambang -</option>
									 	<?php } ?>		
									 	<?php if($data->IjinTambang == '3') { ?> 
									 		<option value="3" selected>PKB2B</option>
									 	<?php }else{ ?> 
									 		<option value="3">PKB2B</option>
									 	<?php } ?>
									 	<?php if($data->IjinTambang == '1') { ?> 
									 		<option value="1" selected>IUP OP</option>
									 	<?php }else{ ?> 
									 		<option value="1">IUP OP</option>
									 	<?php } ?>					
									 	<?php if($data->IjinTambang == '2') { ?> 
									 		<option value="2" selected>IUP OPK Pengangkutan</option>
									 	<?php }else{ ?> 
									 		<option value="2">IUP OPK Pengangkutan</option>
									 	<?php } ?>
									 	<?php if($data->IjinTambang == '4') { ?> 
									 		<option value="4" selected>IUP OPK Pemurnian</option>
									 	<?php }else{ ?> 
									 		<option value="4">IUP OPK Pemurnian</option>
									 	<?php } ?>								
									</select>
								</div>
							</div>
						</td>
					</tr>
					<tr id="trpilihnomor">
						<td style="border:none; border-top:none;">Pilih IUP OP</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<div data-tip="pilih no iup op">
								<select name='pilihnoiup' id='pilihnoiup' class='form-control' readonly="true" />
									<option value="-1">- Pilih No. IUP OP -</option>
								</select>
							</div>
							</div> 
						</td>
					</tr>
					<tr id="trnomor">
						<td style="border:none; border-top:none;">Nomor</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<div data-tip="masukan ijin operasi tambang">
								<input type='text' class='form-control' name="nomor" value="{{$data->NomorIjin}}"
									<?php if(($data->NomorIjinCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->NomorIjinCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div> 
						</td>
					</tr>
					<tr id="trnomoriupop">
						<td style="border:none; border-top:none;">Nomor</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<div data-tip="masukan ijin operasi tambang">
								<input type='text' class='form-control' name="nomor_iup" value="{{$dataiupop->No}}" readonly="true"></input>
							</div>
							</div> 
						</td>
					</tr>
					<tr id="trnomoriupopk">
						<td style="border:none; border-top:none;">Nomor</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<div data-tip="masukan ijin operasi tambang">
								<input type='text' class='form-control' name="nomor_iupopk" id="nomor_iupopk" value="{{$data->NomorIjin}}" readonly="true"></input>
							</div>
							</div> 
						</td>
					</tr>
					<tr id="trnomoriupopk2">
						<td style="border:none; border-top:none;">Nomor</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<div data-tip="masukan ijin operasi tambang">
								<input type='text' class='form-control' name="nomor_iupopk2" id="nomor_iupopk2" value="{{$data->NomorIjin}}" readonly="true"></input>
							</div>
							</div> 
						</td>
					</tr>
					<tr id="trtanggal">
						<td style="border:none; border-top:none;">Tanggal</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan tanggal ijin tambang">
								<input type='text' class='form-control' name="tgl_teknis_tambang" 
									value="<?php if(!is_null($data->TanggalIjin)) { echo date("d-m-Y", strtotime($data->TanggalIjin)); } ?>" id="tgl_teknis_tambang"
									<?php if(($data->TanggalIjinCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#tgl_teknis_tambang').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?> 
									<?php }else if ($data->TanggalIjinCk=='0') { ?> style="background-color:red; color:white;" > <?php }?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trtanggaliupop">
						<td style="border:none; border-top:none;">Tanggal</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan tanggal ijin tambang">
								<input type='text' class='form-control' name="tgl_iup" 
									value="<?php if(!is_null($dataiupop->Tanggal)) { echo date("d-m-Y", strtotime($dataiupop->Tanggal)); } ?>" readonly="true" >
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trtanggaliupopk">
						<td style="border:none; border-top:none;">Tanggal</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan tanggal ijin tambang">
								<input type='text' class='form-control' name="tgl_iupopk" id="tgl_iupopk"
									value="<?php if(!is_null($data->TanggalIjin)) { echo date("d-m-Y", strtotime($data->TanggalIjin)); } ?>" readonly="true" >
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trtanggaliupopk2">
						<td style="border:none; border-top:none;">Tanggal</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan tanggal ijin tambang">
								<input type='text' class='form-control' name="tgl_iupopk2" id="tgl_iupopk2" 
									value="<?php if(!is_null($data->TanggalIjin)) { echo date("d-m-Y", strtotime($data->TanggalIjin)); } ?>" readonly="true" >
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trmasaberlaku">
						<td style="border:none; border-top:none;">Masa Berlaku</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan masa berlaku ijin tambang">
								<input type='text' class='form-control' name="masa_berlaku" 
									value="<?php if(!is_null($data->MasaBerlakuIjin)) { echo date("d-m-Y", strtotime($data->MasaBerlakuIjin)); } ?>" id="masa_berlaku"
									<?php if(($data->MasaBerlakuIjinCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#masa_berlaku').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?> 
									<?php }else if ($data->MasaBerlakuIjinCk=='0') { ?> style="background-color:red; color:white;" > <?php }?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trmasaberlakuiupop">
						<td style="border:none; border-top:none;">Masa Berlaku</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan masa berlaku ijin tambang">
								<input type='text' class='form-control' name="JangkaWaktu_iup" 
									value="<?php if(!is_null($dataiupop->JangkaWaktu)) { echo date("d-m-Y", strtotime($dataiupop->JangkaWaktu)); } ?>" readonly="true" >
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trmasaberlakuiupopk">
						<td style="border:none; border-top:none;">Masa Berlaku</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan masa berlaku ijin tambang">
								<input type='text' class='form-control' name="JangkaWaktu_iupopk" id="JangkaWaktu_iupopk" 
									value="<?php if(!is_null($data->MasaBerlakuIjin)) { echo date("d-m-Y", strtotime($data->MasaBerlakuIjin)); } ?>"  readonly="true" >
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trmasaberlakuiupopk2">
						<td style="border:none; border-top:none;">Masa Berlaku</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-4">
								<div data-tip="masukan masa berlaku ijin tambang">
								<input type='text' class='form-control' name="JangkaWaktu_iupopk2" id="JangkaWaktu_iupopk2"
									value="<?php if(!is_null($data->MasaBerlakuIjin)) { echo date("d-m-Y", strtotime($data->MasaBerlakuIjin)); } ?>"  readonly="true" >
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr class="success">
						<th colspan="6">Kapasitas Produksi Tambang</th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Kapasitas produksi per tahun</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">MT</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan kapasitas produksi per tahun">
								<input type='text' class='form-control' name="kapasitas_produksi" id="kapasitas_produksi" value="{{$data->KapasitasProduksi}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasProduksiCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->KapasitasProduksiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Kapasitas stockpile tambang</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">MT</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan kapasitas stock pile tambang">
								<input type='text' class='form-control' name="kapasitas_stock_pile" id="kapasitas_stock_pile" value="{{$data->KapasitasStockPile}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasStockPileCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->KapasitasStockPileCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr class="success">
						<th colspan="6">Akses menuju pelabuhan muat</th>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Jarak tempuh ke pelabuhan muat</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">Km</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan jarak tempuh ke pelabuhan muat">
								<input type='text' class='form-control' name="jarak" id="jarak" value="{{$data->JarakTempuh}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->JarakTempuhCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->JarakTempuhCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Akses pengangkut ke pelabuhan yang tersedia</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<select name='akses' id='akses' class='form-control'
									<?php if(($data->AksesPengangkutCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->AksesPengangkutCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
									<option value="" >- Pilih Akses Pengangkut -</option>
									<?php if($data->AksesPengangkut == '1') { ?> 
									<option value="1" selected>Umum</option>
									<?php }else{ ?>
									<option value="1" >Umum</option> 
									<?php } if($data->AksesPengangkut == '2') { ?>
									<option value="2" selected>Pribadi</option>
									<?php }else{ ?>
									<option value="2" >Pribadi</option>
									<?php } if($data->AksesPengangkut == '3') { ?>
									<option value="3" selected>Sewa</option>
									<?php }else{ ?>
									<option value="3" >Sewa</option>
									<?php } if($data->AksesPengangkut == '4') { ?>
									<option value="4" selected>Belum Tersedia</option>
									<?php }else{ ?>
									<option value="4" >Belum Tersedia</option>
									<?php } ?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Jenis transportasi pengangkut batubara ke pelabuhan muat</td>
						<td style="border:none; border-top:none;" colspan="5">
							<div class="col-sm-5">
								<select name='jenis_transportasi' id='jenis_transportasi' class='form-control'
									<?php if(($data->JenisTransportasiCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->JenisTransportasiCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
									<option value="" >- Pilih Akses Pengangkut -</option>
									<?php if($data->JenisTransportasi == '1') { ?> 
									<option value="1" selected>Truck</option>
									<?php }else{ ?>
									<option value="1" >Truck</option> 
									<?php } if($data->JenisTransportasi == '2') { ?>
									<option value="2" selected>Kereta Api</option>
									<?php }else{ ?>
									<option value="2" >Kereta Api</option>
									<?php } if($data->JenisTransportasi == '3') { ?>
									<option value="3" selected>Conveyor</option>
									<?php }else{ ?>
									<option value="3" >Conveyor</option>
									<?php } ?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Kapasitas pengangkutan ke pelabuhan per bulan</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">MT</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan kapasitas pengangkutan ke pelabuhan">
								<input type='text' class='form-control' name="kapasitas_pengangkutan" id="kapasitas_pengangkutan" value="{{$data->KapasitasPengangkutan}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasPengangkutanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->KapasitasPengangkutanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Kapasitas stockpile pelabuhan</td>
						<td style="border:none; border-top:none;" colspan="5"><a style="font-size:16px;">MT</a>
							<div class="col-sm-4" style="padding-right: 5px;">
								<div data-tip="masukan kapasitas stockpile pelabuhan">
								<input type='text' class='form-control' name="kapasitas_stock_pile_pelabuhan" id="kapasitas_stock_pile_pelabuhan"
									value="{{$data->KapasitasStockPilePelabuhan}}" onkeypress="return isDecimal(event)"
									<?php if(($data->KapasitasStockPilePelabuhanCk=='1') || ($data->PersetujuanVerifikasi=='Y' && $data->Status==1)) { ?> readonly="true"
									<?php }else if ($data->KapasitasStockPilePelabuhanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<table width=100%>
				<tr>					
					<td width=50%>
						<a href="<?php echo 'datateknistambang' ?>" class="btn btn-primary btn-block btn-flat" 
			                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
			                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
			                        Sebelumnya</a>
                    </td>
					<td width=50%>
						<?php  if($data->PersetujuanVerifikasi<>'Y' || $data->Status==2) { ?>
						<button style="text-transform:none; width:150px;" type="submit" 
							class="btn btn-submit  btn-primary" id="btnnext">
							Selanjutnya
						<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
						<?php } ?>
					</td>
                </tr>
            </table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
        </form>
    </div>

    <!-- modal koordinat begin -->
    <div class="modal fade" id="koordinatModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                	<div class="modal-header">
        				<h4 class="modal-title" id="koordinatModalLabel">Koordinat Lokasi Tambang</h4>
      				</div>
      				<div class="modal-body">
	                	<form action="{{action('VendorController@savekoordinattambang')}}" method="post">
	                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	                		<input type="hidden" name="koordinatid" id="koordinatid">
	                		<input type="hidden" name="alamatkoordinat" id="alamatkoordinat">
	                		<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>FID</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-6'>
												<div data-tip="masukan nilai fid">	
													<input type='text' class='form-control' name="fid" id="fid" 
														required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Point</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-6'>
												<div data-tip="masukan nilai point">	
													<input type='text' class='form-control' name="point" id="point" 
														onkeypress="return isDecimal(event)"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>X</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-6'>
												<div data-tip="masukan nilai x">	
													<input type='text' class='form-control' name="x" id="x" 
														onkeypress="return isDecimal(event)"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Y</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-6'>
												<div data-tip="masukan nilai y">	
													<input type='text' class='form-control' name="y" id="y" 
														onkeypress="return isDecimal(event)"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Direction</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-6'>
												<div data-tip="masukan nilai direction">	
													<input type='text' class='form-control' name="direction" id="direction" 
														></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Length</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-6'>
												<div data-tip="masukan nilai length">	
													<input type='text' class='form-control' name="length" id="length" 
														onkeypress="return isDecimal(event)"></input>
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

    <!-- modal konfirmasi koordinat end -->
    <div class="modal fade" id="confirmKoordinatModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletekoordinattambang')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="koordinatid2" id="koordinatid2">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus koordinat lokasi tambang FID <input style="border:none;" type="text" 
                                id="fid2" name="fid2"> 
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

</div>

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
 