<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        gradient: 'gradient 15s ease infinite',
                    },
                    keyframes: {
                        gradient: {
                            '0%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                            '100%': { backgroundPosition: '0% 50%' },
                        },
                    },
                },
            },
        }
    </script>
</head>

<body class="font-poppins text-white min-h-screen m-0 flex flex-col bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 bg-[length:200%_200%] animate-gradient">
    <div class="backdrop-blur-md bg-black/30 min-h-screen flex flex-col">
        <!-- Header -->
        <header class="p-6 bg-black/60 backdrop-blur-md flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fas fa-wallet text-amber-400 text-2xl"></i>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent m-0">SaveSmart</h1>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('login.user') }}" method="GET" class="hidden md:flex gap-4">
                    @csrf
                    <button class="bg-transparent border-2 border-amber-400 text-amber-400 py-2 px-6 rounded-md font-medium cursor-pointer transition-all duration-300 hover:bg-amber-400 hover:text-gray-900">Login</button>
                    <button class="md:hidden bg-transparent border-none text-white text-2xl cursor-pointer" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col p-0">
            <!-- Hero Section -->
            <section class="flex flex-col items-center text-center p-16 bg-black/20">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 max-w-4xl">Smart financial planning for <span class="text-amber-400">everyone</span></h1>
                <p class="text-xl text-white/80 mb-10 max-w-2xl leading-relaxed">SaveSmart helps you track expenses, set budgets, and achieve your savings goals with powerful yet simple tools.</p>
                
                <div class="flex flex-col md:flex-row gap-4 mb-12 md:w-auto w-full max-w-xs">
                    <form action="{{ route('login.user') }}" method="GET" class="hidden md:flex gap-4">
                        @csrf
                    <button class="bg-gradient-to-r from-amber-400 to-amber-500 text-gray-900 border-none py-3.5 px-8 rounded-lg font-semibold text-base cursor-pointer transition-all duration-300 hover:transform hover:-translate-y-1 hover:shadow-lg hover:shadow-amber-400/30">Get Started — It's Free</button>
                    <button class="bg-white/10 text-white border-none py-3.5 px-8 rounded-lg font-medium text-base cursor-pointer transition-all duration-300 hover:bg-white/20 hover:transform hover:-translate-y-1">How It Works</button>
                    </form>
                </div>
            </section>
            <!-- Testimonials Section -->
            <section class="py-16 px-8 flex flex-col items-center bg-black/20">
                <h2 class="text-4xl font-semibold text-center mb-12">What our users say</h2>
                
                <div class="flex flex-wrap justify-center gap-8 max-w-6xl">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-800/70 rounded-xl p-8 w-full max-w-sm transition-all duration-300 border border-white/10 hover:transform hover:scale-[1.03] hover:border-amber-400/30">
                        <p class="text-lg leading-relaxed mb-6 relative pl-6">
                            <span class="absolute left-0 top-[-0.5rem] text-5xl text-amber-400/50">"</span>
                            SaveSmart completely changed how I manage my money. I've saved more in the last 6 months than I did in the previous 2 years!
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-[50px] h-[50px] rounded-lg flex items-center justify-center font-bold text-gray-900 bg-gradient-to-br from-green-500 to-green-600">
                                MJ
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold">Michael Johnson</div>
                                <div class="text-sm text-white/70">Product Designer</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-gray-800/70 rounded-xl p-8 w-full max-w-sm transition-all duration-300 border border-white/10 hover:transform hover:scale-[1.03] hover:border-amber-400/30">
                        <p class="text-lg leading-relaxed mb-6 relative pl-6">
                            <span class="absolute left-0 top-[-0.5rem] text-5xl text-amber-400/50">"</span>
                            As someone who always struggled with budgeting, SaveSmart made it simple and almost fun. The interface is beautiful and intuitive.
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-[50px] h-[50px] rounded-lg flex items-center justify-center font-bold text-gray-900 bg-gradient-to-br from-blue-500 to-blue-600">
                                SW
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold">Sarah Williams</div>
                                <div class="text-sm text-white/70">Marketing Manager</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="bg-gray-800/70 rounded-xl p-8 w-full max-w-sm transition-all duration-300 border border-white/10 hover:transform hover:scale-[1.03] hover:border-amber-400/30">
                        <p class="text-lg leading-relaxed mb-6 relative pl-6">
                            <span class="absolute left-0 top-[-0.5rem] text-5xl text-amber-400/50">"</span>
                            The family account feature is a game-changer for us. Now my partner and I can coordinate our finances seamlessly.
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-[50px] h-[50px] rounded-lg flex items-center justify-center font-bold text-gray-900 bg-gradient-to-br from-purple-500 to-purple-600">
                                DT
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold">David Thompson</div>
                                <div class="text-sm text-white/70">Software Engineer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="p-8 text-center text-sm text-white/50 bg-black/40 backdrop-blur-md">
            <div class="flex justify-center gap-4 mb-6">
                <a href="#" class="text-white/70 text-xl transition-all duration-300 hover:text-amber-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white/70 text-xl transition-all duration-300 hover:text-amber-400"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white/70 text-xl transition-all duration-300 hover:text-amber-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white/70 text-xl transition-all duration-300 hover:text-amber-400"><i class="fab fa-linkedin"></i></a>
            </div>
            
            <p>&copy; 2025 SaveSmart. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Mobile menu functionality
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            const navLinks = document.querySelector('header div:nth-child(2)');
            navLinks.classList.toggle('hidden');
            navLinks.classList.toggle('flex');
            navLinks.classList.toggle('flex-col');
            navLinks.classList.toggle('absolute');
            navLinks.classList.toggle('top-20');
            navLinks.classList.toggle('right-0');
            navLinks.classList.toggle('left-0');
            navLinks.classList.toggle('bg-black/90');
            navLinks.classList.toggle('p-6');
            navLinks.classList.toggle('z-50');
        });
    </script>
</body>
</html>