<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class DailyExpensesReport extends AbstractWidget
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
        $date = request('year') .'-'. request('month') .'-'. request('day');
        
        $expenses = DB::table('expenses')
        ->select('expense_amount','description','dollar_value','cost_per_dollar','type_name')
        ->leftJoin('expenses_types','expenses.expenses_type_id','=','expenses_types.id')->where('date','=',$date)->get()->toArray();
       
        $bytype =  DB::table('expenses')
        ->leftJoin('expenses_types','expenses.expenses_type_id','=','expenses_types.id')->groupBy('expenses_types.type_name')->selectRaw('type_name,sum(expense_amount) as ammountlira ,sum(cost_per_dollar) as ammountdolar')->where('date','=',$date)->get()->toArray();

        //echo "<pre>";print_r($bytype);exit;
        return view('widgets.daily_expenses_report', [
            'config' => $this->config,
            'expenses'=>$expenses,
            'bytype'=>$bytype,
        ]);
    }
}
