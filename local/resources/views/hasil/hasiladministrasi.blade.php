@extends('layout.admin')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#trAdministrasi').hide();
});
</script>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"> 
                    <?php echo "Detail Calon Penyedia Batubara ".$data->Nama.", ".$data->BadanUsaha; ?>
        </h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="javascript:void(0);">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'HasilIjinTambang' ?>" >IJIN TAMBANG</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                        <div class="col-lg-12">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="success">
                                        <th colspan="7">&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" width="180">Nama Perusahaan</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->Nama}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;">Badan Usaha</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->BadanUsaha}}</div>
                                        </td>
                                    </tr>
                                    <tr id="trAdministrasi">
                                        <td style="border:none;">Status Perusahaan Pusat/Cabang</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->StatusPerusahaan}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;">Alamat</td>
                                        <td style="border:none;" colspan="5"> 
                                            <div>{{$data->Alamat}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" >Tlp Kantor</td>
                                        <td style="border:none;" >
                                            <div>{{$data->TlpKantor}}</div>
                                        </td>
                                        <td style="border:none;" width="30">&nbsp;</td>
                                        <td style="border:none;" width="120">Fax Kantor</td>
                                        <td style="border:none;" width="270">
                                            <div>{{$data->FaxKantor}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;">Email Perusahaan</td>
                                        <td style="border:none;">
                                            <div>{{$data->Email}}</div>
                                        </td>
                                        <td style="border:none;">&nbsp;</td>
                                        <td style="border:none;" >Website</td>
                                        <td style="border:none;">
                                            <div>{{$data->Website}}</div>
                                        </td>                                                        
                                    </tr>
                                    <tr>
                                        <td style="border:none;" >Direktur Utama</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->DirekturUtama}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;">Contact Person</td>
                                        <td style="border:none;" colspan="5">
                                            <div>{{$data->ContactPerson}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;" >Tlp Contact Person</td>
                                        <td style="border:none;">
                                            <div>{{$data->TlpContactPerson}}</div>
                                        </td>
                                        <td style="border:none;">&nbsp;</td>
                                        <td style="border:none;">Email Contact Person</td>
                                        <td style="border:none;">
                                            <div>{{$data->EmailContactPerson}}</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width=100%>
                                <tr>    
                                    <td width=50%>
                                        <a href="<?php echo 'hasilverifikasipeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                    </td>
                                    <td width=50%>
                                            <a href="<?php echo 'HasilPerijinan' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                                    </td>                                 
                                <tr>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                        </div>
                    <div>
        		</div>
        	</div>
        <div>
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