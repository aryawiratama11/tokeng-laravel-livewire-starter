<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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
        $minimum = DB::table('stock')->value('minimum');
        $data = DB::table('stock')->get();
        return view('partcheck', ['data' => $data, 'i' => 1]);
    }

    public function partin() {
        return view('history.partin');
    }

    public function partout() {
        return view('history.partout');
    }

    public function partcheck() {
        $minimum = DB::table('stock')->value('minimum');
        $data = DB::table('stock')->get();
        return view('history.partcheck', ['data' => $data, 'i' => 1]);
    }

    public function partrequest() {
        return view('history.partrequest');
    }

    public function newpartin() {
        return view('partin');
    }

    public function newpartout() {
        return view('partout');
    }

    public function newpartrequest() {
        return view('partrequest');
    }
}
