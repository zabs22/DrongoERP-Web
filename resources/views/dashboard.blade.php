<x-app-layout>
    @php
        $total = $company?->totalAmount;
        $monthly = $total['monthly'] ?? $currentPlan['price'] ?? null;
        $modules = $total['modules'] ?? [];
        $currency = $total['currency'] ?? config('packages.base_currency');
    @endphp

    <div class="plumage-backdrop" aria-hidden="true"></div>

    <div class="relative py-10 sm:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Greeting --}}
            <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                        Welcome back, {{ Str::before(Auth::user()->name, ' ') }}
                    </h1>
                    @if ($company)
                        <p class="mt-3 flex flex-wrap items-center gap-3 text-base text-plumage-100">
                            {{ $company->companyName }}
                            @if ($currentPlan)
                                <span class="rounded-full bg-brand-500 px-3 py-0.5 text-sm font-semibold text-plumage-900">{{ $currentPlan['name'] }} plan</span>
                            @endif
                        </p>
                    @endif
                </div>
                <a href="{{ route('DrongoERP.contact') }}" class="glass-panel self-start rounded-full px-5 py-2.5 text-sm font-semibold text-white hover:bg-white/20 sm:self-auto">Contact support</a>
            </div>

            @if ($company?->requestedPackage)
                <a href="{{ route('upgrade') }}" class="glass-panel flex flex-col gap-2 rounded-2xl border-amber-300/40 px-5 py-4 text-sm text-amber-100 hover:bg-white/20 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <span><span class="font-semibold text-white">{{ $company->selectedPackage ? 'Upgrade to' : 'Request for' }} {{ $company->requestedPackage }} pending.</span> Our team will contact you to confirm pricing.</span>
                    <span class="shrink-0 font-semibold text-white">View request</span>
                </a>
            @endif

            {{-- Your plan --}}
            <section class="glass-panel rounded-3xl p-6 sm:p-8" aria-labelledby="plan-heading">
                <h2 id="plan-heading" class="sr-only">Your plan</h2>

                @if ($currentPlan)
                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-5">
                            <div class="flex size-20 shrink-0 items-center justify-center rounded-2xl bg-white/90 shadow-lg">
                                <img src="{{ asset($currentPlan['image']) }}" alt="" class="size-14 object-contain">
                            </div>
                            <div>
                                <p class="text-3xl font-semibold tracking-tight text-white">{{ $currentPlan['name'] }}</p>
                                <p class="mt-1 text-sm text-plumage-100">{{ $currentPlan['tagline'] }}</p>
                            </div>
                        </div>
                        <div class="sm:text-right">
                            <p class="text-sm text-plumage-100">Monthly cost</p>
                            @if ($monthly !== null)
                                <p class="text-3xl font-semibold tracking-tight text-white">{{ $currency }} {{ number_format($monthly) }} <span class="text-sm font-normal text-plumage-100">/ mo</span></p>
                            @else
                                <p class="text-3xl font-semibold tracking-tight text-white">Custom pricing</p>
                            @endif
                            <a href="{{ route('DrongoERP.package', $currentPlan['slug']) }}" class="mt-1 inline-block text-sm font-semibold text-brand-100 hover:text-white">Manage modules</a>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 gap-8 border-t border-white/10 pt-8 lg:grid-cols-3">
                        <div class="lg:col-span-2">
                            <div class="flex items-baseline justify-between gap-4">
                                <h3 class="text-base font-semibold text-white">What's included</h3>
                                <span class="text-xs text-plumage-100">{{ $modules ? 'Your module selection' : 'Standard ' . $currentPlan['name'] . ' set' }}</span>
                            </div>
                            @if ($included['areas'])
                                <ul class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                    @foreach ($included['areas'] as $area)
                                        <li class="glass-tile rounded-xl px-4 py-3 {{ $area['count'] ? '' : 'opacity-60' }}">
                                            <div class="flex items-center justify-between gap-3 text-sm">
                                                <span class="font-medium text-white">{{ $area['name'] }}</span>
                                                <span class="shrink-0 text-xs text-plumage-100">
                                                    <span class="font-semibold text-white">{{ $area['count'] }}</span>
                                                    of {{ $area['total'] }} {{ Str::plural('feature', $area['total']) }}
                                                </span>
                                            </div>
                                            <div class="mt-2.5 h-1 overflow-hidden rounded-full bg-white/15" aria-hidden="true">
                                                <div class="h-full rounded-full {{ $area['count'] === $area['total'] ? 'bg-brand-500' : 'bg-brand-100' }}" style="width: {{ $area['total'] ? round($area['count'] / $area['total'] * 100) : 0 }}%"></div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if ($included['addons'])
                                <h4 class="mt-6 text-sm font-semibold text-white">Add-ons</h4>
                                <ul class="mt-3 flex flex-wrap gap-2">
                                    @foreach ($included['addons'] as $addon)
                                        <li class="glass-tile rounded-full px-3 py-1 text-xs font-medium text-plumage-100">{{ $addon }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!$included['areas'] && !$included['addons'])
                                <p class="mt-2 text-sm text-plumage-100">
                                    <a href="{{ route('DrongoERP.package', $currentPlan['slug']) }}" class="font-semibold text-brand-100 hover:text-white">See what's included</a>
                                </p>
                            @endif
                        </div>

                        @if ($perks)
                            <div class="lg:border-s lg:border-white/10 lg:ps-8">
                                <h3 class="text-base font-semibold text-white">Plan benefits</h3>
                                <ul class="mt-4 space-y-3">
                                    @foreach ($perks as $perk)
                                        <li class="flex items-start gap-2.5 text-sm text-plumage-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-brand-500" aria-hidden="true"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg>
                                            {{ $perk }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    @if ($hasUpgrades)
                        <div class="glass-tile mt-8 flex flex-col gap-3 rounded-2xl px-5 py-4 text-sm sm:flex-row sm:items-center sm:justify-between">
                            <span class="text-plumage-100">Need more modules or users? Larger plans are available.</span>
                            <a href="{{ route('upgrade') }}" class="shrink-0 self-start rounded-full bg-brand-500 px-4 py-2 font-semibold text-plumage-900 hover:bg-brand-100 sm:self-auto">See upgrade options</a>
                        </div>
                    @endif
                @else
                    <p class="text-sm text-plumage-100">
                        You don't have a plan yet.
                        <a href="{{ route('upgrade') }}" class="font-semibold text-brand-100 hover:text-white">Choose a plan</a> to start using DrongoERP.
                    </p>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
