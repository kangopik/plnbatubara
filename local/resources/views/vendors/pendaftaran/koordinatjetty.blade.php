@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#BDerajat').mask("#.##0,00", {reverse: true});
    $('#BMenit').mask("#.##0,00", {reverse: true});
    $('#BDetik').mask("#.##0,00", {reverse: true});
    $('#LDerajat').mask("#.##0,00", {reverse: true});
    $('#LMenit').mask("#.##0,00", {reverse: true});
    $('#LDetik').mask("#.##0,00", {reverse: true});
});
</script>
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Koordinat Jetty Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
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
            					<a href="" onclick="document.getElementById('Id').value='<?php echo $row->Id ?>';
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
                                                    <?php } ?>"
                            						data-toggle="modal" data-target="#formModal">
                            						<i class="fa fa-pencil-square-o"></i> Ubah</a> |
                        			<a href="" onclick="document.getElementById('id2').value='<?php echo $row->Id ?>'";
                               			 			data-toggle="modal" data-target="#confirmModal">
                            						<i class="fa fa-trash-o"></i> Hapus</a>
            				</td>
           			 	</tr>
                		<?php $counter++; } ?>
                		<?php } ?>
					</tbody>
				</table>
				<?php  if($data1->PersetujuanVerifikasi<>'Y' || $data1->Status==2) { ?>
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
                            document.getElementById('LDetik').style.color = '#555';" >
		        <?php } ?>
		        <table width=100%>
					<tr>					
						<td width=50%>
							<a href="<?php echo 'datajetty' ?>" class="btn btn-primary btn-block btn-flat" 
				                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
				                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
				                        Sebelumnya</a>
	                    </td>
	                </tr>
	            </table>
			</div>
		</div>

   	</div>
</div>

<!-- modal konfirmasi sumber tambang end -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <form action="{{action('VendorController@deletekoordinatjetty')}}" method="post">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <input type="hidden" name="id2" id="id2">
                    <div class="modal-body">
                        <h4>Anda yakin akan menghapus koordinat ini
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
                	<form action="{{action('VendorController@savekoordinatjetty')}}" method="post">
                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                		<input type="hidden" name="Id" id="Id">
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
	$("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()