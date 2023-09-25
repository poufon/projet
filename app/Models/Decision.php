<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Decision extends Model
{
    use HasFactory;

    protected $fillable = ['decision'];

    public function decis()
    {
        return $this->morphTo();
    }
    public function retard(): BelongsTo
    {
        return $this->belongsTo(Retard::class);
    }
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
    public function Contrat(): BelongsTo
    {
        return $this->belongsTo(Contrat::class);
    }
    public function absence(): BelongsTo
    {
        return $this->belongsTo(Absence::class);
    }

}
