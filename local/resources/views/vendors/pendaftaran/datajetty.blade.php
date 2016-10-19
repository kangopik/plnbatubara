@extends('layout.vendor')
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#Kapasitas').mask("#.##0", {reverse: true});
    $('#Luas').mask("#.##0", {reverse: true});
    $('#Kedalaman').mask("#.##0", {reverse: true});
    $('#Jarak').mask("#.##0", {reverse: true});
    $('#KapasitasCruiser').mask("#.##0", {reverse: true});
    $('#JumlahSandaran').mask("#.##0", {reverse: true});
    $('#KapasitasManual').mask("#.##0", {reverse: true});
    $('#KapasitasConveyor').mask("#.##0", {reverse: true});
    $("#trcatatan").hide();

    $('#SystemMuat').on('change',function(e){
        var sm = $('#SystemMuat').val();

        if(sm == 'Manual'){
            $("#trloading").show();
            $("#trmanual").hide();
            $("#trconveyor").hide();
        }else if (sm == 'Conveyor'){
            $("#trloading").show();
            $("#trmanual").hide();
            $("#trconveyor").hide();
        }else if (sm == 'Manual dan Conveyor'){
            $("#trloading").hide();
            $("#trmanual").show();
            $("#trconveyor").show();
        }else{
            $("#trloading").show();
            $("#trmanual").hide();
            $("#trconveyor").hide();
        }
    });

    var provId = $('#Provinsi').val();
    var kotaId = 0;
    var kecamatanId = 0;
    var kelurahanId = 0;
    
    if(provId > 0){
        var kotaId = $('#KotaId').val();
        $.ajax({
            url:'KotaDDL/'+provId+'/'+kotaId,
            type:'GET',
            success:function(data){
                $('#Kota').empty();
                $('#Kota').append("<option value=''>-- Pilih Kota/Kabupaten --</option>");
                $('#Kota').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });

        var kecamatanId = $('#KecamatanId').val();
        $.ajax({
            url:'KecamatanDDL/'+kotaId+'/'+kecamatanId,
            type:'GET',
            success:function(data){
                $('#Kecamatan').empty();
                $('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
                $('#Kecamatan').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });

        var kelurahanId = $('#KelurahanId').val();
        $.ajax({
            url:'KelurahanDDL/'+kecamatanId+'/'+kelurahanId,
            type:'GET',
            success:function(data){
                $('#Kelurahan').empty();
                $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                $('#Kelurahan').append(data);
            }, error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }

    $('#Provinsi').on('change',function(e){
        provId = $('#Provinsi').val();
        if(provId > 0){
            $.ajax({
                url:'KotaDDL/'+provId+'/0',
                type:'GET',
                success:function(data){
                    $('#Kota').empty();
                    $('#Kota').append("<option value=''>-- Pilih Kota/Kabupaten --</option>");
                    $('#Kota').append(data);
                    $('#Kecamatan').empty();
                    $('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
                    $('#Kelurahan').empty();
                    $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
            $('#Kota').empty();
            $('#Kota').append("<option value=''>-- Pilih Kota/Kabupaten --</option>");
            $('#Kecamatan').empty();
            $('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
            $('#Kelurahan').empty();
            $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
        }
    });

    $('#Kota').on('change',function(e){
        kotaId = $('#Kota').val();
        if(kotaId > 0){
            $.ajax({
                url:'KecamatanDDL/'+kotaId+'/0',
                type:'GET',
                success:function(data){
                    $('#Kecamatan').empty();
                    $('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
                    $('#Kecamatan').append(data);
                    $('#Kelurahan').empty();
                    $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
            $('#Kecamatan').empty();
            $('#Kecamatan').append("<option value=''>-- Pilih Kecamatan --</option>");
            $('#Kelurahan').empty();
            $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
        }
    });

    $('#Kecamatan').on('change',function(e){
        kecamatanId = $('#Kecamatan').val();
        if(kecamatanId > 0){
            $.ajax({
                url:'KelurahanDDL/'+kecamatanId+'/0',
                type:'GET',
                success:function(data){
                    $('#Kelurahan').empty();
                    $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
                    $('#Kelurahan').append(data);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }else{
            $('#Kelurahan').empty();
            $('#Kelurahan').append("<option value=''>-- Pilih Kelurahan --</option>");
        }
    });
});
</script>
<div class="row">
    <div class="col-lg-12">
    	<h2 class="page-header">Data Teknis Tambang Calon Penyedia Batubara <?php echo $data->Nama.', '.$data->BadanUsaha; ?></h2>

    	<div class="row">
			<div class="col-md-12 clearfix">
				<div id="tab_content_data">
        			<ul class="nav nav-tabs" data-toggle="tabs">
        				<li class="">
                            <a href="<?php echo 'datatambang' ?>">Data Tambang</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datakapasitasproduksi' ?>">Kapasitas Produksi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'dataeksplorasi' ?>">Data Eksplorasi</a>
                        </li>
                        <li class="">
                            <a href="<?php echo 'datastockpile' ?>">Stockpile Tambang</a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0);">Data Jetty</a>
                        </li>
        			</ul>
        		</div>
                <form action="{{action('VendorController@savedatajety')}}" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <tbody>
                            <tr class="success">
                                <th colspan="6">Data Jetty</th>
                            </tr>
                            <tr>
                                <td style="border:none;" colspan="6">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th style="text-align:center;" width=50>No</th>
                                            <th style="text-align:center;" width=100>Nama Jetty</th>
                                            <th style="text-align:center;" width=100>Kepemilikan Jetty</th>
                                            <th style="text-align:center;" width=100>Sistem Muat Jetty</th>
                                            <th style="text-align:center;" width=100>Kapasitas Loading</th>
                                            <th style="text-align:center;" width=100>Jumlah Sandaran</th>
                                            <th style="text-align:center;" width=80>Luas</th>
                                            <th style="text-align:center;" width=120>Koordinat</th>
                                            <th style="text-align:center;" width=120>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                foreach($data2 as $row){
                                            ?>
                                            <tr>
                                                <td> <?php echo $counter ?></td>
                                                <td> <?php echo $row->Nama ?></td>
                                                <td> <?php echo $row->Kepemilikan ?></td>
                                                <td> <?php echo $row->SystemMuat ?></td>
                                                <td> <?php echo $row->Kapasitas.' Tph' ?></td>
                                                <td> <?php echo $row->JumlahSandaran ?></td>
                                                <td> <?php echo $row->Luas.' Ha' ?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?php echo 'koorjetty/'.$row->Id; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> View</a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <?php if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                                    <a href="" onclick="document.getElementById('idjetty').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('Nama').value='<?php echo $row->Nama ?>';
                                                                            <?php if($row->NamaCk=='1') { ?>
                                                                            document.getElementById('Nama').setAttribute('readOnly','true');
                                                                            document.getElementById('Nama').style.background = '#eee'; 
                                                                            document.getElementById('Nama').style.color = '#555';
                                                                            <?php } else if($row->NamaCk=='0') { ?>
                                                                            document.getElementById('Nama').style.background = 'red';
                                                                            document.getElementById('Nama').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Nama').style.background = '#FFF';
                                                                            document.getElementById('Nama').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Kepemilikan').value='<?php echo $row->Kepemilikan ?>';
                                                                            <?php if($row->KepemilikanCk=='1') { ?>
                                                                            document.getElementById('Kepemilikan').setAttribute('readOnly','true');
                                                                            document.getElementById('Kepemilikan').style.background = '#eee'; 
                                                                            document.getElementById('Kepemilikan').style.color = '#555';
                                                                            <?php } else if($row->KepemilikanCk=='0') { ?>
                                                                            document.getElementById('Kepemilikan').style.background = 'red';
                                                                            document.getElementById('Kepemilikan').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Kepemilikan').style.background = '#FFF';
                                                                            document.getElementById('Kepemilikan').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('SystemMuat').value='<?php echo $row->SystemMuat ?>';
                                                                            <?php if($row->SystemMuatCk=='1') { ?>
                                                                            document.getElementById('SystemMuat').setAttribute('readOnly','true');
                                                                            document.getElementById('SystemMuat').style.background = '#eee'; 
                                                                            document.getElementById('SystemMuat').style.color = '#555';
                                                                            <?php } else if($row->SystemMuatCk=='0') { ?>
                                                                            document.getElementById('SystemMuat').style.background = 'red';
                                                                            document.getElementById('SystemMuat').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('SystemMuat').style.background = '#FFF';
                                                                            document.getElementById('SystemMuat').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Kapasitas').value='<?php echo $row->Kapasitas ?>';
                                                                            <?php if($row->KapasitasCk=='1') { ?>
                                                                            document.getElementById('Kapasitas').setAttribute('readOnly','true');
                                                                            document.getElementById('Kapasitas').style.background = '#eee'; 
                                                                            document.getElementById('Kapasitas').style.color = '#555';
                                                                            <?php } else if($row->KapasitasCk=='0') { ?>
                                                                            document.getElementById('Kapasitas').style.background = 'red';
                                                                            document.getElementById('Kapasitas').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Kapasitas').style.background = '#FFF';
                                                                            document.getElementById('Kapasitas').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('KapasitasManual').value='<?php echo $row->KapasitasManual ?>';
                                                                            <?php if($row->KapasitasManualCk=='1') { ?>
                                                                            document.getElementById('KapasitasManual').setAttribute('readOnly','true');
                                                                            document.getElementById('KapasitasManual').style.background = '#eee'; 
                                                                            document.getElementById('KapasitasManual').style.color = '#555';
                                                                            <?php } else if($row->KapasitasManualCk=='0') { ?>
                                                                            document.getElementById('KapasitasManual').style.background = 'red';
                                                                            document.getElementById('KapasitasManual').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('KapasitasManual').style.background = '#FFF';
                                                                            document.getElementById('KapasitasManual').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('KapasitasConveyor').value='<?php echo $row->KapasitasConveyor ?>';
                                                                            <?php if($row->KapasitasConveyorCk=='1') { ?>
                                                                            document.getElementById('KapasitasConveyor').setAttribute('readOnly','true');
                                                                            document.getElementById('KapasitasConveyor').style.background = '#eee'; 
                                                                            document.getElementById('KapasitasConveyor').style.color = '#555';
                                                                            <?php } else if($row->KapasitasConveyorCk=='0') { ?>
                                                                            document.getElementById('KapasitasConveyor').style.background = 'red';
                                                                            document.getElementById('KapasitasConveyor').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('KapasitasConveyor').style.background = '#FFF';
                                                                            document.getElementById('KapasitasConveyor').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('JumlahSandaran').value='<?php echo $row->JumlahSandaran ?>';
                                                                            <?php if($row->JumlahSandaranCk=='1') { ?>
                                                                            document.getElementById('JumlahSandaran').setAttribute('readOnly','true');
                                                                            document.getElementById('JumlahSandaran').style.background = '#eee'; 
                                                                            document.getElementById('JumlahSandaran').style.color = '#555';
                                                                            <?php } else if($row->JumlahSandaranCk=='0') { ?>
                                                                            document.getElementById('JumlahSandaran').style.background = 'red';
                                                                            document.getElementById('JumlahSandaran').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('JumlahSandaran').style.background = '#FFF';
                                                                            document.getElementById('JumlahSandaran').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Luas').value='<?php echo $row->Luas; ?>';
                                                                            <?php if($row->LuasCk=='1') { ?>
                                                                            document.getElementById('Luas').setAttribute('readOnly','true');
                                                                            document.getElementById('Luas').style.background = '#eee'; 
                                                                            document.getElementById('Luas').style.color = '#555';
                                                                            <?php } else if($row->LuasCk=='0') { ?>
                                                                            document.getElementById('Luas').style.background = 'red';
                                                                            document.getElementById('Luas').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Luas').style.background = '#FFF';
                                                                            document.getElementById('Luas').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Kedalaman').value='<?php echo $row->Kedalaman; ?>';
                                                                            <?php if($row->KedalamanCk=='1') { ?>
                                                                            document.getElementById('Kedalaman').setAttribute('readOnly','true');
                                                                            document.getElementById('Kedalaman').style.background = '#eee'; 
                                                                            document.getElementById('Kedalaman').style.color = '#555';
                                                                            <?php } else if($row->KedalamanCk=='0') { ?>
                                                                            document.getElementById('Kedalaman').style.background = 'red';
                                                                            document.getElementById('Kedalaman').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Kedalaman').style.background = '#FFF';
                                                                            document.getElementById('Kedalaman').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Jarak').value='<?php echo $row->Jarak; ?>';
                                                                            <?php if($row->JarakCk=='1') { ?>
                                                                            document.getElementById('Jarak').setAttribute('readOnly','true');
                                                                            document.getElementById('Jarak').style.background = '#eee'; 
                                                                            document.getElementById('Jarak').style.color = '#555';
                                                                            <?php } else if($row->JarakCk=='0') { ?>
                                                                            document.getElementById('Jarak').style.background = 'red';
                                                                            document.getElementById('Jarak').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Jarak').style.background = '#FFF';
                                                                            document.getElementById('Jarak').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('Provinsi').value='<?php echo $row->Provinsi; ?>';
                                                                            <?php if($row->ProvinsiCk=='1') { ?>
                                                                            document.getElementById('Provinsi').setAttribute('readOnly','true');
                                                                            document.getElementById('Provinsi').style.background = '#eee'; 
                                                                            document.getElementById('Provinsi').style.color = '#555';
                                                                            <?php } else if($row->ProvinsiCk=='0') { ?>
                                                                            document.getElementById('Provinsi').style.background = 'red';
                                                                            document.getElementById('Provinsi').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Provinsi').style.background = '#FFF';
                                                                            document.getElementById('Provinsi').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('KotaId').value='<?php echo $row->Kota; ?>';
                                                                            <?php if($row->KotaCk=='1') { ?>
                                                                            document.getElementById('Kota').setAttribute('readOnly','true');
                                                                            document.getElementById('Kota').style.background = '#eee'; 
                                                                            document.getElementById('Kota').style.color = '#555';
                                                                            <?php } else if($row->KotaCk=='0') { ?>
                                                                            document.getElementById('Kota').style.background = 'red';
                                                                            document.getElementById('Kota').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Kota').style.background = '#FFF';
                                                                            document.getElementById('Kota').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('KecamatanId').value='<?php echo $row->Kecamatan; ?>';
                                                                            <?php if($row->KecamatanCk=='1') { ?>
                                                                            document.getElementById('Kecamatan').setAttribute('readOnly','true');
                                                                            document.getElementById('Kecamatan').style.background = '#eee'; 
                                                                            document.getElementById('Kecamatan').style.color = '#555';
                                                                            <?php } else if($row->KecamatanCk=='0') { ?>
                                                                            document.getElementById('Kecamatan').style.background = 'red';
                                                                            document.getElementById('Kecamatan').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Kecamatan').style.background = '#FFF';
                                                                            document.getElementById('Kecamatan').style.color = '#555';
                                                                            <?php } ?>
                                                                            document.getElementById('KelurahanId').value='<?php echo $row->Kelurahan; ?>';
                                                                            <?php if($row->KelurahanCk=='1') { ?>
                                                                            document.getElementById('Kelurahan').setAttribute('readOnly','true');
                                                                            document.getElementById('Kelurahan').style.background = '#eee'; 
                                                                            document.getElementById('Kelurahan').style.color = '#555';
                                                                            <?php } else if($row->KelurahanCk=='0') { ?>
                                                                            document.getElementById('Kelurahan').style.background = 'red';
                                                                            document.getElementById('Kelurahan').style.color = '#FFF';
                                                                            <?php } else { ?>
                                                                            document.getElementById('Kelurahan').style.background = '#FFF';
                                                                            document.getElementById('Kelurahan').style.color = '#555';
                                                                            <?php } ?>
                                                                            $('#KapasitasCruiser2').val($('#KapasitasCruiser').val());
                                                                            $('#KapasitasMuat2').val($('#KapasitasMuat').val());
                                                                            $('#Catatan_h').val($('#Catatan').val());
                                                                            if('<?php echo $row->SystemMuat ?>' == 'Manual'){
                                                                                $('#trloading').show();
                                                                                $('#trmanual').hide();
                                                                                $('#trconveyor').hide();
                                                                            }else if ('<?php echo $row->SystemMuat ?>' == 'Conveyor'){
                                                                                $('#trloading').show();
                                                                                $('#trmanual').hide();
                                                                                $('#trconveyor').hide();
                                                                            }else if ('<?php echo $row->SystemMuat ?>' == 'Manual dan Conveyor'){
                                                                                $('#trloading').hide();
                                                                                $('#trmanual').show();
                                                                                $('#trconveyor').show();
                                                                            }else{
                                                                                $('#trloading').show();
                                                                                $('#trmanual').hide();
                                                                                $('#trconveyor').hide();
                                                                            };"
                                                            data-toggle="modal" data-target="#formModal">
                                                            <i class="fa fa-pencil-square-o"></i> Ubah</a> |
                                                        <a href="" onclick="document.getElementById('idjetty2').value='<?php echo $row->Id ?>';
                                                                            document.getElementById('asaltambang2').value='<?php echo $row->AsalTambang ?>';
                                                                            document.getElementById('userid2').value='<?php echo $row->UserId ?>';"
                                                                data-toggle="modal" data-target="#confirmModal">
                                                            <i class="fa fa-trash-o"></i> Hapus</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $counter++; } ?>
                                        </tbody>
                                    </table>
                                    <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>
                                    <input type="button" value="Tambah Jetty" class="btn btn-submit  btn-primary" 
                                        data-toggle="modal" data-target="#formModal"
                                        onclick="document.getElementById('idjetty').value='';
                                                $('#Nama').attr('readonly', false);
                                                $('#Kepemilikan').attr('readonly', false);
                                                $('#SystemMuat').attr('readonly', false);
                                                $('#Kapasitas').attr('readonly', false);
                                                $('#JumlahSandaran').attr('readonly', false);
                                                $('#Luas').attr('readonly', false);
                                                $('#Kedalaman').attr('readonly', false);
                                                $('#Jarak').attr('readonly', false);
                                                document.getElementById('Nama').value='';
                                                document.getElementById('Nama').style.background = '#FFF';
                                                document.getElementById('Nama').style.color = '#555';
                                                document.getElementById('Kepemilikan').value='';
                                                document.getElementById('Kepemilikan').style.background = '#FFF';
                                                document.getElementById('Kepemilikan').style.color = '#555';
                                                document.getElementById('SystemMuat').value='';
                                                document.getElementById('SystemMuat').style.background = '#FFF';
                                                document.getElementById('SystemMuat').style.color = '#555';
                                                document.getElementById('Kapasitas').value='';
                                                document.getElementById('Kapasitas').style.background = '#FFF';
                                                document.getElementById('Kapasitas').style.color = '#555';
                                                document.getElementById('KapasitasManual').value='';
                                                document.getElementById('KapasitasManual').style.background = '#FFF';
                                                document.getElementById('KapasitasManual').style.color = '#555';
                                                document.getElementById('KapasitasConveyor').value='';
                                                document.getElementById('KapasitasConveyor').style.background = '#FFF';
                                                document.getElementById('KapasitasConveyor').style.color = '#555';
                                                document.getElementById('JumlahSandaran').value='';
                                                document.getElementById('JumlahSandaran').style.background = '#FFF';
                                                document.getElementById('JumlahSandaran').style.color = '#555';
                                                document.getElementById('Luas').value='';
                                                document.getElementById('Luas').style.background = '#FFF';
                                                document.getElementById('Luas').style.color = '#555';
                                                document.getElementById('Kedalaman').value='';
                                                document.getElementById('Kedalaman').style.background = '#FFF';
                                                document.getElementById('Kedalaman').style.color = '#555';
                                                document.getElementById('Jarak').value='';
                                                document.getElementById('Jarak').style.background = '#FFF';
                                                document.getElementById('Jarak').style.color = '#555';
                                                $('#KapasitasCruiser2').val($('#KapasitasCruiser').val());
                                                $('#KapasitasMuat2').val($('#KapasitasMuat').val());
                                                $('#Catatan_h').val($('#Catatan').val());" >
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Kapasitas Crusher</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">FT</a>
                                    <div class="col-sm-4">
                                        <div data-tip="masukan kapasitas cruiser">
                                            <input type='text' class='form-control' name="KapasitasCruiser" id="KapasitasCruiser" 
                                                    value="{{$data1->KapasitasCruiser}}" onkeypress="return isDecimal(event)"
                                                <?php if(($data1->KapasitasCruiserCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->KapasitasCruiserCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none; border-top:none;" width="200">Kapasitas Muat Tongkang</td>
                                <td style="border:none; border-top:none;"><a style="font-size:16px;">FT</a>
                                    <div class="col-sm-4">
                                        <div data-tip="masukan kapasitas muat tongkang">
                                            <input type='text' class='form-control' name="KapasitasMuat" id="KapasitasMuat" 
                                                    value="{{$data1->KapasitasMuat}}"
                                                <?php if(($data1->KapasitasMuatCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->KapasitasMuatCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
                                            ></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="trcatatan">
                                <td style="border:none; border-top:none;">Catatan</td>
                                <td style="border:none; border-top:none;" colspan="5">
                                    <div class="col-sm-12">
                                        <div data-tip="masukan catatan">
                                            <textarea class='form-control' name="Catatan" id="Catatan" 
                                                    value="{{$data1->Catatan}}"
                                                    <?php if(($data1->CatatanCk=='1') || ($data1->PersetujuanVerifikasi=='Y' && $data1->Status==1)
                                                    || ($data1->PersetujuanVerifikasi=='N' && $data1->StatusPakta=='Y')) { ?> readonly="true"
                                                <?php }else if ($data1->CatatanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>>{{$data1->Catatan}}</textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width=100%>
                        <tr>               
                            <?php  if($data1->PersetujuanVerifikasi <> 'Y' ^ $data1->Status<>1 || $data1->StatusPakta <> 'Y') { ?>     
                            <td width=50%>
                                <a href="<?php echo 'datastockpile' ?>" class="btn btn-primary btn-block btn-flat" 
                                            id="btnprev" role="button" style="width:35%; margin-left:60%; margin-right:40%;">
                                            <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i>
                                            Sebelumnya</a>
                            </td>
                            <td width=50%>
                                <button style="text-transform:none; width:150px;" type="submit" 
                                    class="btn btn-submit  btn-primary" id="btnnext">
                                    Selanjutnya
                                <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
                            </td>
                            <?php } ?>
                        </tr>
                    </table>
                </form>
        		<p>(*) Rincian nama SEAM dan ketebalannya <br />
					(**) Probable reserves/proved reserves
				</p>	
        	</div>
        </div>
    </div>
</div>

<!-- modal koordinat begin -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="koordinatModalLabel">Data Jetty</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('VendorController@savedetailjetty')}}" method="post">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="idjetty" id="idjetty">
                            <input type="hidden" name="KapasitasCruiser2" id="KapasitasCruiser2">
                            <input type="hidden" name="KapasitasMuat2" id="KapasitasMuat2">
                            <input type="hidden" name="Catatan_h" id="Catatan_h">
                            <input type="hidden" id="KotaId">
                            <input type="hidden" id="KecamatanId">
                            <input type="hidden" id="KelurahanId">
                            <table class="table table-bordered" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Nama Jetty</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-8'>
                                                <div data-tip="masukan nama jetty">   
                                                    <input type='text' class='form-control' name="Nama" id="Nama"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Kepemilikan Jetty</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>
                                                <div data-tip="masukan kepemilikan jetty">   
                                                    <select name='Kepemilikan' id='Kepemilikan' class='form-control'>
                                                        <option value="" selected>- Pilih Kepemilikan -</option> 
                                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                                        <option value="Sewa">Sewa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Sistem Muat Jetty</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-6'>
                                                <div data-tip="masukan sistem muat jetty">   
                                                    <select name='SystemMuat' id='SystemMuat' class='form-control'>
                                                        <option value="" selected>- Pilih Sistem Muat -</option> 
                                                        <option value="Manual">Manual</option>
                                                        <option value="Conveyor">Conveyor</option>
                                                        <option value="Manual dan Conveyor">Manual dan Conveyor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="trloading">
                                        <td style="border:none; border-top:none;" width=150>Kapasitas Loading</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan kapasitas loading">   
                                                    <input type='text' class='form-control' name="Kapasitas" id="Kapasitas" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div><a style="font-size:16px;">MT</a>
                                        </td>
                                    </tr>
                                    <tr id="trmanual">
                                        <td style="border:none; border-top:none;" width=150>Kapasitas Manual</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan kapasitas loading manual">   
                                                    <input type='text' class='form-control' name="KapasitasManual" id="KapasitasManual" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div><a style="font-size:16px;">MT</a>
                                        </td>
                                    </tr>
                                    <tr id="trconveyor">
                                        <td style="border:none; border-top:none;" width=150>Kapasitas Conveyor</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan kapasitas loading conveyor">   
                                                    <input type='text' class='form-control' name="KapasitasConveyor" id="KapasitasConveyor" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div><a style="font-size:16px;">MT</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Jumlah Sandaran Kapal</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan jumlah sandaran kapal">   
                                                    <input type='text' class='form-control' name="JumlahSandaran" id="JumlahSandaran" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Luas</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan luas">   
                                                    <input type='text' class='form-control' name="Luas" id="Luas" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div><a style="font-size:16px;">Ha</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Kedalaman</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan kedalaman">   
                                                    <input type='text' class='form-control' name="Kedalaman" id="Kedalaman" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div><a style="font-size:16px;">Mtr</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width=150>Jarak Tambang ke Jetty</td>
                                        <td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
                                            <div class='col-sm-5'>
                                                <div data-tip="masukan jarak tambang">   
                                                    <input type='text' class='form-control' name="Jarak" id="Jarak" 
                                                        onkeypress="return isDecimal(event)"></input>
                                                </div>
                                            </div><a style="font-size:16px;">KM</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width="180">Provinsi</td>
                                        <td style="border:none; border-top:none;" colspan="2">
                                            <div class="col-sm-10">
                                                <div data-tip="pilih provinsi">
                                                    <select name="Provinsi" id="Provinsi" class="form-control" >
                                                        <option value="">- Pilih Provinsi -</option>
                                                        <?php
                                                            foreach($dataProvinsi as $r){
                                                        ?>
                                                                <option value="<?= $r->ProvinsiId; ?>"><?= $r->ProvinsiName ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width="180">Kota/Kabupaten</td>
                                        <td style="border:none; border-top:none;" colspan="2">
                                            <div class="col-sm-10">
                                                <div data-tip="pilih kota">
                                                    <select name="Kota" id="Kota" class="form-control" >
                                                        <option value="">- Pilih Kota/Kabupaten -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width="180">Kecamatan</td>
                                        <td style="border:none; border-top:none;" colspan="2">
                                            <div class="col-sm-10">
                                                <div data-tip="pilih kecamatan">
                                                    <select name="Kecamatan" id="Kecamatan" class="form-control" >
                                                        <option value="">- Pilih Kecamatan -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none; border-top:none;" width="180">Kelurahan</td>
                                        <td style="border:none; border-top:none;" colspan="2">
                                            <div class="col-sm-10">
                                                <div data-tip="pilih kelurahan">
                                                    <select name="Kelurahan" id="Kelurahan" class="form-control" >
                                                        <option value="">- Pilih Kelurahan -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                <input  type="submit" value="Simpan Data" class="btn btn-submit  btn-primary">
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal koordinat end -->

    <!-- modal konfirmasi sumber tambang end -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deletedetailjetty')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="idjetty2" id="idjetty2">
                        <input type="hidden" name="asaltambang2" id="asaltambang2">
                        <input type="hidden" name="userid2" id="userid2">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus jetty ini 
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal konfirmasi koordinat end -->

<script>
    $("#btnnext").submit(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    }); 
    $("#btnprev").click(function() {
        $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
        setTimeout($.unblockUI, 800);
    });
</script>
@stop()