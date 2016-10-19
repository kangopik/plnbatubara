@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Evaluasi Penawaran</h2>

        <table>
            <form action="{{action('AdminController@carivendorevaluasipenawaran')}}" method="post">
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
                                onclick="location.href='<?php echo 'evaluasipenawaran' ?>';" value="Reset" />
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
                <td style="text-align:center;"> 
                    <a href="<?php echo 'EvalPenawaran/'.$row->UserId ?>">
                        <i class="fa fa-pencil-square-o"></i> Entry Data</a>
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