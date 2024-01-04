<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function main(): View
    {
        return \view('dashboard.main');
    }
}
