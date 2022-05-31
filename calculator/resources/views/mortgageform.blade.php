@extends('layout')

@push('styles')
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('title', isset($mortgage) ? 'Редактирование ипотеки ' . $mortgage->name: 'Создание предложения по ипотеке')

@section('content')
    <div class="container">
    <a class="btn btn-secondary mt-3" href="{{ route('apartments.index') }}">Назад</a>
    <form method="POST"
          @if(isset($mortgage))
              action="{{ route('mortgages.update', $mortgage) }}"
          @else
              action="{{ route('mortgages.store') }}"
          @endif
          class="mt-3"
    >
        @csrf
        @isset($mortgage)
            @method('PUT')
        @endisset
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Название</label>
                <input value="{{ old('price', isset($mortgage) ? $mortgage->name : '')}}" name="name" type="text" class="form-control" placeholder="Название">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="rate">Годовая ставка</label>
                <input value="{{ old('rate', isset($mortgage) ? $mortgage->rate : '')}}" name="rate" type="number" class="form-control" placeholder="Годовая ставка">
                @error('rate')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="max_years">Макс. лет</label>
                <input value="{{ old('max_years', isset($mortgage) ? $mortgage->max_years : '')}}" name="max_years" type="number" class="form-control" placeholder="Макс. лет">
                @error('max_years')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="initial_fee">Первоначальный взнос</label>
                <input value="{{ old('initial_fee', isset($mortgage) ? $mortgage->initial_fee : '')}}" name="initial_fee" type="number" class="form-control" placeholder="Первоначальный взнос">
                @error('initial_fee')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($mortgage) ? 'Сохранить' : 'Создать'}}</button>
    </form>
    </div>
@endsection
