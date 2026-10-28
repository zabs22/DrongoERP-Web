@extends('layout/mainlayout')

@php
    use App\Support\PackageCatalog;

    $multiSection = count($package['sections']) > 1;
    // The Special package adds a one-time setup fee (ETB) to the selected modules.
    $setupFee = $package['slug'] === 'special' ? 9999 : null;
@endphp

@section('page-content')
<section class="pk-page">
    <div class="container">
        <a class="pk-back" href="{{ $inSignup ? route('DrongoERP.choosePackage') : route('DrongoERP.home') . '#pricing' }}">
            <i class="fas fa-arrow-left" aria-hidden="true"></i> All packages
        </a>

        <header class="pk-hero">
            <img class="pk-hero__image" src="{{ asset($package['image']) }}" alt="">
            <div>
                <p class="pk-hero__eyebrow">DrongoERP package</p>
                <h1>{{ $package['name'] }}</h1>
                <p class="pk-hero__tagline">{{ $package['tagline'] }}</p>
                <ul class="pk-perks">
                    @foreach ($package['perks'] as $perk)
                        <li><img src="{{ asset('/images/v3/check.png') }}" alt="">{{ $perk }}</li>
                    @endforeach
                </ul>
            </div>
        </header>

        <form id="pk-form" method="POST" action="{{ route('DrongoERP.package.select', $package['slug']) }}">
            @csrf
            <input type="hidden" name="section" value="{{ $activeSection }}" data-section-input>

            <div class="pk-toolbar">
                <div>
                    <h2 class="pk-toolbar__title">Choose your modules</h2>
                    <p class="pk-toolbar__hint">Tap a tile to switch it on or off, or open <strong>Customize</strong> to pick individual features.</p>
                </div>
                @include('partials.currency-select')
            </div>

            @if ($multiSection)
                <div class="pk-tabs" role="tablist" aria-label="Business type">
                    @foreach ($package['sections'] as $section)
                        <button type="button" role="tab" class="pk-tab" data-tab="{{ $section['key'] }}"
                                aria-selected="{{ $section['key'] === $activeSection ? 'true' : 'false' }}">
                            {{ $section['title'] ?: ucfirst($section['key']) }}
                        </button>
                    @endforeach
                </div>
            @endif

            @if ($package['included'])
                <details class="pk-included">
                    <summary><strong>{{ count($package['included']) }} services included free</strong> — always part of your package</summary>
                    <ul>
                        @foreach ($package['included'] as $service)
                            <li title="{{ $service['description'] }}">{{ $service['name'] }}</li>
                        @endforeach
                    </ul>
                </details>
            @endif

            @foreach ($package['sections'] as $section)
                <div class="pk-grid" data-section="{{ $section['key'] }}" @if ($section['key'] !== $activeSection) hidden @endif>
                    @foreach ($section['groups'] as $group)
                        @php($dialogId = 'dlg-' . $section['key'] . '-' . $group['key'])
                        <article class="pk-tile" data-tile>
                            <div class="pk-tile__head">
                                <img class="pk-tile__icon" src="{{ asset(PackageCatalog::icon($group['name'])) }}" alt="">
                                <label class="pk-switch">
                                    <input type="checkbox" data-tile-toggle aria-label="Include {{ $group['name'] }}">
                                    <span aria-hidden="true"></span>
                                </label>
                            </div>
                            <h3 class="pk-tile__name">{{ $group['name'] }}</h3>
                            <p class="pk-tile__meta"><span data-tile-count></span> of {{ count($group['modules']) }} features</p>
                            <p class="pk-tile__price"><span data-tile-subtotal></span><small>/ mo</small></p>
                            <button type="button" class="pk-tile__more" data-open="{{ $dialogId }}">Customize <i class="fas fa-sliders-h" aria-hidden="true"></i></button>

                            <dialog class="pk-dialog" id="{{ $dialogId }}" aria-labelledby="{{ $dialogId }}-title">
                                <div class="pk-dialog__head">
                                    <img src="{{ asset(PackageCatalog::icon($group['name'])) }}" alt="">
                                    <h3 id="{{ $dialogId }}-title">{{ $group['name'] }}</h3>
                                    <button type="button" class="pk-dialog__close" data-close aria-label="Close">&times;</button>
                                </div>
                                <ul class="pk-dialog__list">
                                    @foreach ($group['modules'] as $module)
                                        <li>
                                            <label class="pk-module">
                                                <input type="checkbox" name="modules[]" value="{{ $module['id'] }}" data-price="{{ $module['price'] }}" @checked($module['default'])>
                                                <span class="pk-module__check" aria-hidden="true"></span>
                                                <span class="pk-module__body">
                                                    <span class="pk-module__top">
                                                        <span class="pk-module__name">{{ $module['name'] }}</span>
                                                        @if ($module['price'] > 0)
                                                            <span class="pk-module__price" data-price-etb="{{ $module['price'] }}"></span>
                                                        @else
                                                            <span class="pk-module__price pk-module__price--free">Free</span>
                                                        @endif
                                                    </span>
                                                    @if ($module['description'])
                                                        <span class="pk-module__desc">{{ $module['description'] }}</span>
                                                    @endif
                                                </span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="pk-dialog__foot">
                                    <span>Subtotal <strong data-tile-subtotal></strong> / mo</span>
                                    <button type="button" class="zubuz-default-btn pill" data-close><span>Done</span></button>
                                </div>
                            </dialog>
                        </article>
                    @endforeach

                    @foreach ($section['addons'] as $addon)
                        @php($dialogId = 'dlg-' . str_replace(':', '-', $addon['id']))
                        <article class="pk-tile pk-tile--addon" data-tile>
                            <div class="pk-tile__head">
                                <img class="pk-tile__icon" src="{{ asset(PackageCatalog::icon($addon['name'])) }}" alt="">
                                <label class="pk-switch">
                                    <input type="checkbox" name="modules[]" value="{{ $addon['id'] }}" data-price="{{ $addon['price'] }}" @checked($addon['default'])
                                           aria-label="Include {{ $addon['name'] }}">
                                    <span aria-hidden="true"></span>
                                </label>
                            </div>
                            <h3 class="pk-tile__name">{{ $addon['name'] }}</h3>
                            <p class="pk-tile__meta">Add-on</p>
                            <p class="pk-tile__price">
                                @if ($addon['price'] > 0)
                                    <span data-price-etb="{{ $addon['price'] }}"></span><small>/ mo</small>
                                @else
                                    <span>Free</span>
                                @endif
                            </p>
                            @if ($addon['description'])
                                <button type="button" class="pk-tile__more" data-open="{{ $dialogId }}">Details <i class="fas fa-info-circle" aria-hidden="true"></i></button>
                                <dialog class="pk-dialog pk-dialog--small" id="{{ $dialogId }}" aria-labelledby="{{ $dialogId }}-title">
                                    <div class="pk-dialog__head">
                                        <img src="{{ asset(PackageCatalog::icon($addon['name'])) }}" alt="">
                                        <h3 id="{{ $dialogId }}-title">{{ $addon['name'] }}</h3>
                                        <button type="button" class="pk-dialog__close" data-close aria-label="Close">&times;</button>
                                    </div>
                                    <p class="pk-dialog__text">{{ $addon['description'] }}</p>
                                    <div class="pk-dialog__foot">
                                        <span>
                                            @if ($addon['price'] > 0)
                                                <strong data-price-etb="{{ $addon['price'] }}"></strong> / mo
                                            @else
                                                <strong>Free</strong>
                                            @endif
                                        </span>
                                        <button type="button" class="zubuz-default-btn pill" data-close><span>Done</span></button>
                                    </div>
                                </dialog>
                            @endif
                        </article>
                    @endforeach
                </div>
            @endforeach

            @if ($package['note'])
                <p class="pk-footnote">{{ $package['note'] }}</p>
            @endif

            <div class="pk-summary" aria-live="polite">
                <div class="pk-summary__total">
                    <span class="pk-summary__label">Monthly subscription</span>
                    <strong data-total></strong>
                    <small><span data-annual></span> billed annually @if ($setupFee) · plus a one-time setup fee of <span data-price-etb="{{ $setupFee }}"></span>@endif</small>
                </div>
                <span class="pk-summary__count"><strong data-selected-count></strong> features selected</span>
                <button type="submit" class="zubuz-default-btn pill pk-summary__cta">
                    <span>{{ $inSignup ? 'Finish with ' . $package['name'] : 'Get started with ' . $package['name'] }}</span>
                </button>
                @error('modules')<p class="pk-summary__error">{{ $message }}</p>@enderror
                <p class="pk-summary__error" data-empty-error hidden>Select at least one module to continue.</p>
            </div>
        </form>
    </div>
</section>

<script>
(function () {
    const form = document.getElementById('pk-form');
    const sectionInput = form.querySelector('[data-section-input]');
    const grids = Array.from(form.querySelectorAll('.pk-grid'));
    const emptyError = form.querySelector('[data-empty-error]');
    const activeGrid = () => grids.find(g => !g.hidden);
    const price = input => parseFloat(input.dataset.price) || 0;
    const modulesOf = tile => Array.from(tile.querySelectorAll('input[name="modules[]"]'));

    function refresh() {
        const fmt = DrongoPricing.format;
        form.querySelectorAll('[data-tile]').forEach(tile => {
            const inputs = modulesOf(tile);
            const on = inputs.filter(i => i.checked);
            const subtotal = on.reduce((sum, i) => sum + price(i), 0);
            tile.classList.toggle('is-on', on.length > 0);
            tile.classList.toggle('is-partial', on.length > 0 && on.length < inputs.length);
            const toggle = tile.querySelector('[data-tile-toggle]');
            if (toggle) toggle.checked = on.length > 0;
            tile.querySelectorAll('[data-tile-count]').forEach(el => { el.textContent = on.length; });
            tile.querySelectorAll('[data-tile-subtotal]').forEach(el => { el.textContent = subtotal ? fmt(subtotal) : 'Free'; });
        });

        const selected = modulesOf(activeGrid()).filter(i => i.checked);
        const total = selected.reduce((sum, i) => sum + price(i), 0);
        form.querySelector('[data-total]').textContent = fmt(total);
        form.querySelector('[data-annual]').textContent = fmt(total * 12) + ' / year';
        form.querySelector('[data-selected-count]').textContent = selected.length;
        if (selected.length) emptyError.hidden = true;
    }

    // Business-type tabs (Startup): only the visible grid is submitted.
    function showSection(key) {
        grids.forEach(grid => {
            const active = grid.dataset.section === key;
            grid.hidden = !active;
            modulesOf(grid).forEach(i => { i.disabled = !active; });
        });
        form.querySelectorAll('[data-tab]').forEach(tab => tab.setAttribute('aria-selected', tab.dataset.tab === key ? 'true' : 'false'));
        sectionInput.value = key;
        refresh();
    }
    form.querySelectorAll('[data-tab]').forEach(tab => tab.addEventListener('click', () => showSection(tab.dataset.tab)));

    // Group switch: all of the group's features on, or all off.
    form.addEventListener('change', e => {
        if (e.target.matches('[data-tile-toggle]')) {
            const tile = e.target.closest('[data-tile]');
            modulesOf(tile).forEach(i => { i.checked = e.target.checked; });
        }
        refresh();
    });

    // Clicking the tile itself flips its switch; buttons, the switch and dialogs keep their own behaviour.
    form.addEventListener('click', e => {
        const opener = e.target.closest('[data-open]');
        if (opener) { document.getElementById(opener.dataset.open).showModal(); return; }
        if (e.target.closest('[data-close]')) { e.target.closest('dialog').close(); return; }
        const tile = e.target.closest('[data-tile]');
        if (!tile || e.target.closest('label, button, dialog, a')) return;
        const toggle = tile.querySelector('[data-tile-toggle]') || modulesOf(tile)[0];
        toggle.checked = !toggle.checked;
        toggle.dispatchEvent(new Event('change', { bubbles: true }));
    });
    // Clicking the backdrop closes a dialog.
    form.querySelectorAll('dialog').forEach(d => d.addEventListener('click', e => { if (e.target === d) d.close(); }));

    form.addEventListener('submit', e => {
        if (!modulesOf(activeGrid()).some(i => i.checked)) {
            e.preventDefault();
            emptyError.hidden = false;
        }
    });

    DrongoPricing.onRender(refresh);
    showSection(sectionInput.value);
})();
</script>
@endsection
