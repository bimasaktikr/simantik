<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'name' => 'SUSENAS Semester 1',
            'kegiatan' => 'SSN_SM1',
            'division_id' => '2',
            'code' => 'SSN'
        ]);
        Job::create([
            'name' => 'SUSENAS Semester 2',
            'kegiatan' => 'SSN_SM2',
            'division_id' => '2',
            'code' => 'SSN'
        ]);
        Job::create([
            'name' => 'SAKERNAS Semester 1',
            'kegiatan' => 'SAK_SM1',
            'division_id' => '2',
            'code' => 'SAK'
        ]);
        Job::create([
            'name' => 'SAKERNAS Semester 2',
            'kegiatan' => 'SAK_SM2',
            'division_id' => '2',
            'code' => 'SAK'
        ]);
        Job::create([
            'name' => 'Survey Akomodasi dan Hotel',
            'kegiatan' => 'VHTL',
            'division_id' => '5',
            'code' => 'VHTL'
        ]);
        Job::create([
            'name' => 'Survey Kebutuhan Data',
            'kegiatan' => 'SKD',
            'division_id' => '6',
            'code' => 'SKD'
        ]);
        Job::create([
            'name' => 'Survey SKTIR',
            'kegiatan' => 'SKTIR',
            'division_id' => '4',
            'code' => 'SKTIR'
        ]);
        Job::create([
            'name' => 'Ubinan',
            'kegiatan' => 'UBIN',
            'division_id' => '3',
            'code' => 'UBIN'
        ]);
    }
}
