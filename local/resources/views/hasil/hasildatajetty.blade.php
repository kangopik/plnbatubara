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
                            <a href="<?php echo 'HasilDataTambang' ?>">Data Tambang</a>
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
                        <li class="active">
                            <a href="javascript:void(0);">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                    <table class="table table-bordered">
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
                                                    <a href="<?php echo 'HasilKoorJetty/'.$row->Id; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> View</a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="
                                                                            document.getElementById('Nama').value='<?php echo $row->Nama ?>';
                                                                            document.getElementById('Kepemilikan').value='<?php echo $row->Kepemilikan ?>';
                                                                            document.getElementById('SystemMuat').value='<?php echo $row->SystemMuat ?>';
                                                                            document.getElementById('Kapasitas').value='<?php echo $row->Kapasitas ?>';
                                                                            document.getElementById('KapasitasManual').value='<?php echo $row->KapasitasManual ?>';
                                                                            document.getElementById('KapasitasConveyor').value='<?php echo $row->KapasitasConveyor ?>';
                                                                            document.getElementById('JumlahSandaran').value='<?php echo $row->JumlahSandaran ?>';
                                                                            document.getElementById('Luas').value='<?php echo $row->Luas; ?>';
                                                                            document.getElementById('Kedalaman').value='<?php echo $row->Kedalaman; ?>';
                                                                            document.getElementById('Jarak').value='<?php echo $row->Jarak; ?>';
                                                                            document.getElementById('Jarak').value='<?php echo $row->Provinsi; ?>';
                                                                            document.getElementById('Jarak').value='<?php echo $row->Kota; ?>';
                                                                            document.getElementById('Jarak').value='<?php echo $row->Kecamatan; ?>';
                                                                            document.getElementById('Jarak').value='<?php echo $row->Kelurahan; ?>';"
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
                                <td style="border:none;" width="200">Kapasitas Crusher</td>
                                <td style="border:none;">{{$data1->KapasitasCruiser}}</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Kapasitas Muat Tongkang</td>
                                <td style="border:none;">{{$data1->KapasitasMuat}}</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Catatan</td>
                                <td style="border:none;">{{$data1->Catatan}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width=100%>
                        <tr>                    
                            <td width=50%>
                                <a href="<?php echo 'HasilDataStockpile' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
                                            Sebelumnya</a>
                            </td>
                            <td width=50%>
                                <a href="<?php echo 'HasilTeknis' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selesai
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
                        <h4 class="modal-title" id="koordinatModalLabel">Data Jetty</h4>
                    </div>
                    <div class="modal-body">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Nama Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="Nama" id="Nama"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Kepemilikan Jetty</td>
                                        <td>
                                                    <select name='Kepemilikan' id='Kepemilikan' class='form-control'>
                                                        <option value="" selected>- Pilih Kepemilikan -</option> 
                                                        <option value="1">Milik Sendiri</option>
                                                        <option value="2">Sewa</option>
                                                    </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Sistem Muat Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="SystemMuat" id="SystemMuat" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr id="trloading">
                                        <td width=150>Kapasitas Loading</td>
                                        <td>
                                            <input type='text' class='form-control' name="Kapasitas" id="Kapasitas" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr id="trmanual">
                                        <td width=150>Kapasitas Manual</td>
                                        <td>
                                            <input type='text' class='form-control' name="KapasitasManual" id="KapasitasManual" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr id="trConveyor">
                                        <td width=150>Kapasitas Conveyor</td>
                                        <td>
                                            <input type='text' class='form-control' name="KapasitasConveyor" id="KapasitasConveyor" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Jumlah Sandaran Kapal</td>
                                        <td>
                                            <input type='text' class='form-control' name="JumlahSandaran" id="JumlahSandaran" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Luas</td>
                                        <td>
                                            <input type='text' class='form-control' name="Luas" id="Luas" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Kedalaman</td>
                                        <td>
                                            <input type='text' class='form-control' name="Kedalaman" id="Kedalaman" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Jarak Tambang ke Jetty</td>
                                        <td>
                                            <input type='text' class='form-control' name="Jarak" id="Jarak" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Provinsi</td>
                                        <td  >
                                            <div><?php if(!is_null($dataProvinsi)) { echo $dataProvinsi->ProvinsiName; }?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Kota/Kabupaten</td>
                                        <td >
                                            <div ><?php if(!is_null($dataKota)) { echo $dataKota->KabupatenKotaName;} ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Kecamatan</td>
                                        <td >
                                            <div><?php if(!is_null($dataKecamatan)) { echo $dataKecamatan->kecamatanName;} ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  width="150">Kelurahan</td>
                                        <td  >
                                            <div><?php if(!is_null($dataKelurahan)) { echo $dataKelurahan->KelurahanName;} ?></div>
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