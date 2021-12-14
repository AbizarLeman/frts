<?php

namespace App\Http\Controllers;

use App\AgriculturalOutput;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agriculturalOutputs = AgriculturalOutput::all();
        foreach ($agriculturalOutputs as $agriculturalOutput) {
            $agriculturalOutput = (object) [
                'output_type' => $agriculturalOutput->output_type,
                'packaged_at' => $agriculturalOutput->packaged_at,
                'output_in_kg' => $agriculturalOutput->output_in_kg,
                'district' => $agriculturalOutput->district,
                'mukim' => $agriculturalOutput->mukim,
                'village' => $agriculturalOutput->village,
                'agricultural_development_area' => $agriculturalOutput->agricultural_development_area,
                'id' => $agriculturalOutput->id
            ];
        }

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
}
