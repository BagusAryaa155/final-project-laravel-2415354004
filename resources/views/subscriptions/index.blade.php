@extends('layouts.app')

@section('title', 'Subscriptions')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div></div>

    <button
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#addDataModal"
        class="inline-flex items-center gap-2 bg-primary text-white rounded-xl px-6 py-4"
    >
        <span class="iconify" data-icon="ic:baseline-add" style="font-size: 20px;"></span>
        Add Data
    </button>
</div>

<div
    class="border border-gray-200 rounded-lg bg-white"
    style="overflow: visible;"
>
    <table
        class="w-full text-left"
        style="overflow: visible;"
    >
        <thead>
            <tr class="border-b border-gray-200">
                <th class="px-4 py-4 font-semibold text-gray-900">
                    Customer Name
                </th>

                <th class="px-4 py-4 font-semibold text-gray-900">
                    Services
                </th>

                <th class="px-4 py-4 font-semibold text-gray-900">
                    Services Period
                </th>

                <th class="px-4 py-4 font-semibold text-gray-900">
                    Status
                </th>

                <th class="px-4 py-4 font-semibold text-gray-900 text-center">
                    Action
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subscriptions as $subscription)
            <tr class="border-b border-gray-200">

                <td class="px-4 py-4 text-gray-900">
                    {{ $subscription['customer']['name'] ?? '-' }}
                </td>

                <td class="px-4 py-4 text-gray-900">
                    {{ $subscription['service']['name'] ?? '-' }}
                </td>

                <td class="px-4 py-4 text-gray-900">
                    {{ \Carbon\Carbon::parse($subscription['start_date'])->format('d M Y') }}
                    -
                    {{ \Carbon\Carbon::parse($subscription['end_date'])->format('d M Y') }}
                </td>

                <td class="px-4 py-4">

                    @php
                        $status = ucfirst($subscription['status']);

                        $statusClasses = match(strtolower($subscription['status'])) {
                            'active' => 'bg-green-100 text-green-700',
                            'trial' => 'bg-yellow-100 text-yellow-700',
                            'isolir' => 'bg-red-100 text-red-700',
                            'dismantle' => 'bg-gray-100 text-gray-700',
                            'inactive' => 'bg-red-100 text-red-700',
                            default => 'bg-gray-100 text-gray-700',
                        };
                    @endphp

                    <span class="inline-flex items-center px-3 py-0.5 rounded-full font-medium {{ $statusClasses }}">
                        {{ $status }}
                    </span>
                </td>

                <td class="px-4 py-4 text-center relative overflow-visible">

                    <button
                        type="button"
                        class="action-toggle inline-flex items-center justify-center text-gray-700 hover:text-black"
                        style="width: 40px; height: 40px;"
                    >
                        <span
                            class="iconify"
                            data-icon="ic:baseline-menu"
                            style="font-size: 22px;"
                        ></span>
                    </button>

                    <div
                        class="action-dropdown"
                        style="
                            display: none;
                            position: absolute;
                            top: 60px;
                            right: 20px;
                            width: 220px;
                            background: white;
                            border-radius: 16px;
                            border: 1px solid #e5e7eb;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
                            z-index: 99999;
                            overflow: hidden;
                        "
                    >

                        <form action="{{ route('subscriptions.activate', $subscription['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 text-left hover:bg-gray-100"
                                style="border: none; background: transparent;"
                            >
                                <span class="iconify text-green-600" data-icon="material-symbols:key"></span>
                                <span>Active</span>
                            </button>
                        </form>

                        <form action="{{ route('subscriptions.deactivate', $subscription['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 text-left hover:bg-gray-100"
                                style="border: none; background: transparent;"
                            >
                                <span class="iconify text-red-500" data-icon="material-symbols:key-off"></span>
                                <span>Deactivate</span>
                            </button>
                        </form>

                        <form action="{{ route('subscriptions.trial', $subscription['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 text-left hover:bg-gray-100"
                                style="border: none; background: transparent;"
                            >
                                <span class="iconify text-yellow-500" data-icon="material-symbols:hourglass-top"></span>
                                <span>Trial</span>
                            </button>
                        </form>

                        <form action="{{ route('subscriptions.isolir', $subscription['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 text-left hover:bg-gray-100"
                                style="border: none; background: transparent;"
                            >
                                <span class="iconify text-red-500" data-icon="material-symbols:stop-circle-outline-rounded"></span>
                                <span>Isolir</span>
                            </button>
                        </form>

                        <form action="{{ route('subscriptions.dismantle', $subscription['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 text-left hover:bg-gray-100"
                                style="border: none; background: transparent;"
                            >
                                <span class="iconify text-gray-500" data-icon="material-symbols:dangerous"></span>
                                <span>Dismantle</span>
                            </button>
                        </form>

                        <button
                            type="button"
                            onclick="
                                document.getElementById('editSubscriptionForm').action='/subscriptions/{{ $subscription['id'] }}';

                                document.getElementById('edit_subscription_customer').value='{{ $subscription['customer_id'] }}';

                                document.getElementById('edit_subscription_service').value='{{ $subscription['service_id'] }}';

                                document.getElementById('edit_subscription_start').value='{{ $subscription['start_date'] }}';

                                document.getElementById('edit_subscription_end').value='{{ $subscription['end_date'] }}';

                                document.getElementById('edit_subscription_status').value='{{ $subscription['status'] }}';

                                new bootstrap.Modal(document.getElementById('editDataModal')).show();
                            "
                            class="w-full flex items-center gap-3 px-5 py-3 text-left hover:bg-gray-100"
                            style="border: none; background: transparent;"
                        >
                            <span class="iconify" data-icon="mdi:pencil-outline"></span>
                            <span>Edit</span>
                        </button>

                    </div>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div
    class="modal fade"
    id="addDataModal"
    tabindex="-1"
    aria-labelledby="addDataModalLabel"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered"
        style="max-width: 700px; width: 100%; overflow: visible;"
    >
        <div
            class="modal-content bg-white rounded-xl p-8 shadow-lg border-0"
            style="overflow: visible;"
        >
            <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">
                Add Subscription
            </h2>

            @include('subscriptions.create')
        </div>
    </div>
</div>

<div
    class="modal fade"
    id="editDataModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered"
        style="max-width: 700px; width: 100%; overflow: visible;"
    >
        <div
            class="modal-content bg-white rounded-xl p-8 shadow-lg border-0"
            style="overflow: visible;"
        >
            <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">
                Edit Subscription
            </h2>

            @include('subscriptions.edit')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

document.addEventListener('click', function(e) {

    if (!e.target.closest('.action-toggle') &&
        !e.target.closest('.action-dropdown')) {

        document.querySelectorAll('.action-dropdown').forEach(el => {
            el.style.display = 'none';
        });
    }

    if(!e.target.closest('.custom-dropdown-trigger') &&
       !e.target.closest('.custom-dropdown-options'))
    {
        document.querySelectorAll('.custom-dropdown-options').forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }
});

document.querySelectorAll('.action-toggle').forEach(btn => {

    btn.addEventListener('click', function(e) {

        e.stopPropagation();

        const dropdown = this.nextElementSibling;

        const isOpen = dropdown.style.display === 'block';

        document.querySelectorAll('.action-dropdown').forEach(el => {
            el.style.display = 'none';
        });

        if (!isOpen) {
            dropdown.style.display = 'block';
        }
    });
});

function toggleDropdown(trigger)
{
    document.querySelectorAll('.custom-dropdown-options').forEach(dropdown => {

        if(dropdown !== trigger.parentElement.querySelector('.custom-dropdown-options'))
        {
            dropdown.style.display = 'none';
        }
    });

    const dropdown =
        trigger.parentElement.querySelector('.custom-dropdown-options');

    dropdown.style.display =
        dropdown.style.display === 'block'
            ? 'none'
            : 'block';
}

function selectOption(element, value, text)
{
    const wrapper = element.closest('div[style*="position: relative"]');

    wrapper.querySelector('.custom-dropdown-value').value = value;

    const trigger =
        wrapper.querySelector('.custom-dropdown-trigger');

    trigger.innerText = text;

    trigger.style.color = '#111827';

    wrapper.querySelector('.custom-dropdown-options').style.display = 'none';
}

</script>
@endpush