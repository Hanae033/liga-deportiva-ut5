<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Jugador::with('club')->get());
    }

    public function show(Jugador $jugador): JsonResponse
    {
        return response()->json($jugador->load('club'));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:100',
            'posicion' => 'required|in:Portero,Defensa,Centrocampista,Delantero',
            'dorsal'   => 'required|integer|between:1,99',
            'club_id'  => 'required|exists:clubs,id',
        ]);
        return response()->json(Jugador::create($data)->load('club'), 201);
    }

    public function update(Request $request, Jugador $jugador): JsonResponse
    {
        $data = $request->validate([
            'nombre'   => 'sometimes|string|max:100',
            'posicion' => 'sometimes|in:Portero,Defensa,Centrocampista,Delantero',
            'dorsal'   => 'sometimes|integer|between:1,99',
            'club_id'  => 'sometimes|exists:clubs,id',
        ]);
        $jugador->update($data);
        return response()->json($jugador->load('club'));
    }

    public function destroy(Jugador $jugador): JsonResponse
    {
        $jugador->delete();
        return response()->json(['message' => 'Jugador eliminado correctamente']);
    }
}