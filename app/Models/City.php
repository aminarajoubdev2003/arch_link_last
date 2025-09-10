<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'city_name',
        'deleted_at'
    ];



    /* protected static function booted()
    {
        // لما يتعمل restore للمدينة
        static::restored(function ($city) {
            // استرجع كل المناطق المرتبطة بيها حتى لو متسوفتة
            $city->areas()->withTrashed()->restore();
        });
    }*/

    public function areas(): HasMany{
        return $this->hasMany(Area::class);
    }
}
