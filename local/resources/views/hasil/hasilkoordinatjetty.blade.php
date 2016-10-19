@extends('layout.admin')
@section('content')
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
                		<?php } ?>
					</tbody>
				</table>
				<table width=100%>
					<tr>					
						<td width=50%>
							<a href="<?php echo 'HasilDataJetty' ?>" class="btn btn-primary btn-block btn-flat" 
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
	$("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>

@stop()