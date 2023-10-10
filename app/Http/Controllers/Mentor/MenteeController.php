<?php

namespace App\Http\Controllers\Mentor;

use App\Models\User;
use App\Models\Mentee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mentees = Mentee::with('user')->where('mentor_id', Auth::user()->id)->get();

        return view('pages.mentor.mentee.index', compact('mentees'));
    }
   
}
