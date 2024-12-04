<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $news = News::orderBy('published_at', 'desc')->take(3)->get()->map(function ($item) {
            $item->published_at = $item->published_at ? Carbon::parse($item->published_at) : null;
            return $item;
        });
        return view('dashboard', compact('news'));
    }

    public function dashboardAdmin()
    {
        return view('admin.pages.dashboard_admin');
    }
}
