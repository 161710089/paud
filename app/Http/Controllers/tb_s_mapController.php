<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_map;
use App\tb_s_sekolah;
class tb_s_mapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sekolahs =tb_s_sekolah::all();
         $tb_s_map =  tb_s_map::all();
        
        return view('maps.index',compact('tb_s_map','sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $sekolahs =tb_s_sekolah::all();
         $tb_s_map =  tb_s_map::all();
        
        return view('maps.index',compact('tb_s_map','sekolahs'));
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
            
            'nama_tempat' => 'required|max:255',
            'garis_lintang' => 'required|max:255|unique:tb_s_sekolahs',
            'garis_bujur' => 'required|max:255',
            
           ]);
        $tb_s_sekolah = new tb_s_sekolah;
        $tb_s_sekolah->nama_tempat = $request->nama_tempat;
        $tb_s_sekolah->garis_lintang = $request->garis_lintang;
        $tb_s_sekolah->garis_bujur = $request->garis_bujur;
            
        $tb_s_sekolah->save();
        
    

        return redirect()->route('maps.index');
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
           $tb_s_map = tb_s_map::findOrFail($id);
        return view('maps.edit',compact('tb_s_map','sekolahs'));  
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
            
            'nama_tempat' => 'required|max:255',
            'garis_lintang' => 'required|max:255',
            'garis_bujur' => 'required|max:255',
            
           ]);
        $tb_s_sekolah = tb_s_sekolah::findOrFail($id);
        $tb_s_sekolah->nama_tempat = $request->nama_tempat;
        $tb_s_sekolah->garis_lintang = $request->garis_lintang;
        $tb_s_sekolah->garis_bujur = $request->garis_bujur;
       
       
        $tb_s_sekolah->save();

         return redirect()->route('maps.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tb_s_sekolah = tb_s_sekolah::findOrFail($id);
        $tb_s_sekolah->delete();
        return redirect()->route('maps.index');      
    }
}
