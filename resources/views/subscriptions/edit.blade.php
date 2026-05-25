<form
    id="editSubscriptionForm"
    method="POST"
>
    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block font-semibold text-gray-900 mb-2">
            Customer
        </label>

        <select
            name="customer_id"
            id="edit_subscription_customer"
            style="
                background-color: #f3f4f6;
                border: none;
                border-radius: 12px;
                padding: 12px 16px;
                width: 100%;
                outline: none;
            "
        >

            @foreach ($customers as $customer)

                <option value="{{ $customer['id'] }}">
                    {{ $customer['name'] }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label class="block font-semibold text-gray-900 mb-2">
            Service
        </label>

        <select
            name="service_id"
            id="edit_subscription_service"
            style="
                background-color: #f3f4f6;
                border: none;
                border-radius: 12px;
                padding: 12px 16px;
                width: 100%;
                outline: none;
            "
        >

            @foreach ($services as $service)

                <option value="{{ $service['id'] }}">
                    {{ $service['name'] }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="grid grid-cols-2 gap-4">

        <div class="mb-4">

            <label class="block font-semibold text-gray-900 mb-2">
                Start Date
            </label>

            <input
                type="date"
                name="start_date"
                id="edit_subscription_start"
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

        <div class="mb-4">

            <label class="block font-semibold text-gray-900 mb-2">
                End Date
            </label>

            <input
                type="date"
                name="end_date"
                id="edit_subscription_end"
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

    </div>

    <div class="mb-6">

        <label class="block font-semibold text-gray-900 mb-2">
            Status
        </label>

        <select
            name="status"
            id="edit_subscription_status"
            style="
                background-color: #f3f4f6;
                border: none;
                border-radius: 12px;
                padding: 12px 16px;
                width: 100%;
                outline: none;
            "
        >

            <option value="active">
                Active
            </option>

            <option value="trial">
                Trial
            </option>

            <option value="isolir">
                Isolir
            </option>

            <option value="dismantle">
                Dismantle
            </option>

        </select>

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