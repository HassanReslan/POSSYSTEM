<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class POSProducts extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        
      $stock_id = request('stock_id');
       
       $name = request('name');
      
       $category_id = request('category_id');
      
       //$stock_table_name = ($stock_id == 0 ? 'stocks':'es_contents' );
       
        if( isset( $category_id  ) )
        {
            //DB::enableQueryLog();
            if( $stock_id != 0 )
            {
                $products = DB::table('es_contents')->where('category_id','=', $category_id)->where('es_id','=',$stock_id)->where('quantity','>',0)->get();
            }
            else{
                $products = DB::table('stocks')->where('category_id','=', $category_id)->where('quantity','>',0)->get();
            }
            //dd(\DB::getQueryLog());

        }
        elseif ( isset( $name )){
            //DB::enableQueryLog();
            if( $stock_id != 0 )
            {
                $products = DB::table('es_contents')->where('es_id','=',$stock_id)->where('product_name','LIKE', '%' .$name)->orWhere('product_code','=', $name)->where('quantity','>',0)->get();    
            }
            else{
                $products = DB::table('stocks')->where('product_name','LIKE', '%' .$name)->orWhere('product_code','=', $name)->where('quantity','>',0)->get();
            }
            //dd(\DB::getQueryLog());
        }
        else{
          //DB::enableQueryLog();
          if( $stock_id !=0 )
          {
            $products = DB::table('es_contents')->where('es_id','=',$stock_id)->where('quantity','>',0)->get();
          }
          else{
            $products = DB::table('stocks')->where('quantity','>',0)->get();
          }
           //dd(DB::getQueryLog());
        }

    //var_dump($products);
        // select min stock //
       $min_stock =  DB::table('stock_settings')->select('min_stock')->where('id','=',1)->get();

        return view('widgets.p_o_s_products', [
            'config' => $this->config,
            'products' =>$products,
            'min_stock' => $min_stock,
        ]);
    }
}
