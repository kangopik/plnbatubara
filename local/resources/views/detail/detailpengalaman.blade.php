@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data2->Nama.", ".$data2->BadanUsaha; ?></h2>
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
                        <li class="active">
                            <a href="javascript:void(0);" >PENGALAMAN</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailKontrak' ?>" >KONTRAK</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                            <tr>
                                <th width="50" style="text-align:center;">No.</th>
                                <th style="text-align:center;">Lokasi Pasokan</th>
                                <th style="text-align:center;">Volume</th>
                                <th style="text-align:center;" width="80">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 1;
                            foreach($data as $row){
                        ?>
                            <tr>
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <td><?php echo $counter ?></td>
                                <td><input type="hidden" value="<?php echo $row->LokasiPasokan ?>" name="LokasiPasokan"></input><?php echo $row->LokasiPasokan ?></td>
                                <td><?php echo $row->Volume.' MT' ?></td>
                                <td style="text-align:center;">
                                    <a href="" onclick="document.getElementById('lokasi').value='<?php echo $row->LokasiPasokan ?>';
                                                        document.getElementById('volume').value='<?php echo $row->Volume ?>';
                                                        document.getElementById('nama').value='<?php echo $row->NamaPerusahaan ?>';
                                                        document.getElementById('alamat').value='<?php echo $row->Alamat ?>';
                                                        document.getElementById('nomor').value='<?php echo $row->Nomor ?>';
                                                        document.getElementById('tgl_pengalaman').value='<?php if(!is_null($row->Tanggal)) { echo date("d-m-Y", strtotime($row->Tanggal)); } ?>';
                                                        document.getElementById('waktu').value='<?php echo $row->Waktu ?>';
                                                        document.getElementById('nilai').value='<?php echo $row->Nilai ?>'
                                                        document.getElementById('prestasi').value='<?php echo $row->BA ?>';
                                                        <?php if(($row->LokasiPasokanCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('LokasiPasokanCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('LokasiPasokanCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->VolumeCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('VolumeCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('VolumeCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->NamaPerusahaanCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('NamaPerusahaanCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('NamaPerusahaanCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->AlamatCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('AlamatCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('AlamatCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->NomorCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('NomorCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('NomorCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->TanggalCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('TanggalCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('TanggalCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->WaktuCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('WaktuCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('WaktuCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->NilaiCk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('NilaiCk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('NilaiCk').checked = false;
                                                        <?php } ?>
                                                        <?php if(($row->BACk=='1') || ($datavendor->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('BACk').checked = true;
                                                        <?php } else { ?>                                                                                
                                                        document.getElementById('BACk').checked = false;
                                                        <?php } ?>"
                                        data-toggle="modal" data-target="#pengalamanModal">
                                        <i class="fa fa-search-plus"></i> Detail</a>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                    </tbody>
                </table>
                <table width=100%>
                                        <tr>
                                            <td width=50%>
                                                <a href="<?php echo 'DetailTeknis' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                            </td>
                                            <td width=50%>
                                                    <a href="<?php echo 'DetailKontrak' ?>"  type="submit" style="text-transform:none; width:150px;"
                                                        id="btnnext" class="btn btn-primary btn-block btn-flat" >Berikutnya
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
        <div class="modal fade" id="pengalamanModal" role="dialog" aria-labelledby="pengalamanModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="pengalamanModalLabel">Pengalaman Perusahaan</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{action('DetailController@savedetailpengalaman')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <table class="table table-bordered" style="border:none;">
                                    <tbody>
                                        <tr>
                                            <td style="border:none; padding-top:15px;" width="200">Lokasi Pasokan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="lokasi" id="lokasi" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="LokasiPasokanCk" id="LokasiPasokanCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Volume</td>
                                            <td style="border:none;"><a style="font-size:16px;">MT</a>
                                                <div class="col-sm-5" style="padding-right: 5px;">
                                                    <input type="text" class="form-control" name="volume" id="volume" 
                                                        readonly="true" style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="VolumeCk" id="VolumeCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Nama Perusahaan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="nama" id="nama" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NamaPerusahaanCk" id="NamaPerusahaanCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Alamat</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="alamat" id="alamat" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="AlamatCk" id="AlamatCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Nomor</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="nomor" id="nomor" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NomorCk" id="NomorCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Tanggal</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="tgl_pengalaman" id="tgl_pengalaman" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="TanggalCk" id="TanggalCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Waktu Pelaksanaan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="waktu" id="waktu" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="WaktuCk" id="WaktuCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Nilai</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="nilai" id="nilai" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NilaiCk" id="NilaiCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Prestasi Kerja</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="prestasi" id="prestasi" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="BACk" id="BACk" value="1"/>
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