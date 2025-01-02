@extends('..layout.transaction-layout')
@section('title', 'Customer Service')
@push('styles')
    @livewireStyles
@endpush
@section('content')
@livewire('cs-layer1')
@endsection
@push('scripts')
    @livewireScripts
@endpush
