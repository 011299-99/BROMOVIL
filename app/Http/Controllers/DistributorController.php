<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function apply(Request $request)
    {
        // 1) Validación
        $data = $request->validate([
            'first_name' => ['required','string','max:120'],
            'last_name'  => ['required','string','max:120'],
            'email'      => ['required','email','max:255','unique:users,email'],
            'phone'      => ['required','string','max:30'],
            'password'   => ['required','string','min:8','confirmed'],
            // campos opcionales del perfil distribuidor:
            'display_name' => ['nullable','string','max:255'],
            'whatsapp'     => ['nullable','string','max:30'],
            // honeypot (no se guarda)
            'website'      => ['nullable','string','max:255'],
        ]);

        // 2) Antispam simple (honeypot): si viene con algo, aborta “silenciosamente”
        if (!empty($data['website'] ?? null)) {
            return back()->with('success', '¡Tu registro se envió con éxito!')->withInput();
        }

        // 3) Crear usuario (el hash lo hace el cast del modelo)
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'password'   => $data['password'],
        ]);

        // 4) Crear perfil de distribuidor (opcional)
        $user->distributor()->create([
            'display_name' => $data['display_name'] ?? ($user->name ?: $user->email),
            'whatsapp'     => $data['whatsapp'] ?? null,
        ]);

   
        // 5) Volver al formulario con el flash de éxito
        return redirect()
            ->route('distribuidor.form')
            ->with('success', '¡Tu registro se envió con éxito! Te contactaremos por correo en las próximas 24–48h.');
    }
}
