<?php

namespace App\Action;

use App\Helpers\FormatData;
use App\Models\Apartment;
use App\Models\ApartmentType;

final class ApartmentAction
{

    public function __construct(
        private FormatData $formatData,
    )
    {
    }

    /**
     * Получение данных о квартире, если передан $id - получаем данные для одной квартиры
     *
     * @param int|null $id - идентификатор квартиры
     * @return array
     */
    public function getApartmentsData(int $id = null): array
    {
        $query = Apartment::query();
        if ($id) {
            $query = $query::id($id);
        }
        $apartmentsData = $query->paginate(5);
        $structuredApartmentData = [
            'query_result' => $apartmentsData,
            'elements' => []
        ];
        foreach ($apartmentsData as $apartment) {
            $apartmentMortgagePrograms = [];
            foreach ($apartment->mortgages as $mortgageProgram) {
                $mortgageData = [
                    'rate'        => $mortgageProgram->rate,
                    'max_years'   => $mortgageProgram->max_years,
                    'initial_fee' => $mortgageProgram->initial_fee,
                    'price'       => $apartment->price
                ];
                $apartmentMortgagePrograms[] = [
                    'id'          => $mortgageProgram->id,
                    'name'        => $mortgageProgram->name,
                    'month_price' => $this->formatData->formatPrice(MortgageAction::calculateMortgageMonthPrice($mortgageData))
                ];
            }

            $apartmentElement = [
                'name' => $apartment->name,
                'price' => $this->formatData->formatPrice($apartment->price),
                'mortgage_programs' => $apartmentMortgagePrograms,
                'apartment_object' => $apartment,
                'type' => $apartment->apartmentType->name
            ];
            if ($id) return $apartmentElement;
            $structuredApartmentData['elements'][] = $apartmentElement;
        }
        return $structuredApartmentData;
    }

    /**
     * Получение списка типов квартир
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getApartmentTypes(): \Illuminate\Database\Eloquent\Collection
    {
        return ApartmentType::all();
    }
}
