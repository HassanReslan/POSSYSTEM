<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class EditExpenses extends AbstractWidget
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
        $types =  DB::table('expenses_types')->select('id','type_name')->get();
        $id = request('id');
        $expenses =  DB::table('expenses')->select('id','expenses_type_id','expense_amount','dollar_value','cost_per_dollar','description','date')->where('id','=', $id)->get();
        return view('widgets.edit_expenses', [
            'config' => $this->config,
            'expenses' => $expenses,
            'types' => $types,
        ]);
    }
}
