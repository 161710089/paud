<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use Excel;
use App\tb_m_absenei;
use App\tb_m_siswa;
use App\tb_m_pengajar;
class ExcelController extends Controller
{
    
     function index(){
     	$absensi =DB::table('tb_m_absensis')->get();
     	return view('export_excel')->with('absensi',$absensi);
     				 }

function excel(){
     	$absensi =DB::table('tb_m_absensis')->get()->toArray();
     	$absensi[]=array('Hari','Tanggal','jam mulai','jam keluar','pengajar');
foreach ($absensi as $data ) {
$absensi[]=array(
				'Hari' => $data->hari,
				'Tanggal' => $data->Tanggal,
				'jam_mulai' => $data->jam_mulai,
				'jam_akhir' => $data->jam_akhir,
				'pengajar' => $data->tb_m_pengajar->nama,

				);

			}
			Excel::create('absensi', function($excel) use ($absensi_array){
				$excel->setTitle('absensi');
				$excel->sheet('absensi', function($sheet) use ($absensi_array){
					$sheet->fromArray($absensi_array, null, 'A1',false,false);
				});
					
			})->download('xlsx');

     				 }

}
