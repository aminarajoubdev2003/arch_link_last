<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'uuid',
        'blog_id',
        'comment',
        'email',
        'name'
    ];

    public function blog():BelongsTo{
        return $this->belongsTo(Blog::class);
    }
}
