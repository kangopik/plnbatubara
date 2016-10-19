@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Pelaksana Verifikasi</h2>
        <table>
            <form action="{{action('AdminController@carivendorpelaksana')}}" method="post">
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
                                onclick="location.href='<?php echo 'pelaksanaverifikasi' ?>';" value="Reset" />
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
            <th style="text-align:center;">Provinsi</th>
            <?php if($data5 == '5' || $data5 == '1') { ?>
            <th style="text-align:center;" width="150">Perijinan</th>
            <?php } ?>
            <?php if($data5 == '8' || $data5 == '1') { ?>
            <th style="text-align:center;" width="150">Keuangan</th>
            <?php } ?>
            <?php if($data5 == '9' || $data5 == '1') { ?>
            <th style="text-align:center;" width="150">Teknis</th>
            <?php } ?>
            <th style="text-align:center;" width="90">Aksi</th>
          </thead>
          <tbody>
            <?php
                $counter = 1;
                    $x = '';
                foreach ($data as $row) {
                    if ($row->UserId <> $x) {
                        $x = $row->UserId;
            ?>
            <tr class="tr-pengumuman">
            	<form action="{{action('AdminController@aksisavepelaksana')}}" method="post">
            	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <?php if($data5 == '1') { ?>
                    <?php if( (is_null($row->UserIdLegal) || $row->UserIdLegal == 0) || (is_null($row->UserIdFinance) || $row->UserIdFinance == 0) ||
                            (is_null($row->UserIdTechnical) || $row->UserIdTechnical == 0)  ) { ?>
                    <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>" name="UserId"></input><?php echo $counter ?></td>
                    <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                    <td class="td-pengumuman"><?php echo $row->ProvinsiName ?></td>
                    <td style="text-align:center;">
                        <select name='StaffLegal' id='StaffLegal' class='form-control' required="required">
                            <option value="">- Pilih Staff -</option>
                            <?php
                                $cnt = 0;
                                foreach($data2 as $r){ 
                                     if($r->ui == $row->UserIdLegal){
                            ?>
                                <option value="<?= $r->ui; ?>" selected><?= $r->nm ?></option>
                            <?php
                                    }else{
                            ?>
                                <option value="<?= $r->ui; ?>"><?= $r->nm ?></option>
                            <?php
                                    }
                                    $cnt++;
                                }
                            ?>
                        </select>
                    </td>
                    <td style="text-align:center;">
                        <select name='StaffFinance' id='StaffFinance' class='form-control' <?php if($row->PersetujuanLegal <> 'N') { ?>  required="required" <?php } ?>>
                            <option value="">- Pilih Staff -</option>
                            <?php if($row->PersetujuanLegal == 'Y') { ?> 
                            <?php
                                $cnt = 0;
                                foreach($data3 as $r){ 
                                     if($r->ui == $row->UserIdFinance){
                            ?>
                                <option value="<?= $r->ui; ?>" selected><?= $r->nm ?></option>
                            <?php
                                    }else{
                            ?>
                                <option value="<?= $r->ui; ?>"><?= $r->nm ?></option>
                            <?php
                                    }
                                    $cnt++;
                                }
                            ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td style="text-align:center;">
                        <select name='StaffTechnical' id='StaffTechnical' class='form-control' <?php if($row->PersetujuanLegal <> 'N') { ?> required="required" <?php } ?> >
                            <option value="">- Pilih Staff -</option>
                            <?php if($row->PersetujuanLegal == 'Y') { ?>
                            <?php
                                $cnt = 0;
                                foreach($data4 as $r){ 
                                     if($r->ui == $row->UserIdTechnical){
                            ?>
                                <option value="<?= $r->ui; ?>" selected><?= $r->nm ?></option>
                            <?php
                                    }else{
                            ?>
                                <option value="<?= $r->ui; ?>"><?= $r->nm ?></option>
                            <?php
                                    }
                                    $cnt++;
                                }
                            ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="td-pengumuman">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </td>
                    <?php } ?>
                <?php }else if($data5 == '5') { 
                    if(is_null($row->UserIdLegal) || $row->UserIdLegal == 0) { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>" name="UserId"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->ProvinsiName ?></td>
                        <td style="text-align:center;">
                            <select name='StaffLegal' id='StaffLegal' class='form-control' required="required">
                                <option value="">- Pilih Staff -</option>
                                <?php
                                    $cnt = 0;
                                    foreach($data2 as $r){ 
                                         if($r->ui == $row->UserIdLegal){
                                ?>
                                    <option value="<?= $r->ui; ?>" selected><?= $r->nm ?></option>
                                <?php
                                        }else{
                                ?>
                                    <option value="<?= $r->ui; ?>"><?= $r->nm ?></option>
                                <?php
                                        }
                                        $cnt++;
                                    }
                                ?>
                            </select>
                        </td>                        
                        <td class="td-pengumuman">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </td>
                <?php } ?>
                <?php }else if($data5 == '8') { 
                    if((is_null($row->UserIdFinance) || $row->UserIdFinance == 0) && $row->UserIdLegal <> 0) { ?>
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>" name="UserId"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->ProvinsiName ?></td>
                        <td style="text-align:center;">
                            <?php if($row->StatusHasilVerifikasiLegal == 'Y' && $row->PersetujuanLegal == 'Y') { ?>
                            <select name='StaffFinance' id='StaffFinance' class='form-control' required="required">
                                <option value="">- Pilih Staff -</option>
                                <?php
                                    $cnt = 0;
                                    foreach($data3 as $r){ 
                                         if($r->ui == $row->UserIdFinance){
                                ?>
                                    <option value="<?= $r->ui; ?>" selected><?= $r->nm ?></option>
                                <?php
                                        }else{
                                ?>
                                    <option value="<?= $r->ui; ?>"><?= $r->nm ?></option>
                                <?php
                                        }
                                        $cnt++;
                                    }
                                ?>
                            </select>
                            <?php } ?>
                        </td>
                        <td class="td-pengumuman">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </td>
                <?php }  ?>
                <?php }else if($data5 == '9') { 
                    if((is_null($row->UserIdTechnical) || $row->UserIdTechnical == 0) && $row->UserIdLegal <> 0) { ?>  
                        <td class="td-pengumuman"><input type="hidden" value="<?php echo $row->UserId ?>" name="UserId"></input><?php echo $counter ?></td>
                        <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha; ?></td>
                        <td class="td-pengumuman"><?php echo $row->ProvinsiName ?></td>
                        <td style="text-align:center;">
                            <?php if($row->StatusHasilVerifikasiLegal == 'Y' && $row->PersetujuanLegal == 'Y') { ?>
                            <select name='StaffTechnical' id='StaffTechnical' class='form-control' required="required">
                                <option value="">- Pilih Staff -</option>
                                <?php
                                    $cnt = 0;
                                    foreach($data4 as $r){ 
                                         if($r->ui == $row->UserIdTechnical){
                                ?>
                                    <option value="<?= $r->ui; ?>" selected><?= $r->nm ?></option>
                                <?php
                                        }else{
                                ?>
                                    <option value="<?= $r->ui; ?>"><?= $r->nm ?></option>
                                <?php
                                        }
                                        $cnt++;
                                    }
                                ?>
                            </select>
                            <?php } ?>
                        </td>
                        <td class="td-pengumuman">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </td>
                <?php } ?>
                <?php } ?> 
                </form>
            </tr>
            <?php 
                }
                $counter++;
                } 
            ?>
          </tbody>
        </table> 
    </div>
</div>
@stop()