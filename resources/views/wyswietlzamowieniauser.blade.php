@extends('layouts.app')

@section('content')
<div class="container">

</div>
<div class="container">
    <p class="text-center fs-2">Zamówienia</p>
    

            <div style="margin-bottom:50px">
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Numer Zamówienia</td>
                    <td>Numer samochodu</td>
                    <td>Suma do zaplaty</td>
                    <td>Data początkowa</td>
                    <td>Data końcowa</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($zamowienia as $zamowienie)
                <tr>
                    <td>{{ $zamowienie ->id_zamowienie }}</td>
                    <td>{{ $zamowienie ->id_cars }}</td>
                    <td>{{ $zamowienie ->suma }}</td>
                    <td>{{ $zamowienie ->data_start }}</td>
                    <td>{{ $zamowienie ->data_koniec }}</td>
                    <td><a href="{{ url('usunzamowienieuser/'.$zamowienie ->id_zamowienie) }}"><button class="btn btn-danger btn-sm delete">Usuń zamówienie</button></a></td>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>




</div>
</div>


@endsection