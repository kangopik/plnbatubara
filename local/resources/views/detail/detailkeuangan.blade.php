@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data4->Nama.", ".$data4->BadanUsaha; ?></h2>
        <div class="row">
            <div class="col-md-12 clearfix">
                <div id="tab_content_data">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <?php $uli = Session::get('lvlid'); ?>
                        <?php if($uli == '3' || $uli == '5') { ?>
                        <li class="">
                            <a href="<?php echo 'DetailAdministrasi' ?>">ADMINISTRASI</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'DetailPerijinan' ?>" >IJIN PERUSAHAAN</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="">
                            <a href="<?php //echo 'DetailPersonil' ?>" >PERSONEL</a>
                        </li> -->
                        <?php if($uli == '6' || $uli == '8') { ?>
                        <li class="active">
                            <a href="javascript:void(0);" >KEUANGAN</a>
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
                        <!--<li class="">
                            <a href="</?php echo 'DetailSarana' ?>" >SARANA</a>
                        </li>-->
                    </ul> 
                </div>
            </div>
        </diV>

        <div class="row">
            <div class="col-lg-12">
                <h4>&nbsp;</h4>
                    <form action="{{action('DetailController@savedetailkeuangan')}}" method="post">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="success">
                                <th colspan="7">Nomor Pokok Wajib Pajak (NPWP)</th>
                            </tr>
                            <tr>
                                <td style="border-top:none;" width="130">No. NPWP</td>
                                <td style="border-top:none;" width="320">
                                    <div>{{$data2->NomorNPWP}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NomorNPWPCk" value="1" <?php if($data2->NomorNPWPCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td style="border-top:none;" colspan="4"></td>
                            </tr>
                            <tr class="success">
                                <th colspan="7">Rekening Perusahaan</th>
                            </tr>
                            <tr>
                                <td style="border-top:none;">No. Rekening</td>
                                <td style="border-top:none;">
                                    <div>{{$data2->NoRekening}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NoRekeningCk" value="1" <?php if($data2->NoRekeningCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;" width="100">Nama Bank</td>
                                <td style="border-top:none;">
                                    <div>{{$data2->NamaBank}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NamaBankCk" value="1" <?php if($data2->NamaBankCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr class="success">
                                <th colspan="7">Bukti pelunasan pajak tahunan / Tahun terakhir</th>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Nomor</td>
                                <td style="border-top:none;">
                                    <div>{{$data2->NomorBuktiPelunasan}}</div>  
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NomorBuktiPelunasanCk" value="1" <?php if($data2->NomorBuktiPelunasanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;" width="70">Tanggal</td>
                                <td style="border-top:none;">
                                    <div><?php if(!is_null($data2->TglBuktiPelunasan)) { echo date("d-m-Y", strtotime($data2->TglBuktiPelunasan));} ?></div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TglBuktiPelunasanCk" value="1" <?php if($data2->TglBuktiPelunasanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr class="success">
                                <th colspan="7">Laporan bulanan PPN, PPh tiga Bulan terakhir</th>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Nomor</td>
                                <td style="border-top:none;">
                                    <div>{{$data2->NomorLaporanBulanan}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NomorLaporanBulananCk" value="1" <?php if($data2->NomorLaporanBulananCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;">Tanggal</td>
                                <td style="border-top:none;">
                                    <div><?php if(!is_null($data2->TglLaporanBulanan)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan));} ?></div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TglLaporanBulananCk" value="1" <?php if($data2->TglLaporanBulananCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Nomor</td>
                                <td style="border-top:none;">
                                    <div>{{$data2->NomorLaporanBulanan2}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NomorLaporanBulanan2Ck" value="1" <?php if($data2->NomorLaporanBulanan2Ck=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;">Tanggal</td>
                                <td style="border-top:none;">
                                    <div><?php if(!is_null($data2->TglLaporanBulanan2)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan2));} ?></div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TglLaporanBulanan2Ck" value="1" <?php if($data2->TglLaporanBulanan2Ck=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Nomor</td>
                                <td style="border-top:none;">
                                    <div>{{$data2->NomorLaporanBulanan3}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="NomorLaporanBulanan3Ck" value="1" <?php if($data2->NomorLaporanBulanan3Ck=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;">Tanggal</td>
                                <td style="border-top:none;">
                                    <div><?php if(!is_null($data2->TglLaporanBulanan3)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan3));} ?></div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TglLaporanBulanan3Ck" value="1" <?php if($data2->TglLaporanBulanan3Ck=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </diV>

        <div class="row">
            <div class="col-lg-12">
                <h4>&nbsp;</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="success">
                                <th colspan="7">Neraca perusahaan Terakhir</th>
                            </tr>
                            <tr>
                                <td style="border-top:none;" width="180">Activa Lancar</td>
                                <td style="border-top:none;" width="270">
                                    <div>{{$data3->ActivaLancar}} IDR</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="ActivaLancarCk" value="1" <?php if($data3->ActivaLancarCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;" width="180">Utang Jangka Pendek</td>
                                <td style="border-top:none;" width="270">
                                    <div>{{$data3->UtangJangkaPendek}} IDR</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="UtangJangkaPendekCk" value="1" <?php if($data3->UtangJangkaPendekCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Activa Tetap</td>
                                <td style="border-top:none;" width="220">
                                    <div>{{$data3->ActivaTetap}} IDR</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="ActivaTetapCk" value="1" <?php if($data3->ActivaTetapCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;">Utang Jangka Panjang</td>
                                <td style="border-top:none;">
                                    <div>{{$data3->UtangJangkaPanjang}} IDR</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="UtangJangkaPanjangCk" value="1" <?php if($data3->UtangJangkaPanjangCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Total Activa Lancar</td>
                                <td style="border-top:none;" width="220">
                                    <div>{{$data3->TotalActivaLancar}} IDR</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TotalActivaLancarCk" value="1" <?php if($data3->TotalActivaLancarCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                                <td width="30">&nbsp;</td>
                                <td style="border-top:none;">Kekayaan Bersih</td>
                                <td style="border-top:none;">
                                    <div>{{$data3->TotalKekayaan}} IDR</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="TotalKekayaanCk" value="1" <?php if($data3->TotalKekayaanCk=='1') { echo "checked='checked'";}?>/>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top:none;">Auditor</td>
                                <td style="border-top:none;">
                                    <div>{{$data3->Auditor}}</div>
                                </td>
                                <td width="30" style="text-align:left;">
                                    <input type="checkbox" name="AuditorCk" value="1" <?php if($data3->AuditorCk=='1') { echo "checked='checked'";}?>/>
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
                                        class="btn btn-submit  btn-primary">Selesai
                                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
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

    <!-- modal --> 
        <div class="modal fade" id="kepemilikanSahamModal" role="dialog" aria-labelledby="kepemilikanSahamModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="kepemilikanSahamModalLabel">Kepemilikan Saham</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{action('DetailController@savedetailsaham')}}" method="post">
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <table class="table table-bordered" style="border:none;">
                                    <tbody>
                                        <tr>
                                            <td style="border:none; padding-top:15px;" width="200">Nama</td>
                                            <td style="border:none;">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="nama" id="nama" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NamaCk" id="NamaCk" value="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">No. KTP</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="ktp" id="ktp" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="NoKTPCk" id="NoKTPCk" value="1"/>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td style="border:none; padding-top:15px;">Jabatan</td>
                                            <td style="border:none;">
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="jabatan" id="jabatan" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                            <td width="30" style="text-align:left; border:none;">
                                                <input type="checkbox" name="JabatanCk" id="JabatanCk" value="1"/>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                    <input  type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
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