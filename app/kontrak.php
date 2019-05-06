<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontrak extends Model
{
	protected $fillable=['id_proyek','komentar','pdf'];
}
