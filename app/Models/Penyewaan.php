<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';
    protected $fillable = ['id_detail', 'tanggal_peminjaman','jumlah_meminjam'];
    protected $primaryKey = 'id_penyewaan';
    public $timestamps = false;
}

