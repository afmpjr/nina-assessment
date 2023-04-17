<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'location',
        'religion',
        'personality',
        'dietary_wishes',
        'allergies',
        'language_proficiencies',
    ];

    protected $casts = [
        'allergies' => 'json',
        'language_proficiencies' => 'json',
    ];

    public function previousExperiences()
    {
        return $this->hasMany(PreviousExperience::class);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }
}
