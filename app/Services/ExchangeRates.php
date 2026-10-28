<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Today's exchange rates from the base currency (ETB) to each currency in config('packages.currencies').
 * Rates come from open.er-api.com (free, updated daily) and are cached; the last good set is kept
 * as a fallback so pricing still renders if the provider is unreachable.
 */
class ExchangeRates
{
    private const CACHE_KEY = 'exchange_rates';
    private const FALLBACK_KEY = 'exchange_rates_last_good';
    private const TTL_SECONDS = 6 * 60 * 60;

    /**
     * @return array{base: string, rates: array<string, float>, updated_at: ?string, live: bool}
     */
    public function current(): array
    {
        if ($cached = Cache::get(self::CACHE_KEY)) {
            return $cached;
        }

        $base = config('packages.base_currency');
        $wanted = array_keys(config('packages.currencies'));

        try {
            $response = Http::timeout(5)->get("https://open.er-api.com/v6/latest/{$base}");
            if ($response->successful() && $response->json('result') === 'success') {
                $rates = array_intersect_key($response->json('rates', []), array_flip($wanted));
                $rates[$base] = 1.0;
                $result = [
                    'base' => $base,
                    'rates' => array_map('floatval', $rates),
                    'updated_at' => $response->json('time_last_update_utc'),
                    'live' => true,
                ];
                // Only successful fetches are cached, so a provider outage is retried on the next request.
                Cache::put(self::CACHE_KEY, $result, self::TTL_SECONDS);
                Cache::forever(self::FALLBACK_KEY, $result);

                return $result;
            }
        } catch (\Throwable $e) {
            Log::warning('Exchange rate fetch failed: ' . $e->getMessage());
        }

        // Provider unavailable: reuse the last good rates, or show ETB only.
        $fallback = Cache::get(self::FALLBACK_KEY);
        if ($fallback) {
            return ['live' => false] + $fallback;
        }

        return ['base' => $base, 'rates' => [$base => 1.0], 'updated_at' => null, 'live' => false];
    }
}
