@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header" style="text-align:center;">Fakta Integritas</h2>
        <table>
        	<tbody style="border:none;">
                <tr>
                    <td colspan="2" width="100%">
                        Dalam rangka mengikuti seleksi calon Penyedia Batubara, 
                        sebagai peserta seleksi, dengan ini menyatakan bahwa :
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">&nbsp;</td>
                </tr>
        		<tr style="border:none;">
        			<td width="30" style="border:none;">1.</td>
        			<td style="border:none; padding-top: 20px;">Akan mentaati peraturan tentang tatacara seleksi calon 
                        Penyedia Batubara di Lingkungan PT PLN Batubara, dan peraturan perundang-undangan yang 
                        terkait dengan pengadaan Batubara.
                    </td>
        		</tr>
        		<tr style="border:none;">
        			<td style="border:none;">2.</td>
        			<td style="border:none; padding-top: 20px;">Tidak akan melakukan persekongkolan/pengaturan/kerjasama 
                        diantara para peserta lain dan/atau dengan pihak Pemberi tugas dapat mengakibatkan 
                        terjadinya persaingan usaha tidak sehat
                    </td>
        		</tr>
                <tr style="border:none;">
                    <td style="border:none;">3.</td>
                    <td style="border:none; padding-top: 20px;">Apabila di kemudian hari ditemukan bahwa data/dokumen yang kami 
                        sampaikan tidak benar dan ada pemalsuan, maka dalam PAKTA INTEGRITAS ini, kami bersedia dikenakan sanksi 
                        administrasi atau sesuai dengan ketentuan peraturan perundang-undangan yang berlaku. 
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">&nbsp;</td>
                </tr>
                <tr align="center">
                    <td colspan="2" width="100%">
                        <form action="{{action('VendorController@savepaktaintegritas')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="checkbox" name="setuju" value="Y" required="required" 
                            <?php if($data->StatusPakta == 'Y') { echo "checked='checked'";}?>
                             /> Saya Menyetujui <br /> <br /> <br />
                             <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
                            <button type="submit" class="btn btn-submit btn-primary">Kirim</button>
                            <?php } ?>
                        </form>
                    </td>
                </tr>
        	</tbody>
        </table>	
    </div>
</div>
@stop()