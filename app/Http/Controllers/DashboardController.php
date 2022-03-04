<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class DashboardController extends BaseController
{
    public function index()
    {
        return Inertia::render('Dashboard/Index');
    }
}
