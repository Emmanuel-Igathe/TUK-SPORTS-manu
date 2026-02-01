<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThrowingGame;
use App\Models\ThrowingGameRegistration;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class ThrowingGamesController extends Controller
{
    public function index()
    {
        $games = \App\Models\ThrowingGame::all();
        
        foreach ($games as $game) {
            // Fetch real coaches for this sport
            $coaches = \App\Models\Coach::where('sport', 'like', $game->name)->get();
            
            if ($coaches->isNotEmpty()) {
                $game->head_coach = $coaches->first()->name;
                $game->assistant_coaches = $coaches->slice(1)->pluck('name')->implode(', ') ?: 'To be assigned';
            } else {
                $game->head_coach = 'To be assigned';
                $game->assistant_coaches = 'To be assigned';
            }

            // Calculate real athlete/player count
            $game->total_athletes = \App\Models\Player::where('sport', 'like', $game->name)->count();
        }

        return view('throwing-games', compact('games'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'selected-sport' => 'required|string',
            'student-name' => 'required|string|max:255',
            'student-id' => 'required|string|max:50',
            'student-email' => 'required|email|max:255',
            'student-phone' => 'required|string|max:20',
            'student-year' => 'required|string',
            'student-course' => 'required|string|max:255',
            'experience-level' => 'required|string',
            'preferred-event' => 'nullable|string',
            'personal-best' => 'nullable|string',
            'training-goals' => 'nullable|string',
            'medical-conditions' => 'nullable|string',
            'emergency-contact' => 'required|string|max:255',
            'waiver' => 'accepted',
        ]);

        // Check for duplicate registration
        $exists = \App\Models\ThrowingGameRegistration::where('student_id', $validated['student-id'])
            ->where('sport', $validated['selected-sport'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for this throwing game.');
        }

        DB::transaction(function () use ($validated) {
            \App\Models\ThrowingGameRegistration::create([
                'sport' => $validated['selected-sport'],
                'student_name' => $validated['student-name'],
                'student_id' => $validated['student-id'],
                'email' => $validated['student-email'],
                'phone' => $validated['student-phone'],
                'year_of_study' => $validated['student-year'],
                'course' => $validated['student-course'],
                'experience_level' => $validated['experience-level'],
                'preferred_event' => $validated['preferred-event'],
                'personal_best' => $validated['personal-best'],
                'training_goals' => $validated['training-goals'],
                'medical_conditions' => $validated['medical-conditions'],
                'emergency_contact' => $validated['emergency-contact'],
                'waiver_accepted' => true,
            ]);

            // Also create Player record
            $playerExists = Player::where('student_id', $validated['student-id'])
                ->where('sport', $validated['selected-sport'])
                ->exists();

            if (!$playerExists) {
                Player::create([
                    'name' => $validated['student-name'],
                    'student_id' => $validated['student-id'],
                    'sport' => $validated['selected-sport'],
                    'year' => $validated['student-year'],
                    'status' => 'active',
                ]);
            }
        });

        return back()->with('success', 'Registration successful! The coach will contact you soon.');
    }
}
