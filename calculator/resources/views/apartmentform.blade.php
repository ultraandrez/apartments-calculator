@extends('layout')

@push('styles')
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('title', isset($apartment) ? 'Редактирование предложения ' . $apartment->name: 'Создание предложения по квартире')

@section('content')
    <div class="container">
    <a class="btn btn-secondary mt-3" href="{{ route('apartments.index') }}">Назад</a>
    <form method="POST"
          @if(isset($apartment))
            action="{{ route('apartments.update', $apartment) }}"
          @else
            action="{{ route('apartments.store') }}"
          @endif
          class="mt-3"
    >
        @csrf
        @isset($apartment)
            @method('PUT')
        @endisset
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Название</label>
                <input name="name" type="text" class="form-control" value="{{ old('name', isset($apartment) ? $apartment->name : '') }}" placeholder="Название">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="price">Цена</label>
                <input name="price" type="number" class="form-control" value="{{ old('price', isset($apartment) ? $apartment->price : '')}}" placeholder="Цена">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apartment_type_id">Тип квартиры</label>
                <select name="apartment_type_id" id="inputState" class="form-control">
                    <option>Выберите...</option>
                    @foreach($apartmentTypes as $apartmentType)
                        <option value="{{ $apartmentType->id }}" {{ isset($apartment->apartment_type_id) && $apartment->apartment_type_id == $apartmentType->id ? 'selected' : '' }}>{{ $apartmentType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="mortgage">Ипотечное предложение</label>
                <select multiple name="mortgages[]" id="inputState" class="form-control">
                    <option>Выберите...</option>
                    @php $apartmentMortgages = isset($apartment) ? array_column($apartment->mortgages->toArray(), 'id') : [] @endphp
                    @foreach($mortgagesPrograms as $mortgagesProgram)
                        <option value="{{ $mortgagesProgram->id }}" {{ in_array($mortgagesProgram->id, $apartmentMortgages) ? 'selected' : '' }}>{{ $mortgagesProgram->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ isset($apartment) ? 'Сохранить' : 'Создать'}}</button>
    </form>
    </div>
@endsection
