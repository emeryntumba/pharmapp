<?php

namespace App\Livewire;

use App\Models\StockMovement;
use Livewire\Component;

class StockList extends Component
{
    public $stocks;

    public function render()
    {
        $this->stocks = StockMovement::orderBy('created_at', 'desc')->get();
        return view('livewire.stock-list');
    }

    
}
