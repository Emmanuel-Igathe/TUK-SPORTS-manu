<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Dashboard - {{ $sportName }}</title>
    <style>
        /* Adapt standard styles from Admin Dashboard */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f9f9f9; color: #333; line-height: 1.6; }
        .container { width: 90%; max-width: 1200px; margin: 0 auto; }
        
        header { background-color: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 15px 0; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; }
        .logo-text { font-size: 1.5rem; font-weight: bold; color: #003366; }
        
        .main-section { padding: 40px 0; }
        .welcome-box { background: #003366; color: white; padding: 30px; border-radius: 8px; margin-bottom: 30px; }
        .welcome-box h2 { margin-bottom: 10px; }
        
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .stat-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); text-align: center; }
        .stat-card h3 { color: #666; font-size: 0.9rem; margin-bottom: 10px; }
        .stat-val { font-size: 2rem; font-weight: bold; color: #2E8B57; }
        
        .tabs { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .tab-nav { display: flex; background: #f0f8ff; border-bottom: 1px solid #ddd; }
        .tab-btn { padding: 15px 25px; border: none; background: none; cursor: pointer; color: #003366; font-weight: bold; border-bottom: 3px solid transparent; }
        .tab-btn.active { background: white; border-bottom-color: #003366; }
        
        .tab-pane { padding: 30px; display: none; }
        .tab-pane.active { display: block; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #eee; }
        th { background: #fcfcfc; color: #003366; }
        
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; }
        .badge-active { background: #d4edda; color: #155724; }
        
        .btn { padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; text-decoration: none; font-size: 0.9rem; font-weight: bold; transition: 0.3s; }
        .btn-primary { background: #2E8B57; color: white; }
        .btn-primary:hover { background: #26734d; }

        nav ul { display: flex; list-style: none; gap: 20px; }
        nav a { text-decoration: none; color: #003366; font-weight: bold; }

        /* Modal Styles */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4); }
        .modal-content { background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 50%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
        .close:hover, .close:focus { color: black; text-decoration: none; cursor: pointer; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .action-btn { padding: 5px 10px; border-radius: 4px; text-decoration: none; color: white; font-size: 0.8rem; margin-right: 5px; border: none; cursor: pointer; }
        .btn-edit { background-color: #f0ad4e; }
        .btn-delete { background-color: #d9534f; }
    </style>
</head>
<body>
    <header>
        <div class="container header-flex">
            <div class="logo-text">TU-K Coach Portal</div>
            <nav>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:#003366; font-weight:bold; cursor:pointer;">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main-section container">
        <div class="welcome-box">
            <h2>Welcome, Coach {{ $coach->name }}</h2>
            <p>Managing: <strong>{{ ucfirst($sportName) }}</strong></p>
        </div>

        <div class="dashboard-grid">
            <div class="stat-card">
                <h3>Total Players</h3>
                <div class="stat-val">{{ $players->count() }}</div>
            </div>
            <div class="stat-card">
                <h3>Records</h3>
                <div class="stat-val" style="font-size: 1.2rem; margin-top: 10px;">
                    @if($sportDetails)
                        W: {{ $sportDetails->wins }} | L: {{ $sportDetails->losses }} | D: {{ $sportDetails->draws ?? 0 }}
                    @else
                        N/A
                    @endif
                </div>
            </div>
            <div class="stat-card">
                <h3>Upcoming Events</h3>
                <div class="stat-val">{{ $events->count() }}</div>
            </div>
        </div>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 4px;">{{ session('success') }}</div>
        @endif

        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 30px;">
            <h3>Update Sport Stats</h3>
            <form action="{{ route('coach.update-stats') }}" method="POST" style="display: flex; gap: 20px; align-items: flex-end; margin-top: 15px;">
                @csrf
                <div>
                    <label>Wins</label><br>
                    <input type="number" name="wins" value="{{ $sportDetails->wins ?? 0 }}" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 80px;">
                </div>
                <div>
                    <label>Losses</label><br>
                    <input type="number" name="losses" value="{{ $sportDetails->losses ?? 0 }}" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 80px;">
                </div>
                <div>
                    <label>Draws</label><br>
                    <input type="number" name="draws" value="{{ $sportDetails->draws ?? 0 }}" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 80px;">
                </div>
                <button type="submit" class="btn btn-primary">Update Record</button>
            </form>
        </div>

        <div class="tabs">
            <div class="tab-nav">
                <button class="tab-btn active" data-tab="players">Player Roster</button>
                <button class="tab-btn" data-tab="events">Sport Events</button>
                <button class="tab-btn" data-tab="blog">My Blog Posts</button>
            </div>

            <div class="tab-pane active" id="players">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Registered Athletes for {{ ucfirst($sportName) }}</h3>
                    <button class="btn btn-primary" onclick="openModal('addPlayerModal')">Add Player</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->student_id }}</td>
                            <td>{{ $player->year }}</td>
                            <td><span class="badge badge-active">{{ ucfirst($player->status) }}</span></td>
                            <td>
                                <button class="action-btn btn-edit" onclick="openEditPlayerModal({{ $player }})">Edit</button>
                                <form action="{{ route('coach.players.destroy', $player->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to remove this player?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5">No players registered for this sport yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="events">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Upcoming {{ ucfirst($sportName) }} Events</h3>
                    <button class="btn btn-primary" onclick="openModal('addEventModal')">Add Event</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} at {{ $event->time }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <button class="action-btn btn-edit" onclick="openEditEventModal({{ $event }})">Edit</button>
                                <form action="{{ route('coach.events.destroy', $event->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4">No upcoming events scheduled.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="blog">
                <h3>Recent Blog Posts in {{ ucfirst($sportName) }}</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogPosts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="2">No blog posts found for this category.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div style="margin-top: 20px;">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary">Create New Post</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Player Modal -->
    <div id="addPlayerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addPlayerModal')">&times;</span>
            <h2>Add Player</h2>
            <form action="{{ route('coach.players.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" name="student_id" required>
                </div>
                <div class="form-group">
                    <label>Year of Study</label>
                    <input type="text" name="year" placeholder="e.g. Year 2" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="active">Active</option>
                        <option value="injured">Injured</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Player</button>
            </form>
        </div>
    </div>

    <!-- Edit Player Modal -->
    <div id="editPlayerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editPlayerModal')">&times;</span>
            <h2>Edit Player</h2>
            <form id="editPlayerForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" id="edit_player_name" required>
                </div>
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" name="student_id" id="edit_player_student_id" required>
                </div>
                <div class="form-group">
                    <label>Year of Study</label>
                    <input type="text" name="year" id="edit_player_year" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="edit_player_status" required>
                        <option value="active">Active</option>
                        <option value="injured">Injured</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Player</button>
            </form>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div id="addEventModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addEventModal')">&times;</span>
            <h2>Add Event</h2>
            <form action="{{ route('coach.events.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" required>
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" name="time" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" required>
                </div>
                <div class="form-group">
                    <label>Description (Optional)</label>
                    <textarea name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Event</button>
            </form>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="editEventModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editEventModal')">&times;</span>
            <h2>Edit Event</h2>
            <form id="editEventForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="name" id="edit_event_name" required>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" id="edit_event_date" required>
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" name="time" id="edit_event_time" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" id="edit_event_location" required>
                </div>
                <div class="form-group">
                    <label>Description (Optional)</label>
                    <textarea name="description" id="edit_event_description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Event</button>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
                
                btn.classList.add('active');
                document.getElementById(btn.dataset.tab).classList.add('active');
            });
        });

        // Modal Functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }

        function openEditPlayerModal(player) {
            document.getElementById('edit_player_name').value = player.name;
            document.getElementById('edit_player_student_id').value = player.student_id;
            document.getElementById('edit_player_year').value = player.year;
            document.getElementById('edit_player_status').value = player.status;
            
            document.getElementById('editPlayerForm').action = "/coach/players/" + player.id;
            openModal('editPlayerModal');
        }

        function openEditEventModal(event) {
            document.getElementById('edit_event_name').value = event.name;
            document.getElementById('edit_event_date').value = event.date;
            // Format time if needed to remove seconds for input type="time"
            let time = event.time;
            if (time.length > 5) {
                time = time.substring(0, 5);
            }
            document.getElementById('edit_event_time').value = time;
            document.getElementById('edit_event_location').value = event.location;
            document.getElementById('edit_event_description').value = event.description || '';
            
            document.getElementById('editEventForm').action = "/coach/events/" + event.id;
            openModal('editEventModal');
        }
    </script>
</body>
</html>
