<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Company;
use App\Employee;
use Illuminate\Http\Request;

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
        return view('attendance.create', compact('companies', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'employee_id' => 'required',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
        ]);
  
        $attendance = new Attendance();
        $attendance->company_id      = $request->company_id;
        $attendance->employee_id = $request->employee_id;
        $attendance->checkin_time = $request->checkin_time;
        $attendance->checkout_time = $request->checkout_time;
        $attendance->save();
        
        session()->flash('msg','Attendance has been Created!');
        return redirect('/attendance');
    }
    
    public function edit($id)
    {
        $companies = Company::all();
        $employees = Employee::all();
        $attendance = Attendance::find($id);
        return view('attendance.edit', compact('attendance', 'companies', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::Find($id);
        $attendance->company_id      = $request->company_id;
        $attendance->employee_id = $request->employee_id;
        $attendance->checkin_time = $request->checkin_time;
        $attendance->checkout_time = $request->checkout_time;
        $attendance->save();
        
        session()->flash('msg','Selected attendance has been updated!');
        return redirect('/attendance');
    }

    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        
        session()->flash('msg','Selected attendance has been Deleted!');
        return redirect('/attendance');
    }
}
