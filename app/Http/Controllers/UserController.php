<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Input validation
        if (!$request->username || !$request->email || !$request->password) {
            return redirect()->back()->withErrors([
                'message' => 'Username, email and password are required'
            ]);
        }

        try {
            // Check if username or email already exists
            $existingUser = User::where('username', $request->username)
                ->orWhere('email', $request->email)
                ->first();

            if ($existingUser) {
                return redirect()->back()->withErrors([
                    'message' => 'Username or email already exists'
                ]);
            }

            // Create new user
            DB::beginTransaction();

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::commit();

            return view('app.dashboard')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()->withErrors([
                'message' => 'Registration failed: ' . $e->getMessage()
            ]);
        }
    }

    public function login(Request $request)
    {
        // Input validation
        if (!$request->username || !$request->password) {
            return redirect()->back()->withErrors([
                'message' => 'Username and password are required'
            ]);
        }

        try {
            // Get user from database
            $user = User::where('username', $request->username)->first();

            if (!$user) {
                return redirect()->back()->withErrors([
                    'message' => 'Invalid username or password'
                ]);
            }

            // Compare password
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors([
                    'message' => 'Invalid username or password'
                ]);
            }

            auth()->login($user, $request->has('remember'));
            return redirect()->route('dashboard')->with('success', 'Login successful!');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'message' => 'Login failed: ' . $e->getMessage()
            ]);
        }
    }
}
