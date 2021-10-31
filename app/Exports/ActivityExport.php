<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\ActivityController;

class ActivityExport implements FromQuery, WithMapping, WithHeadings
// class ActivityExport implements FromCollection, WithMapping, WithHeadings
{      
    use Exportable;

    protected $waktu;
    protected $sikap;
    protected $kualitas;
    protected $ipk;


    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Kegiatan',
            'Fungsi',
            'Tahun',
            'Nilai Waktu',
            'Nilai Kualitas',
            'Nilai Sikap',
        ];
    }

    // public function __construct(int $waktu, $kualitas, $sikap, $ipk)
    // {
    //     $this->waktu = $waktu;
    //     $this->kualitas = $kualitas;
    //     $this->sikap = $sikap;
    //     $this->ipk = $ipk;
    // }
    public function forWaktu(float $waktu)
    {
        $this->waktu = $waktu;
        return $this;
    }
    public function forSikap(float $sikap)
    {
        $this->sikap = $sikap;
        return $this;
    }
    public function forKualitas(float $kualitas)
    {
        $this->kualitas = $kualitas;
        return $this;
    }
    public function forIpk(float $ipk)
    {
        $this->ipk = $ipk;
        return $this;
    }

    
    // public function collection()
    // {

    //     return collect();
    // }
             
    
    // public function collection()
    // {
    //     $activity = Activity::with('mitra', 'job', 'division')
    //                     ->where('waktu', ">=" , $this->waktu)
    //                     ->where('sikap', ">=" , $this->sikap)
    //                     ->where('kualitas', ">=" , $this->kualitas)
    //                     ->where('ipk', ">=" , $this-> ipk)
    //                     ->get();
                        
    //     return $activity;

    // }
    public function query()
    {

        return Activity::query()
            ->whereWaktu('waktu', ">=", $this->waktu)
            ->whereKualitas('kualitas', ">=", $this->kualitas)
            ->whereSikap('sikap', ">=", $this->sikap)
            ->whereIpk('ipk', ">=", $this->ipk);
            
    }

    public function map($activity): array
    {
        return [
            $activity->id,
            $activity->mitra->name,
            $activity->job->name,
            $activity->division->name,
            $activity->waktu,
            $activity->kualitas,
            $activity->sikap,
            $activity->ipk,
        ];
    }
}