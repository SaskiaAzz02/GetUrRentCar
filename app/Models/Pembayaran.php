<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['total', 'tanggal_pembayaran', 'jenis_pembayaran'];
    protected $primarykey = 'id_pembayaran';
    public $timestamps = false;

    public function pembayaran(){
        return $this->hasMany(pembayaran::class, 'id_pembayaran');
    }
}
