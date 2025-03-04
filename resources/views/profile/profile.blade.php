<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Choose Your Profile</title>
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
            <div>
                <form action="{{ route('logout.user') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="px-4 py-2 text-red-400 hover:text-red-300 flex items-center gap-2 transition-colors duration-200 border border-transparent hover:border-red-500/30 rounded-md">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col justify-center items-center p-8 text-center">
            <h2 class="text-4xl mb-8">Who's managing finances today?</h2>

            <div class="flex flex-wrap justify-center gap-8 max-w-[900px] mx-auto">
                <!-- Profile Cards -->
                @foreach($profiles as $profile)
                    <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="window.location.href='{{ route('dashboard') }}'">
                        <div class="w-[120px] h-[120px] rounded-xl flex items-center justify-center text-4xl font-bold text-gray-900 border-4 border-white/20 transition-all duration-300 ease-in-out overflow-hidden relative hover:border-amber-400 hover:shadow-[0_0_20px_rgba(251,191,36,0.5)]"
                             style="background-image: linear-gradient(to bottom right,
                                @if($profile->avatar == 'avatar-green') #22c55e, #16a34a
                                @elseif($profile->avatar == 'avatar-blue') #3b82f6, #2563eb
                                @elseif($profile->avatar == 'avatar-purple') #a855f7, #7e22ce
                                @elseif($profile->avatar == 'avatar-amber') #f59e0b, #d97706
                                @elseif($profile->avatar == 'avatar-pink') #ec4899, #be185d
                                @else #22c55e, #16a34a
                                @endif );">
                            <div class="w-full h-full flex items-center justify-center">
                                {{ substr($profile->name, 0, 1) }}
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-black/70 text-amber-400 text-xs py-0.5">
                                {{ $profile->description ?? 'Profile' }}
                            </div>
                        </div>
                        <div class="text-xl font-medium transition-all duration-300 ease-in-out hover:text-amber-400">
                            {{ $profile->name }}
                        </div>
                    </div>
                @endforeach

                <!-- Add Profile Button -->
                <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="window.location.href='{{ route('profile.create') }}'">
                    <div class="w-[120px] h-[120px] rounded-xl flex items-center justify-center text-4xl font-bold text-gray-900 border-4 border-dashed border-white/30 transition-all duration-300 ease-in-out overflow-hidden relative bg-slate-500/30">
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-plus text-4xl text-white/50 hover:text-amber-400 transition-all duration-300"></i>
                        </div>
                    </div>
                    <div class="text-xl font-medium transition-all duration-300 ease-in-out hover:text-amber-400">Add Profile</div>
                </div>
            </div>
            
            <button class="mt-12 py-3 px-8 bg-transparent border-2 border-white/50 text-white rounded text-base cursor-pointer transition-all duration-300 ease-in-out hover:border-amber-400 hover:text-amber-400" onclick="manageProfiles()">
                Manage Profiles
            </button>
        </main>

        <!-- Footer -->
        <footer class="p-6 text-center text-sm text-white/50 bg-black/40 backdrop-blur-md">
            <p>&copy; 2025 SaveSmart. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>