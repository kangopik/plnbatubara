@extends('layout.vendor')
@section('content')
<div class="row">
    <div class="col-lg-12">
    	<p>&nbsp;</p>
        <h3 style="text-align:center;">Hasil Diskusi Draft Kontrak</h2>
        <h4 style="text-align:center;">Pengadaan Batubara </h4>
        <p class="page-header"></p>
        <table class="table table-bordered tb-pengumuman">
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>1</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Nama Perusahaan</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>
                        <input type="text" style="width:90%; border: none; border-color: transparent;" value=""></input>
                    </div>
        		</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30">
        			<div>2</div>
        		</td>
        		<td class="td-pengumuman" width="200">
        			<div>Alamat</div>
        		</td>
        		<td class="td-pengumuman">
        			<div>
                        <input type="text" style="width:90%; border: none; border-color: transparent;" value=""></input>
                    </div>
        		</td>
        	</tr>
        	<tr class="tr-pengumuman">
        		<td class="td-pengumuman" width="30" colspan="3" style="text-align:center;">
        			<div>
        				Hasil diskusi sbb.: <br />
						Draft kontrak dilampirkan 
        			</div>
        		</td>
        	</tr>
        </table>
    </div>
</div>    
@stop()