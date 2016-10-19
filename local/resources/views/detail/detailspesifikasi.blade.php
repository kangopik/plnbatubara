@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data2->Nama.", ".$data2->BadanUsaha; ?></h2>
                            <form action="{{action('DetailController@savedetailspesifikasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="success">
                                        <th colspan="2" style="text-align:center; border-bottom:none;">Parameter</th>
                                        <th style="text-align:center; border-bottom:none;">Unit</th>
                                        <th style="text-align:center;" colspan="8">Result</th>
                                        <th style="text-align:center; border-bottom:none;" colspan="2">Method</th>
                                    </tr>
                                    <tr class="success">
                                        <th colspan="2" style="text-align:center; border-top:none;"></th>
                                        <th style="text-align:center; border-top:none;"></th>
                                        <th style="text-align:center;" width="50" colspan="2">AR</th>
                                        <th style="text-align:center;" width="50" colspan="2">ADB</th>
                                        <th style="text-align:center;" width="50" colspan="2">DB</th>
                                        <th style="text-align:center;" width="50" colspan="2">DAFB</th>
                                        <th style="text-align:center; border-top:none;" colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total Moisture</td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->TotalMoistureAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalMoistureARCk" value="1" 
                                                <?php if($data->TotalMoistureARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalMoistureADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalMoistureADBCk" value="1" 
                                                <?php if($data->TotalMoistureADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalMoistureDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalMoistureDBCk" value="1" 
                                                <?php if($data->TotalMoistureDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalMoistureDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalMoistureDAFBCk" value="1" 
                                                <?php if($data->TotalMoistureDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalMoistureMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalMoistureMethodCk" value="1" 
                                                <?php if($data->TotalMoistureMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100" style="border-bottom:none; border-top:none;"></td>
                                        <td width="260">Moisture In The Analysis Sample</td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->ProximateMoistureAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="ProximateMoistureARCk" value="1" 
                                                <?php if($data->ProximateMoistureARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->ProximateMoistureADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="ProximateMoistureADBCk" value="1" 
                                                <?php if($data->ProximateMoistureADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->ProximateMoistureDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="ProximateMoistureDBCk" value="1" 
                                                <?php if($data->ProximateMoistureDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->ProximateMoistureDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="ProximateMoistureDAFBCk" value="1" 
                                                <?php if($data->ProximateMoistureDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->ProximateMoistureMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="ProximateMoistureMethodCk" value="1" 
                                                <?php if($data->ProximateMoistureMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none; border-top:none;">Proximate</td>
                                        <td>Ash Content</td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->AshContentAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="AshContentARCk" value="1" 
                                                <?php if($data->AshContentARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->AshContentADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="AshContentADBCk" value="1" 
                                                <?php if($data->AshContentADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->AshContentDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="AshContentDBCk" value="1" 
                                                <?php if($data->AshContentDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->AshContentDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="AshContentDAFBCk" value="1" 
                                                <?php if($data->AshContentDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->AshContentMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="AshContentMethodCk" value="1" 
                                                <?php if($data->AshContentMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none; border-top:none;"></td>
                                        <td>Volatille Matter</td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->VolatileAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="VolatileARCk" value="1" 
                                                <?php if($data->VolatileARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->VolatileADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="VolatileADBCk" value="1" 
                                                <?php if($data->VolatileADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->VolatileDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="VolatileDBCk" value="1" 
                                                <?php if($data->VolatileDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->VolatileDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="VolatileDAFBCk" value="1" 
                                                <?php if($data->VolatileDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->VolatileMethod}}<td width="30" style="text-align:left;">
                                            <input type="checkbox" name="VolatileMethodCk" value="1" 
                                                <?php if($data->VolatileMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none; border-top:none;"></td>
                                        <td>Fixed Carbon</td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->FixedCarbonAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FixedCarbonARCk" value="1" 
                                                <?php if($data->FixedCarbonARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FixedCarbonADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FixedCarbonADBCk" value="1" 
                                                <?php if($data->FixedCarbonADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FixedCarbonDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FixedCarbonDBCk" value="1" 
                                                <?php if($data->FixedCarbonDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FixedCarbonDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FixedCarbonDAFBCk" value="1" 
                                                <?php if($data->FixedCarbonDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FixedCarbonMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FixedCarbonMethodCk" value="1" 
                                                <?php if($data->FixedCarbonMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total Sulphur</td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->TotalSulphurAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalSulphurARCk" value="1" 
                                                <?php if($data->TotalSulphurARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalSulphurADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalSulphurADBCk" value="1" 
                                                <?php if($data->TotalSulphurADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalSulphurDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalSulphurDBCk" value="1" 
                                                <?php if($data->TotalSulphurDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalSulphurDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalSulphurDAFBCk" value="1" 
                                                <?php if($data->TotalSulphurDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->TotalSulphurMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TotalSulphurMethodCk" value="1" 
                                                <?php if($data->TotalSulphurMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Gross Carolific Value</td>
                                        <td width="80" style="text-align:center;">Kcal/Kg</td>
                                        <td>{{$data->GrossCarolicValveAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="GrossCarolicValveARCk" value="1" 
                                                <?php if($data->GrossCarolicValveARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->GrossCarolicValveADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="GrossCarolicValveADBCk" value="1" 
                                                <?php if($data->GrossCarolicValveADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->GrossCarolicValveDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="GrossCarolicValveDBCk" value="1" 
                                                <?php if($data->GrossCarolicValveDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->GrossCarolicValveDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="GrossCarolicValveDAFBCk" value="1" 
                                                <?php if($data->GrossCarolicValveDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->GrossCarolicValveMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="GrossCarolicValveMethodCk" value="1" 
                                                <?php if($data->GrossCarolicValveMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Hardgrove Grindability Index</td>
                                        <td width="80" style="text-align:center;">Index Point</td>
                                        <td colspan="5">{{$data->HGI}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HGICk" value="1" 
                                                <?php if($data->HGICk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td colspan="3">{{$data->HGIMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HGIMethodCk" value="1" 
                                                <?php if($data->HGIMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border-bottom:none; border-top:none;">Size Test</td>
                                        <td width="80" style="text-align:center;">Size Fraction</td>
                                        <td>{{$data->SizeTestFractionAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestFractionARCk" value="1" 
                                                <?php if($data->SizeTestFractionARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestFractionADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestFractionADBCk" value="1" 
                                                <?php if($data->SizeTestFractionADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestFractionDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestFractionDBCk" value="1" 
                                                <?php if($data->SizeTestFractionDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestFractionDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestFractionDAFBCk" value="1" 
                                                <?php if($data->SizeTestFractionDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestFractionMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestFractionMethodCk" value="1" 
                                                <?php if($data->SizeTestFractionMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border-top:none;"></td>
                                        <td width="80" style="text-align:center;">%</td>
                                        <td>{{$data->SizeTestPersenAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestPersenARCk" value="1" 
                                                <?php if($data->SizeTestPersenARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestPersenADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestPersenADBCk" value="1" 
                                                <?php if($data->SizeTestPersenADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestPersenDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestPersenDBCk" value="1" 
                                                <?php if($data->SizeTestPersenDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestPersenDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestPersenDAFBCk" value="1" 
                                                <?php if($data->SizeTestPersenDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SizeTestPersenMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SizeTestPersenMethodCk" value="1" 
                                                <?php if($data->SizeTestPersenMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none; border-top:none;"></td>
                                        <td>Initial Deformation Temp.</td>
                                        <td width="80" style="text-align:center;">C</td>
                                        <td>{{$data->InitialAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="InitialARCk" value="1" 
                                                <?php if($data->InitialARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->InitialADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="InitialADBCk" value="1" 
                                                <?php if($data->InitialADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->InitialDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="InitialDBCk" value="1" 
                                                <?php if($data->InitialDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->InitialDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="InitialDAFBCk" value="1" 
                                                <?php if($data->InitialDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->InitialMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="InitialMethodCk" value="1" 
                                                <?php if($data->InitialMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center; border-bottom:none; border-top:none;">Ash Fusion</td>
                                        <td>Spherical Temp.</td>
                                        <td width="80" style="text-align:center;">C</td>
                                        <td>{{$data->SphericalAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SphericalARCk" value="1" 
                                                <?php if($data->SphericalARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SphericalADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SphericalADBCk" value="1" 
                                                <?php if($data->SphericalADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SphericalDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SphericalDBCk" value="1" 
                                                <?php if($data->SphericalDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SphericalDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SphericalDAFBCk" value="1" 
                                                <?php if($data->SphericalDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->SphericalMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SphericalMethodCk" value="1" 
                                                <?php if($data->SphericalMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none; border-top:none;">Temperature</td>
                                        <td>Hemispherical Temp.</td>
                                        <td width="80" style="text-align:center;">C</td>
                                        <td>{{$data->HemisphericalAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HemisphericalARCk" value="1" 
                                                <?php if($data->HemisphericalARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->HemisphericalADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HemisphericalADBCk" value="1" 
                                                <?php if($data->HemisphericalADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->HemisphericalDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HemisphericalDBCk" value="1" 
                                                <?php if($data->HemisphericalDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->HemisphericalDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HemisphericalDAFBCk" value="1" 
                                                <?php if($data->HemisphericalDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->HemisphericalMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="HemisphericalMethodCk" value="1" 
                                                <?php if($data->HemisphericalMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;"></td>
                                        <td>Fluidized Temp./Fluid</td>
                                        <td width="80" style="text-align:center;">C</td>
                                        <td>{{$data->FluidizedAR}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FluidizedARCk" value="1" 
                                                <?php if($data->FluidizedARCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FluidizedADB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FluidizedADBCk" value="1" 
                                                <?php if($data->FluidizedADBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FluidizedDB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FluidizedDBCk" value="1" 
                                                <?php if($data->FluidizedDBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FluidizedDAFB}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FluidizedDAFBCk" value="1" 
                                                <?php if($data->FluidizedDAFBCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>{{$data->FluidizedMethod}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FluidizedMethodCk" value="1" 
                                                <?php if($data->FluidizedMethodCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Surveyor</td>
                                        <td colspan="10">{{$data->Surveyor}}</td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="SurveyorCk" value="1" 
                                                <?php if($data->SurveyorCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                </tbody>
                                <table>
                                    <tr>
                                        <td width=600>
                                            <button style="width:35%; margin-left:60%; margin-right:40%;" type="submit" 
                                                class="btn btn-submit  btn-primary">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                                        </td>  
                                    <tr>                                        
                                </table>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </form>
                        </div>
                    <div>
        		</div>
        	</div>
        <div>
    </div>
</div>
<script>
    $("form").submit(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
</script>
@stop()