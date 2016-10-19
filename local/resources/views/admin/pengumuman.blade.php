@extends('layout.admin')
@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
  
  }); 
</script>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Pengumuman</h2>

        <!-- modal pengumuman --> 
        <div class="modal fade" id="pengumumanModal" role="dialog" aria-labelledby="pengumumanModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document" style="width:70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="pengumumanModalLabel">Pengumuman</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{action('AdminController@aksisavepengumuman')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <input type="hidden" name="idpengumuman" id="idpengumuman">
                                <table class="table table-bordered" style="border:none;">
                                    <tbody>
                                        <tr>
                                            <td style="border:none;padding-top:15px;" width=80>Judul</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="pheader" id="pheader" required="required">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Isi</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <textarea class='tinymce' name="pcontent" id="pcontent">
                                                    </textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                    <input  type="submit" value="Simpan Pengumuman" class="btn btn-submit  btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal pengumuman --> 

        <!-- modal confirm delete pengumuman -->
        <div class="modal fade" id="confirmPengumumanModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('AdminController@aksideletepengumuman')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus data Pengumuman <input style="border:none;" type="text" 
                                    id="namapengumuman" name="namapengumunan"> 
                                </h4>
                                <input type="hidden" name="idpengumuman2" id="idpengumuman2">
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
        <!-- modal confirm delete pengumuman -->

        <table>
            <form action="{{action('AdminController@caripengumumanadmin')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <tr>
                    <td width=130>Cari Pengumuman</td>
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
                                onclick="location.href='<?php echo 'masterpengumuman' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>

        <table class="table table-bordered table-hover">
            <thead>
                <th width="50" style="text-align:center;">No</th>
                <th style="text-align:center;">Judul</th>
                <th width="130" style="text-align:center;">Tanggal Dibuat</th>
                <th width="180" style="text-align:center;">Aksi</th>
            </thead>
            <tbody>
                <?php
                    $counter = 1;
                    foreach($data as $row){
                ?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $row->Header ?></td>
                        <td style="text-align:center;"><?php echo date("d-m-Y", strtotime($row->Tanggal)) ?></td>
                        <td style="text-align:center;">
                            <a href="<?php echo 'editpengumuman/'.$row->Id; ?>"
                                <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                            <a href="" onclick="document.getElementById('idpengumuman2').value='<?php echo $row->Id ?>';
                                                document.getElementById('namapengumuman').value='<?php echo $row->Header ?>';"
                                    data-toggle="modal" data-target="#confirmPengumumanModal">
                                    <i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                    </tr> 
                <?php $counter++; } ?>
            </tbody>
        </table>
        <a href="<?php echo 'addpengumuman' ?>" class="btn btn-submit btn-primary" id="btnnext">Tambah Pengumuman</a>
    </div>
</div>
@stop()