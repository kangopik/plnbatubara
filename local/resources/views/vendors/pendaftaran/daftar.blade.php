<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>PT. PLN BATUBARA</title>
		
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/css-home.css')}}" rel="stylesheet">
		<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  	<link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/fixed-style.css')}}">
    <script src="{{asset('js/jquery-2.1.4.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('#form-npwp').mask("00.000.000.0-000.000", {clearIfNotMatch: true});
      });
    </script>

	</head>
	<body class="hold-transition register-page" style="background-color:#F5DEDE;">
		<div class="register-box" >
			<div class="register-box-body">
				<p class="login-box-msg"><b>PENDAFTARAN CALON PENYEDIA BATUBARA</b></p>
				<form action="{{action('HomeController@registrasi')}}" method="post">
					<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
					<div class="form-group has-feedback" id="divnama">
              <div data-tip="masukan nama perusahaan anda">
        				<input type="text" class="form-control" name="form-nama" id="form-nama" placeholder="Nama Perusahaan" value="<?php echo Session::get('nama'); ?>" required="required" autofocus>
        				<span class="form-control-feedback"></span>
      				</div>   
          </div>
              <div class="form-group has-feedback">                
                <div data-tip="pilih badan usaha perusahan">
                  <select name='badanusaha' id='badanusaha' class='form-control' required>
                    <option value="" >- Pilih Badan Usaha -</option>
                    <option value="PT" <?php $BU = Session::get('badanusaha'); if ($BU == "PT") { ?> selected="selected" <?php } ?> >PT</option>
                    <option value="CV" <?php $BU = Session::get('badanusaha'); if ($BU == "CV") { ?> selected="selected" <?php } ?> >CV</option>
                    <option value="Koperasi" <?php $BU = Session::get('badanusaha'); if ($BU == "Koperasi") { ?> selected="selected" <?php } ?> >Koperasi</option>
                    <option value="Lainnya" <?php $BU = Session::get('badanusaha'); if ($BU == "Lainnya") { ?> selected="selected" <?php } ?> >Lainnya</option>
                  </select>
                </div>
              </div>          
              <div class="form-group has-feedback">
                <div data-tip="masukan alamat surat perusahaan anda">
                <textarea class="form-control" name="form-alamat" id="form-alamat" placeholder="Alamat Surat" required="required"><?php echo Session::get('alamat'); ?></textarea>
                <span class="form-control-feedback"></span>
              </div>
              </div>              
              <div class="form-group has-feedback">
                <div data-tip="masukan nama email perusahaan anda">
                <input type="text" class="form-control" name="form-email" id="form-email" placeholder="Email Perusahaan" value="<?php echo Session::get('email'); ?>" required="required" autofocus>
                <span class="form-control-feedback"></span>
                <span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;"><?php echo Session::get('email_err'); ?></p></span>
                </div>
              </div> 
      				<div class="form-group has-feedback">
                <div data-tip="masukan nomor npwp perusahaan anda">
        				<input type="text" class="form-control" name="form-npwp" id="form-npwp" placeholder="No. NPWP" value="<?php echo Session::get('npwp'); ?>" required="required">
        				<span class="form-control-feedback"></span>
                <span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;"><?php echo Session::get('npwp_err'); ?></p></span>
              </div>
      				</div>
      				<div class="row">&nbsp;</div>
              <div class="row">
                  <div class="col-xs-1">
                  </div>                        
                  <div class="col-xs-5">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                  </div>
                  <div class="col-xs-5">
                      <a href="<?php echo 'home' ?>" class="btn btn-primary btn-block btn-flat" id="btna" role="button" style="text-transform:none;">Kembali</a>
                  </div>
              </div>
				</form>
			</div>
		</div>

	<!-- BEGIN FOOTER -->
    <div style="bottom: 0; text-align: center; width: 100%; color:#1D4361; font-weight:500"><b>Copyright &copy; PT. PLN BATUBARA 2016</b></div>
  <!-- END FOOTER -->

	<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
  @include('Alerts::alerts')

	</body>

</html>