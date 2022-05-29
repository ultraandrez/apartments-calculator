<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

//    protected $table = 'apartments';

    /**
     * Получение привязанных к квартирам ипотечных предложений
     */
    public function mortgages()
    {
        return $this->belongsToMany(Mortgage::class);
    }
}
