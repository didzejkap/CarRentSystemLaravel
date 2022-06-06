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

    $cena = DB::table('cars')
    ->select('cena')
    ->where('id_cars', $id_cars)
    ->get();

    $jeden = Carbon::create($data_start);
    $dwa = Carbon::create($data_koniec);

    //$from = Carbon::parse($cleanStart);
    //$to = Carbon::parse($cleanFinish);
    /*(int)*/$jeden->diffInDays($dwa);
    //$do_zaplaty = $cena * $jeden->diffInDays($dwa);

    DB::table('zamowienie')->insert([
        'suma' => $jeden->diffInDays($dwa),
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
public function sprawdzRezerwacje(Request $request, $id_cars){

    $id=Auth::user()->id;
    $Data_wypozyczenia = $request->input('data_start');
    $Data_zwrotu = $request->input('data_koniec');

    $Data_wypozyczeniaa=$Data_wypozyczenia;
    $Data_zwrotu1=date('Y-m-d', strtotime("+1 day", strtotime(str_replace('/', '-', $Data_zwrotu))));
    str_replace('/', '-', $Data_wypozyczeniaa);
    $date=DB::table('zamowienie')->where('id_cars', $id_cars)->get();

    foreach($date as $dates){ 
        while($Data_wypozyczeniaa !== $Data_zwrotu1){ 
            if(($Data_wypozyczeniaa >= str_replace('/', '-', $dates->data_start))&&($Data_wypozyczeniaa <= str_replace('/', '-', $dates->data_koniec))){
                return redirect()->to ('zamowwidok')->with('zajety', 'Nie możesz zarezerwować samochodu w te dni!');
            }
            $Data_wypozyczeniaa=date('Y-m-d', strtotime("+1 day", strtotime($Data_wypozyczeniaa)));
        }
    }
        $cena = DB::table('cars')
        ->select('cena')
        ->where('id_cars', $id_cars)
        ->get();
    
        $days = array();
        $datawypo = Carbon::create($Data_wypozyczenia);
        $dawazwr = Carbon::create($Data_zwrotu);
    
        //$from = Carbon::parse($cleanStart);
        //$to = Carbon::parse($cleanFinish);
        $roznica = $datawypo->diffInDays($dawazwr);
     
        DB::table('zamowienie')->insert([
            'suma' => "99",
            'id' => $id,
            'id_cars' => $id_cars,
            'data_start' => $datawypo,
            'data_koniec' => $dawazwr
        ]);
    
        //return (true);
        //return redirect()->to ('zamowwidok')->with('success', 'Zamówiłeś samochód! Przejdz do "Zamówienia" aby zobaczyć swoje zamówione samochody');
        return redirect()->back()->with(['message' => 'Zamówiłeś samochód! Przejdz do ']);
    
}
public function wyswietlZamowieniaWidokUser()
{
    $id=Auth::user()->id;
    $zamowienia = DB::table('zamowienie')
        ->select('id_zamowienie','suma','id','id_cars','data_start','data_koniec')
        ->where('id', $id)
        ->get();


    //$cars = DB::table('cars')->select('id_zamowienie','suma','id','id_cars','data_start','data_koniec')->where('id', $id)
    //->get();


    return view('wyswietlzamowieniauser', ['zamowienia' => $zamowienia]);
    
}
public function usunZamowienieUser($id_zamowienie)
{
    
    DB::delete('delete from zamowienie where id_zamowienie = ?', [$id_zamowienie]);
    return redirect()->to ('wyswietlzamowieniawidokuser');

}
 
}

