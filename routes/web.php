<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'PageController@landingPage');

Route::get('/landing-admin', 'PageController@landingAdmin');


Route::get('/dashboard-admins', 'PageController@dashboardSupers');

Route::get('/dashboard-staff', 'PageController@dashboardStaff');

Route::get('/lihat', 'PageController@lihat');
Route::get('/tracking-truck', 'PageController@trackingTruck');

Route::get('/daftar-piutang', 'PageController@daftarPiutang');


Route::get('/company-setting', 'PageController@companySetting');

Route::post('daftar', 'Auth@daftar');
Route::post('login', 'Auth@login');
Route::get('logout', 'Auth@logout');
Route::post('login-admin','Auth@loginAdmin');
Route::get('logout-admin', 'Auth@logoutAdmin');

Route::get('/dashboard-admin', 'admin@dashboard');
Route::get('/del-account/{id}', 'admin@delAccount');
Route::post('/add-staff/', 'admin@addStaff');

Route::get('/staff-management', 'admin@staffManagement');

Route::get('/company-setting', 'admin@companySetting');
Route::patch('/updatecompany/{id_company}','admin@editCompany');


Route::get('staff', 'staff@dashboard');
Route::get('/permintaan-dukungan', 'staff@permintaanDukungan');
Route::get('/dukungan-baru', 'staff@dukunganBaru');
Route::get('/detail-dukungan/{id}', 'staff@detailDukungan');
Route::post('/tambah-dukungan', 'staff@saveDukungan');
Route::get('open-pdf/{id}','staff@openPdf');

Route::get('/permintaan-penawaran', 'staff@permintaanPenawaran');
Route::get('/penawaran-baru', 'staff@penawaranBaru');
Route::get('/lihat-penawaran/{id}', 'staff@lihatPenawaran');
Route::get('/detail-lihat-penawaran/{id}', 'staff@detailLihatPenawaran');
Route::post('/tambah-penawaran', 'staff@savePenawaran');
Route::get('open-pdf-penawaran/{id}','staff@openPdfPenawaran');
Route::get('/nego/{id}', 'staff@nego');
Route::patch('/do-nego/{id}', 'staff@doNego');
Route::get('/setuju/{id}', 'staff@setuju');

Route::get('/kontrak', 'staff@kontrak');
Route::get('/detail-kontrak/{id}', 'staff@detailKontrak');
Route::get('kontrak-pdf/{id}','staff@pdfKontrak');

Route::get('/daftar-produksi','staff@produksi');

Route::get('/daftar-piutang','staff@piutang');

Route::get('/superadmin-dashboard','adminAdhimix@dashboardSuper');

Route::get('/superadmin-dataadmin','adminAdhimix@dataAdmin');
Route::post('/createadmin','adminAdhimix@createAdmin');
Route::patch('/editadmin/{id_admin}','adminAdhimix@editAdmin');
Route::get('/deleteadmin/{id}','adminAdhimix@deleteAdmin');


Route::get('admin-dashboard','adminAdhimix@dashboard');
Route::get('admin-dukungan','adminAdhimix@dukungan');

Route::get('/admin-dashboard','adminAdhimix@dashboard');
Route::get('/admin-dukungan','adminAdhimix@dukungan');

Route::get('/admin-company','adminAdhimix@company');

Route::post('terima/{id}','adminAdhimix@terima');

Route::get('/admin-mutu','adminAdhimix@mutu');
Route::post('/createmutu','adminAdhimix@createMutu');
Route::patch('/editmutu/{id_mutu}','adminAdhimix@editMutu');
Route::get('/deletemutu/{id}','adminAdhimix@deleteMutu');

Route::get('admin-penawaran','adminAdhimix@penawaran');
Route::post('tetapkan-harga/{id}','adminAdhimix@tetapkanHarga');

Route::get('admin-kontrak','adminAdhimix@kontrak');
Route::post('kirim-kontrak/{id}','adminAdhimix@kirimKontrak');
// Route::get('sms','adminAdhimix@sms');