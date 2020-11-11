<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Company;
use App\Employee;
use App\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
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

        $keyword = $request->get('keyword');
        $attendances = Attendance::with('company', 'employee')
                                ->orderBy('id','asc')->Paginate($limit);

        return view('attendance.index', compact('attendances'));
    }
    
    public function create()
    {
        $companies = Company::all();
        $employees = Employee::all();
        $roles = Role::all();
        return view('attendance.create', compact('companies', 'employees', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'employee_id' => 'required',
            'role_id' => 'required',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
        ]);
        
        $attendance = Attendance::insert(
            $request->only(
                'company_id', 
                'employee_id', 
                'role_id', 
                'checkin_time', 
                'checkout_time'));
        
        alert()->success('success','Attendance has been Created!');
        return redirect('/attendance');
    }
    
    public function edit(Attendance $attendance)
    {
        $companies = Company::all();
        $employees = Employee::all();
        $roles = Role::all();
        
        return view('attendance.edit', compact('attendance', 'companies', 'employees', 'roles'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update([
            'company_id' => $request->company_id,
            'employee_id' => $request->employee_id,
            'role_id' => $request->role_id,
            'checkin_time' => $request->checkin_time,
            'checkout_time' => $request->checkout_time
        ]);
        
        alert()->success('success','Selected attendance has been updated!');
        return redirect('/attendance');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        
        alert()->success('success','Selected attendance has been Deleted!');
        return redirect('/attendance');
    }
}
