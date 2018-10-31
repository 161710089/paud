<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_pendapat_user;
use Session;
class tb_m_pendapatUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sekolahs =  tb_s_sekolah::all();
          $tb_m_pendapat_user =  tb_m_pendapat_user::orderBy('created_at','desc')->get();
          
        return view('pendapat_user.index',compact('sekolahs','tb_m_pendapat_user'));
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
          Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Artikel Berhasil Dibuat"
            ]);
            

         $request->validate([
            
        'pendapat' => 'required|min:3',
        'id_user' => 'required',
        

           ]);
        $tb_m_artikel = new tb_m_artikel;
        $tb_m_artikel->pendapat = $request->pendapat;
        $tb_m_artikel->id_user = $request->id_user;
        

        $tb_m_artikel->save();
        
        
        return redirect()->route('artikel.index');
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
          Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Merubah Komentar"
            ]);
            

         $request->validate([
            
        'pendapat' => 'required|min:3',
        'id_user' => 'required',
        

           ]);
        $tb_m_pendapat_user = tb_m_pendapat_user::findOrFail($id);
        $tb_m_pendapat_user->pendapat = $request->pendapat;
        $tb_m_pendapat_user->id_user = $request->id_user;
        $tb_m_pendapat_user->status = $request->status;
                

        $tb_m_pendapat_user->save();
        
        
        return redirect()->route('komentar-web');
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

    public function Publish($id)
    {
        $tb_m_pendapat_user = tb_m_pendapat_user::find($id);
        if ($tb_m_pendapat_user->status === 1) {
            $tb_m_pendapat_user->status = 0;
        } else {
            $tb_m_pendapat_user->status= 1;
        }
        $tb_m_pendapat_user->save();
        return redirect()->route('pendapat_user.index');
    }
}
