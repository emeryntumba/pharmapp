<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserOperations extends Component
{
    use WithPagination;
    
    public $afficher = 10;

    public function render(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $stocks = StockMovement::where('etablissement_id', $etablissement)
                            ->where('user_id', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate($this->afficher);
        return view('livewire.user-operations',[
            'stocks' => $stocks,
        ]);;
    }
}
