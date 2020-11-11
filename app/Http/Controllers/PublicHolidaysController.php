<?php

namespace App\Http\Controllers;

use App\Company;
use App\PublicHolidays;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PublicHolidaysController extends Controller
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
        
        $holidays = PublicHolidays::with('company')->orderBy('id','asc')->Paginate($limit);

        return view('holiday.index', compact('holidays'));
    }
    
    public function create()
    {
        $companies = Company::all();
        return view('holiday.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'holiday_date'      => 'required',
            'holiday_name'      => 'required',
            'year'      => 'required',
            'company_id' => 'required'
        ]);
        
        $holiday = PublicHolidays::insert(
            $request->only(
                'holiday_name', 
                'holiday_date', 
                'year',
                'company_id'));
        
        alert()->success('success','Public Holidays has been Created!');
        return redirect('/holiday');
    }
    
    public function edit(PublicHolidays $holiday)
    {
        $companies = Company::all();
        return view('holiday.edit', compact('holiday', 'companies'));
    }

    public function update(Request $request, PublicHolidays $holiday)
    {
        $holiday->update([
            'holiday_name' => $request->holiday_name,
            'holiday_date' => $request->holiday_date,
            'year' => $request->year,
            'company_id' => $request->company_id
        ]);
        
        alert()->success('success','Public Holidays has been updated!');
        return redirect('/holiday');
    }

    public function destroy(PublicHolidays $holiday)
    {
        $holiday->delete();
        
        alert()->success('success','Public Holidays has been Deleted!');
        return redirect('/holiday');
    }
}
