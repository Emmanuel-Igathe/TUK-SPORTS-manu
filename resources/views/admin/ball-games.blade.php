<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ball Games Registrations - Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #003366; text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #003366; color: white; }
        tr:hover { background-color: #f5f5f5; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        .stat-number { font-size: 2em; font-weight: bold; color: #003366; }
        .logout { float: right; margin-bottom: 20px; }
        .logout a { background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Logout</button>
            </form>
        </div>
        <h1>Ball Games Registrations - Admin Panel</h1>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">{{ $totalRegistrations }}</div>
                <div>Total Registrations</div>
            </div>
            @foreach($sportStats as $sport => $count)
            <div class="stat-card">
                <div class="stat-number">{{ $count }}</div>
                <div>{{ $sport }} Registrations</div>
            </div>
            @endforeach
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Sport</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Year</th>
                    <th>Course</th>
                    <th>Experience</th>
                    <th>Position</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registrations as $registration)
                <tr>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->student_id }}</td>
                    <td>{{ $registration->sport }}</td>
                    <td>{{ $registration->email }}</td>
                    <td>{{ $registration->phone }}</td>
                    <td>{{ $registration->year }}</td>
                    <td>{{ $registration->course }}</td>
                    <td>{{ $registration->experience }}</td>
                    <td>{{ $registration->position_role }}</td>
                    <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" style="text-align: center; padding: 20px;">No registrations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
