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
                        <?php $uli = Session::get('lvlid'); ?>
                        <?php if($uli == '3' || $uli == '5') { ?>
                        <li class="active">
                            <a href="javascript:void(0);">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailPersonil' ?>" >PERSONEL</a>
                        </li> -->
                        <?php if($uli == '6' || $uli == '8') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailKeuangan' ?>" >KEUANGAN</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailArmada' ?>" >ARMADA</a>
                        </li>
                        <li class="">
                            <a href="<?php //echo 'DetailPengalaman' ?>" >PENGALAMAN</a>
                        </li>
                        <li class="">
                            <a href="<?php //echo 'DetailKontrak' ?>" >KONTRAK</a>
                        </li> -->
                        <?php if($uli == '3' || $uli == '5') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailIjinTambang' ?>" >IJIN TAMBANG</a>
                        </li>
                        <?php } ?>
                        <?php if($uli == '7' || $uli == '9') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailTeknis' ?>" >TEKNIS TAMBANG</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="row">
                                        <div class="col-lg-12">
                            <form action="{{action('DetailController@savedetailadministrasi')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="success">
                                        <th colspan="7">&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" width="180">Nama Perusahaan</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->Nama}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="NamaCk" value="1" <?php if($data->NamaCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;">Badan Usaha</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->BadanUsaha}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="BadanUsahaCk" value="1" <?php if($data->BadanUsahaCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr id="trAdministrasi">
                                        <td style="border-top:none;">Status Perusahaan Pusat/Cabang</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->StatusPerusahaan}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="StatusPerusahaanCk" value="1" <?php if($data->StatusPerusahaanCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;">Alamat</td>
                                        <td style="border-top:none;" colspan="5"> 
                                            <div>{{$data->Alamat}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="AlamatCk" value="1" <?php if($data->AlamatCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" >Tlp Kantor</td>
                                        <td style="border-top:none;" >
                                            <div>{{$data->TlpKantor}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TlpKantorCk" value="1" <?php if($data->TlpKantorCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td width="30">&nbsp;</td>
                                        <td style="border-top:none;" width="120">Fax Kantor</td>
                                        <td style="border-top:none;" width="270">
                                            <div>{{$data->FaxKantor}}
                                            </div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="FaxKantorCk" value="1" <?php if($data->FaxKantorCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;">Email Perusahaan</td>
                                        <td style="border-top:none;">
                                            <div>{{$data->Email}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="EmailCk" value="1" <?php if($data->EmailCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td style="border-top:none;" >Website</td>
                                        <td style="border-top:none;">
                                            <div>{{$data->Website}}</div>
                                        </td>          
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="WebsiteCk" value="1" <?php if($data->WebsiteCk=='1') { echo "checked='checked'";}?>/>
                                        </td>                                                         
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" >Direktur Utama</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->DirekturUtama}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="DirekturUtamaCk" value="1" <?php if($data->DirekturUtamaCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;">Contact Person</td>
                                        <td style="border-top:none;" colspan="5">
                                            <div>{{$data->ContactPerson}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="ContactPersonCk" value="1" <?php if($data->ContactPersonCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:none;" >Tlp Contact Person</td>
                                        <td style="border-top:none;">
                                            <div>{{$data->TlpContactPerson}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="TlpContactPersonCk" value="1" <?php if($data->TlpContactPersonCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td style="border-top:none;">Email Contact Person</td>
                                        <td style="border-top:none;">
                                            <div>{{$data->EmailContactPerson}}</div>
                                        </td>
                                        <td width="30" style="text-align:left;">
                                            <input type="checkbox" name="EmailContactPersonCk" value="1" <?php if($data->EmailContactPersonCk=='1') { echo "checked='checked'";}?>/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width=100%>
                                <tr>    
                                    <td width=50%>
                                        <a href="<?php echo 'verifikasi' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Kembali</a>
                                    </td>
                                    <td width=50%>
                                            <button  type="submit" style="text-transform:none; width:150px;"
                                                class="btn btn-submit  btn-primary">Selanjutnya
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                                    </td>                                 
                                <tr>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            </form>
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
$("form").submit(function() {
    $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
    setTimeout($.unblockUI, 800);
}); 
$("#btnprev").click(function() {
    $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
    setTimeout($.unblockUI, 800);
});
</script>
@stop()