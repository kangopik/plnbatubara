@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#SumberDaya').mask("#.##0", {reverse: true});
    $('#Cadangan').mask("#.##0", {reverse: true});
    $('#JumlahTitikBor').mask("#.##0", {reverse: true});
    $('#TotalKedalaman').mask("#.##0", {reverse: true});
    $('#CV').mask("#.##0", {reverse: true});
    $('#TM').mask("#.##0,00", {reverse: true});
    $('#IM').mask("#.##0,00", {reverse: true});
    $('#ASH').mask("#.##0,00", {reverse: true});
    $('#VM').mask("#.##0,00", {reverse: true});
    $('#FC').mask("#.##0,00", {reverse: true});
    $('#TS').mask("#.##0,00", {reverse: true});

    document.getElementById('TMket').innerHTML = "%";
    document.getElementById('IMket').innerHTML = "%";
    document.getElementById('ASHket').innerHTML = "%";
    document.getElementById('VMket').innerHTML = "%";
    document.getElementById('FCket').innerHTML = "%";
    document.getElementById('TSket').innerHTML = "%";
    document.getElementById('CVket').innerHTML = "Kcal";

    $("#titikbor").hide();
    $("#kedalaman").hide();
    $("#struktur").hide();
    $("#jorc").hide();
    $("#trcatatan").hide();



    if (document.getElementById("PengeboranEksplorasi1").checked == true) {
        $("#titikbor").show();
        $("#kedalaman").show();
    }

    if (document.getElementById("PengeboranEksplorasi2").checked == true) {
        $("#titikbor").hide();
        $("#kedalaman").hide();
    }

    $("#PengeboranEksplorasi1").click(function(){
        $("#titikbor").show();
        $("#kedalaman").show();
    });

    $("#PengeboranEksplorasi2").click(function(){
        $("#titikbor").hide();
        $("#kedalaman").hide();
        $('#JumlahTitikBor').val('');
        $('#TotalKedalaman').val('');
    });

    if (document.getElementById("PengeboranGeoteknik1").checked == true) {
        $("#struktur").show();
        $("#jorc").show();
    }

    if (document.getElementById("PengeboranGeoteknik2").checked == true) {
        $("#struktur").hide();
        $("#jorc").hide();
    }

    $("#PengeboranGeoteknik1").click(function(){
        $("#struktur").show();
        $("#jorc").show();
    });

    $("#PengeboranGeoteknik2").click(function(){
        $("#struktur").hide();        
        $('#StrukturGeoteknik').val('');
        $("#jorc").hide();
    });

    $('#InfroTextSubmit').click(function(){
        if ($('#idCalori').val()==="") {
            $('#idCalori').next('.help-inline').show();
            return false;
        }else if($('#CV').val()===""){
            $('#CV').next('.help-inline').show();
            return false;
        }else if($('#TM').val()===""){
            $('#TM').next('.help-inline').show();
            return false;
        }else if($('#IM').val()===""){
            $('#IM').next('.help-inline').show();
            return false;
        }else if($('#Ash').val()===""){
            $('#Ash').next('.help-inline').show();
            return false;
        }else if($('#VM').val()===""){
            $('#VM').next('.help-inline').show();
            return false;
        }else if($('#FC').val()===""){
            $('#FC').next('.help-inline').show();
            return false;
        }else if($('#TS').val()===""){
            $('#TS').next('.help-inline').show();
            return false;
        }else {
          return true;
        }    
    });
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
                        <li class="active">
                            <a href="javascript:void(0);">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datastockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datajetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('VendorController@savedataeksplorasi')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Eksplorasi Tambang</th>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Sumber Daya Terukur</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan sumber daya">
                                            <input type='text' class='form-control' name="SumberDaya" id="SumberDaya" 
                                                    value="{{$data1->SumberDaya}}" onkeypress="return isDecimal(event)" required="required"
                                                <?php if(($data1->SumberDayaCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->SumberDayaCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">MT</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Cadangan (**)</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan sumber daya">
                                            <input type='text' class='form-control' name="Cadangan" id="Cadangan" 
                                                    value="{{$data1->Cadangan}}" onkeypress="return isDecimal(event)" required="required"
                                                <?php if(($data1->CadanganCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->CadanganCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">MT</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Pengeboran Eksplorasi</td>
                                <td style="border:none; border-top:none;">
                                    <input type="radio" name="PengeboranEksplorasi" id="PengeboranEksplorasi1" value="1" 
                                        <?php if(($data1->PengeboranEksplorasi) == "1"){ ?> checked <?php }  ?> > 
                                        Dilakukan</input>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200"></td>
                                <td style="border:none; border-top:none;">
                                    <input type="radio" name="PengeboranEksplorasi" id="PengeboranEksplorasi2" value="0" 
                                        <?php if(($data1->PengeboranEksplorasi) == "0"){ ?> checked <?php }  ?> > 
                                        Tidak Dilakukan</input>
                                </td>
                            </tr>
                            <tr id="titikbor">
                                <td style="border:none; border-top:none;" width="200">Jumlah Titik Bor</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan jumlah titik bor">
                                            <input type='text' class='form-control' name="JumlahTitikBor" id="JumlahTitikBor" 
                                                    value="{{$data1->JumlahTitikBor}}" onkeypress="return isDecimal(event)" 
                                                <?php if(($data1->JumlahTitikBorCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->JumlahTitikBorCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">Titik</a>
                                </td>
                            </tr>
                            <tr id="kedalaman">
                                <td style="border:none; border-top:none;" width="200">Total Kedalaman</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan total kedalaman">
                                            <input type='text' class='form-control' name="TotalKedalaman" id="TotalKedalaman" 
                                                    value="{{$data1->TotalKedalaman}}" onkeypress="return isDecimal(event)" 
                                                <?php if(($data1->TotalKedalamanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->TotalKedalamanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div><a style="font-size:16px;">Mtr</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Pengeboran Geoteknik</td>
                                <td style="border:none; border-top:none;">
                                    <input type="radio" name="PengeboranGeoteknik" id="PengeboranGeoteknik1" value="1" 
                                        <?php if(($data1->PengeboranGeoteknik) == "1"){ ?> checked <?php }  ?> > 
                                        Dilakukan</input>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200"></td>
                                <td style="border:none; border-top:none;">
                                    <input type="radio" name="PengeboranGeoteknik" id="PengeboranGeoteknik2" value="0" 
                                        <?php if(($data1->PengeboranGeoteknik) == "0"){ ?> checked <?php }  ?> > 
                                        Tidak Dilakukan</input>
                                </td>
                            </tr>
                            <tr id="struktur">
                                <td style="border:none; border-top:none;" width="200">Struktur Geoteknik</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan struktur geoteknik">
                                            <textarea class='form-control' name="StrukturGeoteknik" id="StrukturGeoteknik" 
                                                    value="{{$data1->StrukturGeoteknik}}"
                                                    <?php if(($data1->StrukturGeoteknikCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->StrukturGeoteknikCk=='0') { ?> style="background-color:red; color:white;" <?php }?>>{{$data1->StrukturGeoteknik}}</textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="jorc">
                                <td style="border:none; border-top:none;" width="200">JORC</td>
                                <td style="border:none; border-top:none;">
                                    <div class="col-sm-4">
                                        <div data-tip="masukan jorc">
                                            <input type='text' class='form-control' name="JORC" id="JORC" 
                                                    value="{{$data1->JORC}}"
                                                <?php if(($data1->JORCCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->JORCCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
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
                                                    <?php if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                                    <a href="" onclick="document.getElementById('idspesifikasi').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('idCalori').value='<?php echo $row->idCalori ?>';
                                                                            document.getElementById('TM').value='<?php echo $row->TM ?>';
                                                                            <?php if($row->TMCk=='1') { ?>
                                                                            document.getElementById('TM').setAttribute('readOnly','true');
                                                                            document.getElementById('TM').style.background = '#eee'; 
                                                                            document.getElementById('TM').style.color = '#555';
                                                                            <?php } else if($row->TMCk=='0') { ?>
                                                                            document.getElementById('TM').style.background = 'red';
                                                                            document.getElementById('TM').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('TM').style.background = '#FFF';
                                                                            document.getElementById('TM').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('IM').value='<?php echo $row->IM ?>';
                                                                            <?php if($row->IMCk=='1') { ?>
                                                                            document.getElementById('IM').setAttribute('readOnly','true');
                                                                            document.getElementById('IM').style.background = '#eee'; 
                                                                            document.getElementById('IM').style.color = '#555';
                                                                            <?php } else if($row->IMCk=='0') { ?>
                                                                            document.getElementById('IM').style.background = 'red';
                                                                            document.getElementById('IM').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('IM').style.background = '#FFF';
                                                                            document.getElementById('IM').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('ASH').value='<?php echo $row->ASH ?>';
                                                                            <?php if($row->ASHCk=='1') { ?>
                                                                            document.getElementById('ASH').setAttribute('readOnly','true');
                                                                            document.getElementById('ASH').style.background = '#eee'; 
                                                                            document.getElementById('ASH').style.color = '#555';
                                                                            <?php } else if($row->ASHCk=='0') { ?>
                                                                            document.getElementById('ASH').style.background = 'red';
                                                                            document.getElementById('ASH').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('ASH').style.background = '#FFF';
                                                                            document.getElementById('ASH').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('VM').value='<?php echo $row->VM; ?>';
                                                                            <?php if($row->VMCk=='1') { ?>
                                                                            document.getElementById('VM').setAttribute('readOnly','true');
                                                                            document.getElementById('VM').style.background = '#eee'; 
                                                                            document.getElementById('VM').style.color = '#555';
                                                                            <?php } else if($row->VMCk=='0') { ?>
                                                                            document.getElementById('VM').style.background = 'red';
                                                                            document.getElementById('VM').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('VM').style.background = '#FFF';
                                                                            document.getElementById('VM').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('FC').value='<?php echo $row->FC; ?>';
                                                                            <?php if($row->FCCk=='1') { ?>
                                                                            document.getElementById('FC').setAttribute('readOnly','true');
                                                                            document.getElementById('FC').style.background = '#eee'; 
                                                                            document.getElementById('FC').style.color = '#555';
                                                                            <?php } else if($row->FCCk=='0') { ?>
                                                                            document.getElementById('FC').style.background = 'red';
                                                                            document.getElementById('FC').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('FC').style.background = '#FFF';
                                                                            document.getElementById('FC').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('TS').value='<?php echo $row->TS; ?>';
                                                                            <?php if($row->TSCk=='1') { ?>
                                                                            document.getElementById('TS').setAttribute('readOnly','true');
                                                                            document.getElementById('TS').style.background = '#eee'; 
                                                                            document.getElementById('TS').style.color = '#555';
                                                                            <?php } else if($row->TSCk=='0') { ?>
                                                                            document.getElementById('TS').style.background = 'red';
                                                                            document.getElementById('TS').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('TS').style.background = '#FFF';
                                                                            document.getElementById('TS').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('CV').value='<?php echo $row->CV; ?>';
                                                                            <?php if($row->CVCk=='1') { ?>
                                                                            document.getElementById('CV').setAttribute('readOnly','true');
                                                                            document.getElementById('CV').style.background = '#eee'; 
                                                                            document.getElementById('CV').style.color = '#555';
                                                                            <?php } else if($row->CVCk=='0') { ?>
                                                                            document.getElementById('CV').style.background = 'red';
                                                                            document.getElementById('CV').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('CV').style.background = '#FFF';
                                                                            document.getElementById('CV').style.color = '#555';
                                                                            <?php } ?>
                                                                            $('#SumberDaya2').val($('#SumberDaya').val());
                                                                            $('#Cadangan2').val($('#Cadangan').val());
                                                                            $('#PengeboranEksplorasi3').val($('.PengeboranEksplorasi').val());
                                                                            $('#JumlahTitikBor2').val($('#JumlahTitikBor').val());
                                                                            $('#TotalKedalaman2').val($('#TotalKedalaman').val());
                                                                            $('#PengeboranGeoteknik3').val($('.PengeboranGeoteknik').val());
                                                                            $('#StrukturGeoteknik2').val($('#StrukturGeoteknik').val());
                                                                            $('#JORC2').val($('#JORC').val());
                                                                            $('#Catatan_h').val($('#Catatan').val());
                                                                            cekCalori();"
                                                            data-toggle="modal" data-target="#formModal">
                                                            <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                                        <a href="" onclick="document.getElementById('idspesifikasi2').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('asaltambang2').value='<?php echo $row->AsalTambang ?>';
                                                                            document.getElementById('userid2').value='<?php echo $row->UserId ?>';"
                                                                data-toggle="modal" data-target="#confirmModal">
                                                            <i class="fa fa-trash-o"></i> Hapus</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $counter++; } ?>
                                        </tbody>
                                    </table>
                                    <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                    <input type="button" value="Tambah Spesifikasi" class="btn btn-submit  btn-primary" 
                                        data-toggle="modal" data-target="#formModal"
                                        onclick="document.getElementById('idspesifikasi').value='';
                                                $('#TM').attr('readonly', true);
                                                $('#IM').attr('readonly', true);
                                                $('#ASH').attr('readonly', true);
                                                $('#VM').attr('readonly', true);
                                                $('#FC').attr('readonly', true);
                                                $('#TS').attr('readonly', true);
                                                $('#CV').attr('readonly', true);
                                                document.getElementById('idCalori').value='';
                                                document.getElementById('TM').value='';
                                                document.getElementById('TM').style.background = '#FFF';
                                                document.getElementById('TM').style.color = '#555';
                                                document.getElementById('IM').value='';
                                                document.getElementById('IM').style.background = '#FFF';
                                                document.getElementById('IM').style.color = '#555';
                                                document.getElementById('ASH').value='';
                                                document.getElementById('ASH').style.background = '#FFF';
                                                document.getElementById('ASH').style.color = '#555';
                                                document.getElementById('VM').value='';
                                                document.getElementById('VM').style.background = '#FFF';
                                                document.getElementById('VM').style.color = '#555';
                                                document.getElementById('FC').value='';
                                                document.getElementById('FC').style.background = '#FFF';
                                                document.getElementById('FC').style.color = '#555';
                                                document.getElementById('TS').value='';
                                                document.getElementById('TS').style.background = '#FFF';
                                                document.getElementById('TS').style.color = '#555';
                                                document.getElementById('CV').value='';
                                                document.getElementById('CV').style.background = '#FFF';
                                                document.getElementById('CV').style.color = '#555';
                                                $('#SumberDaya2').val($('#SumberDaya').val());
                                                $('#Cadangan2').val($('#Cadangan').val());
                                                $('#PengeboranEksplorasi3').val($('.PengeboranEksplorasi').val());
                                                $('#JumlahTitikBor2').val($('#JumlahTitikBor').val());
                                                $('#TotalKedalaman2').val($('#TotalKedalaman').val());
                                                $('#PengeboranGeoteknik3').val($('.PengeboranGeoteknik').val());
                                                $('#StrukturGeoteknik2').val($('#StrukturGeoteknik').val());
                                                $('#JORC2').val($('#JORC').val());
                                                $('#Catatan_h').val($('#Catatan').val());" >
                                    <?php } ?>
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
                        </tbody>
                    </table>
                    <table width=100%>
                        <tr>                    
                            <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'N') { ?>
                            <td width=50%>
                                <a href="<?php echo 'datakapasitasproduksi' ?>" class="btn btn-primary btn-block btn-flat" 
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
                </form>
        		<p>(*) Rincian nama SEAM dan ketebalannya <br />
					(**) Probable reserves/proved reserves
				</p>	
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
                        <form action="{{action('VendorController@savespesifikasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="idspesifikasi" id="idspesifikasi">
                            <input type="hidden" name="SumberDaya2" id="SumberDaya2">
                            <input type="hidden" name="Cadangan2" id="Cadangan2">
                            <input type="hidden" name="PengeboranEksplorasi3" id="PengeboranEksplorasi3">
                            <input type="hidden" name="JumlahTitikBor2" id="JumlahTitikBor2">
                            <input type="hidden" name="TotalKedalaman2" id="TotalKedalaman2">
                            <input type="hidden" name="PengeboranGeoteknik3" id="PengeboranGeoteknik3">
                            <input type="hidden" name="StrukturGeoteknik2" id="StrukturGeoteknik2">
                            <input type="hidden" name="JORC2" id="JORC2">
                            <input type="hidden" name="Catatan_h" id="Catatan_h">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>                                                                       
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Brand Calori</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>  
                                                <select name="idCalori" id="idCalori" class="form-control" required="required">
                                                    <option value="">-- Pilih Brand Calori --</option>
                                                    <?php
                                                        foreach($data3 as $r){ ?>
                                                            <option value="<?= $r->idCalori; ?>"><?= $r->values ?></option>
                                                    <?php   }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>                                   
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>CV(ar)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai CV">   
                                                    <input type="text" class="form-control" name="CV" id="CV" required="required"
                                                        onkeypress="return isDecimal(event)" ></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="CVket"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>TM(ar)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai TM">   
                                                    <input type='text' class='form-control' name="TM" id="TM" 
                                                        onkeypress="return isDecimal(event)" required="required" onblur="cekTM()"></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="TMket"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>IM(adb)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai IM">   
                                                    <input type='text' class='form-control' name="IM" id="IM" 
                                                        onkeypress="return isDecimal(event)" required="required" onblur="cekIM()"></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="IMket"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Ash(ar)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai ASH">   
                                                    <input type='text' class='form-control' name="ASH" id="ASH" 
                                                        onkeypress="return isDecimal(event)" required="required" onblur="cekASH()"></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="ASHket"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>VM(ar)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai VM">   
                                                    <input type='text' class='form-control' name="VM" id="VM" 
                                                        onkeypress="return isDecimal(event)" required="required" onblur="cekVM()"></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="VMket"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>FC(ar)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai FC">   
                                                    <input type='text' class='form-control' name="FC" id="FC" 
                                                        onkeypress="return isDecimal(event)" required="required" onblur="cekFC()"></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="FCket"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>TS(ar)</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan nilai TS">   
                                                    <input type='text' class='form-control' name="TS" id="TS" 
                                                        onkeypress="return isDecimal(event)" required onblur="cekTS()"></input>
                                                </div>
                                            </div><p style="font-size:16px;" id="TSket"></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>                                
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal koordinat end -->

    <!-- modal konfirmasi sumber tambang end -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletespesifikasi')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="idspesifikasi2" id="idspesifikasi2">
                        <input type="hidden" name="asaltambang2" id="asaltambang2">
                        <input type="hidden" name="userid2" id="userid2">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus spesifikasi batubara ini
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


<script>
var vTM, vIM, vASH, vVM, vFC, vTS, fTM, fIM, fASH, fVM, fFC, fTS;
    
    $('#idCalori').on('change',function(e){
        $('#TM').attr('readonly', true);
        $('#IM').attr('readonly', true);
        $('#ASH').attr('readonly', true);
        $('#VM').attr('readonly', true);
        $('#FC').attr('readonly', true);
        $('#TS').attr('readonly', true);
        $('#CV').attr('readonly', true);
        $('#TM').val('');
        $('#IM').val('');
        $('#ASH').val('');
        $('#VM').val('');
        $('#FC').val('');
        $('#TS').val('');
        $('#CV').val('');
        document.getElementById('TMket').innerHTML = "%";
        document.getElementById('IMket').innerHTML = "%";
        document.getElementById('ASHket').innerHTML = "%";
        document.getElementById('VMket').innerHTML = "%";
        document.getElementById('FCket').innerHTML = "%";
        document.getElementById('TSket').innerHTML = "%";
        document.getElementById('CVket').innerHTML = "Kcal";
        cekCalori();
    });

    function cekCalori(){
        var id = $('#idCalori').val();
        if(id > 0){
            $.ajax({
                url:'CaloriDropDownData/'+id,
                type:'GET',
                success:function(data){
                    var x = data.length;
                    for (i = 0; i < x; i++){
                        if (data[i].spesifikasi == 'TM') { 
                            fTM = data[i].filter; vTM = data[i].values; 
                            document.getElementById('TMket').innerHTML = fTM+" "+vTM+ " %";
                        }
                        if (data[i].spesifikasi == 'IM') { 
                            fIM = data[i].filter; vIM = data[i].values; 
                            document.getElementById('IMket').innerHTML = fIM+" "+vIM+ " %";
                        } 
                        if (data[i].spesifikasi == 'ASH') { 
                            fASH = data[i].filter; vASH = data[i].values; 
                            document.getElementById('ASHket').innerHTML = fASH+" "+vASH+ " %";
                        } 
                        if (data[i].spesifikasi == 'VM') { 
                            fVM = data[i].filter; vVM = data[i].values; 
                            document.getElementById('VMket').innerHTML = fVM+" "+vVM+ " %";
                        } 
                        if (data[i].spesifikasi == 'FC') { 
                            fFC = data[i].filter; vFC = data[i].values;
                            document.getElementById('FCket').innerHTML = fFC+" "+vFC+ " %"; 
                        } 
                        if (data[i].spesifikasi == 'TS') { 
                            fTS = data[i].filter; vTS = data[i].values; 
                            document.getElementById('TSket').innerHTML = fTS+" "+vTS+ " %";
                        }
                    } 
                    $('#CV').attr('readonly', false);
                    $('#IM').attr('readonly', false);
                    $('#ASH').attr('readonly', false);
                    $('#VM').attr('readonly', false);
                    $('#FC').attr('readonly', false);
                    $('#TS').attr('readonly', false);
                    $('#TM').attr('readonly', false);                             
                    document.getElementById('CVket').innerHTML = "Kcal";
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    }

    function cekTM() {
        var x = $("#TM").val();
        x = x.replace('.', '');
        x = x.replace(',', '.');
        x = parseFloat(x);
        v = vTM.replace(',','.');
        v = parseFloat(v);
        if (fTM == "<"){ 
            if(x < v){}else{
                $('#TM').val('');
            }
        }
        if (fTM == ">"){
            if(x > v){}else{
                $('#TM').val('');
            }
        }
        if (fTM == "<>"){
            if(x != v){}else{
                $('#TM').val('');
            }
        }
        if (fTM == "<="){
            if(x <= v){}else{
                $('#TM').val('');
            }
        }
        if (fTM == ">="){
            if(x >= v){}else{
                $('#TM').val('');
            }
        }
    }

    function cekIM() {
        var x = $("#IM").val();
        x = x.replace('.', '');
        x = x.replace(',', '.');
        x = parseFloat(x);
        v = vIM.replace(',','.');
        v = parseFloat(v);
        if (fIM == "<"){
            if(x < v){ }else{
                $('#IM').val(''); 
            } 
        }
        if (fIM == ">"){
            if(x > v){}else{
                $('#IM').val('');
            }
        }
        if (fIM == "<>"){
            if(x != v){}else{
                $('#IM').val('');
            }
        }
        if (fIM == "<="){
            if(x <= v){}else{
                $('#IM').val('');
            }
        }
        if (fIM == ">="){
            if(x >= v){}else{
                $('#IM').val('');
            }
        }
    }

    function cekASH() {
        var x = $("#ASH").val();
        x = x.replace('.', '');
        x = x.replace(',', '.');
        x = parseFloat(x);
        v = vASH.replace(',','.');
        v = parseFloat(v);
        if (fASH == "<"){ 
            if(x < v){}else{
                $('#ASH').val('');
            }
        }
        if (fASH == ">"){
            if(x > v){}else{
                $('#ASH').val('');
            }
        }
        if (fASH == "<>"){
            if(x != v){}else{
                $('#ASH').val('');
            }
        }
        if (fASH == "<="){
            if(x <= v){}else{
                $('#ASH').val('');
            }
        }
        if (fASH == ">="){
            if(x >= v){}else{
                $('#ASH').val('');
            }
        }
    }

    function cekVM() {
        var x = $("#VM").val();
        x = x.replace('.', '');
        x = x.replace(',', '.');
        x = parseFloat(x);
        v = vVM.replace(',','.');
        v = parseFloat(v);
        if (fVM == "<"){ 
            if(x < v){}else{
                $('#VM').val('');
            }
        }
        if (fVM == ">"){
            if(x > v){}else{
                $('#VM').val('');
            }
        }
        if (fVM == "<>"){
            if(x != v){}else{
                $('#VM').val('');
            }
        }
        if (fVM == "<="){
            if(x <= v){}else{
                $('#VM').val('');
            }
        }
        if (fVM == ">="){
            if(x >= v){}else{
                $('#VM').val('');
            }
        }
    }

    function cekFC() {
        var x = $("#FC").val();
        x = x.replace('.', '');
        x = x.replace(',', '.');
        x = parseFloat(x);
        v = vFC.replace(',','.');
        v = parseFloat(v);
        if (fFC == "<"){ 
            if(x < v){}else{
                $('#FC').val('');
            }
        }
        if (fFC == ">"){
            if(x > v){}else{
                $('#FC').val('');
            }
        }
        if (fFC == "<>"){
            if(x != v){}else{
                $('#FC').val('');
            }
        }
        if (fFC == "<="){
            if(x <= v){}else{
                $('#FC').val('');
            }
        }
        if (fFC == ">="){
            if(x >= v){}else{
                $('#FC').val('');
            }
        }
    }

    function cekTS() {
        var x = $("#TS").val();
        x = x.replace('.', '');
        x = x.replace(',', '.');
        x = parseFloat(x);
        v = vTS.replace(',','.');
        v = parseFloat(v);
        if (fTS == "<"){ 
            if(x < v){}else{
                $('#TS').val('');
            }
        }
        if (fTS == ">"){
            if(x > v){}else{
                $('#TS').val('');
            }
        }
        if (fTS == "<>"){
            if(x != v){}else{
                $('#TS').val('');
            }
        }
        if (fTS == "<="){
            if(x <= v){}else{
                $('#TS').val('');
            }
        }
        if (fTS == ">="){
            if(x >= v){}else{
                $('#TS').val('');
            }
        }
    }

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