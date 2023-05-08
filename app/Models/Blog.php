<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gambar()
    {
        // preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $this->konten, $image);
        preg_match_all('@src="([^"]+)"@', $this->konten, $match);

        $src = array_pop($match);

        return $src;
    }

    public function dibaca()
    {
        $this->dibaca++;
        return $this->save();
    }
}
