<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;

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
     * @return \Illuminate\View\View
     */
    public static function index()
    {
        $projects = Project::all();
        $users = User::all();
        return view('dashboard', ['projects' => count($projects)])->with('users', $users);
    }
}