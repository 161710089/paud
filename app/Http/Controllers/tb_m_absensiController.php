<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_absensi;
use App\tb_s_sekolah;
use App\tb_m_siswa;
use App\tb_m_pengajar;
use App\tb_m_mata_pelajaran;
use DB;
use Input;
use Auth;
use Carbon\Carbon;
use Excel;
use Session;
class tb_m_absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $a=$request->a;
        $b=$request->b;
        
        $tb_m_absensi = tb_m_absensi::whereHas('tb_m_siswa',function($query) use ($request){
                        $search = $request->get('search');
                        $query->where('nik','like','%'.$search.'%');
                                                                
                        })->whereBetween('tanggal', [$a, $b])

                            ->orderBy('tanggal', 'asc')
                            ->paginate(2);
          
          $sekolahs =  tb_s_sekolah::all();
          $jumlahguru= tb_m_pengajar::where('id')->count();
          $tb_m_siswa=tb_m_siswa::all();
          $start = new Carbon('first day of this month');
       
        return view('absensi.index',compact('tb_m_siswa','tb_m_absensi','sekolahs','months','jumlahguru','start'));
    }

    public function filtertanggal(Request $request)
    {
         $sekolahs =  tb_s_sekolah::all();
         
        $dari=$request->a;
        $sampai=$request->b;
$tb_m_absensi=tb_m_absensi::whereBetween('tanggal', [$dari, $sampai]);
return view('absensi.index',compact('tb_m_absensi','sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $search = $request->get('search');
      $tb_m_siswa = tb_m_siswa::where('nik','like','%'.$search.'%')
                            ->orWhere('nama_lengkap','like','%'.$search.'%')
                            ->orderBy('id')->paginate(6);
      $tb_m_absensi = tb_m_absensi::all();
      $sekolahs = tb_s_sekolah::all();
      $tb_m_pengajar =tb_m_pengajar::all();
    $tb_m_mata_pelajaran=tb_m_mata_pelajaran::all();
       $tanggal = Date("Y-m-d");
      return view('absensi.create',compact('tb_m_siswa','sekolahs','tb_m_absensi','tb_m_pengajar','tb_m_mata_pelajaran'));

     
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
     
            'id_siswa' => 'required|max:255',
            'id_pengajar' => 'required|max:255',
            'tanggal' => 'required|max:255|before:tomorrow',
            'jam_mulai' => 'required|max:255|before:jam_akhir',
            'jam_akhir' => 'required|max:255|after:jam_mulai',
            'selisih_jam' => 'required|max:255',
     
  ]);
         $tb_m_absensi = new tb_m_absensi;
        $tb_m_absensi->id_siswa = $request->id_siswa;
        $tb_m_absensi->id_pengajar = $request->id_pengajar;
        $tb_m_absensi->tanggal = $request->tanggal;
        $tb_m_absensi->jam_mulai = $request->jam_mulai;
        $tb_m_absensi->jam_akhir = $request->jam_akhir;
        $tb_m_absensi->selisih_jam = $request->selisih_jam;
                     

                     Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Membuat Absensi"
        ]);

                       $tb_m_absensi->save();
    

        return redirect()->route('absensi.index');
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
            $tb_m_absensi = tb_m_absensi::findOrFail($id);
            $sekolahs =  tb_s_sekolah::all();
            $tb_m_siswa =tb_m_siswa::all();   
            $selectsiswa = tb_m_absensi::findOrFail($tb_m_absensi->id)->id_siswa;
          $tb_m_pengajar =tb_m_pengajar::all();   
            $selectpengajar = tb_m_absensi::findOrFail($tb_m_absensi->id)->id_pengajar;
          
        return view('absensi.edit',compact('tb_m_absensi','sekolahs','tb_m_siswa','tb_m_pengajar','selectsiswa','selectpengajar'));  
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
     
            'id_siswa' => 'required|max:255',
            'id_pengajar' => 'required|max:255',
            'tanggal' => 'required|max:255|before:tomorrow',
            'jam_mulai' => 'required|max:255|before:jam_akhir',
            'jam_akhir' => 'required|max:255|after:jam_mulai',
            'selisih_jam' => 'required|max:255',
                   
     
  ]);

             $tb_m_absensi =tb_m_absensi::findOrFail($id);
        $tb_m_absensi->id_siswa = $request->id_siswa;
        $tb_m_absensi->id_pengajar = $request->id_pengajar;
        $tb_m_absensi->tanggal = $request->tanggal;
        $tb_m_absensi->jam_mulai = $request->jam_mulai;
        $tb_m_absensi->jam_akhir = $request->jam_akhir;
        $tb_m_absensi->selisih_jam = $request->selisih_jam;
                     

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah Absensi" 
        ]);

                       $tb_m_absensi->save();
    

        return redirect()->route('absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
 function deleteAbsensiRecord($id){
    Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Absensi Berhasil Dihapus"
            ]);
            
        tb_m_absensi::where('id',$id)->delete();
    }

    public function destroy($id)
    {
        $tb_m_absensi = tb_m_absensi::findOrFail($id);
        $tb_m_absensi->delete();
        return redirect()->route('absensi.index')->with('success','absensi Deleted');      
    }
    // public function dataAjax(Request $request)
    // {
    //     $searchquery = $request->searchquery;
    //     $data = tb_m_pengajar::where('nama','like','%'.$searchquery.'%')->get();


    //     return response()->json($data);
    // }

    public function autocomplete(Request $request)
    {
       
        $term =$request->term;
        $data = tb_m_pengajar::where('nama','like','%'.$term.'%')
        ->take(10)
        ->get();
        $results=array();
        foreach ($data as $key => $v) 
        {
            $results[]=['id'=>$v->id,'value'=>$v->id,'nama'=>$v->nama];
        }


        return response()->json($results);

    }

    // public function autocompleteNik(Request $request)
    // {
    //     $term =$request->term;
    //     $data = tb_m_siswa::where('nik','like','%'.$term.'%')
    //     ->take(10)
    //     ->get();
    //     $results=array();


    //     foreach ($data as $key => $v) 
    //     {
    //         $results[]=['id'=>$v->id,'value'=>$v->nik,'nama'=>$v->nama_lengkap];
    //     }

    //     return response()->json($results);
    // }
     
 
public function filterMapel($id)
{
$tb_m_pengajar =tb_m_pengajar::where('id_mapel', $id)->get();
if ($tb_m_pengajar->count() > 0){

    echo '<option class="form-select">Pilih Pengajar</option>';
foreach ($tb_m_pengajar as $data ) {
    echo '<option class="form-select" value="'.$data->id.'">'.$data->nama.'</option> ';
}


}else{
    echo '<option class="form-select" >Belum ada Pengajar</option>';
}

}

   public function filter($id)
    {
        $tb_m_pengajar = tb_m_pengajar::where('id', $id)->get();
        if($tb_m_pengajar->count() > 0){
             echo '<option class="form-select" >pilih tb_m_pengajar </option>';
            
            foreach ($tb_m_pengajar as $data) {
                echo '<option class="form-select" value="'.$data->id.'">'.$data->nama.'</option>';
            }
        
        }else{
            echo '<option class="form-control">Belum Ada Siswa</option>';
        }
    }


//  public function autocompleteNik(Request $request)
//     {
   
//         $tb_m_absensi = tb_m_absensi::whereHas('tb_m_siswa',function($query) use ($request){
//                          $term =$request->term;
//                         $query->where('nik','like','%'.$term.'%');
                                                                
//                         }) ->take(10)
//                            ->get();

//         $results=array();
//          foreach ($data as $key => $v) 
//         {
//             $results[]=['id'=>$v->id,'value'=>$v->nik,'nama'=>$v->nama_lengkap];
//         }

//          if($tb_m_absensi->count() > 0){
//             foreach ($tb_m_absensi as $data) {
              

//                 echo '<option class="form-control" value="'.$data->id_siswa.'" >'.$data->tb_m_siswa->nama.'</option>';
//             }
//         }else{
//             echo '<option class="form-control" >Belum Punya Akun</option>';
//         }
//         return response()->json($results);
     
    
// }



     public function mySearch(Request $request)
    {
        if($request->has('search')){
            $tb_m_absensi = tb_m_absensi::search($request->get('search'))->get();  
        }else{
            $tb_m_absensi = tb_m_absensi::get();
        }


        return view('my-search', compact('tb_m_absensi'));
    }

 public function autocompleteNik(Request $request)
    {

        $term =$request->term;
        $data = tb_m_siswa::where('nik','like','%'.$term.'%')
        ->take(8)
        ->get();
        $results=array();
        foreach ($data as $key => $v) 
        {
            $results[]=['id'=>$v->id,'value'=>$v->nik,'nama'=>$v->nama_lengkap];
        }


        return response()->json($results);
    }
public function exportPost(Request $request) { 

// validasi 
$this->validate($request, [ 
    'id_siswa'=>'required', ], [ 
    'id_siswa.required'=>'Anda belum memilih penulis. Pilih minimal 1 penulis.'
     ]);
$tb_m_absensi = tb_m_absensi::whereIn('id', $request->get('id_siswa'))->get();
$handler = 'export' . ucfirst($request->get('type'));
return $this->$handler($tb_m_absensi);
}

public function export() {  
    $sekolahs =tb_s_sekolah::all();
        return view('absensi.export',compact('sekolahs'));
                             } 

private function exportXls($tb_m_absensi)
// {
// return Excel::download(new InvoicesExport,'data.xlsx');
// }

{
return Excel::create('Data Absensi siswa', function($excel) use ($tb_m_absensi) {
    // Set the properties
    $excel->setTitle('Data Absensi siswa')
            ->setCreator('Rahmat Awaludin');
    $excel->sheet('Data Buku', function($sheet) use ($tb_m_absensi) {
        $row = 1;
        $sheet->row($row, [
         'Pengajar',
         'Tanggal',
         'jam_mulai',
         'jam_akhir',
         'Nama Siswa'
        ]);
        foreach ($tb_m_absensi as $data) {
            $sheet->row(++$row, [
             $data->tb_m_pengajar->nama,
             $data->tanggal,
             $data->jam_mulai,
             $data->jam_akhir,
             $data->tb_m_siswa->nama_lengkap
            ]);
        }
    });
  })->export('xls');
}

private function exportPdf($tb_m_absensi)
{
$pdf = PDF::loadview('pdf.tb_m_absensi', compact('tb_m_absensi'));
return $pdf->download('tb_m_absensi.pdf');
}

public function generateExcelTemplate()
{
Excel::create('Template Import Buku', function($excel) {
// Set the properties
    $excel->setTitle('Template Import Buku')
        ->setCreator('Larapus')
        ->setCompany('Larapus')
        ->setDescription('Template import buku untuk Larapus');
    $excel->sheet('Data Buku', function($sheet) {
        $row = 1;
        $sheet->row($row, [
            'judul',
            'penulis',
            'jumlah'
        ]);
    });
})->export('xlsx');
}

}



    

