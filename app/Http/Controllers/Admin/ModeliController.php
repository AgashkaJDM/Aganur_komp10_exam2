<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Modeli;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;

class ModeliController extends Controller
{
    public function index()
    {
        $models = Modeli::paginate(25);

        return view('admin.models.index', compact('models'));
    }

    public function create()
    {
        return view('admin.models.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => ['integer','required'],
            'name' => ['string'],
        ]);
        Modeli::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ]);
        return redirect()->route('admin.models.index');
    }


    public function edit($id)
    {
        $model = Modeli::findOrFail($id);
        return view('admin.models.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => ['integer','required'],
            'name'=> ['string']
        ]);

        $model = Modeli::findOrFail($id);

        $model->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name
        ]);

        return redirect()->route('admin.models.index');
    }

    public function destroy(Modeli $id)
    {
        $id->delete();
        return redirect()->route('admin.models.index');
    }

}
