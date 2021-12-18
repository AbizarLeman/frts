<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin == 0) {
            if (auth()->user()->company_id == null) {
                return redirect('/company');
            }

            return view('home');
        }

        return view('admindashboard');
    }
}
