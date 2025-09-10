<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'auther',
        'image',
        'content'
    ];

    public function comments(): HasMany{
        return $this->hasmany(Comment::class);
    }
}
