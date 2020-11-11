<?php

namespace App\Http\Controllers;

use App\Company;
use App\LeaveType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LeaveTypeController extends Controller
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
        
        $leaveTypes = LeaveType::with('company')->orderBy('id','asc')->Paginate($limit);

        return view('leave_type.index', compact('leaveTypes'));
    }
    
    public function create()
    {
        $companies = Company::all();
        return view('leave_type.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'leave_name'      => 'required',
            'total_leave'      => 'required'
        ]);
        
        $leaveType = LeaveType::insert(
            $request->only(
                'company_id', 
                'leave_name', 
                'total_leave'));
        
        alert()->success('success','Leave Type has been Created!');
        return redirect('/leave_type');
    }
    
    public function edit(LeaveType $leave)
    {
        $companies = Company::all();
        return view('leave_type.edit', compact('leave', 'companies'));
    }

    public function update(Request $request, LeaveType $leave)
    {
        $leave->update([
            'company_id' => $request->company_id,
            'leave_name' => $request->leave_name,
            'total_leave' => $request->total_leave
        ]);
        
        alert()->success('success','Leave Type has been updated!');
        return redirect('/leave_type');
    }

    public function destroy(LeaveType $leave)
    {
        $leave->delete();
        
        alert()->success('success','Leave Type has been Deleted!');
        return redirect('/leave_type');
    }
}
