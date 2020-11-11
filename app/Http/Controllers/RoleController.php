<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Company;
use App\Department;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->limit){
            $limit = $request->limit;
        }else{
            $limit = '10';
        }

        $roles = Role::with('company', 'department')->orderBy('id','asc')->Paginate($limit);

        return view('role.index', compact('roles'));
    }
    
    public function create()
    {
        $companies = Company::all();
        $departments = Department::all();
        return view('role.create', compact('companies', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name'      => 'required',
            'company_id' => 'required',
            'department_id' => 'required'
        ]);
        
        $role = Role::insert(
            $request->only(
                'role_name', 
                'company_id', 
                'department_id'));
        
        alert()->success('success','Role has been Created!');
        return redirect('/role');
    }
    
    public function edit(Role $role)
    {
        $companies = Company::all();
        $departments = Department::all();
        return view('role.edit', compact('role', 'companies', 'departments'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'role_name' => $request->role_name,
            'company_id' => $request->company_id,
            'department_id' => $request->department_id
        ]);
        
        alert()->success('success','Selected Role has been updated!');
        return redirect('/role');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        
        alert()->success('success','Selected Role has been Deleted!');
        return redirect('/role');
    }
}
