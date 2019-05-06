<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penawaran extends Model
{
	protected $fillable = ['id_company','nama_proyek','owner','alamat','provinsi','kota','mulai_proyek','akhir_proyek','created_at','updated_at'];
}
