<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Event;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function events()
    {
        // 
        return $this->belongsToMany(Event::class);
    }
}
