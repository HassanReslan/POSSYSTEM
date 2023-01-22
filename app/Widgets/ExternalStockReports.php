<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\ExternalStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\EloquentUserProvider;


class ExternalStockReports extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    protected $array_total =[];
    protected $array_ptotal =[];
    protected $capital =[];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        //$capitalandcount  = DB::table('es_contents')->groupBy('es_id')->selectRaw('sum(purchasing_price * quantity) as capital,count(id) as count,es_id')->where('quantity','>',0)->get();
       
       

        $flag = request('flag');
        $external_stocks = ExternalStock::all();

        if( isset( $external_stocks) )
        {
            switch($flag)
            {
                case 1:
                    $totals = DB::table('invoices')->where('stock_id','!=',0)->where('date','=',date('Y-m-d'))->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                   
                break;
                case 2:
            
                    $date = date('Y-m-d',strtotime("-1 days")); 
                //DB::enableQueryLog(); 
                    $totals = DB::table('invoices')->where('stock_id','!=',0)->where('date','=', $date)->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                // dd(DB::getQueryLog());
                /// exit();
                break;
                case 3:
                    $from = date('Y-m-d',strtotime("-7 days"));
                    $to = date('Y-m-d');
                    $totals = DB::table('invoices')->where('stock_id','!=',0)->whereBetween('date',[$from,$to] )->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                break;
                case 4:
                    $from  = date('Y-m-d',strtotime("-30 days"));
                    $to = date('Y-m-d');
                    $totals = DB::table('invoices')->where('stock_id','!=',0)->whereBetween('date',[$from,$to] )->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                break;
                case 5:
                    $currentMonth = date('m');
                    $totals = DB::table('invoices')->where('stock_id','!=',0)->whereRaw('MONTH(date) = ?',[$currentMonth])->whereYear('date','=',date('Y'))->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                break;
                case 6:
                //$currentMonth = date('m');
                $totals = DB::table('invoices')->where('stock_id','!=',0)->whereYear('date','=',date('Y'))->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                break;
                case 7:
                $last_year = date("Y",strtotime("-1 year"));
                $totals = DB::table('invoices')->where('stock_id','!=',0)->whereYear('date','=',$last_year)->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                break;
                case 8:
                $from = request('from');
                $to = request('to');

                $totals = DB::table('invoices')->where('stock_id','!=',0)->whereBetween('date',[$from,$to] )->groupBy('stock_id')->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();

                break;
                default:
                $totals = DB::table('invoices')
                ->where('stock_id','!=',0)->where('date','=',date('Y-m-d'))->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
                break;
            }
        
            if( is_object($totals) && count($totals)> 0)
            {
                
                foreach($totals as $key =>$total )
                {
                    $array_total[$total->stock_id] = $total->total;
                    $array_ptotal[$total->stock_id] = $total->p_total;
                }
            }
            else{
                foreach($external_stocks as $key =>$es )
                {
                    $array_total[$es->id] = 0;
                    $array_ptotal[$es->id] = 0;
                   
                }
            } 
        }
        foreach($external_stocks as $key =>$es )
        {
            $capitalandcount[$key]  = DB::table('es_contents')->where('es_id','=',$es->id)->selectRaw('sum(purchasing_price * quantity) as capital,count(id) as count,es_id')->where('quantity','>',0)->get(); 
        }
        

       
        //echo "<pre>";print_r($array_ptotal);exit();
        //echo count($capitalandcount);exit;
       //echo "<pre>";print_r($external_stocks);exit;
        return view('widgets.external_stock_reports', [
            'config' => $this->config,
            'external_stocks'=>$external_stocks,
            'total' => (isset($array_total) ? $array_total : 0),
            'ptotal'=>  (isset($array_ptotal) ? $array_ptotal : 0),
            'capitalandcount'=>(isset($capitalandcount) ?$capitalandcount:'' )  ,
            //'capital'=> ( isset($capitalandcount) > 0 ? $capitalandcount : 0) ,
           
        ]);
    }
}
