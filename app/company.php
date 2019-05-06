<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
	protected $fillable = ['company_name','address','npwp','email','no_telp','no_rek','about','pict','created_at','updated_at'];
}
