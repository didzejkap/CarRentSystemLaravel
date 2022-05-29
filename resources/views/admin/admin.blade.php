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
    <p class="text-center fs-2">Menu</p>
        {{ csrf_field() }}
        <div class="col-md-12 text-center">
        <form action="{{ url('dodajsamochod') }}" method="get">
        <button type="submit" class="btn btn-primary">Dodaj Samochod</button>
        </div>
        </div>
</div>


@endsection