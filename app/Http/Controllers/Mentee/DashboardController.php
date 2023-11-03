<?php

namespace App\Http\Controllers\Mentee;

use App\Models\Mentee;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_aktifitas = Activity::where('user_id', Auth::user()->id)->count();

        $mentor = Mentee::where('user_id', Auth::user()->id)->first();


        // untuk Chart
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $activityData = [];

        foreach($months as $index => $month){
            $activity = Activity::where('user_id', Auth::user()->id)->whereMonth('created_at', $index+1)->count();

            array_push($activityData, $activity);
        }

        $data = [
            'total_aktifitas' => $total_aktifitas,
            'mentor' => $mentor,
            'months' => $months,
            'activityData' => $activityData,
        ];

        return view('pages.mentee.dashboard.index', $data);
    }
}
