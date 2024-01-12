<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSewa extends Model
{
    use HasFactory;
    protected $table = 'detail_sewa';
    protected $fillable = ['lampu', 'dongkrak_kit', 'klakson', 'head_rest', 'kebersihan_mobil', 
    'seat_belt', 'audio', 'karpet_mobil', 'ban_serep', 'stnk', 'foto_kondisi_mobil', 'id_jenis_mobil', 'merk', 'plat'];
    protected $primaryKey = 'id_detail';
    public $timestamps = false;
}
