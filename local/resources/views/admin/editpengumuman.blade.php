@extends('layout.admin')
@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
  	height: 250,
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
  
    });
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Pengumuman</h2>
        	<form action="{{action('AdminController@aksisavepengumuman')}}" method="post">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                <input type="hidden" name="idpengumuman" id="idpengumuman" value="<?php echo $data->Id; ?>">
                <table class="table table-bordered" style="border:none;">
                    <tbody>
                        <tr>
                            <td style="border:none;padding-top:15px;" width=80>Judul</td>
                            <td style="border:none;">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="pheader" id="pheader" required="required"
                                    	value="<?php echo $data->Header; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border:none; padding-top:15px;">Isi</td>
                            <td style="border:none;">
                                <div class="col-sm-12">
                                    <textarea class='tinymce' name="pcontent" id="pcontent">
                                    	<?php echo $data->Content; ?>
                                    </textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
		        <table width="100%">
						<tr>					
							<td width=50%>
								<a href="<?php echo 'masterpengumuman' ?>" class="btn btn-primary btn-block btn-flat" 
					                        id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
					                        <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
					                        Kembali</a>
		                    </td>
							<td width=50%>
								<button style="text-transform:none; width:150px;" type="submit" 
									class="btn btn-submit  btn-primary" id="btnnext">
									Simpan
								<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
							</td>
		                </tr>
		            </table>
            </form>			
		</div>
	</div>
</div>

<script>
    $("#btnnext").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>

@stop()