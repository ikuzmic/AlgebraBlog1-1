<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:3|confirmed'
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name je uspješno kreiran.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       // $user = User::find($id);
        return view('users.show',compact('user'));
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
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users,email,'.$id,
            'password'  => 'nullable|min:3'
        ]);

        $user =User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if ($request['password']) {
            $user->password = bcrypt($request['password']);
        }        
        $user->save();

        return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name uspješno je ažuriran.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //$user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name obrisan je uspješno.");
    }
}
