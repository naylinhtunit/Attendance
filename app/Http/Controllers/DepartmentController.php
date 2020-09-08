<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Company;

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
            $limit = '5';
        }

        $companies = Company::all();
        $departments = Department::leftJoin('companies', 'companies.id', '=', 'departments.company_id')
        ->select(
            'departments.*',
            'companies.company_name'
            );
               
        $departments = Department::orderBy('id','asc')->Paginate($limit);

        return view('department.index', compact('companies', 'departments'));
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
        
        session()->flash('msg','Department has been Created!');
        return redirect('/department');
    }

    public function update(Request $request, $id)
    {
        $department = Department::Find($id);
        $department->department_name = $request->input('department_name');
        $department->company_id = $request->input('company_id');
        $department->save();
        
        session()->flash('msg','Selected Department has been updated!');
        return redirect('/department');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        
        session()->flash('msg','Selected Department has been Deleted!');
        return redirect('/department');
    }
}
