<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\User;
use Illuminate\Pagination\CursorPaginator;
use Carbon\Carbon;

class FrontendController extends Controller
{

    public function insertcar(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        

        $cars = new Car();
        $cars->marka = $request->input('marka');
        $cars->model = $request->input('model');
        $cars->paliwo = $request->input('paliwo');
        $cars->moc = $request->input('moc');
        $cars->rok = $request->input('rok');
        $cars->cena = $request->input('cena');

        $cars->save();
        return redirect('home');
    }
    }
    public function usunAutoWidok()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        $cars = Car::paginate(5);
        return view('admin.usunauto', ['cars' => $cars]);
    }
}
    public function usunAuto($id_cars)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        DB::delete('delete from cars where id_cars = ?', [$id_cars]);
        return redirect()->to ('usunsamochod');
    }
}
    public function wyswietlAuto()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        $cars = Car::paginate(5);
        //$cars = DB::select('select * from cars')->cursorPaginate(3);
        return view('admin.wyswietlauto', ['cars' => $cars]);
    }
}
    public function usunUserWidok()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        //$users = DB::select('select id,name,email,role from users');
        $users = User::paginate(5);
        return view('admin.usunuser', ['users' => $users]);
    }
}
    public function usunUserFunction($id)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->to ('usunuser');
    }
}
    public function wyswietlUser()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        $users = User::paginate(5);
        return view('admin.wyswietluser', ['users' => $users]);
    }
}
    public function dodajRoleWidok()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        $users = User::paginate(5);
        return view('admin.dodajrole', ['users' => $users]);
    }
}
    public function dodajRoleAdmin($id)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        DB::update('update users set role = 1 where id = ?', [$id]);
        return redirect()->to ('dodajrole');
    }
}
    public function dodajRoleUser($id)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            return view('home');
        }else{

        DB::update('update users set role = 0 where id = ?', [$id]);
        return redirect()->to ('dodajrole');
    }
}
public function zamowWidok()
{

    $cars = Car::paginate(8);
    return view('zamow', ['cars' => $cars]);

}
public function zamowAuto(Request $request, $id_cars)
{
    $id=Auth::user()->id;

    $data_start = $request->input('data_start');
    $data_koniec = $request->input('data_koniec');

    $jeden = Carbon::create($data_start);
    $dwa = Carbon::create($data_koniec);
    $jeden->diffInDays($dwa);

    DB::table('zamowienie')->insert([
        'suma' => '10',
        'id' => $id,
        'id_cars' => $id_cars,
        'data_start' => $data_start,
        'data_koniec' => $data_koniec
    ]);

    //return (true);
    return redirect()->to ('zamowwidok');
}
public function wyswietlZamowieniaWidok()
{
    $role=Auth::user()->role;
    if($role=='0')
    {
        return view('home');
    }else{

    $zamowienia = DB::table('zamowienie')
        ->select('id_zamowienie','suma','id','id_cars','data_start','data_koniec')
        ->get();


    return view('admin.wyswietlzamowienia', ['zamowienia' => $zamowienia]);
    }
}
public function usunZamowienie($id)
{
    $role=Auth::user()->role;
    if($role=='0')
    {
        return view('home');
    }else{

    DB::delete('delete from zamowienie where id_zamowienie = ?', [$id]);
    return redirect()->to ('wyswietlzamowieniawidok');
}
}
}