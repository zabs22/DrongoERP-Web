<?php

namespace App\Support;

/** App pages: config/apps.php joined with the sub-modules found in the package data. */
class AppCatalog
{
    public static function find(int $id): ?array
    {
        $app = config("apps.$id");
        if (!$app) {
            return null;
        }

        $features = [];
        foreach ($app['features'] ?? [] as [$name, $description]) {
            $features[$name] = compact('name', 'description');
        }

        $plans = [];
        foreach (PackageCatalog::plans() as $slug => $plan) {
            $package = PackageCatalog::find($slug);
            if (!$package) {
                continue;
            }
            foreach (self::modules($package) as [$group, $module]) {
                $inGroup = in_array($group, $app['groups'] ?? [], true);
                if (!$inGroup && !(isset($app['modules']) && preg_match($app['modules'], $module['name']))) {
                    continue;
                }
                $key = strtolower(preg_replace('/\W+/', '', $module['name']));
                $features[$key] ??= ['name' => $module['name'], 'description' => $module['description'] ?? ''];
                $plans[$slug] = $plan;
            }
        }

        return ['id' => $id, 'features' => array_values($features), 'plans' => $plans] + $app;
    }

    /** Every module of a package as [group name, module], including add-ons and always-included items. */
    private static function modules(array $package): array
    {
        $rows = array_map(fn ($m) => [null, $m], $package['included'] ?? []);
        foreach ($package['sections'] as $section) {
            foreach ($section['groups'] as $group) {
                foreach ($group['modules'] as $module) {
                    $rows[] = [$group['name'], $module];
                }
            }
            foreach ($section['addons'] as $addon) {
                $rows[] = [null, $addon];
            }
        }

        return $rows;
    }
}
