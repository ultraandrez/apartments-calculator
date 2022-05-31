<?php

namespace App\Helpers;

class FormatData
{
    const RUB_POSTFIX = 'р.';

    /**
     * Форматирование цены
     *
     * @param int $price
     * @return string
     */
    public function formatPrice(int $price): string
    {
        return  number_format($price, 0, ',', ' ') . ' ' . self::RUB_POSTFIX;
    }
}
