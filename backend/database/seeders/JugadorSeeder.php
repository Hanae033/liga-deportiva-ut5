<?php

namespace Database\Seeders;

use App\Models\Jugador;
use Illuminate\Database\Seeder;

class JugadorSeeder extends Seeder
{
    public function run(): void
    {
        Jugador::create(['nombre' => 'Carlos Ruiz',    'posicion' => 'Portero',        'dorsal' => 1,  'club_id' => 1]);
        Jugador::create(['nombre' => 'Miguel Torres',  'posicion' => 'Defensa',         'dorsal' => 4,  'club_id' => 1]);
        Jugador::create(['nombre' => 'Luis Sánchez',   'posicion' => 'Centrocampista',  'dorsal' => 8,  'club_id' => 1]);
        Jugador::create(['nombre' => 'Pedro Morales',  'posicion' => 'Delantero',       'dorsal' => 9,  'club_id' => 1]);
        Jugador::create(['nombre' => 'Andrés López',   'posicion' => 'Portero',        'dorsal' => 1,  'club_id' => 2]);
        Jugador::create(['nombre' => 'Sergio Gil',     'posicion' => 'Defensa',         'dorsal' => 5,  'club_id' => 2]);
        Jugador::create(['nombre' => 'Raúl Martín',    'posicion' => 'Delantero',       'dorsal' => 10, 'club_id' => 2]);
        Jugador::create(['nombre' => 'Javier Pérez',   'posicion' => 'Portero',        'dorsal' => 1,  'club_id' => 3]);
        Jugador::create(['nombre' => 'Alberto Díaz',   'posicion' => 'Centrocampista',  'dorsal' => 6,  'club_id' => 3]);
        Jugador::create(['nombre' => 'Fernando Ramos', 'posicion' => 'Delantero',       'dorsal' => 11, 'club_id' => 3]);
    }
}
