<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Mentee;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_mentee = Mentee::where('mentor_id', Auth::user()->id)->count();
        $total_aktifitas = Activity::
            whereHas('user', function($query){
                $query->whereHas('mentees', function($query){
                    $query->where('mentor_id', Auth::user()->id);
                });
            })->count();


        $activities = Activity::with('user')->whereHas('user', function($query){
            $query->whereHas('mentees', function($query){
                $query->where('mentor_id', Auth::user()->id);
            });
        })->limit('5')->orderBy('created_at', 'DESC')->get();



            // untuk Chart
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $activityData = [];

        foreach($months as $index => $month){
            $activity = Activity::whereHas('user', function($query){
                $query->whereHas('mentees', function($query){
                    $query->where('mentor_id', Auth::user()->id);
                });
            })->whereMonth('created_at', $index+1)->count();

            array_push($activityData, $activity);
        }

            $data = [
                'total_mentee' => $total_mentee,
                'total_aktifitas' => $total_aktifitas,
                'months' => $months,
                'activities' => $activities,
                'activityData' => $activityData,
            ];

        return view('pages.mentor.dashboard.index', $data);
    }
}
