<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        // $posts = User::latest()->paginate(5);
        $myCustomer = User::all();
        return view('manage.index', compact('myCustomer'));
    }

    public function create()
    {
        //
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function actionlogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::Attempt($credentials)) {
            if (Auth::user()->status == 1) {
                $find = User::where('email', $request->email)->first();
                $request->session()->put('username', $find->name);
                $request->session()->put('status', $find->status);
                $request->session()->put('email', $find->email);
                $request->session()->put('no_sim', $find->email);
                return redirect()->route('manage.index')->with(['success' => 'Data Berhasil Simpan']);
            } else {
                return redirect()->intended('/');
            }

        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function show(login $login)
    {
        //
    }

    public function edit(login $login)
    {
        //
    }

    public function update(Request $request, login $login)
    {
        //
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = User::findOrFail($id);
        //delete image

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('manage.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
