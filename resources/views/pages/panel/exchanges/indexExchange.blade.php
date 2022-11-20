@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($exchanges as $exchange)
                <div class="col-md-6">
                    <a class="card my-4 text-decoration-none lift"
                       href="{{ route('panel.exchanges.show', $exchange) }}">
                        <div class="card-header">
                            {{ $exchange->full_name }}
                        </div>
                        <div class="card-body">
                            {{ __('Bought') }}
                            <b>{{ $exchange->amount . ' ' . $exchange->boughtCurrency->fullName }}</b>
                            {{ __('for') }} <b>{{ $exchange->price . ' ' . $exchange->withCurrency->fullName }}</b>
                            @if($exchange->bought_at)
                                <b>{{ $exchange->bought_at->diffForHumans() }}</b>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{ $exchanges->links() }}
    </div>
@endsection
