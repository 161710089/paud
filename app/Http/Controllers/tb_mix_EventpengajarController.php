<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_pengajar;
class tb_mix_EventpengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'ttl' => 'required|max:255',
            'agama' => 'required|max:255',
            'kewarganegaraan' => 'required',
            'pendidikan' => 'required|max:255',
            'alamat_no_telepon' => 'required|max:255',
            'foto' => 'required',
                  
      
        ]);

        $tb_m_pengajar = new tb_m_pengajar;
        $tb_m_pengajar->nama = $request->nama;
        $tb_m_pengajar->jenis_kelamin = $request->jenis_kelamin;
        $tb_m_pengajar->ttl = $request->ttl;
        $tb_m_pengajar->agama = $request->agama;
        $tb_m_pengajar->kewarganegaraan = $request->kewarganegaraan;
        $tb_m_pengajar->pendidikan = $request->pendidikan;
        $tb_m_pengajar->alamat_no_telepon = $request->alamat_no_telepon;
        $tb_m_pengajar->foto = $request->foto;
        $tb_m_pengajar->id_mapel = $request->id_mapel;
        
        $tb_m_pengajar->save();
        if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotopengajar/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_pengajar->foto =$filename;

            
        $tb_m_pengajar->save();
        }
    

        return redirect()->route('event.create');
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
