@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Zostałeś zalogowany!</h4>
            </div>
        </div>
    </div>
    <div style="margin-bottom:50px">
            </div>
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
                    <td><input type="text" class="form-control" name="moc"></td>
                    <td><input type="text" class="form-control" name="moc"></td>
                    <td><a href="{{ url('zamowauto/'.$car->id_cars) }}"><button class="btn btn-danger btn-sm delete">Zamow</button></a></td>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
</div>
@endsection