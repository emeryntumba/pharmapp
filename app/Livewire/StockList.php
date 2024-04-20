<?php

namespace App\Livewire;

use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StockList extends Component
{
    public $stocks;

    public function render()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $this->stocks = StockMovement::where('etablissement_id', $etablissement)->orderBy('created_at', 'desc')->get();
        return view('livewire.stock-list');
    }


}
