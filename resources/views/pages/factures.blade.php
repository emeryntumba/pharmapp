@extends('layout.app')


@section('title', 'Facture Management')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-8 d-flex align-items-stretch">
            <livewire:facture-list/>
        </div>

        <div class="col-md-4">
            <livewire:facture-detail/>
        </div>

    </div>
</div>
@endsection
