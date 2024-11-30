<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Client Management</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        }
        .glass-effect {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(51, 65, 85, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .gradient-border {
            position: relative;
            border-radius: 0.75rem;
            background: linear-gradient(45deg, #3B82F6, #1D4ED8);
            padding: 1px;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 0.75rem;
            padding: 2px;
            background: linear-gradient(45deg, #60A5FA, #2563EB);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-800 to-slate-900 min-h-screen">
    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button onclick="toggleSidebar()" class="p-2 bg-slate-800 rounded-lg text-slate-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar fixed inset-y-0 left-0 w-64 bg-slate-900 border-r border-slate-700 z-40 lg:transform-none">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-blue-400">ClientHub</h1>
        </div>
        <nav class="mt-6">
            <a href="#" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Clients
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                Projects
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Invoices
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Reports
            </a>
            <a href="{{ url('auth/login') }}" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64 main-content">
        <!-- Top Bar -->
        <div class="bg-slate-900 border-b border-slate-700 p-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center w-full md:w-auto">
                    <input type="text" placeholder="Search..." class="w-full md:w-auto bg-slate-800 text-slate-300 px-4 py-2 rounded-lg border border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-slate-300 hover:bg-slate-800 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-slate-300 hover:bg-slate-800 rounded-lg p-2">
                            <img src="https://ui-avatars.com/api/?name=Admin+User" class="w-8 h-8 rounded-full">
                            <span class="hidden md:inline">Admin User</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="p-4 md:p-6 space-y-6">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <div class="glass-effect rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400">Active Clients</p>
                            <h3 class="text-2xl font-bold text-blue-400">248</h3>
                        </div>
                        <div class="p-3 bg-blue-500/10 rounded-lg">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-400 text-sm">↑ 12% from last month</span>
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400">Active Projects</p>
                            <h3 class="text-2xl font-bold text-blue-400">45</h3>
                        </div>
                        <div class="p-3 bg-purple-500/10 rounded-lg">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-400 text-sm">↑ 8% from last month</span>
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400">Revenue</p>
                            <h3 class="text-2xl font-bold text-blue-400">Rp 845.2M</h3>
                        </div>
                        <div class="p-3 bg-green-500/10 rounded-lg">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-400 text-sm">↑ 24.5% from last month</span>
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400">Pending Tasks</p>
                            <h3 class="text-2xl font-bold text-blue-400">129</h3>
                        </div>
                        <div class="p-3 bg-red-500/10 rounded-lg">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-red-400 text-sm">↑ 5% from last week</span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Tasks -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="gradient-border">
                    <div class="glass-effect rounded-xl p-6">
                        <h2 class="text-xl font-bold text-blue-400 mb-4">Recent Activity</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-10 h-10 rounded-full">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-slate-300 truncate">
                                        <span class="font-medium">John Doe</span> completed project
                                        <span class="text-blue-400">Website Redesign</span>
                                    </p>
                                    <p class="text-slate-500 text-sm">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Smith" class="w-10 h-10 rounded-full">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-slate-300 truncate">
                                        <span class="font-medium">Sarah Smith</span> added new task
                                        <span class="text-blue-400">Mobile App Development</span>
                                    </p>
                                    <p class="text-slate-500 text-sm">4 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name=Mike+Johnson" class="w-10 h-10 rounded-full">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-slate-300 truncate">
                                        <span class="font-medium">Mike Johnson</span> commented on
                                        <span class="text-blue-400">Project Timeline</span>
                                    </p>
                                    <p class="text-slate-500 text-sm">6 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tasks -->
                <div class="gradient-border">
                    <div class="glass-effect rounded-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-blue-400">Tasks</h2>
                            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                Add Task
                            </button>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" class="rounded border-slate-700 text-blue-500 focus:ring-blue-500">
                                    <span class="text-slate-300">Client meeting with ABC Corp</span>
                                </div>
                                <span class="text-red-400 text-sm whitespace-nowrap">Due Today</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" class="rounded border-slate-700 text-blue-500 focus:ring-blue-500">
                                    <span class="text-slate-300">Project proposal review</span>
                                </div>
                                <span class="text-yellow-400 text-sm whitespace-nowrap">Tomorrow</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" class="rounded border-slate-700 text-blue-500 focus:ring-blue-500">
                                    <span class="text-slate-300">Update client documentation</span>
                                </div>
                                <span class="text-slate-400 text-sm whitespace-nowrap">Next Week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Projects -->
            <div class="gradient-border">
                <div class="glass-effect rounded-xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-blue-400">Active Projects</h2>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                            View All
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-slate-700">
                                    <th class="text-left text-sm font-medium text-slate-300 pb-4">Project Name</th>
                                    <th class="text-left text-sm font-medium text-slate-300 pb-4">Client</th>
                                    <th class="text-left text-sm font-medium text-slate-300 pb-4">Progress</th>
                                    <th class="text-left text-sm font-medium text-slate-300 pb-4">Status</th>
                                    <th class="text-left text-sm font-medium text-slate-300 pb-4">Due Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                <tr class="hover:bg-slate-800/50">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-lg bg-purple-500/10 flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-slate-300">Website Redesign</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img src="https://ui-avatars.com/api/?name=Tech+Corp" class="w-6 h-6 rounded-full mr-2">
                                            <span class="text-slate-300">Tech Corp</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="w-full bg-slate-700 rounded-full h-2">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: 75%"></div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-500/20 text-green-400">
                                            On Track
                                        </span>
                                    </td>
                                    <td class="py-4 text-slate-300">Dec 24, 2023</td>
                                </tr>
                                <tr class="hover:bg-slate-800/50">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-lg bg-orange-500/10 flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-slate-300">Mobile App Development</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img src="https://ui-avatars.com/api/?name=Innovate+Inc" class="w-6 h-6 rounded-full mr-2">
                                            <span class="text-slate-300">Innovate Inc</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="w-full bg-slate-700 rounded-full h-2">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-500/20 text-yellow-400">
                                            At Risk
                                        </span>
                                    </td>
                                    <td class="py-4 text-slate-300">Jan 15, 2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>
