<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart Transactions - Smart Financial Management</title>
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
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
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
                                    $nameParts = isset($selectedProfile) ? explode(' ', trim($selectedProfile->name)) : [''];
                                    $firstInitial = isset($nameParts[0]) && $nameParts[0] !== '' ? strtoupper($nameParts[0][0]) : '';
                                    $secondInitial = isset($nameParts[1]) && $nameParts[1] !== '' ? strtoupper($nameParts[1][0]) : '';
                                @endphp
                                {{ $firstInitial }} {{ $secondInitial }}
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                        <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg overflow-hidden hidden z-50 card">
                            <div class="p-3 border-b border-gray-700">
                                <p class="font-semibold">{{ $selectedProfile->name ?? 'Guest' }}</p>
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
                        <span class="font-semibold">Transactions</span>
                        <button id="mobileSidebarToggle" class="md:hidden text-gray-400 hover:text-white">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
                <nav id="sidebarNav" class="flex-1 overflow-y-auto custom-scrollbar">
                    <div class="py-2">
                        <a href="" class="sidebar-item flex items-center px-4 py-3 text-gray-300 hover:text-white">
                            <i class="fas fa-home w-6 text-yellow-400"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('transaction.index') }}" class="sidebar-item active flex items-center px-4 py-3 text-gray-300 hover:text-white">
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
                </nav>
            </aside>

            <!-- Main Transactions Content -->
            <main class="flex-1 space-y-6">
                <section id="transactions">
                    <h2 class="text-xl font-bold mb-4 bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                        Transactions
                    </h2>

                    <!-- Transactions Table -->
                    <div class="card rounded-xl p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">All Transactions</h3>
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
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap">{{ $transaction->description }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span class="px-2 py-1 text-xs rounded-full" style="color: {{ $transaction->category->color }};">{{ $transaction->category->name }}</span>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-gray-300">{{ $transaction->created_at->format('M d, Y') }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap {{ $transaction->type == 'income' ? 'text-green-400' : 'text-red-400' }}">{{ $transaction->amount < 0 ? '-' : '+' }}€{{ abs($transaction->amount) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-xs mr-2">
                                                        {{ $transaction->profile ? $transaction->profile->name[0] : ($transaction->user ? $transaction->user->name[0] : 'S') }}
                                                    </div>
                                                    <span class="text-sm">{{ $transaction->profile ? $transaction->profile->name : ($transaction->user ? $transaction->user->name : 'System Transaction') }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-right text-sm">
                                                <button class="text-gray-400 hover:text-yellow-400 mr-2"><i class="fas fa-edit"></i></button>
                                                <button class="text-gray-400 hover:text-red-400"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="#transactions" class="text-sm text-yellow-400 hover:text-yellow-300">View All Transactions</a>
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

    <!-- Add Transaction Modal -->
    <div id="addTransactionModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden modal">
        <div class="card rounded-xl w-full max-w-md p-6 m-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                    Add Transaction</h3>
                <button onclick="closeModal('addTransactionModal')" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
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
                        <input type="text" name="description" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" placeholder="Enter description" required>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Amount</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2">€</span>
                            <input type="number" name="amount" step="0.01" class="w-full bg-gray-700 rounded-lg pl-8 pr-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" placeholder="0.00" required>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Category</label>
                        <select name="category_id" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Date</label>
                        <input type="date" name="date" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Family Member</label>
                        <select name="profile_id" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" required>
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm">Notes (Optional)</label>
                        <textarea name="notes" class="w-full bg-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" rows="3" placeholder="Add any additional notes"></textarea>
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

    <script>
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
