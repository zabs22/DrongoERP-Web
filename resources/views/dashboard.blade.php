<x-app-layout>
    @php
        $total = $company?->totalAmount;
        $monthly = $total['monthly'] ?? $currentPlan['price'] ?? null;
        $modules = $total['modules'] ?? [];
        $currency = $total['currency'] ?? config('packages.base_currency');
    @endphp

    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 leading-tight">
                    Welcome back, {{ Str::before(Auth::user()->name, ' ') }}
                </h2>
                @if ($company)
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $company->companyName }}
                        @if ($currentPlan)
                            <span class="ms-2 rounded-full bg-brand-50 px-2.5 py-0.5 text-xs font-semibold text-brand-700">{{ $currentPlan['name'] }} plan</span>
                        @endif
                    </p>
                @endif
            </div>
            <a href="{{ route('DrongoERP.contact') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">Contact support</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            @if ($company?->requestedPackage)
                <a href="{{ route('upgrade') }}" class="flex items-center justify-between gap-4 rounded-lg border border-amber-200 bg-amber-50 px-5 py-3 text-sm text-amber-900 hover:bg-amber-100">
                    <span><span class="font-semibold">{{ $company->selectedPackage ? 'Upgrade to' : 'Request for' }} {{ $company->requestedPackage }} pending.</span> Our team will contact you to confirm pricing.</span>
                    <span class="shrink-0 font-semibold">View request &rarr;</span>
                </a>
            @endif

            {{-- Your plan --}}
            <section class="rounded-lg bg-white shadow-sm ring-1 ring-gray-900/5" aria-labelledby="plan-heading">
                <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                    <h3 id="plan-heading" class="text-base font-semibold text-gray-900">Your plan</h3>
                    @if ($currentPlan)
                        <a href="{{ route('DrongoERP.package', $currentPlan['slug']) }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700">Manage modules</a>
                    @endif
                </div>

                <div class="p-6">
                    @if ($currentPlan)
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center gap-5">
                                <img src="{{ asset($currentPlan['image']) }}" alt="" class="size-16 object-contain">
                                <div>
                                    <p class="text-2xl font-semibold text-gray-900">{{ $currentPlan['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $currentPlan['tagline'] }}</p>
                                </div>
                            </div>
                            <div class="sm:text-right">
                                <p class="text-sm text-gray-500">Monthly cost</p>
                                @if ($monthly !== null)
                                    <p class="text-2xl font-semibold tracking-tight text-gray-900">{{ $currency }} {{ number_format($monthly) }} <span class="text-sm font-normal text-gray-500">/ mo</span></p>
                                @else
                                    <p class="text-2xl font-semibold tracking-tight text-gray-900">Custom pricing</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-6 border-t border-gray-100 pt-6 lg:grid-cols-3">
                            <div class="lg:col-span-2">
                                <div class="flex items-baseline justify-between gap-4">
                                    <h4 class="text-sm font-semibold text-gray-900">What's included</h4>
                                    <span class="text-xs text-gray-500">{{ $modules ? 'Your module selection' : 'Standard ' . $currentPlan['name'] . ' set' }}</span>
                                </div>
                                @if ($included['areas'])
                                    <ul class="mt-3 grid grid-cols-1 gap-2 sm:grid-cols-2">
                                        @foreach ($included['areas'] as $area)
                                            <li class="flex items-center justify-between gap-3 rounded-md bg-gray-50 px-3 py-2 text-sm {{ $area['count'] ? '' : 'opacity-60' }}">
                                                <span class="font-medium text-gray-800">{{ $area['name'] }}</span>
                                                <span class="shrink-0 text-xs text-gray-500">
                                                    <span class="font-semibold {{ $area['count'] === $area['total'] ? 'text-brand-700' : 'text-gray-700' }}">{{ $area['count'] }}</span>
                                                    of {{ $area['total'] }} {{ Str::plural('feature', $area['total']) }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if ($included['addons'])
                                    <p class="mt-3 text-sm text-gray-600">
                                        <span class="font-medium text-gray-800">Add-ons:</span> {{ implode(', ', $included['addons']) }}
                                    </p>
                                @endif
                                @if (!$included['areas'] && !$included['addons'])
                                    <p class="mt-2 text-sm text-gray-500">
                                        <a href="{{ route('DrongoERP.package', $currentPlan['slug']) }}" class="font-semibold text-brand-600 hover:text-brand-700">See what's included</a>
                                    </p>
                                @endif
                            </div>

                            @if ($perks)
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Plan benefits</h4>
                                    <ul class="mt-3 space-y-2">
                                        @foreach ($perks as $perk)
                                            <li class="flex items-start gap-2 text-sm text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="mt-0.5 size-4 shrink-0 fill-brand-500" aria-hidden="true"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg>
                                                {{ $perk }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        @if ($hasUpgrades)
                            <div class="mt-6 flex flex-col gap-3 rounded-md bg-brand-50 px-4 py-3 text-sm sm:flex-row sm:items-center sm:justify-between">
                                <span class="text-gray-700">Need more modules or users? Larger plans are available.</span>
                                <a href="{{ route('upgrade') }}" class="shrink-0 font-semibold text-brand-700 hover:text-brand-600">See upgrade options &rarr;</a>
                            </div>
                        @endif
                    @else
                        <p class="text-sm text-gray-500">
                            You don't have a plan yet.
                            <a href="{{ route('upgrade') }}" class="font-semibold text-brand-600 hover:text-brand-700">Choose a plan</a> to start using DrongoERP.
                        </p>
                    @endif
                </div>
            </section>

            {{-- Workspace --}}
            <section aria-labelledby="workspace-heading">
                <h3 id="workspace-heading" class="text-base font-semibold text-gray-900">Workspace</h3>
                <x-welcome />
            </section>
        </div>
    </div>
</x-app-layout>
