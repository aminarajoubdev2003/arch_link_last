<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_customize extends Model
{
    protected $table = 'order_customizes';

    protected $fillable = [
        'uuid',
        'client_id',
        'delivery_id',
        'image',
        'color',
        'amount',
        'high',
        'width',
        'length',
        'status',
        'location'
    ];


    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }

    public function order_item():BelongsTo{
        return $this->belongsTo(Order_items::class);
    }
}
