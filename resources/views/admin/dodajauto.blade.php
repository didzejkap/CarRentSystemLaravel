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
    <p class="text-center fs-2">Dodaj Samochód</p>
    <form action="{{ url('wyslijauto') }}" method="post">
        {{ csrf_field() }}
        <div class="row justify-content-center gap-3">
            <div class="col-md-5">
                <label for="marka">Marka</label>
                <input type="text" class="form-control" name="marka">
            </div>

            <div class="col-md-5">
                <label for="model">Model</label>
                <input type="text" class="form-control" name="model">
            </div>

            <div class="col-md-5">
                <label for="Paliwo">Paliwo</label>
                <input type="text" class="form-control" name="paliwo">
            </div>

            <div class="col-md-5">
                <label for="Moc">Moc</label>
                <input type="text" class="form-control" name="moc">
            </div>

            <div class="col-md-5">
                <label for="Rok">Rok</label>
                <input type="text" class="form-control" name="rok">
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-primary">Wyslij</button>
            </div>
    </form>
</div>
</div>


@endsection