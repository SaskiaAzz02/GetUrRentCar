<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['no_telp', 'alamat', 'nama', 'sim', 'ktp'];
    protected $primarykey = 'id_customer';
    public $timestamps = false;

    public function customer(){
        return $this->hasMany(customer::class, 'id_customer');
    }
}
