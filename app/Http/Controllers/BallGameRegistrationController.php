<?php

namespace App\Http\Controllers;

use App\Models\BallGameRegistration;
use App\Models\BallGame;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BallGameRegistrationController extends Controller
{
    public function index()
    {
        $games = BallGame::all();
        
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

        return view('ball-games', compact('games'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sport' => 'required|string',
            'student-name' => 'required|string',
            'student-id' => 'required|string',
            'student-email' => 'required|email',
            'student-phone' => 'required|string',
            'student-year' => 'required|string',
            'student-course' => 'required|string',
            'experience' => 'nullable|string',
            'position-role' => 'nullable|string',
            'emergency-contact' => 'required|string',
        ]);

        // Check for duplicate registration
        $exists = BallGameRegistration::where('student_id', $validated['student-id'])
            ->where('sport', $validated['sport'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for ' . $validated['sport']);
        }

        DB::transaction(function () use ($validated) {
            BallGameRegistration::create([
                'sport' => $validated['sport'],
                'name' => $validated['student-name'],
                'student_id' => $validated['student-id'],
                'email' => $validated['student-email'],
                'phone' => $validated['student-phone'],
                'year' => $validated['student-year'],
                'course' => $validated['student-course'],
                'experience' => $validated['experience'] ?? 'Beginner',
                'position_role' => $validated['position-role'],
            ]);

            // Also create Player record
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

        return back()->with('success', 'Registration Successful! Our coach will contact you shortly.');
    }

    public function adminIndex()
    {
        $registrations = BallGameRegistration::orderBy('created_at', 'desc')->get();
        $totalRegistrations = BallGameRegistration::count();
        
        $sports = ['Football', 'Basketball', 'Volleyball', 'Handball', 'Rugby', 'Netball'];
        $sportStats = [];
        
        foreach ($sports as $sport) {
            $sportStats[$sport] = BallGameRegistration::where('sport', $sport)->count();
        }
        
        return view('admin.ball-games', compact('registrations', 'totalRegistrations', 'sportStats'));
    }
}
