<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|Pe
*/

// default Route
Route::get('/', 'HomeController@home');
// home Route
Route::get('home', 'HomeController@home');
Route::get('pengumuman', 'HomeController@pengumuman');
Route::get('daftar','HomeController@daftar');
Route::get('persyaratan','HomeController@persyaratan');
Route::get('login', 'HomeController@login');
Route::post('ceklogin', 'HomeController@ceklogin');
Route::post('registrasi', 'HomeController@registrasi');
Route::get('GetPengumuman/{id}','HomeController@getpengumuman');
Route::get('DetailPengumuman', 'HomeController@detailpengumuman');
Route::post('CariPengumuman','HomeController@caripengumuman');
Route::get('logout','HomeController@logout');

// admin Route
Route::get('admin', 'AdminController@admin');
Route::get('entrydataduediligence', 'AdminController@entrydataduediligence');
Route::get('entrydatanegosiasi', 'AdminController@entrydatanegosiasi');
Route::get('evaluasipenawaran', 'AdminController@evaluasipenawaran');
Route::get('monitoringkontrak', 'AdminController@monitoringkontrak');
Route::get('undangkontrak', 'AdminController@undangkontrak');
Route::get('undangcda', 'AdminController@undangancda');
Route::get('undangduediligen', 'AdminController@undanganduediligence');
Route::get('undangnego', 'AdminController@undangannegosiasi');
Route::get('undangpenawaran', 'AdminController@undanganpenawaran');
Route::get('suratpenunjukan','AdminController@suratpenunjukan');
Route::get('verifikasi', 'AdminController@verifikasi');
Route::get('mastervendor', 'AdminController@mastervendor');
Route::get('masterpengumuman','AdminController@masterpengumuman');
Route::get('addpengumuman','AdminController@addpengumuman');
Route::get('editpengumuman/{id}','AdminController@editpengumuman');
Route::get('updatepengumuman','AdminController@updatepengumuman');
Route::get('dokumenpeserta','AdminController@dokumenpeserta');
Route::get('DetailDokumen/{id}', 'AdminController@detaildokumen');
Route::get('DetailDokumenPeserta','AdminController@detaildokumenpeserta');
Route::get('masteradmin','AdminController@masteradmin');
Route::get('gantipasswordadmin','AdminController@gantipasswordadmin');
Route::get('pelaksanaverifikasi','AdminController@pelaksanaverifikasi');
Route::get('hasilverifikasipeserta','AdminController@hasilverifikasipeserta');
Route::get('hasilduediligencepeserta','AdminController@hasilduediligencepeserta');
Route::get('rekapitulasiverifikasi','AdminController@rekapitulasiverifikasi');
Route::get('rekapitulasidcpt','AdminController@rekapitulasidcpt');
Route::get('jumlahpeserta','AdminController@jumlahpeserta');
Route::get('notifikasi','AdminController@notifikasi');
Route::get('viewrekapitulasidcpt','AdminController@viewrekapitulasidcpt');
Route::get('cetakformvendor','AdminController@cetakformvendor');
Route::get('dokumenmanual','AdminController@dokumenmanual');
Route::get('provinsi','AdminController@provinsi');
Route::get('provinsilist','AdminController@provinsilist');
Route::get('kabupaten','AdminController@kabupaten');
Route::get('kabupatenlist','AdminController@kabupatenlist');
Route::get('kecamatan','AdminController@kecamatan');
Route::get('kecamatanlist','AdminController@kecamatanlist');
Route::get('kabDropDownData/{id}','AdminController@kabDropDownData');
Route::get('kabDropDownDataSelected/{pid}/{kid}','AdminController@kabDropDownDataSelected');
Route::get('kelurahan','AdminController@kelurahan');
Route::get('kelurahanlist','AdminController@kelurahanlist');
Route::get('kecDropDownData/{id}','AdminController@kecDropDownData');
Route::get('kecDropDownDataSelected/{pid}/{kid}','AdminController@kecDropDownDataSelected');
Route::get('notifikasilist','AdminController@notifikasilist');
Route::get('deletenotifikasi','AdminController@deletenotifikasi');
Route::get('dcptlist','AdminController@dcptlist');
Route::get('cetaklist','AdminController@cetaklist');
Route::get('mastercalori', 'AdminController@mastercalori');
Route::get('mastercalorilist','AdminController@mastercalorilist');
Route::get('masterdetailcalori', 'AdminController@masterdetailcalori');
Route::get('masterdetailcalorilist','AdminController@masterdetailcalorilist');
Route::get('editdcpt','AdminController@editdcpt');

// aksi admin route
Route::post('LolosVerifikasi', 'AdminController@lolosverifikasi');
Route::post('GagalVerifikasi', 'AdminController@gagalverifikasi');
Route::post('aksiundanguediligence','AdminController@aksiundanguediligence');
Route::post('aksiundangpenawaran','AdminController@aksiundangpenawaran');
Route::post('aksiundangnegosiasi','AdminController@aksiundangnegosiasi');
Route::post('aksiundangsuratpenunjukan','AdminController@aksiundangsuratpenunjukan');
Route::post('aksiundangcda','AdminController@aksiundangcda');
Route::post('aksiundangankontrak','AdminController@aksiundangankontrak');
Route::post('aksideletevendor', 'AdminController@aksideletevendor');
Route::post('aksisavepengumuman', 'AdminController@aksisavepengumuman');
Route::post('aksideletepengumuman','AdminController@aksideletepengumuman');
Route::post('aksisavepengguna','AdminController@aksisavepengguna');
Route::post('aksideletepengguna','AdminController@aksideletepengguna');
Route::post('savepasswordadmin','AdminController@savepasswordadmin');
Route::post('aksisavepelaksana','AdminController@aksisavepelaksana');
Route::post('PersetujuanVerifikasi', 'AdminController@persetujuan');
Route::post('PersetujuanVerifikasi2', 'AdminController@persetujuan2');
Route::post('LolosDueDiligence','AdminController@lolosduediligence');
Route::post('GagalDueDiligence', 'AdminController@gagalduediligence');
Route::post('CariVendorPelaksana','AdminController@carivendorpelaksana');
Route::post('CariVendorVerifikasi','AdminController@carivendorverifikasi');
Route::post('CariVendorHasilVerifikasi','AdminController@carivendorhasilverifikasi');
Route::post('CariVendorDokumenPeserta','AdminController@carivendordokumenpeserta');
Route::post('CariVendorRekapitulasiPeserta','AdminController@carivendorrekapitulasipeserta');
Route::post('CariVendorRekapitulasiDCPT','AdminController@carivendorrekapitulasidcpt');
Route::post('CariVendorUndanganDue','AdminController@carivendorundangandue');
Route::post('CariVendorEntryDue','AdminController@carivendorentrydue');
Route::post('CariVendorHasilDue','AdminController@carivendorhasildue');
Route::post('CariVendorUndanganPenawaran','AdminController@carivendorundanganpenawaran');
Route::post('CariVendorEvaluasiPenawaran','AdminController@carivendorevaluasipenawaran');
Route::post('CariVendorUndanganNegosiasi','AdminController@carivendorundangannegosiasi');
Route::post('CariVendorEntryNegosiasi','AdminController@carivendorentrynegosiasi');
Route::post('CariVendorSuratPenunjukan','AdminController@carivendorsuratpenunjukan');
Route::post('CariVendorUndanganCDA','AdminController@carivendorundangancda');
Route::post('CariVendorUndanganKontrak','AdminController@carivendorundangankontrak');
Route::post('caripengumumanadmin','AdminController@caripengumumanadmin');
Route::post('carivendoradmin','AdminController@carivendoradmin');
Route::post('caripenggunaadmin','AdminController@caripenggunaadmin');
Route::post('provinsisave','AdminController@provinsisave');
Route::post('provinsidelete','AdminController@provinsidelete');
Route::post('kabupatensave','AdminController@kabupatensave');
Route::post('kabupatendelete','AdminController@kabupatendelete');
Route::post('kecamatansave','AdminController@kecamatansave');
Route::post('kecamatandelete','AdminController@kecamatandelete');
Route::post('kelurahansave','AdminController@kelurahansave');
Route::post('kelurahandelete','AdminController@kelurahandelete');
Route::post('mastercalorisave','AdminController@mastercalorisave');
Route::post('mastercaloridelete','AdminController@mastercaloridelete');
Route::post('mastercaloridetailsave','AdminController@mastercaloridetailsave');
Route::post('mastercaloridetaildelete','AdminController@mastercaloridetaildelete');

// pendaftaran vendor get Route
Route::get('vendorhome', 'VendorController@vendorhome');
Route::get('notifikasiverifikasi','VendorController@notifikasiverifikasi');
Route::get('dataadministrasiperusahaan', 'VendorController@dataadministrasiperusahaan');
Route::get('legalitasperijinanperusahaan', 'VendorController@legalitasperijinanperusahaan');
Route::get('datapengurusperusahaan', 'VendorController@datapengurusperusahaan');
Route::get('datapersonelperusahaan', 'VendorController@datapersonelperusahaan');
Route::get('datakeuangan', 'VendorController@datakeuangan');
Route::get('armadatransportasi', 'VendorController@armadatransportasi');
Route::get('pengalamanperusahaan', 'VendorController@pengalamanperusahaan');
Route::get('kontrakpengadaanbatubara', 'VendorController@kontrakpengadaanbatubara');
Route::get('legalitasperijinantambang', 'VendorController@legalitasperijinantambang');
Route::get('datateknistambang', 'VendorController@datateknistambang');
Route::get('spesifikasibatubara/{id}', 'VendorController@spesifikasibatubara');
Route::get('listspesifikasibatubara', 'VendorController@listspesifikasibatubara');
Route::get('saranapengangkutbatubara', 'VendorController@saranapengangkutbatubara');
Route::get('kirimdokumen','VendorController@kirimdokumen');
Route::get('kabupatenDropDownData/{id}', 'VendorController@kabupatenDropDownData');
Route::get('gantipassword','VendorController@gantipassword');
Route::get('DetailTeknisTambang/{alamat}', 'VendorController@detailteknistambang');
Route::get('detaildatateknistambang','VendorController@detaildatateknistambang');
Route::get('DetailSpesifikasiTambang/{id}', 'VendorController@detailspesifikasitambang');
Route::get('DataTeknis/{alamat}','VendorController@datateknis');
Route::get('adddetaildatateknistambang','VendorController@adddetaildatateknistambang');
Route::get('paktaintegritas','VendorController@paktaintegritas');
Route::get('ddlnomoriupop/{tipe}', 'VendorController@ddlnomoriupop');
Route::get('changenomoriupop/{tipe}/{nmr}', 'VendorController@changenomoriupop');
Route::get('TeknisTambang/{sumber}','VendorController@teknistambang');
Route::get('datatambang','VendorController@datatambang');
Route::get('datakapasitasproduksi','VendorController@datakapasitasproduksi');
Route::get('dataeksplorasi','VendorController@dataeksplorasi');
Route::get('datastockpile','VendorController@datastockpile');
Route::get('datajetty','VendorController@datajetty');
Route::get('KotaDDL/{id1}/{id2}','VendorController@KotaDDL');
Route::get('KecamatanDDL/{id1}/{id2}','VendorController@KecamatanDDL');
Route::get('KelurahanDDL/{id1}/{id2}','VendorController@KelurahanDDL');
Route::get('koorjetty/{id}','VendorController@koorjetty');
Route::get('koordinatjetty','VendorController@koordinatjetty');
Route::get('panduanmanual','VendorController@panduanmanual');
Route::get('CaloriDropDownData/{id}','VendorController@CaloriDropDownData');

// pendaftaran vendor post Route
Route::post('savedataadministrasiperusahaan', 'VendorController@savedataadministrasiperusahaan');
Route::post('savelegalitasperijinanperusahaan', 'VendorController@savelegalitasperijinanperusahaan');
Route::post('savekomisarisperusahaan','VendorController@savekomisarisperusahaan');
Route::post('savekomisarisperusahaanperubahan','VendorController@savekomisarisperusahaanperubahan');
Route::post('savedireksiperusahaan', 'VendorController@savedireksiperusahaan');
Route::post('savedireksiperusahaanperubahan', 'VendorController@savedireksiperusahaanperubahan');
Route::post('savepengurusperusahaan', 'VendorController@savepengurusperusahaan');
Route::post('savekepemilikansaham', 'VendorController@savekepemilikansaham');
Route::post('savekeuangan', 'VendorController@savekeuangan');
Route::post('savearmadatransportasi', 'VendorController@savearmadatransportasi');
Route::post('savepengalamanperusahaan', 'VendorController@savepengalamanperusahaan');
Route::post('savekontrakpengadaan', 'VendorController@savekontrakpengadaan');
Route::post('savelegalitasperijinantambang', 'VendorController@savelegalitasperijinantambang');
Route::post('savedatateknistambang', 'VendorController@savedatateknistambang');
Route::post('savespesifikasibatubara', 'VendorController@savespesifikasibatubara');
Route::post('savesaranapengangkut', 'VendorController@savesaranapengangkut');
Route::post('savepassword', 'VendorController@savepassword');
Route::post('savekoordinattambang','VendorController@savekoordinattambang');
Route::post('saveasaltambang','VendorController@saveasaltambang');
Route::post('saveasaltambangiupopk','VendorController@saveasaltambangiupopk');
Route::post('savepaktaintegritas','VendorController@savepaktaintegritas');
Route::post('savedatatambang','VendorController@savedatatambang');
Route::post('savedatakapasitasproduksi','VendorController@savedatakapasitasproduksi');
Route::post('savejenisperalatan','VendorController@savejenisperalatan');
Route::post('deletejenisperalatan','VendorController@deletejenisperalatan');
Route::post('savedataeksplorasi','VendorController@savedataeksplorasi');
Route::post('savespesifikasi','VendorController@savespesifikasi');
Route::post('deletespesifikasi','VendorController@deletespesifikasi');
Route::post('savedatastockpile','VendorController@savedatastockpile');
Route::post('savedatajety','VendorController@savedatajety');
Route::post('savedetailjetty','VendorController@savedetailjetty');
Route::post('deletedetailjetty','VendorController@deletedetailjetty');
Route::post('deletekortambang','VendorController@deletekortambang');
Route::post('savekortambang','VendorController@savekortambang');
Route::post('saverealisasi','VendorController@saverealisasi');
Route::post('deleterealisasi','VendorController@deleterealisasi');
Route::post('savekoordinatjetty','VendorController@savekoordinatjetty');

// aksi vendor route
Route::post('deletekomisarisperusahaan', 'VendorController@deletekomisarisperusahaan');
Route::post('deletekomisarisperusahaanperubahan', 'VendorController@deletekomisarisperusahaanperubahan');
Route::post('deletedireksiperusahaan', 'VendorController@deletedireksiperusahaan');
Route::post('deletedireksiperusahaanperubahan', 'VendorController@deletedireksiperusahaanperubahan');
Route::post('deletetenagaahli','VendorController@deletetenagaahli');
Route::post('deletekepemilikansaham','VendorController@deletekepemilikansaham');
Route::post('deletearmada','VendorController@deletearmada');
Route::post('deletepengalamanperusahaan','VendorController@deletepengalamanperusahaan');
Route::post('deletekontrakpengadaan','VendorController@deletekontrakpengadaan');
Route::post('deletedatateknis','VendorController@deletedatateknis');
Route::post('deletekoordinattambang','VendorController@deletekoordinattambang');
Route::post('deleteasaltambang','VendorController@deleteasaltambang');
Route::post('deletespesifikasibatubara','VendorController@deletespesifikasibatubara');
Route::post('deletekoordinatjetty','VendorController@deletekoordinatjetty');

// hasil vendor get route
Route::get('hasilverifikasi', 'VendorController@hasilverifikasi');
Route::get('hasilduediligence', 'VendorController@hasilduediligence');
Route::get('hasilnegosiasi', 'VendorController@hasilnegosiasi');
Route::get('hasilcda','VendorController@hasilcda');

// undangan vendor get route
Route::get('undangancda', 'VendorController@undangancda');
Route::get('undanganduediligence', 'VendorController@undanganduediligence');
Route::get('undangankontrak', 'VendorController@undangankontrak');
Route::get('undangannegosiasi','VendorController@undangannegosiasi');
Route::get('undanganpenawaran','VendorController@undanganpenawaran');
Route::get('undangansuratpenunjukan','VendorController@undangansuratpenunjukan');

// route detail get
Route::get('DetailVendor/{id}', 'DetailController@detailvendor');
Route::get('DetailAdministrasi','DetailController@detailadministrasi');
Route::get('DetailArmada','DetailController@detailarmada');
Route::get('DetailKeuangan','DetailController@detailkeuangan');
Route::get('DetailKontrak','DetailController@detailkontrak');
Route::get('DetailPengalaman','DetailController@detailpengalaman');
Route::get('DetailPerijinan','DetailController@detailperijinan');
Route::get('DetailPersonil','DetailController@detailpersonil');
Route::get('DetailSarana','DetailController@detailsarana');
Route::get('DetailSpesifikasi/{id}','DetailController@detailspesifikasi');
Route::get('DetailTeknis','DetailController@detailteknis');
Route::get('DetailDetailTeknisTambang/{id}/{alamat}','DetailController@detaildetailteknistambang');
Route::get('DetailTeknis2','DetailController@detailteknis2');
Route::get('DetailIjinTambang','DetailController@detailijintambang');
Route::get('DetailListSpesifikasi', 'DetailController@detaillistspesifikasi');
Route::get('DetailTeknisVendor/{sumber}','DetailController@detailteknisvendor');
Route::get('DetailDataTambang','DetailController@detaildatatambang');
Route::get('DetailDataKapasitasProduksi','DetailController@detaildatakapasitasproduksi');
Route::get('DetailDataEksplorasi','DetailController@detaildataeksplorasi');
Route::get('DetailDataStockpile','DetailController@detaildatastockpile');
Route::get('DetailDataJetty','DetailController@detaildatajetty');
Route::get('DetailKoorJetty/{id}','DetailController@detailkoorjetty');
Route::get('DetailKoordinatJetty','DetailController@detailkoordinatjetty');
Route::get('DetailVendorEdit/{id}', 'DetailController@detailvendoredit');
Route::get('DetailKeuanganEdit','DetailController@detailkeuanganedit');

// route detail save
Route::post('savedetailadministrasi','DetailController@savedetailadministrasi');
Route::post('savedetailperijinan','DetailController@savedetailperijinan');
Route::post('savedetailkeuangan','DetailController@savedetailkeuangan');
Route::post('savedetailteknis','DetailController@savedetailteknis');
Route::post('savedetailspesifikasi','DetailController@savedetailspesifikasi');
Route::post('savedetailsarana','DetailController@savedetailsarana');
Route::post('savedetailpersonil','DetailController@savedetailpersonil');
Route::post('savedetailkomisaris','DetailController@savedetailkomisaris');
Route::post('savedetaildireksi','DetailController@savedetaildireksi');
Route::post('savedetailkomisarisperubahan','DetailController@savedetailkomisarisperubahan');
Route::post('savedetaildireksiperubahan','DetailController@savedetaildireksiperubahan');
Route::post('savedetailsaham','DetailController@savedetailsaham');
Route::post('savedetailarmada','DetailController@savedetailarmada');
Route::post('savedetailpengalaman','DetailController@savedetailpengalaman');
Route::post('savedetailkontrak','DetailController@savedetailkontrak');
Route::post('savedetailperijinaniupop','DetailController@savedetailperijinaniupop');
Route::post('savedetailperijinaniupopk','DetailController@savedetailperijinaniupopk');
Route::post('savedetailperijinaniupopk2','DetailController@savedetailperijinaniupopk2');
Route::post('savedetailkoordinattambang','DetailController@savedetailkoordinattambang');
Route::post('savedetailasaltambang','DetailController@savedetailasaltambang');
Route::post('savedetaildatatambang','DetailController@savedetaildatatambang');
Route::post('savedetaildatakapasitasproduksi','DetailController@savedetaildatakapasitasproduksi');
Route::post('savedetailjenisperalatan','DetailController@savedetailjenisperalatan');
Route::post('savedetaildataeksplorasi','DetailController@savedetaildataeksplorasi');
Route::post('savedetailspek','DetailController@savedetailspek');
Route::post('savedetaildatastockpile','DetailController@savedetaildatastockpile');
Route::post('savedetaildatajety','DetailController@savedetaildatajety');
Route::post('savedetaildetailjetty','DetailController@savedetaildetailjetty');
Route::post('savedetailkortambang','DetailController@savedetailkortambang');
Route::post('savedetailrealisasi','DetailController@savedetailrealisasi');
Route::post('savedetailkoordinatjetty','DetailController@savedetailkoordinatjetty');
Route::post('savedetailkeuanganedit','DetailController@savedetailkeuanganedit');

// route entry get
Route::get('EntryDueVendor/{id}/{alamat}', 'EntryController@entryduevendor');
Route::get('EntryDataTambang','EntryController@entrydatatambang');
Route::get('EntryKualitasBatubara','EntryController@entrykualitasbatubara');
Route::get('EntryDataSarana','EntryController@entrydatasarana');
Route::get('EvalPenawaran/{id}', 'EntryController@evalpenawaran');
Route::get('EntryPenawaran','EntryController@entrypenawaran');
Route::get('EvalNegosiasi/{id}', 'EntryController@evalnegosiasi');
Route::get('EntryNegosiasi','EntryController@entrynegosiasi');

// route entry save
Route::post('saveentrydatatambang','EntryController@saveentrydatatambang');
Route::post('saveentrykualitastambang','EntryController@saveentrykualitastambang');
Route::post('saveentrydatasarana','EntryController@saveentrydatasarana');
Route::post('saveentrypenawaran','EntryController@saveentrypenawaran');
Route::post('saveentrynegosiasi','EntryController@saveentrynegosiasi');
Route::post('saveentrykoordinattambang','EntryController@saveentrykoordinattambang');

// route upload dokumen
Route::get('DownloadDokumen/{id}/{nm}', 'DokumenController@get');
Route::post('kirimdokumen','DokumenController@add');
Route::post('kirimdokumenmanual','DokumenController@addmanual');
Route::get('DetailDokumenManual/{id}', 'DokumenController@getmanual');
Route::post('DeleteDokumenManual', 'DokumenController@deletedokumen');

// route export to pdf
get('/PDFJumlahPeserta','AdminController@PDFJumlahPeserta');
get('/PDFDCPT/{id}','AdminController@PDFDCPT');
get('/PDFSPEK/{id}','AdminController@PDFSPEK');

// route hasil
Route::get('HasilVendor/{id}/{tipe}', 'HasilController@hasilvendor');
Route::get('HasilAdministrasi','HasilController@hasiladministrasi');
Route::get('HasilPerijinan','HasilController@hasilperijinan');
Route::get('HasilKeuangan','HasilController@hasilkeuangan');
Route::get('HasilIjinTambang','HasilController@hasilijintambang');
Route::get('HasilTeknis','HasilController@hasilteknis');
Route::get('HasilTeknisVendor/{sumber}','HasilController@hasilteknisvendor');
Route::get('HasilDataTambang','HasilController@hasildatatambang');
Route::get('HasilDataKapasitasProduksi','HasilController@hasildatakapasitasproduksi');
Route::get('HasilDataEksplorasi','HasilController@hasildataeksplorasi');
Route::get('HasilDataStockpile','HasilController@hasildatastockpile');
Route::get('HasilDataJetty','HasilController@hasildatajetty');
Route::get('HasilKoorJetty/{id}','HasilController@hasilkoorjetty');
Route::get('HasilKoordinatJetty','HasilController@hasilkoordinatjetty');