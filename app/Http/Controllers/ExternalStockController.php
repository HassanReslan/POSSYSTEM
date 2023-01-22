<?php

namespace App\Http\Controllers;

use App\Events\ReturnProduct;
use App\Listeners\ReturnProductNotification;
use App\Events\UpdateStock;
use App\Listeners\UpdateStockNotification;
use App\Interfaces\ExternalStockRepositoriesInterface;
use App\Models\ExternalStock;
use App\Http\Requests\StoreExternalStockRequest;
use App\Http\Requests\UpdateExternalStockRequest;
use Illuminate\Http\Request;
use App\Models\es_contents;
use Illuminate\Support\Facades\Auth;

class ExternalStockController extends Controller
{

    private ExternalStockRepositoriesInterface $externalstockRepository;

     public function __construct(ExternalStockRepositoriesInterface $externalstockRepository) 
    {
        $this->externalstockRepository = $externalstockRepository;
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $data = $this->externalstockRepository->getAllExternalStock();
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
     * @param  \App\Http\Requests\StoreExternalStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExternalStockRequest $request)
    {
        $result = $this->externalstockRepository->createExternalStock($request->all());
        if($result)
        {
            return redirect()->route('stock')->with('success','External Stock created successfully!');
        }
        else{
            return redirect()->route('stock')->with('Faild','External Stock created Faild!');
        }
    }

    public function returnToStock(StoreExternalStockRequest $request,$id){
        
        $result = $this->externalstockRepository->ReturnToStockRep($request->input(),$id);

        if( $result){
            // update main stock

             event (new ReturnProduct($request->product_id,$request->quantity));
             return redirect()->route('extstock.show',$id)->with('success','Product returned successfully!');
        }
        else
        {
            return redirect()->route('extstock.show',$id)->with('Faild','Product return failed!');
        }

    }

     public function AddToStock(StoreExternalStockRequest $request)
     {
       
        $product = es_contents::where('product_id','=', $request->product_id)->where('es_id','=',$request->es_id)->get('quantity');

        // check if product in stock
        if($product->isNotEmpty())
        {
            $new_quantity =  $product[0]->quantity + $request->quantity;
           
            $result = $this->externalstockRepository->updateExternalStockContent($request->product_id,$new_quantity,$request->es_id);
        }
        else{
            $result = $this->externalstockRepository->createExternalStockContent($request->all());
        }


        if( $result){
            // update main stock

             event (new UpdateStock($request->product_id,$request->quantity));
            return redirect()->route('stock')->with('success','Transfer product created successfully!');
        }
        else{
            // error
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalStock  $externalStock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user_name = Auth::user();
        return view('stock.externalstockshow',['page'=>'Show External Stock','email'=>$user_name->email ]);

        //
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternalStock  $externalStock
     * @return \Illuminate\Http\Response
     */
    public function edit(ExternalStock $externalStock)
    {
        
        $user_name = Auth::user();
        return view('stock.editexternalstock',['page'=>'Edit External Stock','email'=>$user_name->email ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExternalStockRequest  $request
     * @param  \App\Models\ExternalStock  $externalStock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExternalStockRequest $request,$id)
    {

        
        $validate =  $request->validate([
            'name' => 'required',
            'employee_id' => 'required',
        ]);

        $result = $this->externalstockRepository->updateExternalStock($id,$request->all());
        if($result)
        {
            return redirect()->route('stock')->with('success','External Stock Updated successfully!');
        }
        else{
            return redirect()->route('extstock.edit',$id)->with('Faild','External Stock Updated Faild!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalStock  $externalStock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $result =  $this->externalstockRepository->deleteExternalStock($id);
      
      if($result)
        {
            return redirect()->route('stock')->with('success','External Stock Deleted successfully!');
        }
        else{
            return redirect()->route('stock')->with('Faild','External Stock Deleted Faild!');
        }
    }
}
