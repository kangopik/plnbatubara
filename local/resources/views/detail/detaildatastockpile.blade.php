@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'DetailDataTambang' ?>">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataKapasitasProduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataEksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataJetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('DetailController@savedetaildatastockpile')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Stockpile</th>
                            </tr>
                            <tr>
                                <td width="200">Nama Stockpile</td>
                                <td>{{$data1->Nama}}</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NamaCk" 
                                    	value="1" <?php if($data1->NamaCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Kepemilikan Stockpile</td>
                                <td><?php if($data1->KepemilikanStockpile == '1') { echo "Milik Sendiri";
                                     }else if($data1->KepemilikanStockpile == '2') { echo "Sewa"; 
                                 	 } else { echo ""; } ?>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KepemilikanStockpileCk" 
                                    	value="1" <?php if($data1->KepemilikanStockpileCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Luas Stockpile</td>
                                <td>{{$data1->LuasStockpile}} Ha</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="LuasStockpileCk" 
                                    	value="1" <?php if($data1->LuasStockpileCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Kapasitas Stockpile</td>
                                <td>{{$data1->KapasitasStockpile}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KapasitasStockpileCk" 
                                    	value="1" <?php if($data1->KapasitasStockpileCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Jarak Tambang ke Stockpile</td>
                                <td>{{$data1->JarakTambang}} KM</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="JarakTambangCk" 
                                    	value="1" <?php if($data1->JarakTambangCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Jumlah Crusher</td>
                                <td>{{$data1->JumlahCruiser}} Unit</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="JumlahCruiserCk" 
                                    	value="1" <?php if($data1->JumlahCruiserCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Kapasitas Crusher</td>
                                <td>{{$data1->KapasitasCruiser}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KapasitasCruiserCk" 
                                    	value="1" <?php if($data1->KapasitasCruiserCk=='1') { echo "checked='checked'";}?>/>
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
                            <table width=100%>
                                <tr>                    
                                    <td width=50%>
                                        <a href="<?php echo 'DetailDataEksplorasi' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        </tbody>
                    </table>
                </form>	
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