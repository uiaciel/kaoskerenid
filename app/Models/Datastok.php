<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Datastok extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function stok()
    {
        return $this->belongsTo('App\Models\Stok', 'stok_id');
    }
}
