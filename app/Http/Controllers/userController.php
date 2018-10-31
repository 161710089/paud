<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_absensi;
use App\tb_s_sekolah;
use App\tb_m_siswa;
use App\tb_m_buy_ticket;
use Auth;
use App\tb_m_pendapat_user;
use Session;
use Carbon\Carbon;
class userController extends Controller
{
    public function absensi(Request $request)
    {
        
        $a = $request->a;
        $b = $request->b;
        
        $sekolahs=tb_s_sekolah::all();
		$tb_m_absensi = tb_m_absensi::whereHas('tb_m_siswa',function($query) use ($request){
                        $query->where('id_user',Auth::user()->id);
                       })->whereMonth('tanggal',$request->a)

                            ->orderBy('tanggal', 'asc')
                            ->paginate(2);
        $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
        $awalbulan = new Carbon('first day of this month');
    
                
                              
        
        return view('user.absensi', compact('tb_s_sekolah','tb_m_absensi', 'a','b','sekolahs','tb_m_siswa','awalbulan'));
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
    public function pendapat_user(Request $request)
    {
        $sekolahs =tb_s_sekolah::all();
        $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
        $tb_m_pendapat_user= tb_m_pendapat_user::where('id_user',Auth::user()->id)->orderBy('created_at','desc')->paginate(8);

        return view('user.pendapat_user', compact('tb_m_siswa','sekolahs','tb_m_pendapat_user'));
    }

    public function store(Request $request)
    {
          Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Kometar Berhasil Dikirim"
            ]);
            

         $request->validate([
            
        'pendapat' => 'required|min:3',
        'id_user' => 'required',
        

           ]);
        $tb_m_pendapat_user = new tb_m_pendapat_user;
        $tb_m_pendapat_user->pendapat = $request->pendapat;
        $tb_m_pendapat_user->id_user = $request->id_user;
        $tb_m_pendapat_user->status = $request->status;
                

        $tb_m_pendapat_user->save();
        
        
        return redirect()->route('komentar-web');
    }


    function deletePendapatUserRecord($id){
        tb_m_pendapat_user::where('id',$id)->delete();
    }

    public function edit($id)
    {
          $sekolahs =  tb_s_sekolah::all();
          $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
          $tb_m_pendapat_user = tb_m_pendapat_user::findOrFail($id);
      
        return view('user.edit_pendapat_user',compact('sekolahs','tb_m_pendapat_user','tb_m_siswa'));
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