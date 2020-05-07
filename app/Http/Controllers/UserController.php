<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // reading all data from users
        // select * from users
        // compact can be used to pass data to blade files
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed'
        ]);

        // encrypting password
        $data['password'] = \Hash::make($data['password']);

        // writing to database || insert into users ...
         $user = User::create($data);
        return redirect("/users/".$user->id);
    }

    /**
     * Display the sp$user = ecified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        // select * from users where id = $user_id
        $user = User::find($user_id);
        if ($user == null) {
            return "404 User not Found";
        }
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);
        if ($user == null) {
            return "404 User not Found";
        }
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255,email'
        ]);

        // finding the user
        $user = User::find($user_id);
        if ($user == null) {
            return "404 User not Found";
        }

        //updating data
        $user->update($data);

        return redirect('/users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        // finding the user
        $user = User::find($user_id);
        if ($user == null) {
            return "404 User not Found";
        }

        $user->delete();

        return redirect('/users');
    }
}
