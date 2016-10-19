@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#trrealisasi').hide();
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
                        <li class="active">
                            <a href="javascript:void(0);">Kapasitas Produksi</a>
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
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Produksi</th>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Kapasitas Terpasang</td>
                                <td style="border:none;">{{$data1->KapasitasProduksi}} MT</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Target Tahun Lalu</td>
                                <td style="border:none;">{{$data1->TargetTahun}} MT</td>
                                <td style="border:none;" width="200">Realisasi Tahun Lalu</td>
                                <td style="border:none;">{{$data1->RealisasiTargetTahun}} MT</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Target Tahun Berjalan</td>
                                <td style="border:none;">{{$data1->TargetProduksi}} MT</td>
                                <td style="border:none;" width="200">Realisasi Tahun Berjalan</td>
                                <td style="border:none;">{{$data1->RealisasiTargetProduksi}} MT</td>
                            </tr>
                            <tr id="trrealisasi">
                                <td style="border:none;" width="200">Realisasi Produksi</td>
                                <td style="border:none;">{{$data1->RealisasiProduksi}} MT</td>
                            </tr>
                            <tr class="success">
                                <th colspan="6">Populasi Alat</th>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200" colspan="2"><b>Jenis dan Peralatan yang digunakan</b></td>
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
                                                    <a href="" onclick="
                                                                            document.getElementById('Jenis').value='<?php echo $row->Jenis ?>';
                                                                            document.getElementById('Tipe').value='<?php echo $row->Tipe ?>';
                                                                            document.getElementById('Merk').value='<?php echo $row->Merk ?>';
                                                                            document.getElementById('Jumlah').value='<?php echo $row->Jumlah; ?>';"
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
                                <td style="border:none;" width="200">Catatan</td>
                                <td style="border:none;">{{$data1->Catatan}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width=100%>
                        <tr>                    
                            <td width=50%>
                                <a href="<?php echo 'HasilDataTambang' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
                                            Sebelumnya</a>
                            </td>
                            <td width=50%>
                                <a href="<?php echo 'HasilDataEksplorasi' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        <h4 class="modal-title" id="koordinatModalLabel">Jenis dan Peralatan</h4>
                    </div>
                    <div class="modal-body">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Jenis</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Jenis" id="Jenis" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Tipe</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Tipe" id="Tipe" 
                                                        readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Merk</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Merk" id="Merk"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=100>Jumlah</td>
                                        <td >
                                        	<input type='text' class='form-control' name="Jumlah" id="Jumlah"
                                                    readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
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