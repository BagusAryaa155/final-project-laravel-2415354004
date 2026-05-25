<div class="modal fade" id="addDataModal" tabindex="-1" aria-hidden="true">

    <div
        class="modal-dialog modal-dialog-centered"
        style="
            max-width:700px;
            width:100%;
        "
    >

        <div
            class="modal-content bg-white rounded-xl p-8 shadow-lg border-0"
        >

            <h2
                class="text-2xl font-bold text-gray-900 text-center mb-6"
            >
                Add Customer
            </h2>

            <form
                action="{{ route('customers.store') }}"
                method="POST"
            >

                @csrf

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Customer ID
                    </label>

                    <input
                        type="text"
                        name="customer_id"
                        value="{{ old('customer_id') }}"
                        placeholder="Enter your ID"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "
                    >

                    @error('customer_id')

                        <div
                            style="
                                color:#ef4444;
                                font-size:13px;
                                margin-top:4px;
                            "
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Customer Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your name"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "
                    >

                    @error('name')

                        <div
                            style="
                                color:#ef4444;
                                font-size:13px;
                                margin-top:4px;
                            "
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "
                    >

                    @error('email')

                        <div
                            style="
                                color:#ef4444;
                                font-size:13px;
                                margin-top:4px;
                            "
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Address
                    </label>

                    <input
                        type="text"
                        name="address"
                        value="{{ old('address') }}"
                        placeholder="Enter your address"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "
                    >

                    @error('address')

                        <div
                            style="
                                color:#ef4444;
                                font-size:13px;
                                margin-top:4px;
                            "
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="mb-6">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Status
                    </label>

                    <select
                        name="status"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                            color:#111827;
                        "
                    >

                        <option value="">
                            Select Status
                        </option>

                        <option
                            value="active"
                            {{ old('status') == 'active' ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            {{ old('status') == 'inactive' ? 'selected' : '' }}
                        >
                            Inactive
                        </option>

                    </select>

                    @error('status')

                        <div
                            style="
                                color:#ef4444;
                                font-size:13px;
                                margin-top:4px;
                            "
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div
                    style="
                        display:flex;
                        align-items:center;
                        justify-content:flex-end;
                        gap:12px;
                    "
                >

                    <button
                        type="button"
                        data-bs-dismiss="modal"

                        style="
                            padding:12px 24px;
                            border:1px solid #d1d5db;
                            border-radius:12px;
                            background:white;
                            color:#111827;
                        "
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"

                        style="
                            padding:12px 24px;
                            border:none;
                            border-radius:12px;
                            background-color:#394149;
                            color:white;
                        "
                    >
                        Submit
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
