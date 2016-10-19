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
                        <li class="active">
                            <a href="javascript:void(0);">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataStockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailDataJetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('DetailController@savedetaildataeksplorasi')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Eksplorasi Tambang</th>
                            </tr>
                            <tr>
                                <td width="200">Sumber Daya</td>
                                <td>{{$data1->SumberDaya}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="SumberDayaCk" id="SumberDayaCk" 
                                    	value="1" <?php if($data1->SumberDayaCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Cadangan </td>
                                <td>{{$data1->Cadangan}} MT</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="CadanganCk" id="CadanganCk" 
                                    	value="1" <?php if($data1->CadanganCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Pengeboran Eksplorasi</td>
                            </tr>
                            <tr id="titikbor">
                                <td width="200">Jumlah Titik Bor</td>
                                <td>{{$data1->JumlahTitikBor}} Titik</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="JumlahTitikBorCk" id="JumlahTitikBorCk" 
                                    	value="1" <?php if($data1->JumlahTitikBorCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr id="kedalaman">
                                <td width="200">Total Kedalaman</td>
                                <td>{{$data1->TotalKedalaman}} Mtr</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TotalKedalamanCk" id="TotalKedalamanCk" 
                                    	value="1" <?php if($data1->TotalKedalamanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td width="200">Pengeboran Geoteknik</td>
                            </tr>
                            <tr id="struktur">
                                <td width="200">Struktur Geoteknik</td>
                                <td>{{$data1->StrukturGeoteknik}}</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="StrukturGeoteknikCk" id="StrukturGeoteknikCk" 
                                    	value="1" <?php if($data1->StrukturGeoteknikCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr id="jorc">
                                <td width="200">JORC</td>
                                <td>{{$data1->JORC}}</td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="JORCCk" id="JORCCk" 
                                        value="1" <?php if($data1->JORCCk=='1') { echo "checked='checked'";}?>/>
                                </td>
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
                                                <td> <?php echo $row->CV.' Kcal' ?></td>
                                                <td> <?php echo $row->TM.' %' ?></td>
                                                <td> <?php echo $row->IM.' %' ?></td>
                                                <td> <?php echo $row->ASH.' %' ?></td>
                                                <td> <?php echo $row->VM.' %' ?></td>
                                                <td> <?php echo $row->FC.' %' ?></td>
                                                <td> <?php echo $row->TS.' %' ?></td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="document.getElementById('idspesifikasi').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('Calori').value='<?php echo $row->values ?>';
                                                                            document.getElementById('TM').value='<?php echo $row->TM ?>';
                                                                            <?php if($row->TMCk=='1') { ?>
                                                                            document.getElementById('TMCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('TMCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('IM').value='<?php echo $row->IM ?>';
                                                                            <?php if($row->IMCk=='1') { ?>
                                                                            document.getElementById('IMCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('IMCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('ASH').value='<?php echo $row->ASH ?>';
                                                                            <?php if($row->ASHCk=='1') { ?>
                                                                            document.getElementById('ASHCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('ASHCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('VM').value='<?php echo $row->VM; ?>';
                                                                            <?php if($row->VMCk=='1') { ?>
                                                                            document.getElementById('VMCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('VMCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('FC').value='<?php echo $row->FC; ?>';
                                                                            <?php if($row->FCCk=='1') { ?>
                                                                            document.getElementById('FCCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('FCCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('TS').value='<?php echo $row->TS; ?>';
                                                                            <?php if($row->TSCk=='1') { ?>
                                                                            document.getElementById('TSCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('TSCk').checked = false;
                                                                            <?php } ?>
                                                                            document.getElementById('CV').value='<?php echo $row->CV; ?>';
                                                                            <?php if($row->CVCk=='1') { ?>
                                                                            document.getElementById('CVCk').checked = true;
                                                                            <?php } else { ?>
                                                                            document.getElementById('CVCk').checked = false;
                                                                            <?php } ?>
                                                                            $('#SumberDayaCk1').val($('#SumberDayaCk:checked').val());
                                                                            $('#CadanganCk1').val($('#CadanganCk:checked').val());
                                                                            $('#JumlahTitikBorCk1').val($('#JumlahTitikBorCk:checked').val());
                                                                            $('#TotalKedalamanCk1').val($('#TotalKedalamanCk:checked').val());
                                                                            $('#StrukturGeoteknikCk1').val($('#StrukturGeoteknikCk:checked').val());
                                                                            $('#JORCCk1').val($('#JORCCk:checked').val());"
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
                                <a href="<?php echo 'DetailDataKapasitasProduksi' ?>" class="btn btn-primary btn-block btn-flat" 
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
                        <h4 class="modal-title" id="koordinatModalLabel">Spesifikasi Batubara</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('DetailController@savedetailspek')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="idspesifikasi" id="idspesifikasi">
                            <input type="hidden" name="SumberDayaCk1" id="SumberDayaCk1">
                            <input type="hidden" name="CadanganCk1" id="CadanganCk1">
                            <input type="hidden" name="JumlahTitikBorCk1" id="JumlahTitikBorCk1">
                            <input type="hidden" name="TotalKedalamanCk1" id="TotalKedalamanCk1">
                            <input type="hidden" name="StrukturGeoteknikCk1" id="StrukturGeoteknikCk1">
                            <input type="hidden" name="JORCCk1" id="JORCCk1">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td width=150>Calori</td>
                                        <td >   
                                            <input type='text' class='form-control' name="Calori" id="Calori" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>CV(ar)</td>
                                        <td >   
                                            <input type='text' class='form-control' name="CV" id="CV" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="CVCk" id="CVCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>TM(ar)</td>
                                        <td >  
                                            <input type='text' class='form-control' name="TM" id="TM" 
                                                readonly="true"
                                            style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TMCk" id="TMCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>IM(adb)</td>
                                        <td > 
                                            <input type='text' class='form-control' name="IM" id="IM" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="IMCk" id="IMCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>Ash(ar)</td>
                                        <td >   
                                            <input type='text' class='form-control' name="ASH" id="ASH" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="ASHCk" id="ASHCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>VM(ar)</td>
                                        <td > 
                                            <input type='text' class='form-control' name="VM" id="VM" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="VMCk" id="VMCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>FC(ar)</td>
                                        <td >  
                                            <input type='text' class='form-control' name="FC" id="FC" 
                                                readonly="true"
                                            style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="FCCk" id="FCCk" value="1"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td width=150>TS(ar)</td>
                                        <td >  
                                            <input type='text' class='form-control' name="TS" id="TS" 
                                                readonly="true"
                                                    style="border:none; background-color:#fff;"></input>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TSCk" id="TSCk" value="1"/>
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