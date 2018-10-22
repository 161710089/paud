<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_s_sosmed;
use App\tb_s_map;
use App\tb_s_contact_us;
use File;
use Session;
class tb_s_sekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sekolahs =tb_s_sekolah::all();
         $tb_s_sekolah =  tb_s_sekolah::all();
         $tb_s_contact_us =tb_s_contact_us::orderBy('created_at','desc')->paginate(4);
        
        return view('sekolah.index',compact('tb_s_sekolah','sekolahs','tb_s_contact_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
            
             $sekolahs =tb_s_sekolah::all();
             $tb_s_sekolah = tb_s_sekolah::all();
    
        return view('sekolah.create',compact('tb_s_sekolah','sekolahs'));
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
            "message"=>"Sekolah Berhasil Dibuat"
            ]);
            
            
        $request->validate([
            
            'logo' => 'required|max:255',
            'nama_sekolah' => 'required|max:255|unique:tb_s_sekolahs',
            'waktu_buka' => 'required|max:255',
            'hari_buka' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telepon' => 'required|max:255',
        
        
           ]);

        $tb_s_sosmed = new tb_s_sosmed;
        $tb_s_sosmed->Facebook = $request->Facebook;
        $tb_s_sosmed->Instagram = $request->Instagram;
        $tb_s_sosmed->Twitter = $request->Twitter;
        $tb_s_sosmed->Email = $request->Email;
        $tb_s_sosmed->save();
    

        $tb_s_map = new tb_s_map;
        $tb_s_map->garis_bujur = $request->garis_bujur;
        $tb_s_map->garis_lintang = $request->garis_lintang;
        $tb_s_map->save();
    
        $tb_s_sekolah = new tb_s_sekolah;
        $tb_s_sekolah->logo = $request->logo;
        $tb_s_sekolah->nama_sekolah = $request->nama_sekolah;
        $tb_s_sekolah->waktu_buka = $request->waktu_buka;
        $tb_s_sekolah->hari_buka = $request->hari_buka;
        $tb_s_sekolah->alamat = $request->alamat;
        $tb_s_sekolah->no_telepon = $request->no_telepon;
        $tb_s_sekolah->id_sosmed = $tb_s_sosmed->id;
        $tb_s_sekolah->id_map = $tb_s_map->id;
        
       
        if ($request->hasFile('logo')) {
            $file =$request->file('logo');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/FotoSekolah/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_s_sekolah->logo =$filename;

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Membuat $tb_m_siswa->nama_sekolah"
        ]);

            
        $tb_s_sekolah->save();
        }
    

        return redirect()->route('sekolah.index');
     
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
        $tb_s_sekolah = tb_s_sekolah::findOrFail($id);
        return view('sekolah.show',compact('tb_s_sekolah','sekolahs'));  

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
           $tb_s_sekolah = tb_s_sekolah::findOrFail($id);
        return view('sekolah.edit',compact('tb_s_sekolah','sekolahs'));  

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
            
            'logo' => 'required|max:255',
            'nama_sekolah' => 'required|max:255',
            'waktu_buka' => 'required|max:255',
            'hari_buka' => 'required|max:255',
            'alamat' => 'required|max:255',
            
           ]);
        $tb_s_sekolah = tb_s_sekolah::findOrFail($id);
        $tb_s_sekolah->logo = $request->logo;
        $tb_s_sekolah->nama_sekolah = $request->nama_sekolah;
        $tb_s_sekolah->waktu_buka = $request->waktu_buka;
        $tb_s_sekolah->hari_buka = $request->hari_buka;
        $tb_s_sekolah->alamat = $request->alamat;
        
        $tb_s_sekolah->save();
       if ($request->hasFile('logo')) {
            // menambil logo yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_logo = $request->file('logo');
            $extension = $uploaded_logo->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/FotoSekolah';
            // memindahkan file ke folder public//img/FotoSekolah
            $uploaded_logo->move($destinationPath, $filename);
            // hapus logo lama, jika ada
            if ($tb_s_sekolah->logo) {
                $old_logo = $tb_s_sekolah->logo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/FotoSekolah'
                . DIRECTORY_SEPARATOR . $tb_s_sekolah->logo;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_s_sekolah->logo = $filename;
            $tb_s_sekolah->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_s_sekolah->nama_sekolah"
        ]);

        $tb_s_sekolah->save();



        $tb_s_sosmed = tb_s_sosmed::findOrFail($tb_s_sekolah->id_sosmed);

        $tb_s_sosmed->Facebook = $request->Facebook;
        $tb_s_sosmed->Twitter = $request->Twitter;
        $tb_s_sosmed->Instagram = $request->Instagram;
        $tb_s_sosmed->Email = $request->Email;
        $tb_s_sosmed->save();

        $tb_s_map = tb_s_map::findOrFail($tb_s_sekolah->id_map);
        
        $tb_s_map->garis_bujur = $request->garis_bujur;
        $tb_s_map->garis_lintang = $request->garis_lintang;
        $tb_s_map->save();


         return redirect()->route('sekolah.index');
        
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function deleteSekolahRecord($id){
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Sekolah Berhasil Dihapus"
            ]);
            
        tb_s_sekolah::where('id',$id)->delete();
    }

    public function destroy($id)
    {
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Sekolah Berhasil Dihapus"
            ]);

        $tb_s_sekolah = tb_s_sekolah::findOrFail($id);
        $tb_s_sekolah->delete();

        
        return redirect()->route('sekolah.index');      
    }

}
