<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dukungan extends Model
{
	protected $fillable = ['id_company','nama_proyek','provinsi','kota','owner','proyek_mulai','proyek_akhir','alamat','created_at','updated_at'];
}
