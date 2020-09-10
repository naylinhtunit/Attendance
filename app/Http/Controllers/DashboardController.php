<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use App\Company;
use App\Department;
use App\Employee;
use App\Leave;
use App\LeaveType;
use App\PublicHolidays;
use App\Role;

class DashboardController extends Controller
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
    
    public function index()
    {
        $company = Company::all()->count();
        $department = Department::all()->count();
        $role = Role::all()->count();
        $employee = Employee::all()->count();
        $holiday = PublicHolidays::all()->count();
        $leaveType = LeaveType::all()->count();
        $leave = Leave::all()->count();
        $attendance = Attendance::all()->count();
        return view('index', 
            compact(
                'company',
                'department', 
                'role',
                'employee',
                'holiday',
                'leaveType',
                'leave',
                'attendance'
        ));
    }
}
