<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\tb_s_sekolah;
use Auth;


class tb_s_ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sekolahs =  tb_s_sekolah::all();
            $user = user::all();
        return view('profile.index',compact('sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $sekolahs =tb_s_sekolah::all();
             $tb_s_profile = user::all();
       
        return view('siswa.create',compact('tb_s_profile','sekolahs'));
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
        $sekolahs =tb_s_sekolah::all();
        $tb_m_siswa = tb_m_siswa::findOrFail($id);
        $tb_m_ortu = tb_m_ortu::all();
        $selectortu = tb_m_siswa::findOrFail($tb_m_siswa->id)->id_otru;
        return view('siswa.edit',compact('tb_m_siswa','tb_m_ortu','selectortu','sekolahs'));  }

    

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
