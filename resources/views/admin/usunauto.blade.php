@extends('layouts.app')

@section('content')
<div class="container">

</div>
<div class="container">
    <p class="text-center fs-2">Usun Samochód</p>
    

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
                    <td><a href="{{ url('usunauto/'.$car->id_cars) }}"><button class="btn btn-danger btn-sm delete">X</button></a></td>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>



</div>
</div>


@endsection