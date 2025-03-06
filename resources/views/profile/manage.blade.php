<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Manage Profiles</title>
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
                <a href="" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                    <i class="fas fa-wallet text-amber-400 text-2xl"></i>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent m-0">SaveSmart</h1>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route("profiles") }}" class="px-4 py-2 text-white/80 hover:text-white flex items-center gap-2 transition-colors duration-200">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
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
        <main class="flex-1 flex flex-col items-center p-8">
            <h2 class="text-4xl mb-8 text-center">Manage Profiles</h2>

            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500/50 text-green-300 px-4 py-3 rounded mb-6 max-w-3xl w-full flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-300 hover:text-green-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded mb-6 max-w-3xl w-full flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-red-300 hover:text-red-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            <div class="max-w-3xl w-full bg-black/30 rounded-lg backdrop-blur-md border border-gray-700/50 overflow-hidden">
                <div class="p-4 bg-black/50 border-b border-gray-700/50 flex justify-between items-center">
                    <h3 class="text-xl font-medium text-amber-400">Your Profiles</h3>
                    <button onclick="addProfile()" class="flex items-center gap-2 text-sm bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 px-3 py-1.5 rounded border border-amber-500/20 transition-colors">
                        <i class="fas fa-plus"></i> Add Profile
                    </button>
                </div>
                
                <div class="divide-y divide-gray-700/50">
                    @forelse($profiles as $profile)
                        <div class="p-4 hover:bg-white/5 transition-colors flex items-center">
                            <!-- Avatar -->
                            <div class="w-[60px] h-[60px] rounded-lg flex items-center justify-center text-2xl font-bold text-gray-900 border-2 border-white/20 overflow-hidden relative mr-4"
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
                            </div>
                            
                            <!-- Profile Info -->
                            <div class="flex-1">
                                <h4 class="text-lg font-medium">{{ $profile->name }}</h4>
                                <p class="text-sm text-white/50">{{ $profile->description ?? 'No description' }}</p>
                            </div>
                            
                            <!-- Actions -->
                            <div class="flex items-center gap-3">
                                <button onclick="editProfile('{{ $profile->id }}', '{{ $profile->name }}', '{{ $profile->description ?? '' }}', '{{ $profile->pin }}', '{{ $profile->avatar }}')" 
                                        class="w-9 h-9 rounded flex items-center justify-center text-white/70 hover:text-amber-400 bg-white/5 hover:bg-amber-500/10 transition-colors">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="confirmDelete('{{ $profile->id }}', '{{ $profile->name }}')" 
                                        class="w-9 h-9 rounded flex items-center justify-center text-white/70 hover:text-red-400 bg-white/5 hover:bg-red-500/10 transition-colors">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-white/60">
                            <i class="fas fa-user-slash text-3xl mb-2"></i>
                            <p>No profiles found. Create one to get started!</p>
                            <button onclick="addProfile()" class="mt-4 inline-flex items-center gap-2 bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 px-4 py-2 rounded border border-amber-500/20 transition-colors">
                                <i class="fas fa-plus"></i> Add Profile
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
            
            <div class="mt-6 text-center text-sm text-white/50">
                <p>Need help managing your profiles? <a href="#" class="text-amber-400 hover:underline">View FAQ</a></p>
            </div>
        </main>

        <!-- Footer -->
        <footer class="p-6 text-center text-sm text-white/50 bg-black/40 backdrop-blur-md">
            <p>&copy; 2025 SaveSmart. All rights reserved.</p>
        </footer>
        
        <!-- Add Profile Modal -->
        <div id="profileModal" class="fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 pointer-events-none">
            <div class="bg-gray-800/90 border border-gray-700 rounded-xl p-8 max-w-md w-full shadow-2xl transform transition-all duration-300 scale-95">
                <div class="flex justify-between items-center mb-6">
                    <h3 id="modalTitle" class="text-2xl font-semibold bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Add New Profile</h3>
                    <button onclick="closeModal()" class="text-white/70 hover:text-amber-400 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form id="profileForm" action="{{ route('profile.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div id="methodField">
                        <!-- Method field will be injected here for edit actions -->
                    </div>
                    
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
                            <label for="pin" class="block text-sm font-medium text-white/70 mb-1">PIN Code</label>
                            <input type="text" id="pin" name="pin" pattern="[0-9]{4}" maxlength="4"
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
                        <button type="submit" id="submitBtn" class="w-1/2 py-3 px-4 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-gray-900 font-medium rounded-lg transition-all duration-200">
                            Create Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 pointer-events-none">
            <div class="bg-gray-800/90 border border-gray-700 rounded-xl p-8 max-w-md w-full shadow-2xl transform transition-all duration-300 scale-95">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-red-400">Delete Profile</h3>
                    <button onclick="closeDeleteModal()" class="text-white/70 hover:text-red-400 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-500/10 border border-red-500/20 rounded-full text-red-400 mb-4">
                        <i class="fas fa-exclamation-triangle text-2xl"></i>
                    </div>
                    <p class="text-lg mb-2">Are you sure you want to delete this profile?</p>
                    <p id="deleteProfileName" class="font-semibold text-xl">Profile Name</p>
                    <p class="text-white/50 text-sm mt-2">This action cannot be undone.</p>
                </div>
                
                <form id="deleteForm" action="{{ route('profile.delete', ['id' => $profile->id]) }}" method="POST" class="flex gap-4">
                    @csrf
                    @method('POST')
                    <button type="button" onclick="closeDeleteModal()" class="w-1/2 py-3 px-4 bg-transparent border border-gray-600 hover:border-white/50 text-white/70 hover:text-white rounded-lg transition-all duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="w-1/2 py-3 px-4 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-400 hover:to-red-500 text-white font-medium rounded-lg transition-all duration-200">
                        Delete Profile
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Open add/edit modal
        function addProfile() {
            // Reset form for new profile
            document.getElementById('profileForm').action = "{{ route('profile.store') }}";
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('modalTitle').textContent = 'Add New Profile';
            document.getElementById('submitBtn').textContent = 'Create Profile';
            
            // Clear form fields
            document.getElementById('name').value = '';
            document.getElementById('description').value = '';
            document.getElementById('pin').value = '0000';
            document.querySelector('input[name="avatar"][value="avatar-green"]').checked = true;
            
            // Highlight selected avatar
            document.querySelectorAll('input[name="avatar"]').forEach(radio => {
                radio.parentElement.querySelector('div').classList.remove('border-amber-400');
            });
            document.querySelector('input[name="avatar"]:checked')
                .parentElement.querySelector('div').classList.add('border-amber-400');
            
            // Show modal
            const modal = document.getElementById('profileModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            document.querySelector('#profileModal > div').classList.remove('scale-95');
            document.querySelector('#profileModal > div').classList.add('scale-100');
        }
        
        // Edit profile
        function editProfile(id, name, description, pin, avatar) {
            // Set form for editing
            document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="POST">';
            document.getElementById('modalTitle').textContent = 'Edit Profile';
            document.getElementById('submitBtn').textContent = 'Save Changes';
            
            // Set form values
            document.getElementById('name').value = name;
            document.getElementById('description').value = description || '';
            document.getElementById('pin').value = pin;
            
            // Select the correct avatar
            document.querySelector('input[name="avatar"][value="' + avatar + '"]').checked = true;
            
            // Highlight selected avatar
            document.querySelectorAll('input[name="avatar"]').forEach(radio => {
                radio.parentElement.querySelector('div').classList.remove('border-amber-400');
            });
            document.querySelector('input[name="avatar"]:checked')
                .parentElement.querySelector('div').classList.add('border-amber-400');
            
            // Show modal
            const modal = document.getElementById('profileModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            document.querySelector('#profileModal > div').classList.remove('scale-95');
            document.querySelector('#profileModal > div').classList.add('scale-100');
        }
        
        // Confirm delete
        function confirmDelete() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            document.querySelector('#deleteModal > div').classList.remove('scale-95');
            document.querySelector('#deleteModal > div').classList.add('scale-100');
        }
        
        // Close modals
        function closeModal() {
            const modal = document.getElementById('profileModal');
            document.querySelector('#profileModal > div').classList.remove('scale-100');
            document.querySelector('#profileModal > div').classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 200);
        }
        
        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            document.querySelector('#deleteModal > div').classList.remove('scale-100');
            document.querySelector('#deleteModal > div').classList.add('scale-95');
            
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