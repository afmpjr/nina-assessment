<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index()
    {
        $users = Cache::remember('users', now()->addMinutes(10), function () {
            return User::with('previousExperiences')->paginate(10);
        });

        return response()->json($users);
    }

    public function show($id)
    {
        $user = Cache::remember('user:'.$id, now()->addMinutes(5), function () use ($id) {
            return User::with('previousExperiences')->findOrFail($id);
        });

        return response()->json($user);
    }

    public function search(Request $request)
    {
        $query = User::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('age')) {
            $age = $request->input('age');
            $query->whereRaw("TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) = $age");
        }

        if ($request->has('min_age')) {
            $query->whereRaw('TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) >= ?', [$request->min_age]);
        }

        if ($request->has('max_age')) {
            $query->whereRaw('TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) <= ?', [$request->max_age]);
        }

        if ($request->has('location')) {
            $query->where('location', $request->input('location'));
        }

        if ($request->has('personality')) {
            $query->where('personalities', 'like', '%' . $request->input('personality') . '%');
        }

        if ($request->has('religion')) {
            $query->where('religion', $request->input('religion'));
        }

        if ($request->has('language')) {
            $query->where('language_proficiencies', 'like', '%' . $request->input('language') . '%');
        }

        if ($request->has('allergy')) {
            $query->where('allergies', 'like', '%' . $request->input('allergy') . '%');
        }

        if ($request->has('dietary_wish')) {
            $query->where('dietary_wishes', 'like', '%' . $request->input('dietary_wish') . '%');
        }

        $users = Cache::remember("users.filter.{$request->fullUrl()}", now()->addMinutes(10), function () use ($query) {
            return $query->with('previousExperiences')->paginate(10);
        });

        return response()->json($users);
    }

    public function getPreviousExperiences(Request $request, $id)
    {
        $user = Cache::remember('user:'.$id.':previous_experiences', now()->addMinutes(5), function () use ($id) {
            return User::findOrFail($id)->previousExperiences()->paginate(10);
        });
        return response()->json($user);
    }
}
