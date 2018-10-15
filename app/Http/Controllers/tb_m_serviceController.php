<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_service;
use File;
use Session;
class tb_m_serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $tb_m_service =  tb_m_service::all();
          $sekolahs =  tb_s_sekolah::all();
       
        return view('service.index',compact('tb_m_service','sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $sekolahs =tb_s_sekolah::all();
             $tb_m_service = tb_m_service::all();
             
        return view('service.create',compact('tb_m_service','sekolahs'));
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
            
            'judul' => 'required|max:255|unique:tb_m_services',
            'foto' => 'required|max:255',
            'deskripsi' => 'required',
            
           ]);
        $tb_m_service = new tb_m_service;
        $tb_m_service->judul = $request->judul;
        $tb_m_service->foto = $request->foto;
        $tb_m_service->deskripsi = $request->deskripsi;
            
            if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotoservice/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_service->foto =$filename;

            
        
        $tb_m_service->save();
        
    
                                            }
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $sekolahs =tb_s_sekolah::all();
            $tb_m_service = tb_m_service::findOrFail($id);
        return view('service.show',compact('tb_m_service','sekolahs'));   
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
            $tb_m_service = tb_m_service::findOrFail($id);
        return view('service.edit',compact('tb_m_service','sekolahs'));   
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
        $request->validate([
            
            'judul' => 'required|max:255',
            'foto' => 'required|max:255',
            'deskripsi' => 'required',
            
           ]);
        

        $tb_m_service = tb_m_service::findOrFail($id);
        $tb_m_service->judul = $request->judul;
        $tb_m_service->foto = $request->foto;
        $tb_m_service->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotoservice';
            // memindahkan file ke folder public//img/Fotoservice
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_service->foto) {
                $old_foto = $tb_m_service->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotoservice'
                . DIRECTORY_SEPARATOR . $tb_m_service->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
        $tb_m_service->foto = $filename;
        $tb_m_service->save();
            }
        return redirect()->route('service.index');
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
    function deleteServiceRecord($id){
        tb_m_service::where('id',$id)->delete();
    }
}
