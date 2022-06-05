@extends('layouts.app')

@section('content')
<div class="container">
</div>
<div class="container">
    <p class="text-center fs-2">Role</p>
    

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
                    <td><a href="{{ url('dodajroleadmin/'.$user->id) }}"><button class="btn btn-danger btn-sm delete">ADMIN</button></a></td>
                    <td><a href="{{ url('dodajroleuser/'.$user->id) }}"><button class="btn btn-primary btn-sm delete">USER</button></a></td>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$users->links()}}
</div>
</div>


@endsection