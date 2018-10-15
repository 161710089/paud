<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_pengajar;
use App\tb_s_sekolah;
use App\tb_m_mata_pelajaran;
use File;
use Session;
class tb_m_pengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tb_m_pengajar = tb_m_pengajar::where('nama','like','%'.$search.'%')
                            ->orderBy('id')->paginate(9);
        $sekolahs =tb_s_sekolah::all();
       
        $jumlahguru= tb_m_pengajar::all()->count();
       
      return view('pengajar.index',compact('tb_m_pengajar','sekolahs','jumlahguru'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $sekolahs =tb_s_sekolah::all();
             $tb_m_mata_pelajaran = tb_m_mata_pelajaran::all();
             $tb_m_pengajar = tb_m_pengajar::all();
    
        return view('pengajar.create',compact('tb_m_mata_pelajaran','tb_m_pengajar','sekolahs'));
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
    

        return redirect()->route('pengajar.index');
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
            $tb_m_pengajar = tb_m_pengajar::findOrFail($id);
            $mata_pelajaran = tb_m_mata_pelajaran::all();
            $tb_m_mata_pelajaran = tb_m_mata_pelajaran::where('id_mapel','=',$mata_pelajaran);
            $selectmapel = tb_m_pengajar::findOrFail($tb_m_pengajar->id)->id_mapel;
        return view('pengajar.show',compact('tb_m_pengajar','mata_pelajaran','tb_m_mata_pelajaran','sekolahs','selectmapel'));
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
        $tb_m_pengajar = tb_m_pengajar::findOrFail($id);
        $tb_m_mata_pelajaran = tb_m_mata_pelajaran::all();
        $selectmapel = tb_m_pengajar::findOrFail($tb_m_pengajar->id)->id_mapel;
        return view('pengajar.edit',compact('tb_m_pengajar','tb_m_mata_pelajaran','selectmapel','sekolahs'));
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
            'jenis_kelamin' => 'required|max:255',
            'ttl' => 'required',
            'agama' => 'required|max:255',
            'kewarganegaraan' => 'required|max:11',
            'pendidikan' => 'max:255',
            'alamat_no_telepon' => 'max:255',
            'foto' => 'required',
            'id_mapel' => 'required|max:255',

        ]);

        $tb_m_pengajar = tb_m_pengajar::findOrFail($id);
        
        
        $tb_m_pengajar->nama = $request->nama;
        $tb_m_pengajar->jenis_kelamin = $request->jenis_kelamin;
        $tb_m_pengajar->agama = $request->agama;
        $tb_m_pengajar->ttl = $request->ttl;
        
        $tb_m_pengajar->kewarganegaraan = $request->kewarganegaraan;
        $tb_m_pengajar->pendidikan = $request->pendidikan;
        $tb_m_pengajar->alamat_no_telepon = $request->alamat_no_telepon;
        $tb_m_pengajar->foto = $request->foto;
        $tb_m_pengajar->id_mapel = $request->id_mapel;
        

       if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotopengajar';
            // memindahkan file ke folder public//img/Fotopengajar
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_pengajar->foto) {
                $old_foto = $tb_m_pengajar->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotopengajar'
                . DIRECTORY_SEPARATOR . $tb_m_pengajar->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_m_pengajar->foto = $filename;
            $tb_m_pengajar->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_pengajar->nama_lengkap"
        ]);

        $tb_m_pengajar->save();
    
           
        
        
        
        
        return redirect()->route('pengajar.index');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function deletePengajarRecord($id){
        tb_m_pengajar::where('id',$id)->delete();
    }

    public function destroy($id)
    {
                 $tb_m_pengajar = tb_m_pengajar::findOrFail($id);
        $tb_m_pengajar->delete();
        return redirect()->route('pengajar.index')->with('success','Pengajar Deleted');      
    }
}
