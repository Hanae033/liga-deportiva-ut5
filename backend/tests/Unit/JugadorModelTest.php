<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Jugador;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JugadorModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_jugador_con_factory()
{
    $club    = Club::factory()->create();
    $jugador = Jugador::factory()->create([
        'nombre'   => 'Carlos Ruiz',
        'posicion' => 'Portero',
        'dorsal'   => 1,
        'club_id'  => $club->id
    ]);

    $this->assertDatabaseHas('jugadors', [
        'nombre'   => 'Carlos Ruiz',
        'posicion' => 'Portero'
    ]);
}

    /** @test */
    public function los_campos_fillable_estan_correctamente_definidos()
    {
        $jugador  = new Jugador();
        $fillable = $jugador->getFillable();

        $this->assertContains('nombre',   $fillable);
        $this->assertContains('posicion', $fillable);
        $this->assertContains('dorsal',   $fillable);
        $this->assertContains('club_id',  $fillable);
    }

    /** @test */
    public function jugador_tiene_relacion_con_club()
    {
        $this->assertTrue(method_exists(Jugador::class, 'club'));
    }

    /** @test */
    public function puede_asociar_jugador_a_un_club()
    {
        $club    = Club::factory()->create(['nombre' => 'CD Maestre FC']);
        $jugador = Jugador::factory()->create(['club_id' => $club->id]);

        $this->assertEquals($club->id, $jugador->club_id);
        $this->assertEquals('CD Maestre FC', $jugador->club->nombre);
    }
}
