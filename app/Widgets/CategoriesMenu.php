<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class CategoriesMenu extends AbstractWidget
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
        $categories =  DB::table('categories')->select('id','category_name')->get();
        return view('widgets.categories_menu', [
            'config' => $this->config,
            'categories' => $categories,
        ]);
    }
}
