<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historyPenawaran extends Model
{
	protected $fillable=['id_respon','mutu','id_proyek','slump','spec','vol','harga','ppn','uang_muka'];
}
