@extends('layouts.dashboard')

@section('content')
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            {{ __('Create Exchange') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mt-n10 container-xl">
        <div class="card mb-4">
            <div class="card-body">
                @include('pages.panel.exchanges.partials.exchangeForm')
            </div>
        </div>
    </div>
@endsection