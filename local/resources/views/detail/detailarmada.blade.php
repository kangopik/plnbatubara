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
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailPersonil' ?>" >PERSONEL</a>
                        </li> -->
                        <li class="">
                            <a href="<?php echo 'DetailKeuangan' ?>" >KEUANGAN</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);" >ARMADA</a>
                        </li>
                        <!-- <li class="">
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
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th width="50" style="text-align:center;">No.</th>
                        <th style="text-align:center;">Jenis Armada</th>
                        <th style="text-align:center;">Jumlah</th>
                        <th style="text-align:center;">Kapasitas</th>
                        <th style="text-align:center;">Merk/Type</th>
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
                                <td><input type="hidden" value="<?php echo $row->JenisArmada ?>" name="JenisArmada"></input><?php echo $row->JenisArmada ?></td>
                                <td><?php echo $row->Jumlah.' Unit' ?></td>
                                <td><?php echo $row->Kapasitas ?></td>
                                <td><?php echo $row->Merk ?></td>
                                <td style="text-align:center;">
                                    <a href="" onclick="document.getElementById('jenis').value='<?php echo $row->JenisArmada ?>';
                                                        document.getElementById('jumlah').value='<?php echo $row->Jumlah ?>';
                                                        document.getElementById('kapasitas').value='<?php echo $row->Kapasitas ?>';
                                                        document.getElementById('merk').value='<?php echo $row->Merk ?>';
                                                        document.getElementById('tahun').value='<?php echo $row->TahunKeluaran ?>';
                                                        document.getElementById('kondisi').value='<?php echo $row->Kondisi ?>';
                                                        document.getElementById('lokasi').value='<?php echo $row->LokasiSekarang ?>';
                                                        document.getElementById('bukti').value='<?php echo $row->BuktiKepemilikan ?>';
                                                        <?php if(($row->JenisArmadaCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('JenisArmadaCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('JenisArmadaCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->JumlahCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('JumlahCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('JumlahCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->KapasitasCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('KapasitasCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('KapasitasCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->MerkCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('MerkCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('MerkCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->TahunKeluaranCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('TahunKeluaranCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('TahunKeluaranCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->KondisiCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('KondisiCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('KondisiCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->LokasiSekarangCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('LokasiSekarangCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('LokasiSekarangCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->BuktiKepemilikanCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('BuktiKepemilikanCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('BuktiKepemilikanCk').checked = false;
                                                        <?php } ?>"
                                        data-toggle="modal" data-target="#armadaModal">
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
                                        <a href="<?php echo 'DetailKeuangan' ?>" class="btn btn-submit btn-primary" id="btnprev">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                                        <a href="<?php echo 'DetailPengalaman' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                                        <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                    </td>   
                                                <tr>
                                            </table>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
        <div>
    </div>

    <!-- modal --> 
        <div class="modal fade" id="armadaModal" tabindex="-1" role="dialog" aria-labelledby="armadaModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="armadaModalLabel">Armada Transportasi</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{action('DetailController@savedetailarmada')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <table class="table table-bordered" style="border:none;">
                                    <tbody>
                                        <tr>
                                            <td style="border:none; padding-top:15px;" width="150">Jenis Armada</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="jenis" id="jenis" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JenisArmadaCk" id="JenisArmadaCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Jumlah</td>
                                            <td style="border:none;"><a style="font-size:16px;">Unit</a>
                                                <div class="col-sm-5" style="padding-right: 5px;">
                                                    <input type="text" class="form-control" name="jumlah" id="jumlah" 
                                                                readonly="true"
                                                                style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JumlahCk" id="JumlahCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Kapasitas</td>
                                            <td style="border:none;">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="kapasitas" id="kapasitas" 
                                                        readonly="true" style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KapasitasCk" id="KapasitasCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Merk/Type</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="merk" id="merk" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="MerkCk" id="MerkCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Tahun Keluaran</td>
                                            <td style="border:none;">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="tahun" id="tahun" 
                                                        readonly="true" style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TahunKeluaranCk" id="TahunKeluaranCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Kondisi</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="kondisi" id="kondisi" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="KondisiCk" id="KondisiCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Lokasi Sekarang</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="lokasi" id="lokasi" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="LokasiSekarangCk" id="LokasiSekarangCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Bukti Kepemilikan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="bukti" id="bukti" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="BuktiKepemilikanCk" id="BuktiKepemilikanCk" value="1"/>
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
        <!-- modal -->
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