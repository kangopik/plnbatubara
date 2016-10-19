@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <p>&nbsp;</p>
        <h2 class="page-header" style="text-align:center;">Undangan</h2>
        <p>Berdasarkan hasil negosiasi, dengan ini kami menunjuk :</p>
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
                <td class="td-pengumuman" colspan="3" style="text-align:center;">Sebagai Penyedia Batubara , dengan ketentuan sbb. :</td>
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>3</div></td>
                <td class="td-pengumuman"><div>Lingkup pekerjaan yang harus dilaksanakan</div></td>
                <td class="td-pengumuman">{{$data->Lingkup}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>4</div></td>
                <td class="td-pengumuman"><div>Volume pengadaan Batubara</div></td>
                <td class="td-pengumuman">{{$data->Volume}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>5</div></td>
                <td class="td-pengumuman"><div>Spesifikasi batubara </div></td>
                <td class="td-pengumuman">{{$data->Spesifikasi}}</td> 
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman"><div>6</div></td>
                <td class="td-pengumuman"><div>Surat Penunjukan</div></td>
                <td class="td-pengumuman">{{$data->Surat}}</td> 
            </tr>
        </table>
        <p style="text-align:right;">Pejabat Pengadaan Batubara</p>
        <h1>&nbsp;</h1>
        <p>&nbsp;</p>
    </div>
</div>
@stop()