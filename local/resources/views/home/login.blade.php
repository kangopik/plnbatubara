<!DOCTYPE html>
<html  lang="en">
	<head>
		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>PT. PLN BATUBARA</title>

		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/css-home.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">

	</head>
    <body class="hold-transition register-page">
        <!-- END CONTAINER -->
        <div class="register-box" style="padding-top:5%;">
            <div class="register-box-body">
                <p class="login-box-msg">LOGIN</p>
                <form action="{{action('HomeController@ceklogin')}}" method="post">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="form-username" value="<?php echo Session::get('username'); ?>" required="required" autofocus>
                        <span class="form-control-feedback"><i class="fa fa-user"></i></span>
                        <span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;"><?php echo Session::get('username_err'); ?></p></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" value="<?php echo Session::get('password'); ?>" name="form-password" required="required">
                        <span class="form-control-feedback"><i class="fa fa-key"></i></span>
                        <span><p style="color:red; font-size:12px; font-style:italic; text-transform:none;"><?php echo Session::get('pass_err'); ?></p></span>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-4">
                        </div>                        
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                        </div>
                        <div class="col-xs-4">
                            <a href="<?php echo 'home' ?>" class="btn btn-primary btn-block btn-flat" id="btna" role="button" style="text-transform:none;">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    	<!-- END CONTAINER -->

		<!-- BEGIN FOOTER -->
        <div style="bottom: 0px; text-align: center; width: 100%; font-color:#FFFFFF;">Copyright &copy; PT. PLN BATU BARA 2015</div>
    	<!-- END FOOTER -->

    	<script src="{{asset('js/jquery-2.1.4.js')}}"></script>
    	<script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/sweetalert.min.js')}}"></script>
        @include('Alerts::alerts')
	</body>
</html>
