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
            $limit = '5';
        }
        
        $companies = Company::all();
        $employees = Employee::all();
        $attendances = Attendance::join('companies', 'companies.id', '=', 'attendances.company_id')
        ->join('employees', 'employees.id', '=', 'attendances.employee_id')
        ->select(
            'attendances.*',
            'companies.company_name',
            'employees.employee_name',
            );
               
        $attendances = Attendance::orderBy('id','asc')->Paginate($limit);

        return view('attendance.index', compact('companies', 'attendances', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'employ_id' => 'required',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
        ]);
  
        $attendance = new Attendance();
        $attendance->company_id      = $request->company_id;
        $attendance->employ_id = $request->employ_id;
        $attendance->checkin_time = $request->checkin_time;
        $attendance->checkout_time = $request->checkout_time;
        $attendance->save();
        
        session()->flash('msg','Attendance has been Created!');
        return redirect('/attendance');
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
        $employees = Employee::all();
        $attendance = Attendance::find($id);
        return view('attendance.edit', compact('attendance', 'companies', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::Find($id);
        $attendance->company_id      = $request->company_id;
        $attendance->employ_id = $request->employ_id;
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
