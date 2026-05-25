<div class="modal fade" id="editDataModal" tabindex="-1" aria-hidden="true">

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
                Edit Customer
            </h2>

            <form
                id="editCustomerForm"
                method="POST"
            >

                @csrf
                @method('PATCH')

                <input
                    type="hidden"
                    id="edit_customer_db_id"
                    name="db_id"
                >

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Customer ID
                    </label>

                    <input
                        type="text"
                        id="edit_customer_id"
                        name="customer_id"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "

                        placeholder="Enter your ID"
                    >

                </div>

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Customer Name
                    </label>

                    <input
                        type="text"
                        id="edit_customer_name"
                        name="name"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "

                        placeholder="Enter your name"
                    >

                </div>

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="edit_customer_email"
                        name="email"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "

                        placeholder="Enter your email"
                    >

                </div>

                <div class="mb-4">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Address
                    </label>

                    <input
                        type="text"
                        id="edit_customer_address"
                        name="address"

                        style="
                            background-color:#f3f4f6;
                            border:none;
                            border-radius:12px;
                            padding:12px 16px;
                            width:100%;
                            outline:none;
                        "

                        placeholder="Enter your address"
                    >

                </div>

                <div class="mb-6">

                    <label
                        class="block font-semibold text-gray-900 mb-2"
                    >
                        Status
                    </label>

                    <select
                        id="edit_customer_status"
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

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>

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
