@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'HasilDataTambang' ?>">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataKapasitasProduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataEksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Stockpile Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilDataJetty' ?>">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Stockpile</th>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Nama Stockpile</td>
                                <td style="border:none;">{{$data1->Nama}}</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Kepemilikan Stockpile</td>
                                <td style="border:none;"><?php if($data1->KepemilikanStockpile == '1') { echo "Milik Sendiri";
                                     }else if($data1->KepemilikanStockpile == '2') { echo "Sewa"; 
                                 	 } else { echo ""; } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Luas Stockpile</td>
                                <td style="border:none;">{{$data1->LuasStockpile}} Ha</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Kapasitas Stockpile</td>
                                <td style="border:none;">{{$data1->KapasitasStockpile}} MT</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Jarak Tambang ke Stockpile</td>
                                <td style="border:none;">{{$data1->JarakTambang}} KM</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Jumlah Crusher</td>
                                <td style="border:none;">{{$data1->JumlahCruiser}} Unit</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Kapasitas Crusher</td>
                                <td style="border:none;">{{$data1->KapasitasCruiser}} MT</td>
                            </tr>
                            <tr>
                                <td style="border:none;" width="200">Catatan</td>
                                <td style="border:none;">{{$data1->Catatan}}</td>
                            </tr>
                            <table width=100%>
                                <tr>                    
                                    <td width=50%>
                                        <a href="<?php echo 'HasilDataEksplorasi' ?>" class="btn btn-primary btn-block btn-flat" 
                                                    id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
                                                    Sebelumnya</a>
                                    </td>
                                    <td width=50%>
                                        <a href="<?php echo 'HasilDataJetty' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                    </td>
                                </tr>
                            </table>
                        </tbody>
                    </table>
        	</div>
        </div>
    </div>
</div>

<script>
    $("#btnnext").submit(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()