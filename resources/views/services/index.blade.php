@extends('layouts.app')

@section('title', 'Services')

@section('content')

<div
    style="
        display:flex;
        justify-content:flex-end;
        margin-bottom:18px;
    "
>

    <button
        data-bs-toggle="modal"
        data-bs-target="#addDataModal"
        style="
            background:#394149;
            color:white;
            border:none;
            padding:10px 18px;
            border-radius:14px;
            font-weight:600;
            display:flex;
            align-items:center;
            gap:8px;
        "
    >
        +
        Add Data
    </button>

</div>

<div
    style="
        background:white;
        border:1px solid #e5e7eb;
        border-radius:12px;
        overflow:visible;
    "
>

    <table class="table mb-0">

        <thead>

            <tr>

                <th style="padding:18px;">
                    Service Name
                </th>

                <th style="padding:18px;">
                    Price
                </th>

                <th style="padding:18px;">
                    Status
                </th>

                <th style="padding:18px; width:100px;">
                    Action
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach ($services as $service)

                <tr>

                    <td style="padding:18px;">
                        {{ $service->name }}
                    </td>

                    <td style="padding:18px;">
                        Rp{{ number_format($service->price, 0, ',', '.') }}
                    </td>

                    <td style="padding:18px;">

                        @if($service->status)

                            <span
                                style="
                                    background:#dcfce7;
                                    color:#16a34a;
                                    padding:4px 12px;
                                    border-radius:999px;
                                    font-size:12px;
                                    font-weight:600;
                                "
                            >
                                Active
                            </span>

                        @else

                            <span
                                style="
                                    background:#fee2e2;
                                    color:#dc2626;
                                    padding:4px 12px;
                                    border-radius:999px;
                                    font-size:12px;
                                    font-weight:600;
                                "
                            >
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td style="padding:18px;">

                        <div class="dropdown">

                            <button
                                class="btn"
                                data-bs-toggle="dropdown"
                                style="
                                    border:none;
                                    background:none;
                                    font-size:22px;
                                    padding:0;
                                "
                            >
                                ≡
                            </button>

                            <ul class="dropdown-menu">

                                @if(!$service->status)

                                    <li>

                                        <form
                                            action="{{ route('services.activate', $service->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                class="dropdown-item"
                                                type="submit"
                                            >
                                                👁 Active
                                            </button>

                                        </form>

                                    </li>

                                @endif

                                @if($service->status)

                                    <li>

                                        <form
                                            action="{{ route('services.deactivate', $service->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                class="dropdown-item"
                                                type="submit"
                                            >
                                                🚫 Deactivate
                                            </button>

                                        </form>

                                    </li>

                                @endif

                                <li>

                                    <button
                                        type="button"
                                        class="dropdown-item"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editDataModal"
                                        onclick="
                                            document.getElementById('editServiceForm').action='/services/{{ $service->id }}';
                                            document.getElementById('edit_service_name').value='{{ $service->name }}';
                                            document.getElementById('edit_service_price').value='{{ $service->price }}';
                                            document.getElementById('edit_service_description').value='{{ $service->description }}';
                                            document.getElementById('edit_service_status').value='{{ $service->status ? 'active' : 'inactive' }}';
                                        "
                                    >
                                        ✏ Edit
                                    </button>

                                </li>

                                <li>

                                    <form
                                        action="{{ route('services.destroy', $service->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="dropdown-item text-danger"
                                            type="submit"
                                        >
                                            🗑 Delete
                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </div>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@include('services.create')

@include('services.edit')

@endsection

