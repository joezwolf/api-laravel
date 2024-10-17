<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Game::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(3), // Genera un título de 3 palabras
            'precio' => $this->faker->randomFloat(2, 10, 100), // Precio entre 10 y 100
            'fecha_lanzamiento' => $this->faker->date(), // Fecha aleatoria
            'disponible' => $this->faker->boolean, // Disponible o no
            'rating' => $this->faker->optional()->randomFloat(2, 0, 10), // Calificación entre 0 y 10 o null
            'genero' => $this->faker->randomElement(['acción', 'aventura', 'deportes', 'rol', 'estrategia', 'otros']), // Género aleatorio
            'plataformas' => json_encode($this->faker->randomElements(['PC', 'PS5', 'Xbox', 'Switch'], rand(1, 3))), // Plataformas aleatorias
        ];
    }
}
