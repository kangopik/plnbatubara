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
                            <a href="<?php echo 'HasilDataTambang' ?>">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataKapasitasProduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Data Eksplorasi</a>
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
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Eksplorasi Tambang</th>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Sumber Daya</td>
                                <td style="border:none;">{{$data1->SumberDaya}} MT</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Cadangan </td>
                                <td style="border:none;">{{$data1->Cadangan}} MT</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Pengeboran Eksplorasi</td>
                            </tr>
                            <tr id="titikbor">
                                <td style="border:none;" width="200">Jumlah Titik Bor</td>
                                <td style="border:none;">{{$data1->JumlahTitikBor}} Titik</td>
                            </tr>
                            <tr id="kedalaman">
                                <td style="border:none;" width="200">Total Kedalaman</td>
                                <td style="border:none;">{{$data1->TotalKedalaman}} Mtr</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Pengeboran Geoteknik</td>
                            </tr>
                            <tr id="struktur">
                                <td style="border:none;" width="200">Struktur Geoteknik</td>
                                <td style="border:none;">{{$data1->StrukturGeoteknik}}</td>
                            </tr>
                            <tr id="jorc">
                                <td style="border:none;" width="200">JORC</td>
                                <td style="border:none;">{{$data1->JORC}}</td>
                            </tr>
                            <tr class="success">
                                <th colspan="6">Spesifikasi Batubara</th>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=80>Calori</th>
                                            <th style="text-align:center;" width=80>CV(ar)</th>
                                            <th style="text-align:center;" width=80>TM(ar)</th>
                                            <th style="text-align:center;" width=80>IM(adb)</th>
                                            <th style="text-align:center;" width=80>Ash(ar)</th>
                                            <th style="text-align:center;" width=80>VM(ar)</th>
                                            <th style="text-align:center;" width=80>FC(ar)</th>
                                            <th style="text-align:center;" width=80>TS(ar)</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data2 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->values ?></td>
                                                <td> <?php echo $row->CV.' %' ?></td>
                                                <td> <?php echo $row->TM.' %' ?></td>
                                                <td> <?php echo $row->IM.' %' ?></td>
                                                <td> <?php echo $row->ASH.' %' ?></td>
                                                <td> <?php echo $row->VM.' %' ?></td>
                                                <td> <?php echo $row->FC.' %' ?></td>
                                                <td> <?php echo $row->TS.' %' ?></td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="
                                                                            document.getElementById('Calori').value='<?php echo $row->values ?>';
                                                                            document.getElementById('TM').value='<?php echo $row->TM ?>';
                                                                            document.getElementById('IM').value='<?php echo $row->IM ?>';
                                                                            document.getElementById('ASH').value='<?php echo $row->ASH ?>';
                                                                            document.getElementById('VM').value='<?php echo $row->VM; ?>';
                                                                            document.getElementById('FC').value='<?php echo $row->FC; ?>';
                                                                            document.getElementById('TS').value='<?php echo $row->TS; ?>';
                                                                            document.getElementById('CV').value='<?php echo $row->CV; ?>';"
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
                                <td style="border:none;">{{$data1->Catatan}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width=100%>
                        <tr>                    
                            <td width=50%>
                                <a href="<?php echo 'HasilDataKapasitasProduksi' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
                                            Sebelumnya</a>
                            </td>
                            <td width=50%>
                                <a href="<?php echo 'HasilDataStockpile' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        <h4 class="modal-title" id="koordinatModalLabel">Spesifikasi Batubara</h4>
                    </div>
                    <div class="modal-body">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Calori</td>
                                        <td >   
                                            <input type='text' class='form-control' name="Calori" id="Calori" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>CV(ar)</td>
                                        <td >   
                                            <input type='text' class='form-control' name="CV" id="CV" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>TM(ar)</td>
                                        <td >  
                                            <input type='text' class='form-control' name="TM" id="TM" 
                                                readonly="true"
                                            style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>IM(adb)</td>
                                        <td > 
                                            <input type='text' class='form-control' name="IM" id="IM" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Ash(ar)</td>
                                        <td >   
                                            <input type='text' class='form-control' name="ASH" id="ASH" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>VM(ar)</td>
                                        <td > 
                                            <input type='text' class='form-control' name="VM" id="VM" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>FC(ar)</td>
                                        <td >  
                                            <input type='text' class='form-control' name="FC" id="FC" 
                                                readonly="true"
                                            style="border:none; background-color:#fff;"></input>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=150>TS(ar)</td>
                                        <td >  
                                            <input type='text' class='form-control' name="TS" id="TS" 
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