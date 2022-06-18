<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'slate', 'gray', 'zinc', 'neutral', 'stone', 'red', 'orange',
            'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan',
            'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink',
            'rose'
        ];
        $traductionspanish = [
            'pizarra', 'gris', 'zinc', 'neutro', 'piedra', 'rojo', 'naranja',
            'ámbar', 'amarillo', 'lima', 'verde', 'esmeralda', 'cerceta', 'cian',
            'cielo', 'azul', 'añil', 'violeta', 'morado', 'fucsia', 'rosa',
            'rosado'
        ];

        foreach ($colors as $key => $color) {
            Color::create([
                'name' => $color,
                'traduction' => $traductionspanish[$key]
            ]);
        }
    }
}
