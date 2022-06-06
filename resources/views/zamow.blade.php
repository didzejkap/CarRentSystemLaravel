@extends('layouts.app')

@section('content')
<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">
    {{ session('message') }} <a href="{{ url('wyswietlzamowieniawidokuser') }}" class="alert-link">Zamówienia</a> aby zobaczyć swoje zamówione samochody
    </div>
 @endif
 @if(session()->has('zajety'))
    <div class="alert alert-danger">
        {{ session('zajety') }}
    </div>
 @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Marka</td>
                    <td>Model</td>
                    <td>Paliwo</td>
                    <td>Moc</td>
                    <td>Rok</td>
                    <td>Cena za 1 dzień</td>
                    <td>Od</td>
                    <td>Do</td>
                </tr>
                </thead>
                <tbody>

                <tr>
                @foreach ($cars as $car)
                    <td>{{ $car ->marka }}</td>
                    <td>{{ $car ->model }}</td>
                    <td>{{ $car ->paliwo }}</td>
                    <td>{{ $car ->moc }}</td>
                    <td>{{ $car ->rok }}</td>
                    <td>{{ $car ->cena }}</td>
                    <form action="{{ url('sprawdzrezerwacje/'.$car->id_cars) }}" method="post">
                    {{ csrf_field() }}
                    <td><input type="date" class="form-control" name="data_start"></td>
                    <td><input type="date" class="form-control" name="data_koniec"></td>
                    <td><button type="submit" class="btn btn-danger btn-sm delete">Zamow</button></td>
                    </form>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$cars->links()}}
</div>
@endsection