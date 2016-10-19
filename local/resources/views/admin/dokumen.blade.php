@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Dokumen Calon Penyedia Batubara</h2>
        <table>
            <form action="{{action('AdminController@carivendordokumenpeserta')}}" method="post">
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
                                onclick="location.href='<?php echo 'dokumenpeserta' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>
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
                $dv = '';
                foreach ($data as $row) {
                if($dv <> $row->UserId) {                    
                $dv = $row->UserId;
            ?>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                <td class="td-pengumuman"><?php echo $row->Nama ?></td>
                <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                <td style="text-align:center;"> 
                    <a href="<?php echo 'DetailDokumen/'.$row->UserId ?>">
                        <i class="fa fa-search-plus"></i> DETAIL</a>
                </td>
            </tr>
            <?php 
                $counter++;
                }
                } 
            ?>
          </tbody>
        </table>
    </div>
</div>
@stop()