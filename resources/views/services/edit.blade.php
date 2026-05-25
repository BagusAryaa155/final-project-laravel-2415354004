<div class="modal fade" id="editDataModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" style="max-width:700px;">

        <div class="modal-content">

            <h2
                style="
                    font-size:28px;
                    font-weight:700;
                    text-align:center;
                    margin-bottom:28px;
                    color:#111827;
                "
            >
                Edit Service
            </h2>

            <form
                id="editServiceForm"
                method="POST"
            >

                @csrf
                @method('PATCH')

                <div class="mb-4">

                    <label class="mb-2 fw-semibold">
                        Service Name
                    </label>

                    <input
                        type="text"
                        id="edit_service_name"
                        name="name"
                        class="form-control"
                        placeholder="Enter service name"
                    >

                </div>

                <div class="mb-4">

                    <label class="mb-2 fw-semibold">
                        Price
                    </label>

                    <input
                        type="text"
                        id="edit_service_price"
                        name="price"
                        class="form-control"
                        placeholder="Enter price"
                    >

                </div>

                <div class="mb-4">

                    <label class="mb-2 fw-semibold">
                        Description
                    </label>

                    <textarea
                        rows="4"
                        id="edit_service_description"
                        name="description"
                        class="form-control"
                        placeholder="Enter description"
                    ></textarea>

                </div>

                <div class="mb-5">

                    <label class="mb-2 fw-semibold">
                        Status
                    </label>

                    <select
                        id="edit_service_status"
                        name="status"
                        class="form-control"
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
                        justify-content:flex-end;
                        gap:12px;
                    "
                >

                    <button
                        type="button"
                        class="btn-cancel"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

