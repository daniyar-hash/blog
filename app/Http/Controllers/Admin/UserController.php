<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
          
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = USER::getRole();

     //  dd($roles);

         return view('admin.users.create', compact('roles')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
            
     //   dd($request->all());
        $data = $request->validated();
        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
       return view('admin.users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       $roles = USER::getRole();
       return view('admin.users.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {

        $data = $request->validated();
        // dd($data);
     
        $user->update($data);
 

        return redirect()->route('admin.users.show', compact('user'))
        ->with('success', 'User updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
             ->with('success', 'User deleted!');
    }
}
