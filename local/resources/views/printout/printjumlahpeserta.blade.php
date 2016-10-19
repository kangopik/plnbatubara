<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Jumlah Peserta</title>
	</head>
	<body>
		<h3>Calon Penyedia Batubara Masuk</h3>
        <table class="table table-bordered table-hover">
          <tr>
            <th style="text-align:center;" width="50">No</th>
            <th style="text-align:center;" width="300">Nama Perusahaan</th>
            <th style="text-align:center;">Alamat</th>
          </tr>
          	<?php
          		$counter = 1;
          		foreach ($resultmasuk as $row) {
          	?>
          	<tr class="tr-pengumuman">
                <td class="td-pengumuman"><?php echo $counter ?></td>
                <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha ?></td>
                <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
            </tr>
          	<?php
          		$counter++;
          		}
          	?>
        </table>

        <p>&nbsp;</p>

        <h3>Calon Penyedia Batubara Lolos</h3>
		<table class="table table-bordered table-hover">
	      <tr>
	        <th style="text-align:center;" width="50">No</th>
	        <th style="text-align:center;" width="300">Nama Perusahaan</th>
	        <th style="text-align:center;">Alamat</th>
	      </tr>
	      	<?php
	      		$counterlolos = 1;
	      		foreach ($resultlolos as $row) {
	      	?>
	      	<tr class="tr-pengumuman">
	            <td class="td-pengumuman"><?php echo $counterlolos ?></td>
	            <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha ?></td>
	            <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
	        </tr>
	      	<?php
	      		$counterlolos++;
	      		}
	      	?>
	    </table>
	    <p>&nbsp;</p>

	    <h3>Calon Penyedia Batubara Gagal</h3>
		<table class="table table-bordered table-hover">
	      <tr>
	        <th style="text-align:center;" width="50">No</th>
	        <th style="text-align:center;" width="300">Nama Perusahaan</th>
	        <th style="text-align:center;">Alamat</th>
	      </tr>
	      	<?php
	      		$countergagal = 1;
	      		foreach ($resultgagal as $row) {
	      	?>
	      	<tr class="tr-pengumuman">
	            <td class="td-pengumuman"><?php echo $countergagal ?></td>
	            <td class="td-pengumuman"><?php echo $row->Nama.', '.$row->BadanUsaha ?></td>
	            <td class="td-pengumuman"><?php echo $row->Alamat ?></td>
	        </tr>
	      	<?php
	      		$countergagal++;
	      		}
	      	?>
	    </table>

	</body>
</html>