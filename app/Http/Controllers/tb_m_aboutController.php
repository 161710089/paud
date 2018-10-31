<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_about;
use App\tb_s_sekolah;
use File;
use Session;
use App\tb_m_history_about;
use App\tb_m_history_about_pencapaian;

class tb_m_aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
          $tb_m_history_about_pencapaian=tb_m_history_about_pencapaian::all();
          $tb_m_history_about=tb_m_history_about::all();
          
          $tb_m_about =  tb_m_about::all();
          $sekolahs =  tb_s_sekolah::all();
       
        return view('about.index',compact('tb_m_about','sekolahs','tb_m_history_about_pencapaian','tb_m_history_about'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $tb_m_about =  tb_m_about::all();
          $sekolahs =  tb_s_sekolah::all();
       
        return view('about.create',compact('tb_m_about','sekolahs'));

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
            "message"=>"Berhasil Membuat About"
            ]);


         $request->validate([
            
        'foto' => 'required|image',
        'about' => 'required|min:30',
        

           ]);
         $tb_m_history_about = new tb_m_history_about;
        $tb_m_history_about->fotohistory = $request->fotohistory;
        $tb_m_history_about->history = $request->history;

        if ($request->hasFile('fotohistory')) {
            $file =$request->file('fotohistory');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotoabout/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_history_about->fotohistory =$filename;
        
        
            
       
        }
        $tb_m_history_about->save();
        
        $tb_m_about = new tb_m_about;
        $tb_m_about->foto = $request->foto;
        $tb_m_about->about = $request->about;
        $tb_m_about->id_history_about = $tb_m_history_about->id;
        
        

        $tb_m_about->save();
        if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotoabout/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_about->foto =$filename;
        
        
            
        $tb_m_about->save();
    
        }

        return redirect()->route('about.index');
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
        $tb_m_history_about = tb_m_about::findOrFail($id);
        return view('about.show',compact('tb_m_about','sekolahs'));  

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
         $tb_m_about = tb_m_about::findOrFail($id);
         
       
        return view('about.edit',compact('tb_m_about','sekolahs'));  

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
            
        'about' => 'required|min:30',
        'foto' => 'required|image',
          

           ]);
        $tb_m_about =tb_m_about::findOrFail($id);
        $tb_m_about->about = $request->about;
        $tb_m_about->foto = $request->foto;
       
       if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotoabout';
            // memindahkan file ke folder public//img/Fotoabout
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_about->foto) {
                $old_foto = $tb_m_about->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotoabout'
                . DIRECTORY_SEPARATOR . $tb_m_about->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_m_about->foto = $filename;
            $tb_m_about->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah About"
        ]);

        $tb_m_about->save();

        return redirect()->route('about.index');

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

    function deleteAboutRecord($id){
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"About Berhasil Dihapus"
            ]);
            
        tb_m_about::where('id',$id)->delete();
    }

    public function addMorePost(Request $request)
    {
        $rules = [];


        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('name') as $key => $value) {
                TagList::create(['name'=>$value]);
            }


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
