<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExpensesController extends Controller
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

            return view('expenses.index',['page'=>'Expenses','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::user()) {
            $user_name = Session::get('user');

            return view('expenses.create',['page'=>'Add Expenses','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate =  $request->validate([

            'expenses_type_id' => 'required|not_in:0',
            'date' => 'required',
            'expense_amount' => 'required',
            'dollar_value' => 'required',
            'cost_per_dollar' => 'required',
            'description' => '',
        ]);

        $data = ['expenses_type_id'=>$validate['expenses_type_id'],'date'=> $validate['date'], 'expense_amount'=> $validate['expense_amount'],'dollar_value'=> $validate['dollar_value'],'cost_per_dollar'=> $validate['cost_per_dollar'],'description'=> $validate['description'] ];
        DB::table('expenses')->insert($data);

        return redirect()->route('expenses.create')->with('success','Expenese created successfully!');
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
        if(Auth::user()) {
            $user_name = Session::get('user');

            return view('expenses.edit',['page'=>'Edit Expenses','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
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
        $validate =  $request->validate([

            'expenses_type_id' => 'required|not_in:0',
            'date' => 'required',
            'expense_amount' => 'required',
            'dollar_value' => 'required',
            'cost_per_dollar' => 'required',
            'description' => '',
        ]);

        $data = ['expenses_type_id'=>$validate['expenses_type_id'],'date'=> $validate['date'], 'expense_amount'=> $validate['expense_amount'],'dollar_value'=> $validate['dollar_value'],'cost_per_dollar'=> $validate['cost_per_dollar'],'description'=> $validate['description'] ];

        DB::table('expenses')->where('id', $id) ->update( $data );

        return redirect()->route('expenses',$validate['date'])->with('success','Expenses update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from expenses where id = ?',[$id]);

        return redirect()->route('expenses',request('date'))->with('success','Record has been deleted successfully!');
    }
}
