<?php

namespace App\Models;

use App\Models\Employe;
use App\Models\Decision;
use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sanction extends Model
{
    use HasFactory;
    public function decisions()
    {
        return $this->morphMany(Decision::class,'decis');
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
