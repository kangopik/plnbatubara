@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#KapasitasProduksi').mask("#.##0", {reverse: true});
    $('#RealisasiTargetTahun').mask("#.##0", {reverse: true});
    $('#RealisasiTargetProduksi').mask("#.##0", {reverse: true});
    $('#RealisasiProduksi').mask("#.##0", {reverse: true});
    $('#JumlahR').mask("#.##0", {reverse: true});
    $('#TargetTahun').mask("#.##0", {reverse: true});
    $('#TargetProduksi').mask("#.##0", {reverse: true});
    $('#trrealisasi').hide();
    $('#realisasibulan1').hide();
    $('#realisasibulan2').hide();

    $("#trcatatan").hide();
});
</script>
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'datatambang' ?>">Data Tambang</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'dataeksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datastockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datajetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('VendorController@savedatakapasitasproduksi')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Produksi</th>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Kapasitas Produksi/Bulan</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">MT</a>
                                    <div class="col-sm-5">
                                        <div data-tip="masukan kapasitas produksi terpasang">
                                            <input type='text' class='form-control' name="KapasitasProduksi" id="KapasitasProduksi" 
                                                    value="{{$data1->KapasitasProduksi}}" onkeypress="return isDecimal(event)" required="required"
                                                <?php if(($data1->KapasitasProduksiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->KapasitasProduksiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="300">Target Tahun Lalu</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">MT</a>
                                    <div class="col-sm-5">
                                        <div data-tip="masukan target tahun lalu">
                                            <input type='text' class='form-control' name="TargetTahun" id="TargetTahun" 
                                                    value="{{$data1->TargetTahun}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->TargetTahunCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->TargetTahunCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Realisasi Tahun Lalu</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">MT</a>
                                    <div class="col-sm-5">
                                        <div data-tip="masukan realisasi tahun lalu">
                                            <input type='text' class='form-control' name="RealisasiTargetTahun" id="RealisasiTargetTahun" 
                                                    value="{{$data1->RealisasiTargetTahun}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->RealisasiTargetTahunCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->RealisasiTargetTahunCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="300">Target Tahun Berjalan</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">MT</a>
                                    <div class="col-sm-5">
                                        <div data-tip="masukan target tahun berjalan">
                                            <input type='text' class='form-control' name="TargetProduksi" id="TargetProduksi" 
                                                    value="{{$data1->TargetProduksi}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->TargetProduksiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->TargetProduksiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Realisasi Tahun Berjalan</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">MT</a>
                                    <div class="col-sm-5">
                                        <div data-tip="masukan realisasi tahun berjalan">
                                            <input type='text' class='form-control' name="RealisasiTargetProduksi" id="RealisasiTargetProduksi" 
                                                    value="{{$data1->RealisasiTargetProduksi}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->RealisasiTargetProduksiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->RealisasiTargetProduksiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="trrealisasi">
                                <td style="border:none; border-top:none;" width="200">Realisasi Produksi</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">MT</a>
                                    <div class="col-sm-5">
                                        <div data-tip="masukan realisasi produksi">
                                            <input type='text' class='form-control' name="RealisasiProduksi" id="RealisasiProduksi" 
                                                    value="{{$data1->RealisasiProduksi}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->RealisasiProduksiCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->RealisasiProduksiCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="realisasibulan1">
                                <td style="border:none; border-top:none;" width="200" colspan="6"><b>Realisasi/Bulan</b></td>
                            </tr>                            
                            <tr id="realisasibulan2">
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>Tahun</th>
                                            <th style="text-align:center;" width=120>Bulan</th>
                                            <th style="text-align:center;" width=120>Jumlah</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data3 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->Tahun ?></td>
                                                <td> <?php echo $row->Bulan ?></td>
                                                <td> <?php echo $row->Jumlah.' MT' ?></td>
                                                <td style="text-align:center;">
                                                    <a href="" onclick="document.getElementById('norealisasi').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('TahunR').value='<?php echo $row->Tahun ?>';
                                                                            <?php if($row->TahunCk=='1') { ?>
                                                                            document.getElementById('TahunR').setAttribute('readOnly','true');
                                                                            document.getElementById('TahunR').style.background = '#eee'; 
                                                                            document.getElementById('TahunR').style.color = '#555';
                                                                            <?php } else if($row->TahunCk=='0') { ?>
                                                                            document.getElementById('TahunR').style.background = 'red';
                                                                            document.getElementById('TahunR').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('TahunR').style.background = '#FFF';
                                                                            document.getElementById('TahunR').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('BulanR').value='<?php echo $row->Bulan ?>';
                                                                            <?php if($row->BulanCk=='1') { ?>
                                                                            document.getElementById('BulanR').setAttribute('readOnly','true');
                                                                            document.getElementById('BulanR').style.background = '#eee'; 
                                                                            document.getElementById('BulanR').style.color = '#555';
                                                                            <?php } else if($row->BulanCk=='0') { ?>
                                                                            document.getElementById('BulanR').style.background = 'red';
                                                                            document.getElementById('BulanR').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('BulanR').style.background = '#FFF';
                                                                            document.getElementById('BulanR').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('JumlahR').value='<?php echo $row->Jumlah; ?>';
                                                                            <?php if($row->JumlahCk=='1') { ?>
                                                                            document.getElementById('JumlahR').setAttribute('readOnly','true');
                                                                            document.getElementById('JumlahR').style.background = '#eee'; 
                                                                            document.getElementById('JumlahR').style.color = '#555';
                                                                            <?php } else if($row->JumlahCk=='0') { ?>
                                                                            document.getElementById('JumlahR').style.background = 'red';
                                                                            document.getElementById('JumlahR').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('JumlahR').style.background = '#FFF';
                                                                            document.getElementById('JumlahR').style.color = '#555';
                                                                            <?php } ?>
                                                                            $('#KapasitasProduksi3').val($('#KapasitasProduksi').val());
                                                                            $('#TargetTahun3').val($('#TargetTahun').val());
                                                                            $('#TargetProduksi3').val($('#TargetProduksi').val());
                                                                            $('#RealisasiProduksi3').val($('#RealisasiProduksi').val());
                                                                            $('#Catatan_h3').val($('#Catatan').val());"
                                                            data-toggle="modal" data-target="#formModalRealisasi">
                                                            <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                                        <a href="" onclick="document.getElementById('norealisasi2').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('asaltambang3').value='<?php echo $row->AsalTambang ?>';
                                                                            document.getElementById('userid3').value='<?php echo $row->UserId ?>';"
                                                                data-toggle="modal" data-target="#confirmModalRealisasi">
                                                            <i class="fa fa-trash-o"></i> Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $counter++; } ?>
                                        </tbody>
                                    </table>
                                    <?php  if($data1->PersetujuanVerifikasi<>'Y' || $data1->Status==2) { ?>
                                    <input type="button" value="Tambah Realisasi/Bulan" class="btn btn-submit  btn-primary" 
                                        data-toggle="modal" data-target="#formModalRealisasi"
                                        onclick="document.getElementById('norealisasi').value='';
                                                $('#BulanR').attr('readonly', false);
                                                $('#TahunR').attr('readonly', false);
                                                $('#JumlahR').attr('readonly', false);
                                                document.getElementById('BulanR').value='';
                                                document.getElementById('BulanR').style.background = '#FFF';
                                                document.getElementById('BulanR').style.color = '#555';
                                                document.getElementById('TahunR').value='';
                                                document.getElementById('TahunR').style.background = '#FFF';
                                                document.getElementById('TahunR').style.color = '#555';
                                                document.getElementById('JumlahR').value='';
                                                document.getElementById('JumlahR').style.background = '#FFF';
                                                document.getElementById('JumlahR').style.color = '#555';
                                                $('#KapasitasProduksi3').val($('#KapasitasProduksi').val());
                                                $('#TargetTahun3').val($('#TargetTahun').val());
                                                $('#TargetProduksi3').val($('#TargetProduksi').val());
                                                $('#RealisasiProduksi3').val($('#RealisasiProduksi').val());
                                                $('#Catatan_h3').val($('#Catatan').val());" >
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr class="success">
                                <th colspan="6">Populasi Alat</th>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200" colspan="6"><b>Jenis dan Peralatan yang digunakan</b></td>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>Jenis</th>
                                            <th style="text-align:center;" width=120>Tipe</th>
                                            <th style="text-align:center;" width=120>Merk</th>
                                            <th style="text-align:center;" width=120>Jumlah</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data2 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->Jenis ?></td>
                                                <td> <?php echo $row->Tipe ?></td>
                                                <td> <?php echo $row->Merk ?></td>
                                                <td> <?php echo $row->Jumlah ?></td>
                                                <td style="text-align:center;">
                                                    <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                                    <a href="" onclick="document.getElementById('nopopulasi').value='<?php echo $row->No ?>';
                                                                            document.getElementById('Jenis').value='<?php echo $row->Jenis ?>';
                                                                            <?php if($row->JenisCk=='1') { ?>
                                                                            document.getElementById('Jenis').setAttribute('readOnly','true');
                                                                            document.getElementById('Jenis').style.background = '#eee'; 
                                                                            document.getElementById('Jenis').style.color = '#555';
                                                                            <?php } else if($row->JenisCk=='0') { ?>
                                                                            document.getElementById('Jenis').style.background = 'red';
                                                                            document.getElementById('Jenis').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Jenis').style.background = '#FFF';
                                                                            document.getElementById('Jenis').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Tipe').value='<?php echo $row->Tipe ?>';
                                                                            <?php if($row->TipeCk=='1') { ?>
                                                                            document.getElementById('Tipe').setAttribute('readOnly','true');
                                                                            document.getElementById('Tipe').style.background = '#eee'; 
                                                                            document.getElementById('Tipe').style.color = '#555';
                                                                            <?php } else if($row->TipeCk=='0') { ?>
                                                                            document.getElementById('Tipe').style.background = 'red';
                                                                            document.getElementById('Tipe').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Tipe').style.background = '#FFF';
                                                                            document.getElementById('Tipe').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Merk').value='<?php echo $row->Merk ?>';
                                                                            <?php if($row->MerkCk=='1') { ?>
                                                                            document.getElementById('Merk').setAttribute('readOnly','true');
                                                                            document.getElementById('Merk').style.background = '#eee'; 
                                                                            document.getElementById('Merk').style.color = '#555';
                                                                            <?php } else if($row->MerkCk=='0') { ?>
                                                                            document.getElementById('Merk').style.background = 'red';
                                                                            document.getElementById('Merk').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Merk').style.background = '#FFF';
                                                                            document.getElementById('Merk').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Jumlah').value='<?php echo $row->Jumlah; ?>';
                                                                            <?php if($row->JumlahCk=='1') { ?>
                                                                            document.getElementById('Jumlah').setAttribute('readOnly','true');
                                                                            document.getElementById('Jumlah').style.background = '#eee'; 
                                                                            document.getElementById('Jumlah').style.color = '#555';
                                                                            <?php } else if($row->JumlahCk=='0') { ?>
                                                                            document.getElementById('Jumlah').style.background = 'red';
                                                                            document.getElementById('Jumlah').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Jumlah').style.background = '#FFF';
                                                                            document.getElementById('Jumlah').style.color = '#555';
                                                                            <?php } ?>
                                                                            $('#KapasitasProduksi2').val($('#KapasitasProduksi').val());
                                                                            $('#TargetTahun2').val($('#TargetTahun').val());
                                                                            $('#TargetProduksi2').val($('#TargetProduksi').val());
                                                                            $('#RealisasiProduksi2').val($('#RealisasiProduksi').val());
                                                                            $('#Catatan_h').val($('#Catatan').val());
                                                                            $('#RealisasiTargetTahun2').val($('#RealisasiTargetTahun').val());
                                                                            $('#RealisasiTargetProduksi2').val($('#RealisasiTargetProduksi').val());"
                                                            data-toggle="modal" data-target="#formModal">
                                                            <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                                        <a href="" onclick="document.getElementById('nopopulasi2').value='<?php echo $row->No ?>';
                                                                            document.getElementById('asaltambang2').value='<?php echo $row->AsalTambang ?>';
                                                                            document.getElementById('userid2').value='<?php echo $row->UserId ?>';"
                                                                data-toggle="modal" data-target="#confirmModal">
                                                            <i class="fa fa-trash-o"></i> Hapus</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $counter++; } ?>
                                        </tbody>
                                    </table>
                                    <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                    <input type="button" value="Tambah Jenis dan Peralatan" class="btn btn-submit  btn-primary" 
                                        data-toggle="modal" data-target="#formModal"
                                        onclick="document.getElementById('nopopulasi').value='';
                                                $('#Jenis').attr('readonly', false);
                                                $('#Tipe').attr('readonly', false);
                                                $('#Merk').attr('readonly', false);
                                                $('#Jumlah').attr('readonly', false);
                                                document.getElementById('Jenis').value='';
                                                document.getElementById('Jenis').style.background = '#FFF';
                                                document.getElementById('Jenis').style.color = '#555';
                                                document.getElementById('Tipe').value='';
                                                document.getElementById('Tipe').style.background = '#FFF';
                                                document.getElementById('Tipe').style.color = '#555';
                                                document.getElementById('Merk').value='';
                                                document.getElementById('Merk').style.background = '#FFF';
                                                document.getElementById('Merk').style.color = '#555';
                                                document.getElementById('Jumlah').value='';
                                                document.getElementById('Jumlah').style.background = '#FFF';
                                                document.getElementById('Jumlah').style.color = '#555';
                                                $('#KapasitasProduksi2').val($('#KapasitasProduksi').val());
                                                $('#TargetTahun2').val($('#TargetTahun').val());
                                                $('#TargetProduksi2').val($('#TargetProduksi').val());
                                                $('#RealisasiProduksi2').val($('#RealisasiProduksi').val());
                                                $('#Catatan_h').val($('#Catatan').val());
                                                $('#RealisasiTargetTahun2').val($('#RealisasiTargetTahun').val());
                                                $('#RealisasiTargetProduksi2').val($('#RealisasiTargetProduksi').val());" >
                                    <?php } ?>
                                </td>
                            </tr>   
                            <tr id="trcatatan">
                                <td style="border:none; border-top:none;">Catatan</td>
                                <td style="border:none; border-top:none;" colspan="5">
                                    <div class="col-sm-12">
                                        <div data-tip="masukan catatan">
                                            <textarea class='form-control' name="Catatan" id="Catatan" 
                                                    value="{{$data1->Catatan}}"
                                                    <?php if(($data1->CatatanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->CatatanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>>{{$data1->Catatan}}</textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width=100%>
                        <tr>                    
                            <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                            <td width=50%>
                                <a href="<?php echo 'datatambang' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
                                            Sebelumnya</a>
                            </td>
                            <td width=50%>
                                <button style="text-transform:none; width:150px;" type="submit" 
                                    class="btn btn-submit  btn-primary" id="btnnext">
                                    Selanjutnya
                                <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                            </td>
                            <?php } ?>
                        </tr>
                    </table>
                </form>
        		<p>(*) Rincian nama SEAM dan ketebalannya <br />
					(**) Probable reserves/proved reserves
				</p>	
        	</div>
        </div>
    </div>
</div>

    <!-- modal koordinat begin -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Jenis dan Peralatan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('VendorController@savejenisperalatan')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="nopopulasi" id="nopopulasi">
                            <input type="hidden" name="KapasitasProduksi2" id="KapasitasProduksi2">
                            <input type="hidden" name="TargetTahun2" id="TargetTahun2">
                            <input type="hidden" name="TargetProduksi2" id="TargetProduksi2">
                            <input type="hidden" name="RealisasiProduksi2" id="RealisasiProduksi2">
                            <input type="hidden" name="Catatan_h" id="Catatan_h">
                            <input type="hidden" name="RealisasiTargetTahun2" id="RealisasiTargetTahun2">
                            <input type="hidden" name="RealisasiTargetProduksi2" id="RealisasiTargetProduksi2">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Jenis</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-12'>
                                                <div data-tip="masukan jenis">   
                                                    <input type='text' class='form-control' name="Jenis" id="Jenis" 
                                                        required="required"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Tipe</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-12'>
                                                <div data-tip="masukan tipe">    
                                                    <input type='text' class='form-control' name="Tipe" id="Tipe" 
                                                        required="required"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Merk</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-12'>
                                                <div data-tip="masukan merk"> 
                                                    <input type='text' class='form-control' name="Merk" id="Merk"
                                                    required="required"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Jumlah</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan jumlah">    
                                                    <input type='text' class='form-control' name="Jumlah" id="Jumlah"
                                                    required="required" onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                <input  type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal koordinat end -->

    <!-- modal koordinat begin -->
    <div class="modal fade" id="formModalRealisasi" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Realisasi/Bulan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('VendorController@saverealisasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="norealisasi" id="norealisasi">
                            <input type="hidden" name="KapasitasProduksi3" id="KapasitasProduksi3">
                            <input type="hidden" name="TargetTahun3" id="TargetTahun3">
                            <input type="hidden" name="TargetProduksi3" id="TargetProduksi3">
                            <input type="hidden" name="RealisasiProduksi3" id="RealisasiProduksi3">
                            <input type="hidden" name="Catatan_h3" id="Catatan_h3">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Tahun</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan tahun">    
                                                    <input type='text' class='form-control' name="TahunR" id="TahunR"
                                                    required="required" onkeypress="return isNumber(event)"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Bulan</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan bulan">    
                                                    <select name='BulanR' id='BulanR' class='form-control'>
                                                        <option value="" selected>- Bulan -</option>
                                                        <option value="JANUARI" >JANUARI</option>
                                                        <option value="PEBRUARI" >PEBRUARI</option> 
                                                        <option value="MARET" >MARET</option>
                                                        <option value="APRIL" >APRIL</option>
                                                        <option value="MEI" >MEI</option>
                                                        <option value="JUNI" >JUNI</option>
                                                        <option value="JULI" >JULI</option>
                                                        <option value="AGUSTUS" >AGUSTUS</option>
                                                        <option value="SEPTEMBER" >SEPTEMBER</option>
                                                        <option value="OKTOBER" >OKTOBER</option>
                                                        <option value="NOPEMBER" >NOPEMBER</option>
                                                        <option value="DESEMBER" >DESEMBER</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Jumlah</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan jumlah">    
                                                    <input type='text' class='form-control' name="JumlahR" id="JumlahR"
                                                    required="required" onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                <input  type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal koordinat end -->

    <!-- modal konfirmasi sumber tambang end -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletejenisperalatan')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="nopopulasi2" id="nopopulasi2">
                        <input type="hidden" name="asaltambang2" id="asaltambang2">
                        <input type="hidden" name="userid2" id="userid2">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus jenis peralatan ini 
                            </h4>
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
    <!-- modal konfirmasi koordinat end -->

    <!-- modal konfirmasi sumber tambang end -->
    <div class="modal fade" id="confirmModalRealisasi" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deleterealisasi')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="norealisasi2" id="norealisasi2">
                        <input type="hidden" name="asaltambang3" id="asaltambang3">
                        <input type="hidden" name="userid3" id="userid3">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus realisasi ini 
                            </h4>
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
    <!-- modal konfirmasi koordinat end -->

<script>
    $("#btnnext").submit(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()