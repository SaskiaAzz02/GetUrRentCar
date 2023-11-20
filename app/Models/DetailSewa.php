<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSewa extends Model
{
    use HasFactory;
    protected $table = 'detail';
    protected $fillable = ['tanggal_peminjaman','jumlah_meminjam'];
    protected $primaryKey = 'id_penyewaan';
    public $timestamps = false;
}
