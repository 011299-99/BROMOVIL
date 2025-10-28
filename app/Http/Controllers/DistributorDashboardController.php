<?php

// app/Http/Controllers/DistributorDashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DistributorDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        // Crea el perfil si no existe 
        $dist = $user->distributor()->firstOrCreate([], [
            'display_name'     => $user->name ?: $user->email,
            'code'             => 'BRO-'.str_pad((string)$user->id, 3, '0', STR_PAD_LEFT),
            'whatsapp'         => preg_replace('/\D+/', '', (string)($user->phone ?? '')) ?: null,
            'active_lines'     => 0,
            'month_commission' => 0,
            'sipab_balance'    => 0,
        ]);

        // KPIs expuestos a la vista
        $stats = [
            'active_lines'     => (int) $dist->active_lines,
            'month_commission' => (float) $dist->month_commission,
            'sipab_balance'    => (float) $dist->sipab_balance,
        ];

        // Preview “mock” (hasta que tengas tablas reales)
        $preview = collect([
            (object)['fecha'=>now()->subDays(1),'concepto'=>'Activación','plan'=>'Básico','monto'=>50,'estado'=>'pagado'],
            (object)['fecha'=>now()->subDays(2),'concepto'=>'Recarga','plan'=>'Ideal','monto'=>199*0.08,'estado'=>'pagado'],
            (object)['fecha'=>now()->subDays(3),'concepto'=>'Portabilidad','plan'=>'Poderoso','monto'=>95+30,'estado'=>'pendiente'],
        ]);

        return view('tu.vista.dashboard', [
            'user'    => $user,
            'dist'    => $dist,
            'stats'   => $stats,
            'preview' => $preview,
        ]);
    }
}

