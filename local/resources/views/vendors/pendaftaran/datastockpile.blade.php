@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#LuasStockpile').mask("#.##0", {reverse: true});
    $('#KapasitasStockpile').mask("#.##0", {reverse: true});
    $('#JarakTambang').mask("#.##0", {reverse: true});
    $('#JumlahCruiser').mask("#.##0", {reverse: true});
    $('#KapasitasCruiser').mask("#.##0", {reverse: true});
    $("#trcatatan").hide();
});
</script>
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'datatambang' ?>">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datakapasitasproduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'dataeksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datajetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('VendorController@savedatastockpile')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Stockpile</th>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Nama Stockpile</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan nama stockpile">
                                            <input type='text' class='form-control' name="Nama" id="Nama" 
                                                    value="{{$data1->Nama}}"
                                                <?php if(($data1->NamaCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->NamaCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Kepemilikan Stockpile</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan kepemilikan stockpile">
                                            <select name='KepemilikanStockpile' id='KepemilikanStockpile' class='form-control'
                                            <?php if(($data1->KepemilikanStockpileCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                            || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                            <?php }else if ($data1->KepemilikanStockpileCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
                                                <option value="" selected>- Pilih Kepemilikan -</option>
                                                <?php if($data1->KepemilikanStockpile == '1') { ?> 
                                                <option value="1" selected>Milik Sendiri</option>
                                                <?php }else{ ?>
                                                <option value="1" >Milik Sendiri</option> 
                                                <?php } if($data1->KepemilikanStockpile == '2') { ?>
                                                <option value="2" selected>Sewa</option>
                                                <?php }else{ ?>
                                                <option value="2" >Sewa</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Luas Stockpile</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan luas stockpile">
                                            <input type='text' class='form-control' name="LuasStockpile" id="LuasStockpile" 
                                                    value="{{$data1->LuasStockpile}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->LuasStockpileCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->LuasStockpileCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">Ha</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Kapasitas Stockpile</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan kapasitas stockpile">
                                            <input type='text' class='form-control' name="KapasitasStockpile" id="KapasitasStockpile" 
                                                    value="{{$data1->KapasitasStockpile}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->KapasitasStockpileCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->KapasitasStockpileCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">MT</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Jarak Tambang ke Stockpile</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan jarak tambang">
                                            <input type='text' class='form-control' name="JarakTambang" id="JarakTambang" 
                                                    value="{{$data1->JarakTambang}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->JarakTambangCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->JarakTambangCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">KM</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Jumlah Crusher</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan jumlah cruiser">
                                            <input type='text' class='form-control' name="JumlahCruiser" id="JumlahCruiser" 
                                                    value="{{$data1->JumlahCruiser}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->JumlahCruiserCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->JumlahCruiserCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">Unit</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Kapasitas Crusher</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan kapasitas cruiser">
                                            <input type='text' class='form-control' name="KapasitasCruiser" id="KapasitasCruiser" 
                                                    value="{{$data1->KapasitasCruiser}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->KapasitasCruiserCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->KapasitasCruiserCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">MT</a>
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
                            <table width=100%>
                                <tr>    
                                    <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                    <td width=50%>
                                        <a href="<?php echo 'dataeksplorasi' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        </tbody>
                    </table>
                </form>
        		<p>(*) Rincian nama SEAM dan ketebalannya <br />
					(**) Probable reserves/proved reserves
				</p>	
        	</div>
        </div>
    </div>
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