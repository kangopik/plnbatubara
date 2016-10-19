@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Jumlah Calon Penyedia Batubara</h2>
        <a href="<?php echo 'PDFJumlahPeserta' ?>" target="_blank" class="btn btn-primary btn-block btn-flat" style="width:120px;">Export To PDF</a>
        <h3>Vendor Masuk</h3>
        <table class="table table-bordered table-hover">
          <thead>
            <!--<th style="text-align:center;" width="50">No</th>-->
            <th style="text-align:center;" width="300">Nama Perusahaan</th>
            <th style="text-align:center;">Alamat</th>
          </thead>
          <tbody>
          	<?php
          		foreach ($datamasuk as $row) {
          	?>
          	<tr class="tr-pengumuman">
                <!--<td class="td-pengumuman"><//?php echo $row->No ?></td>-->
                <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
                <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
            </tr>
          	<?php
          		}
          	?>
          	<?php echo $datamasuk->render() ?>
          </tbody>
        </table>
        <p>&nbsp;</p>
        @yield('isivendormasuk')
    <div>
<div>
@stop()