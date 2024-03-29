<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'hp',
        'alamat',
        'status',
        'user_id',
    ];

    public function design()
    {
        return $this->hasMany('App\Models\Design', 'klien_id')->count();
    }
}
