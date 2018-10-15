<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_level;
use App\tb_m_siswa;
use App\tb_m_status;
use App\tb_m_program;

class tb_m_pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sekolahs =tb_s_sekolah::all();
        return view('pembayaran.index',compact('sekolahs'));
    }

     public function status_siswa($id_siswa)
    {     
        $sekolahs =tb_s_sekolah::all();
         return tb_m_status::join('tb_m_siswa','tb_m_siswa.id','=','tb_m_status.id_siswa')
                           ->join('tb_m_kelas','tb_m_kelas.id','=','tb_m_status.id_kelas')
                           ->join('tb_m_waktu','tb_m_waktu.id','=','tb_m_kelas.id_waktu') 
                           ->join('tb_m_shifs','tb_m_shifs.id','=','tb_m_kelas.id_shifs');
        return view('pembayaran.index',compact('sekolahs'));
    }

public function pembayaran($viewName,$id_siswa)
{
    $staus =$this->status_siswa($id_siswa)->first();

    return view($viewName)->with('id_siswa',$id_siswa);
}

public function lihatPembayaranSiswa(Request $request)
{
    $id_siswa = $request->id_siswa;
    return $this->pembayaran('pembayaran.index',$id_siswa);
}

   
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
