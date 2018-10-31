<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_kategori_artikel;
use Session;
class tb_m_kategori_artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sekolahs =  tb_s_sekolah::all();
          $tb_m_kategori_artikel=tb_m_kategori_artikel::all();
       
        return view('kategori_artikel.index',compact('sekolahs','tb_m_kategori_artikel'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolahs =  tb_s_sekolah::all();
          $tb_m_kategori_artikel=tb_m_kategori_artikel::all();
       
        return view('kategori_artikel.create',compact('sekolahs','tb_m_kategori_artikel'));

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
            
            'kategori' => 'required|unique:tb_m_kategori_galleries',

           ]);
        $tb_m_kategori_artikel = new tb_m_kategori_artikel;
        $tb_m_kategori_artikel->kategori = $request->kategori;
        $tb_m_kategori_artikel->slug = str_slug($request->kategori,'-');
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Membuat $tb_m_kategori_artikel->judul"
        ]);


        $tb_m_kategori_artikel->save();
        
    

        return redirect()->route('kategori_artikel.index');
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
           $tb_m_kategori_artikel = tb_m_kategori_artikel::findOrFail($id);
        return view('kategori_artikel.edit',compact('tb_m_kategori_artikel','sekolahs'));  
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
        $tb_m_kategori_artikel = tb_m_kategori_artikel::findOrFail($id);
        $tb_m_kategori_artikel->kategori = $request->kategori;
        $tb_m_kategori_artikel->slug = str_slug($request->kategori,'-');
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_kategori_artikel->judul"
        ]);


        $tb_m_kategori_artikel->save();
        
        
         return redirect()->route('kategori_artikel.index');
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
    function deleteKategoriArtikelRecord($id){
Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"kategri Artikel Berhasil Dihapus"
            ]);
            

        tb_m_kategori_artikel::where('id',$id)->delete();
    }
}