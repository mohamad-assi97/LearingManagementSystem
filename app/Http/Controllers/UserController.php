<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $role = $request->query('role', 'all'); 
    $users = $role === 'all' ? User::all() : User::where('role', $role)->get();
    return view('users.index', compact('users', 'role'));
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
        // 
        $request->validate([
            'name' => 'required', 
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|min:8', 
            'role' => 'required|in:admin,student,teacher', 
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
            'role' => $request->role,
        ]);
    
        
        return response()->json(['message' => 'User created successfully'], 201);
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
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'name' => 'required', 
            'email' => 'required|email|unique:users,email,' . $id, 
            'role' => 'required|in:admin,student,teacher', 
        ]);
    
       
        $user = User::findOrFail($id);
    
     
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password, 
            
            'role' => $request->role,
        ]);
    
       
        return response()->json(['message' => 'User updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
