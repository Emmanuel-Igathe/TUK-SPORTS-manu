<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardGame;
use App\Models\BoardGameRegistration;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class BoardGamesController extends Controller
{
    public function index()
    {
        $games = \App\Models\BoardGame::all();
        
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

            // Calculate real player count
            $game->total_players = \App\Models\Player::where('sport', 'like', $game->name)->count();
        }

        return view('board-games', compact('games'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sport' => 'required|string',
            'student-name' => 'required|string|max:255',
            'student-id' => 'required|string|max:50',
            'student-email' => 'required|email|max:255',
            'student-phone' => 'required|string|max:20',
            'student-year' => 'required|string',
            'student-course' => 'required|string|max:255',
            'experience-level' => 'required|string',
            'preferred-style' => 'nullable|string',
            'tournament-experience' => 'nullable|string',
            'availability' => 'nullable|string',
            'emergency-contact' => 'required|string|max:255',
        ]);

        // Check for duplicate registration
        $exists = \App\Models\BoardGameRegistration::where('student_id', $validated['student-id'])
            ->where('sport', $validated['sport'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for this board game.');
        }

        DB::transaction(function () use ($validated) {
            // Create board game registration
            \App\Models\BoardGameRegistration::create([
                'sport' => $validated['sport'],
                'student_name' => $validated['student-name'],
                'student_id' => $validated['student-id'],
                'email' => $validated['student-email'],
                'phone' => $validated['student-phone'],
                'year_of_study' => $validated['student-year'],
                'course' => $validated['student-course'],
                'experience_level' => $validated['experience-level'],
                'preferred_style' => $validated['preferred-style'],
                'tournament_experience' => $validated['tournament-experience'],
                'availability' => $validated['availability'],
                'emergency_contact' => $validated['emergency-contact'],
            ]);

            // Also create a Player record for centralized tracking
            // Check if player already exists for this sport
            $playerExists = Player::where('student_id', $validated['student-id'])
                ->where('sport', $validated['sport'])
                ->exists();

            if (!$playerExists) {
                Player::create([
                    'name' => $validated['student-name'],
                    'student_id' => $validated['student-id'],
                    'sport' => $validated['sport'],
                    'year' => $validated['student-year'],
                    'status' => 'active',
                ]);
            }
        });

        return back()->with('success', 'Registration successful! The coach will contact you soon.');
    }
}

