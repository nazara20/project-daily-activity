<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index(){
        $users = User::get();

        $total_mentee = User::where('role_id', 2)->count();
        $total_mentor = User::where('role_id', 3)->count();

        return view('pages.admin.dashboard.index', compact('users', 'total_mentee', 'total_mentor'));
    }
}
