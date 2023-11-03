<?php

namespace App\Http\Controllers\Mentee;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();

        $latestActivity = Activity::where('user_id', auth()->user()->id)->latest()->first();

        // variabel today digunakan untuk memfilter data hari ini pada data aktifitas
        $today = now()->format('Y-m-d');

        $data = [
            'activities' => $activities,
            'latestActivity' => $latestActivity,
            'today' => $today,
        ];

        return view('pages.mentee.activity.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.mentee.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data agar tidak ada data yang kosong, sesuaikan nama input dengan yang ada di create.blade.php
        $request->validate([
            'todayplan' => 'required',
            'screenshoot' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // menyimpan gambar yang diupload ke dalam folder public/storage/activity
        $request->file('screenshoot')->move('storage/activity', $request->file('screenshoot')->getClientOriginalName());

        // menyimpan data sesuai kebutuhan yang ada di table activity
        $acitivity = Activity::create([
            'date_activity' => now(), // mengambil tanggal sekarang
            'description' => $request->todayplan,
            'user_id' => auth()->user()->id,
            'is_approved' => false,
            'image' => $request->file('screenshoot')->getClientOriginalName()
        ]);

        // jangan lupa import class Alert
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect()->route('mentee.activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // mengambil data activity berdasarkan id
        $activity = Activity::findOrFail($id);

        return view('pages.mentee.activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $acitivity = Activity::findOrFail($id);

        $request->validate([
            'todayplan' => 'required',
            'screenshoot' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // jika ada gambar yang diupload
        if ($request->file('screenshoot')) {
            $request->file('screenshoot')->move('storage/activity', $request->file('screenshoot')->getClientOriginalName());

            $acitivity->update([
                'description' => $request->todayplan,
                'image' => $request->file('screenshoot')->getClientOriginalName()
            ]);

            // jika tidak ada gambar yang diganti/diupload
        } else {
            $acitivity->update([
                'description' => $request->todayplan,
            ]);
        }

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('mentee.activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $acitivity = Activity::findOrFail($id);

        $acitivity->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->route('mentee.activity.index');
    }
}
