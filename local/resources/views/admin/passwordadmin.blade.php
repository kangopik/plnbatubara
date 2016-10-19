@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Ganti Password</h2>
        <form action="{{action('AdminController@savepasswordadmin')}}" method="post">
        	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        	<table class="table">
				<tbody>
					<tr>
						<td style="border:none; border-top:none;" width="180">Password Baru</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-5">
								<input type='password' class='form-control' name="pass" id="pass" required="required"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">Konfirmasi Password</td>
						<td style="border:none; border-top:none;">
							<div class="col-sm-5">
								<input type='password' class='form-control' name="con_pass" id="con_pass" required="required" onBlur="return cekPass()"></input>
							</div>
						</td>
					</tr>
					<tr>
						<td style="border:none; border-top:none;">&nbsp;</td>
						<td style="border:none; border-top:none;">
							<span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;" id="errorpass"></p></span>
						</td>
					</tr>
				</tbody>
			</table>
			<input style="width:15%; margin-left:20%; margin-right:60%;" type="submit" value="Simpan Password" class="btn btn-submit  btn-primary">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
        </form>
    </div>
</div>
@stop()