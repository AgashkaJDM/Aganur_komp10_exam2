<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'brandId'=>['nullable', 'integer'],
            'modeliId'=>['nullable', 'integer'],
        ]);

        $f_brandId = $request->brandId ?? null;
        $f_modeliId = $request->modeliId ?? null;

        $cars = Car::when(
            $f_brandId,
            function($query) use ($f_brandId) {
                return $query->where('brand_id', $f_brandId);
            } 
        )->when(
            $f_modeliId,
            function($query) use ($f_modeliId) {
                return $query->where('model_id', $f_modeliId);
            })
                ->inRandomOrder()
                ->paginate(25)
                ->withQueryString();
        return view('client.cars.index', compact('cars'));

    }


    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('client.cars.show', compact('car'));
    }

        
}
