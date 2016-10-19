@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#luastambang').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#perkiraanvolumecadangan').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#kapasitasproduksi').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#kapasitasstockpile').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#jaraktempuh').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#kapasitaspengangkutan').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#kapasitasstockpilepelabuhan').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Entry Due Diligence</h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                        	<a href="javascript:void(0);">Data Teknis</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'EntryKualitasBatubara' ?>">Spesifikasi Teknis</a>
                        </li>
                        <!--<li class="">
                            <a href="</?php echo 'EntryDataSarana' ?>">Data Sarana Pengangkut batubara ke PLTU</a>
                        </li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                <form action="{{action('EntryController@saveentrydatatambang')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr class="success">
                                                <th colspan="2">Lokasi Tambang</th>
                                                <th style="text-align:center;">Fakta Hasil Due</th>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;" width="210">Alamat</td>
                                                <td style="border-top:none;" width="400">
                                                    <div>{{$data->Alamat}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan alamat lokasi tambang">
                                                    <input type='text' class='form-control' name="alamat" value="{{$data4->Alamat}}" required="required">
                                                    <input type='hidden' class='form-control' name="alamatasal" value="{{$data->Alamat}}" required="required">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Propinsi</td>
                                                <td style="border-top:none;">
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
                                                <td>
                                                    <div data-tip="masukan propinsi lokasi tambang">
                                                    <input type='text' class='form-control' name="propinsi" value="{{$data4->Propinsi}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kabupaten</td>
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
                                                <td>
                                                    <div data-tip="masukan kabupaten lokasi tambang">
                                                    <input type='text' class='form-control' name="kabupaten" value="{{$data4->Kabupaten}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <th colspan="3">Koordinat Lokasi Tambang</th>
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
                                                                    <a href="" onclick="document.getElementById('koordinatid').value='<?php echo $row->IdKoordinat ?>'
                                                                                        document.getElementById('koordinatidhsl').value='<?php echo $row->IdKoordinatHsl ?>';
                                                                                        document.getElementById('alamatkoordinat').value='<?php echo $data->Alamat ?>';
                                                                                        document.getElementById('fid').value='<?php echo $row->FID ?>';
                                                                                        document.getElementById('point').value='<?php echo $row->Point ?>';
                                                                                        document.getElementById('x').value='<?php echo $row->X ?>';
                                                                                        document.getElementById('y').value='<?php echo $row->Y ?>';
                                                                                        document.getElementById('direction').value='<?php echo $row->Direction ?>';
                                                                                        document.getElementById('length').value='<?php echo $row->Length ?>';
                                                                                        document.getElementById('FIDHsl').value='<?php echo $row->FIDHsl ?>';
                                                                                        document.getElementById('PointHsl').value='<?php echo $row->PointHsl ?>';
                                                                                        document.getElementById('XHsl').value='<?php echo $row->XHsl ?>';
                                                                                        document.getElementById('YHsl').value='<?php echo $row->YHsl ?>';
                                                                                        document.getElementById('DirectionHsl').value='<?php echo $row->DirectionHsl ?>';
                                                                                        document.getElementById('LengthHsl').value='<?php echo $row->LengthHsl ?>';" 
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
                                                <td style="border-top:none;" colspan="3"><b>Luas Tambang</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Luas Tambang</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->LuasAreaTambang}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan luas area tambang">
                                                    <input type='text' class='form-control' name="luastambang" id="luastambang" value="{{$data4->LuasAreaTambang}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Perkiraan Volume Cadangan</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->PerkiraanVolumeCadangan}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan perkiraan volume cadangan">
                                                    <input type='text' class='form-control' name="perkiraanvolumecadangan" id="perkiraanvolumecadangan"
                                                     value="{{$data4->PerkiraanVolumeCadangan}}">
                                                 </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td style="border-top:none;" colspan="3"><b>Ijin Operasi Tambang</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Jenis Ijin</td>
                                                <td style="border-top:none;" colspan="2">
                                                    <div>{{$datajenisijin->JenisIjin}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Nomor</td>
                                                <td style="border-top:none;">
                                                    <div>{{$dataisiijin->No}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan nomor ijin operasi tambang">
                                                    <input type='text' class='form-control' name="nomorijin" value="{{$data4->NomorIjin}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Tanggal</td>
                                                <td style="border-top:none;">
                                                    <div><?php if(!is_null($dataisiijin->Tanggal)) { echo date("d-m-Y", strtotime($dataisiijin->Tanggal)); } ?></div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan tanggal ijin operasi tambang">
                                                    <input type='text' class='form-control' name="tanggalijin" id="tanggalijinentry"
                                                        value="<?php if(!is_null($data4->TanggalIjin)) { echo date("d-m-Y", strtotime($data4->TanggalIjin)); } ?>">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Masa Berlaku</td>
                                                <td style="border-top:none;">
                                                    <div><?php if(!is_null($dataisiijin->JangkaWaktu)) { echo date("d-m-Y", strtotime($dataisiijin->JangkaWaktu)); } ?></div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan masa berlaku operasi tambang">
                                                    <input type='text' class='form-control' name="masaberlakuijin" id="masaberlakuijinentry"
                                                        value="<?php if(!is_null($data4->MasaBerlakuIjin)) { echo date("d-m-Y", strtotime($data4->MasaBerlakuIjin)); } ?>">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td style="border-top:none;" colspan="3"><b>Kapasitas Produksi Tambang</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas Produksi per Tahun</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasProduksi}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas produksi per tahun">
                                                    <input type='text' class='form-control' name="kapasitasproduksi" id="kapasitasproduksi"
                                                        value="{{$data4->KapasitasProduksi}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas Stockpile Tambang</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasStockPile}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas stock pile tambang">
                                                    <input type='text' class='form-control' name="kapasitasstockpile"  id="kapasitasstockpile" 
                                                            value="{{$data4->KapasitasStockPile}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td style="border-top:none;" colspan="3"><b>Akses Menuju Pelabuhan Muat</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Jarak tempuh ke pelabuhan muat</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->JarakTempuh}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan jarak tempuh ke pelabuhan muat">
                                                    <input type='text' class='form-control' name="jaraktempuh" id="jaraktempuh"
                                                        value="{{$data4->JarakTempuh}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Akses pengangkut ke pelabuhan yang tersedia</td>
                                                <td style="border-top:none;">
                                                    <div>
                                                            <?php if ($data->AksesPengangkut == "1") { echo "Umum"; }
                                                           else if ($data->AksesPengangkut == "2") { echo "Pribadi"; }
                                                           else if ($data->AksesPengangkut == "3") { echo "Sewa"; }
                                                           else if ($data->AksesPengangkut == "4") { echo "Belum Tersedia"; }
                                                           else { echo ""; } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan akses pengangkut ke pelabuhan">
                                                    <input type='text' class='form-control' name="aksespengangkut" value="{{$data4->AksesPengangkut}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Jenis transportasi pengangkut batubara ke pelabuhan muat</td>
                                                <td style="border-top:none;">
                                                    <div><?php if ($data->JenisTransportasi == "1") { echo "Truck"; }
                                                           else if ($data->JenisTransportasi == "2") { echo "Kereta Api"; }
                                                           else if ($data->JenisTransportasi == "3") { echo "Conveyor"; }
                                                           else { echo ""; } ?></div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan jenis transportasi pengangkut">
                                                    <input type='text' class='form-control' name="jenistransportasi" value="{{$data4->JenisTransportasi}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas pengangkutan ke pelabuhan per bulan</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasPengangkutan}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas pengangkutan">
                                                    <input type='text' class='form-control' name="kapasitaspengangkutan" id="kapasitaspengangkutan"
                                                        value="{{$data4->KapasitasPengangkutan}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas stockpile pelabuhan</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasStockPilePelabuhan}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas stock pile pelabuhan">
                                                    <input type='text' class='form-control' name="kapasitasstockpilepelabuhan" id="kapasitasstockpilepelabuhan"
                                                        value="{{$data4->KapasitasStockPilePelabuhan}}">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table>
                                        <tr>
                                            <td width=600>
                                        <input style="width:25%; margin-left:40%; margin-right:40%;" type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                                            </td>
                                            <td>
                                                <a href="<?php echo 'entrydataduediligence' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btna" role="button" style="text-transform:none; width:150px;">Kembali</a>
                                            </td>   
                                        <tr>
                                    </table>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <form action="{{action('EntryController@saveentrykoordinattambang')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="koordinatid" id="koordinatid">
                            <input type="hidden" name="koordinatidhsl" id="koordinatidhsl">
                            <input type="hidden" name="alamatkoordinat" id="alamatkoordinat">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th>Koordinat Tambang</th>
                                        <th>Fakta Hasil Due</th>
                                    </tr>
                                    <tr>
                                        <td>FID</td>
                                        <td>
                                            <input type='text' name="fid" id="fid"  style="border:none;"  readonly="true"></input>
                                        </td>
                                        <td>
                                            <input type='text' name="FIDHsl" id="FIDHsl" class='form-control' onkeypress="return isDecimal(event)"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Point</td>
                                        <td>  
                                            <input type='text' name="point" id="point" style="border:none;"  readonly="true"></input>
                                        </td>
                                        <td>
                                            <input type="text" name="PointHsl" id="PointHsl" class='form-control' onkeypress="return isDecimal(event)"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>X</td>
                                        <td>
                                            <input type='text' name="x" id="x" 
                                                    style="border:none;" readonly="true"></input>
                                        </td>
                                        <td>
                                            <input type="text" name="XHsl" id="XHsl" class='form-control' onkeypress="return isDecimal(event)"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Y</td>
                                        <td>   
                                                <input type='text' name="y" id="y" 
                                                    style="border:none;" readonly="true"></input>
                                        </td>
                                        <td>
                                            <input type="text" name="YHsl" id="YHsl" class='form-control' onkeypress="return isDecimal(event)"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Direction</td>
                                        <td>   
                                                <input type='text' name="direction" id="direction" 
                                                    style="border:none;" readonly="true"></input>
                                        </td>
                                        <td>
                                            <input type="text" name="DirectionHsl" id="DirectionHsl" class='form-control' onkeypress="return isDecimal(event)"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Length</td>
                                        <td>
                                                <input type='text' name="length" id="length" 
                                                    style="border:none;" readonly="true"></input>
                                        </td>
                                        <td>
                                            <input type="text" name="LengthHsl" id="LengthHsl" class='form-control' onkeypress="return isDecimal(event)"/>
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

</div>    
@stop()