<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_absensi;
use App\tb_s_sekolah;
use App\tb_m_siswa;
use App\tb_m_buy_ticket;
use Auth;

class userController extends Controller
{
    public function absensi(Request $request)
    {
        
        $a = $request->a;
        $b = $request->b;
        
        $sekolahs=tb_s_sekolah::all();
		$tb_m_absensi = tb_m_absensi::whereHas('tb_m_siswa',function($query) use ($request){
                        $query->where('id_user',Auth::user()->id);
                       })->whereBetween('tanggal', [$a, $b])

                            ->orderBy('tanggal', 'asc')
                            ->paginate(2);
        $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
                
                              
        
        return view('user.absensi', compact('tb_s_sekolah','tb_m_absensi', 'a','b','sekolahs','tb_m_siswa'));
    }
    public function profile(Request $request)
    {
        $sekolahs =tb_s_sekolah::all();
        $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
        return view('user.profile', compact('tb_m_siswa','sekolahs'));
    }

    public function tiket(Request $request)
    {
        $sekolahs =tb_s_sekolah::all();
        $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
        $tb_m_buy_ticket= tb_m_buy_ticket::where('user_id',Auth::user()->id)->get();
        return view('user.tiket', compact('tb_m_siswa','sekolahs','tb_m_buy_ticket'));
    }
    function deleteUserTicketRecord($id){
        tb_m_buy_ticket::where('id',$id)->delete();
    }
}

        // $tb_m_absensi = tb_m_absensi::whereHas('tb_m_siswa',function($query) use ($request){
        //                 $search = $request->get('search');
        //                 $query->where('nik','like','%'.$search.'%');
                                                                
        //                 })->whereBetween('tanggal', [$a, $b])

        //                     ->orderBy('tanggal', 'asc')
        //                     ->paginate(2);
        

        // Auth::user()->tb_m_siswa()->whereHas('tb_m_absensi',function($query) use ($request){
        // $a = $request->a;'
        // $b = $request->b;
        //                 $query->whereBetween('tanggal', [$a, $b])->get();