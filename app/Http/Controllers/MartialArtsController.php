<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MartialArt;
use App\Models\MartialArtRegistration;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class MartialArtsController extends Controller
{
    public function index()
    {
        $arts = \App\Models\MartialArt::all();
        
        foreach ($arts as $art) {
            // Fetch real coaches for this sport
            $coaches = \App\Models\Coach::where('sport', 'like', $art->name)->get();
            
            if ($coaches->isNotEmpty()) {
                $art->head_instructor = $coaches->first()->name;
                $art->assistant_instructors = $coaches->slice(1)->pluck('name')->implode(', ') ?: 'To be assigned';
            } else {
                $art->head_instructor = 'To be assigned';
                $art->assistant_instructors = 'To be assigned';
            }

            // Calculate real student/player count
            $art->total_students = \App\Models\Player::where('sport', 'like', $art->name)->count();
        }

        return view('martial-arts', compact('arts'));
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
            'belt-rank' => 'nullable|string',
            'training-goals' => 'nullable|string',
            'medical-conditions' => 'nullable|string',
            'emergency-contact' => 'required|string|max:255',
            'terms_agreement' => 'accepted',
            'waiver' => 'accepted',
        ]);

        // Check for duplicate registration
        $exists = \App\Models\MartialArtRegistration::where('student_id', $validated['student-id'])
            ->where('sport', $validated['selected-sport'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for this martial art.');
        }

        DB::transaction(function () use ($validated) {
            \App\Models\MartialArtRegistration::create([
                'sport' => $validated['selected-sport'],
                'student_name' => $validated['student-name'],
                'student_id' => $validated['student-id'],
                'email' => $validated['student-email'],
                'phone' => $validated['student-phone'],
                'year_of_study' => $validated['student-year'],
                'course' => $validated['student-course'],
                'experience_level' => $validated['experience-level'],
                'belt_rank' => $validated['belt-rank'],
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

        return back()->with('success', 'Registration successful! The instructor will contact you soon.');
    }
}
