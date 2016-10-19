@extends('layout.home')
@section('content')
<html>
<head>
	<link href="{{asset('css/css-info.css')}}" rel="stylesheet">
</head>
<body>
<div class="container" style="background-color: #EEEEE6; margin-top:-20px;">
	<div class="row">
		<div id="div_content">
			<div class="col-md-12">
				<div class="push">
					<div class="row">
						<div class="col-md-12 clearfix">
							<div id="tab_content_data">
								<div class="masthead clearfix">
									<br />
									<table class="table table-bordered" width="100%">
										<thead>
			                                <th width="5%" style="text-align:center;">No</th>
			                                <th width="45%" style="text-align:center;">
			                                	PERSYARATAN UNTUK PEMILIK IUP OP KHUSUS UNTUK PENGANGKUTAN & PENJUALAN
			                                </th>
			                                <th width="55%" style="text-align:center;">
			                                	KETERANGAN
			                                </th>
			                            </thead>
			                            <tbody>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">1<br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Surat Penawaran Kerjasama</b><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Diberikan Nomor Surat beserta tanggal, <u>menyebutkan sumber batubara
			                            			yang ditawarkan,</u> dan telah ditandatangani oleh Direktur Utama.
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">2</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Company Profile Perusahaan</b>
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Lengkap
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td>3</td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			<b>Anggaran Dasar s/d Anggaran Dasar Perubahan</b>
			                            		</td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			i. <u>Badan Hukum :</u>
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td></td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			i. Badan Usaha Berbentuk Badan Hukum <br/ >
			                            			&nbsp;&nbsp; - Perseroan Terbatas <b>("PT")</b> <br/ >
			                            			&nbsp;&nbsp; - Koperasi <br />
			                            			ii. Badan Usaha Lainnya <br />
			                            			&nbsp;&nbsp; - <i>Comanditaire Venootscahf</i> <b>("CV")</b> <br /><br/ ><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			<ul>
			                            				<li>Telah disahkan oleh Kemenhumkam RI (Fotocopy salinan)</li>
			                            				<li>Akta Badan Hukum (PT) telah disesuaikan dengan Undang-undang
			                            					Perseroan No. 40 Tahun 2007 (bagi pendirian PT sebelum berlakunya UU tersebut)</li>
			                            				<li>Telah disahkan oleh Kementrian Koperasi, Pengusaha Kecil dan Menengah tingkat
			                            					Kabupaten/Kodya untuk Koperasi</li>
			                            			</ul>
			                            			i. <u>Badan Usaha :</u>
			                            			<ul>
			                            				<li>Telah terdaftar di Pengadilan Negeri ditempat kedudukan Badan Usaha</li>
			                            			</ul>
			                            			- Fotocopy Kartu Identitas Direksi
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">4</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>SK IUP Operasi Produksi Khusus untuk Pengangkutan & Penjualan</b>
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">Fotocopy salinan
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">5<br/ ><br/ ><br/ ><br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Surat Persetujuan Melakukan Kegiatan Pengangkutan dan Penjualan Batubara
			                            				dari Lokasi Lain (dikeluarkan oleh Dirjen Minerba Kementrian ESDM)</b><br/ ><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Bagi pemilik IUP OPK yang berlaku: <br/ >
			                            			1. <b>Khusus</b> (Bagi yang akan melakukan pengangkutan & penjualan diluar dari komoditas
			                            			tambang batubara yang telah ditentukan oleh Dirjen Minerba) <br/ >
			                            			2. <b>Umum</b> (Akan melakukan pengangkutan & penjualan yang berasal dari komoditas
			                            			tambang batubara pemilik IUP OP yang akan diangkut dan dijual)
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">6<br/ ><br/ ><br/ ><br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>IUP OP (Sumber dari Komoditas Batubara)<br/ ><br/ ><br/ ><br/ ><br/ ></b>
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Dengan data legalitas IUP OP (Fotocopy salinan):<br/ >
			                            			1. Fotocopy IUP Operasi Produksi <br/ >
			                            			2. Sertifikat CNC pemilik IUP OP <br/ ><br/ >
			                            			* Pemilik IUP OP Khusus <u><b>wajib</b></u> bekerjasama dengan pemilik
			                            			IUP OP yang telah bersertifikat CNC
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">7<br/ ><br/ ><br/ ><br/ ><br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Dokumen Legalitas Perusahaan lainnya (Fotocopy salinan)</b><br/ ><br/ ><br/ ><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			1. NPWP (Nomor Pokok Wajib Pajak)<br/ >
			                            			2. SIUP (Surat Ijin Usaha Perdagangan)<br/ >
			                            			3. TDP (Tanda Daftar Perusahaan)<br/ >
			                            			4. SKDP (Surat Keterangan Domisili Perusahaan)<br/ ><br/ >
			                            			* Jangka waktu masih berlaku
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">8<br/ ><br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Data Pendukung Tambang</b><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			1. Resume produksi bulanan (format PDF) <br/ >
			                            			2. Resume laporan eksplorasi <br/ >
			                            			3. Resume populasi alat berat <br/ >
			                            		</td>
			                            	</tr>
			                            </tbody>
									</table>	
									<br/ >
									<br/ >
									<table class="table table-bordered" width="100%">
										<thead>
			                                <th width="5%" style="text-align:center;">No</th>
			                                <th width="45%" style="text-align:center;">
			                                	PERSYARATAN UNTUK PEMILIK IUP OPERASI PRODUKSI
			                                </th>
			                                <th width="55%" style="text-align:center;">
			                                	KETERANGAN
			                                </th>
			                            </thead>
			                            <tbody>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">1<br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Surat Penawaran/Perkenalan</b><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Diberikan Nomor Surat beserta tanggal, telah ditandatangani oleh Direktur Utama, 
			                            			yang memuat spesifikasi batubara, Harga Jual Komoditas Batubara yang ditawarkan.
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">2</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Company Profile Perusahaan</b>
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Lengkap
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td>3</td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			<b>Anggaran Dasar s/d Anggaran Dasar Perubahan</b>
			                            		</td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			i. <u>Badan Hukum :</u>
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td></td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			i. Badan Usaha Berbentuk Badan Hukum <br/ >
			                            			&nbsp;&nbsp; - Perseroan Terbatas <b>("PT")</b> <br/ >
			                            			&nbsp;&nbsp; - Koperasi <br />
			                            			ii. Badan Usaha Lainnya <br />
			                            			&nbsp;&nbsp; - <i>Comanditaire Venootscahf</i> <b>("CV")</b> <br /><br/ ><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border-left: 1px solid #ddd;">
			                            			<ul>
			                            				<li>Telah disahkan oleh Kemenhumkam RI (dibuktikan dengan fotocopy salinan)</li>
			                            				<li>Akta Badan Hukum (PT) telah disesuaikan dengan Undang-undang
			                            					Perseroan No. 40 Tahun 2007 (bagi pendirian PT sebelum berlakunya UU tersebut)</li>
			                            				<li>Telah disahkan oleh Kementrian Koperasi, Pengusaha Kecil dan Menengah tingkat
			                            					Kabupaten/Kodya untuk Koperasi</li>
			                            			</ul>
			                            			i. <u>Badan Usaha :</u>
			                            			<ul>
			                            				<li>Telah terdaftar di Pengadilan Negeri ditempat kedudukan Badan Usaha</li>
			                            			</ul>
			                            			- Fotocopy Kartu Identitas Direksi
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">4</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>SK IUP Operasi Produksi</b>
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">Fotocopy salinan
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">5</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Sertifikat CNC<br/ ></b>
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			Fotocopy salinan
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">6<br/ ><br/ ><br/ ><br/ ><br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Dokumen Legalitas Perusahaan lainnya (dibuktikan dengan fotocopy salinan)</b><br/ ><br/ ><br/ ><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			1. NPWP (Nomor Pokok Wajib Pajak)<br/ >
			                            			2. SIUP (Surat Ijin Usaha Perdagangan)<br/ >
			                            			3. TDP (Tanda Daftar Perusahaan)<br/ >
			                            			4. SKDP (Surat Keterangan Domisili Perusahaan)<br/ ><br/ >
			                            			* Jangka waktu masih berlaku
			                            		</td>
			                            	</tr>
			                            	<tr>
			                            		<td style="border: 1px solid #ddd;">7<br/ ><br/ ><br/ ></td>
			                            		<td style="border: 1px solid #ddd;">
			                            			<b>Data Pendukung Tambang</b><br/ ><br/ ><br/ >
			                            		</td>
			                            		<td style="border: 1px solid #ddd;">
			                            			1. Resume produksi bulanan (format PDF) <br/ >
			                            			2. Resume laporan eksplorasi <br/ >
			                            			3. Resume populasi alat berat <br/ >
			                            		</td>
			                            	</tr>
			                            </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<table align=center>
        <tr align=center>
            <td align=center>
                <br />
                <a href="<?php echo 'home' ?>" class="btn btn-submit btn-primary" id="btnprev">Home</a>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
@stop()