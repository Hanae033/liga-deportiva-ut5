<?php

namespace Database\Seeders;

use App\Models\Partido;
use Illuminate\Database\Seeder;

class PartidoSeeder extends Seeder
{
    public function run(): void
    {
        Partido::create(['liga_id' => 1, 'club_local_id' => 1, 'club_visitante_id' => 2, 'fecha' => '2024-09-15', 'resultado' => '2-1']);
        Partido::create(['liga_id' => 1, 'club_local_id' => 2, 'club_visitante_id' => 3, 'fecha' => '2024-09-22', 'resultado' => '0-0']);
        Partido::create(['liga_id' => 1, 'club_local_id' => 3, 'club_visitante_id' => 1, 'fecha' => '2024-09-29', 'resultado' => '1-3']);
        Partido::create(['liga_id' => 1, 'club_local_id' => 1, 'club_visitante_id' => 3, 'fecha' => '2024-10-06', 'resultado' => null]);
    }
}