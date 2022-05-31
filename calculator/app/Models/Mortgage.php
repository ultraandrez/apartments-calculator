<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
        'max_years',
        'initial_fee'
    ];

    /**
     * Получение списка связанных с ипотечным предложением квартир=
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Apartment::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (Mortgage $mortgage) {
            $mortgage->apartments()->detach();
        });
    }
}
