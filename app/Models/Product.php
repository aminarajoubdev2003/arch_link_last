<?php

namespace App\Models;

use App\Models\Order_items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'site',
        'category',
        'type',
        'style',
        'material',
        'price',
        'images',
        'block_file',
        'price',
        'height',
        'width',
        'length',
        'color',
        'sale',
        'desc',
        'time_to_make',
        'buy'
    ];

    protected $casts = [
        'images' => 'array',
    ];




    public function Order_items(): HasMany{
        return $this->hasMany(Order_items::class);
    }

    
}
