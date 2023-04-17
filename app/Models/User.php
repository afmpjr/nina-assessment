<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'date_of_birth',
    ];

    protected $appends = [
        'age',
    ];

    public function getAgeAttribute(): int
    {
        return $this->date_of_birth->diffInYears(now());
    }

    public function previousExperiences()
    {
        return $this->hasMany(PreviousExperience::class);
    }

    public function getAllUsers()
    {
        return $this->with('previousExperiences')->paginate(10);
    }

    public function filterUsers($params)
    {
        $query = $this->with('previousExperiences');

        if (isset($params['name'])) {
            $query->where('name', 'like', '%' . $params['name'] . '%');
        }

        if (isset($params['age'])) {
            $query->whereBetween('date_of_birth', [now()->subYears($params['age'])->format('Y-m-d'), now()->addYears($params['age'])->format('Y-m-d')]);
        }

        if (isset($params['location'])) {
            $query->where('location', $params['location']);
        }

        if (isset($params['personality'])) {
            $query->where('personalities', 'like', '%' . $params['personality'] . '%');
        }

        if (isset($params['religion'])) {
            $query->where('religion', $params['religion']);
        }

        if (isset($params['language'])) {
            $query->where('language_proficiencies', 'like', '%' . $params['language'] . '%');
        }

        if (isset($params['allergy'])) {
            $query->where('allergies', 'like', '%' . $params['allergy'] . '%');
        }

        if (isset($params['dietary_wish'])) {
            $query->where('dietary_wishes', 'like', '%' . $params['dietary_wish'] . '%');
        }

        return $query->paginate(10);
    }

}
