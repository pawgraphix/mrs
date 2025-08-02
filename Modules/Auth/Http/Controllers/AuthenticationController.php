<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\Department;
use App\Models\MaintenanceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    public function index()
    {
        $params['errorMsg'] = "";
        $params['departments'] = Department::all();
        return view('auth::index', $params);

    }
    public function welcome()
    {
        return view('auth::welcome');

    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Invalid email or password.');
        }
    }

    public function showRegisterForm()
    {
        $departments = Department::all();
        return view('auth::index', compact('departments'));
    }

    public function register(Request $request)
    {
        // 1. Validate inputs
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
            'gender'       => 'required|in:male,female',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|string|min:6|confirmed',
            'department_id' => 'required|exists:departments,id',
        ]);

        // 2. Create user
        $user = User::create([
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'phone_number' => $request->phone_number,
            'gender'       => $request->gender,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'department_id' => $request->department_id,
        ]);

        // 3. Use the user (optional log or redirect with name)
        return redirect()
            ->route('index')
            ->with('success', 'Welcome ' . $user->first_name . '! to MaRes, Now Please Login')
            ->with('user', $user);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('index');
    }

    public function dashboard()
    {
        $totalIssues = MaintenanceRequest::count();
        $pendingIssues = MaintenanceRequest::where('status', 'pending')->count();
        $submitted = MaintenanceRequest::where('status', 'Submitted')->count();
        $resolvedIssues = MaintenanceRequest::where('status', 'resolved')->count();

        // Notifications kwa mtumiaji aliye-login (kama unatumia user_id kwenye notifications)
        //$notifications = Notification::where('user_id', auth()->id())->latest()->take(5)->get();
        $recentActivities = MaintenanceRequest::latest()->take(5)->get();

        return view('auth::dashboard', compact(
            'totalIssues',
            'pendingIssues',
            'submitted',
            'resolvedIssues',
            //'notifications',
            'recentActivities'
        ));
    }
}

//$userId = auth()->id();
//
//$totalIssues = MaintenanceRequest::where('user_id', $userId)->count();
//$pendingIssues = MaintenanceRequest::where('user_id', $userId)->where('status', 'pending')->count();
//$submitted = MaintenanceRequest::where('user_id', $userId)->where('status', 'Submitted')->count();
//$resolvedIssues = MaintenanceRequest::where('user_id', $userId)->where('status', 'resolved')->count();
//
//$recentActivities = MaintenanceRequest::where('user_id', $userId)
//    ->latest()
//    ->take(5)
//    ->get();
