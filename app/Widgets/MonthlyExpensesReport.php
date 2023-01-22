<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class MonthlyExpensesReport extends AbstractWidget
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

        $month = request('month');
        $year = request('year');
        $days=cal_days_in_month(CAL_GREGORIAN,$month,$year);

       
        $expenses = DB::table('expenses')
        ->leftJoin('expenses_types','expenses.expenses_type_id','=','expenses_types.id')
        ->selectRaw('DAY(date) day,sum(expense_amount) as ammountlira ,sum(cost_per_dollar) as ammountdolar')
        ->groupBy(DB::raw("DATE_FORMAT(date, '%d')"))
        ->whereyear('date','=',$year)
        ->wheremonth('date','=',$month)
        ->get()
        ->toArray();

       
        $daily_result_lira =array();
        $daily_result_dolar =array();

        for($i=1;$i<=$days;$i++){
            $data[$i] = 0;
        }

        //echo "<pre>";print_r($data);exit;
        foreach ($expenses as $key => $value) 
        {
             $daily_result_lira[intval($value->day)] = $value->ammountlira;
             $daily_result_dolar[intval($value->day)] = $value->ammountdolar;
        }

        $bytype =  DB::table('expenses')
        ->leftJoin('expenses_types','expenses.expenses_type_id','=','expenses_types.id')->groupBy('expenses_types.type_name')->selectRaw('type_name,sum(expense_amount) as ammountlira ,sum(cost_per_dollar) as ammountdolar')
        ->wheremonth('date','=',$month)
        ->whereyear('date','=',$year)
        ->get()->toArray();

        //echo "<pre>";print_r($bytype);exit;

        return view('widgets.monthly_expenses_report', [
            'config' => $this->config,
            'days' =>$days,
            'daily_result_lira'=> $daily_result_lira,
            'daily_result_dolar'=> $daily_result_dolar,
            'bytype'=>$bytype,
           
        ]);
    }
}
