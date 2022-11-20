@php
    $route = !empty($exchange) ? route('panel.exchanges.update', $exchange) : route('panel.exchanges.store');
@endphp

<form action="{{ $route }}" method="POST">
    @csrf
    @isset($exchange)
        @method('PUT')
    @endisset

    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="bought_currency_id">{{ __('Bought') }}</label>
            <select class="form-select" id="bought_currency_id" name="bought_currency_id"></select>
            <x-form.small-error name="bought_currency_id"/>
        </div>
        <div class="col-lg-6 mb-3">
            <label for="with_currency_id">{{ __('With') }}</label>
            <select class="form-select" id="with_currency_id" name="with_currency_id"></select>
            <x-form.small-error name="with_currency_id"/>
        </div>
        <div class="col-lg-4 form-floating mb-3">
            <input type="number"
                   step="0.1"
                   id="amount"
                   name="amount"
                   placeholder="0"
                   value="{{ old('amount', $exchange->amount ?? '') }}"
                   class="form-control">
            <label for="amount">{{ __('How many ?') }}</label>
            <x-form.small-error name="amount"/>
        </div>
        <div class="col-lg-4 form-floating mb-3">
            <input type="number"
                   step="0.1"
                   id="price"
                   name="price"
                   placeholder="0"
                   value="{{ old('price', $exchange->price ?? '') }}"
                   class="form-control">
            <label for="price">{{ __('Price ?') }}</label>
            <x-form.small-error name="price"/>
        </div>
        <div class="col-lg-4 form-floating mb-3">
            <input type="datetime-local"
                   id="bought_at"
                   name="bought_at"
                   value="{{ old('date', $exchange->bought_at ?? '') }}"
                   class="form-control">
            <label for="bought_at">{{ __('When ?') }}</label>
            <x-form.small-error name="bought_at"/>
        </div>
        @isset($exchange)
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }} <i class="fas fa-pen"></i>
            </button>
        @else
            <button type="submit" class="btn btn-success">
                {{ __('Create') }} <i class="ms-2 fas fa-paper-plane"></i>
            </button>
        @endisset
    </div>
</form>

@push('js')
    <script>
        $.get("{{ route('search.currencies.getCryptoData') }}")
            .then(data => {
                    $('#bought_currency_id').select2({
                        data,
                        width: '100%',
                        theme: 'bootstrap-5',
                    });
                }
            );

        $.get("{{ route('search.currencies.getAllData') }}")
            .then(data => {
                    $('#with_currency_id').select2({
                        data,
                        width: '100%',
                        theme: 'bootstrap-5',
                    });
                }
            );
    </script>
@endpush