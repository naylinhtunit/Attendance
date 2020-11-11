<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Department;
use App\Employee;
use App\Role;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->limit){
            $limit = $request->limit;
        }else{
            $limit = '10';
        }
        
        $employees = Employee::with('company', 'department', 'role', 'common')->orderBy('id','asc')->Paginate($limit);

        return view('employee.index', compact('employees'));
    }
    
    public function create()
    {
        $companies = Company::all();
        $departments = Department::all();
        $roles = Role::all();
        return view('employee.create', compact('companies', 'departments', 'roles'));
    }
    
    public function store(Request $request)
    {
        $employee = new Employee();
        $this->validateRequest($request,NULL);
        $filename = $this->handleImageUpload($request);
        $this->setEmployee($request ,$employee, $filename);
        
        alert()->success('success','New Employee has been Created!');
        return redirect('/employee');
    }
    
    public function edit($employee)
    {
        $companies = Company::all();
        $departments = Department::all();
        $roles = Role::all();
        $employee = Employee::find($employee);
        return view('employee.edit', compact('employee', 'companies', 'departments', 'roles'));
    }
    
    public function update(Request $request, $employee)
    {
        $employee = Employee::find($employee);
        if($request->hasFile('image')){
            $image_path = public_path().'/img/employee/'.$employee->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $filename = $this->handleImageUpload($request);
        }else{
            $filename = '';
        }
        
        $this->setEmployee($request, $employee ,$filename);
        
        alert()->success('success','selected Employee has been updated!');
        return redirect('/employee');
    }
    
    public function destroy($employee)
    {   
        $employee = Employee::find($employee);
        $image_path = public_path().'/img/employee/'.$employee->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $employee->delete();
        
        alert()->success('success','Selected employee has been Deleted!');
        return redirect('/employee');
    }
    
    private function validateRequest(Request $request, $employee)
    {
        $this->validate($request,[
            'company_id'   =>  'required',
            'department_id'    =>  'required',
            'role_id'    =>  'required',
            'phone'    =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'address'    =>  'required',
            'join_date'    =>  'required',
            'resign_date'    =>  'required',
            'gender'    =>  'required',
            'salary'    =>  'required',
            'name'     =>  'required|unique:employees,name,'.($employee ? : '' ).'|min:3',
            'password'     =>  ''.( $employee ? 'nullable|min:7' : 'required|min:7' ),
            'email'        =>  'required|email|unique:employees,email,'.($employee ? : '' ).'|min:7',
            'image'      =>  ''.($request->hasFile('image')  ? 'required|image|max:1999' : '')
        ]);
    }
    
    private function setEmployee(Request $request , Employee $employee , $filename){
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->company_id = $request->input('company_id');
        $employee->department_id = $request->input('department_id');
        $employee->role_id = $request->input('role_id');
        $employee->phone = $request->input('phone');
        $employee->address = $request->input('address');
        $employee->join_date = $request->input('join_date');
        $employee->resign_date = $request->input('resign_date');
        $employee->gender = $request->input('gender');
        $employee->salary = $request->input('salary');
        if($request->input('password') != NULL){
            $employee->password = bcrypt($request->input('password'));
        }
        if($request->hasFile('image')){
            $employee->image = $filename;
        }
        $employee->save();
    }
    
    public function handleImageUpload(Request $request){
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $fileNameToStore = $file->move('img/employee', $filename);
        }
        return $filename;
    }
}
