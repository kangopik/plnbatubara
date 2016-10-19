@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Monitoring Kontrak</h2>

        <!-- modal --> 
        <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="verifikasiModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="verifikasiModalLabel">Verifikasi</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('AdminController@gagalverifikasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <input type="hidden" id="vendorid" name="vendorid"> 
                                        <td style="border:none; padding-top:15px;" width="50">Catatan</td>
                                        <td style="border:none;">
                                            <div class="col-sm-12">
                                                <textarea rows='2' class='form-control' name="catatan"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <input  type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

        <table class="table table-bordered table-hover">
          <thead>
            <th>Id</th>
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th>Email Perusahaan</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
              foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
              <td class="td-pengumuman"><?php echo $row->UserId ?></td>
              <td class="td-pengumuman"><?php echo $row->Nama ?></td>
              <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
              <td class="td-pengumuman"><?php echo $row->Email ?></td>
              <td>
                <a href="<?php echo 'LolosVerifikasi/'.$row->UserId ?>">LOLOS</a> |
                <a href="" onclick="document.getElementById('vendorid').value='<?php echo $row->UserId ?>';" data-toggle="modal" data-target="#verifikasiModal">GAGAL</a> |
                <a href="<?php echo 'DeleteVerifikasi/'.$row->UserId ?>">CLEAR</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

    </div>
</div>
@stop()