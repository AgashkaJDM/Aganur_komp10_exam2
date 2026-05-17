<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'modeli_id',
        'name',
        'year',
        'description',
        'engine',
        'wheel_drive',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function modeli()
    {
        return $this->belongsTo(Modeli::class, 'modeli_id');
    }
}
