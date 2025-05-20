<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::query()->where('id', Auth::user()->id)->firstOrFail();
        $user->load('profile');
        return view('profile.index', compact('user'));
    }

    public function update_bio(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|max:255',
        ]);

        $user = User::query()->where('id', Auth::user()->id)->firstOrFail();
        $user->profile()->update(['bio' => $request->input('bio')]);

        return redirect()->route('profile.index')->with('success', 'Votre biographie a été mise à jour avec succès!');
    }


    public function update_image(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = User::query()->where('id', Auth::user()->id)->firstOrFail();
        $path = $request->file('profile_image')->store('profile_image', 'public');
        $user->profile()->update(['profile_image' => $path]);

        return redirect()->route('profile.index')->with('success', 'Votre image de profil a été mise à jour avec succès!');
    }



}
