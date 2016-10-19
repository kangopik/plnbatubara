@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    var sm = $('#SystemMuat').val();
    if(sm == 'Manual'){
        $("#trloading").show();
        $("#trmanual").hide();
        $("#trconveyor").hide();
    }else if (sm == 'Conveyor'){
        $("#trloading").show();
        $("#trmanual").hide();
        $("#trconveyor").hide();
    }else if (sm == 'Manual dan Conveyor'){
        $("#trloading").hide();
        $("#trmanual").show();
        $("#trconveyor").show();
    }else{
        $("#trloading").show();
        $("#trmanual").hide();
        $("#trconveyor").hide();
    }
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
                            <a href="<?php echo 'DetailDataTambang' ?>">Data Tambang</a>
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
                        <li class="active">
                            <a href="javascript:void(0);">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('DetailController@savedetaildatajety')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Jetty</th>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=100>Nama Jetty</th>
                                            <th style="text-align:center;" width=100>Kepemilikan Jetty</th>
                                            <th style="text-align:center;" width=100>Sistem Muat Jetty</th>
                                            <th style="text-align:center;" width=100>Kapasitas Loading</th>
                                            <th style="text-align:center;" width=100>Jumlah Sandaran</th>
                                            <th style="text-align:center;" width=80>Luas</th>
                                            <th style="text-align:center;" width=120>Koordinat</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data2 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->Nama ?></td>
                                                <td> <?php echo $row->Kepemilikan ?></td>
                                                <td> <?php echo $row->SystemMuat ?></td>
                                                <td> <?php echo $row->Kapasitas.' Tph' ?></td>
                                                <td> <?php echo $row->JumlahSandaran ?></td>
                                                <td> <?php echo $row->Luas.' Ha' ?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?php echo 'DetailKoorJetty/'.$row->Id; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> View</a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="document.getElementById('idjetty').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('Nama').value='<?php echo $row->Nama ?>';
                                                                            <?php if($row->NamaCk=='1') { ?>
                                                                            document.getElementById('NamaCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('NamaCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Kepemilikan').value='<?php echo $row->Kepemilikan ?>';
                                                                            <?php if($row->KepemilikanCk=='1') { ?>
                                                                            document.getElementById('KepemilikanCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KepemilikanCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('SystemMuat').value='<?php echo $row->SystemMuat ?>';
                                                                            <?php if($row->SystemMuatCk=='1') { ?>
                                                                            document.getElementById('SystemMuatCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('SystemMuatCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Kapasitas').value='<?php echo $row->Kapasitas ?>';
                                                                            <?php if($row->KapasitasCk=='1') { ?>
                                                                            document.getElementById('KapasitasCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KapasitasCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('KapasitasManual').value='<?php echo $row->KapasitasManual ?>';
                                                                            <?php if($row->KapasitasManualCk=='1') { ?>
                                                                            document.getElementById('KapasitasManualCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KapasitasManualCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('KapasitasConveyor').value='<?php echo $row->KapasitasConveyor ?>';
                                                                            <?php if($row->KapasitasConveyorCk=='1') { ?>
                                                                            document.getElementById('KapasitasConveyorCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KapasitasConveyorCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('JumlahSandaran').value='<?php echo $row->JumlahSandaran ?>';
                                                                            <?php if($row->JumlahSandaranCk=='1') { ?>
                                                                            document.getElementById('JumlahSandaranCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('JumlahSandaranCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Luas').value='<?php echo $row->Luas; ?>';
                                                                            <?php if($row->LuasCk=='1') { ?>
                                                                            document.getElementById('LuasCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('LuasCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Kedalaman').value='<?php echo $row->Kedalaman; ?>';
                                                                            <?php if($row->KedalamanCk=='1') { ?>
                                                                            document.getElementById('KedalamanCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KedalamanCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Jarak').value='<?php echo $row->Jarak; ?>';
                                                                            <?php if($row->JarakCk=='1') { ?>
                                                                            document.getElementById('JarakCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('JarakCk').checked = false;
                                                                            <?php } ?>
                                                                            <?php if($row->ProvinsiCk=='1') { ?>
                                                                            document.getElementById('ProvinsiCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('ProvinsiCk').checked = false;
                                                                            <?php } ?>
                                                                            <?php if($row->KotaCk=='1') { ?>
                                                                            document.getElementById('KotaCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KotaCk').checked = false;
                                                                            <?php } ?>
                                                                            <?php if($row->KecamatanCk=='1') { ?>
                                                                            document.getElementById('KecamatanCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KecamatanCk').checked = false;
                                                                            <?php } ?>
                                                                            <?php if($row->KelurahanCk=='1') { ?>
                                                                            document.getElementById('KelurahanCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('KelurahanCk').checked = false;
                                                                            <?php } ?>
                                                                            $('#KapasitasCruiserCk1').val($('#KapasitasCruiserCk:checked').val());
                                                                            $('#KapasitasMuatCk1').val($('#KapasitasMuatCk:checked').val());"
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
                                <td width="200">Kapasitas Crusher</td>
                                <td>{{$data1->KapasitasCruiser}}</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KapasitasCruiserCk" id="KapasitasCruiserCk" 
                                    	value="1" <?php if($data1->KapasitasCruiserCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Kapasitas Muat Tongkang</td>
                                <td>{{$data1->KapasitasMuat}}</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KapasitasMuatCk" id="KapasitasMuatCk" 
                                    	value="1" <?php if($data1->KapasitasMuatCk=='1') { echo "checked='checked'";}?>/>
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
                                <a href="<?php echo 'DetailDataStockpile' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        <h4 class="modal-title" id="koordinatModalLabel">Data Jetty</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('DetailController@savedetaildetailjetty')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="idjetty" id="idjetty">
                            <input type="hidden" name="KapasitasCruiserCk1" id="KapasitasCruiserCk1">
                            <input type="hidden" name="KapasitasMuatCk1" id="KapasitasMuatCk1">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Nama Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="Nama" id="Nama"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NamaCK" id="NamaCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Kepemilikan Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="Kepemilikan" id="Kepemilikan" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KepemilikanCk" id="KepemilikanCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Sistem Muat Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="SystemMuat" id="SystemMuat" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="SystemMuatCk" id="SystemMuatCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr id="trloading">
                                        <td width=150>Kapasitas Loading</td>
                                        <td>
                                            <input type='text' class='form-control' name="Kapasitas" id="Kapasitas" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KapasitasCk" id="KapasitasCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr id="trmanual">
                                        <td width=150>Kapasitas Manual</td>
                                        <td>
                                            <input type='text' class='form-control' name="KapasitasManual" id="KapasitasManual" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KapasitasManualCk" id="KapasitasManualCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr id="trconveyor">
                                        <td width=150>Kapasitas Conveyor</td>
                                        <td>
                                            <input type='text' class='form-control' name="KapasitasConveyor" id="KapasitasConveyor" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KapasitasConveyorCk" id="KapasitasConveyorCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Jumlah Sandaran Kapal</td>
                                        <td>
                                            <input type='text' class='form-control' name="JumlahSandaran" id="JumlahSandaran" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JumlahSandaranCk" id="JumlahSandaranCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Luas</td>
                                        <td>
                                            <input type='text' class='form-control' name="Luas" id="Luas" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="LuasCk" id="LuasCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Kedalaman</td>
                                        <td>
                                            <input type='text' class='form-control' name="Kedalaman" id="Kedalaman" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KedalamanCk" id="KedalamanCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Jarak Tambang ke Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="Jarak" id="Jarak" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JarakCk" id="JarakCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Provinsi</td>
                                        <td  >
                                            <div><?php if(!is_null($dataProvinsi)) { echo $dataProvinsi->ProvinsiName; }?>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="ProvinsiCk" id="ProvinsiCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Kota/Kabupaten</td>
                                        <td >
                                            <div ><?php if(!is_null($dataKota)) { echo $dataKota->KabupatenKotaName;} ?>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KotaCk" id="KotaCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Kecamatan</td>
                                        <td >
                                            <div><?php if(!is_null($dataKecamatan)) { echo $dataKecamatan->kecamatanName;} ?></div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KecamatanCk" id="KecamatanCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Kelurahan</td>
                                        <td  >
                                            <div><?php if(!is_null($dataKelurahan)) { echo $dataKelurahan->KelurahanName;} ?></div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KelurahanCk" id="KelurahanCk" value="1"/>
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