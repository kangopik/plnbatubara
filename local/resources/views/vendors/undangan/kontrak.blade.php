@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <p>&nbsp;</p>
        <h3 style="text-align:center;">Undangan</h2>
        <h4 style="text-align:center;">Negosiasi Penawaran Harga Batubara</h4>
        <p class="page-header"></p>
        <p>Berdasarkan hasil evaluasi penawaran harga batubara, dengan ini kami mengundang :</p>
        <table class="table table-bordered tb-pengumuman">
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" width="30">
                    <div>1</div>
                </td>
                <td class="td-pengumuman" width="200">
                    <div>Nama Perusahaan</div>
                </td>
                <td class="td-pengumuman">
                    <div><?php if($data->BadanUsaha == '1') { $BU = "PT"; }
                          else if($data->BadanUsaha == '2') { $BU = "CV"; } 
                          else if($data->BadanUsaha == '3') { $BU = "Koperasi"; }
                          else if($data->BadanUsaha == '4') { $BU = "Lainnya";} 
                          else { $BU = '';}
                    echo $data->Nama.','.$BU; ?></div>
                </td>
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" width="30">
                    <div>2</div>
                </td>
                <td class="td-pengumuman" width="120">
                    <div>Alamat</div>
                </td>
                <td class="td-pengumuman">
                    <div>{{$data->Alamat}}</div>
                </td>
            </tr>
            <tr>
            	<td class="td-pengumuman" align=center colspan="3">
            		Hasil diskusi sbb.: <br />
					Draft kontrak dilampirkan
            	</td>
            </tr>
        </table>
        <p style="text-align:right;">Pejabat Pengadaan Batubara</p>
        <h1>&nbsp;</h1>
        <p>&nbsp;</p>
    </div>
</div>
@stop()