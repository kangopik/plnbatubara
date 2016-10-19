<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function login(){
        return view('home.login');
    }

    public function logout(){
        \Session::forget('vendorid');
        \Session::forget('adminid');
        \Session::forget('sumbertambang');
        \Session::forget('sumbertambangvendor');
        return redirect('/');
    }

    public function home(){
        $result = DB::table('pengumuman')
                  ->join('users','pengumuman.UserId','=','users.UserId')
                  ->select('pengumuman.Id','pengumuman.Header','pengumuman.Content','pengumuman.Tanggal',
                           'users.Nama')  
                  ->orderBy('pengumuman.Tanggal','DESC')->paginate(10);
        $daftar = \Session::get('daftar');
        
        if($daftar == 'Y'){
            \Session::forget('daftar');
            alert()->success('BERHASIL', 'Silahkan Cek Email Anda');
        }
        
        return view('home.home')->with('data',$result);
    }
    
    public function informasi(){
        return view('home.informasi');
    }

    public function pengumuman(){
        $result = DB::table('pengumuman')
                  ->join('users','pengumuman.UserId','=','users.UserId')
                  ->select('pengumuman.Id','pengumuman.Header','pengumuman.Content','pengumuman.Tanggal',
                           'users.Nama')  
                  ->orderBy('pengumuman.Tanggal','DESC')->paginate(10);
        return view('home.pengumuman')->with('data',$result);
    }

    public function daftar(){
        return view('vendors.pendaftaran.daftar');
    }

    public function persyaratan(){
        return view('home.persyaratan');
    }

    function cekNPWP($isinpwp){
        if(strlen($isinpwp) == 20)
        {
            if(substr($isinpwp,2,1) != '.')
            {
                return false;
            }
            else
            {
                if(substr($isinpwp,6,1) != '.')
                {
                    return false;
                }
                else
                {
                    if(substr($isinpwp,10,1) != '.')
                    {
                        return false;
                    }
                    else
                    {
                        if(substr($isinpwp,12,1) != '-')
                        {
                            return false;
                        } 
                        else
                        {
                            if(substr($isinpwp,16,1) != '.')
                            {
                                return false;
                            } 
                            else
                            {
                                $rplnpwp = str_replace(".","",$isinpwp);
                                $rplnpwp = str_replace("-","",$rplnpwp);
                                return is_numeric($rplnpwp);
                            }
                        }
                    }
                }
            }
        }
        else
        {
            return false;
        }
    }

    public function registrasi(Request $request){
        $post     = $request->all();
        $nama     = $_POST['form-nama'];
        $email    = $_POST['form-email'];
        $npwp     = $_POST['form-npwp'];
        $alamat   = $_POST['form-alamat'];
        $badanusaha=$_POST['badanusaha'];

        $okay = preg_match('/^[A-z0-9_\-\_\.]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email);
        $okaynpwp = $this->cekNPWP($npwp);
        
        if (($okay) && ($okaynpwp))
        {
            $cari1 = DB::table('users')
                        ->join('pajak','users.UserId','=','pajak.UserId')
                        ->select('users.UserId','pajak.NomorNPWP')
                        ->where('users.Username', $email)
                        ->first();

            $cari2 = DB::table('users')
                        ->join('pajak','users.UserId','=','pajak.UserId')
                        ->select('users.UserId','pajak.NomorNPWP')
                        ->Where('pajak.NomorNPWP', $npwp)
                        ->first();

            if((!is_null($cari1)) || (!is_null($cari2))){
                \Session::flash('nama',$nama);
                \Session::flash('email',$email);
                \Session::flash('npwp',$npwp);
                \Session::flash('alamat',$alamat);
                \Session::flash('badanusaha', $badanusaha);
                alert()->error('GAGAL', 'Perusahaan Anda Sudah Terdaftar');
                return back();
            } else {
                $pass1 = $this->generatePassword($email);
                $pass = md5(sha1(md5(base64_encode(md5($pass1)))));
                $my_date = date("Y-m-d H:i:s");

                $data = array(
                                'Username'      => $email,
                                'Password'      => $pass,
                                'UserLevelId'   => '4',
                              );
                $y = DB::table('users')->insert($data);

                if($y > 0)
                {
                    $userid = DB::table('users')->where('Username', $email)->pluck('UserId');

                    $cek = DB::table('vendor')->where('UserId',$userid)->pluck('UserId');
                    if($cek > 0) {}
                    else{
                        $data = array(
                                        'UserId'                         => $userid,
                                        'StatusHasilVerifikasi'          => 'N',
                                        'StatusHasilVerifikasiLegal'     => 'N',
                                        'StatusHasilVerifikasiFinance'   => 'N',
                                        'StatusHasilVerifikasiTechnical' => 'N',
                                        'StatusHasilDueDiligence'        => 'N',
                                        'StatusHasilPenawaran'           => 'N',
                                        'StatusHasilNegosiasi'           => 'N',
                                        'StatusHasilCDA'                 => 'N',
                                        'StatusHasilKontrak'             => 'N',
                                        'StatusUndanganDueDiligence'     => 'N',
                                        'StatusUndanganPenawaran'        => 'N',
                                        'StatusUndanganNegosiasi'        => 'N',
                                        'StatusSuratPenunjukan'          => 'N',
                                        'StatusUndanganCDA'              => 'N',
                                        'StatusUndanganKontrak'          => 'N',
                                        'PersetujuanLegal'               => 'N',
                                        'PersetujuanFinance'             => 'N',
                                        'PersetujuanTechnical'           => 'N',
                                        'PersetujuanVerifikasi'          => 'N',
                                      );
                        $x = DB::table('vendor')->insert($data);
                    }

                    $cek = DB::table('pajak')->where('UserId',$userid)->where('NomorNPWP',$npwp)->pluck('UserId');
                    if($cek > 0) {} 
                    else {
                    $data = array(
                                    'UserId'    => $userid,
                                    'NomorNPWP' => $npwp,
                                  );
                        $x = DB::table('pajak')->insert($data);
                    }

                    $cek = DB::table('dataadministrasiperusahaan')->where('UserId',$userid)->pluck('UserId');
                    if($cek > 0) {} 
                    else {
                        $data = array(
                                    'UserId'    => $userid,
                                    'Nama'      => $nama,
                                    'Email'     => $email,
                                    'Alamat'    => $alamat,
                                    'badanusaha'=> $badanusaha,
                                  );
                        $x = DB::table('dataadministrasiperusahaan')->insert($data);
                    }

                    \Session::flash('email_password', $pass1);
                    \Session::flash('email_nama', $nama);
                    \Session::flash('email_email',$email);
                    \Session::flash('email_alamat', $alamat);
                    \Session::flash('email_npwp', $npwp);
                        
                    try{
                        $emailData = [  
                                        'to'       => $email,
                                        'name'     => $nama,
                                        'subject'  => 'Password Pendaftaran PT. PLN BATU BARA',
                                        'view'     => 'email.epass'
                                    ];

                        Mail::send($emailData['view'], $emailData, function($message) use ($emailData) {
                            $message->to($emailData['to'], $emailData['name'])->subject($emailData['subject']);
                        });

                        $ipAddress = $this->getIP();
                        if(!empty($ipAddress)){
                            $data = array(
                                            'UserId' => $userid,
                                            'IP'     => $ipAddress,
                                            'Aksi'   => 'Registrasi Perusahaan',
                                         );
                            $i = DB::table('log')->insert($data);
                        }
                        \Session::put('daftar','Y');
                        //alert()->success('BERHASIL', 'Silahkan Cek Email Anda');
                        //return back();
                        return redirect('/');
                    }catch (\Exception $e){
                        $userid = DB::table('users')->where('Username', $email)->pluck('UserId');
                        $y = DB::table('users')->where('UserId',$userid)->delete();
                        $x = DB::table('vendor')->where('UserId',$userid)->delete();
                        $x = DB::table('pajak')->where('UserId',$userid)->delete();
                        $x = DB::table('dataadministrasiperusahaan')->where('UserId',$userid)->delete();

                        \Session::flash('nama',$nama);
                        \Session::flash('email',$email);
                        \Session::flash('npwp',$npwp);
                        \Session::flash('alamat',$alamat);

                        alert()->error('GAGAL', 'Pendaftaran Gagal Koneksi Internet Tidak Stabil');
                        return back();
                    }
                } else {
                    \Session::flash('nama',$nama);
                    \Session::flash('email',$email);
                    \Session::flash('npwp',$npwp);
                    \Session::flash('alamat',$alamat);

                    alert()->error('GAGAL', 'Pendaftaran Gagal');
                    return back();
                }
            }
        }
        else
        {
            if(!$okay)
                \Session::flash('email_err','Format Email Salah, contoh: xxx@xxx.xxx');
            
            if(!$okaynpwp)
                \Session::flash('npwp_err','Format NPWP Salah, contoh: xx.xxx.xxx.x-xxx.xxx');

            \Session::flash('nama',$nama);
            \Session::flash('email',$email);
            \Session::flash('npwp',$npwp);
            \Session::flash('alamat',$alamat);
            \Session::flash('badanusaha', $badanusaha);
            return back();
        }
    }

    public function ceklogin(Request $request){
        $username = $_POST['form-username'];
        $pass = $_POST['form-password'];
        $pass = md5(sha1(md5(base64_encode(md5($pass)))));
        $userlevelid = DB::table('users')->where('Username','=', $username)->where('Password','=', $pass)->pluck('UserlevelId');
        $id = DB::table('users')->where('Username','=', $username)->where('Password','=', $pass)->pluck('UserId');
        $username = DB::table('users')->where('Username','=', $username)->where('Password','=', $pass)->pluck('Username');
        
        if(($userlevelid == 1) || ($userlevelid == 2) || ($userlevelid == 3) || ($userlevelid == 5) || ($userlevelid == 6) || ($userlevelid == 7)
            || ($userlevelid == 8) || ($userlevelid == 9)){
            \Session::flash('userid','');
            \Session::flash('password','');
            \Session::put('adminid', $id);
            \Session::put('useradmin', $username);            
            
            \Session::put('lvlid', $userlevelid);
            $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $id,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'login',
                                     );
                        $i = DB::table('log')->insert($data);
                    }
            return redirect('admin');
                
        } else if ($userlevelid == 4){      
			$htgpakta = DB::table('paktaintegritas')->where('UserId', $id)->count();
			$cekpersetujuan = 'N';
			if($htgpakta > 0){
				$cekpersetujuan = DB::table('paktaintegritas')->where('UserId', $id)->pluck('StatusPakta');
			}else{
				$cekpersetujuan = 'N';
			}
            \Session::flash('userid','');
            \Session::flash('password','');
            \Session::put('vendorid', $id);
            \Session::put('uservendor', $username); 
            \Session::put('downloadpdf', $cekpersetujuan); 

            $ipAddress = $this->getIP();
                    if(!empty($ipAddress)){
                        $data = array(
                                        'UserId' => $id,
                                        'IP'     => $ipAddress,
                                        'Aksi'   => 'login',
                                     );
                        $i = DB::table('log')->insert($data);
                    }

            return redirect('vendorhome');
        } else {
            \Session::flash('username',$_POST['form-username']);
            \Session::flash('password',$_POST['form-password']);
            alert()->error('GAGAL', 'Username atau Password Anda Salah');
            return back();
        }

    }

    private function generatePassword($usr){
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $chars = "";

        $chars .= $usr;
        $chars .= $alpha;
        $chars .= $alpha_upper;
        $chars .= $numeric;
        $length = 10;

        $len = strlen($chars);
        $pw = '';

        for ($i=0;$i<$length;$i++)
            $pw .= substr($chars, rand(0, $len-1), 1);

        $pw = str_shuffle($pw);

        return $pw;
    }

    public function GetPengumuman($id){
        \Session::put('postsid',$id);
        return Redirect('DetailPengumuman');
    }

    public function detailpengumuman(){
        $id = \Session::get('postsid');
        
        $result = DB::table('pengumuman')->where('Id',$id)->first();
        
        return view('home.detailpengumuman')->with('data',$result);
    }

    public function caripengumuman(Request $request){
        $cari = DB::table('pengumuman')->where('pengumuman.Header', 'LIKE', '%'.$_POST['cari'].'%')->count();
        \Session::flash('cari',$_POST['cari']);

        if($cari < 1){
            $result = null;
        }else{
            $result = DB::table('pengumuman')
                  ->join('users','pengumuman.UserId','=','users.UserId')
                  ->select('pengumuman.Id','pengumuman.Header','pengumuman.Content','pengumuman.Tanggal',
                           'users.Nama')
                  ->where('pengumuman.Header', 'LIKE', '%'.$_POST['cari'].'%')
                  ->get();
        }
        
        return view('home.home')->with('data',$result);
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

}
