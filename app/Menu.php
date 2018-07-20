<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function menuItems()
    {
        return $this->hasMany('App\MenuItem');
    }
}
