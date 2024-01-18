<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre'=> $this ->faker->sentence(2),
            'Serial'=> $this ->faker->unique()->randomNumber(2),
            'Descripcion' => $this ->faker->paragraph(),
            'Ubicacion' => $this ->faker->sentence(),
            'Estado' => $this ->faker->randomElement(['Nuevo','Funcionando','Dañado','En Mantenimiento', 'Faltan piezas']) , 
            'Precio' => $this ->faker-> randomNumber(5,true),
            'Ultimo_Mantenimiento'=> $this -> faker->date($format = 'Y-m-d', $max = 'now'),
            'Recomentacion' => $this ->faker->paragraph()
        ];
    }
}
