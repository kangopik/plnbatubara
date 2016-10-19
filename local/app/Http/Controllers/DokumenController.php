<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class DokumenController extends Controller
{
    public function add(Request $request) {
        $userid = \Session::get('vendorid');

        if(!isset($userid) || ($userid == '')){
        	alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{
			
			$size = $request->file('filefield')->getSize();
			if($size > 10000000){
				alert()->error('GAGAL', 'Ukuran File Lebih Dari 10 MB');
	            return back();
			}else{
		        $file = $request->file('filefield');
		        $extension = $file->getClientOriginalExtension();
		        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		
		        $Mime = $file->getClientMimeType();
		        $NamaFileOriginal = $file->getClientOriginalName();
		        $NamaFile = $file->getFilename().'.'.$extension;
		
		        $result = DB::table('dokumen')->where('UserId', $userid)->where('NamaFile', $NamaFile)->pluck("Id");
		        if(is_null($result)){
		        $data = array(
		                        'UserId'            => $userid,
		                        'Mime'              => $Mime,
		                        'NamaFileOriginal'  => $NamaFileOriginal,
		                        'NamaFile'          => $NamaFile,
		                      );
		            $i = DB::table('dokumen')->insert($data);
		        }else{
		            $data = array(
		                        'UserId'            => $userid,
		                        'Mime'              => $Mime,
		                        'NamaFileOriginal'  => $NamaFileOriginal,
		                        'NamaFile'          => $NamaFile,
		                      );
		            $i =  DB::table('dokumen')->where('Id', $result)->update($data);
		        }
		
		        if(is_null($i)){   
		            alert()->error('GAGAL', 'Upload File, Ukuran File Lebih Dari 10 MB');
		            return back();         
		        }else{
		            alert()->success('BERHASIL', 'Upload File');
		            $ipAddress = $this->getIP();
		                    if(!empty($ipAddress)){
		                        $data = array(
		                                        'UserId' => $userid,
		                                        'IP'     => $ipAddress,
		                                        'Aksi'   => 'Upload Dokumen',
		                                     );
		                        $i = DB::table('log')->insert($data);
		                    }
		            return back();
		        }
		    }
        }
    }

    public function get($id, $nm){  
        $userid = \Session::get('adminid');

          if(!isset($userid) || ($userid == '')){
              alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
          }else{

        $fname = DB::table('dokumen')->where('Id',$id)->pluck('NamaFile');
        $mm = DB::table('dokumen')->where('Id',$id)->pluck('Mime');

        $file = Storage::disk('local')->get($fname);
   
        return (new Response($file, 200))
                ->header('Content-Type', $mm);
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

    public function addmanual(Request $request) {
        $adminid = \Session::get('adminid');

        if(!isset($adminid) || ($adminid == '')){
        	alert()->info('INFO', 'Maaf Session Anda Telah Habis'); return Redirect('home');
        }else{			
			$size = $request->file('filefield')->getSize();
			if($size > 10000000){
				alert()->error('GAGAL', 'Ukuran File Lebih Dari 10 MB');
	            return back();
			}else{
		        $file = $request->file('filefield');
		        $extension = $file->getClientOriginalExtension();
		        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		
		        $Mime = $file->getClientMimeType();
		        $NamaFileOriginal = $file->getClientOriginalName();
		        $NamaFile = $file->getFilename().'.'.$extension;
		
		        $result = DB::table('dokumen_manual')->where('NamaFile', $NamaFile)->pluck("Id");
		        if(is_null($result)){
		        $data = array(
		                        'UserId'            => $adminid,
		                        'Mime'              => $Mime,
		                        'NamaFileOriginal'  => $NamaFileOriginal,
		                        'NamaFile'          => $NamaFile,
		                      );
		            $i = DB::table('dokumen_manual')->insert($data);
		        }else{
		            $data = array(
		                        'UserId'            => $adminid,
		                        'Mime'              => $Mime,
		                        'NamaFileOriginal'  => $NamaFileOriginal,
		                        'NamaFile'          => $NamaFile,
		                      );
		            $i =  DB::table('dokumen_manual')->where('Id', $result)->update($data);
		        }
		
		        if(is_null($i)){   
		            alert()->error('GAGAL', 'Upload File, Ukuran File Lebih Dari 10 MB');
		            return back();         
		        }else{
		            alert()->success('BERHASIL', 'Upload File');
		            $ipAddress = $this->getIP();
		                    if(!empty($ipAddress)){
		                        $data = array(
		                                        'UserId' => $adminid,
		                                        'IP'     => $ipAddress,
		                                        'Aksi'   => 'Upload Dokumen',
		                                     );
		                        $i = DB::table('log')->insert($data);
		                    }
		            return back();
		        }
		    }
        }
    }

    public function getmanual($id){  
        $fname = DB::table('dokumen_manual')->where('Id',$id)->pluck('NamaFile');
        $mm = DB::table('dokumen_manual')->where('Id',$id)->pluck('Mime');

        $file = Storage::disk('local')->get($fname);
   
        return (new Response($file, 200))
                ->header('Content-Type', $mm);
    }

    public function deletedokumen(){
      $id = $_POST['iddok'];		
      $i = DB::table('dokumen_manual')->where('Id',$id)->delete();

      if($i > 0){
          alert()->success('BERHASIL', 'Hapus Dokumen');
          return back();
      }else{
          alert()->error('GAGAL', 'Hapus Dokumen');
          return back();
      }
    }

}
