@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Rekapitulasi DCPT</h2>
        <table>
            <form action="{{action('AdminController@carivendorrekapitulasidcpt')}}" method="post">
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
                                onclick="location.href='<?php echo 'rekapitulasidcpt' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>
        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="40">No</th>
            <th style="text-align:center;" width="300">Nama Perusahaan</th>
            <th style="text-align:center;">Alamat</th>
            <th style="text-align:center;" width="100">Status</th>
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
                <?php if($datauser == '2') { ?>
                    <?php if($row->PersetujuanVerifikasi == 'Y')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                        <td class="td-pengumuman">DCPT</td>
                    <?php $counter++; } ?>
                <?php } ?>
                <?php if($datauser == '5') { ?>
                    <?php if($row->PersetujuanVerifikasi == 'Y')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counterlegal ?></td>
                        <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                        <td class="td-pengumuman">DCPT</td>
                    <?php $counterlegal++; } ?>
                <?php } ?>
                <?php if($datauser == '8') { ?>
                    <?php if($row->PersetujuanVerifikasi == 'Y')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counterlfin ?></td>
                        <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                        <td class="td-pengumuman">DCPT</td>
                    <?php $counterlfin++; } ?>
                <?php } ?>
                <?php if($datauser == '9') { ?>
                    <?php if($row->PersetujuanVerifikasi == 'Y')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counterletech ?></td>
                        <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
                        <td class="td-pengumuman">DCPT</td>
                    <?php $counterletech++; } ?>
                <?php } ?>
            </tr>
            <?php 
                } 
            ?>
          </tbody>
        </table> 
    </div>
</div>
@stop()