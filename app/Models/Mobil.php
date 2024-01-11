<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Mobil extends Model
    {
        use HasFactory;
        protected $table = 'mobil';
        protected $fillable = ['id_jenis_mobil','merk', 'plat_mobil', 'nomor_rangka', 'foto_mobil', 'harga_sewa_per_hari'];
        protected $primaryKey = 'id_mobil';
        public $timestamps = false;
    
    }

