<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\dukungan;
use App\mutu;
use App\company;
use App\mutudukungan;
use App\penawaran;
use App\kontrak;
use App\mutupenawaran;
use App\responDukungan;
use App\responpenawaran;
use App\historyPenawaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class adminAdhimix extends Controller
{
	public function dashboard()
	{
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['active']	= "dashboard";
		return view('adhimix.dashboard', compact('data'));
	}

	public function dashboardSuper()
	{
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'superadmin')->get();
		$data['active']	= "dashboard";
		$data['type'] = "superadmin";
		return view('adhimix.dashboard', compact('data'));
	}

	public function company()
	{
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['active']	= "masterdata";
		$data['type'] = "admin";
		$data['dataCompany'] = company::get();
		return view('adhimix.company', compact('data'));
	}

	public function dataAdmin()
	{
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'superadmin')->get();
		$data['type'] = "superadmin";
		$data['active'] = "admin";
		$data['dataAccount'] = admin::where('type', 'admin')->get();
		return view('adhimix.dataAdmin', compact('data'));
	}

	public function deleteAdmin($id)
	{
		admin::where('id_admin',$id)->delete();
        return back();
	}
	
	public function createAdmin(Request $req)
	{
		$this->validate($req,[
    		'name'=>'required',
    		'username'=>'required',
    		'password'=>'required',
    	]);
    	admin::insert([
    		'name'=> $req->name,
    		'username'=> $req->username,
    		'password'=> $req->password,
    		'type'=> "admin"
    	]);
    	session::flash('success', 'Account Admin berhasil di tambah !');
    	return redirect('superadmin-dataadmin');
	}

	public function editAdmin(Request $req, $id_admin)
    {
    	$this->validate($req,[
    		'name'=>'required',
    		'username'=>'required',
    		'password'=>'required',
    	]);
    	admin::where('id_admin',$id_admin)->update([
    		'name'=> $req->name,
    		'username'=> $req->username,
    		'password'=> $req->password
    	]);
    	session::flash('success', 'Account Admin berhasil di edit !');
    	return redirect('superadmin-dataadmin');
    }

	public function dukungan()
	{
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['active']	= "dukungan";
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['list'] = dukungan::get();
		$data['mutulist'] = DB::table('mutudukungans')
		->join('mutus', 'mutudukungans.id_mutu', '=', 'mutus.id_mutu')
		->select('mutudukungans.*', 'mutus.nama_mutu')
		->get();
		return view('adhimix.dukungan',compact('data'));
	}

	public function sms()
	{
		$userkey = "scki6n";
		$passkey = "Muflih.z";
		$url = "https://reguler.zenziva.net/apps/smsapi.php";
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=' . $userkey . '&passkey=' . $passkey . '&nohp=' . '085710173776' . '&pesan=' . urlencode('Hey kamuuuu! semangat TO nyaa :v'));
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		$results = curl_exec($curlHandle);
		curl_close($curlHandle); 
	}

	public function tolak($id)
	{
		responDukungan::create([
			'id_proyek'		=> $id,
			'responDesc'	=> '-',
			'pdf'			=> '-',
			'status'		=> 'Tolak'
		]);
		session::flash('success','Penolakan sukses');
		return back();
	}

	public function terima(Request $req,$id)
	{
		$this->validate($req, [
			'pdf' => 'mimes:pdf',
		],
		$messages = [
			'mimes' => 'Ekstensi yang di perbolehkan hanya pdf.'
		]);

		$pdf	= $req->file('pdf');
		$name 	='PDF_'.time().'.'.$pdf->getClientOriginalExtension();
		$folder = public_path('admin/pdf/');
		$pdf->move($folder,$name);
		responDukungan::create([
			'id_proyek'		=> $id,
			'responDesc'	=> $req->responDesc,
			'pdf'			=> $name,
			'status'		=> 'Terima'
		]);
		session::flash('success','Dukungan Diterima!');
		return back();
	}


	public function penawaran()
	{
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['active']	= "penawaran";
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['list'] = penawaran::get();
		$data['mutulist'] = DB::table('mutupenawarans')
		->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
		->select('mutupenawarans.*', 'mutus.nama_mutu')
		->get();
		return view('adhimix.penawaran',compact('data'));
	}

	public function tetapkanHarga(Request $req, $id)
	{
		// penawaran::where('id_penawaran',$id)->update([
		// 	'ppn'		=>$req->ppn,
		// 	'uang_muka'	=>$req->uang_muka
		// ]);
		$this->validate($req, [
			'pdf' => 'mimes:pdf',
		],
		$messages = [
			'mimes' => 'Ekstensi yang di perbolehkan hanya pdf.'
		]);

		$pdf	= $req->file('pdf');
		$name 	='PDF_'.time().'.'.$pdf->getClientOriginalExtension();
		$folder = public_path('admin/pdf/');
		$pdf->move($folder,$name);
		$times = responpenawaran::where('id_proyek',$id)->max('times') + 1;
		
		responpenawaran::create([
			'id_proyek'		=> $id,					'times'	=>$times,
			'tgl_respon'	=> date('Y-m-d H:i:s'), 'pdf'	=>$name,
			'insert_by'=>'Admin'
		]);
		penawaran::where('id_penawaran',$id)->update([
			'uang_muka'	=>$req->uang_muka,
			'ppn'		=> $req->ppn
		]);
		for ($i=1; $i <=$req->banyak ; $i++) { 
			mutupenawaran::where('id_mutu_penawaran',$_POST['id_mutu'.$i])->update([
				'harga'		=> $_POST['harga'.$i]
			]);
			$mutu = DB::table('mutupenawarans')->where('id_mutu_penawaran',$_POST['id_mutu'.$i])
			->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
			->select('mutupenawarans.*', 'mutus.nama_mutu')
			->get();

			historyPenawaran::create([
				'id_respon'	=>responpenawaran::max('id_respon_penawaran'),
				'mutu'		=> $mutu[0]->id_mutu,
				'slump'		=> $mutu[0]->slump,
				'spec'		=> $mutu[0]->spec,
				'vol'		=> $mutu[0]->vol,
				'harga'		=> $mutu[0]->harga,
				'ppn'		=> $req->ppn,
				'uang_muka'	=> $req->uang_muka
			]);
		}
		session::flash('success','Harga telah diajukan!');
		return back();
	}	

	public function kontrak()
	{
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['active']	= "kontrak";
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['list'] = penawaran::where('status','done')->get();
		$data['mutulist'] = DB::table('mutupenawarans')
		->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
		->select('mutupenawarans.*', 'mutus.nama_mutu')
		->get();
		$data['kontrak']	= kontrak::all();
		return view('adhimix.kontrak',compact('data'));
	}

	public function kirimKontrak(Request $req,$id)
	{
		$this->validate($req, [
			'pdf' => 'mimes:pdf',
		],
		$messages = [
			'mimes' => 'Ekstensi yang di perbolehkan hanya pdf.'
		]);

		$cek = kontrak::where('id_proyek',$id)->count();
		if ($cek > 0 ) {
			session::flash('error','Proyek telah di beri kontrak');
			return back();
		}else{

			$pdf	= $req->file('pdf');
			$name 	='KONTRAK_'.time().'.'.$pdf->getClientOriginalExtension();
			$folder = public_path('admin/pdf/');
			$pdf->move($folder,$name);
			kontrak::create([
				'id_proyek'		=> $id,
				'komentar'	=> $req->komentar,
				'pdf'			=> $name,
			]);
			session::flash('success','Kontrak berhasil dikirim!');
			return back();
		}
	}

	public function mutu()
	{
		$data['type'] = "admin";
		$data['active'] = "masterdata";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['dataMutu'] = mutu::all();
		return view('adhimix.mutu', compact('data'));
	}
	
	public function deleteMutu($id)
	{
		mutu::where('id_mutu',$id)->delete();
        return back();
	
	}
	
	public function createMutu(Request $req)
	{
		$this->validate($req,[
    		'mutu'=>'required',
    		'harga'=>'required',
    	]);
    	mutu::insert([
    		'nama_mutu'=> $req->mutu,
    		'harga'=> $req->harga
    	]);
    	session::flash('success', 'Mutu berhasil di tambah !');
    	return redirect('admin-mutu');
	}

	public function editMutu(Request $req, $id_mutu)
    {
    	$this->validate($req,[
    		'mutu'=>'required',
    		'harga'=>'required'
    	]);
    	mutu::where('id_mutu',$id_mutu)->update([
    		'nama_mutu'=> $req->mutu,
    		'harga'=> $req->harga
    	]);
    	session::flash('success', 'Mutu berhasil di edit !');
    	return redirect('admin-mutu');
    }
}
