<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Throwing Games - Technical University of Kenya</title>
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), url('https://media.istockphoto.com/id/663208674/photo/athlete-about-to-throw-a-javelin.jpg?s=612x612&w=0&k=20&c=Vc_Nx70TYMEsuEaonzfVykFArWVLln3pCt4Rq7_RHwk=');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            font-weight: normal;
        }
        
        /* Throwing Games Section */
        .throwing-games-section {
            padding: 60px 0;
            background-color: #f9f9f9;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: #003366;
            font-size: 2.2rem;
            font-weight: bold;
        }
        
        .games-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .game-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .game-card:hover {
            transform: translateY(-5px);
        }
        
        .game-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .game-content {
            padding: 25px;
        }
        
        .game-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #003366;
            border-bottom: 2px solid #f0f8ff;
            padding-bottom: 10px;
        }
        
        .game-info {
            margin-bottom: 20px;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .info-label {
            font-weight: bold;
            color: #003366;
        }
        
        .info-value {
            color: #000000;
        }
        
        .stats-container {
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }
        
        .stats-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #003366;
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            text-align: center;
        }
        
        .stat-item {
            padding: 8px;
            border-radius: 4px;
        }
        
        .gold {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .silver {
            background-color: #e2e3e5;
            color: #383d41;
        }
        
        .bronze {
            background-color: #e8d5c4;
            color: #7a5c3c;
        }
        
        /* Registration Button */
        .register-btn {
            display: block;
            width: 100%;
            background-color: #2E8B57;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
        }
        
        .register-btn:hover {
            background-color: #26734d;
        }
        
        /* Registration Modal */
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
            max-width: 500px;
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
            min-height: 80px;
            resize: vertical;
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
            width: 100%;
        }
        
        .submit-btn:hover {
            background-color: #26734d;
        }
        
        /* Success Message */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
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
            
            .logo-container {
                margin-bottom: 15px;
            }
            
            .nav-container {
                justify-content: center;
            }
            
            .nav-links {
                flex-direction: column;
                width: 100%;
            }
            
            .nav-links li {
                text-align: center;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .games-container {
                grid-template-columns: 1fr;
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
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('registration.index') }}">Registration</a></li>
                        <li><a href="{{ route('schedule.index') }}">Events</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a href="{{ route('athletics.index') }}">Athletics</a></li>
                        <li><a href="{{ route('board-games.index') }}">Board Games</a></li>
                        <li><a href="{{ route('martial-arts.index') }}">Martial Arts</a></li>
                        <li><a href="{{ route('throwing-games.index') }}" class="active">Throwing Games</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>THROWING GAMES AT TU-K</h1>
            <p>Develop strength, technique, and precision through our comprehensive throwing games programs at the Technical University of Kenya.</p>
        </div>
    </section>

    <!-- Throwing Games Section -->
    <section class="throwing-games-section">
        <div class="container">
            <h2 class="section-title">Our Throwing Games Programs</h2>
            
            <div class="games-container">
                @foreach ($games as $game)
                <div class="game-card">
                    <img src="{{ $game->image_url }}" alt="{{ $game->name }}" class="game-image">
                    <div class="game-content">
                        <h3 class="game-title">{{ $game->name }}</h3>
                        <div class="game-info">
                            <div class="info-item">
                                <span class="info-label">Registered Athletes:</span>
                                <span class="info-value">{{ $game->total_athletes }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Head Coach:</span>
                                <span class="info-value">{{ $game->head_coach }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Assistant Coaches:</span>
                                <span class="info-value">{{ $game->assistant_coaches }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Year Integrated:</span>
                                <span class="info-value">{{ $game->year_integrated }}</span>
                            </div>
                        </div>
                        <div class="stats-container">
                            <div class="stats-title">Competition Medals</div>
                            <div class="stats-grid">
                                <div class="stat-item gold">
                                    <div>Gold</div>
                                    <div>{{ $game->gold_medals }}</div>
                                </div>
                                <div class="stat-item silver">
                                    <div>Silver</div>
                                    <div>{{ $game->silver_medals }}</div>
                                </div>
                                <div class="stat-item bronze">
                                    <div>Bronze</div>
                                    <div>{{ $game->bronze_medals }}</div>
                                </div>
                            </div>
                        </div>
                        <button class="register-btn" data-sport="{{ $game->name }}">Register for {{ $game->name }}</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Registration Modal -->
    <div class="modal" id="registration-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modal-title">Register for <span id="sport-name"></span></h3>
                <button class="modal-close" id="registration-close">&times;</button>
            </div>
            <div class="modal-body">
                @if (session('success'))
                    <div class="success-message">
                        <h4>Registration Successful!</h4>
                        <p>{{ session('success') }}</p>
                    </div>
                @elseif (session('error'))
                    <div class="error-message">
                        <h4>Registration Error</h4>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form id="registration-form" method="POST" action="{{ route('throwing-games.store') }}">
                    @csrf
                    <input type="hidden" id="selected-sport" name="selected-sport">
                    
                    <div class="form-group">
                        <label for="student-name">Full Name *</label>
                        <input type="text" id="student-name" name="student-name" value="{{ old('student-name') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="student-id">Student ID/Registration Number *</label>
                        <input type="text" id="student-id" name="student-id" placeholder="SCCJ/00651/2023" value="{{ old('student-id') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="student-email">Email Address *</label>
                        <input type="email" id="student-email" name="student-email" value="{{ old('student-email') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="student-phone">Phone Number *</label>
                        <input type="tel" id="student-phone" name="student-phone" value="{{ old('student-phone') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="student-year">Year of Study *</label>
                        <select id="student-year" name="student-year" required>
                            <option value="">Select Year</option>
                            <option value="1st Year" {{ old('student-year') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('student-year') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('student-year') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('student-year') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                            <option value="5th Year" {{ old('student-year') == '5th Year' ? 'selected' : '' }}>5th Year</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="student-course">Course/Program *</label>
                        <input type="text" id="student-course" name="student-course" value="{{ old('student-course') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="experience-level">Previous Experience Level</label>
                        <select id="experience-level" name="experience-level">
                            <option value="Beginner" {{ old('experience-level') == 'Beginner' ? 'selected' : '' }}>Beginner (No prior experience)</option>
                            <option value="Intermediate" {{ old('experience-level') == 'Intermediate' ? 'selected' : '' }}>Intermediate (School/Club level)</option>
                            <option value="Advanced" {{ old('experience-level') == 'Advanced' ? 'selected' : '' }}>Advanced (County/Regional level)</option>
                            <option value="Expert" {{ old('experience-level') == 'Expert' ? 'selected' : '' }}>Expert (National/International level)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="preferred-event">Preferred Throwing Event</label>
                        <select id="preferred-event" name="preferred-event">
                            <option value="">Select Event</option>
                            <option value="Javelin" {{ old('preferred-event') == 'Javelin' ? 'selected' : '' }}>Javelin</option>
                            <option value="Discus" {{ old('preferred-event') == 'Discus' ? 'selected' : '' }}>Discus</option>
                            <option value="Shot Put" {{ old('preferred-event') == 'Shot Put' ? 'selected' : '' }}>Shot Put</option>
                            <option value="Hammer Throw" {{ old('preferred-event') == 'Hammer Throw' ? 'selected' : '' }}>Hammer Throw</option>
                            <option value="Weight Throw" {{ old('preferred-event') == 'Weight Throw' ? 'selected' : '' }}>Weight Throw</option>
                            <option value="Precision Throwing" {{ old('preferred-event') == 'Precision Throwing' ? 'selected' : '' }}>Precision Throwing</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="personal-best">Personal Best Record (if any)</label>
                        <input type="text" id="personal-best" name="personal-best" placeholder="e.g., Javelin: 45m, Shot Put: 12m" value="{{ old('personal-best') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="training-goals">Training Goals & Objectives</label>
                        <textarea id="training-goals" name="training-goals" placeholder="What do you hope to achieve through throwing sports training?">{{ old('training-goals') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="medical-conditions">Medical Conditions/Injuries</label>
                        <textarea id="medical-conditions" name="medical-conditions" placeholder="Please disclose any medical conditions, injuries, or physical limitations...">{{ old('medical-conditions') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="emergency-contact">Emergency Contact Name & Number *</label>
                        <input type="text" id="emergency-contact" name="emergency-contact" value="{{ old('emergency-contact') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="waiver" value="accepted" required>
                            I understand and accept the risks involved in throwing sports training *
                        </label>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="submit-btn">Submit Registration</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <!-- Student Downloads -->
                <div class="footer-section">
                    <h3>Student Downloads</h3>
                    <ul class="footer-links">
                        <li><a href="#">Academic Calendar 2021</a></li>
                        <li><a href="#">Reopening of the University October 2020</a></li>
                        <li><a href="#">Position paper on Automation Processes</a></li>
                        <li><a href="#">Teaching Timetable</a></li>
                        <li><a href="#">Registration Form</a></li>
                        <li><a href="#">Download Joining Instructions</a></li>
                        <li><a href="#">SATUK 2019/2020 Office Bearers</a></li>
                        <li><a href="#">SATUK 2016/2017 Office Bearers</a></li>
                        <li><a href="#">SATUK Constitution, 2018 (Revised 2024)</a></li>
                        <li><a href="#">Recommended List of Private Hostels</a></li>
                        <li><a href="#">2016 List of Graduands</a></li>
                    </ul>
                </div>
                
                <!-- Special Websites -->
                <div class="footer-section">
                    <h3>Special Websites</h3>
                    <ul class="footer-links">
                        <li><a href="#">TU-K Main Website</a></li>
                        <li><a href="#">TU-K Library Website</a></li>
                        <li><a href="#">E-Learning Portal</a></li>
                        <li><a href="#">Students Fees Portal</a></li>
                        <li><a href="#">Online Application Portal</a></li>
                        <li><a href="#">Staff ePortal</a></li>
                        <li><a href="#">TU-K Digital Repository Website</a></li>
                        <li><a href="#">Students Official Email through Google</a></li>
                    </ul>
                    
                    <h3>Join our Social Network</h3>
                    <div class="social-icons">
                        <a href="https://share.google/NFgvH29H2Kriw429W" class="social-icon">facebook</a>
                        <a href="https://share.google/5Gx0rIvAawYy6bnZi" class="social-icon">X twitter</a>
                        <a href="https://share.google/etsFEQAEl1z4JbRqL" class="social-icon">Instagram</a>
                        <a href="https://web.whatsapp.com/" class="social-icon">Whatsapp</a>
                    </div>
                </div>
                
                <!-- Core Services -->
                <div class="footer-section">
                    <h3>Core Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Request for Amendments</a></li>
                        <li><a href="#">Examinations</a></li>
                        <li><a href="#">Pay for TU-K Services</a></li>
                        <li><a href="#">Fee Statement</a></li>
                        <li><a href="#">Download Certificate Collection Form</a></li>
                        <li><a href="#">Timetable Download</a></li>
                        <li><a href="#">Book Room</a></li>
                        <li><a href="#">Sign Nominal Roll</a></li>
                        <li><a href="#">Graduation Clearance</a></li>
                    </ul>
                </div>
                
                <!-- General Services -->
                <div class="footer-section">
                    <h3>General Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Rattansi Bursary</a></li>
                        <li><a href="#">Joe Wanjui Bursary</a></li>
                        <li><a href="#">Student ID</a></li>
                        <li><a href="#">Student Evaluation</a></li>
                        <li><a href="#">Register Club</a></li>
                        <li><a href="#">SATUK Elections</a></li>
                        <li><a href="#">Class Rep</a></li>
                        <li><a href="#">SATUK Bursary</a></li>
                        <li><a href="#">Register as Alumni</a></li>
                        <li><a href="#">Apply for Deferment</a></li>
                        <li><a href="#">Special Exams</a></li>
                        <li><a href="#">Reinstatement</a></li>
                        <li><a href="#">Supplimentary/Repeat of Failed Units</a></li>
                        <li><a href="#">Mid-Stream Clearance</a></li>
                        <li><a href="#">Fees Refunds</a></li>
                        <li><a href="#">Attachment letter</a></li>
                    </ul>
                </div>
                
                <!-- Contact Information -->
                <div class="footer-section contact-info">
                    <h3>Contact Information</h3>
                    <p>TUK Logo Image</p>
                    <p>P.O. Box 52428 - 00200</p>
                    <p>Nairobi- Kenya.</p>
                    <p>Located along Haile Selassie Avenue</p>
                    <p>Tel: +254(020) 2219929, 3341639, 3343672</p>
                    <p>Email:</p>
                    <p>General inquiries: info@tukenya.ac.ke</p>
                    <p>Feedback/Complaints/Suggestions: customercare@tukenya.ac.ke</p>
                    <p>Official Communication: vc@tukenya.ac.ke</p>
                    <p>TUK ISO Image</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>Powered by Directorate of ICT Services. Copyright © 2012 - 2025 The Technical University of Kenya. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registrationModal = document.getElementById('registration-modal');
            const registrationClose = document.getElementById('registration-close');
            const registrationForm = document.getElementById('registration-form');
            const sportNameElement = document.getElementById('sport-name');
            const selectedSportInput = document.getElementById('selected-sport');
            const modalTitle = document.getElementById('modal-title');
            
            // Get all register buttons
            const registerButtons = document.querySelectorAll('.register-btn');
            
            // Add event listeners to register buttons
            registerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const sport = this.getAttribute('data-sport');
                    openRegistrationModal(sport);
                });
            });
            
            // Function to open registration modal
            function openRegistrationModal(sport) {
                sportNameElement.textContent = sport;
                selectedSportInput.value = sport;
                modalTitle.textContent = `Register for ${sport}`;
                registrationModal.style.display = 'flex';
                // Only reset if it's a new open, not after a validation error
                if (!document.querySelector('.error-message')) {
                     registrationForm.reset();
                     selectedSportInput.value = sport; // Ensure sport is set after reset
                }
            }
            
            // Close modal when clicking close button
            registrationClose.addEventListener('click', function() {
                registrationModal.style.display = 'none';
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === registrationModal) {
                    registrationModal.style.display = 'none';
                }
            });

             // Auto-open modal if validation errors exist or success
            @if (session('success') || session('error') || $errors->any())
                const sport = "{{ old('selected-sport') }}";
                if (sport) {
                     openRegistrationModal(sport);
                } else {
                     @if(old('selected-sport'))
                        openRegistrationModal("{{ old('selected-sport') }}");
                     @endif
                }
            @endif
        });
    </script>
</body>
</html>
