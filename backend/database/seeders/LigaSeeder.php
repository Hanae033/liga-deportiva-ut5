<?php

namespace Database\Seeders;

use App\Models\Liga;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    public function run(): void
    {
        Liga::create([
            'nombre'    => 'Liga Regional Castilla-La Mancha',
            'deporte'   => 'Fútbol',
            'temporada' => '2024-25',
        ]);
    }
}