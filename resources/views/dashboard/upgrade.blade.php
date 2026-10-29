<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 leading-tight">Upgrade</h2>
                <p class="mt-1 text-sm text-gray-500">
                    @if ($currentPlan)
                        You're on the <span class="font-semibold text-gray-700">{{ $currentPlan['name'] }}</span> plan. Move up when your business needs more.
                    @else
                        Choose the plan that fits your business.
                    @endif
                </p>
            </div>
            <a href="{{ route('DrongoERP.contact') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">Questions? Contact sales</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            @if ($company?->requestedPackage)
                @php
                    $requestedTotal = $company->requestedAmount;
                @endphp
                <div class="flex flex-col gap-4 rounded-lg border border-amber-200 bg-amber-50 p-5 sm:flex-row sm:items-center sm:justify-between" role="status">
                    <div class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 shrink-0 stroke-amber-600" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div>
                            <p class="font-semibold text-amber-900">Upgrade to {{ $company->requestedPackage }} pending</p>
                            <p class="mt-1 text-sm text-amber-800">
                                Requested on {{ $company->upgradeRequestedAt->format('F j, Y') }}
                                @if (!empty($requestedTotal['modules']))
                                    with {{ count($requestedTotal['modules']) }} modules (estimated {{ $requestedTotal['currency'] }} {{ number_format($requestedTotal['monthly']) }} / month)
                                @endif.
                                Our team will contact you to confirm pricing. Your current plan stays active until then.
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="document.getElementById('cancel-request-dialog').showModal()"
                            class="shrink-0 rounded-md border border-amber-300 bg-white px-4 py-2 text-sm font-semibold text-amber-900 hover:bg-amber-100 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        Cancel request
                    </button>
                </div>

                {{-- Clicking the backdrop closes it, like Escape. --}}
                <dialog id="cancel-request-dialog" aria-labelledby="cancel-request-title"
                        onclick="if (event.target === this) this.close()"
                        class="w-full max-w-md rounded-lg p-0 shadow-xl backdrop:bg-gray-900/50">
                    <div class="p-6">
                        <div class="flex gap-4">
                            <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-red-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-red-600" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                            </div>
                            <div>
                                <h3 id="cancel-request-title" class="text-lg font-semibold text-gray-900">Cancel your {{ $company->requestedPackage }} request?</h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    Our team will stop working on your upgrade to {{ $company->requestedPackage }}, and you'll stay on the {{ $company->selectedPackage }} plan.
                                    You can request it again any time.
                                </p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('dashboard.cancelRequest') }}" class="flex flex-col-reverse gap-3 bg-gray-50 px-6 py-4 sm:flex-row sm:justify-end">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="this.closest('dialog').close()" autofocus
                                class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                            Keep request
                        </button>
                        <button type="submit"
                                class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Yes, cancel request
                        </button>
                    </form>
                </dialog>
            @endif

            @include('dashboard.plan')
        </div>
    </div>
</x-app-layout>
