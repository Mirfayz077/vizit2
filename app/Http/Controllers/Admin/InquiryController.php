<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $statuses = Inquiry::statusOptions();
        $summary = collect($statuses)
            ->mapWithKeys(fn (string $label, string $status) => [
                $status => Inquiry::query()->where('status', $status)->count(),
            ])
            ->all();

        $inquiries = Inquiry::query()
            ->with('service')
            ->when($request->filled('status') && array_key_exists($request->string('status')->toString(), $statuses), function ($query) use ($request) {
                $query->where('status', $request->string('status')->toString());
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->trim()->toString();

                $query->where(function ($nested) use ($search) {
                    $nested
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%")
                        ->orWhere('business_niche', 'like', "%{$search}%")
                        ->orWhere('platform', 'like', "%{$search}%")
                        ->orWhere('goal', 'like', "%{$search}%")
                        ->orWhere('project_summary', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.inquiries.index', compact('inquiries', 'statuses', 'summary'));
    }

    public function show(Inquiry $inquiry): View
    {
        $inquiry->load('service');

        return view('admin.inquiries.show', [
            'inquiry' => $inquiry,
            'statuses' => Inquiry::statusOptions(),
        ]);
    }

    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(array_keys(Inquiry::statusOptions()))],
        ]);

        $inquiry->update([
            'status' => $validated['status'],
        ]);

        return back()->with('status', 'Murojaat holati yangilandi.');
    }
}
