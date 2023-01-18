<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    //Homepage Guest
    public function index()
    {
        return view('landing.index', [
            'active' => 'index',
        ]);
    }

    //Homepage Customer
    public function index_customer()
    {
        return view('landing.index', [
            'active' => 'index',
            'products' => Product::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(3)
                ->withQueryString(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showproduct()
    {
        return view('landing.product.index', [
            'active' => 'product',
            'products' => Product::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(3)
                ->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function detailproduct(Product $product)
    {
        return view('landing.product.detail', [
            'active' => 'product',
            'product' => $product,
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('landing.login', [
                'active' => 'login',
            ]);
        }
    }

    public function register()
    {
        return view('landing.register', [
            'active' => 'register',
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $remember = $request->remember ? true : false;

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/homepage');
        }

        return back()->with('loginError', 'E-mail/Password Anda Salah, Coba Lagi!');
    }

    public function store_register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Akun telah ditambahkan, silahkan Sign In.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
