<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $fillable = ['id_mobil', 'tanggal_pengembalian'];
    protected $primarykey = 'id_pengembalian';
    public $timestamps = false;
}
