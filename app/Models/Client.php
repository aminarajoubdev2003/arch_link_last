<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'uuid',
        'user_id',
        'phone_number',
        'area_id',
        'acount',
        'image',
    ];

    public function area():BelongsTo{
        return $this->belongsTo(Area::class);
    }


    public function orders_items(): HasMany{
        return $this->hasmany(Order_items::class);
    }

    public function orders_customize(): HasMany{
        return $this->hasmany(Order_customize::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function reviews(): HasMany{
        return $this->hasmany(Review::class);
    }
}
