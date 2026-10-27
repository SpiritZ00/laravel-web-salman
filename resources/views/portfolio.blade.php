<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>your name - Brutalist Portfolio</title>
    <meta name="description" content="A unique brutalist portfolio template for professionals.">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('portfolio/style.css') }}">
</head>
<body>
    <!-- Custom Cursor -->
    <div id="custom-cursor"></div>

    <!-- Navigation Menu -->
    <nav class="fixed-nav">
        <ul>
            <li><a href="#hero">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#portfolio">PORTFOLIO</a></li>
            <li><a href="#skills">SKILLS</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li><a href="{{ route('projects.index') }}">ADMIN</a></li>
        </ul>
    </nav>

    <main>
        <!-- Hero Section -->
        <section id="hero" class="hero-section">
            <h1 class="glitch" data-text="Your Name">Salman Faris</h1>
            <p class="tagline">Developer | Designer | Creator</p>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section scroll-reveal">
            <div class="about-content">
                <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWFufGVufDB8MnwwfHx8MA%3D%3D" alt="Your Profile Picture" class="profile-image">
                <div class="bio-text">
                    <h2>ABOUT ME</h2>
                    <p>
                        Welcome to my brutalist digital space. I am a professional dedicated to creating impactful and unconventional solutions. With a focus on [Your Profession, e.g., web development, graphic design, content writing], I thrive in environments that challenge the status quo and demand bold, innovative approaches. My work is a testament to raw functionality and unpolished aesthetic, delivering experiences that are both robust and visually striking.
                    </p>
                    <p>
                        This portfolio showcases my journey and commitment to projects that push boundaries. Explore my work to see how I combine technical precision with a fearless design philosophy.
                    </p>
                    <!-- Edit bio text here. Use monospace font for a technical vibe. -->
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio-section">
            <h2>PORTFOLIO</h2>
            <div class="portfolio-grid">
                @forelse ($projects as $p)
                <div class="project-card scroll-reveal">
                    @if ($p->image_url)
                        <img src="{{ $p->image_url }}" alt="{{ $p->title }}">
                    @endif
                    <h3>{{ $p->title }}</h3>
                    <p>{{ $p->description }}</p>
                    @if ($p->project_url)
                        <a href="{{ $p->project_url }}" target="_blank" class="cta-link">VIEW PROJECT <i class="fas fa-arrow-right"></i></a>
                    @endif
                </div>
                @empty
                <p>Belum ada proyek.</p>
                @endforelse

            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="skills-section">
            <h2>SKILLS</h2>
            <div class="skills-grid">
                <span class="skill-badge scroll-reveal">HTML5</span>
                <span class="skill-badge scroll-reveal">CSS3</span>
                <span class="skill-badge scroll-reveal">JavaScript</span>
                <span class="skill-badge scroll-reveal">React.js</span>
                <span class="skill-badge scroll-reveal">UI/UX Design</span>
                <span class="skill-badge scroll-reveal">Copywriting</span>
                <span class="skill-badge scroll-reveal">Node.js</span>
                <span class="skill-badge scroll-reveal">Python</span>
                <!-- Add more skill badges here -->
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <h2>GET IN TOUCH</h2>
            <div class="contact-content">
                <form class="contact-form">
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">MESSAGE</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="cta-button">SEND MESSAGE</button>
                </form>
                <div class="social-links">
                    <a href="#" target="_blank" class="social-icon"><i class="fab fa-github"></i> GITHUB</a>
                    <a href="#" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i> LINKEDIN</a>
                    <a href="#" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> TWITTER</a>
                    <!-- Add more social links here -->
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; {{ date('Y') }} YOUR NAME. ALL RIGHTS RESERVED.</p>
        <p>Built with Raw Power and Brutal Intent.</p>
    </footer>

    <script src="{{ asset('portfolio/script.js') }}"></script>
</body>
</html>
