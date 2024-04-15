<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPokemon extends Model
{
    protected $table='pokemon';
    protected $fillable=['name', 'type1', 'type2', 'height', 'weight', 'sprite'];
}
