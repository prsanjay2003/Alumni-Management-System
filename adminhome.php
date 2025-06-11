<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Management System - Mount Carmel College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url("images/one.jpg") no-repeat center center fixed;
            background-size: cover;
            color: var(--dark-color);
            line-height: 1.6;
        }

        header {
            text-align: center;
            padding: 30px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h1 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0;
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        .logo {
            width: 90px;
            height: 90px;
            margin-right: 15px;
            object-fit: contain;
        }

        .college-name {
            font-weight: 700;
            color: var(--accent-color);
        }

        .tagline {
            width: 100%;
            font-size: 1rem;
            color: var(--primary-color);
            margin-top: 10px;
            font-style: italic;
        }

        nav {
            background-color: var(--primary-color);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        nav button {
            background-color: transparent;
            color: var(--light-color);
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            margin: 5px 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        nav button i {
            margin-right: 8px;
        }

        nav button:hover, nav button.active {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        #content-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            min-height: 500px;
        }

        .welcome-section {
            text-align: center;
            padding: 40px 20px;
        }

        .welcome-section h2 {
            color: var(--primary-color);
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .welcome-section p {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .stat-box {
            background-color: var(--light-color);
            padding: 25px;
            border-radius: 8px;
            width: 200px;
            text-align: center;
            margin: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-box:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--secondary-color);
            margin: 10px 0;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--dark-color);
        }

        footer {
            background-color: var(--primary-color);
            color: var(--light-color);
            text-align: center;
            padding: 25px 20px;
            margin-top: 50px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .social-links {
            margin: 20px 0;
        }

        .social-links a {
            color: var(--light-color);
            font-size: 1.5rem;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--secondary-color);
        }

        .copyright {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            h1 {
                flex-direction: column;
                font-size: 1.5rem;
            }
            
            .logo {
                margin-right: 0;
                margin-bottom: 10px;
            }
            
            nav button {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
            
            .stat-box {
                width: 150px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>
            <img src="claman/34.png" alt="Mount Carmel College Logo" class="logo">
            <div>
                <span class="college-name">Mount Carmel College (Autonomous),Bengaluru-560052</span><br>
                
    </div>
        </h1>
    </header>

    <nav>
        <div class="nav-container">
            <button type="button" onclick="loadContent('home')" class="active">
                <i class="fas fa-home"></i> Home
            </button>
            <button type="button" onclick="loadContent('registration')">
                <i class="fas fa-user-plus"></i> Registration
            </button>
            <button type="button" onclick="loadContent('higherstudies')">
                <i class="fas fa-graduation-cap"></i> Higher Studies
            </button>
            <button type="button" onclick="loadContent('working')">
                <i class="fas fa-briefcase"></i> Working Alumni
            </button>
            <button type="button" onclick="loadContent('certificate')">
                <i class="fas fa-certificate"></i> Certificate Courses
            </button>
            <button type="button" onclick="loadContent('logout')" style="background-color: var(--accent-color);">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
    </nav>

    <div id="content-container">
        <div class="welcome-section">
            <h2>Welcome to Mount Carmel College Alumni Portal</h2>
            <p>Stay connected with your alma mater and fellow alumni. Explore opportunities, share your achievements, and be part of our growing network of successful professionals.</p>
            
            <div class="stats-container">
                <div class="stat-box">
                    <i class="fas fa-users fa-3x"></i>
                    <div class="stat-number" id="alumni-count">5,000+</div>
                    <div class="stat-label">Alumni Members</div>
                </div>
                <div class="stat-box">
                    <i class="fas fa-globe fa-3x"></i>
                    <div class="stat-number" id="countries-count">30+</div>
                    <div class="stat-label">Countries</div>
                </div>
                <div class="stat-box">
                    <i class="fas fa-building fa-3x"></i>
                    <div class="stat-number" id="companies-count">200+</div>
                    <div class="stat-label">Companies</div>
                </div>
                <div class="stat-box">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                    <div class="stat-number" id="graduates-count">1,000+</div>
                    <div class="stat-label">Post Graduates</div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="social-links">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="contact-info">
                <p>Mount Carmel College, Cathedral Road, Tirupattur-635601 | Phone: +91 1234567890 | Email: alumni@mountcarmel.edu</p>
            </div>
            <div class="copyright">
                &copy; 2023 Mount Carmel College Alumni Association. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script>
        // Function to load content dynamically
        function loadContent(page) {
            // Remove active class from all buttons
            document.querySelectorAll('nav button').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            event.target.classList.add('active');
            
            // Simple content loading (in a real app, you would fetch content from server)
            const contentContainer = document.getElementById('content-container');
            
            switch(page) {
                case 'home':
                    contentContainer.innerHTML = `
                        <div class="welcome-section">
                            <h2>Welcome to Mount Carmel College Alumni Portal</h2>
                            <p>Stay connected with your alma mater and fellow alumni. Explore opportunities, share your achievements, and be part of our growing network of successful professionals.</p>
                            
                            <div class="stats-container">
                                <div class="stat-box">
                                    <i class="fas fa-users fa-3x"></i>
                                    <div class="stat-number">5,000+</div>
                                    <div class="stat-label">Alumni Members</div>
                                </div>
                                <div class="stat-box">
                                    <i class="fas fa-globe fa-3x"></i>
                                    <div class="stat-number">30+</div>
                                    <div class="stat-label">Countries</div>
                                </div>
                                <div class="stat-box">
                                    <i class="fas fa-building fa-3x"></i>
                                    <div class="stat-number">200+</div>
                                    <div class="stat-label">Companies</div>
                                </div>
                                <div class="stat-box">
                                    <i class="fas fa-graduation-cap fa-3x"></i>
                                    <div class="stat-number">1,000+</div>
                                    <div class="stat-label">Post Graduates</div>
                                </div>
                            </div>
                        </div>
                    `;
                    break;
                    
                case 'registration':
                    // In a real application, you would fetch this from registration.php
                    contentContainer.innerHTML = `
                        <div class="form-section">
                            <!-- Form would be loaded here -->
                            <iframe src="adminform.php" style="width:100%; height:600px; border:none;"></iframe>
                        </div>
                    `;
                    break;
                    
                case 'higherstudies':
                    // In a real application, you would fetch this from higherstudies.php
                    contentContainer.innerHTML = `
                        <div class="higher-studies-section">
                          
                            <!-- Content would be loaded here -->
                            <iframe src="higherstudies.php" style="width:100%; height:600px; border:none;"></iframe>
                        </div>
                    `;
                    break;
                    
                case 'working':
                    // In a real application, you would fetch this from working.php
                    contentContainer.innerHTML = `
                        <div class="working-section">
                           
                            <iframe src="working.php" style="width:100%; height:600px; border:none;"></iframe>
                        </div>
                    `;
                    break;
                    
                case 'certificate':
                    // In a real application, you would fetch this from cc.php
                    contentContainer.innerHTML = `
                        <div class="certificate-section">
                  
                            <!-- Content would be loaded here -->
                            <iframe src="cc.php" style="width:100%; height:600px; border:none;"></iframe>
                        </div>
                    `;
                    break;
                    
                case 'logout':
                    window.location.href = 'admin1.php';
                    break;
            }
        }

        // Animate stats on page load
        function animateStats() {
            const stats = [
                { id: 'alumni-count', target: 7500, duration: 2000 },
                { id: 'countries-count', target: 42, duration: 1500 },
                { id: 'companies-count', target: 350, duration: 1800 },
                { id: 'graduates-count', target: 1800, duration: 2200 }
            ];
            
            stats.forEach(stat => {
                const element = document.getElementById(stat.id);
                if (element) {
                    const start = 0;
                    const increment = stat.target / (stat.duration / 16);
                    let current = start;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= stat.target) {
                            clearInterval(timer);
                            element.textContent = stat.target + '+';
                        } else {
                            element.textContent = Math.floor(current) + '+';
                        }
                    }, 16);
                }
            });
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', () => {
            animateStats();
        });
    </script>
</body>
</html>