<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_pendapat;
use App\tb_s_sekolah;
use Session;
use App\tb_s_sosmed;
use File; 
class tb_m_pendapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sekolahs =  tb_s_sekolah::all();
          $tb_m_pendapat =  tb_m_pendapat::orderBy('created_at','desc')->get();
          
        return view('pendapat.index',compact('sekolahs','tb_m_pendapat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $sekolahs =  tb_s_sekolah::all();
          $tb_m_pendapat =  tb_m_pendapat::orderBy('created_at','desc')->get();
          
        return view('pendapat.create',compact('sekolahs','tb_m_pendapat'));
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
            'pendapat' => 'required',
            'foto' => 'required',
                  
      
        ]);

        $tb_s_sosmed = new tb_s_sosmed;
        $tb_s_sosmed->Facebook = $request->Facebook;
        $tb_s_sosmed->Instagram = $request->Instagram;
        $tb_s_sosmed->Twitter = $request->Twitter;
        $tb_s_sosmed->save();
    

        $tb_m_pendapat = new tb_m_pendapat;
        $tb_m_pendapat->nama = $request->nama;
        $tb_m_pendapat->pendapat = $request->pendapat;
        $tb_m_pendapat->foto = $request->foto;
        $tb_m_pendapat->id_sosmed = $tb_s_sosmed->id;
        
        $tb_m_pendapat->save();
        if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotopendapat/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_pendapat->foto =$filename;

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Membuat Pendapat $tb_m_pendapat->nama"
        ]);

        $tb_m_pendapat->save();
        }
    

        return redirect()->route('pendapat.index');
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
            $tb_m_pendapat = tb_m_pendapat::findOrFail($id);
        return view('pendapat.show',compact('tb_m_pendapat','sekolahs'));
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
        $tb_m_pendapat = tb_m_pendapat::findOrFail($id);
         return view('pendapat.edit',compact('tb_m_pendapat','sekolahs'));
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
        $this->validate($request, [
        
            'nama' => 'required|max:255',
            'pendapat' => 'required|max:255',
            'foto' => 'required',
           
        ]);

        $tb_m_pendapat = tb_m_pendapat::findOrFail($id);
        
        
        $tb_m_pendapat->nama = $request->nama;
        $tb_m_pendapat->pendapat = $request->pendapat;
        $tb_m_pendapat->foto = $request->foto; 
        

       if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotopendapat';
            // memindahkan file ke folder public//img/Fotopendapat
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_pendapat->foto) {
                $old_foto = $tb_m_pendapat->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotopendapat'
                . DIRECTORY_SEPARATOR . $tb_m_pendapat->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_m_pendapat->foto = $filename;
            $tb_m_pendapat->save();
        }


        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan Pendapat $tb_m_pendapat->nama"
        ]);

        $tb_m_pendapat->save();
    
        
         $tb_s_sosmed = tb_s_sosmed::findOrFail($tb_m_pendapat->id_sosmed);

        $tb_s_sosmed->Facebook = $request->Facebook;
        $tb_s_sosmed->Twitter = $request->Twitter;
        $tb_s_sosmed->Instagram = $request->Instagram;
        $tb_s_sosmed->save();
   
        
        
        
        
        return redirect()->route('pendapat.index');
        
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

    function deletePendapatRecord($id){
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Pendapat Berhasil Dihapus"
            ]);
            
        tb_m_pendapat::where('id',$id)->delete();
    }
}
