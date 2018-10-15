<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_siswa;
use App\tb_m_pengajar;
use App\tb_m_mata_pelajaran;
use App\tb_m_artikel;
use App\tb_m_event;
use App\tb_m_gallery;
use App\tb_m_kategori_gallery;
use App\tb_s_contact_us;
use Mail;
class tb_s_contact_usController extends Controller
{
 public function contactUS(Request $request)
   {
 		$tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(6);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
       
        $kategori1=tb_m_gallery::whereHas('tb_m_kategori_gallery',function($query) use ($request){
                        $query->where('kategori','edukasi');
                    })
                    ->paginate(3);
        $kategori2=tb_m_gallery::whereHas('tb_m_kategori_gallery',function($query) use ($request){
                        $query->where('kategori','menggambar');
                    })
                    ->paginate(3);
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_gallery=tb_m_gallery::all();
        
        return view('frontend.contact' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','kategori1','kategori2'));   }
 
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
  public function contactUSPost(Request $request) 
   {

		
   	$tb_s_sekolah=tb_s_sekolah::all();
   	
    (compact('tb_s_sekolah'));
    $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
    tb_s_contact_us::create($request->all()); 
    Mail::send('frontend.email',
       array(
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'user_message' => $request->get('message')
       ), function($message) use ($tb_s_sekolah)
   {
   	   	
       $message->from('saquib.gt@gmail.com');
   	   foreach($tb_s_sekolah as $data){
       $message->to($data->tb_s_sosmed->Email , 'Admin')->subject('Pesan Dari User');
   	   }
   });
 
 		
    
    return back()->with('success', 'Terima Kasih Telah Menghubungi Kami!',compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','kategori1','kategori2')); 


    
   }
}