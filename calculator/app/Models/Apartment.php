<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'apartment_type_id'
    ];

    public function scopeId($query, $id)
    {
        if (!is_null($id)) {
            return $query->where(compact('id'));
        }
        return $query;
    }

    protected static function boot() {
        parent::boot();
        static::deleting(function(Apartment $apartment) {
            $apartment->mortgages()->detach();
      });
    }

    /**
     * Получение привязанных к квартирам ипотечных предложений
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mortgages(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Mortgage::class);
    }

    /**
     * Получение типа квартиры
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apartmentType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ApartmentType::class);
    }
}
