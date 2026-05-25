<div class="modal fade" id="addDataModal" tabindex="-1" aria-hidden="true">

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
                Add Service
            </h2>

            <form action="{{ route('services.store') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="mb-2 fw-semibold">
                        Service Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Enter service name"
                    >

                    @error('name')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="mb-2 fw-semibold">
                        Price
                    </label>

                    <input
                        type="text"
                        name="price"
                        value="{{ old('price') }}"
                        class="form-control"
                        placeholder="Enter price"
                    >

                    @error('price')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="mb-2 fw-semibold">
                        Description
                    </label>

                    <textarea
                        rows="4"
                        name="description"
                        class="form-control"
                        placeholder="Enter description"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-5">

                    <label class="mb-2 fw-semibold">
                        Status
                    </label>

                    <select
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

                    @error('status')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

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
                        Submit
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
