<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::Create([
            'name' => "BPS Kota Malang" ,
            'code' => "3573" ,
            'address' => "Jl. Janti Barat No. 47, Sukun, Kota Malang",
        ]);
    }
}
