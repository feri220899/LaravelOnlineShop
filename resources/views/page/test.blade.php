@extends('..layout.transaction-layout')
@section('title', 'Products Control')
@push('styles')
    @livewireStyles
@endpush
@section('content')
    @livewire('show-posts')
@endsection
@push('scripts')
    @livewireScripts
@endpush
