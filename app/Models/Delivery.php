<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone_number',
        'area_id',
        'busy',
        'deleted_at'
    ];

    public function area():BelongsTo{
        return $this->belongsTo(Area::class);
    }

    public function city()
    {
    return $this->belongsTo(City::class);
    }

    public function orders_items(): HasMany{
        return $this->hasmany(Order_items::class);
    }

    public function production_order(): HasMany{
        return $this->hasmany(Order_customize::class);
    }
}
