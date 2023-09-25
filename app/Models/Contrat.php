<?php

namespace App\Models;

use App\Models\Paie;
use App\Models\Poste;
use App\Models\Employe;
use App\Models\Decision;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;
    public function employes(): HasMany
    {
        return $this->hasMany(Employe::class);
    }
    public function poste(): BelongsTo
    {
        return $this->belongsTo(Poste::class);
    }
    public function paies()
    {
        return $this->HasMany(Paie::class);
    }
    // public function decisions()
    // {
    //     return $this->HasMany(Decision::class);
    // }
    public function decisions()
    {
        return $this->morphMany(Decision::class,'decis');
    }
    // public function employes()
    // {
    //     return $this->HasMany(Decision::class);
    // }
}
