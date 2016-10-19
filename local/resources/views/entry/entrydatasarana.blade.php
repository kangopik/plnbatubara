@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#kapasitasmaksimumkapal').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#kapasitasloading').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#kapasitasangkut').priceFormat({
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
                        <li class="">
                        	<a href="<?php echo 'EntryDataTambang' ?>">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'EntryKualitasBatubara' ?>">Kualitas Batu Bara</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Data Sarana Pengangkut batubara ke PLTU</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                <form action="{{action('EntryController@saveentrydatasarana')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr class="success">
                                                <th colspan="2">Dermaga</th>
                                                <th style="text-align:center;">Fakta Hasil Due</th>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;" width="210">Jenis peralatan loading yang tersedia</td>
                                                <td style="border-top:none;" width="400">
                                                    <div>{{$data->JenisPeralatan}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan jenis peralatan loading">
                                                    <input type='text' class='form-control' name="jenisperalatan"
                                                        value="{{$data2->JenisPeralatan}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas maksimum  kapal / tongkang yang dapat sandar</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasMaksimumKapal}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas maksimum kapal">
                                                    <input type='text' class='form-control' name="kapasitasmaksimumkapal" id="kapasitasmaksimumkapal"
                                                        value="{{$data2->KapasitasMaksimumKapal}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas loading per hari</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasLoading}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas loading per hari">
                                                    <input type='text' class='form-control' name="kapasitasloading" id="kapasitasloading"
                                                        value="{{$data2->KapasitasLoading}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td style="border-top:none;" colspan="3"><b>Vesel / Tongkang</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Tahun pembuatan</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->TahunPembuatan}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan tahun pembuatan vesel/tongkang">
                                                    <input type='text' class='form-control' name="tahunpembuatan"
                                                        value="{{$data2->TahunPembuatan}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kapasitas angkut</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->KapasitasAngkut}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kapasitas angkut vesel/tongkang">
                                                    <input type='text' class='form-control' name="kapasitasangkut" id="kapasitasangkut"
                                                        value="{{$data2->KapasitasAngkut}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">Kondisi</td>
                                                <td style="border-top:none;">
                                                    <div>{{$data->Kondisi}}</div>
                                                </td>
                                                <td>
                                                    <div data-tip="masukan kondisi vesel/tongkang">
                                                    <input type='text' class='form-control' name="kondisi"
                                                        value="{{$data2->Kondisi}}">
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
</div>    
@stop()