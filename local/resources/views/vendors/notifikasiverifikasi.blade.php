@extends('layout.vendor')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Notifikasi Verifikasi
        <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>
    </div>
    <p>Data yang masih harus diperbaiki</p>
        <ul class="nav nav-second-level">
        	<?php if($hasilnotif->ckDataAdministrasi == '1') { ?>
            <li>
                <a href="<?php echo 'dataadministrasiperusahaan' ?>">Data Administrasi Perusahaan</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckLegalitasPerijinan == '1') { ?>
            <li>
                <a href="<?php echo 'legalitasperijinanperusahaan' ?>">Legalitas Perijinan Perusahaan</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckDataPengurus == '1') { ?>
            <li>
                <a href="<?php echo 'datapengurusperusahaan' ?>">Data Pengurus Perusahaan</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckDataPersonel == '1') { ?>
            <li>
                <a href="<?php echo 'datapersonelperusahaan' ?>">Data Personel Perusahaan</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckDataKeuangan == '1') { ?>
            <li>
                <a href="<?php echo 'datakeuangan' ?>">Data Keuangan</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckArmadaTransportasi == '1') { ?>
            <li>
                <a href="<?php echo 'armadatransportasi' ?>">Armada Transportasi</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckPengalamanPerusahaan == '1') { ?>
            <li>
                <a href="<?php echo 'pengalamanperusahaan' ?>">Pengalaman Perusahaan</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckKontrakPengadaan == '1') { ?>
            <li> 
                <a href="<?php echo 'kontrakpengadaanbatubara' ?>">Kontrak Pengadaan Batubara</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckLegalitasPerijinanTambang == '1') { ?>
            <li>
                <a href="<?php echo 'legalitasperijinantambang' ?>">Legalitas Perijinan Tambang</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckDataTeknis == '1') { ?>
            <li>
                <a href="<?php echo 'datateknistambang' ?>">Data Teknis Tambang</a>
            </li>
            <?php } ?>
            <?php if($hasilnotif->ckKirimDokumen == '1') { ?>
            <li>
                <a href="<?php echo 'kirimdokumen' ?>">Kirim Dokumen</a>
            </li>
            <?php } ?>
        </ul>
</div>
@stop()