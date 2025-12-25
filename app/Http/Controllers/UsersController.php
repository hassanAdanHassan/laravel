<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;

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
    public function store(storeUserRequest $request)
    {
        $validatedData = $request->validated();

        // Create the user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route("users.index")->with("success", "User created successfully");
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




        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
        ]);
        // update like insert
        $user = User::findOrFail($id);

        $user->update($validatedData);
        return redirect()->route("users.index")->with("success", "User updated successfully");
    }



    public function editProfile()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view("profile.edit", [
            'mustVerifyEmail' => $user instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }


    public function profileUpdate(Request $request)
    {


        // dd($request()->all());
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // current password check can be added here
        if (!Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Current password is incorrect']);
        }

        $fields['name'] = $validatedData['name'];
        $fields['password'] = bcrypt($validatedData['password']);
        $findUser =  User::where('id', $user->id)->first();

        dd( $fields);
        $findUser->update($fields);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("success", "User deleted successfully");
    }
}
