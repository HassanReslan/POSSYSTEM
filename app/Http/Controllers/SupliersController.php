<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Supliers ;


class SupliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
       $user_name = Auth::user();
        return view('supliers.index',['page'=>'Suppliers','email'=>$user_name->email ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_name = Auth::user();
        return view('supliers.create',['page'=>'Suppliers','email'=>$user_name->email ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'suplier_f_name' => 'required',
            'suplier_l_name' => 'required',
            'suplier_phone'  => 'required',
            'email'          =>'',
            'company_name'   => 'required',
            'address' =>'' ,
        ]);

        $suppliers = new Supliers();
        $suppliers->Create($request->all());
         return redirect()->route('suppliers')->with('success','Supplier created successfully!');
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
         $user_name = Auth::user();
         return view('supliers.edit',['page'=>'Edit Suppliers','email'=>$user_name->email ]);
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

        $validate = $request->validate([
            'suplier_f_name' => 'required',
            'suplier_l_name' => 'required',
            'suplier_phone'  => 'required',
            'email'          =>'',
            'company_name'   => 'required',
            'address' =>'' ,
        ]);

        $data =[ 'suplier_f_name' =>$validate['suplier_f_name'],'suplier_l_name'=>$validate['suplier_l_name'] ,'suplier_phone'=>$validate['suplier_phone'],'email'=>$validate['email'],'company_name'=>$validate['company_name'],'address'=>$validate['address']];
        DB::table('supliers')->where('id', $id) ->update( $data );
        return redirect()->route('suppliers')->with('success','Supplier edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::delete('delete from supliers where id = ?',[$id]);

        return redirect()->route('suppliers')->with('success','Supplier has been deleted successfully!');
    }
}
