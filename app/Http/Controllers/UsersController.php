<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //add method of users 
        // $users = User::orderBy("name")->paginate(10);
        $users = User::all();
        return view("users.index", compact("users"));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // create-user gate
        $this->authorize('create-user');
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $UserRequest)

    {
        // $this->authorize("admin");
      $insert=$UserRequest;
    
        User::create([
            'name' => $insert['name'],
            'email' => $insert['email'],
            'password' => bcrypt($insert['password']),
            'role' => $insert['role'],
        ]);

        return redirect()->route("users.index")->with("success","User created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update like insert
        $user = User::findOrFail($id);

        $user->update($request->all());
        return redirect()->route("users.index")->with("success","User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("success","User deleted successfully");
    }
}
