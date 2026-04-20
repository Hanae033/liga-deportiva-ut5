<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Club::withCount('jugadores')->get());
    }

    public function show(Club $club): JsonResponse
    {
        return response()->json($club->load('jugadores'));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:100|unique:clubs,nombre',
            'ciudad'    => 'required|string|max:100',
            'categoria' => 'required|in:Primera,Segunda,Tercera,Regional',
        ]);
        return response()->json(Club::create($data), 201);
    }

    public function update(Request $request, Club $club): JsonResponse
    {
        $data = $request->validate([
            'nombre'    => 'sometimes|string|max:100',
            'ciudad'    => 'sometimes|string|max:100',
            'categoria' => 'sometimes|in:Primera,Segunda,Tercera,Regional',
        ]);
        $club->update($data);
        return response()->json($club);
    }

    public function destroy(Club $club): JsonResponse
    {
        $club->delete();
        return response()->json(['message' => 'Club eliminado correctamente']);
    }
}