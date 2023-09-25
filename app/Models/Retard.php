<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    use HasFactory;
    public function decisions()
{
    return $this->morphMany(Decision::class,'decis');
}
public function personnels()
{

    return $this->hasMany(Personnel::class);
}
public function employe()
{

    return $this->belongsTo(Employe::class);
}
// public function stagiaire()
// {

//     return $this->belongsTo(Stagiaire::class);
// }
}
