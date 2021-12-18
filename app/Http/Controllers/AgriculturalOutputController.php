<?php

namespace App\Http\Controllers;

use App\Company;
use App\AgriculturalOutput;
use App\Rice;
use App\Vegetable;
use Illuminate\Http\Request;

class AgriculturalOutputController extends Controller
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
    public function create($selection)
    {
        if (auth()->user()->isAdmin == 0) {
            return view('output',['layout'=>'create','type'=>$selection]);
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
        $company = Company::find(auth()->user()->id);
        $agriculturalOutput = new AgriculturalOutput();
        $agriculturalOutput->company_id = $company->id;
        $agriculturalOutput->output_type = $request->input('output-type');
        $agriculturalOutput->output_in_kg = $request->input('output-in-kg');
        $agriculturalOutput->packaged_at = $request->input('packaged-at');
        $agriculturalOutput->district = $request->input('district');
        $agriculturalOutput->mukim = $request->input('mukim');
        $agriculturalOutput->village = $request->input('village');
        $agriculturalOutput->agricultural_development_area = $request->input('agricultural-development-area');
        $agriculturalOutput->save();

        if ($agriculturalOutput->output_type == 'rice') {
            $rice = new Rice();
            $rice->agricultural_output_id = $agriculturalOutput->id;
            $rice->planted_at = $request->input('planted-at');
            $rice->packaged_at = $request->input('packaged-at');
            $rice->quantity_packaged = $request->input('quantity-packaged');
            $rice->kg_per_packaging = $request->input('kg-per-packaging');
            $rice->save();
        } elseif ($agriculturalOutput->output_type == 'vegetables') {
            $vegetable = new Vegetable();
            $vegetable->agricultural_output_id = $agriculturalOutput->id;
            $vegetable->planted_at = $request->input('planted-at');
            $vegetable->packaged_at = $request->input('packaged-at');
            $vegetable->quantity_packaged = $request->input('quantity-packaged');
            $vegetable->kg_per_packaging = $request->input('kg-per-packaging');
            $vegetable->save();
        }

        return redirect('/output');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOutputType()
    {
        $company = Company::find(auth()->user()->id);
        return view('outputtypeselection',['company'=>$company]);
    }

    public function postOutputType()
    {
        $company = Company::all()->where('user_id', auth()->user()->id)->first();
        return view('outputtypeselection',['company'=>$company]);
    }
}
