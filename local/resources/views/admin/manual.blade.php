@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Dokumen Panduan Manual</h2>
        <h4>Tambah Dokumen</h4>
        <table>
            <form action="{{action('DokumenController@addmanual')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <td style="border:none;"></td>
                <td width="150" style="border:none;">Pilih File <input type="file" name="filefield" 
                            accept="application/pdf"></td>
                <td style="border:none;"><input type="submit" value="Upload"></td>
            </form>
        </table>
        <br/>
        <br/>
        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="50">No</th>
            <th style="text-align:center;">Nama Dokumen</th>
            <th style="text-align:center;" width="200">Aksi</th>
          </thead>
          <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->Id ?>"></input><?php echo $counter ?></td>
                <td class="td-pengumuman"><?php echo $row->NamaFileOriginal ?></td>
                <td style="text-align:center;"> 
                    <a href="" onclick="document.getElementById('iddok').value='<?php echo $row->Id ?>';"
                                        data-toggle="modal" data-target="#confirmModal"> <i class="fa fa-trash"></i> DELETE</a> |
                    <a href="<?php echo 'DetailDokumenManual/'.$row->Id ?>" target="_blank">
                        <i class="fa fa-download"></i> DOWNLOAD</a>
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

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <form action="{{action('DokumenController@deletedokumen')}}" method="post">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <input type="hidden" name="iddok" id="iddok">
                    <div class="modal-body">
                        <h4>Anda yakin akan menghapus Dokumen ini 
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
@stop()