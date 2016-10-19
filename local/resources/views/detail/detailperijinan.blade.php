@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data2->Nama.', '.$data2->BadanUsaha; ?></h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <?php $uli = Session::get('lvlid'); ?>
                        <?php if($uli == '3' || $uli == '5') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);" >IJIN PERUSAHAAN</a>
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
                        <li class="">
                            <a href="<?php echo 'DetailIjinTambang' ?>" >IJIN TAMBANG</a>
                        </li>
                        <?php } ?>
                        <?php if($uli == '7' || $uli == '9') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailTeknis' ?>" >TEKNIS TAMBANG</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                        <div class="col-lg-12">
                            <form action="{{action('DetailController@savedetailperijinan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="success"> 
                                        <th colspan="7">Akta Pendirian Perusahaan / Anggaran Dasar</th>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" width="170">Nomor Akta</td>
                                        <td style="border-top:none;" width="250">
                                            <div>{{$data->NomorAkta}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorAktaCk" id="NomorAktaCk" value="1" <?php if($data->NomorAktaCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td style="border-top:none;" width="40">Tanggal</td>
                                        <td style="border-top:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalAkta)) { echo date("d-m-Y", strtotime($data->TanggalAkta)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalAktaCk" id="TanggalAktaCk" value="1" <?php if($data->TanggalAktaCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" >Nama Notaris</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->NamaNotaris}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NamaNotarisCk" id="NamaNotarisCk" value="1" <?php if($data->NamaNotarisCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>SK Kemenhumkam / Pengesahan Pengadilan / Kementrian Koperasi</b></td>
                                    </tr>
                                    <tr>
                                        <td  width="170">Nomor SK</td>
                                        <td width="250">
                                            <div>{{$data->NomorPengesahanKemenhumkam}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorPengesahanKemenhumkamCk" id="NomorPengesahanKemenhumkamCk" value="1" <?php if($data->NomorPengesahanKemenhumkamCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td width="40">Tanggal SK</td>
                                        <td width="60">
                                            <div><?php if(!is_null($data->TanggalPengesahanKemenhumkam)) { echo date("d-m-Y", strtotime($data->TanggalPengesahanKemenhumkam)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalPengesahanKemenhumkamCk" id="TanggalPengesahanKemenhumkamCk" value="1" <?php if($data->TanggalPengesahanKemenhumkamCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <?php if(!is_null($datakomisaris)) { ?> 
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5><b>Susunan Pemegang Saham</b></h5>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th width="50" style="text-align:center;">No</th>
                                                        <th width="400" style="text-align:center;">Nama</th>
                                                        <th width="200" style="text-align:center;">No. KTP</th>
                                                        <th width="180" style="text-align:center;">Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $counter = 1;
                                                            foreach($datakomisaris as $row){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $counter ?></td>
                                                            <td><?php echo $row->Nama ?></td>
                                                            <td><?php echo $row->NoKTP ?></td>
                                                            <td style="text-align:center;">
                                                                <a href="" onclick="document.getElementById('namakomisaris').value='<?php echo $row->Nama ?>';
                                                                                    document.getElementById('ktpkomisaris').value='<?php echo $row->NoKTP ?>';
                                                                                    <?php if($row->NamaCk=='1'){ ?>
                                                                                    document.getElementById('NamaKomisarisCk').checked = true;
                                                                                    <?php } else { ?>                                                                                
                                                                                    document.getElementById('NamaKomisarisCk').checked = false;
                                                                                    <?php } ?>
                                                                                    <?php if($row->NoKTPCk=='1') { ?>
                                                                                    document.getElementById('NoKTPKomisarisCk').checked = true;
                                                                                    <?php } else { ?>                                                                                
                                                                                    document.getElementById('NoKTPKomisarisCk').checked = false;
                                                                                    <?php } ?>
                                                                                    $('#NomorAktaCk1').val($('#NomorAktaCk:checked').val());
                                                                                    $('#TanggalAktaCk1').val($('#TanggalAktaCk:checked').val());
                                                                                    $('#NamaNotarisCk1').val($('#NamaNotarisCk:checked').val());
                                                                                    $('#NomorPengesahanKemenhumkamCk1').val($('#NomorPengesahanKemenhumkamCk:checked').val());
                                                                                    $('#TanggalPengesahanKemenhumkamCk1').val($('#TanggalPengesahanKemenhumkamCk:checked').val());
                                                                                    $('#NomorAktaPerubahanCk1').val($('#NomorAktaPerubahanCk:checked').val());
                                                                                    $('#TanggalAktaPerubahanCk1').val($('#TanggalAktaPerubahanCk:checked').val());
                                                                                    $('#NamaNotarisPerubahanCk1').val($('#NamaNotarisPerubahanCk:checked').val());
                                                                                    $('#NomorPengesahanKemenhumkamPerubahanCk1').val($('#NomorPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                    $('#TanggalPengesahanKemenhumkamPerubahanCk1').val($('#TanggalPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                    $('#PenerbitSIUPCk1').val($('#PenerbitSIUPCk:checked').val());
                                                                                    $('#NomorSIUPCk1').val($('#NomorSIUPCk:checked').val());
                                                                                    $('#TanggalSIUPCk1').val($('#TanggalSIUPCk:checked').val());
                                                                                    $('#TanggalSdSIUPCk1').val($('#TanggalSdSIUPCk:checked').val());
                                                                                    $('#PenerbitTDPCk1').val($('#PenerbitTDPCk:checked').val());
                                                                                    $('#NomorTDPCk1').val($('#NomorTDPCk:checked').val());
                                                                                    $('#TanggalTDPCk1').val($('#TanggalTDPCk:checked').val());
                                                                                    $('#TanggalSdTDPCk1').val($('#TanggalSdTDPCk:checked').val());
                                                                                    $('#PenerbitSKDPCk1').val($('#PenerbitSKDPCk:checked').val());
                                                                                    $('#NomorSKDPCk1').val($('#NomorSKDPCk:checked').val());
                                                                                    $('#TanggalSKDPCk1').val($('#TanggalSKDPCk:checked').val());
                                                                                    $('#TanggalSdSKDPCk1').val($('#TanggalSdSKDPCk:checked').val());"
                                                                    data-toggle="modal" data-target="#komisarisModal1">
                                                                    <i class="fa fa-search-plus"></i> Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $counter++; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <?php if(!is_null($datadireksi))  { ?>
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><b>Susunan Pengurus Perusahaan</b></h5>
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <th width="50" style="text-align:center;">No</th>
                                                            <th width="400" style="text-align:center;">Nama</th>
                                                            <th width="200" style="text-align:center;">No. KTP</th>
                                                            <th width="250" style="text-align:center;">Jabatan</th>
                                                            <th width="180" style="text-align:center;">Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $counter = 1;
                                                                foreach($datadireksi as $row){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $counter ?></td>
                                                                <td><?php echo $row->Nama ?></td>
                                                                <td><?php echo $row->NoKTP ?></td>
                                                                <td><?php echo $row->Jabatan ?></td>
                                                                <td style="text-align:center;">
                                                                    <a href="" onclick="document.getElementById('namadireksi').value='<?php echo $row->Nama ?>';
                                                                                        document.getElementById('ktpdireksi').value='<?php echo $row->NoKTP ?>';
                                                                                        document.getElementById('jabatandireksi').value='<?php echo $row->Jabatan ?>';
                                                                                        <?php if($row->NamaCk=='1'){ ?>
                                                                                        document.getElementById('NamaDireksiCk').checked = true;
                                                                                        <?php } else { ?>                                                                                
                                                                                        document.getElementById('NamaDireksiCk').checked = false;
                                                                                        <?php } ?>
                                                                                        <?php if($row->NoKTPCk=='1') { ?>
                                                                                        document.getElementById('NoKTPDireksiCk').checked = true;
                                                                                        <?php } else { ?>                                                                                
                                                                                        document.getElementById('NoKTPDireksiCk').checked = false;
                                                                                        <?php } ?>
                                                                                        <?php if($row->JabatanCk=='1') { ?>
                                                                                        document.getElementById('JabatanDireksiCk').checked = true;
                                                                                        <?php } else { ?>                                                                                
                                                                                        document.getElementById('JabatanDireksiCk').checked = false;
                                                                                        <?php } ?>
                                                                                        $('#NomorAktaCk2').val($('#NomorAktaCk:checked').val());
                                                                                        $('#TanggalAktaCk2').val($('#TanggalAktaCk:checked').val());
                                                                                        $('#NamaNotarisCk2').val($('#NamaNotarisCk:checked').val());
                                                                                        $('#NomorPengesahanKemenhumkamCk2').val($('#NomorPengesahanKemenhumkamCk:checked').val());
                                                                                        $('#TanggalPengesahanKemenhumkamCk2').val($('#TanggalPengesahanKemenhumkamCk:checked').val());
                                                                                        $('#NomorAktaPerubahanCk2').val($('#NomorAktaPerubahanCk:checked').val());
                                                                                        $('#TanggalAktaPerubahanCk2').val($('#TanggalAktaPerubahanCk:checked').val());
                                                                                        $('#NamaNotarisPerubahanCk2').val($('#NamaNotarisPerubahanCk:checked').val());
                                                                                        $('#NomorPengesahanKemenhumkamPerubahanCk2').val($('#NomorPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                        $('#TanggalPengesahanKemenhumkamPerubahanCk2').val($('#TanggalPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                        $('#PenerbitSIUPCk2').val($('#PenerbitSIUPCk:checked').val());
                                                                                        $('#NomorSIUPCk2').val($('#NomorSIUPCk:checked').val());
                                                                                        $('#TanggalSIUPCk2').val($('#TanggalSIUPCk:checked').val());
                                                                                        $('#TanggalSdSIUPCk2').val($('#TanggalSdSIUPCk:checked').val());
                                                                                        $('#PenerbitTDPCk2').val($('#PenerbitTDPCk:checked').val());
                                                                                        $('#NomorTDPCk2').val($('#NomorTDPCk:checked').val());
                                                                                        $('#TanggalTDPCk2').val($('#TanggalTDPCk:checked').val());
                                                                                        $('#TanggalSdTDPCk2').val($('#TanggalSdTDPCk:checked').val());
                                                                                        $('#PenerbitSKDPCk2').val($('#PenerbitSKDPCk:checked').val());
                                                                                        $('#NomorSKDPCk2').val($('#NomorSKDPCk:checked').val());
                                                                                        $('#TanggalSKDPCk2').val($('#TanggalSKDPCk:checked').val());
                                                                                        $('#TanggalSdSKDPCk2').val($('#TanggalSdSKDPCk:checked').val());"
                                                                        data-toggle="modal" data-target="#direksiModal1">
                                                                        <i class="fa fa-search-plus"></i> Detail
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <tr class="success"> 
                                        <th colspan="7">Akta Perubahan Anggaran Dasar Terakhir</th>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" width="170">Nomor Akta</td>
                                        <td style="border-top:none;" width="250">
                                            <div>{{$data->NomorAktaPerubahan}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorAktaPerubahanCk" id="NomorAktaPerubahanCk" value="1" <?php if($data->NomorAktaPerubahanCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td style="border-top:none;" width="40">Tanggal Akta</td>
                                        <td style="border-top:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalAktaPerubahan)) { echo date("d-m-Y", strtotime($data->TanggalAktaPerubahan)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalAktaPerubahanCk" id="TanggalAktaPerubahanCk" value="1" <?php if($data->TanggalAktaPerubahanCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" >Nama Notaris</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->NamaNotarisPerubahan}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NamaNotarisPerubahanCk" id="NamaNotarisPerubahanCk" value="1" <?php if($data->NamaNotarisPerubahanCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>SK Kemenhumkam / Pengesahan Pengadilan / Kementrian Koperasi</b></td>
                                    </tr>
                                    <tr>
                                        <td  width="170">Nomor SK</td>
                                        <td width="250">
                                            <div>{{$data->NomorPengesahanKemenhumkamPerubahan}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorPengesahanKemenhumkamPerubahanCk" id="NomorPengesahanKemenhumkamPerubahanCk" value="1" <?php if($data->NomorPengesahanKemenhumkamPerubahanCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td width="40">Tanggal SK</td>
                                        <td width="60">
                                            <div><?php if(!is_null($data->TanggalPengesahanKemenhumkamPerubahan)) { echo date("d-m-Y", strtotime($data->TanggalPengesahanKemenhumkamPerubahan)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalPengesahanKemenhumkamPerubahanCk" id="TanggalPengesahanKemenhumkamPerubahanCk" value="1" <?php if($data->TanggalPengesahanKemenhumkamPerubahanCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <?php if(!is_null($datakomisarisperubahan))  { ?>
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5><b>Susunan Pemegang Saham</b></h5>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th width="50" style="text-align:center;">No</th>
                                                        <th width="400" style="text-align:center;">Nama</th>
                                                        <th width="200" style="text-align:center;">No. KTP</th>
                                                        <th width="180" style="text-align:center;">Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $counter = 1;
                                                            foreach($datakomisarisperubahan as $row){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $counter ?></td>
                                                            <td><?php echo $row->Nama ?></td>
                                                            <td><?php echo $row->NoKTP ?></td>
                                                            <td style="text-align:center;">
                                                                <a href="" onclick="document.getElementById('namakomisarisperubahan').value='<?php echo $row->Nama ?>';
                                                                                    document.getElementById('ktpkomisarisperubahan').value='<?php echo $row->NoKTP ?>';
                                                                                    <?php if($row->NamaCk=='1'){ ?>
                                                                                    document.getElementById('NamaKomisarisPerubahanCk').checked = true;
                                                                                    <?php } else { ?>                                                                                
                                                                                    document.getElementById('NamaKomisarisPerubahanCk').checked = false;
                                                                                    <?php } ?>
                                                                                    <?php if($row->NoKTPCk=='1') { ?>
                                                                                    document.getElementById('NoKTPKomisarisPerubahanCk').checked = true;
                                                                                    <?php } else { ?>                                                                                
                                                                                    document.getElementById('NoKTPKomisarisPerubahanCk').checked = false;
                                                                                    <?php } ?>
                                                                                    $('#NomorAktaCk3').val($('#NomorAktaCk:checked').val());
                                                                                    $('#TanggalAktaCk3').val($('#TanggalAktaCk:checked').val());
                                                                                    $('#NamaNotarisCk3').val($('#NamaNotarisCk:checked').val());
                                                                                    $('#NomorPengesahanKemenhumkamCk3').val($('#NomorPengesahanKemenhumkamCk:checked').val());
                                                                                    $('#TanggalPengesahanKemenhumkamCk3').val($('#TanggalPengesahanKemenhumkamCk:checked').val());
                                                                                    $('#NomorAktaPerubahanCk3').val($('#NomorAktaPerubahanCk:checked').val());
                                                                                    $('#TanggalAktaPerubahanCk3').val($('#TanggalAktaPerubahanCk:checked').val());
                                                                                    $('#NamaNotarisPerubahanCk3').val($('#NamaNotarisPerubahanCk:checked').val());
                                                                                    $('#NomorPengesahanKemenhumkamPerubahanCk3').val($('#NomorPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                    $('#TanggalPengesahanKemenhumkamPerubahanCk3').val($('#TanggalPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                    $('#PenerbitSIUPCk3').val($('#PenerbitSIUPCk:checked').val());
                                                                                    $('#NomorSIUPCk3').val($('#NomorSIUPCk:checked').val());
                                                                                    $('#TanggalSIUPCk3').val($('#TanggalSIUPCk:checked').val());
                                                                                    $('#TanggalSdSIUPCk3').val($('#TanggalSdSIUPCk:checked').val());
                                                                                    $('#PenerbitTDPCk3').val($('#PenerbitTDPCk:checked').val());
                                                                                    $('#NomorTDPCk3').val($('#NomorTDPCk:checked').val());
                                                                                    $('#TanggalTDPCk3').val($('#TanggalTDPCk:checked').val());
                                                                                    $('#TanggalSdTDPCk3').val($('#TanggalSdTDPCk:checked').val());
                                                                                    $('#PenerbitSKDPCk3').val($('#PenerbitSKDPCk:checked').val());
                                                                                    $('#NomorSKDPCk3').val($('#NomorSKDPCk:checked').val());
                                                                                    $('#TanggalSKDPCk3').val($('#TanggalSKDPCk:checked').val());
                                                                                    $('#TanggalSdSKDPCk3').val($('#TanggalSdSKDPCk:checked').val());"
                                                                    data-toggle="modal" data-target="#komisarisModal2">
                                                                    <i class="fa fa-search-plus"></i> Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $counter++; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(!is_null($datadireksiperubahan))  { ?>
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><b>Susunan Pengurus Perusahaan</b></h5>
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <th width="50" style="text-align:center;">No</th>
                                                            <th width="400" style="text-align:center;">Nama</th>
                                                            <th width="200" style="text-align:center;">No. KTP</th>
                                                            <th width="250" style="text-align:center;">Jabatan</th>
                                                            <th width="180" style="text-align:center;">Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $counter = 1;
                                                                foreach($datadireksiperubahan as $row){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $counter ?></td>
                                                                <td><?php echo $row->Nama ?></td>
                                                                <td><?php echo $row->NoKTP ?></td>
                                                                <td><?php echo $row->Jabatan ?></td>
                                                                <td style="text-align:center;">
                                                                    <a href="" onclick="document.getElementById('namadireksiperubahan').value='<?php echo $row->Nama ?>';
                                                                                        document.getElementById('ktpdireksiperubahan').value='<?php echo $row->NoKTP ?>';
                                                                                        document.getElementById('jabatandireksiperubahan').value='<?php echo $row->Jabatan ?>';
                                                                                        <?php if($row->NamaCk=='1'){ ?>
                                                                                        document.getElementById('NamaDireksiPerubahanCk').checked = true;
                                                                                        <?php } else { ?>                                                                                
                                                                                        document.getElementById('NamaDireksiPerubahanCk').checked = false;
                                                                                        <?php } ?>
                                                                                        <?php if($row->NoKTPCk=='1') { ?>
                                                                                        document.getElementById('NoKTPDireksiPerubahanCk').checked = true;
                                                                                        <?php } else { ?>                                                                                
                                                                                        document.getElementById('NoKTPDireksiPerubahanCk').checked = false;
                                                                                        <?php } ?>
                                                                                        <?php if($row->JabatanCk=='1') { ?>
                                                                                        document.getElementById('JabatanDireksiPerubahanCk').checked = true;
                                                                                        <?php } else { ?>                                                                                
                                                                                        document.getElementById('JabatanDireksiPerubahanCk').checked = false;
                                                                                        <?php } ?>
                                                                                        $('#NomorAktaCk4').val($('#NomorAktaCk:checked').val());
                                                                                        $('#TanggalAktaCk4').val($('#TanggalAktaCk:checked').val());
                                                                                        $('#NamaNotarisCk4').val($('#NamaNotarisCk:checked').val());
                                                                                        $('#NomorPengesahanKemenhumkamCk4').val($('#NomorPengesahanKemenhumkamCk:checked').val());
                                                                                        $('#TanggalPengesahanKemenhumkamCk4').val($('#TanggalPengesahanKemenhumkamCk:checked').val());
                                                                                        $('#NomorAktaPerubahanCk4').val($('#NomorAktaPerubahanCk:checked').val());
                                                                                        $('#TanggalAktaPerubahanCk4').val($('#TanggalAktaPerubahanCk:checked').val());
                                                                                        $('#NamaNotarisPerubahanCk4').val($('#NamaNotarisPerubahanCk:checked').val());
                                                                                        $('#NomorPengesahanKemenhumkamPerubahanCk4').val($('#NomorPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                        $('#TanggalPengesahanKemenhumkamPerubahanCk4').val($('#TanggalPengesahanKemenhumkamPerubahanCk:checked').val());
                                                                                        $('#PenerbitSIUPCk4').val($('#PenerbitSIUPCk:checked').val());
                                                                                        $('#NomorSIUPCk4').val($('#NomorSIUPCk:checked').val());
                                                                                        $('#TanggalSIUPCk4').val($('#TanggalSIUPCk:checked').val());
                                                                                        $('#TanggalSdSIUPCk4').val($('#TanggalSdSIUPCk:checked').val());
                                                                                        $('#PenerbitTDPCk4').val($('#PenerbitTDPCk:checked').val());
                                                                                        $('#NomorTDPCk4').val($('#NomorTDPCk:checked').val());
                                                                                        $('#TanggalTDPCk4').val($('#TanggalTDPCk:checked').val());
                                                                                        $('#TanggalSdTDPCk4').val($('#TanggalSdTDPCk:checked').val());
                                                                                        $('#PenerbitSKDPCk4').val($('#PenerbitSKDPCk:checked').val());
                                                                                        $('#NomorSKDPCk4').val($('#NomorSKDPCk:checked').val());
                                                                                        $('#TanggalSKDPCk4').val($('#TanggalSKDPCk:checked').val());
                                                                                        $('#TanggalSdSKDPCk4').val($('#TanggalSdSKDPCk:checked').val());"
                                                                        data-toggle="modal" data-target="#direksiModal2">
                                                                        <i class="fa fa-search-plus"></i> Detail
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr class="success"> 
                                        <th colspan="7">Perijinan Perusahaan</th>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>Surat Ijin Usaha Perdagangan (SIUP)</b></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Penerbit</td>
                                        <td  width="250">
                                            <div>{{$data->PenerbitSIUP}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="PenerbitSIUPCk" id="PenerbitSIUPCk" value="1" <?php if($data->PenerbitSIUPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td width="40">Nomor</td>
                                        <td width="60">
                                            <div>{{$data->NomorSIUP}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorSIUPCk" id="NomorSIUPCk" value="1" <?php if($data->NomorSIUPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" width="170">Tanggal</td>
                                        <td style="border-top:none;" width="250">
                                            <div><?php if(!is_null($data->TanggalSIUP)) { echo date("d-m-Y", strtotime($data->TanggalSIUP)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalSIUPCk" id="TanggalSIUPCk" value="1" <?php if($data->TanggalSIUPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td style="border-top:none;" width="40">s/d Tanggal</td>
                                        <td style="border-top:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalSdSIUP)) { echo date("d-m-Y", strtotime($data->TanggalSdSIUP)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalSdSIUPCk" id="TanggalSdSIUPCk" value="1" <?php if($data->TanggalSdSIUPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>Tanda Daftar Perusahaan (TDP)</b></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Penerbit</td>
                                        <td width="250">
                                            <div>{{$data->PenerbitTDP}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="PenerbitTDPCk" id="PenerbitTDPCk" value="1" <?php if($data->PenerbitTDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td width="40">Nomor</td>
                                        <td width="60">
                                            <div>{{$data->NomorTDP}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorTDPCk" id="NomorTDPCk" value="1" <?php if($data->NomorTDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" width="170">Tanggal</td>
                                        <td style="border-top:none;" width="250">
                                            <div><?php if(!is_null($data->TanggalTDP)) { echo date("d-m-Y", strtotime($data->TanggalTDP)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalTDPCk" id="TanggalTDPCk" value="1" <?php if($data->TanggalTDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td style="border-top:none;" width="40">s/d Tanggal</td>
                                        <td style="border-top:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalSdTDP)) { echo date("d-m-Y", strtotime($data->TanggalSdTDP)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalSdTDPCk" id="TanggalSdTDPCk" value="1" <?php if($data->TanggalSdTDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>Surat Keterangan Domisili Perusahaan (SKDP)</b></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Penerbit</td>
                                        <td width="250">
                                            <div>{{$data->PenerbitSKDP}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="PenerbitSKDPCk" id="PenerbitSKDPCk" value="1" <?php if($data->PenerbitSKDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td width="40">Nomor</td>
                                        <td width="60">
                                            <div>{{$data->NomorSKDP}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NomorSKDPCk" id="NomorSKDPCk" value="1" <?php if($data->NomorSKDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="170">Tanggal</td>
                                        <td width="250">
                                            <div><?php if(!is_null($data->TanggalSKDP)) { echo date("d-m-Y", strtotime($data->TanggalSKDP)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalSKDPCk" id="TanggalSKDPCk" value="1" <?php if($data->TanggalSKDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td width="40">s/d Tanggal</td>
                                        <td width="60">
                                            <div><?php if(!is_null($data->TanggalSdSKDP)) { echo date("d-m-Y", strtotime($data->TanggalSdSKDP)); } ?></div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TanggalSdSKDPCk" id="TanggalSdSKDPCk" value="1" <?php if($data->TanggalSdSKDPCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <table width=100%>
                                <tr>
                                    <td width=50%>
                                        <a href="<?php echo 'DetailAdministrasi' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                    </td>
                                    <td width=50%>
                                            <button  type="submit" style="text-transform:none; width:150px;"
                                                class="btn btn-submit  btn-primary">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                                    </td>  
                                <tr>
                            </table>
                                                        <p>&nbsp;</p>
                                                        <p>&nbsp;</p>
                            </form>
                        </div>
                    </div>
                        </div>
                    <div>
        		</div>
        	</div>
        <div>
    </div>
</div>
<!-- modal komisaris 1 --> 
<div class="modal fade" id="komisarisModal1" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pemegang Saham</h4>
                </div>
                <div class="modal-body">
                    <form action="{{action('DetailController@savedetailkomisaris')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="NomorAktaCk1" id="NomorAktaCk1" >
                        <input type="hidden" name="TanggalAktaCk1" id="TanggalAktaCk1" >
                        <input type="hidden" name="NamaNotarisCk1" id="NamaNotarisCk1" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamCk1" id="NomorPengesahanKemenhumkamCk1" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamCk1" id="TanggalPengesahanKemenhumkamCk1" >
                        <input type="hidden" name="NomorAktaPerubahanCk1" id="NomorAktaPerubahanCk1" >
                        <input type="hidden" name="TanggalAktaPerubahanCk1" id="TanggalAktaPerubahanCk1" >
                        <input type="hidden" name="NamaNotarisPerubahanCk1" id="NamaNotarisPerubahanCk1" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamPerubahanCk1" id="NomorPengesahanKemenhumkamPerubahanCk1" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamPerubahanCk1" id="TanggalPengesahanKemenhumkamPerubahanCk1" >
                        <input type="hidden" name="PenerbitSIUPCk1" id="PenerbitSIUPCk1" >
                        <input type="hidden" name="NomorSIUPCk1" id="NomorSIUPCk1" >
                        <input type="hidden" name="TanggalSIUPCk1" id="TanggalSIUPCk1" >
                        <input type="hidden" name="TanggalSdSIUPCk1" id="TanggalSdSIUPCk1" >
                        <input type="hidden" name="PenerbitTDPCk1" id="PenerbitTDPCk1" >
                        <input type="hidden" name="NomorTDPCk1" id="NomorTDPCk1" >
                        <input type="hidden" name="TanggalTDPCk1" id="TanggalTDPCk1" >
                        <input type="hidden" name="TanggalSdTDPCk1" id="TanggalSdTDPCk1" >
                        <input type="hidden" name="PenerbitSKDPCk1" id="PenerbitSKDPCk1" >
                        <input type="hidden" name="NomorSKDPCk1" id="NomorSKDPCk1" >
                        <input type="hidden" name="TanggalSKDPCk1" id="TanggalSKDPCk1" >
                        <input type="hidden" name="TanggalSdSKDPCk1" id="TanggalSdSKDPCk1" >
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namakomisaris" id="namakomisaris" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NamaKomisarisCk" id="NamaKomisarisCk" value="1"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpkomisaris" id="ktpkomisaris" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NoKTPKomisarisCk" id="NoKTPKomisarisCk" value="1"/>
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
<!-- modal komisaris 1 -->

<!-- modal direksi 1 --> 
<div class="modal fade" id="direksiModal1" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pengurus Perusahaan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{action('DetailController@savedetaildireksi')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="NomorAktaCk2" id="NomorAktaCk2" >
                        <input type="hidden" name="TanggalAktaCk2" id="TanggalAktaCk2" >
                        <input type="hidden" name="NamaNotarisCk2" id="NamaNotarisCk2" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamCk2" id="NomorPengesahanKemenhumkamCk2" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamCk2" id="TanggalPengesahanKemenhumkamCk2" >
                        <input type="hidden" name="NomorAktaPerubahanCk2" id="NomorAktaPerubahanCk2" >
                        <input type="hidden" name="TanggalAktaPerubahanCk2" id="TanggalAktaPerubahanCk2" >
                        <input type="hidden" name="NamaNotarisPerubahanCk2" id="NamaNotarisPerubahanCk2" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamPerubahanCk2" id="NomorPengesahanKemenhumkamPerubahanCk2" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamPerubahanCk2" id="TanggalPengesahanKemenhumkamPerubahanCk2" >
                        <input type="hidden" name="PenerbitSIUPCk2" id="PenerbitSIUPCk2" >
                        <input type="hidden" name="NomorSIUPCk2" id="NomorSIUPCk2" >
                        <input type="hidden" name="TanggalSIUPCk2" id="TanggalSIUPCk2" >
                        <input type="hidden" name="TanggalSdSIUPCk2" id="TanggalSdSIUPCk2" >
                        <input type="hidden" name="PenerbitTDPCk2" id="PenerbitTDPCk2" >
                        <input type="hidden" name="NomorTDPCk2" id="NomorTDPCk2" >
                        <input type="hidden" name="TanggalTDPCk2" id="TanggalTDPCk2" >
                        <input type="hidden" name="TanggalSdTDPCk2" id="TanggalSdTDPCk2" >
                        <input type="hidden" name="PenerbitSKDPCk2" id="PenerbitSKDPCk2" >
                        <input type="hidden" name="NomorSKDPCk2" id="NomorSKDPCk2" >
                        <input type="hidden" name="TanggalSKDPCk2" id="TanggalSKDPCk2" >
                        <input type="hidden" name="TanggalSdSKDPCk2" id="TanggalSdSKDPCk2" >
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namadireksi" id="namadireksi" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NamaDireksiCk" id="NamaDireksiCk" value="1"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpdireksi" id="ktpdireksi" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NoKTPDireksiCk" id="NoKTPDireksiCk" value="1"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">Jabatan</td>
                                    <td style="border:none;">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jabatandireksi" id="jabatandireksi" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="JabatanDireksiCk" id="JabatanDireksiCk" value="1"/>
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
<!-- modal direksi 1 -->

<!-- modal direksi 2 --> 
<div class="modal fade" id="direksiModal2" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pengurus Perusahaan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{action('DetailController@savedetaildireksiperubahan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="NomorAktaCk4" id="NomorAktaCk4" >
                        <input type="hidden" name="TanggalAktaCk4" id="TanggalAktaCk4" >
                        <input type="hidden" name="NamaNotarisCk4" id="NamaNotarisCk4" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamCk4" id="NomorPengesahanKemenhumkamCk4" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamCk4" id="TanggalPengesahanKemenhumkamCk4" >
                        <input type="hidden" name="NomorAktaPerubahanCk4" id="NomorAktaPerubahanCk4" >
                        <input type="hidden" name="TanggalAktaPerubahanCk4" id="TanggalAktaPerubahanCk4" >
                        <input type="hidden" name="NamaNotarisPerubahanCk4" id="NamaNotarisPerubahanCk4" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamPerubahanCk4" id="NomorPengesahanKemenhumkamPerubahanCk4" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamPerubahanCk4" id="TanggalPengesahanKemenhumkamPerubahanCk4" >
                        <input type="hidden" name="PenerbitSIUPCk4" id="PenerbitSIUPCk1" >
                        <input type="hidden" name="NomorSIUPCk4" id="NomorSIUPCk4" >
                        <input type="hidden" name="TanggalSIUPCk4" id="TanggalSIUPCk4" >
                        <input type="hidden" name="TanggalSdSIUPCk4" id="TanggalSdSIUPCk4" >
                        <input type="hidden" name="PenerbitTDPCk4" id="PenerbitTDPCk4" >
                        <input type="hidden" name="NomorTDPCk4" id="NomorTDPCk4" >
                        <input type="hidden" name="TanggalTDPCk4" id="TanggalTDPCk4" >
                        <input type="hidden" name="TanggalSdTDPCk4" id="TanggalSdTDPCk4" >
                        <input type="hidden" name="PenerbitSKDPCk4" id="PenerbitSKDPCk4" >
                        <input type="hidden" name="NomorSKDPCk4" id="NomorSKDPCk4" >
                        <input type="hidden" name="TanggalSKDPCk4" id="TanggalSKDPCk4" >
                        <input type="hidden" name="TanggalSdSKDPCk4" id="TanggalSdSKDPCk4" >
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namadireksiperubahan" id="namadireksiperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NamaDireksiPerubahanCk" id="NamaDireksiPerubahanCk" value="1"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpdireksiperubahan" id="ktpdireksiperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NoKTPDireksiPerubahanCk" id="NoKTPDireksiPerubahanCk" value="1"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">Jabatan</td>
                                    <td style="border:none;">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jabatandireksiperubahan" id="jabatandireksiperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="JabatanDireksiPerubahanCk" id="JabatanDireksiPerubahanCk" value="1"/>
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
<!-- modal direksi 2 -->

<!-- modal komisaris 2 --> 
<div class="modal fade" id="komisarisModal2" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pemegang Saham</h4>
                </div>
                <div class="modal-body">
                    <form action="{{action('DetailController@savedetailkomisarisperubahan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="NomorAktaCk3" id="NomorAktaCk3" >
                        <input type="hidden" name="TanggalAktaCk3" id="TanggalAktaCk3" >
                        <input type="hidden" name="NamaNotarisCk3" id="NamaNotarisCk3" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamCk3" id="NomorPengesahanKemenhumkamCk3" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamCk3" id="TanggalPengesahanKemenhumkamCk3" >
                        <input type="hidden" name="NomorAktaPerubahanCk3" id="NomorAktaPerubahanCk3" >
                        <input type="hidden" name="TanggalAktaPerubahanCk3" id="TanggalAktaPerubahanCk3" >
                        <input type="hidden" name="NamaNotarisPerubahanCk3" id="NamaNotarisPerubahanCk3" >
                        <input type="hidden" name="NomorPengesahanKemenhumkamPerubahanCk3" id="NomorPengesahanKemenhumkamPerubahanCk3" >
                        <input type="hidden" name="TanggalPengesahanKemenhumkamPerubahanCk3" id="TanggalPengesahanKemenhumkamPerubahanCk3" >
                        <input type="hidden" name="PenerbitSIUPCk3" id="PenerbitSIUPCk3" >
                        <input type="hidden" name="NomorSIUPCk3" id="NomorSIUPCk3" >
                        <input type="hidden" name="TanggalSIUPCk3" id="TanggalSIUPCk3" >
                        <input type="hidden" name="TanggalSdSIUPCk3" id="TanggalSdSIUPCk3" >
                        <input type="hidden" name="PenerbitTDPCk3" id="PenerbitTDPCk3" >
                        <input type="hidden" name="NomorTDPCk3" id="NomorTDPCk3" >
                        <input type="hidden" name="TanggalTDPCk3" id="TanggalTDPCk3" >
                        <input type="hidden" name="TanggalSdTDPCk3" id="TanggalSdTDPCk3" >
                        <input type="hidden" name="PenerbitSKDPCk3" id="PenerbitSKDPCk3" >
                        <input type="hidden" name="NomorSKDPCk3" id="NomorSKDPCk3" >
                        <input type="hidden" name="TanggalSKDPCk3" id="TanggalSKDPCk3" >
                        <input type="hidden" name="TanggalSdSKDPCk3" id="TanggalSdSKDPCk3" >
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namakomisarisperubahan" id="namakomisarisperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NamaKomisarisPerubahanCk" id="NamaKomisarisPerubahanCk" value="1"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpkomisarisperubahan" id="ktpkomisarisperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                    <td width="30" style="text-align:left; border:none;">
                                        <input type="checkbox" name="NoKTPKomisarisPerubahanCk" id="NoKTPKomisarisPerubahanCk" value="1"/>
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
<!-- modal komisaris 1 -->
<script>
$("form").submit(function() {
    $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
    setTimeout($.unblockUI, 800);
}); 
$("#btnprev").click(function() {
    $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
    setTimeout($.unblockUI, 800);
});
</script>
@stop()