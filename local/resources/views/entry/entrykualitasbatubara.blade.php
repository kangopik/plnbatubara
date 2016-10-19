@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#tm').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#im').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#ac').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#vol').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#fc').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#ts').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#gcv').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#car').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#hyd').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#sul').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#nit').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#oxy').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#hgi').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#butir1').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#butir2').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#sil').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#al').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#fo').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#so').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#mag').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#po').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#st').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#td').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#pp').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#sf').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#ff').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#id').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#sof').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.'
    })

    $('#flu').priceFormat({
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
                        	<a href="<?php echo 'EntryDataTambang' ?>">Data Teknis</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Spesifikasi Teknis</a>
                        </li>
                        <!--<li class="">
                            <a href="</?php echo 'EntryDataSarana' ?>">Data Sarana Pengangkut batubara ke PLTU</a>
                        </li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                <!--<form action="{{action('EntryController@saveentrykualitastambang')}}" method="post">
                                    <input type="hidden" name="_token" value="</?= csrf_token(); ?>">-->
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr class="success">
                                                <th colspan="2" style="text-align:center; border-bottom:none;">Parameter</th>
                                                <th style="text-align:center; border-bottom:none;">Unit</th>
                                                <th style="text-align:center;" colspan="4">Result</th>
                                                <th style="text-align:center; border-bottom:none;">Method</th>
                                            </tr>
                                            <tr class="success">
                                                <th colspan="2" style="text-align:center; border-top:none;"></th>
                                                <th style="text-align:center; border-top:none;"></th>
                                                <th style="text-align:center;" width="110">AR</th>
                                                <th style="text-align:center;" width="110">ADB</th>
                                                <th style="text-align:center;" width="110">DB</th>
                                                <th style="text-align:center;" width="110">DAFB</th>
                                                <th style="text-align:center; border-top:none;"></th>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total Moisture</td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->TotalMoistureAR}}</td>
                                                <td>{{$data->TotalMoistureADB}}</td>
                                                <td>{{$data->TotalMoistureDB}}</td>
                                                <td>{{$data->TotalMoistureDAFB}}</td>
                                                <td>{{$data->TotalMoistureMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td width="100" style="border-bottom:none; border-top:none;"></td>
                                                <td width="260">Moisture In The Analysis Sample</td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->ProximateMoistureAR}}</td>
                                                <td>{{$data->ProximateMoistureADB}}</td>
                                                <td>{{$data->ProximateMoistureDB}}</td>
                                                <td>{{$data->ProximateMoistureDAFB}}</td>
                                                <td>{{$data->ProximateMoistureMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none; border-top:none;">Proximate</td>
                                                <td>Ash Content</td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->AshContentAR}}</td>
                                                <td>{{$data->AshContentADB}}</td>
                                                <td>{{$data->AshContentDB}}</td>
                                                <td>{{$data->AshContentDAFB}}</td>
                                                <td>{{$data->AshContentMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none; border-top:none;"></td>
                                                <td>Volatille Matter</td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->VolatileAR}}</td>
                                                <td>{{$data->VolatileADB}}</td>
                                                <td>{{$data->VolatileDB}}</td>
                                                <td>{{$data->VolatileDAFB}}</td>
                                                <td>{{$data->VolatileMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none; border-top:none;"></td>
                                                <td>Fixed Carbon</td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->FixedCarbonAR}}</td>
                                                <td>{{$data->FixedCarbonADB}}</td>
                                                <td>{{$data->FixedCarbonDB}}</td>
                                                <td>{{$data->FixedCarbonDAFB}}</td>
                                                <td>{{$data->FixedCarbonMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total Sulphur</td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->TotalSulphurAR}}</td>
                                                <td>{{$data->TotalSulphurADB}}</td>
                                                <td>{{$data->TotalSulphurDB}}</td>
                                                <td>{{$data->TotalSulphurDAFB}}</td>
                                                <td>{{$data->TotalSulphurMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Gross Carolific Value</td>
                                                <td width="80" style="text-align:center;">Kcal/Kg</td>
                                                <td>{{$data->GrossCarolicValveAR}}</td>
                                                <td>{{$data->GrossCarolicValveADB}}</td>
                                                <td>{{$data->GrossCarolicValveDB}}</td>
                                                <td>{{$data->GrossCarolicValveDAFB}}</td>
                                                <td>{{$data->GrossCarolicValveMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Hardgrove Grindability Index</td>
                                                <td width="80" style="text-align:center;">Index Point</td>
                                                <td colspan="4">{{$data->HGI}}</td>
                                                <td>{{$data->HGIMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border-bottom:none; border-top:none;">Size Test</td>
                                                <td width="80" style="text-align:center;">Size Fraction</td>
                                                <td>{{$data->SizeTestFractionAR}}</td>
                                                <td>{{$data->SizeTestFractionADB}}</td>
                                                <td>{{$data->SizeTestFractionDB}}</td>
                                                <td>{{$data->SizeTestFractionDAFB}}</td>
                                                <td>{{$data->SizeTestFractionMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border-top:none;"></td>
                                                <td width="80" style="text-align:center;">%</td>
                                                <td>{{$data->SizeTestPersenAR}}</td>
                                                <td>{{$data->SizeTestPersenADB}}</td>
                                                <td>{{$data->SizeTestPersenDB}}</td>
                                                <td>{{$data->SizeTestPersenDAFB}}</td>
                                                <td>{{$data->SizeTestPersenMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none; border-top:none;"></td>
                                                <td>Initial Deformation Temp.</td>
                                                <td width="80" style="text-align:center;">C</td>
                                                <td>{{$data->InitialAR}}</td>
                                                <td>{{$data->InitialADB}}</td>
                                                <td>{{$data->InitialDB}}</td>
                                                <td>{{$data->InitialDAFB}}</td>
                                                <td>{{$data->InitialMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; border-bottom:none; border-top:none;">Ash Fusion</td>
                                                <td>Spherical Temp.</td>
                                                <td width="80" style="text-align:center;">C</td>
                                                <td>{{$data->SphericalAR}}</td>
                                                <td>{{$data->SphericalADB}}</td>
                                                <td>{{$data->SphericalDB}}</td>
                                                <td>{{$data->SphericalDAFB}}</td>
                                                <td>{{$data->SphericalMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none; border-top:none;">Temperature</td>
                                                <td>Hemispherical Temp.</td>
                                                <td width="80" style="text-align:center;">C</td>
                                                <td>{{$data->HemisphericalAR}}</td>
                                                <td>{{$data->HemisphericalADB}}</td>
                                                <td>{{$data->HemisphericalDB}}</td>
                                                <td>{{$data->HemisphericalDAFB}}</td>
                                                <td>{{$data->HemisphericalMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:none;"></td>
                                                <td>Fluidized Temp./Fluid</td>
                                                <td width="80" style="text-align:center;">C</td>
                                                <td>{{$data->FluidizedAR}}</td>
                                                <td>{{$data->FluidizedADB}}</td>
                                                <td>{{$data->FluidizedDB}}</td>
                                                <td>{{$data->FluidizedDAFB}}</td>
                                                <td>{{$data->FluidizedMethod}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Surveyor</td>
                                                <td colspan="6">{{$data->Surveyor}}</td>
                                            </tr>
                                        <tr>
                                            <td align=center colspan="8">
                                                <a href="<?php echo 'entrydataduediligence' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btna" role="button" style="text-transform:none; width:150px;">Kembali</a>
                                            </td>   
                                        <tr>
                                        </tbody>
                                    </table>
                                    <!--<table>
                                        <tr>
                                            <td width=600>
                                        <input style="width:25%; margin-left:40%; margin-right:40%;" type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                                            </td>
                                            <td>
                                                <a href="</?php echo 'entrydataduediligence' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btna" role="button" style="text-transform:none; width:150px;">Kembali</a>
                                            </td>   
                                        <tr>
                                    </table>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@stop()