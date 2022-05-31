@extends('layout')

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="author-page">
    <div class="author__info">
        <div class="main-container">
            <div class="author__info-wrapper">
                <img src="https://www.vsnr.ru/upload/medialibrary/2fb/2fb912a06ba83c3a4edf69405433f638.jpg" alt="" class="author__img">
                <div class="author__content">
                    <h1 class="author__name">{{ $apartmentData['name'] }}</h1>
                    <img src="https://www.vsnr.ru/upload/medialibrary/2fb/2fb912a06ba83c3a4edf69405433f638.jpg" alt="" class="author__img-mobile">
                    <p class="author__description">ТЕКСТ ТЕКСТ ТЕКСТ</p>
                </div>
            </div>
            <div class="author__more-wrapper">
                <h3 class="author__more-title">Подробнее о предложении</h3>
                <div class="author__more-container">
                    <div class="author__more-head">Тип квартиры</div>
                    <div class="author__more-content">
                        <p class="author__more-tag">{{ $apartmentData['type'] }}</p>
                    </div>
                    <div class="author__more-head">Ипотечные предложения </div>
                    <div class="author__more-content">
                        <div class="author__years-container">
                            @if(isset($apartmentData['mortgage_programs']))
                                @foreach($apartmentData['mortgage_programs'] as $mortgageProgram)
                                    <span class="author__years">{{ $mortgageProgram['name'] }}</span>
                                    <span class="author__company">{{ $mortgageProgram['month_price'] }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
