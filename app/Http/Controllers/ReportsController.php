<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $user = Auth::user();
        return view('reports.stocks',['page'=>'Stocks Report','email'=>$user->email ]);
    }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales()
    {
        //
        $user = Auth::user();
        return view('reports.sales',['page'=>'Sales Report','email'=>$user->email ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthlysales()
    {
        //
        $user = Auth::user();
        return view('reports.monthlysales',['page'=>'Monthly Sales Report','email'=>$user->email ]);
    }

    public function dailysales()
    {
        //
        $user = Auth::user();
        return view('reports.dailysales',['page'=>'Daily Sales Report','email'=>$user->email ]);
    }

    
    public function salescustomerange()
    {
        //
        $user = Auth::user();
        return view('reports.salescustomerange',['page'=>'Daily Sales Report','email'=>$user->email ]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function expenses()
    {
        //
        $user = Auth::user();
        return view('reports.expenses',['page'=>'Expenses Report','email'=>$user->email ]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function monthlyexpenses()
        {
            //
            $user = Auth::user();
            return view('reports.monthlyexpenses',['page'=>'Monthly Expenses Report','email'=>$user->email ]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function dailyexpenses()
        {
            //
            $user = Auth::user();
            return view('reports.dailyexpenses',['page'=>'Daily Expenses Report','email'=>$user->email ]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */

        public function expensescustomerange()
        {
            //
            $user = Auth::user();
            return view('reports.customrange',['page'=>'Custom Range Expenses Report','email'=>$user->email ]);

            //$msg = "hello resutl";
            //return $msg;
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
