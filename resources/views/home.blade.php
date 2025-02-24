<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Smart Financial Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 animate-gradient text-gray-900 min-h-screen">
    <div class="backdrop-blur-sm bg-black/30 min-h-screen">
        <header class="w-full py-6 bg-black/40 backdrop-blur-md fixed top-0 z-50">
            <nav class="container mx-auto px-4 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-wallet text-yellow-400 text-2xl"></i>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                        SaveSmart
                    </h1>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">About</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Features</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Contact</a>
                </div>
            </nav>
        </header>

        <main class="container mx-auto px-4 pt-24 pb-12 min-h-screen flex items-center justify-center">
            <div class="w-full max-w-md relative">
                <!-- Login Form -->
                <div id="login-container" class="transform transition-all duration-500 ease-in-out opacity-100 scale-100">
                    <form action="" method="POST" class="bg-gray-800/50 backdrop-blur-xl p-8 rounded-2xl shadow-2xl border border-gray-700/50">
                        @csrf
                        <h2 class="text-2xl font-bold mb-6 text-center bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                            Welcome Back
                        </h2>
                        <div class="space-y-6">
                            <div class="group">
                                <label for="login-email" class="block mb-2 text-sm text-gray-300">
                                    <i class="fas fa-envelope mr-2 text-yellow-400"></i>Email
                                </label>
                                <input type="email" id="login-email" name="email"
                                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your email">
                            </div>
                            <div class="group">
                                <label for="login-password" class="block mb-2 text-sm text-gray-300">
                                    <i class="fas fa-lock mr-2 text-yellow-400"></i>Password
                                </label>
                                <input type="password" id="login-password" name="password"
                                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your password">
                            </div>
                            <button type="submit" class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black font-semibold rounded-lg hover:from-yellow-500 hover:to-yellow-600 transform hover:scale-[1.02] transition-all duration-300">
                                Login
                            </button>
                            <div class="text-center">
                                <a href="#" onclick="toggleForm()" class="text-sm text-yellow-400 hover:text-yellow-300 transition-colors duration-300">
                                    Don't have an account? Register
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Register Form -->
                <div id="register-container" class="hidden transform transition-all duration-500 ease-in-out absolute top-0 left-0 w-full opacity-0 scale-0">
                    <form action="{{ route('create.user') }}" method="POST" class="bg-gray-800/50 backdrop-blur-xl p-8 rounded-2xl shadow-2xl border border-gray-700/50">
                        @csrf
                        <h2 class="text-2xl font-bold mb-6 text-center bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                            Create Account
                        </h2>
                        <div class="space-y-6">
                            <div class="group">
                                <label for="register-username" class="block mb-2 text-sm text-gray-300">
                                    <i class="fas fa-user mr-2 text-yellow-400"></i>Username
                                </label>
                                <input type="text" id="register-username" name="username"
                                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your username">
                            </div>
                            <div class="group">
                                <label for="register-name" class="block mb-2 text-sm text-gray-300">
                                    <i class="fas fa-user mr-2 text-yellow-400"></i>Name
                                </label>
                                <input type="text" id="register-name" name="name"
                                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your name">
                            </div>
                            <div class="group">
                                <label for="register-email" class="block mb-2 text-sm text-gray-300">
                                    <i class="fas fa-envelope mr-2 text-yellow-400"></i>Email
                                </label>
                                <input type="email" id="register-email" name="email"
                                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your email">
                            </div>
                            <div class="group">
                                <label for="register-password" class="block mb-2 text-sm text-gray-300">
                                    <i class="fas fa-lock mr-2 text-yellow-400"></i>Password
                                </label>
                                <input type="password" id="register-password" name="password"
                                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your password">
                            </div>
                            <button type="submit" class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black font-semibold rounded-lg hover:from-yellow-500 hover:to-yellow-600 transform hover:scale-[1.02] transition-all duration-300">
                                Register
                            </button>
                            <div class="text-center">
                                <a href="#" onclick="toggleForm()" class="text-sm text-yellow-400 hover:text-yellow-300 transition-colors duration-300">
                                    Already have an account? Login
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer class="w-full py-6 bg-black/40 backdrop-blur-md">
            <div class="container mx-auto px-4 text-center text-sm text-gray-400">
                <p>&copy; 2025 SaveSmart. All rights reserved.</p>
                <div class="mt-4 space-x-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleForm() {
            const loginContainer = document.getElementById('login-container');
            const registerContainer = document.getElementById('register-container');
            
            loginContainer.classList.toggle('opacity-100');
            loginContainer.classList.toggle('opacity-0');
            loginContainer.classList.toggle('scale-100');
            loginContainer.classList.toggle('scale-0');
            
            registerContainer.classList.toggle('hidden');
            
            setTimeout(() => {
                registerContainer.classList.toggle('opacity-100');
                registerContainer.classList.toggle('opacity-0');
                registerContainer.classList.toggle('scale-100');
                registerContainer.classList.toggle('scale-0');
            }, 50);
        }
    </script>
</body>
</html>