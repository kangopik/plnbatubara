@extends('admin.vendorlolos')
@section('isivendorlolos')
	<h3>Vendor Gagal</h3>
	<table class="table table-bordered table-hover">
      <thead>
        <!--<th style="text-align:center;" width="50">No</th>-->
        <th style="text-align:center;" width="300">Nama Perusahaan</th>
        <th style="text-align:center;">Alamat</th>
      </thead>
      <tbody>
      	<?php
      		foreach ($datagagal as $row) {
      	?>
      	<tr class="tr-pengumuman">
            <!--<td class="td-pengumuman"><//?php echo $row->No ?></td>-->
            <td class="td-pengumuman"><?php  echo $row->Nama.','.$row->BadanUsaha; ?></td>
            <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
        </tr>
      	<?php
      		}
      	?>
      	<?php echo $datagagal->render() ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    @yield('isivendorgagal')
@stop()