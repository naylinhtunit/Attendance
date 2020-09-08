<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Department;
use App\Employee;
use App\GenderCategory;
use App\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *  It works the same as employeescontroller
         *  please see the comments for explaination
         *  on what's going on here.
         */
        
        $employees = Employee::Paginate(4);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $departments = Department::all();
        $roles = Role::all();
        $categories = GenderCategory::all();
        return view('employee.create', compact('companies', 'departments', 'roles', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $this->validateRequest($request,NULL);
        $fileNameToStore = $this->handleImageUpload($request);
        $this->setEmployee($request ,$employee, $fileNameToStore);
        return redirect('/employee')->with('info','New Employee has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $departments = Department::all();
        $roles = Role::all();
        $categories = GenderCategory::all();
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee', 'companies', 'departments', 'roles', 'categories'));
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
        $employee = Employee::find($id);
        if($request->hasFile('image')){

            $fileNameToStore = $this->handleImageUpload($request);
            Storage::deleteDirectory('public/img/employee/'.$employee->image);
        }else{
            $fileNameToStore = '';
        }
        
        $this->setEmployee($request, $employee ,$fileNameToStore);
        return redirect('/employee')->with('info','selected Employee has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if($id == Auth::user()->id){
        //     return redirect('/employee')->with('info','Authenticated Employee cannot be deleted!');
        // }
        
        $employee = Employee::find($id);

        //delete the employee image
        Storage::deleteDirectory('public/img/employee/'.$employee->image);
        $employee->delete();
        
        session()->flash('msg','Selected employee has been Deleted!');
        return redirect('/employee');
    }

    /**
     *  Validate all the inputs
     */
    private function validateRequest(Request $request, $id)
    {
        $this->validate($request,[
            'company_id'   =>  'required',
            'department_id'    =>  'required',
            'role_id'    =>  'required',
            'phone'    =>  'required',
            'address'    =>  'required',
            'join_date'    =>  'required',
            'resign_date'    =>  'required',
            'gender'    =>  'required',
            'salary'    =>  'required',
            'name'     =>  'required|unique:employees,name,'.($id ? : '' ).'|min:3',
            'password'     =>  ''.( $id ? 'nullable|min:7' : 'required|min:7' ),
            'email'        =>  'required|email|unique:employees,email,'.($id ? : '' ).'|min:7',
            'image'      =>  ''.($request->hasFile('image')  ? 'required|image|max:1999' : '')
        ]);
    }

    /**
     * Add or update an employee
     */
    private function setEmployee(Request $request , Employee $employee , $fileNameToStore){
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
            $employee->image = $fileNameToStore;
        }
        $employee->save();
    }

    /**
     *  Handle Image Upload
     */
    public function handleImageUpload(Request $request){
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $fileNameToStore = $file->move('img\employee', $filename);
        }
        return $fileNameToStore;
    }
}