<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;


class GameController extends Controller
{
    /**
     * Mostrar una lista de videojuegos.
     */
    public function index()
    {
        // Retornar todos los videojuegos
        return Game::all();
    }

    /**
     * Almacenar un nuevo Game en la base de datos.
     */


    public function store(StoreGameRequest $request)
    {
        $game = Game::create($request->validated());
        return response()->json($game, 201);
    }


    /**
     * Mostrar un Game específico.
     */
    public function show($id)
    {
        // Buscar el Game por ID
        $Game = Game::find($id);

        // Si no se encuentra, retornar error 404
        if (!$Game) {
            return response()->json(['error' => 'Game no encontrado'], 404);
        }

        // Retornar el Game encontrado
        return response()->json($Game);
    }

    /**
     * Actualizar un Game existente.
     */


    public function update(UpdateGameRequest $request, $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['error' => 'Game no encontrado'], 404);
        }

        $game->update($request->validated());

        return response()->json($game);
    }


    /**
     * Eliminar un Game.
     */
    public function destroy($id)
    {
        // Buscar el Game por ID
        $Game = Game::find($id);

        // Si no se encuentra, retornar error 404
        if (!$Game) {
            return response()->json(['error' => 'Game no encontrado'], 404);
        }

        // Eliminar el Game
        $Game->delete();

        // Retornar respuesta de éxito
        return response()->json(['message' => 'Game eliminado con éxito']);
    }
}
