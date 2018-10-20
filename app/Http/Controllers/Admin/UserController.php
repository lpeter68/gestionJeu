<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        return view('user/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeuForms');
    }

    public function update(Request $request)
    {
        $user = User::Find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $role = Role::Find($request->input('role'));
        $user->roles()->detach();
        $user->roles()->attach($role);
        $user->save();
        return UserController::index();
    }

    public function modal($id)
    {
        $user = User::Find($id);
        $roles = Role::all();
        return view('user/modal')->with('user',$user)->with('roles',$roles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::Find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::Find($id)->delete();
        return "jeu supprimé";
    }
}
