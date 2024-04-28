<?php

namespace App\Observers;

use App\Models\StockMovement;
use App\Notifications\StockAlertNotification;

class StockMovementObserver
{
    /**
     * Handle the StockMovement "created" event.
     */
    public function created(StockMovement $stockMovement): void
    {
        $produit = $stockMovement->produit;
        $stockState = $produit->stock_state;

        if ($stockState <= 10) {
            $etablissement = $produit->etablissement;
            $users = $etablissement->gestionnaires->pluck('user');

            foreach ($users as $user) {
                $user->notify(new StockAlertNotification($produit));
            }
        }
    }

    /**
     * Handle the StockMovement "updated" event.
     */
    public function updated(StockMovement $stockMovement): void
    {
        //
    }

    /*
     * Handle the StockMovement "deleted" event.
     */
    public function deleted(StockMovement $stockMovement): void
    {
        //
    }

    /**
     * Handle the StockMovement "restored" event.
     */
    public function restored(StockMovement $stockMovement): void
    {
        //
    }

    /**
     * Handle the StockMovement "force deleted" event.
     */
    public function forceDeleted(StockMovement $stockMovement): void
    {
        //
    }
}
