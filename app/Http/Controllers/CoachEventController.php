<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Coach;
use Illuminate\Support\Facades\Auth;

class CoachEventController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Automatically assign the coach's sport
        $validated['sport'] = $coach->sport;

        Event::create($validated);

        return redirect()->back()->with('success', 'Event created successfully!');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();
        $event = Event::findOrFail($id);

        // Ensure the event belongs to the coach's sport
        if ($event->sport !== $coach->sport) {
            return redirect()->back()->with('error', 'You are not authorized to edit this event.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event->update($validated);

        return redirect()->back()->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();
        $event = Event::findOrFail($id);

        // Ensure the event belongs to the coach's sport
        if ($event->sport !== $coach->sport) {
            return redirect()->back()->with('error', 'You are not authorized to delete this event.');
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully!');
    }
}
