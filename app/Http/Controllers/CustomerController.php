<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //Edit Profile
    public function edit_profile()
    {
        return view('landing.editprofile', [
            'active' => 'profile',
        ]);
    }
    //My Cart
    public function my_cart()
    {
        return view('landing.carts.index', [
            'active' => 'carts',
            'carts' => Cart::where('id_customer', Auth::user()->id)
                ->where('receiver_name', null)
                ->get(),
            'products' => Product::all(),
        ]);
    }
    //My Transaction
    public function my_transaction()
    {
        $carts = Cart::where('id_customer', Auth::user()->id)
            ->whereNotNull('receiver_name')
            ->get()
            ->groupBy(function ($data) {
                return $data->created_at->format('Y-m-d');
            });

        return view('landing.transactions.index', [
            'active' => 'transactions',
            'carts' => Cart::where('id_customer', Auth::user()->id)
                ->whereNotNull('receiver_name')
                ->get()
                ->groupBy(function ($data) {
                    return $data->created_at->format('Y-m-d H:i');
                }),
            'products' => Product::all(),
        ]);
    }
    //Change Password
    public function change_password()
    {
        return view('landing.changepass', [
            'active' => 'profile',
        ]);
    }

    public function store_profile(Request $request)
    {
        if ($request->email == Auth::user()->email) {
            $validatedData = $request->validate([
                'username' => 'required|min:3',
                'email' => 'required',
            ]);
        } else {
            $validatedData = $request->validate([
                'username' => 'required|min:3',
                'email' => 'required|unique:users',
            ]);
        }

        User::where('id', Auth::user()->id)->update($validatedData);

        return redirect('/edit-profile');
    }

    public function checkout(Request $request)
    {
        $validatedData = $request->validate([
            'receiver_name' => 'required',
            'receiver_address' => 'required',
        ]);

        Cart::where('id_customer', Auth::user()->id)->update($validatedData);

        return redirect('/my-cart');
    }

    public function add_cart(Request $request)
    {
        $price = Product::where('id', $request->id_product)->value('price');
        $qty = $request->qty;
        $total = $qty * $price;

        $validatedData = $request->validate([
            'id_product' => 'required',
            'qty' => 'required',
            'total' => 'required',
            'id_customer' => 'required',
        ]);
        $validatedData['total'] = $total;

        Cart::create($validatedData);

        return redirect('/my-cart');
    }

    public function store_password(Request $request)
    {
        if ($request->oldpassword == Auth::user()->password) {
            $validatedData = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::where('id', Auth::user()->id)->update($validatedData);

            return redirect('/change-password')->with('success', 'Password telah diubah!');
        } else {
            return redirect('/change-password')->with('success', 'Password Gagal diubah!');
        }
    }
    public function edit_cart(Request $request)
    {
        $price = Product::where('id', $request->id_product)->value('price');
        $qty = $request->qty;
        $total = $qty * $price;

        $validatedData = $request->validate([
            'qty' => 'required',
            'total' => 'required',
        ]);
        $validatedData['total'] = $total;

        Cart::where('id', $request->id_cart)->update($validatedData);

        return redirect('/my-cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit_product(Cart $cart)
    {
        return view('landing.carts.edit', [
            'active' => 'product',
            'cart' => $cart,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete_product(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect('/my-cart');
    }
}
