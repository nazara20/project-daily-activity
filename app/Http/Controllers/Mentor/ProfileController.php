<?php

namespace App\Http\Controllers\Mentor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.mentor.profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.mentor.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]); 

        if($request->password != null){
            $request->validate([
                'password' => 'required|string|same:confirm_password',
            ]);
        }

        $user = User::findOrFail($id);
        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
            ]
        );

        if ($request->password != null) {
            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]
            );
        }

        Alert::success('Success', 'Profile berhasil diperbarui');
        return redirect()->route('mentor.profile.index');
    }

}
