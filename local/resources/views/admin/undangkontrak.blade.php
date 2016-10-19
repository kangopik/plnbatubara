@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Undangan Kontrak</h2>

        <table>
            <form action="{{action('AdminController@carivendorundangankontrak')}}" method="post">
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
                                onclick="location.href='<?php echo 'undangkontrak' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>

        <!-- modal --> 
        <div class="modal fade" id="kontrakModal" tabindex="-1" role="dialog" aria-labelledby="kontrakModalLabel">
            <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="kontrakModalLabel">Undangan Kontrak</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('AdminController@aksiundangankontrak')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" id="vendorid" name="vendorid"> 
                            <input type="hidden" name="emailvendor" id="emailvendor">
                            <input type="hidden" name="alamatvendor" id="alamatvendor">
                            <div class="modal-body">
                                <h4>Anda yakin akan mengundang Calon Penyedia Batubara <input style="border:none;" type="text" 
                                    id="namavendor" name="namavendor"> 
                                </h4>
                            </div>
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
              <td class="td-pengumuman"><?php echo $row->Nama ?></td>
              <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
              <td>
                <a href="" onclick="document.getElementById('vendorid').value='<?php echo $row->UserId ?>';
                                    document.getElementById('namavendor').value='<?php echo $row->Nama ?>';
                                    document.getElementById('alamatvendor').value='<?php echo $row->Alamat ?>';
                                    document.getElementById('emailvendor').value='<?php echo $row->Email ?>';" 
                    data-toggle="modal" data-target="#kontrakModal"><i class="fa fa-envelope"></i> Undang Calon Penyedia Batubara</a>
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