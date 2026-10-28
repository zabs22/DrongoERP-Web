<?php

namespace App\Support;

/**
 * Subscription plans (config/packages.php) joined with their module lists (resources/data/packages/{slug}.json).
 *
 * Every selectable module gets a stable id "{section}:{group}:{index}" (addons use the group "addons"),
 * which is what the package page posts back and what totals are recomputed from.
 */
class PackageCatalog
{
    /** @return array<string, array> slug => plan card data */
    public static function plans(): array
    {
        $plans = [];
        foreach (config('packages.plans') as $slug => $plan) {
            $plans[$slug] = ['slug' => $slug] + $plan + ['badge' => null, 'dark' => false];
        }

        return $plans;
    }

    public static function names(): array
    {
        return array_column(self::plans(), 'name');
    }

    public static function slugForName(?string $name): ?string
    {
        foreach (self::plans() as $slug => $plan) {
            if (strcasecmp($plan['name'], (string) $name) === 0) {
                return $slug;
            }
        }

        return null;
    }

    /** A plan with its sections, groups and modules, each module carrying its id. */
    public static function find(string $slug): ?array
    {
        $plans = self::plans();
        $path = resource_path("data/packages/{$slug}.json");
        if (!isset($plans[$slug]) || !is_file($path)) {
            return null;
        }

        $package = json_decode(file_get_contents($path), true);
        foreach ($package['sections'] as &$section) {
            foreach ($section['groups'] as &$group) {
                foreach ($group['modules'] as $i => &$module) {
                    $module['id'] = "{$section['key']}:{$group['key']}:{$i}";
                }
            }
            foreach ($section['addons'] as $i => &$addon) {
                $addon['id'] = "{$section['key']}:addons:{$i}";
            }
        }
        unset($section, $group, $module, $addon);

        return $plans[$slug] + $package;
    }

    // Tile icon for a module or group, matched on keywords in its name (first match wins).
    private const ICONS = [
        'point of sale' => 'Monitor', 'pos' => 'Monitor', 'purchase' => 'Full-Cart', 'sales' => 'Shop-Bag',
        'product' => 'Library-1', 'inventory' => 'Packages', 'warehouse' => 'Packages', 'accounting' => 'Coins',
        'profit' => 'Bar-Chart', 'expense' => 'Expense', 'manufactur' => 'Manufacturing', 'production' => 'Manufacturing',
        'medical' => 'Medical', 'customer relationship' => 'User-Card', 'relationship' => 'Relationships', 'people' => 'Relationships',
        'human resource' => 'User-Card', 'transfer' => 'Transfers', 'target' => 'Bar-Chart-Empty', 'chat' => 'Message',
        'quotation' => 'Document-Award', 'backup' => 'Settings', 'adjustment' => 'Settings', 'marketing' => 'Megaphone',
        'service' => 'Home', 'meeting' => 'Smartphone', 'project' => 'Book', 'ticket' => 'Tickets', 'knowledge' => 'Grad',
        'report' => 'Reports',
    ];

    public static function icon(string $name): string
    {
        $lower = strtolower($name);
        foreach (self::ICONS as $keyword => $icon) {
            if (preg_match('/\b' . preg_quote($keyword, '/') . '/', $lower)) {
                return "images/apps_logo/{$icon}.svg";
            }
        }

        return 'images/apps_logo/Library.svg';
    }

    /**
     * Monthly ETB total and module names for the given ids, restricted to one section.
     *
     * @return array{section: string, monthly: float, modules: string[]}
     */
    public static function price(array $package, string $sectionKey, array $ids): array
    {
        $ids = array_flip($ids);
        $total = 0.0;
        $names = [];
        foreach ($package['sections'] as $section) {
            if ($section['key'] !== $sectionKey) {
                continue;
            }
            $modules = array_merge(...array_column($section['groups'], 'modules'), ...[$section['addons']]);
            foreach ($modules as $module) {
                if (isset($ids[$module['id']])) {
                    $total += $module['price'];
                    $names[] = $module['name'];
                }
            }
        }

        return ['section' => $sectionKey, 'monthly' => round($total, 2), 'modules' => $names];
    }
}
