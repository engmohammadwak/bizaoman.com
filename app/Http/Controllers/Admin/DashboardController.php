<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Pages', 'value' => '8', 'change' => '+2 this month'],
                ['label' => 'Services', 'value' => '6', 'change' => 'Active'],
                ['label' => 'Team members', 'value' => '12', 'change' => 'Published'],
                ['label' => 'Messages', 'value' => '24', 'change' => '5 unread'],
            ],
        ]);
    }
}
