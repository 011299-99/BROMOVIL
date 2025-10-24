<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class DistributorController extends Controller
{
    public function apply(Request $request)
    {
        // 1) Validación: 'confirmed' obliga a que exista password_confirmation igual a password
        $data = $request->validate([
            'first_name' => ['required','string','max:120'],
            'last_name'  => ['required','string','max:120'],
            'phone'      => ['nullable','string','max:30'], // pon 'required' si tu tabla users tiene este campo y lo necesitas
            'email'      => ['required','email','max:255','unique:users,email'],
            'password'   => ['required','confirmed', Password::min(8)],
            'website'    => ['nullable','size:0'], // honeypot: debe venir vacío
        ], [
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
            'website.size'       => 'Bot detectado.',
        ]);

        // 2) Arma el payload que SÍ existe en tu tabla users
        $payload = [
            'name'     => trim($data['first_name'].' '.$data['last_name']),
            'email'    => $data['email'],
            'password' => $data['password'], // se hashea solo si en User tienes 'password' => 'hashed'
        ];

        if (!empty($data['phone'])) {
            // Solo si tienes columna 'phone' en users y en $fillable
            $payload['phone'] = $data['phone'];
        }

        // 3) Crea el usuario (NO pases 'website' ni 'password_confirmation')
        $user = User::create($payload);

        // opcional: Auth::login($user);

        return back()->with('success', '¡Gracias! Tu registro como distribuidor se recibió correctamente.');
    }
}
