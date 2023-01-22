<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $credentials =  request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();


        if (auth()->attempt($credentials)) 
        {

            $request->session()->regenerate();
            $user = auth()->user();
            $id = auth()->id();
            Session::put('user', $user);
            Session::put('id', $id);

            session(['user' => $user,'id'=> $id]);

                if( Auth::user()->role == 1 )
                {
                    return redirect()->route('dashboard');
                }
                elseif( Auth::user()->role == 2 )
                {   

                    return redirect()->route('pos', ['date'=>date('Y-m-d'),'id'=>0]);

                }
                elseif( Auth::user()->role == 3 )
                {   
                     return redirect()->route('stock');
                }
        }

        //return redirect()->route('login')->with('success','Email and/or password invalid.');
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

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout( Request $request )
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('index');
    }
}
