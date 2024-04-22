<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use App\Models\User;
// use App\Models\Members;

class Event extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded = [];

    public function user()
    {
        // 
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        // 
        return $this->belongsToMany(User::class, 'event_user');
    }
}
