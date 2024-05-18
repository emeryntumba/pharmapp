<div class="col-lg-4 col-md-6 footer-newsletter">
    <h4>S'inscrire à la Newsletter</h4>
    <p>Restez au courant de nos dernières actualités et mises à jour</p>
    <form>
      <input type="email" wire:model="email">
      <button type="button" class="btn btn-primary rounded" wire:click="submit">S'inscrire</button>
    </form>
    @if ($confirmationMessage)
            <p>{{ $confirmationMessage }}</p>
    @endif
</div>
