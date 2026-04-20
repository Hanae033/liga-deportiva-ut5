<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    public function run(): void
    {
        Club::create(['nombre' => 'CD Maestre FC',    'ciudad' => 'Ciudad Real', 'categoria' => 'Primera']);
        Club::create(['nombre' => 'UD Calatrava',     'ciudad' => 'Almagro',     'categoria' => 'Primera']);
        Club::create(['nombre' => 'Athletic Daimiel', 'ciudad' => 'Daimiel',     'categoria' => 'Segunda']);
    }
}