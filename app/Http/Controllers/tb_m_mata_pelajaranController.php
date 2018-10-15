<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_m_mata_pelajaran;
use App\tb_m_pengajar;
use App\tb_s_contact_us;
use Session;
class tb_m_mata_pelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $tb_m_mata_pelajaran =  tb_m_mata_pelajaran::all();
          $sekolahs =  tb_s_sekolah::all();
          $jumlahguru =tb_m_pengajar::all()->count();
          $tb_s_contact_us =  tb_s_contact_us::orderBy('created_at','desc')->paginate(4);
          
        return view('mata_pelajaran.index',compact('tb_m_mata_pelajaran','sekolahs','jumlahguru','tb_s_contact_us'));
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
             
        return view('mata_pelajaran.create',compact('tb_m_mata_pelajaran','sekolahs'));
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
            
            'nama_mata_pelajaran' => 'required|max:255|unique:tb_m_mata_pelajarans',
           ]);
        $tb_m_mata_pelajaran = new tb_m_mata_pelajaran;
        $tb_m_mata_pelajaran->nama_mata_pelajaran = $request->nama_mata_pelajaran;

        $tb_m_mata_pelajaran->save();
        
    

        return redirect()->route('mata_pelajaran.index');
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
           $tb_m_mata_pelajaran = tb_m_mata_pelajaran::findOrFail($id);
        return view('mata_pelajaran.edit',compact('tb_m_mata_pelajaran','sekolahs'));  

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
            
            'nama_mata_pelajaran' => 'required|max:255|unique:tb_m_mata_pelajarans',
           ]);
        $tb_m_mata_pelajaran = tb_m_mata_pelajaran::findOrFail($id);
        $tb_m_mata_pelajaran->nama_mata_pelajaran = $request->nama_mata_pelajaran;

            $tb_m_mata_pelajaran->save();
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_mata_pelajaran->nama_mata_pelajaran"
        ]);

        $tb_m_mata_pelajaran->save();

         return redirect()->route('mata_pelajaran.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tb_m_mata_pelajaran = tb_m_mata_pelajaran::findOrFail($id);
        $tb_m_mata_pelajaran->delete();
        return redirect()->route('mata_pelajaran.index')->with('success','Pengajar Deleted');      
    }

   
    function deleteMapelRecord($id){
        tb_m_mata_pelajaran::where('id',$id)->delete();
    }

public function destroy1($id)
    {
    $tb_m_mata_pelajaran = tb_m_mata_pelajaran::find($id);
      if (auth()->user()->id !==$tb_m_mata_pelajaran->user_id)
      {
        return redirect('/tb_m_mata_pelajarans')->with('error', 'Unauthorized Page');
      }

      if ($tb_m_mata_pelajaran->cover_image != 'noimage.jpg')
      {
        Storage::delete('public/cover_images/'.$tb_m_mata_pelajaran->cover_image);
      }

      $tb_m_mata_pelajaran->delete();

      notify()->flash('Berhasil menghapus data !', 'success');
      return redirect('/tb_m_mata_pelajarans');
      
    }
 
}