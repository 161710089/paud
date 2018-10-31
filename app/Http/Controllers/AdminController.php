<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_pengajar;
use App\tb_m_siswa;
use App\tb_m_mata_pelajaran;
use App\tb_s_contact_us;
use Auth;
use Jenssegers\Date\Date;
use Carbon\carbon;
Date::setLocale('id');
use App\tb_m_pendapat_user;
use App\tb_m_event;
use App\tb_m_artikel;
use App\tb_m_buy_ticket;
use App\tb_m_gallery;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tb_s_sekolah =  tb_s_sekolah::all();
         $tb_s_contact_us =  tb_s_contact_us::all();

       $jumlahguru= tb_m_pengajar::where('id')->count();
       $jumlahsiswa= tb_m_siswa::where('id')->count();
       $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
        
        return view('layouts.admin',compact('tb_s_sekolah','jumlahguru','jumlahsiswa','tb_m_siswa','tb_s_contact_us'));
    }



public function dashboard()
    {

            $tb_m_buy_ticket = [];
         $tb_m_tiket = [];
        foreach (tb_m_buy_ticket::all() as $data) {
        array_push($tb_m_buy_ticket, $data->tb_m_ticket->tb_m_event->judul);
        array_push($tb_m_tiket, $data->user->count());
                                                                }

       $countnewsiswa=tb_m_siswa::whereDate( 'created_at' ,'>=', carbon::now()->subMonth(1) )->get()->count();
       $sekolahs =  tb_s_sekolah::all();
       $jumlahpengajar= tb_m_pengajar::all()->count();
       $jumlahsiswa= tb_m_siswa::all()->count();
       $jumlahevent= tb_m_event::all()->count();
       $jumlahGallery= tb_m_gallery::all()->count();
       $jumlahartikel= tb_m_artikel::all()->count();
       $jumlahtiketterjual=tb_m_buy_ticket::all()->count();
       $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
       $tb_s_contact_us =  tb_s_contact_us::all();
       $countPendapatuserpublish =  tb_m_pendapat_user::where('status',1)->get()->count();
       $countPendapatuserUnpublish =  tb_m_pendapat_user::where('status',0)->get()->count();
       $countPendapatuser =  tb_m_pendapat_user::all()->count();
       
       $tb_s_contact_us =  tb_s_contact_us::all();
       
       $januari=tb_m_siswa::all();
       

       $febuari=tb_m_siswa::whereMonth('created_at',2)->count();
            
          $tb_m_pendapat_user =  tb_m_pendapat_user::orderBy('created_at','desc')->paginate(3);
         
        return view('dashboard.index',compact('sekolahs','jumlahpengajar','jumlahsiswa','tb_m_mata_pelajaran','tb_m_pengajar','tb_m_siswa','tb_s_contact_us','januari','febuari','maret','april','mei','juni','july','agustus','september','oktober','november','desember','siswa','start','tb_m_pendapat_user','jumlahevent','jumlahartikel','jumlahtiketterjual','tb_m_tiket','tb_m_buy_ticket','countnewsiswa','jumlahGallery','countPendapatuserpublish','countPendapatuserUnpublish','countPendapatuser'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
