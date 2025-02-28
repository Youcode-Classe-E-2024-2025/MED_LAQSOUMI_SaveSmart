<!-- filepath: /home/medlaq777/Desktop/SaveSmart/resources/views/profile.blade.php -->
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
        <header class="p-6 bg-black/60 backdrop-blur-md">
            <div class="flex items-center gap-2">
                <i class="fas fa-wallet text-amber-400 text-2xl"></i>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent m-0">SaveSmart</h1>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col justify-center items-center p-8 text-center">
            <h2 class="text-4xl mb-8">Who's managing finances today?</h2>

            <div class="flex flex-wrap justify-center gap-8 max-w-[900px] mx-auto">
                <!-- Profile 1 -->
                <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="selectProfile('john')">
                    <div class="w-[120px] h-[120px] rounded-xl flex items-center justify-center text-4xl font-bold text-gray-900 border-4 border-white/20 transition-all duration-300 ease-in-out overflow-hidden relative hover:border-amber-400 hover:shadow-[0_0_20px_rgba(251,191,36,0.5)]" style="background-image: linear-gradient(to bottom right, #22c55e, #16a34a);">
                        <div class="w-full h-full flex items-center justify-center">JS</div>
                        <div class="absolute bottom-0 left-0 right-0 bg-black/70 text-amber-400 text-xs py-0.5">Admin</div>
                    </div>
                    <div class="text-xl font-medium transition-all duration-300 ease-in-out hover:text-amber-400">John Smith</div>
                </div>

                <!-- Profile 2 -->
                <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="selectProfile('emma')">
                    <div class="w-[120px] h-[120px] rounded-xl flex items-center justify-center text-4xl font-bold text-gray-900 border-4 border-white/20 transition-all duration-300 ease-in-out overflow-hidden relative hover:border-amber-400 hover:shadow-[0_0_20px_rgba(251,191,36,0.5)]" style="background-image: linear-gradient(to bottom right, #3b82f6, #2563eb);">
                        <div class="w-full h-full flex items-center justify-center">ES</div>
                    </div>
                    <div class="text-xl font-medium transition-all duration-300 ease-in-out hover:text-amber-400">Emma Smith</div>
                </div>

                <!-- Profile 3 -->
                <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="selectProfile('liam')">
                    <div class="w-[120px] h-[120px] rounded-xl flex items-center justify-center text-4xl font-bold text-gray-900 border-4 border-white/20 transition-all duration-300 ease-in-out overflow-hidden relative hover:border-amber-400 hover:shadow-[0_0_20px_rgba(251,191,36,0.5)]" style="background-image: linear-gradient(to bottom right, #a855f7, #9333ea);">
                        <div class="w-full h-full flex items-center justify-center">LS</div>
                    </div>
                    <div class="text-xl font-medium transition-all duration-300 ease-in-out hover:text-amber-400">Liam Smith</div>
                </div>

                <!-- Profile 4 -->
                <div class="flex flex-col items-center gap-4 cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 w-[150px]" onclick="selectProfile('olivia')">
                    <div class="w-[120px] h-[120px] rounded-xl flex items-center justify-center text-4xl font-bold text-gray-900 border-4 border-white/20 transition-all duration-300 ease-in-out overflow-hidden relative hover:border-amber-400 hover:shadow-[0_0_20px_rgba(251,191,36,0.5)]" style="background-image: linear-gradient(to bottom right, #ec4899, #be185d);">
                        <div class="w-full h-full flex items-center justify-center">OS</div>
                    </div>
                    <div class="text-xl font-medium transition-all duration-300 ease-in-out hover:text-amber-400">Olivia Smith</div>
                </div>

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

            <button class="mt-12 py-3 px-8 bg-transparent border-2 border-white/50 text-white rounded text-base cursor-pointer transition-all duration-300 ease-in-out hover:border-amber-400 hover:text-amber-400" onclick="manageProfiles()">Manage Profiles</button>
        </main>

        <!-- Footer -->
        <footer class="p-6 text-center text-sm text-white/50 bg-black/40 backdrop-blur-md">
            <p>&copy; 2025 SaveSmart. All rights reserved.</p>
        </footer>
    </div>

    <script>
        function selectProfile(profileId) {
            // In a real application, this would redirect to the dashboard with the selected profile
            console.log(`Profile selected: ${profileId}`);
            window.location.href = "/dashboard"; // This would typically include the profile ID as a parameter
        }

        function addProfile() {
            // In a real application, this would open a modal or redirect to a profile creation page
            console.log("Add profile clicked");
            alert("Add profile functionality would open here");
        }

        function manageProfiles() {
            // In a real application, this would redirect to a profile management page
            console.log("Manage profiles clicked");
            alert("Manage profiles functionality would open here");
        }
    </script>
</body>

</html>