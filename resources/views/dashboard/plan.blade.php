{{-- Every plan side by side: the current one marked, higher ones upgradable. --}}

<section aria-labelledby="plans-heading">
    <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h3 id="plans-heading" class="text-base font-semibold text-gray-900">{{ $currentPlan ? 'Upgrade your plan' : 'Choose a plan' }}</h3>
            <p class="mt-1 text-sm text-gray-500">Prices are monthly in {{ config('packages.base_currency') }}. Plans with custom pricing are confirmed with our team.</p>
        </div>
        @if ($currentPlan && !$upgrades)
            <a href="{{ route('DrongoERP.contact') }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700">Talk to us about your plan</a>
        @endif
    </div>

    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ($plans as $plan)
            @php
                $isCurrent = $currentPlan && $plan['slug'] === $currentPlan['slug'];
                $canUpgrade = isset($upgrades[$plan['slug']]);
                $requested = $company?->requestedPackage === $plan['name'];
            @endphp
            <article class="flex flex-col rounded-lg bg-white p-5 shadow-sm {{ $isCurrent ? 'ring-2 ring-brand-500' : 'ring-1 ring-gray-900/5' }} {{ !$isCurrent && !$canUpgrade ? 'opacity-60' : '' }}">
                <div class="flex items-center justify-between gap-2">
                    <h4 class="text-lg font-semibold text-gray-900">{{ $plan['name'] }}</h4>
                    @if ($isCurrent)
                        <span class="rounded-full bg-brand-500 px-2.5 py-0.5 text-xs font-semibold text-white">Current</span>
                    @elseif ($requested)
                        <span class="rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-semibold text-amber-800">Requested</span>
                    @elseif ($plan['badge'])
                        <span class="rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-700">{{ $plan['badge'] }}</span>
                    @endif
                </div>

                <p class="mt-2">
                    @if ($plan['price'] !== null)
                        <span class="text-2xl font-semibold tracking-tight text-gray-900">{{ number_format($plan['price']) }}</span>
                        <span class="text-sm text-gray-500">{{ config('packages.base_currency') }} / mo</span>
                    @else
                        <span class="text-2xl font-semibold tracking-tight text-gray-900">Custom</span>
                    @endif
                </p>

                <p class="mt-3 flex-1 text-sm text-gray-500">{{ $plan['tagline'] }}</p>

                <div class="mt-5 space-y-2">
                    @if ($company && $canUpgrade && !$requested)
                        @if ($plan['price'] !== null)
                            {{-- Paid plans switch immediately, so confirm in a modal first. --}}
                            <button type="button" onclick="document.getElementById('upgrade-dialog-{{ $plan['slug'] }}').showModal()"
                                    class="w-full rounded-md bg-brand-500 px-3 py-2 text-sm font-semibold text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                {{ $currentPlan ? 'Upgrade' : 'Choose' }}
                            </button>

                            <dialog id="upgrade-dialog-{{ $plan['slug'] }}" aria-labelledby="upgrade-title-{{ $plan['slug'] }}"
                                    onclick="if (event.target === this) this.close()"
                                    class="w-full max-w-md rounded-lg p-0 shadow-xl backdrop:bg-gray-900/50">
                                <div class="p-6">
                                    <div class="flex gap-4">
                                        <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-brand-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-brand-600" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" /></svg>
                                        </div>
                                        <div>
                                            <h3 id="upgrade-title-{{ $plan['slug'] }}" class="text-lg font-semibold text-gray-900">Switch to the {{ $plan['name'] }} plan?</h3>
                                            <p class="mt-2 text-sm text-gray-600">The change takes effect right away and your modules are updated to the {{ $plan['name'] }} set.</p>
                                        </div>
                                    </div>
                                    <dl class="mt-5 divide-y divide-gray-100 rounded-md border border-gray-200 text-sm">
                                        @if ($currentPlan)
                                            <div class="flex justify-between px-4 py-2.5">
                                                <dt class="text-gray-500">Current plan</dt>
                                                <dd class="text-gray-900">{{ $currentPlan['name'] }}@if ($currentPlan['price'] !== null) · {{ number_format($currentPlan['price']) }} {{ config('packages.base_currency') }} / mo @endif</dd>
                                            </div>
                                        @endif
                                        <div class="flex justify-between px-4 py-2.5">
                                            <dt class="text-gray-500">New plan</dt>
                                            <dd class="font-semibold text-gray-900">{{ $plan['name'] }} · {{ number_format($plan['price']) }} {{ config('packages.base_currency') }} / mo</dd>
                                        </div>
                                    </dl>
                                </div>
                                <form method="POST" action="{{ route('dashboard.upgrade') }}" class="flex flex-col-reverse gap-3 bg-gray-50 px-6 py-4 sm:flex-row sm:justify-end">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ $plan['slug'] }}">
                                    <button type="button" onclick="this.closest('dialog').close()" autofocus
                                            class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                        Not now
                                    </button>
                                    <button type="submit"
                                            class="rounded-md bg-brand-500 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                        Switch to {{ $plan['name'] }}
                                    </button>
                                </form>
                            </dialog>
                        @else
                            <form method="POST" action="{{ route('dashboard.upgrade') }}">
                                @csrf
                                <input type="hidden" name="plan" value="{{ $plan['slug'] }}">
                                <button type="submit" class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                    Request pricing
                                </button>
                            </form>
                        @endif
                    @endif

                    <a href="{{ route('DrongoERP.package', $plan['slug']) }}" class="block text-center text-sm font-semibold text-gray-600 hover:text-gray-900">
                        {{ $isCurrent ? 'Manage modules' : ($canUpgrade ? 'Customize & compare' : 'View details') }}
                    </a>
                </div>
            </article>
        @endforeach
    </div>
</section>
