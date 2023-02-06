<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany('App\Models\Produk', 'produk_id');
    }

    public function katalogproduk()
    {
        return $this->hasMany('App\Models\Katalogproduk', 'katalog_id');
    }
}
