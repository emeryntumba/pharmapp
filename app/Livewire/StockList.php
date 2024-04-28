<?php

namespace App\Livewire;

use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StockList extends Component
{
    use WithPagination;

    public $afficher = 10;

    public function render(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $stocks = StockMovement::where('etablissement_id', $etablissement)
                            ->orderBy('created_at', 'desc')
                            ->paginate($this->afficher);
        return view('livewire.stock-list',[
            'stocks' => $stocks,
        ]);
    }


}
