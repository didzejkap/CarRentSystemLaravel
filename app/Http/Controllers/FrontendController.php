<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class FrontendController extends Controller
{
    public function insertcar(Request $request)
    {
       
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
    public function usunAutoWidok()
    {
        $cars = DB::select('select * from cars');
        return view('admin.usunauto', ['cars' => $cars]);
    }
    public function usunAuto($id_cars)
    {
        DB::delete('delete from cars where id_cars = ?', [$id_cars]);
        return redirect()->to ('usunsamochod');
    }
    public function wyswietlAuto()
    {
        $cars = DB::select('select * from cars');
        return view('admin.wyswietlauto', ['cars' => $cars]);
    }
    public function usunUserWidok()
    {
        $users = DB::select('select id,name,email,role from users');
        return view('admin.usunuser', ['users' => $users]);
    }
    public function usunUserFunction($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->to ('usunuser');
    }
    public function wyswietlUser()
    {
        $users = DB::select('select id,name,email,role from users');
        return view('admin.wyswietluser', ['users' => $users]);
    }
    public function zamowWidok()
    {
        $cars = DB::select('select * from cars');
        return view('zamow', ['cars' => $cars]);
    }
    public function zamowauto(Request $request, $id_cars)
    {
        Auth::user()->name;
        
        $zamowienie->suma = $request->input('marka');

        $cars->save();


        return redirect()->to ('zamowwidok');
    }
    public function dodajRoleWidok()
    {
        $users = DB::select('select id,name,email,role from users');
        return view('admin.dodajrole', ['users' => $users]);
    }
    public function dodajRoleAdmin($id)
    {
        DB::update('update users set role = 1 where id = ?', [$id]);
        return redirect()->to ('dodajrole');
    }
    public function dodajRoleUser($id)
    {
        DB::update('update users set role = 0 where id = ?', [$id]);
        return redirect()->to ('dodajrole');
    }
}