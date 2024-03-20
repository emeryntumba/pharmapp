<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
        'movement_type',
        'user_id',
        'motif',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
