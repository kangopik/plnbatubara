@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#TotalMoisture').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#TotalSulphur').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#GrossCaloricValue').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#HGI').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#UkuranButiran').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#HargaBatubara').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#BiayaAngkutan').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#HargaStockpile').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Hasil Negosiasi</h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                <form action="{{action('EntryController@saveentrynegosiasi')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="border-top:none;" width=30>1</td>
                                                <td style="border-top:none;" width=200>Nama Perusahaan</td>
                                                <td colspan="2">{{$data2->Nama}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">2</td>
                                                <td style="border-top:none;">Alamat</td>
                                                <td colspan="2">{{$data2->Alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;" colspan="4" align=center>
                                                    Hasil Klarifikasi dan negosiasi
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td style="border-top:none;" colspan="3">Penawaran Harga Batubara</td>
                                                <td style="border-top:none;" colspan="">Hasil Negosiasi</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;" width=10>3</td>
                                                <td style="border-top:none;" colspan="3">Spesifikasi Batubara</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;" width=320>1) Total moisture</td>
                                                <td style="border-top:none;" width=300>{{$data->TotalMoisture}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                        <div data-tip="masukan total moisture">
                                                    <input type='text' class='form-control' name="TotalMoisture" id="TotalMoisture" 
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">2) Total Sulphur</td>
                                                <td style="border-top:none;">{{$data->TotalSulphur}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                    <div data-tip="masukan total sulphur">
                                                    <input type='text' class='form-control' name="TotalSulphur" id="TotalSulphur" 
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">3) Gross calorivic value</td>
                                                <td style="border-top:none;">{{$data->GrossCaloricValue}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                    <div data-tip="masukan gross calorivic value">
                                                    <input type='text' class='form-control' name="GrossCaloricValue" id="GrossCaloricValue" 
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">4) Hardgrove Grindability Index (GHI)</td>
                                                <td style="border-top:none;">{{$data->HGI}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                    <div data-tip="masukan hardgrove grindability index">
                                                    <input type='text' class='form-control' name="HGI" id="HGI" 
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">5) Ukuran Butiran</td>
                                                <td style="border-top:none;">{{$data->UkuranButiran}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                    <div data-tip="masukan ukuran butiran">
                                                    <input type='text' class='form-control' name="UkuranButiran" id="UkuranButiran"
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">4</td>
                                                <td style="border-top:none;">Harga batubara di stockpile loading @ MT</td>
                                                <td style="border-top:none;">{{$data->HargaBatubara}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                        <div data-tip="masukan harga batubara di stockpile loading">
                                                    <input type='text' class='form-control' name="HargaBatubara" id="HargaBatubara"
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">5</td>
                                                <td style="border-top:none;">Biaya angkutan @MT</td>
                                                <td style="border-top:none;">{{$data->BiayaAngkutan}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                        <div data-tip="masukan biaya angkutan">
                                                    <input type='text' class='form-control' name="BiayaAngkutan" id="BiayaAngkutan" 
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">6</td>
                                                <td style="border-top:none;">Harga Batubara di stockpile PLTU</td>
                                                <td style="border-top:none;">{{$data->HargaStockpile}}</td>
                                                <td>
                                                    <div class="col-sm-8">
                                                        <div data-tip="masukan harga batubara di stockpile pltu">
                                                    <input type='text' class='form-control' name="HargaStockpile" id="HargaStockpile"
                                                        onkeypress="return isDecimal(event)" required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table>
                                        <tr>
                                            <td width=600>
                                                <input style="width:25%; margin-left:40%; margin-right:40%;" 
                                                    type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                                            <td>
                                            <td>
                                                <a href="<?php echo 'evaluasipenawaran' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btna" role="button" style="text-transform:none; width:150px;">Kembali</a>
                                            </td>
                                        </tr>
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