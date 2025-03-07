<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart Dashboard - Smart Financial Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
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
        .sidebar {
            height: calc(100vh - 80px);
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-item.active {
            border-left: 4px solid #FBBF24;
            background-color: rgba(251, 191, 36, 0.1);
        }
        .card {
            backdrop-filter: blur(12px);
            background-color: rgba(31, 41, 55, 0.5);
            border: 1px solid rgba(75, 85, 99, 0.3);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(31, 41, 55, 0.3);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(251, 191, 36, 0.5);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(251, 191, 36, 0.7);
        }
        .modal {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 animate-gradient text-white min-h-screen">
    <div class="backdrop-blur-sm bg-black/30 min-h-screen">
        <!-- Header -->
        <header class="w-full py-4 bg-black/60 backdrop-blur-md sticky top-0 z-50">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-wallet text-yellow-400 text-2xl"></i>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                        SaveSmart
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center text-gray-900 font-semibold">
                                @php
                                    $nameParts = explode(' ', trim($selectedProfile->name));
                                    $firstInitial = isset($nameParts[0]) ? strtoupper($nameParts[0][0]) : '';
                                    $secondInitial = isset($nameParts[1]) ? strtoupper($nameParts[1][0]) : '';
                                @endphp
                                {{ $firstInitial }} {{ $secondInitial }}
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                        <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg overflow-hidden hidden z-50 card">
                            <div class="p-3 border-b border-gray-700">
                                <p class="font-semibold">{{ $selectedProfile->name }}</p>
                            </div>
                            <div>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-700 transition-colors duration-200">
                                    <i class="fas fa-user-cog mr-2 text-yellow-400"></i> Account Settings
                                </a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-700 transition-colors duration-200">
                                    <i class="fas fa-users mr-2 text-yellow-400"></i> Family Members
                                </a>
                                <form action="{{ route('logout.user') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-700 transition-colors duration-200 text-red-400">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6">
            <!-- Sidebar -->
            <aside class="md:w-64 flex flex-col card rounded-xl overflow-hidden">
                <div class="p-4 border-b border-gray-700">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Dashboard</span>
                        <button id="mobileSidebarToggle" class="md:hidden text-gray-400 hover:text-white">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
                <nav id="sidebarNav" class="flex-1 overflow-y-auto custom-scrollbar">
                    <div class="py-2">
                        <a href="#overview" class="sidebar-item active flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-home w-6 text-yellow-400"></i>
                            <span>Overview</span>
                        </a>
                        <a href="#transactions" class="sidebar-item flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-exchange-alt w-6 text-yellow-400"></i>
                            <span>Transactions</span>
                        </a>
                        <a href="#budget" class="sidebar-item flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-chart-pie w-6 text-yellow-400"></i>
                            <span>Budget</span>
                        </a>
                        <a href="#goals" class="sidebar-item flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-bullseye w-6 text-yellow-400"></i>
                            <span>Goals</span>
                        </a>
                        <a href="#reports" class="sidebar-item flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-chart-line w-6 text-yellow-400"></i>
                            <span>Reports</span>
                        </a>
                    </div>
                    <div class="py-2 border-t border-gray-700">
                        <div class="px-4 py-2">
                            <p class="text-xs text-gray-500 mb-2">Family Members</p>
                            @foreach($profiles as $member)
                                <div class="flex items
                                -center space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-xs">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm">{{ $member->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="py-2 border-t border-gray-700">
                        <p class="px-4 py-2 text-xs text-gray-500 uppercase">Categories</p>
                        <a href="#manage-categories" class="sidebar-item flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-tags w-6 text-yellow-400"></i>
                            <span>Manage Categories</span>
                        </a>
                        <div class="px-4 py-2">
                            <button onclick="openModal('addCategoryModal')" class="text-xs flex items-center text-yellow-400 hover:text-yellow-300">
                                <i class="fas fa-plus-circle mr-1"></i> Add Category
                            </button>
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Main Dashboard Content -->
            <main class="flex-1 space-y-6">
                <!-- Overview Section -->
                <section id="overview">
                    <h2 class="text-xl font-bold mb-4 bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                        Overview
                    </h2>
                    
                    <!-- Balance Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="card rounded-xl p-4">
                            <p class="text-gray-400 text-sm">Total Balance</p>
                            <p class="text-2xl font-bold">€3,548.92</p>
                            <div class="flex items-center mt-2 text-green-400 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+12% from last month</span>
                            </div>
                        </div>
                        <div class="card rounded-xl p-4">
                            <p class="text-gray-400 text-sm">Income (This Month)</p>
                            <p class="text-2xl font-bold">€2,850.00</p>
                            <div class="flex items-center mt-2 text-green-400 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+5% from last month</span>
                            </div>
                        </div>
                        <div class="card rounded-xl p-4">
                            <p class="text-gray-400 text-sm">Expenses (This Month)</p>
                            <p class="text-2xl font-bold">€1,756.32</p>
                            <div class="flex items-center mt-2 text-red-400 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+8% from last month</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Charts and Tables -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Expenses by Category -->
                        <div class="card rounded-xl p-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-semibold">Expenses by Category</h3>
                                <div class="relative">
                                    <select class="bg-gray-700 text-sm rounded-lg px-3 py-1 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                                        <option>This Month</option>
                                        <option>Last Month</option>
                                        <option>Last 3 Months</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <div class="w-1/2">
                                    <canvas id="expensesPieChart" height="200"></canvas>
                                </div>
                                <div class="w-1/2 space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                                        <span class="text-sm">Housing (35%)</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                                        <span class="text-sm">Food (25%)</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                                        <span class="text-sm">Transportation (15%)</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                                        <span class="text-sm">Entertainment (10%)</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-purple-500 mr-2"></div>
                                        <span class="text-sm">Utilities (8%)</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-gray-500 mr-2"></div>
                                        <span class="text-sm">Others (7%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Monthly Income & Expenses -->
                        <div class="card rounded-xl p-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-semibold">Monthly Income & Expenses</h3>
                                <div class="relative">
                                    <select class="bg-gray-700 text-sm rounded-lg px-3 py-1 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                                        <option>Last 6 Months</option>
                                        <option>Last Year</option>
                                    </select>
                                </div>
                            </div>
                            <canvas id="monthlyChart" height="200"></canvas>
                        </div>
                    </div>
                    
                    <!-- Recent Transactions -->
                    <div class="card rounded-xl p-4 mt-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Recent Transactions</h3>
                            <button onclick="openModal('addTransactionModal')" class="bg-yellow-400 hover:bg-yellow-500 text-black rounded-lg px-3 py-1 text-sm font-medium flex items-center transition-colors duration-300">
                                <i class="fas fa-plus mr-1"></i> Add Transaction
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Description</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Category</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Amount</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Member</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">Grocery Shopping</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Food</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-300">Feb 22, 2025</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-red-400">-€89.75</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-xs mr-2">
                                                    JS
                                                </div>
                                                <span class="text-sm">John</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm">
                                            <button class="text-gray-400 hover:text-yellow-400 mr-2"><i class="fas fa-edit"></i></button>
                                            <button class="text-gray-400 hover:text-red-400"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">Monthly Salary</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Income</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-300">Feb 20, 2025</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-green-400">+€2,850.00</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-xs mr-2">
                                                    JS
                                                </div>
                                                <span class="text-sm">John</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm">
                                            <button class="text-gray-400 hover:text-yellow-400 mr-2"><i class="fas fa-edit"></i></button>
                                            <button class="text-gray-400 hover:text-red-400"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">Electricity Bill</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full bg-purple-500/20 text-purple-400">Utilities</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-300">Feb 19, 2025</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-red-400">-€75.32</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-xs mr-2">
                                                    ES
                                                </div>
                                                <span class="text-sm">Emma</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm">
                                            <button class="text-gray-400 hover:text-yellow-400 mr-2"><i class="fas fa-edit"></i></button>
                                            <button class="text-gray-400 hover:text-red-400"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">Restaurant Dinner</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full bg-red-500/20 text-red-400">Entertainment</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-300">Feb 18, 2025</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-red-400">-€62.50</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-xs mr-2">
                                                    ES
                                                </div>
                                                <span class="text-sm">Emma</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm">
                                            <button class="text-gray-400 hover:text-yellow-400 mr-2"><i class="fas fa-edit"></i></button>
                                            <button class="text-gray-400 hover:text-red-400"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="#transactions" class="text-sm text-yellow-400 hover:text-yellow-300">View All Transactions</a>
                        </div>
                    </div>
                    
                    <!-- Financial Goals -->
                    <div class="card rounded-xl p-4 mt-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Financial Goals</h3>
                            <button onclick="openModal('addGoalModal')" class="bg-yellow-400 hover:bg-yellow-500 text-black rounded-lg px-3 py-1 text-sm font-medium flex items-center transition-colors duration-300">
                                <i class="fas fa-plus mr-1"></i> Add Goal
                            </button>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-gray-800/70 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-yellow-400">Vacation Fund</h4>
                                        <p class="text-sm text-gray-400">Summer vacation to Italy</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium">€750 / €2,000</p>
                                        <p class="text-sm text-gray-400">Target: Aug 2025</p>
                                    </div>
                                </div>
                                <div class="mt-2 w-full bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 38%"></div>
                                </div>
                                <div class="mt-1 flex justify-between text-xs text-gray-400">
                                    <span>38% completed</span>
                                    <span>€1,250 remaining</span>
                                </div>
                            </div>
                            <div class="bg-gray-800/70 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-yellow-400">Emergency Fund</h4>
                                        <p class="text-sm text-gray-400">3 months of expenses</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium">€4,500 / €6,000</p>
                                        <p class="text-sm text-gray-400">Target: Dec 2025</p>
                                    </div>
                                </div>
                                <div class="mt-2 w-full bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                                <div class="mt-1 flex justify-between text-xs text-gray-400">
                                    <span>75% completed</span>
                                    <span>€1,500 remaining</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="#goals" class="text-sm text-yellow-400 hover:text-yellow-300">View All Goals</a>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <!-- Footer -->
        <footer class="w-full py-6 bg-black/40 backdrop-blur-md mt-6">
            <div class="container mx-auto px-4 text-center text-sm text-gray-400">
                <p>&copy; 2025 SaveSmart. All rights reserved.</p>
                <div class="mt-4 space-x-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Terms of Service</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Help Center</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modals -->
    <!-- Add Transaction Modal -->
    <div id="addTransactionModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden modal">
        <div class="card rounded-xl w-full max-w-md p-6 m-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">Add Transaction</h3>
                <button onclick="closeModal('addTransactionModal')" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form>
                <div class="space-y-4">
                    <div>
                        <label class="block mb-1 text-sm">Transaction Type</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="type" value="expense" class="mr-2 text-yellow-400" checked>
                                <span>Expense</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="income" class="mr-2 text-yellow-400">
                                <span>Income</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Description</label>
                        <input type="text" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" placeholder="Enter description">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Amount</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2">€</span>
                            <input type="number" step="0.01" class="w-full bg-gray-700 rounded-lg pl-8 pr-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" placeholder="0.00">
                        </div>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Category</label>
                        <select class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                            <option>Housing</option>
                            <option>Food</option>
                            <option>Transportation</option>
                            <option>Entertainment</option>
                            <option>Utilities</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Date</label>
                        <input type="date" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Family Member</label>
                        <select class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                            <option>John Smith</option>
                            <option>Emma Smith</option>
                            <option>Liam Smith</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Notes (Optional)</label>
                        <textarea class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" rows="3" placeholder="Add any additional notes"></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal('addTransactionModal')" class="px-4 py-2 text-sm bg-gray-600 hover:bg-gray-500 rounded-lg transition-colors duration-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm bg-yellow-400 hover:bg-yellow-500 text-black rounded-lg font-medium transition-colors duration-300">
                        Add Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden modal">
    <div class="card rounded-xl w-full max-w-md p-6 m-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                Add Category
            </h3>
            <button onclick="closeModal('addCategoryModal')" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="addCategoryForm" class="space-y-4">
            <div>
                <label class="block mb-1 text-sm">Category Name</label>
                <input type="text" name="name" required
                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
            <div>
                <label class="block mb-1 text-sm">Icon</label>
                <select name="icon" required
                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <option value="home">🏠 Housing</option>
                    <option value="food">🍽️ Food</option>
                    <option value="transport">🚗 Transport</option>
                    <option value="entertainment">🎮 Entertainment</option>
                    <option value="utilities">💡 Utilities</option>
                    <option value="custom">➕ Custom</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm">Budget Limit (Optional)</label>
                <input type="number" name="budgetLimit"
                    class="w-full p-3 rounded-lg bg-gray-700/50 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
            <button type="submit" 
                class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black font-semibold rounded-lg hover:from-yellow-500 hover:to-yellow-600">
                Add Category
            </button>
        </form>
    </div>
</div>

<!-- Add this script section at the bottom of your file -->
<script>
// Chart.js Initialization
window.addEventListener('load', function() {
    // Expenses Pie Chart
    const expensesPieChart = new Chart(document.getElementById('expensesPieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Housing', 'Food', 'Transportation', 'Entertainment', 'Utilities', 'Others'],
            datasets: [{
                data: [35, 25, 15, 10, 8, 7],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(251, 191, 36, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(168, 85, 247, 0.8)',
                    'rgba(156, 163, 175, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Monthly Income & Expenses Chart
    const monthlyChart = new Chart(document.getElementById('monthlyChart'), {
        type: 'bar',
        data: {
            labels: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb'],
            datasets: [{
                label: 'Income',
                data: [2500, 2700, 2600, 3000, 2800, 2850],
                backgroundColor: 'rgba(34, 197, 94, 0.5)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 1
            }, {
                label: 'Expenses',
                data: [1800, 1900, 1750, 2100, 1650, 1756],
                backgroundColor: 'rgba(239, 68, 68, 0.5)',
                borderColor: 'rgba(239, 68, 68, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.7)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.7)'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(255, 255, 255, 0.7)'
                    }
                }
            }
        }
    });
});

// Modal Functions
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

// Close modal when clicking outside
window.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.classList.add('hidden');
    }
});

// Form Submission Handlers
document.getElementById('addFamilyMemberForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your family member submission logic here
    closeModal('addFamilyMemberModal');
});

document.getElementById('addCategoryForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your category submission logic here
    closeModal('addCategoryModal');
});

// User Menu Toggle
document.getElementById('userMenuBtn').addEventListener('click', function() {
    document.getElementById('userMenu').classList.toggle('hidden');
});

// Close user menu when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('#userMenuBtn')) {
        document.getElementById('userMenu').classList.add('hidden');
    }
});
</script>
</body>
</html>