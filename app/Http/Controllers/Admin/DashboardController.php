<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'total_inquiries' => Inquiry::query()->count(),
            'new_inquiries' => Inquiry::query()->where('status', 'new')->count(),
            'reviewing_inquiries' => Inquiry::query()->where('status', 'reviewing')->count(),
            'today_inquiries' => Inquiry::query()->whereDate('created_at', today())->count(),
            'active_services' => Service::query()->where('is_active', true)->count(),
            'inactive_services' => Service::query()->where('is_active', false)->count(),
            'active_projects' => Project::query()->where('is_active', true)->count(),
            'featured_projects' => Project::query()->where('is_featured', true)->count(),
        ];

        $recentInquiries = Inquiry::query()
            ->with('service')
            ->latest()
            ->take(8)
            ->get();

        $serviceBreakdown = Service::query()
            ->withCount('inquiries')
            ->orderByDesc('inquiries_count')
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $pipeline = collect(Inquiry::statusOptions())
            ->mapWithKeys(fn (string $label, string $status) => [
                $status => [
                    'label' => $label,
                    'count' => Inquiry::query()->where('status', $status)->count(),
                ],
            ])
            ->all();

        return view('admin.dashboard', compact('recentInquiries', 'serviceBreakdown', 'stats', 'pipeline'));
    }
}
