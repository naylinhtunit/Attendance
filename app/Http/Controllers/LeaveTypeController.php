<?php

namespace App\Http\Controllers;

use App\Company;
use App\LeaveType;
use Illuminate\Http\Request;

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
            $limit = '5';
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
  
        $leaveType = new LeaveType();
        $leaveType->company_id      = $request->company_id;
        $leaveType->leave_name = $request->leave_name;
        $leaveType->total_leave = $request->total_leave;
        $leaveType->save();
        
        session()->flash('msg','Leave Type has been Created!');
        return redirect('/leave_type');
    }
    
    public function edit($id)
    {
        $companies = Company::all();
        $leave = LeaveType::find($id);
        return view('leave_type.edit', compact('leave', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $leaveType = LeaveType::Find($id);
        $leaveType->company_id = $request->input('company_id');
        $leaveType->leave_name = $request->input('leave_name');
        $leaveType->total_leave = $request->input('total_leave');
        $leaveType->save();
        
        session()->flash('msg','Selected leave type has been updated!');
        return redirect('/leave_type');
    }

    public function destroy($id)
    {
        $leaveType = LeaveType::find($id);
        $leaveType->delete();
        
        session()->flash('msg','Selected leave type has been Deleted!');
        return redirect('/leave_type');
    }
}
