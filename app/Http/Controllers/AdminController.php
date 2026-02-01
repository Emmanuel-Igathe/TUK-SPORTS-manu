<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\Player;
use App\Models\Coach;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::orderBy('created_at', 'desc')->get();
        $players = Player::all();
        $events = Event::where('date', '>=', now())->orderBy('date')->get();
        $sports = collect(['Football', 'Basketball', 'Athletics', 'Volleyball', 'Martial Arts']); 
        $users = User::where('role', '!=', 'admin')->get(); // Fetch all non-admin users
        
        return view('admin.dashboard', compact('blogPosts', 'players', 'events', 'sports', 'users'));
    }

    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'sport' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Event::create($validated);
        return redirect()->back()->with('success', 'Event created successfully!');
    }

    public function deleteEvent($id)
    {
        Event::destroy($id);
        return redirect()->back()->with('success', 'Event deleted successfully!');
    }

    public function storePlayer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'student_id' => 'required|string|unique:players',
            'sport' => 'required|string',
            'year' => 'required|string',
        ]);

        Player::create($validated);
        return redirect()->back()->with('success', 'Player registered successfully!');
    }

    public function deletePlayer($id)
    {
        Player::destroy($id);
        return redirect()->back()->with('success', 'Player removed successfully!');
    }
    
    public function storeBlogPost(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|url',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);
        
        // Add author and date
        $validated['author'] = auth()->user()->name;
        $validated['date'] = now();
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        
        BlogPost::create($validated);
        return redirect()->back()->with('success', 'Blog post published successfully!');
    }
    
    public function deleteBlogPost($id) {
        BlogPost::destroy($id);
        return redirect()->back()->with('success', 'Blog post deleted successfully!');
    }

    public function makeCoach($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'coach';
        $user->save();
        return redirect()->back()->with('success', 'User promoted to Coach successfully!');
    }

    public function revokeCoach($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'fan';
        $user->save();
        return redirect()->back()->with('success', 'Coach privileges revoked successfully!');
    }
}
