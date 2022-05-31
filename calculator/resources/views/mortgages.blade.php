@extends('layout')
@section('title', 'Программы ипотек')
@push('styles')
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Ставка в год(%)</th>
            <th scope="col">Лет (макс)</th>
            <th scope="col">Первоначальный взнос(%)</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mortgagesData as $mortgage)
            <tr>
                <th scope="row">{{ $mortgage->id }}</th>
                <td>{{ $mortgage->name }}</td>
                <td>{{ $mortgage->rate }}%</td>
                <td>{{ $mortgage->max_years }} лет</td>
                <td>{{ $mortgage->initial_fee }}%</td>
                <td>
                    <form method="POST" class="row" action="{{ route('mortgages.destroy', $mortgage) }}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success mr-2" href="{{ route('mortgages.edit', $mortgage) }}">Обновить</a>
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $mortgagesData->links() }}
@endsection
