<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id(); // ID único para cada videojuego
            $table->string('titulo', 100); // Título del videojuego, con un límite de 100 caracteres
            $table->decimal('precio', 8, 2)->unsigned(); // Precio del videojuego, positivo y con dos decimales
            $table->date('fecha_lanzamiento'); // Fecha de lanzamiento del juego
            $table->boolean('disponible')->default(true); // Indica si el videojuego está disponible para la venta, valor por defecto 'true'
            $table->decimal('rating', 3, 2)->nullable(); // Calificación del juego (opcional), con valores entre 0.00 y 10.00
            $table->enum('genero', ['acción', 'aventura', 'deportes', 'rol', 'estrategia', 'otros']); // Género del videojuego
            $table->json('plataformas')->nullable(); // Plataformas en las que está disponible el videojuego (PC, PS5, etc.)
            $table->timestamps(); // Campos automáticos para la fecha de creación y actualización del registro
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
