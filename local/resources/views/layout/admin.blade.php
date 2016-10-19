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
        <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('/css/fixed-style.css')}}">

        <script src="{{asset('js/jquery-2.1.4.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/plnbb_input.js')}}"></script>
        <script src="{{asset('js/plnbb_dropdown.js')}}"></script>
        <script src="{{asset('js/jquery.price_format.2.0.js')}}"></script>
        <script src="{{asset('js/jquery.mask.js')}}"></script>

        <style type="text/css">
            .well { background: #fff; text-align: center; }
            .modal { text-align: left; }
        </style>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#tgl_undangan_duediligence').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"dd-mm-yy",
                    onClose: function(dateText, int){
                        $(this).datepicker('option','dateFormat','dd-mm-yy');
                    }
                })

                $('#tgl_undangan_negosiasi').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"yy-mm-dd",
                    onClose: function(dateText, int){
                        $(this).datepicker('option','dateFormat','dd-mm-yy');
                    }
                })

                $('#tanggalijinentry').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"yy-mm-dd",
                    onClose: function(dateText, int){
                        $(this).datepicker('option','dateFormat','dd-mm-yy');
                    }
                })

                $('#masaberlakuijinentry').datepicker({
                    changeMonth:true,
                    changeYear:true,
                    yearRange:"-100:+20",
                    dateFormat:"yy-mm-dd",
                    onClose: function(dateText, int){
                        $(this).datepicker('option','dateFormat','dd-mm-yy');
                    }
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
                        <a style="font-size:16px;" href="<?php echo 'admin' ?>"><i class="fa fa-home"></i> PT. PLN BATUBARA</a>
                    </li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li><a href="javascript:void(0);"><?php echo Session::get('useradmin'); ?></a></li>
                    <li class="dropdown">
                            <a href="<?php echo 'logout' ?>"><i class="fa fa-sign-out"></i> KELUAR</a>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse scrollable">
                        <ul class="nav" id="side-menu" style="max-height: 600px; overflow-y:scroll;">
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli != '4') ?>
                            <li>
                                <a href="<?php echo 'notifikasi' ?>"><i class="fa fa-bell-o"></i> Notifikasi</span></a>
                            </li>
                            <?php ?>
                            <?php if ($uli != '4') { ?>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-check-square-o"></i> Verifikasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <?php $uli = Session::get('lvlid'); ?>
                                    <?php if(($uli != '3') && ($uli != '6') && ($uli != '7') && ($uli != '2')) { ?>
                                    <li>
                                        <a href="<?php echo 'pelaksanaverifikasi' ?>"> Pelaksana Verifikasi</a>
                                    </li>
                                    <?php } ?>
                                    <?php $uli = Session::get('lvlid'); ?>
                                    <?php if(($uli != '2') && ($uli != '5') && ($uli != '8') && ($uli != '9') && ($uli != '1')) { ?>
                                    <li>
                                        <a href="<?php echo 'verifikasi' ?>"> Verifikasi Peserta</a>
                                    </li>
                                    <?php } ?>
                                    <?php $uli = Session::get('lvlid'); ?>
                                    <?php if(($uli != '3') && ($uli != '6') && ($uli != '7')){ ?>
                                    <li>
                                        <a href="<?php echo 'hasilverifikasipeserta' ?>"> Persetujuan Verifikasi</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>          
                            <?php } ?>                 
                            <?php if(($uli != '2') && ($uli != '5') && ($uli != '8') && ($uli != '9')) { ?>
                            <li>
                                <a href="<?php echo 'dokumenpeserta' ?>"><i class="fa fa-book"></i> Dokumen Vendor</a>
                            </li>
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli != '4') { ?>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-list"></i> Rekapitulasi Peserta<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!-- <li>
                                        <a href="<?php //echo 'rekapitulasiverifikasi' ?>"> Rekapitulasi Hasil Verifikasi</a>
                                    </li> -->
                                    <?php if($uli == '1' || $uli == '2' || $uli == '5' || $uli == '8' || $uli == '9') { ?>
                                    <li>
                                        <a href="<?php echo 'viewrekapitulasidcpt' ?>"> Rekapitulasi DCPT</a>
                                    </li>
                                    <?php }else { ?>
                                    <li>
                                        <a href="<?php echo 'rekapitulasidcpt' ?>"> Rekapitulasi DCPT</a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo 'jumlahpeserta' ?>"> Jumlah Peserta</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli == '1'){ ?>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i> Due Diligence<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo 'undangduediligen' ?>"> Undangan Due Diligence</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'entrydataduediligence' ?>"> Entry Data Due Diligence</a>
                                    </li>                                  
                                    <li>
                                        <a href="<?php echo 'hasilduediligencepeserta' ?>"> Hasil Due Diligence</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if(($uli != '2') && ($uli != '5') && ($uli != '8') && ($uli != '9')){ ?>
                            <!--<li>
                                <a href="javascript:void(0);"><i class="fa fa-shopping-bag"></i> Penawaran<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="</?php echo 'undangpenawaran' ?>"> Undangan Penawaran</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'evaluasipenawaran' ?>"> Evaluasi Penawaran</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-comments"></i> Negosiasi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="</?php echo 'undangnego' ?>"> Undangan Negosiasi</a>
                                    </li>
                                    <li>
                                        <a href="</?php echo 'entrydatanegosiasi' ?>"> Entry Data Negosiasi</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="</?php echo 'suratpenunjukan' ?>"><i class="fa fa-paper-plane-o"></i> Surat Penunjukan</a>
                            </li>
                            <li>
                                <a href="</?php echo 'undangcda' ?>"><i class="fa fa-sticky-note"></i> Undangan CDA</a>
                            </li>
                            <li>
                                <a href="</?php echo 'undangkontrak' ?>"><i class="fa fa-pencil"></i> Undangan Kontrak</a>
                            </li>
                            <li>
                                <a href="</?php echo 'monitoringkontrak' ?>"><i class="fa fa-desktop"></i> Monitoring Kontrak</a>
                            </li>-->                       
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli <> '4') { ?>
                            <li>
                                <a href="<?php echo 'cetakformvendor' ?>"><i class="fa fa-print"></i> Cetak From Vendor</a>
                            </li>
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli == '1') { ?>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-cubes"></i> Master<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <li>
                                            <a href="<?php echo 'masterpengumuman' ?>">Master Pengumuman</a>
                                        </li>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'mastervendor' ?>">Master Vendor</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Master Pengguna<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo 'masteradmin' ?>"> Pengguna</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo 'gantipasswordadmin' ?>"> Ganti Password</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Master Brand Calori<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo 'mastercalori' ?>"> Calori</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo 'masterdetailcalori' ?>"> Brand Calori</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Master Wilayah<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">                                    
                                            <li>
                                                <a href="<?php echo 'provinsi' ?>"> Provinsi</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo 'kabupaten' ?>"> Kabupaten / Kota</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo 'kecamatan' ?>"> Kecamatan</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo 'kelurahan' ?>"> Kelurahan</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>                            
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli != '1') { ?>
                                <li>
                                    <a href="<?php echo 'gantipasswordadmin' ?>"> Ganti Password</a>
                                </li>
                            <?php } ?>
                            <?php $uli = Session::get('lvlid'); ?>
                            <?php if($uli == '1') { ?>
                            <li>
                                <a href="<?php echo 'dokumenmanual' ?>"><i class="fa fa-book"></i> Dokumen Manual</a>
                            </li>
                            <li>
                                <a href="<?php echo 'editdcpt' ?>"><i class="fa fa-pencil"></i> Edit DCPT</a>
                            </li>
                            <?php } ?>
                        </ul>
                    <div>
                </div>
            </nav>
        </div>

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
        <div style="bottom: 0; border-radius: 2px; text-align: center; width: 100%; color:#FFF; font-weight:500">Copyright &copy; PT. PLN BATUBARA 2015</div>
        <!-- END FOOTER -->

        <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/metisMenu.min.js')}}"></script>
        <script src="{{asset('js/startmin.js')}}"></script>
        <script src="{{asset('js/sweetalert.min.js')}}"></script>
        <script src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/js/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('js/jquery.blockUI.js')}}"></script>
        @include('Alerts::alerts')
    </body>
</html>