<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\BranchAndPathCoverageNotSupportedException;
use Illuminate\Database\Console\DbCommand;

class MainStockReports extends AbstractWidget
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
        $capitalandcount  = DB::table('stocks')->selectRaw('sum(purchasing_price * quantity) as capital,count(id) as count')->where('quantity','>',0)->get();
        $flag = request('flag');
        switch($flag)
        {
            case 1:
                $totals = DB::table('invoices')->where('stock_id','=',0)->where('date','=',date('Y-m-d'))->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 2:
                $date = date('Y-m-d',strtotime("-1 days"));
                $totals = DB::table('invoices')->where('stock_id','=',0)->where('date','=', $date)->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 3:
                $from = date('Y-m-d',strtotime("-7 days"));
                $to = date('Y-m-d');
                $totals = DB::table('invoices')->where('stock_id','=',0)->whereBetween('date',[$from,$to] )->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 4:
                $from  = date('Y-m-d',strtotime("-30 days"));
                $to = date('Y-m-d');
                $totals = DB::table('invoices')->where('stock_id','=',0)->whereBetween('date',[$from,$to] )->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 5:
                $currentMonth = date('m');
                $totals = DB::table('invoices')->where('stock_id','=',0)->whereRaw('MONTH(date) = ?',[$currentMonth])->whereYear('date','=',date('Y'))->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 6:
            //$currentMonth = date('m');
            $totals = DB::table('invoices')->where('stock_id','=',0)->whereYear('date','=',date('Y'))->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 7:
            $last_year = date("Y",strtotime("-1 year"));
            $totals = DB::table('invoices')->where('stock_id','=',0)->whereYear('date','=',$last_year)->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            case 8:
            $from = request('from');
            $to = request('to');
            //echo $from . '-' . $to;
            $totals = DB::table('invoices')->where('stock_id','=',0)->whereBetween('date',[$from,$to] )->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
            default:
            $totals = DB::table('invoices')
            ->where('stock_id','=',0)->where('date','=',date('Y-m-d'))->selectRaw('stock_id, sum(total) as total , sum(p_total) as p_total')->get();
            break;
        }
        
        return view('widgets.main_stock_reports', [
            'config' => $this->config,
            'totals'=>$totals,
            'capitalandcount'=>$capitalandcount,
        ]);
    }
}
