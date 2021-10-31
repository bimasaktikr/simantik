<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra';

    use HasFactory;
    protected $fillable = [
        'name', 
        'email',
        'slug',
        'gender',
        'alamat',
        'pendidikan',
        'waktu',
        'kualitas',
        'sikap',
        'ipk'
    ];

    protected $guarded = [];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
