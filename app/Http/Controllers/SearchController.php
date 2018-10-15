<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_siswa;
use App\tb_s_sekolah;
class SearchController extends Controller
{
     public function nama_panggilan(Request $request)
    {
      $search = $request->get('search');
      $tb_m_siswa = tb_m_siswa::where('nama_panggilan','like','%'.$search.'%')
                            ->orderBy('id')->paginate(9);
       $sekolahs =tb_s_sekolah::all();
        
      return view('siswa.index',compact('tb_m_siswa','sekolahs'));

    }

	public function ttl(Request $request)
    {
      $search = $request->get('search');
      $tb_m_siswa = tb_m_siswa::where('ttl','like','%'.$search.'%')
                            ->orderBy('id')->paginate(9);
       $sekolahs =tb_s_sekolah::all();
        
      return view('siswa.index',compact('tb_m_siswa','sekolahs'));

	}
public function alamat(Request $request)
    {
      $search = $request->get('search');
      $tb_m_siswa = tb_m_siswa::where('alamat','like','%'.$search.'%')
                            ->orderBy('id')->paginate(9);
       $sekolahs =tb_s_sekolah::all();
        
      return view('siswa.index',compact('tb_m_siswa','sekolahs'));

  }

}
