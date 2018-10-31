<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_s_sekolah;
use App\tb_s_widget;
class tb_s_widgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $sekolahs =tb_s_sekolah::all();
            $tb_s_widget = tb_s_widget::all();
       
        return view('widget.index',compact('sekolahs','tb_s_widget'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $sekolahs =tb_s_sekolah::all();
            $tb_s_widget = tb_s_widget::all();
       
        return view('widget.create',compact('sekolahs','tb_s_widget'));    }

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
            "message"=>"Widget Berhasil Dibuat"
            ]);
            
            
        $request->validate([
            
            'status_livechat' => 'required',
            
        
           ]);

        $tb_s_widget = new tb_s_widget;
        $tb_s_widget->status_livechat = $request->status_livechat;
        $tb_s_widget->save();
    

        

        return redirect()->route('widget.index');
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

     public function Publish($id)
    {
        $tb_s_widget = tb_s_widget::find($id);
        if ($tb_s_widget->status_livechat === 1) {
            $tb_s_widget->status_livechat = 0;
        } else {
            $tb_s_widget->status_livechat= 1;
        }
        $tb_s_widget->save();
        return redirect()->route('widget.index');
    }
}
