@extends('layouts.app')

@section('content')

    <div class="container">
  <div class="row">
    <div class="col">
    <form action="{{ url('zamowwidok') }}" method="get">
        <button type="submit" class="btn btn-primary">Zamow samochod</button>
        </form>
    </div>
    <div class="col">
    <form action="{{ url('wyswietlzamowieniawidokuser') }}" method="get">
        <button type="submit" class="btn btn-primary">Twoje zamowienia</button>
        </form>
    </div>
  </div>

</div>
@endsection