<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUserRequest $request)
    {
        if ($request->hasFile('avatar_image')) {
            // upload 'avatar' image for the user
            $request['avatar'] = $request->file('avatar_image')->store('avatrs','public');
        } else {
            // to set default value for 'avatar' if no image has been uploaded
            $request['avatar'] = null;
        }
        // to activate the created user by default
        $request['status'] = true;
        // add created by details
        $request['created_by'] = Auth::id();
        // create and insert the new user data
        User::create($request->all());
        // redirect to users list with success message
        return redirect()->route('user.index')->with('success', 'The new user is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // initialize a null variable for avatar
        $avatar = null;
        // check if the user uploaded a new avatar
        if ($request->hasFile('avatar_image')) {
            // upload 'avatar' image for the user
            $avatar = $request->file('avatar_image')->store('avatrs', 'public');
        }
        //
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->mobile = $request->input('mobile');
        // check if the avatar is uploded, then add it to the update fucntion
        if (!is_null($avatar)) {
            $user->avatar = $avatar;
        }
        // check if the password is updated, then add it to the update fucntion
        if (!is_null($request->password)) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return back()->with('success', 'user details has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'user has been updated');
    }
}
