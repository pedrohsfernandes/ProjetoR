<?php

namespace App\Http\Controllers;

use dump;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class UserController extends Controller
{
    public readonly User $user;
    public function __construct()
    {
      $this->user = new User ();
    }
    public function index()
    {
       $users = $this->user->all();
       return view ('users ', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $created = $this->user->create([
        
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> $request->input('password'),
            
        ]);

        if ($created) 
        {
        return redirect()->back()->with('message', 'Create Success');   
        }
        return redirect()->back()->with('Message', 'Create Error');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('user_show', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $updated = $this->user->where('id', $id)->update($request->except( ['_token', '_method']));

        if ($updated) 
        {
        return redirect()->back()->with('message', 'Update Success');   
        }
        return redirect()->back()->with('Message', 'Update Error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();

        return redirect()->route('users.index');
    }
}
