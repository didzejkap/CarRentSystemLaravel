@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Zostałeś zalogowany jako Admin!</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <p class="text-center fs-2">Usun Samochód</p>
    

            <div style="margin-bottom:50px">
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Nazwa produktu</td>
                    <td>Producent</td>
                    <td>Cena</td>
                    <td>Opis</td>
                    <td>Ilość</td>
                    <td>Kategoria</td>
                    <td>Zdjęcie</td>
                </tr>
                @foreach ($cars as $car)
                <tr>
                    <td>{{ $car['id'] }}</td>
                    <td>{{ $car['marka'] }}</td>
                    <td>{{ $car['model'] }}</td>
                    <td>{{ $car['paliwo'] }}</td>
                </tr>
</table>
                @endforeach


</div>
</div>


@endsection