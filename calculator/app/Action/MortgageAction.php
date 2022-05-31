<?php

namespace App\Action;

use App\Models\Mortgage;

final class MortgageAction
{
    /**
     * Получение списка предложений по ипотекам
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMortgagesPrograms(): \Illuminate\Database\Eloquent\Collection
    {
        return Mortgage::all();
    }

    /**
     * Вычисление ежемесячного платежа
     *
     * @param array $apartmentMortgageData
     * @return float|int
     */
    public static function calculateMortgageMonthPrice(array $apartmentMortgageData): float|int
    {
        $iMonthRate = $apartmentMortgageData['rate'] / 12 / 100;
        $mortgagePrice = $apartmentMortgageData['price'] - $apartmentMortgageData['price'] * ($apartmentMortgageData['initial_fee'] / 100);
        $iGeneralPrice = pow(($iMonthRate + 1), ($apartmentMortgageData['max_years'] * 12));
        return $mortgagePrice * $iMonthRate * $iGeneralPrice / ($iGeneralPrice - 1);
    }
}
