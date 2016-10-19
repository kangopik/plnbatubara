<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HasilController extends Controller
{
	public function hasilvendor($id, $tipe){
        \Session::put('idvendor',$id);

        if($tipe == 'IJIN'){
            return Redirect('HasilAdministrasi');
        }else if($tipe == 'KEUANGAN'){
            return Redirect('HasilKeuangan');
        }else if($tipe == 'TEKNIS'){
            return Redirect('HasilTeknis');
        }
    }

	public function hasiladministrasi(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
        	$userid = \Session::get('idvendor');

            $hitung = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->count();

            if($hitung < 1){
                $result = (object) array(
                                            'Nama'                  => null,
                                            'BadanUsaha'            => null,
                                            'StatusPerusahaan'      => null,
                                            'Alamat'                => null,
                                            'TlpKantor'             => null,
                                            'FaxKantor'             => null,
                                            'Email'                 => null,
                                            'Website'               => null,
                                            'DirekturUtama'         => null,
                                            'ContactPerson'         => null,
                                            'TlpContactPerson'      => null,
                                            'EmailContactPerson'    => null,
                                         );
            } else {
                $result = DB::table('dataadministrasiperusahaan')->where('UserId', $userid)->first();
            }

            return view('hasil.hasiladministrasi')->with('data', $result);
      	}
    }

    public function hasilkeuangan(){
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
                                                'NoRekening'             => null,
                                                'NamaBank'             => null,
                                                'NomorBuktiPelunasan'   => null,
                                                'TglBuktiPelunasan'     => null,
                                                'NomorLaporanBulanan'   => null,
                                                'NomorLaporanBulanan2'   => null,
                                                'NomorLaporanBulanan2'   => null,
                                                'TglLaporanBulanan'     => null,
                                                'TglLaporanBulanan2'     => null,
                                                'TglLaporanBulanan2'     => null,
                                              );
            } else {
                $resultPajak = DB::table('pajak')->where('UserId',$userid)->first();
            }

            if($hitung2 < 1 ){
                $resultNeraca = (object) array(
                                                'ActivaLancar'          => null,
                                                'ActivaTetap'           => null,
                                                'TotalActivaLancar'     => null,
                                                'UtangJangkaPendek'     => null,
                                                'UtangJangkaPanjang'    => null,
                                                'TotalKekayaan'         => null,
                                                'Auditor'               => null,
                                               );
            } else {
                $resultNeraca = DB::table('neraca')->where('UserId',$userid)->first();
            }

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();

            $resultvendor = DB::table('vendor')->where('UserId',$userid)->first();

            return view('hasil.hasilkeuangan')->with('data1',$resultSaham)->with('data2',$resultPajak)->with('data3',$resultNeraca)
                                    ->with('data4',$result2)->with('datavendor',$resultvendor);
        }
    }

    public function hasilperijinan(){
    	$userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
        	$hitung = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->count();
             if ($hitung < 1 ) {
                $result = (object) array(
                                            'NomorAkta'                         => null,
                                            'TanggalAkta'                       => null,
                                            'NamaNotaris'                       => null,
                                            'NomorAktaPerubahan'                => null,
                                            'TanggalAktaPerubahan'              => null,
                                            'NamaNotarisPerubahan'              => null,
                                            'NomorPengesahanKemenhumkam'        => null,
                                            'TanggalPengesahanKemenhumkam'      => null,
                                            'NomorPengesahanKemenhumkamPerubahan'        => null,
                                            'TanggalPengesahanKemenhumkamPerubahan'      => null,
                                            'NomorSertifikat'                   => null,
                                            'TanggalSertifikat'                 => null,
                                            'MasaBerlakuSertifikat'             => null,
                                            'PenerbitSIUP'                      => null,
                                            'PenerbitTDP'                       => null,   
                                            'PenerbitSKDP'                     	=> null,
                                            'NomorSIUP'                   		=> null,
                                            'NomorTDP'                   		=> null,
                                            'NomorSKDP'                         => null,
                                            'TanggalSIUP'   => null,
                                            'TanggalTDP'    => null,
                                            'TanggalSKDP'   => null,
                                            'TanggalSdSIUP' => null,
                                            'TanggalSdTDP'  => null,
                                            'TanggalSdSKDP' => null,
                                         );
            } else {
                $result = DB::table('legalitasperijinanperusahaan')->where('UserId', $userid)->first();
            }

            $result2 = DB::table('dataadministrasiperusahaan')->select('Nama','BadanUsaha')->where('UserId', $userid)->first();
            $resultDireksi = DB::table('direksiperusahaan')->where('UserId',$userid)->get();
            $resultDireksiPerubahan = DB::table('direksiperusahaanperubahan')->where('UserId',$userid)->get();
            $resultKomisaris = DB::table('komisarisperusahaan')->where('UserId',$userid)->get();
            $resultKomisarisPerubahan = DB::table('komisarisperusahaanperubahan')->where('UserId',$userid)->get();

            return view('hasil.hasilperijinan')->with('data',$result)->with('data2',$result2)
                                                 ->with('datadireksi',$resultDireksi)->with('datadireksiperubahan',$resultDireksiPerubahan)
                                                 ->with('datakomisaris',$resultKomisaris)->with('datakomisarisperubahan',$resultKomisarisPerubahan);
        }
    }

    public function hasilijintambang(){
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
                                        'Tanggal'               => null,
                                        'JangkaWaktu'           => null,
                                        'Menerbitkan'           => null,
                                        'Dirut'                 => null,
                                        'Komisaris'             => null,
                                        'NoCnc'                 => null,
                                        'LampiranPeta'          => null,
                                        'LampiranKoordinat'     => null,
                                      );
            }else{
                $result1 = DB::table('iupop')->where('UserId', $userid)->first();
            }

            if($hitung2 < 1){
            $result2 = (object) array(
                                        'No'                        => null,
                                        'Tanggal'                   => null,
                                        'JangkaWaktu'               => null,
                                        'Menerbitkan'               => null,
                                        'WilayahPengangkutan'       => null,
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
                                        'Tanggal'                   => null,
                                        'JangkaWaktu'               => null,
                                        'Menerbitkan'               => null,
                                        'WilayahPengangkutan'       => null,
                                    );
            }else{
                $result7 = DB::table('iupopkhusus2')->where('UserId', $userid)->first();
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

            if($hitung5 < 1){
                $result9 = null;
            }else{
                $result9 = DB::table('pkp2b')->where('UserId', $userid)->get();
            }

            $result5 = DB::table('vendor')->select('PersetujuanVerifikasi')->where('UserId','=',$userid)->first();

            $result6 = DB::table('sumbertambang')->where('UserId','=',$userid)->get();
            $result8 = DB::table('sumbertambang2')->where('UserId',$userid)->get();

            $resultDireksi = DB::table('direksiperusahaan')->where('UserId',$userid)->get();
            $resultKomisaris = DB::table('komisarisperusahaan')->where('UserId',$userid)->get();

            return view('hasil.hasilijintambang')
                        ->with('data',$result)->with('data1',$result1)->with('data2',$result2)
                        ->with('data3',$result3)->with('data4',$result4)->with('data5',$result5)
                        ->with('data6',$result6)->with('data7',$result7)->with('data8',$result8)->with('data9',$result9)
                        ->with('datadireksi',$resultDireksi)->with('datakomisaris',$resultKomisaris);
        }
    }

    public function hasilteknis(){
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

            return view('hasil.hasilteknis')->with('data',$result)
                    ->with('data2', $result2)->with('data3', $result3)->with('data4', $result4)
                    ->with('datacount1', $count1)->with('datacount2', $count2);
        }
    }

    public function hasilteknisvendor($sumber){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            \Session::put('sumbertambangvendor',$sumber);
            return redirect('HasilDataTambang');
        }
    }

    public function hasildatatambang(){
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
            
            return view('hasil.hasildatatambang')->with('data', $result)->with('data1', $result1)->with('data2', $result2)
                                                ->with('dataProvinsi', $resultProvinsi)->with('dataKota', $resultKota)->with('dataKecamatan', $resultKecamatan)
                                                ->with('dataKelurahan', $resultKelurahan)->with('dataKoor', $resultKoor);
        }
    }

    public function hasildatakapasitasproduksi(){
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

            return view('hasil.hasildatakapasitasproduksi')->with('data', $result)->with('data1', $result1)
                                            ->with('data2', $result2)->with('data3', $result3);
        }
    }

    public function hasildataeksplorasi(){
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

            return view('hasil.hasildataeksplorasi')->with('data', $result)->with('data1', $result1)
                                            ->with('data2', $result2);
        }
    }

    public function hasildatastockpile(){
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

            return view('hasil.hasildatastockpile')->with('data', $result)->with('data1', $result1);
        }
    }

    public function hasildatajetty(){
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

            return view('hasil.hasildatajetty')->with('data', $result)->with('data1', $result1)->with('data2', $result2)
                                                ->with('dataProvinsi', $resultProvinsi)->with('dataKota', $resultKota)
                                                ->with('dataKecamatan', $resultKecamatan)->with('dataKelurahan', $resultKelurahan);
        }
    }

    public function hasilkoorjetty($id){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
          alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            \Session::put('idjetvendor',$id);
            return redirect('HasilKoordinatJetty');
        }
    }

    public function hasilkoordinatjetty(){
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

            $idjet = \Session::get('idjetvendor');
            $resultKoor = DB::table('datakoordinatjetty')->where('IdJetty',$idjet)->get();

            return view('hasil.hasilkoordinatjetty')->with('data', $result)->with('dataKoor', $resultKoor);
        }
    }

}