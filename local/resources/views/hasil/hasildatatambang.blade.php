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
                            <a href="<?php echo 'HasilDataKapasitasProduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataEksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataStockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataJetty' ?>">Data Jetty</a>
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
								<td style="border:none;" width="180">Nama Pemegang IUP</td>
								<td style="border:none;">
									<div>{{$data1->NamaKonsensi}}</div>
								</td>
								<td  style="border:none;" width="180">No. IUP</td>
								<td style="border:none;" colspan="2">
									<div>{{$data2->NoIUPOP}}</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180"></td>
								<td style="border:none;">
									<div></div>
								</td>
								<td style="border:none;" width="180">No. CNC</td>
								<td style="border:none;" colspan="2">
									<div>{{$data2->NoCNC}}</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180">Luas IUP OP</td>
								<td style="border:none;">
									<div>{{$data1->LuasKonsensi}} Ha</div>
								</td>
								<td style="border:none;" width="180">Jumlah PIT</td>
								<td style="border:none;" >
									<div>{{$data1->JumlahPIT}}</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180">Luas Open Area IUP OP</td>
								<td style="border:none;">
									<div>{{$data1->LuasOpenArea}} Ha</div>
								</td>
								<td style="border:none;" width="180">Luas PIT</td>
								<td style="border:none;">
									<div>{{$data1->LuasPIT}}</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180">S/R</td>
								<td style="border:none;" >
									<div>{{$data1->SR}}</div>
								</td>
								<td style="border:none;" width="180">BESR</td>
								<td style="border:none;">
									<div>{{$data1->BESR}}</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180">Jumlah SEAM</td>
								<td style="border:none;" >
									<div >{{$data1->JumlahSEAM}}</div>
								</td>								
							</tr>
							<tr>
								<td style="border:none;" width="180">Rata-rata Kemiringan SEAM</td>
								<td style="border:none;" >
									<div>{{$data1->KemiringanSEAM}} <sup>0</sup></div>
								</td>
								<td style="border:none;" width="180">Rata-rata Ketebalan SEAM</td>
								<td style="border:none;">
									<div>{{$data1->KetebalanSEAM}} m</div>
								</td>
							</tr>
							<tr class="success">
								<th colspan="6">Data Lokasi</th>
							</tr>
							<tr>
								<td style="border:none;" width="180">Area IUP OP</td>
								<td style="border:none;">
									<div>{{$data1->KawasanHutan}}</div>
								</td>
								<td style="border:none;">
									<div>{{$data1->JenisKawasan}}</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180">Provinsi</td>
								<td style="border:none;" >
									<div><?php if(!is_null($dataProvinsi)) { echo $dataProvinsi->ProvinsiName; }?>
									</div>
								</td>
								<td style="border:none;" width="180">Kota/Kabupaten</td>
								<td style="border:none;">
									<div ><?php if(!is_null($dataKota)) { echo $dataKota->KabupatenKotaName;} ?>
									</div>
								</td>
							</tr>
							<tr>
								<td style="border:none;" width="180">Kecamatan</td>
								<td style="border:none;">
									<div><?php if(!is_null($dataKecamatan)) { echo $dataKecamatan->kecamatanName;} ?></div>
								</td>
								<td style="border:none;" width="180">Kelurahan</td>
								<td style="border:none;" >
									<div><?php if(!is_null($dataKelurahan)) { echo $dataKelurahan->KelurahanName;} ?></div>
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
		                        					<a href="" onclick="
		                        										document.getElementById('Bujur').value='<?php echo $row->Bujur ?>';
		                        										document.getElementById('Lintang').value='<?php echo $row->Lintang ?>';
		                                								document.getElementById('BDerajat').value='<?php echo $row->BDerajat ?>';
				                                                        document.getElementById('LMenit').value='<?php echo $row->LMenit ?>';
				                                                        document.getElementById('BMenit').value='<?php echo $row->BMenit ?>';
				                                                        document.getElementById('BDetik').value='<?php echo $row->BDetik ?>';
				                                                        document.getElementById('LDerajat').value='<?php echo $row->LDerajat ?>';
				                                                        document.getElementById('LMenit').value='<?php echo $row->LMenit ?>';
				                                                        document.getElementById('LDetik').value='<?php echo $row->LDetik ?>';"
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
                                <td style="border:none;" width="200">Catatan</td>
                                <td style="border:none;" colspan="4">{{$data1->Catatan}}</td>
                            </tr>
        				</tbody>
	        		</table>
	        		<table width=100%>
						<tr>					
							<td width=50%>
								<a href="<?php echo 'HasilTeknis' ?>" class="btn btn-primary btn-block btn-flat" 
					                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
					                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
					                        Sebelumnya</a>
		                    </td>
							<td width=50%>
								<a href="<?php echo 'HasilDataKapasitasProduksi' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
							</td>
		                </tr>
		            </table>
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
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>‘</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="BMenit" id="BMenit" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
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
    							</tr>
    							<tr>
                                    <td style="border:none; border-top:none;" width=120>Lintang</td>
                                    <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>
                                            <input type='text' name="Lintang" id="Lintang"  style="border:none;"
                                                readonly="true"></input>
                                        </div>
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
    							</tr>
    							<tr>
    								<td style="border:none; border-top:none;" width=100>‘</td>
									<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                        <div class='col-sm-6'>  
                                            <input type='text' name="LMenit" id="LMenit" 
                                                style="border:none;" readonly="true"></input>
                                        </div>
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
    							</tr>
    						</tbody>
    					</table>
    					<div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
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