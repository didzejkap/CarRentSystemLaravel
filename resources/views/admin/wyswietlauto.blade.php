@extends('layouts.app')

@section('content')
<div class="container">
</div>
<div class="container">
    <p class="text-center fs-2">Samochody w bazie danych:</p>
    

            <div style="margin-bottom:50px">
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Marka</td>
                    <td>Model</td>
                    <td>Paliwo</td>
                    <td>Moc</td>
                    <td>Rok</td>
                    <td>Cena</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td>{{ $car ->id_cars }}</td>
                    <td>{{ $car ->marka }}</td>
                    <td>{{ $car ->model }}</td>
                    <td>{{ $car ->paliwo }}</td>
                    <td>{{ $car ->moc }}</td>
                    <td>{{ $car ->rok }}</td>
                    <td>{{ $car ->cena }}</td>

                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$cars->links()}}
</div>
</div>

@endsection