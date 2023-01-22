<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class ExpensesReport extends AbstractWidget
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

        $monthly_result =array();
        $expenses = DB::table('expenses')
        ->leftJoin('expenses_types','expenses.expenses_type_id','=','expenses_types.id')
        ->selectRaw('MONTH(date) month,sum(expense_amount) as ammountlira ,sum(cost_per_dollar) as ammountdolar')
        ->groupBy(DB::raw("DATE_FORMAT(date, '%m')"))
        ->whereyear('date','=',$year)
        ->get()
        ->toArray();

        $monthly_result_lira =array();
        $monthly_result_dolar =array();
        $data= array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0);

        foreach ($expenses as $key => $value) 
        {
             $monthly_result_lira[intval($value->month)] = $value->ammountlira;
             $monthly_result_dolar[intval($value->month)] = $value->ammountdolar;
        }

       
        return view('widgets.expenses_report', [
            'config' => $this->config,
            'monthly_result_lira'=> $monthly_result_lira,
            'monthly_result_dolar'=> $monthly_result_dolar,
        ]);
    }
}
