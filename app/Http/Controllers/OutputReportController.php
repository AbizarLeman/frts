<?php

namespace App\Http\Controllers;

use App\AgriculturalOutput;
use App\Company;
use Illuminate\Http\Request;

class OutputReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agriculturalOutputs = AgriculturalOutput::all();
        return view('adminoutputlist',['outputs'=>$agriculturalOutputs,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function getFilteredList(Request $request){
        $agriculturalOutputs = AgriculturalOutput::all();

        if ($request->filled('output-type')) {
            $agriculturalOutputs = $agriculturalOutputs->where('output_type', $request->input('output-type'));
        }
        if ($request->filled('start-date') && $request->filled('end-date')) {
            $agriculturalOutputs = $agriculturalOutputs->where('packaged_at', '>=', $request->input('start-date'))->where('packaged_at', '<=', $request->input('end-date'));
        }
        if ($request->filled('district')) {
            $agriculturalOutputs = $agriculturalOutputs->where('district', $request->input('district'));
        }
        if ($request->filled('mukim')) {
            $agriculturalOutputs = $agriculturalOutputs->where('mukim', $request->input('mukim'));
        }
        if ($request->filled('village')) {
            $agriculturalOutputs = $agriculturalOutputs->where('village', $request->input('village'));
        }
        if ($request->filled('agricultural-development-area')) {
            $agriculturalOutputs = $agriculturalOutputs->where('agricultural_development_area', $request->input('agricultural-development-area'));
        }

        return view('adminoutputlist',['outputs'=>$agriculturalOutputs,'layout'=>'index']);
    }
}
