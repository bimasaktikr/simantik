<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tahun = $this->faker->randomElement(['2018', '2019', '2020']);

        return [
            
            'mitra_id' => $this->faker->numberBetween(1,20),
            'job_id' => $this->faker->numberBetween(1,8),
            'tahun' => $tahun,
            'waktu' => $this->faker->randomFloat(2, 8, 10),
            'kualitas' => $this->faker->randomFloat(2, 8, 10),
            'sikap' => $this->faker->randomFloat(2, 8, 10),
            'ipk' => $this->faker->randomFloat(2, 8, 10)
        ];
    }
}
