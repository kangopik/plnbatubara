@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Detail Calon Penyedia Batubara <?php echo $data1->Nama.', '.$data1->BadanUsaha; ?></h2>

        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'DetailTeknis2' ?>">Data Teknis</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Spesifikasi Teknis</a>
                        </li>
        			</ul>
        		</div>
        	</div>
        </div>
        <div class="row">
			<div class="col-lg-12">
				<table class="table table-bordered table-hover">
					<thead>
						<th width="50" style="text-align:center;">No</th>
                        <th width="350" style="text-align:center;">Alamat Tambang</th>
                        <th width="100" style="text-align:center;">Aksi</th>
					</thead>
					<tbody>
						<?php if(!is_null($data3)) { ?>
						<?php
                            $counter = 1;
                            foreach($data3 as $row){
                        ?>
                        <tr>
                        	<td><?php echo $counter ?></td>
                            <td> <?php echo $row->Alamat ?></td>
                            <td style="text-align:center;">
                                <a href="<?php echo 'DetailSpesifikasi/'.$row->Ids ?>">
                                    <i class="fa fa-search-plus"></i> Detail</a> 
                            </td>
                        </tr>
                        <?php $counter++; } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<table align=center>
            <tr align=center>
                <td align=center>
                    <br />
                    <a href="<?php echo 'DetailTeknis2' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                </td>
                <td wisth=20>&nbsp;&nbsp;</td>
                <td align=center>
                    <br />
                    <a href="<?php echo 'DetailTeknis' ?>" class="btn btn-submit btn-primary" id="btnprev">Selesai 
                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                </td>
            </tr>
        </table>

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