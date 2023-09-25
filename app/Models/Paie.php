<?php

namespace App\Models;

use App\Models\Contrat;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paie extends Model
{
    use HasFactory;
    public function employe()
    {

        return $this->belongsTo(Employe::class);
    }
    public function contrat()
    {

        return $this->belongsTo(Contrat::class);
    }
}
