<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_club_con_factory()
    {
        Club::factory()->create([
            'nombre'    => 'CD Maestre FC',
            'ciudad'    => 'Ciudad Real',
            'categoria' => 'Primera'
        ]);

        $this->assertDatabaseHas('clubs', [
            'nombre'    => 'CD Maestre FC',
            'categoria' => 'Primera'
        ]);
    }

    /** @test */
    public function los_campos_fillable_estan_correctamente_definidos()
    {
        $club     = new Club();
        $fillable = $club->getFillable();

        $this->assertContains('nombre',    $fillable);
        $this->assertContains('ciudad',    $fillable);
        $this->assertContains('categoria', $fillable);
    }

    /** @test */
    public function club_tiene_relacion_hasmany_jugadores()
    {
        $this->assertTrue(method_exists(Club::class, 'jugadores'));
    }

    /** @test */
    public function club_tiene_relaciones_con_partidos()
    {
        $this->assertTrue(method_exists(Club::class, 'partidosLocal'));
        $this->assertTrue(method_exists(Club::class, 'partidosVisitante'));
    }
}