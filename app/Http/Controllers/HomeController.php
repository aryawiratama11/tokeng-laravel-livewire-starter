<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;

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
        $data = DB::table('partin')->limit(100)->get();
        return view('history.partin', ['table' => $data, 'i' => 1]);
    }

    public function partout() {
        $data = DB::table('partout')->limit(100)->get();
        return view('history.partout', ['table' => $data, 'i' => 1]);
    }

    public function partcheck() {
        return view('history.partcheck');
    }

    public function partrequest() {
        $a1 = Auth::user();
        if ($a1->role == 'admin') {
            $data = DB::table('partrequest')->select('noref', 'date', 'approved_1', 'approved_2', 'user')->distinct()->get();
        } else {
            $data = DB::table('partrequest')->distinct('noref', 'date', 'approved_1', 'approved_2', 'user')->where('user', $a1->username)->get();
        }
        return view('history.partrequest', ['table' => $data, 'i' => 1]);
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

    public function newregister() {
        return view('partregister');
    }

    public function editpartrequest($id){
        return view('editpartrequest', ['refer' => $id]);
    }

    public function detailpartrequest($id){
        $data = DB::table('partrequest')->where('noref', $id)->get();
        return view('detailpartrequest', ['refer' => $id, 'record' => $data, 'i' => 1]);
    }

    public function deletepartrequest($id){
        $a1 = Auth::user();
        if ($a1->role == 'admin') {
            DB::table('partrequest')->where('noref', $id)->delete();
            return redirect('/partrequest');
        } else {
            return redirect('/home');
        }
    }

    public function changepassword(){
        return view('changepassword');
    }

    public function usercontrol(){
        $data = DB::table('users')->where('role', '<>', 'admin')->get();
        return view('usercontrol', ['users' => $data, 'i' => 1]);
    }

    public function deletestock($id){
        DB::table('stock')->where('item_code', $id)->delete();
        return 'Ok';
    }

    public function datastock($id){
        $data = DB::table('stock')->where('item_code', $id)->get();
        return $data;
    }

    public function updatestock(Request $request){
        DB::table('stock')->where('item_code', $request->item_code)->update([
            'item_name' => $request->name,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'minimum' => $request->minim,
            'location' => $request->location
        ]);
    }
}
