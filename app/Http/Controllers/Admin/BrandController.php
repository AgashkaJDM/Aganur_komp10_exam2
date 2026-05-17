<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;


class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(25);
        return view('admin.brands.index', compact('brands'));
    }


    public function create()
    {
        return view('admin.brands.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string'],
        ]);
        Brand::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.brands.index');
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> ['string']
        ]);

        $brand = Brand::findOrFail($id);

        $brand->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.brands.index');
    }

    public function destroy(Brand $id)
    {
        $id->delete();
        return redirect()->route('admin.brands.index');
    }





    
}
