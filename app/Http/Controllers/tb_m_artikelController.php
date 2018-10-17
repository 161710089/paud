<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_artikel;
use App\tb_s_sekolah;
use App\tb_m_kategori_artikel;
use File;
use Session;
class tb_m_artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $tb_m_artikel =  tb_m_artikel::all();
          $sekolahs =  tb_s_sekolah::all();
       
        return view('artikel.index',compact('tb_m_artikel','sekolahs'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $tb_m_artikel =  tb_m_artikel::all();
          $sekolahs =  tb_s_sekolah::all(); 
          $tb_m_kategori_artikel=tb_m_kategori_artikel::all();
       
       
        return view('artikel.create',compact('tb_m_artikel','sekolahs','tb_m_kategori_artikel'));
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
            
        'judul' => 'required|max:255|unique:tb_m_artikels',
        'foto' => 'required',
        'deskripsi' => 'required',
        'id_user' => 'required|max:255',
        

           ]);
        $tb_m_artikel = new tb_m_artikel;
        $tb_m_artikel->judul = $request->judul;
        $tb_m_artikel->foto = $request->foto;
        $tb_m_artikel->deskripsi = $request->deskripsi;
        $tb_m_artikel->slug = str_slug($request->judul,'-');
        $tb_m_artikel->id_user = $request->id_user;
        $tb_m_artikel->id_kategori_artikel = $request->id_kategori_artikel;
        

        $tb_m_artikel->save();
        if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotoartikel/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_artikel->foto =$filename;

            
        $tb_m_artikel->save();
    
        }
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
        $sekolahs =  tb_s_sekolah::all();
        $tb_m_artikel = tb_m_artikel::findOrFail($id);
        return view('artikel.show',compact('tb_m_artikel','sekolahs'));  

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
        $tb_m_artikel = tb_m_artikel::findOrFail($id);
         $tb_m_kategori_artikel=tb_m_kategori_artikel::all();
       
        return view('artikel.edit',compact('tb_m_artikel','sekolahs','tb_m_kategori_artikel'));  

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
        'foto' => 'required',
        'deskripsi' => 'required',
        'id_user' => 'required|max:255',
          

           ]);
        $tb_m_artikel =tb_m_artikel::findOrFail($id);
        $tb_m_artikel->judul = $request->judul;
        $tb_m_artikel->foto = $request->foto;
        $tb_m_artikel->deskripsi = $request->deskripsi;
        $tb_m_artikel->slug = str_slug($request->judul);
        $tb_m_artikel->id_user = $request->id_user;
        $tb_m_artikel->id_kategori_artikel = $request->id_kategori_artikel;
        

       if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotoartikel';
            // memindahkan file ke folder public//img/Fotoartikel
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_artikel->foto) {
                $old_foto = $tb_m_artikel->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotoartikel'
                . DIRECTORY_SEPARATOR . $tb_m_artikel->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_m_artikel->foto = $filename;
            $tb_m_artikel->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_artikel->nama_lengkap"
        ]);

        $tb_m_artikel->save();

        return redirect()->route('artikel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tb_m_artikel = tb_m_artikel::findOrFail($id);
        $tb_m_artikel->delete();
        return redirect()->route('artikel.index')->with('success','Pengajar Deleted');      

    }

    function deleteArtikelRecord($id){
        tb_m_artikel::where('id',$id)->delete();
    }
}
