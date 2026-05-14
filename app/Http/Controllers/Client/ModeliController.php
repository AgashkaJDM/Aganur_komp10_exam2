<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modeli;

class ModeliController extends Controller
{
    public function index(){
        $modeli = Modeli::paginate(25);
        return view('client.models.index', compact('modeli'));
    }


    public function show($id){
        $model = Modeli::findOrFail($id);
        return view('client.models.show', compact('model'));
    }

}

