<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class CustomRangeExpReport extends AbstractWidget
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
        $start = request('from');
        $end = request('to');


        $bytype =  DB::table('expenses')
        ->leftJoin('expenses_types','expenses.expenses_type_id','=','expenses_types.id')->groupBy('expenses_types.type_name')->selectRaw('type_name,sum(expense_amount) as ammountlira ,sum(cost_per_dollar) as ammountdolar')
        ->whereBetween('date',[$start,$end])
        ->get()->toArray();

         //echo "<pre>";print_r($bytype);exit;

        return view('widgets.custom_range_exp_report', [
            'config' => $this->config,
            'bytype' => $bytype,
        ]);
    }
}
