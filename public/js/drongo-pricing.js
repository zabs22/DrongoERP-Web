/*
 * DrongoERP pricing helpers.
 * - Any element with data-price-etb="499" shows that ETB amount converted to the chosen currency.
 * - Every <select data-currency-select> on the page stays in sync; the choice is remembered per browser.
 * - Rates come from the server (/exchange-rates) and are refreshed while the page is open.
 * - [data-plans] blocks get a scroll-snap carousel with arrows and dots.
 */
window.DrongoPricing = (function () {
    const STORAGE_KEY = 'drongo_currency';
    const REFRESH_MS = 30 * 60 * 1000;
    const listeners = [];
    const state = { base: 'ETB', rates: { ETB: 1 }, currency: 'ETB', updatedAt: null, live: false };

    function readSaved() {
        try { return localStorage.getItem(STORAGE_KEY); } catch (e) { return null; }
    }
    function save(code) {
        try { localStorage.setItem(STORAGE_KEY, code); } catch (e) { /* private mode: not remembered */ }
    }

    function convert(etb) {
        return etb * (state.rates[state.currency] || 1);
    }

    function format(etb) {
        const value = convert(etb);
        const fraction = value >= 1000 || Number.isInteger(value) ? 0 : 2;
        try {
            return new Intl.NumberFormat(undefined, {
                style: 'currency', currency: state.currency, currencyDisplay: 'code',
                minimumFractionDigits: fraction, maximumFractionDigits: fraction,
            }).format(value).replace(/ /g, ' ');
        } catch (e) {
            return state.currency + ' ' + value.toFixed(fraction);
        }
    }

    function rateNote() {
        if (state.currency === state.base) {
            return state.live ? 'Live exchange rates · prices set in ' + state.base : 'Prices in ' + state.base;
        }
        const rate = state.rates[state.currency];
        const per = rate >= 0.01 ? rate.toFixed(4) : rate.toPrecision(3);
        const when = state.updatedAt ? new Date(state.updatedAt).toLocaleDateString(undefined, { day: 'numeric', month: 'short', year: 'numeric' }) : '';
        return '1 ' + state.base + ' = ' + per + ' ' + state.currency + (when ? ' · rate of ' + when : '') + (state.live ? '' : ' (last known rate)');
    }

    function render() {
        document.querySelectorAll('[data-price-etb]').forEach(el => {
            el.textContent = format(parseFloat(el.dataset.priceEtb) || 0);
        });
        document.querySelectorAll('[data-currency-select]').forEach(select => {
            select.value = state.currency;
            Array.from(select.options).forEach(opt => { opt.disabled = !(opt.value in state.rates); });
        });
        document.querySelectorAll('[data-rate-note]').forEach(el => { el.textContent = rateNote(); });
        listeners.forEach(fn => fn());
    }

    function setCurrency(code) {
        if (!(code in state.rates)) return;
        state.currency = code;
        save(code);
        render();
    }

    function applyRates(data) {
        state.base = data.base || state.base;
        state.rates = data.rates || state.rates;
        state.updatedAt = data.updated_at || null;
        state.live = !!data.live;
        if (!(state.currency in state.rates)) state.currency = state.base;
    }

    function initCarousels() {
        document.querySelectorAll('[data-plans]').forEach(root => {
            const track = root.querySelector('[data-plans-track]');
            const cards = Array.from(track.children);
            const dots = Array.from(root.querySelectorAll('[data-plans-dot]'));
            const step = () => (cards[1] ? cards[1].offsetLeft - cards[0].offsetLeft : track.clientWidth);

            root.querySelector('[data-plans-prev]').addEventListener('click', () => track.scrollBy({ left: -step(), behavior: 'smooth' }));
            root.querySelector('[data-plans-next]').addEventListener('click', () => track.scrollBy({ left: step(), behavior: 'smooth' }));
            dots.forEach((dot, i) => dot.addEventListener('click', () => {
                track.scrollTo({ left: cards[i].offsetLeft - track.offsetLeft - (track.clientWidth - cards[i].offsetWidth) / 2, behavior: 'smooth' });
            }));

            // The card nearest the middle of the track is "current": highlighted and marked in the dots.
            let frame;
            function markCurrent() {
                const mid = track.scrollLeft + track.clientWidth / 2;
                let best = 0, bestDist = Infinity;
                cards.forEach((card, i) => {
                    const dist = Math.abs(card.offsetLeft - track.offsetLeft + card.offsetWidth / 2 - mid);
                    if (dist < bestDist) { best = i; bestDist = dist; }
                });
                cards.forEach((card, i) => card.classList.toggle('is-current', i === best));
                dots.forEach((dot, i) => dot.setAttribute('aria-current', i === best ? 'true' : 'false'));
            }
            track.addEventListener('scroll', () => { cancelAnimationFrame(frame); frame = requestAnimationFrame(markCurrent); }, { passive: true });
            window.addEventListener('resize', markCurrent);

            // Open on the featured plan when there is one.
            const featured = cards.findIndex(c => c.hasAttribute('data-featured'));
            if (featured > 0) {
                const card = cards[featured];
                track.scrollTo({ left: card.offsetLeft - track.offsetLeft - (track.clientWidth - card.offsetWidth) / 2, behavior: 'instant' });
            }
            markCurrent();
        });
    }

    function init(config) {
        applyRates(config);
        const saved = readSaved();
        if (saved && saved in state.rates) state.currency = saved;

        document.addEventListener('change', e => {
            if (e.target.matches('[data-currency-select]')) setCurrency(e.target.value);
        });

        const start = () => { render(); initCarousels(); };
        if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start); else start();

        if (config.endpoint) {
            setInterval(() => {
                fetch(config.endpoint, { headers: { Accept: 'application/json' } })
                    .then(r => (r.ok ? r.json() : Promise.reject()))
                    .then(data => { applyRates(data); render(); })
                    .catch(() => { /* keep the current rates */ });
            }, REFRESH_MS);
        }
    }

    return {
        init,
        format,
        onRender: fn => listeners.push(fn),
        get currency() { return state.currency; },
    };
})();
