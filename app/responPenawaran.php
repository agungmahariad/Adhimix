<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class responPenawaran extends Model
{
	protected $fillable=['id_proyek','tgl_respon','times','insert_by','pdf'];
}
