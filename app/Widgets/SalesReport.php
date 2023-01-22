<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class SalesReport extends AbstractWidget
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
        $year = request('year');
        
         //DB::enableQueryLog();
         $sales =  DB::table('invoices')
         ->selectRaw('MONTH(date) month,sum(total) as total,sum(p_total) as p_total')
         ->groupBy(DB::raw("DATE_FORMAT(date, '%m')"))
         ->whereyear('date',$year)
         ->get()
         ->toArray();
       //dd(DB::getQueryLog());

        $monthly_total =array();
        $monthly_ptotal =array();
        $data= array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0);

        foreach ($sales as $key => $value) 
        {
             $monthly_total[intval($value->month)] = $value->total;
             $monthly_ptotal[intval($value->month)] = $value->p_total;
             $net[intval($value->month)] = ($value->total - $value->p_total);
        }


        for($i=1;$i<=12;$i++){
            if( isset($net[$i]) )
            {
              $net[$i] = $net[$i];
            }
            else{
              $net[$i] = 0;
            }
  
          }
          ksort($net);


        //echo "<pre>";print_r($net);exit;


        return view('widgets.sales_report', [
            'config' => $this->config,
            'monthly_total' =>$monthly_total,
            'net'=>$net,
        ]);
    }
}
