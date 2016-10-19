@extends('layout.admin')
@section('content')
<script type="text/javascript">
$(document).ready(function(){
    $("#trdireksi").hide();
    $("#trpemegang").hide();
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data4->Nama.", ".$data4->BadanUsaha; ?></h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="">
                            <a href="<?php echo 'HasilAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);" >IJIN TAMBANG</a>
                        </li>
                    </ul>

                    <!-- PKP2B -->
                    <?php if ($data->JenisIjin == "PKP2B") { ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Perjanjian Karya Pengusaha Pertambangan Batubara (PKP2B)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;" width=250>No. PKP2B</td>
                                    <td colspan="4">{{$data9->No}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Tanggal PKP2B</td>
                                    <td colspan="4"><?php if(!is_null($data9->Tanggal)) { echo date("d-m-Y", strtotime($data9->Tanggal));} ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                    
                    <!-- IUPOP -->
                    <?php if ($data->JenisIjin == "IUPOP") { ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Ijin Usaha Pertambangan Operasi Produksi (IUP OP)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;" width=250>No. IUP</td>
                                    <td colspan="4">{{$data1->No}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Tanggal IUP</td>
                                    <td colspan="4"><?php if(!is_null($data1->Tanggal)) { echo date("d-m-Y", strtotime($data1->Tanggal));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Jangka Waktu IUP</td>
                                    <td colspan="4"><?php if(!is_null($data1->JangkaWaktu)) { echo date("d-m-Y", strtotime($data1->JangkaWaktu));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Menerbitkan</td>
                                    <td style="border:none;" colspan="4">
                                        <?php if($data1->Menerbitkan == '1') { echo "Kementrian ESDM / Minerba";
                                              }else if($data1->Menerbitkan == '2') { echo "Gubernur / BKPM Provinsi";
                                              }else if($data1->Menerbitkan == '3') { echo "Bupati / Walikota";
                                              }else{ echo ""; } ?>
                                    </td>
                                </tr>
                                <?php if($data1->Menerbitkan != ''){ ?>
                                <tr>
                                    <td></td>
                                    <?php if($data1->Menerbitkan == '1') { ?>
                                    <td style="border:none;" colspan="4">Lintas provinsi dan negara</td>
                                    <?php }else if($data1->Menerbitkan == '2') { ?>
                                    <td style="border:none;" colspan="4">Lintas kabupaten dalam provinsi</td>
                                    <?php }else if($data1->Menerbitkan == '3') { ?>
                                    <td style="border:none;" colspan="4">Dalam satu kabupaten/kota</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <tr id="trdireksi">
                                    <td style="border:none;" >Nama Direksi / Komisaris</td>
                                    <td style="border:none;" colspan="4">{{$data1->Dirut}}</td>
                                </tr>
                                <tr id="trpemegang">
                                    <td style="border:none;">Pemegang Saham Perusahaan</td>
                                    <td style="border:none;" colspan="4">{{$data1->Dirut}}</td>
                                </tr>
                                                                <tr>
                                    <td style="border:none;">No. Sertifikat CNC</td>
                                    <td style="border:none;" colspan="4">{{$data1->NoCnc}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Tanggal CNC</td>
                                    <td colspan="4"><?php if(!is_null($data1->TanggalCnc)) { echo date("d-m-Y", strtotime($data1->TanggalCnc));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Jangka Waktu CNC</td>
                                    <td colspan="4"><?php if(!is_null($data1->JangkaWaktuCnc)) { echo date("d-m-Y", strtotime($data1->JangkaWaktuCnc));} ?></td>
                                </tr>
                                <tr id="iupopfield10">
                                    <td style="border:none;">Lampiran</td>
                                    <td style="border:none;">
                                        <?php if(($data1->LampiranPeta) == "PETA"){ echo "PETA"; }
                                              else { echo "";}  ?> 
                                    </td> 
                                    <td style="border:none;" colspan="2">
                                        <?php if(($data1->LampiranKoordinat) == "KOORDINAT"){ echo "KOORDINAT"; }
                                              else { echo "";}  ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width=100%>
                            <tr>
                                <td width=50%>
                                    <a href="<?php echo 'HasilPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                </td>
                                <td width=50%>
                                        <a href="<?php echo 'hasilverifikasipeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selesai
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                </td>  
                            <tr>
                        </table>
                    <?php } ?>
                    <!-- IUPOP -->

                    <!-- IUPOPK -->
                    <?php if ($data->JenisIjin == "IUPOPK") { ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td style="border:none;" colspan="6" style="border-bottom:none;">
                                        Ijin Usaha Pertambangan Operasi Khusus Pengangkutan dan Penjualan (IUP OPK)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;" width=250>No. IUP</td>
                                    <td style="border:none;" colspan="4">{{$data2->No}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Tanggal IUP</td>
                                    <td style="border:none;" colspan="4"><?php if(!is_null($data2->Tanggal)) { echo date("d-m-Y", strtotime($data2->Tanggal));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Jangka Waktu IUP</td>
                                    <td style="border:none;" colspan="4"><?php if(!is_null($data2->JangkaWaktu)) { echo date("d-m-Y", strtotime($data2->JangkaWaktu));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Menerbitkan</td>
                                    <td style="border:none;" colspan="4">
                                        <?php if($data2->Menerbitkan == '1') { echo "Kementrian ESDM / Minerba";
                                              }else if($data2->Menerbitkan == '2') { echo "Gubernur / BKPM Provinsi";
                                              }else if($data2->Menerbitkan == '3') { echo "Bupati / Walikota";
                                              }else{ echo ""; } ?>
                                    </td>
                                </tr>
                                <?php if($data2->Menerbitkan != ''){ ?>
                                <tr>
                                    <td style="border:none;"></td>
                                    <?php if($data2->Menerbitkan == '1') { ?>
                                    <td style="border:none;" colspan="4">Lintas provinsi dan negara</td>
                                    <?php }else if($data2->Menerbitkan == '2') { ?>
                                    <td style="border:none;" colspan="4">Lintas kabupaten dalam provinsi</td>
                                    <?php }else if($data2->Menerbitkan == '3') { ?>
                                    <td style="border:none;" colspan="4">Dalam satu kabupaten/kota</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td style="border:none;">Wilayah Pengangkutan</td>
                                    <td style="border:none;" colspan="4">{{$data2->WilayahPengangkutan}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;" colspan="6">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th style="text-align:center;" width=50>No</th>
                                                <th style="text-align:center;" width=120>Asal Tambang</th>
                                                <th style="text-align:center;" width=120>No. IUP OP</th>
                                                <th style="text-align:center;" width=120>Tgl.</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                                <th style="text-align:center;" width=120>Tgl. Berlaku</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $counter = 1;
                                                    foreach($data6 as $row){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $counter ?></td>
                                                    <td> <?php echo $row->AsalTambang ?></td>
                                                    <td> <?php echo $row->NoIUPOP ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="" onclick="
                                                                document.getElementById('asaltambangsumber').value='<?php echo $row->AsalTambang ?>';
                                                                document.getElementById('noiupopsumber').value='<?php echo $row->NoIUPOP ?>';
                                                                document.getElementById('nocncsumber').value='<?php echo $row->NoCNC ?>';
                                                                document.getElementById('tglsumber1').value='<?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?>';
                                                                document.getElementById('jangkawaktusumber1').value='<?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?>';
                                                                document.getElementById('tglsumber2').value='<?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?>';
                                                                document.getElementById('jangkawaktusumber2').value='<?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?>';" 
                                                            data-toggle="modal" data-target="#asaltambangModal">
                                                            <i class="fa fa-search-plus"></i> Detail</a>
                                                        </td>
                                                </tr>
                                                <?php $counter++; } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width=100%>
                            <tr>
                                <td width=50%>
                                    <a href="<?php echo 'HasilPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                </td>
                                <td width=50%>
                                        <a href="<?php echo 'hasilverifikasipeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selesai
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                </td>  
                            <tr>
                        </table>                
                    <?php } ?>
                    <!-- IUPOPK -->

                    <!-- IUPOPK2 -->
                    <?php if ($data->JenisIjin == "IUPOPK2") { ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="success">
                                    <th colspan="6">Surat Ijin Usaha Pertambangan</th>
                                </tr>
                                <tr>
                                    <td colspan="6" style="border-bottom:none;">
                                        Ijin Usaha Pertambangan Operasi Produksi Khusus Pengolahan dan Pemurnian (IUP OPK)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;" width=500>No. IUP</td>
                                    <td style="border:none;" colspan="4">{{$data7->No}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Tanggal IUP</td>
                                    <td style="border:none;" colspan="4"><?php if(!is_null($data7->Tanggal)) { echo date("d-m-Y", strtotime($data7->Tanggal));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Jangka Waktu IUP</td>
                                    <td style="border:none;" colspan="4"><?php if(!is_null($data7->JangkaWaktu)) { echo date("d-m-Y", strtotime($data7->JangkaWaktu));} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;">Menerbitkan</td>
                                    <td style="border:none;" colspan="4">
                                        <?php if($data7->Menerbitkan == '1') { echo "Kementrian ESDM / Minerba";
                                              }else if($data7->Menerbitkan == '2') { echo "Gubernur / BKPM Provinsi";
                                              }else if($data7->Menerbitkan == '3') { echo "Bupati / Walikota";
                                              }else{ echo ""; } ?>
                                    </td>
                                </tr>
                                <?php if($data7->Menerbitkan != ''){ ?>
                                <tr>
                                    <td style="border:none;"></td>
                                    <?php if($data7->Menerbitkan == '1') { ?>
                                    <td style="border:none;" colspan="4">Lintas provinsi dan negara</td>
                                    <?php }else if($data7->Menerbitkan == '2') { ?>
                                    <td style="border:none;" colspan="4">Lintas kabupaten dalam provinsi</td>
                                    <?php }else if($data7->Menerbitkan == '3') { ?>
                                    <td style="border:none;" colspan="4">Dalam satu kabupaten/kota</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td style="border:none;">Membeli dan mengangkut batubara yang diolah dari IUP OP</td>
                                    <td style="border:none;" colspan="4">{{$data7->WilayahPengangkutan}}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;" colspan="6">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th style="text-align:center;" width=50>No</th>
                                                <th style="text-align:center;" width=120>Asal Tambang</th>
                                                <th style="text-align:center;" width=120>No. IUP OP</th>
                                                <th style="text-align:center;" width=120>Tgl.</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                                <th style="text-align:center;" width=120>Tgl. Berlaku</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $counter = 1;
                                                    foreach($data8 as $row){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $counter ?></td>
                                                    <td> <?php echo $row->AsalTambang ?></td>
                                                    <td> <?php echo $row->NoIUPOP ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="" onclick="
                                                                document.getElementById('asaltambangsumber').value='<?php echo $row->AsalTambang ?>';
                                                                document.getElementById('noiupopsumber').value='<?php echo $row->NoIUPOP ?>';
                                                                document.getElementById('nocncsumber').value='<?php echo $row->NoCNC ?>';
                                                                document.getElementById('tglsumber1').value='<?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?>';
                                                                document.getElementById('jangkawaktusumber1').value='<?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?>';
                                                                document.getElementById('tglsumber2').value='<?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?>';
                                                                document.getElementById('jangkawaktusumber2').value='<?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?>';" 
                                                            data-toggle="modal" data-target="#asaltambangModal">
                                                            <i class="fa fa-search-plus"></i> Detail</a>
                                                        </td>
                                                </tr>
                                                <?php $counter++; } ?>                                                
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width=100%>
                            <tr>
                                <td width=50%>
                                    <a href="<?php echo 'DetailPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                </td>
                                <td width=50%>
                                        <a href="<?php echo 'hasilverifikasipeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selesai
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                </td>  
                            <tr>
                        </table>
                    </form>
                    <?php } ?>
                    <!-- IUPOPK2 -->

        		</div>
        	</div>
        <div>
    </div>

    <!-- modal koordinat begin -->
    <div class="modal fade" id="asaltambangModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Asal Tambang</h4>
                    </div>
                    <div class="modal-body">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=120>Asal Tambang</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>
                                                <input type='text' name="asaltambangsumber" id="asaltambangsumber"  style="border:none;"
                                                    readonly="true"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>No. IUPOP</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="noiupopsumber" id="noiupopsumber" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Tanggal</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="tglsumber1" id="tglsumber1" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="jangkawaktusumber1" id="jangkawaktusumber1" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Sertifikat CNC</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="nocncsumber" id="nocncsumber" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Tanggal</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="tglsumber2" id="tglsumber2" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="jangkawaktusumber2" id="jangkawaktusumber2" 
                                                    style="border:none;" readonly="true"></input>
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
    <!-- modal koordinat end -->

</div>

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