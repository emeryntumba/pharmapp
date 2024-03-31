@extends('layout.app')

@section('title', 'Stock Movements')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 d-flex align-items-stretch">
            <livewire:stock-list/>
        </div>


    </div>
</div>

@endsection
