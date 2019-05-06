<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutupenawaran extends Model
{
	protected $fillable = ['id_proyek','id_mutu','slump','spec','vol','harga'];
}
