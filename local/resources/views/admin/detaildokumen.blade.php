@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Dokumen Calon Penyedia Batubara</h2>
        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="30">No</th>
            <th style="text-align:center;" width="300">Nama File</th>
            <th style="text-align:center;" width="150">Aksi</th>
          </thead>
          <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" style="text-align:center;"><input type="hidden" value="<?php echo $row->Id ?>"></input>
                	<?php echo $counter ?></td>
                <td class="td-pengumuman"><?php echo $row->NamaFileOriginal ?></td>
                <td style="text-align:center;"> 
                    <a href="<?php echo 'DownloadDokumen/'.$row->Id.'/'.$row->NamaFileOriginal ?>" target="_blank">
                        <i class="fa fa-download"></i> Download</a>
                </td>
            </tr>
            <?php 
                $counter++;
                } 
            ?>
          </tbody>
        </table>
        <table width=100%>
            <tr>    
                <td width=50%>
                    <a href="<?php echo 'dokumenpeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                </td>
                <td width=50%>
                </td>                                 
            <tr>
        </table>
    </div>
</div>
@stop();