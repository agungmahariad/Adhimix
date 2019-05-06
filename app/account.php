<?php

namespace App;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
	protected $fillable=['id_company','fullname','username','password','no_telp','pict','jabatan','type','created_at','updated_at'];

	public function cek()
	{
		if (session('id_user')==null) {
			return redirect('');
		}
	}
}
