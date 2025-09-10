<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'uuid',
        'area_name',
        'city_id',
        'deleted_at'
    ];

    public function city():\Illuminate\Database\Eloquent\Relations\BelongsTo{
        return $this->belongsTo(City::class);
    }

    public function deliveries(): HasMany{
        return $this->hasMany(Delivery::class);
    }

    public function clients(): HasMany{
        return $this->hasMany(Client::class);
    }
}
