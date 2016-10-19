@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

        <!-- modal confirm delete data teknis -->
        <div class="modal fade" id="confirmTeknisModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <form action="{{action('VendorController@deletedatateknis')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <div class="modal-body">
                                <h4>Anda yakin akan menghapus lokasi <input style="border:none;" type="text" 
                                    id="alamattambang" name="alamattambang"> 
                                </h4>
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

        <div class="row">
			<div class="col-lg-12">
                <?php if(!is_null($data4) && $data4->JenisIjin == 'IUPOP') { ?>
                <h4>Sumber tambang sesuai IUP OP</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th style="text-align:center;" width=50>No</th>
                        <th style="text-align:center;" width=120>No. IUP OP</th>
                        <th style="text-align:center;" width=120>Tgl</th>
                        <th style="text-align:center;" width=120>Jangka Waktu</th>
                        <th style="text-align:center;" width=120>Sertifikat CNC</th>
                        <th style="text-align:center;" width=120>Tgl</th>
                        <th style="text-align:center;" width=120>Jangka Waktu</th>
                        <th style="text-align:center;" width=120>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if($datacount2 > 0) { ?>
                        <?php
                            $counter = 1;
                            foreach($data3 as $row){
                        ?>
                            <tr>
                                <td> <?php echo $counter ?></td>
                                <td> <?php echo $row->NoIUPOP ?></td>
                                <td> <?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?></td>
                                <td> <?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?></td>
                                <td> <?php echo $row->NoCNC ?></td>
                                <td> <?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?></td>
                                <td> <?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?></td>
                                <td style="text-align:center;">
                                    <a href="<?php echo 'TeknisTambang/'.$row->AsalTambang; ?>">
                                        <i class="fa fa-pencil-square-o"></i> Data Tambang</a>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }else if(!is_null($data4) && $data4->JenisIjin == 'IUPOPK') { ?>
                <h4>Sumber tambang sesuai IUP OPK Pengangkutan</h4>
				<table class="table table-bordered table-hover">
					<thead>
						<th style="text-align:center;" width=50>No</th>
                        <th style="text-align:center;" width=120>No. IUP OP</th>
                        <th style="text-align:center;" width=120>Tgl</th>
                        <th style="text-align:center;" width=120>Jangka Waktu</th>
                        <th style="text-align:center;" width=120>Sertifikat CNC</th>
                        <th style="text-align:center;" width=120>Tgl</th>
                        <th style="text-align:center;" width=120>Jangka Waktu</th>
                        <th style="text-align:center;" width=120>Aksi</th>
					</thead>
					<tbody>
                        <?php if($datacount1 > 0) { ?>
                        <?php
                            $counter = 1;
                            foreach($data2 as $row){
                        ?>
                            <tr>
                                <td> <?php echo $counter ?></td>
                                <td> <?php echo $row->NoIUPOP ?></td>
                                <td> <?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?></td>
                                <td> <?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?></td>
                                <td> <?php echo $row->NoCNC ?></td>
                                <td> <?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?></td>
                                <td> <?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?></td>
                                <td style="text-align:center;">
                                    <a href="<?php echo 'TeknisTambang/'.$row->AsalTambang; ?>">
                                        <i class="fa fa-pencil-square-o"></i> Data Tambang</a>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                        <?php } ?>
					</tbody>
				</table>
                <?php }else if(!is_null($data4) && $data4->JenisIjin == 'IUPOPK2'){ ?>
                <h4>Sumber tambang sesuai IUP OPK Pemurnian</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th style="text-align:center;" width=50>No</th>
                        <th style="text-align:center;" width=120>No. IUP OP</th>
                        <th style="text-align:center;" width=120>Tgl</th>
                        <th style="text-align:center;" width=120>Jangka Waktu</th>
                        <th style="text-align:center;" width=120>Sertifikat CNC</th>
                        <th style="text-align:center;" width=120>Tgl</th>
                        <th style="text-align:center;" width=120>Jangka Waktu</th>
                        <th style="text-align:center;" width=120>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if($datacount2 > 0) { ?>
                        <?php
                            $counter = 1;
                            foreach($data3 as $row){
                        ?>
                            <tr>
                                <td> <?php echo $counter ?></td>
                                <td> <?php echo $row->NoIUPOP ?></td>
                                <td> <?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?></td>
                                <td> <?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?></td>
                                <td> <?php echo $row->NoCNC ?></td>
                                <td> <?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?></td>
                                <td> <?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?></td>
                                <td style="text-align:center;">
                                    <a href="<?php echo 'TeknisTambang/'.$row->AsalTambang; ?>">
                                        <i class="fa fa-pencil-square-o"></i> Data Tambang</a>
                                </td>
                            </tr> 
                        <?php $counter++; } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
			</div>
		</div>

        <table align=center>
            <tr align=center>
                <td align=center>
                    <br />
                    <?php if($dataHasil->PersetujuanVerifikasi <> 'Y' ^ $dataHasil->Status<>1 || $dataHasil->StatusPakta <> 'Y') { ?>
                    <a href="<?php echo 'datakeuangan' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                    <a href="<?php echo 'pengalamanperusahaan' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                    <?php } ?>
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
