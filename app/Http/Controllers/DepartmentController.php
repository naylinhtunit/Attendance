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
        
        $department = Department::insert(
            $request->only(
                'department_name', 
                'company_id'));
        
        alert()->success('success','Department has been Created!');
        return redirect('/department');
    }
    
    public function edit(Department $department)
    {
        $companies = Company::all();
        return view('department.edit', compact('companies', 'department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->update([
            'department_name' => $request->department_name,
            'company_id' => $request->company_id
        ]);
        
        alert()->success('success','Selected Department has been updated!');
        return redirect('/department');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        
        alert()->success('success','Selected Department has been Deleted!');
        return redirect('/department');
    }
}
