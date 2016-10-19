@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Verifikasi Calon Penyedia Batubara</h2>
        <table>
            <form action="{{action('AdminController@carivendorverifikasi')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <tr>
                    <td width=180>Cari Calon Penyedia Batubara</td>
                    <td width=400>
                        <div data-tip="masukan kata pencarian">
                        <input type="text" class="form-control" name="cari" 
                            id="cari" required="required">
                        </div>
                    </td>                                                
                    <td width=100 style="padding-left:10px;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Cari</button>
                    </td>
                    <td width=100 style="padding-left:10px;">
                        <input type="button" class="btn btn-primary btn-block btn-flat" 
                                onclick="location.href='<?php echo 'verifikasi' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>

        <!-- modal --> 
        <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="verifikasiModalLabel">
            <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="verifikasiModalLabel">Verifikasi</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('AdminController@gagalverifikasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <input type="hidden" id="vendorid" name="vendorid"> 
                                    <input type="hidden" name="vendornamagagal" id="vendornamagagal"> 
                                    <input type="hidden" name="vendoremailgagal" id="vendoremailgagal"> 
                                    <input type="hidden" name="vendoralamatgagal" id="vendoralamatgagal">
                                    <tr>
                                        <td style="border:none; padding-top:15px;" width="50">Catatan</td>
                                        <td style="border:none;">
                                            <div class="col-sm-12">
                                                <div data-tip="masukan keterangan gagal verifikasi">
                                                    <textarea rows='2' class='form-control' name="catatan"></textarea>
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

        <!-- modal confirm lolos -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('AdminController@lolosverifikasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="vendoridconfirm" id="vendoridconfirm"> 
                            <input type="hidden" name="alamatvendorconfirm" id="alamatvendorconfirm"> 
                            <input type="hidden" name="emailvendorconfirm" id="emailvendorconfirm"> 
                            <div class="modal-body">
                                <h4>Anda yakin akan meloloskan Calon Penyedia Batubara <input style="border:none;" type="text" 
                                    id="namavendorconfirm" name="namavendorconfirm"> 
                                </h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                                <button type="submit" class="btn btn-primary">YA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal confirm lolos -->

        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="50">No</th>
            <th style="text-align:center;" width="300">Nama Perusahaan</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;" width="260">Aksi</th>
          </thead>
          <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                <td style="text-align:center;">
                    <a href="" onclick="document.getElementById('vendoridconfirm').value='<?php echo $row->UserId ?>';
                                        document.getElementById('namavendorconfirm').value='<?php echo $row->Nama ?>';
                                        document.getElementById('alamatvendorconfirm').value='<?php echo $row->Alamat ?>';
                                        document.getElementById('emailvendorconfirm').value='<?php echo $row->Email ?>';" 
                        data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check"></i> LOLOS</a> |              
                    <a href="" onclick="document.getElementById('vendorid').value='<?php echo $row->UserId ?>';
                                        document.getElementById('vendornamagagal').value='<?php echo $row->Nama ?>';
                                        document.getElementById('vendoralamatgagal').value='<?php echo $row->Alamat ?>';
                                        document.getElementById('vendoremailgagal').value='<?php echo $row->Email ?>';" 
                        data-toggle="modal" data-target="#verifikasiModal"><i class="fa fa-times"></i> GAGAL</a> | 
                    <a href="<?php echo 'DetailVendor/'.$row->UserId ?>">
                        <i class="fa fa-search-plus"></i> DETAIL</a>
                </td>
            </tr>
            <?php 
                $counter++;
                } 
            ?>
          </tbody>
        </table>        
    </div>
</div>
@stop()