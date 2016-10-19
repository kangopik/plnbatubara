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
                <td class="td-pengumuman" width="300">
                    <div>Alamat</div>
                </td>
                <td class="td-pengumuman">
                    <div>{{$data->Alamat}}</div>
                </td>
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>3</div></td>
                <td class="td-pengumuman"><div>Pada Hari / Tanggal</div></td>
                <td class="td-pengumuman">{{$data->Hari}} / {{$data->Tanggal}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>4</div></td>
                <td class="td-pengumuman"><div>Pukul</div></td>
                <td class="td-pengumuman">{{$data->Pukul}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>5</div></td>
                <td class="td-pengumuman"><div>Tempat</div></td>
                <td class="td-pengumuman">{{$data->Tempat}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>6</div></td>
                <td class="td-pengumuman"><div>Acara</div></td>
                <td class="td-pengumuman">{{$data->Acara}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>7</div></td>
                <td class="td-pengumuman"><div>Contact Person</div></td>
                <td class="td-pengumuman">{{$data->ContactPerson}}</td> 
            </tr>
        </table>
        <p style="text-align:right;">Pejabat Pengadaan Batubara</p>
        <h1>&nbsp;</h1>
        <p>&nbsp;</p>
    </div>
</div>
@stop()