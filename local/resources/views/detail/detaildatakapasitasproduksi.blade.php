@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#trrealisasi').hide();
    $('#realisasibulan1').hide();
    $('#realisasibulan2').hide();
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
                        <li class="active">
                            <a href="javascript:void(0);">Kapasitas Produksi</a>
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
                <form action="{{action('DetailController@savedetaildatakapasitasproduksi')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Produksi</th>
                            </tr>
                            <tr>
                                <td width="200">Kapasitas Produksi/Bulan</td>
                                <td>{{$data1->KapasitasProduksi}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="KapasitasProduksiCk" id="KapasitasProduksiCk" 
                                    	value="1" <?php if($data1->KapasitasProduksiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Target Tahun Lalu</td>
                                <td>{{$data1->TargetTahun}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TargetTahunCk" id="TargetTahunCk" 
                                    	value="1" <?php if($data1->TargetTahunCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="200">Realisasi Tahun Lalu</td>
                                <td>{{$data1->RealisasiTargetTahun}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="RealisasiTargetTahunCk" id="RealisasiTargetTahunCk" 
                                        value="1" <?php if($data1->RealisasiTargetTahunCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Target Tahun Berjalan</td>
                                <td>{{$data1->TargetProduksi}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TargetProduksiCk" id="TargetProduksiCk" 
                                    	value="1" <?php if($data1->TargetProduksiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="200">Realisasi Tahun Berjalan</td>
                                <td>{{$data1->RealisasiTargetProduksi}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="RealisasiTargetProduksiCk" id="RealisasiTargetProduksiCk" 
                                        value="1" <?php if($data1->RealisasiTargetProduksiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr id="trrealisasi">
                                <td width="200">Realisasi Produksi</td>
                                <td>{{$data1->RealisasiProduksi}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="RealisasiProduksiCk" id="RealisasiProduksiCk" 
                                    	value="1" <?php if($data1->RealisasiProduksiCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr id="realisasibulan1">
                                <td style="border:none; border-top:none;" width="200" colspan="2"><b>Realisasi/Bulan</b></td>
                            </tr>
                            <tr id="realisasibulan2">
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>Tahun</th>
                                            <th style="text-align:center;" width=120>Bulan</th>
                                            <th style="text-align:center;" width=120>Jumlah</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data3 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->Tahun ?></td>
                                                <td> <?php echo $row->Bulan ?></td>
                                                <td> <?php echo $row->Jumlah.' MT' ?></td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="document.getElementById('norealisasi').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('TahunR').value='<?php echo $row->Tahun ?>';
                                                                            <?php if($row->TahunCk=='1') { ?>
                                                                            document.getElementById('TahunRCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('TahunRCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('BulanR').value='<?php echo $row->Bulan ?>';
                                                                            <?php if($row->BulanCk=='1') { ?>
                                                                            document.getElementById('BulanRCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('BulanRCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('JumlahR').value='<?php echo $row->Jumlah; ?>';
                                                                            <?php if($row->JumlahCk=='1') { ?>
                                                                            document.getElementById('JumlahRCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('JumlahRCk').checked = false;
                                                                            <?php } ?>"
                                                            data-toggle="modal" data-target="#formModalRealisasi">
                                                            <i class="fa fa-search"></i> Detail
                                                </td>
                                            </tr>
                                            <?php $counter++; } ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="success">
                                <th colspan="6">Populasi Alat</th>
                            </tr>
                            <tr>
                                <td width="200" colspan="6"><b>Jenis dan Peralatan yang digunakan</b></td>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>Jenis</th>
                                            <th style="text-align:center;" width=120>Tipe</th>
                                            <th style="text-align:center;" width=120>Merk</th>
                                            <th style="text-align:center;" width=120>Jumlah</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data2 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->Jenis ?></td>
                                                <td> <?php echo $row->Tipe ?></td>
                                                <td> <?php echo $row->Merk ?></td>
                                                <td> <?php echo $row->Jumlah ?></td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="document.getElementById('nopopulasi').value='<?php echo $row->No ?>';
                                                                            document.getElementById('Jenis').value='<?php echo $row->Jenis ?>';
                                                                            <?php if($row->JenisCk=='1') { ?>
                                                                            document.getElementById('JenisCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('JenisCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Tipe').value='<?php echo $row->Tipe ?>';
                                                                            <?php if($row->TipeCk=='1') { ?>
                                                                            document.getElementById('TipeCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('TipeCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Merk').value='<?php echo $row->Merk ?>';
                                                                            <?php if($row->MerkCk=='1') { ?>
                                                                            document.getElementById('MerkCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('MerkCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('Jumlah').value='<?php echo $row->Jumlah; ?>';
                                                                            <?php if($row->JumlahCk=='1') { ?>
                                                                            document.getElementById('JumlahCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('JumlahCk').checked = false;
                                                                            <?php } ?>
                                                                            $('#KapasitasProduksiCk1').val($('#KapasitasProduksiCk:checked').val());
                                                                            $('#TargetTahunCk1').val($('#TargetTahunCk:checked').val());
                                                                            $('#RealisasiTargetTahunCk1').val($('#RealisasiTargetTahunCk:checked').val());
                                                                            $('#TargetProduksiCk1').val($('#TargetProduksiCk:checked').val());
                                                                            $('#RealisasiTargetProduksiCk1').val($('#RealisasiTargetProduksiCk:checked').val());
                                                                            $('#RealisasiProduksiCk1').val($('#RealisasiProduksiCk:checked').val());"
                                                            data-toggle="modal" data-target="#formModal">
                                                            <i class="fa fa-search"></i> Detail
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
                                <a href="<?php echo 'DetailDataTambang' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        <h4 class="modal-title" id="koordinatModalLabel">Jenis dan Peralatan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('DetailController@savedetailjenisperalatan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="nopopulasi" id="nopopulasi">
                            <input type="hidden" name="KapasitasProduksiCk1" id="KapasitasProduksiCk1">
                            <input type="hidden" name="TargetTahunCk1" id="TargetTahunCk1">
                            <input type="hidden" name="RealisasiTargetTahunCk1" id="RealisasiTargetTahunCk1">
                            <input type="hidden" name="TargetProduksiCk1" id="TargetProduksiCk1">
                            <input type="hidden" name="RealisasiTargetProduksiCk1" id="RealisasiTargetProduksiCk1">
                            <input type="hidden" name="RealisasiProduksiCk1" id="RealisasiProduksiCk1">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Jenis</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Jenis" id="Jenis" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JenisCk" id="JenisCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Tipe</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Tipe" id="Tipe" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TipeCk" id="TipeCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Merk</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Merk" id="Merk"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="MerkCk" id="MerkCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Jumlah</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Jumlah" id="Jumlah"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JumlahCk" id="JumlahCk" value="1"/>
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

    <!-- modal koordinat begin -->
    <div class="modal fade" id="formModalRealisasi" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Realisasi / Bulan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('DetailController@savedetailrealisasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="norealisasi" id="norealisasi">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Tahun</td>
                                        <td >
                                            <input type='text' class='form-control' name="TahunR" id="TahunR" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TahunRCk" id="TahunRCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Bulan</td>
                                        <td >
                                            <input type='text' class='form-control' name="BulanR" id="BulanR" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="BulanRCk" id="BulanRCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Jumlah</td>
                                        <td >
                                            <input type='text' class='form-control' name="JumlahR" id="JumlahR"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JumlahRCk" id="JumlahRCk" value="1"/>
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