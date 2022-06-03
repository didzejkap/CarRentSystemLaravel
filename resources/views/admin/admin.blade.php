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


        <div class="row justify-content-center gap-3">

            

            <div class="col-md-5">
            <form action="{{ url('dodajsamochod') }}" method="get">
        <button type="submit" class="btn btn-primary">Dodaj Samochod</button>
        </form>
            </div>

            <div class="col-md-5">
            <form action="{{ url('wyswietluser') }}" method="get">
        <button type="submit" class="btn btn-primary">Dodaj Uzytkownika</button>
        </form>
            </div>

            <div class="col-md-5">
            <form action="{{ url('usunsamochod') }}" method="get">
        <button type="submit" class="btn btn-primary">Usun Samochod</button>
        </form>
            </div>

            <div class="col-md-5">
            <form action="{{ url('usunuser') }}" method="get">
        <button type="submit" class="btn btn-primary">Usun Uzytkownika</button>
        </form>
            </div>
            <div class="col-md-5">
            <form action="{{ url('wyswietlsamochod') }}" method="get">
        <button type="submit" class="btn btn-primary">Wyswietl samochody</button>
        </form>
            </div>
            <div class="col-md-5">
            <form action="{{ url('wyswietluser') }}" method="get">
        <button type="submit" class="btn btn-primary">Wyswietl uzytkownikow</button>
        </form>
            </div>



        </div>

        </div>
</div>


@endsection