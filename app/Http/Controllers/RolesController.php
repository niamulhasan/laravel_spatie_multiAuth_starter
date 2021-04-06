<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class RolesController extends Controller
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
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $roles = Role::all();
        return view('backend.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $permissions = Permission::all();
        return view('backend.pages.roles.create', compact('permissions'));
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
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Unauthorized Access!');
        }

        //Validate form
        $request->validate([
            'name' =>  'required|max:100|unique:roles',
            'guard' => 'required'
        ], [
            'name.required' => 'Please Give a role name',
            'guard.required' => 'Please Select a Guard name'
        ]);
        $role = Role::create(['name' => $request->name, 'guard_name' => $request->guard]);
        $permissions = $request->permissions;
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been Created!!');
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
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $all_roles = Role::all();
        //$role = Role::findById($id);
        foreach ($all_roles as $item) {
            if ($item->id == $id) {
                //echo $item;
                $role = $item;
                break;
            }
        }

        $permissions = Permission::all();
        $permissions_with_same_guard = array();
        foreach ($permissions as $item2) {
            if ($item2->guard_name == $role->guard_name) {
                array_push($permissions_with_same_guard, $item2);
            }
        }
        $permissions = $permissions_with_same_guard;
        return view('backend.pages.roles.edit', compact('role', 'permissions'));
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
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $request->validate([
            'name' =>  'required|max:100|unique:roles,name,' . $id
        ], [
            'name.required' => 'Please Give a role name'
        ]);
        $all_roles = Role::all();
        //$role = Role::findById($id);
        foreach ($all_roles as $item) {
            if ($item->id == $id) {
                //echo $item;
                $role = $item;
                break;
            }
        }
        $permissions = $request->permissions;

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been Updated!!');
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
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $role = Role::findById($id);
        if (!is_null($role)) {
            $role->delete();
        }

        session()->flash('success', 'Role has been Deleted!!');
        return back();
    }
}
