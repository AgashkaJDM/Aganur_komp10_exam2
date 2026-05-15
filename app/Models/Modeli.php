<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modeli extends Model
{
    public function cars()
    {
        return $this->hasMany(Car::class, 'modeli_id');
    }

    public function getName()
    {
        $locale = app()->getLocale(); //tm

        if ($locale == 'tm') {
            return $this->name_tm ?: $this->name;
        } else if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        }
        return $this->name;
    }
}
