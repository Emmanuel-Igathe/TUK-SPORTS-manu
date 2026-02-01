<?php

namespace App\Http\Controllers;

use App\Models\AthleticsProgram;
use App\Models\AthleticsRegistration;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AthleticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = AthleticsProgram::where('active', true)->get();
        
        // Calculate real total athlete counts and fetch dynamic coaches
        foreach ($programs as $program) {
            $program->total_athletes = \App\Models\Player::where('sport', $program->name)->count();

            // Fetch real coaches for this program
            $coaches = \App\Models\Coach::where('sport', 'like', $program->name)->get();
            
            if ($coaches->isNotEmpty()) {
                $program->head_coach = $coaches->first()->name;
                $program->assistant_coaches = $coaches->slice(1)->pluck('name')->implode(', ') ?: 'To be assigned';
            } else {
                $program->head_coach = 'To be assigned';
                $program->assistant_coaches = 'To be assigned';
            }
        }

        return view('athletics', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'experience-level' => 'required|string',
            'preferred-event' => 'nullable|string',
            'personal-best' => 'nullable|string',
            'medical-notes' => 'nullable|string',
            'emergency-contact' => 'required|string',
        ]);

        // Check for duplicate registration
        $exists = AthleticsRegistration::where('student_id', $validated['student-id'])
            ->where('sport', $validated['sport'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for ' . $validated['sport']);
        }

        DB::transaction(function () use ($validated) {
            AthleticsRegistration::create([
                'sport' => $validated['sport'],
                'name' => $validated['student-name'],
                'student_id' => $validated['student-id'],
                'email' => $validated['student-email'],
                'phone' => $validated['student-phone'],
                'year' => $validated['student-year'],
                'course' => $validated['student-course'],
                'experience' => $validated['experience-level'],
                'preferred_event' => $validated['preferred-event'],
                'personal_best' => $validated['personal-best'],
                'medical_notes' => $validated['medical-notes'],
                'emergency_contact' => $validated['emergency-contact'],
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
}
