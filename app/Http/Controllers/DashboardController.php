<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function main(Request $request): View
    {
        $user = Auth::user();

        return \view(
            'dashboard.main',
            [
                'user' => $user,
            ]
        );
    }
}
