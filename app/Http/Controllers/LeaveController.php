<?php

namespace App\Http\Controllers;

use App\Company;
use App\Leave;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LeaveController extends Controller
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
        
        $leaves = Leave::with('company')->orderBy('id','asc')->Paginate($limit);

        return view('leave.index', compact('leaves'));
    }
    
    public function create()
    {
        $companies = Company::all();
        return view('leave.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'request_date'      => 'required',
            'actual_date'      => 'required',
            'status'      => 'required',
        ]);
  
        $attendance = Leave::insert(
            $request->only(
                'company_id', 
                'request_date', 
                'actual_date', 
                'status'));
        
        alert()->success('success','Leave has been Created!');
        return redirect('/leave');
    }
    
    public function edit(Leave $leave)
    {
        $companies = Company::all();
        return view('leave.edit', compact('leave', 'companies'));
    }

    public function update(Request $request, Leave $leave)
    {
        $leave->update([
            'company_id' => $request->company_id,
            'request_date' => $request->request_date,
            'actual_date' => $request->actual_date,
            'status' => $request->status
        ]);
        
        alert()->success('success','Leave has been updated!');
        return redirect('/leave');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        
        alert()->success('success','Leave has been Deleted!');
        return redirect('/leave');
    }
}
