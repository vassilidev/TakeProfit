<form wire:submit.prevent="createTrade">
    <div>
        <h1>{{ __('Amount') }}</h1>
        <h6>
            <b>{{ $percentAmount }}%</b> {{ __('of') }} {{ $exchange->amount }} {{ $exchange->boughtCurrency->symbol }}
            ({{ $amount }} {{ $exchange->boughtCurrency->symbol }})
        </h6>
        <div class="row">
            <div class="col-lg-6 my-4">
                <input type="range"
                       min="0"
                       max="100"
                       wire:model="percentAmount"
                       wire:change="updateAmount"
                       class="form-range">
                <x-form.small-error name="percentAmount"/>
            </div>
            <div class="col-lg-6 my-4">
                <input type="number"
                       min="0"
                       max="{{ $exchange->amount }}"
                       wire:model="amount"
                       wire:change="updatePercentAmount"
                       class="form-control">
                <x-form.small-error name="amount"/>
            </div>
        </div>
    </div>
    <div>
        <h1>{{ __('Resale price') }}</h1>
        <h4>{{ __('Bought for') }} {{ $exchange->price }} {{ $exchange->withCurrency->symbol }}</h4>
        <b class="h6 text-success">
            {{ $resalePercent }}% <i class="fas fa-arrow-up"></i>
        </b>
        <div class="my-4">
            <input type="number"
                   min="{{ $exchange->price }}"
                   wire:model="resalePrice"
                   wire:change="updateResalePercent"
                   class="form-control">
            <x-form.small-error name="resalePrice"/>
        </div>
    </div>
</form>