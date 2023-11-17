<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $table = 'denda';
    protected $fillable = ['jenis', 'tarif'];
    protected $primarykey = 'id_denda';
    public $timestamps = false;

    public function denda(){
        return $this->hasMany(denda::class, 'id_denda');
    }
}
