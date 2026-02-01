<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Coach;
use App\Models\Player;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\BallGame;
use App\Models\BoardGame;
use App\Models\MartialArt;
use App\Models\ThrowingGame;
use App\Models\AthleticsProgram;
use Illuminate\Support\Facades\Auth;

class CoachDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->first();

        if (!$coach) {
            return redirect()->route('index')->with('error', 'Coach profile not found.');
        }

        $sportName = $coach->sport;

        // Fetch players for this sport (Case-insensitive)
        $players = Player::where('sport', 'like', $sportName)->get();

        // Fetch upcoming events for this sport
        $events = Event::where('sport', 'like', $sportName)
            ->where('date', '>=', now())
            ->orderBy('date')
            ->get();

        // Fetch blog posts for this sport
        $blogPosts = BlogPost::where('category', 'like', $sportName)
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch sport-specific statistics
        $sportDetails = null;
        
        // Check in different sport tables and determine view
        $viewName = 'coach.dashboard'; // Default view
        
        if ($details = BallGame::where('name', 'like', $sportName)->first()) {
            $sportDetails = $details;
            $viewName = 'coach.dashboards.team_sports';
        } elseif ($details = BoardGame::where('name', 'like', $sportName)->first()) {
            $sportDetails = $details;
            $viewName = 'coach.dashboards.board_games';
        } elseif ($details = MartialArt::where('name', 'like', $sportName)->first()) {
            $sportDetails = $details;
            $viewName = 'coach.dashboards.martial_arts';
        } elseif ($details = ThrowingGame::where('name', 'like', $sportName)->first()) {
            $sportDetails = $details;
            $viewName = 'coach.dashboards.throwing_games';
        } elseif ($details = AthleticsProgram::where('name', 'like', $sportName)->first()) {
            $sportDetails = $details;
            $viewName = 'coach.dashboards.athletics';
        }

        // If specific view doesn't exist yet, fall back to default
        if (!view()->exists($viewName)) {
            $viewName = 'coach.dashboard';
        }

        return view($viewName, compact('coach', 'sportName', 'players', 'events', 'blogPosts', 'sportDetails'));
    }

    public function updateStats(Request $request)
    {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->first();
        
        $validated = $request->validate([
            'wins' => 'nullable|integer|min:0',
            'losses' => 'nullable|integer|min:0',
            'draws' => 'nullable|integer|min:0',
        ]);

        $sportName = $coach->sport;
        $models = [BallGame::class, BoardGame::class, MartialArt::class, ThrowingGame::class, AthleticsProgram::class];

        foreach ($models as $model) {
            $record = $model::where('name', 'like', $sportName)->first();
            if ($record) {
                $record->update($validated);
                return redirect()->back()->with('success', 'Stats updated successfully!');
            }
        }

        return redirect()->back()->with('error', 'Sport record not found.');
    }
}
