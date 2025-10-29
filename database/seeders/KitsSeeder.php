<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class KitsSeeder extends Seeder
{
    public function run(): void
    {
        $kits = [
            ['sku' => 'KIT1', 'title' => 'KIT 1 – Emprende',               'price' => 250,  'type' => 'kit'],
            ['sku' => 'KIT2', 'title' => 'KIT 2 – Avanza',                  'price' => 495,  'type' => 'kit'],
            ['sku' => 'KIT3', 'title' => 'KIT 3 – Distribuidor Profesional','price' => 6600, 'type' => 'kit'],
            ['sku' => 'ESIM-START','title'=>'eSIM – Starter','price'=>199,'type'=>'esim'],
            ['sku' => 'ESIM-PLUS', 'title'=>'eSIM – Plus',   'price'=>349,'type'=>'esim'],
            ['sku' => 'ESIM-BIZ',  'title'=>'eSIM – Business','price'=>799,'type'=>'esim'],
            ['sku' => 'MIFI-LITE', 'title'=>'MiFi – Lite',   'price'=>1299,'type'=>'mifi'],
            ['sku' => 'MIFI-PLUS', 'title'=>'MiFi – Plus',   'price'=>1899,'type'=>'mifi'],
            ['sku' => 'MIFI-PRO',  'title'=>'MiFi – Pro',    'price'=>2499,'type'=>'mifi'],
        ];

        foreach ($kits as $k) {
            Product::updateOrCreate(['sku'=>$k['sku']], $k);
        }
    }
}
