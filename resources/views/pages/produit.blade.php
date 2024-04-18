@extends('layout.app')

@section('title', 'Gestion Produit')

@section('content')
    <div class="container-fluid">
                @if (session('maj'))
                    <div class="alert alert-success">
                        {{ session('maj') }}
                    </div>
                @elseif (session('enregistrement'))
                    <div class="alert alert-success">
                        {{ session('enregistrement') }}
                    </div>
                @endif

        <livewire:produit-component/>

    </div>

@endsection
