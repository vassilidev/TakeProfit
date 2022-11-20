@extends('layouts.dashboard')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            {{ $exchange->full_name }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button data-bs-toggle="modal"
                                data-bs-target="#createTrade"
                                class="btn lift btn-sm btn-success btn-icon">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl">
        <div class="card my-4">
            <div class="card-body">
                {{ __('Bought') }}
                <b>{{ $exchange->amount . ' ' . $exchange->boughtCurrency->fullName }}</b>
                {{ __('for') }} <b>{{ $exchange->price . ' ' . $exchange->withCurrency->fullName }}</b>
                @if($exchange->bought_at)
                    <b>{{ $exchange->bought_at->diffForHumans() }}</b>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="createTrade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create trade') }}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:trade.create-trade :exchange="$exchange"/>
                </div>
            </div>
        </div>
    </div>
@endsection
