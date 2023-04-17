<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PreviousExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'organization',
        'start_date',
        'end_date',
        'description',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllPreviousExperiences()
    {
        return Cache::remember('previous-experiences', now()->addMinutes(30), function () {
            return static::with('user')->paginate(10);
        });
    }

    public function filterPreviousExperiences($params)
    {
        $query = $this->with('user');

        if (isset($params['user_id'])) {
            $query->where('user_id', $params['user_id']);
        }

        if (isset($params['type'])) {
            $query->where('type', $params['type']);
        }

        if (isset($params['title'])) {
            $query->where('title', 'like', '%' . $params['title'] . '%');
        }

        if (isset($params['organization'])) {
            $query->where('organization', 'like', '%' . $params['organization'] . '%');
        }

        if (isset($params['start_date'])) {
            $query->where('start_date', '>=', $params['start_date']);
        }

        if (isset($params['end_date'])) {
            $query->where('end_date', '<=', $params['end_date']);
        }

        return Cache::remember('filtered-previous-experiences-' . md5(serialize($params)), now()->addMinutes(30), function () use ($query) {
            return $query->paginate(10);
        });
    }
}
