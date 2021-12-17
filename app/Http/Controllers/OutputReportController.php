<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
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
    public function store($id)
    {
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
        if ($request->input('generate') == 'Generate Report') {
            $start_date = $request->input('start-date');
            $end_date = $request->input('end-date');

            return view('designoutputreport',['response'=>response()->json($request->input('output-id')),'start_date'=>$start_date,'end_date'=>$end_date]);
        }

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

    public function buildTable(Request $request){
        $output_ids = $request->input('idArray');
        $grouping = $request->input('grouping');
        $periodisation = $request->input('periodisation');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $year = $request->input('year');

        $report_total = array();

        switch ($periodisation) {
            case 'month':
                $month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            
                for ($month = 1; $month <= 12; $month++)
                {
                    $group_total = array();
                    $output_groups = AgriculturalOutput::whereIn('id', $output_ids)->whereYear('packaged_at', '=', $year)->whereMonth('packaged_at', '=', $month)->get()->groupBy($grouping);
    
                    foreach($output_groups as $output_group)
                    {
                        $output_in_kg = 0.0;
            
                        foreach($output_group as $output_record)
                        {
                            $output_in_kg = $output_in_kg + $output_record->output_in_kg;
                        }
                        $group_total[$output_record->$grouping] = $output_in_kg;
                    }
    
                    $report_total[$month_name[$month-1]] = $group_total;
                }
                break;
            case 'quarter':
                $quarter_names = ['q1', 'q2', 'q3', 'q4'];
            
                $quarter_count = 0;
                foreach($quarter_names as $quarter)
                {
                    $start_month = 0;
                    $end_month = 0;

                    if ($quarter == 'q1') {
                        $start_month = 1;
                        $end_month = 3;
                    } elseif ($quarter == 'q2') {
                        $start_month = 4;
                        $end_month = 6;
                    } elseif ($quarter == 'q3') {
                        $start_month = 7;
                        $end_month = 9;
                    } elseif ($quarter == 'q4') {
                        $start_month = 10;
                        $end_month = 12;
                    }

                    $group_total = array();
                    $output_groups = AgriculturalOutput::whereIn('id', $output_ids)->whereYear('packaged_at', '=', $year)->whereMonth('packaged_at', '>=', $start_month)->whereMonth('packaged_at', '<=', $end_month)->get()->groupBy($grouping);
    
                    foreach($output_groups as $output_group)
                    {
                        $output_in_kg = 0.0;
            
                        foreach($output_group as $output_record)
                        {
                            $output_in_kg = $output_in_kg + $output_record->output_in_kg;
                        }
                        $group_total[$output_record->$grouping] = $output_in_kg;
                    }

                    $report_total[$quarter_names[$quarter_count++]] = $group_total;
                }
                break;
            case 'none':
                $group_total = array();
                $output_groups = AgriculturalOutput::whereIn('id', $output_ids)->get()->groupBy($grouping);

                foreach($output_groups as $output_group)
                {
                    $output_in_kg = 0.0;
        
                    foreach($output_group as $output_record)
                    {
                        $output_in_kg = $output_in_kg + $output_record->output_in_kg;
                    }
                    $group_total[$output_record->$grouping] = $output_in_kg;
                }

                $report_total = $group_total;
                break;   
        }

        return response()->json($report_total);
    }
}
