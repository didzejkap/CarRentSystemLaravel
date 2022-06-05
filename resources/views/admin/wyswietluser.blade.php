@extends('layouts.app')

@section('content')
<div class="container">
</div>
<div class="container">
    <p class="text-center fs-2">Użytkownicy</p>
    

            <div style="margin-bottom:50px">
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nazwa</td>
                    <td>email</td>
                    <td>rola</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user ->id }}</td>
                    <td>{{ $user ->name }}</td>
                    <td>{{ $user ->email }}</td>
                    <td>{{ $user ->role }}</td>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$users->links()}}
</div>
</div>


@endsection