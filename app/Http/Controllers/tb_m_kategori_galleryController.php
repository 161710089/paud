<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_kategori_gallery;
use App\tb_s_sekolah;
use Session;
class tb_m_kategori_galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sekolahs =  tb_s_sekolah::all();
          $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
       
        return view('kategori_gallery.index',compact('tb_m_event','sekolahs','tb_m_kategori_gallery'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolahs =  tb_s_sekolah::all();
          $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
       
        return view('kategori_gallery.create',compact('tb_m_event','sekolahs','tb_m_kategori_gallery'));

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
            "message"=>"Kategori Gallery Berhasil Dibuat"
            ]);
            
        $request->validate([
            
            'kategori' => 'required|unique:tb_m_kategori_galleries',
           ]);
        $tb_m_kategori_gallery = new tb_m_kategori_gallery;
        $tb_m_kategori_gallery->kategori = $request->kategori;

        $tb_m_kategori_gallery->save();
        
    

        return redirect()->route('kategori_gallery.index');
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
           $sekolahs =  tb_s_sekolah::all();
           $tb_m_kategori_gallery = tb_m_kategori_gallery::findOrFail($id);
        return view('kategori_gallery.edit',compact('tb_m_kategori_gallery','sekolahs'));  
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
            
            'kategori' => 'required',
           ]);
        $tb_m_kategori_gallery = tb_m_kategori_gallery::findOrFail($id);
        $tb_m_kategori_gallery->kategori = $request->kategori;

        $tb_m_kategori_gallery->save();
        
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_kategori_gallery->judul"
        ]);


         return redirect()->route('kategori_gallery.index');
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
    function deleteKategoriGalleryRecord($id){
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Kategori Gallery Berhasil Dihapus"
            ]);
            
        tb_m_kategori_gallery::where('id',$id)->delete();
    }
}
