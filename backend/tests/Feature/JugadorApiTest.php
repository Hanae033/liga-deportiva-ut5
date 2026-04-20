<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Jugador;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JugadorApiTest extends TestCase
{
    use RefreshDatabase;

    private array $adminHeaders = [
        'X-Admin-Token' => 'secreto-admin-123'
    ];

    /** @test */
    public function lista_todos_los_jugadores()
    {
        $club = Club::factory()->create();
        Jugador::factory()->count(3)->create(['club_id' => $club->id]);

        $response = $this->getJson('/api/jugadores');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function puede_crear_jugador_siendo_admin()
    {
        $club  = Club::factory()->create();
        $datos = [
            'nombre'   => 'Luis García',
            'posicion' => 'Delantero',
            'dorsal'   => 7,
            'club_id'  => $club->id
        ];

        $response = $this->postJson('/api/jugadores', $datos, $this->adminHeaders);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Luis García']);
        $this->assertDatabaseHas('jugadors', ['nombre' => 'Luis García']);
    }

    /** @test */
    public function no_puede_crear_jugador_sin_token_admin()
    {
        $response = $this->postJson('/api/jugadores', [
            'nombre'   => 'Sin Token',
            'posicion' => 'Portero',
            'dorsal'   => 1
        ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function no_puede_crear_jugador_sin_nombre()
    {
        $club     = Club::factory()->create();
        $response = $this->postJson('/api/jugadores', [
            'posicion' => 'Defensa',
            'dorsal'   => 5,
            'club_id'  => $club->id
        ], $this->adminHeaders);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nombre']);
    }

    /** @test */
    public function puede_actualizar_jugador_siendo_admin()
    {
        $club    = Club::factory()->create();
        $jugador = Jugador::factory()->create([
            'dorsal'   => 10,
            'posicion' => 'Portero',
            'club_id'  => $club->id
        ]);

        $response = $this->putJson(
            "/api/jugadores/{$jugador->id}",
            ['dorsal' => 99, 'posicion' => 'Defensa'],
            $this->adminHeaders
        );

        $response->assertStatus(200)
                 ->assertJsonFragment(['dorsal' => 99]);
    }

    /** @test */
    public function puede_eliminar_jugador_siendo_admin()
    {
        $club    = Club::factory()->create();
        $jugador = Jugador::factory()->create(['club_id' => $club->id]);

        $response = $this->deleteJson(
            "/api/jugadores/{$jugador->id}",
            [],
            $this->adminHeaders
        );

        $response->assertStatus(200);
        $this->assertDatabaseMissing('jugadors', ['id' => $jugador->id]);
    }

    /** @test */
    public function devuelve_404_para_jugador_inexistente()
    {
        $response = $this->getJson('/api/jugadores/99999');
        $response->assertStatus(404);
    }
}