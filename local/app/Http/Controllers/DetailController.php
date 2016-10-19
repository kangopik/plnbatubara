<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{

    public function detailvendor($id){
        \Session::put('idvendor',$id);
        $level = \Session::get('lvlid');
        if($level == '3'){
            return Redirect('DetailAdministrasi');
        }else if($level == '6'){
            return Redirect('DetailKeuangan');
        }else if($level == '7'){
            return Redirect('DetailTeknis');
        }
    }

    public function detailadministrasi(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $userid = \Session::get('idvendor');

            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

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
                                         );
            } else {
                $result = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->first();
            }

            return view('detail.detailadministrasi')->with('data', $result);
        }   
    }

    public function detailarmada(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $result = DB::table('armadatransportasi')->where('UserId',$userid)->get();   

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

            $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();

            return view('detail.detailarmada')->with('data', $result)->with('data2',$result2)->with('datavendor',$resultvendor);
        }
    }

    public function detailkeuangan(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $hitung1 = DB::table('pajak')->where('UserId', $userid)->count();

            $hitung2 = DB::table('neraca')->where('UserId', $userid)->count();

            $resultSaham = DB::table('komisarisperusahaan')->where('UserId',$userid)->get();

            if($hitung1 < 1 ){
                $resultPajak = (object) array(
                                                'NomorNPWP'             => null,
                                                'NomorNPWPCk'           => null,
                                                'NoRekening'             => null,
                                                'NoRekeningCk'           => null,
                                                'NamaBank'             => null,
                                                'NamaBankCk'           => null,
                                                'NomorBuktiPelunasan'   => null,
                                                'NomorBuktiPelunasanCk' => null,
                                                'TglBuktiPelunasan'     => null,
                                                'TglBuktiPelunasanCk'   => null,
                                                'NomorLaporanBulanan'   => null,
                                                'NomorLaporanBulananCk' => null,
                                                'NomorLaporanBulanan2'   => null,
                                                'NomorLaporanBulanan2Ck' => null,
                                                'NomorLaporanBulanan2'   => null,
                                                'NomorLaporanBulanan2Ck' => null,
                                                'TglLaporanBulanan'     => null,
                                                'TglLaporanBulananCk'   => null,
                                                'TglLaporanBulanan2'     => null,
                                                'TglLaporanBulanan2Ck'   => null,
                                                'TglLaporanBulanan2'     => null,
                                                'TglLaporanBulanan2Ck'   => null,
                                              );
            } else {
                $resultPajak = DB::table('pajak')->where('UserId',$userid)->first();
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
                                               );
            } else {
                $resultNeraca = DB::table('neraca')->where('UserId',$userid)->first();
            }

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

            $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();

            return view('detail.detailkeuangan')->with('data1',$resultSaham)->with('data2',$resultPajak)->with('data3',$resultNeraca)
                                    ->with('data4',$result2)->with('datavendor',$resultvendor);
        }
    }

    public function detailkontrak(){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $result = DB::table('kontrakpengadaan')->where('UserId',$userid)->get();

        $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

        $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();
        
        return view('detail.detailkontrak')->with('data', $result)->with('data2',$result2)->with('datavendor',$resultvendor);
        }
    }

    public function detailpengalaman(){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $result = DB::table('pengalamanperusahaan')->where('UserId',$userid)->get();

        $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

        $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();

        return view('detail.detailpengalaman')->with('data', $result)->with('data2',$result2)->with('datavendor',$resultvendor);
        }
    }

    public function detailperijinan(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
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
                                            'NomorPengesahanKemenhumkamPerubahan'        => null,
                                            'NomorPengesahanKemenhumkamPerubahanCk'      => null,
                                            'TanggalPengesahanKemenhumkamPerubahan'      => null,
                                            'TanggalPengesahanKemenhumkamPerubahanCk'    => null,
                                            'NomorSertifikat'                   => null,
                                            'NomorSertifikatCk'                 => null,
                                            'TanggalSertifikat'                 => null,
                                            'TanggalSertifikatCk'               => null,
                                            'MasaBerlakuSertifikat'             => null,
                                            'MasaBerlakuSertifikatCk'           => null,
                                            'PenerbitSIUP'                      => null,
                                            'PenerbitSIUPCk'                       => null,
                                            'PenerbitTDP'                       => null,
                                            'PenerbitTDPCk'                     => null,    
                                            'PenerbitSKDP'                     => null,
                                            'PenerbitSKDPCk'                   => null,
                                            'NomorSIUP'                   => null,
                                            'NomorSIUPCk'                 => null,
                                            'NomorTDP'                   => null,
                                            'NomorTDPCk'                 => null,
                                            'NomorSKDP'                         => null,
                                            'NomorSKDPCk'   => null,
                                            'TanggalSIUP'   => null,
                                            'TanggalSIUPCk' => null,
                                            'TanggalTDP'    => null,
                                            'TanggalTDPCk'  => null,
                                            'TanggalSKDP'   => null,
                                            'TanggalSKDPCk' => null,
                                            'TanggalSdSIUP' => null,
                                            'TanggalSdSIUPCk'=> null,
                                            'TanggalSdTDP'  => null,
                                            'TanggalSdTDPCk'=> null,
                                            'TanggalSdSKDP' => null,
                                            'TanggalSdSKDPCk'=> null,
                                         );
            } else {
                $result = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->first();
            }

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();
            $resultDireksi = DB::table('direksiperusahaan')->where('UserId',$userid)->get();
            $resultDireksiPerubahan = DB::table('direksiperusahaanperubahan')->where('UserId',$userid)->get();
            $resultKomisaris = DB::table('komisarisperusahaan')->where('UserId',$userid)->get();
            $resultKomisarisPerubahan = DB::table('komisarisperusahaanperubahan')->where('UserId',$userid)->get();

            return view('detail.detailperijinan')->with('data',$result)->with('data2',$result2)
                                                 ->with('datadireksi',$resultDireksi)->with('datadireksiperubahan',$resultDireksiPerubahan)
                                                 ->with('datakomisaris',$resultKomisaris)->with('datakomisarisperubahan',$resultKomisarisPerubahan);
        }
    }

    public function detailpersonil(){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $result = DB::table('tenagaahli')->where('UserId',$userid)->get();

        $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

        $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();

        return view('detail.detailpersonel')->with('data',$result)->with('data2',$result2)->with('datavendor',$resultvendor);
        }
    }

    public function detailsarana(){
        $userid = \Session::get('idvendor');

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
                                     );
        } else {
            $result = DB::table('saranapengangkut')->where('UserId', $userid)->first();
        }   

        $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

        return view('detail.detailsarana')->with('data',$result)->with('data2',$result2);
        }
    }

    public function detailspesifikasi($id){
        $userid = \Session::get('idvendor');
        $alamat = \Session::get('alamatlokasi');
        $idspek = $id;

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $alamat = \Session::get('alamatvendor');
        $hitung = DB::table('spesifikasitambang')->where('UserId', $userid)->where('Alamat',$alamat)->count();

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
            $result = DB::table('spesifikasitambang')->where('UserId', $userid)->where('Alamat', $alamat)->first();
        }

        $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

        return view('detail.detailspesifikasi')->with('data',$result)->with('data2',$result2);
        }
    }

    public function detailteknis(){
        $userid = \Session::get('idvendor');

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

            return view('detail.detailteknis')->with('data',$result)
                    ->with('data2', $result2)->with('data3', $result3)->with('data4', $result4)
                    ->with('datacount1', $count1)->with('datacount2', $count2);
        }
    }

    public function savedetailadministrasi(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['NamaCk']))
                $namack = '0';
            else
                $namack = $_POST['NamaCk'];

            if(!isset($_POST['StatusPerusahaanCk']))
                $statusck = '0';
            else
                $statusck = $_POST['StatusPerusahaanCk'];

            if(!isset($_POST['AlamatCk']))
                $alamatck = '0';
            else
                $alamatck = $_POST['AlamatCk'];

            if(!isset($_POST['TlpKantorCk']))
                $tlpkantorck = '0';
            else
                $tlpkantorck = $_POST['TlpKantorCk'];

            if(!isset($_POST['FaxKantorCk']))
                $faxkantorck = '0';
            else
                $faxkantorck = $_POST['FaxKantorCk'];

            if(!isset($_POST['EmailCk']))
                $emailck = '0';
            else
                $emailck = $_POST['EmailCk'];

            if(!isset($_POST['WebsiteCk']))
                $websiteck = '0';
            else
                $websiteck = $_POST['WebsiteCk'];

            if(!isset($_POST['DirekturUtamaCk']))
                $direkturutamack = '0';
            else
                $direkturutamack = $_POST['DirekturUtamaCk'];

            if(!isset($_POST['ContactPersonCk']))
                $contactpersonck = '0';
            else
                $contactpersonck = $_POST['ContactPersonCk'];

            if(!isset($_POST['TlpContactPersonCk']))
                $tlpcontactpersonck = '0';
            else
                $tlpcontactpersonck = $_POST['TlpContactPersonCk'];

            if(!isset($_POST['EmailContactPersonCk']))
                $emailcontactpersonck = '0';
            else
                $emailcontactpersonck = $_POST['EmailContactPersonCk'];

            if(!isset($_POST['BadanUsahaCk']))
                $badanusahack = '0';
            else
                $badanusahack = $_POST['BadanUsahaCk'];

            $data = array(
                            'NamaCk'                => $namack,
                            'BadanUsahaCk'          => $badanusahack,
                            'StatusPerusahaanCk'    => $statusck,
                            'AlamatCk'              => $alamatck,
                            'TlpKantorCk'           => $tlpkantorck,
                            'FaxKantorCk'           => $faxkantorck,
                            'EmailCk'               => $emailck,
                            'DirekturUtamaCk'       => $direkturutamack,
                            'WebsiteCk'             => $websiteck,
                            'ContactPersonCk'       => $contactpersonck,
                            'EmailContactPersonCk'  => $emailcontactpersonck,
                            'TlpContactPersonCk'    => $tlpcontactpersonck,
                          );
            $i = DB::table('dataadministrasiperusahaan')->where('UserId',$userid)->update($data);

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail administrasi perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              //return back();
                return redirect('DetailPerijinan');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailperijinan(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['NomorAktaCk']))
                $NomorAktaCk = '0';
            else
                $NomorAktaCk = $_POST['NomorAktaCk'];

            if(!isset($_POST['TanggalAktaCk']))
                $TanggalAktaCk = '0';
            else
                $TanggalAktaCk = $_POST['TanggalAktaCk'];

            if(!isset($_POST['NamaNotarisCk']))
                $NamaNotarisCk = '0';
            else
                $NamaNotarisCk = $_POST['NamaNotarisCk'];

            if(!isset($_POST['NomorPengesahanKemenhumkamCk']))
                $NomorPengesahanKemenhumkamCk = '0';
            else
                $NomorPengesahanKemenhumkamCk = $_POST['NomorPengesahanKemenhumkamCk'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamCk']))
                $TanggalPengesahanKemenhumkamCk = '0';
            else
                $TanggalPengesahanKemenhumkamCk = $_POST['TanggalPengesahanKemenhumkamCk'];

            if(!isset($_POST['NomorAktaPerubahanCk']))
                $NomorAktaPerubahanCk = '0';
            else
                $NomorAktaPerubahanCk = $_POST['NomorAktaPerubahanCk'];

            if(!isset($_POST['TanggalAktaPerubahanCk']))
                $TanggalAktaPerubahanCk = '0';
            else
                $TanggalAktaPerubahanCk = $_POST['TanggalAktaPerubahanCk'];

            if(!isset($_POST['NamaNotarisPerubahanCk']))
                $NamaNotarisPerubahanCk = '0';
            else
                $NamaNotarisPerubahanCk = $_POST['NamaNotarisPerubahanCk'];

            if(!isset($_POST['NomorPengesahanKemenhumkamPerubahanCk']))
                $NomorPengesahanKemenhumkamPerubahanCk = '0';
            else
                $NomorPengesahanKemenhumkamPerubahanCk = $_POST['NomorPengesahanKemenhumkamPerubahanCk'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamPerubahanCk']))
                $TanggalPengesahanKemenhumkamPerubahanCk = '0';
            else
                $TanggalPengesahanKemenhumkamPerubahanCk = $_POST['TanggalPengesahanKemenhumkamPerubahanCk'];

            if(!isset($_POST['PenerbitSIUPCk']))
                $PenerbitSIUPCk = '0';
            else
                $PenerbitSIUPCk = $_POST['PenerbitSIUPCk'];

            if(!isset($_POST['NomorSIUPCk']))
                $NomorSIUPCk = '0';
            else
                $NomorSIUPCk = $_POST['NomorSIUPCk'];

            if(!isset($_POST['TanggalSIUPCk']))
                $TanggalSIUPCk = '0';
            else
                $TanggalSIUPCk = $_POST['TanggalSIUPCk'];

            if(!isset($_POST['TanggalSdSIUPCk']))
                $TanggalSdSIUPCk = '0';
            else
                $TanggalSdSIUPCk = $_POST['TanggalSdSIUPCk'];

            if(!isset($_POST['PenerbitTDPCk']))
                $PenerbitTDPCk = '0';
            else
                $PenerbitTDPCk = $_POST['PenerbitTDPCk'];

            if(!isset($_POST['NomorTDPCk']))
                $NomorTDPCk = '0';
            else
                $NomorTDPCk = $_POST['NomorTDPCk'];

            if(!isset($_POST['TanggalTDPCk']))
                $TanggalTDPCk = '0';
            else
                $TanggalTDPCk = $_POST['TanggalTDPCk'];

            if(!isset($_POST['TanggalSdTDPCk']))
                $TanggalSdTDPCk = '0';
            else
                $TanggalSdTDPCk = $_POST['TanggalSdTDPCk'];

            if(!isset($_POST['PenerbitSKDPCk']))
                $PenerbitSKDPCk = '0';
            else
                $PenerbitSKDPCk = $_POST['PenerbitSKDPCk'];

            if(!isset($_POST['NomorSKDPCk']))
                $NomorSKDPCk = '0';
            else
                $NomorSKDPCk = $_POST['NomorSKDPCk'];

            if(!isset($_POST['TanggalSKDPCk']))
                $TanggalSKDPCk = '0';
            else
                $TanggalSKDPCk = $_POST['TanggalSKDPCk'];

            if(!isset($_POST['TanggalSdSKDPCk']))
                $TanggalSdSKDPCk = '0';
            else
                $TanggalSdSKDPCk = $_POST['TanggalSdSKDPCk'];

            $x = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->pluck('UserId');
            
            if($x > 0){
                $data = array(
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                        => $userid,
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail perijinan perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              //return back();
                return redirect('DetailIjinTambang');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailkeuangan(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['NomorNPWPCk']))
                $NomorNPWPCk = '0';
            else
                $NomorNPWPCk = $_POST['NomorNPWPCk'];

            if(!isset($_POST['NoRekeningCk']))
                $NoRekeningCk = '0';
            else
                $NoRekeningCk = $_POST['NoRekeningCk'];

            if(!isset($_POST['NamaBankCk']))
                $NamaBankCk = '0';
            else
                $NamaBankCk = $_POST['NamaBankCk'];

            if(!isset($_POST['NomorBuktiPelunasanCk']))
                $NomorBuktiPelunasanCk = '0';
            else
                $NomorBuktiPelunasanCk = $_POST['NomorBuktiPelunasanCk'];

            if(!isset($_POST['TglBuktiPelunasanCk']))
                $TglBuktiPelunasanCk = '0';
            else
                $TglBuktiPelunasanCk = $_POST['TglBuktiPelunasanCk'];

            if(!isset($_POST['NomorLaporanBulananCk']))
                $NomorLaporanBulananCk = '0';
            else
                $NomorLaporanBulananCk = $_POST['NomorLaporanBulananCk'];

            if(!isset($_POST['NomorLaporanBulanan2Ck']))
                $NomorLaporanBulanan2Ck = '0';
            else
                $NomorLaporanBulanan2Ck = $_POST['NomorLaporanBulanan2Ck'];

            if(!isset($_POST['NomorLaporanBulanan3Ck']))
                $NomorLaporanBulanan3Ck = '0';
            else
                $NomorLaporanBulanan3Ck = $_POST['NomorLaporanBulanan3Ck'];

            if(!isset($_POST['TglLaporanBulananCk']))
                $TglLaporanBulananCk = '0';
            else
                $TglLaporanBulananCk = $_POST['TglLaporanBulananCk'];

            if(!isset($_POST['TglLaporanBulanan2Ck']))
                $TglLaporanBulanan2Ck = '0';
            else
                $TglLaporanBulanan2Ck = $_POST['TglLaporanBulanan2Ck'];

            if(!isset($_POST['TglLaporanBulanan3Ck']))
                $TglLaporanBulanan3Ck = '0';
            else
                $TglLaporanBulanan3Ck = $_POST['TglLaporanBulanan3Ck'];

            if(!isset($_POST['ActivaLancarCk']))
                $ActivaLancarCk = '0';
            else
                $ActivaLancarCk = $_POST['ActivaLancarCk'];

            if(!isset($_POST['ActivaTetapCk']))
                $ActivaTetapCk = '0';
            else
                $ActivaTetapCk = $_POST['ActivaTetapCk'];

            if(!isset($_POST['TotalActivaLancarCk']))
                $TotalActivaLancarCk = '0';
            else
                $TotalActivaLancarCk = $_POST['TotalActivaLancarCk'];

            if(!isset($_POST['UtangJangkaPendekCk']))
                $UtangJangkaPendekCk = '0';
            else
                $UtangJangkaPendekCk = $_POST['UtangJangkaPendekCk'];

            if(!isset($_POST['UtangJangkaPanjangCk']))
                $UtangJangkaPanjangCk = '0';
            else
                $UtangJangkaPanjangCk = $_POST['UtangJangkaPanjangCk'];

            if(!isset($_POST['TotalKekayaanCk']))
                $TotalKekayaanCk = '0';
            else
                $TotalKekayaanCk = $_POST['TotalKekayaanCk'];

            if(!isset($_POST['AuditorCk']))
                $AuditorCk = '0';
            else
                $AuditorCk = $_POST['AuditorCk'];

            $x = DB::table('pajak')->where('UserId', $userid)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NomorNPWPCk'           => $NomorNPWPCk,
                                'NoRekeningCk'           => $NoRekeningCk,
                                'NamaBankCk'           => $NamaBankCk,
                                'NomorBuktiPelunasanCk' => $NomorBuktiPelunasanCk,
                                'TglBuktiPelunasanCk'   => $TglBuktiPelunasanCk,
                                'NomorLaporanBulananCk' => $NomorLaporanBulananCk,
                                'NomorLaporanBulanan2Ck' => $NomorLaporanBulanan2Ck,
                                'NomorLaporanBulanan3Ck' => $NomorLaporanBulanan3Ck,
                                'TglLaporanBulananCk'   => $TglLaporanBulananCk,
                                'TglLaporanBulanan2Ck'   => $TglLaporanBulanan2Ck,
                                'TglLaporanBulanan3Ck'   => $TglLaporanBulanan3Ck,
                              );
                $i = DB::table('pajak')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                => $userid,
                                'NomorNPWPCk'           => $NomorNPWPCk,
                                'NoRekeningCk'           => $NoRekeningCk,
                                'NamaBankCk'           => $NamaBankCk,
                                'NomorBuktiPelunasanCk' => $NomorBuktiPelunasanCk,
                                'TglBuktiPelunasanCk'   => $TglBuktiPelunasanCk,
                                'NomorLaporanBulananCk' => $NomorLaporanBulananCk,
                                'NomorLaporanBulanan2Ck' => $NomorLaporanBulanan2Ck,
                                'NomorLaporanBulanan3Ck' => $NomorLaporanBulanan3Ck,
                                'TglLaporanBulananCk'   => $TglLaporanBulananCk,
                                'TglLaporanBulanan2Ck'   => $TglLaporanBulanan2Ck,
                                'TglLaporanBulanan3Ck'   => $TglLaporanBulanan3Ck,
                              );
                $i = DB::table('pajak')->insert($data);
            }

            $x = DB::table('neraca')->where('UserId', $userid)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'ActivaLancarCk'        => $ActivaLancarCk,
                                'ActivaTetapCk'         => $ActivaTetapCk,
                                'TotalActivaLancarCk'   => $TotalActivaLancarCk,
                                'UtangJangkaPendekCk'   => $UtangJangkaPendekCk,
                                'UtangJangkaPanjangCk'  => $UtangJangkaPanjangCk,
                                'TotalKekayaanCk'       => $TotalKekayaanCk,
                                'AuditorCk'             => $AuditorCk,
                              );
                $j = DB::table('neraca')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                => $userid,
                                'ActivaLancarCk'        => $ActivaLancarCk,
                                'ActivaTetapCk'         => $ActivaTetapCk,
                                'TotalActivaLancarCk'   => $TotalActivaLancarCk,
                                'UtangJangkaPendekCk'   => $UtangJangkaPendekCk,
                                'UtangJangkaPanjangCk'  => $UtangJangkaPanjangCk,
                                'TotalKekayaanCk'       => $TotalKekayaanCk,
                                'AuditorCk'             => $AuditorCk,
                              );
                $j = DB::table('neraca')->insert($data);
            }

            if(!is_null($i) && !is_null($j)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail keuangan perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              //return back();
              return redirect('verifikasi');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailteknis(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $alamat = \Session::get('alamatvendor');

            if(!isset($_POST['AlamatCk']))
                $AlamatCk = '0';
            else
                $AlamatCk = $_POST['AlamatCk'];

            if(!isset($_POST['PropinsiCk']))
                $PropinsiCk = '0';
            else
                $PropinsiCk = $_POST['PropinsiCk'];

            if(!isset($_POST['KabupatenCk']))
                $KabupatenCk = '0';
            else
                $KabupatenCk = $_POST['KabupatenCk'];

            if(!isset($_POST['LuasAreaTambangCk']))
                $LuasAreaTambangCk = '0';
            else
                $LuasAreaTambangCk = $_POST['LuasAreaTambangCk'];

            if(!isset($_POST['PerkiraanVolumeCadanganCk']))
                $PerkiraanVolumeCadanganCk = '0';
            else
                $PerkiraanVolumeCadanganCk = $_POST['PerkiraanVolumeCadanganCk'];

            if(!isset($_POST['KapasitasProduksiCk']))
                $KapasitasProduksiCk = '0';
            else
                $KapasitasProduksiCk = $_POST['KapasitasProduksiCk'];

            if(!isset($_POST['KapasitasStockPileCk']))
                $KapasitasStockPileCk = '0';
            else
                $KapasitasStockPileCk = $_POST['KapasitasStockPileCk'];

            if(!isset($_POST['JarakTempuhCk']))
                $JarakTempuhCk = '0';
            else
                $JarakTempuhCk = $_POST['JarakTempuhCk'];

            if(!isset($_POST['AksesPengangkutCk']))
                $AksesPengangkutCk = '0';
            else
                $AksesPengangkutCk = $_POST['AksesPengangkutCk'];

            if(!isset($_POST['JenisTransportasiCk']))
                $JenisTransportasiCk = '0';
            else
                $JenisTransportasiCk = $_POST['JenisTransportasiCk'];

            if(!isset($_POST['KapasitasPengangkutanCk']))
                $KapasitasPengangkutanCk = '0';
            else
                $KapasitasPengangkutanCk = $_POST['KapasitasPengangkutanCk'];

            if(!isset($_POST['KapasitasStockPilePelabuhanCk']))
                $KapasitasStockPilePelabuhanCk = '0';
            else
                $KapasitasStockPilePelabuhanCk = $_POST['KapasitasStockPilePelabuhanCk'];

            if(!isset($_POST['IjinTambangCk']))
                $IjinTambangCk = '0';
            else
                $IjinTambangCk = $_POST['IjinTambangCk'];

            if(!isset($_POST['NomorIjinCk']))
                $NomorIjinCk = '0';
            else
                $NomorIjinCk = $_POST['NomorIjinCk'];

            if(!isset($_POST['TanggalIjinCk']))
                $TanggalIjinCk = '0';
            else
                $TanggalIjinCk = $_POST['TanggalIjinCk'];

            if(!isset($_POST['MasaBerlakuIjinCk']))
                $MasaBerlakuIjinCk = '0';
            else
                $MasaBerlakuIjinCk = $_POST['MasaBerlakuIjinCk'];

            $data = array(
                            'AlamatCk'                              => $AlamatCk,
                            'PropinsiCk'                            => $PropinsiCk,
                            'KabupatenCk'                           => $KabupatenCk,
                            'LuasAreaTambangCk'                     => $LuasAreaTambangCk,
                            'PerkiraanVolumeCadanganCk'             => $PerkiraanVolumeCadanganCk,
                            'KapasitasProduksiCk'                   => $KapasitasProduksiCk,
                            'KapasitasStockPileCk'                  => $KapasitasStockPileCk,
                            'JarakTempuhCk'                         => $JarakTempuhCk,
                            'AksesPengangkutCk'                     => $AksesPengangkutCk,
                            'JenisTransportasiCk'                   => $JenisTransportasiCk,
                            'KapasitasPengangkutanCk'               => $KapasitasPengangkutanCk,
                            'KapasitasStockPilePelabuhanCk'         => $KapasitasStockPilePelabuhanCk,
                            'IjinTambangCk'                         => $IjinTambangCk,
                            'NomorIjinCk'                           => $NomorIjinCk,
                            'TanggalIjinCk'                         => $TanggalIjinCk,
                            'MasaBerlakuIjinCk'                     => $MasaBerlakuIjinCk,
                          );
            $i = DB::table('datateknistambang')->where('UserId',$userid)->where('Alamat', $alamat)->update($data);

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail data teknis perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              //return back();
                return redirect('DetailListSpesifikasi');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailspesifikasi(Request $request){
        $userid = \Session::get('idvendor');
        $alamat = \Session::get('alamatvendor');
        $idspek = \Session::get('idspek');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

            if(!isset($_POST['TotalMoistureARCk']))
                $TotalMoistureARCk = '0';
            else
                $TotalMoistureARCk = $_POST['TotalMoistureARCk'];

            if(!isset($_POST['TotalMoistureADBCk']))
                $TotalMoistureADBCk = '0';
            else
                $TotalMoistureADBCk = $_POST['TotalMoistureADBCk'];

            if(!isset($_POST['TotalMoistureDBCk']))
                $TotalMoistureDBCk = '0';
            else
                $TotalMoistureDBCk = $_POST['TotalMoistureDBCk'];

            if(!isset($_POST['TotalMoistureDAFBCk']))
                $TotalMoistureDAFBCk = '0';
            else
                $TotalMoistureDAFBCk = $_POST['TotalMoistureDAFBCk'];

            if(!isset($_POST['TotalMoistureMethodCk']))
                $TotalMoistureMethodCk = '0';
            else
                $TotalMoistureMethodCk = $_POST['TotalMoistureMethodCk'];

            if(!isset($_POST['ProximateMoistureARCk']))
                $ProximateMoistureARCk = '0';
            else
                $ProximateMoistureARCk = $_POST['ProximateMoistureARCk'];

            if(!isset($_POST['ProximateMoistureADBCk']))
                $ProximateMoistureADBCk = '0';
            else
                $ProximateMoistureADBCk = $_POST['ProximateMoistureADBCk'];

            if(!isset($_POST['ProximateMoistureDBCk']))
                $ProximateMoistureDBCk = '0';
            else
                $ProximateMoistureDBCk = $_POST['ProximateMoistureDBCk'];

            if(!isset($_POST['ProximateMoistureDAFBCk']))
                $ProximateMoistureDAFBCk = '0';
            else
                $ProximateMoistureDAFBCk = $_POST['ProximateMoistureDAFBCk'];

            if(!isset($_POST['ProximateMoistureMethodCk']))
                $ProximateMoistureMethodCk = '0';
            else
                $ProximateMoistureMethodCk = $_POST['ProximateMoistureMethodCk'];

            if(!isset($_POST['AshContentARCk']))
                $AshContentARCk = '0';
            else
                $AshContentARCk = $_POST['AshContentARCk'];

            if(!isset($_POST['AshContentADBCk']))
                $AshContentADBCk = '0';
            else
                $AshContentADBCk = $_POST['AshContentADBCk'];

            if(!isset($_POST['AshContentDBCk']))
                $AshContentDBCk = '0';
            else
                $AshContentDBCk = $_POST['AshContentDBCk'];

            if(!isset($_POST['AshContentDAFBCk']))
                $AshContentDAFBCk = '0';
            else
                $AshContentDAFBCk = $_POST['AshContentDAFBCk'];

            if(!isset($_POST['AshContentMethodCk']))
                $AshContentMethodCk = '0';
            else
                $AshContentMethodCk = $_POST['AshContentMethodCk'];

            if(!isset($_POST['VolatileARCk']))
                $VolatileARCk = '0';
            else
                $VolatileARCk = $_POST['VolatileARCk'];

            if(!isset($_POST['VolatileADBCk']))
                $VolatileADBCk = '0';
            else
                $VolatileADBCk = $_POST['VolatileADBCk'];

            if(!isset($_POST['VolatileDBCk']))
                $VolatileDBCk = '0';
            else
                $VolatileDBCk = $_POST['VolatileDBCk'];

            if(!isset($_POST['VolatileDAFBCk']))
                $VolatileDAFBCk = '0';
            else
                $VolatileDAFBCk = $_POST['VolatileDAFBCk'];

            if(!isset($_POST['VolatileMethodCk']))
                $VolatileMethodCk = '0';
            else
                $VolatileMethodCk = $_POST['VolatileMethodCk'];

            if(!isset($_POST['FixedCarbonARCk']))
                $FixedCarbonARCk = '0';
            else
                $FixedCarbonARCk = $_POST['FixedCarbonARCk'];

            if(!isset($_POST['FixedCarbonADBCk']))
                $FixedCarbonADBCk = '0';
            else
                $FixedCarbonADBCk = $_POST['FixedCarbonADBCk'];

            if(!isset($_POST['FixedCarbonDBCk']))
                $FixedCarbonDBCk = '0';
            else
                $FixedCarbonDBCk = $_POST['FixedCarbonDBCk'];

            if(!isset($_POST['FixedCarbonDAFBCk']))
                $FixedCarbonDAFBCk = '0';
            else
                $FixedCarbonDAFBCk = $_POST['FixedCarbonDAFBCk'];

            if(!isset($_POST['FixedCarbonMethodCk']))
                $FixedCarbonMethodCk = '0';
            else
                $FixedCarbonMethodCk = $_POST['FixedCarbonMethodCk'];

            if(!isset($_POST['TotalSulphurARCk']))
                $TotalSulphurARCk = '0';
            else
                $TotalSulphurARCk = $_POST['TotalSulphurARCk'];

            if(!isset($_POST['TotalSulphurADBCk']))
                $TotalSulphurADBCk = '0';
            else
                $TotalSulphurADBCk = $_POST['TotalSulphurADBCk'];

            if(!isset($_POST['TotalSulphurDBCk']))
                $TotalSulphurDBCk = '0';
            else
                $TotalSulphurDBCk = $_POST['TotalSulphurDBCk'];

            if(!isset($_POST['TotalSulphurDAFBCk']))
                $TotalSulphurDAFBCk = '0';
            else
                $TotalSulphurDAFBCk = $_POST['TotalSulphurDAFBCk'];

            if(!isset($_POST['TotalSulphurMethodCk']))
                $TotalSulphurMethodCk = '0';
            else
                $TotalSulphurMethodCk = $_POST['TotalSulphurMethodCk'];

            if(!isset($_POST['GrossCarolicValveARCk']))
                $GrossCarolicValveARCk = '0';
            else
                $GrossCarolicValveARCk = $_POST['GrossCarolicValveARCk'];

            if(!isset($_POST['GrossCarolicValveADBCk']))
                $GrossCarolicValveADBCk = '0';
            else
                $GrossCarolicValveADBCk = $_POST['GrossCarolicValveADBCk'];

            if(!isset($_POST['GrossCarolicValveDBCk']))
                $GrossCarolicValveDBCk = '0';
            else
                $GrossCarolicValveDBCk = $_POST['GrossCarolicValveDBCk'];

            if(!isset($_POST['GrossCarolicValveDAFBCk']))
                $GrossCarolicValveDAFBCk = '0';
            else
                $GrossCarolicValveDAFBCk = $_POST['GrossCarolicValveDAFBCk'];

            if(!isset($_POST['GrossCarolicValveMethodCk']))
                $GrossCarolicValveMethodCk = '0';
            else
                $GrossCarolicValveMethodCk = $_POST['GrossCarolicValveMethodCk'];

            if(!isset($_POST['HGICk']))
                $HGICk = '0';
            else
                $HGICk = $_POST['HGICk'];

            if(!isset($_POST['HGIMethodCk']))
                $HGIMethodCk = '0';
            else
                $HGIMethodCk = $_POST['HGIMethodCk'];

            if(!isset($_POST['SizeTestFractionARCk']))
                $SizeTestFractionARCk = '0';
            else
                $SizeTestFractionARCk = $_POST['SizeTestFractionARCk'];

            if(!isset($_POST['SizeTestFractionADBCk']))
                $SizeTestFractionADBCk = '0';
            else
                $SizeTestFractionADBCk = $_POST['SizeTestFractionADBCk'];

            if(!isset($_POST['SizeTestFractionDBCk']))
                $SizeTestFractionDBCk = '0';
            else
                $SizeTestFractionDBCk = $_POST['SizeTestFractionDBCk'];

            if(!isset($_POST['SizeTestFractionDAFBCk']))
                $SizeTestFractionDAFBCk = '0';
            else
                $SizeTestFractionDAFBCk = $_POST['SizeTestFractionDAFBCk'];

            if(!isset($_POST['SizeTestFractionMethodCk']))
                $SizeTestFractionMethodCk = '0';
            else
                $SizeTestFractionMethodCk = $_POST['SizeTestFractionMethodCk'];

            if(!isset($_POST['SizeTestPersenARCk']))
                $SizeTestPersenARCk = '0';
            else
                $SizeTestPersenARCk = $_POST['SizeTestPersenARCk'];

            if(!isset($_POST['SizeTestPersenADBCk']))
                $SizeTestPersenADBCk = '0';
            else
                $SizeTestPersenADBCk = $_POST['SizeTestPersenADBCk'];

            if(!isset($_POST['SizeTestPersenDBCk']))
                $SizeTestPersenDBCk = '0';
            else
                $SizeTestPersenDBCk = $_POST['SizeTestPersenDBCk'];

            if(!isset($_POST['SizeTestPersenDAFBCk']))
                $SizeTestPersenDAFBCk = '0';
            else
                $SizeTestPersenDAFBCk = $_POST['SizeTestPersenDAFBCk'];

            if(!isset($_POST['SizeTestPersenMethodCk']))
                $SizeTestPersenMethodCk = '0';
            else
                $SizeTestPersenMethodCk = $_POST['SizeTestPersenMethodCk'];

            if(!isset($_POST['InitialARCk']))
                $InitialARCk = '0';
            else
                $InitialARCk = $_POST['InitialARCk'];

            if(!isset($_POST['InitialADBCk']))
                $InitialADBCk = '0';
            else
                $InitialADBCk = $_POST['InitialADBCk'];

            if(!isset($_POST['InitialDBCk']))
                $InitialDBCk = '0';
            else
                $InitialDBCk = $_POST['InitialDBCk'];

            if(!isset($_POST['InitialDAFBCk']))
                $InitialDAFBCk = '0';
            else
                $InitialDAFBCk = $_POST['InitialDAFBCk'];

            if(!isset($_POST['InitialMethodCk']))
                $InitialMethodCk = '0';
            else
                $InitialMethodCk = $_POST['InitialMethodCk'];

            if(!isset($_POST['SphericalARCk']))
                $SphericalARCk = '0';
            else
                $SphericalARCk = $_POST['SphericalARCk'];

            if(!isset($_POST['SphericalADBCk']))
                $SphericalADBCk = '0';
            else
                $SphericalADBCk = $_POST['SphericalADBCk'];

            if(!isset($_POST['SphericalDBCk']))
                $SphericalDBCk = '0';
            else
                $SphericalDBCk = $_POST['SphericalDBCk'];

            if(!isset($_POST['SphericalDAFBCk']))
                $SphericalDAFBCk = '0';
            else
                $SphericalDAFBCk = $_POST['SphericalDAFBCk'];

            if(!isset($_POST['SphericalMethodCk']))
                $SphericalMethodCk = '0';
            else
                $SphericalMethodCk = $_POST['SphericalMethodCk'];

            if(!isset($_POST['HemisphericalARCk']))
                $HemisphericalARCk = '0';
            else
                $HemisphericalARCk = $_POST['HemisphericalARCk'];

            if(!isset($_POST['HemisphericalADBCk']))
                $HemisphericalADBCk = '0';
            else
                $HemisphericalADBCk = $_POST['HemisphericalADBCk'];

            if(!isset($_POST['HemisphericalDBCk']))
                $HemisphericalDBCk = '0';
            else
                $HemisphericalDBCk = $_POST['HemisphericalDBCk'];

            if(!isset($_POST['HemisphericalDAFBCk']))
                $HemisphericalDAFBCk = '0';
            else
                $HemisphericalDAFBCk = $_POST['HemisphericalDAFBCk'];

            if(!isset($_POST['HemisphericalMethodCk']))
                $HemisphericalMethodCk = '0';
            else
                $HemisphericalMethodCk = $_POST['HemisphericalMethodCk'];

            if(!isset($_POST['FluidizedARCk']))
                $FluidizedARCk = '0';
            else
                $FluidizedARCk = $_POST['FluidizedARCk'];

            if(!isset($_POST['FluidizedADBCk']))
                $FluidizedADBCk = '0';
            else
                $FluidizedADBCk = $_POST['FluidizedADBCk'];

            if(!isset($_POST['FluidizedDBCk']))
                $FluidizedDBCk = '0';
            else
                $FluidizedDBCk = $_POST['FluidizedDBCk'];

            if(!isset($_POST['FluidizedDAFBCk']))
                $FluidizedDAFBCk = '0';
            else
                $FluidizedDAFBCk = $_POST['FluidizedDAFBCk'];

            if(!isset($_POST['FluidizedMethodCk']))
                $FluidizedMethodCk = '0';
            else
                $FluidizedMethodCk = $_POST['FluidizedMethodCk'];

            if(!isset($_POST['SurveyorCk']))
                $SurveyorCk = '0';
            else
                $SurveyorCk = $_POST['SurveyorCk'];

            $data = array(
                            'TotalMoistureARCk'             => $TotalMoistureARCk,
                            'TotalMoistureADBCk'            => $TotalMoistureADBCk,
                            'TotalMoistureDBCk'             => $TotalMoistureDBCk,
                            'TotalMoistureDAFBCk'           => $TotalMoistureDAFBCk,
                            'TotalMoistureMethodCk'         => $TotalMoistureMethodCk,
                            'ProximateMoistureARCk'         => $ProximateMoistureARCk,
                            'ProximateMoistureADBCk'        => $ProximateMoistureADBCk,
                            'ProximateMoistureDBCk'         => $ProximateMoistureDBCk,
                            'ProximateMoistureDAFBCk'       => $ProximateMoistureDAFBCk,
                            'ProximateMoistureMethodCk'     => $ProximateMoistureMethodCk,
                            'AshContentARCk'                => $AshContentARCk,
                            'AshContentADBCk'               => $AshContentADBCk,
                            'AshContentDBCk'                => $AshContentDBCk,
                            'AshContentDAFBCk'              => $AshContentDAFBCk,
                            'AshContentMethodCk'            => $AshContentMethodCk,
                            'VolatileARCk'                  => $VolatileARCk,
                            'VolatileADBCk'                 => $VolatileADBCk,
                            'VolatileDBCk'                  => $VolatileDBCk,
                            'VolatileDAFBCk'                => $VolatileDAFBCk,
                            'VolatileMethodCk'              => $VolatileMethodCk,
                            'FixedCarbonARCk'               => $FixedCarbonARCk,
                            'FixedCarbonADBCk'              => $FixedCarbonADBCk,
                            'FixedCarbonDBCk'               => $FixedCarbonDBCk,
                            'FixedCarbonDAFBCk'             => $FixedCarbonDAFBCk,
                            'FixedCarbonMethodCk'           => $FixedCarbonMethodCk,
                            'TotalSulphurARCk'              => $TotalSulphurARCk,
                            'TotalSulphurADBCk'             => $TotalSulphurADBCk,
                            'TotalSulphurDBCk'              => $TotalSulphurDBCk,
                            'TotalSulphurDAFBCk'            => $TotalSulphurDAFBCk,
                            'TotalSulphurMethodCk'          => $TotalSulphurMethodCk,
                            'GrossCarolicValveARCk'         => $GrossCarolicValveARCk,
                            'GrossCarolicValveADBCk'        => $GrossCarolicValveADBCk,
                            'GrossCarolicValveDBCk'         => $GrossCarolicValveDBCk,
                            'GrossCarolicValveDAFBCk'       => $GrossCarolicValveDAFBCk,
                            'GrossCarolicValveMethodCk'     => $GrossCarolicValveMethodCk,
                            'HGICk'                         => $HGICk,
                            'HGIMethodCk'                   => $HGIMethodCk,
                            'SizeTestFractionARCk'          => $SizeTestFractionARCk,
                            'SizeTestFractionADBCk'         => $SizeTestFractionADBCk,
                            'SizeTestFractionDBCk'          => $SizeTestFractionDBCk,
                            'SizeTestFractionDAFBCk'        => $SizeTestFractionDAFBCk,
                            'SizeTestFractionMethodCk'      => $SizeTestFractionMethodCk,
                            'SizeTestPersenARCk'            => $SizeTestPersenARCk,
                            'SizeTestPersenADBCk'           => $SizeTestPersenADBCk,
                            'SizeTestPersenDBCk'            => $SizeTestPersenDBCk,
                            'SizeTestPersenDAFBCk'          => $SizeTestPersenDAFBCk,
                            'SizeTestPersenMethodCk'        => $SizeTestPersenMethodCk,
                            'InitialARCk'                   => $InitialARCk,
                            'InitialADBCk'                  => $InitialADBCk,
                            'InitialDBCk'                   => $InitialDBCk,
                            'InitialDAFBCk'                 => $InitialDAFBCk,
                            'InitialMethodCk'               => $InitialMethodCk, 
                            'SphericalARCk'                 => $SphericalARCk,
                            'SphericalADBCk'                => $SphericalADBCk,
                            'SphericalDBCk'                 => $SphericalDBCk,
                            'SphericalDAFBCk'               => $SphericalDAFBCk,
                            'SphericalMethodCk'             => $SphericalMethodCk,
                            'HemisphericalARCk'             => $HemisphericalARCk,
                            'HemisphericalADBCk'            => $HemisphericalADBCk,
                            'HemisphericalDBCk'             => $HemisphericalDBCk,
                            'HemisphericalDAFBCk'           => $HemisphericalDAFBCk,
                            'HemisphericalMethodCk'         => $HemisphericalMethodCk,
                            'FluidizedARCk'                 => $FluidizedARCk,
                            'FluidizedADBCk'                => $FluidizedADBCk,
                            'FluidizedDBCk'                 => $FluidizedDBCk,
                            'FluidizedDAFBCk'               => $FluidizedDAFBCk,
                            'FluidizedMethodCk'             => $FluidizedMethodCk,
                            'SurveyorCk'                    => $SurveyorCk,
                          );

            $i = DB::table('spesifikasitambang')->where('UserId',$userid)->where('Alamat',$alamat)->where('Ids',$idspek)->update($data);

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
                \Session::put('idspek', '');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail spesifikasi tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              //return back();
                return redirect('DetailTeknis');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailsarana(Request $request){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['JenisPeralatanCk']))
            $JenisPeralatanCk = '0';
        else
            $JenisPeralatanCk = $_POST['JenisPeralatanCk'];

        if(!isset($_POST['KapasitasMaksimumKapalCk']))
            $KapasitasMaksimumKapalCk = '0';
        else
            $KapasitasMaksimumKapalCk = $_POST['KapasitasMaksimumKapalCk'];

        if(!isset($_POST['KapasitasLoadingCk']))
            $KapasitasLoadingCk = '0';
        else
            $KapasitasLoadingCk = $_POST['KapasitasLoadingCk'];

        if(!isset($_POST['TahunPembuatanCk']))
            $TahunPembuatanCk = '0';
        else
            $TahunPembuatanCk = $_POST['TahunPembuatanCk'];

        if(!isset($_POST['KapasitasAngkutCk']))
            $KapasitasAngkutCk = '0';
        else
            $KapasitasAngkutCk = $_POST['KapasitasAngkutCk'];

        if(!isset($_POST['KondisiCk']))
            $KondisiCk = '0';
        else
            $KondisiCk = $_POST['KondisiCk'];

        $x = DB::table('saranapengangkut')->where('UserId', $userid)->pluck('UserId');
        if($x > 0){
            $data = array(
                            'JenisPeralatanCk'          => $JenisPeralatanCk,
                            'KapasitasMaksimumKapalCk'  => $KapasitasMaksimumKapalCk,
                            'KapasitasLoadingCk'        => $KapasitasLoadingCk,
                            'TahunPembuatanCk'          => $TahunPembuatanCk,
                            'KapasitasAngkutCk'         => $KapasitasAngkutCk,
                            'KondisiCk'                 => $KondisiCk,
                          );
            $i = DB::table('saranapengangkut')->where('UserId',$userid)->update($data);
        } else {
            $data = array(
                            'UserId'                    => $userid,
                            'JenisPeralatanCk'          => $JenisPeralatanCk,
                            'KapasitasMaksimumKapalCk'  => $KapasitasMaksimumKapalCk,
                            'KapasitasLoadingCk'        => $KapasitasLoadingCk,
                            'TahunPembuatanCk'          => $TahunPembuatanCk,
                            'KapasitasAngkutCk'         => $KapasitasAngkutCk,
                            'KondisiCk'                 => $KondisiCk,
                          );
            $i = DB::table('saranapengangkut')->insert($data);
        }

        if(!is_null($i)){
          alert()->success('BERHASIL', 'Simpan Data');
          if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail sarana perusahaan',
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

    public function savedetailkomisaris(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NomorAktaCk1']))
                $NomorAktaCk = '0';
            else
                $NomorAktaCk = $_POST['NomorAktaCk1'];
            
            if(!isset($_POST['TanggalAktaCk1']))
                $TanggalAktaCk = '0';
            else
                $TanggalAktaCk = $_POST['TanggalAktaCk1'];

            if(!isset($_POST['NamaNotarisCk1']))
                $NamaNotarisCk = '0';
            else
                $NamaNotarisCk = $_POST['NamaNotarisCk1'];

            if(!isset($_POST['NomorPengesahanKemenhumkamCk1']))
                $NomorPengesahanKemenhumkamCk = '0';
            else
                $NomorPengesahanKemenhumkamCk = $_POST['NomorPengesahanKemenhumkamCk1'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamCk1']))
                $TanggalPengesahanKemenhumkamCk = '0';
            else
                $TanggalPengesahanKemenhumkamCk = $_POST['TanggalPengesahanKemenhumkamCk1'];

            if(!isset($_POST['NomorAktaPerubahanCk1']))
                $NomorAktaPerubahanCk = '0';
            else
                $NomorAktaPerubahanCk = $_POST['NomorAktaPerubahanCk1'];

            if(!isset($_POST['TanggalAktaPerubahanCk1']))
                $TanggalAktaPerubahanCk = '0';
            else
                $TanggalAktaPerubahanCk = $_POST['TanggalAktaPerubahanCk1'];

            if(!isset($_POST['NamaNotarisPerubahanCk1']))
                $NamaNotarisPerubahanCk = '0';
            else
                $NamaNotarisPerubahanCk = $_POST['NamaNotarisPerubahanCk1'];

            if(!isset($_POST['NomorPengesahanKemenhumkamPerubahanCk1']))
                $NomorPengesahanKemenhumkamPerubahanCk = '0';
            else
                $NomorPengesahanKemenhumkamPerubahanCk = $_POST['NomorPengesahanKemenhumkamPerubahanCk1'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamPerubahanCk1']))
                $TanggalPengesahanKemenhumkamPerubahanCk = '0';
            else
                $TanggalPengesahanKemenhumkamPerubahanCk = $_POST['TanggalPengesahanKemenhumkamPerubahanCk1'];

            if(!isset($_POST['PenerbitSIUPCk1']))
                $PenerbitSIUPCk = '0';
            else
                $PenerbitSIUPCk = $_POST['PenerbitSIUPCk1'];

            if(!isset($_POST['NomorSIUPCk1']))
                $NomorSIUPCk = '0';
            else
                $NomorSIUPCk = $_POST['NomorSIUPCk1'];

            if(!isset($_POST['TanggalSIUPCk1']))
                $TanggalSIUPCk = '0';
            else
                $TanggalSIUPCk = $_POST['TanggalSIUPCk1'];

            if(!isset($_POST['TanggalSdSIUPCk1']))
                $TanggalSdSIUPCk = '0';
            else
                $TanggalSdSIUPCk = $_POST['TanggalSdSIUPCk1'];

            if(!isset($_POST['PenerbitTDPCk1']))
                $PenerbitTDPCk = '0';
            else
                $PenerbitTDPCk = $_POST['PenerbitTDPCk1'];

            if(!isset($_POST['NomorTDPCk1']))
                $NomorTDPCk = '0';
            else
                $NomorTDPCk = $_POST['NomorTDPCk1'];

            if(!isset($_POST['TanggalTDPCk1']))
                $TanggalTDPCk = '0';
            else
                $TanggalTDPCk = $_POST['TanggalTDPCk1'];

            if(!isset($_POST['TanggalSdTDPCk1']))
                $TanggalSdTDPCk = '0';
            else
                $TanggalSdTDPCk = $_POST['TanggalSdTDPCk1'];

            if(!isset($_POST['PenerbitSKDPCk1']))
                $PenerbitSKDPCk = '0';
            else
                $PenerbitSKDPCk = $_POST['PenerbitSKDPCk1'];

            if(!isset($_POST['NomorSKDPCk1']))
                $NomorSKDPCk = '0';
            else
                $NomorSKDPCk = $_POST['NomorSKDPCk1'];

            if(!isset($_POST['TanggalSKDPCk1']))
                $TanggalSKDPCk = '0';
            else
                $TanggalSKDPCk = $_POST['TanggalSKDPCk1'];

            if(!isset($_POST['TanggalSdSKDPCk1']))
                $TanggalSdSKDPCk = '0';
            else
                $TanggalSdSKDPCk = $_POST['TanggalSdSKDPCk1'];

            $x = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->pluck('UserId');
            
            if($x > 0){
                $data = array(
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                        => $userid,
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);
            }

            $nama = $_POST['namakomisaris'];

            if(!isset($_POST['NamaKomisarisCk']))
                $NamaKomisarisCk = '0';
            else
                $NamaKomisarisCk = $_POST['NamaKomisarisCk'];

            if(!isset($_POST['NoKTPKomisarisCk']))
                $NoKTPKomisarisCk = '0';
            else
                $NoKTPKomisarisCk = $_POST['NoKTPKomisarisCk'];

            if(!isset($_POST['JabatanKomisarisCk']))
                $JabatanKomisarisCk = '0';
            else
                $JabatanKomisarisCk = $_POST['JabatanKomisarisCk'];

            $x = DB::table('komisarisperusahaan')->where('UserId', $userid)->where('Nama', $nama)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NamaCk'            => $NamaKomisarisCk,
                                'NoKTPCk'           => $NoKTPKomisarisCk,
                                'JabatanCk'         => $JabatanKomisarisCk,
                              );
                $i = DB::table('komisarisperusahaan')->where('UserId',$userid)->where('Nama', $nama)->update($data);
            } 

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail komisaris perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailkomisarisperubahan(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NomorAktaCk3']))
                $NomorAktaCk = '0';
            else
                $NomorAktaCk = $_POST['NomorAktaCk3'];

            if(!isset($_POST['TanggalAktaCk3']))
                $TanggalAktaCk = '0';
            else
                $TanggalAktaCk = $_POST['TanggalAktaCk3'];

            if(!isset($_POST['NamaNotarisCk3']))
                $NamaNotarisCk = '0';
            else
                $NamaNotarisCk = $_POST['NamaNotarisCk3'];

            if(!isset($_POST['NomorPengesahanKemenhumkamCk3']))
                $NomorPengesahanKemenhumkamCk = '0';
            else
                $NomorPengesahanKemenhumkamCk = $_POST['NomorPengesahanKemenhumkamCk3'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamCk3']))
                $TanggalPengesahanKemenhumkamCk = '0';
            else
                $TanggalPengesahanKemenhumkamCk = $_POST['TanggalPengesahanKemenhumkamCk3'];

            if(!isset($_POST['NomorAktaPerubahanCk3']))
                $NomorAktaPerubahanCk = '0';
            else
                $NomorAktaPerubahanCk = $_POST['NomorAktaPerubahanCk3'];

            if(!isset($_POST['TanggalAktaPerubahanCk3']))
                $TanggalAktaPerubahanCk = '0';
            else
                $TanggalAktaPerubahanCk = $_POST['TanggalAktaPerubahanCk3'];

            if(!isset($_POST['NamaNotarisPerubahanCk3']))
                $NamaNotarisPerubahanCk = '0';
            else
                $NamaNotarisPerubahanCk = $_POST['NamaNotarisPerubahanCk3'];

            if(!isset($_POST['NomorPengesahanKemenhumkamPerubahanCk3']))
                $NomorPengesahanKemenhumkamPerubahanCk = '0';
            else
                $NomorPengesahanKemenhumkamPerubahanCk = $_POST['NomorPengesahanKemenhumkamPerubahanCk3'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamPerubahanCk3']))
                $TanggalPengesahanKemenhumkamPerubahanCk = '0';
            else
                $TanggalPengesahanKemenhumkamPerubahanCk = $_POST['TanggalPengesahanKemenhumkamPerubahanCk3'];

            if(!isset($_POST['PenerbitSIUPCk3']))
                $PenerbitSIUPCk = '0';
            else
                $PenerbitSIUPCk = $_POST['PenerbitSIUPCk3'];

            if(!isset($_POST['NomorSIUPCk3']))
                $NomorSIUPCk = '0';
            else
                $NomorSIUPCk = $_POST['NomorSIUPCk3'];

            if(!isset($_POST['TanggalSIUPCk3']))
                $TanggalSIUPCk = '0';
            else
                $TanggalSIUPCk = $_POST['TanggalSIUPCk3'];

            if(!isset($_POST['TanggalSdSIUPCk3']))
                $TanggalSdSIUPCk = '0';
            else
                $TanggalSdSIUPCk = $_POST['TanggalSdSIUPCk3'];

            if(!isset($_POST['PenerbitTDPCk3']))
                $PenerbitTDPCk = '0';
            else
                $PenerbitTDPCk = $_POST['PenerbitTDPCk3'];

            if(!isset($_POST['NomorTDPCk3']))
                $NomorTDPCk = '0';
            else
                $NomorTDPCk = $_POST['NomorTDPCk3'];

            if(!isset($_POST['TanggalTDPCk3']))
                $TanggalTDPCk = '0';
            else
                $TanggalTDPCk = $_POST['TanggalTDPCk3'];

            if(!isset($_POST['TanggalSdTDPCk3']))
                $TanggalSdTDPCk = '0';
            else
                $TanggalSdTDPCk = $_POST['TanggalSdTDPCk3'];

            if(!isset($_POST['PenerbitSKDPCk3']))
                $PenerbitSKDPCk = '0';
            else
                $PenerbitSKDPCk = $_POST['PenerbitSKDPCk3'];

            if(!isset($_POST['NomorSKDPCk3']))
                $NomorSKDPCk = '0';
            else
                $NomorSKDPCk = $_POST['NomorSKDPCk3'];

            if(!isset($_POST['TanggalSKDPCk3']))
                $TanggalSKDPCk = '0';
            else
                $TanggalSKDPCk = $_POST['TanggalSKDPCk3'];

            if(!isset($_POST['TanggalSdSKDPCk3']))
                $TanggalSdSKDPCk = '0';
            else
                $TanggalSdSKDPCk = $_POST['TanggalSdSKDPCk3'];

            $x = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->pluck('UserId');
            
            if($x > 0){
                $data = array(
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                        => $userid,
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);
            }

            $nama = $_POST['namakomisarisperubahan'];

            if(!isset($_POST['NamaKomisarisPerubahanCk']))
                $NamaKomisarisPerubahanCk = '0';
            else
                $NamaKomisarisPerubahanCk = $_POST['NamaKomisarisPerubahanCk'];

            if(!isset($_POST['NoKTPKomisarisPerubahanCk']))
                $NoKTPKomisarisPerubahanCk = '0';
            else
                $NoKTPKomisarisPerubahanCk = $_POST['NoKTPKomisarisPerubahanCk'];

            if(!isset($_POST['JabatanKomisarisPerubahanCk']))
                $JabatanKomisarisPerubahanCk = '0';
            else
                $JabatanKomisarisPerubahanCk = $_POST['JabatanKomisarisPerubahanCk'];

            $x = DB::table('komisarisperusahaanperubahan')->where('UserId', $userid)->where('Nama', $nama)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NamaCk'            => $NamaKomisarisPerubahanCk,
                                'NoKTPCk'           => $NoKTPKomisarisPerubahanCk,
                                'JabatanCk'         => $JabatanKomisarisPerubahanCk,
                              );
                $i = DB::table('komisarisperusahaanperubahan')->where('UserId',$userid)->where('Nama', $nama)->update($data);
            } 

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail komisaris perusahaan perubahan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetaildireksi(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NomorAktaCk2']))
                $NomorAktaCk = '0';
            else
                $NomorAktaCk = $_POST['NomorAktaCk2'];

            if(!isset($_POST['TanggalAktaCk2']))
                $TanggalAktaCk = '0';
            else
                $TanggalAktaCk = $_POST['TanggalAktaCk2'];

            if(!isset($_POST['NamaNotarisCk2']))
                $NamaNotarisCk = '0';
            else
                $NamaNotarisCk = $_POST['NamaNotarisCk2'];

            if(!isset($_POST['NomorPengesahanKemenhumkamCk2']))
                $NomorPengesahanKemenhumkamCk = '0';
            else
                $NomorPengesahanKemenhumkamCk = $_POST['NomorPengesahanKemenhumkamCk2'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamCk2']))
                $TanggalPengesahanKemenhumkamCk = '0';
            else
                $TanggalPengesahanKemenhumkamCk = $_POST['TanggalPengesahanKemenhumkamCk2'];

            if(!isset($_POST['NomorAktaPerubahanCk2']))
                $NomorAktaPerubahanCk = '0';
            else
                $NomorAktaPerubahanCk = $_POST['NomorAktaPerubahanCk2'];

            if(!isset($_POST['TanggalAktaPerubahanCk2']))
                $TanggalAktaPerubahanCk = '0';
            else
                $TanggalAktaPerubahanCk = $_POST['TanggalAktaPerubahanCk2'];

            if(!isset($_POST['NamaNotarisPerubahanCk2']))
                $NamaNotarisPerubahanCk = '0';
            else
                $NamaNotarisPerubahanCk = $_POST['NamaNotarisPerubahanCk2'];

            if(!isset($_POST['NomorPengesahanKemenhumkamPerubahanCk2']))
                $NomorPengesahanKemenhumkamPerubahanCk = '0';
            else
                $NomorPengesahanKemenhumkamPerubahanCk = $_POST['NomorPengesahanKemenhumkamPerubahanCk2'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamPerubahanCk2']))
                $TanggalPengesahanKemenhumkamPerubahanCk = '0';
            else
                $TanggalPengesahanKemenhumkamPerubahanCk = $_POST['TanggalPengesahanKemenhumkamPerubahanCk2'];

            if(!isset($_POST['PenerbitSIUPCk2']))
                $PenerbitSIUPCk = '0';
            else
                $PenerbitSIUPCk = $_POST['PenerbitSIUPCk2'];

            if(!isset($_POST['NomorSIUPCk2']))
                $NomorSIUPCk = '0';
            else
                $NomorSIUPCk = $_POST['NomorSIUPCk2'];

            if(!isset($_POST['TanggalSIUPCk2']))
                $TanggalSIUPCk = '0';
            else
                $TanggalSIUPCk = $_POST['TanggalSIUPCk2'];

            if(!isset($_POST['TanggalSdSIUPCk2']))
                $TanggalSdSIUPCk = '0';
            else
                $TanggalSdSIUPCk = $_POST['TanggalSdSIUPCk2'];

            if(!isset($_POST['PenerbitTDPCk2']))
                $PenerbitTDPCk = '0';
            else
                $PenerbitTDPCk = $_POST['PenerbitTDPCk2'];

            if(!isset($_POST['NomorTDPCk2']))
                $NomorTDPCk = '0';
            else
                $NomorTDPCk = $_POST['NomorTDPCk2'];

            if(!isset($_POST['TanggalTDPCk2']))
                $TanggalTDPCk = '0';
            else
                $TanggalTDPCk = $_POST['TanggalTDPCk2'];

            if(!isset($_POST['TanggalSdTDPCk2']))
                $TanggalSdTDPCk = '0';
            else
                $TanggalSdTDPCk = $_POST['TanggalSdTDPCk2'];

            if(!isset($_POST['PenerbitSKDPCk2']))
                $PenerbitSKDPCk = '0';
            else
                $PenerbitSKDPCk = $_POST['PenerbitSKDPCk2'];

            if(!isset($_POST['NomorSKDPCk2']))
                $NomorSKDPCk = '0';
            else
                $NomorSKDPCk = $_POST['NomorSKDPCk2'];

            if(!isset($_POST['TanggalSKDPCk2']))
                $TanggalSKDPCk = '0';
            else
                $TanggalSKDPCk = $_POST['TanggalSKDPCk2'];

            if(!isset($_POST['TanggalSdSKDPCk2']))
                $TanggalSdSKDPCk = '0';
            else
                $TanggalSdSKDPCk = $_POST['TanggalSdSKDPCk2'];

            $x = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->pluck('UserId');
            
            if($x > 0){
                $data = array(
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                        => $userid,
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);
            }

            $nama = $_POST['namadireksi'];

            if(!isset($_POST['NamaDireksiCk']))
                $NamaDireksiCk = '0';
            else
                $NamaDireksiCk = $_POST['NamaDireksiCk'];

            if(!isset($_POST['NoKTPDireksiCk']))
                $NoKTPDireksiCk = '0';
            else
                $NoKTPDireksiCk = $_POST['NoKTPDireksiCk'];

            if(!isset($_POST['JabatanDireksiCk']))
                $JabatanDireksiCk = '0';
            else
                $JabatanDireksiCk = $_POST['JabatanDireksiCk'];

            $x = DB::table('direksiperusahaan')->where('UserId', $userid)->where('Nama', $nama)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NamaCk'            => $NamaDireksiCk,
                                'NoKTPCk'           => $NoKTPDireksiCk,
                                'JabatanCk'         => $JabatanDireksiCk,
                              );
                $i = DB::table('direksiperusahaan')->where('UserId',$userid)->where('Nama', $nama)->update($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail direksi perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetaildireksiperubahan(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NomorAktaCk4']))
                $NomorAktaCk = '0';
            else
                $NomorAktaCk = $_POST['NomorAktaCk4'];

            if(!isset($_POST['TanggalAktaCk4']))
                $TanggalAktaCk = '0';
            else
                $TanggalAktaCk = $_POST['TanggalAktaCk4'];

            if(!isset($_POST['NamaNotarisCk4']))
                $NamaNotarisCk = '0';
            else
                $NamaNotarisCk = $_POST['NamaNotarisCk4'];

            if(!isset($_POST['NomorPengesahanKemenhumkamCk4']))
                $NomorPengesahanKemenhumkamCk = '0';
            else
                $NomorPengesahanKemenhumkamCk = $_POST['NomorPengesahanKemenhumkamCk4'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamCk4']))
                $TanggalPengesahanKemenhumkamCk = '0';
            else
                $TanggalPengesahanKemenhumkamCk = $_POST['TanggalPengesahanKemenhumkamCk4'];

            if(!isset($_POST['NomorAktaPerubahanCk4']))
                $NomorAktaPerubahanCk = '0';
            else
                $NomorAktaPerubahanCk = $_POST['NomorAktaPerubahanCk4'];

            if(!isset($_POST['TanggalAktaPerubahanCk4']))
                $TanggalAktaPerubahanCk = '0';
            else
                $TanggalAktaPerubahanCk = $_POST['TanggalAktaPerubahanCk4'];

            if(!isset($_POST['NamaNotarisPerubahanCk4']))
                $NamaNotarisPerubahanCk = '0';
            else
                $NamaNotarisPerubahanCk = $_POST['NamaNotarisPerubahanCk4'];

            if(!isset($_POST['NomorPengesahanKemenhumkamPerubahanCk4']))
                $NomorPengesahanKemenhumkamPerubahanCk = '0';
            else
                $NomorPengesahanKemenhumkamPerubahanCk = $_POST['NomorPengesahanKemenhumkamPerubahanCk4'];

            if(!isset($_POST['TanggalPengesahanKemenhumkamPerubahanCk4']))
                $TanggalPengesahanKemenhumkamPerubahanCk = '0';
            else
                $TanggalPengesahanKemenhumkamPerubahanCk = $_POST['TanggalPengesahanKemenhumkamPerubahanCk4'];

            if(!isset($_POST['PenerbitSIUPCk4']))
                $PenerbitSIUPCk = '0';
            else
                $PenerbitSIUPCk = $_POST['PenerbitSIUPCk4'];

            if(!isset($_POST['NomorSIUPCk4']))
                $NomorSIUPCk = '0';
            else
                $NomorSIUPCk = $_POST['NomorSIUPCk4'];

            if(!isset($_POST['TanggalSIUPCk4']))
                $TanggalSIUPCk = '0';
            else
                $TanggalSIUPCk = $_POST['TanggalSIUPCk4'];

            if(!isset($_POST['TanggalSdSIUPCk4']))
                $TanggalSdSIUPCk = '0';
            else
                $TanggalSdSIUPCk = $_POST['TanggalSdSIUPCk4'];

            if(!isset($_POST['PenerbitTDPCk4']))
                $PenerbitTDPCk = '0';
            else
                $PenerbitTDPCk = $_POST['PenerbitTDPCk4'];

            if(!isset($_POST['NomorTDPCk4']))
                $NomorTDPCk = '0';
            else
                $NomorTDPCk = $_POST['NomorTDPCk4'];

            if(!isset($_POST['TanggalTDPCk4']))
                $TanggalTDPCk = '0';
            else
                $TanggalTDPCk = $_POST['TanggalTDPCk4'];

            if(!isset($_POST['TanggalSdTDPCk4']))
                $TanggalSdTDPCk = '0';
            else
                $TanggalSdTDPCk = $_POST['TanggalSdTDPCk4'];

            if(!isset($_POST['PenerbitSKDPCk4']))
                $PenerbitSKDPCk = '0';
            else
                $PenerbitSKDPCk = $_POST['PenerbitSKDPCk4'];

            if(!isset($_POST['NomorSKDPCk4']))
                $NomorSKDPCk = '0';
            else
                $NomorSKDPCk = $_POST['NomorSKDPCk4'];

            if(!isset($_POST['TanggalSKDPCk4']))
                $TanggalSKDPCk = '0';
            else
                $TanggalSKDPCk = $_POST['TanggalSKDPCk4'];

            if(!isset($_POST['TanggalSdSKDPCk4']))
                $TanggalSdSKDPCk = '0';
            else
                $TanggalSdSKDPCk = $_POST['TanggalSdSKDPCk4'];

            $x = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->pluck('UserId');
            
            if($x > 0){
                $data = array(
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                        => $userid,
                                'NomorAktaCk'                   => $NomorAktaCk,
                                'TanggalAktaCk'                 => $TanggalAktaCk,
                                'NamaNotarisCk'                 => $NamaNotarisCk,
                                'NomorAktaPerubahanCk'          => $NomorAktaPerubahanCk,
                                'TanggalAktaPerubahanCk'        => $TanggalAktaPerubahanCk,
                                'NamaNotarisPerubahanCk'        => $NamaNotarisPerubahanCk,
                                'NomorPengesahanKemenhumkamCk'  => $NomorPengesahanKemenhumkamCk,
                                'TanggalPengesahanKemenhumkamCk'=> $TanggalPengesahanKemenhumkamCk,
                                'NomorPengesahanKemenhumkamPerubahanCk'  => $NomorPengesahanKemenhumkamPerubahanCk,
                                'TanggalPengesahanKemenhumkamPerubahanCk'=> $TanggalPengesahanKemenhumkamPerubahanCk,
                                'PenerbitSIUPCk'             => $PenerbitSIUPCk,
                                'PenerbitTDPCk'           => $PenerbitTDPCk,
                                'PenerbitSKDPCk'       => $PenerbitSKDPCk,
                                'NomorSIUPCk'                   => $NomorSIUPCk,
                                'NomorTDPCk'                 => $NomorTDPCk,
                                'NomorSKDPCk'               => $NomorSKDPCk,
                                'TanggalSIUPCk'             => $TanggalSIUPCk,
                                'TanggalTDPCk'             => $TanggalTDPCk,
                                'TanggalSKDPCk'     => $TanggalSKDPCk,
                                'TanggalSdSIUPCk'   => $TanggalSdSIUPCk,
                                'TanggalSdTDPCk'    => $TanggalSdTDPCk,
                                'TanggalSdSKDPCk'   => $TanggalSdSKDPCk,
                              );
                $i = DB::table('legalitasperijinanperusahaan')->insert($data);
            }

            $nama = $_POST['namadireksiperubahan'];

            if(!isset($_POST['NamaDireksiPerubahanCk']))
                $NamaDireksiPerubahanCk = '0';
            else
                $NamaDireksiPerubahanCk = $_POST['NamaDireksiPerubahanCk'];

            if(!isset($_POST['NoKTPDireksiPerubahanCk']))
                $NoKTPDireksiPerubahanCk = '0';
            else
                $NoKTPDireksiPerubahanCk = $_POST['NoKTPDireksiPerubahanCk'];

            if(!isset($_POST['JabatanDireksiPerubahanCk']))
                $JabatanDireksiPerubahanCk = '0';
            else
                $JabatanDireksiPerubahanCk = $_POST['JabatanDireksiPerubahanCk'];

            $x = DB::table('direksiperusahaanperubahan')->where('UserId', $userid)->where('Nama', $nama)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NamaCk'            => $NamaDireksiPerubahanCk,
                                'NoKTPCk'           => $NoKTPDireksiPerubahanCk,
                                'JabatanCk'         => $JabatanDireksiPerubahanCk,
                              );
                $i = DB::table('direksiperusahaanperubahan')->where('UserId',$userid)->where('Nama', $nama)->update($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail direksi perusahaan perubahan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailpersonil(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $nama = $_POST['nama'];

            if(!isset($_POST['NamaCk']))
                $NamaCk = '0';
            else
                $NamaCk = $_POST['NamaCk'];

            if(!isset($_POST['PendidikanCk']))
                $PendidikanCk = '0';
            else
                $PendidikanCk = $_POST['PendidikanCk'];

            if(!isset($_POST['TglLahirCk']))
                $TglLahirCk = '0';
            else
                $TglLahirCk = $_POST['TglLahirCk'];

            if(!isset($_POST['JabatanCk']))
                $JabatanCk = '0';
            else
                $JabatanCk = $_POST['JabatanCk'];

            if(!isset($_POST['PengalamanKerjaCk']))
                $PengalamanKerjaCk = '0';
            else
                $PengalamanKerjaCk = $_POST['PengalamanKerjaCk'];

            if(!isset($_POST['ProfesiKeahlianCk']))
                $ProfesiKeahlianCk = '0';
            else
                $ProfesiKeahlianCk = $_POST['ProfesiKeahlianCk'];

            if(!isset($_POST['SertifikatCk']))
                $SertifikatCk = '0';
            else
                $SertifikatCk = $_POST['SertifikatCk'];

            $x = DB::table('tenagaahli')->where('UserId', $userid)->where('Nama', $nama)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NamaCk'                => $NamaCk,
                                'PendidikanCk'          => $PendidikanCk,
                                'TglLahirCk'            => $TglLahirCk,
                                'JabatanCk'             => $JabatanCk,
                                'PengalamanKerjaCk'     => $PengalamanKerjaCk,
                                'ProfesiKeahlianCk'     => $ProfesiKeahlianCk,
                                'SertifikatCk'          => $SertifikatCk,
                              );
                $i = DB::table('tenagaahli')->where('UserId',$userid)->where('Nama', $nama)->update($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail personil perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailsaham(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $nama = $_POST['nama'];

            if(!isset($_POST['NamaCk']))
                $NamaCk = '0';
            else
                $NamaCk = $_POST['NamaCk'];

            if(!isset($_POST['NoKTPCk']))
                $NoKTPCk = '0';
            else
                $NoKTPCk = $_POST['NoKTPCk'];

            if(!isset($_POST['JabatanCk']))
                $JabatanCk = '0';
            else
                $JabatanCk = $_POST['JabatanCk'];

            $x = DB::table('komisarisperusahaan')->where('UserId', $userid)->where('Nama', $nama)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NamaCk'            => $NamaCk,
                                'NoKTPCk'           => $NoKTPCk,  
                                'JabatanCk'         => $JabatanCk,
                              );
                $i = DB::table('komisarisperusahaan')->where('UserId',$userid)->where('Nama', $nama)->update($data);
            } 

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail saham perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailarmada(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $JenisArmada = $_POST['jenis'];

            if(!isset($_POST['JenisArmadaCk']))
                $JenisArmadaCk = '0';
            else
                $JenisArmadaCk = $_POST['JenisArmadaCk'];

            if(!isset($_POST['JumlahCk']))
                $JumlahCk = '0';
            else
                $JumlahCk = $_POST['JumlahCk'];

            if(!isset($_POST['KapasitasCk']))
                $KapasitasCk = '0';
            else
                $KapasitasCk = $_POST['KapasitasCk'];

            if(!isset($_POST['MerkCk']))
                $MerkCk = '0';
            else
                $MerkCk = $_POST['MerkCk'];

            if(!isset($_POST['TahunKeluaranCk']))
                $TahunKeluaranCk = '0';
            else
                $TahunKeluaranCk = $_POST['TahunKeluaranCk'];

            if(!isset($_POST['KondisiCk']))
                $KondisiCk = '0';
            else
                $KondisiCk = $_POST['KondisiCk'];

            if(!isset($_POST['LokasiSekarangCk']))
                $LokasiSekarangCk = '0';
            else
                $LokasiSekarangCk = $_POST['LokasiSekarangCk'];

            if(!isset($_POST['BuktiKepemilikanCk']))
                $BuktiKepemilikanCk = '0';
            else
                $BuktiKepemilikanCk = $_POST['BuktiKepemilikanCk'];

            $x = DB::table('armadatransportasi')->where('UserId', $userid)->where('JenisArmada', $JenisArmada)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'JenisArmadaCk'             => $JenisArmadaCk,
                                'JumlahCk'                  => $JumlahCk,
                                'KapasitasCk'               => $KapasitasCk,
                                'MerkCk'                    => $MerkCk,
                                'TahunKeluaranCk'           => $TahunKeluaranCk,
                                'KondisiCk'                 => $KondisiCk,
                                'LokasiSekarangCk'          => $LokasiSekarangCk,
                                'BuktiKepemilikanCk'        => $BuktiKepemilikanCk,
                              );
                $i = DB::table('armadatransportasi')->where('UserId',$userid)->where('JenisArmada', $JenisArmada)->update($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail armada perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailpengalaman(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $LokasiPasokan = $_POST['lokasi'];

            if(!isset($_POST['LokasiPasokanCk']))
                $LokasiPasokanCk = '0';
            else
                $LokasiPasokanCk = $_POST['LokasiPasokanCk'];

            if(!isset($_POST['VolumeCk']))
                $VolumeCk = '0';
            else
                $VolumeCk = $_POST['VolumeCk'];

            if(!isset($_POST['NamaPerusahaanCk']))
                $NamaPerusahaanCk = '0';
            else
                $NamaPerusahaanCk = $_POST['NamaPerusahaanCk'];

            if(!isset($_POST['AlamatCk']))
                $AlamatCk = '0';
            else
                $AlamatCk = $_POST['AlamatCk'];

            if(!isset($_POST['NomorCk']))
                $NomorCk = '0';
            else
                $NomorCk = $_POST['NomorCk'];

            if(!isset($_POST['TanggalCk']))
                $TanggalCk = '0';
            else
                $TanggalCk = $_POST['TanggalCk'];

            if(!isset($_POST['WaktuCk']))
                $WaktuCk = '0';
            else
                $WaktuCk = $_POST['WaktuCk'];

            if(!isset($_POST['NilaiCk']))
                $NilaiCk = '0';
            else
                $NilaiCk = $_POST['NilaiCk'];

            if(!isset($_POST['BACk']))
                $BACk = '0';
            else
                $BACk = $_POST['BACk'];

            $x = DB::table('pengalamanperusahaan')->where('UserId', $userid)->where('LokasiPasokan', $LokasiPasokan)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'LokasiPasokanCk'           => $LokasiPasokanCk,
                                'VolumeCk'                  => $VolumeCk,
                                'NamaPerusahaanCk'          => $NamaPerusahaanCk,
                                'AlamatCk'                  => $AlamatCk,
                                'NomorCk'                   => $NomorCk,
                                'TanggalCk'                 => $TanggalCk,
                                'WaktuCk'                   => $WaktuCk,
                                'NilaiCk'                   => $NilaiCk,
                                'BACk'                      => $BACk,
                              );
                $i = DB::table('pengalamanperusahaan')->where('UserId',$userid)->where('LokasiPasokan', $LokasiPasokan)->update($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail pengalaman perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailkontrak(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $LokasiPasokan = $_POST['lokasi'];

            if(!isset($_POST['LokasiPasokanCk']))
                $LokasiPasokanCk = '0';
            else
                $LokasiPasokanCk = $_POST['LokasiPasokanCk'];

            if(!isset($_POST['VolumeCk']))
                $VolumeCk = '0';
            else
                $VolumeCk = $_POST['VolumeCk'];

            if(!isset($_POST['NamaPerusahaanCk']))
                $NamaPerusahaanCk = '0';
            else
                $NamaPerusahaanCk = $_POST['NamaPerusahaanCk'];

            if(!isset($_POST['AlamatCk']))
                $AlamatCk = '0';
            else
                $AlamatCk = $_POST['AlamatCk'];

            if(!isset($_POST['NomorCk']))
                $NomorCk = '0';
            else
                $NomorCk = $_POST['NomorCk'];

            if(!isset($_POST['TanggalCk']))
                $TanggalCk = '0';
            else
                $TanggalCk = $_POST['TanggalCk'];

            if(!isset($_POST['WaktuCk']))
                $WaktuCk = '0';
            else
                $WaktuCk = $_POST['WaktuCk'];

            if(!isset($_POST['NilaiCk']))
                $NilaiCk = '0';
            else
                $NilaiCk = $_POST['NilaiCk'];

            if(!isset($_POST['PrestasiCk']))
                $PrestasiCk = '0';
            else
                $PrestasiCk = $_POST['PrestasiCk'];

            $x = DB::table('kontrakpengadaan')->where('UserId', $userid)->where('LokasiPasokan', $LokasiPasokan)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'LokasiPasokanCk'           => $LokasiPasokanCk,
                                'VolumeCk'                  => $VolumeCk,
                                'NamaPerusahaanCk'          => $NamaPerusahaanCk,
                                'AlamatCk'                  => $AlamatCk,
                                'NomorCk'                   => $NomorCk,
                                'TanggalCk'                 => $TanggalCk,
                                'WaktuCk'                   => $WaktuCk,
                                'NilaiCk'                   => $NilaiCk,
                                'PrestasiCk'                => $PrestasiCk,
                              );
                $i = DB::table('kontrakpengadaan')->where('UserId',$userid)->where('LokasiPasokan', $LokasiPasokan)->update($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Simpan detail kontrak pengadaan perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function detaildetailteknistambang($id, $alamat){
        \Session::put('idvendor',$id);
        \Session::put('alamatvendor',$alamat);
        return Redirect('DetailTeknis2');
    }

    public function detailteknis2(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

        $alamat = \Session::get('alamatvendor');

        $hitung = DB::table('datateknistambang')->where('UserId', $userid)->where('Alamat',$alamat)->count();       

        if($hitung < 1){
            $result1 = (object) array(
                                        'Alamat'                        => null,
                                        'Propinsi'                      => null,
                                        'Kabupaten'                     => null,
                                        'Koordinat'                     => null,
                                        'LuasAreaTambang'               => null,
                                        'PerkiraanVolumeCadangan'       => null,
                                        'NomorIjin'                     => null,
                                        'TanggalIjin'                   => null,
                                        'MasaBerlakuIjin'               => null,
                                        'KapasitasProduksi'             => null,
                                        'KapasitasStockPile'            => null,
                                        'JarakTempuh'                   => null,
                                        'AksesPengangkut'               => null,
                                        'JenisTransportasi'             => null,
                                        'KapasitasPengangkutan'         => null,
                                        'KapasitasStockPilePelabuhan'   => null,
                                        'PersetujuanVerifikasi'         => null,
                                     );
        } else {
            $result1 = DB::table('datateknistambang')
                ->join('vendor','datateknistambang.UserId','=','vendor.UserId')
                ->where('datateknistambang.UserId', $userid)
                ->where('datateknistambang.Alamat',$alamat)->first();
        }        

        $result2 = DB::table('provinsi')->get();
        $result3 = DB::table('kabupatenkota')->get();

        $result4 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

        $ijintambang = DB::table('legalitasperijinantambang')->select('JenisIjin as JenisIjinTambang')->where('UserId', $userid)->first();

        if(!is_null($ijintambang)){
            if($ijintambang->JenisIjinTambang == "PKP2B"){
                $hasilijintambang = DB::table('pkp2b')->where('UserId', $userid)->count();
                if($hasilijintambang < 1){
                    $resultijintambang = (object) array(
                                                        'NomorIjinTambang'      => null,
                                                        'TanggalIjinTambang'    => null,
                                                        'MasaBerlakuIjinTambang'=> null,
                                                        );
                }else{
                    $resultijintambang = DB::table('pkp2b')
                                         ->select('No as NomorIjinTambang','Tanggal as TanggalIjinTambang')
                                         ->where('UserId', $userid)->first();
                }
            }
            if($ijintambang->JenisIjinTambang == "IUPOP"){
                $hasilijintambang = DB::table('iupop')->where('UserId', $userid)->count();
                if($hasilijintambang < 1){
                    $resultijintambang = (object) array(
                                                        'NomorIjinTambang'      => null,
                                                        'TanggalIjinTambang'    => null,
                                                        'MasaBerlakuIjinTambang'=> null,
                                                        );
                }else{
                    $resultijintambang = DB::table('iupop')
                                         ->select('No as NomorIjinTambang','Tanggal as TanggalIjinTambang',
                                                  'JangkaWaktu as MasaBerlakuIjinTambang')
                                         ->where('UserId', $userid)->first();
                }
                
            }
            if($ijintambang->JenisIjinTambang == "IUPOPK"){
                $hasilijintambang = DB::table('iupopkhusus')->where('UserId', $userid)->count();
                if($hasilijintambang < 1){
                    $resultijintambang = (object) array(
                                                        'NomorIjinTambang'      => null,
                                                        'TanggalIjinTambang'    => null,
                                                        'MasaBerlakuIjinTambang'=> null,
                                                        );
                }else{
                    $resultijintambang = DB::table('iupopkhusus')
                                         ->select('No as NomorIjinTambang','Tanggal as TanggalIjinTambang',
                                                  'JangkaWaktu as MasaBerlakuIjinTambang')
                                         ->where('UserId', $userid)->first();
                }
            }
            if($ijintambang->JenisIjinTambang == "IUPOPK2"){
                $hasilijintambang = DB::table('iupopkhusus2')->where('UserId', $userid)->count();
                if($hasilijintambang < 1){
                    $resultijintambang = (object) array(
                                                        'NomorIjinTambang'      => null,
                                                        'TanggalIjinTambang'    => null,
                                                        'MasaBerlakuIjinTambang'=> null,
                                                        );
                }else{
                    $resultijintambang = DB::table('iupopkhusus2')
                                         ->select('No as NomorIjinTambang','Tanggal as TanggalIjinTambang',
                                                  'JangkaWaktu as MasaBerlakuIjinTambang')
                                         ->where('UserId', $userid)->first();
                }
            }
        }else{
            $ijintambang = (object) array('JenisIjinTambang' => "");
        }

        $resultkoordinat = DB::table('koordinattambang')->where('UserId','=',$userid)->where('Alamat','=',$alamat)->get();

        return view('detail.detaildetailteknistambang')->with('data',$result1)->with('data2', $result2)
                    ->with('data3', $result3)->with('data4',$result4)
                    ->with('dataijintambang',$resultijintambang)
                    ->with('dataijin',$ijintambang)
                    ->with('datakoordinat',$resultkoordinat);
        }
    }

    public function detailijintambang(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $hitung = DB::table('legalitasperijinantambang')->where('UserId', $userid)->count();

            if ($hitung < 1 ) {
            $result = (object) array(
                                        'JenisIjin'  => null,
                                     );
            } else {
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
                $result9 = null;
            }else{
                $result9 = DB::table('pkp2b')->where('UserId', $userid)->get();
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



            $result5 = DB::table('vendor')->select('PersetujuanVerifikasi')->where('UserId','=',$userid)->first();

            $result6 = DB::table('sumbertambang')->where('UserId','=',$userid)->get();
            $result8 = DB::table('sumbertambang2')->where('UserId',$userid)->get();

            $resultDireksi = DB::table('direksiperusahaan')->where('UserId',$userid)->get();
            $resultKomisaris = DB::table('komisarisperusahaan')->where('UserId',$userid)->get();

            return view('detail.detailijintambang')
                        ->with('data',$result)->with('data1',$result1)->with('data2',$result2)
                        ->with('data3',$result3)->with('data4',$result4)->with('data5',$result5)
                        ->with('data6',$result6)->with('data7',$result7)->with('data8',$result8)->with('data9',$result9)
                        ->with('datadireksi',$resultDireksi)->with('datakomisaris',$resultKomisaris);
        }
    }

    public function savedetailperijinaniupop(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            if(!isset($_POST['IUPNoCk']))
                $IUPNoCk = '0';
            else
                $IUPNoCk = $_POST['IUPNoCk'];

            if(!isset($_POST['IUPTanggalCk']))
                $IUPTanggalCk = '0';
            else
                $IUPTanggalCk = $_POST['IUPTanggalCk'];

            if(!isset($_POST['IUPJangkaWaktuCk']))
                $IUPJangkaWaktuCk = '0';
            else
                $IUPJangkaWaktuCk = $_POST['IUPJangkaWaktuCk'];

            if(!isset($_POST['IUPTanggalCncCk']))
                $IUPTanggalCncCk = '0';
            else
                $IUPTanggalCncCk = $_POST['IUPTanggalCncCk'];

            if(!isset($_POST['IUPJangkaWaktuCncCk']))
                $IUPJangkaWaktuCncCk = '0';
            else
                $IUPJangkaWaktuCncCk = $_POST['IUPJangkaWaktuCncCk'];

            if(!isset($_POST['IUPMenerbitkanCk']))
                $IUPMenerbitkanCk = '0';
            else
                $IUPMenerbitkanCk = $_POST['IUPMenerbitkanCk'];

            if(!isset($_POST['IUPDireksiCk']))
                $IUPDireksiCk = '0';
            else
                $IUPDireksiCk = $_POST['IUPDireksiCk'];

            if(!isset($_POST['IUPKomisarisCk']))
                $IUPKomisarisCk = '0';
            else
                $IUPKomisarisCk = $_POST['IUPKomisarisCk'];

            if(!isset($_POST['IUPCNCCk']))
                $IUPCNCCk = '0';
            else
                $IUPCNCCk = $_POST['IUPCNCCk'];

            if(!isset($_POST['IUPLampiranPetaCk']))
                $IUPLampiranPetaCk = '0';
            else
                $IUPLampiranPetaCk = $_POST['IUPLampiranPetaCk'];

            if(!isset($_POST['IUPLampiranKoordinatCk']))
                $IUPLampiranKoordinatCk = '0';
            else
                $IUPLampiranKoordinatCk = $_POST['IUPLampiranKoordinatCk'];

            $x = DB::table('iupop')->where('UserId', $userid)->pluck('UserId');
        
            if($x > 0){
                $data = array(
                                'NoCk'                  => $IUPNoCk,
                                'TanggalCk'             => $IUPTanggalCk,
                                'JangkaWaktuCk'         => $IUPJangkaWaktuCk,
                                'MenerbitkanCk'         => $IUPMenerbitkanCk,
                                'DirutCk'               => $IUPDireksiCk,
                                'KomisarisCk'           => $IUPKomisarisCk,
                                'NoCncCk'               => $IUPCNCCk,
                                'LampiranPetaCk'        => $IUPLampiranPetaCk,
                                'LampiranKoordinatCk'   => $IUPLampiranKoordinatCk,
                                'TanggalCncCk'             => $IUPTanggalCncCk,
                                'JangkaWaktuCncCk'         => $IUPJangkaWaktuCncCk,
                            );
                $i = DB::table('iupop')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                => $userid,
                                'NoCk'                  => $IUPNoCk,
                                'TanggalCk'             => $IUPTanggalCk,
                                'JangkaWaktuCk'         => $IUPJangkaWaktuCk,
                                'MenerbitkanCk'         => $IUPMenerbitkanCk,
                                'DirutCk'               => $IUPDireksiCk,
                                'KomisarisCk'           => $IUPKomisarisCk,
                                'NoCncCk'               => $IUPCNCCk,
                                'LampiranPetaCk'        => $IUPLampiranPetaCk,
                                'LampiranKoordinatCk'   => $IUPLampiranKoordinatCk,
                                'TanggalCncCk'             => $IUPTanggalCncCk,
                                'JangkaWaktuCncCk'         => $IUPJangkaWaktuCncCk,
                          );
                $i = DB::table('iupop')->insert($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail perijinan tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              //return back();
            return redirect('verifikasi');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailperijinaniupopk(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['IUPOPKNoCk']))
                $IUPOPKNoCk = '0';
            else
                $IUPOPKNoCk = $_POST['IUPOPKNoCk'];

            if(!isset($_POST['IUPOPKTanggalCk']))
                $IUPOPKTanggalCk = '0';
            else
                $IUPOPKTanggalCk = $_POST['IUPOPKTanggalCk'];

            if(!isset($_POST['IUPOPKJangkaWaktuCk']))
                $IUPOPKJangkaWaktuCk = '0';
            else
                $IUPOPKJangkaWaktuCk = $_POST['IUPOPKJangkaWaktuCk'];

            if(!isset($_POST['IUPOPKMenerbitkanCk']))
                $IUPOPKMenerbitkanCk = '0';
            else
                $IUPOPKMenerbitkanCk = $_POST['IUPOPKMenerbitkanCk'];

            if(!isset($_POST['IUPOPKWilayahPengangkutanCk']))
                $IUPOPKWilayahPengangkutanCk = '0';
            else
                $IUPOPKWilayahPengangkutanCk = $_POST['IUPOPKWilayahPengangkutanCk'];

            $x = DB::table('iupopkhusus')->where('UserId', $userid)->pluck('UserId');
        
            if($x > 0){
                $data = array(
                                'NoCk'                  => $IUPOPKNoCk,
                                'TanggalCk'             => $IUPOPKTanggalCk,
                                'JangkaWaktuCk'         => $IUPOPKJangkaWaktuCk,
                                'MenerbitkanCk'         => $IUPOPKMenerbitkanCk,
                                'WilayahPengangkutanCk' => $IUPOPKWilayahPengangkutanCk,
                            );
                $i = DB::table('iupopkhusus')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                => $userid,
                                'NoCk'                  => $IUPOPKNoCk,
                                'TanggalCk'             => $IUPOPKTanggalCk,
                                'JangkaWaktuCk'         => $IUPOPKJangkaWaktuCk,
                                'MenerbitkanCk'         => $IUPOPKMenerbitkanCk,
                                'WilayahPengangkutanCk' => $IUPOPKWilayahPengangkutanCk,
                          );
                $i = DB::table('iupopkhusus')->insert($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail perijinan perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              //return back();
                return redirect('verifikasi');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailperijinaniupopk2(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['IUPOPK2NoCk']))
                $IUPOPK2NoCk = '0';
            else
                $IUPOPK2NoCk = $_POST['IUPOPK2NoCk'];

            if(!isset($_POST['IUPOPK2TanggalCk']))
                $IUPOPK2TanggalCk = '0';
            else
                $IUPOPK2TanggalCk = $_POST['IUPOPK2TanggalCk'];

            if(!isset($_POST['IUPOPK2JangkaWaktuCk']))
                $IUPOPK2JangkaWaktuCk = '0';
            else
                $IUPOPK2JangkaWaktuCk = $_POST['IUPOPK2JangkaWaktuCk'];

            if(!isset($_POST['IUPOPK2MenerbitkanCk']))
                $IUPOPK2MenerbitkanCk = '0';
            else
                $IUPOPK2MenerbitkanCk = $_POST['IUPOPK2MenerbitkanCk'];

            if(!isset($_POST['IUPOPK2WilayahPengangkutanCk']))
                $IUPOPK2WilayahPengangkutanCk = '0';
            else
                $IUPOPK2WilayahPengangkutanCk = $_POST['IUPOPK2WilayahPengangkutanCk'];

            $x = DB::table('iupopkhusus2')->where('UserId', $userid)->pluck('UserId');
        
            if($x > 0){
                $data = array(
                                'NoCk'                  => $IUPOPK2NoCk,
                                'TanggalCk'             => $IUPOPK2TanggalCk,
                                'JangkaWaktuCk'         => $IUPOPK2JangkaWaktuCk,
                                'MenerbitkanCk'         => $IUPOPK2MenerbitkanCk,
                                'WilayahPengangkutanCk' => $IUPOPK2WilayahPengangkutanCk,
                            );
                $i = DB::table('iupopkhusus2')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                => $userid,
                                'NoCk'                  => $IUPOPK2NoCk,
                                'TanggalCk'             => $IUPOPK2TanggalCk,
                                'JangkaWaktuCk'         => $IUPOPK2JangkaWaktuCk,
                                'MenerbitkanCk'         => $IUPOPK2MenerbitkanCk,
                                'WilayahPengangkutanCk' => $IUPOPK2WilayahPengangkutanCk,
                          );
                $i = DB::table('iupopkhusus2')->insert($data);
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail perijinan perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              //return back();
                return redirect('verifikasi');
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailkoordinattambang(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['koordinatid']))
                $koordinatid = '';
            else
                $koordinatid = $_POST['koordinatid'];

            if(!isset($_POST['alamatkoordinat']))
                $alamatkoordinat = '';
            else
                $alamatkoordinat = $_POST['alamatkoordinat'];

            if(!isset($_POST['FIDCk']))
                $FIDCk = '0';
            else
                $FIDCk = $_POST['FIDCk'];

            if(!isset($_POST['PointCk']))
                $PointCk = '0';
            else
                $PointCk = $_POST['PointCk'];

            if(!isset($_POST['XCk']))
                $XCk = '0';
            else
                $XCk = $_POST['XCk'];

            if(!isset($_POST['YCk']))
                $YCk = '0';
            else
                $YCk = $_POST['YCk'];

            if(!isset($_POST['DirectionCk']))
                $DirectionCk = '0';
            else
                $DirectionCk = $_POST['DirectionCk'];

            if(!isset($_POST['LengthCk']))
                $LengthCk = '0';
            else
                $LengthCk = $_POST['LengthCk'];

            $data = array(
                            'FIDCk'       => $FIDCk,
                            'PointCk'     => $PointCk,
                            'XCk'         => $XCk,
                            'YCk'         => $YCk,
                            'DirectionCk' => $DirectionCk,
                            'LengthCk'    => $LengthCk,
                        );
            $i = DB::table('koordinattambang')
                    ->where('UserId',$userid)
                    ->where('IdKoordinat',$koordinatid)
                    ->where('Alamat',$alamatkoordinat)
                    ->update($data);

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan detail koordinat tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
    }

    public function savedetailasaltambang(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['jenisiuopk']))
                $jenisiuopk = '';
            else
                $jenisiuopk = $_POST['jenisiuopk'];

            if(!isset($_POST['useridsumber']))
                $useridsumber = '';
            else
                $useridsumber = $_POST['useridsumber'];

            if(!isset($_POST['asaltambangsumber']))
                $asaltambangsumber = '';
            else
                $asaltambangsumber = $_POST['asaltambangsumber'];

            if(!isset($_POST['AsalTambangCk']))
                $AsalTambangCk = '0';
            else
                $AsalTambangCk = $_POST['AsalTambangCk'];

            if(!isset($_POST['NoIUPOPCk']))
                $NoIUPOPCk = '0';
            else
                $NoIUPOPCk = $_POST['NoIUPOPCk'];

            if(!isset($_POST['NoCNCCk']))
                $NoCNCCk = '0';
            else
                $NoCNCCk = $_POST['NoCNCCk'];

            if(!isset($_POST['TglIUPOPCk']))
                $TglIUPOPCk = '0';
            else
                $TglIUPOPCk = $_POST['TglIUPOPCk'];

            if(!isset($_POST['JangkaWaktuIUPOPCk']))
                $JangkaWaktuIUPOPCk = '0';
            else
                $JangkaWaktuIUPOPCk = $_POST['JangkaWaktuIUPOPCk'];

            if(!isset($_POST['TglCNCCk']))
                $TglCNCCk = '0';
            else
                $TglCNCCk = $_POST['TglCNCCk'];

            if(!isset($_POST['JangkaWaktuCNCCk']))
                $JangkaWaktuCNCCk = '0';
            else
                $JangkaWaktuCNCCk = $_POST['JangkaWaktuCNCCk'];
            
            if($jenisiuopk == 'IUPOPK'){
                $data = array(
                                'AsalTambangCk'    => $AsalTambangCk,
                                'NoIUPOPCk'        => $NoIUPOPCk,
                                'NoCNCCk'          => $NoCNCCk,                            
                                'TglIUPOPCk'            => $TglIUPOPCk,
                                'JangkaWaktuIUPOPCk'            => $JangkaWaktuIUPOPCk,
                                'TglCNCCk'         => $TglCNCCk,
                                'JangkaWaktuCNCCk'            => $JangkaWaktuCNCCk,
                            );
                $i = DB::table('sumbertambang')
                        ->where('UserId',$userid)
                        ->where('AsalTambang',$asaltambangsumber)
                        ->update($data);

                if(!isset($_POST['IUPOPKNoCk1']))
                    $IUPOPKNoCk = '0';
                else
                    $IUPOPKNoCk = $_POST['IUPOPKNoCk1'];

                if(!isset($_POST['IUPOPKTanggalCk1']))
                    $IUPOPKTanggalCk = '0';
                else
                    $IUPOPKTanggalCk = $_POST['IUPOPKTanggalCk1'];

                if(!isset($_POST['IUPOPKJangkaWaktuCk1']))
                    $IUPOPKJangkaWaktuCk = '0';
                else
                    $IUPOPKJangkaWaktuCk = $_POST['IUPOPKJangkaWaktuCk1'];

                if(!isset($_POST['IUPOPKMenerbitkanCk1']))
                    $IUPOPKMenerbitkanCk = '0';
                else
                    $IUPOPKMenerbitkanCk = $_POST['IUPOPKMenerbitkanCk1'];

                if(!isset($_POST['IUPOPKWilayahPengangkutanCk1']))
                    $IUPOPKWilayahPengangkutanCk = '0';
                else
                    $IUPOPKWilayahPengangkutanCk = $_POST['IUPOPKWilayahPengangkutanCk1'];

                $x = DB::table('iupopkhusus')->where('UserId', $userid)->pluck('UserId');
            
                if($x > 0){
                    $data = array(
                                    'NoCk'                  => $IUPOPKNoCk,
                                    'TanggalCk'             => $IUPOPKTanggalCk,
                                    'JangkaWaktuCk'         => $IUPOPKJangkaWaktuCk,
                                    'MenerbitkanCk'         => $IUPOPKMenerbitkanCk,
                                    'WilayahPengangkutanCk' => $IUPOPKWilayahPengangkutanCk,
                                );
                    $i = DB::table('iupopkhusus')->where('UserId',$userid)->update($data);
                } else {
                    $data = array(
                                    'UserId'                => $userid,
                                    'NoCk'                  => $IUPOPKNoCk,
                                    'TanggalCk'             => $IUPOPKTanggalCk,
                                    'JangkaWaktuCk'         => $IUPOPKJangkaWaktuCk,
                                    'MenerbitkanCk'         => $IUPOPKMenerbitkanCk,
                                    'WilayahPengangkutanCk' => $IUPOPKWilayahPengangkutanCk,
                              );
                    $i = DB::table('iupopkhusus')->insert($data);
                }
            }else if($jenisiuopk == 'IUPOPK2'){
                $data = array(
                                'AsalTambangCk'    => $AsalTambangCk,
                                'NoIUPOPCk'        => $NoIUPOPCk,
                                'NoCNCCk'     => $NoCNCCk,                            
                                'TglIUPOPCk'            => $TglIUPOPCk,
                                'JangkaWaktuIUPOPCk'            => $JangkaWaktuIUPOPCk,
                                'TglCNCCk'         => $TglCNCCk,
                                'JangkaWaktuCNCCk'            => $JangkaWaktuCNCCk,
                            );
                $i = DB::table('sumbertambang2')
                        ->where('UserId',$userid)
                        ->where('AsalTambang',$asaltambangsumber)
                        ->update($data);

                if(!isset($_POST['IUPOPK2NoCk1']))
                    $IUPOPK2NoCk = '0';
                else
                    $IUPOPK2NoCk = $_POST['IUPOPK2NoCk1'];

                if(!isset($_POST['IUPOPK2TanggalCk1']))
                    $IUPOPK2TanggalCk = '0';
                else
                    $IUPOPK2TanggalCk = $_POST['IUPOPK2TanggalCk1'];

                if(!isset($_POST['IUPOPK2JangkaWaktuCk1']))
                    $IUPOPK2JangkaWaktuCk = '0';
                else
                    $IUPOPK2JangkaWaktuCk = $_POST['IUPOPK2JangkaWaktuCk1'];

                if(!isset($_POST['IUPOPK2MenerbitkanCk1']))
                    $IUPOPK2MenerbitkanCk = '0';
                else
                    $IUPOPK2MenerbitkanCk = $_POST['IUPOPK2MenerbitkanCk1'];

                if(!isset($_POST['IUPOPK2WilayahPengangkutanCk1']))
                    $IUPOPK2WilayahPengangkutanCk = '0';
                else
                    $IUPOPK2WilayahPengangkutanCk = $_POST['IUPOPK2WilayahPengangkutanCk1'];

                $x = DB::table('iupopkhusus2')->where('UserId', $userid)->pluck('UserId');
            
                if($x > 0){
                    $data = array(
                                    'NoCk'                  => $IUPOPK2NoCk,
                                    'TanggalCk'             => $IUPOPK2TanggalCk,
                                    'JangkaWaktuCk'         => $IUPOPK2JangkaWaktuCk,
                                    'MenerbitkanCk'         => $IUPOPK2MenerbitkanCk,
                                    'WilayahPengangkutanCk' => $IUPOPK2WilayahPengangkutanCk,
                                );
                    $i = DB::table('iupopkhusus2')->where('UserId',$userid)->update($data);
                } else {
                    $data = array(
                                    'UserId'                => $userid,
                                    'NoCk'                  => $IUPOPK2NoCk,
                                    'TanggalCk'             => $IUPOPK2TanggalCk,
                                    'JangkaWaktuCk'         => $IUPOPK2JangkaWaktuCk,
                                    'MenerbitkanCk'         => $IUPOPK2MenerbitkanCk,
                                    'WilayahPengangkutanCk' => $IUPOPK2WilayahPengangkutanCk,
                              );
                    $i = DB::table('iupopkhusus2')->insert($data);
                }
            }

            if(!is_null($i)){
              //alert()->success('BERHASIL', 'Simpan Data');
              if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan asal tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
              return back();
            } else {
              //alert()->error('GAGAL', 'Simpan Data');
              return back();
            }
        }
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

    public function detaillistspesifikasi(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $alamat = \Session::get('alamatvendor');
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

            $hitung2 = DB::table('datateknistambang')->where('UserId', $userid)->count();

            if($hitung2 < 1){
                $result3 = null;
            } else {
                $result3 = DB::table('spesifikasitambang')
                    ->where('UserId', $userid)
                    ->where('Alamat',$alamat)->get();
            } 

            return view('detail.detaillistspesifikasi')->with('data1',$result1)
                        ->with('data3',$result3);
        }
    }

    public function detailteknisvendor($sumber){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            \Session::put('sumbertambangvendor',$sumber);
            return redirect('DetailDataTambang');
        }
    }

    public function detaildatatambang(){
        $userid = \Session::get('idvendor');

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

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $resultProvinsi = DB::table('provinsi')
                                    ->join('datatambang','provinsi.ProvinsiId','=','datatambang.Provinsi')
                                    ->where('datatambang.UserId', $userid)
                                    ->where('datatambang.AsalTambang',$sumbertambang)
                                    ->where('datatambang.JenisIjin',$itm)->first();
            $resultKota = DB::table('kabupatenkota')
                                    ->join('datatambang','kabupatenkota.KabupatenKotaId','=','datatambang.Kota')
                                    ->where('datatambang.UserId', $userid)
                                    ->where('datatambang.AsalTambang',$sumbertambang)
                                    ->where('datatambang.JenisIjin',$itm)->first();
            $resultKecamatan = DB::table('kecamatan')
                                    ->join('datatambang','kecamatan.KecamatanId','=','datatambang.Kecamatan')
                                    ->where('datatambang.UserId', $userid)
                                    ->where('datatambang.AsalTambang',$sumbertambang)
                                    ->where('datatambang.JenisIjin',$itm)->first();
            $resultKelurahan = DB::table('kelurahan')
                                    ->join('datatambang','kelurahan.KelurahanId','=','datatambang.Kelurahan')
                                    ->where('datatambang.UserId', $userid)
                                    ->where('datatambang.AsalTambang',$sumbertambang)
                                    ->where('datatambang.JenisIjin',$itm)->first();
            $resultKoor = DB::table('datakoordinattambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                                        ->where('JenisIjin',$itm)->get();

            $result1 = DB::table('datatambang')
                            ->join('vendor','datatambang.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
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
            
            return view('detail.detaildatatambang')->with('data', $result)->with('data1', $result1)->with('data2', $result2)
                                                ->with('dataProvinsi', $resultProvinsi)->with('dataKota', $resultKota)->with('dataKecamatan', $resultKecamatan)
                                                ->with('dataKelurahan', $resultKelurahan)->with('dataKoor', $resultKoor);
        }
    }

    public function savedetaildatatambang(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NamaKonsensiCk']))
                $NamaKonsensiCk = '0';
            else
                $NamaKonsensiCk = $_POST['NamaKonsensiCk'];

            if(!isset($_POST['StatusKerjasamaCk']))
                $StatusKerjasamaCk = '0';
            else
                $StatusKerjasamaCk = $_POST['StatusKerjasamaCk'];

            if(!isset($_POST['LuasKonsensiCk']))
                $LuasKonsensiCk = '0';
            else
                $LuasKonsensiCk = $_POST['LuasKonsensiCk'];

            if(!isset($_POST['LuasOpenAreaCk']))
                $LuasOpenAreaCk = '0';
            else
                $LuasOpenAreaCk = $_POST['LuasOpenAreaCk'];

            if(!isset($_POST['SRCk']))
                $SRCk = '0';
            else
                $SRCk = $_POST['SRCk'];

            if(!isset($_POST['JumlahPITCk']))
                $JumlahPITCk = '0';
            else
                $JumlahPITCk = $_POST['JumlahPITCk'];

            if(!isset($_POST['LuasPITCk']))
                $LuasPITCk = '0';
            else
                $LuasPITCk = $_POST['LuasPITCk'];

            if(!isset($_POST['BESRCk']))
                $BESRCk = '0';
            else
                $BESRCk = $_POST['BESRCk'];

            if(!isset($_POST['JumlahSEAMCk']))
                $JumlahSEAMCk = '';
            else
                $JumlahSEAMCk = $_POST['JumlahSEAMCk'];

            if(!isset($_POST['KemiringanSEAMCk']))
                $KemiringanSEAMCk = '0';
            else
                $KemiringanSEAMCk = $_POST['KemiringanSEAMCk'];

            if(!isset($_POST['KetebalanSEAMCk']))
                $KetebalanSEAMCk = '0';
            else
                $KetebalanSEAMCk = $_POST['KetebalanSEAMCk'];

            if(!isset($_POST['KawasanHutanCk']))
                $KawasanHutanCk = '0';
            else
                $KawasanHutanCk = $_POST['KawasanHutanCk'];

            if(!isset($_POST['ProvinsiCk']))
                $ProvinsiCk = '0';
            else
                $ProvinsiCk = $_POST['ProvinsiCk'];

            if(!isset($_POST['KotaCk']))
                $KotaCk = '0';
            else
                $KotaCk = $_POST['KotaCk'];

            if(!isset($_POST['KecamatanCk']))
                $KecamatanCk = '0';
            else
                $KecamatanCk = $_POST['KecamatanCk'];

            if(!isset($_POST['KelurahanCk']))
                $KelurahanCk = '0';
            else
                $KelurahanCk = $_POST['KelurahanCk'];

            if(!isset($_POST['Catatan']))
                $Catatan = '0';
            else
                $Catatan = $_POST['Catatan'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'NamaKonsensiCk'                => $NamaKonsensiCk,
                        'StatusKerjasamaCk'             => $StatusKerjasamaCk,
                        'LuasKonsensiCk'                => $LuasKonsensiCk,
                        'LuasOpenAreaCk'                => $LuasOpenAreaCk,
                        'SRCk'                          => $SRCk,
                        'JumlahPITCk'                   => $JumlahPITCk,
                        'LuasPITCk'                     => $LuasPITCk,
                        'BESRCk'                        => $BESRCk,
                        'JumlahSEAMCk'                  => $JumlahSEAMCk,
                        'KemiringanSEAMCk'              => $KemiringanSEAMCk,
                        'KetebalanSEAMCk'               => $KetebalanSEAMCk,
                        'KawasanHutanCk'                => $KawasanHutanCk,
                        'ProvinsiCk'                    => $ProvinsiCk,
                        'KotaCk'                        => $KotaCk,
                        'KecamatanCk'                   => $KecamatanCk,
                        'KelurahanCk'                   => $KelurahanCk,
                        'Catatan'                     => $Catatan,
                      );
            $i = DB::table('datatambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('DetailDataKapasitasProduksi');
            }
        }
    }

    public function DetailDataKapasitasProduksi(){
        $userid = \Session::get('idvendor');

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

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('dataproduksitambang')
                            ->join('vendor','dataproduksitambang.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
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

            return view('detail.detaildatakapasitasproduksi')->with('data', $result)->with('data1', $result1)
                                            ->with('data2', $result2)->with('data3', $result3);
        }
    }

    public function savedetailjenisperalatan(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasProduksiCk1']))
                $KapasitasProduksiCk = '0';
            else
                $KapasitasProduksiCk = $_POST['KapasitasProduksiCk1'];

            if(!isset($_POST['TargetTahunCk1']))
                $TargetTahunCk = '0';
            else
                $TargetTahunCk = $_POST['TargetTahunCk1'];

            if(!isset($_POST['TargetProduksiCk1']))
                $TargetProduksiCk = '0';
            else
                $TargetProduksiCk = $_POST['TargetProduksiCk1'];

            if(!isset($_POST['RealisasiProduksiCk1']))
                $RealisasiProduksiCk = '0';
            else
                $RealisasiProduksiCk = $_POST['RealisasiProduksiCk1'];

            if(!isset($_POST['RealisasiTargetTahunCk1']))
                $RealisasiTargetTahunCk = '0';
            else
                $RealisasiTargetTahunCk = $_POST['RealisasiTargetTahunCk1'];

            if(!isset($_POST['RealisasiTargetProduksiCk1']))
                $RealisasiTargetProduksiCk = '0';
            else
                $RealisasiTargetProduksiCk = $_POST['RealisasiTargetProduksiCk1'];

            if(!isset($_POST['Catatan1']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan1'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasProduksiCk'               => $KapasitasProduksiCk,
                        'TargetTahunCk'                     => $TargetTahunCk,
                        'TargetProduksiCk'                  => $TargetProduksiCk,
                        'RealisasiProduksiCk'               => $RealisasiProduksiCk,
                        'Catatan'                         => $Catatan,
                        'RealisasiTargetTahunCk'            => $RealisasiTargetTahunCk,
                        'RealisasiTargetProduksiCk'         => $RealisasiTargetProduksiCk,
                      );
            $i = DB::table('dataproduksitambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(!isset($_POST['JenisCk']))
                $JenisCk = '0';
            else
                $JenisCk = $_POST['JenisCk'];

            if(!isset($_POST['nopopulasi']))
                $nopopulasi = '0';
            else
                $nopopulasi = $_POST['nopopulasi'];

            if(!isset($_POST['TipeCk']))
                $TipeCk = '0';
            else
                $TipeCk = $_POST['TipeCk'];

            if(!isset($_POST['MerkCk']))
                $MerkCk = '0';
            else
                $MerkCk = $_POST['MerkCk'];

            if(!isset($_POST['JumlahCk']))
                $JumlahCk = '0';
            else
                $JumlahCk = $_POST['JumlahCk'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

                $data = array(
                        'JenisCk'                           => $JenisCk,
                        'TipeCk'                            => $TipeCk,
                        'MerkCk'                            => $MerkCk,
                        'JumlahCk'                          => $JumlahCk,
                      );
                $i = DB::table('datapopulasialat')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('No',$nopopulasi)->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function savedetaildatakapasitasproduksi(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasProduksiCk']))
                $KapasitasProduksiCk = '0';
            else
                $KapasitasProduksiCk = $_POST['KapasitasProduksiCk'];

            if(!isset($_POST['TargetTahunCk']))
                $TargetTahunCk = '0';
            else
                $TargetTahunCk = $_POST['TargetTahunCk'];

            if(!isset($_POST['TargetProduksiCk']))
                $TargetProduksiCk = '0';
            else
                $TargetProduksiCk = $_POST['TargetProduksiCk'];

            if(!isset($_POST['RealisasiProduksiCk']))
                $RealisasiProduksiCk = '0';
            else
                $RealisasiProduksiCk = $_POST['RealisasiProduksiCk'];

            if(!isset($_POST['RealisasiTargetTahunCk']))
                $RealisasiTargetTahunCk = '0';
            else
                $RealisasiTargetTahunCk = $_POST['RealisasiTargetTahunCk'];

            if(!isset($_POST['RealisasiTargetProduksiCk']))
                $RealisasiTargetProduksiCk = '0';
            else
                $RealisasiTargetProduksiCk = $_POST['RealisasiTargetProduksiCk'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasProduksiCk'               => $KapasitasProduksiCk,
                        'TargetTahunCk'                     => $TargetTahunCk,
                        'TargetProduksiCk'                  => $TargetProduksiCk,
                        'RealisasiProduksiCk'               => $RealisasiProduksiCk,
                        'Catatan'                         => $Catatan,
                        'RealisasiTargetTahunCk'            => $RealisasiTargetTahunCk,
                        'RealisasiTargetProduksiCk'         => $RealisasiTargetProduksiCk,
                      );
            $i = DB::table('dataproduksitambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('DetailDataEksplorasi');
            }
        }
    }

    public function detaildataeksplorasi(){
        $userid = \Session::get('idvendor');

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

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('dataeksplorasi')
                            ->join('vendor','dataeksplorasi.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->where('dataeksplorasi.UserId', $userid)
                            ->where('dataeksplorasi.AsalTambang',$sumbertambang)
                            ->where('dataeksplorasi.JenisIjin',$itm)->first();

            $result2 = DB::table('dataspesifikasibatubara')
                            ->leftjoin('brandcalori','dataspesifikasibatubara.idCalori','=','brandcalori.idCalori')
                            ->where('UserId', $userid)
                            ->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->get();

            return view('detail.detaildataeksplorasi')->with('data', $result)->with('data1', $result1)
                                            ->with('data2', $result2);
        }
    }

    public function savedetaildataeksplorasi(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['SumberDayaCk']))
                $SumberDayaCk = '';
            else
                $SumberDayaCk = $_POST['SumberDayaCk'];

            if(!isset($_POST['CadanganCk']))
                $CadanganCk = '';
            else
                $CadanganCk = $_POST['CadanganCk'];

            if(!isset($_POST['JumlahTitikBorCk']))
                $JumlahTitikBorCk = '';
            else
                $JumlahTitikBorCk = $_POST['JumlahTitikBorCk'];

            if(!isset($_POST['TotalKedalamanCk']))
                $TotalKedalamanCk = '';
            else
                $TotalKedalamanCk = $_POST['TotalKedalamanCk'];

            if(!isset($_POST['StrukturGeoteknikCk']))
                $StrukturGeoteknikCk = '';
            else
                $StrukturGeoteknikCk = $_POST['StrukturGeoteknikCk'];

            if(!isset($_POST['JORCCk']))
                $JORCCk = '';
            else
                $JORCCk = $_POST['JORCCk'];

            if(!isset($_POST['Catatan']))
                $Catatan = '0';
            else
                $Catatan = $_POST['Catatan'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'SumberDayaCk'                        => $SumberDayaCk,
                        'CadanganCk'                          => $CadanganCk,
                        'JumlahTitikBorCk'                    => $JumlahTitikBorCk,
                        'TotalKedalamanCk'                    => $TotalKedalamanCk,
                        'StrukturGeoteknikCk'                 => $StrukturGeoteknikCk,
                        'JORCCk'                              => $JORCCk,
                        'Catatan'                           => $Catatan,
                      );
            $i = DB::table('dataeksplorasi')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('DetailDataStockpile');
            }
        }
    }

    public function savedetailspek(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['SumberDayaCk1']))
                $SumberDayaCk = '';
            else
                $SumberDayaCk = $_POST['SumberDayaCk1'];

            if(!isset($_POST['CadanganCk1']))
                $CadanganCk = '';
            else
                $CadanganCk = $_POST['CadanganCk1'];

            if(!isset($_POST['JumlahTitikBorCk1']))
                $JumlahTitikBorCk = '';
            else
                $JumlahTitikBorCk = $_POST['JumlahTitikBorCk1'];

            if(!isset($_POST['TotalKedalamanCk1']))
                $TotalKedalamanCk = '';
            else
                $TotalKedalamanCk = $_POST['TotalKedalamanCk1'];

            if(!isset($_POST['StrukturGeoteknikCk1']))
                $StrukturGeoteknikCk = '';
            else
                $StrukturGeoteknikCk = $_POST['StrukturGeoteknikCk1'];

            if(!isset($_POST['JORCCk1']))
                $JORCCk = '';
            else
                $JORCCk = $_POST['JORCCk1'];

            if(!isset($_POST['Catatan1']))
                $Catatan = '0';
            else
                $Catatan = $_POST['Catatan1'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'SumberDayaCk'                        => $SumberDayaCk,
                        'CadanganCk'                          => $CadanganCk,
                        'JumlahTitikBorCk'                    => $JumlahTitikBorCk,
                        'TotalKedalamanCk'                    => $TotalKedalamanCk,
                        'StrukturGeoteknikCk'                 => $StrukturGeoteknikCk,
                        'JORCCk'                              => $JORCCk,
                        'Catatan'                           => $Catatan,
                      );
            $i = DB::table('dataeksplorasi')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(!isset($_POST['idspesifikasi']))
                $idspesifikasi = '0';
            else
                $idspesifikasi = $_POST['idspesifikasi'];

            if(!isset($_POST['TMCk']))
                $TMCk = '';
            else
                $TMCk = $_POST['TMCk'];

            if(!isset($_POST['IMCk']))
                $IMCk = '';
            else
                $IMCk = $_POST['IMCk'];

            if(!isset($_POST['ASHCk']))
                $ASHCk = '';
            else
                $ASHCk = $_POST['ASHCk'];

            if(!isset($_POST['VMCk']))
                $VMCk = '';
            else
                $VMCk = $_POST['VMCk'];

            if(!isset($_POST['FCCk']))
                $FCCk = '';
            else
                $FCCk = $_POST['FCCk'];

            if(!isset($_POST['TSCk']))
                $TSCk = '';
            else
                $TSCk = $_POST['TSCk'];

            if(!isset($_POST['CVCk']))
                $CVCk = '';
            else
                $CVCk = $_POST['CVCk'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

                $data = array(
                        'TMCk'                          => $TMCk,
                        'IMCk'                          => $IMCk,
                        'ASHCk'                         => $ASHCk,
                        'VMCk'                          => $VMCk,
                        'FCCk'                          => $FCCk,
                        'TSCk'                          => $TSCk,
                        'CVCk'                          => $CVCk,
                      );
                $i = DB::table('dataspesifikasibatubara')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('Id',$idspesifikasi)->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function detaildatastockpile(){
        $userid = \Session::get('idvendor');

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

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('datastockpile')
                            ->join('vendor','datastockpile.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->where('datastockpile.UserId', $userid)
                            ->where('datastockpile.AsalTambang',$sumbertambang)
                            ->where('datastockpile.JenisIjin',$itm)->first();

            return view('detail.detaildatastockpile')->with('data', $result)->with('data1', $result1);
        }
    }

    public function savedetaildatastockpile(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NamaCk']))
                $NamaCk = '';
            else
                $NamaCk = $_POST['NamaCk'];

            if(!isset($_POST['KepemilikanStockpileCk']))
                $KepemilikanStockpileCk = '';
            else
                $KepemilikanStockpileCk = $_POST['KepemilikanStockpileCk'];

            if(!isset($_POST['LuasStockpileCk']))
                $LuasStockpileCk = '';
            else
                $LuasStockpileCk = $_POST['LuasStockpileCk'];

            if(!isset($_POST['KapasitasStockpileCk']))
                $KapasitasStockpileCk = '';
            else
                $KapasitasStockpileCk = $_POST['KapasitasStockpileCk'];

            if(!isset($_POST['JarakTambangCk']))
                $JarakTambangCk = '';
            else
                $JarakTambangCk = $_POST['JarakTambangCk'];

            if(!isset($_POST['JumlahCruiserCk']))
                $JumlahCruiserCk = '';
            else
                $JumlahCruiserCk = $_POST['JumlahCruiserCk'];

            if(!isset($_POST['KapasitasCruiserCk']))
                $KapasitasCruiserCk = '';
            else
                $KapasitasCruiserCk = $_POST['KapasitasCruiserCk'];

            if(!isset($_POST['Catatan']))
                $Catatan = '0';
            else
                $Catatan = $_POST['Catatan'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'NamaCk'                          => $NamaCk,
                        'KepemilikanStockpileCk'          => $KepemilikanStockpileCk,
                        'LuasStockpileCk'                 => $LuasStockpileCk,
                        'KapasitasStockpileCk'            => $KapasitasStockpileCk,
                        'JarakTambangCk'                  => $JarakTambangCk,
                        'JumlahCruiserCk'                 => $JumlahCruiserCk,
                        'KapasitasCruiserCk'              => $KapasitasCruiserCk,
                        'Catatan'                       => $Catatan,
                      );
            $i = DB::table('datastockpile')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('DetailDataJetty');
            }
        }
    }

    public function detaildatajetty(){
        $userid = \Session::get('idvendor');

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

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $result1 = DB::table('datajetty')
                            ->join('vendor','datajetty.UserId','=','vendor.UserId')
                            ->leftjoin('hasilverifikasi','hasilverifikasi.UserId','=','vendor.UserId')
                            ->where('datajetty.UserId', $userid)
                            ->where('datajetty.AsalTambang',$sumbertambang)
                            ->where('datajetty.JenisIjin',$itm)->first();

            $result2 = DB::table('datajettydetail')
                            ->where('UserId', $userid)
                            ->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->get();

            $resultProvinsi = DB::table('provinsi')
                                    ->join('datajettydetail','provinsi.ProvinsiId','=','datajettydetail.Provinsi')
                                    ->where('datajettydetail.UserId', $userid)
                                    ->where('datajettydetail.AsalTambang',$sumbertambang)
                                    ->where('datajettydetail.JenisIjin',$itm)->first();
            $resultKota = DB::table('kabupatenkota')
                                    ->join('datajettydetail','kabupatenkota.KabupatenKotaId','=','datajettydetail.Kota')
                                    ->where('datajettydetail.UserId', $userid)
                                    ->where('datajettydetail.AsalTambang',$sumbertambang)
                                    ->where('datajettydetail.JenisIjin',$itm)->first();
            $resultKecamatan = DB::table('kecamatan')
                                    ->join('datajettydetail','kecamatan.KecamatanId','=','datajettydetail.Kecamatan')
                                    ->where('datajettydetail.UserId', $userid)
                                    ->where('datajettydetail.AsalTambang',$sumbertambang)
                                    ->where('datajettydetail.JenisIjin',$itm)->first();
            $resultKelurahan = DB::table('kelurahan')
                                    ->join('datajettydetail','kelurahan.KelurahanId','=','datajettydetail.Kelurahan')
                                    ->where('datajettydetail.UserId', $userid)
                                    ->where('datajettydetail.AsalTambang',$sumbertambang)
                                    ->where('datajettydetail.JenisIjin',$itm)->first();

            return view('detail.detaildatajetty')->with('data', $result)->with('data1', $result1)->with('data2', $result2)
                                        ->with('dataProvinsi', $resultProvinsi)->with('dataKota', $resultKota)
                                        ->with('dataKecamatan', $resultKecamatan)->with('dataKelurahan', $resultKelurahan);
        }
    }

    public function savedetaildatajety(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasCruiserCk']))
                $KapasitasCruiserCk = '';
            else
                $KapasitasCruiserCk = $_POST['KapasitasCruiserCk'];

            if(!isset($_POST['KapasitasMuatCk']))
                $KapasitasMuatCk = '';
            else
                $KapasitasMuatCk = $_POST['KapasitasMuatCk'];

            if(!isset($_POST['Catatan']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasCruiserCk'                 => $KapasitasCruiserCk,
                        'KapasitasMuatCk'                    => $KapasitasMuatCk,
                        'Catatan'                          => $Catatan,
                      );
            $i = DB::table('datajetty')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return redirect('DetailTeknis');
            }
        }
    }

    public function savedetaildetailjetty(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['KapasitasCruiserCk1']))
                $KapasitasCruiserCk = '';
            else
                $KapasitasCruiserCk = $_POST['KapasitasCruiserCk1'];

            if(!isset($_POST['KapasitasMuatCk1']))
                $KapasitasMuatCk = '';
            else
                $KapasitasMuatCk = $_POST['KapasitasMuatCk1'];

            if(!isset($_POST['Catatan1']))
                $Catatan = '';
            else
                $Catatan = $_POST['Catatan1'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'KapasitasCruiserCk'                 => $KapasitasCruiserCk,
                        'KapasitasMuatCk'                    => $KapasitasMuatCk,
                        'Catatan'                          => $Catatan,
                      );
            $i = DB::table('datajetty')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(!isset($_POST['NamaCk']))
                $NamaCk = '';
            else
                $NamaCk = $_POST['NamaCk'];

            if(!isset($_POST['KepemilikanCk']))
                $KepemilikanCk = '';
            else
                $KepemilikanCk = $_POST['KepemilikanCk'];

            if(!isset($_POST['SystemMuatCk']))
                $SystemMuatCk = '';
            else
                $SystemMuatCk = $_POST['SystemMuatCk'];

            if(!isset($_POST['KapasitasCk']))
                $KapasitasCk = '';
            else
                $KapasitasCk = $_POST['KapasitasCk'];

            if(!isset($_POST['KapasitasManualCk']))
                $KapasitasManualCk = '';
            else
                $KapasitasManualCk = $_POST['KapasitasManualCk'];

            if(!isset($_POST['KapasitasConveyorCk']))
                $KapasitasConveyorCk = '';
            else
                $KapasitasConveyorCk = $_POST['KapasitasConveyorCk'];

            if(!isset($_POST['JumlahSandaranCk']))
                $JumlahSandaranCk = '';
            else
                $JumlahSandaranCk = $_POST['JumlahSandaranCk'];

            if(!isset($_POST['LuasCk']))
                $LuasCk = '';
            else
                $LuasCk = $_POST['LuasCk'];

            if(!isset($_POST['KedalamanCk']))
                $KedalamanCk = '';
            else
                $KedalamanCk = $_POST['KedalamanCk'];

            if(!isset($_POST['JarakCk']))
                $JarakCk = '';
            else
                $JarakCk = $_POST['JarakCk'];

            if(!isset($_POST['ProvinsiCk']))
                $ProvinsiCk = '';
            else
                $ProvinsiCk = $_POST['ProvinsiCk'];

            if(!isset($_POST['KotaCk']))
                $KotaCk = '';
            else
                $KotaCk = $_POST['KotaCk'];

            if(!isset($_POST['KecamatanCk']))
                $KecamatanCk = '';
            else
                $KecamatanCk = $_POST['KecamatanCk'];

            if(!isset($_POST['KelurahanCk']))
                $KelurahanCk = '';
            else
                $KelurahanCk = $_POST['KelurahanCk'];

            if(!isset($_POST['idjetty']))
                $idjetty = '';
            else
                $idjetty = $_POST['idjetty'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

                $data = array(
                        'NamaCk'                          => $NamaCk,
                        'KepemilikanCk'                   => $KepemilikanCk,
                        'SystemMuatCk'                    => $SystemMuatCk,
                        'KapasitasCk'                     => $KapasitasCk,
                        'KapasitasManualCk'                     => $KapasitasManualCk,
                        'KapasitasConveyorCk'                     => $KapasitasConveyorCk,
                        'JumlahSandaranCk'                => $JumlahSandaranCk,
                        'LuasCk'                          => $LuasCk,
                        'KedalamanCk'                     => $KedalamanCk,
                        'JarakCk'                         => $JarakCk,
                        'ProvinsiCk'                      => $ProvinsiCk,
                        'KotaCk'                          => $KotaCk,
                        'KecamatanCk'                     => $KecamatanCk,
                        'KelurahanCk'                     => $KelurahanCk,
                      );
                $i = DB::table('datajettydetail')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                                            ->where('Id',$idjetty)->where('JenisIjin',$itm)->update($data);

            if(is_null($i)){   
                return back();         
            }else{
                return back();
            }
        }
    }

    public function savedetailkortambang(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['NamaKonsensiCk1']))
                $NamaKonsensiCk = '0';
            else
                $NamaKonsensiCk = $_POST['NamaKonsensiCk1'];

            if(!isset($_POST['StatusKerjasamaCk1']))
                $StatusKerjasamaCk = '0';
            else
                $StatusKerjasamaCk = $_POST['StatusKerjasamaCk1'];

            if(!isset($_POST['LuasKonsensiCk1']))
                $LuasKonsensiCk = '0';
            else
                $LuasKonsensiCk = $_POST['LuasKonsensiCk1'];

            if(!isset($_POST['LuasOpenAreaCk1']))
                $LuasOpenAreaCk = '0';
            else
                $LuasOpenAreaCk = $_POST['LuasOpenAreaCk1'];

            if(!isset($_POST['SRCk1']))
                $SRCk = '0';
            else
                $SRCk = $_POST['SRCk1'];

            if(!isset($_POST['JumlahPITCk1']))
                $JumlahPITCk = '0';
            else
                $JumlahPITCk = $_POST['JumlahPITCk1'];

            if(!isset($_POST['LuasPITCk1']))
                $LuasPITCk = '0';
            else
                $LuasPITCk = $_POST['LuasPITCk1'];

            if(!isset($_POST['BESRCk1']))
                $BESRCk = '0';
            else
                $BESRCk = $_POST['BESRCk1'];

            if(!isset($_POST['JumlahSEAMCk1']))
                $JumlahSEAMCk = '';
            else
                $JumlahSEAMCk = $_POST['JumlahSEAMCk1'];

            if(!isset($_POST['KemiringanSEAMCk1']))
                $KemiringanSEAMCk = '0';
            else
                $KemiringanSEAMCk = $_POST['KemiringanSEAMCk1'];

            if(!isset($_POST['KetebalanSEAMCk1']))
                $KetebalanSEAMCk = '0';
            else
                $KetebalanSEAMCk = $_POST['KetebalanSEAMCk1'];

            if(!isset($_POST['KawasanHutanCk1']))
                $KawasanHutanCk = '0';
            else
                $KawasanHutanCk = $_POST['KawasanHutanCk1'];

            if(!isset($_POST['ProvinsiCk1']))
                $ProvinsiCk = '0';
            else
                $ProvinsiCk = $_POST['ProvinsiCk1'];

            if(!isset($_POST['KotaCk1']))
                $KotaCk = '0';
            else
                $KotaCk = $_POST['KotaCk1'];

            if(!isset($_POST['KecamatanCk1']))
                $KecamatanCk = '0';
            else
                $KecamatanCk = $_POST['KecamatanCk1'];

            if(!isset($_POST['KelurahanCk1']))
                $KelurahanCk = '0';
            else
                $KelurahanCk = $_POST['KelurahanCk1'];

            if(!isset($_POST['Catatan1']))
                $Catatan = '0';
            else
                $Catatan = $_POST['Catatan1'];

            $sumbertambang = \Session::get('sumbertambangvendor');
            $itm = DB::table('legalitasperijinantambang')->where('UserId',$userid)->pluck('JenisIjin');

            $data = array(
                        'NamaKonsensiCk'                => $NamaKonsensiCk,
                        'StatusKerjasamaCk'             => $StatusKerjasamaCk,
                        'LuasKonsensiCk'                => $LuasKonsensiCk,
                        'LuasOpenAreaCk'                => $LuasOpenAreaCk,
                        'SRCk'                          => $SRCk,
                        'JumlahPITCk'                   => $JumlahPITCk,
                        'LuasPITCk'                     => $LuasPITCk,
                        'BESRCk'                        => $BESRCk,
                        'JumlahSEAMCk'                  => $JumlahSEAMCk,
                        'KemiringanSEAMCk'              => $KemiringanSEAMCk,
                        'KetebalanSEAMCk'               => $KetebalanSEAMCk,
                        'KawasanHutanCk'                => $KawasanHutanCk,
                        'ProvinsiCk'                    => $ProvinsiCk,
                        'KotaCk'                        => $KotaCk,
                        'KecamatanCk'                   => $KecamatanCk,
                        'KelurahanCk'                   => $KelurahanCk,
                        'Catatan'                     => $Catatan,
                      );
            $i = DB::table('datatambang')->where('UserId',$userid)->where('AsalTambang',$sumbertambang)
                            ->where('JenisIjin',$itm)->update($data);

            if(!isset($_POST['Id']))
                $Id = '';
            else
                $Id = $_POST['Id'];

            if(!isset($_POST['BDerajatCk']))
                $BDerajatCk = '';
            else
                $BDerajatCk = $_POST['BDerajatCk'];

            if(!isset($_POST['BMenitCk']))
                $BMenitCk = '';
            else
                $BMenitCk = $_POST['BMenitCk'];

            if(!isset($_POST['BDetikCk']))
                $BDetikCk = '';
            else
                $BDetikCk = $_POST['BDetikCk'];

            if(!isset($_POST['LDerajatCk']))
                $LDerajatCk = '';
            else
                $LDerajatCk = $_POST['LDerajatCk'];

            if(!isset($_POST['LMenitCk']))
                $LMenitCk = '';
            else
                $LMenitCk = $_POST['LMenitCk'];

            if(!isset($_POST['LDetikCk']))
                $LDetikCk = '';
            else
                $LDetikCk = $_POST['LDetikCk'];

            $data = array(
                    'BDerajatCk'               => $BDerajatCk,
                    'BMenitCk'                 => $BMenitCk,
                    'BDetikCk'                 => $BDetikCk,
                    'LDerajatCk'               => $LDerajatCk,
                    'LMenitCk'                 => $LMenitCk,
                    'LDetikCk'                 => $LDetikCk,
                  );

            $i = DB::table('datakoordinattambang')->where('Id',$Id)->update($data);          

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

    public function detailkoorjetty($id){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            \Session::put('idjetvendor',$id);
            return redirect('DetailKoordinatJetty');
        }
    }

    public function detailkoordinatjetty(){
        $userid = \Session::get('idjetvendor');

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

            $idjet = \Session::get('idjetvendor');
            $resultKoor = DB::table('datakoordinatjetty')->where('IdJetty',$idjet)->get();

            return view('detail.detailkoordinatjetty')->with('data', $result)->with('dataKoor', $resultKoor);
        }
    }

    public function detailvendoredit($id){
        \Session::put('idvendor',$id);
        return Redirect('DetailKeuanganEdit');
    }

    public function detailkeuanganedit(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

            $hitung1 = DB::table('pajak')->where('UserId', $userid)->count();

            $hitung2 = DB::table('neraca')->where('UserId', $userid)->count();

            $resultSaham = DB::table('komisarisperusahaan')->where('UserId',$userid)->get();

            if($hitung1 < 1 ){
                $resultPajak = (object) array(
                                                'NomorNPWP'             => null,
                                                'NomorNPWPCk'           => null,
                                                'NomorBuktiPelunasan'   => null,
                                                'NomorBuktiPelunasanCk' => null,
                                                'TglBuktiPelunasan'     => null,
                                                'TglBuktiPelunasanCk'   => null,
                                                'NomorLaporanBulanan'   => null,
                                                'NomorLaporanBulananCk' => null,
                                                'NomorLaporanBulanan2'   => null,
                                                'NomorLaporanBulanan2Ck' => null,
                                                'NomorLaporanBulanan2'   => null,
                                                'NomorLaporanBulanan2Ck' => null,
                                                'TglLaporanBulanan'     => null,
                                                'TglLaporanBulananCk'   => null,
                                                'TglLaporanBulanan2'     => null,
                                                'TglLaporanBulanan2Ck'   => null,
                                                'TglLaporanBulanan2'     => null,
                                                'TglLaporanBulanan2Ck'   => null,
                                              );
            } else {
                $resultPajak = DB::table('pajak')->where('UserId',$userid)->first();
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
                                               );
            } else {
                $resultNeraca = DB::table('neraca')->where('UserId',$userid)->first();
            }

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

            $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();

            $statushasil = DB::table('hasilverifikasi')->where('UserId',$userid)->first();

            return view('detail.detailkeuanganedit')->with('data1',$resultSaham)->with('data2',$resultPajak)->with('data3',$resultNeraca)
                                    ->with('data4',$result2)->with('datavendor',$resultvendor)
                                    ->with('datahasil',$statushasil);
        }
    }

    public function savedetailkeuanganedit(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['enedit']))
                $enedit = '1';
            else
                $enedit = 0;

            if(!isset($_POST['NomorNPWPCk']))
                $NomorNPWPCk = '0';
            else
                $NomorNPWPCk = $_POST['NomorNPWPCk'];

            if(!isset($_POST['NoRekeningCk']))
                $NoRekeningCk = '0';
            else
                $NoRekeningCk = $_POST['NoRekeningCk'];

            if(!isset($_POST['NamaBankCk']))
                $NamaBankCk = '0';
            else
                $NamaBankCk = $_POST['NamaBankCk'];

            if(!isset($_POST['NomorBuktiPelunasanCk']))
                $NomorBuktiPelunasanCk = '0';
            else
                $NomorBuktiPelunasanCk = $_POST['NomorBuktiPelunasanCk'];

            if(!isset($_POST['TglBuktiPelunasanCk']))
                $TglBuktiPelunasanCk = '0';
            else
                $TglBuktiPelunasanCk = $_POST['TglBuktiPelunasanCk'];

            if(!isset($_POST['NomorLaporanBulananCk']))
                $NomorLaporanBulananCk = '0';
            else
                $NomorLaporanBulananCk = $_POST['NomorLaporanBulananCk'];

            if(!isset($_POST['NomorLaporanBulanan2Ck']))
                $NomorLaporanBulanan2Ck = '0';
            else
                $NomorLaporanBulanan2Ck = $_POST['NomorLaporanBulanan2Ck'];

            if(!isset($_POST['NomorLaporanBulanan3Ck']))
                $NomorLaporanBulanan3Ck = '0';
            else
                $NomorLaporanBulanan3Ck = $_POST['NomorLaporanBulanan3Ck'];

            if(!isset($_POST['TglLaporanBulananCk']))
                $TglLaporanBulananCk = '0';
            else
                $TglLaporanBulananCk = $_POST['TglLaporanBulananCk'];

            if(!isset($_POST['TglLaporanBulanan2Ck']))
                $TglLaporanBulanan2Ck = '0';
            else
                $TglLaporanBulanan2Ck = $_POST['TglLaporanBulanan2Ck'];

            if(!isset($_POST['TglLaporanBulanan3Ck']))
                $TglLaporanBulanan3Ck = '0';
            else
                $TglLaporanBulanan3Ck = $_POST['TglLaporanBulanan3Ck'];

            if(!isset($_POST['ActivaLancarCk']))
                $ActivaLancarCk = '0';
            else
                $ActivaLancarCk = $_POST['ActivaLancarCk'];

            if(!isset($_POST['ActivaTetapCk']))
                $ActivaTetapCk = '0';
            else
                $ActivaTetapCk = $_POST['ActivaTetapCk'];

            if(!isset($_POST['TotalActivaLancarCk']))
                $TotalActivaLancarCk = '0';
            else
                $TotalActivaLancarCk = $_POST['TotalActivaLancarCk'];

            if(!isset($_POST['UtangJangkaPendekCk']))
                $UtangJangkaPendekCk = '0';
            else
                $UtangJangkaPendekCk = $_POST['UtangJangkaPendekCk'];

            if(!isset($_POST['UtangJangkaPanjangCk']))
                $UtangJangkaPanjangCk = '0';
            else
                $UtangJangkaPanjangCk = $_POST['UtangJangkaPanjangCk'];

            if(!isset($_POST['TotalKekayaanCk']))
                $TotalKekayaanCk = '0';
            else
                $TotalKekayaanCk = $_POST['TotalKekayaanCk'];

            if(!isset($_POST['AuditorCk']))
                $AuditorCk = '0';
            else
                $AuditorCk = $_POST['AuditorCk'];

            $x = DB::table('pajak')->where('UserId', $userid)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'NomorNPWPCk'           => $NomorNPWPCk,
                                'NoRekeningCk'           => $NoRekeningCk,
                                'NamaBankCk'           => $NamaBankCk,
                                'NomorBuktiPelunasanCk' => $NomorBuktiPelunasanCk,
                                'TglBuktiPelunasanCk'   => $TglBuktiPelunasanCk,
                                'NomorLaporanBulananCk' => $NomorLaporanBulananCk,
                                'NomorLaporanBulanan2Ck' => $NomorLaporanBulanan2Ck,
                                'NomorLaporanBulanan3Ck' => $NomorLaporanBulanan3Ck,
                                'TglLaporanBulananCk'   => $TglLaporanBulananCk,
                                'TglLaporanBulanan2Ck'   => $TglLaporanBulanan2Ck,
                                'TglLaporanBulanan3Ck'   => $TglLaporanBulanan3Ck,
                              );
                $i = DB::table('pajak')->where('UserId',$userid)->update($data);
            } else {
                $data = array(
                                'UserId'                => $userid,
                                'NomorNPWPCk'           => $NomorNPWPCk,
                                'NoRekeningCk'           => $NoRekeningCk,
                                'NamaBankCk'           => $NamaBankCk,
                                'NomorBuktiPelunasanCk' => $NomorBuktiPelunasanCk,
                                'TglBuktiPelunasanCk'   => $TglBuktiPelunasanCk,
                                'NomorLaporanBulananCk' => $NomorLaporanBulananCk,
                                'NomorLaporanBulanan2Ck' => $NomorLaporanBulanan2Ck,
                                'NomorLaporanBulanan3Ck' => $NomorLaporanBulanan3Ck,
                                'TglLaporanBulananCk'   => $TglLaporanBulananCk,
                                'TglLaporanBulanan2Ck'   => $TglLaporanBulanan2Ck,
                                'TglLaporanBulanan3Ck'   => $TglLaporanBulanan3Ck,
                              );
                $i = DB::table('pajak')->insert($data);
            }

            $x = DB::table('neraca')->where('UserId', $userid)->pluck('UserId');
            if($x > 0){
                $data = array(
                                'ActivaLancarCk'        => $ActivaLancarCk,
                                'ActivaTetapCk'         => $ActivaTetapCk,
                                'TotalActivaLancarCk'   => $TotalActivaLancarCk,
                                'UtangJangkaPendekCk'   => $UtangJangkaPendekCk,
                                'UtangJangkaPanjangCk'  => $UtangJangkaPanjangCk,
                                'TotalKekayaanCk'       => $TotalKekayaanCk,
                                'AuditorCk'             => $AuditorCk,
                              );
                $j = DB::table('neraca')->where('UserId',$userid)->update($data);

            } else {
                $data = array(
                                'UserId'                => $userid,
                                'ActivaLancarCk'        => $ActivaLancarCk,
                                'ActivaTetapCk'         => $ActivaTetapCk,
                                'TotalActivaLancarCk'   => $TotalActivaLancarCk,
                                'UtangJangkaPendekCk'   => $UtangJangkaPendekCk,
                                'UtangJangkaPanjangCk'  => $UtangJangkaPanjangCk,
                                'TotalKekayaanCk'       => $TotalKekayaanCk,
                                'AuditorCk'             => $AuditorCk,
                              );
                $j = DB::table('neraca')->insert($data);
            }

            $data2 = array( 'Status'  => $enedit);
                $j = DB::table('hasilverifikasi')->where('UserId',$userid)->update($data2);

            if(!is_null($i) && !is_null($j)){
              if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => \Session::get('adminid'),
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Edit detail keuangan perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
              return redirect('editdcpt');
            } else {
              return back();
            }
        }
    }

    /*public function savedetailkortambang(Request $request){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['Id']))
                $Id = '';
            else
                $Id = $_POST['Id'];

            if(!isset($_POST['BDerajatCk']))
                $BDerajatCk = '';
            else
                $BDerajatCk = $_POST['BDerajatCk'];

            if(!isset($_POST['BMenitCk']))
                $BMenitCk = '';
            else
                $BMenitCk = $_POST['BMenitCk'];

            if(!isset($_POST['BDetikCk']))
                $BDetikCk = '';
            else
                $BDetikCk = $_POST['BDetikCk'];

            if(!isset($_POST['LDerajatCk']))
                $LDerajatCk = '';
            else
                $LDerajatCk = $_POST['LDerajatCk'];

            if(!isset($_POST['LMenitCk']))
                $LMenitCk = '';
            else
                $LMenitCk = $_POST['LMenitCk'];

            if(!isset($_POST['LDetikCk']))
                $LDetikCk = '';
            else
                $LDetikCk = $_POST['LDetikCk'];

            $data = array(
                    'BDerajatCk'               => $BDerajatCk,
                    'BMenitCk'                 => $BMenitCk,
                    'BDetikCk'                 => $BDetikCk,
                    'LDerajatCk'               => $LDerajatCk,
                    'LMenitCk'                 => $LMenitCk,
                    'LDetikCk'                 => $LDetikCk,
                  );

            $i = DB::table('datakoordinatjetty')->where('Id',$Id)->update($data);          

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
    }*/

}
