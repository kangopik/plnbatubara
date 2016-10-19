@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data2->Nama.", ".$data2->BadanUsaha; ?></h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="">
                            <a href="<?php echo 'DetailAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);" >PERSONEL</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailKeuangan' ?>" >KEUANGAN</a>
                        </li>
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailArmada' ?>" >ARMADA</a>
                        </li>
                        <li class="">
                            <a href="<?php //echo 'DetailPengalaman' ?>" >PENGALAMAN</a>
                        </li>
                        <li class="">
                            <a href="<?php //echo 'DetailKontrak' ?>" >KONTRAK</a>
                        </li> -->
                        <li class="">
                            <a href="<?php echo 'DetailIjinTambang' ?>" >IJIN TAMBANG</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailTeknis' ?>" >TEKNIS TAMBANG</a>
                        </li>
                        <!--<li class="">
                            <a href="</?php echo 'DetailSarana' ?>" >SARANA</a>
                        </li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">Pendidikan</th>
                                    <th style="text-align:center;">Tgl. Lahir</th>
                                    <th style="text-align:center;">Jabatan</th>
                                    <th width="80" style="text-align:center;">Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $counter = 1;
                                        foreach($data as $row){
                                    ?>
                                        <tr>
                                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                            <td><?php echo $counter ?></td>
                                            <td><input type="hidden" value="<?php echo $row->Nama ?>" name="Nama"></input><?php echo $row->Nama ?></td>
                                            <td><?php echo $row->Pendidikan ?></td>
                                            <td><?php if(!is_null($row->TglLahir)) { echo date("d-m-Y", strtotime($row->TglLahir));} ?></td>
                                            <td><?php echo $row->Jabatan ?></td>
                                            <td>
                                                <a href="" onclick="document.getElementById('nama').value='<?php echo $row->Nama ?>';
                                                                    document.getElementById('pendidikan').value='<?php echo $row->Pendidikan ?>';
                                                                    document.getElementById('tgl_lahir').value='<?php if(!is_null($row->TglLahir)) { echo date("d-m-Y", strtotime($row->TglLahir)); } ?>';
                                                                    document.getElementById('jabatan').value='<?php echo $row->Jabatan ?>';
                                                                    document.getElementById('pengalaman').value='<?php 
                                                                                $a = str_replace(array("\n","\r"), 'a', $row->PengalamanKerja);
                                                                                echo str_replace('aa','\n',$a) ?>';
                                                                    document.getElementById('profesi').value='<?php echo $row->ProfesiKeahlian ?>';
                                                                    document.getElementById('sertifikat').value='<?php 
                                                                                $a = str_replace(array("\n","\r"), 'a', $row->Sertifikat);
                                                                                echo str_replace('aa','\n',$a) ?>';
                                                                    <?php if(($row->NamaCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('NamaCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('NamaCk').checked = false;
                                                                    <?php } ?>
                                                                    <?php if(($row->PendidikanCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('PendidikanCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('PendidikanCk').checked = false;
                                                                    <?php } ?>
                                                                    <?php if(($row->TglLahirCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('TglLahirCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('TglLahirCk').checked = false;
                                                                    <?php } ?>
                                                                    <?php if(($row->JabatanCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('JabatanCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('JabatanCk').checked = false;
                                                                    <?php } ?>
                                                                    <?php if(($row->PengalamanKerjaCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('PengalamanKerjaCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('PengalamanKerjaCk').checked = false;
                                                                    <?php } ?>
                                                                    <?php if(($row->ProfesiKeahlianCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('ProfesiKeahlianCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('ProfesiKeahlianCk').checked = false;
                                                                    <?php } ?>
                                                                    <?php if(($row->SertifikatCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                                    document.getElementById('SertifikatCk').checked = true;
                                                                    <?php } else { ?>                                                                                
                                                                    document.getElementById('SertifikatCk').checked = false;
                                                                    <?php } ?>" 
                                                    data-toggle="modal" data-target="#personelModal">
                                                <i class="fa fa-search-plus"></i> Detail</a>
                                            </td>
                                        </tr> 
                                    <?php $counter++; } ?>
                                </tbody>
                            </table>
                            <table>
                                <tr>
                                    <td width=400></td>
                                    <td>
                                        <a href="<?php echo 'DetailPerijinan' ?>" class="btn btn-submit btn-primary" id="btnprev">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                                        <a href="<?php echo 'DetailKeuangan' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                                        <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                    </td>   
                                <tr>
                            </table>
                        </div>
                    </div>
                        </div>
                    <div>
        		</div>
        	</div>
        <div>
    </div>

    <!-- modal tenaga ahli --> 
        <div class="modal fade" id="personelModal" role="dialog" aria-labelledby="personelModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="personelModalLabel">Tenaga Ahli</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{action('DetailController@savedetailpersonil')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <table class="table table-bordered" style="border:none;">
                                    <tbody>
                                        <tr>
                                            <td style="border:none; padding-top:15px;" width="180">Nama</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="nama" id="nama" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NamaCk" id="NamaCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Pendidikan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="pendidikan" id="pendidikan" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="PendidikanCk" id="PendidikanCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Tgl. Lahir</td>
                                            <td style="border:none;">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TglLahirCk" id="TglLahirCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Jabatan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="jabatan" id="jabatan" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JabatanCk" id="JabatanCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Pengalaman Kerja</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <textarea rows='3' class='form-control' name="pengalaman" id="pengalaman" readonly="true"
                                                    style="border:none; background-color:#fff;"></textarea>
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="PengalamanKerjaCk" id="PengalamanKerjaCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Profesi / Keahlian</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="profesi" id="profesi" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="ProfesiKeahlianCk" id="ProfesiKeahlianCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Ijazah / Sertifikat</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <textarea rows='3' class='form-control' name="sertifikat" id="sertifikat" readonly="true"
                                                    style="border:none; background-color:#fff;"></textarea>
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="SertifikatCk" id="SertifikatCk" value="1"/>
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
        <!-- modal tenaga ahli -->

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