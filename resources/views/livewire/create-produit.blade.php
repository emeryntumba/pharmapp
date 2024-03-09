<div>
    <button wire:click="ouvrirModal" class="btn btn-primary">Create</button>
    @if ($modalVisible)
    <div class="modal fade"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modal-title">Nouveau produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="fermerModal">Close</button>
                    <button type="button" class="btn btn-primary" >Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>
