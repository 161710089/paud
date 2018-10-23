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
use App\tb_s_map;
use App\tb_m_service;
use App\tb_m_ticket;
use App\tb_m_buy_ticket;
use App\tb_s_contact_us;
use App\tb_s_sosmed;
use App\tb_m_kategori_artikel;
use App\tb_m_pendapat;
use App\tb_m_pendapat_user;
use Jenssegers\Date\Date;
Date::setLocale('id');

use Mail;
use Auth;
use Carbon;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
    //     $tb_m_siswa=tb_m_siswa::all();
    //     $tb_s_sekolah=tb_s_sekolah::all();
    //     $tb_m_pengajar=tb_m_pengajar::all();
    //     $jumlahguru= tb_m_pengajar::all();
    //     $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(6);
    //     $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
    //     $tb_m_kategori_gallery=tb_m_kategori_gallery::findOrFail($id);
    //     $tb_m_gallery = tb_m_gallery::all();
    //     $selectkategoriGallery = tb_m_gallery::findOrFail($tb_m_gallery->id)->id_kategori_gallery;
    //     $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
       
    //     $kategori1=tb_m_gallery::whereHas('tb_m_kategori_gallery',function($query) use ($request){
    //                     $query->where('kategori','edukasi');
    //                 })
    //                 ->paginate(3);
    //     $kategori2=tb_m_gallery::whereHas('tb_m_kategori_gallery',function($query) use ($request){
    //                     $query->where('kategori','menggambar');
    //                 })
    //                 ->paginate(3);
    //     $tb_m_gallery=tb_m_gallery::all();
    //     $tb_m_gallery=tb_m_gallery::all();
        
    //     return view('frontend.index' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_katgall'));
    // }


  

public function MoreArtikel(Request $request)
    {
       $sekolahs=tb_s_sekolah::all();
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $search = $request->get('search');
        $tb_m_artikel=tb_m_artikel::where('judul','like','%'.$search.'%')
                                    ->orderBy('created_at','desc')
                                    ->paginate(4);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
        $tb_m_artikel_single=null;
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        foreach ($tb_m_artikel as $data) {
        $a=Date::parse($data->created_at)->format('M Y');
        }
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        return view('frontend.MoreArtikel' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','recentpost_artikel','tb_m_kategori_gallery','widgetgallery','tb_m_artikel_single','a','sekolahs','tb_m_pendapat'));
    }

    public function tesss(Request $request)
    {
        $sekolahs=tb_s_sekolah::all();
        $tb_s_contact_us=tb_s_contact_us::all();
        
       
        return view('tesss' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','recentpost_artikel','tb_m_kategori_gallery','widgetgallery','tb_m_artikel_single','a','sekolahs','tb_s_contact_us','tb_m_pendapat'));
    }

public function moreEvent(Request $request)
    {
        $sekolahs=tb_s_sekolah::all();
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(2);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->paginate(1);
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
       $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        
        $tb_m_gallery=tb_m_gallery::orderBy('created_at','desc')->get();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        return view('frontend.moreEvent' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','recentpost_artikel','sekolahs','tb_m_pendapat'));
    }

    public function moreGallery(Request $request)
    {
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(2);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
        $tb_m_gallery=tb_m_gallery::orderBy('created_at','desc')->get();
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $sekolahs=tb_s_sekolah::all();
       $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        
        return view('frontend.moreGallery' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_artikel_single','recentpost_artikel','sekolahs','tb_m_pendapat'));
    }

    public function getArtikel(tb_m_artikel $tb_m_artikel)
    {
        $sekolahs =  tb_s_sekolah::all();
        return view('artikel.show',compact('tb_m_artikel_single','sekolahs'));  

    }

    public function singleArtikel(tb_m_artikel $tb_m_artikel)
    {
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel_single = tb_m_artikel::findOrFail($tb_m_artikel->id);
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(4);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $sekolahs=tb_s_sekolah::all();
       $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        
        
        return view('frontend.singleArtikel' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_artikel_single'
            ,'recentpost_artikel','sekolahs','tb_m_pendapat'));
    }

public function singleEvent(tb_m_event $tb_m_event)
    {
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(4);
        $tb_m_event_single=tb_m_event::findOrFail($tb_m_event->id);
        $tb_m_ticket=tb_m_ticket::where('id_event',$tb_m_event->id)->get();
        
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_gallery=tb_m_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
        foreach ($tb_m_event as $data) {
        $bookingticket=tb_m_buy_ticket::where('id_event',$data->id)->get()->count();
        $tb_m_buy_ticket=tb_m_buy_ticket::where('id_event',$data->id)->get();
        }
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $sekolahs=tb_s_sekolah::all();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        
        
        return view('frontend.singleEvent' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_event_single','tb_m_ticket','bookingticket','tb_m_buy_ticket','recentpost_artikel','sekolahs','tb_m_pendapat'));
    }

    public function contact(Request $request)
    {
        $tb_s_map=tb_s_map::all();
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
        $tb_m_gallery=tb_m_gallery::all();
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $sekolahs=tb_s_sekolah::all();
        $garis_lintang=tb_s_map::where('garis_lintang')->count();
        $garis_bujur=tb_s_map::where('garis_bujur')->count();
        $garis_bujurNull=tb_s_map::whereNull('garis_bujur')->count();
        $garis_lintangNull=tb_s_map::whereNull('garis_lintang')->count();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
       
       
        

        return view('frontend.contact' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_s_map','recentpost_artikel','sekolahs','garis_bujur','garis_lintang','garis_bujurNull','garis_lintangNull','tb_m_pendapat'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function about_us(Request $request)
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
        $widgetgallery=tb_m_gallery::orderBy('created_at','desc')->paginate(4);
        $tb_m_service=tb_m_service::orderBy('created_at','desc')->get();
        $sekolahs=tb_s_sekolah::all();
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $sekolahs=tb_s_sekolah::all();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        
        
        
        return view('frontend.about-us' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_service','sekolahs','recentpost_artikel','sekolahs','tb_m_pendapat'));
    }
   
    public function service(Request $request)
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
        $widgetgallery=tb_m_gallery::orderBy('created_at','desc')->paginate(4);
        $tb_m_service=tb_m_service::orderBy('created_at','desc')->get();
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $nextEvent=tb_m_event::whereDate('waktu' ,'>=', carbon\carbon::now())->orderBy('waktu','asc')->paginate(1);
        $sekolahs=tb_s_sekolah::all();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
        
        
        
        return view('frontend.service' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_service','recentpost_artikel','nextEvent','sekolahs','tb_m_pendapat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(4);
        $tb_m_artikel_single=tb_m_artikel::findOrFail($id);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(4);
        $sekolahs=tb_s_sekolah::all();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
       
        
        return view('frontend.singleArtikel' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_artikel_single','sekolahs','tb_m_pendapat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function frontend()
    {
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(6);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $tb_m_gallery = tb_m_gallery::orderBy('created_at','desc')->paginate(9);
        $widgetgallery=tb_m_gallery::orderBy('created_at','desc')->paginate(4);
        $tb_m_service=tb_m_service::orderBy('created_at','desc')->paginate(6);
        $countFacebook=tb_s_sosmed::whereNull('Facebook')->count();
        $countTwitter=tb_s_sosmed::whereNull('Twitter')->count();
        $countInstagram=tb_s_sosmed::whereNull('Instagram')->count();
        $countEmail=tb_s_sosmed::whereNull('Email')->count();
        
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        
        
        $nextEvent=tb_m_event::whereDate('waktu' ,'>=', carbon\carbon::now())->orderBy('waktu','asc')->paginate(1);
        $tb_s_sosmed=tb_s_sosmed::all();
        $sekolahs=tb_s_sekolah::all();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        $tb_m_pendapat_user =tb_m_pendapat_user::orderBy('created_at','desc')->get();
        
        return view('frontend.index' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_service','nextEvent','tb_m_ticket','bookingticket','tb_s_sosmed','countFacebook','recentpost_artikel','sekolahs','tb_m_pendapat','tb_m_pendapat_user'));
    }


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
       $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
       $sekolahs=tb_s_sekolah::all();
       $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
       
        
        
        return view('frontend.index' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','recentpost_artikel','sekolahs','tb_m_pendapat'));   }
 
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
 
        
    
    return back()->with('success', 'Terima Kasih Telah Menghubungi Kami!',compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_pendapat')); 


    
   }

   public function artikelKategori(tb_m_kategori_artikel $kategori)
{
    // $contact = Contact::all();
    
        $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
        $tb_m_siswa=tb_m_siswa::all();
        $tb_s_sekolah=tb_s_sekolah::all();
        $tb_m_pengajar=tb_m_pengajar::all();
        $jumlahguru= tb_m_pengajar::all();
        $tb_m_artikel=$kategori->tb_m_artikel()->latest()->paginate(5);
        $tb_m_event =tb_m_event::orderBy('waktu','desc')->get();
        $tb_m_gallery=tb_m_gallery::all();
        $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
        $widgetgallery=tb_m_gallery::orderBy('created_at','asc')->paginate(3);
         $tb_m_artikel_single=null;
        $recentpost_artikel=tb_m_artikel::orderBy('created_at','desc')->paginate(3);
        $sekolahs=tb_s_sekolah::all();
        $tb_m_pendapat=tb_m_pendapat::orderBy('created_at','desc')->get();
        
       
        return view('frontend.MoreArtikel' ,compact('tb_m_siswa','tb_m_pengajar','tb_s_sekolah','tb_m_mata_pelajaran','jumlahguru','tb_m_artikel','tb_m_event','tb_m_gallery','tb_m_kategori_gallery','widgetgallery','tb_m_artikel_single','recentpost_artikel','sekolahs','tb_m_pendapat'));
}

}
