@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
        $('#volume').mask("#.##0", {reverse: true});
        $('#nilai').mask("#.##0", {reverse: true});
    });
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Kontrak Pengadaan Calon Penyedia Batubara <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?></h2>

        <!-- modal --> 
        <div class="modal fade" id="kontrakModal" tabindex="-1" role="dialog" aria-labelledby="kontrakModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="kontrakModalLabel">Kontrak Pengadaan</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{action('VendorController@savekontrakpengadaan')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <table class="table table-bordered" style="border:none;">
                                    <tbody>
                                        <tr>
                                            <td style="border:none; padding-top:15px;" width="200">Lokasi Pasokan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <div data-tip="masukan lokasi pasokan">
                                                    <input type="text" class="form-control" name="lokasi" id="lokasi" required="required">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Volume</td>
                                            <td style="border:none;"><a style="font-size:16px;">MT</a>
                                                <div class="col-sm-5" style="padding-right: 5px;">
                                                    <div data-tip="masukan jumlah volume">
                                                    <input type="text" class="form-control" name="volume" id="volume" onkeypress="return isDecimal(event)">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Nama Perusahaan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <div data-tip="masukan nama perusahaan pemberi pekerjaan">
                                                    <input type="text" class="form-control" name="nama" id="nama">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Alamat</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <div data-tip="masukan alamat perusahaan pemberi pekerjaan">
                                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Nomor</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <div data-tip="masukan nomor kontrak">
                                                    <input type="text" class="form-control" name="nomor" id="nomor">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Tanggal</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <div data-tip="masukan tanggal kontrak">
                                                    <input type="text" class="form-control" name="tgl_pengadaan" id="tgl_pengadaan" readonly="true">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Waktu Pelaksanaan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <div data-tip="masukan waktu pelaksanaan kontrak">
                                                    <input type="text" class="form-control" name="waktu" id="waktu">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Nilai</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <div data-tip="masukan nilai kontrak">
                                                    <input type="text" class="form-control" name="nilai" id="nilai">
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Prestasi Kerja</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <div data-tip="masukan prestasi kerja">
                                                    <input type="text" class="form-control" name="prestasi" id="prestasi">
                                                </div>
                                                </div>
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

        <!-- modal confirm delete pengadaan -->
        <div class="modal fade" id="confirmKontrakModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('VendorController@deletekontrakpengadaan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus data Kontrak Pengadaan <input style="border:none;" type="text" 
                                    id="namalokasi" name="namalokasi"> 
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
        <!-- modal confirm delete pengadaan -->

        <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                            <tr>
                                <th width="50" style="text-align:center;">No.</th>
                                <th style="text-align:center;">Lokasi Pasokan</th>
                                <th style="text-align:center;">Volume</th>
                                <th width="180" style="text-align:center;">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php if(!is_null($data)) { ?>
                        <?php
                            $counter = 1;
                            foreach($data as $row){
                        ?>
                            <tr>
                                <td><?php echo $counter ?></td>
                                <td><?php echo $row->LokasiPasokan ?></td>
                                <td><?php echo $row->Volume.' MT' ?></td>
                                <td style="text-align:center;">
                                    <?php if($dataHasil->PersetujuanVerifikasi <> 'Y' ^ $dataHasil->Status<>1 || $dataHasil->StatusPakta <> 'Y') { ?>
                                    <a href="" onclick="document.getElementById('lokasi').value='<?php echo $row->LokasiPasokan ?>';
                                                        document.getElementById('lokasi').setAttribute('readOnly','true');
                                                        document.getElementById('volume').value='<?php echo $row->Volume ?>';
                                                        $('#volume').attr('readonly', false);
                                                        document.getElementById('nama').value='<?php echo $row->NamaPerusahaan ?>';
                                                        $('#nama').attr('readonly', false);
                                                        document.getElementById('alamat').value='<?php echo $row->Alamat ?>';
                                                        $('#alamat').attr('readonly', false);
                                                        document.getElementById('nomor').value='<?php echo $row->Nomor ?>';
                                                        $('#nomor').attr('readonly', false);
                                                        document.getElementById('tgl_pengadaan').value='<?php if(!is_null($row->Tanggal)) { echo date("d-m-Y", strtotime($row->Tanggal)); } ?>';
                                                        document.getElementById('waktu').value='<?php echo $row->Waktu ?>';
                                                        $('#waktu').attr('readonly', false);
                                                        document.getElementById('nilai').value='<?php echo $row->Nilai ?>';
                                                        $('#nilai').attr('readonly', false);
                                                        document.getElementById('prestasi').value='<?php echo $row->Prestasi ?>';
                                                        $('#prestasi').attr('readonly', false);
                                                        <?php if(($row->VolumeCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('volume').setAttribute('readOnly','true');
                                                        document.getElementById('volume').style.background = '#eee'; 
                                                        document.getElementById('volume').style.color = '#555';
                                                        <?php } else if($row->VolumeCk=='0') { ?>
                                                        document.getElementById('volume').style.background = 'red';
                                                        document.getElementById('volume').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('volume').style.background = '#FFF';
                                                        document.getElementById('volume').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->NamaPerusahaanCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('nama').setAttribute('readOnly','true');
                                                        document.getElementById('nama').style.background = '#eee'; 
                                                        document.getElementById('nama').style.color = '#555';
                                                        <?php } else if($row->NamaPerusahaanCk=='0') { ?>
                                                        document.getElementById('nama').style.background = 'red';
                                                        document.getElementById('nama').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('nama').style.background = '#FFF';
                                                        document.getElementById('nama').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->AlamatCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('alamat').setAttribute('readOnly','true');
                                                        document.getElementById('alamat').style.background = '#eee'; 
                                                        document.getElementById('alamat').style.color = '#555';
                                                        <?php } else if($row->AlamatCk=='0') { ?>
                                                        document.getElementById('alamat').style.background = 'red';
                                                        document.getElementById('alamat').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('alamat').style.background = '#FFF';
                                                        document.getElementById('alamat').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->NomorCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('nomor').setAttribute('readOnly','true');
                                                        document.getElementById('nomor').style.background = '#eee'; 
                                                        document.getElementById('nomor').style.color = '#555';
                                                        <?php } else if($row->NomorCk=='0') { ?>
                                                        document.getElementById('nomor').style.background = 'red';
                                                        document.getElementById('nomor').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('nomor').style.background = '#FFF';
                                                        document.getElementById('nomor').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->TanggalCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('tgl_pengadaan').setAttribute('readOnly','true');
                                                        document.getElementById('tgl_pengadaan').style.background = '#eee'; 
                                                        document.getElementById('tgl_pengadaan').style.color = '#555';
                                                        <?php } else if($row->TanggalCk=='0') { ?>
                                                        document.getElementById('tgl_pengadaan').style.background = 'red';
                                                        document.getElementById('tgl_pengadaan').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('tgl_pengadaan').style.background = '#FFF';
                                                        document.getElementById('tgl_pengadaan').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->WaktuCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('waktu').setAttribute('readOnly','true');
                                                        document.getElementById('waktu').style.background = '#eee'; 
                                                        document.getElementById('waktu').style.color = '#555';
                                                        <?php } else if($row->WaktuCk=='0') { ?>
                                                        document.getElementById('waktu').style.background = 'red';
                                                        document.getElementById('waktu').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('waktu').style.background = '#FFF';
                                                        document.getElementById('waktu').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->NilaiCk=='1') || ($row->PersetujuanVerifikasi=='Y')) { ?>
                                                        document.getElementById('nilai').setAttribute('readOnly','true');
                                                        document.getElementById('nilai').style.background = '#eee'; 
                                                        document.getElementById('nilai').style.color = '#555';
                                                        <?php } else if($row->NilaiCk=='0') { ?>
                                                        document.getElementById('nilai').style.background = 'red';
                                                        document.getElementById('nilai').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('nilai').style.background = '#FFF';
                                                        document.getElementById('nilai').style.color = '#555';
                                                        <?php } ?>
                                                        <?php if(($row->PrestasiCk=='1') || ($row->PersetujuanVerifikasi=='Y' && $dataHasil->Status==1)) { ?>
                                                        document.getElementById('prestasi').setAttribute('readOnly','true');
                                                        document.getElementById('prestasi').style.background = '#eee'; 
                                                        document.getElementById('prestasi').style.color = '#555';
                                                        <?php } else if($row->PrestasiCk=='0') { ?>
                                                        document.getElementById('prestasi').style.background = 'red';
                                                        document.getElementById('prestasi').style.color = '#FFF';
                                                        <?php } else { ?>
                                                        document.getElementById('prestasi').style.background = '#FFF';
                                                        document.getElementById('prestasi').style.color = '#555';
                                                        <?php } ?>"
                                        data-toggle="modal" data-target="#kontrakModal">
                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                    <a href="" onclick="document.getElementById('namalokasi').value='<?php echo $row->LokasiPasokan ?>';"
                                            data-toggle="modal" data-target="#confirmKontrakModal">
                                        <i class="fa fa-trash-o"></i> Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if(!is_null($dataHasil)) { ?>
                <?php  if($dataHasil->PersetujuanVerifikasi <> 'Y' ^ $dataHasil->Status<>1 || $dataHasil->StatusPakta <> 'Y') { ?>
                <input type="button" value="Tambah Kontrak" class="btn btn-submit btn-primary" 
                        data-toggle="modal" data-target="#kontrakModal"
                        onclick="document.getElementById('lokasi').value='';
                                $('#lokasi').attr('readonly', false);
                                document.getElementById('volume').value='';
                                $('#volume').attr('readonly', false);
                                document.getElementById('nama').value='';
                                $('#nama').attr('readonly', false);
                                document.getElementById('alamat').value='';
                                $('#alamat').attr('readonly', false);
                                document.getElementById('nomor').value='';
                                $('#nomor').attr('readonly', false);
                                document.getElementById('tgl_pengadaan').value='';
                                document.getElementById('tgl_pengadaan').style.background = '#FFF';
                                document.getElementById('tgl_pengadaan').style.color = '#555';
                                document.getElementById('waktu').value='';
                                $('#waktu').attr('readonly', false);
                                document.getElementById('nilai').value=''
                                $('#nilai').attr('readonly', false);
                                document.getElementById('prestasi').value='';
                                $('#prestasi').attr('readonly', false);">
                <?php } ?>
                <?php }else { ?>
                <input type="button" value="Tambah Kontrak" class="btn btn-submit btn-primary" 
                        data-toggle="modal" data-target="#kontrakModal"
                        onclick="document.getElementById('lokasi').value='';
                                $('#lokasi').attr('readonly', false);
                                document.getElementById('volume').value='';
                                $('#volume').attr('readonly', false);
                                document.getElementById('nama').value='';
                                $('#nama').attr('readonly', false);
                                document.getElementById('alamat').value='';
                                $('#alamat').attr('readonly', false);
                                document.getElementById('nomor').value='';
                                $('#nomor').attr('readonly', false);
                                document.getElementById('tgl_pengadaan').value='';
                                document.getElementById('tgl_pengadaan').style.background = '#FFF';
                                document.getElementById('tgl_pengadaan').style.color = '#555';
                                document.getElementById('waktu').value='';
                                $('#waktu').attr('readonly', false);
                                document.getElementById('nilai').value=''
                                $('#nilai').attr('readonly', false);
                                document.getElementById('prestasi').value='';
                                $('#prestasi').attr('readonly', false);">
                <?php } ?>
        </div>

        <table align=center>
            <tr align=center>
                <td align=center>
                    <?php  if($dataHasil->PersetujuanVerifikasi <> 'Y' ^ $dataHasil->Status<>1 || $dataHasil->StatusPakta <> 'Y') { ?>
                    <br />
                    <a href="<?php echo 'pengalamanperusahaan' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                    <a href="<?php echo 'kirimdokumen' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                    <?php } ?>
                </td>
            </tr>
        </table>
        
    </div>
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