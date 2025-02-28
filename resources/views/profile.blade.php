<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Choose Your Profile</title>
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
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .profiles-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            max-width: 900px;
            margin: 0 auto;
        }
        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 150px;
        }
        .profile:hover {
            transform: scale(1.05);
        }
        .profile:hover .avatar {
            border-color: #FBBF24;
            box-shadow: 0 0 20px rgba(251, 191, 36, 0.5);
        }
        .profile:hover .profile-name {
            color: #FBBF24;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: #111827;
            border: 4px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .avatar-inner {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-name {
            font-size: 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .admin-badge {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            color: #FBBF24;
            font-size: 0.7rem;
            padding: 2px 0;
        }
        .add-profile {
            background-color: rgba(100, 116, 139, 0.3);
            border: 2px dashed rgba(255, 255, 255, 0.3);
        }
        .add-profile i {
            font-size: 2.5rem;
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        .add-profile:hover i {
            color: #FBBF24;
        }
        .manage-profiles-btn {
            margin-top: 3rem;
            padding: 0.75rem 2rem;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            color: white;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .manage-profiles-btn:hover {
            border-color: #FBBF24;
            color: #FBBF24;
        }
        footer {
            padding: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.5);
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profiles-container {
                gap: 1.5rem;
            }
            .profile {
                width: 120px;
            }
            .avatar {
                width: 100px;
                height: 100px;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .profiles-container {
                gap: 1rem;
            }
            .profile {
                width: 100px;
            }
            .avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }
            .profile-name {
                font-size: 0.9rem;
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
        </header>

        <!-- Main Content -->
        <main>
            <h2>Who's managing finances today?</h2>
            
            <div class="profiles-container">
                <!-- Profile 1 -->
                <div class="profile" onclick="selectProfile('john')">
                    <div class="avatar" style="background-image: linear-gradient(to bottom right, #22c55e, #16a34a);">
                        <div class="avatar-inner">JS</div>
                        <div class="admin-badge">Admin</div>
                    </div>
                    <div class="profile-name">John Smith</div>
                </div>
                
                <!-- Profile 2 -->
                <div class="profile" onclick="selectProfile('emma')">
                    <div class="avatar" style="background-image: linear-gradient(to bottom right, #3b82f6, #2563eb);">
                        <div class="avatar-inner">ES</div>
                    </div>
                    <div class="profile-name">Emma Smith</div>
                </div>
                
                <!-- Profile 3 -->
                <div class="profile" onclick="selectProfile('liam')">
                    <div class="avatar" style="background-image: linear-gradient(to bottom right, #a855f7, #9333ea);">
                        <div class="avatar-inner">LS</div>
                    </div>
                    <div class="profile-name">Liam Smith</div>
                </div>
                
                <!-- Profile 4 -->
                <div class="profile" onclick="selectProfile('olivia')">
                    <div class="avatar" style="background-image: linear-gradient(to bottom right, #ec4899, #be185d);">
                        <div class="avatar-inner">OS</div>
                    </div>
                    <div class="profile-name">Olivia Smith</div>
                </div>
                
                <!-- Add Profile Button -->
                <div class="profile" onclick="addProfile()">
                    <div class="avatar add-profile">
                        <div class="avatar-inner">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="profile-name">Add Profile</div>
                </div>
            </div>
            
            <button class="manage-profiles-btn" onclick="manageProfiles()">Manage Profiles</button>
        </main>

        <!-- Footer -->
        <footer>
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