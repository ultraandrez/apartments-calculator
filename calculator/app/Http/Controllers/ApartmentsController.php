<?php

namespace App\Http\Controllers;

use App\Action\ApartmentAction;
use App\Action\MortgageAction;
use App\Helpers\FormatData;
use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use App\Models\ApartmentType;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    /**
     * Просмотр главной страницы каталога квартир
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(ApartmentAction $apartmentAction): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $aApartmentsData = $apartmentAction->getApartmentsData();
        return view('apartments', compact('aApartmentsData'));
    }

    /**
     * Создание записи о квартире
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(ApartmentAction $apartmentAction, MortgageAction $mortgageAction): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apartmentTypes = $apartmentAction->getApartmentTypes();
        $mortgagesPrograms = $mortgageAction->getMortgagesPrograms();
        return view('apartmentform', compact('apartmentTypes', 'mortgagesPrograms'));
    }

    /**
     * Сохранение записи о квартире
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ApartmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $apartmentAddResult = Apartment::create($request->only(['name', 'price', 'apartment_type_id']));
        $apartment = Apartment::find($apartmentAddResult->id);
        $apartment->mortgages()->attach($request->mortgages);
        return redirect()->route('apartments.index');
    }

    /**
     * Вывод списка квартир
     *
     * @param Apartment $apartment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Apartment $apartment, ApartmentAction $apartmentAction): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apartmentData = $apartmentAction->getApartmentsData($apartment->id);
        return view('show', compact('apartment', 'apartmentData'));
    }

    /**
     * Удаление записи о квартире
     *
     * @param Apartment $apartment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Apartment $apartment): \Illuminate\Http\RedirectResponse
    {
        $apartment->delete();
        return redirect()->route('apartments.index');
    }

    /**
     * Редактирование элемента квартиры
     *
     * @param Apartment $apartment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Apartment $apartment, ApartmentAction $apartmentAction, MortgageAction $mortgageAction): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apartmentTypes = $apartmentAction->getApartmentTypes();
        $mortgagesPrograms = $mortgageAction->getMortgagesPrograms();
        return view('apartmentform', compact('apartment', 'apartmentTypes', 'mortgagesPrograms'));
    }

    /**
     * Обновление данных о квартире
     *
     * @param Request $request
     * @param Apartment $apartment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ApartmentRequest $request, Apartment $apartment): \Illuminate\Http\RedirectResponse
    {
        $apartment->update($request->only(['name', 'price', 'apartment_type_id']));
        $apartment->mortgages()->sync($request->mortgages);
        return redirect()->route('apartments.index');
    }
}
