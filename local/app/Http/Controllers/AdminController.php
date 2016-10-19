<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
  public function admin(){
    return view('admin.admin');
  }

  public function entrydataduediligence(){
    $adminid = \Session::get('adminid');

    if(!isset($adminid) || ($adminid == '')){
      alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
    }else{
      $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

      if($i == 1){
        $result = DB::table('dataadministrasiperusahaan')
                ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                ->join('datatambang', 'dataadministrasiperusahaan.UserId','=','datatambang.UserId')
                ->leftjoin('provinsi', 'datatambang.UserId','=','provinsi.ProvinsiId')
                ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                  'provinsi.ProvinsiName','dataadministrasiperusahaan.BadanUsaha')
                ->where('vendor.StatusHasilVerifikasi','=','Y')
                ->where('vendor.StatusUndanganDueDiligence','=','Y')
                ->where('vendor.StatusHasilDueDiligence','<>','Y')
                ->where('vendor.PersetujuanVerifikasi','=','Y')
                ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                ->get();
      } else {
        $result = DB::table('pelaksana')
                  ->join('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->join('datatambang', 'dataadministrasiperusahaan.UserId','=','datatambang.UserId')
                  ->leftjoin('provinsi', 'datatambang.UserId','=','provinsi.ProvinsiId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'provinsi.ProvinsiName','dataadministrasiperusahaan.BadanUsaha')
                  ->where('pelaksana.UserIdPelaksana','=',$adminid)
                  ->where('vendor.StatusHasilVerifikasi','=','Y')
                  ->where('vendor.StatusUndanganDueDiligence','=','Y')
                  ->where('vendor.StatusHasilDueDiligence','<>','Y')
                  ->where('vendor.PersetujuanVerifikasi','=','Y')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();
      }
        
     
        return view('admin.entrydataduediligence')->with('data',$result);
    }
  }

    public function entrydatanegosiasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusHasilPenawaran','=','Y')
                  ->where('vendor.StatusHasilNegosiasi','<>','Y')
                  ->where('vendor.StatusUndanganNegosiasi','=','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusHasilPenawaran','=','Y')
                    ->where('vendor.StatusHasilNegosiasi','<>','Y')
                    ->where('vendor.StatusUndanganNegosiasi','=','Y')
                    ->get();
        }  
      
      return view('admin.entrydatanegosiasi')->with('data',$result);
      }
    }

    public function evaluasipenawaran(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusUndanganDueDiligence','=','Y')
                  ->where('vendor.StatusUndanganPenawaran','=','Y')
                  ->where('vendor.StatusHasilPenawaran','<>','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusUndanganDueDiligence','=','Y')
                    ->where('vendor.StatusUndanganPenawaran','=','Y')
                    ->where('vendor.StatusHasilPenawaran','<>','Y')
                    ->get();
        }
        
        return view('admin.evaluasipenawaran')->with('data',$result);
      }
    }

    public function monitoringkontrak(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusHasilKontrak','=','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email')
                  ->get();
        return view('admin.monitoringkontrak')->with('data',$result);
      }
    }

    public function undangkontrak(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusUndanganCDA','=','Y')
                  ->where('vendor.StatusUndanganKontrak','<>','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha','dataadministrasiperusahaan.Email')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha','dataadministrasiperusahaan.Email')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusUndanganCDA','=','Y')
                    ->where('vendor.StatusUndanganKontrak','<>','Y')
                    ->get();
        }
        
        return view('admin.undangkontrak')->with('data',$result);
      }
    }

    public function suratpenunjukan(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusUndanganNegosiasi','=','Y')
                  ->where('vendor.StatusHasilNegosiasi','=','Y')
                  ->where('vendor.StatusSuratPenunjukan','<>','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusUndanganNegosiasi','=','Y')
                    ->where('vendor.StatusHasilNegosiasi','=','Y')
                    ->where('vendor.StatusSuratPenunjukan','<>','Y')
                    ->get();
        }

        return view('admin.suratpenunjukan')->with('data',$result);
      }
    }

    public function undangancda(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusSuratPenunjukan','=','Y')
                  ->where('vendor.StatusUndanganCDA','<>','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusSuratPenunjukan','=','Y')
                    ->where('vendor.StatusUndanganCDA','<>','Y')
                    ->get();
        }
        return view('admin.undangancda')->with('data',$result);
      }
    }

    public function undanganduediligence(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                    ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->where('vendor.StatusHasilVerifikasi','=','Y')
                    ->where('vendor.StatusUndanganDueDiligence','<>','Y')
                    ->where('vendor.PersetujuanVerifikasi','=','Y')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.Email',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.Email',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusHasilVerifikasi','=','Y')
                    ->where('vendor.StatusUndanganDueDiligence','<>','Y')
                    ->where('vendor.PersetujuanVerifikasi','=','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        }

        return view('admin.undanganduediligence')->with('data',$result);
      }
    }

    public function undangannegosiasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusUndanganNegosiasi','<>','Y')
                  ->where('vendor.StatusUndanganPenawaran','=','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha','dataadministrasiperusahaan.Email')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha','dataadministrasiperusahaan.Email')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusUndanganNegosiasi','<>','Y')
                    ->where('vendor.StatusUndanganPenawaran','=','Y')
                    ->get();
        }

        return view('admin.undangannegosiasi')->with('data',$result);
      }
    }

    public function undanganpenawaran(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusUndanganDueDiligence','=','Y')
                  ->where('vendor.StatusUndanganPenawaran','<>','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email','dataadministrasiperusahaan.BadanUsaha')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusUndanganDueDiligence','=','Y')
                    ->where('vendor.StatusUndanganPenawaran','<>','Y')
                    ->get();
        }

        return view('admin.undanganpenawaran')->with('data',$result);
      }
    }

    public function verifikasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                    ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.BadanUsaha',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email')
                    ->where('vendor.StatusHasilVerifikasi','<>','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        } else if($i == 3) {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.BadanUsaha',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email')
                    ->where('pelaksana.UserIdLegal','=',$adminid)
                    ->where('vendor.StatusHasilVerifikasiLegal','<>','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        } else if($i == 6) {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->leftjoin('hasilverifikasi', 'hasilverifikasi.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.BadanUsaha',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email')
                    ->where('pelaksana.UserIdFinance','=',$adminid)
                    ->where('vendor.StatusHasilVerifikasiFinance','<>','Y')
                    ->where('vendor.StatusHasilVerifikasiLegal','=','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        } else if($i == 7) {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->leftjoin('hasilverifikasi', 'hasilverifikasi.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.BadanUsaha',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email')
                    ->where('pelaksana.UserIdTechnical','=',$adminid)
                    ->where('vendor.StatusHasilVerifikasiTechnical','<>','Y')
                    ->where('vendor.StatusHasilVerifikasiLegal','=','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        }
          return view('admin.verifikasi')->with('data', $result);
      }
    }

    public function lolosverifikasi(){
      $adminid = \Session::get('adminid');
      $id = $_POST['vendoridconfirm'];

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('hasilverifikasi')->where('UserId', $id)->pluck('UserId');
        $level = DB::table('users')->where('UserId', $adminid)->pluck('UserlevelId');

        if($i > 0){
            if($level == 3 || $level == 1){
              $data1 = array(
                            'HasilVerifikasiLegal'   => '1',
                            'KeteranganLegal'        => 'Lolos Verifikasi Legal',
                            'Status'                 => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiLegal'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                         );
            }else if($level == 6 || $level == 1){
              $data1 = array(
                            'HasilVerifikasiFinance'   => '1',
                            'KeteranganFinance'        => 'Lolos Verifikasi Keuangan',
                            'Status'                   => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiFinance'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }if($level == 7 || $level == 1){
              $data1 = array(
                            'HasilVerifikasiTechnical'   => '1',
                            'KeteranganTechnical'        => 'Lolos Verifikasi Teknis',
                            'Status'                     => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiTechnical'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }
      
            $x = DB::table('hasilverifikasi')->where('UserId',$id)->update($data1);

            $i = DB::table('vendor')->where('UserId',$id)->update($data2);
        } else {
            if($level == 3 || $level == 1){
              $data1 = array(
                            'UserId'                 => $id,
                            'HasilVerifikasiLegal'   => '1',
                            'KeteranganLegal'        => 'Lolos Verifikasi Legal',
                            'Status'                 => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiLegal'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }else if($level == 6 || $level == '1'){
              $data1 = array(
                            'UserId'                   => $id,
                            'HasilVerifikasiFinance'   => '1',
                            'KeteranganFinance'        => 'Lolos Verifikasi Finance',
                            'Status'                   => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiFinance'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }if($level == 7 || $level == 1){
              $data1 = array(
                            'UserId'                     => $id,
                            'HasilVerifikasiTechnical'   => '1',
                            'KeteranganTechnical'        => 'Lolos Verifikasi Technical',
                            'Status'                     => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiTechnical'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }
            $x = DB::table('hasilverifikasi')->insert($data1);

            $i = DB::table('vendor')->where('UserId',$id)->update($data2);
        }

        if(!is_null($x) && (!is_null($i))){
          if($level == 3 || $level == 1){
              $pemberi = DB::table('pelaksana')->where('UserIdPeserta',$id)->where('UserIdLegal',$adminid)
                  ->pluck('UserIdPemberiLegal');
          }else if($level == 6 || $level == 1){
              $pemberi = DB::table('pelaksana')->where('UserIdPeserta',$id)->where('UserIdFinance',$adminid)
                  ->pluck('UserIdPemberiFinance');
          }else if($level == 7 || $level == 1){
              $pemberi = DB::table('pelaksana')->where('UserIdPeserta',$id)->where('UserIdTechnical',$adminid)
                  ->pluck('UserIdPemberiTechnical');
          }
        
          $vendornama = DB::table('dataadministrasiperusahaan')->where('UserId',$id)->pluck('Nama');
          $vendorbadan = DB::table('dataadministrasiperusahaan')->where('UserId',$id)->pluck('BadanUsaha');

          $data = array(
                          'MessageFrom'   => $adminid,
                          'MessageTo'     => $pemberi,
                          'MessageHeader' => $vendornama.','.$vendorbadan.' Lolos Verifikasi',
                          'MessageDetail' => $vendornama.','.$vendorbadan.' Lolos Verifikasi',
                        );
          $x = DB::table('messsages')->insert($data);


          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'verifikasi peserta',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          alert()->success('BERHASIL', 'Lolos Verifikasi');
          return back();

        } else {
          alert()->error('GAGAL', 'Lolos Verifikasi');
          return back();
        }
      }
    }

    public function gagalverifikasi(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $post   = $request->all();
        $vendorid = $_POST['vendorid'];

        if(!isset($_POST['catatan']))
            $catatan = '';
        else
            $catatan = $_POST['catatan'];

        if(!isset($_POST['ckDataAdministrasi']))
            $ckDataAdministrasi = '0';
        else
            $ckDataAdministrasi = '1';

        if(!isset($_POST['ckLegalitasPerijinan']))
            $ckLegalitasPerijinan = '0';
        else
            $ckLegalitasPerijinan = '1';

        if(!isset($_POST['ckDataPengurus']))
            $ckDataPengurus = '0';
        else
            $ckDataPengurus = '1';

        if(!isset($_POST['ckDataPersonel']))
            $ckDataPersonel = '0';
        else
            $ckDataPersonel = '1';

        if(!isset($_POST['ckDataKeuangan']))
            $ckDataKeuangan = '0';
        else
            $ckDataKeuangan = '1';

        if(!isset($_POST['ckArmadaTransportasi']))
            $ckArmadaTransportasi = '0';
        else
            $ckArmadaTransportasi = '1';

        if(!isset($_POST['ckPengalamanPerusahaan']))
            $ckPengalamanPerusahaan = '0';
        else
            $ckPengalamanPerusahaan = '1';

        if(!isset($_POST['ckKontrakPengadaan']))
            $ckKontrakPengadaan = '0';
        else
            $ckKontrakPengadaan = '1';

        if(!isset($_POST['ckLegalitasPerijinanTambang']))
            $ckLegalitasPerijinanTambang = '0';
        else
            $ckLegalitasPerijinanTambang = '1';

        if(!isset($_POST['ckDataTeknis']))
            $ckDataTeknis = '0';
        else
            $ckDataTeknis = '1';

        if(!isset($_POST['ckKirimDokumen']))
            $ckKirimDokumen = '0';
        else
            $ckKirimDokumen = '1';
        
        $i = DB::table('hasilverifikasi')->where('UserId', $vendorid)->pluck('UserId');

        $level = DB::table('users')->where('UserId', $adminid)->pluck('UserlevelId');

        $hslnotif = DB::table('notifikasiverifikasi')->where('UserId', $vendorid)->count();
        if($hslnotif > 0){
            $delnotif = DB::table('notifikasiverifikasi')->where('UserId', $vendorid)->delete();
        }

        if($i < 1){
            if($level == 3 || $level == 1){
              $data1 = array(
                            'UserId'            => $vendorid,
                            'HasilVerifikasiLegal'   => '2',
                            'KeteranganLegal'        => $catatan,
                            'Status'                 => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiLegal'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                         );
            }else if($level == 6 || $level == 1){
              $data1 = array(
                            'UserId'            => $vendorid,
                            'HasilVerifikasiFinance'   => '2',
                            'KeteranganFinance'        => $catatan,
                            'Status'                   => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiFinance'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }if($level == 7 || $level == 1){
              $data1 = array(
                            'UserId'            => $vendorid,
                            'HasilVerifikasiTechnical'   => '2',
                            'KeteranganTechnical'        => $catatan,
                            'Status'                     => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiTechnical'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }
            $x = DB::table('hasilverifikasi')->insert($data1);
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data2);
        } else {
            if($level == 3 || $level == 1){
              $data1 = array(
                            'HasilVerifikasiLegal'   => '2',
                            'KeteranganLegal'        => $catatan,
                            'Status'                 => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiLegal'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                         );
            }else if($level == 6 || $level == 1){
              $data1 = array(
                            'HasilVerifikasiFinance'   => '2',
                            'KeteranganFinance'        => $catatan,
                            'Status'                   => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiFinance'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }if($level == 7 || $level == 1){
              $data1 = array(
                            'HasilVerifikasiTechnical'   => '2',
                            'KeteranganTechnical'        => $catatan,
                            'Status'                     => '0',
                         );
              $data2 = array(
                            'StatusHasilVerifikasi'    => 'N',
                            'StatusHasilVerifikasiTechnical'=> 'Y',
                            'StatusHasilDueDiligence'  => 'N',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                            'PersetujuanVerifikasi'    => 'N',
                            );
            }
            $x = DB::table('hasilverifikasi')->where('UserId', $vendorid)->update($data1);
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data2);
        }


        $data = array(
                        'UserId'                      => $vendorid,
                        'ckDataAdministrasi'          => $ckDataAdministrasi,
                        'ckLegalitasPerijinan'        => $ckLegalitasPerijinan,
                        'ckDataPengurus'              => $ckDataPengurus,
                        'ckDataPersonel'              => $ckDataPersonel,
                        'ckDataKeuangan'              => $ckDataKeuangan,
                        'ckArmadaTransportasi'        => $ckArmadaTransportasi,
                        'ckPengalamanPerusahaan'      => $ckPengalamanPerusahaan,
                        'ckKontrakPengadaan'          => $ckKontrakPengadaan,
                        'ckLegalitasPerijinanTambang' => $ckLegalitasPerijinanTambang,
                        'ckDataTeknis'                => $ckDataTeknis,
                        'ckKirimDokumen'              => $ckKirimDokumen,
                        'statusAll'                   => '0',
                      );

        $insnotif = DB::table('notifikasiverifikasi')->insert($data);

        if(!is_null($x) && (!is_null($i))){     
          if($level == 3 || $level == 1){
              $pemberi = DB::table('pelaksana')->where('UserIdPeserta',$vendorid)->where('UserIdLegal',$adminid)
                  ->pluck('UserIdPemberiLegal');
          }else if($level == 6 || $level == 1){
              $pemberi = DB::table('pelaksana')->where('UserIdPeserta',$vendorid)->where('UserIdFinance',$adminid)
                  ->pluck('UserIdPemberiFinance');
          }else if($level == 7 || $level == 1){
              $pemberi = DB::table('pelaksana')->where('UserIdPeserta',$vendorid)->where('UserIdTechnical',$adminid)
                  ->pluck('UserIdPemberiTechnical');
          }  
          
          $vendornama = DB::table('dataadministrasiperusahaan')->where('UserId',$vendorid)->pluck('Nama');
          $vendorbadan = DB::table('dataadministrasiperusahaan')->where('UserId',$vendorid)->pluck('BadanUsaha');

          $data = array(
                          'MessageFrom'   => $adminid,
                          'MessageTo'     => $pemberi,
                          'MessageHeader' => $vendornama.','.$vendorbadan.' Gagal Verifikasi',
                          'MessageDetail' => $catatan,
                        );
          $x = DB::table('messsages')->insert($data);

          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'verifikasi peserta',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          alert()->success('BERHASIL', 'Gagal Verifikasi');
          return back();
        } else {
          alert()->error('GAGAL', 'Gagal Verifikasi');
          return back();
        }
      }
    }

    public function aksiundanguediligence(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $post = $request->all();

        $vendorid = $_POST['vendorid'];

        $i = DB::table('undanganduediligence')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                        'UserId'        => $vendorid,
                        'Hari'          => $_POST['hari'],
                        'Tanggal'       => date("Y-m-d", strtotime($_POST['tgl_undangan_duediligence'])),
                        'Pukul'         => $_POST['pukul'],
                        'Tempat'        => $_POST['tempat'],
                        'ContactPerson' => $_POST['cp'],
                      );
            $x = DB::table('undanganduediligence')->insert($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'N',
                            'StatusUndanganNegosiasi'        => 'N',
                            'StatusUndanganCDA'              => 'N',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                        'Hari'          => $_POST['hari'],
                        'Tanggal'       => date("Y-m-d", strtotime($_POST['tgl_undangan_duediligence'])),
                        'Pukul'         => $_POST['pukul'],
                        'Tempat'        => $_POST['tempat'],
                        'ContactPerson' => $_POST['cp'],
                      );
            $x = DB::table('undanganduediligence')->where('UserId', $vendorid)->update($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'N',
                            'StatusUndanganNegosiasi'        => 'N',
                            'StatusUndanganCDA'              => 'N',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        \Session::flash('email_nama', $_POST['namavendor']);
        \Session::flash('email_alamat', $_POST['alamatvendor']);
        \Session::flash('email_hari', $_POST['hari'].' / '.date("Y-m-d", strtotime($_POST['tgl_undangan_duediligence'])));
        \Session::flash('email_pukul', $_POST['pukul']);
        \Session::flash('email_tempat', $_POST['tempat']);
        \Session::flash('email_cp', $_POST['cp']);

        $emailData = [  
                        'to'       => $_POST['emailvendor'],
                        'name'     => $_POST['alamatvendor'],
                        'subject'  => 'Undangan Due Diligence PT. PLN BATU BARA',
                        'view'     => 'email.undanganduediligence'
                    ];

                    Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                        $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                    });

        \Session::flash('email_nama', '');
        \Session::flash('email_alamat', '');
        \Session::flash('email_hari', '');
        \Session::flash('email_pukul', '');
        \Session::flash('email_tempat', '');
        \Session::flash('email_cp', '');

        if(!is_null($x) && (!is_null($i))){
          alert()->success('BERHASIL', 'Undang Due Diligence Vendor');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'undang due diligence',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Undang Due Diligence Vendor');
          return back();
        }
      }
    }

    public function aksiundangpenawaran(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $post = $request->all();

        $vendorid = $_POST['vendorid'];

        $i = DB::table('undanganpenawaran')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                        'UserId'          => $vendorid,
                        'PenawaranHarga'  => $_POST['batas_akhir'],
                        'HardCopy'        => $_POST['hard_copy'],
                        'ContactPerson'   => $_POST['cp'],
                      );
            $x = DB::table('undanganpenawaran')->insert($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'N',
                            'StatusUndanganCDA'              => 'N',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                        'PenawaranHarga'  => $_POST['batas_akhir'],
                        'HardCopy'        => $_POST['hard_copy'],
                        'ContactPerson'   => $_POST['cp'],
                      );
            $x = DB::table('undanganpenawaran')->where('UserId', $vendorid)->update($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'N',
                            'StatusUndanganCDA'              => 'N',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        \Session::flash('email_nama', $_POST['namavendor']);
        \Session::flash('email_alamat', $_POST['alamatvendor']);
        \Session::flash('email_batas_akhir', $_POST['batas_akhir']);
        \Session::flash('email_hard_copy', $_POST['hard_copy']);
        \Session::flash('email_cp', $_POST['cp']);

        $emailData = [  
                        'to'       => $_POST['emailvendor'],
                        'name'     => $_POST['alamatvendor'],
                        'subject'  => 'Undangan Penawaran PT. PLN BATU BARA',
                        'view'     => 'email.undanganpenawaran'
                    ];

                    Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                        $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                    });

        \Session::flash('email_nama', '');
        \Session::flash('email_alamat', '');
        \Session::flash('email_batas_akhir', '');
        \Session::flash('email_hard_copy', '');
        \Session::flash('email_cp', '');

        if(!is_null($x) && (!is_null($i))){
          alert()->success('BERHASIL', 'Undang Penawaran Vendor');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'undang penawaran',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Undang Penawaran Vendor');
          return back();
        }
      }
    }

    public function aksiundangnegosiasi(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $post = $request->all();

        $vendorid = $_POST['vendorid'];

        $i = DB::table('undangannegosiasi')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                        'UserId'        => $vendorid,
                        'Hari'          => $_POST['hari'],
                        'Tanggal'       => date("Y-m-d", strtotime($_POST['tgl_undangan_negosiasi'])),
                        'Pukul'         => $_POST['pukul'],
                        'Tempat'        => $_POST['tempat'],
                        'Acara'         => $_POST['acara'],
                        'ContactPerson' => $_POST['cp'],
                      );
            $x = DB::table('undangannegosiasi')->insert($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'Y',
                            'StatusUndanganCDA'              => 'N',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                        'Hari'          => $_POST['hari'],
                        'Tanggal'       => date("Y-m-d", strtotime($_POST['tgl_undangan_negosiasi'])),
                        'Pukul'         => $_POST['pukul'],
                        'Tempat'        => $_POST['tempat'],
                        'Acara'         => $_POST['acara'],
                        'ContactPerson' => $_POST['cp'],
                      );
            $x = DB::table('undangannegosiasi')->where('UserId', $vendorid)->update($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'Y',
                            'StatusSuratPenunjukan'          => 'N',
                            'StatusUndanganCDA'              => 'N',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        \Session::flash('email_nama', $_POST['namavendor']);
        \Session::flash('email_alamat', $_POST['alamatvendor']);
        \Session::flash('email_hari', $_POST['hari'].' / '.date("Y-m-d", strtotime($_POST['tgl_undangan_negosiasi'])));
        \Session::flash('email_pukul', $_POST['pukul']);
        \Session::flash('email_tempat', $_POST['tempat']);
        \Session::flash('email_acara', $_POST['acara']);
        \Session::flash('email_cp', $_POST['cp']);

        $emailData = [  
                        'to'       => $_POST['emailvendor'],
                        'name'     => $_POST['alamatvendor'],
                        'subject'  => 'Undangan Negosiasi PT. PLN BATU BARA',
                        'view'     => 'email.undangannegosiasi'
                    ];

                    Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                        $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                    });

        \Session::flash('email_nama', '');
        \Session::flash('email_alamat', '');
        \Session::flash('email_hari', '');
        \Session::flash('email_pukul', '');
        \Session::flash('email_tempat', '');
        \Session::flash('email_acara', '');
        \Session::flash('email_cp', '');

        if(!is_null($x) && (!is_null($i))){
          alert()->success('BERHASIL', 'Undang Negosiasi Vendor');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'undang negosiasi',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Undang Negosiasi Vendor');
          return back();
        }
      }
    }

    public function aksiundangcda(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $post = $request->all();

        $vendorid = $_POST['vendorid'];

        $i = DB::table('undangancda')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                        'UserId'        => $vendorid,
                        'Hari'          => $_POST['hari'],
                        'Tanggal'       => date("Y-m-d", strtotime($_POST['tgl_undangan_cda'])),
                        'Pukul'         => $_POST['pukul'],
                        'Tempat'        => $_POST['tempat'],
                        'Acara'         => $_POST['acara'],
                        'ContactPerson' => $_POST['cp'],
                      );
            $x = DB::table('undangancda')->insert($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'Y',
                            'StatusSuratPenunjukan'          => 'Y',
                            'StatusUndanganCDA'              => 'Y',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                        'Hari'          => $_POST['hari'],
                        'Tanggal'       => date("Y-m-d", strtotime($_POST['tgl_undangan_cda'])),
                        'Pukul'         => $_POST['pukul'],
                        'Tempat'        => $_POST['tempat'],
                        'Acara'         => $_POST['acara'],
                        'ContactPerson' => $_POST['cp'],
                      );
            $x = DB::table('undangancda')->where('UserId', $vendorid)->update($data);

            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'Y',
                            'StatusUndanganCDA'              => 'Y',
                            'StatusUndanganKontrak'          => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        \Session::flash('email_nama', $_POST['namavendor']);
        \Session::flash('email_alamat', $_POST['alamatvendor']);
        \Session::flash('email_hari', $_POST['hari'].' / '.date("Y-m-d", strtotime($_POST['tgl_undangan_cda'])));
        \Session::flash('email_pukul', $_POST['pukul']);
        \Session::flash('email_tempat', $_POST['tempat']);
        \Session::flash('email_acara', $_POST['acara']);
        \Session::flash('email_cp', $_POST['cp']);

        $emailData = [  
                        'to'       => $_POST['emailvendor'],
                        'name'     => $_POST['alamatvendor'],
                        'subject'  => 'Undangan CDA PT. PLN BATU BARA',
                        'view'     => 'email.undangancda'
                    ];

                    Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                        $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                    });

        \Session::flash('email_nama', '');
        \Session::flash('email_alamat', '');
        \Session::flash('email_hari', '');
        \Session::flash('email_pukul', '');
        \Session::flash('email_tempat', '');
        \Session::flash('email_acara', '');
        \Session::flash('email_cp', '');

        if(!is_null($x) && (!is_null($i))){
          alert()->success('BERHASIL', 'Undang CDA Vendor');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'undang CDA',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Undang CDA Vendor');
          return back();
        }
      }
    }

    public function mastervendor(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('vendor')
                  ->join('dataadministrasiperusahaan', 'vendor.UserId', '=', 
                    'dataadministrasiperusahaan.UserId')
                  ->select('vendor.UserId', 'dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email')
                  ->get();
        return view('admin.masteruser')->with('data',$result);
      }
    }

    public function aksideletevendor(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $post = $request->all();
        $vid = $_POST['vendorid'];

        $a = DB::table('hasilcda')->where('UserId',$vid)->delete();
        $b = DB::table('hasilduediligence')->where('UserId',$vid)->delete();
        $c = DB::table('hasilnegosiasi')->where('UserId',$vid)->delete();
        $d = DB::table('hasilverifikasi')->where('UserId',$vid)->delete();
        $e = DB::table('undangancda')->where('UserId',$vid)->delete();
        $f = DB::table('undanganduediligence')->where('UserId',$vid)->delete();
        $g = DB::table('undangankontrak')->where('UserId',$vid)->delete();
        $h = DB::table('undangannegosiasi')->where('UserId',$vid)->delete();
        $i = DB::table('undanganpenawaran')->where('UserId',$vid)->delete();
        $j = DB::table('armadatransportasi')->where('UserId',$vid)->delete();
        $k = DB::table('dataadministrasiperusahaan')->where('UserId',$vid)->delete();
        $l = DB::table('dataperijinanperusahaan')->where('UserId',$vid)->delete();
        $m = DB::table('datateknistambang')->where('UserId',$vid)->delete();
        $n = DB::table('direksiperusahaan')->where('UserId',$vid)->delete();
        $o = DB::table('komisarisperusahaan')->where('UserId',$vid)->delete();
        $p = DB::table('kontrakpengadaan')->where('UserId',$vid)->delete();
        $q = DB::table('neraca')->where('UserId',$vid)->delete();
        $r = DB::table('pajak')->where('UserId',$vid)->delete();
        $s = DB::table('pengalamanperusahaan')->where('UserId',$vid)->delete();
        $t = DB::table('saranapengangkut')->where('UserId',$vid)->delete();
        $u = DB::table('spesifikasibatubara')->where('UserId',$vid)->delete();
        $v = DB::table('susunankepemilikansaham')->where('UserId',$vid)->delete();
        $w = DB::table('tenagaahli')->where('UserId',$vid)->delete();
        $x = DB::table('vendor')->where('UserId',$vid)->delete();
        $x = DB::table('evaluasipenawaran')->where('UserId',$vid)->delete();
        $x = DB::table('hasildatateknistambang')->where('UserId',$vid)->delete();
        $x = DB::table('hasilsaranapengangkut')->where('UserId',$vid)->delete();
        $x = DB::table('hasilspesifikasibatubara')->where('UserId',$vid)->delete();
        $x = DB::table('iupopkhusus')->where('UserId',$vid)->delete();
        $x = DB::table('iupopumum')->where('UserId',$vid)->delete();
        $x = DB::table('pelaksana')->where('UserIdPeserta',$vid)->delete();
        $x = DB::table('siup')->where('UserId',$vid)->delete();
        $x = DB::table('suratpenunjukan')->where('UserId',$vid)->delete();
        $x = DB::table('users')->where('UserId',$vid)->delete();

        alert()->success('BERHASIL', 'Hapus Data Vendor');
        $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'hapus vendor',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
        return back();
      }
    }

    public function masterpengumuman(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('pengumuman')->get();
        
        return view('admin.pengumuman')->with('data', $result);
      }
    }

    public function addpengumuman(){
        return view('admin.addpengumuman');
    }

    public function editpengumuman($id){
        \Session::put('pospengumumanid',$id);
        return Redirect('updatepengumuman');
    }

    public function updatepengumuman(){
        $id = \Session::get('pospengumumanid');
        $result = DB::table('pengumuman')->where('Id',$id)->first();
        
        return view('admin.editpengumuman')->with('data',$result);
    }

    public function aksisavepengumuman(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        if(!isset($_POST['idpengumuman']))
            $idp = '-1';
        else
            $idp = $_POST['idpengumuman'];

        $i = DB::table('pengumuman')->where('Id', $idp)->pluck('Id');

        if($i < 1){
            $data = array(
                        'UserId'        => $adminid,
                        'Header'        => $_POST['pheader'],
                        'Content'       => $_POST['pcontent'],
                        'Tanggal'       => date("Y-m-d H:i:s"),
                      );
            $x = DB::table('pengumuman')->insert($data);

        } else {
            $data = array(
                        'UserId'        => $adminid,
                        'Header'        => $_POST['pheader'],
                        'Content'       => $_POST['pcontent'],
                        'Tanggal'       => date("Y-m-d H:i:s"),
                      );
            $x = DB::table('pengumuman')->where('Id', $idp)->update($data);

        }

        if(!is_null($x)){
          alert()->success('BERHASIL', 'Simpan Pengumuman');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan pengumuman',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return redirect('masterpengumuman');
        } else {
          alert()->error('GAGAL', 'Simpan Pengumuman');
          return back();
        }
      }
    }

    public function aksideletepengumuman(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $idp = $_POST['idpengumuman2'];

        $a = DB::table('pengumuman')->where('Id',$idp)->delete();
        alert()->success('BERHASIL', 'Hapus Data Pengumuman');
        $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'hapus pengumuman',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
        return back();
      }
    }

    public function dokumenpeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

      $result = DB::table('dokumen')
                  ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','dokumen.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat')
                  ->orderBy('dataadministrasiperusahaan.Nama')
                  ->get();
        return view('admin.dokumen')->with('data',$result);
      }
    }

    public function detaildokumen($id){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

      \Session::put('idvendor',$id);
      return Redirect('DetailDokumenPeserta');
      }
    }

    public function detaildokumenpeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

      $userid = \Session::get('idvendor');

      $result = DB::table('dokumen')->where('UserId', $userid)->get();

      return view('admin.detaildokumen')->with('data',$result);
      }
    }    

    public function masteradmin(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

      $result = DB::table('users')->leftjoin('userlevel','users.UserlevelId','=','userlevel.UserlevelId')
                                  ->select('users.UserId','users.Nama','users.Username','users.Password','users.UserLevelId as uli',
                                    'userlevel.UserLevelName','users.EmailUser')
                                  ->where('userlevel.UserlevelId','<>','4')
                                  ->get();
      return view('admin.pengguna')->with('data',$result);
      }
    }

    public function gantipasswordadmin(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        return view('admin.passwordadmin');
      }
    }

    public function aksisavepengguna(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $pass = md5(sha1(md5(base64_encode(md5($_POST['password'])))));

        $idp = $_POST['admid'];

        $i = DB::table('users')->where('UserId', $idp)->pluck('UserId');

        if($i < 1){ 
          $data = array(
                        'Username'    => $_POST['username'],
                        'Password'    => $pass,
                        'Nama'        => $_POST['nama'],
                        'EmailUser'   => $_POST['email'],
                        'UserlevelId' => $_POST['hakakses'],
                      );
          $x = DB::table('users')->insert($data);
        } else {
          $data = array(
                        'EmailUser'   => $_POST['email'],
                        'UserlevelId' => $_POST['hakakses'],
                      );
          $x = DB::table('users')->where('UserId',$idp)->update($data);
        }

        if(!is_null($x)){
          alert()->success('BERHASIL', 'Simpan Pengguna');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Pengguna',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Simpan Pengguna');
          return back();
        }
      }
    }

    public function aksideletepengguna(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $idp = $_POST['admid2'];
        $adminid = (string)\Session::get('adminid');

        if($idp == $adminid){
            alert()->success('GAGAL', 'Pengguna Sedang Aktif');
            return back();
        }else{
            $x = DB::table('users')->where('UserId',$idp)->delete();

            alert()->success('BERHASIL', 'Hapus Data Pengguna');
            $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'hapus pengguna',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
            return back();
        }
      }
    }

    public function savepasswordadmin(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $userid = \Session::get('adminid');

        $pass = md5(sha1(md5(base64_encode(md5($_POST['pass'])))));

        $data = array(
                        'Password'  => $pass,
                      );
        
        $i = DB::table('users')->where('UserId','=', $userid)->update($data);

        if(is_null($i)){   
            alert()->error('GAGAL', 'Simpan Password');
            return back();         
        }else{
            alert()->success('BERHASIL', 'Simpan Password');
            $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'ganti password',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
            return back();
        }
      }
    }

    public function pelaksanaverifikasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $result = DB::table('paktaintegritas')
                  ->leftjoin('dataadministrasiperusahaan', 'paktaintegritas.UserId','=','dataadministrasiperusahaan.UserId')
                  ->leftjoin('pelaksana', 'dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                  ->leftjoin('datatambang','dataadministrasiperusahaan.userid','=','datatambang.userid')
                  ->leftjoin('provinsi','provinsi.ProvinsiId','=','datatambang.Provinsi')
                  ->leftjoin('vendor','paktaintegritas.UserId','=','vendor.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.BadanUsaha',
                    'provinsi.ProvinsiName','pelaksana.UserIdLegal','pelaksana.UserIdFinance','pelaksana.UserIdTechnical',
                    'vendor.StatusHasilVerifikasiLegal','vendor.PersetujuanVerifikasi', 'vendor.PersetujuanLegal')
                  ->orderBy('dataadministrasiperusahaan.UserId','ASC')
                  ->get();

        $result2 = DB::table('users')
                    ->select('Nama as nm','UserId as ui')
                    ->where('UserlevelId','=','3')
                    ->get();

        $result3 = DB::table('users')
                    ->select('Nama as nm','UserId as ui')
                    ->where('UserlevelId','=','6')
                    ->get();

        $result4 = DB::table('users')
                    ->select('Nama as nm','UserId as ui')
                    ->where('UserlevelId','=','7')
                    ->get();

        $result5 = DB::table('users')->where('UserId','=',$adminid)->pluck('UserlevelId');
                 
        return view('admin.pelaksanaverifikasi')->with('data', $result)->with('data2',$result2)
                    ->with('data3',$result3)->with('data4',$result4)->with('data5',$result5);
      }
    }

    public function aksisavepelaksana(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('pelaksana')->where('UserIdPeserta', $_POST['UserId'])->first();

        if(!isset($_POST['StaffLegal']))
            $UserIdLegal = '';
        else
            $UserIdLegal   = $_POST['StaffLegal'];

        if(!isset($_POST['StaffFinance']))
            $UserIdFinance = '';
        else
            $UserIdFinance   = $_POST['StaffFinance'];

        if(!isset($_POST['StaffTechnical']))
            $UserIdTechnical = '';
        else
            $UserIdTechnical   = $_POST['StaffTechnical'];

        $usr = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');
        
        if(is_null($i)){
          if($usr == '5'){
              $data = array(
                        'UserIdLegal'       => $UserIdLegal,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiLegal'     => $adminid,
                      );
              $x = DB::table('pelaksana')->insert($data);
          }else if($usr == '8'){
              $data = array(
                        'UserIdFinance'     => $UserIdFinance,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiFinance'     => $adminid,
                      );
              $x = DB::table('pelaksana')->insert($data);
          }else if($usr == '9'){
              $data = array(
                        'UserIdTechnical'   => $UserIdTechnical,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiTechnical'     => $adminid,
                      );
              $x = DB::table('pelaksana')->insert($data);
          }else if($usr == '1'){
            $cekv = DB::table('vendor')->where('UserId',$_POST['UserId'])->pluck('PersetujuanLegal');
            if($cekv == 'Y'){
              if($UserIdFinance <> '' && $UserIdTechnical == ''){
                $data = array(
                        'UserIdFinance'     => $UserIdFinance,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiFinance'     => $adminid,
                      );
                $x = DB::table('pelaksana')->insert($data);
              }else if($UserIdFinance == '' && $UserIdTechnical <> ''){
                $data = array(
                        'UserIdTechnical'   => $UserIdTechnical,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiTechnical'     => $adminid,
                      );
                $x = DB::table('pelaksana')->insert($data);
              }else if($UserIdFinance <> '' && $UserIdTechnical <> ''){
                $data = array(
                        'UserIdFinance'     => $UserIdFinance,
                        'UserIdTechnical'   => $UserIdTechnical,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiTechnical'     => $adminid,
                      );
                $x = DB::table('pelaksana')->insert($data);
              }
            }else{
              $data = array(
                        'UserIdLegal'       => $UserIdLegal,
                        'UserIdPeserta'     => $_POST['UserId'],
                        'UserIdPemberiLegal'     => $adminid,
                      );
              $x = DB::table('pelaksana')->insert($data);
            }
          }
        } else {
          if($usr == '5'){
              $data = array(
                        'UserIdLegal'       => $UserIdLegal,
                        'UserIdPemberiLegal'     => $adminid,
                      );
              $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
          }else if($usr == '8'){
              $data = array(
                        'UserIdFinance'     => $UserIdFinance,
                        'UserIdPemberiFinance'     => $adminid,
                      );
              $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
          }else if($usr == '9'){
              $data = array(
                        'UserIdTechnical'   => $UserIdTechnical,
                        'UserIdPemberiTechnical'     => $adminid,
                      );
              $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
          }else if($usr == '1'){
            $cekv = DB::table('vendor')->where('UserId',$_POST['UserId'])->pluck('PersetujuanLegal');
            if($cekv == 'Y'){
              if($UserIdFinance <> '' && $UserIdTechnical == ''){
                $data = array(
                        'UserIdFinance'     => $UserIdFinance,
                        'UserIdPemberiFinance'     => $adminid,
                      );
                $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
              }else if($UserIdFinance == '' && $UserIdTechnical <> ''){
                $data = array(
                        'UserIdTechnical'   => $UserIdTechnical,
                        'UserIdPemberiTechnical'     => $adminid,
                      );
                $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
              }else if($UserIdFinance <> '' && $UserIdTechnical <> ''){
                $data = array(
                        'UserIdFinance'     => $UserIdFinance,
                        'UserIdTechnical'   => $UserIdTechnical,
                        'UserIdPemberiFinance'     => $adminid,
                      );
                $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
              }
            }else{
              $data = array(
                        'UserIdLegal'       => $UserIdLegal,
                        'UserIdPemberiLegal'     => $adminid,
                      );
              $x = DB::table('pelaksana')->where('UserIdPeserta',$_POST['UserId'])->update($data);
            }
          }
        }

        if(!is_null($x)){
          if ($UserIdLegal != ''){
            $data = array(
                            'MessageFrom'   => $adminid,
                            'MessageTo'     => $UserIdLegal,
                            'MessageHeader' => 'Anda di assign untuk legal verificator',
                            'MessageDetail' => 'Anda di assign untuk legal verificator'
                          );
            $x = DB::table('messsages')->insert($data);
          }

          if ($UserIdFinance != ''){
            $data = array(
                            'MessageFrom'   => $adminid,
                            'MessageTo'     => $UserIdFinance,
                            'MessageHeader' => 'Anda di assign untuk finance verificator',
                            'MessageDetail' => 'Anda di assign untuk finance verificator'
                          );
            $x = DB::table('messsages')->insert($data);
          }

          if ($UserIdTechnical != ''){
            $data = array(
                            'MessageFrom'   => $adminid,
                            'MessageTo'     => $UserIdTechnical,
                            'MessageHeader' => 'Anda di assign untuk technical verificator',
                            'MessageDetail' => 'Anda di assign untuk technical verificator'
                          );
            $x = DB::table('messsages')->insert($data);
          }

          alert()->success('BERHASIL', 'Assign Pelaksana');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'assign pelaksana',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Assign Pelaksana');
          return back();
        }
      }
    }

    public function hasilverifikasipeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('paktaintegritas')
                  ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')
                  ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->select('vendor.UserId','dataadministrasiperusahaan.Nama as Nama','dataadministrasiperusahaan.BadanUsaha as BadanUsaha',
                            'dataadministrasiperusahaan.Alamat as Alamat','vendor.PersetujuanLegal','vendor.PersetujuanFinance',
                            'vendor.PersetujuanTechnical', 'vendor.PersetujuanVerifikasi')
                  ->where('vendor.PersetujuanVerifikasi','<>','Y')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

        $resultLegal1 = DB::table('paktaintegritas')
                      ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')                      
                      ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->join('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                      ->join('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                      ->join('nilaiverifikasi','nilaiverifikasi.Id','=','hasilverifikasi.HasilVerifikasiLegal')
                      ->join('users','users.UserId','=','pelaksana.UserIdLegal')
                      ->select('vendor.UserId as UserId', 'nilaiverifikasi.Nama as nilai', 'hasilverifikasi.KeteranganLegal','users.Nama as nama')
                      ->where('vendor.PersetujuanVerifikasi','<>','Y')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();

        $resultLegal2 = DB::table('paktaintegritas')
                      ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')                      
                      ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->join('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                      ->join('users','users.UserId','=','pelaksana.UserIdLegal')
                      ->select('vendor.UserId as UserId', 'users.Nama as nama')
                      ->where('vendor.PersetujuanVerifikasi','<>','Y')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();

        $resultFinance1 = DB::table('paktaintegritas')
                      ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')           
                      ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')           
                      ->join('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                      ->join('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                      ->join('nilaiverifikasi','nilaiverifikasi.Id','=','hasilverifikasi.HasilVerifikasiFinance')
                      ->join('users','users.UserId','=','pelaksana.UserIdFinance')
                      ->select('vendor.UserId as UserId', 'nilaiverifikasi.Nama as nilai', 'hasilverifikasi.KeteranganFinance','users.Nama as nama')
                      ->where('vendor.PersetujuanVerifikasi','<>','Y')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();

        $resultFinance2 = DB::table('paktaintegritas')
                      ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')           
                      ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')           
                      ->join('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                      ->join('users','users.UserId','=','pelaksana.UserIdFinance')
                      ->select('vendor.UserId as UserId', 'users.Nama as nama')
                      ->where('vendor.PersetujuanVerifikasi','<>','Y')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();

        $resultTechnical1 = DB::table('paktaintegritas')
                      ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')           
                      ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')           
                      ->join('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                      ->join('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                      ->join('nilaiverifikasi','nilaiverifikasi.Id','=','hasilverifikasi.HasilVerifikasiTechnical')
                      ->join('users','users.UserId','=','pelaksana.UserIdTechnical')
                      ->select('vendor.UserId as UserId', 'nilaiverifikasi.Nama as nilai', 'hasilverifikasi.KeteranganTechnical','users.Nama as nama')
                      ->where('vendor.PersetujuanVerifikasi','<>','Y')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();

        $resultTechnical2 = DB::table('paktaintegritas')
                      ->join('vendor','vendor.UserId','=','paktaintegritas.UserId')           
                      ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')           
                      ->join('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                      ->join('users','users.UserId','=','pelaksana.UserIdTechnical')
                      ->select('vendor.UserId as UserId', 'users.Nama as nama')
                      ->where('vendor.PersetujuanVerifikasi','<>','Y')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();

        $resultuser = DB::table('users')->where('UserId','=',$adminid)->pluck('UserlevelId');
        
        return view('admin.hasilverifikasi')->with('data',$result)->with('dataLegal1',$resultLegal1)->with('dataLegal2',$resultLegal2)
                                            ->with('dataFinance1',$resultFinance1)->with('dataFinance2',$resultFinance2)
                                            ->with('dataTechnical1',$resultTechnical1)->with('dataTechnical2',$resultTechnical2)
                                            ->with('datauser',$resultuser);
      }
    }

    public function persetujuan(){
      $adminid = \Session::get('adminid');
      $id = $_POST['vendoridsetuju'];

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          $usr = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');
          $hsllegal = DB::table('vendor')->where('UserId',$id)->pluck('PersetujuanLegal');
          $hslfinance = DB::table('vendor')->where('UserId',$id)->pluck('PersetujuanFinance');
          $hsltechnical = DB::table('vendor')->where('UserId',$id)->pluck('PersetujuanTechnical');
          $stafflegal = DB::table('vendor')->where('UserId',$id)->pluck('StatusHasilVerifikasiLegal');
          $stafffinance = DB::table('vendor')->where('UserId',$id)->pluck('StatusHasilVerifikasiFinance');
          $stafftechnical = DB::table('vendor')->where('UserId',$id)->pluck('StatusHasilVerifikasiTechnical');

          if($usr == '2' || $usr == '1'){
            if($hsllegal == 'N' && $hslfinance == 'N' && $hsltechnical == 'N'){
              if($stafflegal <> 'N'){
                $data = array(
                              'PersetujuanLegal'  => 'Y',
                            );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Legal');
                    return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Legal');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance == 'N' && $hsltechnical == 'N'){
              if($stafffinance <> 'N'){
                $data = array(
                              'PersetujuanFinance'  => 'Y',
                            );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Finance');
                    return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Finance');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance <> 'N' && $hsltechnical == 'N'){
              if($stafftechnical <> 'N'){
                $data = array(
                              'PersetujuanTechnical'  => 'Y',
                            );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Technical');
                    return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Technical');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance == 'N' && $hsltechnical <> 'N'){
              if($stafffinance <> 'N'){
                $data = array(
                              'PersetujuanFinance'  => 'Y',
                            );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Finance');
                    return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Finance');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance <> 'N' && $hsltechnical <> 'N'){
              $data = array(
                            'StatusHasilVerifikasi'  => 'Y',
                            'PersetujuanVerifikasi'  => 'Y',
                          );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);

              $data = array(
                              'Status'  => '1',
                            );
              $z = DB::table('hasilverifikasi')->where('UserId',$id)->update($data);
            }
          }else if ($usr == '5'){
            if($stafflegal <> 'N'){
              $data = array(
                            'PersetujuanLegal'  => 'Y',
                          );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);
              alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Legal');
                  return back();
            }else{
              alert()->error('GAGAL', 'Belum Verifikasi Staff Legal');
              return back();
            }
          }else if ($usr == '8'){
            if($stafffinance <> 'N'){
              $data = array(
                            'PersetujuanFinance'  => 'Y',
                          );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);
              alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Finance');
                  return back();
            }else{
              alert()->error('GAGAL', 'Belum Verifikasi Staff Finance');
              return back();
            }
          }else if ($usr == '9'){
            if($stafftechnical <> 'N'){
              $data = array(
                            'PersetujuanTechnical'  => 'Y',
                          );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);
              alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi Technical');
                  return back();
            }else{
              alert()->error('GAGAL', 'Belum Verifikasi Staff Technical');
              return back();
            }
          }

          $hitungnotif = DB::table('notifikasiverifikasi')->where('UserId',$id)->count();

          if($hitungnotif > 0){
            $data = array(
                          'statusAll'  => '1',
                          );
            $m = DB::table('notifikasiverifikasi')->where('UserId',$id)->update($data);
          }

          if(!is_null($i)){
            if($usr == '2' || $usr == '1'){
              if($hsllegal <> 'N' && $hslfinance <> 'N' && $hsltechnical <> 'N'){
                $emailadmin = DB::table('users')->where('UserId',$adminid)->first();

                $VendorData = DB::table('dataadministrasiperusahaan')
                              ->select('dataadministrasiperusahaan.Nama as Nama', 'dataadministrasiperusahaan.Alamat as Alamat', 
                                        'dataadministrasiperusahaan.Email as Email',
                                        'hasilverifikasi.KeteranganLegal as KeteranganLegal', 'hasilverifikasi.KeteranganFinance as KeteranganFinance', 
                                        'hasilverifikasi.KeteranganTechnical as KeteranganTechnical')
                              ->join('vendor','dataadministrasiperusahaan.UserId','=','vendor.UserId')
                              ->leftjoin('hasilverifikasi','dataadministrasiperusahaan.UserId','=','hasilverifikasi.UserId')
                              ->where('dataadministrasiperusahaan.UserId',$id)
                              ->first();

                \Session::flash('email_nama', $VendorData->Nama);
                \Session::flash('email_alamat', $VendorData->Alamat);
                \Session::flash('email_hasil', 'Hasil Verifikasi');
                \Session::flash('email_keterangan', $VendorData->KeteranganLegal.' ,'.$VendorData->KeteranganFinance.' ,'.$VendorData->KeteranganTechnical);

                try{
                  $emailData = [  
                                'to'       => $VendorData->Email,
                                //'cc'       => $emailadmin->EmailUser,
                                'name'     => $VendorData->Nama,
                                //'name2'     => $emailadmin->Nama,
                                'subject'  => 'Hasil Verifikasi Pengadaan Batubara PT. PLN BATU BARA',
                                'view'     => 'email.hasilverifikasi'
                            ];

                  Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                                $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                                //$message->cc($emailData['cc'], $emailData['name2'])->subject($emailData['subject']);
                            });
                  alert()->success('BERHASIL', 'Lolos Persetujuan Verifikasi');
                  return back();
                } catch (Exception $e) {
                  $data = array(
                              'StatusHasilVerifikasi'  => 'N',
                              'PersetujuanVerifikasi'  => 'N',
                            );
                  $i = DB::table('vendor')->where('UserId',$id)->update($data);

                  $data = array(
                              'Status'  => '0',
                            );
                  $z = DB::table('hasilverifikasi')->where('UserId',$id)->update($data);

                  $hitungnotif = DB::table('notifikasiverifikasi')->where('UserId',$id)->count();

                  if($hitungnotif > 0){
                    $data = array(
                                  'statusAll'  => '0',
                                  );
                    $m = DB::table('notifikasiverifikasi')->where('UserId',$id)->update($data);
                  }
                }
              }  
            }
          }else{
            alert()->error('GAGAL', 'Gagal Persetujuan Verifikasi');
            return back();
          }
      }
    }

    public function persetujuan2(){
      $adminid = \Session::get('adminid');
      $id = $_POST['vendoridtidak'];

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          $usr = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');
          $hsllegal = DB::table('vendor')->where('UserId',$id)->pluck('PersetujuanLegal');
          $hslfinance = DB::table('vendor')->where('UserId',$id)->pluck('PersetujuanFinance');
          $hsltechnical = DB::table('vendor')->where('UserId',$id)->pluck('PersetujuanTechnical');
          $stafflegal = DB::table('vendor')->where('UserId',$id)->pluck('StatusHasilVerifikasiLegal');
          $stafffinance = DB::table('vendor')->where('UserId',$id)->pluck('StatusHasilVerifikasiFinance');
          $stafftechnical = DB::table('vendor')->where('UserId',$id)->pluck('StatusHasilVerifikasiTechnical');

          if($usr == '2' || $usr == '1'){
            if($hsllegal == 'N' && $hslfinance == 'N' && $hsltechnical == 'N'){
              if($stafflegal <> 'N'){
                $data = array(
                                'PersetujuanLegal'  => 'X',
                                'PersetujuanFinance'  => 'X',
                                'PersetujuanTechnical'  => 'X',
                                'StatusHasilVerifikasiFinance' => 'Y',
                                'StatusHasilVerifikasiTechnical' => 'Y',
                              );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                $data1 = array(
                                'HasilVerifikasiFinance'   => '2',
                                'HasilVerifikasiTechnical'   => '2',
                                'KeteranganFinance'        => 'Gagal Verifikasi',
                                'KeteranganTechnical'        => 'Gagal Verifikasi',
                                'Status'                 => '0',
                             );
                $i = DB::table('hasilverifikasi')->where('UserId',$id)->update($data1);
                alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Legal');
                      return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Legal');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance == 'N' && $hsltechnical == 'N'){
              if($stafffinance <> 'N'){
                $data = array(
                                'PersetujuanFinance'  => 'X',
                              );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Finance');
                      return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Finance');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance <> 'N' && $hsltechnical == 'N'){
              if($stafftechnical <> 'N'){
                $data = array(
                                'PersetujuanTechnical'  => 'X',
                              );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Technical');
                      return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Technical');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance == 'N' && $hsltechnical <> 'N'){
              if($stafffinance <> 'N'){
                $data = array(
                                'PersetujuanFinance'  => 'X',
                              );
                $i = DB::table('vendor')->where('UserId',$id)->update($data);
                alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Finance');
                      return back();
              }else{
                alert()->error('GAGAL', 'Belum Verifikasi Staff Finance');
                return back();
              }
            }else if($hsllegal <> 'N' && $hslfinance <> 'N' && $hsltechnical <> 'N'){
              $data = array(
                              'StatusHasilVerifikasi'  => 'Y',
                              'PersetujuanVerifikasi'  => 'X',
                            );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);

              $data = array(
                              'Status'  => '2',
                            );
              $z = DB::table('hasilverifikasi')->where('UserId',$id)->update($data);
            }
          }else if ($usr == '5'){
            if($stafflegal <> 'N'){
              $data = array(
                              'PersetujuanLegal'  => 'X',
                              'PersetujuanFinance'  => 'X',
                              'PersetujuanTechnical'  => 'X',
                              'StatusHasilVerifikasiFinance' => 'Y',
                              'StatusHasilVerifikasiTechnical' => 'Y',
                            );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);
              $data1 = array(
                              'HasilVerifikasiFinance'   => '2',
                              'HasilVerifikasiTechnical'   => '2',
                              'KeteranganFinance'        => 'Gagal Verifikasi',
                              'KeteranganTechnical'        => 'Gagal Verifikasi',
                              'Status'                 => '0',
                           );
              $i = DB::table('hasilverifikasi')->where('UserId',$id)->update($data1);
              alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Legal');
                    return back();
            }else{
              alert()->error('GAGAL', 'Belum Verifikasi Staff Legal');
              return back();
            }
          }else if ($usr == '8'){
            if($stafffinance <> 'N'){
              $data = array(
                              'PersetujuanFinance'  => 'X',
                            );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);
              alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Finance');
                    return back();
            }else{
              alert()->error('GAGAL', 'Belum Verifikasi Staff Finance');
              return back();
            }
          }else if ($usr == '9'){
            if($stafftechnical <> 'N'){
              $data = array(
                              'PersetujuanTechnical'  => 'X',
                            );
              $i = DB::table('vendor')->where('UserId',$id)->update($data);
              alert()->success('BERHASIL', 'Tidak Menyetujui Verifikasi Technical');
                    return back();
            }else{
              alert()->error('GAGAL', 'Belum Verifikasi Staff Technical');
              return back();
            }
          }

          $hitungnotif = DB::table('notifikasiverifikasi')->where('UserId',$id)->count();

          if($hitungnotif > 0){
            $data = array(
                          'statusAll'  => '1',
                          );
            $m = DB::table('notifikasiverifikasi')->where('UserId',$id)->update($data);
          }

          if(!is_null($i)){
            if($usr == '2' || $usr == '1'){
              if($hsllegal <> 'N' && $hslfinance <> 'N' && $hsltechnical <> 'N'){
                $emailadmin = DB::table('users')->where('UserId',$adminid)->first();

                $VendorData = DB::table('dataadministrasiperusahaan')
                              ->select('dataadministrasiperusahaan.Nama as Nama', 'dataadministrasiperusahaan.Alamat as Alamat', 
                                        'dataadministrasiperusahaan.Email as Email',
                                        'hasilverifikasi.KeteranganLegal as KeteranganLegal', 'hasilverifikasi.KeteranganFinance as KeteranganFinance', 
                                        'hasilverifikasi.KeteranganTechnical as KeteranganTechnical')
                              ->join('vendor','dataadministrasiperusahaan.UserId','=','vendor.UserId')
                              ->leftjoin('hasilverifikasi','dataadministrasiperusahaan.UserId','=','hasilverifikasi.UserId')
                              ->where('dataadministrasiperusahaan.UserId',$id)
                              ->first();

                \Session::flash('email_nama', $VendorData->Nama);
                \Session::flash('email_alamat', $VendorData->Alamat);
                \Session::flash('email_hasil', 'Hasil Verifikasi');
                \Session::flash('email_keterangan', $VendorData->KeteranganLegal.' ,'.$VendorData->KeteranganFinance.' ,'.$VendorData->KeteranganTechnical);

                try {
                  $emailData = [  
                                'to'       => $VendorData->Email,
                                //'cc'       => $emailadmin->EmailUser,
                                'name'     => $VendorData->Nama,
                                //'name2'     => $emailadmin->Nama,
                                'subject'  => 'Hasil Verifikasi Pengadaan Batubara PT. PLN BATU BARA',
                                'view'     => 'email.hasilverifikasi'
                            ];

                  Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                                $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                                //$message->cc($emailData['cc'], $emailData['name2'])->subject($emailData['subject']);
                            });
                  alert()->success('BERHASIL', 'Gagal Persetujuan Verifikasi');
                  return back();
                } catch (Exception $e) {
                  $data = array(
                              'StatusHasilVerifikasi'  => 'N',
                              'PersetujuanVerifikasi'  => 'N',
                            );
                  $i = DB::table('vendor')->where('UserId',$id)->update($data);

                  $data = array(
                              'Status'  => '0',
                            );
                  $z = DB::table('hasilverifikasi')->where('UserId',$id)->update($data);

                  $hitungnotif = DB::table('notifikasiverifikasi')->where('UserId',$id)->count();

                  if($hitungnotif > 0){
                    $data = array(
                                  'statusAll'  => '0',
                                  );
                    $m = DB::table('notifikasiverifikasi')->where('UserId',$id)->update($data);
                  }
                }
              }
            }
          } else {
            alert()->error('GAGAL', 'Gagal Persetujuan Verifikasi');
            return back();
          }
      }
    }

    public function hasilduediligencepeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                    ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email','dataadministrasiperusahaan.BadanUsaha')
                    ->where('vendor.PersetujuanVerifikasi','=','Y')
                    ->where('vendor.StatusHasilDueDiligence','<>','Y')
                    ->where('vendor.StatusUndanganDueDiligence','=','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.PersetujuanVerifikasi','=','Y')
                    ->where('vendor.StatusHasilDueDiligence','<>','Y')
                    ->where('vendor.StatusUndanganDueDiligence','=','Y')
                    ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                    ->get();
        }
        return view('admin.hasilduediligence')->with('data', $result);
      }
    }

    public function lolosduediligence(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $id = $_POST['vendoridconfirm'];
        $i = DB::table('hasilduediligence')->where('UserId', $id)->pluck('UserId');

        if($i > 0){
            $data = array(
                            'HasilDueDiligence'   => '1',
                            'keterangan'          => '',
                         );
            $x = DB::table('hasilduediligence')->where('UserId',$id)->update($data);

            $data = array(
                            'StatusHasilVerifikasi'    => 'Y',
                            'StatusHasilDueDiligence'  => 'Y',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$id)->update($data);
        } else {
            $data = array(
                        'UserId'              => $id,
                        'HasilDueDiligence'   => '1',
                        'keterangan'          => '',
                      );
            $x = DB::table('hasilduediligence')->insert($data);

            $data = array(
                            'StatusHasilVerifikasi'    => 'Y',
                            'StatusHasilDueDiligence'  => 'Y',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$id)->update($data);
        }

        if(!is_null($x) && (!is_null($i))){
          \Session::flash('email_nama', $_POST['namavendorconfirm']);
          \Session::flash('email_alamat', $_POST['alamatvendorconfirm']);
          \Session::flash('email_hasil', 'Lolos Due Diligence');
          \Session::flash('email_keterangan', '');

          $emailData = [  
                          'to'       => $_POST['emailvendorconfirm'],
                          'name'     => $_POST['namavendorconfirm'],
                          'subject'  => 'Hasil Due Diligence Pengadaan Batubara PT. PLN BATU BARA',
                          'view'     => 'email.hasilduediligence'
                      ];

                      Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                          $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                      });

          \Session::flash('email_nama', '');
          \Session::flash('email_alamat', '');
          \Session::flash('email_hasil', '');
          \Session::flash('email_keterangan', '');

          /*$emailadmin = DB::table('users')->select('EmailUser')->where('UserlevelId','2')->first();
          $namaadmin = DB::table('users')->select('Nama')->where('UserlevelId','2')->first();

          \Session::flash('email_nama', $_POST['namavendorconfirm']);
          \Session::flash('email_alamat', $_POST['alamatvendorconfirm']);
          \Session::flash('email_hasil', 'Lolos Verifikasi');
          \Session::flash('email_keterangan', '');

          $emailData = [  
                          'to'       => $emailadmin,
                          'name'     => $namaadmin,
                          'subject'  => 'Hasil Verifikasi Pengadaan Batubara PT. PLN BATU BARA',
                          'view'     => 'email.hasilverifikasi'
                      ];

                      Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                          $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                      });

          \Session::flash('email_nama', '');
          \Session::flash('email_alamat', '');
          \Session::flash('email_hasil', '');
          \Session::flash('email_keterangan', '');*/

          alert()->success('BERHASIL', 'Hasil Due Diligence');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'lolos due diligence',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Hasil Due Diligence');
          return back();
        }
      }
    }

    public function gagalduediligence(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        
        $vendorid = $_POST['vendorid'];

        if(!isset($_POST['catatan']))
            $catatan = '';
        else
            $catatan = $_POST['catatan'];
        
        $i = DB::table('hasilduediligence')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                        'UserId'              => $vendorid,
                        'HasilDueDiligence'   => '2',
                        'keterangan'          => $catatan,
                      );
            $x = DB::table('hasilduediligence')->insert($data);

            $data = array(
                            'StatusHasilVerifikasi'    => 'Y',
                            'StatusHasilDueDiligence'  => 'Y',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                        'HasilDueDiligence'   => '2',
                        'keterangan'          => $catatan,
                      );
            $x = DB::table('hasilduediligence')->where('UserId', $vendorid)->update($data);

            $data = array(
                            'StatusHasilVerifikasi'    => 'Y',
                            'StatusHasilDueDiligence'  => 'Y',
                            'StatusHasilPenawaran'     => 'N',
                            'StatusHasilNegosiasi'     => 'N',
                            'StatusSuratPenunjukan'    => 'N',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        if(!is_null($x) && (!is_null($i))){
          \Session::flash('email_nama', $_POST['namavendorconfirm']);
          \Session::flash('email_alamat', $_POST['alamatvendorconfirm']);
          \Session::flash('email_hasil', 'Gagal Due Diligence');
          \Session::flash('email_keterangan', $_POST['catatan']);

          $emailData = [  
                          'to'       => $_POST['emailvendorconfirm'],
                          'name'     => $_POST['namavendorconfirm'],
                          'subject'  => 'Hasil Due Diligence Pengadaan Batubara PT. PLN BATU BARA',
                          'view'     => 'email.hasilduediligence'
                      ];

                      Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                          $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                      });

          \Session::flash('email_nama', '');
          \Session::flash('email_alamat', '');
          \Session::flash('email_hasil', '');
          \Session::flash('email_keterangan', '');

          /*$emailadmin = DB::table('users')->select('EmailUser')->where('UserlevelId','2')->first();
          $namaadmin = DB::table('users')->select('Nama')->where('UserlevelId','2')->first();

          \Session::flash('email_nama', $_POST['namavendorconfirm']);
          \Session::flash('email_alamat', $_POST['alamatvendorconfirm']);
          \Session::flash('email_hasil', 'Lolos Verifikasi');
          \Session::flash('email_keterangan', '');

          $emailData = [  
                          'to'       => $emailadmin,
                          'name'     => $namaadmin,
                          'subject'  => 'Hasil Verifikasi Pengadaan Batubara PT. PLN BATU BARA',
                          'view'     => 'email.hasilverifikasi'
                      ];

                      Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                          $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                      });

          \Session::flash('email_nama', '');
          \Session::flash('email_alamat', '');
          \Session::flash('email_hasil', '');
          \Session::flash('email_keterangan', '');*/

          alert()->success('BERHASIL', 'Hasil Due Diligence');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'gagal due diligence',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Hasil Due Diligence');
          return back();
        }
      }
    }

    public function rekapitulasiverifikasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('hasilverifikasi')
                  ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','hasilverifikasi.UserId')
                  ->leftjoin('vendor','dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat',
                           'hasilverifikasi.HasilVerifikasiLegal', 'hasilverifikasi.HasilVerifikasiFinance',
                           'hasilverifikasi.HasilVerifikasiTechnical', 'dataadministrasiperusahaan.BadanUsaha')
                  ->where('vendor.PersetujuanVerifikasi','<>','N')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

        return view('admin.rekapitulasiverifikasi')->with('data',$result);
      }
    }

    public function rekapitulasidcpt(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('vendor')
                  ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->leftjoin('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat',
                    'dataadministrasiperusahaan.BadanUsaha','vendor.PersetujuanVerifikasi','vendor.PersetujuanLegal',
                    'vendor.PersetujuanFinance','vendor.PersetujuanTechnical')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

        $resultuser = DB::table('users')->where('UserId','=',$adminid)->pluck('UserlevelId');

        return view('admin.rekapitulasidcpt')->with('data',$result)->with('datauser',$resultuser);
      }
    }

    public function aksiundangsuratpenunjukan(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $vendorid = $_POST['vendorid'];

        if(!isset($_POST['lingkup']))
          $lingkup = '';
        else
          $lingkup = $_POST['lingkup'];

        if(!isset($_POST['volume']))
          $volume = '';
        else
          $volume = $_POST['volume'];

        $i = DB::table('suratpenunjukan')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                        'UserId'              => $vendorid,
                        'Lingkup'             => $lingkup,
                        'Volume'              => $volume,
                        'Spesifikasi'         => 'Seperti terlampir',
                        'Surat'               => 'Dapat diambil di Kantor PT PLN Batubara',
                      );
            $x = DB::table('suratpenunjukan')->insert($data);

            $data = array(
                            'StatusHasilVerifikasi'    => 'Y',
                            'StatusHasilDueDiligence'  => 'Y',
                            'StatusHasilPenawaran'     => 'Y',
                            'StatusHasilNegosiasi'     => 'Y',
                            'StatusSuratPenunjukan'    => 'Y',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                        'Lingkup'             => $lingkup,
                        'Volume'              => $volume,
                        'Spesifikasi'         => 'Seperti terlampir',
                        'Surat'               => 'Dapat diambil di Kantor PT PLN Batubara',
                      );
            $x = DB::table('suratpenunjukan')->where('UserId', $vendorid)->update($data);

            $data = array(
                            'StatusHasilVerifikasi'    => 'Y',
                            'StatusHasilDueDiligence'  => 'Y',
                            'StatusHasilPenawaran'     => 'Y',
                            'StatusHasilNegosiasi'     => 'Y',
                            'StatusSuratPenunjukan'    => 'Y',
                            'StatusHasilCDA'           => 'N',
                            'StatusHasilKontrak'       => 'N',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        \Session::flash('email_nama', $_POST['namavendor']);
        \Session::flash('email_alamat', $_POST['alamatvendor']);
        \Session::flash('email_lingkup', $_POST['lingkup']);
        \Session::flash('email_volume', $_POST['volume']);

        $emailData = [  
                        'to'       => $_POST['emailvendor'],
                        'name'     => $_POST['alamatvendor'],
                        'subject'  => 'Undangan Surat Penunjukan PT. PLN BATU BARA',
                        'view'     => 'email.suratpenunjukan'
                    ];

                    Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                        $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                    });

        \Session::flash('email_nama', '');
        \Session::flash('email_alamat', '');
        \Session::flash('email_lingkup', '');
        \Session::flash('email_volume', '');

        if(!is_null($x) && (!is_null($i))){
          alert()->success('BERHASIL', 'Simpan Data');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'undang surat penunjukan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Simpan Data');
          return back();
        }
      }
    }

    public function jumlahpeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $hitung = DB::table('dataadministrasiperusahaan')->count();

        if($hitung < 1){
            $resultmasuk = null;
            $resultlolos = null;
            $resultgagal = null;
        }else{ 
            DB::statement(DB::raw('set @row1:=0'));
            $resultmasuk = DB::table('paktaintegritas')
                     ->leftjoin('dataadministrasiperusahaan','paktaintegritas.UserId','=','dataadministrasiperusahaan.UserId')
                     ->select(DB::raw('@row1:=@row1+1 as No, dataadministrasiperusahaan.Nama as Nama, 
                            dataadministrasiperusahaan.Alamat as Alamat, dataadministrasiperusahaan.BadanUsaha'))
                     ->groupBy('Nama')
                     ->paginate(5);

            DB::statement(DB::raw('set @row2:=0'));
            $resultlolos = DB::table('hasilverifikasi as h')
                     ->leftjoin('dataadministrasiperusahaan as p','p.UserId','=','h.UserId')
                     ->select(DB::raw('@row2:=@row2+1 as No, p.Nama, p.Alamat, p.BadanUsaha'))
                     ->groupBy('Nama')
                     ->where('h.Status','=','1')
                     ->paginate(5);

            DB::statement(DB::raw('set @row3:=0'));
            $resultgagal = DB::table('hasilverifikasi as h')
                     ->leftjoin('dataadministrasiperusahaan as p','p.UserId','=','h.UserId')
                     ->select(DB::raw('@row3:=@row3+1 as No, p.Nama, p.Alamat, p.BadanUsaha'))
                     ->groupBy('Nama')
                     ->where('h.Status','=','2')
                     ->paginate(5);
        }

        return view('admin.jumlahpeserta')->with('datamasuk',$resultmasuk)
                    ->with('datalolos',$resultlolos)->with('datagagal',$resultgagal);
      }
    }

    public function carivendorpelaksana(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('pelaksanaverifikasi');
        }else{
            $result = DB::table('dataadministrasiperusahaan')
                  ->leftjoin('pelaksana', 'dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','pelaksana.UserIdPelaksana')
                  ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

            $result2 = DB::table('users')
                        ->select('Nama as nm','UserId as ui')
                        ->where('UserlevelId','=','3')->get();

            return view('admin.pelaksanaverifikasi')->with('data', $result)->with('data2',$result2);
        }
      }
    }

    public function carivendorverifikasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('verifikasi');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                        ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('vendor.StatusHasilVerifikasi','<>','Y')
                        ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusHasilVerifikasi','<>','Y')
                        ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            }
              return view('admin.verifikasi')->with('data', $result);
        }
      }
    }

    public function carivendorhasilverifikasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('hasilverifikasipeserta');
        }else{
            $result = DB::table('vendor')
                  ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->leftjoin('pelaksana','vendor.UserId','=','pelaksana.UserIdPeserta')
                  ->leftjoin('users','users.UserId','=','pelaksana.UserIdPelaksana')
                  ->leftjoin('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                  ->leftjoin('nilaiverifikasi','nilaiverifikasi.Id','=','hasilverifikasi.HasilVerifikasi')
                  ->select('vendor.UserId','dataadministrasiperusahaan.Nama as nmp',
                            'nilaiverifikasi.Nama as nmv', 'users.Nama as nmu')
                  ->where('vendor.StatusHasilVerifikasi','=','Y')
                  ->where('vendor.PersetujuanVerifikasi','<>','Y')
                  ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

            return view('admin.hasilverifikasi')->with('data',$result);
        }
      }
    }

    public function carivendordokumenpeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('dokumenpeserta');
        }else{
            $result = DB::table('dokumen')
                  ->join('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','dokumen.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat')                  
                  ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                  ->orderBy('dataadministrasiperusahaan.Nama')
                  ->get();
            return view('admin.dokumen')->with('data',$result);
        }
      }
    }

    public function carivendorrekapitulasipeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('rekapitulasiverifikasi');
        }else{
            $result = DB::table('hasilverifikasi')
                  ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','hasilverifikasi.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat',
                           'hasilverifikasi.HasilVerifikasi')
                  ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

          return view('admin.rekapitulasiverifikasi')->with('data',$result);
        }
      }
    }

    public function carivendorrekapitulasidcpt(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('rekapitulasidcpt');
        }else{
            $result = DB::table('vendor')
                  ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->leftjoin('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat')
                  ->where('hasilverifikasi.hasilverifikasi','=','1')
                  ->where('vendor.PersetujuanVerifikasi','=','Y')
                  ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

            return view('admin.rekapitulasidcpt')->with('data',$result);
        }
      }
    }

    public function carivendorundangandue(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('undangduediligen');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                        ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->where('vendor.StatusHasilVerifikasi','=','Y')
                        ->where('vendor.StatusUndanganDueDiligence','<>','Y')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusHasilVerifikasi','=','Y')
                        ->where('vendor.StatusUndanganDueDiligence','<>','Y')
                        ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            }

            return view('admin.undanganduediligence')->with('data',$result);
        }
      }
    }

    public function carivendorentrydue(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('entrydataduediligence');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusHasilVerifikasi','=','Y')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email')
                      ->where('vendor.StatusHasilVerifikasi','=','Y')
                      ->where('vendor.StatusUndanganDueDiligence','<>','Y')
                      ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusHasilVerifikasi','=','Y')
                        ->where('vendor.StatusUndanganDueDiligence','<>','Y')
                        ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            }

            return view('admin.entrydataduediligence')->with('data',$result);
        }
      }
    }

    public function carivendorhasildue(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('hasilduediligencepeserta');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                        ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('vendor.PersetujuanVerifikasi','=','Y')
                        ->where('vendor.StatusHasilDueDiligence','<>','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.PersetujuanVerifikasi','=','Y')
                        ->where('vendor.StatusHasilDueDiligence','<>','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                        ->get();
            }
            return view('admin.hasilduediligence')->with('data', $result);
        }
      }
    }

    public function carivendorundanganpenawaran(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('undangpenawaran');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusUndanganDueDiligence','=','Y')
                      ->where('vendor.StatusUndanganPenawaran','<>','Y')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email','dataadministrasiperusahaan.BadanUsaha')
                      ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.Email','dataadministrasiperusahaan.BadanUsaha')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusUndanganDueDiligence','=','Y')
                        ->where('vendor.StatusUndanganPenawaran','<>','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
            }

            return view('admin.undanganpenawaran')->with('data',$result);
        }
      }
    }

    public function carivendorevaluasipenawaran(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('evaluasipenawaran');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

        if($i == 1){
          $result = DB::table('dataadministrasiperusahaan')
                  ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->where('vendor.StatusUndanganDueDiligence','=','Y')
                  ->where('vendor.StatusUndanganPenawaran','=','Y')
                  ->where('vendor.StatusHasilPenawaran','<>','Y')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                    'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                  ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                  ->get();
        } else {
          $result = DB::table('pelaksana')
                    ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                    ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                    ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                      'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                    ->where('pelaksana.UserIdPelaksana','=',$adminid)
                    ->where('vendor.StatusUndanganDueDiligence','=','Y')
                    ->where('vendor.StatusUndanganPenawaran','=','Y')
                    ->where('vendor.StatusHasilPenawaran','<>','Y')
                    ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                    ->get();
        }
        
        return view('admin.evaluasipenawaran')->with('data',$result);
        }
      }
    }

    public function carivendorundangannegosiasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('undangnego');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusUndanganNegosiasi','<>','Y')
                      ->where('vendor.StatusUndanganPenawaran','=','Y')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                      ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusUndanganNegosiasi','<>','Y')
                        ->where('vendor.StatusUndanganPenawaran','=','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
            }

            return view('admin.undangannegosiasi')->with('data',$result);
        }
      }
    }

    public function carivendorentrynegosiasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('entrydatanegosiasi');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusHasilPenawaran','=','Y')
                      ->where('vendor.StatusHasilNegosiasi','<>','Y')
                      ->where('vendor.StatusUndanganNegosiasi','=','Y')
                      ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusHasilPenawaran','=','Y')
                        ->where('vendor.StatusHasilNegosiasi','<>','Y')
                        ->where('vendor.StatusUndanganNegosiasi','=','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
            }  
          
          return view('admin.entrydatanegosiasi')->with('data',$result);
        }
      }
    }

    public function carivendorsuratpenunjukan(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('suratpenunjukan');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusUndanganNegosiasi','=','Y')
                      ->where('vendor.StatusHasilNegosiasi','=','Y')
                      ->where('vendor.StatusSuratPenunjukan','<>','Y')
                      ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email',
                          'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusUndanganNegosiasi','=','Y')
                        ->where('vendor.StatusHasilNegosiasi','=','Y')
                        ->where('vendor.StatusSuratPenunjukan','<>','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
            }

            return view('admin.suratpenunjukan')->with('data',$result);
        }
      }
    }

    public function carivendorundangancda(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('undangcda');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusSuratPenunjukan','=','Y')
                      ->where('vendor.StatusUndanganCDA','<>','Y')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                      ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email',
                          'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusSuratPenunjukan','=','Y')
                        ->where('vendor.StatusUndanganCDA','<>','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
            }
            return view('admin.undangancda')->with('data',$result);
        }
      }
    }

    public function aksiundangankontrak(Request $request){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $vendorid = $_POST['vendorid'];
        $i = DB::table('vendor')->where('UserId', $vendorid)->pluck('UserId');

        if($i < 1){
            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'Y',
                            'StatusSuratPenunjukan'          => 'Y',
                            'StatusUndanganCDA'              => 'Y',
                            'StatusUndanganKontrak'          => 'Y',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        } else {
            $data = array(
                            'StatusUndanganDueDiligence'     => 'Y',
                            'StatusUndanganPenawaran'        => 'Y',
                            'StatusUndanganNegosiasi'        => 'Y',
                            'StatusSuratPenunjukan'          => 'Y',
                            'StatusUndanganCDA'              => 'Y',
                            'StatusUndanganKontrak'          => 'Y',
                         );
            $i = DB::table('vendor')->where('UserId',$vendorid)->update($data);
        }

        if(!is_null($i)){
          alert()->success('BERHASIL', 'Simpan Data');
          $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'undang kontrak',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
          return back();
        } else {
          alert()->error('GAGAL', 'Simpan Data');
          return back();
        }
      }
    }

    public function carivendorundangankontrak(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

        if($cari < 1){
            return Redirect('undangcda');
        }else{
            $i = DB::table('users')->where('UserId',$adminid)->pluck('UserlevelId');

            if($i == 1){
              $result = DB::table('dataadministrasiperusahaan')
                      ->join('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                      ->where('vendor.StatusUndanganCDA','=','Y')
                      ->where('vendor.StatusUndanganKontrak','<>','Y')
                      ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha','dataadministrasiperusahaan.Email')
                      ->get();
            } else {
              $result = DB::table('pelaksana')
                        ->leftjoin('dataadministrasiperusahaan','dataadministrasiperusahaan.UserId','=','pelaksana.UserIdPeserta')
                        ->leftjoin('vendor', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                        ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama',
                          'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha','dataadministrasiperusahaan.Email')
                        ->where('pelaksana.UserIdPelaksana','=',$adminid)
                        ->where('vendor.StatusUndanganCDA','=','Y')
                        ->where('vendor.StatusUndanganKontrak','<>','Y')
                        ->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
            }
            
            return view('admin.undangkontrak')->with('data',$result);
        }
      }
    }

    public function caripengumumanadmin(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $cari = DB::table('pengumuman')->where('Header', 'LIKE', '%'.$_POST['cari'].'%')->count();

            if($cari < 1){
                return Redirect('masterpengumuman');
            }else{
                $result = DB::table('pengumuman')
                        ->where('Header', 'LIKE', '%'.$_POST['cari'].'%')
                        ->get();
        
                return view('admin.pengumuman')->with('data', $result);
            }
        }
    }

    public function carivendoradmin(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $cari = DB::table('dataadministrasiperusahaan')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

            if($cari < 1){
                return Redirect('mastervendor');
            }else{
                $result = DB::table('vendor')
                      ->join('dataadministrasiperusahaan', 'vendor.UserId', '=', 
                        'dataadministrasiperusahaan.UserId')
                      ->select('vendor.UserId', 'dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Email')
                      ->where('dataadministrasiperusahaan.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                      ->get();  
                
                return view('admin.masteruser')->with('data',$result);
            }
        }
    }

    public function caripenggunaadmin(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $cari = DB::table('users')->where('Nama', 'LIKE', '%'.$_POST['cari'].'%')->count();

            if($cari < 1){
                return Redirect('masteradmin');
            }else{

                $result = DB::table('users')->leftjoin('userlevel','users.UserlevelId','=','userlevel.UserlevelId')
                                  ->select('users.UserId','users.Nama','users.Username','users.Password','users.UserLevelId as uli',
                                    'userlevel.UserLevelName','users.EmailUser')
                                  ->where('userlevel.UserlevelId','<>','4')
                                  ->where('users.Nama', 'LIKE', '%'.$_POST['cari'].'%')
                                  ->get();
                
                return view('admin.pengguna')->with('data',$result);
            }
        }
    }

    public function PDFJumlahPeserta(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $hitung = DB::table('dataadministrasiperusahaan')->count();

        if($hitung < 1){
            $resultmasuk = null;
            $resultlolos = null;
            $resultgagal = null;
        }else{ 
            $resultmasuk = DB::table('dataadministrasiperusahaan')
                     ->select('Nama', 'Alamat', 'BadanUsaha')
                     ->get();

            $resultlolos = DB::table('hasilverifikasi as h')
                     ->leftjoin('dataadministrasiperusahaan as p','p.UserId','=','h.UserId')
                     ->select('p.Nama', 'p.Alamat', 'p.BadanUsaha')
                     ->groupBy('p.Nama')
                     ->where('h.status','=','1')->get();

            $resultgagal = DB::table('hasilverifikasi as h')
                     ->leftjoin('dataadministrasiperusahaan as p','p.UserId','=','h.UserId')
                     ->select('p.Nama', 'p.Alamat', 'p.BadanUsaha')
                     ->groupBy('Nama')
                     ->where('h.status','=','2')->get();
        }


        $pdf = PDF::loadView('printout.printjumlahpeserta', compact('resultmasuk','resultlolos','resultgagal'));
        return $pdf->stream();
      }
    }

    function getIP(){
        $ipAddress = '';

        // Check for X-Forwarded-For headers and use those if found
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ('' !== trim($_SERVER['HTTP_X_FORWARDED_FOR']))) {
            $ipAddress = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
        } else {
            if (isset($_SERVER['REMOTE_ADDR']) && ('' !== trim($_SERVER['REMOTE_ADDR']))) {
                $ipAddress = trim($_SERVER['REMOTE_ADDR']);
            }
        }

        return $ipAddress;
    }

    public function provinsi(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
          return view('admin.provinsi');
        }
    }

    public function provinsilist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        DB::statement(DB::raw('set @rownum=0'));
        $provinsi = DB::table('provinsi')
                 ->select('ProvinsiId',
                    'ProvinsiName');

        return Datatables::of($provinsi)
            ->addColumn('actionEdit', function ($provinsi) {
                return '<a href="" onclick="edit('."'".$provinsi->ProvinsiId."/".$provinsi->ProvinsiName."'".')" 
                        data-toggle="modal" data-target="#modal_form">
                        <i class="fa fa-pencil fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Ubah</a>';
            })
            ->addColumn('actionDelete', function ($provinsi) {
                return '<a href="javascript:void(0)" onclick="deletes('."'".$provinsi->ProvinsiId."/".$provinsi->ProvinsiName."'".')"
                        data-toggle="modal" data-target="#modal_confirm">
                        <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
            })
            ->make(true);
      }
    }

    public function provinsisave(Request $request){
        if(!isset($request['ProvinsiId']))
                $ids = '';
            else
                $ids = $request['ProvinsiId'];

        $nama = strtoupper($request['ProvinsiName']);

        $data = array(
                'ProvinsiName' => $nama,
            );

        $status = DB::table('provinsi')->where('ProvinsiId','=',$ids)->first();
        $cek = DB::table('provinsi')->select('ProvinsiId')->where('ProvinsiName',$nama)->first();

        if(is_null($status)){
            if(is_null($cek)){
                $i = DB::table('provinsi')->insert($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Provinsi');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Provinsi Sudah Terdaftar');
                return back();
            }
        }else{
            if(is_null($cek)){
                $i = DB::table('provinsi')->where('ProvinsiId',$ids)->update($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Provinsi');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Provinsi Sudah Terdaftar');
                return back();
            }
        }
    }

    public function provinsidelete(Request $request){
        $cek = DB::table('kabupatenkota')->where('ProvinsiId',$request['ProvinsiIdDel'])->count();

        if($cek > 0){
          alert()->error('GAGAL', 'Provinsi Ini Tidak Dapat Di Hapus');
          return back();
        }else{
          $i = DB::table('provinsi')->where('ProvinsiId',$request['ProvinsiIdDel'])->delete();

          if($i > 0){
              alert()->success('BERHASIL', 'Hapus Provinsi');
              return back();
          }else{
              alert()->error('GAGAL', 'Hapus Provinsi Gagal');
              return back();
          }
        }
    }

    public function kabupaten(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $result = DB::table('provinsi')->get();
        return view('admin.kabupaten')->with('data', $result);
      }
    }

    public function kabupatenlist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        DB::statement(DB::raw('set @rownum=0'));
        $kabupaten = DB::table('kabupatenkota as k')
                  ->leftjoin('provinsi as p','k.ProvinsiId','=','p.ProvinsiId')
                  ->select('k.KabupatenKotaId', 'k.KabupatenKotaName', 'k.ProvinsiId as ProvinsiId', 'p.ProvinsiName');

        return Datatables::of($kabupaten)
            ->addColumn('actionEdit', function ($kabupaten) {
                return '<a href="" onclick="edit('."'".$kabupaten->KabupatenKotaId."/".$kabupaten->KabupatenKotaName."/".$kabupaten->ProvinsiId."'".')" 
                        data-toggle="modal" data-target="#modal_form">
                        <i class="fa fa-pencil fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Ubah</a>';
            })
            ->addColumn('actionDelete', function ($kabupaten) {
                return '<a href="javascript:void(0)" onclick="deletes('."'".$kabupaten->KabupatenKotaId."/".$kabupaten->KabupatenKotaName."'".')"
                        data-toggle="modal" data-target="#modal_confirm">
                        <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
            })
            ->make(true);
      }
    }

    public function kabupatensave(Request $request){
      if(!isset($request['KabupatenKotaId']))
                $KabupatenKotaId = '';
            else
                $KabupatenKotaId = $request['KabupatenKotaId'];

        $KabupatenKotaName = strtoupper($request['KabupatenKotaName']);
        $ProvinsiId = $request['ProvinsiId'];

        $data = array(
                'KabupatenKotaName' => $KabupatenKotaName,
                'ProvinsiId'        => $ProvinsiId,
            );

        $status = DB::table('kabupatenkota')->where('KabupatenKotaId','=',$KabupatenKotaId)->first();
        $cek = DB::table('kabupatenkota')->select('KabupatenKotaId')->where('KabupatenKotaName',$KabupatenKotaName)->first();

        if(is_null($status)){
            if(is_null($cek)){
                $i = DB::table('kabupatenkota')->insert($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Kabupaten / Kota');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Kabupaten / Kota Sudah Terdaftar');
                return back();
            }
        }else{
            if(is_null($cek)){
                $i = DB::table('kabupatenkota')->where('KabupatenKotaId',$ids)->update($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Kabupaten / Kota');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Kabupaten / Kota Sudah Terdaftar');
                return back();
            }
        }
    }

    public function kabupatendelete(Request $request){
      $cek = DB::table('kecamatan')->where('KabupatenKotaId',$request['KabupatenKotaIdDel'])->count();

        if($cek > 0){
          alert()->error('GAGAL', 'Kabupaten / Kota Ini Tidak Dapat Di Hapus');
          return back();
        }else{
          $i = DB::table('kabupatenkota')->where('KabupatenKotaId',$request['KabupatenKotaIdDel'])->delete();

          if($i > 0){
              alert()->success('BERHASIL', 'Hapus Kabupaten / Kota');
              return back();
          }else{
              alert()->error('GAGAL', 'Hapus Kabupaten / Kota Gagal');
              return back();
          }
        }
    }

    public function kecamatan(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $resultProv = DB::table('provinsi')->get();
        return view('admin.kecamatan')->with('dataprov', $resultProv);
      }
    }

    public function kecamatanlist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        DB::statement(DB::raw('set @rownum=0'));
        $kecamatan = DB::table('kecamatan as k')
                  ->leftjoin('kabupatenkota as b','k.KabupatenKotaId','=','b.KabupatenKotaId')
                  ->leftjoin('provinsi as p','b.ProvinsiId','=','p.ProvinsiId')
                  ->select('k.KecamatanId', 'k.kecamatanName', 'b.KabupatenKotaId as KabupatenKotaId', 'b.KabupatenKotaName as KabupatenKotaName', 'p.ProvinsiId as ProvinsiId', 'p.ProvinsiName');

        return Datatables::of($kecamatan)
            ->addColumn('actionEdit', function ($kecamatan) {
                return '<a href="" onclick="edit('."'".$kecamatan->KecamatanId."/".$kecamatan->kecamatanName."/".$kecamatan->ProvinsiId."/".$kecamatan->KabupatenKotaId."'".')" 
                        data-toggle="modal" data-target="#modal_form">
                        <i class="fa fa-pencil fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Ubah</a>';
            })
            ->addColumn('actionDelete', function ($kecamatan) {
                return '<a href="javascript:void(0)" onclick="deletes('."'".$kecamatan->KecamatanId."/".$kecamatan->kecamatanName."'".')"
                        data-toggle="modal" data-target="#modal_confirm">
                        <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
            })
            ->make(true);
      }
    }

    public function kabDropDownData($id){
        $string ="";
        $result = DB::table('kabupatenkota')
                        ->orderBy('KabupatenKotaName', 'asc')
                        ->where('ProvinsiId','=',$id)
                        ->get();
            foreach ($result as $rs) {
                $string .= "<option value='$rs->KabupatenKotaId'>".$rs->KabupatenKotaName."</option>";
            }
        return $string;
    }

    public function kabDropDownDataSelected($pid, $kid){
        $string ="";
        $result = DB::table('kabupatenkota')
                        ->orderBy('KabupatenKotaName', 'asc')
                        ->where('ProvinsiId','=',$pid)
                        ->get();
            foreach ($result as $rs) {
                if($kid == $rs->KabupatenKotaId)
                {
                  $string .= "<option value='$rs->KabupatenKotaId' selected>".$rs->KabupatenKotaName."</option>";
                }else{
                  $string .= "<option value='$rs->KabupatenKotaId'>".$rs->KabupatenKotaName."</option>";
                }
            }
        return $string;
    }

    public function kecamatansave(Request $request){
        if(!isset($request['KecamatanId']))
                $KecamatanId = '';
            else
                $KecamatanId = $request['KecamatanId'];

        $kecamatanName = strtoupper($request['kecamatanName']);
        $KabupatenKotaId = $request['KabupatenKotaId'];

        $data = array(
                'kecamatanName'         => $kecamatanName,
                'KabupatenKotaId'        => $KabupatenKotaId,
            );

        $status = DB::table('kecamatan')->where('KecamatanId','=',$KecamatanId)->first();
        $cek = DB::table('kecamatan')->select('KecamatanId')->where('kecamatanName',$kecamatanName)->first();

        if(is_null($status)){
            if(is_null($cek)){
                $i = DB::table('kecamatan')->insert($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Kecamatan');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Kecamatan Sudah Terdaftar');
                return back();
            }
        }else{
            if(is_null($cek)){
                $i = DB::table('kecamatan')->where('KecamatanId',$ids)->update($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Kecamatan');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Kecamatan Sudah Terdaftar');
                return back();
            }
        }
    }

    public function kecamatandelete(Request $request){
      $cek = DB::table('kelurahan')->where('KecamatanId',$request['KecamatanIdDel'])->count();

        if($cek > 0){
          alert()->error('GAGAL', 'Kecamatan Ini Tidak Dapat Di Hapus');
          return back();
        }else{
          $i = DB::table('kecamatan')->where('KecamatanId',$request['KecamatanIdDel'])->delete();

          if($i > 0){
              alert()->success('BERHASIL', 'Hapus Kecamatan');
              return back();
          }else{
              alert()->error('GAGAL', 'Hapus Kecamatan');
              return back();
          }
        }
    }

    public function kelurahan(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $resultProv = DB::table('provinsi')->get();
        return view('admin.kelurahan')->with('dataprov', $resultProv);
      }
    }

    public function kelurahanlist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        DB::statement(DB::raw('set @rownum=0'));
        $kelurahan = DB::table('kelurahan as l')
                  ->leftjoin('kecamatan as k','l.KecamatanId','=','k.KecamatanId')
                  ->leftjoin('kabupatenkota as b','k.KabupatenKotaId','=','b.KabupatenKotaId')
                  ->leftjoin('provinsi as p','b.ProvinsiId','=','p.ProvinsiId')
                  ->select('l.KelurahanId', 'l.KelurahanName', 'k.KecamatanId as KecamatanId', 'k.kecamatanName', 'b.KabupatenKotaId as KabupatenKotaId', 'b.KabupatenKotaName as KabupatenKotaName', 'p.ProvinsiId as ProvinsiId', 'p.ProvinsiName');

        return Datatables::of($kelurahan)
            ->addColumn('actionEdit', function ($kelurahan) {
                return '<a href="" onclick="edit('."'".$kelurahan->KelurahanId."/".$kelurahan->KelurahanName."/".$kelurahan->ProvinsiId."/".$kelurahan->KabupatenKotaId."/".$kelurahan->KecamatanId."'".')" 
                        data-toggle="modal" data-target="#modal_form">
                        <i class="fa fa-pencil fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Ubah</a>';
            })
            ->addColumn('actionDelete', function ($kelurahan) {
                return '<a href="javascript:void(0)" onclick="deletes('."'".$kelurahan->KelurahanId."/".$kelurahan->KelurahanName."'".')"
                        data-toggle="modal" data-target="#modal_confirm">
                        <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
            })
            ->make(true);
      }
    }

    public function kecDropDownData($id){
        $string ="";
        $result = DB::table('kecamatan')
                        ->orderBy('kecamatanName', 'asc')
                        ->where('KabupatenKotaId','=',$id)
                        ->get();
            foreach ($result as $rs) {
                $string .= "<option value='$rs->KecamatanId'>".$rs->kecamatanName."</option>";
            }
        return $string;
    }

    public function kecDropDownDataSelected($pid, $kid){
        $string ="";
        $result = DB::table('kecamatan')
                        ->orderBy('kecamatanName', 'asc')
                        ->where('KabupatenKotaId','=',$pid)
                        ->get();
            foreach ($result as $rs) {
                if($kid == $rs->KecamatanId)
                {
                  $string .= "<option value='$rs->KecamatanId' selected>".$rs->kecamatanName."</option>";
                }else{
                  $string .= "<option value='$rs->KecamatanId'>".$rs->kecamatanName."</option>";
                }
            }
        return $string;
    }

    public function kelurahansave(Request $request){
      if(!isset($request['KelurahanId']))
                $KelurahanId = '';
            else
                $KelurahanId = $request['KelurahanId'];

        $KelurahanName = strtoupper($request['KelurahanName']);
        $KecamatanId = $request['KecamatanId'];

        $data = array(
                'KelurahanName'         => $KelurahanName,
                'KecamatanId'        => $KecamatanId,
            );

        $status = DB::table('kelurahan')->where('KelurahanId','=',$KelurahanId)->first();
        $cek = DB::table('kelurahan')->select('KelurahanId')->where('KelurahanName',$KelurahanName)->first();

        if(is_null($status)){
            if(is_null($cek)){
                $i = DB::table('kelurahan')->insert($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Kelurahan');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Kelurahan Sudah Terdaftar');
                return back();
            }
        }else{
            if(is_null($cek)){
                $i = DB::table('kelurahan')->where('KelurahanId',$ids)->update($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Kelurahan');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Kelurahan Sudah Terdaftar');
                return back();
            }
        }
    }

    public function kelurahandelete(Request $request){
          $i = DB::table('kelurahan')->where('KelurahanId',$request['KelurahanIdDel'])->delete();

          if($i > 0){
              alert()->success('BERHASIL', 'Hapus Kelurahan');
              return back();
          }else{
              alert()->error('GAGAL', 'Hapus Kelurahan');
              return back();
          }
    }

    public function notifikasi(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          return view('admin.notifikasi');
      }
    }

    public function notifikasilist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $msg = DB::table('messsages as m')
                  ->leftjoin('users as u','m.MessageFrom','=','u.userid')
                  ->select('m.MessageId','u.Nama', 'm.MessageHeader', 'm.MessageDetail', 'm.MessageTime')
                  ->where('m.MessageTo','=',$adminid);

        return Datatables::of($msg)
            ->addColumn('actionDetail', function ($msg) {
                return '<a href="" onclick="detail('."'".$msg->MessageDetail."'".')" 
                        data-toggle="modal" data-target="#modal_form">
                        <i class="fa fa-search-plus fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Detail</a>';
            })
            ->addColumn('actionDelete', function ($msg) {
                return '<a href="javascript:void(0)" onclick="deletes('."'".$msg->MessageId."'".')"
                        data-toggle="modal" data-target="#modal_confirm">
                        <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
            })
            ->make(true);
      }
    }

    public function deletenotifikasi(Request $request){
      $i = DB::table('messsages')->where('MessageId',$request['KelurahanIdDel'])->delete();

      if($i > 0){
          alert()->success('BERHASIL', 'Hapus Notifikasi');
          return back();
      }else{
          alert()->error('GAGAL', 'Hapus Notifikasi');
          return back();
      }
    }

    public function cetakformvendor(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          return view('admin.cetakvendor');
      }
    }

    public function viewrekapitulasidcpt(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          return view('admin.viewdcpt');
      }
    }

    public function dcptlist(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            DB::statement(DB::raw('set @row:=-1'));
            $result = DB::table('dataspesifikasibatubara')                     
                     ->rightjoin('vendor','dataspesifikasibatubara.UserId','=','vendor.UserId')
                     ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                     ->leftjoin('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                     ->leftjoin('legalitasperijinantambang','vendor.UserId','=','legalitasperijinantambang.UserId')
                     ->leftjoin('datatambang','vendor.UserId','=','datatambang.UserId')
                     ->leftjoin('provinsi','provinsi.ProvinsiId','=','datatambang.Provinsi')
                     ->leftjoin('dataproduksitambang','dataproduksitambang.UserId','=','vendor.UserId')
                     ->select(DB::raw("@row:=@row+1 as No, CONCAT(dataadministrasiperusahaan.Nama,',',dataadministrasiperusahaan.BadanUsaha) as Nama, 
                              dataadministrasiperusahaan.UserId as UserId,
                              dataadministrasiperusahaan.Alamat as Alamat, 
                              legalitasperijinantambang.JenisIjin as JenisIjin,
                              provinsi.ProvinsiName as ProvinsiName,
                              dataproduksitambang.KapasitasProduksi as KapasitasProduksi,
                              dataproduksitambang.RealisasiTargetTahun as RealisasiTargetTahun,
                              dataspesifikasibatubara.CV as CV"))
                     ->where('vendor.PersetujuanVerifikasi','=','Y')
                     ->groupBy('Nama');

            return Datatables::of($result)
            ->addColumn('actionViewSpek', function ($result) {
                return '<a href="PDFSPEK/'.$result->UserId.'" target="_blank">
                        <i class="fa fa- fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>View Spek</a>';
            })
            ->addColumn('actionViewAll', function ($result) {
                return '<a href="PDFDCPT/'.$result->UserId.'" target="_blank">
                        <i class="fa fa- fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>View All</a>';
            })
            ->make(true);
        }
    }

    public function cetaklist(){
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            DB::statement(DB::raw('set @row:=-1'));
            $result = DB::table('paktaintegritas')                    
                     ->leftjoin('vendor','paktaintegritas.UserId','=','vendor.UserId')
                     ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                     ->leftjoin('legalitasperijinantambang','vendor.UserId','=','legalitasperijinantambang.UserId')
                     ->leftjoin('datatambang','vendor.UserId','=','datatambang.UserId')
                     ->leftjoin('provinsi','provinsi.ProvinsiId','=','datatambang.Provinsi')
                     ->select(DB::raw("@row:=@row+1 as No, CONCAT(dataadministrasiperusahaan.Nama,',',dataadministrasiperusahaan.BadanUsaha) as Nama, 
                              dataadministrasiperusahaan.UserId as UserId,
                              dataadministrasiperusahaan.Alamat as Alamat, 
                              legalitasperijinantambang.JenisIjin as JenisIjin,
                              provinsi.ProvinsiName as ProvinsiName"))
                     ->where('paktaintegritas.StatusPakta','=','Y')
                     ->groupBy('Nama');

            return Datatables::of($result)
            ->addColumn('actionView', function ($result) {
                return '<a href="PDFDCPT/'.$result->UserId.'" target="_blank">
                        <i class="fa fa- fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>View</a>';
            })
            ->make(true);
        }
    }

    public function PDFDCPT($id){
          $resda = DB::table('dataadministrasiperusahaan')
                            ->where('UserId','=',$id)
                            ->first();

          $htglegal = DB::table('legalitasperijinanperusahaan')->where('UserId', $id)->count();
          if($htglegal > 0){
            $reslegal = DB::table('legalitasperijinanperusahaan')
                          ->where('UserId','=',$id)
                          ->first();
          }else{
            $reslegal = (object) array(
                                        'NomorAkta'                         => null,
                                        'NomorAktaCk'                       => null, 
                                        'TanggalAkta'                       => null,
                                        'TanggalAktaCk'                     => null,
                                        'NamaNotaris'                       => null,
                                        'NamaNotarisCk'                     => null,
                                        'NomorAktaPerubahan'                => null,
                                        'NomorAktaPerubahanCk'              => null,
                                        'TanggalAktaPerubahan'              => null,
                                        'TanggalAktaPerubahanCk'            => null,
                                        'NamaNotarisPerubahan'              => null,
                                        'NamaNotarisPerubahanCk'            => null,
                                        'NomorPengesahanKemenhumkam'        => null,
                                        'NomorPengesahanKemenhumkamCk'      => null,
                                        'TanggalPengesahanKemenhumkam'      => null,
                                        'TanggalPengesahanKemenhumkamCk'    => null,
                                        'NomorPengesahanKemenhumkamPerubahan'       => null,
                                        'NomorPengesahanKemenhumkamPerubahanCk'     => null,
                                        'TanggalPengesahanKemenhumkamPerubahan'     => null,
                                        'TanggalPengesahanKemenhumkamPerubahanCk'   => null, 
                                        'PenerbitSIUP'                      => null,
                                        'PenerbitSIUPCk'                    => null, 
                                        'NomorSIUP'                         => null,
                                        'NomorSIUPCk'                       => null,
                                        'TanggalSIUP'                       => null,
                                        'TanggalSIUPCk'                     => null,
                                        'TanggalSdSIUP'                     => null,
                                        'TanggalSdSIUPCk'                   => null,
                                        'PenerbitTDP'                      => null,
                                        'PenerbitTDPCk'                    => null, 
                                        'NomorTDP'                         => null,
                                        'NomorTDPCk'                       => null,
                                        'TanggalTDP'                       => null,
                                        'TanggalTDPCk'                     => null,
                                        'TanggalSdTDP'                     => null,
                                        'TanggalSdTDPCk'                   => null,
                                        'PenerbitSKDP'                      => null,
                                        'PenerbitSKDPCk'                    => null, 
                                        'NomorSKDP'                         => null,
                                        'NomorSKDPCk'                       => null,
                                        'TanggalSKDP'                       => null,
                                        'TanggalSKDPCk'                     => null,
                                        'TanggalSdSKDP'                     => null,
                                        'TanggalSdSKDPCk'                   => null,
                                     );
          }

          $htgpemsaham = DB::table('komisarisperusahaan')
                          ->where('UserId','=',$id)
                          ->count();
          if($htgpemsaham > 0){
              $pemsaham = DB::table('komisarisperusahaan')
                          ->where('UserId','=',$id)
                          ->get();
          }else{
              $pemsaham =  (object) array(
                                            'Nama' => null,
                                            'KTP'  => null,
                                         );
          }

          $htgpengprs = DB::table('direksiperusahaan')
                          ->where('UserId','=',$id)
                          ->count();
          if($htgpemsaham > 0){
              $pengprs = DB::table('direksiperusahaan')
                          ->where('UserId','=',$id)
                          ->get();
          }else{
              $pengprs = (object) array(
                                            'Nama'    => null,
                                            'KTP'     => null,
                                            'Jabatan' => null,
                                         );
          }

          $htglegaltambang = DB::table('legalitasperijinantambang')
                          ->where('UserId','=',$id)
                          ->count();
          if($htglegaltambang > 0){
              $jenisijin = DB::table('legalitasperijinantambang')
                          ->where('UserId','=',$id)
                          ->pluck('JenisIjin');
              if($jenisijin == 'IUPOP'){
                  $ijiniupop = DB::table('iupop')
                              ->where('UserId','=',$id)
                              ->first();
              }else if($jenisijin == 'IUPOPK') {
                  $ijiniupopk = DB::table('iupopkhusus')
                              ->where('UserId','=',$id)
                              ->first();
                  $htgsumberiupopk = DB::table('sumbertambang')
                                    ->where('UserId','=',$id)
                                    ->count();
                  if($htgsumberiupopk > 0){
                      $sumberiupopk = DB::table('sumbertambang')
                                    ->where('UserId','=',$id)
                                    ->get();
                  }
              }else if($jenisijin == 'IUPOPK2'){
                  $ijiniupopk2 = DB::table('iupopkhusus2')
                              ->where('UserId','=',$id)
                              ->first();
                  $htgsumberiupopk2 = DB::table('sumbertambang2')
                                    ->where('UserId','=',$id)
                                    ->count();
                  if($htgsumberiupopk2 > 0){
                      $sumberiupopk2 = DB::table('sumbertambang2')
                                    ->where('UserId','=',$id)
                                    ->get();
                  }
              }
          }else{
              $jenisijin = '';
          }

          $respajak = DB::table('pajak')
                            ->where('UserId','=',$id)
                            ->first();

          $htgneraca = DB::table('neraca')->where('UserId','=',$id)->count();
          if($htgneraca > 0){
            $resneraca = DB::table('neraca')
                            ->where('UserId','=',$id)
                            ->first();
          }else{
            $resneraca = (object) array(
                                            'ActivaLancar'          => null,
                                            'ActivaLancarCk'        => null,
                                            'ActivaTetap'           => null,
                                            'ActivaTetapCk'         => null,
                                            'TotalActivaLancar'     => null,
                                            'TotalActivaLancarCk'   => null,
                                            'UtangJangkaPendek'     => null,
                                            'UtangJangkaPendekCk'   => null,
                                            'UtangJangkaPanjang'    => null,
                                            'UtangJangkaPanjangCk'  => null,
                                            'TotalKekayaan'         => null,
                                            'TotalKekayaanCk'       => null,
                                            'Auditor'               => null,
                                            'AuditorCk'             => null,
                                           );
          }

          $htgrestambang = DB::table('datatambang')->where('UserId','=',$id)->count();
          if($htgrestambang > 0){
            $resdatatambang = DB::table('datatambang')
                            ->where('UserId','=',$id)
                            ->first();
          }else{
            $resdatatambang = (object) array(
                                              'AsalTambang' => null,
                                              'JenisIjin' => null,
                                              'NamaKonsensi' => null,
                                              'NamaKonsensiCk' => null,
                                              'StatusKerjasama' => null,
                                              'StatusKerjasamaCk' => null,
                                              'LuasKonsensi'=> null,
                                              'LuasKonsensiCk' => null,
                                              'LuasOpenArea'=> null,
                                              'LuasOpenAreaCk' => null,
                                              'SR'=> null,
                                              'SRCk' => null,
                                              'JumlahPIT'=> null,
                                              'JumlahPITCk' => null,
                                              'LuasPIT'=> null,
                                              'LuasPITCk' => null,
                                              'BESR'=> null,
                                              'BESRCk' => null,
                                              'JumlahSEAM'=> null,
                                              'JumlahSEAMCk' => null,
                                              'KemiringanSEAM'=> null,
                                              'KemiringanSEAMCk' => null,
                                              'KetebalanSEAM'=> null,
                                              'KetebalanSEAMCk' => null,
                                              'KawasanHutan' => null,
                                              'KawasanHutanCk' => null,
                                              'JenisKawasan' => null,
                                              'Provinsi' => null,
                                              'ProvinsiCk' => null,
                                              'Kota' => null,
                                              'KotaCk' => null,
                                              'Kecamatan' => null,
                                              'KecamatanCk' => null,
                                              'Kelurahan' => null,
                                              'KelurahanCk' => null,
                                              'Catatan' => null,
                                              'CatatanCk' => null,
                                            );
          }

          $htgresdataproduksi = DB::table('dataproduksitambang')->where('UserId','=',$id)->count();
          if($htgresdataproduksi > 0){
              $resdataproduksi = DB::table('dataproduksitambang')
                            ->where('UserId','=',$id)
                            ->first();
          }else{
            $resdataproduksi = (object) array(
                                                'AsalTambang'=> NULL,
                                                'JenisIjin' => NULL,
                                                'KapasitasProduksi' => NULL,
                                                'KapasitasProduksiCk' => NULL,
                                                'TargetTahun' => NULL,
                                                'TargetTahunCk' => NULL,
                                                'RealisasiTargetTahun' => NULL,
                                                'RealisasiTargetTahunCk' => NULL,
                                                'TargetProduksi' => NULL,
                                                'TargetProduksiCk' => NULL,
                                                'RealisasiTargetProduksi' => NULL,
                                                'RealisasiTargetProduksiCk' => NULL,
                                                'RealisasiProduksi' => NULL,
                                                'RealisasiProduksiCk' => NULL,
                                                'Catatan' => NULL,
                                                'CatatanCk' => NULL,
                                            );
          }

          $htgresdataeksplorasi = DB::table('dataeksplorasi')->where('UserId','=',$id)->count();
          if($htgresdataeksplorasi > 0){
            $resdataeksplorasi = DB::table('dataeksplorasi')
                            ->where('UserId','=',$id)
                            ->first();
          }else{
            $resdataeksplorasi = (object) array(
                                                  'AsalTambang'=> NULL,
                                                  'JenisIjin' => NULL,
                                                  'SumberDaya' => NULL,
                                                  'SumberDayaCk' => NULL,
                                                  'Cadangan' => NULL,
                                                  'CadanganCk' => NULL,
                                                  'PengeboranEksplorasi' => NULL,
                                                  'JumlahTitikBor' => NULL,
                                                  'JumlahTitikBorCk' => NULL,
                                                  'TotalKedalaman' => NULL,
                                                  'TotalKedalamanCk' => NULL,
                                                  'PengeboranGeoteknik' => NULL,
                                                  'StrukturGeoteknik' => NULL,
                                                  'StrukturGeoteknikCk' => NULL,
                                                  'JORC'=> NULL,
                                                  'JORCCk' => NULL,
                                                  'Catatan' => NULL,
                                                  'CatatanCk' => NULL,
                                              );
          }

          $htgspek = DB::table('dataspesifikasibatubara')->where('UserId','=',$id)->count();
          if($htgspek > 0){
              $resspek = DB::table('dataspesifikasibatubara')
                            ->where('UserId','=',$id)
                            ->get();
          }else{
              $resspek = (object) array(
                                          'AsalTambang' => NULL,
                                          'JenisIjin' => NULL,
                                          'TM' => NULL,
                                          'TMCk' => NULL,
                                          'IM' => NULL,
                                          'IMCk' => NULL,
                                          'ASH' => NULL,
                                          'ASHCk' => NULL,
                                          'VM' => NULL,
                                          'VMCk' => NULL,
                                          'FC' => NULL,
                                          'FCCk' => NULL,
                                          'TS' => NULL,
                                          'TSCk' => NULL,
                                          'CV' => NULL,
                                          'CVCk' => NULL,
                                        );
          }

          $htgresstock = DB::table('datastockpile')->where('UserId','=',$id)->count();
          if($htgresstock > 0){
            $resstock = DB::table('datastockpile')
                            ->where('UserId','=',$id)
                            ->first();
          }else{
            $resstock = (object) array(
                                        'AsalTambang' => NULL,
                                        'JenisIjin' => NULL,
                                        'Nama' => NULL,
                                        'NamaCk' => NULL,
                                        'KepemilikanStockpile' => NULL,
                                        'KepemilikanStockpileCk' => NULL,
                                        'LuasStockpile' => NULL,
                                        'LuasStockpileCk' => NULL,
                                        'KapasitasStockpile' => NULL,
                                        'KapasitasStockpileCk' => NULL,
                                        'JarakTambang' => NULL,
                                        'JarakTambangCk' => NULL,
                                        'JumlahCruiser' => NULL,
                                        'JumlahCruiserCk' => NULL,
                                        'KapasitasCruiser' => NULL,
                                        'KapasitasCruiserCk' => NULL,
                                        'Catatan' => NULL,
                                        'CatatanCk' => NULL,
                                      );
          }

          $htgresjetty = DB::table('datajetty')->where('UserId','=',$id)->count();
          if($htgresjetty > 0){
            $resjetty = DB::table('datajetty')
                            ->where('UserId','=',$id)
                            ->first();
          }else{
            $resjetty = (object) array(
                                        'AsalTambang' => NULL,
                                        'JenisIjin' => NULL,
                                        'KapasitasCruiser' => NULL,
                                        'KapasitasCruiserCk' => NULL,
                                        'KapasitasMuat' => NULL,
                                        'KapasitasMuatCk' => NULL,
                                        'Catatan' => NULL,
                                        'CatatanCk' => NULL,
                                      );
          }

          $htgjetty = DB::table('datajettydetail')
                            ->where('UserId','=',$id)
                            ->count();

          if($htgjetty > 0){
              $resdetjetty = DB::table('datajettydetail')
                            ->where('UserId','=',$id)
                            ->get();
          }else{
              $resdetjetty = (object) array(
                                              'AsalTambang' => NULL,
                                              'JenisIjin' => NULL,
                                              'Nama' => NULL,
                                              'NamaCk' => NULL,
                                              'Kepemilikan' => NULL,
                                              'KepemilikanCk' => NULL,
                                              'SystemMuat' => NULL,
                                              'SystemMuatCk' => NULL,
                                              'Kapasitas' => NULL,
                                              'KapasitasCk' => NULL,
                                              'KapasitasManual' => NULL,
                                              'KapasitasManualCk' => NULL,
                                              'KapasitasConveyor' => NULL,
                                              'KapasitasConveyorCk' => NULL,
                                              'JumlahSandaran' => NULL,
                                              'JumlahSandaranCk' => NULL,
                                              'Luas' => NULL,
                                              'LuasCk' => NULL,
                                              'Kedalaman' => NULL,
                                              'KedalamanCk' => NULL,
                                              'Jarak' => NULL,
                                              'JarakCk' => NULL,
                                              'Provinsi' => NULL,
                                              'ProvinsiCk' => NULL,
                                              'Kota' => NULL,
                                              'KotaCk' => NULL,
                                              'Kecamatan' => NULL,
                                              'KecamatanCk' => NULL,
                                              'Kelurahan' => NULL,
                                              'KelurahanCk' => NULL,
                                            );
          }

          $htgpengalaman = DB::table('pengalamanperusahaan')
                            ->where('UserId','=',$id)
                            ->count();

          if($htgpengalaman > 0){
              $kemampuan = DB::table('pengalamanperusahaan')
                            ->where('UserId','=',$id)
                            ->orderBy('Nilai','DESC')
                            ->pluck('Nilai');
              if($kemampuan != '' || $kemampuan != null){
                  $kemampuan = 5 * $kemampuan;                  
              }else{
                  $kemampuan = 0;
              }

              $skn = DB::table('pengalamanperusahaan')->where('UserId','=',$id)->sum('Nilai');
              if($skn != '' || $skn != null || $skn != 0){
                  if($skn > $kemampuan){
                     $skn = $skn;
                  }else{
                     $skn = 0;
                  }
              }else{
                  $skn = 0;
              }

              $kemampuan = number_format($kemampuan,0,',','.');
              $skn = number_format($skn,0,',','.');
              $respengalaman = (object) array(
                                                'Kemampuan' => $kemampuan,
                                                'SKN'       => $skn,
                                             );
          }else{
              $respengalaman = (object) array(
                                                'Kemampuan' => 0,
                                                'SKN'       => 0,
                                             );
          }

          $pdf = PDF::loadView('printout.printdcpt', compact('resda','reslegal','htgpemsaham','pemsaham',
                                'htgpengprs','pengprs','htglegaltambang','jenisijin','ijiniupop','ijiniupopk',
                                'ijiniupopk2','htgsumberiupopk','sumberiupopk','htgsumberiupopk2','sumberiupopk2',
                                'respajak','resneraca','resdatatambang','resdataproduksi','resdataeksplorasi',
                                'htgspek','resspek','resstock','resjetty','htgjetty','resdetjetty','respengalaman'));
          return $pdf->stream();
    }

    public function PDFSPEK($id){
        $resda = DB::table('dataadministrasiperusahaan')
                            ->where('UserId','=',$id)
                            ->first();

        $htgspek = DB::table('dataspesifikasibatubara')->where('UserId','=',$id)->count();
          if($htgspek > 0){
              $resspek = DB::table('dataspesifikasibatubara')
                            ->leftjoin('brandcalori','dataspesifikasibatubara.idCalori','=','brandcalori.idCalori')
                            ->where('UserId','=',$id)
                            ->orderBy('CV','DESC')
                            ->get();
          }else{
              $resspek = (object) array(
                                          'AsalTambang' => NULL,
                                          'JenisIjin' => NULL,
                                          'values' => NULL,
                                          'TM' => NULL,
                                          'TMCk' => NULL,
                                          'IM' => NULL,
                                          'IMCk' => NULL,
                                          'ASH' => NULL,
                                          'ASHCk' => NULL,
                                          'VM' => NULL,
                                          'VMCk' => NULL,
                                          'FC' => NULL,
                                          'FCCk' => NULL,
                                          'TS' => NULL,
                                          'TSCk' => NULL,
                                          'CV' => NULL,
                                          'CVCk' => NULL,
                                        );
          }

          $pdf = PDF::loadView('printout.printspek', compact('resda','htgspek','resspek'));
          return $pdf->stream();
    }

    public function dokumenmanual(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          $result = DB::table('dokumen_manual')->orderBy('NamaFile','ASC')->get();
          return view('admin.manual')->with('data',$result);
      }
    }

    public function mastercalori(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        return view('admin.calori');
      }
    }

    public function mastercalorilist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        DB::statement(DB::raw('set @rownum=0'));
        $calori = DB::table('brandcalori')
                 ->select('idCalori','values');
       return Datatables::of($calori)
                ->addColumn('actionEdit', function ($calori) {
                    return '<a href="" onclick="edit('."'".$calori->idCalori."/".$calori->values."'".')" 
                            data-toggle="modal" data-target="#modal_form">
                            <i class="fa fa-pencil fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Ubah</a>';
                })
                ->addColumn('actionDelete', function ($calori) {
                    return '<a href="" onclick="deletes('."'".$calori->idCalori."/".$calori->values."'".')"
                            data-toggle="modal" data-target="#modal_confirm">
                            <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
                })
                ->make(true);
      }
    }

    public function mastercalorisave(Request $request){
        if(!isset($request['idCalori']))
                $ids = '';
            else
                $ids = $request['idCalori'];

        $values = $request['values'];

        $data = array(
                'values' => $values,
            );

        $status = DB::table('brandcalori')->where('idCalori','=',$ids)->first();
        $cek = DB::table('brandcalori')->select('idCalori')->where('values',$values)->first();

        if(is_null($status)){
            if(is_null($cek)){
                $i = DB::table('brandcalori')->insert($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Calori');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Calori Sudah Terdaftar');
                return back();
            }
        }else{
            if(is_null($cek)){
                $i = DB::table('brandcalori')->where('idCalori',$ids)->update($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Calori');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Calori Sudah Terdaftar');
                return back();
            }
        }
    }

    public function mastercaloridelete(Request $request){
      if(!isset($request['idCaloriDel']))
                $ids = '';
            else
                $ids = $request['idCaloriDel'];

        $status = DB::table('detailcalori')->where('calori_id','=',$ids)->first();

        if(is_null($status)){
            $i = DB::table('brandcalori')->where('idCalori',$request['idCaloriDel'])->delete();
            if($i > 0){
                alert()->success('BERHASIL', 'Hapus Calori');
                return back();
            }else{
                alert()->error('GAGAL', 'Hapus Calori');
                return back();
            }
        }else{
            alert()->error('GAGAL', 'Calori masih dipakai di tabel lain');
                return back();
        }
    }

    public function masterdetailcalori(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        $result = DB::table('brandcalori')->get();
        return view('admin.detailcalori')->with('data', $result);
      }
    }

    public function masterdetailcalorilist(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
        DB::statement(DB::raw('set @rownum=0'));
        $detailcalori = DB::table('detailcalori as d')
                  ->leftjoin('brandcalori as b','d.calori_id','=','b.idCalori')
                  ->select('d.idDetailCalori', 'd.calori_id', 'd.spesifikasi', 'd.values', 'd.filter', 'b.idCalori', 'b.values as namaCalori');

        return Datatables::of($detailcalori)
            ->addColumn('actionEdit', function ($detailcalori) {
                return '<a href="" onclick="edit('."'".$detailcalori->idDetailCalori."/".$detailcalori->calori_id."/".$detailcalori->spesifikasi."/".$detailcalori->values."/".$detailcalori->filter."'".')" 
                        data-toggle="modal" data-target="#modal_form">
                        <i class="fa fa-pencil fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Ubah</a>';
            })
            ->addColumn('actionDelete', function ($detailcalori) {
                    return '<a href="" onclick="deletes('."'".$detailcalori->idDetailCalori."/".$detailcalori->namaCalori."'".')"
                            data-toggle="modal" data-target="#modal_confirm">
                            <i class="fa fa-trash fa-fw" style="padding-left: 15px; padding-right: 20px;"></i>Hapus</a>';
                })
            ->make(true);
      }
    }

    public function mastercaloridetailsave(Request $request){
        if(!isset($request['idDetailCalori']))
                $idDetailCalori = '';
            else
                $idDetailCalori = $request['idDetailCalori'];

        $calori_id = $request['calori_id'];
        $spesifikasi = $request['spesifikasi'];
        $values = $request['values'];
        $filter = $request['filter'];

        $data = array(
                'calori_id'          => $calori_id,
                'spesifikasi'        => $spesifikasi,
                'values'             => $values,
                'filter'             => $filter,
            );

        $status = DB::table('detailcalori')->where('idDetailCalori','=',$idDetailCalori)->first();
        $cek = DB::table('detailcalori')->select('idDetailCalori')->where('calori_id',$calori_id)
                                ->where('spesifikasi',$spesifikasi)->where('filter',$filter)->first();

        if(is_null($status)){
            if(is_null($cek)){
                $i = DB::table('detailcalori')->insert($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Brand Calori');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Brand Calori Sudah Terdaftar');
                return back();
            }
        }else{
            if(is_null($cek)){
                $i = DB::table('detailcalori')->where('idDetailCalori',$idDetailCalori)->update($data);
                if(is_null($i)){
                    alert()->error('GAGAL', 'Gagal Tambah Brand Calori');
                    return back();
                }else{
                    alert()->success('BERHASIL', 'Simpan Data');
                    return back();
                }
            }else{
                alert()->error('GAGAL', 'Brand Calori Sudah Terdaftar');
                return back();
            }
        }
    }

    public function mastercaloridetaildelete(Request $request){
      if(!isset($request['idDetailCaloriDel']))
                $ids = '';
            else
                $ids = $request['idDetailCaloriDel'];

        $cek = DB::table('detailcalori')->where('idDetailCalori','=',$ids)->pluck('calori_id');
        $status = DB::table('dataspesifikasibatubara')->where('idCalori','=',$cek)->first();

        if(is_null($status)){
            $i = DB::table('detailcalori')->where('idDetailCalori',$request['idDetailCaloriDel'])->delete();
            if($i > 0){
                alert()->success('BERHASIL', 'Hapus Brand Calori');
                return back();
            }else{
                alert()->error('GAGAL', 'Hapus Brand Calori');
                return back();
            }
        }else{
            alert()->error('GAGAL', 'Brand Calori masih dipakai di tabel lain');
                return back();
        }
    }

    public function editdcpt(){
      $adminid = \Session::get('adminid');

      if(!isset($adminid) || ($adminid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{

        $result = DB::table('vendor')
                  ->leftjoin('dataadministrasiperusahaan', 'dataadministrasiperusahaan.UserId','=','vendor.UserId')
                  ->leftjoin('hasilverifikasi','vendor.UserId','=','hasilverifikasi.UserId')
                  ->select('dataadministrasiperusahaan.UserId','dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat',
                    'dataadministrasiperusahaan.BadanUsaha','vendor.PersetujuanVerifikasi','vendor.PersetujuanLegal',
                    'vendor.PersetujuanFinance','vendor.PersetujuanTechnical')
                  ->orderBy('dataadministrasiperusahaan.Nama','ASC')
                  ->get();

        $resultuser = DB::table('users')->where('UserId','=',$adminid)->pluck('UserlevelId');

        return view('admin.editdcpt')->with('data',$result)->with('datauser',$resultuser);
      }
    }

}
