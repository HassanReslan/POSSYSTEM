<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Stocks;


class EditStock extends AbstractWidget
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
        $id = request('id');
        $product_info = Stocks::select('id','product_name','quantity','purchasing_price','sale_price')->whereId($id)->get();
        
        return view('widgets.edit_stock', [
            'config' => $this->config,
            'product_info'=>$product_info,
        ]);
    }
}
