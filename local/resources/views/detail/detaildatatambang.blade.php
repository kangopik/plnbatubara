@extends('layout.admin')
@section('content')
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
                            <a href="<?php echo 'DetailDataKapasitasProduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataEksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataStockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataJetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
        		<input type="hidden" id="KotaId" value="{{$data1->Kota}}">
        		<input type="hidden" id="KecamatanId" value="{{$data1->Kecamatan}}">
        		<input type="hidden" id="KelurahanId" value="{{$data1->Kelurahan}}">
        		<form action="{{action('DetailController@savedetaildatatambang')}}" method="post">
        			<table class="table table-bordered">
        				<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        				<tbody>
        					<tr class="success">
								<th colspan="6">Data Legal</th>
							</tr>
							<tr>
								<td width="180">Nama Pemegang IUP</td>
								<td >
									<div>{{$data1->NamaKonsensi}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NamaKonsensiCk" id="NamaKonsensiCk" value="1" <?php if($data1->NamaKonsensiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">No. IUP</td>
								<td  colspan="2">
									<div>{{$data2->NoIUPOP}}</div>
								</td>
							</tr>
							<!-- <tr>
								<td  width="180">Status Kerjasama</td>
								<td >
									<div>{{$data1->StatusKerjasama}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="StatusKerjasamaCk" value="1" 
                                    		<?php //if($data1->StatusKerjasamaCk=='1') //{ echo "checked='checked'";//}?>/>
                                </td>
								<td  width="180">No. CNC</td>
								<td  colspan="2">
									<div>{{$data2->NoCNC}}</div>
								</td>
							</tr> -->
							<tr>
								<td  width="180">Luas IUP OP</td>
								<td >
									<div>{{$data1->LuasKonsensi}} Ha</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="LuasKonsensiCk" id="LuasKonsensiCk" value="1" 
                                    		<?php if($data1->LuasKonsensiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">Jumlah PIT</td>
								<td  >
									<div>{{$data1->JumlahPIT}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="JumlahPITCk" id="JumlahPITCk" value="1" 
                                    		<?php if($data1->JumlahPITCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr>
								<td  width="180">Luas Open Area IUP OP</td>
								<td >
									<div>{{$data1->LuasOpenArea}} Ha</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="LuasOpenAreaCk" id="LuasOpenAreaCk" value="1" 
                                    		<?php if($data1->LuasOpenAreaCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">Luas PIT</td>
								<td >
									<div>{{$data1->LuasPIT}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="LuasPITCk" id="LuasPITCk" value="1" 
                                    		<?php if($data1->LuasPITCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr>
								<td  width="180">S/R</td>
								<td  >
									<div>{{$data1->SR}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="SRCk" id="SRCk" value="1" 
                                    		<?php if($data1->SRCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">BESR</td>
								<td >
									<div>{{$data1->BESR}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="BESRCk" id="BESRCk" value="1" 
                                    		<?php if($data1->BESRCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr>
								<td  width="180">Jumlah SEAM</td>
								<td  >
									<div >{{$data1->JumlahSEAM}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="JumlahSEAMCk" id="JumlahSEAMCk" value="1" 
                                    		<?php if($data1->JumlahSEAMCk=='1') { echo "checked='checked'";}?>/>
                                </td>								
							</tr>
							<tr>
								<td  width="180">Rata-rata Kemiringan SEAM</td>
								<td  >
									<div>{{$data1->KemiringanSEAM}} <sup>0</sup></div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KemiringanSEAMCk" id="KemiringanSEAMCk" value="1" 
                                    		<?php if($data1->KemiringanSEAMCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">Rata-rata Ketebalan SEAM (*)</td>
								<td >
									<div>{{$data1->KetebalanSEAM}} m</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KetebalanSEAMCk" id="KetebalanSEAMCk" value="1" 
                                    		<?php if($data1->KetebalanSEAMCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr class="success">
								<th colspan="6">Data Lokasi</th>
							</tr>
							<tr>
								<td  width="180">Area IUP OP</td>
								<td>
									<div>{{$data1->KawasanHutan}}</div>
								</td>
								<td>
									<div>{{$data1->JenisKawasan}}</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KawasanHutanCk" id="KawasanHutanCk" value="1" 
                                    		<?php if($data1->KawasanHutanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr>
								<td  width="180">Provinsi</td>
								<td  >
									<div><?php if(!is_null($dataProvinsi)) { echo $dataProvinsi->ProvinsiName; }?>
									</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="ProvinsiCk" id="ProvinsiCk" value="1" 
                                    		<?php if($data1->ProvinsiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">Kota/Kabupaten</td>
								<td >
									<div ><?php if(!is_null($dataKota)) { echo $dataKota->KabupatenKotaName;} ?>
									</div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KotaCk" id="KotaCk" value="1" 
                                    		<?php if($data1->KotaCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr>
								<td  width="180">Kecamatan</td>
								<td >
									<div><?php if(!is_null($dataKecamatan)) { echo $dataKecamatan->kecamatanName;} ?></div>
								</td><td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KecamatanCk" id="KecamatanCk" value="1" 
                                    		<?php if($data1->KecamatanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
								<td  width="180">Kelurahan</td>
								<td  >
									<div><?php if(!is_null($dataKelurahan)) { echo $dataKelurahan->KelurahanName;} ?></div>
								</td>
								<td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KelurahanCk" id="KelurahanCk" value="1" 
                                    		<?php if($data1->KelurahanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
							</tr>
							<tr>
								<td style="border:none;" colspan="7">
									<table class="table table-bordered table-hover">
										<tbody>
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
											<th style="text-align:center;" width=120><sup>O</sup></th>
											<th style="text-align:center;" width=120>‘</th>
											<th style="text-align:center;" width=120>“</th>
											<th style="text-align:center;" width=120><sup>O</sup></th>
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
		                        					<a href="" onclick="document.getElementById('Id').value='<?php echo $row->Id ?>';
		                        										document.getElementById('Bujur').value='<?php echo $row->Bujur ?>';
		                        										document.getElementById('Lintang').value='<?php echo $row->Lintang ?>';
		                                								document.getElementById('BDerajat').value='<?php echo $row->BDerajat ?>';
		                                								<?php if($row->BDerajatCk=='1') { ?>
				                                                        document.getElementById('BDerajatCk').checked = true;
				                                                        <?php } else { ?>
				                                                        document.getElementById('BDerajatCk').checked = false;
				                                                        <?php } ?>
				                                                        document.getElementById('BMenit').value='<?php echo $row->BMenit ?>';
		                                								<?php if($row->BMenitCk=='1') { ?>
				                                                        document.getElementById('BMenitCk').checked = true;
				                                                        <?php } else { ?>
				                                                        document.getElementById('BMenitCk').checked = false;
				                                                        <?php } ?>
				                                                        document.getElementById('BDetik').value='<?php echo $row->BDetik ?>';
		                                								<?php if($row->BDetikCk=='1') { ?>
				                                                        document.getElementById('BDetikCk').checked = true;
				                                                        <?php } else { ?>
				                                                        document.getElementById('BDetikCk').checked = false;
				                                                        <?php } ?>
				                                                        document.getElementById('LDerajat').value='<?php echo $row->LDerajat ?>';
		                                								<?php if($row->LDerajatCk=='1') { ?>
				                                                        document.getElementById('LDerajatCk').checked = true;
				                                                        <?php } else { ?>
				                                                        document.getElementById('LDerajatCk').checked = false;
				                                                        <?php } ?>
				                                                        document.getElementById('LMenit').value='<?php echo $row->LMenit ?>';
		                                								<?php if($row->LMenitCk=='1') { ?>
				                                                        document.getElementById('LMenitCk').checked = true;
				                                                        <?php } else { ?>
				                                                        document.getElementById('LMenitCk').checked = false;
				                                                        <?php } ?>
				                                                        document.getElementById('LDetik').value='<?php echo $row->LDetik ?>';
		                                								<?php if($row->LDetikCk=='1') { ?>
				                                                        document.getElementById('LDetikCk').checked = true;
				                                                        <?php } else { ?>
				                                                        document.getElementById('LDetikCk').checked = false;
				                                                        <?php } ?>
				                                                        $('#NamaKonsensiCk1').val($('#NamaKonsensiCk:checked').val());
																		$('#LuasKonsensiCk1').val($('#LuasKonsensiCk:checked').val());
																		$('#JumlahPITCk1').val($('#JumlahPITCk:checked').val());
																		$('#LuasOpenAreaCk1').val($('#LuasOpenAreaCk:checked').val());
																		$('#LuasPITCk1').val($('#LuasPITCk:checked').val());
																		$('#SRCk1').val($('#SRCk:checked').val());
																		$('#BESRCk1').val($('#BESRCk:checked').val());
																		$('#JumlahSEAMCk1').val($('#JumlahSEAMCk:checked').val());
																		$('#KemiringanSEAMCk1').val($('#KemiringanSEAMCk:checked').val());
																		$('#KetebalanSEAMCk1').val($('#KetebalanSEAMCk:checked').val());
																		$('#KawasanHutanCk1').val($('#KawasanHutanCk:checked').val());
																		$('#ProvinsiCk1').val($('#ProvinsiCk:checked').val());
																		$('#KotaCk1').val($('#KotaCk:checked').val());
																		$('#KecamatanCk1').val($('#KecamatanCk:checked').val());
																		$('#KelurahanCk1').val($('#KelurahanCk:checked').val());"
		                                        						data-toggle="modal" data-target="#formModal">
		                                        						<i class="fa fa-search"></i> Detail</a>
		                        				</td>
		                       			 	</tr>
			                        		<?php $counter++; } ?>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
                                <td width="200">Catatan</td>
                                <td style="border:none; border-top:none;" colspan="5">
                                    <div class="col-sm-12">
                                        <div data-tip="masukan catatan">
                                            <textarea class='form-control' name="Catatan" id="Catatan" 
                                                    value="{{$data1->Catatan}}">{{$data1->Catatan}}</textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
        				</tbody>
	        		</table>
	        		<table width=100%>
						<tr>					
							<td width=50%>
								<a href="<?php echo 'DetailTeknis' ?>" class="btn btn-primary btn-block btn-flat" 
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
		                </tr>
		            </table>
	        	</form>	
        	</div>
        </div>
    </div>
</div>

<!-- modal koordinat begin -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
            	<div class="modal-header">
    				<h4 class="modal-title" id="koordinatModalLabel">Koordinat</h4>
  				</div>
  				<div class="modal-body">
                	<form action="{{action('DetailController@savedetailkortambang')}}" method="post">
                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                		<input type="hidden" name="Id" id="Id">
                		<input type="hidden" name="NamaKonsensiCk1" id="NamaKonsensiCk1">
						<input type="hidden" name="LuasKonsensiCk1" id="LuasKonsensiCk1">
						<input type="hidden" name="JumlahPITCk1" id="JumlahPITCk1">
						<input type="hidden" name="LuasOpenAreaCk1" id="LuasOpenAreaCk1">
						<input type="hidden" name="LuasPITCk1" id="LuasPITCk1">
						<input type="hidden" name="SRCk1" id="SRCk1">
						<input type="hidden" name="BESRCk1" id="BESRCk1">
						<input type="hidden" name="JumlahSEAMCk1" id="JumlahSEAMCk1">
						<input type="hidden" name="KemiringanSEAMCk1" id="KemiringanSEAMCk1">
						<input type="hidden" name="KetebalanSEAMCk1" id="KetebalanSEAMCk1">
						<input type="hidden" name="KawasanHutanCk1" id="KawasanHutanCk1">
						<input type="hidden" name="ProvinsiCk1" id="ProvinsiCk1">
						<input type="hidden" name="KotaCk1" id="KotaCk1">
						<input type="hidden" name="KecamatanCk1" id="KecamatanCk1">
						<input type="hidden" name="KelurahanCk1" id="KelurahanCk1">
                		<table class="table table-bordered" style="border:none;">
    						<tbody>
    							<tr>
                                    <td style="border:none; border-top:none;" width=120>Bujur</td>
                                    <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>
                                            <input type='text' name="Bujur" id="Bujur"  style="border:none;"
                                                readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                    </td>
                                </tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=150><sup>O</sup></td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="BDerajat" id="BDerajat" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="BDerajatCk" id="BDerajatCk" value="1"/>
                                    </td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>‘</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="BMenit" id="BMenit" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="BMenitCk" id="BMenitCk" value="1"/>
                                    </td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>“</td>
                                    <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="BDetik" id="BDetik" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="BDetikCk" id="BDetikCk" value="1"/>
                                    </td>
    							</tr>
    							<tr>
                                    <td style="border:none; border-top:none;" width=120>Lintang</td>
                                    <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>
                                            <input type='text' name="Lintang" id="Lintang"  style="border:none;"
                                                readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                    </td>
                                </tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=150><sup>O</sup></td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="LDerajat" id="LDerajat" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="LDerajatCk" id="LDerajatCk" value="1"/>
                                    </td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>‘</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="LMenit" id="LMenit" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="LMenitCk" id="LMenitCk" value="1"/>
                                    </td>
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>“</td>
                                    <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="LDetik" id="LDetik" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="LDetikCk" id="LDetikCk" value="1"/>
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