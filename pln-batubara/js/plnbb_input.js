/*File plnbb_input.js
Aplikasi Pengadaan Batu Bara PT. PLN Batu Bara v1.0.0
@author	Copyright (C) 2015 Taufik Surachman <piexz@yahoo.com>, All rights reserved.
Warning :
Dilarang keras menyalin, mengcopy, menggunakan aplikasi ini untuk kepentingan pembelajaran, personal ataupun komersil.
Dilarang memperjualbelikan Aplikasi Pengadaan Batu Bara PT. PLN Batu Bara
*/

function isNumber(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }

    return true;
}

function isDecimal(evt) {
    evt = (evt) ? evt : window.event;

    var charCode = (evt.which) ? evt.which : evt.keyCode;
                
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    {
        return false;
    }                
    return true;
}

function cekEmailPerusahaan(){
    var email = $("#email_perusahaan").val();
    var filter = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

    if (!filter.test(email)) {
        $('#errorprs').empty();
        $('#errorprs').append("Format Email Salah, contoh: aaa@aaa.com");
        document.getElementById("email_perusahaan").value = "";
    } else {
        $('#errorprs').empty();
    }
}

function cekEmailCp(){
    var email = $("#email_contact_person").val();
    var filter = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/

    if (!filter.test(email)) {
        $('#errorcp').empty();
        $('#errorcp').append("Format Email Salah, contoh: aaa@aaa.com");
        document.getElementById("email_contact_person").value = "";
    } else {
        $('#errorcp').empty();
    }
}

function cekPass(){
    var pass1 = $("#pass").val();
    var pass2 = $("#con_pass").val();

    if(pass1 != pass2){
        $('#errorpass').empty();
        $('#errorpass').append("Password Baru dan Konfirmasi Password Harus Sama");
    }else{
        $('#errorpass').empty();
    }
}

function isWaktu(evt){
    evt = (evt) ? evt : window.event;

    var charCode = (evt.which) ? evt.which : evt.keyCode;
                
    if (charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57))
    {
        return false;
    }                
    return true;
}