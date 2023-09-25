<?php

namespace App\Models;

use App\Models\Paie;

use App\Models\Conge;
use App\Models\Poste;
use App\Models\Retard;
use App\Models\Absence;
use App\Models\Contrat;
use App\Models\Horaire;
use App\Models\Sanction;
use App\Models\Formation;
use App\Models\Permission;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation_employe_stagiaire;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employe extends Model
{
    use HasFactory;
    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }
    public function retards()
    {
        return $this->hasMany(Retard::class);
    }
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
    public function contrat(): BelongsTo
    {
        return $this->belongsTo(Contrat::class);
    }
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function conges()
    {
        return $this->hasMany(Conge::class);
    }
    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }
    public function formation(): BelongsToMany
    {
        return $this->belongsToMany(Formation::class);
    }
    public function paies()
    {
        return $this->hasMany(Paie::class);
    }
    public function formations()
    {
        return $this->morphMany(Formation::class,'format');
    }

    public function postes()
    {

        return $this->belongsToMany(Poste::class, 'occupers','employe_id','poste_id');
    }

}
