<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function dashboard(): View
    {
        $totalRegistrations = Registration::query()->count();
        $submittedRegistrations = Registration::query()
            ->where('status', 'submitted')
            ->count();
        $schoolCount = Registration::query()
            ->distinct()
            ->count('school');
        $positionCount = Registration::query()
            ->distinct()
            ->count('audition_position');

        $positions = $this->positionStats($totalRegistrations);

        $latestRegistrations = Registration::query()
            ->latest()
            ->limit(6)
            ->get([
                'id',
                'full_name',
                'stage_name',
                'school',
                'grade',
                'audition_position',
                'status',
                'created_at',
            ]);

        return view('admin.dashboard', [
            'latestRegistrations' => $latestRegistrations,
            'positionCount' => $positionCount,
            'positions' => $positions,
            'panelRole' => $this->panelRole(),
            'schoolCount' => $schoolCount,
            'submittedRegistrations' => $submittedRegistrations,
            'totalRegistrations' => $totalRegistrations,
        ]);
    }

    public function participants(): View
    {
        $registrations = Registration::query()
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.participants', [
            'panelRole' => $this->panelRole(),
            'registrations' => $registrations,
            'totalRegistrations' => Registration::query()->count(),
        ]);
    }

    /**
     * @return Collection<int, array{audition_position: string, total: int, percentage: int}>
     */
    private function positionStats(int $totalRegistrations): Collection
    {
        return Registration::query()
            ->selectRaw('audition_position, COUNT(*) as total')
            ->groupBy('audition_position')
            ->orderByDesc('total')
            ->get()
            ->map(function (Registration $registration) use ($totalRegistrations): array {
                $total = (int) $registration->total;

                return [
                    'audition_position' => $registration->audition_position,
                    'total' => $total,
                    'percentage' => $totalRegistrations > 0 ? (int) round(($total / $totalRegistrations) * 100) : 0,
                ];
            });
    }

    private function panelRole(): string
    {
        return auth()->user()?->roles()->value('name') ?? 'admin';
    }
}
