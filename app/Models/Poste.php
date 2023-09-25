<?php

namespace App\Models;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poste extends Model
{
    use HasFactory;
    public function service()
    {

        return $this->belongsTo(Service::class);
    }
    public function employes()
    {

        return $this->belongsToMany(Employe::class, 'occupers','employe_id','poste_id');
    }

}
