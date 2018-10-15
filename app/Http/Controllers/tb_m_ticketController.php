<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_ticket;
use App\tb_s_sekolah;
use App\tb_m_event;
use Auth;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\tb_m_ticketException;
use App\tb_m_buy_ticket;
class tb_m_ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
          $tb_m_ticket =  tb_m_ticket::all();
          $sekolahs =  tb_s_sekolah::all();
            
                return view('ticket.index',compact('tb_m_ticket','sekolahs','bookingticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $tb_m_ticket = tb_m_ticket::all();
             $sekolahs=tb_s_sekolah::all();
             $tb_m_event=tb_m_event::all();
        return view('ticket.create',compact('tb_m_ticket','sekolahs','tb_m_event'));
   
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
     
            'id_event' => 'required|max:255',
            'jumlah_tiket_tersedia' => 'required|max:11',
            'tersedia_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'harga' => 'required|max:11',
            
            
                                ]);

        $tb_m_ticket = new tb_m_ticket;
        $tb_m_ticket->id_event = $request->id_event;
        $tb_m_ticket->jumlah_tiket_tersedia = $request->jumlah_tiket_tersedia;
        $tb_m_ticket->tersedia_tanggal = $request->tersedia_tanggal;
        $tb_m_ticket->sampai_tanggal = $request->sampai_tanggal;
        $tb_m_ticket->harga = $request->harga;
                     
        $tb_m_ticket->save();
    

        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $sekolahs=tb_s_sekolah::all();
        $tb_m_ticket = tb_m_ticket::findOrFail($id);
        $bookingticket=tb_m_buy_ticket::where('id_ticket',$tb_m_ticket->id)->get()->count();
        return view('ticket.show',compact('sekolahs','tb_m_ticket','bookingticket'));
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolahs=tb_s_sekolah::all();
        $tb_m_ticket = tb_m_ticket::findOrFail($id);
        $tb_m_event = tb_m_event::all();
        $selectevent = tb_m_ticket::findOrFail($tb_m_ticket->id)->id_event;
        return view('ticket.edit',compact('tb_m_ticket','tb_m_event','selectevent','sekolahs'));  

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
     
            'id_event' => 'required|max:255',
            'jumlah_tiket_tersedia' => 'required|max:11',
            'tersedia_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'harga' => 'required|max:11',
            
            
                                ]);

        $tb_m_ticket = tb_m_ticket::findOrFail($id);
        $tb_m_ticket->id_event = $request->id_event;
        $tb_m_ticket->jumlah_tiket_tersedia = $request->jumlah_tiket_tersedia;
        $tb_m_ticket->tersedia_tanggal = $request->tersedia_tanggal;
        $tb_m_ticket->sampai_tanggal = $request->sampai_tanggal;
        $tb_m_ticket->harga = $request->harga;
                     
        $tb_m_ticket->save();
                  
                       $tb_m_ticket->save();
    

        return redirect()->route('ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tb_m_ticket = tb_m_ticket::findOrFail($id);
        $tb_m_ticket->delete();
        return redirect()->route('ticket.index');      
    }

    public function buy($id)
    {
        try {
            $tb_m_ticket = tb_m_ticket::findOrFail($id);
            Auth::user()->buy($tb_m_ticket);
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Membeli Tiket $tb_m_ticket->id_event"
            ]);
        }   catch (tb_m_ticketException $e) {
            Session::flash("flash_notification", [
            "level" => "danger",
            "message" => $e->getMessage()
            ]);
            } 
            catch (ModelNotFoundException $e) {
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Event tidak ditemukan."
            ]);
        }
        return redirect('user/tiket');
    }

        function deleteTicketRecord($id){
        tb_m_ticket::where('id',$id)->delete();
    }

    }
