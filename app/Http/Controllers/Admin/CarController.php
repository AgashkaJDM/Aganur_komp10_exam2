<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(25);
        return view('admin.cars.index', compact('cars'));
    }


    public function create()
    {
        return view('admin.cars.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'brand_id'=>['integer', 'required'],
            'modeli_id'=>['integer', 'required'],
            'name' => ['string', 'max:50'],
            'year' => ['string', 'max:9'],
            'description' => ['string'],
            'engine'=>['string'],
            'wheel_drive'=>['string', 'max:13'],
        ]);
        Car::create([
            'brand_id'=>$request->brand_id,
            'modeli_id'=>$request->modeli_id,
            'name'=>$request->name,
            'year'=>$request->year,
            'description'=>$request->description,
            'engine'=>$request->engine,
            'wheel_drive'=>$request->wheel_drive,
        ]);
        return redirect()->route('admin.cars.index');
    }


    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id'=>['integer', 'required'],
            'modeli_id'=>['integer', 'required'],
            'name' => ['string', 'max:50'],
            'year' => ['string', 'max:9'],
            'description' => ['string'],
            'engine'=>['string'],
            'wheel_drive'=>['string', 'max:13'],
        ]);

        $car = Car::findOrFail($id);

        $car->update([
            'brand_id' => $request->brand_id,
            'modeli_id' => $request->modeli_id,
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'engine' => $request->engine,
            'wheel_drive' => $request->wheel_drive,
        ]);

        return redirect()->route('admin.cars.index');
    }

    public function destroy(Car $id)
    {
        $id->delete();
        return redirect()->route('admin.cars.index');
    }

}
