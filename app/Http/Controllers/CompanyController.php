<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Carbon\Carbon;

class CompanyController extends Controller
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

        $companies = Company::orderBy('id','asc')->Paginate(4);

        return view('company.index')->with('companies',$companies);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'start_office_hours' => 'required',
            'end_office_hours' => 'required',
            'start_pay_date' => 'required',
            'end_pay_date' => 'required',
        ]);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->start_office_hours = $request->start_office_hours;
        $company->end_office_hours = $request->end_office_hours;
        $company->start_pay_date = $request->start_pay_date;
        $company->end_pay_date = $request->end_pay_date;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('img/company', $filename);
            $company->avatar = $filename;
        }

        $company->save();
        
        session()->flash('msg','Company has been Created!');
        return redirect('/company');
    }

    public function edit($id)
    { 
        $company = Company::find($id);
        return view('company.edit')->with('company',$company);
    }

    public function update(Request $request, $id)
    {
        $company = Company::Find($id);
        $company->company_name = $request->input('company_name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->latitude = $request->input('latitude');
        $company->longitude = $request->input('longitude');
        $company->start_office_hours = $request->input('start_office_hours');
        $company->end_office_hours = $request->input('end_office_hours');
        $company->start_pay_date = $request->input('start_pay_date');
        $company->end_pay_date = $request->input('end_pay_date');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('img/company', $filename);
            $company->avatar = $filename;
        }
        
        $company->save();
        
        session()->flash('msg','Selected Company has been updated!');
        return redirect('/company');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        
        session()->flash('msg','Selected Company has been Deleted!');
        return redirect('/company');
    }
}
