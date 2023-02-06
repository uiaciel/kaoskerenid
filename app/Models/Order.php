<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    //izinkan semua data di input pakai guarded kosong
    public function klien()
    {
        return $this->belongsTo('App\Models\Klien', 'klien_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function design()
    {
        return $this->belongsTo('App\Models\Design', 'order_id');
    }
    public function keuangan()
    {
        return $this->hasMany('App\Models\Keuangan', 'order_id');
    }
}
