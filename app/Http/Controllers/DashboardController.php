<?php

namespace App\Http\Controllers;

use Inertia\Inertia;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $available_server_count = $user->availableServerCount();
        $used_server_count = $user->servers()->count();

        $available_content_count = $user->availableContentCount();
        $used_movies_count = $user->contents()->where('media_type', 'movie')->count();
        $used_series_count = $user->contents()->where('media_type', 'series')->count();

        $expiry_date = $user->getBasePlanExpiryDate();

        $stats = [
            'available_server_count' => $available_server_count,
            'used_server_count' => $used_server_count,
            'available_content_count' => $available_content_count,
            'used_movies_count' => $used_movies_count,
            'used_series_count' => $used_series_count,
            'expiry_date' => $expiry_date,
        ];

        return Inertia::render(
            'Dashboard',
            [
                'stats' => $stats
            ]
        );
    }

}