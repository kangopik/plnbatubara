<!DOCTYPE html>
<html  lang="en">
	<head>
		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>PT. PLN BATUBARA</title>

		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/fixed-style.css')}}">
        <script src="{{asset('js/jquery.price_format.2.0.js')}}"></script>

	</head>
	<body style="background-color:#FFFFFF"> 

		<!-- NAVBAR -->
        <nav class="navbar navbar-inverse">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a style="font-size:16px;" href="<?php echo 'home' ?>"><i class="fa fa-home"></i> PT. PLN BATUBARA</a>
                        </li>    
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo 'pengumuman' ?>"><i class="fa fa-newspaper-o"></i> Pengumuman</a>
                        </li>
                        <li>
                            <a href="<?php echo 'daftar' ?>"><i class="fa fa-pencil-square-o"></i> Daftar</a>
                        </li>
                        <li>
                            <a href="<?php echo 'login' ?>"><i class="fa fa-sign-in"></i> Masuk</a>
                        </li>
                        <li>
                            <a></a>
                        </li>
                    </ul>
                </div>    
        </nav>
    	<!-- END NAVIGATION -->

    	<!-- BEGIN CONTAINER -->
        @yield('content') 
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <div style="bottom: 0; border-radius: 2px; text-align: center; width: 100%; color:#FFF; font-weight:500">Copyright &copy; PT. PLN BATU BARA 2015</div>
    	<!-- END FOOTER -->

    	<!-- jQuery -->
    	<script src="{{asset('js/jquery-2.1.4.js')}}"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="{{asset('js/bootstrap.min.js')}}"></script>

	</body>
</html>