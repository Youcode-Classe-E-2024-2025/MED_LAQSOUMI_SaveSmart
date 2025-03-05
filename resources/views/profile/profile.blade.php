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
                    <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]"
                         onclick="window.location.href='{{ route('dashboard', ['id' => $profile->id]) }}'">
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
                <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="addProfile()">
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
        
        <!-- Add Profile Modal -->
        <div id="profileModal" class="fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 pointer-events-none">
            <div class="bg-gray-800/90 border border-gray-700 rounded-xl p-8 max-w-md w-full shadow-2xl transform transition-all duration-300 scale-95">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Add New Profile</h3>
                    <button onclick="closeModal()" class="text-white/70 hover:text-amber-400 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('profile.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-white/70 mb-1">Profile Name</label>
                            <input type="text" id="name" name="name" required 
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400/50 text-white">
                        </div>
                        
                        <div>
                            <label for="description" class="block text-sm font-medium text-white/70 mb-1">Description (Optional)</label>
                            <textarea id="description" name="description" 
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400/50 text-white resize-none h-24"></textarea>
                        </div>
                        
                        <div>
                            <label for="pin" class="block text-sm font-medium text-white/70 mb-1">PIN Code (Default: 0000)</label>
                            <input type="text" id="pin" name="pin" pattern="[0-9]{4}" maxlength="4" value="0000" 
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400/50 text-white"
                                placeholder="Enter 4-digit PIN">
                            <p class="text-xs text-white/50 mt-1">Set a 4-digit PIN for profile access</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-white/70 mb-2">Profile Avatar</label>
                            <div class="flex flex-wrap gap-3 justify-center">
                                <label class="cursor-pointer">
                                    <input type="radio" name="avatar" value="avatar-green" class="sr-only" checked>
                                    <div class="w-12 h-12 rounded-full border-2 border-transparent hover:scale-110 transition-transform" 
                                         style="background-image: linear-gradient(to bottom right, #22c55e, #16a34a);"></div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="avatar" value="avatar-blue" class="sr-only">
                                    <div class="w-12 h-12 rounded-full border-2 border-transparent hover:scale-110 transition-transform" 
                                         style="background-image: linear-gradient(to bottom right, #3b82f6, #2563eb);"></div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="avatar" value="avatar-purple" class="sr-only">
                                    <div class="w-12 h-12 rounded-full border-2 border-transparent hover:scale-110 transition-transform" 
                                         style="background-image: linear-gradient(to bottom right, #a855f7, #7e22ce);"></div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="avatar" value="avatar-amber" class="sr-only">
                                    <div class="w-12 h-12 rounded-full border-2 border-transparent hover:scale-110 transition-transform" 
                                         style="background-image: linear-gradient(to bottom right, #f59e0b, #d97706);"></div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="avatar" value="avatar-pink" class="sr-only">
                                    <div class="w-12 h-12 rounded-full border-2 border-transparent hover:scale-110 transition-transform" 
                                         style="background-image: linear-gradient(to bottom right, #ec4899, #be185d);"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 pt-4">
                        <button type="button" onclick="closeModal()" class="w-1/2 py-3 px-4 bg-transparent border border-gray-600 hover:border-white/50 text-white/70 hover:text-white rounded-lg transition-all duration-200">
                            Cancel
                        </button>
                        <button type="submit" class="w-1/2 py-3 px-4 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-gray-900 font-medium rounded-lg transition-all duration-200">
                            Create Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Open modal
        function addProfile() {
            const modal = document.getElementById('profileModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            document.querySelector('#profileModal > div').classList.remove('scale-95');
            document.querySelector('#profileModal > div').classList.add('scale-100');
        }
        
        // Close modal
        function closeModal() {
            const modal = document.getElementById('profileModal');
            document.querySelector('#profileModal > div').classList.remove('scale-100');
            document.querySelector('#profileModal > div').classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 200);
        }
        
        // Highlight selected avatar
        document.querySelectorAll('input[name="avatar"]').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('input[name="avatar"]').forEach(radio => {
                    radio.parentElement.querySelector('div').classList.remove('border-amber-400');
                });
                
                if (this.checked) {
                    this.parentElement.querySelector('div').classList.add('border-amber-400');
                }
            });
        });
        
        // Initialize first avatar selection
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('input[name="avatar"]:checked')
                .parentElement.querySelector('div').classList.add('border-amber-400');
        });
    </script>
</body>
</html>