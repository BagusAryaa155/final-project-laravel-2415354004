<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();

        return view('services.index', [
            'active' => 'services',
            'services' => $services,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status == 'active',
        ]);

        return redirect()
            ->route('services.index')
            ->with('toast_success', 'Service created successfully');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status == 'active',
        ]);

        return redirect()
            ->route('services.index')
            ->with('toast_success', 'Service updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('toast_success', 'Service deleted successfully');
    }

    public function activate($id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $service->update([
            'status' => true
        ]);

        return redirect()
            ->route('services.index')
            ->with('toast_success', 'Service activated');
    }

    public function deactivate($id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $service->update([
            'status' => false
        ]);

        return redirect()
            ->route('services.index')
            ->with('toast_success', 'Service deactivated');
    }
}