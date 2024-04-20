<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portefeuille extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'type_transaction',
        'raison',
        'etablissement_id',
    ];

    public function etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
}
