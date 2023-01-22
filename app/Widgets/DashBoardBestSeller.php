<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class DashBoardBestSeller extends AbstractWidget
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

        $bestsellers =  DB::table('content_invoices')->select('product_name',DB::raw("SUM(quantity) as QTY"),DB::raw("SUM(price) as PRICE"))
        ->groupBy('product_id')
        ->orderBy('QTY', 'desc')
        ->limit(5)
        ->get();

        return view('widgets.dash_board_best_seller', [
            'config' => $this->config,
            'bestsellers'=>$bestsellers ,
        ]);
    }
}
