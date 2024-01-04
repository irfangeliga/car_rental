<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('car.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    { {
            return view('car.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'no_sim' => $request->no_sim,
            'status' => $request->status
        ]);
        $find = User::where('email', $request->email)->first();
        if($find->getAttributes()['status'] == 1){
            return redirect()->route('manage.index')->with(['success' => 'Data Berhasil Simpan']);
        }else{
            return redirect()->intended('/');
        }

        // return redirect()->route('cars.index')->with(['success' => 'Data Berhasil Simpan']);
    }

    public function check(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = User::findOrFail($id);

        $post->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'no_sim' => $request->no_sim,
            'status' => $request->status
        ]);

        return redirect()->route('manage.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
