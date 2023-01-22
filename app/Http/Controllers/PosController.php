<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()) {
            $user_name = Session::get('user');

            return view('pos.index',['page'=>'POS','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
    }

    public function Total()
    {
        //
        $date = request('date');
        $stock_id = request('id');
       // DB::enableQueryLog();
        $total = DB::table('invoices')->where('date','=',$date)->where('stock_id','=',$stock_id)->sum('total');
        $total = round($total, 2);
        $p_total = DB::table('invoices')->where('date','=',$date)->where('stock_id','=',$stock_id)->sum('p_total');
        $net_total = $total -  $p_total;
        $net_total = round($net_total, 2);
        //dd(DB::getQueryLog());
        $data =  array( 'total'=> $total,'net_total'=> $net_total);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
