<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function index(){
        $brands = Brand::paginate(25);
        return view('client.brands.index', compact('brands'));
    }

    public function show($id){
        $brand = Brand::findOrFail($id);
        return view('client.brands.show', compact('brand'));
    }
    
}
