<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>About Us - TU-K Sports</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #ffffff; color: #000000; line-height: 1.6; }
        .container { width: 90%; max-width: 1200px; margin: 0 auto; }
        header { background-color: #fff; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); position: sticky; top: 0; z-index: 100; }
        .header-top { display: flex; justify-content: space-between; align-items: center; padding: 15px 0; }
        .logo-container { display: flex; align-items: center; }
        .logo { height: 150px; width: 450px; margin-right: 15px; }
        .logo-text { font-size: 1.8rem; font-weight: lighter; color: #003366; }
        nav { background-color: white; }
        .nav-links { display: flex; list-style: none; }
        .nav-links a { color: green; text-decoration: none; padding: 15px 20px; display: block; transition: background-color 0.3s; }
        .nav-links a:hover { color: black; }
        .slideshow-section { padding: 60px 0; background-color: #f9f9f9; }
        .slideshow-container { max-width: 1000px; position: relative; margin: auto; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); }
        .mySlides { display: none; }
        .mySlides img { width: 100%; height: 500px; object-fit: cover; }
        .prev, .next { cursor: pointer; position: absolute; top: 50%; padding: 16px; margin-top: -22px; color: white; font-weight: bold; font-size: 18px; background-color: rgba(0, 0, 0, 0.5); }
        .next { right: 0; }
        .prev:hover, .next:hover { background-color: rgba(0, 0, 0, 0.8); }
        .dot-container { text-align: center; padding: 20px; background: white; }
        .dot { cursor: pointer; height: 15px; width: 15px; margin: 0 2px; background-color: #bbb; border-radius: 50%; display: inline-block; }
        .active, .dot:hover { background-color: #003366; }
        .section-title { text-align: center; margin-bottom: 40px; color: #003366; font-size: 2.2rem; font-weight: bold; }
        .about-content { padding: 60px 0; background-color: white; }
        .scrollable-content { max-height: 400px; overflow-y: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; line-height: 1.8; }
        .scrollable-content h3 { color: #003366; margin: 20px 0 10px; }
        .faq-section { padding: 60px 0; background-color: #f9f9f9; }
        .faq-item { margin-bottom: 15px; border: 1px solid gold; border-radius: 5px; overflow: hidden; }
        .faq-question { padding: 15px 20px; background-color: #003366; color: green; cursor: pointer; font-weight: bold; position: relative; }
        .faq-question:after { content: '+'; position: absolute; right: 20px; font-size: 1.2rem; }
        .faq-answer { padding: 0 20px; max-height: 0; overflow: hidden; transition: max-height 0.3s ease; background-color: white; }
        .faq-item.active .faq-question:after { content: '-'; }
        .faq-item.active .faq-answer { max-height: 500px; padding: 20px; }
        .team-section { padding: 60px 0; background-color: white; }
        .team-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 40px; }
        .team-member { text-align: center; padding: 20px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); transition: transform 0.3s; }
        .team-member:hover { transform: translateY(-10px); }
        .member-image { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin: 0 auto 15px; border: 3px solid #003366; }
        .member-name { font-weight: bold; color: #003366; margin-bottom: 5px; }
        .member-role { color: #666; font-size: 0.9rem; }
        footer { background-color: #000; color: #fff; border-top: 4px solid #003366; padding: 50px 0 20px; }
        .footer-content { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
        .footer-section h3 { color: #cc0000; margin-bottom: 20px; font-size: 1.2rem; }
        .footer-links { list-style: none; }
        .footer-links a { color: #ddd; text-decoration: none; }
        .footer-bottom { text-align: center; padding: 20px 0; border-top: 1px solid #333; color: #aaa; }
    </style>
</head>
<body>
    <header>
        <div class='container'>
            <div class='header-top'>
                <div class='logo-container'>
                    <img src='https://media.tukenya.ac.ke/general/logo.png' alt='TU-K Logo' class='logo'>
                    <div class='logo-text'>Student Online Portal</div>
                </div>
                <nav>
                    <ul class='nav-links'>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}" class="active">About Us</a></li>
                        <li><a href="{{ route('registration.index') }}">Registration</a></li>
                        <li><a href="{{ route('schedule.index') }}">Events</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class='slideshow-section'>
        <div class='container'>
            <h2 class='section-title'>Sports at Technical University of Kenya</h2>
            <div class='slideshow-container'>
                <div class='mySlides fade'><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiRSSJSURnKD-vL_iakv0SOwRMlEHwkr7rdMzUPadK5G-3d4amqZ4LzbFT5R8Hgg8ySIU&usqp=CAU' alt='Football'></div>
                <div class='mySlides fade'><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLr8RnwV1Z8vysKPaKVGNTA37UTiiH_X8m1g&s' alt='Chess'></div>
                <div class='mySlides fade'><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcPRYK0Wac28uw3yRs24gkekdovEfLjJI5p8LfovnKMR102EgFLRHQvuPQOEj73qlXYnc&usqp=CAU' alt='Basketball'></div>
                <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
                <a class='next' onclick='plusSlides(1)'>&#10095;</a>
            </div>
            <div class='dot-container'>
                <span class='dot' onclick='currentSlide(1)'></span> 
                <span class='dot' onclick='currentSlide(2)'></span> 
                <span class='dot' onclick='currentSlide(3)'></span>
            </div>
        </div>
    </section>

    <section class='about-content'>
        <div class='container'>
            <h2 class='section-title'>The Importance of Sports at TU-K</h2>
            <div class='scrollable-content'>
                <h3>Why Sports Matter in Higher Education</h3>
                <p>At the Technical University of Kenya, we believe that sports play a crucial role in the holistic development of our students.</p>
                <h3>Physical and Mental Well-being</h3>
                <p>Regular participation in sports helps maintain physical health, reduces stress, and improves mental well-being.</p>
                <h3>Developing Leadership and Teamwork</h3>
                <p>Team sports teach students how to work collaboratively, communicate effectively, and develop leadership qualities.</p>
            </div>
        </div>
    </section>

    <section class='faq-section'>
        <div class='container'>
            <h2 class='section-title'>Frequently Asked Questions</h2>
            <div class='faq-container'>
                <div class='faq-item'>
                    <div class='faq-question'>How can I join a sports team at TU-K?</div>
                    <div class='faq-answer'><p>Visit the Sports Department office or attend tryouts at the beginning of each semester.</p></div>
                </div>
                <div class='faq-item'>
                    <div class='faq-question'>Are there sports scholarships available?</div>
                    <div class='faq-answer'><p>Yes, TU-K offers sports scholarships for exceptionally talented athletes.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class='team-section'>
        <div class='container'>
            <h2 class='section-title'>Website Development Team</h2>
            <div class='team-container'>
                <div class='team-member'>
                    <img src='https://images.unsplash.com/photo-1494790108755-2616b612b786?w=500' alt='Janet' class='member-image'>
                    <div class='member-name'>Janet Chepkurui</div>
                    <div class='member-role'>BTECHIT Student</div>
                </div>
                <div class='team-member'>
                    <img src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500' alt='Emmanuel' class='member-image'>
                    <div class='member-name'>Emmanuel Igathe</div>
                    <div class='member-role'>BTECHIT Student</div>
                </div>
                <div class='team-member'>
                    <img src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500' alt='Margaret' class='member-image'>
                    <div class='member-name'>Margaret Nduta</div>
                    <div class='member-role'>BTECHIT Student</div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class='container'>
            <div class='footer-bottom'>
                <p>&copy; 2025 Technical University of Kenya. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) { showSlides(slideIndex += n); }
        function currentSlide(n) { showSlides(slideIndex = n); }
        function showSlides(n) {
            let slides = document.getElementsByClassName('mySlides');
            let dots = document.getElementsByClassName('dot');
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (let i = 0; i < slides.length; i++) { slides[i].style.display = 'none'; }
            for (let i = 0; i < dots.length; i++) { dots[i].className = dots[i].className.replace(' active', ''); }
            slides[slideIndex-1].style.display = 'block';
            dots[slideIndex-1].className += ' active';
        }
        setInterval(() => plusSlides(1), 5000);
        
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.faq-item').forEach(item => {
                item.querySelector('.faq-question').addEventListener('click', () => {
                    document.querySelectorAll('.faq-item').forEach(i => { if(i !== item) i.classList.remove('active'); });
                    item.classList.toggle('active');
                });
            });
        });
    </script>
</body>
</html>
