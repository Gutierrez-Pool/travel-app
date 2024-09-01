<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'description'];

    public function days() {
        return $this->hasMany(Day::class);
    }
}
