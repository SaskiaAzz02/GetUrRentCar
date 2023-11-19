<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $fillable = ['id_mobil', 'id_jenis_mobil', 'plat_mobil', 'nomor_rangka', 'foto_mobil', 'pesan'];
    protected $primaryKey = 'id_mobil';
    public $timestamps = false;

}
