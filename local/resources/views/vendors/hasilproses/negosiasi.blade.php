@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<p>&nbsp;</p>
        <h2 style="text-align:center;">Hasil Negosiasi</h2>
        <p class="page-header"></p>
        <table class="table table-bordered tb-pengumuman">
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>1</div>
        		</td>
        		<td class="td-pengumuman" width="320">
        			<div>Nama Perusahaan</div>
        		</td>
        		<td class="td-pengumuman" colspan="2">
        			<div><?php if($data->BadanUsaha == '1') { $BU = "PT"; }
                          else if($data->BadanUsaha == '2') { $BU = "CV"; } 
                          else if($data->BadanUsaha == '3') { $BU = "Koperasi"; }
                          else if($data->BadanUsaha == '4') { $BU = "Lainnya";} 
                          else { $BU = '';}
                    echo $data->Nama.','.$BU; ?>
                    </div>
        		</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman">
        			<div>2</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>Alamat</div>
        		</td>
        		<td class="td-pengumuman" colspan="2">
        			<div>{{$data->Alamat}}</div>
        		</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" colspan="4" style="text-align:center;">Hasil Klarifikasi dan negosiasi</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td></td>
        		<td></td>
        		<td class="td-pengumuman" width="300" style="text-align:center;">Penawaran Harga batubara</td> 
        		<td class="td-pengumuman" style="text-align:center;">Hasil  Negosiasi</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman">3</td>
        		<td class="td-pengumuman" colspan="3">Spesifikasi Batubara</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman"></td>
        		<td class="td-pengumuman">1. Total moisture</td>
        		<td class="td-pengumuman">{{$data->eptm}}</td> 
        		<td class="td-pengumuman">{{$data->hntm}}</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman"></td>
        		<td class="td-pengumuman">2. Total sulphur</td>
        		<td class="td-pengumuman">{{$data->epts}}</td> 
        		<td class="td-pengumuman">{{$data->hnts}}</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman"></td>
        		<td class="td-pengumuman">3. Gross calorivic value</td>
        		<td class="td-pengumuman">{{$data->epgcv}}</td> 
        		<td class="td-pengumuman">{{$data->hngcv}}</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman"></td>
        		<td class="td-pengumuman">4. Hardgrove Grindability Index (GHI) </td>
        		<td class="td-pengumuman">{{$data->ephgi}}</td> 
        		<td class="td-pengumuman">{{$data->hnhgi}}</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman"></td>
        		<td class="td-pengumuman">5. Ukuran Butiran</td>
        		<td class="td-pengumuman">{{$data->epub}}</td> 
        		<td class="td-pengumuman">{{$data->hnub}}</td>
        	</tr>
        	<tr>
        		<td class="td-pengumuman">4</td>
        		<td class="td-pengumuman">Harga batubara di stockpile loading @ MT</td>
        		<td class="td-pengumuman">{{$data->ephb}}</td> 
        		<td class="td-pengumuman">{{$data->hnhb}}</td>
        	</tr>
            <tr>
                <td class="td-pengumuman">5</td>
                <td class="td-pengumuman">Biaya angukutan @ MT</td>
                <td class="td-pengumuman">{{$data->epba}}</td> 
                <td class="td-pengumuman">{{$data->hnba}}</td>
            </tr>
            <tr>
                <td class="td-pengumuman">6</td>
                <td class="td-pengumuman">Harga Batubara di stockpile PLTU</td>
                <td class="td-pengumuman">{{$data->ephb}}</td> 
                <td class="td-pengumuman">{{$data->hnhb}}</td>
            </tr>
        </table>
        <p style="text-align:right;">Pejabat Pengadaan Batubara</p>
        <h1>&nbsp;</h1>
    </div>
</div>
@stop()