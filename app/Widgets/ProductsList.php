<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Products;

class ProductsList extends AbstractWidget
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
        $products = Products::All();
        return view('widgets.products_list', [
            'config' => $this->config,
            'products' => $products,
        ]);
    }
}
