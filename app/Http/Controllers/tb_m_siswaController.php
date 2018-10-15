<?php

namespace App\Http\Controllers;
use App\tb_m_ortu;
use App\tb_m_siswa;
use App\tb_s_sekolah;
use File;
use Session;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Role;
class tb_m_siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
      $search = $request->get('search');
      $tb_m_siswa = tb_m_siswa::where('nik','like','%'.$search.'%')
                            ->orWhere('nama_lengkap','like','%'.$search.'%')
                            ->orderBy('nama_lengkap')->paginate(9);
       $sekolahs =tb_s_sekolah::all();
        
      return view('siswa.index',compact('tb_m_siswa','sekolahs'));

        // $tb_m_ortu =  tb_m_ortu::all();
        // $tb_m_siswa =  tb_m_siswa::all();
        // $datas =  tb_m_siswa::all();
        // $sekolahs =tb_s_sekolah::all();
         
        // return view('siswa.index',compact('tb_m_ortu','tb_m_siswa','sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {           
             $sekolahs =tb_s_sekolah::all();
             $tb_m_siswa = tb_m_siswa::all();
             $tb_m_ortu = tb_m_ortu::all();
    
        return view('siswa.create',compact('tb_m_siswa','tb_m_ortu','sekolahs'));
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
            
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|max:255:unique:users',
            'jenis_kelamin' => 'required|max:255',
            'ttl' => 'required',
            'nik' => 'required|max:11|unique:tb_m_siswas',
            
      
        ]);
        $tb_m_ortu = new tb_m_ortu;
        $tb_m_ortu->nama_ayah = $request->nama_ayah;
        $tb_m_ortu->ttl_ayah = $request->ttl_ayah;
        $tb_m_ortu->agama_ayah = $request->agama_ayah;
        $tb_m_ortu->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
        $tb_m_ortu->pendidikan_ayah = $request->pendidikan_ayah;
        $tb_m_ortu->pekerjaan_ayah = $request->pekerjaan_ayah;
        $tb_m_ortu->penghasilan_ayah = $request->penghasilan_ayah;
        $tb_m_ortu->alamat_no_telepon_ayah = $request->alamat_no_telepon_ayah;
        $tb_m_ortu->nama_ibu = $request->nama_ibu;
        $tb_m_ortu->ttl_ibu = $request->ttl_ibu;
        $tb_m_ortu->agama_ibu = $request->agama_ibu;
        $tb_m_ortu->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
        $tb_m_ortu->pendidikan_ibu = $request->pendidikan_ibu;
        $tb_m_ortu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $tb_m_ortu->penghasilan_ibu = $request->penghasilan_ibu;
        $tb_m_ortu->alamat_no_telepon_ibu = $request->alamat_no_telepon_ibu;
        $tb_m_ortu->nama_wali = $request->nama_wali;
        $tb_m_ortu->ttl_wali = $request->ttl_wali;
        $tb_m_ortu->agama_wali = $request->agama_wali;
        $tb_m_ortu->kewarganegaraan_wali = $request->kewarganegaraan_wali;
        $tb_m_ortu->pendidikan_wali = $request->pendidikan_wali;
        $tb_m_ortu->pekerjaan_wali = $request->pekerjaan_wali;
        $tb_m_ortu->penghasilan_wali = $request->penghasilan_wali;
        $tb_m_ortu->alamat_no_telepon_wali = $request->alamat_no_telepon_wali;
        
        $tb_m_ortu->save();
    
        $user = User::create([
            'name' => $request['nama_lengkap'],
            'email' => $request['email'],
            'password' => bcrypt($request['ttl']),
        ]);
        $userRole = Role::where('name','user')->first();
        $user->attachRole($userRole);
        

        $tb_m_siswa = new tb_m_siswa;
        $tb_m_siswa->nama_lengkap = $request->nama_lengkap;
        $tb_m_siswa->nama_panggilan = $request->nama_panggilan;
        $tb_m_siswa->jenis_kelamin = $request->jenis_kelamin;
        $tb_m_siswa->ttl = $request->ttl;
        $tb_m_siswa->nik = $request->nik;
        $tb_m_siswa->nama_jalan = $request->nama_jalan;
        $tb_m_siswa->nama_desa = $request->nama_desa;
        $tb_m_siswa->kecamatan = $request->kecamatan;
        $tb_m_siswa->kabupaten = $request->kabupaten;
        $tb_m_siswa->provinsi = $request->provinsi;
        $tb_m_siswa->agama = $request->agama;
        $tb_m_siswa->kewarganegaraan = $request->kewarganegaraan;
        $tb_m_siswa->anak_ke = $request->anak_ke;
        $tb_m_siswa->jumlah_saudara_kandung = $request->jumlah_saudara_kandung;
        $tb_m_siswa->jumlah_saudara_tiri = $request->jumlah_saudara_tiri;
        $tb_m_siswa->jumlah_saudara_angkat = $request->jumlah_saudara_angkat;
        $tb_m_siswa->status_yatim = $request->status_yatim;
        $tb_m_siswa->bahasa = $request->bahasa;
        $tb_m_siswa->golongan_darah = $request->golongan_darah;
        $tb_m_siswa->penyakit = $request->penyakit;
        $tb_m_siswa->imunisasi = $request->imunisasi;
        $tb_m_siswa->ciri_ciri = $request->ciri_ciri;
        $tb_m_siswa->tinggi_berat_badan = $request->tinggi_berat_badan;
        $tb_m_siswa->jarak_rumah = $request->jarak_rumah;
        $tb_m_siswa->foto = $request->foto;
        $tb_m_siswa->id_ortu = $tb_m_ortu->id;
        $tb_m_siswa->id_user = $user->id;
        
        
        $tb_m_siswa->save();
        if ($request->hasFile('foto')) {
            $file =$request->file('foto');
            $filename =str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath =public_path().'/img/Fotosiswa/';
            $uploadSucces =$file->move($destinationPath, $filename);
            $tb_m_siswa->foto =$filename;

            
        $tb_m_siswa->save();
        }
        
    

        return redirect()->route('siswa.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
             $sekolahs =tb_s_sekolah::all();
            $tb_m_siswa = tb_m_siswa::with('tb_m_ortu')->findOrFail($id);
            $ortu = tb_m_ortu::all();
            $tb_m_ortu = tb_m_ortu::where('id_ortu','=',$ortu);
     
        return view('siswa.show',compact('tb_m_siswa','tb_m_ortu','ortu','sekolahs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolahs =tb_s_sekolah::all();
        $tb_m_siswa = tb_m_siswa::findOrFail($id);
        $tb_m_ortu = tb_m_ortu::all();
        $selectortu = tb_m_siswa::findOrFail($tb_m_siswa->id)->id_otru;
        return view('siswa.edit',compact('tb_m_siswa','tb_m_ortu','selectortu','sekolahs'));  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
        
            'nama_lengkap' => 'required|max:255',
            'nama_panggilan' => 'max:255',
            'jenis_kelamin' => 'required|max:255',
            'ttl' => 'required',
            'nik' => 'required|max:11',
            'nama_jalan' => 'max:255',
            'nama_desa' => 'max:255',
            'kecamatan' => 'max:255',
            'kabupaten' => 'max:255',
            'provinsi' => 'max:255',
            'agama' => 'max:255',
            'kewarganegaraan' => 'max:255',
            'anak_ke' => 'max:255',
            'jumlah_saudara_kandung' => 'max:255',
            'jumlah_saudara_tiri' => 'max:255',
            'jumlah_saudara_angkat' => 'max:255',
            'status_yatim' => 'max:255',
            'bahasa' => 'max:255',
            'golongan_darah' => 'max:255',
            'penyakit' => 'max:255',
            'imunisasi' => 'max:255',
            'ciri_ciri' => 'max:255',
            'tinggi_berat_badan' => 'max:255',
            'jarak_rumah' => 'max:255',          
            'foto' => 'required',
         
          //table Ortu
            'nama_ayah' => 'max:255',
            'ttl_ayah' => 'max:255',
            'agama_ayah' => 'max:255',
            'kewarganegaraan_ayah' => '',
            'pendidikan_ayah' => 'max:255',
            'pekerjaan_ayah' => 'max:255',
            'penghasilan_ayah' => 'max:255',
            'alamat_no_telepon_ayah' => 'max:255',
         
            'nama_ibu' => 'max:255',
            'ttl_ibu' => 'max:255',
            'agama_ibu' => 'max:255',
            'kewarganegaraan_ibu' => '',
            'pendidikan_ibu' => 'max:255',
            'pekerjaan_ibu' => 'max:255',
            'penghasilan_ibu' => 'max:255',
            'alamat_no_telepon_ibu' => 'max:255',
  
            'nama_wali' => 'max:255',
            'ttl_wali' => 'max:255',
            'agama_wali' => 'max:255',
            'kewarganegaraan_wali' => '',
            'pendidikan_wali' => 'max:255',
            'pekerjaan_wali' => 'max:255',
            'penghasilan_wali' => 'max:255',
            'alamat_no_telepon_wali' => 'max:255',
  

     ]);

   
        $tb_m_siswa = tb_m_siswa::findOrFail($id);
        $tb_m_siswa->nama_lengkap = $request->nama_lengkap;
        $tb_m_siswa->nama_panggilan = $request->nama_panggilan;
        $tb_m_siswa->jenis_kelamin = $request->jenis_kelamin;
        $tb_m_siswa->ttl = $request->ttl;
        $tb_m_siswa->nik = $request->nik;
        $tb_m_siswa->nama_jalan = $request->nama_jalan;
        $tb_m_siswa->nama_desa = $request->nama_desa;
        $tb_m_siswa->kecamatan = $request->kecamatan;
        $tb_m_siswa->kabupaten = $request->kabupaten;
        $tb_m_siswa->provinsi = $request->provinsi;
        $tb_m_siswa->agama = $request->agama;
        $tb_m_siswa->kewarganegaraan = $request->kewarganegaraan;
        $tb_m_siswa->anak_ke = $request->anak_ke;
        $tb_m_siswa->jumlah_saudara_kandung = $request->jumlah_saudara_kandung;
        $tb_m_siswa->jumlah_saudara_tiri = $request->jumlah_saudara_tiri;
        $tb_m_siswa->jumlah_saudara_angkat = $request->jumlah_saudara_angkat;
        $tb_m_siswa->status_yatim = $request->status_yatim;
        $tb_m_siswa->bahasa = $request->bahasa;
        $tb_m_siswa->golongan_darah = $request->golongan_darah;
        $tb_m_siswa->penyakit = $request->penyakit;
        $tb_m_siswa->imunisasi = $request->imunisasi;
        $tb_m_siswa->ciri_ciri = $request->ciri_ciri;
        $tb_m_siswa->tinggi_berat_badan = $request->tinggi_berat_badan;
        $tb_m_siswa->jarak_rumah = $request->jarak_rumah;
        $tb_m_siswa->foto = $request->foto;



if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotosiswa';
            // memindahkan file ke folder public//img/Fotosiswa
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($tb_m_siswa->foto) {
                $old_foto = $tb_m_siswa->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/Fotosiswa'
                . DIRECTORY_SEPARATOR . $tb_m_siswa->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    }
                }
            $tb_m_siswa->foto = $filename;
            $tb_m_siswa->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tb_m_siswa->nama_lengkap"
        ]);

        $tb_m_siswa->save();
                
   
        $tb_m_ortu = tb_m_ortu::findOrFail($tb_m_siswa->id_ortu);
        
        
        $tb_m_ortu->nama_ayah = $request->nama_ayah;
        $tb_m_ortu->ttl_ayah = $request->ttl_ayah;
        $tb_m_ortu->agama_ayah = $request->agama_ayah;
        $tb_m_ortu->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
        $tb_m_ortu->pendidikan_ayah = $request->pendidikan_ayah;
        $tb_m_ortu->pekerjaan_ayah = $request->pekerjaan_ayah;
        $tb_m_ortu->penghasilan_ayah = $request->penghasilan_ayah;
        $tb_m_ortu->alamat_no_telepon_ayah = $request->alamat_no_telepon_ayah;
        $tb_m_ortu->nama_ibu = $request->nama_ibu;
        $tb_m_ortu->ttl_ibu = $request->ttl_ibu;
        $tb_m_ortu->agama_ibu = $request->agama_ibu;
        $tb_m_ortu->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
        $tb_m_ortu->pendidikan_ibu = $request->pendidikan_ibu;
        $tb_m_ortu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $tb_m_ortu->penghasilan_ibu = $request->penghasilan_ibu;
        $tb_m_ortu->alamat_no_telepon_ibu = $request->alamat_no_telepon_ibu;
        $tb_m_ortu->nama_wali = $request->nama_wali;
        $tb_m_ortu->ttl_wali = $request->ttl_wali;
        $tb_m_ortu->agama_wali = $request->agama_wali;
        $tb_m_ortu->kewarganegaraan_wali = $request->kewarganegaraan_wali;
        $tb_m_ortu->pendidikan_wali = $request->pendidikan_wali;
        $tb_m_ortu->pekerjaan_wali = $request->pekerjaan_wali;
        $tb_m_ortu->penghasilan_wali = $request->penghasilan_wali;
        $tb_m_ortu->alamat_no_telepon_wali = $request->alamat_no_telepon_wali;
       
        $tb_m_ortu->save();
    
           
        
        
        
        
        return redirect()->route('siswa.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function deleteSiswaRecord($id){
        tb_m_siswa::where('id',$id)->delete();
    }

    public function destroy($id)
    {
               $tb_m_siswa = tb_m_siswa::findOrFail($id);
        $tb_m_siswa->delete();
        return redirect()->route('siswa.index')->with('success','Siswa Deleted');      
    }

public function search(Request $request)
    {
        if ($request->ajax()) 
        {
        $output="";
        $jenis_kelamin="";

        $siswa =DB::table('tb_m_siswas')->where('nik','LIKE','%'.$request->search.'%')
                                       ->orWhere('nama_lengkap','LIKE','%'.$request->search.'%')
                                       ->get();

        if ($siswa) 
        {
        foreach ($siswa as $key => $siswas){ 
            if ($siswas->jenis_kelamin==0) 
            {
               $jenis_kelamin="laki-laki";
            }
            else
            {
                $jenis_kelamin-"perempuan";
            }
           $output.='<tr>'.
                    '<img>'.$siswas->foto.'</img>'.
                    '<h6>'.$siswas->nama_lengkap.'</h6>'.
                    '<h6>'.$siswas->nik.'</h6>'.
                    '<h6>'.$jenis_kelamin.'</h6>'.
                    '<h6>'.$siswas->ttl.'</h6>'.
                    '</tr>';
        }
        return Response($output);
        }
        }


    }

}



      
    








