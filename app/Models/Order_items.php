<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_items extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'uuid',
        'client_id',
        'product_id',
        'amount',
        'color',
        'status',
        'delivery_id',
        'location',
        'total',
        'type',
        'deleted_at'
    ];

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }

    public function client(): BelongsTo{
        return $this->belongsTo(Client::class);
    }

    public function delivery():BelongsTo{
        return $this->belongsTo(Delivery::class);
    }


}
