<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password as PasswordRule;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
public function editPassword(): \Illuminate\View\View
{
    return view('profile.change-password');
}

public function updatePassword(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'current_password' => ['required', 'current_password'], // verifica la contraseña actual
        'password'         => ['required', 'confirmed', PasswordRule::min(8)],
    ]);

    // Gracias al cast 'password' => 'hashed' en tu modelo User, se hashea solo
    $request->user()->update([
        'password' => $validated['password'],
    ]);

    // (Opcional) Cerrar otras sesiones:
    // $request->session()->regenerate();

    return back()->with('status', 'password-updated');
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
