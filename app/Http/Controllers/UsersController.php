<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $roles = Role::all();
        return view('backend.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //Validate form
        $request->validate([
            'name' =>  'required|max:50',
            'email' => 'required|max:60|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if (!empty($request->roles)) {
            $user->assignRole($request->roles);
        }
        session()->flash('success', 'User has been Created!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.users.edit', compact('user', 'roles'));
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Unauthorized Access!');
        }

        $user = User::find($id);
        //Validate form
        $request->validate([
            'name' =>  'required|max:50',
            'email' => 'required|max:60|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed'
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        if (is_null($user->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        session()->flash('success', 'User has been Updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been Deleted!!');
        return back();
    }
}
