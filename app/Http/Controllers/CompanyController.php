<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Carbon\Carbon;
use File;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function index(Request $request)
    {
        if($request->limit){
            $limit = $request->limit;
        }else{
            $limit = '10';
        }
        
        $keyword = $request->get('keyword');
        $companies = Company::where('company_name', 'like', '%'.$keyword.'%')
                            ->orwhere('phone', 'like', '%'.$keyword.'%')
                            ->orderBy('id','asc')->Paginate($limit);

        return view('company.index', compact('companies'));
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
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
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
        
        alert()->success('success','Company has been Created!');
        return redirect('/company');
    }

    public function edit($company)
    { 
        $company = Company::find($company);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $company)
    {
        $company = Company::Find($company);
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
            $image_path = public_path().'/img/company/'.$company->avatar;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('img/company', $filename);
            $company->avatar = $filename;
        }
        
        $company->save();
        
        alert()->success('success','Selected company has been updated!');
        return redirect('/company');
    }

    public function destroy($company)
    {
        $company = Company::find($company);
        $image_path = public_path().'/img/company/'.$company->avatar;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $company->delete();
        
        alert()->success('success','Selected company has been Deleted!');
        return redirect('/company');
    }
}
