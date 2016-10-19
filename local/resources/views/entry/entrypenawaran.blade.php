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
        <h2 class="page-header">Penawaran Harga Batubara</h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                <form action="{{action('EntryController@saveentrypenawaran')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="border-top:none;" width=30>1</td>
                                                <td style="border-top:none;" width=320>Nama Perusahaan</td>
                                                <td><?php if($data2->BadanUsaha == '1') { $BU = "PT"; }
                                                      else if($data2->BadanUsaha == '2') { $BU = "CV"; } 
                                                      else if($data2->BadanUsaha == '3') { $BU = "Koperasi"; }
                                                      else if($data2->BadanUsaha == '4') { $BU = "Lainnya";} 
                                                      else { $BU = '';}
                                                        echo $data2->Nama.','.$BU; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">2</td>
                                                <td style="border-top:none;">Alamat</td>
                                                <td>{{$data2->Alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;" colspan="3" align=center>
                                                    Menyampaikan penawaran harga batubara sbb.:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;" width=10>3</td>
                                                <td style="border-top:none;" colspan="2">Spesifikasi Batubara</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">1) Total moisture</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan total moisture">
                                                    <input type='text' class='form-control' name="TotalMoisture" id="TotalMoisture"
                                                        value="{{$data->TotalMoisture}}" onkeypress="return isDecimal(event)"
                                                         required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">2) Total Sulphur</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan total sulphur">
                                                    <input type='text' class='form-control' name="TotalSulphur" id="TotalSulphur" 
                                                        value="{{$data->TotalSulphur}}" onkeypress="return isDecimal(event)"
                                                        required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">3) Gross calorivic value</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan gross calorivic value">
                                                    <input type='text' class='form-control' name="GrossCaloricValue" id="GrossCaloricValue" 
                                                        value="{{$data->GrossCaloricValue}}" onkeypress="return isDecimal(event)"
                                                        required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">4) Hardgrove Grindability Index (GHI)</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan hardgrove grindability index">
                                                    <input type='text' class='form-control' name="HGI" id="HGI"
                                                        value="{{$data->HGI}}" onkeypress="return isDecimal(event)"
                                                        required=required>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td style="border-top:none;">5) Ukuran Butiran</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan ukuran butiran">
                                                    <input type='text' class='form-control' name="UkuranButiran" id="UkuranButiran" 
                                                        value="{{$data->UkuranButiran}}" onkeypress="return isDecimal(event)">
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">4</td>
                                                <td style="border-top:none;">Harga batubara di stockpile loading @ MT</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan harga batubara di stockpile loading">
                                                    <input type='text' class='form-control' name="HargaBatubara" id="HargaBatubara" 
                                                        value="{{$data->HargaBatubara}}" onkeypress="return isDecimal(event)">
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">5</td>
                                                <td style="border-top:none;">Biaya angkutan @MT</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan biaya angkutan">
                                                    <input type='text' class='form-control' name="BiayaAngkutan" id="BiayaAngkutan"
                                                        value="{{$data->BiayaAngkutan}}" onkeypress="return isDecimal(event)">
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;">6</td>
                                                <td style="border-top:none;">Harga Batubara di stockpile PLTU</td>
                                                <td>
                                                    <div class="col-sm-5">
                                                    <div data-tip="masukan harga batubara di stockpile pltu">
                                                    <input type='text' class='form-control' name="HargaStockpile" id="HargaStockpile"
                                                        value="{{$data->HargaStockpile}}" onkeypress="return isDecimal(event)">
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
                                            </td>
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