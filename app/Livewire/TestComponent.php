<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Produit;

class TestComponent extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $produits = Produit::query()
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.test-component', compact('produits'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function addToInvoice($productId)
    {
        $this->dispatch('product-added', data: $productId);
    }
}
