<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class piutang extends Model
{
    protected $fillable = ['id_credit_list','id_proyek','nama_proyek','no_inv','no_faktur','tanggal_inv','dpp_ppn','total_terbayar','tanggal_terakhir_bayar','tanggal_terakhir_update','sisa_kredit'];
}
