<?php

namespace App\Models;

use App\Observers\StockMovementObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([StockMovementObserver::class])]
class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
        'movement_type',
        'user_id',
        'motif',
        'etablissement_id',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
}
