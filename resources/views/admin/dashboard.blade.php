<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Technical University of Kenya</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #ffffff;
            color: #000000;
            line-height: 1.6;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            background-color: white;
            border: none;
        }
        
        .logo {
            height: 150px;
            width: 450px;
            margin-right: 15px;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: lighter;
            color: #003366;
        }
        
        /* Navigation */
        nav {
            background-color: white;
        }
        
        .nav-container {
            display: flex;
            justify-content: flex-end;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            position: relative;
        }
        
        .nav-links a {
            color: green;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            transition: background-color 0.3s;
        }
        
        .nav-links a:hover {
            color: black;
        }
        
        /* Admin Dashboard Section */
        .admin-section {
            padding: 40px 0;
            background-color: #f9f9f9;
            min-height: 80vh;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: #003366;
            font-size: 2.2rem;
            font-weight: bold;
        }
        
        .admin-welcome {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-left: 4px solid #003366;
        }
        
        .admin-welcome h3 {
            color: #003366;
            margin-bottom: 10px;
        }
        
        /* Admin Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .card-title {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: #003366;
            border-bottom: 2px solid #f0f8ff;
            padding-bottom: 10px;
        }
        
        .card-stats {
            font-size: 2rem;
            font-weight: bold;
            color: #2E8B57;
            margin-bottom: 15px;
        }
        
        .card-description {
            color: #666;
            margin-bottom: 20px;
        }
        
        .card-btn {
            display: inline-block;
            background-color: #2E8B57;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        
        .card-btn:hover {
            background-color: #26734d;
        }
        
        /* Admin Tabs */
        .admin-tabs {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .tab-headers {
            display: flex;
            background-color: #f0f8ff;
            border-bottom: 1px solid #ddd;
        }
        
        .tab-header {
            padding: 15px 25px;
            cursor: pointer;
            background-color: transparent;
            border: none;
            font-size: 1rem;
            transition: background-color 0.3s;
            color: #003366;
        }
        
        .tab-header.active {
            background-color: white;
            border-bottom: 3px solid #003366;
            font-weight: bold;
        }
        
        .tab-content {
            padding: 30px;
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .data-table th {
            background-color: #f0f8ff;
            color: #003366;
            font-weight: bold;
        }
        
        .data-table tr:hover {
            background-color: #f9f9f9;
        }
        
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            margin-right: 5px;
            transition: background-color 0.3s;
        }
        
        .edit-btn {
            background-color: #ffc107;
            color: #000;
        }
        
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        
        .edit-btn:hover {
            background-color: #e0a800;
        }
        
        .delete-btn:hover {
            background-color: #c82333;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #000000;
            font-weight: normal;
        }
        
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            color: #000000;
        }
        
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #003366;
        }
        
        .submit-btn {
            background-color: #2E8B57;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #26734d;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .modal-header {
            padding: 20px;
            background-color: #003366;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        /* Footer */
        footer {
            background-color: #000;
            color: #fff;
            border-top: 4px solid #003366;
        }
        
        .footer-content {
            padding: 50px 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .footer-section h3 {
            color: #cc0000;
            margin-bottom: 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: normal;
        }
        
        .footer-links a:hover {
            color: #fff;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: #333;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            color: white;
            transition: background-color 0.3s;
        }
        
        .social-icon:hover {
            background-color: #003366;
        }
        
        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #333;
            font-size: 0.9rem;
            color: #aaa;
            font-weight: normal;
        }
        
        /* Contact Information in Footer */
        .contact-info p {
            color: #ddd;
            margin-bottom: 8px;
            font-weight: normal;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-top {
                flex-direction: column;
                text-align: center;
            }
            .nav-links {
                flex-direction: column;
                text-align: center;
            }
             .tab-headers {
                flex-wrap: wrap;
            }
            .tab-header {
                flex: 1 0 50%;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo-container">
                    <img src="https://media.tukenya.ac.ke/general/logo.png" alt="Technical University of Kenya Logo" class="logo">
                    <div class="logo-text">Student Online Portal</div>
                </div>
                
                <!-- Navigation in the same container as logo -->
                <nav>
                    <ul class="nav-links">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('admin.dashboard') }}" class="active">Admin</a></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" style="background:none; border:none; color:green; padding:15px; cursor:pointer;" onmouseover="this.style.color='black'" onmouseout="this.style.color='green'">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Admin Dashboard Section -->
    <section class="admin-section">
        <div class="container">
            <h2 class="section-title">Admin Dashboard</h2>
            
            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif
            
             @if($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                    <ul style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Admin Welcome Message -->
            <div class="admin-welcome">
                <h3>Welcome, {{ Auth::user()->name }}!</h3>
                <p>As an administrator, you have full control over the TU-K Sports Blog, player management, and event scheduling. Use the dashboard below to manage all aspects of the sports program.</p>
            </div>
            
            <!-- Dashboard Stats -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h3 class="card-title">Blog Posts</h3>
                    <div class="card-stats" id="blog-count">{{ $blogPosts->count() }}</div>
                    <p class="card-description">Total published blog posts</p>
                    <button class="card-btn" data-tab="blog-management">Manage Posts</button>
                </div>
                
                <div class="dashboard-card">
                    <h3 class="card-title">Players</h3>
                    <div class="card-stats" id="player-count">{{ $players->count() }}</div>
                    <p class="card-description">Registered student athletes</p>
                    <button class="card-btn" data-tab="player-management">Manage Players</button>
                </div>
                
                <div class="dashboard-card">
                    <h3 class="card-title">Events</h3>
                    <div class="card-stats" id="event-count">{{ $events->count() }}</div>
                    <p class="card-description">Upcoming sports events</p>
                    <button class="card-btn" data-tab="event-management">Manage Events</button>
                </div>
                
                <div class="dashboard-card">
                    <h3 class="card-title">Sports</h3>
                    <div class="card-stats" id="sport-count">{{ $sports->count() }}</div>
                    <p class="card-description">Active sports programs</p>
                    <button class="card-btn" data-tab="sport-management">Manage Sports</button>
                </div>
            </div>
            
            <!-- Admin Tabs -->
            <div class="admin-tabs">
                <div class="tab-headers">
                    <button class="tab-header active" data-tab="blog-management">Blog Management</button>
                    <button class="tab-header" data-tab="player-management">Player Management</button>
                    <button class="tab-header" data-tab="event-management">Event Management</button>
                    <button class="tab-header" data-tab="sport-management">Sport Management</button>
                    <button class="tab-header" data-tab="user-management">User Management</button>
                </div>
                
                <!-- Blog Management Tab -->
                <div class="tab-content active" id="blog-management">
                    <h3>Manage Blog Posts</h3>
                    <p>Create, edit, or delete blog posts to share updates with the TU-K sports community.</p>
                    
                    <button class="card-btn" id="create-blog-post">Create New Post</button>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="blog-posts-table">
                            @foreach($blogPosts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->created_at->format('M d, Y') }}</td>
                                <td>{{ $post->category }}</td>
                                <td>
                                    <form action="{{ route('admin.blog.delete', $post->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Player Management Tab -->
                <div class="tab-content" id="player-management">
                    <h3>Manage Players</h3>
                    <p>View, edit, or remove student athletes from the sports program.</p>
                    
                    <button class="card-btn" id="create-player-btn" style="margin-bottom: 20px;">Add New Player</button>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Student ID</th>
                                <th>Sport</th>
                                <th>Year</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="players-table">
                            @foreach($players as $player)
                            <tr>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->student_id }}</td>
                                <td>{{ $player->sport }}</td>
                                <td>{{ $player->year }}</td>
                                <td>
                                    <form action="{{ route('admin.player.delete', $player->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Event Management Tab -->
                <div class="tab-content" id="event-management">
                    <h3>Manage Events</h3>
                    <p>Create, edit, or delete upcoming sports events and update the calendar.</p>
                    
                    <button class="card-btn" id="create-event">Create New Event</button>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Sport</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="events-table">
                            @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} at {{ $event->time }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->sport }}</td>
                                <td>
                                    <form action="{{ route('admin.event.delete', $event->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Sport Management Tab -->
                <div class="tab-content" id="sport-management">
                    <h3>Manage Sports</h3>
                    <p>Manage the sports programs.</p>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Sport Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="sports-table">
                            @foreach($sports as $sport)
                            <tr>
                                <td>{{ $sport }}</td>
                                <td>Active</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- User Management Tab -->
                <div class="tab-content" id="user-management">
                    <h3>Manage Users</h3>
                    <p>Manage user roles and permissions.</p>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="users-table">
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span style="padding: 5px 10px; border-radius: 4px; background-color: {{ $user->role === 'coach' ? '#d4edda' : '#f8f9fa' }}; color: {{ $user->role === 'coach' ? '#155724' : '#333' }};">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    @if($user->role !== 'coach')
                                    <form action="{{ route('admin.user.make-coach', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="action-btn edit-btn">Make Coach</button>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.user.revoke-coach', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="action-btn delete-btn">Revoke Coach</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Create Blog Post Modal -->
    <div class="modal" id="create-blog-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create New Blog Post</h3>
                <button class="modal-close" id="create-blog-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="create-blog-form" action="{{ route('admin.blog.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="blog-title">Post Title *</label>
                        <input type="text" id="blog-title" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="blog-category">Category *</label>
                        <select id="blog-category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="Football">Football</option>
                            <option value="Basketball">Basketball</option>
                            <option value="Athletics">Athletics</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Martial Arts">Martial Arts</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="blog-image">Featured Image URL</label>
                        <input type="url" id="blog-image" name="image" placeholder="https://example.com/image.jpg">
                    </div>
                    
                    <div class="form-group">
                        <label for="blog-excerpt">Excerpt *</label>
                        <textarea id="blog-excerpt" name="excerpt" required placeholder="Brief description of your post..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="blog-content">Post Content *</label>
                        <textarea id="blog-content" name="content" required placeholder="Write your blog post content here..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Publish Post</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Event Modal -->
    <div class="modal" id="create-event-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create New Event</h3>
                <button class="modal-close" id="create-event-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="create-event-form" action="{{ route('admin.event.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="event-name">Event Name *</label>
                        <input type="text" id="event-name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-sport">Sport *</label>
                        <select id="event-sport" name="sport" required>
                            <option value="">Select a sport</option>
                            <option value="football">Football</option>
                            <option value="basketball">Basketball</option>
                            <option value="athletics">Athletics</option>
                            <option value="volleyball">Volleyball</option>
                            <option value="martial-arts">Martial Arts</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-date">Date *</label>
                        <input type="date" id="event-date" name="date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-time">Time *</label>
                        <input type="time" id="event-time" name="time" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-location">Location *</label>
                        <input type="text" id="event-location" name="location" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event-description">Description</label>
                        <textarea id="event-description" name="description" placeholder="Event details..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Create Event</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Player Modal -->
    <div class="modal" id="create-player-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Player</h3>
                <button class="modal-close" id="create-player-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="create-player-form" action="{{ route('admin.player.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="player-name">Name *</label>
                        <input type="text" id="player-name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="player-student-id">Student ID *</label>
                        <input type="text" id="player-student-id" name="student_id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="player-sport">Sport *</label>
                        <select id="player-sport" name="sport" required>
                            <option value="">Select a sport</option>
                            <option value="Football">Football</option>
                            <option value="Basketball">Basketball</option>
                            <option value="Athletics">Athletics</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Martial Arts">Martial Arts</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="player-year">Year *</label>
                        <select id="player-year" name="year" required>
                             <option value="1">1st Year</option>
                             <option value="2">2nd Year</option>
                             <option value="3">3rd Year</option>
                             <option value="4">4th Year</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="submit-btn">Add Player</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Helper function to safely get element
            const getEl = (id) => document.getElementById(id);

            // DOM Elements
            const tabHeaders = document.querySelectorAll('.tab-header');
            const tabContents = document.querySelectorAll('.tab-content');
            const dashboardButtons = document.querySelectorAll('.card-btn[data-tab]');
            
            const createBlogBtn = getEl('create-blog-post');
            const createBlogModal = getEl('create-blog-modal');
            const createBlogClose = getEl('create-blog-close');
            
            const createEventBtn = getEl('create-event');
            const createEventModal = getEl('create-event-modal');
            const createEventClose = getEl('create-event-close');
            
            const createPlayerBtn = getEl('create-player-btn');
            const createPlayerModal = getEl('create-player-modal');
            const createPlayerClose = getEl('create-player-close');
            
            // Tab functionality
            function switchTab(tabId) {
                // Remove active class from all headers and contents
                tabHeaders.forEach(h => h.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked header and corresponding content
                const validHeader = document.querySelector(`.tab-header[data-tab="${tabId}"]`);
                const validContent = document.getElementById(tabId);
                
                if (validHeader && validContent) {
                    validHeader.classList.add('active');
                    validContent.classList.add('active');
                } else {
                    console.error('Tab not found:', tabId);
                }
            }

            tabHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    switchTab(tabId);
                });
            });
            
            // Dashboard buttons to switch tabs
            dashboardButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    switchTab(tabId);
                    
                    // Scroll to the tabs section for better UX
                    const tabsContainer = document.querySelector('.admin-tabs');
                    if (tabsContainer) {
                        tabsContainer.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
            
            // Modal Helper
            function setupModal(btn, modal, closeBtn) {
                if (btn && modal && closeBtn) {
                    btn.addEventListener('click', () => modal.style.display = 'flex');
                    closeBtn.addEventListener('click', () => modal.style.display = 'none');
                    
                    // Close on click outside
                    window.addEventListener('click', (e) => {
                        if (e.target === modal) modal.style.display = 'none';
                    });
                }
            }
            
            setupModal(createBlogBtn, createBlogModal, createBlogClose);
            setupModal(createEventBtn, createEventModal, createEventClose);
            setupModal(createPlayerBtn, createPlayerModal, createPlayerClose);
        });
    </script>
</body>
</html>
