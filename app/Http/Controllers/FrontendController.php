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
        $cars->save();
        return redirect('admin.admin');
        

       /* $marka = $request->input('marka');
        $model = $request->input('model');
        $paliwo = $request->input('paliwo');
        $moc = $request->input('moc');
        $rok = $request->input('rok');
        
        $data=array('marka'=>$marka, 'model'=>$model, 'paliwo'=>$paliwo, 'moc'=>$moc,'rok'=>$rok);
        DB::table('cars')->insert($data);
*/
        
        
           /* $this->validate(request(), [
                'marka' => 'required',
                'model' => 'required',
                'paliwo' => 'required',
                'moc' => 'required',
                'rok' => 'required',
            ]/*, [
                'product_name.required' => "Niepoprawna nazwa",
                'product_brand.required' => "Niepoprawny producent",
                'product_price.required' => "Niepoprawna cena",
                'product_description.required' => "Niepoprawny opis",
                'product_availability.required' => "Niepoprawna ilość",
                'product_category.required' => "Niepoprawna kategoria",
                'image.required' => "Niepoprawna ścieżka do zdjęcia"
            ]);
    
            Car::create(request([
                'marka', 'model', 'paliwo', 'moc',
                'rok'
            ]));
    
            return redirect()->to('admin.admin');
        */

    }
}