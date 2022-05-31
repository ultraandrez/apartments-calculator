<?php

namespace App\Http\Controllers;

use App\Http\Requests\MortgageRequest;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class MortgagesController extends Controller
{
    /**
     * Просмотр главной страницы каталога квартир
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $mortgagesData = Mortgage::paginate(10);
        return view('mortgages', compact('mortgagesData'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('mortgageform');
    }

    public function store(MortgageRequest $request): \Illuminate\Http\RedirectResponse
    {
        Mortgage::create($request->only(['name', 'rate', 'max_years', 'initial_fee']));
        return redirect()->route('mortgages.index');
    }

    /**
     * Редактирование ипотечного предложения
     *
     * @param Mortgage $mortgage
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Mortgage $mortgage): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('mortgageform', compact('mortgage'));
    }

    /**
     * Удаление записи об ипотечном предложении
     *
     * @param Mortgage $mortgage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Mortgage $mortgage): \Illuminate\Http\RedirectResponse
    {
        $mortgage->delete();
        return redirect()->route('mortgages.index');
    }

    /**
     * Обновление данных об ипотечном предложении
     *
     * @param MortgageRequest $request
     * @param Mortgage $mortgage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MortgageRequest $request, Mortgage $mortgage): \Illuminate\Http\RedirectResponse
    {
        $mortgage->update($request->only(['name', 'rate', 'max_years', 'initial_fee']));
        return redirect()->route('mortgages.index');
    }
}
