<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Company;
use App\Department;

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
            $limit = '5';
        }

        $companies = Company::all();
        $departments = Department::all();
        $roles = Role::leftJoin('companies', 'companies.id', '=', 'roles.company_id')
        ->leftJoin('departments', 'departments.id', '=', 'roles.department_id')
        ->select(
            'roles.*',
            'companies.company_name',
            'departments.department_name'
            );
               
        $roles = Role::orderBy('id','asc')->Paginate($limit);

        return view('role.index', compact('roles', 'companies', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name'      => 'required',
            'company_id' => 'required',
            'department_id' => 'required'
        ]);
  
        $role = new Role;
        $role->role_name = $request->role_name;
        $role->company_id      = $request->company_id;
        $role->department_id      = $request->department_id;
        $role->save();
        
        session()->flash('msg','Role has been Created!');
        return redirect('/role');
    }

    public function update(Request $request, $id)
    {
        $role = Role::Find($id);
        $role->role_name = $request->input('role_name');
        $role->company_id = $request->input('company_id');
        $role->department_id = $request->input('department_id');
        $role->save();
        
        session()->flash('msg','Selected Role has been updated!');
        return redirect('/department');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        
        session()->flash('msg','Selected Role has been Deleted!');
        return redirect('/role');
    }
}
