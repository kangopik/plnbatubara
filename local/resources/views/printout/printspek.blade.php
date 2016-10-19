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
		<h3>{{$resda->Nama}}, {{$resda->BadanUsaha}}</h3>
		<h3>DATA SPESIFIKASI BATUBARA</h3>
		<?php if($htgspek > 0) { ?>
			<table class="tb-pengumuman">
				<tr class="tr-pengumuman">
                    <th class="th-pengumuman" width=5%>No</th>
                    <th class="th-pengumuman" width=20%>Brand Calori</th>
                    <th class="th-pengumuman" width=20%>CV(ar)</th>
                    <th class="th-pengumuman" width=10%>TM(ar)</th>
                    <th class="th-pengumuman" width=10%>IM(adb)</th>
                    <th class="th-pengumuman" width=10%>Ash(ar)</th>
                    <th class="th-pengumuman" width=10%>VM(ar)</th>
                    <th class="th-pengumuman" width=10%>FC(ar)</th>
                    <th class="th-pengumuman" width=10%>TS(ar)</th>
                </tr>
                <?php
                    $counter = 1;
                    foreach($resspek as $row){
                ?>
                <tr>
                    <td class="td-pengumuman"> <?php echo $counter ?></td>
                    <td class="td-pengumuman"> <?php echo $row->values ?></td>
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
	</body>
</html>