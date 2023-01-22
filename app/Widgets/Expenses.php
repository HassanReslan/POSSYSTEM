<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class Expenses extends AbstractWidget
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
        $date = request('date');
       // DB::enableQueryLog();
        $expenses =  DB::table('expenses')->select('expenses.id','expenses.expense_amount','expenses.cost_per_dollar','description','expenses_types.type_name')
            ->leftJoin('expenses_types','expenses_types.id','=','expenses.expenses_type_id')
            ->where('date','=',$date)
            ->get();
        //dd(DB::getQueryLog());exit;
        //expenses_types
        $expense_amount = 0;
        $cost_per_dollar = 0;
        foreach ($expenses as $key => $val)
        {
            $expense_amount = $expense_amount + $val->expense_amount;
            $cost_per_dollar = $cost_per_dollar + $val->cost_per_dollar;
        }
        return view('widgets.expenses', [
            'config' => $this->config,
            'expenses' => $expenses,
            'expense_amount' => $expense_amount,
            'cost_per_dollar' => $cost_per_dollar,
        ]);
    }
}
