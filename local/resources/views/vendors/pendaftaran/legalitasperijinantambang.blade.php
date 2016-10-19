@extends('layout.vendor')
@section('content')
<style type="text/css">
	.datepicker{z-index:9999 !important}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#trdireksi").hide();
	$("#trpemegang").hide();
	$("#iupopfield1").hide();
	$("#iupopfield2").hide();
	$("#iupopfield3").hide();
	$("#iupopfield4").hide();
	$("#iupopfield5").hide();
	$("#iupopfield6").hide();
	$("#iupopfield9").hide();
	$("#iupopfield10").hide();
	$("#iupopfield11").hide();
	$("#iupopfield12").hide();
	$("#iupopkfield1").hide();
	$("#iupopkfield2").hide();
	$("#iupopkfield3").hide();
	$("#iupopkfield4").hide();
	$("#iupopkfield5").hide();
	$("#iupopkfield6").hide();
	$("#iupopkfield7").hide();
	$("#iupopk2field1").hide();
	$("#iupopk2field2").hide();
	$("#iupopk2field3").hide();
	$("#iupopk2field4").hide();
	$("#iupopk2field5").hide();
	$("#iupopk2field6").hide();
	$("#iupopk2field7").hide();
	$("#pkp2bfield1").hide();
	$("#pkp2bfield2").hide();
	$('#trbutton').hide();
	$("#ket1").hide();
	$("#ket2").hide();
	$("#iupopterbit1").hide();
	$("#iupopterbit2").hide();
	$("#iupopterbit3").hide();
	$("#iupopkterbit1").hide();
	$("#iupopkterbit2").hide();
	$("#iupopkterbit3").hide();
	$("#iupopk2terbit1").hide();
	$("#iupopk2terbit2").hide();
	$("#iupopk2terbit3").hide();
	$('#siup_no').attr('required',false);
	$('#siup_tanggal').attr('required',false);
	$('#siup_jangkawaktu').attr('required',false);
	$('#siup_menerbitkan').attr('required',false);
	$('#siup_sertifikat').attr('required',false);
	$('#iupopk_no').attr('required',false);
	$('#iupopk_tanggal').attr('required',false);
	$('#iupopk_jangkawaktu').attr('required',false);
	$('#iupopk_menerbitkan').attr('required',false);
	$('#iupopk2_no').attr('required',false);
	$('#iupopk2_tanggal').attr('required',false);
	$('#iupopk2_jangkawaktu').attr('required',false);
	$('#iupopk2_menerbitkan').attr('required',false);
	if (document.getElementById("iupop").checked == true) {
        $("#iupopfield1").show();
		$("#iupopfield2").show();
		$("#iupopfield3").show();
		$("#iupopfield4").show();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").show();
		$("#iupopfield10").show();
		$("#iupopfield11").show();
		$("#iupopfield12").show();
		$("#iupopkfield1").hide();
		$("#iupopkfield2").hide();
		$("#iupopkfield3").hide();
		$("#iupopkfield4").hide();
		$("#iupopkfield5").hide();
		$("#iupopkfield6").hide();
		$("#iupopkfield7").hide();
		$("#iupopk2field1").hide();
		$("#iupopk2field2").hide();
		$("#iupopk2field3").hide();
		$("#iupopk2field4").hide();
		$("#iupopk2field5").hide();
		$("#iupopk2field6").hide();
		$("#iupopk2field7").hide();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required','required');
		$('#siup_tanggal').attr('required','required');
		$('#siup_jangkawaktu').attr('required','required');
		$('#siup_menerbitkan').attr('required','required');
		$('#siup_sertifikat').attr('required','required');
		$('#iupopk_no').attr('required',false);
		$('#iupopk_tanggal').attr('required',false);
		$('#iupopk_jangkawaktu').attr('required',false);
		$('#iupopk_menerbitkan').attr('required',false);
		$('#iupopk2_no').attr('required',false);
		$('#iupopk2_tanggal').attr('required',false);
		$('#iupopk2_jangkawaktu').attr('required',false);
		$('#iupopk2_menerbitkan').attr('required',false);
		$("#ket1").hide();
		$("#ket2").hide();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbPKP2B").hide();
		$("#rbIUPOPK").hide();
		$("#rbIUPOPK2").hide();
		$("#pkp2bfield1").hide();
		$("#pkp2bfield2").hide();
		var ids = $('#siup_menerbitkan').val();
        if(ids == 1){
        	$("#iupopterbit1").show();
        }else if(ids == 2 || ids == 3){
			$("#iupopterbit2").show();
        }else if(ids == 4){
			$("#iupopterbit3").show();
        }
    }
    if (document.getElementById("iupopk").checked == true) {
    	$("#iupopkfield1").show();
		$("#iupopkfield2").show();
		$("#iupopkfield3").show();
		$("#iupopkfield4").show();
		$("#iupopkfield5").show();
		$("#iupopkfield6").show();
		$("#iupopkfield7").show();
		$("#iupopfield1").hide();
		$("#iupopfield2").hide();
		$("#iupopfield3").hide();
		$("#iupopfield4").hide();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").hide();
		$("#iupopfield10").hide();
		$("#iupopfield11").hide();
		$("#iupopfield12").hide();
		$("#iupopk2field1").hide();
		$("#iupopk2field2").hide();
		$("#iupopk2field3").hide();
		$("#iupopk2field4").hide();
		$("#iupopk2field5").hide();
		$("#iupopk2field6").hide();
		$("#iupopk2field7").hide();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required',false);
		$('#siup_tanggal').attr('required',false);
		$('#siup_jangkawaktu').attr('required',false);
		$('#siup_menerbitkan').attr('required',false);
		$('#siup_sertifikat').attr('required',false);
		$('#iupopk_no').attr('required','required');
		$('#iupopk_tanggal').attr('required','required');
		$('#iupopk_jangkawaktu').attr('required','required');
		$('#iupopk_menerbitkan').attr('required','required');
		$('#iupopk2_no').attr('required',false);
		$('#iupopk2_tanggal').attr('required',false);
		$('#iupopk2_jangkawaktu').attr('required',false);
		$('#iupopk2_menerbitkan').attr('required',false);
		$("#ket1").show();
		$("#ket2").hide();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbPKP2B").hide();
		$("#rbIUPOP").hide();
		$("#rbIUPOPK2").hide();
		$("#pkp2bfield1").hide();
		$("#pkp2bfield2").hide();
		var ids = $('#iupopk_menerbitkan').val();
        if(ids == 1){
			$("#iupopkterbit1").show();
        }else if(ids == 2 || ids == 3){
			$("#iupopkterbit2").show();
        }else if(ids == 4){
			$("#iupopkterbit3").show();
        }
    }
    if (document.getElementById("iupopk2").checked == true) {
    	$("#iupopkfield1").hide();
		$("#iupopkfield2").hide();
		$("#iupopkfield3").hide();
		$("#iupopkfield4").hide();
		$("#iupopkfield5").hide();
		$("#iupopkfield6").hide();
		$("#iupopkfield7").hide();
		$("#iupopfield1").hide();
		$("#iupopfield2").hide();
		$("#iupopfield3").hide();
		$("#iupopfield4").hide();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").hide();
		$("#iupopfield10").hide();
		$("#iupopfield11").hide();
		$("#iupopfield12").hide();
		$("#iupopk2field1").show();
		$("#iupopk2field2").show();
		$("#iupopk2field3").show();
		$("#iupopk2field4").show();
		$("#iupopk2field5").show();
		$("#iupopk2field6").show();
		$("#iupopk2field7").show();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required',false);
		$('#siup_tanggal').attr('required',false);
		$('#siup_jangkawaktu').attr('required',false);
		$('#siup_menerbitkan').attr('required',false);
		$('#siup_sertifikat').attr('required',false);
		$('#iupopk_no').attr('required',false);
		$('#iupopk_tanggal').attr('required',false);
		$('#iupopk_jangkawaktu').attr('required',false);
		$('#iupopk_menerbitkan').attr('required',false);
		$('#iupopk2_no').attr('required','required');
		$('#iupopk2_tanggal').attr('required','required');
		$('#iupopk2_jangkawaktu').attr('required','required');
		$('#iupopk2_menerbitkan').attr('required','required');
		$("#ket1").hide();
		$("#ket2").show();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbPKP2B").hide();
		$("#rbIUPOPK").hide();
		$("#rbIUPOP").hide();
		$("#pkp2bfield1").hide();
		$("#pkp2bfield2").hide();
		var ids = $('#iupopk2_menerbitkan').val();
        if(ids == 1){
			$("#iupopk2terbit1").show();
        }else if(ids == 2 || ids == 3){
			$("#iupopk2terbit2").show();
        }else if(ids == 4){
			$("#iupopk2terbit3").show();
        }
    }
    if (document.getElementById("pkp2b").checked == true) {
    	$("#iupopfield1").hide();
		$("#iupopfield2").hide();
		$("#iupopfield3").hide();
		$("#iupopfield4").hide();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").hide();
		$("#iupopfield10").hide();
		$("#iupopfield11").hide();
		$("#iupopfield12").hide();
		$("#iupopkfield1").hide();
		$("#iupopkfield2").hide();
		$("#iupopkfield3").hide();
		$("#iupopkfield4").hide();
		$("#iupopkfield5").hide();
		$("#iupopkfield6").hide();
		$("#iupopkfield7").hide();
		$("#iupopk2field1").hide();
		$("#iupopk2field2").hide();
		$("#iupopk2field3").hide();
		$("#iupopk2field4").hide();
		$("#iupopk2field5").hide();
		$("#iupopk2field6").hide();
		$("#iupopk2field7").hide();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required',false);
		$('#siup_tanggal').attr('required',false);
		$('#siup_jangkawaktu').attr('required',false);
		$('#siup_menerbitkan').attr('required',false);
		$('#siup_sertifikat').attr('required',false);
		$('#iupopk_no').attr('required',false);
		$('#iupopk_tanggal').attr('required',false);
		$('#iupopk_jangkawaktu').attr('required',false);
		$('#iupopk_menerbitkan').attr('required',false);
		$('#iupopk2_no').attr('required',false);
		$('#iupopk2_tanggal').attr('required',false);
		$('#iupopk2_jangkawaktu').attr('required',false);
		$('#iupopk2_menerbitkan').attr('required',false);
		$("#ket1").hide();
		$("#ket2").hide();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbIUPOP").hide();
		$("#rbIUPOPK").hide();
		$("#rbIUPOPK2").hide();
		$("#pkp2bfield1").show();
		$("#pkp2bfield2").show();
    }
    $("#iupop").click(function(){
        $("#iupopfield1").show();
		$("#iupopfield2").show();
		$("#iupopfield3").show();
		$("#iupopfield4").show();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").show();
		$("#iupopfield10").show();
		$("#iupopfield11").show();
		$("#iupopfield12").show();
		$("#iupopkfield1").hide();
		$("#iupopkfield2").hide();
		$("#iupopkfield3").hide();
		$("#iupopkfield4").hide();
		$("#iupopkfield5").hide();
		$("#iupopkfield6").hide();
		$("#iupopkfield7").hide();
		$("#iupopk2field1").hide();
		$("#iupopk2field2").hide();
		$("#iupopk2field3").hide();
		$("#iupopk2field4").hide();
		$("#iupopk2field5").hide();
		$("#iupopk2field6").hide();
		$("#iupopk2field7").hide();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required','required');
		$('#siup_tanggal').attr('required','required');
		$('#siup_jangkawaktu').attr('required','required');
		$('#siup_menerbitkan').attr('required','required');
		$('#siup_sertifikat').attr('required','required');
		$('#iupopk_no').attr('required',false);
		$('#iupopk_tanggal').attr('required',false);
		$('#iupopk_jangkawaktu').attr('required',false);
		$('#iupopk_menerbitkan').attr('required',false);
		$('#iupopk2_no').attr('required',false);
		$('#iupopk2_tanggal').attr('required',false);
		$('#iupopk2_jangkawaktu').attr('required',false);
		$('#iupopk2_menerbitkan').attr('required',false);
		$("#ket1").hide();
		$("#ket2").hide();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbPKP2B").hide();
		$("#rbIUPOPK").hide();
		$("#rbIUPOPK2").hide();
		$("#pkp2bfield1").hide();
		$("#pkp2bfield2").hide();
		var ids = $('#siup_menerbitkan').val();
		if(ids == 1){
        	$("#iupopterbit1").show();
        }else if(ids == 2 || ids == 3){
			$("#iupopterbit2").show();
        }else if(ids == 4){
			$("#iupopterbit3").show();
        }
    });
    $("#iupopk").click(function(){
        $("#iupopfield1").hide();
		$("#iupopfield2").hide();
		$("#iupopfield3").hide();
		$("#iupopfield4").hide();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").hide();
		$("#iupopfield10").hide();
		$("#iupopfield11").hide();
		$("#iupopfield12").hide();
		$("#iupopkfield1").show();
		$("#iupopkfield2").show();
		$("#iupopkfield3").show();
		$("#iupopkfield4").show();
		$("#iupopkfield5").show();
		$("#iupopkfield6").show();
		$("#iupopkfield7").show();
		$("#iupopk2field1").hide();
		$("#iupopk2field2").hide();
		$("#iupopk2field3").hide();
		$("#iupopk2field4").hide();
		$("#iupopk2field5").hide();
		$("#iupopk2field6").hide();
		$("#iupopk2field7").hide();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required',false);
		$('#siup_tanggal').attr('required',false);
		$('#siup_jangkawaktu').attr('required',false);
		$('#siup_menerbitkan').attr('required',false);
		$('#siup_sertifikat').attr('required',false);
		$('#iupopk_no').attr('required','required');
		$('#iupopk_tanggal').attr('required','required');
		$('#iupopk_jangkawaktu').attr('required','required');
		$('#iupopk_menerbitkan').attr('required','required');
		$('#iupopk2_no').attr('required',false);
		$('#iupopk2_tanggal').attr('required',false);
		$('#iupopk2_jangkawaktu').attr('required',false);
		$('#iupopk2_menerbitkan').attr('required',false);
		$("#ket1").show();
		$("#ket2").hide();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbPKP2B").hide();
		$("#rbIUPOP").hide();
		$("#rbIUPOPK2").hide();
		$("#pkp2bfield1").hide();
		$("#pkp2bfield2").hide();
		var ids = $('#iupopk_menerbitkan').val();
        if(ids == 1){
			$("#iupopkterbit1").show();
        }else if(ids == 2 || ids == 3){
			$("#iupopkterbit2").show();
        }else if(ids == 4){
			$("#iupopkterbit3").show();
        }
    });
    $("#iupopk2").click(function(){
        $("#iupopfield1").hide();
		$("#iupopfield2").hide();
		$("#iupopfield3").hide();
		$("#iupopfield4").hide();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").hide();
		$("#iupopfield10").hide();
		$("#iupopfield11").hide();
		$("#iupopfield12").hide();
		$("#iupopkfield1").hide();
		$("#iupopkfield2").hide();
		$("#iupopkfield3").hide();
		$("#iupopkfield4").hide();
		$("#iupopkfield5").hide();
		$("#iupopkfield6").hide();
		$("#iupopkfield7").hide();
		$("#iupopk2field1").show();
		$("#iupopk2field2").show();
		$("#iupopk2field3").show();
		$("#iupopk2field4").show();
		$("#iupopk2field5").show();
		$("#iupopk2field6").show();
		$("#iupopk2field7").show();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required',false);
		$('#siup_tanggal').attr('required',false);
		$('#siup_jangkawaktu').attr('required',false);
		$('#siup_menerbitkan').attr('required',false);
		$('#siup_sertifikat').attr('required',false);
		$('#iupopk_no').attr('required',false);
		$('#iupopk_tanggal').attr('required',false);
		$('#iupopk_jangkawaktu').attr('required',false);
		$('#iupopk_menerbitkan').attr('required',false);
		$('#iupopk2_no').attr('required','required');
		$('#iupopk2_tanggal').attr('required','required');
		$('#iupopk2_jangkawaktu').attr('required','required');
		$('#iupopk2_menerbitkan').attr('required','required');
		$("#ket1").hide();
		$("#ket2").show();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbPKP2B").hide();
		$("#rbIUPOPK").hide();
		$("#rbIUPOP").hide();
		$("#pkp2bfield1").hide();
		$("#pkp2bfield2").hide();
		var ids = $('#iupopk2_menerbitkan').val();
        if(ids == 1){
			$("#iupopk2terbit1").show();
        }else if(ids == 2 || ids == 3){
			$("#iupopk2terbit2").show();
        }else if(ids == 4){
			$("#iupopk2terbit3").show();
        }
    });
    $("#pkp2b").click(function(){
        $("#iupopfield1").hide();
		$("#iupopfield2").hide();
		$("#iupopfield3").hide();
		$("#iupopfield4").hide();
		$("#iupopfield5").hide();
		$("#iupopfield6").hide();
		$("#iupopfield9").hide();
		$("#iupopfield10").hide();
		$("#iupopfield11").hide();
		$("#iupopfield12").hide();
		$("#iupopkfield1").hide();
		$("#iupopkfield2").hide();
		$("#iupopkfield3").hide();
		$("#iupopkfield4").hide();
		$("#iupopkfield5").hide();
		$("#iupopkfield6").hide();
		$("#iupopkfield7").hide();
		$("#iupopk2field1").hide();
		$("#iupopk2field2").hide();
		$("#iupopk2field3").hide();
		$("#iupopk2field4").hide();
		$("#iupopk2field5").hide();
		$("#iupopk2field6").hide();
		$("#iupopk2field7").hide();
		$("#triupopm").hide();
		$('#trbutton').show();
		$('#siup_no').attr('required',false);
		$('#siup_tanggal').attr('required',false);
		$('#siup_jangkawaktu').attr('required',false);
		$('#siup_menerbitkan').attr('required',false);
		$('#siup_sertifikat').attr('required',false);
		$('#iupopk_no').attr('required',false);
		$('#iupopk_tanggal').attr('required',false);
		$('#iupopk_jangkawaktu').attr('required',false);
		$('#iupopk_menerbitkan').attr('required',false);
		$('#iupopk2_no').attr('required',false);
		$('#iupopk2_tanggal').attr('required',false);
		$('#iupopk2_jangkawaktu').attr('required',false);
		$('#iupopk2_menerbitkan').attr('required',false);
		$("#ket1").hide();
		$("#ket2").hide();
		$("#iupopterbit1").hide();
		$("#iupopterbit2").hide();
		$("#iupopterbit3").hide();
		$("#iupopkterbit1").hide();
		$("#iupopkterbit2").hide();
		$("#iupopkterbit3").hide();
		$("#iupopk2terbit1").hide();
		$("#iupopk2terbit2").hide();
		$("#iupopk2terbit3").hide();
		$("#rbIUPOP").hide();
		$("#rbIUPOPK").hide();
		$("#rbIUPOPK2").hide();
		$("#pkp2bfield1").show();
		$("#pkp2bfield2").show();
    });
    $('#siup_menerbitkan').on('change',function(e){
    	var ids = $('#siup_menerbitkan').val();
        
        if(ids == 1){
        	$("#iupopterbit1").show();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else if(ids == 2){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").show();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else if(ids == 3){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").show();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else{
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }
    });
    $('#iupopk_menerbitkan').on('change',function(e){
    	var ids = $('#iupopk_menerbitkan').val();
        
        if(ids == 1){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").show();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else if(ids == 2){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").show();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else if(ids == 3){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").show();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else{
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }
    });
	$('#iupopk2_menerbitkan').on('change',function(e){
    	var ids = $('#iupopk2_menerbitkan').val();
        
        if(ids == 1){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").show();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }else if(ids == 2){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").show();
			$("#iupopk2terbit3").hide();
        }else if(ids == 3){
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").show();
        }else{
        	$("#iupopterbit1").hide();
			$("#iupopterbit2").hide();
			$("#iupopterbit3").hide();
			$("#iupopkterbit1").hide();
			$("#iupopkterbit2").hide();
			$("#iupopkterbit3").hide();
			$("#iupopk2terbit1").hide();
			$("#iupopk2terbit2").hide();
			$("#iupopk2terbit3").hide();
        }
    });
});
function uncheck_radio_before_click(radio) {
    if(radio.prop('checked'))
        radio.one('click', function(){ radio.prop('checked', false); } );
}
$('body').on('mouseup', 'input[type="radio"]', function(){
    var radio=$(this);
    uncheck_radio_before_click(radio);
})
$('body').on('mouseup', 'label', function(){
    var label=$(this);
    var radio;
    if(label.attr('for'))
        radio=$('#'+label.attr('for')).filter('input[type="radio"]');
    else
        radio=label.children('input[type="radio"]');
    if(radio.length)
        uncheck_radio_before_click(radio);
})
</script>
    <div class="col-lg-12">
    	<h2 class="page-header">Legalitas Perijinan Tambang Calon Penyedia Batubara <?php echo $data4->Nama.', '.$data4->BadanUsaha; ?>
   		</h2>
   		<form action="{{action('VendorController@savelegalitasperijinantambang')}}" method="post">
			<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
			<table class="table table-bordered">
				<tbody>
					<!-- IUPOP BEGIN -->
					<tr class="success">
						<th colspan="6">Surat Ijin Usaha Pertambangan</th>
					</tr>
					<tr id="rbPKP2B">
						<td colspan="6" style="border-bottom:none;">
							<input type="radio" name="suratijin" id="pkp2b" value="PKP2B" 
								<?php if(($data->JenisIjin) == "PKP2B"){ ?> checked <?php }  ?>	> 
								Perjanjian Karya Pengusaha Pertambangan Batubara (PKP2B)</input>
						</td>				                        
					</tr>	
					<tr id="rbIUPOP">
						<td colspan="6" style="border-bottom:none; border-top:none;">
							<input type="radio" name="suratijin" id="iupop"  value="IUPOP"
								<?php if(($data->JenisIjin) == "IUPOP"){ ?> checked <?php }  ?>	> 
								Ijin Usaha Pertambangan Operasi Produksi (IUP OP)</input>
						</td>				                        
					</tr>	
					<tr id="rbIUPOPK">
						<td colspan="6" style="border-bottom:none; border-top:none;">							
							<input type="radio" name="suratijin" id="iupopk" value="IUPOPK" 
								<?php if (($data->JenisIjin) == "IUPOPK"){ ?> checked <?php }  ?>> 
								Ijin Usaha Pertambangan Operasi Khusus Pengangkutan dan Penjualan (IUP OPK)</input>
						</td>
					</tr>
					<tr id="rbIUPOPK2">
						<td colspan="6" style="border-bottom:none; border-top:none;">							
							<input type="radio" name="suratijin" id="iupopk2" value="IUPOPK2" 
								<?php if(($data->JenisIjin) == "IUPOPK2"){ ?> checked <?php }  ?>	> 
								Ijin Usaha Pertambangan Operasi Produksi Khusus Pengolahan dan Pemurnian (IUP OPK)</input>
						</td>
					</tr>		
					<tr id="pkp2bfield1">
						<td style="border:none; border-top:none;" width=250>No. PKP2B *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-7'>
								<div data-tip="masukan nomor pkp2b">	
								<input type='text' class='form-control' name="pkp2b_no" id="pkp2b_no" value="{{$data9->No}}"
									<?php if(($data9->NoCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data9->NoCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>	
					<tr id="pkp2bfield2">
						<td style="border:none; border-top:none;">Tanggal PKP2B *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan tanggal pkp2b">	
								<input type='text' class='form-control' name="pkp2b_tanggal"  readonly="true"
									value="<?php if(!is_null($data9->Tanggal)) { echo date("d-m-Y", strtotime($data1->Tanggal)); } ?>" id="pkp2b_tanggal"
									<?php if(($data9->TanggalCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#pkp2b_tanggal').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data9->TanggalCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield1">
						<td style="border:none; border-top:none;" width=250>No. IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-7'>
								<div data-tip="masukan nomor iupop">	
								<input type='text' class='form-control' name="siup_no" id="siup_no" value="{{$data1->No}}"
									<?php if(($data1->NoCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data1->NoCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield2">
						<td style="border:none; border-top:none;">Tanggal IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan tanggal iupop">	
								<input type='text' class='form-control' name="siup_tanggal"  readonly="true"
									value="<?php if(!is_null($data1->Tanggal)) { echo date("d-m-Y", strtotime($data1->Tanggal)); } ?>" id="siup_tanggal"
									<?php if(($data1->TanggalCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#siup_tanggal').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data1->TanggalCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield3">
						<td style="border:none; border-top:none;">Jangka Waktu IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan jangka waktu iupop">	
								<input type='text' class='form-control' name="siup_jangkawaktu" readonly="true"
									value="<?php if(!is_null($data1->JangkaWaktu)) { echo date("d-m-Y", strtotime($data1->JangkaWaktu)); } ?>" id="siup_jangkawaktu"
									<?php if(($data1->JangkaWaktuCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#siup_jangkawaktu').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data1->JangkaWaktuCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield4">
						<td style="border:none; border-top:none;">Menerbitkan *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-5'>
								<div data-tip="masukan menerbitkan iupop">
								<select name='siup_menerbitkan' id='siup_menerbitkan' class='form-control'
								<?php if(($data1->MenerbitkanCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
								|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true"
								<?php }else if ($data1->MenerbitkanCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
									<option value="" selected>- Pilih Menerbitkan -</option>
									<?php if($data1->Menerbitkan == '1') { ?> 
									<option value="1" selected>Kementrian ESDM / Minerba / BKPM</option>
									<?php }else{ ?>
									<option value="1" >Kementrian ESDM / Minerba / BKPM</option> 
									<?php } if($data1->Menerbitkan == '2') { ?>
									<option value="2" selected>Gubernur / BKPM Provinsi</option>
									<?php }else{ ?>
									<option value="2" >Gubernur / BKPM Provinsi</option>
									<?php } if($data1->Menerbitkan == '3') { ?>
									<option value="3" selected>Bupati / Walikota</option>
									<?php }else{ ?>
									<option value="3" >Bupati / Walikota</option>
									<?php } ?>
								</select>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopterbit1">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Lintas provinsi dan negara
					</tr>
					<tr id="iupopterbit2">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Lintas kabupaten dalam provinsi</td>
					</tr>
					<tr id="iupopterbit3">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Dalam satu kabupaten/kota</td>
					</tr>
					<tr id="trdireksi">
						<td style="border:none; border-top:none;">Nama Direksi / Komisaris *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-5'>
								<div data-tip="masukan nama direksi">	
								<input type='text' class='form-control' name="siup_direksi" id="siup_direksi" value="{{$data1->Dirut}}"
									<?php if(($data1->DirutCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data1->DirutCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="trpemegang">
						<td style="border:none; border-top:none;">Pemegang Saham Perusahaan *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-5'>
								<div data-tip="masukan nama direksi">	
								<input type='text' class='form-control' name="siup_komisaris" id="siup_komisaris" value="{{$data1->Komisaris}}"
									<?php if(($data1->KomisarisCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data1->KomisarisCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield5">
						<td colspan="5" style="border:none;">
							<h5><b>Susunan Pemegang Saham</b></h5>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th width="400" style="text-align:center;">Nama</th>
                                    <th width="200" style="text-align:center;">No. KTP</th>
                                    <!-- <th width="250" style="text-align:center;">Jabatan</th> -->
                                </thead>
                                <tbody>
                                	<?php if($datakomisaris != null) { ?>
                                    <?php
                                        $counter = 1;
                                        foreach($datakomisaris as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $counter ?></td>
                                        <td><?php echo $row->Nama ?></td>
                                        <td><?php echo $row->NoKTP ?></td>
                                        <!-- <td><?php //echo $row->Jabatan ?></td> -->
                                    </tr>
                                    <?php $counter++; } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
						</td>
					</tr>
					<tr id="iupopfield6">
						<td colspan="5" style="border:none;">
							<h5><b>Susunan Pengurus Perusahaan</b></h5>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th width="400" style="text-align:center;">Nama</th>
                                    <th width="200" style="text-align:center;">No. KTP</th>
                                    <th width="250" style="text-align:center;">Jabatan</th>
                                </thead>
                                <tbody>
                                	<?php if($datadireksi != null) { ?>
                                    <?php
                                        $counter = 1;
                                        foreach($datadireksi as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $counter ?></td>
                                        <td><?php echo $row->Nama ?></td>
                                        <td><?php echo $row->NoKTP ?></td>
                                        <td><?php echo $row->Jabatan ?></td>
                                    </tr>
                                    <?php $counter++; } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
						</td>
					</tr>
					<tr id="iupopfield9">
						<td style="border:none; border-top:none;">No. Sertifikat CNC *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-5'>
								<div data-tip="masukan sertifikat cnc">	
								<input type='text' class='form-control' name="siup_sertifikat" id="siup_sertifikat" value="{{$data1->NoCnc}}"
									<?php if(($data1->NoCncCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data1->NoCncCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield11">
						<td style="border:none; border-top:none;">Tanggal CNC *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan tanggal cnc">	
								<input type='text' class='form-control' name="siup_tanggalcnc" readonly="true"
									value="<?php if(!is_null($data1->TanggalCnc)) { echo date("d-m-Y", strtotime($data1->TanggalCnc)); } ?>" id="siup_tanggalcnc"
									<?php if(($data1->TanggalCncCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#siup_tanggalcnc').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data1->TanggalCncCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield12">
						<td style="border:none; border-top:none;">Jangka Waktu CNC *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan jangka waktu cnc">	
								<input type='text' class='form-control' name="siup_jangkawaktucnc" readonly="true"
									value="<?php if(!is_null($data1->JangkaWaktuCnc)) { echo date("d-m-Y", strtotime($data1->JangkaWaktuCnc)); } ?>" id="siup_jangkawaktucnc"
									<?php if(($data1->JangkaWaktuCncCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#siup_jangkawaktucnc').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data1->JangkaWaktuCncCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopfield10">
						<td style="border:none; border-top:none;">Lampiran</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-10'>
								<input type="checkbox" name="siup_lampiran_peta" value="PETA"
									<?php if(($data1->LampiranPeta) == "PETA"){ ?> checked <?php }  ?>	
									<?php if(($data1->LampiranPetaCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php } ?>
									> Peta &nbsp;&nbsp;&nbsp;</input>
								<input type="checkbox" name="siup_lampiran_koordinat" value="KOORDINAT" 
									<?php if(($data1->LampiranKoordinat) == "KOORDINAT"){ ?> checked <?php }  ?>	
									<?php if(($data1->LampiranKoordinatCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php } ?>
									> Koordinat &nbsp;&nbsp;&nbsp;</input>
							</div>
						</td>
					</tr>
					<!-- IUPOP END -->				

					<!-- IUPOP KHUSUS BEGIN -->
					<tr id="iupopkfield1">
						<td style="border:none; border-top:none;" width=250>No. IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-5'>
								<div data-tip="masukan nomor iupop khusus">	
								<input type='text' class='form-control' name="iupopk_no" id="iupopk_no" value="{{$data2->No}}"
									<?php if(($data2->NoCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data2->NoCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopkfield2">
						<td style="border:none; border-top:none;">Tanggal IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan tanggal iupop khusus">	
								<input type='text' class='form-control' name="iupopk_tanggal" readonly="true"
									value="<?php if(!is_null($data2->Tanggal)) { echo date("d-m-Y", strtotime($data2->Tanggal)); } ?>" id="iupopk_tanggal"
									<?php if(($data2->TanggalCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#iupopk_tanggal').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data2->TanggalCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopkfield3">
						<td style="border:none; border-top:none;">Jangka Waktu IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan jangka waktu iupop khusus">	
								<input type='text' class='form-control' name="iupopk_jangkawaktu"  readonly="true"
									value="<?php if(!is_null($data2->Tanggal)) { echo date("d-m-Y", strtotime($data2->JangkaWaktu)); } ?>" id="iupopk_jangkawaktu"
									<?php if(($data2->JangkaWaktuCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#iupopk_jangkawaktu').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data2->JangkaWaktuCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopkfield4">
						<td style="border:none; border-top:none;">Menerbitkan *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-4'>
								<select name='iupopk_menerbitkan' id='iupopk_menerbitkan' class='form-control'
								<?php if(($data2->MenerbitkanCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
								|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true"
								<?php }else if ($data2->MenerbitkanCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
									<option value="" selected>- Pilih Menerbitkan -</option>
									<?php if($data2->Menerbitkan == '1') { ?> 
									<option value="1" selected>Kementrian ESDM / Minerba / BKPM</option>
									<?php }else{ ?>
									<option value="1" >Kementrian ESDM / Minerba / BKPM</option> 
									<?php } if($data2->Menerbitkan == '2') { ?>
									<option value="2" selected>Gubernur / BKPM Provinsi</option>
									<?php }else{ ?>
									<option value="2" >Gubernur / BKPM Provinsi</option>
									<?php } if($data2->Menerbitkan == '3') { ?>
									<option value="3" selected>Bupati / Walikota</option>
									<?php }else{ ?>
									<option value="3" >Bupati / Walikota</option>
									<?php } ?>
								</select>
							</div>
						</td>
					</tr>
					<tr id="iupopkterbit1">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Lintas provinsi dan negara
					</tr>
					<tr id="iupopkterbit2">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Lintas kabupaten dalam provinsi</td>
					</tr>
					<tr id="iupopkterbit3">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Dalam satu kabupaten/kota</td>
					</tr>
					<tr id="iupopkfield5">
						<td style="border:none; border-top:none;"><b>Sumber tambang sesuai IUP OPK</b></td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-6'>	
								<input type='hidden' class='form-control' name="iupopk_wilayah" id="iupopk_wilayah" value="{{$data2->WilayahPengangkutan}}"
									<?php if(($data2->WilayahPengangkutanCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data2->WilayahPengangkutanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopkfield6">
						<td style="border:none;" colspan="6">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="text-align:center;" width=50>No</th>
									<th style="text-align:center;" width=120>Asal Tambang</th>
									<th style="text-align:center;" width=120>No. IUP OP</th>
									<th style="text-align:center;" width=120>Tgl.</th>
									<th style="text-align:center;" width=120>Jangka Waktu</th>
									<th style="text-align:center;" width=120>Sertifikat CNC</th>
									<th style="text-align:center;" width=120>Tgl.</th>
									<th style="text-align:center;" width=120>Jangka Waktu</th>
									<th style="text-align:center;" width=120>Aksi</th>
								</thead>
								<tbody>
									<?php
										$counter = 1;
			                            foreach($data6 as $row){
			                        ?>
			                        <tr>
			                        <td> <?php echo $counter ?></td>
		                        	<td> <?php echo $row->AsalTambang ?></td>
		                        	<td> <?php echo $row->NoIUPOP ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
		                        	<td> <?php echo $row->NoCNC ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
		                        	<td style="text-align:center;">
		                        		<?php if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
		                        		<a href="" onclick="document.getElementById('useridsumber').value='<?php echo $row->UserId ?>';
                                								document.getElementById('namasumberawal').value='<?php echo $row->AsalTambang ?>';
                                								document.getElementById('asaltambangsumber').value='<?php echo $row->AsalTambang ?>';
                                								document.getElementById('jenisiuopk').value='IUPOPK';
                                								<?php if($row->AsalTambangCk=='1') { ?>
		                                                        document.getElementById('asaltambangsumber').setAttribute('readOnly','true');
		                                                        document.getElementById('asaltambangsumber').style.background = '#eee'; 
		                                                        document.getElementById('asaltambangsumber').style.color = '#555';
		                                                        <?php } else if($row->AsalTambangCk=='0') { ?>
		                                                        document.getElementById('asaltambangsumber').style.background = 'red';
		                                                        document.getElementById('asaltambangsumber').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('asaltambangsumber').style.background = '#FFF';
		                                                        document.getElementById('asaltambangsumber').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('noiupopsumber').value='<?php echo $row->NoIUPOP ?>';
                                								<?php if($row->NoIUPOPCk=='1') { ?>
		                                                        document.getElementById('noiupopsumber').setAttribute('readOnly','true');
		                                                        document.getElementById('noiupopsumber').style.background = '#eee'; 
		                                                        document.getElementById('noiupopsumber').style.color = '#555';
		                                                        <?php } else if($row->NoIUPOPCk=='0') { ?>
		                                                        document.getElementById('noiupopsumber').style.background = 'red';
		                                                        document.getElementById('noiupopsumber').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('noiupopsumber').style.background = '#FFF';
		                                                        document.getElementById('noiupopsumber').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('nocncsumber').value='<?php echo $row->NoCNC ?>';
                                								<?php if($row->NoCNCCk=='1') { ?>
		                                                        document.getElementById('nocncsumber').setAttribute('readOnly','true');
		                                                        document.getElementById('nocncsumber').style.background = '#eee'; 
		                                                        document.getElementById('nocncsumber').style.color = '#555';
		                                                        <?php } else if($row->NoCNCCk=='0') { ?>
		                                                        document.getElementById('nocncsumber').style.background = 'red';
		                                                        document.getElementById('nocncsumber').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('nocncsumber').style.background = '#FFF';
		                                                        document.getElementById('nocncsumber').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('tglsumber1').value='<?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?>';
                                								<?php if($row->TglIUPOPCk=='1') { ?>
		                                                        document.getElementById('tglsumber1').setAttribute('readOnly','true');
		                                                        document.getElementById('tglsumber1').style.background = '#eee'; 
		                                                        document.getElementById('tglsumber1').style.color = '#555';
		                                                        <?php } else if($row->TglIUPOPCk=='0') { ?>
		                                                        document.getElementById('tglsumber1').style.background = 'red';
		                                                        document.getElementById('tglsumber1').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('tglsumber1').style.background = '#FFF';
		                                                        document.getElementById('tglsumber1').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('tglsumber2').value='<?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?>';
                                								<?php if($row->TglCNCCk=='1') { ?>
		                                                        document.getElementById('tglsumber2').setAttribute('readOnly','true');
		                                                        document.getElementById('tglsumber2').style.background = '#eee'; 
		                                                        document.getElementById('tglsumber2').style.color = '#555';
		                                                        <?php } else if($row->TglCNCCk=='0') { ?>
		                                                        document.getElementById('tglsumber2').style.background = 'red';
		                                                        document.getElementById('tglsumber2').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('tglsumber2').style.background = '#FFF';
		                                                        document.getElementById('tglsumber2').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('jangkawaktusumber1').value='<?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?>';
                                								<?php if($row->JangkaWaktuIUPOPCk=='1') { ?>
		                                                        document.getElementById('jangkawaktusumber1').setAttribute('readOnly','true');
		                                                        document.getElementById('jangkawaktusumber1').style.background = '#eee'; 
		                                                        document.getElementById('jangkawaktusumber1').style.color = '#555';
		                                                        <?php } else if($row->JangkaWaktuIUPOPCk=='0') { ?>
		                                                        document.getElementById('jangkawaktusumber1').style.background = 'red';
		                                                        document.getElementById('jangkawaktusumber1').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('jangkawaktusumber1').style.background = '#FFF';
		                                                        document.getElementById('jangkawaktusumber1').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('jangkawaktusumber2').value='<?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?>';
                                								<?php if($row->JangkaWaktuCNCCk=='1') { ?>
		                                                        document.getElementById('jangkawaktusumber2').setAttribute('readOnly','true');
		                                                        document.getElementById('jangkawaktusumber2').style.background = '#eee'; 
		                                                        document.getElementById('jangkawaktusumber2').style.color = '#555';
		                                                        <?php } else if($row->JangkaWaktuCNCCk=='0') { ?>
		                                                        document.getElementById('jangkawaktusumber2').style.background = 'red';
		                                                        document.getElementById('jangkawaktusumber2').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('jangkawaktusumber2').style.background = '#FFF';
		                                                        document.getElementById('jangkawaktusumber2').style.color = '#555';
		                                                        <?php } ?>
		                                                        $('#iupopk_no_h').val($('#iupopk_no').val());
																$('#iupopk_tanggal_h').val($('#iupopk_tanggal').val());
																$('#iupopk_jangkawaktu_h').val($('#iupopk_jangkawaktu').val());
																$('#iupopk_menerbitkan_h').val($('#iupopk_menerbitkan').val());
																$('#iupopk_wilayah_h').val($('#iupopk_wilayah').val());"
		                                        data-toggle="modal" data-target="#sumbertambangModal">
		                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
		                                    <a href="" onclick="document.getElementById('useridsumber2').value='<?php echo $row->UserId ?>';
		                                    					document.getElementById('asaltambangsumber2').value='<?php echo $row->AsalTambang ?>';
		                                    					document.getElementById('jenisiuopkdelete').value='IUPOPK';"
		                                            data-toggle="modal" data-target="#confirmSumbertambangModal">
		                                        <i class="fa fa-trash-o"></i> Hapus</a>
		                        	</td>
		                        </tr>
		                        	<?php } ?>
			                        <?php $counter++; } ?>
								</tbody>
							</table>
							<?php if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
							<input type="button" value="Tambah Asal Tambang" class="btn btn-submit  btn-primary" 
					            data-toggle="modal" data-target="#sumbertambangModal"
					            onclick="document.getElementById('asaltambangsumber').value='';
					            		$('#asaltambangsumber').attr('readonly', false);
					            		document.getElementById('jenisiuopk').value='IUPOPK';
					                    document.getElementById('namasumberawal').value='';
					                    $('#noiupopsumber').attr('readonly', false);
					                    document.getElementById('noiupopsumber').value='<?php echo $data2->No ?>';
					                    $('#nocncsumber').attr('readonly', false);
					                    document.getElementById('nocncsumber').value='';
		                                document.getElementById('tglsumber1').value='<?php if(!is_null($data2->Tanggal)) { echo date("d-m-Y", strtotime($data2->Tanggal)); } ?>';
		                                document.getElementById('tglsumber1').style.background = '#FFF';
		                                document.getElementById('tglsumber1').style.color = '#555';
		                                document.getElementById('tglsumber2').value='';
		                                document.getElementById('tglsumber2').style.background = '#FFF';
		                                document.getElementById('tglsumber2').style.color = '#555';
		                                document.getElementById('jangkawaktusumber1').value='<?php if(!is_null($data2->JangkaWaktu)) { echo date("d-m-Y", strtotime($data2->JangkaWaktu)); } ?>';
		                                document.getElementById('jangkawaktusumber1').style.background = '#FFF';
		                                document.getElementById('jangkawaktusumber1').style.color = '#555';
		                                document.getElementById('jangkawaktusumber2').value='';
		                                document.getElementById('jangkawaktusumber2').style.background = '#FFF';
		                                document.getElementById('jangkawaktusumber2').style.color = '#555';
		                                $('#iupopk_no_h').val($('#iupopk_no').val());
										$('#iupopk_tanggal_h').val($('#iupopk_tanggal').val());
										$('#iupopk_jangkawaktu_h').val($('#iupopk_jangkawaktu').val());
										$('#iupopk_menerbitkan_h').val($('#iupopk_menerbitkan').val());
										$('#iupopk_wilayah_h').val($('#iupopk_wilayah').val());" >
					        <?php } ?>
					</tr>
					<tr id="ket1">
						<td colspan="5" style="border:none;"><br />
							Dalam hal pemegang IUP OP Khusus Pengangkutan dan Penjualan (IUP OPK) akan melakukan kegiatan 
							pengangkutan dan penjualan Batubara yang berasal selain dari IUP OP/PKP2B yang tercantum dalam IUP OPK, 
							<b>wajib melampirkan surat persetujuan / penyesuaian IUP OPK</b> dari Direktur Jenderal Mineral 
							Batubara atau penerbit IUP OPK. Surat persetujuan / penyesuaian tersebut dapat di upload 
							<?php if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
							<i><a href="" data-toggle="modal" data-target="#modalUpload">disini</a></i> 
							<?php } ?>
							dalam format berbentuk PDF.
						</td>
					</tr>
					<!-- IUPOP KHUSUS END -->

					<!-- IUPOP KHUSUS 2 BEGIN -->
					<tr id="iupopk2field1">
						<td style="border:none; border-top:none;" width=350>No. IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-5'>
								<div data-tip="masukan nomor iupop khusus">	
								<input type='text' class='form-control' name="iupopk2_no" id="iupopk2_no" value="{{$data7->No}}"
									<?php if(($data7->NoCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data7->NoCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopk2field2">
						<td style="border:none; border-top:none;">Tanggal IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan tanggal iupop khusus">	
								<input type='text' class='form-control' name="iupopk2_tanggal" readonly="true"
									value="<?php if(!is_null($data7->Tanggal)) { echo date("d-m-Y", strtotime($data7->Tanggal)); } ?>" id="iupopk2_tanggal"
									<?php if(($data7->TanggalCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#iupopk2_tanggal').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data7->TanggalCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopk2field3">
						<td style="border:none; border-top:none;">Jangka Waktu IUP *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-3'>
								<div data-tip="masukan jangka waktu iupop khusus">	
								<input type='text' class='form-control' name="iupopk2_jangkawaktu" readonly="true"
									value="<?php if(!is_null($data7->Tanggal)) { echo date("d-m-Y", strtotime($data7->JangkaWaktu)); } ?>" id="iupopk2_jangkawaktu"
									<?php if(($data7->JangkaWaktuCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" >
									<?php echo "<script type='text/javascript'>$('#iupopk2_jangkawaktu').datepicker({minDate:-1,maxDate:-2}).attr('readonly','readonly');</script>"; ?>
									<?php }else if ($data7->JangkaWaktuCk=='0') { ?> style="background-color:red; color:white;" > <?php }else{?>
											style="background:#fff; color:555;">
											<?php } ?>
								</input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopk2field4">
						<td style="border:none; border-top:none;">Menerbitkan *)</td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-4'>
								<select name='iupopk2_menerbitkan' id='iupopk2_menerbitkan' class='form-control'
								<?php if(($data7->MenerbitkanCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
								|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true"
								<?php }else if ($data7->MenerbitkanCk=='0') { ?> style="background-color:red; color:white;" readonly="true" <?php }?> >
									<option value="" selected>- Pilih Menerbitkan -</option>
									<?php if($data7->Menerbitkan == '1') { ?> 
									<option value="1" selected>Kementrian ESDM / Minerba / BKPM</option>
									<?php }else{ ?>
									<option value="1" >Kementrian ESDM / Minerba / BKPM</option> 
									<?php } if($data7->Menerbitkan == '2') { ?>
									<option value="2" selected>Gubernur / BKPM Provinsi</option>
									<?php }else{ ?>
									<option value="2" >Gubernur / BKPM Provinsi</option>
									<?php } if($data7->Menerbitkan == '3') { ?>
									<option value="3" selected>Bupati / Walikota</option>
									<?php }else{ ?>
									<option value="3" >Bupati / Walikota</option>
									<?php } ?>
								</select>
							</div>
						</td>
					</tr>
					<tr id="iupopk2terbit1">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Lintas provinsi dan negara
					</tr>
					<tr id="iupopk2terbit2">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Lintas kabupaten dalam provinsi</td>
					</tr>
					<tr id="iupopk2terbit3">
						<td style="border:none;"></td>
						<td style="border:none; padding-left:25px;">Dalam satu kabupaten/kota</td>
					</tr>
					<tr id="iupopk2field5">
						<td style="border:none; border-top:none;"><b>Sumber tambang sesuai IUP OPK</b></td>
						<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
							<div class='col-sm-6'>	
								<input type='hidden' class='form-control' name="iupopk2_wilayah" id="iupopk2_wilayah" value="{{$data7->WilayahPengangkutan}}"
									<?php if(($data7->WilayahPengangkutanCk=='1') || ($data5->PersetujuanVerifikasi=='Y' && $data5->Status==1)
									|| ($data5->PersetujuanVerifikasi=='N' && $data5->StatusPakta=='Y')) { ?> readonly="true" 
									<?php }else if ($data7->WilayahPengangkutanCk=='0') { ?> style="background-color:red; color:white;" <?php }?>
								></input>
							</div>
							</div>
						</td>
					</tr>
					<tr id="iupopk2field6">
						<td style="border:none;" colspan="6">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="text-align:center;" width=50>No</th>
									<th style="text-align:center;" width=120>Jenis Ijin</th>
									<th style="text-align:center;" width=120>No. IUP OP</th>
									<th style="text-align:center;" width=120>Tgl.</th>
									<th style="text-align:center;" width=120>Jangka Waktu</th>
									<th style="text-align:center;" width=120>Sertifikat CNC</th>
									<th style="text-align:center;" width=120>Tgl.</th>
									<th style="text-align:center;" width=120>Jangka Waktu</th>
									<th style="text-align:center;" width=120>Aksi</th>
								</thead>
								<tbody>
									<?php
										$counter = 1;
			                            foreach($data8 as $row){
			                        ?>
			                        <tr>
			                        <td> <?php echo $counter ?></td>
		                        	<td> <?php echo $row->AsalTambang ?></td>
		                        	<td> <?php echo $row->NoIUPOP ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->TglIUPOP)) ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)) ?></td>
		                        	<td> <?php echo $row->NoCNC ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->TglCNC)) ?></td>
		                        	<td> <?php echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)) ?></td>
		                        	<td style="text-align:center;">
		                        		<?php if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
		                        		<a href="" onclick="document.getElementById('useridsumberiup').value='<?php echo $row->UserId ?>';
                                								document.getElementById('namasumberawaliup').value='<?php echo $row->AsalTambang ?>';
                                								document.getElementById('asaltambangsumberiup').value='<?php echo $row->AsalTambang ?>';
                                								document.getElementById('jenisiuopk2').value='IUPOPK2';
                                								<?php if($row->AsalTambangCk=='1') { ?>
		                                                        document.getElementById('asaltambangsumberiup').setAttribute('readOnly','true');
		                                                        document.getElementById('asaltambangsumberiup').style.background = '#eee'; 
		                                                        document.getElementById('asaltambangsumberiup').style.color = '#555';
		                                                        <?php } else if($row->AsalTambangCk=='0') { ?>
		                                                        document.getElementById('asaltambangsumberiup').style.background = 'red';
		                                                        document.getElementById('asaltambangsumberiup').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('asaltambangsumberiup').style.background = '#FFF';
		                                                        document.getElementById('asaltambangsumberiup').style.color = '#555';
		                                                        <?php } ?>
                                								document.getElementById('noiupopsumberiup').value='<?php echo $row->NoIUPOP ?>';
                                								<?php if($row->NoIUPOPCk=='1') { ?>
		                                                        document.getElementById('noiupopsumberiup').setAttribute('readOnly','true');
		                                                        document.getElementById('noiupopsumberiup').style.background = '#eee'; 
		                                                        document.getElementById('noiupopsumberiup').style.color = '#555';
		                                                        <?php } else if($row->NoIUPOPCk=='0') { ?>
		                                                        document.getElementById('noiupopsumberiup').style.background = 'red';
		                                                        document.getElementById('noiupopsumberiup').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('noiupopsumberiup').style.background = '#FFF';
		                                                        document.getElementById('noiupopsumberiup').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('nocncsumberiup').value='<?php echo $row->NoCNC ?>';
                                								<?php if($row->NoCNCCk=='1') { ?>
		                                                        document.getElementById('nocncsumberiup').setAttribute('readOnly','true');
		                                                        document.getElementById('nocncsumberiup').style.background = '#eee'; 
		                                                        document.getElementById('nocncsumberiup').style.color = '#555';
		                                                        <?php } else if($row->NoCNCCk=='0') { ?>
		                                                        document.getElementById('nocncsumberiup').style.background = 'red';
		                                                        document.getElementById('nocncsumberiup').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('nocncsumberiup').style.background = '#FFF';
		                                                        document.getElementById('nocncsumberiup').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('tglsumberiup1').value='<?php if(!is_null($row->TglIUPOP)) { echo date("d-m-Y", strtotime($row->TglIUPOP)); } ?>';
                                								<?php if($row->TglIUPOPCk=='1') { ?>
		                                                        document.getElementById('tglsumberiup1').setAttribute('readOnly','true');
		                                                        document.getElementById('tglsumberiup1').style.background = '#eee'; 
		                                                        document.getElementById('tglsumberiup1').style.color = '#555';
		                                                        <?php } else if($row->TglIUPOPCk=='0') { ?>
		                                                        document.getElementById('tglsumberiup1').style.background = 'red';
		                                                        document.getElementById('tglsumberiup1').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('tglsumberiup1').style.background = '#FFF';
		                                                        document.getElementById('tglsumberiup1').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('tglsumberiup2').value='<?php if(!is_null($row->TglCNC)) { echo date("d-m-Y", strtotime($row->TglCNC)); } ?>';
                                								<?php if($row->TglCNCCk=='1') { ?>
		                                                        document.getElementById('tglsumberiup2').setAttribute('readOnly','true');
		                                                        document.getElementById('tglsumberiup2').style.background = '#eee'; 
		                                                        document.getElementById('tglsumberiup2').style.color = '#555';
		                                                        <?php } else if($row->TglCNCCk=='0') { ?>
		                                                        document.getElementById('tglsumberiup2').style.background = 'red';
		                                                        document.getElementById('tglsumberiup2').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('tglsumberiup2').style.background = '#FFF';
		                                                        document.getElementById('tglsumberiup2').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('jangkawaktusumberiup1').value='<?php if(!is_null($row->JangkaWaktuIUPOP)) { echo date("d-m-Y", strtotime($row->JangkaWaktuIUPOP)); } ?>';
                                								<?php if($row->JangkaWaktuIUPOPCk=='1') { ?>
		                                                        document.getElementById('jangkawaktusumberiup1').setAttribute('readOnly','true');
		                                                        document.getElementById('jangkawaktusumberiup1').style.background = '#eee'; 
		                                                        document.getElementById('jangkawaktusumberiup1').style.color = '#555';
		                                                        <?php } else if($row->JangkaWaktuIUPOPCk=='0') { ?>
		                                                        document.getElementById('jangkawaktusumberiup1').style.background = 'red';
		                                                        document.getElementById('jangkawaktusumberiup1').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('jangkawaktusumberiup1').style.background = '#FFF';
		                                                        document.getElementById('jangkawaktusumberiup1').style.color = '#555';
		                                                        <?php } ?>
		                                                        document.getElementById('jangkawaktusumberiup2').value='<?php if(!is_null($row->JangkaWaktuCNC)) { echo date("d-m-Y", strtotime($row->JangkaWaktuCNC)); } ?>';
                                								<?php if($row->JangkaWaktuCNCCk=='1') { ?>
		                                                        document.getElementById('jangkawaktusumberiup2').setAttribute('readOnly','true');
		                                                        document.getElementById('jangkawaktusumberiup2').style.background = '#eee'; 
		                                                        document.getElementById('jangkawaktusumberiup2').style.color = '#555';
		                                                        <?php } else if($row->JangkaWaktuCNCCk=='0') { ?>
		                                                        document.getElementById('jangkawaktusumberiup2').style.background = 'red';
		                                                        document.getElementById('jangkawaktusumberiup2').style.color = '#FFF';
		                                                        <?php } else { ?>
		                                                        document.getElementById('jangkawaktusumberiup2').style.background = '#FFF';
		                                                        document.getElementById('jangkawaktusumberiup2').style.color = '#555';
		                                                        <?php } ?>
		                                                        $('#iupopk2_no_h').val($('#iupopk2_no').val());
																$('#iupopk2_tanggal_h').val($('#iupopk2_tanggal').val());
																$('#iupopk2_jangkawaktu_h').val($('#iupopk2_jangkawaktu').val());
																$('#iupopk2_menerbitkan_h').val($('#iupopk2_menerbitkan').val());
																$('#iupopk2_wilayah_h').val($('#iupopk2_wilayah').val());"
		                                        data-toggle="modal" data-target="#sumbertambangiupopkModal">
		                                        <i class="fa fa-pencil-square-o"></i> Ubah</a> |
		                                    <a href="" onclick="document.getElementById('useridsumber2').value='<?php echo $row->UserId ?>';
		                                    					document.getElementById('asaltambangsumber2').value='<?php echo $row->AsalTambang ?>';
		                                    					document.getElementById('jenisiuopkdelete').value='IUPOPK2';"
		                                            data-toggle="modal" data-target="#confirmSumbertambangModal">
		                                        <i class="fa fa-trash-o"></i> Hapus</a>
		                        	</td>
		                        </tr>
		                        	<?php } ?>
			                        <?php $counter++; } ?>
								</tbody>
							</table>
							<?php  if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
							<input type="button" value="Tambah Asal Tambang" class="btn btn-submit  btn-primary" 
					            data-toggle="modal" data-target="#sumbertambangiupopkModal"
					            onclick="document.getElementById('asaltambangsumberiup').value='';
					            		document.getElementById('jenisiuopk2').value='IUPOPK';
					            		$('#asaltambangsumberiup').attr('readonly', false);
					            		document.getElementById('asaltambangsumberiup').style.background = '#FFF';
		                                document.getElementById('asaltambangsumberiup').style.color = '#555';
					                    document.getElementById('namasumberawaliup').value='';
					                    $('#namasumberawaliup').attr('readonly', false);
					                    document.getElementById('namasumberawaliup').style.background = '#FFF';
		                                document.getElementById('namasumberawaliup').style.color = '#555';
					                    document.getElementById('noiupopsumberiup').value='<?php echo $data7->No ?>';
					                    $('#noiupopsumberiup').attr('readonly', false);
					                    document.getElementById('noiupopsumberiup').style.background = '#FFF';
		                                document.getElementById('noiupopsumberiup').style.color = '#555';
					                    document.getElementById('nocncsumberiup').value='';
					                    $('#nocncsumberiup').attr('readonly', false);
					                    document.getElementById('nocncsumberiup').style.background = '#FFF';
		                                document.getElementById('nocncsumberiup').style.color = '#555';
		                                document.getElementById('tglsumberiup1').value='<?php if(!is_null($data7->Tanggal)) { echo date("d-m-Y", strtotime($data7->Tanggal)); } ?>';
		                                document.getElementById('tglsumberiup1').style.background = '#FFF';
		                                document.getElementById('tglsumberiup1').style.color = '#555';
		                                document.getElementById('tglsumberiup2').value='';
		                                document.getElementById('tglsumberiup2').style.background = '#FFF';
		                                document.getElementById('tglsumberiup2').style.color = '#555';
		                                document.getElementById('jangkawaktusumberiup1').value='<?php if(!is_null($data7->JangkaWaktu)) { echo date("d-m-Y", strtotime($data7->JangkaWaktu)); } ?>';
		                                document.getElementById('jangkawaktusumberiup1').style.background = '#FFF';
		                                document.getElementById('jangkawaktusumberiup1').style.color = '#555';
		                                document.getElementById('jangkawaktusumberiup2').value='';
		                                document.getElementById('jangkawaktusumberiup2').style.background = '#FFF';
		                                document.getElementById('jangkawaktusumberiup2').style.color = '#555';
		                                $('#iupopk2_no_h').val($('#iupopk2_no').val());
										$('#iupopk2_tanggal_h').val($('#iupopk2_tanggal').val());
										$('#iupopk2_jangkawaktu_h').val($('#iupopk2_jangkawaktu').val());
										$('#iupopk2_menerbitkan_h').val($('#iupopk2_menerbitkan').val());
										$('#iupopk2_wilayah_h').val($('#iupopk2_wilayah').val());" >
					        <?php } ?>
					</tr>
					<tr id="ket2">
						<td colspan="5" style="border:none;"><br />
							Dalam hal pemegang IUP OP Khusus Pengolahan dan Pemurnian (IUP OPK) akan melakukan kegiatan 
							Pengolahan dan Pemurnian Batubara yang berasal selain dari IUP OP/PKP2B yang tercantum dalam IUP OPK, 
							<b>wajib melampirkan surat persetujuan / penyesuaian IUP OPK</b> dari Direktur Jenderal Mineral Batubara 
							atau penerbit IUP OPK. Surat persetujuan / penyesuaian tersebut dapat di upload 
							<?php if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
							<i><a href="" data-toggle="modal" data-target="#modalUpload">disini</a></i>
							<?php } ?> dalam 
							format berbentuk PDF.
						</td>
					</tr>
					<!-- IUPOP KHUSUS END -->

					<tr id="trbutton">
						<td colspan="2" align=center style="border:none;">
							<p align="left"><b>Catatan : *) wajib di isi<b></p><br />
							<?php  if($data5->PersetujuanVerifikasi <> 'Y' ^ $data5->Status<>1 || $data5->StatusPakta <> 'Y') { ?>
							<a href="<?php echo 'legalitasperijinanperusahaan' ?>" class="btn btn-submit btn-primary" id="btnprev">
							<i class="fa fa-arrow-left fa-fw" style="padding-left: 5px; padding-right: 5px;"></i> Sebelumnya</a>
							<button type="submit" class="btn btn-submit btn-primary" id="btnnext">Berikutnya
							<i class="fa fa-arrow-right fa-fw" style="padding-left: 5px; padding-right: 5px;"></i></button>
							<?php } ?>
						</td>
					</tr>
				</tbody>
			</table>
		</form>

    <!-- modal koordinat begin -->
    <div class="modal fade" id="sumbertambangModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                	<div class="modal-header">
        				<h4 class="modal-title" id="koordinatModalLabel">Asal Tambang</h4>
      				</div>
      				<div class="modal-body">
	                	<form action="{{action('VendorController@saveasaltambang')}}" method="post">
	                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	                		<input type="hidden" name="useridsumber" id="useridsumber">
	                		<input type="hidden" name="namasumberawal" id="namasumberawal">
	                		<input type="hidden" name="jenisiuopk" id="jenisiuopk">
	                		<input type="hidden" name="iupopk_no_h" id="iupopk_no_h">
	                		<input type="hidden" name="iupopk_tanggal_h" id="iupopk_tanggal_h">
	                		<input type="hidden" name="iupopk_jangkawaktu_h" id="iupopk_jangkawaktu_h">
	                		<input type="hidden" name="iupopk_menerbitkan_h" id="iupopk_menerbitkan_h">
	                		<input type="hidden" name="iupopk_wilayah_h" id="iupopk_wilayah_h">
	                		<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; border-top:none;" width=150>Sumber Tambang</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<div data-tip="masukan asal tambang">	
													<input type='text' class='form-control' name="asaltambangsumber" id="asaltambangsumber" 
														required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>No. IUPOP</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<div data-tip="masukan no iuop">	
													<input type='text' class='form-control' name="noiupopsumber" id="noiupopsumber" 
														required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Tanggal</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan tanggal">	
													<input type='text' class='form-control' name="tglsumber1" id="tglsumber1" readonly="true"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan jangka waktu">	
													<input type='text' class='form-control' name="jangkawaktusumber1" id="jangkawaktusumber1" readonly="true"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Sertifikat CNC</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<div data-tip="masukan sertifikat cnc">	
													<input type='text' class='form-control' name="nocncsumber" id="nocncsumber"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Tanggal</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan tanggal">	
													<input type='text' class='form-control' name="tglsumber2" id="tglsumber2" readonly="true"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan jangka waktu">	
													<input type='text' class='form-control' name="jangkawaktusumber2" id="jangkawaktusumber2" readonly="true"
													required="required"></input>
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

    <!-- modal koordinat begin -->
    <div class="modal fade" id="sumbertambangiupopkModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                	<div class="modal-header">
        				<h4 class="modal-title" id="koordinatModalLabel">Asal Tambang</h4>
      				</div>
      				<div class="modal-body">
	                	<form action="{{action('VendorController@saveasaltambangiupopk')}}" method="post">
	                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	                		<input type="hidden" name="useridsumberiup" id="useridsumberiup">
	                		<input type="hidden" name="namasumberawaliup" id="namasumberawaliup">
	                		<input type="hidden" name="jenisiuopk2" id="jenisiuopk2">
	                		<input type="hidden" name="iupopk2_no_h" id="iupopk2_no_h">
	                		<input type="hidden" name="iupopk2_tanggal_h" id="iupopk2_tanggal_h">
	                		<input type="hidden" name="iupopk2_jangkawaktu_h" id="iupopk2_jangkawaktu_h">
	                		<input type="hidden" name="iupopk2_menerbitkan_h" id="iupopk2_menerbitkan_h">
	                		<input type="hidden" name="iupopk2_wilayah_h" id="iupopk2_wilayah_h">
	                		<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; border-top:none;" width=150>Jenis Ijin</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<div data-tip="masukan jenis ijin">	
													<select name='asaltambangsumberiup' id='asaltambangsumberiup' class='form-control'>
														<option value="" selected>- Jenis Ijin -</option>
														<option value="PKP2B" >PKP2B</option>
														<option value="IUPOP" >IUP OP</option> 
														<option value="IUPOPK" >IUP OPK Pengangkutan</option>
														<option value="IUPOPK2" >IUP OPK Pemurnian</option>
													</select>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>No. IUPOP</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<div data-tip="masukan no iuop">	
													<input type='text' class='form-control' name="noiupopsumberiup" id="noiupopsumberiup" 
														required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Tanggal</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan tanggal">	
													<input type='text' class='form-control' name="tglsumberiup1" id="tglsumberiup1" readonly="true"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan tanggal">	
													<input type='text' class='form-control' name="jangkawaktusumberiup1" id="jangkawaktusumberiup1" readonly="true"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Sertifikat CNC</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<div data-tip="masukan sertifikat cnc">	
													<input type='text' class='form-control' name="nocncsumberiup" id="nocncsumberiup"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Tanggal</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan tanggal">	
													<input type='text' class='form-control' name="tglsumberiup2" id="tglsumberiup2" readonly="true"
													required="required"></input>
												</div>
											</div>
										</td>
        							</tr>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Jangka Waktu</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-5'>
												<div data-tip="masukan tanggal">	
													<input type='text' class='form-control' name="jangkawaktusumberiup2" id="jangkawaktusumberiup2" readonly="true"
													required="required"></input>
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
    <div class="modal fade" id="confirmSumbertambangModal" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <form action="{{action('VendorController@deleteasaltambang')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="useridsumber2" id="useridsumber2">
                        <input type="hidden" name="jenisiuopkdelete" id="jenisiuopkdelete">
                        <div class="modal-body">
                            <h4>Anda yakin akan menghapus Asal Tambang <input style="border:none;" type="text" 
                                id="asaltambangsumber2" name="asaltambangsumber2"> 
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
    
    <!-- modal upload begin -->
    <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                	<div class="modal-header">
        				<h4 class="modal-title">Upload File</h4>
      				</div>
      				<div class="modal-body">
	                	<form action="{{action('DokumenController@add')}}" method="post" enctype="multipart/form-data">
	                		<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	                		<table class="table table-bordered" style="border:none;">
        						<tbody>
        							<tr>
        								<td style="border:none; border-top:none;" width=100>Pilih File</td>
										<td style="border-top:none;border-left:none;border-bottom:none;" colspan="4">
											<div class='col-sm-12'>
												<input type="file" name="filefield" accept="application/pdf"></td>
											</div>
										</td>
        							</tr>
        						</tbody>
        					</table>
        					<div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                <input  type="submit" value="Upload" class="btn btn-submit  btn-primary">
                            </div>
	                	</form>		
	                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal upload end -->

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