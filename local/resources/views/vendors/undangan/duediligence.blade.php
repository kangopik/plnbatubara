@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <p>&nbsp;</p>
        <h3 style="text-align:center;">Undangan</h2>
        <h4 style="text-align:center;">Due Diligence Data Teknis</br>
        Peserta seleksi Calon Penyedia Batubara</h4>
        <p class="page-header"></p>
        <p>Berdasarkan hasil verifikasi data peserta seleksi, dengan ini kami mengundang :</p>
        <table class="table table-bordered tb-pengumuman">
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" width="30">
                    <div>1</div>
                </td>
                <td class="td-pengumuman" width="200">
                    <div>Nama Perusahaan</div>
                </td>
                <td class="td-pengumuman"><?php echo $data->Nama.', '.$data->BadanUsaha; ?>
                </td>
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" width="30">
                    <div>2</div>
                </td>
                <td class="td-pengumuman" width="300">
                    <div>Alamat</div>
                </td>
                <td class="td-pengumuman">{{$data->Alamat}}</td>
            </tr>
            <tr class="tr-pengumuman">
                <td class="td-pengumuman" colspan="3" style="text-align:center;">Diundang untuk hadir dalam persiapan pelaksanaan due diligence</td>
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