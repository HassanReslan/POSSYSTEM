<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class MonthlySalesReport extends AbstractWidget
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
        $month = request('month');
        $year = request('year');
        $days=cal_days_in_month(CAL_GREGORIAN,$month,$year);

        //DB::enableQueryLog();
        $sales =  DB::table('invoices')
        ->selectRaw('DAY(date) day,sum(total) as total,sum(p_total) as p_total')
        ->groupBy(DB::raw("DATE_FORMAT(date, '%d')"))
        ->wheremonth('date', $month)
        ->whereyear('date',$year)
        ->get()
        ->toArray();
      //dd(DB::getQueryLog());
      //DB::enableQueryLog();
      $byproducts =  DB::table('content_invoices')
      ->leftJoin('invoices','content_invoices.invoice_id','=','invoices.id')
      ->selectRaw('product_name,sum(price) as total,sum(purchasing_price * quantity) as p_total,sum(quantity) as quantity')
      ->wheremonth('invoices.date', $month)
      ->whereyear('invoices.date',$year)
      ->groupBy('product_name')
      ->orderBy('quantity', 'DESC')
      ->get()
      ->toArray();
      //dd(DB::getQueryLog());
        $daily_result_total =array();
        $daily_result_ptotal =array();

        $net = array();
 
        for($i=1;$i<=$days;$i++){
            $data[$i] = 0;
        }

        foreach ($sales as $key => $value) 
        {
             $daily_result_total[intval($value->day)] = $value->total;
             $daily_result_ptotal[intval($value->day)] = $value->p_total;
             $net[intval($value->day)] = $value->total - $value->p_total;
        }

        for($i=1;$i<=$days;$i++){
          if( isset($net[$i]) )
          {
            $net[$i] = $net[$i];
          }
          else{
            $net[$i] = 0;
          }

        }
        ksort($net);

        //echo "<pre>";print_r($byproducts);exit;
        return view('widgets.monthly_sales_report', [
            'config' => $this->config,
            'days' =>$days,
            'daily_result_total'=>$daily_result_total,
            'daily_result_ptotal'=>$daily_result_ptotal,
            'net'=> $net,
            'byproducts'=>$byproducts,
        ]);
    }
}
