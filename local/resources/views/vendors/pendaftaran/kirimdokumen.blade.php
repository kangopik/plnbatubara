@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Kirim Dokumen</h2>
        <table>
        	<tbody style="border:none;">
        		<tr style="border:none;">
        			<td width="30" style="border:none;">1</td>
        			<td colspan="2" style="border:none;">Melalui  pengiriman dokumen / hard copy</td>
        		</tr>
        		<tr style="border:none;">
        			<td style="border:none;"></td>
        			<td colspan="2" style="border:none;">Ketentuan : <br />
						Pengiriman dokumen data perusahaan ditujukan kepada PT PLN Batubara dengan alamat: <br />
						PT. PLN (Persero) Batubara <br />
						<b>Jl. WarungBuncit Raya No. 10</b> <br />
						<b>Kalibata – Jakarta 12740</b> <br />
        			</td>
        		</tr>
        		<tr style="border:none;">
        			<td style="border:none;">2</td>
        			<td colspan="2" style="border:none;">Melalui on-line dengan upload file di bawah ini. (Tipe File hanya PDF) <br /></td>
        		</tr>
        		<tr>
        			<form action="{{action('DokumenController@add')}}" method="post" enctype="multipart/form-data">
        				<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        				<td style="border:none;"></td>
        				<td width="150" style="border:none;">Pilih File <input type="file" name="filefield" 
                                    accept="application/pdf"></td>
                        <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
        				<td style="border:none;"><input type="submit" value="Upload"></td>
                        <?php } ?>
        			</form>
        		</tr>                
        	</tbody>
        </table>	
        <table align=center>
            <tr align=center>
                <td align=center>
                    <br />
                    <?php  if($data->PersetujuanVerifikasi <> 'Y' ^ $data->Status<>1 || $data->StatusPakta <> 'Y') { ?>
                    <a href="<?php echo 'datateknistambang' ?>" class="btn btn-submit btn-primary" id="btnprev">
                    <i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
                    <a href="<?php echo 'paktaintegritas' ?>" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
                    <i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></a>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<script>
        $("#btnnext").click(function() {
            $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
            setTimeout($.unblockUI, 800);
        }); 
        $("#btnprev").click(function() {
            $.blockUI({ message: '<h1>Please Wait ...</h1>' }); 
            setTimeout($.unblockUI, 800);
        });
    </script>

@stop()