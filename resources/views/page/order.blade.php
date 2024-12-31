@extends('..layout.buyer-layout')
@section('title', 'Online Shop')
@push('styles')
    @livewireStyles
@endpush
@section('content')
    <section>
        <div class="container px-4">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if (session()->has('message'))
                    <div class="alert alert-{{ session('message_type') }}">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    @livewireScripts
@endpush
