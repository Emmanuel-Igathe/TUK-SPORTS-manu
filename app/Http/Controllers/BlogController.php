<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch posts ordered by latest published_at
        $posts = BlogPost::orderBy('published_at', 'desc')->get();
        
        // Get categories with counts
        $categories = BlogPost::select('category', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
             ->groupBy('category')
             ->get();

        // Get 3 most recent posts
        $recentPosts = $posts->take(3);

        return view('blog', compact('posts', 'categories', 'recentPosts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->canManageBlog()) {
            return back()->with('error', 'Unauthorized! Only admins and coaches can create blog posts.');
        }

        $validated = $request->validate([
            'post-title' => 'required|string|max:255',
            'post-category' => 'required|string',
            'post-image' => 'nullable|url',
            'post-excerpt' => 'required|string',
            'post-content' => 'required|string',
        ]);

        // Generate a slug from the title
        $slug = Str::slug($validated['post-title']);
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        BlogPost::create([
            'title' => $validated['post-title'],
            'slug' => $slug,
            'category' => $validated['post-category'],
            'image_url' => $validated['post-image'] ?? 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
            'excerpt' => $validated['post-excerpt'],
            'content' => $validated['post-content'],
            'author' => auth()->user()->name,
            'published_at' => now(),
        ]);

        return back()->with('success', 'Blog post published successfully!');
    }
}
