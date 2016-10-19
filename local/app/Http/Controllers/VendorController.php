<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class VendorController extends Controller
{
    public function vendorhome(){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')) {
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
            return Redirect('home');
        }else{
            $datanotif = DB::table('notifikasiverifikasi')->where('UserId',$userid)->where('statusAll','1')->first();
            if(!is_null($datanotif)){
                \Session::put('notifverifikasi','T');
            }else{
                \Session::put('notifverifikasi','F');
            }            
            return view('vendors.vendorhome');
        }
    }

    public function notifikasiverifikasi(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')) {
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
            return Redirect('home');
        }else{
            $data = DB::table('dataadministrasiperusahaan')->where('UserId',$userid)->first();

            $datanotif = \Session::get('notifverifikasi');
            if($datanotif == 'T'){
                $hasilnotif = DB::table('notifikasiverifikasi')->where('UserId',$userid)->first();
            }else{
                $hasilnotif = (object) array(
                                                'ckDataAdministrasi'            => null,
                                                'ckLegalitasPerijinan'          => null,
                                                'ckDataPersonel'                => null,
                                                'ckDataKeuangan'                => null,
                                                'ckArmadaTransportasi'          => null,
                                                'ckPengalamanPerusahaan'        => null,
                                                'ckKontrakPengadaan'            => null,
                                                'ckLegalitasPerijinanTambang'   => null,  
                                                'ckDataTeknis'                  => null,
                                                'ckKirimDokumen'                => null, 
                                            );
            }

            return view('vendors.notifikasiverifikasi')->with('data',$data)->with('hasilnotif',$hasilnotif);
        }
    }

    public function dataadministrasiperusahaan(){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')) {
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');                
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                        'Nama'                  => null,
                                        'NamaCk'                => null,
                                        'BadanUsaha'            => null,
                                        'BadanUsahaCk'          => null,
                                        'StatusPerusahaan'      => null,
                                        'StatusPerusahaanCk'    => null,
                                        'Alamat'                => null,
                                        'AlamatCk'              => null,
                                        'TlpKantor'             => null,
                                        'TlpKantorCk'           => null,
                                        'FaxKantor'             => null,
                                        'FaxKantorCk'           => null,
                                        'Email'                 => null,
                                        'EmailCk'               => null,
                                        'Website'               => null,
                                        'WebsiteCk'             => null,
                                        'DirekturUtama'         => null,
                                        'DirekturUtamaCk'       => null,
                                        'ContactPerson'         => null,
                                        'ContactPersonCk'       => null,
                                        'TlpContactPerson'      => null,
                                        'TlpContactPersonCk'    => null,
                                        'EmailContactPerson'    => null,
                                        'EmailContactPersonCk'  => null,
                                        'PersetujuanVerifikasi' => null,
                                        'Status'                => null,
                                     );
            } else {
                $result = DB::table('dataadministrasiperusahaan')
                            ->join('vendor','dataadministrasiperusahaan.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','dataadministrasiperusahaan.UserId','=','hasilverifikasi.UserId')
                            ->leftjoin('paktaintegritas','dataadministrasiperusahaan.UserId','=','paktaintegritas.UserId')
                            ->where('dataadministrasiperusahaan.UserId', $userid)->first();
            }
            return view('vendors.pendaftaran.dataadministrasiperusahaan')->with('data',$result);
        }
    }

    public function legalitasperijinanperusahaan(){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')) {
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->count();

            if ($hitung < 1 ) {
                $result = (object) array(
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
                                        'PersetujuanVerifikasi'             => null,
                                        'Status'                            => null,
                                        'StatusPakta'                       => 'N',
                                     );
            }else{
                $result = DB::table('legalitasperijinanperusahaan')
                        ->join('vendor','legalitasperijinanperusahaan.UserId','=','vendor.UserId')
                        ->leftjoin('hasilverifikasi','legalitasperijinanperusahaan.UserId','=','hasilverifikasi.UserId')
                        ->leftjoin('paktaintegritas','legalitasperijinanperusahaan.UserId','=','paktaintegritas.UserId')
                        ->where('legalitasperijinanperusahaan.UserId', $userid)->first();
            }

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId',$userid)->first();

            $hdireksi = DB::table('direksiperusahaan')->where('UserId', $userid)->count();
            if ($hdireksi < 1 ) {
                $resultDireksi = null;
            }else {
                $resultDireksi = DB::table('direksiperusahaan')
                            ->join('vendor','direksiperusahaan.UserId','=','vendor.UserId')
                            ->where('direksiperusahaan.UserId', $userid)->get();
            }

            $hdireksip = DB::table('direksiperusahaanperubahan')->where('UserId', $userid)->count();
            if ($hdireksip < 1 ) {
                $resultDireksiP = null;
            }else {
                $resultDireksiP = DB::table('direksiperusahaanperubahan')
                            ->join('vendor','direksiperusahaanperubahan.UserId','=','vendor.UserId')
                            ->where('direksiperusahaanperubahan.UserId', $userid)->get();
            }

            $hkomisaris = DB::table('komisarisperusahaan')->where('UserId', $userid)->count();
            if ($hkomisaris < 1 ) {
                $resultKomisaris = null;
            }else{
                $resultKomisaris = DB::table('komisarisperusahaan')
                            ->join('vendor','komisarisperusahaan.UserId','=','vendor.UserId')
                            ->where('komisarisperusahaan.UserId',$userid)->get();
            }

            $hkomisarisp = DB::table('komisarisperusahaanperubahan')->where('UserId', $userid)->count();
            if ($hkomisarisp < 1 ) {
                $resultKomisarisP = null;
            }else{
                $resultKomisarisP = DB::table('komisarisperusahaanperubahan')
                            ->join('vendor','komisarisperusahaanperubahan.UserId','=','vendor.UserId')
                            ->where('komisarisperusahaanperubahan.UserId',$userid)->get();
            }

            return view('vendors.pendaftaran.legalitasperijinanperusahaan')->with('data',$result)->with('data2',$result2)
                    ->with('datadireksi',$resultDireksi)->with('datakomisaris',$resultKomisaris)
                    ->with('datadireksip',$resultDireksiP)->with('datakomisarisp',$resultKomisarisP);
        }
    }

    public function datapersonelperusahaan(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')) {
                alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('tenagaahli')->where('UserId', $userid)->count();

        if ($hitung < 1 ) {
            $result = null;
        } else {
            $result = DB::table('tenagaahli')
                    ->join('vendor','tenagaahli.UserId','=','vendor.UserId')
                    ->where('tenagaahli.UserId',$userid)->get();
        }

        $hitunghasil = DB::table('vendor')->where('UserId', $userid)->count();
        if ($hitunghasil < 1 ) {
            $resultHasil = (object) array(
                                            'PersetujuanVerifikasi' => null,
                                            'Status'       => null,
                                            );
        }else{
            $resultHasil = DB::table('vendor')
                             ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                             ->where('vendor.UserId', $userid)->first();
        }

        $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result4 = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        return view('vendors.pendaftaran.datapersonelperusahaan')->with('data', $result)->with('dataHasil',$resultHasil)
                    ->with('data4',$result4);
        }
    }

    public function datakeuangan(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')) {
                alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung1 = DB::table('pajak')->where('UserId', $userid)->count();

        $hitung2 = DB::table('neraca')->where('UserId', $userid)->count();

        $hitung3 = DB::table('komisarisperusahaan')->where('UserId', $userid)->count();

        $hitunghasil = DB::table('vendor')->where('UserId', $userid)->count();
        if ($hitunghasil < 1 ) {
            $resultHasil = (object) array(
                                            'PersetujuanVerifikasi' => null,
                                            'Status'       => null,
                                            'StatusPakta'  => null,
                                            );
        }else{
            $resultHasil = DB::table('vendor')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('vendor.UserId', $userid)->first();
        }

        if ($hitung3 < 1 ) {
            $resultSaham = null;
        }else{
            $resultSaham = DB::table('komisarisperusahaan')
                    ->join('vendor','komisarisperusahaan.UserId','=','vendor.UserId')
                    ->where('komisarisperusahaan.UserId',$userid)->get();
        }

        if($hitung1 < 1 ){
            $resultPajak = (object) array(
                                            'NomorNPWP'             => null,
                                            'NomorNPWPCk'           => null,
                                            'NoRekening'            => null,
                                            'NoRekeningCk'          => null,
                                            'NamaBank'              => null,
                                            'NamaBankCk'            => null,
                                            'NomorBuktiPelunasan'   => null,
                                            'NomorBuktiPelunasanCk' => null,
                                            'TglBuktiPelunasan'     => null,
                                            'TglBuktiPelunasanCk'   => null,
                                            'NomorLaporanBulanan'   => null,
                                            'NomorLaporanBulananCk' => null,
                                            'NomorLaporanBulanan2'   => null,
                                            'NomorLaporanBulanan2Ck' => null,
                                            'NomorLaporanBulanan3'   => null,
                                            'NomorLaporanBulanan3Ck' => null,
                                            'TglLaporanBulanan'     => null,
                                            'TglLaporanBulananCk'   => null,
                                            'TglLaporanBulanan2'     => null,
                                            'TglLaporanBulanan2Ck'   => null,
                                            'TglLaporanBulanan3'     => null,
                                            'TglLaporanBulanan3Ck'   => null,
                                            'PersetujuanVerifikasi' => null,
                                          );
        } else {
            $resultPajak = DB::table('pajak')
                    ->join('vendor','pajak.UserId','=','vendor.UserId')
                    ->where('pajak.UserId',$userid)->first();
        }

        if($hitung2 < 1 ){
            $resultNeraca = (object) array(
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
                                            'PersetujuanVerifikasi' => null,
                                           );
        } else {
            $resultNeraca = DB::table('neraca')
                    ->join('vendor','neraca.UserId','=','vendor.UserId')
                    ->where('neraca.UserId',$userid)->first();
        }

        $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result4 = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        return view('vendors.pendaftaran.datakeuangan')->with('data1',$resultSaham)
                        ->with('data2',$resultPajak)->with('data3',$resultNeraca)->with('dataHasil',$resultHasil)
                        ->with('data4',$result4);
        }
    }

    public function armadatransportasi(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('armadatransportasi')->where('UserId', $userid)->count();
        if ($hitung < 1 ) {
            $result = null;
        }else{
            $result = DB::table('armadatransportasi')
                    ->join('vendor','armadatransportasi.UserId','=','vendor.UserId')
                    ->where('armadatransportasi.UserId',$userid)->get();
        }

        $hitunghasil = DB::table('vendor')->where('UserId', $userid)->count();
        if ($hitunghasil < 1 ) {
            $resultHasil = (object) array(
                                            'PersetujuanVerifikasi' => null,
                                            'Status'       => null,
                                            );
        }else{
            $resultHasil = DB::table('vendor')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->where('vendor.UserId', $userid)->first();
        }

        $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result4 = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        return view('vendors.pendaftaran.armadatransportasi')->with('data', $result)->with('dataHasil',$resultHasil)
                        ->with('data4',$result4);
        }
    }

    public function pengalamanperusahaan(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('pengalamanperusahaan')->where('UserId', $userid)->count();
        if ($hitung < 1 ) {
            $result = null;
        }else{
            $result = DB::table('pengalamanperusahaan')
                    ->join('vendor','pengalamanperusahaan.UserId','=','vendor.UserId')
                    ->where('pengalamanperusahaan.UserId',$userid)->get();
        }

        $hitunghasil = DB::table('vendor')->where('UserId', $userid)->count();
        if ($hitunghasil < 1 ) {
            $resultHasil = (object) array(
                                            'PersetujuanVerifikasi' => null,
                                            'Status'       => null,
                                            );
        }else{
            $resultHasil = DB::table('vendor')
                                ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                                ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                                ->where('vendor.UserId', $userid)->first();
        }

        $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result4 = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        return view('vendors.pendaftaran.pengalamanperusahaan')->with('data', $result)->with('dataHasil',$resultHasil)
                    ->with('data4',$result4);

        }
    }

    public function kontrakpengadaanbatubara(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('kontrakpengadaan')->where('UserId', $userid)->count();
        if ($hitung < 1 ) {
            $result = null;
        }else{
            $result = DB::table('kontrakpengadaan')
                ->join('vendor','kontrakpengadaan.UserId','=','vendor.UserId')
                ->where('kontrakpengadaan.UserId',$userid)->get();
        }

        $hitunghasil = DB::table('vendor')->where('UserId', $userid)->count();
        if ($hitunghasil < 1 ) {
            $resultHasil = (object) array(
                                            'PersetujuanVerifikasi' => null,
                                            'Status'       => null,
                                            );
        }else{
            $resultHasil = DB::table('vendor')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('vendor.UserId', $userid)->first();
        }

        $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result4 = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        return view('vendors.pendaftaran.kontrakpengadaanbatubara')->with('data', $result)->with('dataHasil',$resultHasil)
                    ->with('data4',$result4);
        }
    }

    public function datateknistambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

        $hitung = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung < 1){
            $result = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        $result2= DB::table('sumbertambang')->where('UserId',$userid)->get();
        $count1= DB::table('sumbertambang')->where('UserId',$userid)->count();
        
        $result3= DB::table('sumbertambang2')->where('UserId',$userid)->get();
        $count2= DB::table('sumbertambang2')->where('UserId',$userid)->count();

        $result4= DB::table('legalitasperijinantambang')->where('UserId',$userid)->first();

        $resultHasil = DB::table('dataadministrasiperusahaan')
                            ->leftjoin('hasilverifikasi','dataadministrasiperusahaan.UserId','=','hasilverifikasi.UserId')
                            ->leftjoin('vendor','dataadministrasiperusahaan.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','dataadministrasiperusahaan.UserId','=','paktaintegritas.UserId')
                            ->where('dataadministrasiperusahaan.UserId', $userid)->first();
        
        return view('vendors.pendaftaran.datateknistambang')->with('data',$result)
                    ->with('data2', $result2)->with('data3', $result3)->with('data4', $result4)
                    ->with('datacount1', $count1)->with('datacount2', $count2)->with('dataHasil', $resultHasil);
        }
    }

    public function listspesifikasibatubara(){
        $userid = \Session::get('vendorid');
        $alamat = \Session::get('alamatlokasi');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung1 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

            if($hitung1 < 1){
                $result1 = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result1 = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $result2 = DB::table('vendor')
                    ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                    ->where('vendor.UserId',$userid)->first();

            $hitung2 = DB::table('datateknistambang')->where('UserId', $userid)->count();

            if($hitung2 < 1){
                $result3 = null;
            } else {
                $result3 = DB::table('spesifikasitambang')
                    ->where('UserId', $userid)
                    ->where('Alamat',$alamat)->get();
            } 

            return view('vendors.pendaftaran.listspesifikasibatubara')->with('data1',$result1)
                        ->with('dataHasil',$result2)->with('data3',$result3);
        }
    }

    public function spesifikasibatubara($id){
        $userid = \Session::get('vendorid');
        $alamat = \Session::get('alamatlokasi');
        $idspek = $id;

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('spesifikasitambang')->where('UserId', $userid)
            ->where('Alamat', $alamat)->where('Ids',$idspek)->count();

            if($hitung < 1){
                $result = (object) array(
                                        'TotalMoistureAR'               => null,
                                        'TotalMoistureADB'              => null,
                                        'TotalMoistureDB'               => null,
                                        'TotalMoistureDAFB'             => null,
                                        'TotalMoistureMethod'           => null,
                                        'TotalMoistureARCk'             => null,
                                        'TotalMoistureADBCk'            => null,
                                        'TotalMoistureDBCk'             => null,
                                        'TotalMoistureDAFBCk'           => null,
                                        'TotalMoistureMethodCk'         => null,
                                        'ProximateMoistureAR'           => null,
                                        'ProximateMoistureADB'          => null,
                                        'ProximateMoistureDB'           => null,
                                        'ProximateMoistureDAFB'         => null,
                                        'ProximateMoistureMethod'       => null,
                                        'ProximateMoistureARCk'         => null,
                                        'ProximateMoistureADBCk'        => null,
                                        'ProximateMoistureDBCk'         => null,
                                        'ProximateMoistureDAFBCk'       => null,
                                        'ProximateMoistureMethodCk'     => null,
                                        'AshContentAR'                  => null,
                                        'AshContentADB'                 => null,
                                        'AshContentDB'                  => null,
                                        'AshContentDAFB'                => null,
                                        'AshContentMethod'              => null,
                                        'AshContentARCk'                => null,
                                        'AshContentADBCk'               => null,
                                        'AshContentDBCk'                => null,
                                        'AshContentDAFBCk'              => null,
                                        'AshContentMethodCk'            => null,
                                        'VolatileAR'                    => null,
                                        'VolatileADB'                   => null,
                                        'VolatileDB'                    => null,
                                        'VolatileDAFB'                  => null,
                                        'VolatileMethod'                => null,
                                        'VolatileARCk'                  => null,
                                        'VolatileADBCk'                 => null,
                                        'VolatileDBCk'                  => null,
                                        'VolatileDAFBCk'                => null,
                                        'VolatileMethodCk'              => null,
                                        'FixedCarbonAR'                 => null,
                                        'FixedCarbonADB'                => null,
                                        'FixedCarbonDB'                 => null,
                                        'FixedCarbonDAFB'               => null,
                                        'FixedCarbonMethod'             => null,
                                        'FixedCarbonARCk'               => null,
                                        'FixedCarbonADBCk'              => null,
                                        'FixedCarbonDBCk'               => null,
                                        'FixedCarbonDAFBCk'             => null,
                                        'FixedCarbonMethodCk'           => null, 
                                        'TotalSulphurAR'                => null,
                                        'TotalSulphurADB'               => null,
                                        'TotalSulphurDB'                => null,
                                        'TotalSulphurDAFB'              => null,
                                        'TotalSulphurMethod'            => null,
                                        'TotalSulphurARCk'              => null,
                                        'TotalSulphurADBCk'             => null,
                                        'TotalSulphurDBCk'              => null,
                                        'TotalSulphurDAFBCk'            => null,
                                        'TotalSulphurMethodCk'          => null,
                                        'GrossCarolicValveAR'           => null,
                                        'GrossCarolicValveADB'          => null,
                                        'GrossCarolicValveDB'           => null,
                                        'GrossCarolicValveDAFB'         => null,
                                        'GrossCarolicValveMethod'       => null,
                                        'GrossCarolicValveARCk'         => null,
                                        'GrossCarolicValveADBCk'        => null,
                                        'GrossCarolicValveDBCk'         => null,
                                        'GrossCarolicValveDAFBCk'       => null,
                                        'GrossCarolicValveMethodCk'     => null,
                                        'HGI'                           => null,
                                        'HGIMethod'                     => null,
                                        'HGICk'                         => null,
                                        'HGIMethodCk'                   => null,
                                        'SizeTestFractionAR'            => null,
                                        'SizeTestFractionADB'           => null,
                                        'SizeTestFractionDB'            => null,
                                        'SizeTestFractionDAFB'          => null,
                                        'SizeTestFractionMethod'        => null,
                                        'SizeTestFractionARCk'          => null,
                                        'SizeTestFractionADBCk'         => null,
                                        'SizeTestFractionDBCk'          => null,
                                        'SizeTestFractionDAFBCk'        => null,
                                        'SizeTestFractionMethodCk'      => null,
                                        'SizeTestPersenAR'              => null,
                                        'SizeTestPersenADB'             => null,
                                        'SizeTestPersenDB'              => null,
                                        'SizeTestPersenDAFB'            => null,
                                        'SizeTestPersenMethod'          => null,
                                        'SizeTestPersenARCk'            => null,
                                        'SizeTestPersenADBCk'           => null,
                                        'SizeTestPersenDBCk'            => null,
                                        'SizeTestPersenDAFBCk'          => null,
                                        'SizeTestPersenMethodCk'        => null,
                                        'InitialAR'                     => null,
                                        'InitialADB'                    => null,
                                        'InitialDB'                     => null,
                                        'InitialDAFB'                   => null,
                                        'InitialMethod'                 => null,
                                        'InitialARCk'                   => null,
                                        'InitialADBCk'                  => null,
                                        'InitialDBCk'                   => null,
                                        'InitialDAFBCk'                 => null,
                                        'InitialMethodCk'               => null,                                  
                                        'SphericalAR'                   => null,
                                        'SphericalADB'                  => null,
                                        'SphericalDB'                   => null,
                                        'SphericalDAFB'                 => null,
                                        'SphericalMethod'               => null,
                                        'SphericalARCk'                 => null,
                                        'SphericalADBCk'                => null,
                                        'SphericalDBCk'                 => null,
                                        'SphericalDAFBCk'               => null,
                                        'SphericalMethodCk'             => null,
                                        'HemisphericalAR'               => null,
                                        'HemisphericalADB'              => null,
                                        'HemisphericalDB'               => null,
                                        'HemisphericalDAFB'             => null,
                                        'HemisphericalMethod'           => null,
                                        'HemisphericalARCk'             => null,
                                        'HemisphericalADBCk'            => null,
                                        'HemisphericalDBCk'             => null,
                                        'HemisphericalDAFBCk'           => null,
                                        'HemisphericalMethodCk'         => null,
                                        'FluidizedAR'                   => null,
                                        'FluidizedADB'                  => null,
                                        'FluidizedDB'                   => null,
                                        'FluidizedDAFB'                 => null,
                                        'FluidizedMethod'               => null,
                                        'FluidizedARCk'                 => null,
                                        'FluidizedADBCk'                => null,
                                        'FluidizedDBCk'                 => null,
                                        'FluidizedDAFBCk'               => null,
                                        'FluidizedMethodCk'             => null,
                                        'Surveyor'                      => null,
                                        'SurveyorCk'                    => null,
                                         );
            } else {
                \Session::put('idspek', $idspek);

                $result = DB::table('spesifikasitambang')
                        ->where('UserId', $userid)
                        ->where('Alamat', $alamat)
                        ->where('Ids',$idspek)
                        ->first();
            }   

            $hitung4 = DB::table('dataadministrasiperusahaan')
                      ->where('UserId', $userid)->count();

            if($hitung4 < 1){
                $result4 = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result4 = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }     

            $result2 = DB::table('vendor')
                        ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                        ->where('vendor.UserId',$userid)->first();

            return view('vendors.pendaftaran.spesifikasibatubara')->with('data', $result)
                        ->with('data4',$result4)->with('data2',$result2);
        }
    }

    public function saranapengangkutbatubara(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('saranapengangkut')->where('UserId', $userid)->count();

        if($hitung < 1){
            $result = (object) array(
                                        'JenisPeralatan'            => null,
                                        'JenisPeralatanCk'          => null,
                                        'KapasitasMaksimumKapal'    => null,
                                        'KapasitasMaksimumKapalCk'  => null,
                                        'KapasitasLoading'          => null,
                                        'KapasitasLoadingCk'        => null,
                                        'TahunPembuatan'            => null,
                                        'TahunPembuatanCk'          => null,
                                        'KapasitasAngkut'           => null,
                                        'KapasitasAngkutCk'         => null,
                                        'Kondisi'                   => null,
                                        'KondisiCk'                 => null,
                                        'PersetujuanVerifikasi'     => null,
                                     );
        } else {
            $result = DB::table('saranapengangkut')
                    ->join('vendor','saranapengangkut.UserId','=','vendor.UserId')
                    ->where('saranapengangkut.UserId', $userid)->first();
        }        

        $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Nama'      => null,
                                        'Alamat'    => null,
                                        'BadanUsaha'=> null,
                                      );
        }else{
            $result4 = DB::table('dataadministrasiperusahaan')
                        ->select('Nama','Alamat','BadanUsaha')
                        ->where('UserId','=',$userid)
                        ->first();
        }

        return view('vendors.pendaftaran.saranapengangkutbatubara')->with('data', $result)
                    ->with('data4',$result4);
        }
    }

    public function kirimdokumen(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{
            $result = DB::table('vendor')
                        ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                        ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                        ->where('vendor.UserId',$userid)->first();
            return view('vendors.pendaftaran.kirimdokumen')->with('data',$result);
        }
    }

    public function savedataadministrasiperusahaan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nama']))
                $nama = '';
            else
                $nama = $_POST['nama'];

            if(!isset($_POST['status']))
                $status = '';
            else
                $status = $_POST['status'];

            if(!isset($_POST['alamat']))
                $alamat = '';
            else
                $alamat = $_POST['alamat'];
           
            if(!isset($_POST['no_tlp_kantor']))
                $notlpkantor = '';
            else
                $notlpkantor = $_POST['no_tlp_kantor'];

            if(!isset($_POST['no_fax_kantor']))
                $nofaxkantor = '';
            else
                $nofaxkantor = $_POST['no_fax_kantor'];

            if(!isset($_POST['email_perusahaan']))
                $emailperusahaan = '';
            else
                $emailperusahaan = $_POST['email_perusahaan'];

            if(!isset($_POST['website']))
                $website = '';
            else
                $website = $_POST['website'];

            if(!isset($_POST['direktur_utama']))
                $direkturutama = '';
            else
                $direkturutama = $_POST['direktur_utama'];

            if(!isset($_POST['contact_person']))
                $contactperson = '';
            else
                $contactperson   = $_POST['contact_person'];

            if(!isset($_POST['no_tlp_contact_person']))
                $notlpcp = '';
            else
                $notlpcp         = $_POST['no_tlp_contact_person'];

            if(!isset($_POST['email_contact_person']))
                $emailcp = '';
            else
                $emailcp         = $_POST['email_contact_person'];

            if(!isset($_POST['badanusaha']))
                $badanusaha = '';
            else
                $badanusaha         = $_POST['badanusaha'];

            $data = array(
                            'Nama'                  => $nama,
                            'BadanUsaha'            => $badanusaha,
                            'StatusPerusahaan'      => $status,
                            'Alamat'                => $alamat,
                            'TlpKantor'             => $notlpkantor,
                            'FaxKantor'             => $nofaxkantor,
                            'Email'                 => $emailperusahaan,
                            'Website'               => $website,
                            'DirekturUtama'         => $direkturutama,
                            'ContactPerson'         => $contactperson,
                            'TlpContactPerson'      => $notlpcp,
                            'EmailContactPerson'    => $emailcp,
                         );
            $i = DB::table('dataadministrasiperusahaan')->where('UserId',$userid)->update($data);

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }
            
            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                $ipAddress = $this->getIP();
                if(!empty($ipAddress)){
                    $data = array(
                                    'UserId' => $userid,
                                    'IP'     => $ipAddress,
                                    'Aksi'   => 'Simpan Data Administrasi Perusahaan',
                                 );
                    $i = DB::table('log')->insert($data);
                }
                return redirect('legalitasperijinanperusahaan');
            }
        }
    }

    public function savelegalitasperijinanperusahaan(){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nomor_akta']))
                $nomor_akta = '';
            else
                $nomor_akta = $_POST['nomor_akta'];

            if(!isset($_POST['tgl_akta']))
                $tgl_akta = '';
            else
                if ($_POST['tgl_akta']=="")
                   $tgl_akta = null;
                else 
                    $tgl_akta = date("Y-m-d", strtotime($_POST['tgl_akta']));

            if(!isset($_POST['nama_notaris']))
                $nama_notaris = '';
            else
                $nama_notaris = $_POST['nama_notaris'];

            if(!isset($_POST['nomor_akta_perubahan']))
                $nomor_akta_perubahan = '';
            else
                $nomor_akta_perubahan = $_POST['nomor_akta_perubahan'];

            if(!isset($_POST['tgl_akta_perubahan']))
                $tgl_akta_perubahan = '';
            else
                if ($_POST['tgl_akta_perubahan']=="")
                   $tgl_akta_perubahan = null;
                else 
                    $tgl_akta_perubahan = date("Y-m-d", strtotime($_POST['tgl_akta_perubahan']));

            if(!isset($_POST['nama_notaris_perubahan']))
                $nama_notaris_perubahan = '';
            else
                $nama_notaris_perubahan = $_POST['nama_notaris_perubahan'];

            if(!isset($_POST['no_pengesahan1']))
                $no_pengesahan1 = '';
            else
                $no_pengesahan1 = $_POST['no_pengesahan1'];

            if(!isset($_POST['no_pengesahan2']))
                $no_pengesahan2 = '';
            else
                $no_pengesahan2 = $_POST['no_pengesahan2'];

            if(!isset($_POST['tgl_pengesahan1']))
                $tgl_pengesahan1 = '';
            else
                if ($_POST['tgl_pengesahan1']=="")
                   $tgl_pengesahan1 = null;
                else 
                    $tgl_pengesahan1 = date("Y-m-d", strtotime($_POST['tgl_pengesahan1']));

            if(!isset($_POST['tgl_pengesahan2']))
                $tgl_pengesahan2 = '';
            else
                if ($_POST['tgl_pengesahan2']=="")
                   $tgl_pengesahan2 = null;
                else 
                    $tgl_pengesahan2 = date("Y-m-d", strtotime($_POST['tgl_pengesahan2']));

            if(!isset($_POST['penerbit_siup']))
                $penerbit_siup = '';
            else
                $penerbit_siup = $_POST['penerbit_siup'];

            if(!isset($_POST['no_siup']))
                $no_siup = '';
            else
                $no_siup = $_POST['no_siup'];

            if(!isset($_POST['tgl_siup']))
                $tgl_siup = '';
            else
                if ($_POST['tgl_siup']=="")
                   $tgl_siup = null;
                else 
                    $tgl_siup = date("Y-m-d", strtotime($_POST['tgl_siup']));

            if(!isset($_POST['tglsd_siup']))
                $tglsd_siup = '';
            else
                if ($_POST['tglsd_siup']=="")
                   $tglsd_siup = null;
                else 
                    $tglsd_siup = date("Y-m-d", strtotime($_POST['tglsd_siup']));

            if(!isset($_POST['penerbit_tdp']))
                $penerbit_tdp = '';
            else
                $penerbit_tdp = $_POST['penerbit_tdp'];

            if(!isset($_POST['no_tdp']))
                $no_tdp = '';
            else
                $no_tdp = $_POST['no_tdp'];

            if(!isset($_POST['tgl_tdp']))
                $tgl_tdp = '';
            else
                if ($_POST['tgl_tdp']=="")
                   $tgl_tdp = null;
                else 
                    $tgl_tdp = date("Y-m-d", strtotime($_POST['tgl_tdp']));

            if(!isset($_POST['tglsd_tdp']))
                $tglsd_tdp = '';
            else
                if ($_POST['tglsd_tdp']=="")
                   $tglsd_tdp = null;
                else 
                    $tglsd_tdp = date("Y-m-d", strtotime($_POST['tglsd_tdp']));

            if(!isset($_POST['penerbit_skdp']))
                $penerbit_skdp = '';
            else
                $penerbit_skdp = $_POST['penerbit_skdp'];

            if(!isset($_POST['no_skdp']))
                $no_skdp = '';
            else
                $no_skdp = $_POST['no_skdp'];

            if(!isset($_POST['tgl_skdp']))
                $tgl_skdp = '';
            else
                if ($_POST['tgl_skdp']=="")
                   $tgl_skdp = null;
                else 
                    $tgl_skdp = date("Y-m-d", strtotime($_POST['tgl_skdp']));

            if(!isset($_POST['tglsd_skdp']))
                $tglsd_skdp = '';
            else
                if ($_POST['tglsd_skdp']=="")
                   $tglsd_skdp = null;
                else 
                    $tglsd_skdp = date("Y-m-d", strtotime($_POST['tglsd_skdp']));

            $result = DB::table('legalitasperijinanperusahaan')->where('UserId','=',$userid)->first();
            if(is_null($result)){       
                $data = array(
                                'UserId'                           => $userid,
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Legalitas Perijinan Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    //return back();
                    return redirect('legalitasperijinantambang');
                }

            }else{
                $data = array(
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Legalitas Perijinan Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    //return back();
                    return redirect('legalitasperijinantambang');
                }

            }
        }   
    }

    public function savekomisarisperusahaan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nomor_akta_1']))
                $nomor_akta = '';
            else
                $nomor_akta = $_POST['nomor_akta_1'];

            if(!isset($_POST['tgl_akta_1']))
                $tgl_akta = '';
            else
                if ($_POST['tgl_akta_1']=="") $tgl_akta = null;
                else 
                    $tgl_akta = date("Y-m-d", strtotime($_POST['tgl_akta_1']));

            if(!isset($_POST['nama_notaris_1']))
                $nama_notaris = '';
            else
                $nama_notaris = $_POST['nama_notaris_1'];

            if(!isset($_POST['nomor_akta_perubahan_1']))
                $nomor_akta_perubahan = '';
            else
                $nomor_akta_perubahan = $_POST['nomor_akta_perubahan_1'];

            if(!isset($_POST['tgl_akta_perubahan_1']))
                $tgl_akta_perubahan = '';
            else
                if ($_POST['tgl_akta_perubahan_1']=="")
                   $tgl_akta_perubahan = null;
                else 
                    $tgl_akta_perubahan = date("Y-m-d", strtotime($_POST['tgl_akta_perubahan_1']));

            if(!isset($_POST['nama_notaris_perubahan_1']))
                $nama_notaris_perubahan = '';
            else
                $nama_notaris_perubahan = $_POST['nama_notaris_perubahan_1'];

            if(!isset($_POST['no_pengesahan1_1']))
                $no_pengesahan1 = '';
            else
                $no_pengesahan1 = $_POST['no_pengesahan1_1'];

            if(!isset($_POST['no_pengesahan2_1']))
                $no_pengesahan2 = '';
            else
                $no_pengesahan2 = $_POST['no_pengesahan2_1'];

            if(!isset($_POST['tgl_pengesahan1_1']))
                $tgl_pengesahan1 = '';
            else
                if ($_POST['tgl_pengesahan1_1']=="")
                   $tgl_pengesahan1 = null;
                else 
                    $tgl_pengesahan1 = date("Y-m-d", strtotime($_POST['tgl_pengesahan1_1']));

            if(!isset($_POST['tgl_pengesahan2_1']))
                $tgl_pengesahan2 = '';
            else
                if ($_POST['tgl_pengesahan2_1']=="")
                   $tgl_pengesahan2 = null;
                else 
                    $tgl_pengesahan2 = date("Y-m-d", strtotime($_POST['tgl_pengesahan2_1']));

            if(!isset($_POST['penerbit_siup_1']))
                $penerbit_siup = '';
            else
                $penerbit_siup = $_POST['penerbit_siup_1'];

            if(!isset($_POST['no_siup_1']))
                $no_siup = '';
            else
                $no_siup = $_POST['no_siup_1'];

            if(!isset($_POST['tgl_siup_1']))
                $tgl_siup = '';
            else
                if ($_POST['tgl_siup_1']=="")
                   $tgl_siup = null;
                else 
                    $tgl_siup = date("Y-m-d", strtotime($_POST['tgl_siup_1']));

            if(!isset($_POST['tglsd_siup_1']))
                $tglsd_siup = '';
            else
                if ($_POST['tglsd_siup_1']=="")
                   $tglsd_siup = null;
                else 
                    $tglsd_siup = date("Y-m-d", strtotime($_POST['tglsd_siup_1']));

            if(!isset($_POST['penerbit_tdp_1']))
                $penerbit_tdp = '';
            else
                $penerbit_tdp = $_POST['penerbit_tdp_1'];

            if(!isset($_POST['no_tdp_1']))
                $no_tdp = '';
            else
                $no_tdp = $_POST['no_tdp_1'];

            if(!isset($_POST['tgl_tdp_1']))
                $tgl_tdp = '';
            else
                if ($_POST['tgl_tdp_1']=="")
                   $tgl_tdp = null;
                else 
                    $tgl_tdp = date("Y-m-d", strtotime($_POST['tgl_tdp_1']));

            if(!isset($_POST['tglsd_tdp_1']))
                $tglsd_tdp = '';
            else
                if ($_POST['tglsd_tdp_1']=="")
                   $tglsd_tdp = null;
                else 
                    $tglsd_tdp = date("Y-m-d", strtotime($_POST['tglsd_tdp_1']));

            if(!isset($_POST['penerbit_skdp_1']))
                $penerbit_skdp = '';
            else
                $penerbit_skdp = $_POST['penerbit_skdp_1'];

            if(!isset($_POST['no_skdp_1']))
                $no_skdp = '';
            else
                $no_skdp = $_POST['no_skdp_1'];

            if(!isset($_POST['tgl_skdp_1']))
                $tgl_skdp = '';
            else
                if ($_POST['tgl_skdp_1']=="")
                   $tgl_skdp = null;
                else 
                    $tgl_skdp = date("Y-m-d", strtotime($_POST['tgl_skdp_1']));

            if(!isset($_POST['tglsd_skdp_1']))
                $tglsd_skdp = '';
            else
                if ($_POST['tglsd_skdp_1']=="")
                   $tglsd_skdp = null;
                else 
                    $tglsd_skdp = date("Y-m-d", strtotime($_POST['tglsd_skdp_1']));

            $result = DB::table('legalitasperijinanperusahaan')->where('UserId','=',$userid)->first();
            if(is_null($result)){       
                $data = array(
                                'UserId'                           => $userid,
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            }else{
                $data = array(
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }
            }

            if(!isset($_POST['nama_komisaris']))
                $nama_komisaris = '';
            else
                $nama_komisaris = $_POST['nama_komisaris'];

            if(!isset($_POST['ktp_komisaris']))
                $ktp_komisaris = '';
            else
                $ktp_komisaris = $_POST['ktp_komisaris'];

            if(!isset($_POST['jabatan_komisaris']))
                $jabatan_komisaris = '';
            else
                $jabatan_komisaris = $_POST['jabatan_komisaris'];

            $resultKomisaris = DB::table('komisarisperusahaan')->where('UserId','=',$userid)->where('Nama','=',$nama_komisaris)->first();
                
            if(is_null($resultKomisaris)){
                $data = array(
                            'UserId'    => $userid,
                            'Nama'      => $nama_komisaris,
                            'NoKTP'     => $ktp_komisaris,
                            'Jabatan'   => $jabatan_komisaris,
                          );
                $i = DB::table('komisarisperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Komisaris Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }

            } else {
                $data = array(
                            'NoKTP'     => $ktp_komisaris,
                            'Jabatan'   => $jabatan_komisaris,
                          );
                $i = DB::table('komisarisperusahaan')->where('UserId','=',$userid)->where('Nama','=',$nama_komisaris)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Komisaris Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }
            }
        }
    }

    public function savekomisarisperusahaanperubahan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nomor_akta_3']))
                $nomor_akta = '';
            else
                $nomor_akta = $_POST['nomor_akta_3'];

            if(!isset($_POST['tgl_akta_3']))
                $tgl_akta = '';
            else
                if ($_POST['tgl_akta_3']=="") $tgl_akta = null;
                else 
                    $tgl_akta = date("Y-m-d", strtotime($_POST['tgl_akta_3']));

            if(!isset($_POST['nama_notaris_3']))
                $nama_notaris = '';
            else
                $nama_notaris = $_POST['nama_notaris_3'];

            if(!isset($_POST['nomor_akta_perubahan_3']))
                $nomor_akta_perubahan = '';
            else
                $nomor_akta_perubahan = $_POST['nomor_akta_perubahan_3'];

            if(!isset($_POST['tgl_akta_perubahan_3']))
                $tgl_akta_perubahan = '';
            else
                if ($_POST['tgl_akta_perubahan_3']=="")
                   $tgl_akta_perubahan = null;
                else 
                    $tgl_akta_perubahan = date("Y-m-d", strtotime($_POST['tgl_akta_perubahan_3']));

            if(!isset($_POST['nama_notaris_perubahan_3']))
                $nama_notaris_perubahan = '';
            else
                $nama_notaris_perubahan = $_POST['nama_notaris_perubahan_3'];

            if(!isset($_POST['no_pengesahan1_3']))
                $no_pengesahan1 = '';
            else
                $no_pengesahan1 = $_POST['no_pengesahan1_3'];

            if(!isset($_POST['no_pengesahan2_3']))
                $no_pengesahan2 = '';
            else
                $no_pengesahan2 = $_POST['no_pengesahan2_3'];

            if(!isset($_POST['tgl_pengesahan1_3']))
                $tgl_pengesahan1 = '';
            else
                if ($_POST['tgl_pengesahan1_3']=="")
                   $tgl_pengesahan1 = null;
                else 
                    $tgl_pengesahan1 = date("Y-m-d", strtotime($_POST['tgl_pengesahan1_3']));

            if(!isset($_POST['tgl_pengesahan2_3']))
                $tgl_pengesahan2 = '';
            else
                if ($_POST['tgl_pengesahan2_3']=="")
                   $tgl_pengesahan2 = null;
                else 
                    $tgl_pengesahan2 = date("Y-m-d", strtotime($_POST['tgl_pengesahan2_3']));

            if(!isset($_POST['penerbit_siup_3']))
                $penerbit_siup = '';
            else
                $penerbit_siup = $_POST['penerbit_siup_3'];

            if(!isset($_POST['no_siup_3']))
                $no_siup = '';
            else
                $no_siup = $_POST['no_siup_3'];

            if(!isset($_POST['tgl_siup_3']))
                $tgl_siup = '';
            else
                if ($_POST['tgl_siup_3']=="")
                   $tgl_siup = null;
                else 
                    $tgl_siup = date("Y-m-d", strtotime($_POST['tgl_siup_3']));

            if(!isset($_POST['tglsd_siup_3']))
                $tglsd_siup = '';
            else
                if ($_POST['tglsd_siup_3']=="")
                   $tglsd_siup = null;
                else 
                    $tglsd_siup = date("Y-m-d", strtotime($_POST['tglsd_siup_3']));

            if(!isset($_POST['penerbit_tdp_3']))
                $penerbit_tdp = '';
            else
                $penerbit_tdp = $_POST['penerbit_tdp_3'];

            if(!isset($_POST['no_tdp_3']))
                $no_tdp = '';
            else
                $no_tdp = $_POST['no_tdp_3'];

            if(!isset($_POST['tgl_tdp_3']))
                $tgl_tdp = '';
            else
                if ($_POST['tgl_tdp_3']=="")
                   $tgl_tdp = null;
                else 
                    $tgl_tdp = date("Y-m-d", strtotime($_POST['tgl_tdp_3']));

            if(!isset($_POST['tglsd_tdp_3']))
                $tglsd_tdp = '';
            else
                if ($_POST['tglsd_tdp_3']=="")
                   $tglsd_tdp = null;
                else 
                    $tglsd_tdp = date("Y-m-d", strtotime($_POST['tglsd_tdp_3']));

            if(!isset($_POST['penerbit_skdp_3']))
                $penerbit_skdp = '';
            else
                $penerbit_skdp = $_POST['penerbit_skdp_3'];

            if(!isset($_POST['no_skdp_3']))
                $no_skdp = '';
            else
                $no_skdp = $_POST['no_skdp_3'];

            if(!isset($_POST['tgl_skdp_3']))
                $tgl_skdp = '';
            else
                if ($_POST['tgl_skdp_3']=="")
                   $tgl_skdp = null;
                else 
                    $tgl_skdp = date("Y-m-d", strtotime($_POST['tgl_skdp_3']));

            if(!isset($_POST['tglsd_skdp_3']))
                $tglsd_skdp = '';
            else
                if ($_POST['tglsd_skdp_3']=="")
                   $tglsd_skdp = null;
                else 
                    $tglsd_skdp = date("Y-m-d", strtotime($_POST['tglsd_skdp_3']));
            

            $result = DB::table('legalitasperijinanperusahaan')->where('UserId','=',$userid)->first();
            if(is_null($result)){       
                $data = array(
                                'UserId'                           => $userid,
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            }else{
                $data = array(
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }
            }

            if(!isset($_POST['nama_komisaris_perubahan']))
                $nama_komisaris = '';
            else
                $nama_komisaris = $_POST['nama_komisaris_perubahan'];

            if(!isset($_POST['ktp_komisaris_perubahan']))
                $ktp_komisaris = '';
            else
                $ktp_komisaris = $_POST['ktp_komisaris_perubahan'];

            if(!isset($_POST['jabatan_komisaris_perubahan']))
                $jabatan_komisaris = '';
            else
                $jabatan_komisaris = $_POST['jabatan_komisaris_perubahan'];

            $resultKomisaris = DB::table('komisarisperusahaanperubahan')->where('UserId','=',$userid)->where('Nama','=',$nama_komisaris)->first();
                
            if(is_null($resultKomisaris)){
                $data = array(
                            'UserId'    => $userid,
                            'Nama'      => $nama_komisaris,
                            'NoKTP'     => $ktp_komisaris,
                            'Jabatan'   => $jabatan_komisaris,
                          );
                $i = DB::table('komisarisperusahaanperubahan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Komisaris Perusahaan Perubahan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }

            } else {
                $data = array(
                            'NoKTP'     => $ktp_komisaris,
                            'Jabatan'   => $jabatan_komisaris,
                          );
                $i = DB::table('komisarisperusahaanperubahan')->where('UserId','=',$userid)->where('Nama','=',$nama_komisaris)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Komisaris Perusahaan Perubahan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }
            }
        }
    }

    public function savedireksiperusahaan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nomor_akta_2']))
                $nomor_akta = '';
            else
                $nomor_akta = $_POST['nomor_akta_2'];

            if(!isset($_POST['tgl_akta_2']))
                $tgl_akta = '';
            else
                if ($_POST['tgl_akta_2']=="") $tgl_akta = null;
                else 
                    $tgl_akta = date("Y-m-d", strtotime($_POST['tgl_akta_2']));

            if(!isset($_POST['nama_notaris_2']))
                $nama_notaris = '';
            else
                $nama_notaris = $_POST['nama_notaris_2'];

            if(!isset($_POST['nomor_akta_perubahan_2']))
                $nomor_akta_perubahan = '';
            else
                $nomor_akta_perubahan = $_POST['nomor_akta_perubahan_2'];

            if(!isset($_POST['tgl_akta_perubahan_2']))
                $tgl_akta_perubahan = '';
            else
                if ($_POST['tgl_akta_perubahan_2']=="")
                   $tgl_akta_perubahan = null;
                else 
                    $tgl_akta_perubahan = date("Y-m-d", strtotime($_POST['tgl_akta_perubahan_2']));

            if(!isset($_POST['nama_notaris_perubahan_2']))
                $nama_notaris_perubahan = '';
            else
                $nama_notaris_perubahan = $_POST['nama_notaris_perubahan_2'];

            if(!isset($_POST['no_pengesahan1_2']))
                $no_pengesahan1 = '';
            else
                $no_pengesahan1 = $_POST['no_pengesahan1_2'];

            if(!isset($_POST['no_pengesahan2_2']))
                $no_pengesahan2 = '';
            else
                $no_pengesahan2 = $_POST['no_pengesahan2_2'];

            if(!isset($_POST['tgl_pengesahan1_2']))
                $tgl_pengesahan1 = '';
            else
                if ($_POST['tgl_pengesahan1_2']=="")
                   $tgl_pengesahan1 = null;
                else 
                    $tgl_pengesahan1 = date("Y-m-d", strtotime($_POST['tgl_pengesahan1_2']));

            if(!isset($_POST['tgl_pengesahan2_2']))
                $tgl_pengesahan2 = '';
            else
                if ($_POST['tgl_pengesahan2_2']=="")
                   $tgl_pengesahan2 = null;
                else 
                    $tgl_pengesahan2 = date("Y-m-d", strtotime($_POST['tgl_pengesahan2_2']));

            if(!isset($_POST['penerbit_siup_2']))
                $penerbit_siup = '';
            else
                $penerbit_siup = $_POST['penerbit_siup_2'];

            if(!isset($_POST['no_siup_2']))
                $no_siup = '';
            else
                $no_siup = $_POST['no_siup_2'];

            if(!isset($_POST['tgl_siup_2']))
                $tgl_siup = '';
            else
                if ($_POST['tgl_siup_2']=="")
                   $tgl_siup = null;
                else 
                    $tgl_siup = date("Y-m-d", strtotime($_POST['tgl_siup_2']));

            if(!isset($_POST['tglsd_siup_2']))
                $tglsd_siup = '';
            else
                if ($_POST['tglsd_siup_2']=="")
                   $tglsd_siup = null;
                else 
                    $tglsd_siup = date("Y-m-d", strtotime($_POST['tglsd_siup_2']));

            if(!isset($_POST['penerbit_tdp_2']))
                $penerbit_tdp = '';
            else
                $penerbit_tdp = $_POST['penerbit_tdp_2'];

            if(!isset($_POST['no_tdp_2']))
                $no_tdp = '';
            else
                $no_tdp = $_POST['no_tdp_2'];

            if(!isset($_POST['tgl_tdp_2']))
                $tgl_tdp = '';
            else
                if ($_POST['tgl_tdp_2']=="")
                   $tgl_tdp = null;
                else 
                    $tgl_tdp = date("Y-m-d", strtotime($_POST['tgl_tdp_2']));

            if(!isset($_POST['tglsd_tdp_2']))
                $tglsd_tdp = '';
            else
                if ($_POST['tglsd_tdp_2']=="")
                   $tglsd_tdp = null;
                else 
                    $tglsd_tdp = date("Y-m-d", strtotime($_POST['tglsd_tdp_2']));

            if(!isset($_POST['penerbit_skdp_2']))
                $penerbit_skdp = '';
            else
                $penerbit_skdp = $_POST['penerbit_skdp_2'];

            if(!isset($_POST['no_skdp_2']))
                $no_skdp = '';
            else
                $no_skdp = $_POST['no_skdp_2'];

            if(!isset($_POST['tgl_skdp_2']))
                $tgl_skdp = '';
            else
                if ($_POST['tgl_skdp_2']=="")
                   $tgl_skdp = null;
                else 
                    $tgl_skdp = date("Y-m-d", strtotime($_POST['tgl_skdp_2']));

            if(!isset($_POST['tglsd_skdp_2']))
                $tglsd_skdp = '';
            else
                if ($_POST['tglsd_skdp_2']=="")
                   $tglsd_skdp = null;
                else 
                    $tglsd_skdp = date("Y-m-d", strtotime($_POST['tglsd_skdp_2']));

            $result = DB::table('legalitasperijinanperusahaan')->where('UserId','=',$userid)->first();
            if(is_null($result)){       
                $data = array(
                                'UserId'                           => $userid,
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            }else{
                $data = array(
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }
            }

            if(!isset($_POST['nama_direksi']))
                $nama_direksi = '';
            else
                $nama_direksi = $_POST['nama_direksi'];

            if(!isset($_POST['ktp_direksi']))
                $ktp_direksi = '';
            else
                $ktp_direksi = $_POST['ktp_direksi'];

            if(!isset($_POST['jabatan_direksi']))
                $jabatan_direksi = '';
            else
                $jabatan_direksi = $_POST['jabatan_direksi'];

            $resultDireksi = DB::table('direksiperusahaan')->where('UserId','=',$userid)->where('Nama','=',$nama_direksi)->first();
            if(is_null($resultDireksi)){
                $data = array(
                            'UserId'    => $userid,
                            'Nama'      => $nama_direksi,
                            'NoKTP'     => $ktp_direksi,
                            'Jabatan'   => $jabatan_direksi,
                          );
                $i = DB::table('direksiperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Direksi Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }

            } else {
                $data = array(
                            'NoKTP'     => $ktp_direksi,
                            'Jabatan'   => $jabatan_direksi,
                          );
                $i = DB::table('direksiperusahaan')->where('UserId','=',$userid)->where('Nama','=',$nama_direksi)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Direksi Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }
            }
        }
    }

    public function savedireksiperusahaanperubahan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nomor_akta_4']))
                $nomor_akta = '';
            else
                $nomor_akta = $_POST['nomor_akta_4'];

            if(!isset($_POST['tgl_akta_4']))
                $tgl_akta = '';
            else
                if ($_POST['tgl_akta_4']=="") $tgl_akta = null;
                else 
                    $tgl_akta = date("Y-m-d", strtotime($_POST['tgl_akta_4']));

            if(!isset($_POST['nama_notaris_4']))
                $nama_notaris = '';
            else
                $nama_notaris = $_POST['nama_notaris_4'];

            if(!isset($_POST['nomor_akta_perubahan_4']))
                $nomor_akta_perubahan = '';
            else
                $nomor_akta_perubahan = $_POST['nomor_akta_perubahan_4'];

            if(!isset($_POST['tgl_akta_perubahan_4']))
                $tgl_akta_perubahan = '';
            else
                if ($_POST['tgl_akta_perubahan_4']=="")
                   $tgl_akta_perubahan = null;
                else 
                    $tgl_akta_perubahan = date("Y-m-d", strtotime($_POST['tgl_akta_perubahan_4']));

            if(!isset($_POST['nama_notaris_perubahan_4']))
                $nama_notaris_perubahan = '';
            else
                $nama_notaris_perubahan = $_POST['nama_notaris_perubahan_4'];

            if(!isset($_POST['no_pengesahan1_4']))
                $no_pengesahan1 = '';
            else
                $no_pengesahan1 = $_POST['no_pengesahan1_4'];

            if(!isset($_POST['no_pengesahan2_4']))
                $no_pengesahan2 = '';
            else
                $no_pengesahan2 = $_POST['no_pengesahan2_4'];

            if(!isset($_POST['tgl_pengesahan1_4']))
                $tgl_pengesahan1 = '';
            else
                if ($_POST['tgl_pengesahan1_4']=="")
                   $tgl_pengesahan1 = null;
                else 
                    $tgl_pengesahan1 = date("Y-m-d", strtotime($_POST['tgl_pengesahan1_4']));

            if(!isset($_POST['tgl_pengesahan2_4']))
                $tgl_pengesahan2 = '';
            else
                if ($_POST['tgl_pengesahan2_4']=="")
                   $tgl_pengesahan2 = null;
                else 
                    $tgl_pengesahan2 = date("Y-m-d", strtotime($_POST['tgl_pengesahan2_4']));

            if(!isset($_POST['penerbit_siup_4']))
                $penerbit_siup = '';
            else
                $penerbit_siup = $_POST['penerbit_siup_4'];

            if(!isset($_POST['no_siup_4']))
                $no_siup = '';
            else
                $no_siup = $_POST['no_siup_4'];

            if(!isset($_POST['tgl_siup_4']))
                $tgl_siup = '';
            else
                if ($_POST['tgl_siup_4']=="")
                   $tgl_siup = null;
                else 
                    $tgl_siup = date("Y-m-d", strtotime($_POST['tgl_siup_4']));

            if(!isset($_POST['tglsd_siup_4']))
                $tglsd_siup = '';
            else
                if ($_POST['tglsd_siup_4']=="")
                   $tglsd_siup = null;
                else 
                    $tglsd_siup = date("Y-m-d", strtotime($_POST['tglsd_siup_4']));

            if(!isset($_POST['penerbit_tdp_4']))
                $penerbit_tdp = '';
            else
                $penerbit_tdp = $_POST['penerbit_tdp_4'];

            if(!isset($_POST['no_tdp_4']))
                $no_tdp = '';
            else
                $no_tdp = $_POST['no_tdp_4'];

            if(!isset($_POST['tgl_tdp_4']))
                $tgl_tdp = '';
            else
                if ($_POST['tgl_tdp_4']=="")
                   $tgl_tdp = null;
                else 
                    $tgl_tdp = date("Y-m-d", strtotime($_POST['tgl_tdp_4']));

            if(!isset($_POST['tglsd_tdp_4']))
                $tglsd_tdp = '';
            else
                if ($_POST['tglsd_tdp_4']=="")
                   $tglsd_tdp = null;
                else 
                    $tglsd_tdp = date("Y-m-d", strtotime($_POST['tglsd_tdp_4']));

            if(!isset($_POST['penerbit_skdp_4']))
                $penerbit_skdp = '';
            else
                $penerbit_skdp = $_POST['penerbit_skdp_4'];

            if(!isset($_POST['no_skdp_4']))
                $no_skdp = '';
            else
                $no_skdp = $_POST['no_skdp_4'];

            if(!isset($_POST['tgl_skdp_4']))
                $tgl_skdp = '';
            else
                if ($_POST['tgl_skdp_4']=="")
                   $tgl_skdp = null;
                else 
                    $tgl_skdp = date("Y-m-d", strtotime($_POST['tgl_skdp_4']));

            if(!isset($_POST['tglsd_skdp_4']))
                $tglsd_skdp = '';
            else
                if ($_POST['tglsd_skdp_4']=="")
                   $tglsd_skdp = null;
                else 
                    $tglsd_skdp = date("Y-m-d", strtotime($_POST['tglsd_skdp_4']));

            $result = DB::table('legalitasperijinanperusahaan')->where('UserId','=',$userid)->first();
            if(is_null($result)){       
                $data = array(
                                'UserId'                           => $userid,
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            }else{
                $data = array(
                                'NomorAkta'                        => $nomor_akta,
                                'TanggalAkta'                      => $tgl_akta,
                                'NamaNotaris'                      => $nama_notaris,
                                'NomorAktaPerubahan'               => $nomor_akta_perubahan,
                                'TanggalAktaPerubahan'             => $tgl_akta_perubahan,
                                'NamaNotarisPerubahan'             => $nama_notaris_perubahan,
                                'NomorPengesahanKemenhumkam'       => $no_pengesahan1,
                                'TanggalPengesahanKemenhumkam'     => $tgl_pengesahan1,
                                'NomorPengesahanKemenhumkamPerubahan'=> $no_pengesahan2,
                                'TanggalPengesahanKemenhumkamPerubahan'=> $tgl_pengesahan2,
                                'PenerbitSIUP'                     => $penerbit_siup,
                                'NomorSIUP'                        => $no_siup,
                                'TanggalSIUP'                      => $tgl_siup,
                                'TanggalSdSIUP'                    => $tglsd_siup,
                                'PenerbitTDP'                      => $penerbit_tdp,
                                'NomorTDP'                         => $no_tdp,
                                'TanggalTDP'                       => $tgl_tdp,
                                'TanggalSdTDP'                     => $tglsd_tdp,
                                'PenerbitSKDP'                     => $penerbit_skdp,
                                'NomorSKDP'                        => $no_skdp,
                                'TanggalSKDP'                      => $tgl_skdp,
                                'TanggalSdSKDP'                    => $tglsd_skdp,
                             );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }
            }
            
            if(!isset($_POST['nama_direksi_perubahan']))
                $nama_direksi = '';
            else
                $nama_direksi = $_POST['nama_direksi_perubahan'];

            if(!isset($_POST['ktp_direksi_perubahan']))
                $ktp_direksi = '';
            else
                $ktp_direksi = $_POST['ktp_direksi_perubahan'];

            if(!isset($_POST['jabatan_direksi_perubahan']))
                $jabatan_direksi = '';
            else
                $jabatan_direksi = $_POST['jabatan_direksi_perubahan'];

            $resultDireksi = DB::table('direksiperusahaanperubahan')->where('UserId','=',$userid)->where('Nama','=',$nama_direksi)->first();
            if(is_null($resultDireksi)){
                $data = array(
                            'UserId'    => $userid,
                            'Nama'      => $nama_direksi,
                            'NoKTP'     => $ktp_direksi,
                            'Jabatan'   => $jabatan_direksi,
                          );
                $i = DB::table('direksiperusahaanperubahan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Direksi Perusahaan Perubahan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }

            } else {
                $data = array(
                            'NoKTP'     => $ktp_direksi,
                            'Jabatan'   => $jabatan_direksi,
                          );
                $i = DB::table('direksiperusahaanperubahan')->where('UserId','=',$userid)->where('Nama','=',$nama_direksi)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Direksi Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }
            }
        }
    }

    public function deletekomisarisperusahaan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{   
            $i = DB::table('komisarisperusahaan')->where('UserId', $userid)->where('Nama',$_POST['namakomisaris'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Komisaris');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Komisaris Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Komisaris');
                return back();
            }
        }
    }

    public function deletekomisarisperusahaanperubahan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{   
            $i = DB::table('komisarisperusahaanperubahan')->where('UserId', $userid)->where('Nama',$_POST['namakomisarisperubahan'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Komisaris');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Komisaris Perusahaan Perubahan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Komisaris');
                return back();
            }
        }
    }

    public function deletedireksiperusahaan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{   
            $i = DB::table('direksiperusahaan')->where('UserId', $userid)->where('Nama',$_POST['namadireksi'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Direksi');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Direksi Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Direksi');
                return back();
            }
        }
    }

    public function deletedireksiperusahaanperubahan(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{   
            $i = DB::table('direksiperusahaanperubahan')->where('UserId', $userid)->where('Nama',$_POST['namadireksiperubahan'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Direksi');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Direksi Perusahaan Perubahan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Direksi');
                return back();
            }
        }
    }

    public function savepengurusperusahaan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nama']))
                $nama = '';
            else
                $nama = $_POST['nama'];

            if(!isset($_POST['pendidikan']))
                $pendidikan = '';
            else
                $pendidikan = $_POST['pendidikan'];

            if(!isset($_POST['tgl_lahir']))
                $tgl_lahir = '';
            else
                if ($_POST['tgl_lahir']=="")
                   $tgl_lahir = null;
                else
                    $tgl_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));

            if(!isset($_POST['jabatan']))
                $jabatan = '';
            else
                $jabatan = $_POST['jabatan'];

            if(!isset($_POST['pengalaman']))
                $pengalaman = '';
            else
                $pengalaman = $_POST['pengalaman'];

            if(!isset($_POST['profesi']))
                $profesi = '';
            else
                $profesi = $_POST['profesi'];

            if(!isset($_POST['sertifikat']))
                $sertifikat = '';
            else
                $sertifikat = $_POST['sertifikat'];

            $resultDireksi = DB::table('tenagaahli')->where('UserId','=',$userid)
                            ->where('Nama','=',$nama)->first();
            if(is_null($resultDireksi)){
                $data = array(
                            'UserId'            => $userid,
                            'Nama'              => $nama,
                            'Pendidikan'        => $pendidikan,
                            'TglLahir'          => $tgl_lahir,
                            'Jabatan'           => $jabatan,
                            'PengalamanKerja'   => $pengalaman,
                            'ProfesiKeahlian'   => $profesi,
                            'Sertifikat'        => $sertifikat,
                          );
                $i = DB::table('tenagaahli')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Personil Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }

            } else {
                $data = array(
                            'Pendidikan'        => $pendidikan,
                            'TglLahir'          => $tgl_lahir,
                            'Jabatan'           => $jabatan,
                            'PengalamanKerja'   => $pengalaman,
                            'ProfesiKeahlian'   => $profesi,
                            'Sertifikat'        => $sertifikat,
                          );
                $i = DB::table('tenagaahli')->where('UserId','=',$userid)->where('Nama','=',$nama)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data'); 
                    $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Personil Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                    return back();
                }
            }
        }
    }

    public function savekepemilikansaham(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['nama']))
                $nama = '';
            else
                $nama = $_POST['nama'];

            if(!isset($_POST['ktp']))
                $ktp = '';
            else
                $ktp = $_POST['ktp'];

            if(!isset($_POST['jabatan']))
                $jabatan = '';
            else
                $jabatan = $_POST['jabatan'];

            $result = DB::table('komisarisperusahaan')->where('UserId','=',$userid)
                            ->where('Nama','=',$nama)->first();

            if(is_null($result)){
                $data = array(
                            'UserId'            => $userid,
                            'Nama'              => $nama,
                            'NoKTP'             => $ktp,
                            'Jabatan'           => $jabatan,
                          );
                $i = DB::table('komisarisperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Susunan Kepemilikan Saham',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }

            } else {
                $data = array(
                            'NoKTP'             => $ktp,
                            'Jabatan'           => $jabatan,
                          );
                $i = DB::table('komisarisperusahaan')->where('UserId','=',$userid)->where('Nama','=',$nama)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Susunan Kepemilikan Saham',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }
        }
    }

    public function savekeuangan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{  
            if(!isset($_POST['no_npwp']))
                $no_npwp = '';
            else
                $no_npwp = $_POST['no_npwp'];

            if(!isset($_POST['no_rekening']))
                $no_rekening = '';
            else
                $no_rekening = $_POST['no_rekening'];

            if(!isset($_POST['nama_bank']))
                $nama_bank = '';
            else
                $nama_bank = $_POST['nama_bank'];

            if(!isset($_POST['no_pelunasan']))
                $no_pelunasan = '';
            else
                $no_pelunasan = $_POST['no_pelunasan'];

            if(!isset($_POST['tgl_pelunasan']))
                $tgl_pelunasan = '';
            else
                if ($_POST['tgl_pelunasan']=="")
                   $tgl_pelunasan = null;
                else
                    $tgl_pelunasan = date("Y-m-d", strtotime($_POST['tgl_pelunasan']));

            if(!isset($_POST['no_bulanan']))
                $no_bulanan ='';
            else
                $no_bulanan = $_POST['no_bulanan'];

            if(!isset($_POST['no_bulanan2']))
                $no_bulanan2 ='';
            else
                $no_bulanan2 = $_POST['no_bulanan2'];

            if(!isset($_POST['no_bulanan3']))
                $no_bulanan3 ='';
            else
                $no_bulanan3 = $_POST['no_bulanan3'];

            if(!isset($_POST['tgl_bulanan']))
                $tgl_bulanan = '';
            else
                if ($_POST['tgl_bulanan']=="")
                   $tgl_bulanan = null;
                else
                    $tgl_bulanan = date("Y-m-d", strtotime($_POST['tgl_bulanan']));

            if(!isset($_POST['tgl_bulanan2']))
                $tgl_bulanan2 = '';
            else
                if ($_POST['tgl_bulanan2']=="")
                   $tgl_bulanan2 = null;
                else
                    $tgl_bulanan2 = date("Y-m-d", strtotime($_POST['tgl_bulanan2']));

            if(!isset($_POST['tgl_bulanan3']))
                $tgl_bulanan3 = '';
            else
                if ($_POST['tgl_bulanan3']=="")
                   $tgl_bulanan3 = null;
                else
                    $tgl_bulanan3 = date("Y-m-d", strtotime($_POST['tgl_bulanan3']));

            $result = DB::table('pajak')->where('UserId','=',$userid)->first();

            if(is_null($result)){
                $data = array(
                            'UserId'                => $userid,
                            'NomorNPWP'             => $no_npwp,
                            'NoRekening'             => $no_rekening,
                            'NamaBank'             => $nama_bank,
                            'NomorBuktiPelunasan'   => $no_pelunasan,
                            'TglBuktiPelunasan'     => $tgl_pelunasan,
                            'NomorLaporanBulanan'   => $no_bulanan,
                            'NomorLaporanBulanan2'   => $no_bulanan2,
                            'NomorLaporanBulanan3'   => $no_bulanan3,
                            'TglLaporanBulanan'     => $tgl_bulanan,
                            'TglLaporanBulanan2'     => $tgl_bulanan2,
                            'TglLaporanBulanan3'     => $tgl_bulanan3,
                          );
                $ipajak = DB::table('pajak')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($ipajak)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    //return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Pajak Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            } else {
                $data = array(
                            'NomorNPWP'             => $no_npwp,
                            'NoRekening'             => $no_rekening,
                            'NamaBank'             => $nama_bank,
                            'NomorBuktiPelunasan'   => $no_pelunasan,
                            'TglBuktiPelunasan'     => $tgl_pelunasan,
                            'NomorLaporanBulanan'   => $no_bulanan,
                            'NomorLaporanBulanan2'   => $no_bulanan2,
                            'NomorLaporanBulanan3'   => $no_bulanan3,
                            'TglLaporanBulanan'     => $tgl_bulanan,
                            'TglLaporanBulanan2'     => $tgl_bulanan2,
                            'TglLaporanBulanan3'     => $tgl_bulanan3,
                          );
                $ipajak = DB::table('pajak')->where('UserId','=',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($ipajak)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    //return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Pajak Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    //return back();
                }
            }

            if(!isset($_POST['activa_lancar']))
                $activa_lancar = '';
            else
                $activa_lancar = $_POST['activa_lancar'];

            if(!isset($_POST['utang_pendek']))
                $utang_pendek = '';
            else
                $utang_pendek = $_POST['utang_pendek'];

            if(!isset($_POST['activa_tetap']))
                $activa_tetap = '';
            else
                $activa_tetap = $_POST['activa_tetap'];

            if(!isset($_POST['utang_panjang']))
                $utang_panjang = '';
            else
                $utang_panjang = $_POST['utang_panjang'];

            if(!isset($_POST['total_activa']))
                $total_activa = '';
            else
                $total_activa = $_POST['total_activa'];

            if(!isset($_POST['kekayaan_bersih']))
                $kekayaan_bersih = '';
            else
                $kekayaan_bersih = $_POST['kekayaan_bersih'];

            if(!isset($_POST['auditor']))
                $auditor = '';
            else
                $auditor = $_POST['auditor'];

            $result = DB::table('neraca')->where('UserId','=',$userid)->first();

            if(is_null($result)){
                $data = array(
                            'UserId'                => $userid,
                            'ActivaLancar'          => $activa_lancar,
                            'ActivaTetap'           => $utang_pendek,
                            'TotalActivaLancar'     => $activa_tetap,
                            'UtangJangkaPendek'     => $utang_panjang,
                            'UtangJangkaPanjang'    => $total_activa,
                            'TotalKekayaan'         => $kekayaan_bersih,
                            'Auditor'               => $auditor,
                          );
                $ineraca = DB::table('neraca')->insert($data);

                if(is_null($ineraca)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    //return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Neraca Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    //return back();
                }
            } else {
                $data = array(
                            'ActivaLancar'          => $activa_lancar,
                            'ActivaTetap'           => $utang_pendek,
                            'TotalActivaLancar'     => $activa_tetap,
                            'UtangJangkaPendek'     => $utang_panjang,
                            'UtangJangkaPanjang'    => $total_activa,
                            'TotalKekayaan'         => $kekayaan_bersih,
                            'Auditor'               => $auditor,
                          );
                $ineraca = DB::table('neraca')->where('UserId','=',$userid)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($ineraca)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    //return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Neraca Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    //return back();
                }
            }

            if((!is_null($ipajak)) || (!is_null($ineraca))){
                return redirect('datateknistambang');
            }else{
                //alert()->error('GAGAL', 'Simpan Data');
                return back(); 
            }
        }  
    }

    public function savearmadatransportasi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['jenis']))
                $jenis = '';
            else
                $jenis = $_POST['jenis'];

            if(!isset($_POST['jumlah']))
                $jumlah = '';
            else
                $jumlah = $_POST['jumlah'];

            if(!isset($_POST['kapasitas']))
                $kapasitas = '';
            else
                $kapasitas = $_POST['kapasitas'];

            if(!isset($_POST['merk']))
                $merk = '';
            else
                $merk = $_POST['merk'];

            if(!isset($_POST['tahun']))
                $tahun = '';
            else
                $tahun = $_POST['tahun'];

            if(!isset($_POST['kondisi']))
                $kondisi = '';
            else
                $kondisi = $_POST['kondisi'];

            if(!isset($_POST['lokasi']))
                $lokasi = '';
            else
                $lokasi = $_POST['lokasi'];

            if(!isset($_POST['bukti']))
                $bukti = '';
            else
                $bukti = $_POST['bukti'];

            $result = DB::table('armadatransportasi')->where('UserId','=',$userid)
                            ->where('JenisArmada','=',$jenis)->first();

            if(is_null($result)){
                $data = array(
                            'UserId'             => $userid,
                            'JenisArmada'        => $jenis,
                            'Jumlah'             => $jumlah,
                            'Kapasitas'          => $kapasitas,
                            'Merk'               => $merk,
                            'TahunKeluaran'      => $tahun,
                            'Kondisi'            => $kondisi,
                            'LokasiSekarang'     => $lokasi,
                            'BuktiKepemilikan'   => $bukti,
                          );
                $i = DB::table('armadatransportasi')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Armada Transportasi Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }

            } else {
                $data = array(
                            'Jumlah'             => $jumlah,
                            'Kapasitas'          => $kapasitas,
                            'Merk'               => $merk,
                            'TahunKeluaran'      => $tahun,
                            'Kondisi'            => $kondisi,
                            'LokasiSekarang'     => $lokasi,
                            'BuktiKepemilikan'   => $bukti,
                          );
                $i = DB::table('armadatransportasi')->where('UserId','=',$userid)->where('JenisArmada','=',$jenis)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Armada Transportasi Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }
        }
    }

    public function savepengalamanperusahaan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['lokasi']))
                $lokasi = '';
            else
                $lokasi = $_POST['lokasi'];

            if(!isset($_POST['volume']))
                $volume = '';
            else
                $volume = $_POST['volume'];

            if(!isset($_POST['nama']))
                $nama = '';
            else
                $nama = $_POST['nama'];

            if(!isset($_POST['alamat']))
                $alamat ='';
            else
                $alamat = $_POST['alamat'];

            if(!isset($_POST['nomor']))
                $nomor = '';
            else
                $nomor = $_POST['nomor'];

            if(!isset($_POST['tgl_pengalaman']))
                $tgl_pengalaman = '';
            else
                if ($_POST['tgl_pengalaman']=="")
                   $tgl_pengalaman = null;
                else 
                    $tgl_pengalaman = date("Y-m-d", strtotime($_POST['tgl_pengalaman']));

            if(!isset($_POST['waktu']))
                $waktu = '';
            else
                $waktu = $_POST['waktu'];

            if(!isset($_POST['nilai']))
                $nilai = '';
            else
                $nilai = $_POST['nilai'];

            if(!isset($_POST['prestasi']))
                $prestasi = '';
            else
                $prestasi = $_POST['prestasi'];

            $result = DB::table('pengalamanperusahaan')->where('UserId','=',$userid)
                            ->where('LokasiPasokan','=',$lokasi)->first();

            if(is_null($result)){
                $data = array(
                            'UserId'                => $userid,
                            'LokasiPasokan'         => $lokasi,
                            'Volume'                => $volume,
                            'NamaPerusahaan'        => $nama,
                            'Alamat'                => $alamat,
                            'Nomor'                 => $nomor,
                            'Tanggal'               => $tgl_pengalaman,
                            'Waktu'                 => $waktu,
                            'Nilai'                 => $nilai,
                            'BA'                    => $prestasi,
                          );
                $i = DB::table('pengalamanperusahaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Pengalaman Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }

            } else {
                $data = array(
                            'Volume'                => $volume,
                            'NamaPerusahaan'        => $nama,
                            'Alamat'                => $alamat,
                            'Nomor'                 => $nomor,
                            'Tanggal'               => $tgl_pengalaman,
                            'Waktu'                 => $waktu,
                            'Nilai'                 => $nilai,
                            'BA'                    => $prestasi,
                          );
                $i = DB::table('pengalamanperusahaan')->where('UserId','=',$userid)->where('LokasiPasokan','=',$lokasi)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Pengalaman Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }
        }
    }

    public function savekontrakpengadaan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['lokasi']))
                $lokasi = '';
            else
                $lokasi = $_POST['lokasi'];

            if(!isset($_POST['volume']))
                $volume = '';
            else
                $volume = $_POST['volume'];

            if(!isset($_POST['nama']))
                $nama = '';
            else
                $nama = $_POST['nama'];

            if(!isset($_POST['alamat']))
                $alamat ='';
            else
                $alamat = $_POST['alamat'];

            if(!isset($_POST['nomor']))
                $nomor = '';
            else
                $nomor = $_POST['nomor'];

            if(!isset($_POST['tgl_pengadaan']))
                $tgl_pengadaan = '';
            else
                if ($_POST['tgl_pengadaan']=="")
                   $tgl_pengadaan = null;
                else
                    $tgl_pengadaan = date("Y-m-d", strtotime($_POST['tgl_pengadaan']));

            if(!isset($_POST['waktu']))
                $waktu = '';
            else
                $waktu = $_POST['waktu'];

            if(!isset($_POST['nilai']))
                $nilai = '';
            else
                $nilai = $_POST['nilai'];

            if(!isset($_POST['prestasi']))
                $prestasi = '';
            else
                $prestasi = $_POST['prestasi'];

            $result = DB::table('kontrakpengadaan')->where('UserId','=',$userid)
                            ->where('LokasiPasokan','=',$lokasi)->first();

            if(is_null($result)){
                $data = array(
                            'UserId'                => $userid,
                            'LokasiPasokan'         => $lokasi,
                            'Volume'                => $volume,
                            'NamaPerusahaan'        => $nama,
                            'Alamat'                => $alamat,
                            'Nomor'                 => $nomor,
                            'Tanggal'               => $tgl_pengadaan,
                            'Waktu'                 => $waktu,
                            'Nilai'                 => $nilai,
                            'Prestasi'              => $prestasi,
                          );
                $i = DB::table('kontrakpengadaan')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Kontrak Pengadaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }

            } else {
                $data = array(
                            'LokasiPasokan'         => $lokasi,
                            'Volume'                => $volume,
                            'NamaPerusahaan'        => $nama,
                            'Alamat'                => $alamat,
                            'Nomor'                 => $nomor,
                            'Tanggal'               => $tgl_pengadaan,
                            'Waktu'                 => $waktu,
                            'Nilai'                 => $nilai,
                            'Prestasi'              => $prestasi,
                          );
                $i = DB::table('kontrakpengadaan')->where('UserId','=',$userid)->where('LokasiPasokan','=',$lokasi)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Kontrak Pengadaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }
        }
    }

    public function savedatateknistambang(Request $request){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['alamat']))
            $alamat = '';
        else
            $alamat = $_POST['alamat'];

        if(!isset($_POST['Provinsi']))
            $Propinsi = '';
        else
            $Propinsi = $_POST['Provinsi'];

        if(!isset($_POST['KabupatenKota']))
            $KabupatenKota = '';
        else
            $KabupatenKota = $_POST['KabupatenKota'];

        if(!isset($_POST['koordinat']))
            $koordinat = '';
        else
            $koordinat = $_POST['koordinat'];

        if(!isset($_POST['luas_area']))
            $luas_area = '';
        else
            $luas_area = $_POST['luas_area'];

        if(!isset($_POST['perkiraan_volume']))
            $perkiraan_volume = '';
        else
            $perkiraan_volume = $_POST['perkiraan_volume'];

        if(!isset($_POST['kapasitas_produksi']))
            $kapasitas_produksi = '';
        else
            $kapasitas_produksi = $_POST['kapasitas_produksi'];

        if(!isset($_POST['kapasitas_stock_pile']))
            $kapasitas_stock_pile = '';
        else
            $kapasitas_stock_pile = $_POST['kapasitas_stock_pile'];

        if(!isset($_POST['jarak']))
            $jarak = '';
        else
            $jarak = $_POST['jarak'];

        if(!isset($_POST['akses']))
            $akses = '';
        else
            $akses = $_POST['akses'];

        if(!isset($_POST['jenis_transportasi']))
            $jenis_transportasi = '';
        else
            $jenis_transportasi = $_POST['jenis_transportasi'];

        if(!isset($_POST['kapasitas_pengangkutan']))
            $kapasitas_pengangkutan = '';
        else
            $kapasitas_pengangkutan = $_POST['kapasitas_pengangkutan'];

        if(!isset($_POST['kapasitas_stock_pile_pelabuhan']))
            $kapasitas_stock_pile_pelabuhan = '';
        else
            $kapasitas_stock_pile_pelabuhan = $_POST['kapasitas_stock_pile_pelabuhan'];

        if(!isset($_POST['ijintambang']))
            $ijintambang = '';
        else
            $ijintambang = $_POST['ijintambang'];

        $nomor = '';
        $tgl_teknis_tambang = '';
        $masa_berlaku = '';
        if($ijintambang == '1'){
            if(!isset($_POST['nomor_iup']))
                $nomor = '';
            else
                $nomor = $_POST['nomor_iup'];

            if(!isset($_POST['tgl_iup']))
                $tgl_teknis_tambang = '';
            else
                if ($_POST['tgl_iup']=="")
                   $tgl_teknis_tambang = null;
                else
                    $tgl_teknis_tambang = date("Y-m-d", strtotime($_POST['tgl_iup']));

            if(!isset($_POST['JangkaWaktu_iup']))
                $masa_berlaku = '';
            else
                if ($_POST['JangkaWaktu_iup']=="")
                   $masa_berlaku = null;
                else
                    $masa_berlaku = $_POST['JangkaWaktu_iup'];
        }else if($ijintambang == '2'){
            if(!isset($_POST['nomor_iupopk']))
                $nomor = '';
            else
                $nomor = $_POST['nomor_iupopk'];

            if(!isset($_POST['tgl_iupopk']))
                $tgl_teknis_tambang = '';
            else
                if ($_POST['tgl_iupopk']=="")
                   $tgl_teknis_tambang = null;
                else
                    $tgl_teknis_tambang = date("Y-m-d", strtotime($_POST['tgl_iupopk']));

            if(!isset($_POST['JangkaWaktu_iupopk']))
                $masa_berlaku = '';
            else
                if ($_POST['JangkaWaktu_iupopk']=="")
                   $masa_berlaku = null;
                else
                    $masa_berlaku = $_POST['JangkaWaktu_iupopk'];
        }else if($ijintambang == '3'){
            if(!isset($_POST['nomor']))
                $nomor = '';
            else
                $nomor = $_POST['nomor'];

            if(!isset($_POST['tgl_teknis_tambang']))
                $tgl_teknis_tambang = '';
            else
                if ($_POST['tgl_teknis_tambang']=="")
                   $tgl_teknis_tambang = null;
                else
                    $tgl_teknis_tambang = date("Y-m-d", strtotime($_POST['tgl_teknis_tambang']));

            if(!isset($_POST['masa_berlaku']))
                $masa_berlaku = '';
            else
                if ($_POST['masa_berlaku']=="")
                   $masa_berlaku = null;
                else
                    $masa_berlaku = $_POST['masa_berlaku'];
        }else if($ijintambang == '4'){
            if(!isset($_POST['nomor_iupopk2']))
                $nomor = '';
            else
                $nomor = $_POST['nomor_iupopk2'];

            if(!isset($_POST['tgl_iupopk2']))
                $tgl_teknis_tambang = '';
            else
                if ($_POST['tgl_iupopk2']=="")
                   $tgl_teknis_tambang = null;
                else
                    $tgl_teknis_tambang = date("Y-m-d", strtotime($_POST['tgl_iupopk2']));

            if(!isset($_POST['JangkaWaktu_iupopk2']))
                $masa_berlaku = '';
            else
                if ($_POST['JangkaWaktu_iupopk2']=="")
                   $masa_berlaku = null;
                else
                    $masa_berlaku = $_POST['JangkaWaktu_iupopk2'];
        }

        $result = DB::table('datateknistambang')->where('UserId','=',$userid)->where('Alamat',$alamat)->first();
        if(is_null($result)){
            $data = array(
                        'UserId'                        => $userid,
                        'Alamat'                        => $alamat,
                        'Propinsi'                      => $Propinsi,
                        'Kabupaten'                     => $KabupatenKota,
                        'Koordinat'                     => $koordinat,
                        'LuasAreaTambang'               => $luas_area,
                        'PerkiraanVolumeCadangan'       => $perkiraan_volume,
                        'IjinTambang'                   => $ijintambang,
                        'NomorIjin'                     => $nomor,
                        'TanggalIjin'                   => $tgl_teknis_tambang,
                        'MasaBerlakuIjin'               => $masa_berlaku,
                        'KapasitasProduksi'             => $kapasitas_produksi,
                        'KapasitasStockPile'            => $kapasitas_stock_pile,
                        'JarakTempuh'                   => $jarak,
                        'AksesPengangkut'               => $akses,
                        'JenisTransportasi'             => $jenis_transportasi,
                        'KapasitasPengangkutan'         => $kapasitas_pengangkutan,
                        'KapasitasStockPilePelabuhan'   => $kapasitas_stock_pile_pelabuhan,
                      );
            $i = DB::table('datateknistambang')->insert($data);

            if(is_null($i)){   
                //alert()->error('GAGAL', 'Simpan Data');
                return Redirect('datateknistambang');        
            }else{
                //alert()->success('BERHASIL', 'Simpan Data');
                \Session::put('alamatlokasi', $alamat);
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Data Teknis Tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return Redirect('listspesifikasibatubara');
            }

        } else {
            $data = array(
                        'Alamat'                        => $alamat,
                        'Propinsi'                      => $Propinsi,
                        'Kabupaten'                     => $KabupatenKota,
                        'Koordinat'                     => $koordinat,
                        'LuasAreaTambang'               => $luas_area,
                        'PerkiraanVolumeCadangan'       => $perkiraan_volume,
                        'IjinTambang'                   => $ijintambang,
                        'NomorIjin'                     => $nomor,
                        'TanggalIjin'                   => $tgl_teknis_tambang,
                        'MasaBerlakuIjin'               => $masa_berlaku,
                        'KapasitasProduksi'             => $kapasitas_produksi,
                        'KapasitasStockPile'            => $kapasitas_stock_pile,
                        'JarakTempuh'                   => $jarak,
                        'AksesPengangkut'               => $akses,
                        'JenisTransportasi'             => $jenis_transportasi,
                        'KapasitasPengangkutan'         => $kapasitas_pengangkutan,
                        'KapasitasStockPilePelabuhan'   => $kapasitas_stock_pile_pelabuhan,
                      );
            $i = DB::table('datateknistambang')->where('UserId','=',$userid)->where('Alamat',$alamat)->update($data);

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                //alert()->error('GAGAL', 'Simpan Data');
                return Redirect('datateknistambang');         
            }else{
                //alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Data Teknis Tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                \Session::put('alamatlokasi',$alamat);
                return Redirect('listspesifikasibatubara');
            }
        }


        }
    }

    public function savespesifikasibatubara(Request $request){
        $userid = \Session::get('vendorid');
        $alamat = \Session::get('alamatlokasi');
        $idspek = \Session::get('idspek');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['tmar']))
                $tmar = '';
            else
                $tmar = $_POST['tmar'];

            if(!isset($_POST['tmadb']))
                $tmadb = '';
            else
                $tmadb = $_POST['tmadb'];

            if(!isset($_POST['tmdb']))
                $tmdb = '';
            else
                $tmdb = $_POST['tmdb'];

            if(!isset($_POST['tmdafb']))
                $tmdafb = '';
            else
                $tmdafb = $_POST['tmdafb'];

            if(!isset($_POST['tmmethod']))
                $tmmethod = '';
            else
                $tmmethod = $_POST['tmmethod'];

            if(!isset($_POST['pmar']))
                $pmar = '';
            else
                $pmar = $_POST['pmar'];

            if(!isset($_POST['pmadb']))
                $pmadb = '';
            else
                $pmadb = $_POST['pmadb'];

            if(!isset($_POST['pmdb']))
                $pmdb = '';
            else
                $pmdb = $_POST['pmdb'];

            if(!isset($_POST['pmdafb']))
                $pmdafb = '';
            else
                $pmdafb = $_POST['pmdafb'];

            if(!isset($_POST['pmmethod']))
                $pmmethod = '';
            else
                $pmmethod = $_POST['pmmethod'];

            if(!isset($_POST['acar']))
                $acar = '';
            else
                $acar = $_POST['acar'];

            if(!isset($_POST['acadb']))
                $acadb = '';
            else
                $acadb = $_POST['acadb'];

            if(!isset($_POST['acdb']))
                $acdb = '';
            else
                $acdb = $_POST['acdb'];

            if(!isset($_POST['acdafb']))
                $acdafb = '';
            else
                $acdafb = $_POST['acdafb'];

            if(!isset($_POST['acmethod']))
                $acmethod = '';
            else
                $acmethod = $_POST['acmethod'];

            if(!isset($_POST['vmar']))
                $vmar = '';
            else
                $vmar = $_POST['vmar'];

            if(!isset($_POST['vmadb']))
                $vmadb = '';
            else
                $vmadb = $_POST['vmadb'];

            if(!isset($_POST['vmdb']))
                $vmdb = '';
            else
                $vmdb = $_POST['vmdb'];

            if(!isset($_POST['vmdafb']))
                $vmdafb = '';
            else
                $vmdafb = $_POST['vmdafb'];

            if(!isset($_POST['vmmethod']))
                $vmmethod = '';
            else
                $vmmethod = $_POST['vmmethod'];

            if(!isset($_POST['fcar']))
                $fcar = '';
            else
                $fcar = $_POST['fcar'];

            if(!isset($_POST['fcadb']))
                $fcadb = '';
            else
                $fcadb = $_POST['fcadb'];

            if(!isset($_POST['fcdb']))
                $fcdb = '';
            else
                $fcdb = $_POST['fcdb'];

            if(!isset($_POST['fcdafb']))
                $fcdafb = '';
            else
                $fcdafb = $_POST['fcdafb'];

            if(!isset($_POST['fcmethod']))
                $fcmethod = '';
            else
                $fcmethod = $_POST['fcmethod'];

            if(!isset($_POST['tsar']))
                $tsar = '';
            else
                $tsar = $_POST['tsar'];

            if(!isset($_POST['tsadb']))
                $tsadb = '';
            else
                $tsadb = $_POST['tsadb'];

            if(!isset($_POST['tsdb']))
                $tsdb = '';
            else
                $tsdb = $_POST['tsdb'];

            if(!isset($_POST['tsdafb']))
                $tsdafb = '';
            else
                $tsdafb = $_POST['tsdafb'];

            if(!isset($_POST['tsmethod']))
                $tsmethod = '';
            else
                $tsmethod = $_POST['tsmethod'];

            if(!isset($_POST['gcvar']))
                $gcvar = '';
            else
                $gcvar = $_POST['gcvar'];

            if(!isset($_POST['gcvadb']))
                $gcvadb = '';
            else
                $gcvadb = $_POST['gcvadb'];

            if(!isset($_POST['gcvdb']))
                $gcvdb = '';
            else
                $gcvdb = $_POST['gcvdb'];

            if(!isset($_POST['gcvdafb']))
                $gcvdafb = '';
            else
                $gcvdafb = $_POST['gcvdafb'];

            if(!isset($_POST['gcvmethod']))
                $gcvmethod = '';
            else
                $gcvmethod = $_POST['gcvmethod'];

            if(!isset($_POST['hgi']))
                $hgi = '';
            else
                $hgi = $_POST['hgi'];

            if(!isset($_POST['hgimethod']))
                $hgimethod = '';
            else
                $hgimethod = $_POST['hgimethod'];

            if(!isset($_POST['stfar']))
                $stfar = '';
            else
                $stfar = $_POST['stfar'];

            if(!isset($_POST['stfadb']))
                $stfadb = '';
            else
                $stfadb = $_POST['stfadb'];

            if(!isset($_POST['stfdb']))
                $stfdb = '';
            else
                $stfdb = $_POST['stfdb'];

            if(!isset($_POST['stfdafb']))
                $stfdafb = '';
            else
                $stfdafb = $_POST['stfdafb'];

            if(!isset($_POST['stfmethod']))
                $stfmethod = '';
            else
                $stfmethod = $_POST['stfmethod'];

            if(!isset($_POST['stpar']))
                $stpar = '';
            else
                $stpar = $_POST['stpar'];

            if(!isset($_POST['stpadb']))
                $stpadb = '';
            else
                $stpadb = $_POST['stpadb'];

            if(!isset($_POST['stpdb']))
                $stpdb = '';
            else
                $stpdb = $_POST['stpdb'];

            if(!isset($_POST['stpdafb']))
                $stpdafb = '';
            else
                $stpdafb = $_POST['stpdafb'];

            if(!isset($_POST['stpmethod']))
                $stpmethod = '';
            else
                $stpmethod = $_POST['stpmethod'];

            if(!isset($_POST['idar']))
                $idar = '';
            else
                $idar = $_POST['idar'];

            if(!isset($_POST['idadb']))
                $idadb = '';
            else
                $idadb = $_POST['idadb'];

            if(!isset($_POST['iddb']))
                $iddb = '';
            else
                $iddb = $_POST['iddb'];

            if(!isset($_POST['iddafb']))
                $iddafb = '';
            else
                $iddafb = $_POST['iddafb'];

            if(!isset($_POST['idmethod']))
                $idmethod = '';
            else
                $idmethod = $_POST['idmethod'];

            if(!isset($_POST['sphar']))
                $sphar = '';
            else
                $sphar = $_POST['sphar'];

            if(!isset($_POST['sphadb']))
                $sphadb = '';
            else
                $sphadb = $_POST['sphadb'];

            if(!isset($_POST['sphdb']))
                $sphdb = '';
            else
                $sphdb = $_POST['sphdb'];

            if(!isset($_POST['sphdafb']))
                $sphdafb = '';
            else
                $sphdafb = $_POST['sphdafb'];

            if(!isset($_POST['sphmethod']))
                $sphmethod = '';
            else
                $sphmethod = $_POST['sphmethod'];

            if(!isset($_POST['hmsar']))
                $hmsar = '';
            else
                $hmsar = $_POST['hmsar'];

            if(!isset($_POST['hmsadb']))
                $hmsadb = '';
            else
                $hmsadb = $_POST['hmsadb'];

            if(!isset($_POST['hmsdb']))
                $hmsdb = '';
            else
                $hmsdb = $_POST['hmsdb'];

            if(!isset($_POST['hmsdafb']))
                $hmsdafb = '';
            else
                $hmsdafb = $_POST['hmsdafb'];

            if(!isset($_POST['hmsmethod']))
                $hmsmethod = '';
            else
                $hmsmethod = $_POST['hmsmethod'];

            if(!isset($_POST['fluar']))
                $fluar = '';
            else
                $fluar = $_POST['fluar'];

            if(!isset($_POST['fluadb']))
                $fluadb = '';
            else
                $fluadb = $_POST['fluadb'];

            if(!isset($_POST['fludb']))
                $fludb = '';
            else
                $fludb = $_POST['fludb'];

            if(!isset($_POST['fludafb']))
                $fludafb = '';
            else
                $fludafb = $_POST['fludafb'];

            if(!isset($_POST['flumethod']))
                $flumethod = '';
            else
                $flumethod = $_POST['flumethod'];

            if(!isset($_POST['surveyor']))
                $surveyor = '';
            else
                $surveyor = $_POST['surveyor'];

            $result = DB::table('spesifikasitambang')->where('UserId','=',$userid)
                        ->where('Alamat','=',$alamat)->where('Ids',$idspek)->first();
            if(is_null($result)){
                $data = array(
                                        'UserId'                        => $userid,
                                        'Alamat'                        => $alamat,
                                        'TotalMoistureAR'               => $tmar,
                                        'TotalMoistureADB'              => $tmadb,
                                        'TotalMoistureDB'               => $tmdb,
                                        'TotalMoistureDAFB'             => $tmdafb,
                                        'TotalMoistureMethod'           => $tmmethod,
                                        'ProximateMoistureAR'           => $pmar,
                                        'ProximateMoistureADB'          => $pmadb,
                                        'ProximateMoistureDB'           => $pmdb,
                                        'ProximateMoistureDAFB'         => $pmdafb,
                                        'ProximateMoistureMethod'       => $pmmethod,
                                        'AshContentAR'                  => $acar,
                                        'AshContentADB'                 => $acadb,
                                        'AshContentDB'                  => $acdb,
                                        'AshContentDAFB'                => $acdafb,
                                        'AshContentMethod'              => $acmethod,
                                        'VolatileAR'                    => $vmar,
                                        'VolatileADB'                   => $vmadb,
                                        'VolatileDB'                    => $vmdb,
                                        'VolatileDAFB'                  => $vmdafb,
                                        'VolatileMethod'                => $vmmethod,
                                        'FixedCarbonAR'                 => $fcar,
                                        'FixedCarbonADB'                => $fcadb,
                                        'FixedCarbonDB'                 => $fcdb,
                                        'FixedCarbonDAFB'               => $fcdafb,
                                        'FixedCarbonMethod'             => $fcmethod, 
                                        'TotalSulphurAR'                => $tsar,
                                        'TotalSulphurADB'               => $tsadb,
                                        'TotalSulphurDB'                => $tsdb,
                                        'TotalSulphurDAFB'              => $tsdafb,
                                        'TotalSulphurMethod'            => $tsmethod,
                                        'GrossCarolicValveAR'           => $gcvar,
                                        'GrossCarolicValveADB'          => $gcvadb,
                                        'GrossCarolicValveDB'           => $gcvdb,
                                        'GrossCarolicValveDAFB'         => $gcvdafb,
                                        'GrossCarolicValveMethod'       => $gcvmethod,
                                        'HGI'                           => $hgi,
                                        'HGIMethod'                     => $hgimethod,
                                        'SizeTestFractionAR'            => $stfar,
                                        'SizeTestFractionADB'           => $stfadb,
                                        'SizeTestFractionDB'            => $stfdb,
                                        'SizeTestFractionDAFB'          => $stfdafb,
                                        'SizeTestFractionMethod'        => $stfmethod,
                                        'SizeTestPersenAR'              => $stpar,
                                        'SizeTestPersenADB'             => $stpadb,
                                        'SizeTestPersenDB'              => $stpdb,
                                        'SizeTestPersenDAFB'            => $stpdafb,
                                        'SizeTestPersenMethod'          => $stpmethod,
                                        'InitialAR'                     => $idar,
                                        'InitialADB'                    => $idadb,
                                        'InitialDB'                     => $iddb,
                                        'InitialDAFB'                   => $iddafb,
                                        'InitialMethod'                 => $idmethod,                                  
                                        'SphericalAR'                   => $sphar,
                                        'SphericalADB'                  => $sphadb,
                                        'SphericalDB'                   => $sphdb,
                                        'SphericalDAFB'                 => $sphdafb,
                                        'SphericalMethod'               => $sphmethod,
                                        'HemisphericalAR'               => $hmsar,
                                        'HemisphericalADB'              => $hmsadb,
                                        'HemisphericalDB'               => $hmsdb,
                                        'HemisphericalDAFB'             => $hmsdafb,
                                        'HemisphericalMethod'           => $hmsmethod,
                                        'FluidizedAR'                   => $fluar,
                                        'FluidizedADB'                  => $fluadb,
                                        'FluidizedDB'                   => $fludb,
                                        'FluidizedDAFB'                 => $fludafb,
                                        'FluidizedMethod'               => $flumethod,
                                        'Surveyor'                      => $surveyor,
                          );
                $i = DB::table('spesifikasitambang')->insert($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();         
                }else{
                    \Session::put('idspek', '');
                    //alert()->success('BERHASIL', 'Simpan Data');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Spesifikasi Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    //return back();
                    return redirect('listspesifikasibatubara');
                }

            } else {
                $data = array(
                                        'TotalMoistureAR'               => $tmar,
                                        'TotalMoistureADB'              => $tmadb,
                                        'TotalMoistureDB'               => $tmdb,
                                        'TotalMoistureDAFB'             => $tmdafb,
                                        'TotalMoistureMethod'           => $tmmethod,
                                        'ProximateMoistureAR'           => $pmar,
                                        'ProximateMoistureADB'          => $pmadb,
                                        'ProximateMoistureDB'           => $pmdb,
                                        'ProximateMoistureDAFB'         => $pmdafb,
                                        'ProximateMoistureMethod'       => $pmmethod,
                                        'AshContentAR'                  => $acar,
                                        'AshContentADB'                 => $acadb,
                                        'AshContentDB'                  => $acdb,
                                        'AshContentDAFB'                => $acdafb,
                                        'AshContentMethod'              => $acmethod,
                                        'VolatileAR'                    => $vmar,
                                        'VolatileADB'                   => $vmadb,
                                        'VolatileDB'                    => $vmdb,
                                        'VolatileDAFB'                  => $vmdafb,
                                        'VolatileMethod'                => $vmmethod,
                                        'FixedCarbonAR'                 => $fcar,
                                        'FixedCarbonADB'                => $fcadb,
                                        'FixedCarbonDB'                 => $fcdb,
                                        'FixedCarbonDAFB'               => $fcdafb,
                                        'FixedCarbonMethod'             => $fcmethod, 
                                        'TotalSulphurAR'                => $tsar,
                                        'TotalSulphurADB'               => $tsadb,
                                        'TotalSulphurDB'                => $tsdb,
                                        'TotalSulphurDAFB'              => $tsdafb,
                                        'TotalSulphurMethod'            => $tsmethod,
                                        'GrossCarolicValveAR'           => $gcvar,
                                        'GrossCarolicValveADB'          => $gcvadb,
                                        'GrossCarolicValveDB'           => $gcvdb,
                                        'GrossCarolicValveDAFB'         => $gcvdafb,
                                        'GrossCarolicValveMethod'       => $gcvmethod,
                                        'HGI'                           => $hgi,
                                        'HGIMethod'                     => $hgimethod,
                                        'SizeTestFractionAR'            => $stfar,
                                        'SizeTestFractionADB'           => $stfadb,
                                        'SizeTestFractionDB'            => $stfdb,
                                        'SizeTestFractionDAFB'          => $stfdafb,
                                        'SizeTestFractionMethod'        => $stfmethod,
                                        'SizeTestPersenAR'              => $stpar,
                                        'SizeTestPersenADB'             => $stpadb,
                                        'SizeTestPersenDB'              => $stpdb,
                                        'SizeTestPersenDAFB'            => $stpdafb,
                                        'SizeTestPersenMethod'          => $stpmethod,
                                        'InitialAR'                     => $idar,
                                        'InitialADB'                    => $idadb,
                                        'InitialDB'                     => $iddb,
                                        'InitialDAFB'                   => $iddafb,
                                        'InitialMethod'                 => $idmethod,                                  
                                        'SphericalAR'                   => $sphar,
                                        'SphericalADB'                  => $sphadb,
                                        'SphericalDB'                   => $sphdb,
                                        'SphericalDAFB'                 => $sphdafb,
                                        'SphericalMethod'               => $sphmethod,
                                        'HemisphericalAR'               => $hmsar,
                                        'HemisphericalADB'              => $hmsadb,
                                        'HemisphericalDB'               => $hmsdb,
                                        'HemisphericalDAFB'             => $hmsdafb,
                                        'HemisphericalMethod'           => $hmsmethod,
                                        'FluidizedAR'                   => $fluar,
                                        'FluidizedADB'                  => $fluadb,
                                        'FluidizedDB'                   => $fludb,
                                        'FluidizedDAFB'                 => $fludafb,
                                        'FluidizedMethod'               => $flumethod,
                                        'Surveyor'                      => $surveyor,
                          );
                $i = DB::table('spesifikasitambang')->where('UserId','=',$userid)->where('Alamat','=',$alamat)
                                    ->where('Ids',$idspek)->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Data');
                    return back();        
                }else{
                    //alert()->success('BERHASIL', 'Simpan Data');
                    \Session::put('idspek', '');
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Spesifikasi Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    //return back();
                    return redirect('listspesifikasibatubara');
                }
            }
        }
    }

    public function savesaranapengangkut(Request $request){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['jenis_peralatan']))
            $jenis_peralatan = '';
        else
            $jenis_peralatan = $_POST['jenis_peralatan'];

        if(!isset($_POST['kapasitas_maksimum']))
            $kapasitas_maksimum = '';
        else
            $kapasitas_maksimum = $_POST['kapasitas_maksimum'];

        if(!isset($_POST['kapasitas_loading']))
            $kapasitas_loading = '';
        else
            $kapasitas_loading = $_POST['kapasitas_loading'];

        if(!isset($_POST['tahun_pembuatan']))
            $tahun_pembuatan = '';
        else
            $tahun_pembuatan = $_POST['tahun_pembuatan'];

        if(!isset($_POST['kapasitas_angkut']))
            $kapasitas_angkut = '';
        else
            $kapasitas_angkut = $_POST['kapasitas_angkut'];

        if(!isset($_POST['kondisi']))
            $kondisi = '';
        else
            $kondisi = $_POST['kondisi'];

        $result = DB::table('saranapengangkut')->where('UserId','=',$userid)->first();
        if(is_null($result)){
            $data = array(
                            'UserId'                    => $userid,
                            'JenisPeralatan'            => $jenis_peralatan,
                            'KapasitasMaksimumKapal'    => $kapasitas_maksimum,
                            'KapasitasLoading'          => $kapasitas_loading,
                            'TahunPembuatan'            => $tahun_pembuatan,
                            'KapasitasAngkut'           => $kapasitas_angkut,
                            'Kondisi'                   => $kondisi,
                      );
            $i = DB::table('saranapengangkut')->insert($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Sarana Pengangkut',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }

        } else {
            $data = array(
                            'JenisPeralatan'            => $jenis_peralatan,
                            'KapasitasMaksimumKapal'    => $kapasitas_maksimum,
                            'KapasitasLoading'          => $kapasitas_loading,
                            'TahunPembuatan'            => $tahun_pembuatan,
                            'KapasitasAngkut'           => $kapasitas_angkut,
                            'Kondisi'                   => $kondisi,
                      );
            $i = DB::table('saranapengangkut')->where('UserId','=',$userid)->update($data);

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Sarana Pengangkut',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }
        }
        }
    }

    public function kabupatenDropDownData($id){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $kab = DB::table('kabupatenkota')->where('ProvinsiId', '=', $id)
                ->orderBy('KabupatenKotaName', 'asc')
                ->get();

        $vendorkab = DB::table('datateknistambang')->where('UserId', $userid)->pluck('Kabupaten');

        $string ="";
        
        foreach ($kab as $kb) {
            if($kb->KabupatenKotaId == $vendorkab){
                $string .= "<option value='$kb->KabupatenKotaId' selected>".$kb->KabupatenKotaName."</option>";
            }else{
                $string .= "<option value='$kb->KabupatenKotaId'>".$kb->KabupatenKotaName."</option>";
            }
        }

        return $string;
        }
    }

    public function deletetenagaahli(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $i = DB::table('tenagaahli')->where('UserId', $userid)->where('Nama',$_POST['namatenagaahli'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Tenaga Ahli');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Personil Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Tenaga Ahli');
                return back();
            }
        }
    }

    public function deletekepemilikansaham(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $i = DB::table('komisarisperusahaan')->where('UserId', $userid)->where('Nama',$_POST['namakepemilikan'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Kepemilikan Saham');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Kepemilikan Saham',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Kepemilikan Saham');
                return back();
            }
        }
    }

    public function deletearmada(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $i = DB::table('armadatransportasi')->where('UserId', $userid)->where('JenisArmada',$_POST['namaarmada'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Armada');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Armada Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Armada');
                return back();
            }
        }
    }

    public function deletepengalamanperusahaan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $i = DB::table('pengalamanperusahaan')->where('UserId', $userid)->where('LokasiPasokan',$_POST['namalokasi'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Pengalaman');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Pengalaman Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Pengalaman');
                return back();
            }
        }
    }

    public function deletekontrakpengadaan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $i = DB::table('kontrakpengadaan')->where('UserId', $userid)->where('LokasiPasokan',$_POST['namalokasi'])->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Kontrak Pengadaan');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Kontrak Pengadaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Kontrak Pengadaan');
                return back();
            }   
        }
    }

    public function gantipassword(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{
            return view('vendors.gantipassword');
        }
    }

    public function savepassword(Request $request){

        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

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
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Ganti Password',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }
        }
    }

    public function DetailTeknisTambang($alamat){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            \Session::put('alamatlokasi',$alamat);
            return Redirect('detaildatateknistambang');
        }
    }

    public function adddetaildatateknistambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            
            $result1 = (object) array(
                                        'Alamat'                        => null,
                                        'AlamatCk'                      => null,
                                        'Propinsi'                      => null,
                                        'PropinsiCk'                    => null,
                                        'Kabupaten'                     => null,
                                        'KabupatenCk'                   => null,
                                        'Koordinat'                     => null,
                                        'KoordinatCk'                   => null,
                                        'LuasAreaTambang'               => null,
                                        'LuasAreaTambangCk'             => null,
                                        'PerkiraanVolumeCadangan'       => null,
                                        'PerkiraanVolumeCadanganCk'     => null,
                                        'IjinTambang'                   => null,
                                        'IjinTambangCk'                 => null,
                                        'NomorIjin'                     => null,
                                        'NomorIjinCk'                   => null,
                                        'TanggalIjin'                   => null,
                                        'TanggalIjinCk'                 => null,
                                        'MasaBerlakuIjin'               => null,
                                        'MasaBerlakuIjinCk'             => null,
                                        'KapasitasProduksi'             => null,
                                        'KapasitasProduksiCk'           => null,
                                        'KapasitasStockPile'            => null,
                                        'KapasitasStockPileCk'          => null,
                                        'JarakTempuh'                   => null,
                                        'JarakTempuhCk'                 => null,
                                        'AksesPengangkut'               => null,
                                        'AksesPengangkutCk'             => null,
                                        'JenisTransportasi'             => null,
                                        'JenisTransportasiCk'           => null,
                                        'KapasitasPengangkutan'         => null,
                                        'KapasitasPengangkutanCk'       => null,
                                        'KapasitasStockPilePelabuhan'   => null,
                                        'KapasitasStockPilePelabuhanCk' => null,
                                        'PersetujuanVerifikasi'         => null,
                                     );
            $result2 = DB::table('provinsi')->get();
            $result3 = DB::table('kabupatenkota')->get();
            $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

            if($hitung4 < 1){
                $result4 = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result4 = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }
            $hitungiupop = DB::table('iupop')->where('UserId','=',$userid)->count();
            if($hitungiupop < 1){
                $resultiupop = (object) array(
                                            'No'            => null,
                                            'Tanggal'       => null,
                                            'JangkaWaktu'   => null,
                                          );
            }else{
                $resultiupop = DB::table('iupop')->where('UserId','=',$userid)->first();
            }

            $hitungiupopk = DB::table('iupopkhusus')->where('UserId','=',$userid)->count();
            if($hitungiupopk < 1){
                $resultiupopk = (object) array(
                                            'No'            => null,
                                            'Tanggal'       => null,
                                            'JangkaWaktu'   => null,
                                          );
            }else{
                $resultiupopk = DB::table('iupopkhusus')->where('UserId','=',$userid)->first();
            }

            $hitungiupopk2 = DB::table('iupopkhusus2')->where('UserId','=',$userid)->count();
            if($hitungiupopk2 < 1){
                $resultiupopk2 = (object) array(
                                            'No'            => null,
                                            'Tanggal'       => null,
                                            'JangkaWaktu'   => null,
                                          );
            }else{
                $resultiupopk2 = DB::table('iupopkhusus2')->where('UserId','=',$userid)->first();
            }

            $resultkoordinat = null;

            \Session::put('alamatlokasi','');

            return view('vendors.pendaftaran.detaildatateknistambang')->with('data',$result1)->with('data2', $result2)
                    ->with('data3', $result3)->with('data4',$result4)
                    ->with('dataiupop',$resultiupop)->with('dataiupopk',$resultiupopk)
                    ->with('datakoordinat',$resultkoordinat)->with('dataiupopk2',$resultiupopk2);
        }
    }

    public function detaildatateknistambang(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $alamatlokasi = \Session::get('alamatlokasi');

            if($alamatlokasi != ''){
                $hitung = DB::table('datateknistambang')->where('UserId', $userid)->count();
                \Session::put('alamatflash',$alamatlokasi);
            }else{
                $hitung = 0;
                \Session::put('alamatflash','');
            }        

            if($hitung < 1){
                $result1 = (object) array(
                                            'Alamat'                        => null,
                                            'AlamatCk'                      => null,
                                            'Propinsi'                      => null,
                                            'PropinsiCk'                    => null,
                                            'Kabupaten'                     => null,
                                            'KabupatenCk'                   => null,
                                            'Koordinat'                     => null,
                                            'KoordinatCk'                   => null,
                                            'LuasAreaTambang'               => null,
                                            'LuasAreaTambangCk'             => null,
                                            'PerkiraanVolumeCadangan'       => null,
                                            'PerkiraanVolumeCadanganCk'     => null,
                                            'IjinTambang'                   => null,
                                            'IjinTambangCk'                 => null,
                                            'NomorIjin'                     => null,
                                            'NomorIjinCk'                   => null,
                                            'TanggalIjin'                   => null,
                                            'TanggalIjinCk'                 => null,
                                            'MasaBerlakuIjin'               => null,
                                            'MasaBerlakuIjinCk'             => null,
                                            'KapasitasProduksi'             => null,
                                            'KapasitasProduksiCk'           => null,
                                            'KapasitasStockPile'            => null,
                                            'KapasitasStockPileCk'          => null,
                                            'JarakTempuh'                   => null,
                                            'JarakTempuhCk'                 => null,
                                            'AksesPengangkut'               => null,
                                            'AksesPengangkutCk'             => null,
                                            'JenisTransportasi'             => null,
                                            'JenisTransportasiCk'           => null,
                                            'KapasitasPengangkutan'         => null,
                                            'KapasitasPengangkutanCk'       => null,
                                            'KapasitasStockPilePelabuhan'   => null,
                                            'KapasitasStockPilePelabuhanCk' => null,
                                            'PersetujuanVerifikasi'         => null,
                                            'Status'               => null,
                                         );
            } else {
                $result1 = DB::table('datateknistambang')
                    ->join('vendor','datateknistambang.UserId','=','vendor.UserId')
                    ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                    ->where('datateknistambang.UserId', $userid)
                    ->where('datateknistambang.Alamat',$alamatlokasi)->first();
            }        

            $result2 = DB::table('provinsi')->get();
            $result3 = DB::table('kabupatenkota')->get();

            $hitung4 = DB::table('dataadministrasiperusahaan')
                      ->where('UserId', $userid)->count();

            if($hitung4 < 1){
                $result4 = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result4 = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $hitungiupop = DB::table('iupop')->where('UserId','=',$userid)->count();
            if($hitungiupop < 1){
                $resultiupop = (object) array(
                                            'No'            => null,
                                            'Tanggal'       => null,
                                            'JangkaWaktu'   => null,
                                          );
            }else{
                $resultiupop = DB::table('iupop')->where('UserId','=',$userid)->first();
            }

            $hitungiupopk = DB::table('iupopkhusus')->where('UserId','=',$userid)->count();
            if($hitungiupopk < 1){
                $resultiupopk = (object) array(
                                            'No'            => null,
                                            'Tanggal'       => null,
                                            'JangkaWaktu'   => null,
                                          );
            }else{
                $resultiupopk = DB::table('iupopkhusus')->where('UserId','=',$userid)->first();
            }

            $hitungiupopk2 = DB::table('iupopkhusus2')->where('UserId','=',$userid)->count();
            if($hitungiupopk2 < 1){
                $resultiupopk2 = (object) array(
                                            'No'            => null,
                                            'Tanggal'       => null,
                                            'JangkaWaktu'   => null,
                                          );
            }else{
                $resultiupopk2 = DB::table('iupopkhusus2')->where('UserId','=',$userid)->first();
            }
        $resultkoordinat = DB::table('koordinattambang')->where('UserId','=',$userid)->where('Alamat','=',$alamatlokasi)->get();

         return view('vendors.pendaftaran.detaildatateknistambang')->with('data',$result1)->with('data2', $result2)
                     ->with('data3', $result3)->with('data4',$result4)
                     ->with('dataiupop',$resultiupop)->with('dataiupopk',$resultiupopk)
                     ->with('datakoordinat',$resultkoordinat)->with('dataiupopk2',$resultiupopk2);
        }
    }

    public function deletedatateknis(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $i = DB::table('datateknistambang')->where('UserId', $userid)->where('Alamat',$_POST['alamattambang'])->delete();
            $i = DB::table('spesifikasitambang')->where('UserId', $userid)->where('Alamat',$_POST['alamattambang'])->delete();
            $i = DB::table('koordinattambang')->where('UserId', $userid)->where('Alamat',$_POST['alamattambang'])->delete();

            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Data Teknis Tambang');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Data Teknis Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Data Teknis Tambang');
                return back();
            } 
        }
    }

    public function deletespesifikasibatubara(Request $request){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $i = DB::table('spesifikasitambang')->where('UserId', $userid)
                        ->where('Alamat',$_POST['alamattambang'])
                        ->where('Ids', $_POST['idstambang'])->delete();
            if($i > 0){
                //alert()->success('BERHASIL', 'Hapus Data Teknis Tambang');
                $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Data Spesifikasi Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                return back();
            }else{
                //alert()->error('GAGAL', 'Hapus Data Teknis Tambang');
                return back();
            } 
        }
    }

    public function undangansuratpenunjukan(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('vendor')
                    ->where('UserId', $userid)
                    ->where('StatusSuratPenunjukan','=','Y')
                    ->count();

        if($hitung > 0){
            $result = DB::table('suratpenunjukan')
                                ->join('dataadministrasiperusahaan', 'suratpenunjukan.UserId', '=', 
                                    'dataadministrasiperusahaan.UserId')
                                ->select('suratpenunjukan.Lingkup','suratpenunjukan.Volume',
                                    'suratpenunjukan.Spesifikasi','suratpenunjukan.Surat',
                                    'dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                                ->where('suratpenunjukan.UserId', $userid)->first();
            return view('vendors.undangan.suratpenunjukan')->with('data',$result);
        }else{
            return view('blankpage.suratpenunjukan');
        }
        }
    }

    public function DetailSpesifikasiTambang($id){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            \Session::put('alamatlokasi',$id);
            return Redirect('spesifikasibatubara');
        }
    }

    public function legalitasperijinantambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')) {
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('legalitasperijinantambang')->where('UserId', $userid)->count();

            if ($hitung < 1 ) {
                $result = (object) array(
                                        'JenisIjin'  => null,
                                     );
            }else{
                $result = DB::table('legalitasperijinantambang')
                            ->join('vendor','legalitasperijinantambang.UserId','=','vendor.UserId')
                            ->where('legalitasperijinantambang.UserId', $userid)->first();
            }

            $hitung1 = DB::table('iupop')->where('UserId', $userid)->count();
            $hitung2 = DB::table('iupopkhusus')->where('UserId', $userid)->count();
            $hitung3 = DB::table('iupopumum')->where('UserId', $userid)->count();
            $hitung4 = DB::table('iupopkhusus2')->where('UserId', $userid)->count();
            $hitung5 = DB::table('pkp2b')->where('UserId', $userid)->count();

            if($hitung1 < 1){
            $result1 = (object) array(
                                        'No'                    => null,
                                        'NoCk'                  => null,
                                        'Tanggal'               => null,
                                        'TanggalCk'             => null,
                                        'JangkaWaktu'           => null,
                                        'JangkaWaktuCk'         => null,
                                        'Menerbitkan'           => null,
                                        'MenerbitkanCk'         => null,
                                        'Dirut'                 => null,
                                        'DirutCk'               => null,
                                        'Komisaris'             => null,
                                        'KomisarisCk'           => null,
                                        'NoCnc'                 => null,
                                        'NoCncCk'               => null,
                                        'LampiranPeta'          => null,
                                        'LampiranPetaCk'        => null,
                                        'LampiranKoordinat'     => null,
                                        'LampiranKoordinatCk'   => null,
                                        'TanggalCnc'               => null,
                                        'TanggalCncCk'             => null,
                                        'JangkaWaktuCnc'           => null,
                                        'JangkaWaktuCncCk'         => null,
                                      );
            }else{
                $result1 = DB::table('iupop')->where('UserId', $userid)->first();
            }

            if($hitung2 < 1){
            $result2 = (object) array(
                                        'No'                        => null,
                                        'NoCk'                      => null,
                                        'Tanggal'                   => null,
                                        'TanggalCk'                 => null,
                                        'JangkaWaktu'               => null,
                                        'JangkaWaktuCk'             => null,
                                        'Menerbitkan'               => null,
                                        'MenerbitkanCk'             => null,
                                        'WilayahPengangkutan'       => null,
                                        'WilayahPengangkutanCk'     => null,
                                    );
            }else{
                $result2 = DB::table('iupopkhusus')->where('UserId', $userid)->first();
            }

            if($hitung3 < 1){
                $result3 = null;
            }else{
                $result3 = DB::table('iupopumum')->where('UserId', $userid)->get();
            }

            if($hitung4 < 1){
                $result7 = (object) array(
                                        'No'                        => null,
                                        'NoCk'                      => null,
                                        'Tanggal'                   => null,
                                        'TanggalCk'                 => null,
                                        'JangkaWaktu'               => null,
                                        'JangkaWaktuCk'             => null,
                                        'Menerbitkan'               => null,
                                        'MenerbitkanCk'             => null,
                                        'WilayahPengangkutan'       => null,
                                        'WilayahPengangkutanCk'     => null,
                                    );
            }else{
                $result7 = DB::table('iupopkhusus2')->where('UserId', $userid)->first();
            }

            if($hitung5 < 1){
                $result9 = (object) array(
                                        'No'                        => null,
                                        'NoCk'                      => null,
                                        'Tanggal'                   => null,
                                        'TanggalCk'                 => null,
                                        );
            }else{
                $result9 = DB::table('pkp2b')->where('UserId', $userid)->first();
            }

            $hitung4 = DB::table('dataadministrasiperusahaan')
                  ->where('UserId', $userid)->count();

            if($hitung4 < 1){
                $result4 = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result4 = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat', 'BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $hdireksi = DB::table('direksiperusahaan')->where('UserId', $userid)->count();
            if ($hdireksi < 1 ) {
                $resultDireksi = null;
            }else {
                $resultDireksi = DB::table('direksiperusahaan')
                            ->join('vendor','direksiperusahaan.UserId','=','vendor.UserId')
                            ->where('direksiperusahaan.UserId', $userid)->get();
            }

            $hkomisaris = DB::table('komisarisperusahaan')->where('UserId', $userid)->count();
            if ($hkomisaris < 1 ) {
                $resultKomisaris = null;
            }else{
                $resultKomisaris = DB::table('komisarisperusahaan')
                            ->join('vendor','komisarisperusahaan.UserId','=','vendor.UserId')
                            ->where('komisarisperusahaan.UserId',$userid)->get();
            }

            $result5 = DB::table('vendor')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('vendor.UserId','=',$userid)->first();

            $result6 = DB::table('sumbertambang')->where('UserId',$userid)->get();
            $result8 = DB::table('sumbertambang2')->where('UserId',$userid)->get();

            return view('vendors.pendaftaran.legalitasperijinantambang')
                        ->with('data',$result)->with('data1',$result1)->with('data2',$result2)
                        ->with('data3',$result3)->with('data4',$result4)->with('data5',$result5)
                        ->with('data6',$result6)->with('data7',$result7)->with('data8',$result8)
                        ->with('data9',$result9)
                        ->with('datadireksi',$resultDireksi)->with('datakomisaris',$resultKomisaris);
        }
    }

    public function savelegalitasperijinantambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $statusijin = $_POST['suratijin'];
            
            if($statusijin == "IUPOP"){
                if(!isset($_POST['siup_no']))
                    $siup_no = '';
                else
                    $siup_no = $_POST['siup_no'];

                if(!isset($_POST['siup_tanggal']))
                    $siup_tanggal = '';
                else
                     if ($_POST['siup_tanggal']=="")
                        $siup_tanggal = null;
                     else
                         $siup_tanggal = date("Y-m-d", strtotime($_POST['siup_tanggal']));

                if(!isset($_POST['siup_jangkawaktu']))
                    $siup_jangkawaktu = '';
                else
                     if ($_POST['siup_jangkawaktu']=="")
                        $siup_jangkawaktu = null;
                     else
                         $siup_jangkawaktu = date("Y-m-d", strtotime($_POST['siup_jangkawaktu']));

                if(!isset($_POST['siup_tanggalcnc']))
                    $siup_tanggalcnc = '';
                else
                     if ($_POST['siup_tanggalcnc']=="")
                        $siup_tanggalcnc = null;
                     else
                         $siup_tanggalcnc = date("Y-m-d", strtotime($_POST['siup_tanggalcnc']));

                if(!isset($_POST['siup_jangkawaktucnc']))
                    $siup_jangkawaktucnc = '';
                else
                     if ($_POST['siup_jangkawaktucnc']=="")
                        $siup_jangkawaktucnc = null;
                     else
                         $siup_jangkawaktucnc = date("Y-m-d", strtotime($_POST['siup_jangkawaktucnc']));

                if(!isset($_POST['siup_menerbitkan']))
                    $siup_menerbitkan = '';
                else
                    $siup_menerbitkan = $_POST['siup_menerbitkan'];

                if(!isset($_POST['siup_direksi']))
                    $siup_direksi = '';
                else
                    $siup_direksi = $_POST['siup_direksi'];

                if(!isset($_POST['siup_komisaris']))
                    $siup_komisaris = '';
                else
                    $siup_komisaris = $_POST['siup_komisaris'];

                if(!isset($_POST['siup_sertifikat']))
                    $siup_sertifikat = '';
                else
                    $siup_sertifikat = $_POST['siup_sertifikat'];

                if(!isset($_POST['siup_lampiran_peta']))
                    $siup_lampiran_peta = '';
                else
                    $siup_lampiran_peta = $_POST['siup_lampiran_peta'];

                if(!isset($_POST['siup_lampiran_koordinat']))
                    $siup_lampiran_koordinat = '';
                else
                    $siup_lampiran_koordinat = $_POST['siup_lampiran_koordinat'];

                $a = DB::table('iupop')->where('UserId','=',$userid)->first();

                $hitungiupop = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count();
                if($hitungiupop < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'IUPOP',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array('JenisIjin' => 'IUPOP');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($a)){
                    $data = array(
                                'UserId'                => $userid,
                                'No'                    => $siup_no,
                                'Tanggal'               => $siup_tanggal,
                                'JangkaWaktu'           => $siup_jangkawaktu,
                                'Menerbitkan'           => $siup_menerbitkan,
                                'Dirut'                 => $siup_direksi,
                                'Komisaris'             => $siup_komisaris,
                                'NoCnc'                 => $siup_sertifikat,
                                'LampiranPeta'          => $siup_lampiran_peta,
                                'LampiranKoordinat'     => $siup_lampiran_koordinat,
                                'TanggalCnc'               => $siup_tanggalcnc,
                                'JangkaWaktuCnc'           => $siup_jangkawaktucnc,
                              );
                    $i = DB::table('iupop')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    $cari = DB::table('sumbertambang2')->where('UserId',$userid)->where('AsalTambang','IUPOP')->count();
                    if($cari < 1){
                        $data = array(
                                'UserId'                => $userid,
                                'AsalTambang'           => 'IUPOP',
                                'NoIUPOP'               => $siup_no,
                                'NoCNC'                 => $siup_sertifikat,
                                'TglIUPOP'              => $siup_tanggal,
                                'JangkaWaktuIUPOP'      => $siup_jangkawaktu,
                                'TglCNC'              => $siup_tanggalcnc,
                                'JangkaWaktuCNC'      => $siup_jangkawaktucnc,
                              );
                        $i = DB::table('sumbertambang2')->insert($data);

                        $datatb = array(
                                    'UserId'                => $userid,
                                    'AsalTambang'           => 'IUPOP',
                                    'JenisIjin'             => 'IUPOP',
                                    );
                        $tb = DB::table('dataeksplorasi')->insert($datatb);
                        $tb = DB::table('datajetty')->insert($datatb);
                        $tb = DB::table('dataproduksitambang')->insert($datatb);
                        $tb = DB::table('datastockpile')->insert($datatb);
                        $tb = DB::table('datatambang')->insert($datatb);
                    }else{
                        $data = array(
                                'AsalTambang'           => 'IUPOP',
                                'NoIUPOP'               => $siup_no,
                                'NoCNC'                 => $siup_sertifikat,
                                'TglIUPOP'              => $siup_tanggal,
                                'JangkaWaktuIUPOP'      => $siup_jangkawaktu,
                                'TglCNC'              => $siup_tanggalcnc,
                                'JangkaWaktuCNC'      => $siup_jangkawaktucnc,
                              );
                        $i = DB::table('sumbertambang2')->where('UserId','=',$userid)
                                    ->where('AsalTambang','=','IUPOP')
                                    ->update($data);

                        $datatb = array(
                                    'AsalTambang'           => 'IUPOP',
                                    );
                        $tb = DB::table('dataeksplorasi')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datajetty')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('dataproduksitambang')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datastockpile')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datatambang')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datakoordinattambang')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datajettydetail')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datapopulasialat')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('dataspesifikasibatubara')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                    }

                    if(is_null($i)){   
                        return back();         
                    }else{
                        return redirect('datakeuangan');
                    }
                }else{
                    $data = array(
                                'No'                    => $siup_no,
                                'Tanggal'               => $siup_tanggal,
                                'JangkaWaktu'           => $siup_jangkawaktu,
                                'Menerbitkan'           => $siup_menerbitkan,
                                'Dirut'                 => $siup_direksi,
                                'Komisaris'             => $siup_komisaris,
                                'NoCnc'                 => $siup_sertifikat,
                                'LampiranPeta'          => $siup_lampiran_peta,
                                'LampiranKoordinat'     => $siup_lampiran_koordinat,
                                'TanggalCnc'               => $siup_tanggalcnc,
                                'JangkaWaktuCnc'           => $siup_jangkawaktucnc,
                              );
                    $i = DB::table('iupop')->where('UserId','=',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    $cari = DB::table('sumbertambang2')->where('UserId',$userid)->where('AsalTambang','IUPOP')->count();
                    if($cari < 1){
                        $data = array(
                                'UserId'                => $userid,
                                'AsalTambang'           => 'IUPOP',
                                'NoIUPOP'               => $siup_no,
                                'NoCNC'                 => $siup_sertifikat,
                                'TglIUPOP'                   => $siup_tanggal,
                                'JangkaWaktuIUPOP'      => $siup_jangkawaktu,
                                'TglCNC'                   => $siup_tanggalcnc,
                                'JangkaWaktuCNC'      => $siup_jangkawaktucnc,
                              );
                        $i = DB::table('sumbertambang2')->insert($data);

                        $datatb = array(
                                    'UserId'                => $userid,
                                    'AsalTambang'           => 'IUPOP',
                                    'JenisIjin'             => 'IUPOP',
                                    );
                        $tb = DB::table('dataeksplorasi')->insert($datatb);
                        $tb = DB::table('datajetty')->insert($datatb);
                        $tb = DB::table('dataproduksitambang')->insert($datatb);
                        $tb = DB::table('datastockpile')->insert($datatb);
                        $tb = DB::table('datatambang')->insert($datatb);
                    }else{
                        $data = array(
                                'AsalTambang'           => 'IUPOP',
                                'NoIUPOP'               => $siup_no,
                                'NoCNC'                 => $siup_sertifikat,
                                'TglIUPOP'                   => $siup_tanggal,
                                'JangkaWaktuIUPOP'      => $siup_jangkawaktu,
                                'TglCNC'                   => $siup_tanggalcnc,
                                'JangkaWaktuCNC'      => $siup_jangkawaktucnc,
                              );
                        $i = DB::table('sumbertambang2')->where('UserId','=',$userid)
                                    ->where('AsalTambang','=','IUPOP')
                                    ->update($data);

                        $datatb = array(
                                    'AsalTambang'           => 'IUPOP',
                                    );
                        $tb = DB::table('dataeksplorasi')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datajetty')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('dataproduksitambang')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datastockpile')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datatambang')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datakoordinattambang')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datajettydetail')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('datapopulasialat')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                        $tb = DB::table('dataspesifikasibatubara')->where('UserId','=',$userid)->where('AsalTambang','=','IUPOP')
                                                    ->where('JenisIjin','=','IUPOP')->update($datatb);
                    }
                    
                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }
            }

            if($statusijin == "IUPOPK"){
                if(!isset($_POST['iupopk_no']))
                    $iupopk_no = '';
                else
                    $iupopk_no = $_POST['iupopk_no'];

                if(!isset($_POST['iupopk_tanggal']))
                    $iupopk_tanggal = '';
                else
                     if ($_POST['iupopk_tanggal']=="")
                        $iupopk_tanggal = null;
                     else
                         $iupopk_tanggal = date("Y-m-d", strtotime($_POST['iupopk_tanggal']));

                if(!isset($_POST['iupopk_jangkawaktu']))
                    $iupopk_jangkawaktu = '';
                else
                     if ($_POST['iupopk_jangkawaktu']=="")
                        $iupopk_jangkawaktu = null;
                     else
                         $iupopk_jangkawaktu = date("Y-m-d", strtotime($_POST['iupopk_jangkawaktu']));

                if(!isset($_POST['iupopk_menerbitkan']))
                    $iupopk_menerbitkan = '';
                else
                    $iupopk_menerbitkan = $_POST['iupopk_menerbitkan'];

                if(!isset($_POST['iupopk_wilayah']))
                    $iupopk_wilayah = '';
                else
                    $iupopk_wilayah = $_POST['iupopk_wilayah'];

                $b = DB::table('iupopkhusus')->where('UserId','=',$userid)->first();

                $hitungiupopk = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count();
                if($hitungiupopk < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'IUPOPK',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array('JenisIjin' => 'IUPOPK');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($b)){
                    $data = array(
                                'UserId'                => $userid,
                                'No'                    => $iupopk_no,
                                'Tanggal'               => $iupopk_tanggal,
                                'JangkaWaktu'           => $iupopk_jangkawaktu,
                                'Menerbitkan'           => $iupopk_menerbitkan,
                                'WilayahPengangkutan'   => $iupopk_wilayah,
                              );
                    $i = DB::table('iupopkhusus')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }else{
                    $data = array(
                                'No'                    => $iupopk_no,
                                'Tanggal'               => $iupopk_tanggal,
                                'JangkaWaktu'           => $iupopk_jangkawaktu,
                                'Menerbitkan'           => $iupopk_menerbitkan,
                                'WilayahPengangkutan'   => $iupopk_wilayah,
                              );
                    $i = DB::table('iupopkhusus')->where('UserId','=',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }
            }

            if($statusijin == "IUPOPK2"){
                if(!isset($_POST['iupopk2_no']))
                    $iupopk2_no = '';
                else
                    $iupopk2_no = $_POST['iupopk2_no'];

                if(!isset($_POST['iupopk2_tanggal']))
                    $iupopk2_tanggal = '';
                else
                     if ($_POST['iupopk2_tanggal']=="")
                        $iupopk2_tanggal = null;
                     else
                         $iupopk2_tanggal = date("Y-m-d", strtotime($_POST['iupopk2_tanggal']));

                if(!isset($_POST['iupopk2_jangkawaktu']))
                    $iupopk2_jangkawaktu = '';
                else
                     if ($_POST['iupopk2_jangkawaktu']=="")
                        $iupopk2_jangkawaktu = null;
                     else
                         $iupopk2_jangkawaktu = date("Y-m-d", strtotime($_POST['iupopk2_jangkawaktu']));

                if(!isset($_POST['iupopk2_menerbitkan']))
                    $iupopk2_menerbitkan = '';
                else
                    $iupopk2_menerbitkan = $_POST['iupopk2_menerbitkan'];

                if(!isset($_POST['iupopk2_wilayah']))
                    $iupopk2_wilayah = '';
                else
                    $iupopk2_wilayah = $_POST['iupopk2_wilayah'];

                $b = DB::table('iupopkhusus2')->where('UserId','=',$userid)->first();

                $hitungiupopk = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count();
                if($hitungiupopk < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'IUPOPK2',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array('JenisIjin' => 'IUPOPK2');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($b)){
                    $data = array(
                                'UserId'                => $userid,
                                'No'                    => $iupopk2_no,
                                'Tanggal'               => $iupopk2_tanggal,
                                'JangkaWaktu'           => $iupopk2_jangkawaktu,
                                'Menerbitkan'           => $iupopk2_menerbitkan,
                                'WilayahPengangkutan'   => $iupopk2_wilayah,
                              );
                    $i = DB::table('iupopkhusus2')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }else{
                    $data = array(
                                'No'                    => $iupopk2_no,
                                'Tanggal'               => $iupopk2_tanggal,
                                'JangkaWaktu'           => $iupopk2_jangkawaktu,
                                'Menerbitkan'           => $iupopk2_menerbitkan,
                                'WilayahPengangkutan'   => $iupopk2_wilayah,
                              );
                    $i = DB::table('iupopkhusus2')->where('UserId','=',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }
            }

            if($statusijin == "PKP2B"){
                if(!isset($_POST['pkp2b_no']))
                    $pkp2b_no = '';
                else
                    $pkp2b_no = $_POST['pkp2b_no'];

                if(!isset($_POST['pkp2b_tanggal']))
                    $pkp2b_tanggal = '';
                else
                     if ($_POST['pkp2b_tanggal']=="")
                        $pkp2b_tanggal = null;
                     else
                         $pkp2b_tanggal = date("Y-m-d", strtotime($_POST['pkp2b_tanggal']));

                $b = DB::table('pkp2b')->where('UserId','=',$userid)->first();

                $hitungiupopk = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count();
                if($hitungiupopk < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'PKP2B',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array('JenisIjin' => 'PKP2B');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($b)){
                    $data = array(
                                'UserId'                => $userid,
                                'No'                    => $pkp2b_no,
                                'Tanggal'               => $pkp2b_tanggal,
                              );
                    $i = DB::table('pkp2b')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }else{
                    $data = array(
                                'No'                    => $pkp2b_no,
                                'Tanggal'               => $pkp2b_tanggal,
                              );
                    $i = DB::table('pkp2b')->where('UserId','=',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }

                    if(is_null($i)){   
                        //alert()->error('GAGAL', 'Simpan Data');
                        return back();         
                    }else{
                        //alert()->success('BERHASIL', 'Simpan Data');
                        //return back();
                        return redirect('datakeuangan');
                    }
                }
            }
        }
    }

    public function datateknis($alamat){
        $userid = \Session::get('vendorid');
        if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $result = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId',$userid)->first();
            \Session::put('alamatlokasi',$alamat);
            return view('vendors.pendaftaran.datateknis')->with('data',$result);
        }
    }

    public function savekoordinattambang(){
        $userid = \Session::get('vendorid');
        $alamatlokasi = \Session::get('alamatlokasi');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($alamatlokasi) || ($alamatlokasi == '')){
                $alamatlokasi = $_POST['alamatkoordinat'];
                $result = DB::table('datateknistambang')->where('UserId','=',$userid)->where('Alamat',$alamatlokasi)->first();
                if(is_null($result)){
                    $data = array(
                                'UserId'                        => $userid,
                                'Alamat'                        => $alamatlokasi,
                              );
                    $i = DB::table('datateknistambang')->insert($data);
                }
            }else{
                $alamatlokasi = \Session::get('alamatlokasi');
            }

            if(!isset($_POST['fid']))
                $fid = '';
            else
                $fid = $_POST['fid'];

            if(!isset($_POST['point']))
                $point = '';
            else
                $point = $_POST['point'];

            if(!isset($_POST['x']))
                $x = '';
            else
                $x = $_POST['x'];

            if(!isset($_POST['y']))
                $y = '';
            else
                $y = $_POST['y'];

            if(!isset($_POST['direction']))
                $direction = '';
            else
                $direction = $_POST['direction'];

            if(!isset($_POST['length']))
                $length = '';
            else
                $length = $_POST['length'];

            if(!isset($_POST['koordinatid']))
                $koordinatid = '';
            else
                $koordinatid = $_POST['koordinatid'];
            
            if(empty($koordinatid)){
                $data = array(
                            'UserId'                => $userid,
                            'Alamat'                => $alamatlokasi,
                            'FID'                   => $fid,
                            'Point'                 => $point,
                            'X'                     => $x,
                            'Y'                     => $y,
                            'Direction'             => $direction,
                            'Length'                => $length,
                          );
                $i = DB::table('koordinattambang')->insert($data);
            }else{
                $data = array(
                            'FID'                   => $fid,
                            'Point'                 => $point,
                            'X'                     => $x,
                            'Y'                     => $y,
                            'Direction'             => $direction,
                            'Length'                => $length,
                          );
                $i = DB::table('koordinattambang')->where('UserId','=',$userid)
                                ->where('Alamat','=',$alamatlokasi)->where('IdKoordinat','=',$koordinatid)
                                ->update($data);

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }
            }

            if(is_null($i)){   
                //alert()->error('GAGAL', 'Simpan Koordinat Tambang');
                return back();          
            }else{
                //alert()->success('BERHASIL', 'Simpan Koordinat Tambang'); 
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Koordinat Tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                \Session::put('alamatlokasi',$alamatlokasi);
                return redirect('DetailTeknisTambang/'.$alamatlokasi);  
            }
        }
    }

    public function deletekoordinattambang(){
        $userid = \Session::get('vendorid');
        $alamatlokasi = \Session::get('alamatlokasi');
        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['koordinatid2']))
                $koordinatid2 = '';
            else
                $koordinatid2 = $_POST['koordinatid2'];

            if(!empty($koordinatid2)){
                $i = DB::table('koordinattambang')->where('UserId',$userid)->where('Alamat',$alamatlokasi)
                            ->where('IdKoordinat',$koordinatid2)->delete();
            }

            if(is_null($i)){   
                //alert()->error('GAGAL', 'Hapus Koordinat Tambang');
                return back();         
            }else{
                //alert()->success('BERHASIL', 'Hapus Koordinat Tambang'); 
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Hapus Koordinat Tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }
        }
    }

    public function deleteasaltambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $jenisijin = $_POST['jenisiuopkdelete'];

            if(!isset($_POST['useridsumber2']))
                $useridsumber2 = '';
            else
                $useridsumber2 = $_POST['useridsumber2'];

            if(!isset($_POST['asaltambangsumber2']))
                $asaltambangsumber2 = '';
            else
                $asaltambangsumber2 = $_POST['asaltambangsumber2'];

            if($jenisijin == 'IUPOPK'){
                $i = DB::table('sumbertambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                        ->delete();

                $tb = DB::table('dataeksplorasi')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                                ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('datajetty')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('dataproduksitambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('datastockpile')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('datatambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('datakoordinattambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('datajettydetail')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('datapopulasialat')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();
                $tb = DB::table('dataspesifikasibatubara')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK')->delete();

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Hapus Asal Tambang');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Hapus Asal Tambang'); 
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Asal Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }else if($jenisijin == 'IUPOPK2'){
                $i = DB::table('sumbertambang2')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                        ->delete();

                $tb = DB::table('dataeksplorasi')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                                ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('datajetty')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('dataproduksitambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('datastockpile')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('datatambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('datakoordinattambang')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('datajettydetail')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('datapopulasialat')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();
                $tb = DB::table('dataspesifikasibatubara')->where('UserId',$useridsumber2)->where('AsalTambang',$asaltambangsumber2)
                                            ->where('JenisIjin','=','IUPOPK2')->delete();

                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Hapus Asal Tambang');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Hapus Asal Tambang'); 
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Hapus Asal Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }
        }
    }

    function get_client_ip_env() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    function getIP(){
        $ipAddress = '';

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ('' !== trim($_SERVER['HTTP_X_FORWARDED_FOR']))) {
            $ipAddress = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
        } else {
            if (isset($_SERVER['REMOTE_ADDR']) && ('' !== trim($_SERVER['REMOTE_ADDR']))) {
                $ipAddress = trim($_SERVER['REMOTE_ADDR']);
            }
        }

        return $ipAddress;
    }

    public function saveasaltambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $jenisijin = $_POST['jenisiuopk'];

            if(!isset($_POST['useridsumber']))
                $useridsumber = '';
            else
                $useridsumber = $_POST['useridsumber'];

            if(!isset($_POST['namasumberawal']))
                $namasumberawal = '';
            else
                $namasumberawal = $_POST['namasumberawal'];

            if(!isset($_POST['asaltambangsumber']))
                $asaltambangsumber = '';
            else
                $asaltambangsumber = $_POST['asaltambangsumber'];

            if(!isset($_POST['noiupopsumber']))
                $noiupopsumber = '';
            else
                $noiupopsumber = $_POST['noiupopsumber'];

            if(!isset($_POST['nocncsumber']))
                $nocncsumber = '';
            else
                $nocncsumber = $_POST['nocncsumber'];

            if(!isset($_POST['tglsumber1']))
                $tglsumber1 = '';
            else
                if ($_POST['tglsumber1']=="")
                   $tglsumber1 = null;
                else
                    $tglsumber1 = date("Y-m-d", strtotime($_POST['tglsumber1']));

            if(!isset($_POST['jangkawaktusumber1']))
                $jangkawaktusumber1 = '';
            else
                if ($_POST['jangkawaktusumber1']=="")
                   $jangkawaktusumber1 = null;
                else
                    $jangkawaktusumber1 = date("Y-m-d", strtotime($_POST['jangkawaktusumber1']));

            if(!isset($_POST['tglsumber2']))
                $tglsumber2 = '';
            else
                if ($_POST['tglsumber2']=="")
                   $tglsumber2 = null;
                else
                    $tglsumber2 = date("Y-m-d", strtotime($_POST['tglsumber2']));

            if(!isset($_POST['jangkawaktusumber2']))
                $jangkawaktusumber2 = '';
            else
                if ($_POST['jangkawaktusumber2']=="")
                   $jangkawaktusumber2 = null;
                else
                    $jangkawaktusumber2 = date("Y-m-d", strtotime($_POST['jangkawaktusumber2']));

            if(!isset($_POST['iupopk_no_h']))
                    $iupopk_no_h = '';
                else
                    $iupopk_no_h = $_POST['iupopk_no_h'];

            if(!isset($_POST['iupopk_tanggal_h']))
                $iupopk_tanggal_h = '';
            else
                 if ($_POST['iupopk_tanggal_h']=="")
                    $iupopk_tanggal_h = null;
                 else
                     $iupopk_tanggal_h = date("Y-m-d", strtotime($_POST['iupopk_tanggal_h']));

            if(!isset($_POST['iupopk_jangkawaktu_h']))
                $iupopk_jangkawaktu_h = '';
            else
                 if ($_POST['iupopk_jangkawaktu_h']=="")
                    $iupopk_jangkawaktu_h = null;
                 else
                     $iupopk_jangkawaktu_h = date("Y-m-d", strtotime($_POST['iupopk_jangkawaktu_h']));

            if(!isset($_POST['iupopk_menerbitkan_h']))
                $iupopk_menerbitkan_h = '';
            else
                $iupopk_menerbitkan_h = $_POST['iupopk_menerbitkan_h'];

            if(!isset($_POST['iupopk_wilayah_h']))
                $iupopk_wilayah_h = '';
            else
                $iupopk_wilayah_h = $_POST['iupopk_wilayah_h'];

            if($iupopk_no_h == ''){
                $hitungiupopk = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count(); 
                if($hitungiupopk < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'IUPOPK',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();
                                         
                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{ 
                    $data = array('JenisIjin' => 'IUPOPK');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }
            }else{
                $hitungiupopk = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count(); 
                if($hitungiupopk < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'IUPOPK',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);

                    $hitungiupopk = DB::table('iupopkhusus')->where('UserId',$userid)->count();
                    if($hitungiupopk < 1){
                        $data = array(
                                'UserId'                => $userid,
                                'No'                    => $iupopk_no_h,
                                'Tanggal'               => $iupopk_tanggal_h,
                                'JangkaWaktu'           => $iupopk_jangkawaktu_h,
                                'Menerbitkan'           => $iupopk_menerbitkan_h,
                                'WilayahPengangkutan'   => $iupopk_wilayah_h,
                              );
                        $i = DB::table('iupopkhusus')->insert($data);
                    }else{
                        $data = array(
                                    'No'                    => $iupopk_no_h,
                                    'Tanggal'               => $iupopk_tanggal_h,
                                    'JangkaWaktu'           => $iupopk_jangkawaktu_h,
                                    'Menerbitkan'           => $iupopk_menerbitkan_h,
                                    'WilayahPengangkutan'   => $iupopk_wilayah_h,
                                  );
                        $i = DB::table('iupopkhusus')->where('UserId','=',$userid)->update($data); var_dump($data);
                    }

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();
                                         
                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{ 
                    $data = array('JenisIjin' => 'IUPOPK');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);
                    
                    $hitungiupopk = DB::table('iupopkhusus')->where('UserId',$userid)->count();
                    if($hitungiupopk < 1){
                        $data = array(
                                'UserId'                => $userid,
                                'No'                    => $iupopk_no_h,
                                'Tanggal'               => $iupopk_tanggal_h,
                                'JangkaWaktu'           => $iupopk_jangkawaktu_h,
                                'Menerbitkan'           => $iupopk_menerbitkan_h,
                                'WilayahPengangkutan'   => $iupopk_wilayah_h,
                              );
                        $i = DB::table('iupopkhusus')->insert($data);
                    }else{
                        $data = array(
                                    'No'                    => $iupopk_no_h,
                                    'Tanggal'               => $iupopk_tanggal_h,
                                    'JangkaWaktu'           => $iupopk_jangkawaktu_h,
                                    'Menerbitkan'           => $iupopk_menerbitkan_h,
                                    'WilayahPengangkutan'   => $iupopk_wilayah_h,
                                  );
                        $i = DB::table('iupopkhusus')->where('UserId','=',$userid)->update($data); var_dump($data);
                    }

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }
            }

            if($jenisijin == 'IUPOPK'){
                $cari = DB::table('sumbertambang')->where('UserId',$userid)->where('AsalTambang',$namasumberawal)->count();
            
                if($cari < 1){
                    $data = array(
                                'UserId'                => $userid,
                                'AsalTambang'           => $asaltambangsumber,
                                'NoIUPOP'               => $noiupopsumber,
                                'NoCNC'                 => $nocncsumber,
                                'TglIUPOP'              => $tglsumber1,
                                'JangkaWaktuIUPOP'      => $jangkawaktusumber1,
                                'TglCNC'                => $tglsumber2,
                                'JangkaWaktuCNC'        => $jangkawaktusumber2,
                              );
                    $i = DB::table('sumbertambang')->insert($data);

                    $datatb = array(
                                    'UserId'                => $userid,
                                    'AsalTambang'           => $asaltambangsumber,
                                    'JenisIjin'             => 'IUPOPK',
                                    );
                    $tb = DB::table('dataeksplorasi')->insert($datatb);
                    $tb = DB::table('datajetty')->insert($datatb);
                    $tb = DB::table('dataproduksitambang')->insert($datatb);
                    $tb = DB::table('datastockpile')->insert($datatb);
                    $tb = DB::table('datatambang')->insert($datatb);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array(
                                'AsalTambang'           => $asaltambangsumber,
                                'NoIUPOP'               => $noiupopsumber,
                                'NoCNC'                 => $nocncsumber,
                                'TglIUPOP'              => $tglsumber1,
                                'JangkaWaktuIUPOP'      => $jangkawaktusumber1,
                                'TglCNC'                => $tglsumber2,
                                'JangkaWaktuCNC'        => $jangkawaktusumber2,
                              );
                    $i = DB::table('sumbertambang')->where('UserId','=',$userid)
                                    ->where('AsalTambang','=',$namasumberawal)
                                    ->update($data);

                    $datatb = array(
                                    'AsalTambang'           => $asaltambangsumber,
                                    );
                    $tb = DB::table('dataeksplorasi')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('datajetty')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('dataproduksitambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('datastockpile')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('datatambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $datatb = array(
                                    'AsalTambang'           => $asaltambangsumber,
                                    );
                    $tb = DB::table('datakoordinattambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('datajettydetail')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('datapopulasialat')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);
                    $tb = DB::table('dataspesifikasibatubara')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK')->update($datatb);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Asal Tambang');
                    return back();     
                }else{
                    //alert()->success('BERHASIL', 'Simpan Asal Tambang'); 
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Asal Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }else if($jenisijin == 'IUPOPK2'){
                $cari = DB::table('sumbertambang2')->where('UserId',$userid)->where('AsalTambang',$namasumberawal)->count();
            
                if($cari < 1){
                    $data = array(
                                'UserId'                => $userid,
                                'AsalTambang'           => $asaltambangsumber,
                                'NoIUPOP'               => $noiupopsumber,
                                'NoCNC'                 => $nocncsumber,
                                'TglIUPOP'              => $tglsumber1,
                                'JangkaWaktuIUPOP'      => $jangkawaktusumber1,
                              );
                    $i = DB::table('sumbertambang2')->insert($data);

                    $datatb = array(
                                    'UserId'                => $userid,
                                    'AsalTambang'           => $asaltambangsumber,
                                    'JenisIjin'             => 'IUPOPK2',
                                    );
                    $tb = DB::table('dataeksplorasi')->insert($datatb);
                    $tb = DB::table('datajetty')->insert($datatb);
                    $tb = DB::table('dataproduksitambang')->insert($datatb);
                    $tb = DB::table('datastockpile')->insert($datatb);
                    $tb = DB::table('datatambang')->insert($datatb);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array(
                                'AsalTambang'           => $asaltambangsumber,
                                'NoIUPOP'               => $noiupopsumber,
                                'NoCNC'                 => $nocncsumber,
                                'TglIUPOP'              => $tglsumber1,
                                'JangkaWaktuIUPOP'      => $jangkawaktusumber1,
                              );
                    $i = DB::table('sumbertambang2')->where('UserId','=',$userid)
                                    ->where('AsalTambang','=',$namasumberawal)
                                    ->update($data);

                    $datatb = array(
                                    'AsalTambang'           => $asaltambangsumber,
                                    );
                    $tb = DB::table('dataeksplorasi')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datajetty')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('dataproduksitambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datastockpile')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datatambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $datatb = array(
                                    'AsalTambang'           => $asaltambangsumber,
                                    );
                    $tb = DB::table('datakoordinattambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datajettydetail')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datapopulasialat')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('dataspesifikasibatubara')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawal)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Asal Tambang');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Asal Tambang'); 
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Asal Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
            }
        }
    }

    public function saveasaltambangiupopk(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['useridsumberiup']))
                $useridsumberiup = '';
            else
                $useridsumberiup = $_POST['useridsumberiup'];

            if(!isset($_POST['namasumberawaliup']))
                $namasumberawaliup = '';
            else
                $namasumberawaliup = $_POST['namasumberawaliup'];

            if(!isset($_POST['asaltambangsumberiup']))
                $asaltambangsumberiup = '';
            else
                $asaltambangsumberiup = $_POST['asaltambangsumberiup'];

            if(!isset($_POST['noiupopsumberiup']))
                $noiupopsumberiup = '';
            else
                $noiupopsumberiup = $_POST['noiupopsumberiup'];

            if(!isset($_POST['nocncsumberiup']))
                $nocncsumberiup = '';
            else
                $nocncsumberiup = $_POST['nocncsumberiup'];

            if(!isset($_POST['tglsumberiup1']))
                $tglsumberiup1 = '';
            else
                if ($_POST['tglsumberiup1']=="")
                   $tglsumberiup1 = null;
                else
                    $tglsumberiup1 = date("Y-m-d", strtotime($_POST['tglsumberiup1']));

            if(!isset($_POST['jangkawaktusumberiup1']))
                $jangkawaktusumberiup1 = '';
            else
                if ($_POST['jangkawaktusumberiup1']=="")
                   $jangkawaktusumberiup1 = null;
                else
                    $jangkawaktusumberiup1 = date("Y-m-d", strtotime($_POST['jangkawaktusumberiup1']));

            if(!isset($_POST['tglsumberiup2']))
                $tglsumberiup2 = '';
            else
                if ($_POST['tglsumberiup2']=="")
                   $tglsumberiup2 = null;
                else
                    $tglsumberiup2 = date("Y-m-d", strtotime($_POST['tglsumberiup2']));

            if(!isset($_POST['jangkawaktusumberiup2']))
                $jangkawaktusumberiup2 = '';
            else
                if ($_POST['jangkawaktusumberiup2']=="")
                   $jangkawaktusumberiup2 = null;
                else
                    $jangkawaktusumberiup2 = date("Y-m-d", strtotime($_POST['jangkawaktusumberiup2']));

            if(!isset($_POST['iupopk2_no_h']))
                    $iupopk2_no_h = '';
                else
                    $iupopk2_no_h = $_POST['iupopk2_no_h'];

            if(!isset($_POST['iupopk2_tanggal_h']))
                $iupopk2_tanggal_h = '';
            else
                 if ($_POST['iupopk2_tanggal_h']=="")
                    $iupopk2_tanggal_h = null;
                 else
                     $iupopk2_tanggal_h = date("Y-m-d", strtotime($_POST['iupopk2_tanggal_h']));

            if(!isset($_POST['iupopk2_jangkawaktu_h']))
                $iupopk2_jangkawaktu_h = '';
            else
                 if ($_POST['iupopk2_jangkawaktu_h']=="")
                    $iupopk2_jangkawaktu_h = null;
                 else
                     $iupopk2_jangkawaktu_h = date("Y-m-d", strtotime($_POST['iupopk2_jangkawaktu_h']));

            if(!isset($_POST['iupopk2_menerbitkan_h']))
                $iupopk2_menerbitkan_h = '';
            else
                $iupopk2_menerbitkan_h = $_POST['iupopk2_menerbitkan_h'];

            if(!isset($_POST['iupopk2_wilayah_h']))
                $iupopk2_wilayah_h = '';
            else
                $iupopk2_wilayah_h = $_POST['iupopk2_wilayah_h'];

            if($iupopk2_no_h != ''){
                $b = DB::table('iupopkhusus2')->where('UserId','=',$userid)->first();

                $hitungiupopk = DB::table('legalitasperijinantambang')->where('UserId',$userid)->count();
                if($hitungiupopk < 1){
                    $data = array(
                                    'UserId'    => $userid,
                                    'JenisIjin' => 'IUPOPK2',
                                  );
                    $d = DB::table('legalitasperijinantambang')->insert($data);                    

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array('JenisIjin' => 'IUPOPK2');
                    $d = DB::table('legalitasperijinantambang')->where('UserId',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($b)){
                    $data = array(
                                'UserId'                => $userid,
                                'No'                    => $iupopk2_no_h,
                                'Tanggal'               => $iupopk2_tanggal_h,
                                'JangkaWaktu'           => $iupopk2_jangkawaktu_h,
                                'Menerbitkan'           => $iupopk2_menerbitkan_h,
                                'WilayahPengangkutan'   => $iupopk2_wilayah_h,
                              );
                    $i = DB::table('iupopkhusus2')->insert($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array(
                                'No'                    => $iupopk2_no_h,
                                'Tanggal'               => $iupopk2_tanggal_h,
                                'JangkaWaktu'           => $iupopk2_jangkawaktu_h,
                                'Menerbitkan'           => $iupopk2_menerbitkan_h,
                                'WilayahPengangkutan'   => $iupopk2_wilayah_h,
                              );
                    $i = DB::table('iupopkhusus2')->where('UserId','=',$userid)->update($data);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }
            }

                $cari = DB::table('sumbertambang2')->where('UserId',$userid)->where('AsalTambang',$namasumberawaliup)->count();
            
                if($cari < 1){
                    $data = array(
                                'UserId'                => $userid,
                                'AsalTambang'           => $asaltambangsumberiup,
                                'NoIUPOP'               => $noiupopsumberiup,
                                'NoCNC'                 => $nocncsumberiup,
                                'TglIUPOP'              => $tglsumberiup1,
                                'JangkaWaktuIUPOP'      => $jangkawaktusumberiup1,
                                'TglCNC'                => $tglsumberiup2,
                                'JangkaWaktuCNC'        => $jangkawaktusumberiup2,
                              );
                    $i = DB::table('sumbertambang2')->insert($data);

                    $datatb = array(
                                    'UserId'                => $userid,
                                    'AsalTambang'           => $asaltambangsumberiup,
                                    'JenisIjin'             => 'IUPOPK2',
                                    );
                    $tb = DB::table('dataeksplorasi')->insert($datatb);
                    $tb = DB::table('datajetty')->insert($datatb);
                    $tb = DB::table('dataproduksitambang')->insert($datatb);
                    $tb = DB::table('datastockpile')->insert($datatb);
                    $tb = DB::table('datatambang')->insert($datatb);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }else{
                    $data = array(
                                'AsalTambang'           => $asaltambangsumberiup,
                                'NoIUPOP'               => $noiupopsumberiup,
                                'NoCNC'                 => $nocncsumberiup,
                                'TglIUPOP'              => $tglsumberiup1,
                                'JangkaWaktuIUPOP'      => $jangkawaktusumberiup1,
                                'TglCNC'                => $tglsumberiup2,
                                'JangkaWaktuCNC'        => $jangkawaktusumberiup2,
                              );
                    $i = DB::table('sumbertambang2')->where('UserId','=',$userid)
                                    ->where('AsalTambang','=',$namasumberawaliup)
                                    ->update($data);

                    $datatb = array(
                                    'AsalTambang'           => $asaltambangsumberiup,
                                    );
                    $tb = DB::table('dataeksplorasi')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datajetty')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('dataproduksitambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datastockpile')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datatambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $datatb = array(
                                    'AsalTambang'           => $asaltambangsumberiup,
                                    );
                    $tb = DB::table('datakoordinattambang')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datajettydetail')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('datapopulasialat')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);
                    $tb = DB::table('dataspesifikasibatubara')->where('UserId','=',$userid)->where('AsalTambang','=',$namasumberawaliup)
                                                ->where('JenisIjin','=','IUPOPK2')->update($datatb);

                    $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                             ->where('UserId',$userid)->first();

                    if($hslver->StatusHasilVerifikasi == 'Y'){
                        $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                        if($nliver->Status == 2){
                            $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                            $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                        }
                    }
                }

                if(is_null($i)){   
                    //alert()->error('GAGAL', 'Simpan Asal Tambang');
                    return back();         
                }else{
                    //alert()->success('BERHASIL', 'Simpan Asal Tambang'); 
                    $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan Asal Tambang',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                    return back();
                }
        }
    }

    public function paktaintegritas(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $result = DB::table('paktaintegritas')
                        ->leftjoin('vendor','paktaintegritas.UserId','=','vendor.UserId')
                        ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                        ->where('paktaintegritas.UserId',$userid)->first();
            if(is_null($result)){
                $result = (object) array('StatusPakta' => null, 'PersetujuanVerifikasi' => null, 'Status' => null);
                return view('vendors.pendaftaran.paktaintegritas')->with('data',$result);
            }else{
                return view('vendors.pendaftaran.paktaintegritas')->with('data',$result);
            }
        }
    }

    public function savepaktaintegritas(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['setuju']))
                $status = 'N';
            else
                $status = $_POST['setuju'];

            $hitung = DB::table('paktaintegritas')->where('UserId', $userid)->count();
            if($hitung < 1){
                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }
                
                $data = array( 
                                'UserId'         => $userid,
                                'StatusPakta'    => $status,
                                );

                $d = DB::table('paktaintegritas')->insert($data);

                return redirect('dataadministrasiperusahaan');

            }else{
                $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                         ->where('UserId',$userid)->first();

                if($hslver->StatusHasilVerifikasi == 'Y'){
                    $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                    if($nliver->Status == 2){
                        $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                        $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                    }
                }

                $data = array( 
                                'StatusPakta'    => $status,
                                  );

                $d = DB::table('paktaintegritas')->where('UserId', $userid)->update($data);

                return redirect('dataadministrasiperusahaan');
            }
        } 
    }

    public function hasilverifikasi(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $hitung = DB::table('hasilverifikasi')                      
                      ->join('vendor', 'vendor.UserId', '=', 'hasilverifikasi.UserId')
                                                  ->where('hasilverifikasi.UserId', $userid)
                                                  ->where('hasilverifikasi.HasilVerifikasiLegal', '<>', '')
                                                  ->where('hasilverifikasi.HasilVerifikasiFinance', '<>', '')
                                                  ->where('hasilverifikasi.HasilVerifikasiTechnical', '<>', '')
                                                  ->where('vendor.PersetujuanVerifikasi', '<>', 'N') 
                                                  ->where('hasilverifikasi.Status', '<>', 0) 
                                                  ->count();

            if($hitung > 0){
                $result = DB::table('hasilverifikasi')
                ->join('dataadministrasiperusahaan', 'hasilverifikasi.UserId', '=', 'dataadministrasiperusahaan.UserId')
                ->join('nilaiverifikasi', 'hasilverifikasi.Status', '=', 'nilaiverifikasi.Id')
                ->select('dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat',
                    'dataadministrasiperusahaan.BadanUsaha' , 'nilaiverifikasi.Deskripsi', 'hasilverifikasi.KeteranganLegal',
                    'hasilverifikasi.KeteranganFinance', 'hasilverifikasi.KeteranganTechnical')
                ->where('hasilverifikasi.UserId', '=', $userid)                 
                ->first();
                
                return view('vendors.hasilproses.verifikasi')->with('data', $result);
            } else {
                return view('blankpage.hasilverifikasi');
            }        
        }
    }

    public function hasilduediligence(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $userid = \Session::get('vendorid');

            $hitung = DB::table('hasilduediligence')->where('UserId', $userid)->count();

            if($hitung > 0)
            {
                $result = DB::table('hasilduediligence')
                ->join('dataadministrasiperusahaan', 'hasilduediligence.UserId', '=', 'dataadministrasiperusahaan.UserId')
                ->join('nilaiduediligence', 'hasilduediligence.hasilduediligence', '=', 'nilaiduediligence.Id')
                ->select('dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha', 'nilaiduediligence.Deskripsi', 
                         'hasilduediligence.Keterangan')
                ->where('hasilduediligence.UserId', '=', $userid)
                ->first();
                
                return view('vendors.hasilproses.duediligence')->with('data', $result);
            }else{
                return view('blankpage.hasilduediligence');
            }
        }
    }

    public function hasilnegosiasi(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $userid = \Session::get('vendorid');

            $hitung = DB::table('hasilnegosiasi')->where('UserId', $userid)->count();

            if($hitung > 0)
            {
                $result = DB::table('hasilnegosiasi')
                ->leftjoin('dataadministrasiperusahaan', 'hasilnegosiasi.UserId', '=', 'dataadministrasiperusahaan.UserId')
                ->leftjoin('evaluasipenawaran', 'hasilnegosiasi.UserId', '=', 'evaluasipenawaran.UserId')
                ->select('dataadministrasiperusahaan.Nama', 'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha', 
                         'evaluasipenawaran.TotalMoisture as eptm', 'evaluasipenawaran.TotalSulphur as epts',
                         'evaluasipenawaran.GrossCaloricValue as epgcv','evaluasipenawaran.HGI as ephgi',
                         'evaluasipenawaran.UkuranButiran as epub','evaluasipenawaran.HargaBatubara as ephb',
                         'evaluasipenawaran.BiayaAngkutan as epba','evaluasipenawaran.HargaStockpile as ephs',
                         'hasilnegosiasi.TotalMoisture as hntm', 'hasilnegosiasi.TotalSulphur as hnts',
                         'hasilnegosiasi.GrossCaloricValue as hngcv','hasilnegosiasi.HGI as hnhgi',
                         'hasilnegosiasi.UkuranButiran as hnub','hasilnegosiasi.HargaBatubara as hnhb',
                         'hasilnegosiasi.BiayaAngkutan as hnba','hasilnegosiasi.HargaStockpile as hnhs')
                ->where('hasilnegosiasi.UserId', '=', $userid)
                ->first();
                
                return view('vendors.hasilproses.negosiasi')->with('data', $result);
            }else{
                return view('blankpage.hasilnegosiasi');
            }
        }
    }

    public function hasilcda(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('vendor')
                    ->where('UserId', $userid)
                    ->where('StatusHasilCDA','=','Y')
                    ->where('StatusHasilKontrak','<>','Y')
                    ->count();

        if($hitung > 0)
            return view('vendors.hasilproses.cda');
        else
            return view('blankpage.hasilcda');
        }
    }

    public function undangancda(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $hitung = DB::table('vendor')
                        ->where('UserId', $userid)
                        ->where('StatusUndanganCDA','=','Y')
                        ->count();
                        
            if($hitung > 0){
                $result = DB::table('undangancda')
                                    ->join('dataadministrasiperusahaan', 'undangancda.UserId', '=', 
                                        'dataadministrasiperusahaan.UserId')
                                    ->select('undangancda.Hari','undangancda.Tanggal',
                                        'undangancda.Pukul','undangancda.Tempat','undangancda.Acara',
                                        'undangancda.ContactPerson','dataadministrasiperusahaan.Nama',
                                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                                    ->where('undangancda.UserId', $userid)->first();
                return view('vendors.undangan.cda')->with('data',$result);
            }else{
                return view('blankpage.undangancda');
            }
        }
    }

    public function undanganduediligence(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $hitung = DB::table('vendor')
                        ->where('UserId', $userid)
                        ->where('StatusUndanganDueDiligence','=','Y')
                        ->count();

            if($hitung > 0){
                $result = DB::table('undanganduediligence')
                                    ->join('dataadministrasiperusahaan', 'undanganduediligence.UserId', '=', 
                                        'dataadministrasiperusahaan.UserId')
                                    ->select('undanganduediligence.Hari','undanganduediligence.Tanggal',
                                        'undanganduediligence.Pukul','undanganduediligence.Tempat',
                                        'undanganduediligence.ContactPerson','dataadministrasiperusahaan.Nama',
                                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                                    ->where('undanganduediligence.UserId', $userid)->first();
                return view('vendors.undangan.duediligence')->with('data',$result);
            }else{
                return view('blankpage.undanganduediligence');
            }
        }
    }

    public function undangankontrak(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $hitung = DB::table('vendor')
                        ->where('UserId', $userid)
                        ->where('StatusUndanganKontrak','=','Y')
                        ->count();

            if($hitung > 0){
                $result = DB::table('dataadministrasiperusahaan')
                                    ->select('dataadministrasiperusahaan.Nama',
                                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                                    ->where('dataadministrasiperusahaan.UserId', $userid)->first();
                return view('vendors.undangan.kontrak')->with('data',$result);
            }
            else
                return view('blankpage.undangankontrak');
        }
    }

    public function undangannegosiasi(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $hitung = DB::table('vendor')
                        ->where('UserId', $userid)
                        ->where('StatusUndanganNegosiasi','=','Y')
                        ->count();

            if($hitung > 0){
                $result = DB::table('undangannegosiasi')
                                    ->join('dataadministrasiperusahaan', 'undangannegosiasi.UserId', '=', 
                                        'dataadministrasiperusahaan.UserId')
                                    ->select('undangannegosiasi.Hari','undangannegosiasi.Tanggal',
                                        'undangannegosiasi.Pukul','undangannegosiasi.Tempat','undangannegosiasi.Acara',
                                        'undangannegosiasi.ContactPerson','dataadministrasiperusahaan.Nama',
                                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                                    ->where('undangannegosiasi.UserId', $userid)->first();
                return view('vendors.undangan.negosiasi')->with('data',$result);
            }else{
                return view('blankpage.undangannegosiasi');
            }      
        }
     }

     public function undanganpenawaran(){
        $userid = \Session::get('vendorid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            $hitung = DB::table('vendor')
                        ->where('UserId', $userid)
                        ->where('StatusUndanganPenawaran','=','Y')
                        ->count();

            if($hitung > 0){
                $result = DB::table('undanganpenawaran')
                                    ->join('dataadministrasiperusahaan', 'undanganpenawaran.UserId', '=', 
                                        'dataadministrasiperusahaan.UserId')
                                    ->select('undanganpenawaran.PenawaranHarga','undanganpenawaran.HardCopy',
                                        'undanganpenawaran.ContactPerson','dataadministrasiperusahaan.Nama',
                                        'dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                                    ->where('undanganpenawaran.UserId', $userid)->first();
                return view('vendors.undangan.penawaran')->with('data',$result);
            }else{
                return view('blankpage.undanganpenawaran');
            }
        }
     }

     public function ddlnomoriupop($tipe){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $string ="";
            if($tipe == '2'){
                $result = DB::table('sumbertambang')
                            ->orderBy('NoIUPOP', 'asc')
                            ->where('UserId',$userid)
                            ->get();
                $rsawal = "";
                foreach ($result as $rs) {
                            $string .= "<option value='$rs->NoIUPOP/$rs->Tgl/$rs->JangkaWaktu'>".$rs->NoIUPOP."</option>";
                        }
            }else if($tipe == '4'){
                $result = DB::table('sumbertambang2')
                            ->orderBy('NoIUPOP', 'asc')
                            ->where('UserId',$userid)
                            ->get();
                $rsawal = "";
                foreach ($result as $rs) {
                            $string .= "<option value='$rs->NoIUPOP/$rs->Tgl/$rs->JangkaWaktu'>".$rs->NoIUPOP."</option>";
                        }
            }
            return $string;
        }
    }

    public function teknistambang($sumber){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            \Session::put('sumbertambang',$sumber);
            return redirect('datatambang');
        }
    }

    public function KotaDDL($id1, $id2){
        $string ="";
        $result = DB::table('kabupatenkota')
                        ->orderBy('KabupatenKotaName', 'asc')
                        ->where('ProvinsiId','=',$id1)
                        ->get();
            foreach ($result as $rs) {
                if($id2 == $rs->KabupatenKotaId)
                {
                  $string .= "<option value='$rs->KabupatenKotaId' selected>".$rs->KabupatenKotaName."</option>";
                }else{
                  $string .= "<option value='$rs->KabupatenKotaId'>".$rs->KabupatenKotaName."</option>";
                }
            }
        return $string;
    }

    public function KecamatanDDL($id1, $id2){
        $string ="";
        $result = DB::table('kecamatan')
                        ->orderBy('kecamatanName', 'asc')
                        ->where('KabupatenKotaId','=',$id1)
                        ->get();
            foreach ($result as $rs) {
                if($id2 == $rs->KecamatanId)
                {
                  $string .= "<option value='$rs->KecamatanId' selected>".$rs->kecamatanName."</option>";
                }else{
                  $string .= "<option value='$rs->KecamatanId'>".$rs->kecamatanName."</option>";
                }
            }
        return $string;
    }

    public function KelurahanDDL($id1, $id2){
        $string ="";
        $result = DB::table('kelurahan')
                        ->orderBy('KelurahanName', 'asc')
                        ->where('KecamatanId','=',$id1)
                        ->get();
            foreach ($result as $rs) {
                if($id2 == $rs->KelurahanId)
                {
                  $string .= "<option value='$rs->KelurahanId' selected>".$rs->KelurahanName."</option>";
                }else{
                  $string .= "<option value='$rs->KelurahanId'>".$rs->KelurahanName."</option>";
                }
            }
        return $string;
    }

    public function datatambang(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $resultProvinsi = DB::table('provinsi')->get();
            $resultKoor = DB::table('datakoordinattambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                                        ->where('JenisIjin',$itm)->get();

            $result1 = DB::table('datatambang')
                            ->join('vendor','datatambang.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('datatambang.UserId', $userid)
                            ->where('datatambang.AsalTambang',$sumbertambang)
                            ->where('datatambang.JenisIjin',$itm)->first();

            if($itm == 'IUPOPK'){
                $result2 = DB::table('sumbertambang')->where('UserId', $userid)
                                            ->where('AsalTambang',$sumbertambang)->first();
            }else if($itm == 'IUPOPK2'){
                $result2 = DB::table('sumbertambang2')->where('UserId', $userid)
                                            ->where('AsalTambang',$sumbertambang)->first();
            }else if($itm == 'IUPOP'){
                $result2 = DB::table('sumbertambang2')->where('UserId', $userid)
                                            ->where('AsalTambang',$sumbertambang)->first();
            }

            return view('vendors.pendaftaran.datatambang')->with('data', $result)->with('data1', $result1)->with('data2', $result2)
                                                ->with('dataProvinsi', $resultProvinsi)->with('dataKoor', $resultKoor);
        }
    }

    public function savedatatambang(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NamaKonsensi']))
                $NamaKonsensi = '';
            else
                $NamaKonsensi = $_POST['NamaKonsensi'];

            if(!isset($_POST['StatusKerjasama']))
                $StatusKerjasama = '';
            else
                $StatusKerjasama = $_POST['StatusKerjasama'];

            if(!isset($_POST['LuasKonsensi']))
                $LuasKonsensi = '';
            else
                $LuasKonsensi = $_POST['LuasKonsensi'];

            if(!isset($_POST['LuasOpenArea']))
                $LuasOpenArea = '';
            else
                $LuasOpenArea = $_POST['LuasOpenArea'];

            if(!isset($_POST['SR']))
                $SR = '';
            else
                $SR = $_POST['SR'];

            if(!isset($_POST['JumlahPIT']))
                $JumlahPIT = '';
            else
                $JumlahPIT = $_POST['JumlahPIT'];

            if(!isset($_POST['LuasPIT']))
                $LuasPIT = '';
            else
                $LuasPIT = $_POST['LuasPIT'];

            if(!isset($_POST['BESR']))
                $BESR = '';
            else
                $BESR = $_POST['BESR'];

            if(!isset($_POST['JumlahSEAM']))
                $JumlahSEAM = '';
            else
                $JumlahSEAM = $_POST['JumlahSEAM'];

            if(!isset($_POST['KemiringanSEAM']))
                $KemiringanSEAM = '';
            else
                $KemiringanSEAM = $_POST['KemiringanSEAM'];

            if(!isset($_POST['KetebalanSEAM']))
                $KetebalanSEAM = '';
            else
                $KetebalanSEAM = $_POST['KetebalanSEAM'];

            if(!isset($_POST['KawasanHutan']))
                $KawasanHutan = '';
            else
                $KawasanHutan = $_POST['KawasanHutan'];

            if(!isset($_POST['Provinsi']))
                $Provinsi = '';
            else
                $Provinsi = $_POST['Provinsi'];

            if(!isset($_POST['Kota']))
                $Kota = '';
            else
                $Kota = $_POST['Kota'];

            if(!isset($_POST['Kecamatan']))
                $Kecamatan = '';
            else
                $Kecamatan = $_POST['Kecamatan'];

            if(!isset($_POST['Kelurahan']))
                $Kelurahan = '';
            else
                $Kelurahan = $_POST['Kelurahan'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            if(!isset($_POST['JenisKawasan']))
                $JenisKawasan = '';
            else
                $JenisKawasan = $_POST['JenisKawasan'];

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'NamaKonsensi'                => $NamaKonsensi,
                        'StatusKerjasama'             => $StatusKerjasama,
                        'LuasKonsensi'                => $LuasKonsensi,
                        'LuasOpenArea'                => $LuasOpenArea,
                        'SR'                          => $SR,
                        'JumlahPIT'                   => $JumlahPIT,
                        'LuasPIT'                     => $LuasPIT,
                        'BESR'                        => $BESR,
                        'JumlahSEAM'                  => $JumlahSEAM,
                        'KemiringanSEAM'              => $KemiringanSEAM,
                        'KetebalanSEAM'               => $KetebalanSEAM,
                        'KawasanHutan'                => $KawasanHutan,
                        'Provinsi'                    => $Provinsi,
                        'Kota'                        => $Kota,
                        'Kecamatan'                   => $Kecamatan,
                        'Kelurahan'                   => $Kelurahan,
                        'Catatan'                     => $Catatan,
                        'JenisKawasan'                => $JenisKawasan,
                      );
            $i = DB::table('datatambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                        ->where('JenisIjin',$itm)->update($data);

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('datakapasitasproduksi');
            }
        }
    }

    public function datakapasitasproduksi(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('dataproduksitambang')
                            ->join('vendor','dataproduksitambang.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('dataproduksitambang.UserId', $userid)
                            ->where('dataproduksitambang.AsalTambang',$sumbertambang)
                            ->where('dataproduksitambang.JenisIjin',$itm)->first();

            $result2 = DB::table('datapopulasialat')
                            ->where('UserId', $userid)
                            ->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->get();

            $result3 = DB::table('realisasibulan')
                            ->where('UserId', $userid)
                            ->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->get();

            return view('vendors.pendaftaran.datakapasitasproduksi')->with('data', $result)->with('data1', $result1)
                                            ->with('data2', $result2)->with('data3', $result3);
        }
    }

    public function savedatakapasitasproduksi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasProduksi']))
                $KapasitasProduksi = '';
            else
                $KapasitasProduksi = $_POST['KapasitasProduksi'];

            if(!isset($_POST['TargetTahun']))
                $TargetTahun = '';
            else
                $TargetTahun = $_POST['TargetTahun'];

            if(!isset($_POST['TargetProduksi']))
                $TargetProduksi = '';
            else
                $TargetProduksi = $_POST['TargetProduksi'];

            if(!isset($_POST['RealisasiProduksi']))
                $RealisasiProduksi = '';
            else
                $RealisasiProduksi = $_POST['RealisasiProduksi'];

            if(!isset($_POST['RealisasiTargetProduksi']))
                $RealisasiTargetProduksi = '';
            else
                $RealisasiTargetProduksi = $_POST['RealisasiTargetProduksi'];

            if(!isset($_POST['RealisasiTargetTahun']))
                $RealisasiTargetTahun = '';
            else
                $RealisasiTargetTahun = $_POST['RealisasiTargetTahun'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasProduksi'               => $KapasitasProduksi,
                        'TargetTahun'                     => $TargetTahun,
                        'TargetProduksi'                  => $TargetProduksi,
                        'RealisasiProduksi'               => $RealisasiProduksi,
                        'Catatan'                         => $Catatan,
                        'RealisasiTargetTahun'            => $RealisasiTargetTahun,
                        'RealisasiTargetProduksi'         => $RealisasiTargetProduksi,
                      );
            $i = DB::table('dataproduksitambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('dataeksplorasi');
            }
        }
    }

    public function savejenisperalatan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasProduksi2']))
                $KapasitasProduksi = '';
            else
                $KapasitasProduksi = $_POST['KapasitasProduksi2'];

            if(!isset($_POST['TargetTahun2']))
                $TargetTahun = '';
            else
                $TargetTahun = $_POST['TargetTahun2'];

            if(!isset($_POST['TargetProduksi2']))
                $TargetProduksi = '';
            else
                $TargetProduksi = $_POST['TargetProduksi2'];

            if(!isset($_POST['RealisasiProduksi2']))
                $RealisasiProduksi = '';
            else
                $RealisasiProduksi = $_POST['RealisasiProduksi2'];

            if(!isset($_POST['RealisasiTargetTahun2']))
                $RealisasiTargetTahun = '';
            else
                $RealisasiTargetTahun = $_POST['RealisasiTargetTahun2'];

            if(!isset($_POST['RealisasiTargetProduksi2']))
                $RealisasiTargetProduksi = '';
            else
                $RealisasiTargetProduksi = $_POST['RealisasiTargetProduksi2'];

            if(!isset($_POST['Catatan_h']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan_h'];

            if(!isset($_POST['Jenis']))
                $Jenis = '';
            else
                $Jenis = $_POST['Jenis'];

            if(!isset($_POST['nopopulasi']))
                $nopopulasi = '';
            else
                $nopopulasi = $_POST['nopopulasi'];

            if(!isset($_POST['Tipe']))
                $Tipe = '';
            else
                $Tipe = $_POST['Tipe'];

            if(!isset($_POST['Merk']))
                $Merk = '';
            else
                $Merk = $_POST['Merk'];

            if(!isset($_POST['Jumlah']))
                $Jumlah = '';
            else
                $Jumlah = $_POST['Jumlah'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasProduksi'               => $KapasitasProduksi,
                        'TargetTahun'                     => $TargetTahun,
                        'TargetProduksi'                  => $TargetProduksi,
                        'RealisasiProduksi'               => $RealisasiProduksi,
                        'Catatan'                         => $Catatan,
                        'RealisasiTargetTahun'            => $RealisasiTargetTahun,
                        'RealisasiTargetProduksi'         => $RealisasiTargetProduksi,
                      );
            $i = DB::table('dataproduksitambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                    ->where('JenisIjin',$itm)->update($data);

            $hitung = DB::table('datapopulasialat')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                                ->where('JenisIjin',$itm)->where('No',$nopopulasi)->count();

            if($hitung > 0){
                $data = array(
                        'Jenis'                           => $Jenis,
                        'Tipe'                            => $Tipe,
                        'Merk'                            => $Merk,
                        'Jumlah'                          => $Jumlah,
                      );
                $i = DB::table('datapopulasialat')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('JenisIjin',$itm)->where('No',$nopopulasi)->update($data);
            }else{
                $data = array(
                        'UserId'                          => $userid,
                        'AsalTambang'                     => $sumbertambang,
                        'JenisIjin'                       => $itm,
                        'Jenis'                           => $Jenis,
                        'Tipe'                            => $Tipe,
                        'Merk'                            => $Merk,
                        'Jumlah'                          => $Jumlah,
                      );
                $i = DB::table('datapopulasialat')->insert($data);
            } 

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function deletejenisperalatan(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['nopopulasi2']))
                $nopopulasi2 = '';
            else
                $nopopulasi2 = $_POST['nopopulasi2'];

            if(!isset($_POST['asaltambang2']))
                $asaltambang2 = '';
            else
                $asaltambang2 = $_POST['asaltambang2'];

            if(!isset($_POST['userid2']))
                $userid2 = '';
            else
                $userid2 = $_POST['userid2'];

            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');
            $i = DB::table('datapopulasialat')->where('No',$nopopulasi2)->where('UserId',$userid2)
                                                ->where('AsalTambang',$asaltambang2)->where('JenisIjin',$itm)->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function saverealisasi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasProduksi3']))
                $KapasitasProduksi = '';
            else
                $KapasitasProduksi = $_POST['KapasitasProduksi3'];

            if(!isset($_POST['TargetTahun3']))
                $TargetTahun = '';
            else
                $TargetTahun = $_POST['TargetTahun3'];

            if(!isset($_POST['TargetProduksi3']))
                $TargetProduksi = '';
            else
                $TargetProduksi = $_POST['TargetProduksi3'];

            if(!isset($_POST['RealisasiProduksi3']))
                $RealisasiProduksi = '';
            else
                $RealisasiProduksi = $_POST['RealisasiProduksi3'];

            if(!isset($_POST['Catatan_h3']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan_h3'];

            if(!isset($_POST['TahunR']))
                $Tahun = '';
            else
                $Tahun = $_POST['TahunR'];

            if(!isset($_POST['norealisasi']))
                $norealisasi = '';
            else
                $norealisasi = $_POST['norealisasi'];

            if(!isset($_POST['BulanR']))
                $Bulan = '';
            else
                $Bulan = $_POST['BulanR'];

            if(!isset($_POST['JumlahR']))
                $Jumlah = '';
            else
                $Jumlah = $_POST['JumlahR'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasProduksi'               => $KapasitasProduksi,
                        'TargetTahun'                     => $TargetTahun,
                        'TargetProduksi'                  => $TargetProduksi,
                        'RealisasiProduksi'               => $RealisasiProduksi,
                        'Catatan'                         => $Catatan,
                      );
            $i = DB::table('dataproduksitambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                    ->where('JenisIjin',$itm)->update($data);

            $hitung = DB::table('realisasibulan')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                                ->where('JenisIjin',$itm)->where('Id',$norealisasi)->count();

            if($hitung > 0){
                $data = array(
                        'Tahun'                           => $Tahun,
                        'Bulan'                           => $Bulan,
                        'Jumlah'                          => $Jumlah,
                      );
                $i = DB::table('realisasibulan')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('JenisIjin',$itm)->where('Id',$norealisasi)->update($data);
            }else{
                $data = array(
                        'UserId'                          => $userid,
                        'AsalTambang'                     => $sumbertambang,
                        'JenisIjin'                       => $itm,
                        'Tahun'                           => $Tahun,
                        'Bulan'                           => $Bulan,
                        'Jumlah'                          => $Jumlah,
                      );
                $i = DB::table('realisasibulan')->insert($data);
            } 

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function deleterealisasi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['norealisasi2']))
                $norealisasi2 = '';
            else
                $norealisasi2 = $_POST['norealisasi2'];

            if(!isset($_POST['asaltambang3']))
                $asaltambang3 = '';
            else
                $asaltambang3 = $_POST['asaltambang3'];

            if(!isset($_POST['userid3']))
                $userid3 = '';
            else
                $userid3 = $_POST['userid3'];

            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');
            $i = DB::table('realisasibulan')->where('Id',$norealisasi2)->where('UserId',$userid3)
                                                ->where('AsalTambang',$asaltambang3)->where('JenisIjin',$itm)->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function dataeksplorasi(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('dataeksplorasi')
                            ->join('vendor','dataeksplorasi.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('dataeksplorasi.UserId', $userid)
                            ->where('dataeksplorasi.AsalTambang',$sumbertambang)
                            ->where('dataeksplorasi.JenisIjin',$itm)->first();

            $result2 = DB::table('dataspesifikasibatubara')
                            ->leftjoin('brandcalori','brandcalori.idCalori','=','dataspesifikasibatubara.idCalori')
                            ->where('UserId', $userid)
                            ->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->get();

            $result3 = DB::table('brandcalori')->get();
                            
            return view('vendors.pendaftaran.dataeksplorasi')->with('data', $result)->with('data1', $result1)
                                            ->with('data2', $result2)->with('data3', $result3);
        }
    }

    public function savedataeksplorasi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['SumberDaya']))
                $SumberDaya = '';
            else
                $SumberDaya = $_POST['SumberDaya'];

            if(!isset($_POST['Cadangan']))
                $Cadangan = '';
            else
                $Cadangan = $_POST['Cadangan'];

            if(!isset($_POST['PengeboranEksplorasi']))
                $PengeboranEksplorasi = '';
            else
                $PengeboranEksplorasi = $_POST['PengeboranEksplorasi'];

            if(!isset($_POST['JumlahTitikBor']))
                $JumlahTitikBor = '';
            else
                $JumlahTitikBor = $_POST['JumlahTitikBor'];

            if(!isset($_POST['TotalKedalaman']))
                $TotalKedalaman = '';
            else
                $TotalKedalaman = $_POST['TotalKedalaman'];

            if(!isset($_POST['PengeboranGeoteknik']))
                $PengeboranGeoteknik = '';
            else
                $PengeboranGeoteknik = $_POST['PengeboranGeoteknik'];

            if(!isset($_POST['StrukturGeoteknik']))
                $StrukturGeoteknik = '';
            else
                $StrukturGeoteknik = $_POST['StrukturGeoteknik'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'SumberDaya'                        => $SumberDaya,
                        'Cadangan'                          => $Cadangan,
                        'PengeboranEksplorasi'              => $PengeboranEksplorasi,
                        'JumlahTitikBor'                    => $JumlahTitikBor,
                        'TotalKedalaman'                    => $TotalKedalaman,
                        'PengeboranGeoteknik'               => $PengeboranGeoteknik,
                        'StrukturGeoteknik'                 => $StrukturGeoteknik,
                        'Catatan'                           => $Catatan,
                      );
            $i = DB::table('dataeksplorasi')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                    ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('datastockpile');
            }
        }
    }

    public function savespesifikasi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['SumberDaya2']))
                $SumberDaya = '';
            else
                $SumberDaya = $_POST['SumberDaya2'];

            if(!isset($_POST['Cadangan2']))
                $Cadangan = '';
            else
                $Cadangan = $_POST['Cadangan2'];

            if(!isset($_POST['JumlahTitikBor2']))
                $JumlahTitikBor = '';
            else{
                $JumlahTitikBor = $_POST['JumlahTitikBor2'];
                if($JumlahTitikBor == '' || $JumlahTitikBor == '0')
                    $PengeboranEksplorasi = '0';
                else
                    $PengeboranEksplorasi = '1';
            }

            if(!isset($_POST['TotalKedalaman2']))
                $TotalKedalaman = '';
            else
                $TotalKedalaman = $_POST['TotalKedalaman2'];

            if(!isset($_POST['StrukturGeoteknik2']))
                $StrukturGeoteknik = '';
            else{
                $StrukturGeoteknik = $_POST['StrukturGeoteknik2'];
                if($StrukturGeoteknik == '')
                    $PengeboranGeoteknik = '0';
                else
                    $PengeboranGeoteknik = '1';
            }

            if(!isset($_POST['JORC2']))
                $JORC = '';
            else
                $JORC = $_POST['JORC2'];

            if(!isset($_POST['Catatan_h']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan_h'];

            if(!isset($_POST['idspesifikasi']))
                $idspesifikasi = '';
            else
                $idspesifikasi = $_POST['idspesifikasi'];

            if(!isset($_POST['idCalori']))
                $idCalori = '';
            else
                $idCalori = $_POST['idCalori'];

            if(!isset($_POST['TM']))
                $TM = '';
            else
                $TM = $_POST['TM'];

            if(!isset($_POST['IM']))
                $IM = '';
            else
                $IM = $_POST['IM'];

            if(!isset($_POST['ASH']))
                $ASH = '';
            else
                $ASH = $_POST['ASH'];

            if(!isset($_POST['VM']))
                $VM = '';
            else
                $VM = $_POST['VM'];

            if(!isset($_POST['FC']))
                $FC = '';
            else
                $FC = $_POST['FC'];

            if(!isset($_POST['TS']))
                $TS = '';
            else
                $TS = $_POST['TS'];

            if(!isset($_POST['CV']))
                $CV = '';
            else
                $CV = $_POST['CV'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'SumberDaya'                        => $SumberDaya,
                        'Cadangan'                          => $Cadangan,
                        'PengeboranEksplorasi'              => $PengeboranEksplorasi,
                        'JumlahTitikBor'                    => $JumlahTitikBor,
                        'TotalKedalaman'                    => $TotalKedalaman,
                        'PengeboranGeoteknik'               => $PengeboranGeoteknik,
                        'StrukturGeoteknik'                 => $StrukturGeoteknik,
                        'JORC'                              => $JORC,
                        'Catatan'                           => $Catatan,
                      );
            $i = DB::table('dataeksplorasi')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                    ->where('JenisIjin',$itm)->update($data);

            $hitung = DB::table('dataspesifikasibatubara')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                                ->where('Id',$idspesifikasi)->where('JenisIjin',$itm)->count();

            if($hitung > 0){
                $data = array(
                        'idCalori'                    => $idCalori,
                        'TM'                          => $TM,
                        'IM'                          => $IM,
                        'ASH'                         => $ASH,
                        'VM'                          => $VM,
                        'FC'                          => $FC,
                        'TS'                          => $TS,
                        'CV'                          => $CV,
                      );
                $i = DB::table('dataspesifikasibatubara')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('Id',$idspesifikasi)->where('JenisIjin',$itm)->update($data);
            }else{
                $data = array(
                        'UserId'                          => $userid,
                        'AsalTambang'                     => $sumbertambang,
                        'JenisIjin'                   => $itm,  
                        'idCalori'                    => $idCalori,
                        'TM'                          => $TM,
                        'IM'                          => $IM,
                        'ASH'                         => $ASH,
                        'VM'                          => $VM,
                        'FC'                          => $FC,
                        'TS'                          => $TS,
                        'CV'                          => $CV,
                      );
                $i = DB::table('dataspesifikasibatubara')->insert($data);
            } 

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function deletespesifikasi(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['idspesifikasi2']))
                $idspesifikasi2 = '';
            else
                $idspesifikasi2 = $_POST['idspesifikasi2'];

            if(!isset($_POST['asaltambang2']))
                $asaltambang2 = '';
            else
                $asaltambang2 = $_POST['asaltambang2'];

            if(!isset($_POST['userid2']))
                $userid2 = '';
            else
                $userid2 = $_POST['userid2'];

            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');
            $i = DB::table('dataspesifikasibatubara')->where('Id',$idspesifikasi2)->where('UserId',$userid2)
                                                ->where('AsalTambang',$asaltambang2)->where('JenisIjin',$itm)->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function datastockpile(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('datastockpile')
                            ->join('vendor','datastockpile.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('datastockpile.UserId', $userid)
                            ->where('datastockpile.AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->first();

            return view('vendors.pendaftaran.datastockpile')->with('data', $result)->with('data1', $result1);
        }
    }

    public function savedatastockpile(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['Nama']))
                $Nama = '';
            else
                $Nama = $_POST['Nama'];

            if(!isset($_POST['KepemilikanStockpile']))
                $KepemilikanStockpile = '';
            else
                $KepemilikanStockpile = $_POST['KepemilikanStockpile'];

            if(!isset($_POST['LuasStockpile']))
                $LuasStockpile = '';
            else
                $LuasStockpile = $_POST['LuasStockpile'];

            if(!isset($_POST['KapasitasStockpile']))
                $KapasitasStockpile = '';
            else
                $KapasitasStockpile = $_POST['KapasitasStockpile'];

            if(!isset($_POST['JarakTambang']))
                $JarakTambang = '';
            else
                $JarakTambang = $_POST['JarakTambang'];

            if(!isset($_POST['JumlahCruiser']))
                $JumlahCruiser = '';
            else
                $JumlahCruiser = $_POST['JumlahCruiser'];

            if(!isset($_POST['KapasitasCruiser']))
                $KapasitasCruiser = '';
            else
                $KapasitasCruiser = $_POST['KapasitasCruiser'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'Nama'                          => $Nama,
                        'KepemilikanStockpile'          => $KepemilikanStockpile,
                        'LuasStockpile'                 => $LuasStockpile,
                        'KapasitasStockpile'            => $KapasitasStockpile,
                        'JarakTambang'                  => $JarakTambang,
                        'JumlahCruiser'                 => $JumlahCruiser,
                        'KapasitasCruiser'              => $KapasitasCruiser,
                        'Catatan'                       => $Catatan,
                      );
            $i = DB::table('datastockpile')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('datajetty');
            }
        }
    }

    public function datajetty(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('datajetty')
                            ->join('vendor','datajetty.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->leftjoin('paktaintegritas','vendor.UserId','=','paktaintegritas.UserId')
                            ->where('datajetty.UserId', $userid)
                            ->where('datajetty.AsalTambang',$sumbertambang)
                            ->where('datajetty.JenisIjin',$itm)->first();

            $result2 = DB::table('datajettydetail')
                            ->where('UserId', $userid)
                            ->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->get();

            $resultProvinsi = DB::table('provinsi')->get();

            return view('vendors.pendaftaran.datajetty')->with('data', $result)->with('data1', $result1)->with('data2', $result2)
                                                    ->with('dataProvinsi', $resultProvinsi);
        }
    }

    public function savedatajety(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasCruiser']))
                $KapasitasCruiser = '';
            else
                $KapasitasCruiser = $_POST['KapasitasCruiser'];

            if(!isset($_POST['KapasitasMuat']))
                $KapasitasMuat = '';
            else
                $KapasitasMuat = $_POST['KapasitasMuat'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasCruiser'                 => $KapasitasCruiser,
                        'KapasitasMuat'                    => $KapasitasMuat,
                        'Catatan'                          => $Catatan,
                      );
            $i = DB::table('datajetty')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('datateknistambang');
            }
        }
    }

    public function savedetailjetty(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasCruiser2']))
                $KapasitasCruiser = '';
            else
                $KapasitasCruiser = $_POST['KapasitasCruiser2'];

            if(!isset($_POST['KapasitasMuat2']))
                $KapasitasMuat = '';
            else
                $KapasitasMuat = $_POST['KapasitasMuat2'];

            if(!isset($_POST['Nama']))
                $Nama = '';
            else
                $Nama = $_POST['Nama'];

            if(!isset($_POST['Kepemilikan']))
                $Kepemilikan = '';
            else
                $Kepemilikan = $_POST['Kepemilikan'];

            if(!isset($_POST['SystemMuat']))
                $SystemMuat = '';
            else
                $SystemMuat = $_POST['SystemMuat'];

            if(!isset($_POST['Kapasitas']))
                $Kapasitas = '';
            else
                $Kapasitas = $_POST['Kapasitas'];

            if(!isset($_POST['KapasitasManual']))
                $KapasitasManual = '';
            else
                $KapasitasManual = $_POST['KapasitasManual'];

            if(!isset($_POST['KapasitasConveyor']))
                $KapasitasConveyor = '';
            else
                $KapasitasConveyor = $_POST['KapasitasConveyor'];

            if(!isset($_POST['JumlahSandaran']))
                $JumlahSandaran = '';
            else
                $JumlahSandaran = $_POST['JumlahSandaran'];

            if(!isset($_POST['Luas']))
                $Luas = '';
            else
                $Luas = $_POST['Luas'];

            if(!isset($_POST['Kedalaman']))
                $Kedalaman = '';
            else
                $Kedalaman = $_POST['Kedalaman'];

            if(!isset($_POST['Jarak']))
                $Jarak = '';
            else
                $Jarak = $_POST['Jarak'];

            if(!isset($_POST['idjetty']))
                $idjetty = '';
            else
                $idjetty = $_POST['idjetty'];

            if(!isset($_POST['Provinsi']))
                $Provinsi = '';
            else
                $Provinsi = $_POST['Provinsi'];

            if(!isset($_POST['Kota']))
                $Kota = '';
            else
                $Kota = $_POST['Kota'];

            if(!isset($_POST['Kecamatan']))
                $Kecamatan = '';
            else
                $Kecamatan = $_POST['Kecamatan'];

            if(!isset($_POST['Kelurahan']))
                $Kelurahan = '';
            else
                $Kelurahan = $_POST['Kelurahan'];

            if(!isset($_POST['Catatan_h']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan_h'];

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasCruiser'                 => $KapasitasCruiser,
                        'KapasitasMuat'                    => $KapasitasMuat,
                        'Catatan'                          => $Catatan,
                      );
            $i = DB::table('datajetty')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                ->update($data);

            $hitung = DB::table('datajettydetail')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                                ->where('JenisIjin',$itm)->where('Id',$idjetty)->count();

            if($hitung > 0){
                $data = array(
                        'Nama'                          => $Nama,
                        'Kepemilikan'                   => $Kepemilikan,
                        'SystemMuat'                    => $SystemMuat,
                        'Kapasitas'                     => $Kapasitas,
                        'KapasitasManual'               => $KapasitasManual,
                        'KapasitasConveyor'             => $KapasitasConveyor,
                        'JumlahSandaran'                => $JumlahSandaran,
                        'Luas'                          => $Luas,
                        'Kedalaman'                     => $Kedalaman,
                        'Jarak'                         => $Jarak,
                        'Provinsi'                      => $Provinsi,
                        'Kota'                          => $Kota,
                        'Kecamatan'                     => $Kecamatan,
                        'Kelurahan'                     => $Kelurahan,
                      );
                $i = DB::table('datajettydetail')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('Id',$idjetty)->where('JenisIjin',$itm)->update($data);
            }else{
                $data = array(
                        'UserId'                      => $userid,
                        'AsalTambang'                 => $sumbertambang,
                        'JenisIjin'                   => $itm,
                        'Nama'                          => $Nama,
                        'Kepemilikan'                   => $Kepemilikan,
                        'SystemMuat'                    => $SystemMuat,
                        'Kapasitas'                     => $Kapasitas,
                        'KapasitasManual'               => $KapasitasManual,
                        'KapasitasConveyor'             => $KapasitasConveyor,
                        'JumlahSandaran'                => $JumlahSandaran,
                        'Luas'                          => $Luas,
                        'Kedalaman'                     => $Kedalaman,
                        'Jarak'                         => $Jarak,
                        'Provinsi'                      => $Provinsi,
                        'Kota'                          => $Kota,
                        'Kecamatan'                     => $Kecamatan,
                        'Kelurahan'                     => $Kelurahan,
                      );
                $i = DB::table('datajettydetail')->insert($data);
            } 

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function deletedetailjetty(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['idjetty2']))
                $idjetty2 = '';
            else
                $idjetty2 = $_POST['idjetty2'];

            if(!isset($_POST['asaltambang2']))
                $asaltambang2 = '';
            else
                $asaltambang2 = $_POST['asaltambang2'];

            if(!isset($_POST['userid2']))
                $userid2 = '';
            else
                $userid2 = $_POST['userid2'];

            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');
            $i = DB::table('datajettydetail')->where('Id',$idjetty2)->where('UserId',$userid2)
                                                ->where('AsalTambang',$asaltambang2)->where('JenisIjin',$itm)->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function deletekortambang(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['id2']))
                $id2 = '';
            else
                $id2 = $_POST['id2'];

            $i = DB::table('datakoordinattambang')->where('Id',$id2)->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function savekortambang(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['Id']))
                $Id = '';
            else
                $Id = $_POST['Id'];

            if(!isset($_POST['AsalTambang']))
                $AsalTambang = '';
            else
                $AsalTambang = $_POST['AsalTambang'];

            if(!isset($_POST['JenisIjin']))
                $JenisIjin = '';
            else
                $JenisIjin = $_POST['JenisIjin'];

            if(!isset($_POST['Nama']))
                $Nama = '';
            else
                $Nama = $_POST['Nama'];

            if(!isset($_POST['NamaKonsensi_h']))
                $NamaKonsensi = '';
            else
                $NamaKonsensi = $_POST['NamaKonsensi_h'];

            if(!isset($_POST['StatusKerjasama_h']))
                $StatusKerjasama = '';
            else
                $StatusKerjasama = $_POST['StatusKerjasama_h'];

            if(!isset($_POST['LuasKonsensi_h']))
                $LuasKonsensi = '';
            else
                $LuasKonsensi = $_POST['LuasKonsensi_h'];

            if(!isset($_POST['LuasOpenArea_h']))
                $LuasOpenArea = '';
            else
                $LuasOpenArea = $_POST['LuasOpenArea_h'];

            if(!isset($_POST['SR_h']))
                $SR = '';
            else
                $SR = $_POST['SR_h'];

            if(!isset($_POST['JumlahPIT_h']))
                $JumlahPIT = '';
            else
                $JumlahPIT = $_POST['JumlahPIT_h'];

            if(!isset($_POST['LuasPIT_h']))
                $LuasPIT = '';
            else
                $LuasPIT = $_POST['LuasPIT_h'];

            if(!isset($_POST['BESR_h']))
                $BESR = '';
            else
                $BESR = $_POST['BESR_h'];

            if(!isset($_POST['JumlahSEAM_h']))
                $JumlahSEAM = '';
            else
                $JumlahSEAM = $_POST['JumlahSEAM_h'];

            if(!isset($_POST['KemiringanSEAM_h']))
                $KemiringanSEAM = '';
            else
                $KemiringanSEAM = $_POST['KemiringanSEAM_h'];

            if(!isset($_POST['KetebalanSEAM_h']))
                $KetebalanSEAM = '';
            else
                $KetebalanSEAM = $_POST['KetebalanSEAM_h'];

            if(!isset($_POST['KawasanHutan_h']))
                $KawasanHutan = '';
            else
                $KawasanHutan = $_POST['KawasanHutan_h'];

            if(!isset($_POST['Provinsi_h']))
                $Provinsi = '';
            else
                $Provinsi = $_POST['Provinsi_h'];

            if(!isset($_POST['Kota_h']))
                $Kota = '';
            else
                $Kota = $_POST['Kota_h'];

            if(!isset($_POST['Kecamatan_h']))
                $Kecamatan = '';
            else
                $Kecamatan = $_POST['Kecamatan_h'];

            if(!isset($_POST['Kelurahan_h']))
                $Kelurahan = '';
            else
                $Kelurahan = $_POST['Kelurahan_h'];

            if(!isset($_POST['Catatan_h']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan_h'];

            if(!isset($_POST['JenisKawasan_h']))
                $JenisKawasan = '';
            else
                $JenisKawasan = $_POST['JenisKawasan_h'];

            if(!isset($_POST['Bujur']))
                $Bujur = '';
            else
                $Bujur = $_POST['Bujur'];

            if(!isset($_POST['BDerajat']))
                $BDerajat = '';
            else
                $BDerajat = $_POST['BDerajat'];

            if(!isset($_POST['BMenit']))
                $BMenit = '';
            else
                $BMenit = $_POST['BMenit'];

            if(!isset($_POST['BDetik']))
                $BDetik = '';
            else
                $BDetik = $_POST['BDetik'];

            if(!isset($_POST['Lintang']))
                $Lintang = '';
            else
                $Lintang = $_POST['Lintang'];

            if(!isset($_POST['LDerajat']))
                $LDerajat = '';
            else
                $LDerajat = $_POST['LDerajat'];

            if(!isset($_POST['LMenit']))
                $LMenit = '';
            else
                $LMenit = $_POST['LMenit'];

            if(!isset($_POST['LDetik']))
                $LDetik = '';
            else
                $LDetik = $_POST['LDetik'];

            $sumbertambang = \Session::get('sumbertambang');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'NamaKonsensi'                => $NamaKonsensi,
                        'StatusKerjasama'             => $StatusKerjasama,
                        'LuasKonsensi'                => $LuasKonsensi,
                        'LuasOpenArea'                => $LuasOpenArea,
                        'SR'                          => $SR,
                        'JumlahPIT'                   => $JumlahPIT,
                        'LuasPIT'                     => $LuasPIT,
                        'BESR'                        => $BESR,
                        'JumlahSEAM'                  => $JumlahSEAM,
                        'KemiringanSEAM'              => $KemiringanSEAM,
                        'KetebalanSEAM'               => $KetebalanSEAM,
                        'KawasanHutan'                => $KawasanHutan,
                        'Provinsi'                    => $Provinsi,
                        'Kota'                        => $Kota,
                        'Kecamatan'                   => $Kecamatan,
                        'Kelurahan'                   => $Kelurahan,
                        'Catatan'                     => $Catatan,
                        'JenisKawasan'                => $JenisKawasan,
                      );
            $i = DB::table('datatambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                        ->where('JenisIjin',$itm)->update($data);

            if($Id == ''){
                $data = array(
                        'UserId'                => $userid,
                        'AsalTambang'           => $sumbertambang,
                        'JenisIjin'             => $itm,
                        'Bujur'                 => $Bujur,
                        'Lintang'               => $Lintang,
                        'BDerajat'              => $BDerajat,
                        'BMenit'                => $BMenit,
                        'BDetik'                => $BDetik,
                        'LDerajat'              => $LDerajat,
                        'LMenit'                => $LMenit,
                        'LDetik'                => $LDetik,
                      );
                $i = DB::table('datakoordinattambang')->insert($data);
            }else{
                $data = array(
                        'AsalTambang'           => $sumbertambang,
                        'JenisIjin'             => $itm,
                        'Bujur'                 => $Bujur,
                        'Lintang'               => $Lintang,
                        'BDerajat'              => $BDerajat,
                        'BMenit'                => $BMenit,
                        'BDetik'                => $BDetik,
                        'LDerajat'              => $LDerajat,
                        'LMenit'                => $LMenit,
                        'LDetik'                => $LDetik,
                      );
                $i = DB::table('datakoordinattambang')->where('Id',$Id)->update($data);
            }            

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function koorjetty($id){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            \Session::put('idjet',$id);
            return redirect('koordinatjetty');
        }
    }

    public function koordinatjetty(){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'      => null,
                                            'Alamat'    => null,
                                            'BadanUsaha'=> null,
                                          );
            }else{
                $result = DB::table('dataadministrasiperusahaan')
                            ->select('Nama','Alamat','BadanUsaha')
                            ->where('UserId','=',$userid)
                            ->first();
            }

            $result1 = DB::table('vendor')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->where('vendor.UserId', $userid)->first();

            $idjet = \Session::get('idjet');
            $resultKoor = DB::table('datakoordinatjetty')->where('IdJetty',$idjet)->get();

            return view('vendors.pendaftaran.koordinatjetty')->with('data', $result)->with('data1', $result1)
                                ->with('dataKoor', $resultKoor);
        }
    }

    public function deletekoordinatjetty(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['id2']))
                $id2 = '';
            else
                $id2 = $_POST['id2'];

            $i = DB::table('datakoordinatjetty')->where('Id',$id2)->delete();

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function savekoordinatjetty(Request $request){
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['Id']))
                $Id = '';
            else
                $Id = $_POST['Id'];

            if(!isset($_POST['Bujur']))
                $Bujur = '';
            else
                $Bujur = $_POST['Bujur'];

            if(!isset($_POST['BDerajat']))
                $BDerajat = '';
            else
                $BDerajat = $_POST['BDerajat'];

            if(!isset($_POST['BMenit']))
                $BMenit = '';
            else
                $BMenit = $_POST['BMenit'];

            if(!isset($_POST['BDetik']))
                $BDetik = '';
            else
                $BDetik = $_POST['BDetik'];

            if(!isset($_POST['Lintang']))
                $Lintang = '';
            else
                $Lintang = $_POST['Lintang'];

            if(!isset($_POST['LDerajat']))
                $LDerajat = '';
            else
                $LDerajat = $_POST['LDerajat'];

            if(!isset($_POST['LMenit']))
                $LMenit = '';
            else
                $LMenit = $_POST['LMenit'];

            if(!isset($_POST['LDetik']))
                $LDetik = '';
            else
                $LDetik = $_POST['LDetik'];

            $idjet = \Session::get('idjet');

            if($Id == ''){
                $data = array(
                        'IdJetty'               => $idjet,
                        'Bujur'                 => $Bujur,
                        'Lintang'               => $Lintang,
                        'BDerajat'              => $BDerajat,
                        'BMenit'                => $BMenit,
                        'BDetik'                => $BDetik,
                        'LDerajat'              => $LDerajat,
                        'LMenit'                => $LMenit,
                        'LDetik'                => $LDetik,
                      );
                $i = DB::table('datakoordinatjetty')->insert($data);
            }else{
                $data = array(
                        'Bujur'                 => $Bujur,
                        'Lintang'               => $Lintang,
                        'BDerajat'              => $BDerajat,
                        'BMenit'                => $BMenit,
                        'BDetik'                => $BDetik,
                        'LDerajat'              => $LDerajat,
                        'LMenit'                => $LMenit,
                        'LDetik'                => $LDetik,
                      );
                $i = DB::table('datakoordinatjetty')->where('Id',$Id)->update($data);
            }            

            $hslver = DB::table('vendor')->select('StatusHasilVerifikasi')
                                 ->where('UserId',$userid)->first();

            if($hslver->StatusHasilVerifikasi == 'Y'){
                $nliver = DB::table('hasilverifikasi')->select('Status')->where('UserId',$userid)->first();
                if($nliver->Status == 2){
                    $data = array('StatusHasilVerifikasi' => 'N', 'StatusHasilVerifikasiLegal' => 'N', 'StatusHasilVerifikasiFinance' => 'N', 'StatusHasilVerifikasiTechnical' => 'N', );
                    $upd = DB::table('vendor')->where('UserId',$userid)->update($data);
                }
            }

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function panduanmanual(){
      $userid = \Session::get('vendorid');

      if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
      }else{
          $result = DB::table('dokumen_manual')->orderBy('NamaFile','ASC')->get();
          return view('vendors.pendaftaran.manual')->with('data',$result);
      }
    }

    public function CaloriDropDownData($id){
        $result = DB::table('detailcalori')
                        ->where('calori_id','=',$id)
                        ->get();
        return $result;
    }

}
