<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Company;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
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
        
        $departments = Department::with('company')->orderBy('id','asc')->Paginate($limit);

        return view('department.index', compact('departments'));
    }
    
    public function create()
    {
        $companies = Company::all();
        return view('department.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name'   => 'required',
            'company_id'    => 'required'
        ]);
  
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->company_id      = $request->company_id;
        $department->save();
        
        alert()->success('success','Department has been Created!');
        return redirect('/department');
    }
    
    public function edit($id)
    {
        $companies = Company::all();
        $department = Department::find($id);
        return view('department.edit', compact('companies', 'department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::Find($id);
        $department->department_name = $request->input('department_name');
        $department->company_id = $request->input('company_id');
        $department->save();
        
        alert()->success('success','Selected Department has been updated!');
        return redirect('/department');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        
        alert()->success('success','Selected Department has been Deleted!');
        return redirect('/department');
    }
}
