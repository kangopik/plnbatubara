@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data2->Nama.', '.$data2->BadanUsaha; ?></h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="">
                            <a href="<?php echo 'HasilAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);" >IJIN PERUSAHAAN</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilIjinTambang' ?>" >IJIN TAMBANG</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                        <div class="col-lg-12">
                            <form action="{{action('DetailController@savedetailperijinan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="success"> 
                                        <th colspan="7">Akta Pendirian Perusahaan / Anggaran Dasar</th>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Nomor Akta</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->NomorAkta}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Tanggal</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalAkta)) { echo date("d-m-Y", strtotime($data->TanggalAkta)); } ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" >Nama Notaris</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->NamaNotaris}}</div>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>SK Kemenhumkam / Pengesahan Pengadilan / Kementrian Koperasi</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Nomor SK</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->NomorPengesahanKemenhumkam}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Tanggal SK</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalPengesahanKemenhumkam)) { echo date("d-m-Y", strtotime($data->TanggalPengesahanKemenhumkam)); } ?></div>
                                        </td>
                                    </tr>
                                    <?php if(!is_null($datakomisaris)) { ?> 
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5><b>Susunan Pemegang Saham</b></h5>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th width="50" style="text-align:center;">No</th>
                                                        <th width="400" style="text-align:center;">Nama</th>
                                                        <th width="200" style="text-align:center;">No. KTP</th>
                                                        <!-- <th width="250" style="text-align:center;">Jabatan</th> -->
                                                        <th width="180" style="text-align:center;">Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $counter = 1;
                                                            foreach($datakomisaris as $row){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $counter ?></td>
                                                            <td><?php echo $row->Nama ?></td>
                                                            <td><?php echo $row->NoKTP ?></td>
                                                            <!-- <td><?php //echo $row->Jabatan ?></td> -->
                                                            <td style="text-align:center;">
                                                                <a href="" onclick="document.getElementById('namakomisaris').value='<?php echo $row->Nama ?>';
                                                                                    document.getElementById('ktpkomisaris').value='<?php echo $row->NoKTP ?>';
                                                                                    document.getElementById('jabatankomisaris').value='<?php echo $row->Jabatan ?>';"
                                                                    data-toggle="modal" data-target="#komisarisModal1">
                                                                    <i class="fa fa-search-plus"></i> Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $counter++; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <?php if(!is_null($datadireksi))  { ?>
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><b>Susunan Pengurus Perusahaan</b></h5>
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <th width="50" style="text-align:center;">No</th>
                                                            <th width="400" style="text-align:center;">Nama</th>
                                                            <th width="200" style="text-align:center;">No. KTP</th>
                                                            <th width="250" style="text-align:center;">Jabatan</th>
                                                            <th width="180" style="text-align:center;">Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $counter = 1;
                                                                foreach($datadireksi as $row){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $counter ?></td>
                                                                <td><?php echo $row->Nama ?></td>
                                                                <td><?php echo $row->NoKTP ?></td>
                                                                <td><?php echo $row->Jabatan ?></td>
                                                                <td style="text-align:center;">
                                                                    <a href="" onclick="document.getElementById('namadireksi').value='<?php echo $row->Nama ?>';
                                                                                        document.getElementById('ktpdireksi').value='<?php echo $row->NoKTP ?>';
                                                                                        document.getElementById('jabatandireksi').value='<?php echo $row->Jabatan ?>';"
                                                                        data-toggle="modal" data-target="#direksiModal1">
                                                                        <i class="fa fa-search-plus"></i> Detail
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <tr class="success"> 
                                        <th colspan="7">Akta Perubahan Anggaran Dasar Terakhir</th>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Nomor Akta</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->NomorAktaPerubahan}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Tanggal Akta</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalAktaPerubahan)) { echo date("d-m-Y", strtotime($data->TanggalAktaPerubahan)); } ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" >Nama Notaris</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->NamaNotarisPerubahan}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>SK Kemenhumkam / Pengesahan Pengadilan / Kementrian Koperasi</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Nomor SK</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->NomorPengesahanKemenhumkamPerubahan}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Tanggal SK</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalPengesahanKemenhumkamPerubahan)) { echo date("d-m-Y", strtotime($data->TanggalPengesahanKemenhumkamPerubahan)); } ?></div>
                                        </td>
                                    </tr>
                                    <?php if(!is_null($datakomisarisperubahan))  { ?>
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5><b>Susunan Pemegang Saham</b></h5>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th width="50" style="text-align:center;">No</th>
                                                        <th width="400" style="text-align:center;">Nama</th>
                                                        <th width="200" style="text-align:center;">No. KTP</th>
                                                        <!-- <th width="250" style="text-align:center;">Jabatan</th> -->
                                                        <th width="180" style="text-align:center;">Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $counter = 1;
                                                            foreach($datakomisarisperubahan as $row){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $counter ?></td>
                                                            <td><?php echo $row->Nama ?></td>
                                                            <td><?php echo $row->NoKTP ?></td>
                                                            <!-- <td><?php //echo $row->Jabatan ?></td> -->
                                                            <td style="text-align:center;">
                                                                <a href="" onclick="document.getElementById('namakomisarisperubahan').value='<?php echo $row->Nama ?>';
                                                                                    document.getElementById('ktpkomisarisperubahan').value='<?php echo $row->NoKTP ?>';
                                                                                    document.getElementById('jabatankomisarisperubahan').value='<?php echo $row->Jabatan ?>';"
                                                                    data-toggle="modal" data-target="#komisarisModal2">
                                                                    <i class="fa fa-search-plus"></i> Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $counter++; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(!is_null($datadireksiperubahan))  { ?>
                                    <tr>
                                        <td colspan="7" style="border-top:none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><b>Susunan Pengurus Perusahaan</b></h5>
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <th width="50" style="text-align:center;">No</th>
                                                            <th width="400" style="text-align:center;">Nama</th>
                                                            <th width="200" style="text-align:center;">No. KTP</th>
                                                            <th width="250" style="text-align:center;">Jabatan</th>
                                                            <th width="180" style="text-align:center;">Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $counter = 1;
                                                                foreach($datadireksiperubahan as $row){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $counter ?></td>
                                                                <td><?php echo $row->Nama ?></td>
                                                                <td><?php echo $row->NoKTP ?></td>
                                                                <td><?php echo $row->Jabatan ?></td>
                                                                <td style="text-align:center;">
                                                                    <a href="" onclick="document.getElementById('namadireksiperubahan').value='<?php echo $row->Nama ?>';
                                                                                        document.getElementById('ktpdireksiperubahan').value='<?php echo $row->NoKTP ?>';
                                                                                        document.getElementById('jabatandireksiperubahan').value='<?php echo $row->Jabatan ?>';"
                                                                        data-toggle="modal" data-target="#direksiModal2">
                                                                        <i class="fa fa-search-plus"></i> Detail
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php $counter++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr class="success"> 
                                        <th colspan="7">Perijinan Perusahaan</th>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>Surat Ijin Usaha Perdagangan (SIUP)</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Penerbit</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->PenerbitSIUP}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Nomor</td>
                                        <td style="border:none;" width="60">
                                            <div>{{$data->NomorSIUP}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Tanggal</td>
                                        <td style="border:none;" width="250">
                                            <div><?php if(!is_null($data->TanggalSIUP)) { echo date("d-m-Y", strtotime($data->TanggalSIUP)); } ?></div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">s/d Tanggal</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalSdSIUP)) { echo date("d-m-Y", strtotime($data->TanggalSdSIUP)); } ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>Tanda Daftar Perusahaan (TDP)</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Penerbit</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->PenerbitTDP}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Nomor</td>
                                        <td style="border:none;" width="60">
                                            <div>{{$data->NomorTDP}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Tanggal</td>
                                        <td style="border:none;" width="250">
                                            <div><?php if(!is_null($data->TanggalTDP)) { echo date("d-m-Y", strtotime($data->TanggalTDP)); } ?></div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">s/d Tanggal</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalSdTDP)) { echo date("d-m-Y", strtotime($data->TanggalSdTDP)); } ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" colspan="7"><b>Surat Keterangan Domisili Perusahaan (SKDP)</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Penerbit</td>
                                        <td style="border:none;" width="250">
                                            <div>{{$data->PenerbitSKDP}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">Nomor</td>
                                        <td style="border:none;" width="60">
                                            <div>{{$data->NomorSKDP}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="170">Tanggal</td>
                                        <td style="border:none;" width="250">
                                            <div><?php if(!is_null($data->TanggalSKDP)) { echo date("d-m-Y", strtotime($data->TanggalSKDP)); } ?></div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="40">s/d Tanggal</td>
                                        <td style="border:none;" width="60">
                                            <div><?php if(!is_null($data->TanggalSdSKDP)) { echo date("d-m-Y", strtotime($data->TanggalSdSKDP)); } ?></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <table width=100%>
                                <tr>
                                    <td width=50%>
                                        <a href="<?php echo 'HasilAdministrasi' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                    </td>
                                    <td width=50%>
                                            <a href="<?php echo 'HasilIjinTambang' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                    </td>  
                                <tr>
                            </table>
                                                        <p>&nbsp;</p>
                                                        <p>&nbsp;</p>
                        </div>
                    </div>
                        </div>
                    <div>
        		</div>
        	</div>
        <div>
    </div>
</div>
<!-- modal komisaris 1 --> 
<div class="modal fade" id="komisarisModal1" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pemegang Saham</h4>
                </div>
                <div class="modal-body">
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namakomisaris" id="namakomisaris" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpkomisaris" id="ktpkomisaris" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td style="border:none; padding-top:15px;">Jabatan</td>
                                    <td style="border:none;">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jabatankomisaris" id="jabatankomisaris" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal komisaris 1 -->

<!-- modal direksi 1 --> 
<div class="modal fade" id="direksiModal1" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pengurus Perusahaan</h4>
                </div>
                <div class="modal-body">
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namadireksi" id="namadireksi" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpdireksi" id="ktpdireksi" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">Jabatan</td>
                                    <td style="border:none;">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jabatandireksi" id="jabatandireksi" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal direksi 1 -->

<!-- modal direksi 2 --> 
<div class="modal fade" id="direksiModal2" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pengurus Perusahaan</h4>
                </div>
                <div class="modal-body">
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namadireksiperubahan" id="namadireksiperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpdireksiperubahan" id="ktpdireksiperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">Jabatan</td>
                                    <td style="border:none;">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jabatandireksiperubahan" id="jabatandireksiperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal direksi 2 -->

<!-- modal komisaris 2 --> 
<div class="modal fade" id="komisarisModal2" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="kepemilikanSahamModalLabel">Pemegang Saham</h4>
                </div>
                <div class="modal-body">
                        <table class="table table-bordered" style="border:none;">
                            <tbody>
                                <tr>
                                    <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                    <td style="border:none;">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="namakomisarisperubahan" id="namakomisarisperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none; padding-top:15px;">No. KTP</td>
                                    <td style="border:none;">
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="ktpkomisarisperubahan" id="ktpkomisarisperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td style="border:none; padding-top:15px;">Jabatan</td>
                                    <td style="border:none;">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jabatankomisarisperubahan" id="jabatankomisarisperubahan" readonly="true"
                                            style="border:none; background-color:#fff;">
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal komisaris 1 -->
<script>
$("#btnnext").click(function() {
    $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
    setTimeout($.unblockUI, 800);
}); 
$("#btnprev").click(function() {
    $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
    setTimeout($.unblockUI, 800);
});
</script>
@stop()