<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderanKatalog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function katalog()
    {
        return $this->belongsTo('App\Models\Katalog', 'katalog_id');
    }
}
