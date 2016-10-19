@extends('layout.home')
@section('content')
<html>
<head>
	<link href="{{asset('css/css-info.css')}}" rel="stylesheet">
</head>
<body>
<div class="container" style="background-color: #EEEEE6; margin-top:-20px;">
	<div class="row">
		<div id="div_content">
			<div class="col-md-12">
				<div class="push">
					<div class="row">
						<div class="col-md-12 clearfix">
							<div id="tab_content_data">
								<div class="masthead clearfix">
									<h3 style="text-align:center;">PENGUMUMAN</h3>
									<table class="">
										<?php 
											foreach ($data as $row) {
										?>
											<tr>
													<h4><?php echo $row->Header ?></h4>
													<p><?php echo date("d-m-Y", strtotime($row->Tanggal)) ?>
														oleh
														<?php echo $row->Nama ?>
													<br />
										<?php			
											$string = strip_tags($row->Content);
    										$string = substr($string, 0, 300);
											echo $string;
										?>
											<br /><a href="<?php echo 'GetPengumuman/'.$row->Id ?> ">Baca Selengkapnya...</a>
													</p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
											</tr>
										<?php
											}
										 ?>
									</table>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop()
</body>
</html>