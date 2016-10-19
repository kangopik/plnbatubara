<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>DCPT PT. PLN BATUBARA</title>
        <style type="text/css">
        	body{
        		font-family: Calibri;
        		font-size: 12px;
        	}

        	.tb-pengumuman{
			    border:1px solid;
			    width: 100%;
			    max-width: 100%;
			    margin-bottom: 20px;
			    border-spacing: 0;
				border-collapse: collapse;
			}

			.th-pengumuman{
			    border:1px solid;
			    text-align:center;
			}

			.tr-pengumuman{
			    border:1px solid;
			}

			.td-pengumuman{
			    border:1px solid;
			    padding-left: 10px;
			    padding-top: 4px;
			    padding-bottom: 4px;
			}
        </style>
	</head>
	<body>
		<h3>DATA ADMINISTRASI</h3>
		<h3>{{$resda->Nama}}, {{$resda->BadanUsaha}}</h3>
		<table width=100%>
			<tr>
				<td width=50%>Alamat : {{$resda->Alamat}}</td>
				<td width=25%></td>
				<td width=25%></td>
			</tr>
			<tr>
				<td>No.Tlp : {{$resda->TlpKantor}}</td>
				<td>Fax : {{$resda->FaxKantor}}</td>
				<td>Email : {{$resda->Email}}</td>
			</tr>
			<tr>
				<td>Contact Person : {{$resda->ContactPerson}}</td>
				<td>No. Tlp : {{$resda->TlpContactPerson}}</td>
				<td>Email : {{$resda->EmailContactPerson}}</td>
			</tr>
		</table>
		<br/>
		<h3>LEGALITAS PERIJINAN PERUSAHAAN</h3>
		<table width=100%>
			<tr>
				<td colspan="2">Notaris : {{$reslegal->NamaNotaris}}</td>
				<td width=25%>No. : {{$reslegal->NomorAkta}}</td>
				<td width=25%>Tgl. : <?php if(!is_null($reslegal->TanggalAkta)) { 
									echo date("d-m-Y", strtotime($reslegal->TanggalAkta)); } ?></td>
			</tr>
			<tr>
				<td colspan="3">SK Kemenhumkam / PengesahanPengadilan / KementrianKoperasi : {{$reslegal->NomorPengesahanKemenhumkam}}</td>
				<td width=25%>Tgl. : <?php if(!is_null($reslegal->TanggalPengesahanKemenhumkam))  {
									echo date("d-m-Y", strtotime($reslegal->TanggalPengesahanKemenhumkam)); } ?></td>
			</tr>
			<tr>
				<td width=25%>SIUP : {{$reslegal->PenerbitSIUP}}</td>
				<td width=25%>No. : {{$reslegal->NomorSIUP}}</td>
				<td width=25%>Tgl. : <?php if(!is_null($reslegal->TanggalSIUP)) {
									 echo date("d-m-Y", strtotime($reslegal->TanggalSIUP)); } ?></td>
				<td width=25%>s/d Tgl. : <?php if(!is_null($reslegal->TanggalSdSIUP)) {
									 echo date("d-m-Y", strtotime($reslegal->TanggalSdSIUP)); } ?></td>
			</tr>
			<tr>
				<td width=25%>TDP : {{$reslegal->PenerbitTDP}}</td>
				<td width=25%>No. : {{$reslegal->NomorTDP}}</td>
				<td width=25%>Tgl. : <?php if(!is_null($reslegal->TanggalTDP)) { 
										echo date("d-m-Y", strtotime($reslegal->TanggalTDP)); } ?></td>
				<td width=25%>s/d Tgl. : <?php if(!is_null($reslegal->TanggalSdTDP)) {
										 echo date("d-m-Y", strtotime($reslegal->TanggalSdTDP)); } ?></td>
			</tr>
			<tr>
				<td width=25%>SKDP : {{$reslegal->PenerbitSKDP}}</td>
				<td width=25%>No. : {{$reslegal->NomorSKDP}}</td>
				<td width=25%>Tgl. : <?php if(!is_null($reslegal->TanggalSKDP)) {
										 echo date("d-m-Y", strtotime($reslegal->TanggalSKDP)); } ?></td>
				<td width=25%>s/d Tgl. : <?php if(!is_null($reslegal->TanggalSdSKDP)) { 
										echo date("d-m-Y", strtotime($reslegal->TanggalSdSKDP)); } ?></td>
			</tr>
		</table>
		<br/>
		<?php if($htgpemsaham > 0){ ?>
		<h4>Susunan Pemegang Saham</h4>
		<table class="tb-pengumuman">
			<tr class="tr-pengumuman">
		        <th class="th-pengumuman" width=10%>No</th>
		        <th class="th-pengumuman" width=70%>Nama</th>
		        <th class="th-pengumuman" width=20%>No. KTP</th>
		    </tr>
		    <?php
	      		$counter = 1;
	      		foreach ($pemsaham as $row) {
	      	?>
	      	<tr class="tr-pengumuman">
	            <td class="td-pengumuman"><?php echo $counter ?></td>
	            <td class="td-pengumuman"><?php echo $row->Nama ?></td>
	            <td class="td-pengumuman"><?php echo $row->NoKTP ?></td>
	        </tr>
	      	<?php
	      		$counter++;
	      		}
	      	?>
		</table>
		<?php } ?>
		<?php if($htgpengprs > 0){ ?>
		<br/>
		<h4>Susunan Pengurus Perusahaan</h4>
		<table class="tb-pengumuman">
			<tr style="border:solid 1px black;">
		        <th class="th-pengumuman" width=10%>No</th>
		        <th class="th-pengumuman" width=40%>Nama</th>
		        <th class="th-pengumuman" width=20%>No. KTP</th>
		        <th class="th-pengumuman" width=30%>Jabatan</th>
		    </tr>
		    <?php
	      		$counter = 1;
	      		foreach ($pengprs as $row) {
	      	?>
	      	<tr class="tr-pengumuman">
	            <td class="td-pengumuman"><?php echo $counter ?></td>
	            <td class="td-pengumuman"><?php echo $row->Nama ?></td>
	            <td class="td-pengumuman"><?php echo $row->NoKTP ?></td>
	            <td class="td-pengumuman"><?php echo $row->Jabatan ?></td>
	        </tr>
	      	<?php
	      		$counter++;
	      		}
	      	?>
		</table>
		<br/>
		<?php } ?>
		<?php if($htglegaltambang > 0) { ?>
		<h3>LEGALITAS PERIJINAN TAMBANG</h3>
			<?php if($jenisijin == "IUPOP") { ?>
				<table width=100%>
					<tr>
						<td colspan="3">Menerbitkan : 
							<?php if($ijiniupop->Menerbitkan == '1'){ echo "Kementrian ESDM / Minerba / BKPM"; }else 
							if($ijiniupop->Menerbitkan == '2'){ echo "Gubernur / BKPM Provinsi"; }else 
							if($ijiniupop->Menerbitkan == '3'){ echo "Bupati / Walikota";}
							else {echo "";} ?>
						</td>
					</tr>
					<tr>
						<td width=33%>No. IUP : {{$ijiniupop->No}}</td>
						<td width=33%>Tgl. : <?php if(!is_null($ijiniupop->Tanggal)) { 
												echo date("d-m-Y", strtotime($ijiniupop->Tanggal)); } ?></td>
						<td width=33%>Jangka Waktu IUP : <?php if(!is_null($ijiniupop->JangkaWaktu)) { 
												echo date("d-m-Y", strtotime($ijiniupop->JangkaWaktu)); } ?></td>
					</tr>
					<tr>
						<td width=33%>No. CNC : {{$ijiniupop->NoCnc}}</td>
						<td width=33%>Tgl. : <?php if(!is_null($ijiniupop->TanggalCnc)) { 
												echo date("d-m-Y", strtotime($ijiniupop->TanggalCnc)); } ?></td>
						<td width=33%>Jangka Waktu CNC : <?php if(!is_null($ijiniupop->JangkaWaktuCnc)) { 
												echo date("d-m-Y", strtotime($ijiniupop->JangkaWaktuCnc)); } ?></td>
					</tr>
				</table>
			<?php }else if($jenisijin == "IUPOPK") { ?>
				<table width=100%>
					<tr>
						<td colspan="3">Menerbitkan : 
							<?php if($ijiniupopk->Menerbitkan == '1'){ echo "Kementrian ESDM / Minerba / BKPM"; }else 
							if($ijiniupopk->Menerbitkan == '2'){ echo "Gubernur / BKPM Provinsi"; }else 
							if($ijiniupopk->Menerbitkan == '3'){ echo "Bupati / Walikota";}
							else {echo "";} ?>
						</td>
					</tr>
					<tr>
						<td width=33%>No. IUP : {{$ijiniupopk->No}}</td>
						<td width=33%>Tgl. : <?php if(!is_null($ijiniupopk->Tanggal)) { 
												echo date("d-m-Y", strtotime($ijiniupopk->Tanggal)); } ?></td>
						<td width=33%>Jangka Waktu IUP : <?php if(!is_null($ijiniupopk->JangkaWaktu)) { 
												echo date("d-m-Y", strtotime($ijiniupopk->JangkaWaktu)); } ?></td>
					</tr>
				</table>
				<?php if($htgsumberiupopk > 0) { ?>
				<br/>
				<h4>Sumber Tambang Sesuai IUP OPK</h4>
				<table class="tb-pengumuman">
					<tr class="tr-pengumuman">
				        <th class="th-pengumuman" width=5%>No</th>
				        <th class="th-pengumuman" width=20%>Asal Tambang</th>
						<th class="th-pengumuman" width=10%>No. IUP OP</th>
						<th class="th-pengumuman" width=10%>Tgl.</th>
						<th class="th-pengumuman" width=10%>Jangka Waktu</th>
						<th class="th-pengumuman" width=15%>Sertifikat CNC</th>
						<th class="th-pengumuman" width=10%>Tgl.</th>
						<th class="th-pengumuman" width=10%>Jangka Waktu</th>
				    </tr>
				    <?php
			      		$counter = 1;
			      		foreach ($sumberiupopk as $row) {
			      	?>
			      	<tr class="tr-pengumuman">
			            <td class="td-pengumuman"><?php echo $counter ?></td>
			            <td class="td-pengumuman"><?php echo $row->AsalTambang ?></td>
			            <td class="td-pengumuman"><?php echo $row->NoIUPOP ?></td>
			            <td class="td-pengumuman"><?php if(!is_null($row->TglIUPOP)) { 
												echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?></td>
						<td class="td-pengumuman"><?php if(!is_null($row->JangkaWaktuIUPOP)) { 
												echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?></td>
						<td class="td-pengumuman"><?php echo $row->NoCNC ?></td>
						<td class="td-pengumuman"><?php if(!is_null($row->TglCNC)) { 
												echo date("d-m-Y", strtotime($row->TglCNC)); } ?></td>
						<td class="td-pengumuman"><?php if(!is_null($row->JangkaWaktuCNC)) { 
												echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?></td>
			        </tr>
			      	<?php
			      		$counter++;
			      		}
			      	?>
				</table>
				<?php } ?>
			<?php }else if($jenisijin == "IUPOPK2") { ?>
				<table width=100%>
					<tr>
						<td colspan="3">Menerbitkan : 
							<?php if($ijiniupopk2->Menerbitkan == '1'){ echo "Kementrian ESDM / Minerba / BKPM"; }else 
							if($ijiniupopk2->Menerbitkan == '2'){ echo "Gubernur / BKPM Provinsi"; }else 
							if($ijiniupopk2->Menerbitkan == '3'){ echo "Bupati / Walikota";}
							else {echo "";} ?>
						</td>
					</tr>
					<tr>
						<td width=33%>No. IUP : {{$ijiniupopk2->No}}</td>
						<td width=33%>Tgl. : <?php if(!is_null($ijiniupopk2->Tanggal)) { 
												echo date("d-m-Y", strtotime($ijiniupopk2->Tanggal)); } ?></td>
						<td width=33%>Jangka Waktu IUP : <?php if(!is_null($ijiniupopk2->JangkaWaktu)) { 
												echo date("d-m-Y", strtotime($ijiniupopk2->JangkaWaktu)); } ?></td>
					</tr>
				</table>
				<?php if($htgsumberiupopk2 > 0) { ?>
				<br/>
				<h4>Sumber Tambang Sesuai IUP OPK</h4>
				<table class="tb-pengumuman">
					<tr class="tr-pengumuman">
				        <th class="th-pengumuman" width=5%>No</th>
				        <th class="th-pengumuman" width=20%>Jenis Ijin</th>
						<th class="th-pengumuman" width=10%>No. IUP OP</th>
						<th class="th-pengumuman" width=10%>Tgl.</th>
						<th class="th-pengumuman" width=10%>Jangka Waktu</th>
						<th class="th-pengumuman" width=15%>Sertifikat CNC</th>
						<th class="th-pengumuman" width=10%>Tgl.</th>
						<th class="th-pengumuman" width=10%>Jangka Waktu</th>
				    </tr>
				    <?php
			      		$counter = 1;
			      		foreach ($sumberiupopk2 as $row) {
			      	?>
			      	<tr class="tr-pengumuman">
			            <td class="td-pengumuman"><?php echo $counter ?></td>
			            <td class="td-pengumuman"><?php echo $row->AsalTambang ?></td>
			            <td class="td-pengumuman"><?php echo $row->NoIUPOP ?></td>
			            <td class="td-pengumuman"><?php if(!is_null($row->TglIUPOP)) { 
												echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?></td>
						<td class="td-pengumuman"><?php if(!is_null($row->JangkaWaktuIUPOP)) { 
												echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?></td>
						<td class="td-pengumuman"><?php echo $row->NoCNC ?></td>
						<td class="td-pengumuman"><?php if(!is_null($row->TglCNC)) { 
												echo date("d-m-Y", strtotime($row->TglCNC)); } ?></td>
						<td class="td-pengumuman"><?php if(!is_null($row->JangkaWaktuCNC)) { 
												echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?></td>
			        </tr>
			      	<?php
			      		$counter++;
			      		}
			      	?>
				</table>
				<?php } ?>
			<?php } ?>
		<br/>
		<?php } ?>
		<h3>DATA KEUANGAN</h3>
		<table width=100%>
			<tr>
				<td>No. NPWP : {{$respajak->NomorNPWP}}</td>
			</tr>
		</table>
		<br/>
		<h4>Rekening Perusahaan</h4>
		<table width=100%>
			<tr>
				<td width=50%>No. Rekening : {{$respajak->NoRekening}}</td>
				<td width=50%>Nama Bank : {{$respajak->NamaBank}}</td>
			</tr>
		</table>
		<br/>
		<h4>Bukti pelunasan pajak tahunan / Tahun terakhir</h4>
		<table width=100%>
			<tr>
				<td width=50%>No. : {{$respajak->NomorBuktiPelunasan}}</td>
				<td width=50%>Tgl. : <?php if(!is_null($respajak->TglBuktiPelunasan)) { 
												echo date("d-m-Y", strtotime($respajak->TglBuktiPelunasan)); } ?></td>
			</tr>
		</table>
		<br/>
		<h4>Laporan bulanan PPN, PPh tiga Bulan terakhir</h4>
		<table width=100%>
			<tr>
				<td width=50%>No. : {{$respajak->NomorLaporanBulanan}}</td>
				<td width=50%>Tgl. : <?php if(!is_null($respajak->TglLaporanBulanan)) { 
												echo date("d-m-Y", strtotime($respajak->TglLaporanBulanan)); } ?></td>
			</tr>
			<tr>
				<td width=50%>No. : {{$respajak->NomorLaporanBulanan2}}</td>
				<td width=50%>Tgl. : <?php if(!is_null($respajak->TglLaporanBulanan2)) { 
												echo date("d-m-Y", strtotime($respajak->TglLaporanBulanan2)); } ?></td>
			</tr>
			<tr>
				<td width=50%>No. : {{$respajak->NomorLaporanBulanan3}}</td>
				<td width=50%>Tgl. : <?php if(!is_null($respajak->TglLaporanBulanan3)) { 
												echo date("d-m-Y", strtotime($respajak->TglLaporanBulanan3)); } ?></td>
			</tr>
		</table>
		<br/>
		<h4>Neraca Perusahaan Terakhir</h4>
		<table width=100%>
			<tr>
				<td width=50%>Activa Lancar : Rp. {{$resneraca->ActivaLancar}}</td>
				<td width=50%>Utang Jangka Pendek : Rp. {{$resneraca->UtangJangkaPendek}}</td>
			</tr>
			<tr>
				<td width=50%>Activa Tetap : Rp. {{$resneraca->ActivaTetap}}</td>
				<td width=50%>Utang Jangka Panjang : Rp. {{$resneraca->UtangJangkaPanjang}}</td>
			</tr>
			<tr>
				<td width=50%>Total Activa Lancar : Rp. {{$resneraca->TotalActivaLancar}}</td>
				<td width=50%>Kekayaan Bersih : Rp. {{$resneraca->TotalKekayaan}}</td>
			</tr>
			<tr>
				<td width=50%>Auditor : {{$resneraca->Auditor}}</td>
				<td width=50%></td>
			</tr>
			<tr>
				<td width=50%></td>
				<td width=50%></td>
			</tr>
			<tr>
				<td width=50%>Kemampuan Dasar : Rp. {{$respengalaman->Kemampuan}}</td>
				<td width=50%></td>
			</tr>
			<tr>
				<td width=50%>Sisa Kemampuan Nyata : Rp. {{$respengalaman->SKN}}</td>
				<td width=50%></td>
			</tr>
		</table>
		<br/>
		<h3>IJIN AREA <?php if($jenisijin == "IUPOPK" || $jenisijin == "IUPOPK2") { echo "1"; }?></h3>
		<table width=100%>
			<tr>
				<td width=25%>No. : <?php if($jenisijin == "IUPOP") { echo $ijiniupop->No; }else
										  if($jenisijin == "IUPOPK") { echo $ijiniupopk->No; }else
										  if($jenisijin == "IUPOPK2") { echo $ijiniupopk2->No;}else {echo "";} ?></td>
				<td width=25%>Pemilik : {{$resdatatambang->NamaKonsensi}}</td>
				<td width=25%>Jumlah PIT : {{$resdatatambang->JumlahPIT}}</td>
				<td width=25%>Luas PIT : {{$resdatatambang->LuasPIT}}</td>
			</tr>
			<tr>
				<td width=25%>Luas Ijin : {{$resdatatambang->LuasKonsensi}} Ha</td>
				<td width=25%>Luas Open Area : {{$resdatatambang->LuasOpenArea}} Ha</td>
				<td width=25%>SR : {{$resdatatambang->SR}}</td>
				<td width=25%>BESR : {{$resdatatambang->BESR}}</td>
			</tr>
			<tr>
				<td width=25%>Jumlah SEAM : {{$resdatatambang->JumlahSEAM}}</td>
				<td width=25%>Rata-rata Kemiringan : {{$resdatatambang->KemiringanSEAM}}<sup>0</sup></td>
				<td colspan="2">Rata-rata Ketebalan : {{$resdatatambang->KetebalanSEAM}} m</td>
			</tr>
		</table>
		<br/>
		<h3>KAPASITAS PRODUKSI</h3>
		<table width=100%>
			<tr>
				<td width=33%>Kapasitas Produksi/Bulan : {{$resdataproduksi->KapasitasProduksi}} MT</td>
				<td width=33%>Target Tahun Lalu : {{$resdataproduksi->TargetTahun}} MT</td>
				<td width=33%>Realisasi Tahun Lalu : {{$resdataproduksi->RealisasiTargetTahun}} MT</td>
			</tr>
			<tr>
				<td width=33%>Target Tahun Berjalan : {{$resdataproduksi->TargetProduksi}} MT</td>
				<td colspan="2">Realisasi Tahun Berjalan : {{$resdataproduksi->RealisasiTargetProduksi}} MT</td>
			</tr>
		</table>
		<br/>
		<h3>DATA EKSPLORASI</h3>
		<table width=100%>
			<tr>
				<td width=33%>Sumber Daya Terukur : {{$resdataeksplorasi->SumberDaya}} MT</td>
				<td colspan="2">Cadangan : {{$resdataeksplorasi->Cadangan}} MT</td>
			</tr>
			<?php if($resdataeksplorasi->PengeboranEksplorasi == '1') { ?>
			<tr>
				<td width=33%>Pengeboran Eksplorasi : Dilakukan</td>
				<td width=33%>Jumlah Titik Bor : {{$resdataeksplorasi->JumlahTitikBor}} Titik</td>
				<td width=33%>Total Kedalaman : {{$resdataeksplorasi->TotalKedalaman}} Mtr</td>
			</tr>
			<?php } ?>
			<?php if($resdataeksplorasi->PengeboranGeoteknik == '1') { ?>
			<tr>
				<td width=33%>Pengeboran Geoteknik : Dilakukan</td>
				<td colspan="2">Struktur Geoteknik : {{$resdataeksplorasi->StrukturGeoteknik}}</td>
			</tr>
			<?php } ?>
		</table>
		<?php if($htgspek > 0) { ?>
			<table class="tb-pengumuman">
				<tr class="tr-pengumuman">
                    <th class="th-pengumuman" width=5%>No</th>
                    <th class="th-pengumuman" width=20%>CV(ar)</th>
                    <th class="th-pengumuman" width=12%>TM(ar)</th>
                    <th class="th-pengumuman" width=13%>IM(adb)</th>
                    <th class="th-pengumuman" width=12%>Ash(ar)</th>
                    <th class="th-pengumuman" width=13%>VM(ar)</th>
                    <th class="th-pengumuman" width=12%>FC(ar)</th>
                    <th class="th-pengumuman" width=13%>TS(ar)</th>
                </tr>
                <?php
                    $counter = 1;
                    foreach($resspek as $row){
                ?>
                <tr>
                    <td class="td-pengumuman"> <?php echo $counter ?></td>
                    <td class="td-pengumuman"> <?php echo $row->CV.' Kcal' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->TM.' %' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->IM.' %' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->ASH.' %' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->VM.' %' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->FC.' %' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->TS.' %' ?></td>
                </tr>
                <?php $counter++; } ?>
			</table>
		<?php } ?>
		<br/>
		<h3>DATA STOCKPILE</h3>
		<table width=100%>
			<tr>
				<td width=25%>Nama : {{$resstock->Nama}}</td>
				<td width=25%>Status Kepemilikan : {{$resstock->KepemilikanStockpile}}</td>
				<td width=25%>Luas : {{$resstock->LuasStockpile}} Ha</td>
				<td width=25%>Kapasitas : {{$resstock->KapasitasStockpile}} MT</td>
			</tr>
			<tr>
				<td width=25%>Jarak Ke Tambang : {{$resstock->JarakTambang}} KM</td>
				<td width=25%>Jumlah Crusher : {{$resstock->JumlahCruiser}} Unit</td>
				<td colspan="2">Kapasitas Crusher : {{$resstock->KapasitasCruiser}} MT</td>
			</tr>
		</table>
		<br/>
		<h3>DATA JETTY</h3>
		<?php if($htgjetty > 0) { ?>
			<table class="tb-pengumuman">
				<tr class="tr-pengumuman">
					<th class="th-pengumuman" width=5%>No</th>
                    <th class="th-pengumuman" width=20%>Nama Jetty</th>
                    <th class="th-pengumuman" width=20%>Kepemilikan Jetty</th>
                    <th class="th-pengumuman" width=15%>Sistem Muat Jetty</th>
                    <th class="th-pengumuman" width=15%>Kapasitas Loading</th>
                    <th class="th-pengumuman" width=15%>Jumlah Sandaran</th>
                    <th class="th-pengumuman" width=10%>Luas</th>
				</tr>
				<?php
                    $counter = 1;
                    foreach($resdetjetty as $row){
                ?>
                <tr>
                    <td class="td-pengumuman"> <?php echo $counter ?></td>
                    <td class="td-pengumuman"> <?php echo $row->Nama ?></td>
                    <td class="td-pengumuman"> <?php echo $row->Kepemilikan ?></td>
                    <td class="td-pengumuman"> <?php echo $row->SystemMuat ?></td>
                    <td class="td-pengumuman"> <?php echo $row->Kapasitas.' Tph' ?></td>
                    <td class="td-pengumuman"> <?php echo $row->JumlahSandaran ?></td>
                    <td class="td-pengumuman"> <?php echo $row->Luas.' Ha' ?></td>
                </tr>
                <?php $counter++; } ?>
			</table>
		<?php } ?>
		<table width=100%>
			<tr>
				<td>Kapasitas Crusher : {{$resjetty->KapasitasCruiser}} FT</td>
			</tr>
			<tr>
				<td>Kapasitas Muat Tongkang : {{$resjetty->KapasitasMuat}} FT</td>
			</tr>
		</table>
	</body>
</html>