<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class MonthlyChart extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config       = [];
    protected $data         = [];
    protected $percentage   = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $year = date('Y');
        $target       = 10000;

        //DB::enableQueryLog();

        $data= array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0);
        $percentage = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0);

        $numbers = DB::table('invoices')->select(DB::raw("SUM(total) as TOTAL"),DB::raw("DATE_FORMAT(date, '%m')  as MONTh"))
        ->groupBy(DB::raw("DATE_FORMAT(date, '%m')"))
        ->whereyear('date','=',$year)
        ->get();

        foreach ($numbers as $key => $value) 
        {
             $data[intval($value->MONTh)] = $value->TOTAL;
             $percentage[intval($value->MONTh)] = ($value->TOTAL * 100)/$target;
        }

        return view('widgets.monthly_chart', [
            'config' => $this->config,
            'numbers'=>$numbers,
            'data' => $data,
            'year' => $year,
            'percentage' =>$percentage,
        ]);
    }
}
