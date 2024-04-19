<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
                        'nom_etablissement',
                        'rccm',
                        'id_nat',
                        'num_impot',
                        'ordre_operation',
                        'tva',
                        'devise',
                        'adresse',
                    ];

    public function gestionnaires()
    {
        return $this->hasMany(Gestionnaire::class);
    }
}
