<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compte extends Model
{
    use HasFactory;

    protected $table = 'comptes';

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'idutilisateur');
    }
}
