<?php

namespace App\Http\Controllers;

use App\Company;
use App\Leave;
use Illuminate\Http\Request;

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
            $limit = '5';
        }

        $companies = Company::all();
        $leaves = Leave::leftJoin('companies', 'companies.id', '=', 'leaves.company_id')
        ->select(
            'leaves.*',
            'companies.company_name'
            );
               
        $leaves = Leave::orderBy('id','asc')->Paginate($limit);

        return view('leave.index', compact('companies', 'leaves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'request_date'      => 'required',
            'actual_date'      => 'required',
            'status'      => 'required'
        ]);
  
        $leave = new Leave();
        $leave->company_id      = $request->company_id;
        $leave->request_date = $request->request_date;
        $leave->actual_date = $request->actual_date;
        $leave->status = $request->status;
        $leave->save();
        
        session()->flash('msg','Leave has been Created!');
        return redirect('/leave');
    }

    public function update(Request $request, $id)
    {
        $leave = Leave::Find($id);
        $leave->company_id = $request->input('company_id');
        $leave->request_date = $request->input('request_date');
        $leave->actual_date = $request->input('actual_date');
        $leave->status = $request->input('status');
        $leave->save();
        
        session()->flash('msg','Selected leave has been updated!');
        return redirect('/leave');
    }

    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        
        session()->flash('msg','Selected leave has been Deleted!');
        return redirect('/leave');
    }
}
