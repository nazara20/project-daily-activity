<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::
        with('user')
        ->whereHas('user', function($query){
            $query->whereHas('mentees', function($query){
                $query->where('mentor_id', Auth::user()->id);
            });
        })->orderBy('created_at', 'DESC')->get();

        return view('pages.mentor.activity.index', compact('activities'));
    }

    public function approve(string $id)
    {
        $activity = Activity::findOrFail($id);
        
        $activity->update([
            'is_approved' => !$activity->is_approved,
        ]);

        Alert::success('Sukses', 'Data berhasil diapprove');
        return redirect()->route('mentor.activity.index');
    }
    
}
