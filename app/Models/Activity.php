<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use \Znck\Eloquent\Traits\BelongsToThrough;


class Activity extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;
    use HasFactory;
    
    protected $guarded = [];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function division()
    {
        return $this->belongsToThrough(Division::class, Job::class);
    }
}
