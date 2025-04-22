<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Prediction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Display the details of a specific user
    public function index($id)
    {
        $users = User::findOrFail($id);

        // Status kesehatan user
        $prediction = Prediction::where('user_id', Auth::id())->latest()->first();
        $input = $prediction->input_data;
        
        $age = $input['age']; // Usia
        $sex = $input['sex']; // Jenis Kelamin
        $cp = $input['thalach']; // detak jantung
        $trestbps = $input['trestbps']; // tekanan darah
        $chol = $input['chol']; // kolesterol

        return view('profile.details', compact('users', 'input', 'cp', 'trestbps', 'chol', 'age', 'sex'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
