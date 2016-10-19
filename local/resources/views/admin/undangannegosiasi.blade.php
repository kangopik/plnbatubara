@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Undangan Negosiasi</h2>

        <table>
            <form action="{{action('AdminController@carivendorundangannegosiasi')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <tr>
                    <td width=100>Cari Calon Penyedia Batubara</td>
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
                                onclick="location.href='<?php echo 'undangnego' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>

        <!-- modal --> 
        <div class="modal fade" id="negosiasiModal" tabindex="-1" role="dialog" aria-labelledby="negosiasiModalLabel">
            <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="negosiasiModalLabel">Undangan Negosiasi</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('AdminController@aksiundangnegosiasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <input type="hidden" id="vendorid" name="vendorid"> 
                                    <input type="hidden" name="emailvendor" id="emailvendor">
                                    <input type="hidden" name="namavendor" id="namavendor">
                                    <input type="hidden" name="alamatvendor" id="alamatvendor">
                                    <tr>
                                        <td style="border:none; padding-top:15px;" width="150">Hari</td>
                                        <td style="border:none;">
                                            <div class="col-sm-6">
                                                <div data-tip="masukan hari undangan negosiasi">
                                                <input type="text" class="form-control" name="hari" required="required">
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; padding-top:15px;">Tanggal</td>
                                        <td style="border:none;">
                                            <div class="col-sm-5">
                                                <div data-tip="masukan tanggal undangan negosiasi">
                                                <input type="text" class="form-control" name="tgl_undangan_negosiasi" 
                                                    id="tgl_undangan_duediligence" required="required">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; padding-top:15px;">Pukul</td>
                                        <td style="border:none;">
                                            <div class="col-sm-5">
                                                <div data-tip="masukan jam undangan negosiasi">
                                                <input type="text" class="form-control" name="pukul" required="required">
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; padding-top:15px;">Tempat</td>
                                        <td style="border:none;">
                                            <div class="col-sm-12">
                                                <div data-tip="masukan tempat undangan negosiasi">
                                                <textarea rows='2' class='form-control' name="tempat" required="required"></textarea>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; padding-top:15px;">Acara</td>
                                        <td style="border:none;">
                                            <div class="col-sm-12">
                                                <div data-tip="masukan acara undangan negosiasi">
                                                <textarea rows='2' class='form-control' name="acara" required="required"></textarea>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; padding-top:15px;">Contact Person</td>
                                        <td style="border:none;">
                                        <div class="col-sm-12">
                                            <div data-tip="masukan nama contact person undangan negosiasi">
                                            <input type="text" class="form-control" name="cp" required="required">
                                        </div>
                                        </div>
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

        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="50">No</th>
            <th style="text-align:center;" width="300">Nama Perusahaan</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;" width="150">Aksi</th>
          </thead>
          <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
              <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
              <td class="td-pengumuman"><?php if($row->BadanUsaha == '1') { $BU = "PT"; }
                          else if($row->BadanUsaha == '2') { $BU = "CV"; } 
                          else if($row->BadanUsaha == '3') { $BU = "Koperasi"; }
                          else if($row->BadanUsaha == '4') { $BU = "Lainnya";} 
                          else { $BU = '';}
                    echo $row->Nama.','.$BU; ?></td>
              <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
              <td>
                <a href="" onclick="document.getElementById('vendorid').value='<?php echo $row->UserId ?>';
                                    document.getElementById('namavendor').value='<?php echo $row->Nama ?>';
                                    document.getElementById('alamatvendor').value='<?php echo $row->Alamat ?>';
                                    document.getElementById('emailvendor').value='<?php echo $row->Email ?>';" 
                    data-toggle="modal" data-target="#negosiasiModal"><i class="fa fa-envelope"></i> Undang Calon Penyedia Batubara</a>
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