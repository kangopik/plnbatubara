@extends('layout.admin')
@section('content')
<script type="text/javascript">
$(document).ready(function(){
    $("#trdireksi").hide();
    $("#trpemegang").hide();
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data4->Nama.", ".$data4->BadanUsaha; ?></h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <?php $uli = Session::get('lvlid'); ?>
                        <?php if($uli == '3' || $uli == '5') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailPersonil' ?>" >PERSONEL</a>
                        </li> -->
                        <?php if($uli == '6' || $uli == '8') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailKeuangan' ?>" >KEUANGAN</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailArmada' ?>" >ARMADA</a>
                        </li>
                        <li class="">
                            <a href="<?php //echo 'DetailPengalaman' ?>" >PENGALAMAN</a>
                        </li>
                        <li class="">
                            <a href="<?php //echo 'DetailKontrak' ?>" >KONTRAK</a>
                        </li> -->
                        <?php if($uli == '3' || $uli == '5') { ?>
                        <li class="active">
                            <a href="javascript:void(0);" >IJIN TAMBANG</a>
                        </li>
                        <?php } ?>
                        <?php if($uli == '7' || $uli == '9') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailTeknis' ?>" >TEKNIS TAMBANG</a>
                        </li>
                        <?php } ?>
                    </ul>

                    <!-- PKP2B -->
                    <?php if ($data->JenisIjin == "PKP2B") { ?>
                    <!-- PKP2B -->
                    <!--<form action="{{action('DetailController@savedetailperijinanpkp2b')}}" method="post">-->
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Perjanjian Karya Pengusaha Pertambangan Batubara (PKP2B)
                                    </td>
                                </tr>
                                <tr>
                                    <td width=250>No. PKP2B</td>
                                    <td colspan="4">{{$data9->No}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="PKP2BNoCk" value="1" <?php if($data9->NoCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td colspan="4"><?php if(!is_null($data9->Tanggal)) { echo date("d-m-Y", strtotime($data9->Tanggal));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="PKP2BTanggalCk" value="1" <?php if($data9->TanggalCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!--</form>-->
                    <?php } ?>
                    
                    <!-- IUPOP -->
                    <?php if ($data->JenisIjin == "IUPOP") { ?>
                    <form action="{{action('DetailController@savedetailperijinaniupop')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Ijin Usaha Pertambangan Operasi Produksi (IUP OP)
                                    </td>
                                </tr>
                                <tr>
                                    <td width=250>No. IUP</td>
                                    <td colspan="4">{{$data1->No}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPNoCk" value="1" <?php if($data1->NoCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal IUP</td>
                                    <td colspan="4"><?php if(!is_null($data1->Tanggal)) { echo date("d-m-Y", strtotime($data1->Tanggal));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPTanggalCk" value="1" <?php if($data1->TanggalCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jangka Waktu IUP</td>
                                    <td colspan="4"><?php if(!is_null($data1->JangkaWaktu)) { echo date("d-m-Y", strtotime($data1->JangkaWaktu));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPJangkaWaktuCk" value="1" <?php if($data1->JangkaWaktuCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Menerbitkan</td>
                                    <td colspan="4">
                                        <?php if($data1->Menerbitkan == '1') { echo "Kementrian ESDM / Minerba / BKPM";
                                              }else if($data1->Menerbitkan == '2') { echo "Gubernur / BKPM Provinsi";
                                              }else if($data1->Menerbitkan == '3') { echo "Bupati / Walikota";
                                              }else{ echo ""; } ?>
                                    </td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPMenerbitkanCk" value="1" <?php if($data1->MenerbitkanCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <?php if($data1->Menerbitkan != ''){ ?>
                                <tr>
                                    <td></td>
                                    <?php if($data1->Menerbitkan == '1') { ?>
                                    <td colspan="4">Lintas provinsi dan negara</td>
                                    <?php }else if($data1->Menerbitkan == '2') { ?>
                                    <td colspan="4">Lintas kabupaten dalam provinsi</td>
                                    <?php }else if($data1->Menerbitkan == '3') { ?>
                                    <td colspan="4">Dalam satu kabupaten/kota</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <tr id="trdireksi">
                                    <td>Nama Direksi / Komisaris</td>
                                    <td colspan="4">{{$data1->Dirut}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPDireksiCk" value="1" <?php if($data1->DirutCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr id="trpemegang">
                                    <td>Pemegang Saham Perusahaan</td>
                                    <td colspan="4">{{$data1->Dirut}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPKomisarisCk" value="1" <?php if($data1->KomisarisCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Sertifikat CNC</td>
                                    <td colspan="4">{{$data1->NoCnc}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPCNCCk" value="1" <?php if($data1->NoCncCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal CNC</td>
                                    <td colspan="4"><?php if(!is_null($data1->TanggalCnc)) { echo date("d-m-Y", strtotime($data1->TanggalCnc));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPTanggalCncCk" value="1" <?php if($data1->TanggalCncCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jangka Waktu CNC</td>
                                    <td colspan="4"><?php if(!is_null($data1->JangkaWaktuCnc)) { echo date("d-m-Y", strtotime($data1->JangkaWaktuCnc));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPJangkaWaktuCncCk" value="1" <?php if($data1->JangkaWaktuCncCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr id="iupopfield10">
                                    <td>Lampiran</td>
                                    <td>
                                        <?php if(($data1->LampiranPeta) == "PETA"){ echo "PETA"; }
                                              else { echo "";}  ?> 
                                    </td> 
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPLampiranPetaCk" value="1" <?php if($data1->LampiranPetaCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                    <td colspan="2">
                                        <?php if(($data1->LampiranKoordinat) == "KOORDINAT"){ echo "KOORDINAT"; }
                                              else { echo "";}  ?> 
                                    </td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPLampiranKoordinatCk" value="1" <?php if($data1->LampiranKoordinatCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <a href="<?php echo 'DetailPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                </td>
                                <td width=600>
                                        <button  type="submit" style="text-transform:none; width:150px;"
                                            class="btn btn-submit  btn-primary">Selesai
                                        <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                                </td>  
                            <tr>
                        </table>
                    </form>
                    <?php } ?>
                    <!-- IUPOP -->

                    <!-- IUPOPK -->
                    <?php if ($data->JenisIjin == "IUPOPK") { ?>
                    <form action="{{action('DetailController@savedetailperijinaniupopk')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Ijin Usaha Pertambangan Operasi Khusus Pengangkutan dan Penjualan (IUP OPK)
                                    </td>
                                </tr>
                                <tr>
                                    <td width=250>No. IUP</td>
                                    <td colspan="4">{{$data2->No}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPKNoCk" id="IUPOPKNoCk" value="1" <?php if($data2->NoCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal IUP</td>
                                    <td colspan="4"><?php if(!is_null($data2->Tanggal)) { echo date("d-m-Y", strtotime($data2->Tanggal));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPKTanggalCk" id="IUPOPKTanggalCk" value="1" <?php if($data2->TanggalCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jangka Waktu IUP</td>
                                    <td colspan="4"><?php if(!is_null($data2->JangkaWaktu)) { echo date("d-m-Y", strtotime($data2->JangkaWaktu));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPKJangkaWaktuCk" id="IUPOPKJangkaWaktuCk" value="1" <?php if($data2->JangkaWaktuCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Menerbitkan</td>
                                    <td colspan="4">
                                        <?php if($data2->Menerbitkan == '1') { echo "Kementrian ESDM / Minerba / BKPM";
                                              }else if($data2->Menerbitkan == '2') { echo "Gubernur / BKPM Provinsi";
                                              }else if($data2->Menerbitkan == '3') { echo "Bupati / Walikota";
                                              }else{ echo ""; } ?>
                                    </td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPKMenerbitkanCk" id="IUPOPKMenerbitkanCk" value="1" <?php if($data2->MenerbitkanCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <?php if($data2->Menerbitkan != ''){ ?>
                                <tr>
                                    <td></td>
                                    <?php if($data2->Menerbitkan == '1') { ?>
                                    <td colspan="4">Lintas provinsi dan negara</td>
                                    <?php }else if($data2->Menerbitkan == '2') { ?>
                                    <td colspan="4">Lintas kabupaten dalam provinsi</td>
                                    <?php }else if($data2->Menerbitkan == '3') { ?>
                                    <td colspan="4">Dalam satu kabupaten/kota</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>Wilayah Pengangkutan</td>
                                    <td colspan="4">{{$data2->WilayahPengangkutan}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPKWilayahPengangkutanCk" id="IUPOPKWilayahPengangkutanCk" value="1" <?php if($data2->WilayahPengangkutanCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;" colspan="6">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th style="text-align:center;" width=50>No</th>
                                                <th style="text-align:center;" width=120>Asal Tambang</th>
                                                <th style="text-align:center;" width=120>No. IUP OP</th>
                                                <th style="text-align:center;" width=120>Tgl.</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                                <th style="text-align:center;" width=120>Tgl. Berlaku</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $counter = 1;
                                                    foreach($data6 as $row){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $counter ?></td>
                                                    <td> <?php echo $row->AsalTambang ?></td>
                                                    <td> <?php echo $row->NoIUPOP ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="" onclick="document.getElementById('useridsumber').value='<?php echo $row->UserId ?>';
                                                                document.getElementById('asaltambangsumber').value='<?php echo $row->AsalTambang ?>';
                                                                document.getElementById('jenisiuopk').value='<?php echo $data->JenisIjin ?>';
                                                                document.getElementById('noiupopsumber').value='<?php echo $row->NoIUPOP ?>';
                                                                document.getElementById('nocncsumber').value='<?php echo $row->NoCNC ?>';
                                                                document.getElementById('tglsumber1').value='<?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?>';
                                                                document.getElementById('jangkawaktusumber1').value='<?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?>';
                                                                document.getElementById('tglsumber2').value='<?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?>';
                                                                document.getElementById('jangkawaktusumber2').value='<?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?>';
                                                                <?php if($row->AsalTambangCk=='1') { ?>
                                                                document.getElementById('AsalTambangCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('AsalTambangCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->NoIUPOPCk=='1') { ?>
                                                                document.getElementById('NoIUPOPCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('NoIUPOPCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->NoCNCCk=='1') { ?>
                                                                document.getElementById('NoCNCCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('NoCNCCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->TglIUPOPCk=='1') { ?>
                                                                document.getElementById('TglIUPOPCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('TglIUPOPCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->JangkaWaktuIUPOPCk=='1') { ?>
                                                                document.getElementById('JangkaWaktuIUPOPCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('JangkaWaktuIUPOPCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->TglCNCCk=='1') { ?>
                                                                document.getElementById('TglCNCCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('TglCNCCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->JangkaWaktuCNCCk=='1') { ?>
                                                                document.getElementById('JangkaWaktuCNCCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('JangkaWaktuCNCCk').checked = false;
                                                                <?php } ?>
                                                                $('#IUPOPKNoCk1').val($('#IUPOPKNoCk:checked').val());
                                                                $('#IUPOPKTanggalCk1').val($('#IUPOPKTanggalCk:checked').val());
                                                                $('#IUPOPKJangkaWaktuCk1').val($('#IUPOPKJangkaWaktuCk:checked').val());
                                                                $('#IUPOPKMenerbitkanCk1').val($('#IUPOPKMenerbitkanCk:checked').val());
                                                                $('#IUPOPKWilayahPengangkutanCk1').val($('#IUPOPKWilayahPengangkutanCk:checked').val());" 
                                                            data-toggle="modal" data-target="#asaltambangModal">
                                                            <i class="fa fa-search-plus"></i> Detail</a>
                                                        </td>
                                                </tr>
                                                <?php $counter++; } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <a href="<?php echo 'DetailPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                </td>
                                <td width=600>
                                        <button  type="submit" style="text-transform:none; width:150px;"
                                            class="btn btn-submit  btn-primary">Selesai
                                        <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                                </td>  
                            <tr>
                        </table>
                    </form>                    
                    <?php } ?>
                    <!-- IUPOPK -->

                    <!-- IUPOPK2 -->
                    <?php if ($data->JenisIjin == "IUPOPK2") { ?>
                    <form action="{{action('DetailController@savedetailperijinaniupopk2')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Ijin Usaha Pertambangan Operasi Produksi Khusus Pengolahan dan Pemurnian (IUP OPK)
                                    </td>
                                </tr>
                                <tr>
                                    <td width=500>No. IUP</td>
                                    <td colspan="4">{{$data7->No}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPK2NoCk" id="IUPOPK2NoCk" value="1" <?php if($data7->NoCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal IUP</td>
                                    <td colspan="4"><?php if(!is_null($data7->Tanggal)) { echo date("d-m-Y", strtotime($data7->Tanggal));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPK2TanggalCk" id="IUPOPK2TanggalCk" value="1" <?php if($data7->TanggalCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jangka Waktu IUP</td>
                                    <td colspan="4"><?php if(!is_null($data7->JangkaWaktu)) { echo date("d-m-Y", strtotime($data7->JangkaWaktu));} ?></td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPK2JangkaWaktuCk" id="IUPOPK2JangkaWaktuCk" value="1" <?php if($data7->JangkaWaktuCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Menerbitkan</td>
                                    <td colspan="4">
                                        <?php if($data7->Menerbitkan == '1') { echo "Kementrian ESDM / Minerba / BKPM";
                                              }else if($data7->Menerbitkan == '2') { echo "Gubernur / BKPM Provinsi";
                                              }else if($data7->Menerbitkan == '3') { echo "Bupati / Walikota";
                                              }else{ echo ""; } ?>
                                    </td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPK2MenerbitkanCk" id="IUPOPK2MenerbitkanCk" value="1" <?php if($data7->MenerbitkanCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <?php if($data7->Menerbitkan != ''){ ?>
                                <tr>
                                    <td></td>
                                    <?php if($data7->Menerbitkan == '1') { ?>
                                    <td colspan="4">Lintas provinsi dan negara</td>
                                    <?php }else if($data7->Menerbitkan == '2') { ?>
                                    <td colspan="4">Lintas kabupaten dalam provinsi</td>
                                    <?php }else if($data7->Menerbitkan == '3') { ?>
                                    <td colspan="4">Dalam satu kabupaten/kota</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>Membeli dan mengangkut batubara yang diolah dari IUP OP</td>
                                    <td colspan="4">{{$data7->WilayahPengangkutan}}</td>
                                    <td width="30" style="text-align:left;">
                                        <input type="checkbox" name="IUPOPK2WilayahPengangkutanCk" id="IUPOPK2WilayahPengangkutanCk" value="1" <?php if($data7->WilayahPengangkutanCk=='1') { echo "checked='checked'";}?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;" colspan="6">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th style="text-align:center;" width=50>No</th>
                                                <th style="text-align:center;" width=120>Asal Tambang</th>
                                                <th style="text-align:center;" width=120>No. IUP OP</th>
                                                <th style="text-align:center;" width=120>Tgl.</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                                <th style="text-align:center;" width=120>Tgl. Berlaku</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $counter = 1;
                                                    foreach($data8 as $row){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $counter ?></td>
                                                    <td> <?php echo $row->AsalTambang ?></td>
                                                    <td> <?php echo $row->NoIUPOP ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="" onclick="document.getElementById('useridsumber').value='<?php echo $row->UserId ?>';
                                                                document.getElementById('asaltambangsumber').value='<?php echo $row->AsalTambang ?>';
                                                                document.getElementById('jenisiuopk').value='<?php echo $data->JenisIjin ?>';
                                                                document.getElementById('noiupopsumber').value='<?php echo $row->NoIUPOP ?>';
                                                                document.getElementById('nocncsumber').value='<?php echo $row->NoCNC ?>';
                                                                document.getElementById('tglsumber1').value='<?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?>';
                                                                document.getElementById('jangkawaktusumber1').value='<?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?>';
                                                                document.getElementById('tglsumber2').value='<?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?>';
                                                                document.getElementById('jangkawaktusumber2').value='<?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?>';
                                                                <?php if($row->AsalTambangCk=='1') { ?>
                                                                document.getElementById('AsalTambangCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('AsalTambangCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->NoIUPOPCk=='1') { ?>
                                                                document.getElementById('NoIUPOPCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('NoIUPOPCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->NoCNCCk=='1') { ?>
                                                                document.getElementById('NoCNCCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('NoCNCCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->TglIUPOPCkCk=='1') { ?>
                                                                document.getElementById('TglIUPOPCkCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('TglIUPOPCkCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->JangkaWaktuIUPOPCkCk=='1') { ?>
                                                                document.getElementById('JangkaWaktuIUPOPCkCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('JangkaWaktuIUPOPCkCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->TglCNCCkCk=='1') { ?>
                                                                document.getElementById('TglCNCCkCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('TglCNCCkCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->JangkaWaktuCNCCkCk=='1') { ?>
                                                                document.getElementById('JangkaWaktuCNCCkCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('JangkaWaktuCNCCkCk').checked = false;
                                                                <?php } ?>
                                                                $('#IUPOPK2NoCk1').val($('#IUPOPK2NoCk:checked').val());
                                                                $('#IUPOPK2TanggalCk1').val($('#IUPOPK2TanggalCk:checked').val());
                                                                $('#IUPOPK2JangkaWaktuCk1').val($('#IUPOPK2JangkaWaktuCk:checked').val());
                                                                $('#IUPOPK2MenerbitkanCk1').val($('#IUPOPK2MenerbitkanCk:checked').val());
                                                                $('#IUPOPK2WilayahPengangkutanCk1').val($('#IUPOPK2WilayahPengangkutanCk:checked').val());" 
                                                            data-toggle="modal" data-target="#asaltambangModal">
                                                            <i class="fa fa-search-plus"></i> Detail</a>
                                                        </td>
                                                </tr>
                                                <?php $counter++; } ?>                                                
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width=100%>
                            <tr>
                                <td width=50%>
                                    <a href="<?php echo 'DetailPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                </td>
                                <td width=50%>
                                        <button  type="submit" style="text-transform:none; width:150px;"
                                            class="btn btn-submit  btn-primary">Selesai
                                        <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                                </td>  
                            <tr>
                        </table>
                    </form>
                    <?php } ?>
                    <!-- IUPOPK2 -->

        		</div>
        	</div>
        <div>
    </div>

    <!-- modal koordinat begin -->
    <div class="modal fade" id="asaltambangModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Asal Tambang</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('DetailController@savedetailasaltambang')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="useridsumber" id="useridsumber">
                            <input type="hidden" name="jenisiuopk" id="jenisiuopk">
                            <input type="hidden" name="IUPOPKNoCk1" id="IUPOPKNoCk1">
                            <input type="hidden" name="IUPOPKTanggalCk1" id="IUPOPKTanggalCk1">
                            <input type="hidden" name="IUPOPKJangkaWaktuCk1" id="IUPOPKJangkaWaktuCk1">
                            <input type="hidden" name="IUPOPKMenerbitkanCk1" id="IUPOPKMenerbitkanCk1">
                            <input type="hidden" name="IUPOPKWilayahPengangkutanCk1" id="IUPOPKWilayahPengangkutanCk1">
                            <input type="hidden" name="IUPOPK2NoCk1" id="IUPOPK2NoCk1">
                            <input type="hidden" name="IUPOPK2TanggalCk1" id="IUPOPK2TanggalCk1">
                            <input type="hidden" name="IUPOPK2JangkaWaktuCk1" id="IUPOPK2JangkaWaktuCk1">
                            <input type="hidden" name="IUPOPK2MenerbitkanCk1" id="IUPOPK2MenerbitkanCk1">
                            <input type="hidden" name="IUPOPK2WilayahPengangkutanCk1" id="IUPOPK2WilayahPengangkutanCk1">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=120>Asal Tambang</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>
                                                <input type='text' name="asaltambangsumber" id="asaltambangsumber"  style="border:none;"
                                                    readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="AsalTambangCk" id="AsalTambangCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>No. IUPOP</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="noiupopsumber" id="noiupopsumber" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="NoIUPOPCk" id="NoIUPOPCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Tanggal</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="tglsumber1" id="tglsumber1" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="TglIUPOPCk" id="TglIUPOPCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="jangkawaktusumber1" id="jangkawaktusumber1" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="JangkaWaktuIUPOPCk" id="JangkaWaktuIUPOPCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Sertifikat CNC</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="nocncsumber" id="nocncsumber" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="NoCNCCk" id="NoCNCCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Tanggal</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="tglsumber2" id="tglsumber2" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="TglCNCCk" id="TglCNCCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="jangkawaktusumber2" id="jangkawaktusumber2" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="JangkaWaktuCNCCk" id="JangkaWaktuCNCCk" value="1"/>
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

</div>

<script>
    $("#btnnext").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>

@stop()