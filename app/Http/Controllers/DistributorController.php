<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function apply(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:120'],
            'phone'    => ['required','string','max:30'],
            'email'    => ['required','email','max:120'],
            'state'    => ['required','string','max:60'],
            'city'     => ['required','string','max:60'],
            'interest' => ['required','string','in:SIMs Movilidad,eSIM,MiFi'],
            'volume'   => ['nullable','integer','min:10','max:300'],
            'message'  => ['nullable','string','max:1000'],
            'consent'  => ['accepted'],
            // honeypot (campo oculto; debe ir vacío)
            'website'  => ['nullable','size:0'],
        ], [
            'website.size' => 'Bot detectado.',
        ]);

        // TODO: Guardar en BD / enviar correo / notificar Slack.
        // Por ahora solo regresamos con mensaje de éxito.
        return back()->with('success', '¡Gracias! Recibimos tu solicitud. Te contactaremos muy pronto.');
    }
}
