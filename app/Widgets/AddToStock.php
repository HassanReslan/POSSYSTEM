<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Supliers;
use App\Models\Products;
use App\Models\Categories;

class AddToStock extends AbstractWidget
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
        $suppliers = supliers::All();
        $products = products::All();
        $categories = categories::all();


        return view('widgets.add_to_stock', [
            'config' => $this->config,
            'suppliers'=>$suppliers,
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }
}
