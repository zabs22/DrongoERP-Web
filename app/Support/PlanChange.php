<?php

namespace App\Support;

use App\Models\CompanyProfile;

/**
 * Plan changes for a signed-up company, shared by the dashboard and the package pages.
 *
 * A company can re-pick modules on its own plan or move up. Plans with a fixed price switch
 * straight away (sign-up has no payment step either); plans priced on request are recorded
 * for the sales team to follow up. Downgrades go through the sales team.
 */
class PlanChange
{
    public const SWITCH = 'switch';
    public const REQUEST = 'request';

    /** @return array<string, array> slug => plan, for the plans above the company's current one */
    public static function upgrades(?CompanyProfile $company): array
    {
        $plans = PackageCatalog::plans();
        $currentSlug = PackageCatalog::slugForName($company?->selectedPackage);
        $currentPrice = $currentSlug ? $plans[$currentSlug]['price'] : 0;

        // A company already on a plan priced on request changes plan through the sales team.
        if ($currentSlug && $currentPrice === null) {
            return [];
        }

        return array_filter($plans, fn ($plan) => $plan['slug'] !== $currentSlug
            && ($plan['price'] === null || $plan['price'] > $currentPrice));
    }

    /** SWITCH, REQUEST, or null when the company cannot move to this plan itself. */
    public static function kind(CompanyProfile $company, string $slug): ?string
    {
        $plan = PackageCatalog::plans()[$slug] ?? null;
        $isCurrent = $slug === PackageCatalog::slugForName($company->selectedPackage);

        if (!$plan || (!$isCurrent && !isset(self::upgrades($company)[$slug]))) {
            return null;
        }

        return $plan['price'] === null ? self::REQUEST : self::SWITCH;
    }

    /**
     * Applies a change already allowed by kind() and returns the message to show.
     *
     * @param  array|null  $selection  modules picked on the package page (PackageCatalog::price), or null for the plan's base price
     */
    public static function apply(CompanyProfile $company, string $slug, ?array $selection = null): string
    {
        $plan = PackageCatalog::plans()[$slug];
        $amount = ['package' => $plan['name'], 'currency' => config('packages.base_currency')]
            + ($selection ?? ['monthly' => $plan['price'], 'modules' => []]);

        if (self::kind($company, $slug) === self::REQUEST) {
            $company->update([
                'requestedPackage' => $plan['name'],
                'requestedAmount' => $amount,
                'upgradeRequestedAt' => now(),
            ]);

            return "Your request for the {$plan['name']} plan has been sent. Our team will contact you about pricing.";
        }

        $wasCurrent = $company->selectedPackage === $plan['name'];
        $company->update([
            'selectedPackage' => $plan['name'],
            'totalAmount' => $amount,
            'requestedPackage' => null,
            'requestedAmount' => null,
            'upgradeRequestedAt' => null,
        ]);

        return $wasCurrent ? 'Your modules have been updated.' : "You're now on the {$plan['name']} plan.";
    }
}
