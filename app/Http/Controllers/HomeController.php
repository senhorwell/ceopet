<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Credenciado;
use App\Models\Pet;
use App\Models\Procedimento;
use App\Models\Prontuario;
use App\Models\Banner;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::all();
        return view('dashboard',['banners' => $banners]);
    }
}
