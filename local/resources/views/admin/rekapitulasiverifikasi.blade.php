@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Rekapitulasi Hasil Verifikasi</h2>
        <table>
            <form action="{{action('AdminController@carivendorrekapitulasipeserta')}}" method="post">
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
                                onclick="location.href='<?php echo 'rekapitulasiverifikasi' ?>';" value="Reset" />
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
            <th style="text-align:center;">Perijinan</th>
            <th style="text-align:center;">Keuangan</th>
            <th style="text-align:center;">Teknis</th>
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
                <td class="td-pengumuman"><?php if($row->HasilVerifikasiLegal  == 1) echo "LOLOS"; 
                                            else if($row->HasilVerifikasiLegal == 2) echo "GAGAL";  
                                            else  echo 'Belum Verifikasi' ?>
                </td>
                <td class="td-pengumuman"><?php if($row->HasilVerifikasiFinance  == 1) echo "LOLOS"; 
                                            else if($row->HasilVerifikasiFinance == 2) echo "GAGAL"; 
                                            else  echo 'Belum Verifikasi' ?>
                </td>
                <td class="td-pengumuman"><?php if($row->HasilVerifikasiTechnical  == 1) echo "LOLOS"; 
                                            else if($row->HasilVerifikasiTechnical == 2) echo "GAGAL"; 
                                            else  echo 'Belum Verifikasi' ?>
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