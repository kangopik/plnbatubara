@extends('layout.home')
@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
  	height: 500,
    selector : "textarea",
        menubar: false,
        statusbar: false,
        toolbar: false
    });
</script>
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
									<?php echo $data->Content; ?>	
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