<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Liga;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Liga::withCount('partidos')->get());
    }

    public function show(Liga $liga): JsonResponse
    {
        return response()->json($liga->load(['partidos.clubLocal', 'partidos.clubVisitante']));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:100',
            'deporte'   => 'required|string|max:60',
            'temporada' => 'required|string|max:10',
        ]);
        return response()->json(Liga::create($data), 201);
    }

    public function update(Request $request, Liga $liga): JsonResponse
    {
        $data = $request->validate([
            'nombre'    => 'sometimes|string|max:100',
            'deporte'   => 'sometimes|string|max:60',
            'temporada' => 'sometimes|string|max:10',
        ]);
        $liga->update($data);
        return response()->json($liga);
    }

    public function destroy(Liga $liga): JsonResponse
    {
        $liga->delete();
        return response()->json(['message' => 'Liga eliminada correctamente']);
    }
}