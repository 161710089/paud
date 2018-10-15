<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\tb_s_sekolah;
use App\tb_m_siswa;
class SettingsController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function profile()
	{
		$sekolahs =tb_s_sekolah::all();
		 $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
       
		return view('settings.profile',compact('sekolahs','tb_m_siswa'));
	}

	public function editProfile()
	{
		$sekolahs =tb_s_sekolah::all();
		 $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
       
		return view('settings.edit-profile',compact('sekolahs','tb_m_siswa'));
	}

	public function updateProfile(Request $request)
	{
		$sekolahs =tb_s_sekolah::all();
		
		$user = Auth::user();
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|unique:users,email,' . $user->id
		]);

		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->save();
		
		Session::flash("flash_notification", [
			"level"=>"success",
			"message"=>"Profil berhasil diubah"
		]);
		return redirect('settings/profile');
	}

	public function editPassword()
	{
			$sekolahs =tb_s_sekolah::all();
		 $tb_m_siswa = tb_m_siswa::where('id_user',Auth::user()->id)->get();
       
		return view('settings.edit-password',compact('sekolahs','tb_m_siswa'));
	}

	public function updatePassword(Request $request)
	{	
		$sekolahs =tb_s_sekolah::all();
	
		$user = Auth::user();
		$this->validate($request, [
		'password' => 'required|passcheck:' . $user->password,
		'new_password' => 'required|confirmed|min:6',
		], [
		'password.passcheck' => 'Password lama tidak sesuai'
		]);
		$user->password = bcrypt($request->get('new_password'));
		$user->save();
		Session::flash("flash_notification", [
			"level"=>"success",
			"message"=>"Password berhasil diubah"
		]);
		return redirect('settings/password');
	}
}
