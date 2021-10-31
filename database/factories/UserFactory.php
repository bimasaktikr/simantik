<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        
        if($gender == 'male'){
            $gender = 'Laki-Laki';
        } else {
            $gender = 'Perempuan';
        }

        $name = $this->faker->name($gender);
        $slug = Str::slug($name);
        return [

            'name' => $name,
            'slug' => $slug,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'waktu' => $this->faker->randomFloat(2, 3, 4),
            'kualitas' => $this->faker->randomFloat(2, 3, 4),
            'sikap' => $this->faker->randomFloat(2, 3, 4),
            'ipk' => $this->faker->randomFloat(2, 3, 4),
            'gender' => $gender
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
