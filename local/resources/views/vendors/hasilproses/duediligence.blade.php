@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<p>&nbsp;</p>
        <h3 style="text-align:center;">Hasil Due Diligence Peserta Seleksi</h2>
        <h4 style="text-align:center;">Calon Penyedia Batubara</h4>
        <p class="page-header"></p>
        <p>Berdasarkan hasil due diligence data peserta seleksi, </br>
        	yang dilaksanakan pada tanggal : </br>
        	maka diberitahukan bahwa :</p>
        <table class="table table-bordered tb-pengumuman">
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>1</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Nama Perusahaan</div>
        		</td>
        		<td class="td-pengumuman">
        			<div><input type="text" style="width:90%; border: none; border-color: transparent;" 
                        value="<?php echo $data->Nama.', '.$data->BadanUsaha; ?>"></input></div>
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
                        <input type="text" style="width:90%; border: none; border-color: transparent;" value="{{$data->Alamat}}"></input>
                    </div>
        		</td>
        	</tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" width="30">
                    <div>3</div>
                </td>
                <td class="td-pengumuman" width="200">
                    <div>Hasil Due Diligence</div>
                </td>
                <td class="td-pengumuman">
                    <div>
                        <textarea rows="2" style="width:90%; border: none; border-color: transparent;" ><?php echo "{$data->Deskripsi}" ?></textarea>
                    </div>
                </td>
            </tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>3</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Keterangan</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>
                        <textarea rows="2" style="width:90%; border: none; border-color: transparent;" ><?php echo "{$data->Keterangan}" ?></textarea>
                    </div>
        		</td>
        	</tr>
        </table>
        <p style="text-align:right;">Pejabat Pengadaan Batubara</p>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
        <p>&nbsp;</p>
    </div>
</div>
@stop()