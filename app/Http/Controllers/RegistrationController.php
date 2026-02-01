<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
        // Determine if this is a player or coach registration
        $isPlayer = $request->has('player-fullname');
        
        if ($isPlayer) {
            // Validate player registration
            $validated = $request->validate([
                'player-fullname' => 'required|string|max:255',
                'player-regnumber' => 'required|string|unique:players,student_id',
                'player-contact' => 'required|string',
                'player-email' => 'required|email|ends_with:@tukenya.ac.ke|unique:users,email',
                'player-sport' => 'required|string',
                'player-year' => 'required|string',
                'player-password' => 'required|string|min:8',
            ]);

            DB::transaction(function () use ($validated) {
                // Create user account
                $user = User::create([
                    'name' => $validated['player-fullname'],
                    'email' => $validated['player-email'],
                    'password' => Hash::make($validated['player-password']),
                    'role' => 'fan', // Students are fans by default
                ]);

                // Create player profile
                Player::create([
                    'user_id' => $user->id,
                    'name' => $validated['player-fullname'],
                    'student_id' => $validated['player-regnumber'],
                    'sport' => $validated['player-sport'],
                    'year' => $validated['player-year'],
                    'status' => 'active',
                ]);
            });

            // Redirect to sport-specific page based on selected sport
            $sportRedirectMap = [
                'athletics' => 'athletics.index',
                'martial-arts' => 'martial-arts.index',
                'chess' => 'board-games.index',
                'scrabble' => 'board-games.index',
                'throwing-games' => 'throwing-games.index',
            ];

            $redirectRoute = $sportRedirectMap[$validated['player-sport']] ?? 'index';
            
            return redirect()->route($redirectRoute)->with('success', 'Player registration successful! Please complete the sport-specific registration below.');

            
        } else {
            // Validate coach registration
            $validated = $request->validate([
                'coach-fullname' => 'required|string|max:255',
                'coach-regnumber' => 'required|string|unique:coaches,staff_id',
                'coach-contact' => 'required|string',
                'coach-email' => 'required|email|ends_with:@tukenya.ac.ke|unique:users,email',
                'coach-sport' => 'required|string',
                'coach-password' => 'required|string|min:8',
            ]);

            DB::transaction(function () use ($validated) {
                // Create user account
                $user = User::create([
                    'name' => $validated['coach-fullname'],
                    'email' => $validated['coach-email'],
                    'password' => Hash::make($validated['coach-password']),
                    'role' => 'coach',
                ]);

                // Create coach profile
                Coach::create([
                    'user_id' => $user->id,
                    'name' => $validated['coach-fullname'],
                    'staff_id' => $validated['coach-regnumber'],
                    'sport' => $validated['coach-sport'],
                    'phone' => $validated['coach-contact'],
                ]);
            });

            return redirect()->route('index')->with('success', 'Coach registration successful! You can now log in.');
        }
    }
}
