{{-- Currency picker. Prices marked data-price-etb anywhere on the page follow it (public/js/drongo-pricing.js). --}}
@inject('exchangeRates', 'App\Services\ExchangeRates')
@php($fx = $exchangeRates->current())

@once
    <script src="{{ asset('/js/drongo-pricing.js') }}"></script>
    <script>
        DrongoPricing.init(@json($fx + ['endpoint' => route('DrongoERP.exchangeRates')]));
    </script>
@endonce

<div class="drongo-currency">
    <label class="drongo-currency__label">
        <span>Currency</span>
        <select data-currency-select aria-describedby="{{ $noteId = 'rate-note-' . uniqid() }}">
            @foreach (config('packages.currencies') as $code => $label)
                <option value="{{ $code }}" @disabled(!isset($fx['rates'][$code]))>{{ $code }} · {{ $label }}</option>
            @endforeach
        </select>
    </label>
    <small class="drongo-currency__note" id="{{ $noteId }}" data-rate-note></small>
</div>
