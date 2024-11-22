<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // private $db; // Assuming you have a database connection
    //
    // public function __construct($db)
    // {
    //     $this->db = $db;
    // }
    //
    // public function register($username, $password)
    // {
    //     // Validate input
    //     if (empty($username) || empty($password)) {
    //         return "Username and password are required.";
    //     }
    //
    //     // Hash the password
    //     $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    //
    //     // Save to database
    //     $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    //     if ($stmt->execute([$username, $hashedPassword])) {
    //         return "User registered successfully.";
    //     } else {
    //         return "Error registering user.";
    //     }
    // }
    //
    // public function login($username, $password)
    // {
    //     // Validate input
    //     if (empty($username) || empty($password)) {
    //         return "Username and password are required.";
    //     }
    //
    //     // Check user credentials
    //     $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
    //     $stmt->execute([$username]);
    //     $user = $stmt->fetch();
    //
    //     if ($user && password_verify($password, $user['password'])) {
    //         // Create session
    //         session_start();
    //         $_SESSION['user_id'] = $user['id'];
    //         return "Login successful.";
    //     } else {
    //         return "Invalid username or password.";
    //     }
    // }
    //
    // public function logout()
    // {
    //     // Destroy user session
    //     session_start();
    //     session_unset();
    //     session_destroy();
    //     return "Logout successful.";
    // }
    public function login(Request $request)
    {
        // if (Auth::check()) {
        //     return redirect('/');
        // } else {
        //     return view('auth.login');
        // }
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput($request->except('password'));
        }

        abort(405);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // dd($request->all());

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Auth::login($user);
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
