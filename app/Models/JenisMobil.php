<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMobil extends Model
{
    use HasFactory;
    protected $table = 'jenis_mobil';
    protected $fillable = ['nama_jenis'];
    protected $primaryKey = 'id_jenis_mobil';
    public $timestamps = false;

}
