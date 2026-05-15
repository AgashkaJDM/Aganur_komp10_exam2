<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Modeli;


class HomeController extends Controller
{
    public function index() {
        $cars = Car::inRandomOrder()->limit(10)->get();

        $brands = Brand::inRandomOrder()->limit(10)->get();

        $models = Modeli::inRandomOrder()->limit(10)->get();
        
        // $categories = Category::all();
        return view('client.home.index', compact('cars', 'brands', 'models'));
    }


    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }



}
