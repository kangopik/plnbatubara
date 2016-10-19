@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data4->Nama.", ".$data4->BadanUsaha; ?></h2>

        <div class="row">
            <div class="col-md-12 clearfix">
                <div id="tab_content_data">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="javascript:void(0);">Data Teknis</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailListSpesifikasi' ?>">Spesifikasi Teknis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{action('DetailController@savedetailteknis')}}" method="post">
            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
            <table class="table table-bordered">
                <tbody>
                    <tr class="success">
                        <th colspan="6">Lokasi Tambang</th>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="210">Alamat</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->Alamat}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="AlamatCk" value="1" <?php if($data->AlamatCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Propinsi</td>
                        <td style="border-top:none;" width="320">
                            <div>
                                    <?php
                                        if(!is_null($data->Propinsi) && $data->Propinsi != -1){
                                            foreach($data2 as $r){
                                                if($r->ProvinsiId == $data->Propinsi){
                                    ?>
                                                    <?= $r->ProvinsiName ?>
                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                            </div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="PropinsiCk" value="1" <?php if($data->PropinsiCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                        <td style="border-top:none;" width="100">Kabupaten</td>
                        <td style="border-top:none;">
                            <div>
                                    <?php
                                        if(!is_null($data->Kabupaten) && $data->Kabupaten != -1){
                                            foreach($data3 as $r){
                                                if($r->KabupatenKotaId == $data->Kabupaten){
                                    ?>
                                                    <?= $r->KabupatenKotaName ?>
                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                            </div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KabupatenCk" value="1" <?php if($data->KabupatenCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="6">Koordinat Lokasi Tambang</th>
                    </tr>
                    <tr>
                        <td style="border:none;" colspan="6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th style="text-align:center;" width=120>FID</th>
                                    <th style="text-align:center;" width=120>Point</th>
                                    <th style="text-align:center;" width=120>X</th>
                                    <th style="text-align:center;" width=120>Y</th>
                                    <th style="text-align:center;" width=120>Direction</th>
                                    <th style="text-align:center;" width=120>Length</th>
                                    <th style="text-align:center;" width=150>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php if(!is_null($datakoordinat)) { ?>
                                    <?php
                                        foreach($datakoordinat as $row){
                                    ?>
                                    <tr>
                                        <td> <?php echo $row->FID ?></td>
                                        <td> <?php echo $row->Point ?></td>
                                        <td> <?php echo $row->X ?></td>
                                        <td> <?php echo $row->Y ?></td>
                                        <td> <?php echo $row->Direction ?></td>
                                        <td> <?php echo $row->Length ?></td>
                                        <td style="text-align:center;">
                                            <a href="" onclick="document.getElementById('koordinatid').value='<?php echo $row->IdKoordinat ?>';
                                                                document.getElementById('alamatkoordinat').value='<?php echo $data->Alamat ?>';
                                                                document.getElementById('fid').value='<?php echo $row->FID ?>';
                                                                document.getElementById('point').value='<?php echo $row->Point ?>';
                                                                document.getElementById('x').value='<?php echo $row->X ?>';
                                                                document.getElementById('y').value='<?php echo $row->Y ?>';
                                                                document.getElementById('direction').value='<?php echo $row->Direction ?>';
                                                                document.getElementById('length').value='<?php echo $row->Length ?>';
                                                                <?php if($row->FIDCk=='1') { ?>
                                                                document.getElementById('FIDCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('FIDCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->PointCk=='1') { ?>
                                                                document.getElementById('PointCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('PointCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->XCk=='1') { ?>
                                                                document.getElementById('XCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('XCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->YCk=='1') { ?>
                                                                document.getElementById('YCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('YCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->DirectionCk=='1') { ?>
                                                                document.getElementById('DirectionCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('DirectionCk').checked = false;
                                                                <?php } ?>
                                                                <?php if($row->LengthCk=='1') { ?>
                                                                document.getElementById('LengthCk').checked = true;
                                                                <?php } else { ?>                                                                                
                                                                document.getElementById('LengthCk').checked = false;
                                                                <?php } ?>" 
                                                data-toggle="modal" data-target="#koordinatModal">
                                                <i class="fa fa-search-plus"></i> Detail</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="6">Luas Tambang</th>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Luas Area Tambang</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->LuasAreaTambang}} Ha</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="LuasAreaTambangCk" value="1" <?php if($data->LuasAreaTambangCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Perkiraan Volume Cadangan</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->PerkiraanVolumeCadangan}} MT</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="PerkiraanVolumeCadanganCk" value="1" <?php if($data->PerkiraanVolumeCadanganCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="6">Ijin Operasi Tambang</th>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Ijin Tambang</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$dataijin->JenisIjinTambang}}</div> 
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="IjinTambangCk" value="1" <?php if($data->IjinTambangCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Nomor</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->NomorIjin}}</div> 
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="NomorIjinCk" value="1" <?php if($data->NomorIjinCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Tanggal</td>
                        <td style="border-top:none;" colspan="4">
                            <div><?php if(!is_null($data->TanggalIjin)) { echo date("d-m-Y", strtotime($data->TanggalIjin)); } ?></div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="TanggalIjinCk" value="1" <?php if($data->TanggalIjinCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Masa Berlaku</td>
                        <td style="border-top:none;" colspan="4">
                            <div><?php if(!is_null($data->MasaBerlakuIjin)) { echo date("d-m-Y", strtotime($data->MasaBerlakuIjin)); } ?></div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="MasaBerlakuIjinCk" value="1" <?php if($data->MasaBerlakuIjinCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="6">Kapasitas Produksi Tambang</th>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Kapasitas produksi per tahun</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->KapasitasProduksi}} MT</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasProduksiCk" value="1" <?php if($data->KapasitasProduksiCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Kapasitas stockpile tambang</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->KapasitasStockPile}} MT</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasStockPileCk" value="1" <?php if($data->KapasitasStockPileCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="6">Akses menuju pelabuhan muat</th>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Jarak tempuh ke pelabuhan muat</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->JarakTempuh}} Km</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="JarakTempuhCk" value="1" <?php if($data->JarakTempuhCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Akses pengangkut ke pelabuhan yang tersedia</td>
                        <td style="border-top:none;" colspan="4">
                            <div><?php if ($data->AksesPengangkut == "1") { echo "Umum"; }
                                       else if ($data->AksesPengangkut == "2") { echo "Pribadi"; }
                                       else if ($data->AksesPengangkut == "3") { echo "Sewa"; }
                                       else if ($data->AksesPengangkut == "4") { echo "Belum Tersedia"; }
                                       else { echo ""; } ?></div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="AksesPengangkutCk" value="1" <?php if($data->AksesPengangkutCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Jenis transportasi pengangkut batubara ke pelabuhan muat</td>
                        <td style="border-top:none;" colspan="4">
                            <div><?php if ($data->JenisTransportasi == "1") { echo "Truck"; }
                                       else if ($data->JenisTransportasi == "2") { echo "Kereta Api"; }
                                       else if ($data->JenisTransportasi == "3") { echo "Conveyor"; }
                                       else { echo ""; } ?></div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="JenisTransportasiCk" value="1" <?php if($data->JenisTransportasiCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Kapasitas pengangkutan ke pelabuhan per bulan</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->KapasitasPengangkutan}} MT</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasPengangkutanCk" value="1" <?php if($data->KapasitasPengangkutanCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;">Kapasitas stockpile pelabuhan</td>
                        <td style="border-top:none;" colspan="4">
                            <div>{{$data->KapasitasStockPilePelabuhan}} MT</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasStockPilePelabuhanCk" value="1" <?php if($data->KapasitasStockPilePelabuhanCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                </tbody>
                <table width=100%>
                    <tr>
                        <td width=50%>
                        <a href="<?php echo 'DetailTeknis' ?>" class="btn btn-primary btn-block btn-flat" 
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
                    <tr>
                </table>
            </table>
        </form>
    </div>
</div>

<!-- modal koordinat begin -->
    <div class="modal fade" id="koordinatModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Koordinat Lokasi Tambang</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('DetailController@savedetailkoordinattambang')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="koordinatid" id="koordinatid">
                            <input type="hidden" name="alamatkoordinat" id="alamatkoordinat">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>FID</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>
                                                <input type='text' name="fid" id="fid"  style="border:none;"
                                                    readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="FIDCk" id="FIDCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Point</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>   
                                                <input type='text' name="point" id="point" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="PointCk" id="PointCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>X</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>  
                                                <input type='text' name="x" id="x" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="XCk" id="XCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Y</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>   
                                                <input type='text' name="y" id="y" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="YCk" id="YCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Direction</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>   
                                                <input type='text' name="direction" id="direction" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="DirectionCk" id="DirectionCk" value="1"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=100>Length</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'> 
                                                <input type='text' name="length" id="length" 
                                                    style="border:none;" readonly="true"></input>
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left; border:none;">
                                            <input type="checkbox" name="LengthCk" id="LengthCk" value="1"/>
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