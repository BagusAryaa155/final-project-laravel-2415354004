<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();

        return view('customers.index', [
            'active' => 'customers',
            'customers' => $customers,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        Customer::create([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status == 'active',
        ]);

        return redirect()
            ->route('customers.index')
            ->with('toast_success', 'Customer created successfully');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $customer->update([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status == 'active',
        ]);

        return redirect()
            ->route('customers.index')
            ->with('toast_success', 'Customer updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('toast_success', 'Customer deleted successfully');
    }

    public function activate($id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'status' => true
        ]);

        return redirect()
            ->route('customers.index');
    }

    public function deactivate($id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'status' => false
        ]);

        return redirect()
            ->route('customers.index');
    }
}
