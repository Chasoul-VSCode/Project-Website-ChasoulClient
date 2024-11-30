<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Register</title>
    
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
        @media (max-width: 640px) {
            .gradient-border {
                margin: 1rem;
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-slate-800 to-slate-900">
    <div class="gradient-border w-full max-w-md mx-auto">
        <div class="glass-effect rounded-xl p-8 sm:p-8 shadow-2xl">
            <div class="text-center mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-blue-400 mb-2">Create Account</h1>
                <p class="text-sm sm:text-base text-slate-400">Sign up to get started</p>
            </div>

            @if($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-500/10 border border-red-500/20">
                <p class="text-red-400 text-sm">{{ $errors->first('message') }}</p>
            </div>
            @endif

            <form action="{{ url('register') }}" method="POST" class="space-y-4 sm:space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2" for="username">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg bg-slate-800/50 border border-slate-700 text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        placeholder="Choose a username"
                        required
                        value="{{ old('username') }}"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2" for="email">
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg bg-slate-800/50 border border-slate-700 text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        placeholder="Enter your email"
                        required
                        value="{{ old('email') }}"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2" for="password">
                        Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg bg-slate-800/50 border border-slate-700 text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        placeholder="Create a password"
                        required
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2" for="password_confirmation">
                        Confirm Password
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg bg-slate-800/50 border border-slate-700 text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        placeholder="Confirm your password"
                        required
                    >
                </div>

                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        class="h-4 w-4 rounded border-slate-700 text-blue-500 focus:ring-blue-500 bg-slate-800"
                        required
                    >
                    <label for="terms" class="ml-2 block text-sm text-slate-300">
                        I agree to the <a href="#" class="text-blue-400 hover:text-blue-300">Terms of Service</a> and <a href="#" class="text-blue-400 hover:text-blue-300">Privacy Policy</a>
                    </label>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-2 sm:py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 transform hover:scale-[1.02]"
                >
                    Create Account
                </button>
            </form>

            <div class="mt-4 sm:mt-6 text-center">
                <p class="text-sm sm:text-base text-slate-400">
                    Already have an account? 
                    <a href="{{ url('auth/login') }}" class="text-blue-400 hover:text-blue-300 font-medium transition duration-200">
                        Sign in
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
