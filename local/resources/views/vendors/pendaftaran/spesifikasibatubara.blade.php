@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#tm').mask("#.##0,00", {reverse: false});
	$('#im').mask("#.##0,00", {reverse: false});
	$('#ac').mask("#.##0,00", {reverse: false});
	$('#vol').mask("#.##0,00", {reverse: false});
	$('#fc').mask("#.##0,00", {reverse: false});
	$('#ts').mask("#.##0,00", {reverse: false});
	$('#gcv').mask("#.##0,00", {reverse: false});
	$('#ca').mask("#.##0,00", {reverse: false});
	$('#hyd').mask("#.##0,00", {reverse: false});
	$('#sul').mask("#.##0,00", {reverse: false});
	$('#nit').mask("#.##0,00", {reverse: false});
	$('#oxy').mask("#.##0,00", {reverse: false});
	$('#hgi').mask("#.##0,00", {reverse: false});
	$('#butir1').mask("#.##0,00", {reverse: false});
	$('#butir2').mask("#.##0,00", {reverse: false});
	$('#sil').mask("#.##0,00", {reverse: false});
	$('#alum').mask("#.##0,00", {reverse: false});
	$('#fo').mask("#.##0,00", {reverse: false});
	$('#so').mask("#.##0,00", {reverse: false});
	$('#mag').mask("#.##0,00", {reverse: false});
	$('#po').mask("#.##0,00", {reverse: false});
	$('#st').mask("#.##0,00", {reverse: false});
	$('#td').mask("#.##0,00", {reverse: false});
	$('#pp').mask("#.##0,00", {reverse: false});
	$('#sf').mask("#.##0,00", {reverse: false});
	$('#ff').mask("#.##0,00", {reverse: false});
	$('#id').mask("#.##0,00", {reverse: false});
	$('#soft').mask("#.##0,00", {reverse: false});
	$('#flu').mask("#.##0,00", {reverse: false});
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Spesifikasi Teknis Tambang Calon Penyedia Batubara <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?></h2>

        <form action="{{action('VendorController@savespesifikasibatubara')}}" method="post">
        	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
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
						<td>
							<div data-tip="masukan total moisture AR">
								<input type='text' class='form-control' name="tmar" id="tmar" value="{{$data->TotalMoistureAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalMoistureARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalMoistureARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total moisture ADB">
								<input type='text' class='form-control' name="tmadb" id="tmadb" value="{{$data->TotalMoistureADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalMoistureADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalMoistureADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total moisture DB">
								<input type='text' class='form-control' name="tmdb" id="tmdb" value="{{$data->TotalMoistureDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalMoistureDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalMoistureDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total moisture DAFB">
								<input type='text' class='form-control' name="tmdafb" id="tmdafb" value="{{$data->TotalMoistureDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalMoistureDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalMoistureDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total moisture method">
								<input type='text' class='form-control' name="tmmethod" id="tmmethod" value="{{$data->TotalMoistureMethod}}" 
									<?php if(($data->TotalMoistureMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalMoistureMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td width="100" style="border-bottom:none; border-top:none;"></td>
						<td width="260">Moisture In The Analysis Sample</td>
						<td width="80" style="text-align:center;">%</td>
						<td>
							<div data-tip="masukan moisture analysis sample AR">
								<input type='text' class='form-control' name="pmar" id="pmar" value="{{$data->ProximateMoistureAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->ProximateMoistureARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->ProximateMoistureARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan moisture analysis sample ADB">
								<input type='text' class='form-control' name="pmadb" id="pmadb" value="{{$data->ProximateMoistureADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->ProximateMoistureADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->ProximateMoistureADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan moisture analysis sample DB">
								<input type='text' class='form-control' name="pmdb" id="pmdb" value="{{$data->ProximateMoistureDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->ProximateMoistureDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->ProximateMoistureDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan moisture analysis sample DAFB">
								<input type='text' class='form-control' name="pmdafb" id="pmdafb" value="{{$data->ProximateMoistureDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->ProximateMoistureDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->ProximateMoistureDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan moisture analysis sample method">
								<input type='text' class='form-control' name="pmmethod" id="pmmethod" value="{{$data->ProximateMoistureMethod}}" 
									<?php if(($data->ProximateMoistureMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->ProximateMoistureMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border-bottom:none; border-top:none;">Proximate</td>
						<td>Ash Content</td>
						<td width="80" style="text-align:center;">%</td>
						<td>
							<div data-tip="masukan ash content AR">
								<input type='text' class='form-control' name="acar" id="acar" value="{{$data->AshContentAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->AshContentARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->AshContentARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan ash content ADB">
								<input type='text' class='form-control' name="acadb" id="acadb" value="{{$data->AshContentADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->AshContentADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->AshContentADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan ash content DB">
								<input type='text' class='form-control' name="acdb" id="acdb" value="{{$data->AshContentDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->AshContentDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->AshContentDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan ash content DAFB">
								<input type='text' class='form-control' name="acdafb" id="acdafb" value="{{$data->AshContentDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->AshContentDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->AshContentDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan ash content method">
								<input type='text' class='form-control' name="acmethod" id="acmethod" value="{{$data->AshContentMethod}}" 
									<?php if(($data->AshContentMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->AshContentMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border-bottom:none; border-top:none;"></td>
						<td>Volatille Matter</td>
						<td width="80" style="text-align:center;">%</td>
						<td>
							<div data-tip="masukan volatille matter AR">
								<input type='text' class='form-control' name="vmar" id="vmar" value="{{$data->VolatileAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->VolatileARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->VolatileARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan volatille matter ADB">
								<input type='text' class='form-control' name="vmadb" id="vmadb" value="{{$data->VolatileADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->VolatileADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->VolatileADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan volatille matter DB">
								<input type='text' class='form-control' name="vmdb" id="vmdb" value="{{$data->VolatileDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->VolatileDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->VolatileDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan volatille matter DAFB">
								<input type='text' class='form-control' name="vmdafb" id="vmdafb" value="{{$data->VolatileDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->VolatileDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->VolatileDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan volatille matter method">
								<input type='text' class='form-control' name="vmmethod" id="vmmethod" value="{{$data->VolatileMethod}}" 
									<?php if(($data->VolatileMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->VolatileMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border-bottom:none; border-top:none;"></td>
						<td>Fixed Carbon</td>
						<td width="80" style="text-align:center;">%</td>
						<td>
							<div data-tip="masukan fixed carbon AR">
								<input type='text' class='form-control' name="fcar" id="fcar" value="{{$data->FixedCarbonAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->FixedCarbonARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FixedCarbonARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fixed carbon ADB">
								<input type='text' class='form-control' name="fcadb" id="fcadb" value="{{$data->FixedCarbonADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->FixedCarbonADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FixedCarbonADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fixed carbon DB">
								<input type='text' class='form-control' name="fcdb" id="fcdb" value="{{$data->FixedCarbonDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->FixedCarbonDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FixedCarbonDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fixed carbon DAFB">
								<input type='text' class='form-control' name="fcdafb" id="fcdafb" value="{{$data->FixedCarbonDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->FixedCarbonDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FixedCarbonDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fixed carbon method">
								<input type='text' class='form-control' name="fcmethod" id="fcar" value="{{$data->FixedCarbonMethod}}" 
									<?php if(($data->FixedCarbonMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FixedCarbonMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">Total Sulphur</td>
						<td width="80" style="text-align:center;">%</td>
						<td>
							<div data-tip="masukan total sulphur AR">
								<input type='text' class='form-control' name="tsar" id="tsar" value="{{$data->TotalSulphurAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalSulphurARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalSulphurARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total sulphur ADB">
								<input type='text' class='form-control' name="tsadb" id="tsadb" value="{{$data->TotalSulphurADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalSulphurADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalSulphurADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total sulphur DB">
								<input type='text' class='form-control' name="tsdb" id="tsdb" value="{{$data->TotalSulphurDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalSulphurDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalSulphurDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total sulphur DAFB">
								<input type='text' class='form-control' name="tsdafb" id="tsdafb" value="{{$data->TotalSulphurDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->TotalSulphurDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalSulphurDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan total sulphur method">
								<input type='text' class='form-control' name="tsmethod" id="tsmethod" value="{{$data->TotalSulphurMethod}}" 
									<?php if(($data->TotalSulphurMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->TotalSulphurMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">Gross Carolific Value</td>
						<td width="80" style="text-align:center;">Kcal/Kg</td>
						<td>
							<div data-tip="masukan gross carolific calue AR">
								<input type='text' class='form-control' name="gcvar" id="gcvar" value="{{$data->GrossCarolicValveAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->GrossCarolicValveARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->GrossCarolicValveARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan gross carolific calue ADB">
								<input type='text' class='form-control' name="gcvadb" id="gcvadb" value="{{$data->GrossCarolicValveADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->GrossCarolicValveADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->GrossCarolicValveADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan gross carolific calue DB">
								<input type='text' class='form-control' name="gcvdb" id="gcvdb" value="{{$data->GrossCarolicValveDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->GrossCarolicValveDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->GrossCarolicValveDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan gross carolific calue DAFB">
								<input type='text' class='form-control' name="gcvdafb" id="gcvdafb" value="{{$data->GrossCarolicValveDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->GrossCarolicValveDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->GrossCarolicValveDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan gross carolific calue method">
								<input type='text' class='form-control' name="gcvmethod" id="gcvmethod" value="{{$data->GrossCarolicValveMethod}}" 
									<?php if(($data->GrossCarolicValveMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->GrossCarolicValveMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">Hardgrove Grindability Index</td>
						<td width="80" style="text-align:center;">Index Point</td>
						<td colspan="4">
							<div data-tip="masukan hardgrove grindability index">
								<input type='text' class='form-control' name="hgi" id="hgi" value="{{$data->HGI}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->HGICk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HGICk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan hardgrove grindability index method">
								<input type='text' class='form-control' name="hgimethod" id="hgimethod" value="{{$data->HGIMethod}}" 
									<?php if(($data->HGIMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HGIMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="border-bottom:none; border-top:none;">Size Test</td>
						<td width="80" style="text-align:center;">Size Fraction</td>
						<td>
							<div data-tip="masukan size fraction AR">
								<input type='text' class='form-control' name="stfar" id="stfar" value="{{$data->SizeTestFractionAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestFractionARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestFractionARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction ADB">
								<input type='text' class='form-control' name="stfadb" id="stfadb" value="{{$data->SizeTestFractionADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestFractionADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestFractionADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction DB">
								<input type='text' class='form-control' name="stfdb" id="stfdb" value="{{$data->SizeTestFractionDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestFractionDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestFractionDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction DAFB">
								<input type='text' class='form-control' name="stfdafb" id="stfdafb" value="{{$data->SizeTestFractionDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestFractionDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestFractionDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction method">
								<input type='text' class='form-control' name="stfmethod" id="stfmethod" value="{{$data->SizeTestFractionMethod}}" 
									<?php if(($data->SizeTestFractionMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestFractionMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="border-top:none;"></td>
						<td width="80" style="text-align:center;">%</td>
						<td>
							<div data-tip="masukan size fraction AR">
								<input type='text' class='form-control' name="stpar" id="stpar" value="{{$data->SizeTestPersenAR}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestPersenARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestPersenARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction ADB">
								<input type='text' class='form-control' name="stpadb" id="stpadb" value="{{$data->SizeTestPersenADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestPersenADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestPersenADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction DB">
								<input type='text' class='form-control' name="stpdb" id="stpdb" value="{{$data->SizeTestPersenDB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestPersenDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestPersenDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction DAFB">
								<input type='text' class='form-control' name="stpdafb" id="stpdafb" value="{{$data->SizeTestPersenDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SizeTestPersenDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestPersenDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan size fraction method">
								<input type='text' class='form-control' name="stpmethod" id="stpmethod" value="{{$data->SizeTestPersenMethod}}"
									<?php if(($data->SizeTestPersenMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SizeTestPersenMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border-bottom:none; border-top:none;"></td>
						<td>Initial Deformation Temp.</td>
						<td width="80" style="text-align:center;">C</td>
						<td>
							<div data-tip="masukan initial deformation AR">
								<input type='text' class='form-control' name="idar" id="idar" value="{{$data->InitialAR}}" 
									<?php if(($data->InitialARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->InitialARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan initial deformation ADB">
								<input type='text' class='form-control' name="idadb" id="idadb" value="{{$data->InitialADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->InitialADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->InitialADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan initial deformation DB">
								<input type='text' class='form-control' name="iddb" id="iddb" value="{{$data->InitialDB}}" 
									<?php if(($data->InitialDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->InitialDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan initial deformation DAFB">
								<input type='text' class='form-control' name="iddafb" id="iddafb" value="{{$data->InitialDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->InitialDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->InitialDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan initial deformation method">
								<input type='text' class='form-control' name="idmethod" id="idmethod" value="{{$data->InitialMethod}}"
									<?php if(($data->InitialMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->InitialMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="text-align:center; border-bottom:none; border-top:none;">Ash Fusion</td>
						<td>Spherical Temp.</td>
						<td width="80" style="text-align:center;">C</td>
						<td>
							<div data-tip="masukan spherical AR">
								<input type='text' class='form-control' name="sphar" id="sphar" value="{{$data->SphericalAR}}" 
									<?php if(($data->SphericalARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SphericalARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan spherical ADB">
								<input type='text' class='form-control' name="sphadb" id="sphadb" value="{{$data->SphericalADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SphericalADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SphericalADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan spherical DB">
								<input type='text' class='form-control' name="sphdb" id="sphdb" value="{{$data->SphericalDB}}" 
									<?php if(($data->SphericalDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SphericalDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan spherical DAFB">
								<input type='text' class='form-control' name="sphdafb" id="sphdafb" value="{{$data->SphericalDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->SphericalDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SphericalDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan spherical Method">
								<input type='text' class='form-control' name="sphmethod" id="sphmethod" value="{{$data->SphericalMethod}}" 
									<?php if(($data->SphericalMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SphericalMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border-bottom:none; border-top:none;">Temperature</td>
						<td>Hemispherical Temp.</td>
						<td width="80" style="text-align:center;">C</td>
						<td>
							<div data-tip="masukan hemispherical AR">
								<input type='text' class='form-control' name="hmsar" id="hmsar" value="{{$data->HemisphericalAR}}"
									<?php if(($data->HemisphericalARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HemisphericalARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan hemispherical ADB">
								<input type='text' class='form-control' name="hmsadb" id="hmsadb" value="{{$data->HemisphericalADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->HemisphericalADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HemisphericalADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan hemispherical DB">
								<input type='text' class='form-control' name="hmsdb" id="hmsdb" value="{{$data->HemisphericalDB}}" 
									<?php if(($data->HemisphericalDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HemisphericalDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan hemispherical DAFB">
								<input type='text' class='form-control' name="hmsdafb" id="hmsdafb" value="{{$data->HemisphericalDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->HemisphericalDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HemisphericalDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan hemispherical method">
								<input type='text' class='form-control' name="hmsmethod" id="hmsmethod" value="{{$data->HemisphericalMethod}}" 
									<?php if(($data->HemisphericalMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->HemisphericalMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border-top:none;"></td>
						<td>Fluidized Temp./Fluid</td>
						<td width="80" style="text-align:center;">C</td>
						<td>
							<div data-tip="masukan fluidized AR">
								<input type='text' class='form-control' name="fluar" id="fluar" value="{{$data->FluidizedAR}}" 
									<?php if(($data->FluidizedARCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FluidizedARCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fluidized ADB">
								<input type='text' class='form-control' name="fluadb" id="fluadb" value="{{$data->FluidizedADB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->FluidizedADBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FluidizedADBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fluidized DB">
								<input type='text' class='form-control' name="fludb" id="fludb" value="{{$data->FluidizedDB}}" 
									<?php if(($data->FluidizedDBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FluidizedDBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fluidized DAFB">
								<input type='text' class='form-control' name="fludafb" id="fludafb" value="{{$data->FluidizedDAFB}}" 
									onkeypress="return isDecimal(event)"
									<?php if(($data->FluidizedDAFBCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FluidizedDAFBCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
						<td>
							<div data-tip="masukan fluidized method">
								<input type='text' class='form-control' name="flumethod" id="flumethod" value="{{$data->FluidizedMethod}}" 
									<?php if(($data->FluidizedMethodCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->FluidizedMethodCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">Surveyor</td>
						<td colspan="6">
							<div data-tip="masukan nama surveyor">
								<input type='text' class='form-control' name="surveyor" id="surveyor" value="{{$data->Surveyor}}" 
									<?php if(($data->SurveyorCk=='1') || ($data2->PersetujuanVerifikasi=='Y' && $data2->Status==1)) { ?> readonly="true"
									<?php }else if ($data->SurveyorCk=='0') { ?> style="background-color:red; color:white;" <?php }?> >
								</input>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<table width=100%>
				<tr>
                    <td width=50%>
						<?php  if($data2->PersetujuanVerifikasi<>'Y' || $data2->Status==2) { ?>
						<button style="width:35%; margin-left:60%; margin-right:40%;" type="submit" 
							class="btn btn-submit  btn-primary">Selanjutnya
						<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
						<?php } ?>
					</td>
                </tr>
            </table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</form>
	</div>
</div>

<script>
    $("form").submit(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
</script>
@stop()