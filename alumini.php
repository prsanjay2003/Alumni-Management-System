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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("images/one.jpg") no-repeat center center fixed;
            background-size: cover;
            color: white;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            text-align: center;
            padding: 30px 20px;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            object-fit: contain;
        }

        .college-info {
            text-align: center;
        }

        .college-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--light-color);
        }

        .system-name {
            font-size: 1.2rem;
            color: var(--secondary-color);
            font-weight: 500;
        }

        nav {
            background-color: rgba(255, 255, 255, 0.9);
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
            gap: 10px;
        }

        nav button {
            background-color: transparent;
            color: var(--primary-color);
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav button i {
            margin-right: 8px;
        }

        nav button:hover, nav button.active {
            background-color: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
        }

        #content-container {
            flex: 1;
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            color: var(--dark-color);
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
            color: var(--dark-color);
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

        iframe {
            width: 100%;
            height: 600px;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: var(--light-color);
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .logo-container {
                flex-direction: column;
            }
            
            .logo {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .college-name {
                font-size: 1.5rem;
            }
            
            .nav-container {
                flex-direction: column;
                align-items: center;
            }
            
            nav button {
                width: 80%;
                justify-content: center;
            }
            
            .stat-box {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="claman/34.png" alt="Mount Carmel College Logo" class="logo">
            <div class="college-info">
                <div class="college-name">Mount Carmel College (Autonomous)</div>
                <div>Bengaluru - 560052</div>
                <div class="system-name">Alumni Management System</div>
            </div>
        </div>
    </header>

    <nav>
        <div class="nav-container">
            <button type="button" onclick="loadContent('home')" class="active">
                <i class="fas fa-home"></i> Home
            </button>
            <button type="button" onclick="loadContent('registration')">
                <i class="fas fa-user-plus"></i> Registration
            </button>
            <button type="button" onclick="location.href='index.php'" style="background-color: var(--accent-color); color: white;">
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
        &copy; 2023 Mount Carmel College Alumni Association. All Rights Reserved.
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
                    animateStats();
                    break;
                    
                case 'registration':
                    contentContainer.innerHTML = `
                        <div class="form-section">
                            <h2><i class="fas fa-user-plus"></i> Alumni Registration</h2>
                            <p>Register to join our alumni network and access exclusive benefits.</p>
                            <iframe src="adminform.php" title="Registration Form"></iframe>
                        </div>
                    `;
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