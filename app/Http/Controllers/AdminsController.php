<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $admins = Admin::all();
        return view('backend.pages.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $roles = Role::all();
        return view('backend.pages.admins.create', compact('roles'));
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
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Unauthorized Access!');
        }

        //Validate form
        $request->validate([
            'name' =>  'required|max:50',
            'email' => 'required|max:60|unique:admins',
            'username' => 'required|max:60|unique:admins',
            'password' => 'required|min:8|confirmed'
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if (!empty($request->roles)) {
            $admin->assignRole($request->roles);
        }
        session()->flash('success', 'Admin has been Created!!');
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
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $admin = Admin::find($id);
        $roles = Role::all();
        return view('backend.pages.admins.edit', compact('admin', 'roles'));
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
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Unauthorized Access!');
        }

        $admin = Admin::find($id);
        //Validate form
        $request->validate([
            'name' =>  'required|max:50',
            'email' => 'required|max:60|unique:admins,email,' . $id,
            'password' => 'nullable|min:8|confirmed'
        ]);


        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if (is_null($admin->password)) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }
        session()->flash('success', 'Admin has been Updated!');
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
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Unauthorized Access!');
        }

        //
        $admin = Admin::find($id);
        if (!is_null($admin)) {
            $admin->delete();
        }

        session()->flash('success', 'Admin has been Deleted!!');
        return back();
    }
}
