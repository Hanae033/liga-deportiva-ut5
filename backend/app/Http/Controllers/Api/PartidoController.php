<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Partido::with(['liga', 'clubLocal', 'clubVisitante'])->get());
    }

    public function show(Partido $partido): JsonResponse
    {
        return response()->json($partido->load(['liga', 'clubLocal', 'clubVisitante']));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'liga_id'           => 'required|exists:ligas,id',
            'club_local_id'     => 'required|exists:clubs,id',
            'club_visitante_id' => 'required|exists:clubs,id|different:club_local_id',
            'fecha'             => 'required|date',
            'resultado'         => 'nullable|string',
        ]);
        return response()->json(Partido::create($data)->load(['liga', 'clubLocal', 'clubVisitante']), 201);
    }

    public function update(Request $request, Partido $partido): JsonResponse
    {
        $data = $request->validate([
            'fecha'     => 'sometimes|date',
            'resultado' => 'nullable|string',
        ]);
        $partido->update($data);
        return response()->json($partido->load(['liga', 'clubLocal', 'clubVisitante']));
    }

    public function destroy(Partido $partido): JsonResponse
    {
        $partido->delete();
        return response()->json(['message' => 'Partido eliminado correctamente']);
    }
}