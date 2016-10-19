@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Detail Teknis Calon Penyedia Batubara</h2>
        <div class="row">
            <div class="col-md-12 clearfix">
                <div id="tab_content_data">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="javascript:void(0);" >TEKNIS TAMBANG</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if($data4->JenisIjin == 'IUPOP') { ?>
                                    <h4>Sumber tambang sesuai IUP OPK Pengangkutan</h4>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>No. IUP OP</th>
                                                <th style="text-align:center;" width=120>Tgl.</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                                <th style="text-align:center;" width=120>Tgl. Berlaku</th>
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
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?php echo 'HasilTeknisVendor/'.$row->AsalTambang; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> Data Tambang</a>
                                                </td>
                                            </tr> 
                                        <?php $counter++; } ?>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    <?php }else if($data4->JenisIjin == 'IUPOPK') { ?>
                                    <h4>Sumber tambang sesuai IUP OPK Pengangkutan</h4>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>Asal Tambang</th>
                                                <th style="text-align:center;" width=120>No. IUP OP</th>
                                                <th style="text-align:center;" width=120>Tgl.</th>
                                                <th style="text-align:center;" width=120>Jangka Waktu</th>
                                                <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                                <th style="text-align:center;" width=120>Tgl. Berlaku</th>
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
                                                <td> <?php echo $row->AsalTambang ?></td>
                                                    <td> <?php echo $row->NoIUPOP ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?php echo 'HasilTeknisVendor/'.$row->AsalTambang; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> Data Tambang</a>
                                                </td>
                                            </tr> 
                                        <?php $counter++; } ?>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    <?php }else if($data4->JenisIjin == 'IUPOPK2'){ ?>
                                    <h4>Sumber tambang sesuai IUP OPK Pemurnian</h4>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=120>Asal Tambang</th>
                                            <th style="text-align:center;" width=120>No. IUP OP</th>
                                            <th style="text-align:center;" width=120>Tgl.</th>
                                            <th style="text-align:center;" width=120>Jangka Waktu</th>
                                            <th style="text-align:center;" width=120>Sertifikat CNC</th>
                                            <th style="text-align:center;" width=120>Tgl. Berlaku</th>
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
                                                <td> <?php echo $row->AsalTambang ?></td>
                                                    <td> <?php echo $row->NoIUPOP ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
                                                    <td> <?php echo $row->NoCNC ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
                                                    <td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?php echo 'HasilTeknisVendor/'.$row->AsalTambang; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> Data Tambang</a>
                                                </td>
                                            </tr> 
                                        <?php $counter++; } ?>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    <?php } ?>
                                    <table width=100%>
                                        <tr>
                                            <td width=50%>
                                                <a href="<?php echo 'hasilverifikasipeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                            </td>
                                            <td width=50%>
                                                    <a href="<?php echo 'hasilverifikasipeserta' ?>"  type="submit" style="text-transform:none; width:150px;"
                                                        id="btnnext" class="btn btn-primary btn-block btn-flat" >Selesai
                                                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                            </td>  
                                        <tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <div>
    </div>
</div>

<script>
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
    $("#btnnext").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()