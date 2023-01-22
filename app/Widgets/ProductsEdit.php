<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ProductsEdit extends AbstractWidget
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
        $product_id = request('id');
        $products = Products::where('id','=',$product_id)->get();
        $categories =  DB::table('categories')->select('id','category_name')->get();

        return view('widgets.products_edit', [
            'config' => $this->config,
            'categories' =>  $categories,
            'products' =>  $products,
        ]);
    }
}
