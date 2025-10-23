<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class DistributorController extends Controller
{
    public function apply(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:120'],
            'last_name'  => ['required','string','max:120'],
            'phone'      => ['required','string','max:30'],
            'email'      => ['required','email','max:255','unique:users,email'],
            'password'   => ['required', Password::min(8)], // si agregas confirmación en el form, usa: ['required','confirmed', Password::min(8)]
            'website'    => ['nullable','size:0'], // honeypot (debe ir vacío)
        ], [
            'website.size' => 'Bot detectado.',
        ]);

        // Si tu modelo User tiene cast 'password' => 'hashed' (sí lo tiene), puedes asignar directo:
        $user = User::create($data);

        // TODO opcional: iniciar sesión, enviar correo, etc.
        // Auth::login($user);

        return back()->with('success', '¡Gracias! Tu registro como distribuidor se recibió correctamente.');
    }
}
