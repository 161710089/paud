<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_history_about_pencapaian;
use Session;
class tb_m_history_about_pencapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            
            'pencapaian' => 'required|unique:tb_m_history_about_pencapaians',

           ]);
        $tb_m_history_about_pencapaian = new tb_m_history_about_pencapaian;
        $tb_m_history_about_pencapaian->pencapaian = $request->pencapaian;
        $tb_m_history_about_pencapaian->id_history_about = $request->id_history_about;
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Membuat $tb_m_history_about_pencapaian->pencapaian"
        ]);


        $tb_m_history_about_pencapaian->save();
        
    

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
        //
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
        //
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
}
