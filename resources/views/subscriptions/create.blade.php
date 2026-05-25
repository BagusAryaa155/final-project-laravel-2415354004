<form action="{{ route('subscriptions.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block font-semibold text-gray-900 mb-2">
            Customer
        </label>

        <div style="position: relative;">

            <input
                type="hidden"
                name="customer_id"
                class="custom-dropdown-value"
                value="{{ old('customer_id') }}"
            >

            <div
                class="custom-dropdown-trigger"
                data-placeholder="Select Customer"
                onclick="toggleDropdown(this)"
                style="
                    background-color: #f3f4f6;
                    border: none;
                    border-radius: 12px;
                    padding: 12px 16px;
                    width: 100%;
                    outline: none;
                    cursor: pointer;
                    user-select: none;
                    color: {{ old('customer_id') ? '#111827' : '#6b7280' }};
                    min-height: 48px;
                "
            >
                Select Customer
            </div>

            <svg
                style="
                    position: absolute;
                    right: 16px;
                    top: 50%;
                    transform: translateY(-50%);
                    pointer-events: none;
                    width: 20px;
                    height: 20px;
                    color: #6b7280;
                "
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                />
            </svg>

            <div
                class="custom-dropdown-options"
                style="
                    display: none;
                    position: absolute;
                    top: calc(100% + 8px);
                    left: 0;
                    width: 100%;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
                    z-index: 99999;
                    overflow: hidden;
                "
            >

                @foreach ($customers as $customer)

                    <div
                        class="custom-dropdown-option"
                        onclick="selectOption(this, '{{ $customer['id'] }}', '{{ $customer['name'] }}')"
                        style="
                            padding: 12px 16px;
                            cursor: pointer;
                        "
                        onmouseenter="this.style.backgroundColor='#f3f4f6'"
                        onmouseleave="this.style.backgroundColor='white'"
                    >
                        {{ $customer['name'] }}
                    </div>

                @endforeach

            </div>

        </div>

        @error('customer_id')
            <div
                class="field-error"
                style="
                    color: #ef4444;
                    font-size: 13px;
                    margin-top: 4px;
                "
            >
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold text-gray-900 mb-2">
            Service
        </label>

        <div style="position: relative;">

            <input
                type="hidden"
                name="service_id"
                class="custom-dropdown-value"
                value="{{ old('service_id') }}"
            >

            <div
                class="custom-dropdown-trigger"
                data-placeholder="Select Service"
                onclick="toggleDropdown(this)"
                style="
                    background-color: #f3f4f6;
                    border: none;
                    border-radius: 12px;
                    padding: 12px 16px;
                    width: 100%;
                    outline: none;
                    cursor: pointer;
                    user-select: none;
                    color: {{ old('service_id') ? '#111827' : '#6b7280' }};
                    min-height: 48px;
                "
            >
                Select Service
            </div>

            <svg
                style="
                    position: absolute;
                    right: 16px;
                    top: 50%;
                    transform: translateY(-50%);
                    pointer-events: none;
                    width: 20px;
                    height: 20px;
                    color: #6b7280;
                "
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                />
            </svg>

            <div
                class="custom-dropdown-options"
                style="
                    display: none;
                    position: absolute;
                    top: calc(100% + 8px);
                    left: 0;
                    width: 100%;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
                    z-index: 99999;
                    overflow: hidden;
                "
            >

                @foreach ($services as $service)

                    <div
                        class="custom-dropdown-option"
                        onclick="selectOption(this, '{{ $service['id'] }}', '{{ $service['name'] }}')"
                        style="
                            padding: 12px 16px;
                            cursor: pointer;
                        "
                        onmouseenter="this.style.backgroundColor='#f3f4f6'"
                        onmouseleave="this.style.backgroundColor='white'"
                    >
                        {{ $service['name'] }}
                    </div>

                @endforeach

            </div>

        </div>

        @error('service_id')
            <div
                class="field-error"
                style="
                    color: #ef4444;
                    font-size: 13px;
                    margin-top: 4px;
                "
            >
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">

        <div class="mb-4">
            <label class="block font-semibold text-gray-900 mb-2">
                Start Date
            </label>

            <div style="position: relative;">

                <input
                    type="date"
                    name="start_date"
                    value="{{ old('start_date') }}"
                    style="
                        background-color: #f3f4f6;
                        border: none;
                        border-radius: 12px;
                        padding: 12px 16px;
                        width: 100%;
                        outline: none;
                    "
                >

            </div>

            @error('start_date')
                <div
                    class="field-error"
                    style="
                        color: #ef4444;
                        font-size: 13px;
                        margin-top: 4px;
                    "
                >
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-900 mb-2">
                End Date
            </label>

            <div style="position: relative;">

                <input
                    type="date"
                    name="end_date"
                    value="{{ old('end_date') }}"
                    style="
                        background-color: #f3f4f6;
                        border: none;
                        border-radius: 12px;
                        padding: 12px 16px;
                        width: 100%;
                        outline: none;
                    "
                >

            </div>

            @error('end_date')
                <div
                    class="field-error"
                    style="
                        color: #ef4444;
                        font-size: 13px;
                        margin-top: 4px;
                    "
                >
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="mb-6">
        <label class="block font-semibold text-gray-900 mb-2">
            Status
        </label>

        <div style="position: relative;">

            <input
                type="hidden"
                name="status"
                class="custom-dropdown-value"
                value="{{ old('status') }}"
            >

            <div
                class="custom-dropdown-trigger"
                data-placeholder="Select Status"
                onclick="toggleDropdown(this)"
                style="
                    background-color: #f3f4f6;
                    border: none;
                    border-radius: 12px;
                    padding: 12px 16px;
                    width: 100%;
                    outline: none;
                    cursor: pointer;
                    user-select: none;
                    color: {{ old('status') ? '#111827' : '#6b7280' }};
                    min-height: 48px;
                "
            >
                {{ old('status') ? ucfirst(old('status')) : 'Select Status' }}
            </div>

            <svg
                style="
                    position: absolute;
                    right: 16px;
                    top: 50%;
                    transform: translateY(-50%);
                    pointer-events: none;
                    width: 20px;
                    height: 20px;
                    color: #6b7280;
                "
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                />
            </svg>

            <div
                class="custom-dropdown-options"
                style="
                    display: none;
                    position: absolute;
                    top: calc(100% + 8px);
                    left: 0;
                    width: 100%;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
                    z-index: 99999;
                    overflow: hidden;
                "
            >

                <div
                    class="custom-dropdown-option"
                    onclick="selectOption(this, 'active', 'Active')"
                    style="padding: 12px 16px; cursor: pointer;"
                    onmouseenter="this.style.backgroundColor='#f3f4f6'"
                    onmouseleave="this.style.backgroundColor='white'"
                >
                    Active
                </div>

                <div
                    class="custom-dropdown-option"
                    onclick="selectOption(this, 'trial', 'Trial')"
                    style="padding: 12px 16px; cursor: pointer;"
                    onmouseenter="this.style.backgroundColor='#f3f4f6'"
                    onmouseleave="this.style.backgroundColor='white'"
                >
                    Trial
                </div>

                <div
                    class="custom-dropdown-option"
                    onclick="selectOption(this, 'isolir', 'Isolir')"
                    style="padding: 12px 16px; cursor: pointer;"
                    onmouseenter="this.style.backgroundColor='#f3f4f6'"
                    onmouseleave="this.style.backgroundColor='white'"
                >
                    Isolir
                </div>

                <div
                    class="custom-dropdown-option"
                    onclick="selectOption(this, 'dismantle', 'Dismantle')"
                    style="padding: 12px 16px; cursor: pointer;"
                    onmouseenter="this.style.backgroundColor='#f3f4f6'"
                    onmouseleave="this.style.backgroundColor='white'"
                >
                    Dismantle
                </div>

            </div>

        </div>

        @error('status')
            <div
                class="field-error"
                style="
                    color: #ef4444;
                    font-size: 13px;
                    margin-top: 4px;
                "
            >
                {{ $message }}
            </div>
        @enderror
    </div>

    <div
        style="
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        "
    >

        <button
            type="button"
            data-bs-dismiss="modal"
            style="
                padding: 12px 24px;
                border: 1px solid #d1d5db;
                border-radius: 12px;
                background: white;
                color: #111827;
            "
        >
            Cancel
        </button>

        <button
            type="submit"
            style="
                padding: 12px 24px;
                border: none;
                border-radius: 12px;
                background-color: #394149;
                color: white;
            "
        >
            Submit
        </button>

    </div>

</form>