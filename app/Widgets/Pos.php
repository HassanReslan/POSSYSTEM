<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class Pos extends AbstractWidget
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
        //
        //$date = request('date');
        //$total =  DB::table('invoices')->where('date','=',$date)->sum('total');
        //echo  round($total, 2);
        //$customers =  DB::table('customers')->select('id','name')->get();

        $stock_flag = request('id');
      
        
      if( $stock_flag == 0 )
      {
        $stock_name ="Main Stock";
      }
      else{
          $stock_name = DB::table('external_stocks')->select('name')->whereId($stock_flag)->Get();
          $stock_name = $stock_name[0]->name;
      }

     
        return view('widgets.pos', [
            'config' => $this->config,
            //'total' => $total,
            'stock_name'=>$stock_name,
        ]);
    }
}
