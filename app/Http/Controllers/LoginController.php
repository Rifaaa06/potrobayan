<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_act(Request $request)
    {
        $customMessage = [
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'email.exists'      => 'Email tidak terdaftar di database',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $customMessage);

        $token = \Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan link reset password ke email anda');
    }

    public function validasi_forgot_password_act(Request $request)
    {
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password' => 'required|min:6'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        $user = User::where('email', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password berhasil direset');
    }

    public function validasi_forgot_password(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        return view('auth.validasi-token', compact('token'));
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            Alert::success('Success', 'Berhasil Login');
            if ($user->is_admin) {
                // Redirect to admin dashboard if user is admin
                return redirect()->route('admin.dashboard');
            } else {
                // Redirect to user dashboard if user is not admin
                return redirect()->route('home');
            }
        } else {
            // Authentication failed
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }   
    public function logout()
    {
        Auth::logout();
        Alert::success('Success', 'Berhasil Logout');
        return redirect()->route('home')->with('success', 'Log Out Success');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama_lengkap'      => 'required',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:6',
            'confirmpassword'   => 'required|min:6'
        ]);

        $data['nama_lengkap']       = $request->nama_lengkap;
        $data['email']              = $request->email;
        $data['password']           = Hash::make($request->password);
        $data['confirmpassword']    = Hash::make($request->confirmpassword);

        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($login)) {
            Alert::success('Success', 'Berhasil Login');
            return redirect()->route('akun');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
}