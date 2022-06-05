@extends('layouts.app')

@section('content')
<div class="container">
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
                    <form action="{{ url('zamowauto/'.$car->id_cars) }}" method="post">
                    <td><input type="text" class="form-control" name="data_start"></td>
                    <td><input type="text" class="form-control" name="data_koniec"></td>
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