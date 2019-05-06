<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class responDukungan extends Model
{
	protected $fillable=['id_proyek','responDesc','pdf','status','created_at','update_at'];
}
