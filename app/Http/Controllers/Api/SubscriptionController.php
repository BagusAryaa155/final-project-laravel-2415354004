<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $subscriptions = Subscription::with([
            'customer',
            'service'
        ])->get();

        $customers = Customer::where('status', true)->get();

        $services = Service::where('status', true)->get();

        return view('subscriptions.index', [
            'active' => 'subscriptions',
            'subscriptions' => $subscriptions,
            'customers' => $customers,
            'services' => $services,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        Subscription::create([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('subscriptions.index')
            ->with('toast_success', 'Subscription created successfully');
    }

    public function activate($id): RedirectResponse
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update([
            'status' => 'active'
        ]);

        return redirect()->route('subscriptions.index');
    }

    public function deactivate($id): RedirectResponse
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update([
            'status' => 'inactive'
        ]);

        return redirect()->route('subscriptions.index');
    }

    public function trial($id): RedirectResponse
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update([
            'status' => 'trial'
        ]);

        return redirect()->route('subscriptions.index');
    }

    public function isolir($id): RedirectResponse
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update([
            'status' => 'isolir'
        ]);

        return redirect()->route('subscriptions.index');
    }

    public function dismantle($id): RedirectResponse
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update([
            'status' => 'dismantle'
        ]);

        return redirect()->route('subscriptions.index');
    }
}
