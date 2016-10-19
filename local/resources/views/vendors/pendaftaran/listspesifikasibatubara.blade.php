@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data1->Nama.', '.$data1->BadanUsaha; ?></h2>

        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'detaildatateknistambang' ?>">Data Teknis</a>
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
                            <?php  if(($dataHasil->PersetujuanVerifikasi) <> 'Y' || $dataHasil->Status==2) { ?> 
                            <?php if($row->SpekTambangCk !='1') { ?>
                            <td style="text-align:center;">
                                <a href="<?php echo 'spesifikasibatubara/'.$row->Ids ?>">
                                    <i class="fa fa-pencil-square-o"></i> Edit</a> |
                                <a href="" onclick="document.getElementById('alamattambang').value='<?php echo $row->Alamat ?>';
                                                    document.getElementById('idstambang').value='<?php echo $row->Ids ?>';"
                                        data-toggle="modal" data-target="#confirmSpesifikasiTambang">
                                        <i class="fa fa-trash-o"></i> Hapus</a> 
                            </td>
                            <?php } ?>
                            <?php } ?>
                        </tr>
                        <?php $counter++; } ?>
						<?php } ?>
					</tbody>
				</table>
				<?php if(!is_null($dataHasil)) { ?>
                <?php  if($dataHasil->PersetujuanVerifikasi<>'Y' || $dataHasil->Status==2) { ?>
					<a href="<?php echo 'spesifikasibatubara/0' ?>" class="btn btn-primary btn-block btn-flat" 
                        id="btna" role="button" style="text-transform:none; width:150px;">Tambah Tambang</a>
                <?php } ?>
                <?php }else { ?>
                	<a href="<?php echo 'spesifikasibatubara/0' ?>" class="btn btn-primary btn-block btn-flat" 
                        id="btna" role="button" style="text-transform:none; width:150px;">Tambah Tambang</a>
                <?php } ?>
			</div>
		</div>

		<table align=center>
            <tr align=center>
                <td align=center>
                    <?php  if($dataHasil->PersetujuanVerifikasi<>'Y' || $dataHasil->Status==2) { ?>
                    <br />
                    <a href="<?php echo 'detaildatateknistambang' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                    <a href="<?php echo 'datateknistambang' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                    <?php } ?>
                </td>
            </tr>
        </table>

    </div>

    <!-- modal confirm delete data teknis -->
    <div class="modal fade" id="confirmSpesifikasiTambang" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletespesifikasibatubara')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" id="idstambang" name="idstambang">
                        <input type="hidden" id="alamattambang" name="alamattambang"> 
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus data spesifikasi tambang ini</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal confirm delete data teknis -->
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