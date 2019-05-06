<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    protected $fillable = ['id_produksi','id_proyek','docket','tanggal_kirim','no_tm','nama_driver','vol_kirim'];
}
