<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EntryController extends Controller
{
    public function entryduevendor($id,$alamat){
        \Session::put('idvendor',$id);
        \Session::put('alamatlokasi',$alamat);
        return Redirect('EntryDataTambang');
    }   

    public function entrydatatambang(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{

        $alamat = \Session::get('alamatlokasi');
        $hitung = DB::table('datateknistambang')->where('UserId', $userid)->where('Alamat', $alamat)->count();

        if($hitung < 1){
            $result1 = (object) array(
                                        'Alamat'                        => null,
                                        'Propinsi'                      => null,
                                        'Kabupaten'                     => null,
                                        'LuasAreaTambang'               => null,
                                        'PerkiraanVolumeCadangan'       => null,
                                        'KapasitasProduksi'             => null,
                                        'KapasitasStockPile'            => null,
                                        'JarakTempuh'                   => null,
                                        'AksesPengangkut'               => null,
                                        'JenisTransportasi'             => null,
                                        'KapasitasPengangkutan'         => null,
                                        'KapasitasStockPilePelabuhan'   => null,
                                     );
        } else {
            $result1 = DB::table('datateknistambang')->where('UserId', $userid)->where('Alamat', $alamat)->first();
        }        

        $result2 = DB::table('provinsi')->get();
        $result3 = DB::table('kabupatenkota')->get();

        $hitung4 = DB::table('hasildatateknistambang')->where('UserId', $userid)->where('AlamatAsal', $alamat)->count();

        if($hitung4 < 1){
            $result4 = (object) array(
                                        'Alamat'                        => null,
                                        'Propinsi'                      => null,
                                        'Kabupaten'                     => null,
                                        'LuasAreaTambang'               => null,
                                        'PerkiraanVolumeCadangan'       => null,
                                        'JenisIjinTambang'              => null,
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
                                     );
        } else {
            $result4 = DB::table('hasildatateknistambang')->where('UserId', $userid)->where('AlamatAsal', $alamat)->first();
        }

        $resultjenisijin = DB::table('legalitasperijinantambang')->where('UserId', $userid)->first();
        if(!is_null($resultjenisijin)){
            if($resultjenisijin->JenisIjin == "IUPOP"){
                $resultisiijin = DB::table('iupop')->select('No','Tanggal','JangkaWaktu')->where('UserId', $userid)->first();
            }
            if($resultjenisijin->JenisIjin == "IUPOPK"){
                $resultisiijin = DB::table('iupopkhusus')->select('No','Tanggal','JangkaWaktu')->where('UserId', $userid)->first();
            }
        }else{
            $resultisiijin = (object) array(
                                                'No'            => null,
                                                'Tanggal'       => null,
                                                'JangkaWaktu'   => null,
                                            );
        }

        $resultkoordinat = DB::table('koordinattambang')
                            ->leftjoin('hasilkoordinattambang','koordinattambang.IdKoordinat','=','hasilkoordinattambang.IdKoordinatHsl')
                            ->where('koordinattambang.UserId','=',$userid)
                            ->where('koordinattambang.Alamat','=',$alamat)->get();

        return view('entry.entrydatatambang')->with('data',$result1)->with('data2', $result2)
                    ->with('data3', $result3)->with('data4', $result4)->with('datajenisijin',$resultjenisijin)
                    ->with('dataisiijin',$resultisiijin)->with('datakoordinat',$resultkoordinat);
        }
    }

    public function entrykualitasbatubara(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
            alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            $alamat = \Session::get('alamatlokasi');
            $hitung = DB::table('spesifikasitambang')->where('UserId', $userid)->where('Alamat', $alamat)->count();

            if($hitung < 1){
                $result = (object) array(
                                        'TotalMoistureAR'               => null,
                                        'TotalMoistureADB'              => null,
                                        'TotalMoistureDB'               => null,
                                        'TotalMoistureDAFB'             => null,
                                        'TotalMoistureMethod'           => null,
                                        'ProximateMoistureAR'           => null,
                                        'ProximateMoistureADB'          => null,
                                        'ProximateMoistureDB'           => null,
                                        'ProximateMoistureDAFB'         => null,
                                        'ProximateMoistureMethod'       => null,
                                        'AshContentAR'                  => null,
                                        'AshContentADB'                 => null,
                                        'AshContentDB'                  => null,
                                        'AshContentDAFB'                => null,
                                        'AshContentMethod'              => null,
                                        'VolatileAR'                    => null,
                                        'VolatileADB'                   => null,
                                        'VolatileDB'                    => null,
                                        'VolatileDAFB'                  => null,
                                        'VolatileMethod'                => null,
                                        'FixedCarbonAR'                 => null,
                                        'FixedCarbonADB'                => null,
                                        'FixedCarbonDB'                 => null,
                                        'FixedCarbonDAFB'               => null,
                                        'FixedCarbonMethod'             => null, 
                                        'TotalSulphurAR'                => null,
                                        'TotalSulphurADB'               => null,
                                        'TotalSulphurDB'                => null,
                                        'TotalSulphurDAFB'              => null,
                                        'TotalSulphurMethod'            => null,
                                        'GrossCarolicValveAR'           => null,
                                        'GrossCarolicValveADB'          => null,
                                        'GrossCarolicValveDB'           => null,
                                        'GrossCarolicValveDAFB'         => null,
                                        'GrossCarolicValveMethod'       => null,
                                        'HGI'                           => null,
                                        'HGIMethod'                     => null,
                                        'SizeTestFractionAR'            => null,
                                        'SizeTestFractionADB'           => null,
                                        'SizeTestFractionDB'            => null,
                                        'SizeTestFractionDAFB'          => null,
                                        'SizeTestFractionMethod'        => null,
                                        'SizeTestPersenAR'              => null,
                                        'SizeTestPersenADB'             => null,
                                        'SizeTestPersenDB'              => null,
                                        'SizeTestPersenDAFB'            => null,
                                        'SizeTestPersenMethod'          => null,
                                        'InitialAR'                     => null,
                                        'InitialADB'                    => null,
                                        'InitialDB'                     => null,
                                        'InitialDAFB'                   => null,
                                        'InitialMethod'                 => null,                                  
                                        'SphericalAR'                   => null,
                                        'SphericalADB'                  => null,
                                        'SphericalDB'                   => null,
                                        'SphericalDAFB'                 => null,
                                        'SphericalMethod'               => null,
                                        'HemisphericalAR'               => null,
                                        'HemisphericalADB'              => null,
                                        'HemisphericalDB'               => null,
                                        'HemisphericalDAFB'             => null,
                                        'HemisphericalMethod'           => null,
                                        'FluidizedAR'                   => null,
                                        'FluidizedADB'                  => null,
                                        'FluidizedDB'                   => null,
                                        'FluidizedDAFB'                 => null,
                                        'FluidizedMethod'               => null,
                                        'Surveyor'                      => null,
                                         );
            } else {
                $result = DB::table('spesifikasitambang')
                        ->join('vendor','spesifikasitambang.UserId','=','vendor.UserId')
                        ->where('spesifikasitambang.UserId', $userid)
                        ->where('spesifikasitambang.Alamat', $alamat)
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

            $result2 = DB::table('vendor')->select('PersetujuanVerifikasi')->where('UserId',$userid)->first();

            return view('entry.entrykualitasbatubara')->with('data', $result)
                        ->with('data4',$result4)->with('data2',$result2);        
        }
    }

    public function entrydatasarana(){
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

        $hitung2 = DB::table('hasilsaranapengangkut')->where('UserId', $userid)->count();

        if($hitung2 < 1){
            $result2 = (object) array(
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
            $result2 = DB::table('hasilsaranapengangkut')->where('UserId', $userid)->first();
        }

        return view('entry.entrydatasarana')->with('data',$result)->with('data2',$result2);
        }
    }

    public function saveentrydatatambang(Request $request){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['alamat']))
            $alamat = '';
        else
            $alamat = $_POST['alamat'];

        if(!isset($_POST['alamatasal']))
            $alamatasal = '';
        else
            $alamatasal = $_POST['alamatasal'];

        if(!isset($_POST['propinsi']))
            $propinsi = '';
        else
            $propinsi = $_POST['propinsi'];

        if(!isset($_POST['kabupaten']))
            $kabupaten = '';
        else
            $kabupaten = $_POST['kabupaten'];

        if(!isset($_POST['luastambang']))
            $luastambang = '';
        else
            $luastambang = $_POST['luastambang'];

        if(!isset($_POST['perkiraanvolumecadangan']))
            $perkiraanvolumecadangan = '';
        else
            $perkiraanvolumecadangan = $_POST['perkiraanvolumecadangan'];

        if(!isset($_POST['nomorijin']))
            $nomorijin = '';
        else
            $nomorijin = $_POST['nomorijin'];

        if(!isset($_POST['tanggalijin']))
            $tanggalijin = '';
        else
            if ($_POST['tanggalijin']=="")
               $tanggalijin = null;
            else
                $tanggalijin = date("Y-m-d", strtotime($_POST['tanggalijin']));

        if(!isset($_POST['masaberlakuijin']))
            $masaberlakuijin = '';
        else
            if ($_POST['masaberlakuijin']=="")
               $masaberlakuijin = null;
            else
                $masaberlakuijin = $_POST['masaberlakuijin'];

        if(!isset($_POST['kapasitasproduksi']))
            $kapasitasproduksi = '';
        else
            $kapasitasproduksi = $_POST['kapasitasproduksi'];

        if(!isset($_POST['kapasitasstockpile']))
            $kapasitasstockpile = '';
        else
            $kapasitasstockpile = $_POST['kapasitasstockpile'];

        if(!isset($_POST['jaraktempuh']))
            $jaraktempuh = '';
        else
            $jaraktempuh = $_POST['jaraktempuh'];

        if(!isset($_POST['aksespengangkut']))
            $aksespengangkut = '';
        else
            $aksespengangkut = $_POST['aksespengangkut'];

        if(!isset($_POST['jenistransportasi']))
            $jenistransportasi = '';
        else
            $jenistransportasi = $_POST['jenistransportasi'];

        if(!isset($_POST['kapasitaspengangkutan']))
            $kapasitaspengangkutan = '';
        else
            $kapasitaspengangkutan = $_POST['kapasitaspengangkutan'];

        if(!isset($_POST['kapasitasstockpilepelabuhan']))
            $kapasitasstockpilepelabuhan = '';
        else
            $kapasitasstockpilepelabuhan = $_POST['kapasitasstockpilepelabuhan'];

        $result = DB::table('hasildatateknistambang')->where('UserId','=',$userid)->where('AlamatAsal',$alamatasal)->first();
        if(is_null($result)){
            $data = array(
                        'UserId'                        => $userid,
                        'Alamat'                        => $alamat,
                        'AlamatAsal'                    => $alamatasal,
                        'Kabupaten'                     => $kabupaten,
                        'Propinsi'                      => $propinsi,
                        'LuasAreaTambang'               => $luastambang,
                        'PerkiraanVolumeCadangan'       => $perkiraanvolumecadangan,
                        'NomorIjin'                     => $nomorijin,
                        'TanggalIjin'                   => $tanggalijin,
                        'MasaBerlakuIjin'               => $masaberlakuijin,
                        'KapasitasProduksi'             => $kapasitasproduksi,
                        'KapasitasStockPile'            => $kapasitasstockpile,
                        'JarakTempuh'                   => $jaraktempuh,
                        'AksesPengangkut'               => $aksespengangkut,
                        'JenisTransportasi'             => $jenistransportasi,
                        'KapasitasPengangkutan'         => $kapasitaspengangkutan,
                        'KapasitasStockPilePelabuhan'   => $kapasitasstockpilepelabuhan,
                      );
            $i = DB::table('hasildatateknistambang')->insert($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil data teknis',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }

        } else {
            $data = array(
                        'Alamat'                        => $alamat,
                        'Kabupaten'                     => $kabupaten,
                        'Propinsi'                      => $propinsi,
                        'LuasAreaTambang'               => $luastambang,
                        'PerkiraanVolumeCadangan'       => $perkiraanvolumecadangan,
                        'NomorIjin'                     => $nomorijin,
                        'TanggalIjin'                   => $tanggalijin,
                        'MasaBerlakuIjin'               => $masaberlakuijin,
                        'KapasitasProduksi'             => $kapasitasproduksi,
                        'KapasitasStockPile'            => $kapasitasstockpile,
                        'JarakTempuh'                   => $jaraktempuh,
                        'AksesPengangkut'               => $aksespengangkut,
                        'JenisTransportasi'             => $jenistransportasi,
                        'KapasitasPengangkutan'         => $kapasitaspengangkutan,
                        'KapasitasStockPilePelabuhan'   => $kapasitasstockpilepelabuhan,
                      );
            $i = DB::table('hasildatateknistambang')->where('UserId','=',$userid)->where('AlamatAsal','=',$alamatasal)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil data teknis',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }
        }
        }
    }

    public function saveentrykualitastambang(Request $request){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['tm']))
            $tm = '';
        else
            $tm = $_POST['tm'];

        if(!isset($_POST['im']))
            $im = '';
        else
            $im = $_POST['im'];

        if(!isset($_POST['ac']))
            $ac = '';
        else
            $ac = $_POST['ac'];

        if(!isset($_POST['vol']))
            $vol = '';
        else
            $vol = $_POST['vol'];

        if(!isset($_POST['fc']))
            $fc = '';
        else
            $fc = $_POST['fc'];

        if(!isset($_POST['ts']))
            $ts = '';
        else
            $ts = $_POST['ts'];

        if(!isset($_POST['gcv']))
            $gcv = '';
        else
            $gcv = $_POST['gcv'];

        if(!isset($_POST['car']))
            $car = '';
        else
            $car = $_POST['car'];

        if(!isset($_POST['hyd']))
            $hyd = '';
        else
            $hyd = $_POST['hyd'];

        if(!isset($_POST['sul']))
            $sul = '';
        else
            $sul = $_POST['sul'];

        if(!isset($_POST['nit']))
            $nit = '';
        else
            $nit = $_POST['nit'];

        if(!isset($_POST['oxy']))
            $oxy = '';
        else
            $oxy = $_POST['oxy'];

        if(!isset($_POST['hgi']))
            $hgi = '';
        else
            $hgi = $_POST['hgi'];

        if(!isset($_POST['butir1']))
            $butir1 = '';
        else
            $butir1 = $_POST['butir1'];

        if(!isset($_POST['butir2']))
            $butir2 = '';
        else
            $butir2 = $_POST['butir2'];

        if(!isset($_POST['masaberlaku']))
            $masaberlaku = '';
        else
            $masaberlaku = $_POST['masaberlaku'];

        if(!isset($_POST['sil']))
            $sil = '';
        else
            $sil = $_POST['sil'];

        if(!isset($_POST['al']))
            $al = '';
        else
            $al = $_POST['al'];

        if(!isset($_POST['fo']))
            $fo = '';
        else
            $fo = $_POST['fo'];

        if(!isset($_POST['so']))
            $so = '';
        else
            $so = $_POST['so'];

        if(!isset($_POST['mag']))
            $mag = '';
        else
            $mag = $_POST['mag'];

        if(!isset($_POST['po']))
            $po = '';
        else
            $po = $_POST['po'];

        if(!isset($_POST['st']))
            $st = '';
        else
            $st = $_POST['st'];

        if(!isset($_POST['td']))
            $td = '';
        else
            $td = $_POST['td'];

        if(!isset($_POST['pp']))
            $pp = '';
        else
            $pp = $_POST['pp'];

        if(!isset($_POST['sf']))
            $sf = '';
        else
            $sf = $_POST['sf'];

        if(!isset($_POST['ff']))
            $ff = '';
        else
            $ff = $_POST['ff'];

        if(!isset($_POST['id']))
            $id = '';
        else
            $id = $_POST['id'];

        if(!isset($_POST['sof']))
            $sof = '';
        else
            $sof = $_POST['sof'];

        if(!isset($_POST['flu']))
            $flu = '';
        else
            $flu = $_POST['flu'];

        $result = DB::table('hasilspesifikasibatubara')->where('UserId','=',$userid)->first();
        if(is_null($result)){
            $data = array(
                                    'UserId'                => $userid,
                                    'TotalMoisture'         => $tm,
                                    'InhernMoisture'        => $im,
                                    'AshContent'            => $ac,
                                    'Volatile'              => $vol,
                                    'FixedCarbon'           => $fc,
                                    'TotalSulphur'          => $ts,
                                    'GrossCarolicValve'     => $gcv,
                                    'Carbon'                => $car,
                                    'Hydrogen'              => $hyd,
                                    'Sulphur'               => $sul,
                                    'Nitrogen'              => $nit,
                                    'Oxygen'                => $oxy,
                                    'Hgi'                   => $hgi,
                                    'Butir1'                => $butir1,
                                    'Butir2'                => $butir2,
                                    'MasaBerlaku'           => $masaberlaku,
                                    'Silica'                => $sil,
                                    'Alumina'               => $al,
                                    'FerricOxide'           => $fo,
                                    'SodiumOxide'           => $so,
                                    'Magnesia'              => $mag,
                                    'PotasiumOxide'         => $po,
                                    'SulphurTrioxide'       => $st,
                                    'TitaniumDioxide'       => $td,
                                    'PhospatePentoxide'     => $pp,
                                    'SligingFactor'         => $sf,
                                    'FoulingFactor'         => $ff,
                                    'InitialDeformation'    => $id,
                                    'Softening'             => $sof,
                                    'Fluide'                => $flu,
                      );
            $i = DB::table('hasilspesifikasibatubara')->insert($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil spesifikasi tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }

        } else {
            $data = array(
                                    'TotalMoisture'         => $tm,
                                    'InhernMoisture'        => $im,
                                    'AshContent'            => $ac,
                                    'Volatile'              => $vol,
                                    'FixedCarbon'           => $fc,
                                    'TotalSulphur'          => $ts,
                                    'GrossCarolicValve'     => $gcv,
                                    'Carbon'                => $car,
                                    'Hydrogen'              => $hyd,
                                    'Sulphur'               => $sul,
                                    'Nitrogen'              => $nit,
                                    'Oxygen'                => $oxy,
                                    'Hgi'                   => $hgi,
                                    'Butir1'                => $butir1,
                                    'Butir2'                => $butir2,
                                    'MasaBerlaku'           => $masaberlaku,
                                    'Silica'                => $sil,
                                    'Alumina'               => $al,
                                    'FerricOxide'           => $fo,
                                    'SodiumOxide'           => $so,
                                    'Magnesia'              => $mag,
                                    'PotasiumOxide'         => $po,
                                    'SulphurTrioxide'       => $st,
                                    'TitaniumDioxide'       => $td,
                                    'PhospatePentoxide'     => $pp,
                                    'SligingFactor'         => $sf,
                                    'FoulingFactor'         => $ff,
                                    'InitialDeformation'    => $id,
                                    'Softening'             => $sof,
                                    'Fluide'                => $flu,
                      );
            $i = DB::table('hasilspesifikasibatubara')->where('UserId','=',$userid)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil spesifikasi tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }
        }
        }
    }

    public function saveentrydatasarana(Request $request){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['jenisperalatan']))
            $jenisperalatan = '';
        else
            $jenisperalatan = $_POST['jenisperalatan'];

        if(!isset($_POST['kapasitasmaksimumkapal']))
            $kapasitasmaksimumkapal = '';
        else
            $kapasitasmaksimumkapal = $_POST['kapasitasmaksimumkapal'];

        if(!isset($_POST['kapasitasloading']))
            $kapasitasloading = '';
        else
            $kapasitasloading = $_POST['kapasitasloading'];

        if(!isset($_POST['tahunpembuatan']))
            $tahunpembuatan = '';
        else
            $tahunpembuatan = $_POST['tahunpembuatan'];

        if(!isset($_POST['kapasitasangkut']))
            $kapasitasangkut = '';
        else
            $kapasitasangkut = $_POST['kapasitasangkut'];

        if(!isset($_POST['kondisi']))
            $kondisi = '';
        else
            $kondisi = $_POST['kondisi'];

        $result = DB::table('hasilsaranapengangkut')->where('UserId','=',$userid)->first();
        if(is_null($result)){
            $data = array(
                            'UserId'                    => $userid,
                            'JenisPeralatan'            => $jenisperalatan,
                            'KapasitasMaksimumKapal'    => $kapasitasmaksimumkapal,
                            'KapasitasLoading'          => $kapasitasloading,
                            'TahunPembuatan'            => $tahunpembuatan,
                            'KapasitasAngkut'           => $kapasitasangkut,
                            'Kondisi'                   => $kondisi,
                      );
            $i = DB::table('hasilsaranapengangkut')->insert($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil sarana Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }

        } else {
            $data = array(
                            'JenisPeralatan'            => $jenisperalatan,
                            'KapasitasMaksimumKapal'    => $kapasitasmaksimumkapal,
                            'KapasitasLoading'          => $kapasitasloading,
                            'TahunPembuatan'            => $tahunpembuatan,
                            'KapasitasAngkut'           => $kapasitasangkut,
                            'Kondisi'                   => $kondisi,
                      );
            $i = DB::table('hasilsaranapengangkut')->where('UserId','=',$userid)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil sarana Perusahaan',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }
        }
        }
    }

    public function evalpenawaran($id){
        \Session::put('idvendor',$id);
        return Redirect('EntryPenawaran');
    }

    public function entrypenawaran(){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $userid = \Session::get('idvendor');

        $hitung = DB::table('evaluasipenawaran')->where('UserId', $userid)->count();

        if($hitung < 1){
            $result = (object) array(
                                        'TotalMoisture'        => null,
                                        'TotalSulphur'         => null,
                                        'GrossCaloricValue'    => null,
                                        'HGI'                  => null,
                                        'UkuranButiran'        => null,
                                        'HargaBatubara'        => null,
                                        'BiayaAngkutan'        => null,
                                        'HargaStockpile'       => null,
                                     );
        } else {
            $result = DB::table('evaluasipenawaran')->where('UserId', $userid)->first();
        }   

        $result2 = DB::table('dataadministrasiperusahaan')
                  ->select('dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.Alamat','dataadministrasiperusahaan.BadanUsaha')
                  ->where('UserId','=',$userid)
                  ->first();

        return view('entry.entrypenawaran')->with('data',$result)->with('data2',$result2);
        }
    }

    public function saveentrypenawaran(Request $request){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['TotalMoisture']))
            $TotalMoisture = '';
        else
            $TotalMoisture = $_POST['TotalMoisture'];

        if(!isset($_POST['TotalSulphur']))
            $TotalSulphur = '';
        else
            $TotalSulphur = $_POST['TotalSulphur'];

        if(!isset($_POST['GrossCaloricValue']))
            $GrossCaloricValue = '';
        else
            $GrossCaloricValue = $_POST['GrossCaloricValue'];

        if(!isset($_POST['HGI']))
            $HGI = '';
        else
            $HGI = $_POST['HGI'];

        if(!isset($_POST['UkuranButiran']))
            $UkuranButiran = '';
        else
            $UkuranButiran = $_POST['UkuranButiran'];

        if(!isset($_POST['HargaBatubara']))
            $HargaBatubara = '';
        else
            $HargaBatubara = $_POST['HargaBatubara'];

        if(!isset($_POST['BiayaAngkutan']))
            $BiayaAngkutan = '';
        else
            $BiayaAngkutan = $_POST['BiayaAngkutan'];

        if(!isset($_POST['HargaStockpile']))
            $HargaStockpile = '';
        else
            $HargaStockpile = $_POST['HargaStockpile'];

        $result = DB::table('evaluasipenawaran')->where('UserId','=',$userid)->first();
        if(is_null($result)){
            $data = array(
                            'UserId'            => $userid,
                            'TotalMoisture'     => $TotalMoisture,
                            'TotalSulphur'      => $TotalSulphur,
                            'GrossCaloricValue' => $GrossCaloricValue,
                            'HGI'               => $HGI,
                            'UkuranButiran'     => $UkuranButiran,
                            'HargaBatubara'     => $HargaBatubara,
                            'BiayaAngkutan'     => $BiayaAngkutan,
                            'HargaStockpile'    => $HargaStockpile,
                      );
            $i = DB::table('evaluasipenawaran')->insert($data);

            $data = array('StatusHasilPenawaran' => 'Y');
            $i = DB::table('vendor')->where('UserId',$userid)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan evaluasi penawaran',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return Redirect('evaluasipenawaran');
            }

        } else {
            $data = array(
                            'TotalMoisture'     => $TotalMoisture,
                            'TotalSulphur'      => $TotalSulphur,
                            'GrossCaloricValue' => $GrossCaloricValue,
                            'HGI'               => $HGI,
                            'UkuranButiran'     => $UkuranButiran,
                            'HargaBatubara'     => $HargaBatubara,
                            'BiayaAngkutan'     => $BiayaAngkutan,
                            'HargaStockpile'    => $HargaStockpile,
                      );
            $i = DB::table('evaluasipenawaran')->where('UserId','=',$userid)->update($data);

            $data = array('StatusHasilPenawaran' => 'Y');
            $i = DB::table('vendor')->where('UserId',$userid)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan evaluasi penawaran',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return Redirect('evaluasipenawaran');
            }
        }
        }
    }

    public function evalnegosiasi($id){
        \Session::put('idvendor',$id);
        return Redirect('EntryNegosiasi');
    }

    public function entrynegosiasi(){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $hitung = DB::table('evaluasipenawaran')->where('UserId', $userid)->count();

        if($hitung < 1){
            $result = (object) array(
                                        'TotalMoisture'        => null,
                                        'TotalSulphur'         => null,
                                        'GrossCaloricValue'    => null,
                                        'HGI'                  => null,
                                        'UkuranButiran'        => null,
                                        'HargaBatubara'        => null,
                                        'BiayaAngkutan'        => null,
                                        'HargaStockpile'       => null,
                                     );
        } else {
            $result = DB::table('evaluasipenawaran')->where('UserId', $userid)->first();
        }   

        $hitung1 = DB::table('hasilnegosiasi')->where('UserId', $userid)->count();

        if($hitung1 < 1){
            $result1 = (object) array(
                                        'TotalMoisture'        => null,
                                        'TotalSulphur'         => null,
                                        'GrossCaloricValue'    => null,
                                        'HGI'                  => null,
                                        'UkuranButiran'        => null,
                                        'HargaBatubara'        => null,
                                        'BiayaAngkutan'        => null,
                                        'HargaStockpile'       => null,
                                     );
        } else {
            $result1 = DB::table('hasilnegosiasi')->where('UserId', $userid)->first();
        }

        $result2 = DB::table('dataadministrasiperusahaan')
                  ->select('dataadministrasiperusahaan.Nama','dataadministrasiperusahaan.Alamat')
                  ->where('UserId','=',$userid)
                  ->first();

        return view('entry.entrynegosiasi')->with('data',$result)->with('data1',$result1)->with('data2',$result2);
        }   
    }

    public function saveentrynegosiasi(Request $request){
        $userid = \Session::get('idvendor');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        if(!isset($_POST['TotalMoisture']))
            $TotalMoisture = '';
        else
            $TotalMoisture = $_POST['TotalMoisture'];

        if(!isset($_POST['TotalSulphur']))
            $TotalSulphur = '';
        else
            $TotalSulphur = $_POST['TotalSulphur'];

        if(!isset($_POST['GrossCaloricValue']))
            $GrossCaloricValue = '';
        else
            $GrossCaloricValue = $_POST['GrossCaloricValue'];

        if(!isset($_POST['HGI']))
            $HGI = '';
        else
            $HGI = $_POST['HGI'];

        if(!isset($_POST['UkuranButiran']))
            $UkuranButiran = '';
        else
            $UkuranButiran = $_POST['UkuranButiran'];

        if(!isset($_POST['HargaBatubara']))
            $HargaBatubara = '';
        else
            $HargaBatubara = $_POST['HargaBatubara'];

        if(!isset($_POST['BiayaAngkutan']))
            $BiayaAngkutan = '';
        else
            $BiayaAngkutan = $_POST['BiayaAngkutan'];

        if(!isset($_POST['HargaStockpile']))
            $HargaStockpile = '';
        else
            $HargaStockpile = $_POST['HargaStockpile'];

        $result = DB::table('hasilnegosiasi')->where('UserId','=',$userid)->first();
        if(is_null($result)){
            $data = array(
                            'UserId'            => $userid,
                            'TotalMoisture'     => $TotalMoisture,
                            'TotalSulphur'      => $TotalSulphur,
                            'GrossCaloricValue' => $GrossCaloricValue,
                            'HGI'               => $HGI,
                            'UkuranButiran'     => $UkuranButiran,
                            'HargaBatubara'     => $HargaBatubara,
                            'BiayaAngkutan'     => $BiayaAngkutan,
                            'HargaStockpile'    => $HargaStockpile,
                      );
            $i = DB::table('hasilnegosiasi')->insert($data);

            $data = array('StatusHasilNegosiasi' => 'Y');
            $i = DB::table('vendor')->where('UserId',$userid)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil negosiasi',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return Redirect('entrydatanegosiasi');
            }

        } else {
            $data = array(
                            'TotalMoisture'     => $TotalMoisture,
                            'TotalSulphur'      => $TotalSulphur,
                            'GrossCaloricValue' => $GrossCaloricValue,
                            'HGI'               => $HGI,
                            'UkuranButiran'     => $UkuranButiran,
                            'HargaBatubara'     => $HargaBatubara,
                            'BiayaAngkutan'     => $BiayaAngkutan,
                            'HargaStockpile'    => $HargaStockpile,
                      );
            $i = DB::table('hasilnegosiasi')->where('UserId','=',$userid)->update($data);

            $data = array('StatusHasilNegosiasi' => 'Y');
            $i = DB::table('vendor')->where('UserId',$userid)->update($data);

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Data');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Data');
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => \Session::get('adminid'),
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan hasil negosiasi',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return Redirect('entrydatanegosiasi');
            }
        }
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

    public function saveentrykoordinattambang(){
        $userid = \Session::get('idvendor');

        if(!isset($userid) || ($userid == '')){
           alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
            if(!isset($_POST['FIDHsl']))
                $FIDHsl = '';
            else
                $FIDHsl = $_POST['FIDHsl'];

            if(!isset($_POST['PointHsl']))
                $PointHsl = '';
            else
                $PointHsl = $_POST['PointHsl'];

            if(!isset($_POST['XHsl']))
                $XHsl = '';
            else
                $XHsl = $_POST['XHsl'];

            if(!isset($_POST['YHsl']))
                $YHsl = '';
            else
                $YHsl = $_POST['YHsl'];

            if(!isset($_POST['DirectionHsl']))
                $DirectionHsl = '';
            else
                $DirectionHsl = $_POST['DirectionHsl'];

            if(!isset($_POST['LengthHsl']))
                $LengthHsl = '';
            else
                $LengthHsl = $_POST['LengthHsl'];

            if(!isset($_POST['koordinatid']))
                $koordinatid = '';
            else
                $koordinatid = $_POST['koordinatid'];

            if(!isset($_POST['koordinatidhsl']))
                $koordinatidhsl = '';
            else
                $koordinatidhsl = $_POST['koordinatidhsl'];

            if(!isset($_POST['alamatkoordinat']))
                $alamatkoordinat = '';
            else
                $alamatkoordinat = $_POST['alamatkoordinat'];
            
            if(empty($koordinatidhsl)){
                $data = array(
                            'IdKoordinatHsl'        => $koordinatid,
                            'UserIdHsl'             => $userid,
                            'AlamatHsl'             => $alamatkoordinat,
                            'FIDHsl'                => $FIDHsl,
                            'PointHsl'              => $PointHsl,
                            'XHsl'                  => $XHsl,
                            'YHsl'                  => $YHsl,
                            'DirectionHsl'          => $DirectionHsl,
                            'LengthHsl'             => $LengthHsl,
                          );
                $i = DB::table('hasilkoordinattambang')->insert($data);
            }else{
                $data = array(
                            'FIDHsl'                => $FIDHsl,
                            'PointHsl'              => $PointHsl,
                            'XHsl'                  => $XHsl,
                            'YHsl'                  => $YHsl,
                            'DirectionHsl'          => $DirectionHsl,
                            'LengthHsl'             => $LengthHsl,
                          );
                $i = DB::table('hasilkoordinattambang')->where('UserIdHsl','=',$userid)
                                ->where('AlamatHsl','=',$alamatkoordinat)->where('IdKoordinatHsl','=',$koordinatid)
                                ->update($data);
            }

            if(is_null($i)){   
                alert()->error('GAGAL', 'Simpan Hasil Koordinat Tambang');
                return back();         
            }else{
                alert()->success('BERHASIL', 'Simpan Hasil Koordinat Tambang'); 
                $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $userid,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'Simpan Koordinat Tambang',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
                return back();
            }
        }
    }
    
}
