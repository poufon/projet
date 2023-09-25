<?php

namespace App\Models;

use App\Models\Poste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    public function postes()
    {

        return $this->hasMany(Poste::class);
    }
}
