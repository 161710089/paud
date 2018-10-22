<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_gallery;
use App\tb_s_sekolah;
use App\tb_m_kategori_gallery;
use File;
use Session;
class tb_m_galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sekolahs =  tb_s_sekolah::all();
          $tb_m_gallery=tb_m_gallery::all();
       
        return view('gallery.index',compact('tb_m_event','sekolahs','tb_m_gallery'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $sekolahs =  tb_s_sekolah::all();
          $tb_m_gallery=tb_m_gallery::all();
          $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
       
        return view('gallery.create',compact('tb_m_event','sekolahs','tb_m_gallery','tb_m_kategori_gallery'));

 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
            

         $tb_m_gallery = new tb_m_gallery;
        $tb_m_gallery->judul = $request->judul;
        $tb_m_gallery->id_kategori_gallery = $request->id_kategori_gallery;
        
        $tb_m_gallery->foto = $request->foto;
        
        $tb_m_gallery->save();
        if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotogallery/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_gallery->foto =$filename;

            
            Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Membuat $tb_m_gallery->judul"
        ]);

        $tb_m_gallery->save();
        }
    

        return redirect()->route('gallery.index');
    
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
           $tb_m_gallery = tb_m_gallery::findOrFail($id);
           $tb_m_kategori_gallery=tb_m_kategori_gallery::all();
           $selectkategoriGallery = tb_m_gallery::findOrFail($tb_m_gallery->id)->id_kategori_gallery;
        return view('gallery.edit',compact('tb_m_gallery','sekolahs','tb_m_kategori_gallery','selectkategoriGallery'));  
  
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
           ]);
        $tb_m_gallery = tb_m_gallery::findOrFail($id);
        $tb_m_gallery->judul = $request->judul;
        $tb_m_gallery->foto = $request->foto;
        $tb_m_gallery->id_kategori_gallery = $request->id_kategori_gallery;


        $tb_m_gallery->save();

        if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotogallery';
            // memindahkan file ke folder public//img/Fotogallery
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_gallery->foto) {
                $old_foto = $tb_m_gallery->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotogallery'
                . DIRECTORY_SEPARATOR . $tb_m_gallery->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_m_gallery->foto = $filename;

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_gallery->judul"
        ]);


            $tb_m_gallery->save();
        }
        
        
        
         return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tb_m_gallery = tb_m_gallery::findOrFail($id);
        $tb_m_gallery->delete();
        return redirect()->route('gallery.index')->with('success','Pengajar Deleted');
    }
    function deleteGalleryRecord($id){

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Gallery Berhasil Dihapus"
            ]);
            
        tb_m_gallery::where('id',$id)->delete();
    }
}
