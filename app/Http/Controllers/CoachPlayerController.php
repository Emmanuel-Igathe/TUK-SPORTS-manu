<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Coach;
use Illuminate\Support\Facades\Auth;

class CoachPlayerController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:players',
            'year' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive,injured',
        ]);

        // Automatically assign the coach's sport
        $validated['sport'] = $coach->sport;

        Player::create($validated);

        return redirect()->back()->with('success', 'Player added successfully!');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();
        $player = Player::findOrFail($id);

        // Ensure the player belongs to the coach's sport
        if ($player->sport !== $coach->sport) {
            return redirect()->back()->with('error', 'You are not authorized to edit this player.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:players,student_id,' . $player->id,
            'year' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive,injured',
        ]);

        $player->update($validated);

        return redirect()->back()->with('success', 'Player updated successfully!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();
        $player = Player::findOrFail($id);

        // Ensure the player belongs to the coach's sport
        if ($player->sport !== $coach->sport) {
            return redirect()->back()->with('error', 'You are not authorized to delete this player.');
        }

        $player->delete();

        return redirect()->back()->with('success', 'Player removed successfully!');
    }
}
