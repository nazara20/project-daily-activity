<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Mentee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_mentee = Mentee::where('mentor_id', Auth::user()->id)->count();
        return view('pages.mentor.dashboard.index', compact('total_mentee'));
    }
}
