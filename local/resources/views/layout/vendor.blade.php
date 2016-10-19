<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PT. PLN BATUBARA</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/startmin.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('/css/fixed-style.css')}}">

        <script src="{{asset('js/jquery-2.1.4.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/plnbb_input.js')}}"></script>
        <script src="{{asset('js/plnbb_dropdown.js')}}"></script>
        <script src="{{asset('js/jquery.mask.js')}}"></script>
        <script src="{{asset('js/validator.min.js')}}"></script>

        <style type="text/css">
            .well { background: #fff; text-align: center; }
            .modal { text-align: left; }

            .dropdown-menu {
                background-color: #AFB9C2;
            }
        </style>

        <script type="text/javascript">
            jQuery(document).ready(function($) {

                $('#tgl_akta').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tgl_akta_perubahan').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tgl_pengesahan1').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                 $('#tgl_pengesahan2').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tgl_siup').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tglsd_siup').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate: 1
                })

                $('#tgl_tdp').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tglsd_tdp').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate: 1
                })

                $('#tgl_skdp').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tglsd_skdp').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#tgl_lahir').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy",
                })

                $('#tgl_pelunasan').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy",
                })

                $('#tgl_bulanan').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy",
                })

                $('#tgl_bulanan2').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy",
                })

                $('#tgl_bulanan3').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy",
                })

                $('#tgl_pengalaman').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#tgl_pengadaan').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })
                
                $('#tgl_teknis_tambang').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#masa_berlaku_iup').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#masa_berlaku_sertifikat').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#masa_berlaku').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#siup_tanggal').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#siup_jangkawaktu').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#siup_tanggalcnc').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#siup_jangkawaktucnc').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#iupopk_tanggal').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#iupopk_jangkawaktu').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#iupopk2_tanggal').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#iupopk2_jangkawaktu').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#tglsumber1').datepicker({
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#jangkawaktusumber1').datepicker({
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#tglsumber2').datepicker({
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#jangkawaktusumber2').datepicker({
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#tglsumberiup1').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#jangkawaktusumberiup1').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#tglsumberiup2').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#jangkawaktusumberiup2').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"1:+20",
                    dateFormat:"dd-mm-yy",
                    minDate:1
                })

                $('#pkp2b_tanggal').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy"
                })

                $('#Provinsi').change(function(){
                    $.get('kabupatenDropDownData/' + $(this).val(), function(data) {
                        if(data != null){
                            $('#KabupatenKota').empty();
                            $('#KabupatenKota').append("<option value='-1'>- Pilih Kabupaten / Kota -</option>");
                            $('#KabupatenKota').append(data);
                        } else {
                            $('#KabupatenKota').empty();
                            $('#KabupatenKota').append("<option value='-1'>- Pilih Kabupaten / Kota -</option>");
                        }
                    })     
                })

            });
        </script>


    </head>
    <body style="background:#f8f8f8;">
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- /.navbar-top-links -->
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li>
                        <a style="font-size:16px;" href="<?php echo 'vendorhome' ?>"><i class="fa fa-home"></i> PT. PLN BATUBARA</a>
                    </li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li><a href="javascript:void(0);"><?php echo Session::get('uservendor'); ?></a></li>
                    <li class="dropdown">
                            <a href="<?php echo 'logout' ?>"><i class="fa fa-sign-out"></i> KELUAR</a>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu" style="max-height: 600px; overflow-y:scroll;">
                            <li>
                                <a href="#"><i class="fa fa-pencil-square-o"></i> Pendaftaran<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo 'dataadministrasiperusahaan' ?>">Data Administrasi Perusahaan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'legalitasperijinanperusahaan' ?>">Legalitas Perijinan Perusahaan</a>
                                    </li>
                                    <!-- <li>
                                        <a href="<?php //echo 'datapersonelperusahaan' ?>">Data Personel Perusahaan</a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="<?php //echo 'armadatransportasi' ?>">Armada Transportasi</a>
                                    </li> -->
                                    <li>
                                        <a href="<?php echo 'legalitasperijinantambang' ?>">Legalitas Perijinan Tambang</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'datakeuangan' ?>">Data Keuangan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'datateknistambang' ?>">Data Teknis Tambang</a>
                                    </li>                                    
                                    <li>
                                        <a href="<?php echo 'pengalamanperusahaan' ?>">Pengalaman Perusahaan</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo 'kontrakpengadaanbatubara' ?>">Kontrak Pengadaan Batubara</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'kirimdokumen' ?>">Kirim Dokumen</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'paktaintegritas' ?>">Pakta Integritas</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-tasks"></i> Hasil Proses<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo 'hasilverifikasi' ?>">Hasil Verifikasi</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'hasilduediligence' ?>">Hasil Due Diligence</a>
                                    </li>
                                    <!--<li>
                                        <a href="</?php echo 'hasilnegosiasi' ?>">Hasil Negosiasi</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'hasilcda' ?>">Hasil CDA</a>
                                    </li>-->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-envelope"></i> Undangan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo 'undanganduediligence' ?>">Undangan Due Diligence</a>
                                    </li>
                                    <!--<li>
                                        <a href="</?php echo 'undanganpenawaran' ?>">Undangan Penawaran</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'undangannegosiasi' ?>">Undangan Negosiasi</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'undangansuratpenunjukan' ?>">Surat Penunjukan</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'undangancda' ?>">Undangan CDA</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'undangankontrak' ?>">Undangan Kontrak</a>
                                    </li>-->
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo 'gantipassword' ?>"><i class="fa fa-lock"></i> Ganti Password</a>
                            </li>
                            <?php if(Session::get('downloadpdf') == 'Y' ) { ?>
                            <li>
                                <a href="<?php echo 'PDFDCPT/'.Session::get('vendorid') ?>" target="_blank"><i class="fa fa-print"></i> Cetak Form</a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo 'panduanmanual' ?>"><i class="fa fa-book"></i> Panduan Manual</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        <!-- BEGIN FOOTER -->
        <div style="bottom: 0; border-radius: 2px; text-align: center; width: 100%; color:#FFF; font-weight:500">Copyright &copy; PT. PLN BATU BARA 2015</div>
        <!-- END FOOTER -->

        <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/metisMenu.min.js')}}"></script>
        <script src="{{asset('js/startmin.js')}}"></script>
        <script src="{{asset('js/sweetalert.min.js')}}"></script>
        <script src="{{asset('js/jquery.blockUI.js')}}"></script>
        @include('Alerts::alerts')

    </body>
</html>
