@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data2->Nama.", ".$data2->BadanUsaha; ?></h2>
        <div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="">
                            <a href="<?php echo 'DetailAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPengurus' ?>" >PENGURUS</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPersonil' ?>" >PERSONEL</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailKeuangan' ?>" >KEUANGAN</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailArmada' ?>" >ARMADA</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPengalaman' ?>" >PENGALAMAN</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailKontrak' ?>" >KONTRAK</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailIjinTambang' ?>" >IJIN TAMBANG</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailTeknis' ?>" >TEKNIS TAMBANG</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);" >SARANA</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form action="{{action('DetailController@savedetailsarana')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <table class="table table-bordered">
                <tbody>
                    <tr class="success">
                        <th colspan="6">Dermaga</th>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="280">Jenis peralatan loading yang tersedia</td>
                        <td style="border-top:none;" colspan="3">
                            <div>{{$data->JenisPeralatan}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="JenisPeralatanCk" value="1" <?php if($data->JenisPeralatanCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="200">Kapasitas maksimum  kapal / tongkang yang dapat sandar</td>
                        <td style="border-top:none;" colspan="3">
                            <div>{{$data->KapasitasMaksimumKapal}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasMaksimumKapalCk" value="1" <?php if($data->KapasitasMaksimumKapalCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="200">Kapasitas loading per hari</td>
                        <td style="border-top:none;" colspan="3">
                            <div>{{$data->KapasitasLoading}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasLoadingCk" value="1" <?php if($data->KapasitasLoadingCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="6">Vesel / Tongkang </th>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="200">Tahun pembuatan</td>
                        <td style="border-top:none;" colspan="3">
                            <div>{{$data->TahunPembuatan}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="TahunPembuatanCk" value="1" <?php if($data->TahunPembuatanCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="200">Kapasitas angkut</td>
                        <td style="border-top:none;" colspan="3">
                            <div>{{$data->KapasitasAngkut}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KapasitasAngkutCk" value="1" <?php if($data->KapasitasAngkutCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:none;" width="200">Kondisi</td>
                        <td style="border-top:none;" colspan="3">
                            <div>{{$data->Kondisi}}</div>
                        </td>
                        <td width="30" style="text-align:left;">
                            <input type="checkbox" name="KondisiCk" value="1" <?php if($data->KondisiCk=='1') { echo "checked='checked'";}?>/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                                <tr>
                                    <td width=600>
                                <input style="width:25%; margin-left:40%; margin-right:40%;" type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                                    </td>
                                    <td>
                                        <a href="<?php echo 'verifikasi' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btna" role="button" style="text-transform:none; width:150px;">Kembali</a>
                                    </td>   
                                <tr>
                            </table>
                                                        <p>&nbsp;</p>
                                                        <p>&nbsp;</p>
            </form>
                        </div>
                    <div>
        		</div>
        	</div>
        <div>
    </div>
</div>
@stop()