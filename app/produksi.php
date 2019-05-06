<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    protected $fillable = ['id_proyek','nama_proyek','alamat_proyek','nama_owner','tanggal_mulai','tanggal_akhir','vol_kontrak','terkirim','tersisa'];
}
