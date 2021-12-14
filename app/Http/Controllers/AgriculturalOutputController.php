<?php

namespace App\Http\Controllers;

use App\Company;
use App\AgriculturalOutput;
use App\RiceOutput;
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
        return view('output',['layout'=>'create','type'=>$selection]);
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
            $riceOutput = new RiceOutput();
            $riceOutput->agricultural_output_id = $agriculturalOutput->id;
            $riceOutput->planted_at = $request->input('planted-at');
            $riceOutput->packaged_at = $request->input('packaged-at');
            $riceOutput->quantity_packaged = $request->input('quantity-packaged');
            $riceOutput->kg_per_packaging = $request->input('kg-per-packaging');
            $riceOutput->save();
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
        $company = Company::all()->where('user_id', auth()->user()->id)->first();
        return view('outputtypeselection',['company'=>$company]);
    }

    public function postOutputType()
    {
        $company = Company::all()->where('user_id', auth()->user()->id)->first();
        return view('outputtypeselection',['company'=>$company]);
    }
}
