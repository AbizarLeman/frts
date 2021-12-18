<?php

namespace App\Http\Controllers;

use App\Role;
use App\District;
use App\Mukim;
use App\Village;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function getMukim(Request $request)
    {
        $mukim = Mukim::where('district', json_decode($request->input('district')))->pluck('mukim');
        return response()->json($mukim);
    }
    public function getVillage(Request $request)
    {
        $village = Village::where('mukim', json_decode($request->input('mukim')))->pluck('village');
        return response()->json($village);
    }
}
