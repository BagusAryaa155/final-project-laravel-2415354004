@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div></div>

    <button
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#addDataModal"
        class="bg-[#394149] hover:bg-[#2f363d] text-white px-8 py-4 rounded-2xl font-medium"
    >
        + Add Data
    </button>
</div>

<div class="bg-white rounded-3xl border border-gray-200 overflow-visible">

    <table class="w-full">

        <thead>
            <tr class="border-b border-gray-200">

                <th class="text-left px-8 py-6 text-[18px] font-semibold text-gray-900">
                    Customer ID
                </th>

                <th class="text-left px-8 py-6 text-[18px] font-semibold text-gray-900">
                    Customer Name
                </th>

                <th class="text-left px-8 py-6 text-[18px] font-semibold text-gray-900">
                    Email
                </th>

                <th class="text-left px-8 py-6 text-[18px] font-semibold text-gray-900">
                    Address
                </th>

                <th class="text-left px-8 py-6 text-[18px] font-semibold text-gray-900">
                    Status
                </th>

                <th class="text-center px-8 py-6 text-[18px] font-semibold text-gray-900">
                    Action
                </th>

            </tr>
        </thead>

        <tbody>

            @foreach ($customers as $customer)

            <tr class="border-b border-gray-200">

                <td class="px-8 py-6 text-[17px] text-gray-800">
                    {{ $customer['customer_id'] }}
                </td>

                <td class="px-8 py-6 text-[17px] text-gray-800">
                    {{ $customer['name'] }}
                </td>

                <td class="px-8 py-6 text-[17px] text-gray-800">
                    {{ $customer['email'] }}
                </td>

                <td class="px-8 py-6 text-[17px] text-gray-800">
                    {{ $customer['address'] }}
                </td>

                <td class="px-8 py-6">

                    @if($customer['status'])

                        <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm font-medium">
                            Active
                        </span>

                    @else

                        <span class="bg-red-100 text-red-500 px-4 py-1 rounded-full text-sm font-medium">
                            Inactive
                        </span>

                    @endif

                </td>

                <td class="px-8 py-6 text-center relative action-area">

                    <button
                        type="button"
                        onclick="toggleActionDropdown({{ $customer['id'] }})"
                        class="text-xl text-gray-700 hover:text-black"
                    >
                        ☰
                    </button>

                    <div
                        id="actionDropdown{{ $customer['id'] }}"
                        class="hidden absolute right-10 top-14 bg-white rounded-xl shadow-lg border border-gray-200 w-52 z-50 overflow-hidden"
                    >

                        @if($customer['status'])

                        <form action="{{ route('customers.deactivate', $customer['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 hover:bg-gray-100 text-left text-gray-700"
                            >
                                🚫 Deactivate
                            </button>
                        </form>

                        @else

                        <form action="{{ route('customers.activate', $customer['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-5 py-3 hover:bg-gray-100 text-left text-gray-700"
                            >
                                ✔ Active
                            </button>
                        </form>

                        @endif

                        <button
                            type="button"
                            onclick="openEditModal(
                                {{ $customer['id'] }},
                                '{{ $customer['customer_id'] }}',
                                '{{ $customer['name'] }}',
                                '{{ $customer['email'] }}',
                                '{{ $customer['address'] }}',
                                '{{ $customer['status'] ? 'active' : 'inactive' }}'
                            )"
                            class="w-full flex items-center gap-3 px-5 py-3 hover:bg-gray-100 text-left text-gray-700"
                        >
                            ✏ Edit
                        </button>

                        <button
                            type="button"
                            onclick="openDeleteModal(
                                {{ $customer['id'] }},
                                '{{ $customer['name'] }}'
                            )"
                            class="w-full flex items-center gap-3 px-5 py-3 hover:bg-gray-100 text-left text-red-500"
                        >
                            🗑 Delete
                        </button>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@include('customers.create')
@include('customers.edit')
@include('customers.delete')

@endsection

@push('scripts')

<script>

function toggleActionDropdown(id)
{
    document.querySelectorAll('[id^="actionDropdown"]').forEach(el => {
        if(el.id !== 'actionDropdown' + id){
            el.classList.add('hidden');
        }
    });

    document
        .getElementById('actionDropdown' + id)
        .classList.toggle('hidden');
}

document.addEventListener('click', function(e)
{
    if(!e.target.closest('.action-area'))
    {
        document.querySelectorAll('[id^="actionDropdown"]').forEach(el => {
            el.classList.add('hidden');
        });
    }
});

function openEditModal(
    id,
    customerId,
    name,
    email,
    address,
    status
)
{
    document.getElementById('edit_customer_db_id').value = id;
    document.getElementById('edit_customer_id').value = customerId;
    document.getElementById('edit_customer_name').value = name;
    document.getElementById('edit_customer_email').value = email;
    document.getElementById('edit_customer_address').value = address;
    document.getElementById('edit_customer_status').value = status;

    document.getElementById('editCustomerForm').action =
        '/customers/' + id;

    const modal =
        new bootstrap.Modal(
            document.getElementById('editDataModal')
        );

    modal.show();
}

function openDeleteModal(id, name)
{
    document.getElementById('delete_customer_name').innerText = name;

    document.getElementById('deleteCustomerForm').action =
        '/customers/' + id;

    const modal =
        new bootstrap.Modal(
            document.getElementById('deleteDataModal')
        );

    modal.show();
}

</script>

@endpush