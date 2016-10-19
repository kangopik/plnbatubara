@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<p>&nbsp;</p>
        <h3 style="text-align:center;">Pengumuman</h2>
        <h4 style="text-align:center;">Hasil Verifikasi Peserta Seleksi Calon Penyedia Batubara</h4>
        <p class="page-header"></p>
        <p>Berdasarkan hasil verifikasi data peserta seleksi, maka diberitahukan bahwa:</p>
        <table class="table table-bordered tb-pengumuman">
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>1</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Nama Perusahaan</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>
                        <?php echo $data->Nama.', '.$data->BadanUsaha; ?>
                    </div>
        		</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>2</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Alamat</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>
                        <?php echo $data->Alamat ?>
                    </div>
        		</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>3</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Hasil Verifikasi</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>
                        <?php echo $data->Deskripsi ?>
                    </div>
        		</td>
        	</tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" width="30">
                    <div>4</div>
                </td>
                <td class="td-pengumuman" width="200">
                    <div>Keterangan</div>
                </td>
                <td class="td-pengumuman">
                    <div>
                        <?php echo "Legal : {$data->KeteranganLegal}" ?> <br/>
                        <?php echo "Keuangan : {$data->KeteranganFinance}" ?> <br/>
                        <?php echo "Technical  : {$data->KeteranganTechnical}" ?>
                        
                    </div>
                </td>
            </tr>
        </table>
        <p style="text-align:right;">Pejabat Pengadaan Batubara</p>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
        <p>&nbsp;</p>
    </div>
</div>
@stop()