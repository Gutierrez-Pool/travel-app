<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'date'];

    public function stops() {
        return $this->hasMany(Stop::class);
    }

    public function tour() {
        return $this->belongsTo(Tour::class);
    }
}
