@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php if($data->BadanUsaha == '1') { $BU = "PT"; }
              else if($data->BadanUsaha == '2') { $BU = "CV"; } 
              else if($data->BadanUsaha == '3') { $BU = "Koperasi"; }
              else if($data->BadanUsaha == '4') { $BU = "Lainnya";} 
              else { $BU = '';}
        	echo $data->Nama.','.$BU; ?>
    	</h2>
    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
				</div>
			</div>
		</div>
    </div>
</div>
@stop()