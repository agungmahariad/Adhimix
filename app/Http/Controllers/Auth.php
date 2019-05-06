<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\company;
use App\account;
use App\admin;
class Auth extends Controller
{
	function autoComplete($key)
	{
		$key = str_ireplace('%20', ' ', $key);
		$cek = company::where('company_name','like','%'.$key.'%')->get();
		$html = "<select onchange='move()' id='id_company' class='form-control' style='margin-top:-30px'><option value=''>Pilih Perusahaan</option>";
		if ($cek->count() > 0) {
			foreach ($cek as $key ) {
				$html.="<option value='".$key->id_company."'>".$key->company_name."</option>";
			}
		}else{
			$html.="<option disabled>Perusahaan tidak terdaftar</option>";
		}
		$html.="</select>";
		echo $html;
	}

	function getCompany($id)
	{
		return $cek = company::where('id_company',$id)->get();
	}

	function daftar(Request $req)
	{
		$cek = company::where('company_name',$req->company_name)->get();
		if ($cek->count() > 0) {
			if (account::where('id_company',$cek[0]->id_company)->count() > 0) {
				session::flash('error','Perusahaan tersebut telah terdaftar dan memiliki akun');
				return back();
			}else{
				if (account::where('username',$req->username)->count() > 0 ) {
					session::flash('error','Username telah terdaftar');
					return back();
				}else{
					account::create([
						'id_company' => $cek[0]->id_company,	'fullname'	=> $req->fullname,
						'username'	 =>	$req->username,			'password'	=> $req->password,
						'jabatan'	 => $req->jabatan,			'no_telp'	=> $req->no_telp_admin,
						'pict'		 => '-',					'type'		=> 'admin' 
					]);
					session::flash('success','Akun telah di buat silahkan login');
					return back();
				}
			}
		}else{

			if (account::where('username',$req->username)->count() > 0 ) {
				session::flash('error','Username telah terdaftar');
				return back();
			}else{
				company::create([
					'company_name'	=> $req->company_name,		'address'	=> $req->address,
					'npwp'			=> $req->npwp,				'email'		=> $req->email,
					'no_telp'		=> $req->no_telp,			'no_rek'	=> $req->no_rek,
				]);
				account::create([
					'id_company' => company::max('id_company'),	'fullname'	=> $req->fullname,
					'username'	 =>	$req->username,			'password'	=> $req->password,
					'jabatan'	 => $req->jabatan,			'no_telp'	=> $req->no_telp_admin,
					'pict'		 => '-',					'type'		=> 'admin' 
				]);
				session::flash('success','Akun telah di buat silahkan login');
				return back();
			}
		}
	}

	function login(Request $req)
	{
		$cek = account::where('username',$req->username)->where('password',$req->password)->get();
		if ($cek->count() > 0 ) {
			if ($cek[0]->type=="admin") {
				session::put('id_user',$cek[0]->id_user);
				session::put('id_company',$cek[0]->id_company);
				return redirect('dashboard-admin');
			}else{
				session::put('id_user',$cek[0]->id_user);
				session::put('id_company',$cek[0]->id_company);
				return redirect('staff');
			}
		}else{
			session::flash('error','Username atau password salah');
			return back();
		}
	}

	function logout()
	{
		session::flush();
		return redirect('');
	}

	function logoutAdmin()
	{
		session::flush();
		return redirect('landing-admin');
	}

	function loginAdmin(Request $req)
	{
		$cek = admin::where('username',$req->username)->where('password',$req->password)->get();
		if ($cek->count() > 0 ) {
			if ($cek[0]->type=="admin") {
				session::put('id_admin',$cek[0]->id_admin);
				return redirect('admin-dashboard');
			}else{
				session::put('id_admin',$cek[0]->id_admin);
				session::put('type',$cek[0]->type);
				return redirect('superadmin-dashboard');
			}
		}else{
			session::flash('error','Username atau password salah');
			return back();
		}
	}
}
