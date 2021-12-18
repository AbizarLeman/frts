<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        if (auth()->user()->isAdmin == 0) {
            if (!is_null(auth()->user()->company_id)) {
                return view('home');
            }
            return view('company',['companies'=>$companies,'layout'=>'create']);
        }
        return view('admindashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->company_name = $request->input('company-name');
        $company->rocbn = $request->input('rocbn');
        $company->district = $request->input('district');
        $company->mukim = $request->input('mukim');
        $company->village = $request->input('village');
        $company->street_address = $request->input('street-address');
        if ($request->input('rice') == 1) {
            $company->rice = $request->input('rice');
        }
        if ($request->input('broiler') == 1) {
            $company->broiler = $request->input('broiler');
        }
        if ($request->input('vegetable') == 1) {
            $company->vegetable = $request->input('vegetable');
        }
        if ($request->input('fruit') == 1) {
            $company->fruit = $request->input('fruit');
        }
        if ($request->input('buffalo') == 1) {
            $company->buffalo = $request->input('buffalo');
        }
        if ($request->input('cattle') == 1) {
            $company->cattle = $request->input('cattle');
        }
        if ($request->input('goat') == 1) {
            $company->goat = $request->input('goat');
        }
        if ($request->input('cut-flower') == 1) {
            $company->cut_flower = $request->input('cut-flower');
        }
        if ($request->input('egg') == 1) {
            $company->egg = $request->input('egg');
        }
        if ($request->input('ornamental-horticulture') == 1) {
            $company->ornamental_horticulture = $request->input('ornamental-horticulture');
        }
        if ($request->input('miscellaneous') == 1) {
            $company->rice = $request->input('miscellaneous');
            $company->miscellaneous_string = $request->input('miscellaneous-string');
        }
        $company->save();
        $user = User::find(auth()->user()->id);
        $user->company_id = $company->id;
        $user->save();
        return redirect('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (auth()->user()->isAdmin == 0) {
            $company = Company::all()->where('user_id', auth()->user()->id)->first();

            if ($company == null) { 
                return redirect('/company/create');
            }
    
            return view('company',['company'=>$company,'layout'=>'show']);
        }

        return view('admindashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Company::find($id);
        $companies=Company::all();
        return view('company',['company'=>$company,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->company_name = $request->input('company-name');
        $company->rocbn = $request->input('rocbn');
        $company->district = $request->input('district');
        $company->mukim = $request->input('mukim');
        $company->village = $request->input('village');
        $company->street_address = $request->input('street-address');
        if ($request->input('rice') == 1) {
            $company->rice = $request->input('rice');
        }
        if ($request->input('broiler') == 1) {
            $company->broiler = $request->input('broiler');
        }
        if ($request->input('vegetable') == 1) {
            $company->vegetable = $request->input('vegetable');
        }
        if ($request->input('fruit') == 1) {
            $company->fruit = $request->input('fruit');
        }
        if ($request->input('buffalo') == 1) {
            $company->buffalo = $request->input('buffalo');
        }
        if ($request->input('cattle') == 1) {
            $company->cattle = $request->input('cattle');
        }
        if ($request->input('goat') == 1) {
            $company->goat = $request->input('goat');
        }
        if ($request->input('cut-flower') == 1) {
            $company->cut_flower = $request->input('cut-flower');
        }
        if ($request->input('egg') == 1) {
            $company->egg = $request->input('egg');
        }
        if ($request->input('ornamental-horticulture') == 1) {
            $company->ornamental_horticulture = $request->input('ornamental-horticulture');
        }
        if ($request->input('miscellaneous') == 1) {
            $company->rice = $request->input('miscellaneous');
            $company->miscellaneous_string = $request->input('miscellaneous-string');
        }
        $company->user_id = auth()->user()->id;
        $company->save();
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company= Company::find($id);
        $company->delete();
        return redirect('/company');
    }
}
