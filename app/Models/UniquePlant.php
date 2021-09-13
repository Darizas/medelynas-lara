<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniquePlant extends Model
{
    use HasFactory;
    public function PlantType()
   {
       return $this->belongsTo('App\Models\PlantType', 'plant_id', 'id');
   }

}
