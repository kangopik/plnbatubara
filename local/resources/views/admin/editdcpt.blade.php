@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">DCPT</h2>
        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="40">No</th>
            <th style="text-align:center;" width="300">Nama Perusahaan</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;" width="100">Aksi</th>
          </thead>
          <tbody>
            <?php
                $counter = 1;
                $counterlegal = 1;
                $counterlfin = 1;
                $counterletech = 1;
                foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
                    <?php if($row->PersetujuanVerifikasi == 'Y')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                        <td class="td-pengumuman"><a href="<?php echo 'DetailVendorEdit/'.$row->UserId ?>">
                        <i class="fa fa-search-plus"></i> Edit</a></td>
                    <?php $counter++; } ?>
            </tr>
            <?php 
                } 
            ?>
          </tbody>
        </table> 
    </div>
</div>
@stop()