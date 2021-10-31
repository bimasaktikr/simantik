<?php

namespace Database\Factories;

use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class MitraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var stringS
     */
    protected $model = Mitra::class;

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

        $waktu=$this->faker->randomFloat(2, 8 , 10);
        $kualitas=$this->faker->randomFloat(2, 8 , 10);
        $sikap=$this->faker->randomFloat(2, 8 , 10);
        $ipk = ($waktu + $kualitas + $sikap) / 3;

        $name = $this->faker->name($gender);
        $slug = Str::slug($name);
        return [
            'name'      => $name,
            'slug'      => $slug,
            'email'     => $this->faker->unique()->safeEmail(),
            // 'pendidikan'     => 
            'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'waktu' => $waktu,
            'kualitas' => $kualitas,
            'sikap' => $sikap,
            'ipk' => $ipk,
            'gender' => $gender,
            'alamat' => $this->faker->unique()->address()
        ];
    }
}
