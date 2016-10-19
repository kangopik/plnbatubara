<!DOCTYPE html>
<html  lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>PT. PLN BATUBARA</title>

        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('css/fixed-style.css')}}">
    </head>
    <body style="background-color:#F5DEDE; width:99.9%;font-size: 10px;font-family: Verdana;">
        <div>
            <table style="vertical-align: middle;width: 100%; text-align: center" >
                <tbody>
                    <tr style="font-size: 12pt; font-family: Times New Roman;">
                        <td colspan="8" style="font-size: 10px; font-family: Verdana; width: 100%;">
                            <img src="{{asset('images/logoplnbb.jpg')}}" style="display: block;max-width:100%;max-height:35%;width:100%;height:300px;"></td>
                        
                    </tr>
                    <tr style="background-color:red;">
                        <td colspan="2" style="padding:1px; color:#fff;"><b>Registrasi</b></td>
                        <td colspan="2" style="padding:1px; color:#fff;"><b>Persyaratan</b></td>
                        <td colspan="2" style="padding:1px; color:#fff;"><b>Masuk</b></td>
                        <td colspan="2" style="padding:1px; color:#fff;"><b>Pencarian Pengumuman</b></td>
                    </tr>
                    <tr style="font-size:12px;">
                        <td style="text-align:center;">
                            <a href="<?php echo 'daftar' ?>">
                                <img src="{{asset('images/register-icon.jpg')}}" alt="" style="padding:1px;">
                            </a>
                        </td>
                        <td>
                            Penyedia barang/jasa<br />
                            yang ingin bergabung<br /> 
                            harus mendaftar untuk<br /> 
                            mendapatkan ID Login. 
                        </td>
                        <td style="text-align:center;">
                            <a href="<?php echo 'persyaratan' ?>">
                                <img src="{{asset('images/terms_and_conditions.jpg')}}" alt="" style="padding:1px;">
                            </a>
                        </td>
                        <td>
                            Persyaratan dan penggunaan<br />
                            situs PT. PLN Batubara 
                        </td>
                        <td colspan="2">
                            <table width=90%>
                                <form action="{{action('HomeController@ceklogin')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <tr>
                                    <td colspan="3" class="form-group has-feedback">
                                        <div data-tip="masukan username">
                                        <input data-tip="masukan username" type="text" class="form-control" placeholder="Username" name="form-username" value="<?php echo Session::get('username'); ?>" required="required" autofocus>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="form-group has-feedback">
                                        <div data-tip="masukan password">
                                        <input type="password" class="form-control" placeholder="Password" value="<?php echo Session::get('password'); ?>" name="form-password" required="required">
                                        </div>
                                    </td>
                                    <td width=20>&nbsp;</td>
                                </tr>
                                <tr style="font-size:12px;">
                                    <td width=85>
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                                    </td>
                                    <td width=20>&nbsp;</td>
                                    <td width=85>
                                        <input type="button" class="btn btn-primary btn-block btn-flat" onclick="location.href='<?php echo 'home' ?>';" value="Reset" />
                                    </td>
                                </tr>
                                </form>
                            </table>
                        </td>
                        <td colspan="2">
                            <table width=90%>
                                <form action="{{action('HomeController@caripengumuman')}}" method="post">
                                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                                <tr style="font-size:12px;">
                                    <td colspan="3">
                                        <div data-tip="masukan kata pencarian">
                                        <input type="text" class="form-control" placeholder="Cari Pengumuman" name="cari" id="cari" value="<?php echo Session::get('cari'); ?>" required="required">
                                        </div>
                                    </td>  
                                </tr>
                                <tr style="font-size:12px;"> 
                                    <td width=85>
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Cari</button>
                                    </td>
                                    <td width=20>&nbsp;</td>
                                    <td width=85>
                                        <input type="button" class="btn btn-primary btn-block btn-flat" onclick="location.href='<?php echo 'home' ?>';" value="Reset" />
                                    </td>                   
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                            </form>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="text-align:center;">
                        <td colspan="8" style="padding:2px;">
                            <b>Pengumuman Pengadaan Barang dan Jasa PT. PLN Batubara</b>
                        </td>
                    <tr>
                        <td colspan="8">
                            <table width=90%>
                                            <?php 
                                                if(!is_null($data)) { 
                                                foreach ($data as $row) {
                                            ?>
                                                <tr>
                                                        <h4><?php echo $row->Header ?></h4>
                                                        <p style="font-size:12px;"><?php echo date("d-m-Y", strtotime($row->Tanggal)) ?>
                                                            oleh
                                                            <?php echo $row->Nama ?>
                                                        <br />
                                            <?php           
                                                $string = strip_tags($row->Content);
                                                $string = substr($string, 0, 300);
                                                echo $string;
                                            ?>
                                                <br /><a href="<?php echo 'GetPengumuman/'.$row->Id ?> ">Baca Selengkapnya...</a>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            <?php
                                                }
                                                }
                                             ?>
                            </table>
                        </td>
                    </tr>
                    </tr>                    
                    <tr style="border:solid red 1px; background-color:red;">
                        <td style="text-align:center; color:#fff;" colspan="8" >PT. PLN Batubara &copy; 2016
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
  @include('Alerts::alerts')
</html>