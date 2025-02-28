<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(to bottom right, #111827, #1f2937, #111827);
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
            color: white;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .backdrop {
            backdrop-filter: blur(12px);
            background-color: rgba(0, 0, 0, 0.3);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            padding: 1.5rem;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(12px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .logo i {
            color: #FBBF24;
            font-size: 1.5rem;
        }
        .logo h1 {
            font-size: 1.5rem;
            font-weight: bold;
            background-image: linear-gradient(to right, #FBBF24, #FDE68A);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin: 0;
        }
        .nav-links {
            display: flex;
            gap: 1.5rem;
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #FBBF24;
        }
        .login-btn {
            background-color: transparent;
            border: 2px solid #FBBF24;
            color: #FBBF24;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            background-color: #FBBF24;
            color: #111827;
        }
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 0;
        }
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 4rem 2rem;
            background-color: rgba(0, 0, 0, 0.2);
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin: 0 0 1.5rem 0;
            max-width: 800px;
        }
        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0 0 2.5rem 0;
            max-width: 600px;
            line-height: 1.6;
        }
        .highlight {
            color: #FBBF24;
        }
        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        .primary-btn {
            background-image: linear-gradient(to right, #FBBF24, #F59E0B);
            color: #111827;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .primary-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(251, 191, 36, 0.3);
        }
        .secondary-btn {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .secondary-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }
        .features-section {
            padding: 4rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 3rem;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            width: 100%;
        }
        .feature-card {
            background-color: rgba(31, 41, 55, 0.7);
            border-radius: 12px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(251, 191, 36, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            background-image: linear-gradient(to bottom right, #FBBF24, #F59E0B);
            color: #111827;
        }
        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 1rem 0;
        }
        .feature-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin: 0;
        }
        .testimonials-section {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 4rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .testimonials-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            max-width: 1200px;
        }
        .testimonial-card {
            background-color: rgba(31, 41, 55, 0.7);
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 350px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .testimonial-card:hover {
            transform: scale(1.03);
            border-color: rgba(251, 191, 36, 0.3);
        }
        .quote {
            font-size: 1.125rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 1.5rem;
        }
        .quote::before {
            content: """;
            position: absolute;
            left: 0;
            top: -0.5rem;
            font-size: 3rem;
            color: #FBBF24;
            opacity: 0.5;
            line-height: 1;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #111827;
        }
        .user-details {
            display: flex;
            flex-direction: column;
        }
        .user-name {
            font-weight: 600;
        }
        .user-title {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
        }
        .cta-section {
            padding: 6rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        footer {
            padding: 2rem;
            text-align: center;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.5);
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .footer-link:hover {
            color: #FBBF24;
        }
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .social-link {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }
        .social-link:hover {
            color: #FBBF24;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .mobile-menu-btn {
                display: block;
            }
            .hero-title {
                font-size: 2.25rem;
            }
            .hero-subtitle {
                font-size: 1rem;
            }
            .cta-buttons {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }
            .primary-btn, .secondary-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="backdrop">
        <!-- Header -->
        <header>
            <div class="logo">
                <i class="fas fa-wallet"></i>
                <h1>SaveSmart</h1>
            </div>
            <div class="nav-links">
                <a href="#" class="nav-link">Features</a>
                <a href="#" class="nav-link">Pricing</a>
                <a href="#" class="nav-link">About</a>
                <a href="#" class="nav-link">Contact</a>
            </div>
            <button class="login-btn">Login</button>
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <h1 class="hero-title">Smart financial planning for <span class="highlight">everyone</span></h1>
                <p class="hero-subtitle">SaveSmart helps you track expenses, set budgets, and achieve your savings goals with powerful yet simple tools.</p>
                
                <div class="cta-buttons">
                    <button class="primary-btn">Get Started — It's Free</button>
                    <button class="secondary-btn">How It Works</button>
                </div>
                
                <img src="/api/placeholder/600/340" alt="SaveSmart app preview" style="max-width: 100%; border-radius: 12px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);">
            </section>
            
            <!-- Features Section -->
            <section class="features-section">
                <h2 class="section-title">Why choose <span class="highlight">SaveSmart</span>?</h2>
                
                <div class="features-grid">
                    <!-- Feature 1 -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Easy Expense Tracking</h3>
                        <p class="feature-description">Automatically categorize your expenses and get insights on your spending habits with beautiful visualizations.</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <h3 class="feature-title">Smart Saving Goals</h3>
                        <p class="feature-description">Set personalized saving goals and track your progress. SaveSmart helps you stay motivated and on target.</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3 class="feature-title">Bank-Level Security</h3>
                        <p class="feature-description">Your financial data is protected with industry-leading encryption and security practices.</p>
                    </div>
                </div>
            </section>
            
            <!-- Testimonials Section -->
            <section class="testimonials-section">
                <h2 class="section-title">What our users say</h2>
                
                <div class="testimonials-container">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card">
                        <p class="quote">SaveSmart completely changed how I manage my money. I've saved more in the last 6 months than I did in the previous 2 years!</p>
                        <div class="user-info">
                            <div class="avatar" style="background-image: linear-gradient(to bottom right, #22c55e, #16a34a);">
                                MJ
                            </div>
                            <div class="user-details">
                                <div class="user-name">Michael Johnson</div>
                                <div class="user-title">Product Designer</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-card">
                        <p class="quote">As someone who always struggled with budgeting, SaveSmart made it simple and almost fun. The interface is beautiful and intuitive.</p>
                        <div class="user-info">
                            <div class="avatar" style="background-image: linear-gradient(to bottom right, #3b82f6, #2563eb);">
                                SW
                            </div>
                            <div class="user-details">
                                <div class="user-name">Sarah Williams</div>
                                <div class="user-title">Marketing Manager</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-card">
                        <p class="quote">The family account feature is a game-changer for us. Now my partner and I can coordinate our finances seamlessly.</p>
                        <div class="user-info">
                            <div class="avatar" style="background-image: linear-gradient(to bottom right, #a855f7, #9333ea);">
                                DT
                            </div>
                            <div class="user-details">
                                <div class="user-name">David Thompson</div>
                                <div class="user-title">Software Engineer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- CTA Section -->
            <section class="cta-section">
                <h2 class="section-title">Ready to take control of your finances?</h2>
                <p class="hero-subtitle">Join thousands of users who have transformed their financial lives with SaveSmart.</p>
                
                <div class="cta-buttons">
                    <button class="primary-btn">Create Free Account</button>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer>
            <div class="footer-links">
                <a href="#" class="footer-link">Features</a>
                <a href="#" class="footer-link">Pricing</a>
                <a href="#" class="footer-link">About</a>
                <a href="#" class="footer-link">Contact</a>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
            </div>
            
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
            </div>
            
            <p>&copy; 2025 SaveSmart. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Mobile menu functionality
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });
    </script>
</body>
</html>