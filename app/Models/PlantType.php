<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantType extends Model
{
    use HasFactory;

    public function UniquePlant()
   {
       return $this->hasMany('App\Models\UniquePlant', 'plant_id', 'id')->count();
   }

   public function checkBoxActivation()
    {
        return ($this->is_yearling )? "checked" : "";
        
    }

}
