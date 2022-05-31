@extends('layout')
@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('title', 'Предложения по квартирам')
@push('styles')
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@section('content')
    <a class="btn btn-success" href="{{ route('apartments.create') }}">Создать предложение</a>
    <div class="apartments__wrapper">
        <div class="apartments__list">
            @if($aApartmentsData['elements'])
                @foreach($aApartmentsData['elements'] as $apartment)
                    <div class="apartment__item-outer">
                        <a href="{{ route('apartments.show', $apartment['apartment_object']) }}" class="apartment__item-link">
                            <div class="apartment__item">
                                <div class="apartment__item-wrapper">
                                    <div class="apartment__avatar">
                                        <img class="apartment__img lazy" src="https://www.vsnr.ru/upload/medialibrary/2fb/2fb912a06ba83c3a4edf69405433f638.jpg">
                                        <span class="apartment__label">{{ $apartment['type'] }}</span>
                                    </div>
                                    <div class="apartment__content">
                                        <h3 class="apartment__name">{{ $apartment['name'] }}</h3>
                                        <div class="apartment__tags">
                                            <span class="apartment__tag">{{ $apartment['price'] }}</span>
                                        </div>
                                        @foreach($apartment['mortgage_programs'] as $aMortgagePrograms)
                                            <p class="apartment__desc">По программе {{ $aMortgagePrograms['name'] . ' ежемесячный платеж ' . $aMortgagePrograms['month_price']}}</p>
                                        @endforeach
                                        <div class="form-row">
                                            <div class="col-6">
                                                <a class="btn btn-success" href="{{ route('apartments.edit', $apartment['apartment_object']) }}">Обновить</a>
                                            </div>
                                            <div class="col-6">
                                                <form method="POST" action="{{ route('apartments.destroy', $apartment['apartment_object']) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    {{ $aApartmentsData['query_result']->links() }}
@endsection
