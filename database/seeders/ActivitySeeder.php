<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'mitra_id' => 2 ,
            'job_id' => 1,
            'actrole_id' => 3,
            'tim' => 2,
        ]);
        Activity::create([
            'mitra_id' => 2 ,
            'job_id' => 2,
            'actrole_id' => 3,
            'tim' => 2,
        ]);
        Activity::create([
            'mitra_id' => 2 ,
            'job_id' => 3,
            'actrole_id' => 3,
            'tim' => 2,
        ]);
        
    }
}
