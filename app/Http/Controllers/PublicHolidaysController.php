<?php

namespace App\Http\Controllers;

use App\Company;
use App\PublicHolidays;
use Illuminate\Http\Request;

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
            $limit = '5';
        }

        $companies = Company::all();
        $holidays = PublicHolidays::leftJoin('companies', 'companies.id', '=', 'public_holidays.company_id')
        ->select(
            'public_holidays.*',
            'companies.company_name'
            );
               
        $holidays = PublicHolidays::orderBy('id','asc')->Paginate($limit);

        return view('holiday.index', compact('companies', 'holidays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'holiday_date'      => 'required',
            'holiday_name'      => 'required',
            'year'      => 'required',
            'company_id' => 'required'
        ]);
  
        $holiday = new PublicHolidays();
        $holiday->holiday_name = $request->holiday_name;
        $holiday->holiday_date = $request->holiday_date;
        $holiday->year = $request->year;
        $holiday->company_id      = $request->company_id;
        $holiday->save();
        
        session()->flash('msg','Public Holidays has been Created!');
        return redirect('/holiday');
    }

    public function update(Request $request, $id)
    {
        $holiday = PublicHolidays::Find($id);
        $holiday->holiday_name = $request->input('holiday_name');
        $holiday->holiday_date = $request->input('holiday_date');
        $holiday->year = $request->input('year');
        $holiday->company_id = $request->input('company_id');
        $holiday->save();
        
        session()->flash('msg','Selected public holidays has been updated!');
        return redirect('/holiday');
    }

    public function destroy($id)
    {
        $holiday = PublicHolidays::find($id);
        $holiday->delete();
        
        session()->flash('msg','Selected public holidays has been Deleted!');
        return redirect('/holiday');
    }
}
