<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index(){
        $users = User::limit('5')->orderByDesc('created_at')->get();

        $total_mentee = User::WhereHas('role', function($query){
            $query->where('name', 'Mentee')->orWhere('name', 'mentee');
        })->count();
        $total_mentor = User::WhereHas('role', function($query){
            $query->where('name', 'Mentor')->orWhere('name', 'mentor');
        })->count();

        return view('pages.admin.dashboard.index', compact('users', 'total_mentee', 'total_mentor'));
    }
}
