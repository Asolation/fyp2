<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::latest()->paginate(5);
        // Define a mapping of roles to dashboard routes
        $dashboardRoutes = [
            'student' => 'student.dashboard',
            'admin' => 'admin.dashboard',
        ];

        return view('welcome', compact('news', 'dashboardRoutes'));
    }
}
