<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
	function landingPage()
	{
		return view('landingPage');
	}

	function landingAdmin()
	{
		return view('landingAdmin');
	}

	function dashboardStaff()
	{
		return view('staff.dashboard');
	}

	function dashboardSupers()
	{
		$data['type'] = "admin";
		$data['dataAdmin'] = admin::where('id_admin', session('id_admin'))->where('type', 'admin')->get();
		$data['active']	= "dashboard";
		return view('adhimix.layouts');
	}

	function permintaanDukungan()
	{
		return view('staff.dukungan');
	}
	function dukunganBaru()
	{
		return view('staff.dukunganBaru');
	}
	function permintaanPenawaran()
	{
	 	return view('staff.penawaran');	
	}
	function lihat()
	{
	 	return view('staff.lihat');	
	}
	function nego()
	{
	 	return view('staff.nego');	
	}
	function penawaranBaru()
	{
	 	return view('staff.penawaranBaru');	
	}
	function kontrak()
	{
	 	return view('staff.kontrak');	
	}
	function trackingTruck()
	{
	 	return view('staff.trackTruck');	
	}
	function daftarProduksi()
	{
	 	return view('staff.daftarProduk');	
	}
	function daftarPiutang()
	{
	 	return view('staff.daftarPiutang');	
	}
	function staffManagement()
	{
		return view('admin.staff');
	}
	function companySetting()
	{
		return view('admin.companySetting');
	}

	// template baru

	function landing2()
	{
		return view('adhimix.dashboards');
	}
}
