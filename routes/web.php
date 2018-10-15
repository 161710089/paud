<?php

use Illuminate\support\Facades\Input;
use App\tb_m_siswa;
use Carbon\Carbon;
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

// ENV
// MAIL_DRIVER=smtp
// MAIL_HOST=smtp.mailtrap.io
// MAIL_PORT=2525
// MAIL_USERNAME=null
// MAIL_PASSWORD=null
// MAIL_ENCRYPTION=null

// Contact us
Route::get('contact-us', 'tb_s_contact_usController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'tb_s_contact_usController@contactUSPost']);
Route::get('/contact-us', 'FrontendController@contact')->name('contact');

//index
Route::get('/', 'frontendController@contactUS');
Route::post('/', ['as'=>'daftar.store','uses'=>'frontendController@contactUSPost']);

// About-us
Route::get('/about-us', 'FrontendController@about_us')->name('about_us');
Route::get('/service', 'FrontendController@service')->name('service');
Route::get('/','FrontendController@frontend')->name('Home');
Route::get('moreartikel','FrontendController@MoreArtikel')->name('MoreArtikel');
Route::get('moreGallery','FrontendController@moreGallery')->name('moreGallery');
Route::get('singleArtikel/{tb_m_artikel}','FrontendController@singleArtikel')->name('singleArtikel');
Route::get('moreartikel/show-artikel/{tb_m_artikel}','FrontendController@singleArtikel')->name('singleArtikel');
Route::get('moreEvent','FrontendController@moreEvent')->name('moreEvent');
Route::get('moreEvent/show-event/{tb_m_event}','FrontendController@singleEvent')->name('singleEvent');

Route::resource('frontend','frontendController');

Route::get('/event/{tb_m_event}/buy', 
['middleware' => ['auth', 'role:user'],
'as' => 'guest.tb_m_event.buy',
'uses' => 'tb_m_ticketController@buy'
]);

 
 Route::get('tes', function () {
 return view('frontend.service');
});



Auth::routes();
// settings
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

// Sweet Alert Delete
Route::get('/delete-absensi/{id}', 'tb_m_absensiController@deleteAbsensiRecord');
Route::get('/delete-artikel/{id}', 'tb_m_artikelController@deleteArtikelRecord');
Route::get('/delete-event/{id}', 'tb_m_eventController@deleteEventRecord');
Route::get('/delete-gallery/{id}', 'tb_m_galleryController@deleteGalleryRecord');
Route::get('/delete-kategori-gallery/{id}', 'tb_m_kategori_galleryController@deleteKategoriGalleryRecord');
Route::get('/delete-mapel/{id}', 'tb_m_mata_pelajaranController@deleteMapelRecord');
Route::get('/delete-pengajar/{id}', 'tb_m_pengajarController@deletePengajarRecord');
Route::get('/delete-sekolah/{id}', 'tb_s_sekolahController@destroy');
Route::get('/delete-siswa/{id}', 'tb_m_siswaController@deleteSiswaRecord');
Route::get('/delete-service/{id}', 'tb_m_serviceController@deleteServiceRecord');
Route::get('/delete-buy-ticket/{id}', 'tb_m_buy_ticketController@deleteBuyTicketRecord');
Route::get('/delete-ticket/{id}', 'tb_m_ticketController@deleteTicketRecord');
Route::get('/delete-user-ticket/{id}', 'userController@deleteUserTicketRecord');

Route::group(['prefix'=>'admin' ,'middleware'=>['auth','role:admin']], 
	function (){


Route::resource('absensi','tb_m_absensiController');
Route::resource('event','tb_m_eventController');
Route::resource('ticket','tb_m_ticketController');

// Route::get('search','searchController@index');

// Backend
Route::resource('kategori_gallery','tb_m_kategori_galleryController');
Route::resource('gallery','tb_m_galleryController');
Route::resource('Eventpengajar','tb_mix_EventpengajarController');
Route::resource('sekolah','tb_s_sekolahController');
Route::resource('pembayaran','tb_m_pembayaranController');
Route::get('/siswa/show/pembayaran',['as'=>'getPayment','uses'=>'tb_m_pembayaranController@index']);
Route::post('/siswa/pembayaran',['as'=>'lihatPembayaranSiswa','uses'=>'tb_m_pembayaranController@lihatPembayaranSiswa']);
Route::resource('siswa','tb_m_siswaController');
Route::resource('artikel','tb_m_artikelController');
Route::resource('ortu','tb_m_ortuController');
Route::resource('profile','tb_s_profileController');
Route::resource('pengajar','tb_m_pengajarController');
Route::resource('mata_pelajaran','tb_m_mata_pelajaranController');
Route::resource('AbsensiPengajar','tb_mix_AbsensiPengajarController');
Route::resource('PengajarMapel','tb_mix_PengajarMapelController');
Route::resource('maps','tb_s_mapController');
Route::resource('service','tb_m_serviceController');
Route::resource('pembeli_tiket','tb_m_buy_ticketController');


// Search
Route::get('tanggal_lahir','searchController@ttl')->name('tanggal_lahir');
Route::get('nama_panggilan','searchController@nama_panggilan')->name('nama_panggilan');
Route::get('alamat','searchController@alamat')->name('alamat');
Route::get('nama_panggilan', 'SearchController@nama_panggilan')->name('nama_panggilan');
Route::get('nama_panggilan', 'SearchController@nama_panggilan')->name('nama_panggilan');
Route::get('nama_panggilan', 'SearchController@nama_panggilan')->name('nama_panggilan');
Route::get('ttl', 'SearchController@ttl')->name('ttl');
Route::get('alamat', 'SearchController@alamat')->name('alamat');

// Route::get('siswa','tb_m_siswaController@autocomplete')->name('siswa');

Route::get('filtertanggal', 'tb_m_absensiController@filtertanggal')->name('filtertanggal');

Route::get('/dataAjax', 'tb_m_absensiController@dataAjax');
Route::get('/searchPengajar',array('as'=>'searchPengajar','uses'=>'tb_m_absensiController@autocomplete'));
Route::get('/searchSiswa',array('as'=>'searchSiswa','uses'=>'tb_m_absensiController@autocompleteNik'));
// Route::get('/search', 'tb_m_siswaController@search');
Route::get('/search',array('as'=>'search','uses'=>'tb_m_siswaController@search'));


//modal

Route::get('/store', 'tb_m_pengajarController@store')->name('store');



Route::get('/',function() {
	$now = new Carbon();
	dd($now);
	
});


});


Route::group(['prefix'=>'user' ,'middleware'=>['auth','role:user']], 
	function (){
Route::get('absensi', 'userController@absensi')->name('absensi');
Route::get('profile', 'userController@profile')->name('profile');
Route::get('tiket', 'userController@tiket')->name('tiket');

				});