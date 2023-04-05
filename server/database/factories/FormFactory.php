<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\FormModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormModel>
 */
class FormFactory extends Factory
{

    protected $model = FormModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => time(),
            'name' => fake()->name(),
            'appeal' => Str::random(100),
        ];
    }

    public function save(int $id, string $name, string $appeal)
    {
        return $this->create([
            'id' => $id,
            'name' => $name,
            'appeal' => $appeal,
        ]);
    }
}