<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tb_m_ortuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $tb_m_ortu =  tb_m_ortu::all();
          $tb_s_sekolah =  tb_s_sekolah::all();
       
        return view('ortu.index',compact('tb_m_ortu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $tb_m_ortu = tb_m_ortu::all();
    
        return view('ortu.create',compact('tb_m_ortu'));
   
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
     
            'nama_ayah' => 'required|max:255',
            'ttl_ayah' => 'required|max:255',
            'agama_ayah' => 'required|max:255',
            'kewarganegaraan_ayah' => 'required',
            'nik_ayah' => 'required|max:11',
            'pendidikan_ayah' => 'required|max:255',
            'pekerjaan_ayah' => 'required|max:255',
            'penghasilan_ayah' => 'required|max:255',
            'alamat_no_telepon_ayah' => 'required|max:255',
         
            'ttl_ibu' => 'required|max:255',
            'agama_ibu' => 'required|max:255',
            'kewarganegaraan_ibu' => 'required',
            'nik_ibu' => 'required|max:11',
            'pendidikan_ibu' => 'required|max:255',
            'pekerjaan_ibu' => 'required|max:255',
            'penghasilan_ibu' => 'required|max:255',
            'alamat_no_telepon_ibu' => 'required|max:255',
            'provinsi_ibu' => 'required|max:255',
  
  ]);
        $tb_m_ortu = new tb_m_ortu;
        $tb_m_ortu->nama_ayah = $request->nama_ayah;
        $tb_m_ortu->ttl_ayah = $request->ttl_ayah;
        $tb_m_ortu->agama_ayah = $request->agama_ayah;
        $tb_m_ortu->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
        $tb_m_ortu->nik_ayah = $request->nik_ayah;
        $tb_m_ortu->pendidikan_ayah = $request->pendidikan_ayah;
        $tb_m_ortu->pekerjaan_ayah = $request->pekerjaan_ayah;
        $tb_m_ortu->penghasilan_ayah = $request->penghasilan_ayah;
        $tb_m_ortu->alamat_no_telepon_ayah = $request->alamat_no_telepon_ayah;
        $tb_m_ortu->nama_ibu = $request->nama_ibu;
        $tb_m_ortu->ttl_ibu = $request->ttl_ibu;
        $tb_m_ortu->agama_ibu = $request->agama_ibu;
        $tb_m_ortu->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
        $tb_m_ortu->nik_ibu = $request->nik_ibu;
        $tb_m_ortu->pendidikan_ibu = $request->pendidikan_ibu;
        $tb_m_ortu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $tb_m_ortu->penghasilan_ibu = $request->penghasilan_ibu;
        $tb_m_ortu->alamat_no_telepon_ibu = $request->alamat_no_telepon_ibu;
                     
                       $tb_m_ortu->save();
    

        return redirect()->route('ortu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                 $tb_m_ortu = tb_m_ortu::findOrFail($id);
        return view('ortu.show',compact('tb_m_ortu'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tb_m_ortu = tb_m_ortu::findOrFail($id);
        return view('ortu.edit',compact('tb_m_ortu'));  

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
     
            'nama_ayah' => 'required|max:255',
            'ttl_ayah' => 'required|max:255',
            'agama_ayah' => 'required|max:255',
            'kewarganegaraan_ayah' => 'required',
            'nik_ayah' => 'required|max:11',
            'pendidikan_ayah' => 'required|max:255',
            'pekerjaan_ayah' => 'required|max:255',
            'penghasilan_ayah' => 'required|max:255',
            'alamat_no_telepon_ayah' => 'required|max:255',
         
            'ttl_ibu' => 'required|max:255',
            'agama_ibu' => 'required|max:255',
            'kewarganegaraan_ibu' => 'required',
            'nik_ibu' => 'required|max:11',
            'pendidikan_ibu' => 'required|max:255',
            'pekerjaan_ibu' => 'required|max:255',
            'penghasilan_ibu' => 'required|max:255',
            'alamat_no_telepon_ibu' => 'required|max:255',
            'provinsi_ibu' => 'required|max:255',
  
  ]);
        $tb_m_ortu = tb_m_ortu::findOrFail($id);
        $tb_m_ortu->nama_ayah = $request->nama_ayah;
        $tb_m_ortu->ttl_ayah = $request->ttl_ayah;
        $tb_m_ortu->agama_ayah = $request->agama_ayah;
        $tb_m_ortu->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
        $tb_m_ortu->nik_ayah = $request->nik_ayah;
        $tb_m_ortu->pendidikan_ayah = $request->pendidikan_ayah;
        $tb_m_ortu->pekerjaan_ayah = $request->pekerjaan_ayah;
        $tb_m_ortu->penghasilan_ayah = $request->penghasilan_ayah;
        $tb_m_ortu->alamat_no_telepon_ayah = $request->alamat_no_telepon_ayah;
        $tb_m_ortu->nama_ibu = $request->nama_ibu;
        $tb_m_ortu->ttl_ibu = $request->ttl_ibu;
        $tb_m_ortu->agama_ibu = $request->agama_ibu;
        $tb_m_ortu->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
        $tb_m_ortu->nik_ibu = $request->nik_ibu;
        $tb_m_ortu->pendidikan_ibu = $request->pendidikan_ibu;
        $tb_m_ortu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $tb_m_ortu->penghasilan_ibu = $request->penghasilan_ibu;
        $tb_m_ortu->alamat_no_telepon_ibu = $request->alamat_no_telepon_ibu;
                     
                       $tb_m_ortu->save();
    

        return redirect()->route('ortu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tb_m_ortu = tb_m_ortu::findOrFail($id);
        $tb_m_ortu->delete();
        return redirect()->route('ortu.index');      }

    }

