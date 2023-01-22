<?php

namespace App\Http\Controllers;


use App\Events\SupplierProducts;
use App\Listeners\SendSupplierProductsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Stocks;
use App\Models\Products;
use App\Models\Supliers;
use App\Exports\PriceList;
use Maatwebsite\Excel\Facades\Excel;





class StockController extends Controller
{
    public $suplier;
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $user_name = Auth::user();
        return view('stock.index',['page'=>'Stock','email'=>$user_name->email ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user_name = Auth::user();
        return view('stock.create',['page'=>'Add To Stock','email'=>$user_name->email ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supliers  $suplier
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validate =  $request->validate([
            'product_name'=>'required',
            'supplier_name' => 'required',
            'purchasing_price' => 'required',
            'sale_price' => 'required',
        ]);
           
         $checkifexist = Stocks::where('product_id',$request->product_id)->first();
          
         if( empty($checkifexist))
         {
            echo "case to insert new product";
            $stock = new Stocks();
            $stock->product_id         = $request->product_id;
            $stock->category_id        = $request->category_id;
            $stock->product_name       = $request->product_namehidden;
            $stock->product_code       = $request->product_codehidden;
            
            $stock->sale_price         = $request->sale_price;
            $stock->purchasing_price   = $request->purchasing_price;
            $stock->quantity           = $request->new_quantity;
           

         }
         else{
             echo "case to update product ";

             $stock = Stocks::where('product_id','=',$request->product_id)->first();
             $nq = $request->quantity + $request->new_quantity;
             $stock->quantity           = $nq;
             $stock->sale_price         = $request->sale_price;
             $stock->purchasing_price   = $request->purchasing_price;
         }
        
         $save = $stock->save();

        if($save)
        {
                event (new SupplierProducts($request->supplier_name,$request->product_id,$request->new_quantity,$request->purchasing_price));
                return redirect()->route('stock.create')->with('success','Add To Stock successfully!');
        }
        else{

                return redirect()->route('stock.create')->with('Faild','Add To Stock faild!');
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Stocks::where('product_id',$id)->where('quantity','>',0)->first();
        return response()->json($product);
    }

    /**
     * Display the specified resource from product table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showproduct($id)
    {

         $product = Products::where('id',$id)->first();
         return response()->json($product);
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
        return view('stock.edit',['page'=>'Edit to Stock','email'=>$user_name->email ]);
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
            'quantity' => 'required',
            'purchasing_price' => '',
            'sale_price' => 'required',
        ]);
        
        $stock = Stocks::find($id);
        $stock->quantity = $request->quantity;
        $stock->purchasing_price = $request->purchasing_price;
        $stock->sale_price = $request->sale_price;
        $result = $stock->save();
        
         if($result)
         {
            return redirect()->route('stock')->with('success','Stock update successfully!');
         }else{
            return redirect()->route('stock.edit',$id)->with('faild','Stock update Faild!');
         }
    }

    public function exportexcelpricelist()
    {
        return Excel::download(new PriceList,'pricelist.xlsx');
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
