@extends('layout.app')

@section('title', 'User Profile | PharmApp')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <livewire:user-profile/>
        </div>
        <div class="col-md-8">
            <livewire:user-password/>
        </div>
    </div>
</div>
@endsection
