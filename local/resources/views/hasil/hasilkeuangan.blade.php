@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php echo "Detail Calon Penyedia Batubara ".$data4->Nama.", ".$data4->BadanUsaha; ?></h2>
        <div class="row">
            <div class="col-md-12 clearfix">
                <div id="tab_content_data">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="javascript:void(0);" >KEUANGAN</a>
                        </li>
                    </ul>
                </div>
        </diV>

        <div class="row">
            <div class="col-lg-12">
                <h4>&nbsp;</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="success">
                                <th colspan="7">Nomor Pokok Wajib Pajak (NPWP)</th>
                            </tr>
                            <tr>
                                <td style="border:none;" width="130">No. NPWP</td>
                                <td style="border:none;" width="320">
                                    <div>{{$data2->NomorNPWP}}</div>
                                </td>
                                <td style="border:none;" colspan="4"></td>
                            </tr>
                            <tr class="success">
                                <th colspan="7">Rekening Perusahaan</th>
                            </tr>
                            <tr>
                                <td style="border:none;">No. Rekening</td>
                                <td style="border:none;">
                                    <div>{{$data2->NoRekening}}</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;" width="100">Nama Bank</td>
                                <td style="border:none;" width="320"
                                    <div>{{$data2->NamaBank}}</div>
                                </td>
                            </tr>
                            <tr class="success">
                                <th colspan="7">Bukti pelunasan pajak tahunan / Tahun terakhir</th>
                            </tr>
                            <tr>
                                <td style="border:none;">Nomor</td>
                                <td style="border:none;">
                                    <div>{{$data2->NomorBuktiPelunasan}}</div>  
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;" width="70">Tanggal</td>
                                <td style="border:none;">
                                    <div><?php if(!is_null($data2->TglBuktiPelunasan)) { echo date("d-m-Y", strtotime($data2->TglBuktiPelunasan));} ?></div>
                                </td>
                            </tr>
                            <tr class="success">
                                <th colspan="7">Laporan bulanan PPN, PPh tiga Bulan terakhir</th>
                            </tr>
                            <tr>
                                <td style="border:none;">Nomor</td>
                                <td style="border:none;">
                                    <div>{{$data2->NomorLaporanBulanan}}</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;">Tanggal</td>
                                <td style="border:none;">
                                    <div><?php if(!is_null($data2->TglLaporanBulanan)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan));} ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;">Nomor</td>
                                <td style="border:none;">
                                    <div>{{$data2->NomorLaporanBulanan2}}</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;">Tanggal</td>
                                <td style="border:none;">
                                    <div><?php if(!is_null($data2->TglLaporanBulanan2)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan2));} ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;">Nomor</td>
                                <td style="border:none;">
                                    <div>{{$data2->NomorLaporanBulanan3}}</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;">Tanggal</td>
                                <td style="border:none;">
                                    <div><?php if(!is_null($data2->TglLaporanBulanan3)) { echo date("d-m-Y", strtotime($data2->TglLaporanBulanan3));} ?></div>
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
                                <td style="border:none;" width="180">Activa Lancar</td>
                                <td style="border:none;" width="270">
                                    <div>{{$data3->ActivaLancar}} IDR</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;" width="180">Utang Jangka Pendek</td>
                                <td style="border:none;" width="270">
                                    <div>{{$data3->UtangJangkaPendek}} IDR</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;">Activa Tetap</td>
                                <td style="border:none;" width="220">
                                    <div>{{$data3->ActivaTetap}} IDR</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;">Utang Jangka Panjang</td>
                                <td style="border:none;">
                                    <div>{{$data3->UtangJangkaPanjang}} IDR</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;">Total Activa Lancar</td>
                                <td style="border:none;" width="220">
                                    <div>{{$data3->TotalActivaLancar}} IDR</div>
                                </td>
                                <td style="border:none;" width="30">&nbsp;</td>
                                <td style="border:none;">Kekayaan Bersih</td>
                                <td style="border:none;">
                                    <div>{{$data3->TotalKekayaan}} IDR</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;">Auditor</td>
                                <td style="border:none;">
                                    <div>{{$data3->Auditor}}</div>
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
                                    <a href="<?php echo 'hasilverifikasipeserta' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnnext" role="button" style="width:150px;">Selesai
                                            <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                            </td>  
                        <tr>
                    </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
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
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">No. KTP</td>
                                            <td style="border:none;">
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="ktp" id="ktp" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none; padding-top:15px;">Presentase Saham</td>
                                            <td style="border:none;"><a style="font-size:16px;">%</a>
                                                <div class="col-sm-4" style="padding-right: 5px;">
                                                    <input type="text" class="form-control" name="presentase" id="presentase" readonly="true"
                                                    style="border:none; background-color:#fff;">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
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