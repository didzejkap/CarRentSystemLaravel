@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <form action="{{ url('zamowwidok') }}" method="get">
        <button type="submit" class="btn btn-primary btn-lg">Zamow samochod</button>
        </form>
    </div>
    <div style="margin-bottom:50px">
            </div>

</div>
@endsection