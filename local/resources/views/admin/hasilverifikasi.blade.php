@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Persetujuan Verifikasi</h2>

        <!-- modal confirm setuju -->
        <div class="modal fade" id="confirmSetujuModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('AdminController@persetujuan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="vendoridsetuju" id="vendoridsetuju"> 
                            <div class="modal-body">
                                <h4>Anda yakin akan Menyetujui Calon Penyedia Batubara <input style="border:none;" type="text" 
                                    id="namavendorsetuju" name="namavendorsetuju"> 
                                </h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                                <button type="submit" class="btn btn-primary">YA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal confirm setuju -->

        <!-- modal confirm tidak setuju -->
        <div class="modal fade" id="confirmTidakModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('AdminController@persetujuan2')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="vendoridtidak" id="vendoridtidak"> 
                            <div class="modal-body">
                                <h4>Anda yakin Tidak Menyetujui Calon Penyedia Batubara <input style="border:none;" type="text" 
                                    id="namavendortidak" name="namavendortidak"> 
                                </h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                                <button type="submit" class="btn btn-primary">YA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal confirm tidak setuju -->

        <table>
            <form action="{{action('AdminController@carivendorhasilverifikasi')}}" method="post">
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
                                onclick="location.href='<?php echo 'hasilverifikasipeserta' ?>';" value="Reset" />
                    </td>
                    <td width=100>&nbsp;</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </form>
        </table>
        <table class="table table-bordered table-hover">
          <thead>
            <th style="text-align:center;" width="50">No</th>
            <th style="text-align:center;" width="200">Calon Penyedia Batubara</th>
            <th style="text-align:center;">Alamat</th>
            <?php if($datauser == '5' || $datauser == '2' || $datauser == '1') { ?>
            <th style="text-align:center;" width="150">Perijinan</th>
            <?php } ?>
            <?php if($datauser == '8' || $datauser == '2' || $datauser == '1') { ?>
            <th style="text-align:center;" width="150">Keuangan</th>
            <?php } ?>
            <?php if($datauser == '9' || $datauser == '2' || $datauser == '1') { ?>
            <th style="text-align:center;" width="150">Teknis</th>
            <?php } ?>
            <th style="text-align:center;" width="130">Aksi</th>
          </thead>
          <tbody>
          	<?php
                $counter = 1;
                foreach ($data as $row) {
            ?>
            <tr class="tr-pengumuman">
                <?php if($datauser == '2' || $datauser == '1') { ?>
                    <?php if($row->PersetujuanVerifikasi <> 'Y' && $row->PersetujuanVerifikasi <> 'X')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat; ?></td>
                        <td class="td-pengumuman">
                            <?php 
                                $isil = '';
                                $cl2 = 0;
                                foreach($dataLegal2 as $rl2){ 
                                    if($rl2->UserId == $row->UserId){
                                        $isil = $rl2->nama.' / Belum Verifikasi';
                                    }
                                    $cl2++;
                                }                        

                                $cl1 = 0;
                                foreach($dataLegal1 as $rl1){ 
                                    if($rl1->UserId == $row->UserId){
                                        $isil = $rl1->nama.' / '; ?>
                                        <a href="<?php echo 'HasilVendor/'.$row->UserId.'/IJIN' ?>">
                                        <?php $isil = $isil.$rl1->nilai; ?>
                                    <?php }
                                    $cl1++;
                                }
                                echo $isil;
                            ?>
                        </td>
                        <td class="td-pengumuman">
                            <?php 
                                $isif = '';
                                $cf2 = 0;
                                foreach($dataFinance2 as $rf2){ 
                                    if($rf2->UserId == $row->UserId){
                                        $isif = $rf2->nama.' / Belum Verifikasi';
                                    }
                                    $cf2++;
                                }                        

                                $cf1 = 0;
                                foreach($dataFinance1 as $rf1){ 
                                    if($rf1->UserId == $row->UserId){
                                        $isif = $rf1->nama.' / '; ?>
                                        <a href="<?php echo 'HasilVendor/'.$row->UserId.'/KEUANGAN' ?>">
                                        <?php $isif = $isif.$rf1->nilai; ?>
                                    <?php }
                                    $cf1++;
                                }
                                echo $isif;
                            ?>
                        </td>
                        <td class="td-pengumuman">
                            <?php 
                                $isit = '';
                                $ct2 = 0;
                                foreach($dataTechnical2 as $rt2){ 
                                    if($rt2->UserId == $row->UserId){
                                        $isit = $rt2->nama.' / Belum Verifikasi';
                                    }
                                    $ct2++;
                                }                        

                                $ct1 = 0;
                                foreach($dataTechnical1 as $rt1){ 
                                    if($rt1->UserId == $row->UserId){
                                        $isit = $rt1->nama.' / '; ?>
                                        <a href="<?php echo 'HasilVendor/'.$row->UserId.'/TEKNIS' ?>">
                                        <?php  $isit = $isit.$rt1->nilai; ?>
                                    <?php }
                                    $ct1++;
                                }
                                echo $isit;
                            ?>
                        </td>
                        <td style="text-align:center;">       
                            <a href="" onclick="document.getElementById('vendoridsetuju').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendorsetuju').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmSetujuModal"><i class="fa fa-check"></i> Lolos</a> |              
                            <a href="" onclick="document.getElementById('vendoridtidak').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendortidak').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmTidakModal"><i class="fa fa-check"></i> Gagal</a>
                        </td>
                    <?php } ?>
                <?php }else if($datauser == '5') { ?>
                    <?php if($row->PersetujuanLegal <> 'Y' && $row->PersetujuanLegal <> 'X')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat; ?></td>
                        <td class="td-pengumuman">
                            <?php 
                                $isil = '';
                                $cl2 = 0;
                                foreach($dataLegal2 as $rl2){ 
                                    if($rl2->UserId == $row->UserId){
                                        $isil = $rl2->nama.' / Belum Verifikasi';
                                    }
                                    $cl2++;
                                }                        

                                $cl1 = 0;
                                foreach($dataLegal1 as $rl1){ 
                                    if($rl1->UserId == $row->UserId){
                                        $isil = $rl1->nama.' / '; ?>
                                        <a href="<?php echo 'HasilVendor/'.$row->UserId.'/IJIN' ?>">
                                        <?php $isil = $isil.$rl1->nilai; ?>
                                    <?php }
                                    $cl1++;
                                }
                                echo $isil;
                            ?>
                        </td>
                        <td style="text-align:center;">       
                            <a href="" onclick="document.getElementById('vendoridsetuju').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendorsetuju').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmSetujuModal"><i class="fa fa-check"></i> Lolos</a> |              
                            <a href="" onclick="document.getElementById('vendoridtidak').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendortidak').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmTidakModal"><i class="fa fa-check"></i> Gagal</a>
                        </td>
                    <?php } ?>
                <?php }else if($datauser == '8') { ?>
                    <?php if($row->PersetujuanFinance <> 'Y' && $row->PersetujuanFinance <> 'X')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat; ?></td>
                        <td class="td-pengumuman">
                            <?php 
                                $isif = '';
                                $cf2 = 0;
                                foreach($dataFinance2 as $rf2){ 
                                    if($rf2->UserId == $row->UserId){
                                        $isif = $rf2->nama.' / Belum Verifikasi';
                                    }
                                    $cf2++;
                                }                        

                                $cf1 = 0;
                                foreach($dataFinance1 as $rf1){ 
                                    if($rf1->UserId == $row->UserId){
                                        $isif = $rf1->nama.' / '; ?>
                                        <a href="<?php echo 'HasilVendor/'.$row->UserId.'/KEUANGAN' ?>">
                                        <?php $isif = $isif.$rf1->nilai; ?>
                                    <?php }
                                    $cf1++;
                                }
                                echo $isif;
                            ?>
                        </td>
                        <td style="text-align:center;">       
                            <a href="" onclick="document.getElementById('vendoridsetuju').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendorsetuju').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmSetujuModal"><i class="fa fa-check"></i> Lolos</a> |              
                            <a href="" onclick="document.getElementById('vendoridtidak').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendortidak').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmTidakModal"><i class="fa fa-check"></i> Gagal</a>
                        </td>
                    <?php } ?>
                <?php }else if($datauser == '9') { ?>
                    <?php if($row->PersetujuanTechnical <> 'Y' && $row->PersetujuanTechnical <> 'X')  { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->Alamat; ?></td>
                        <td class="td-pengumuman">
                            <?php 
                                $isit = '';
                                $ct2 = 0;
                                foreach($dataTechnical2 as $rt2){ 
                                    if($rt2->UserId == $row->UserId){
                                        $isit = $rt2->nama.' / Belum Verifikasi';
                                    }
                                    $ct2++;
                                }                        

                                $ct1 = 0;
                                foreach($dataTechnical1 as $rt1){ 
                                    if($rt1->UserId == $row->UserId){
                                        $isit = $rt1->nama.' / '; ?>
                                        <a href="<?php echo 'HasilVendor/'.$row->UserId.'/TEKNIS' ?>">
                                        <?php  $isit = $isit.$rt1->nilai; ?>
                                    <?php }
                                    $ct1++;
                                }
                                echo $isit;
                            ?>
                        </td>
                        <td style="text-align:center;">       
                            <a href="" onclick="document.getElementById('vendoridsetuju').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendorsetuju').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmSetujuModal"><i class="fa fa-check"></i> Lolos</a> |              
                            <a href="" onclick="document.getElementById('vendoridtidak').value='<?php echo $row->UserId ?>';
                                                document.getElementById('namavendortidak').value='<?php echo $row->Nama ?>';" 
                                data-toggle="modal" data-target="#confirmTidakModal"><i class="fa fa-check"></i> Gagal</a>
                        </td>
                    <?php } ?>
                <?php } ?> 
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