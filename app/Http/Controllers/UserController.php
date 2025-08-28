<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query all users from the database
        $users = User::latest()->get();
 
        // return the view with $users data
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//DB::enableQueryLog();
        //dd(auth()->user()->id);
         $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
    ]);

    // Simpan ke database
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make('password'), // set default password;
    ]);
//dd(DB::getQueryLog());
    return redirect()->route('user.index')->with('success', 'User berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User = User::findOrFail($id);
        $User->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('user.index')->with('success', 'User berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    // Cari rekod ikut ID
    $User = User::findOrFail($id);

    // Padam rekod
    $User->delete();

    // Redirect balik dengan mesej berjaya
    return redirect()->route('user.index')->with('success', 'User berjaya dipadam.');
}

}

