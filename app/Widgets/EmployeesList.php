<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Employees;



class EmployeesList extends AbstractWidget
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

        $employees = Employees::All();
        return view('widgets.employees_list', [
            'config' => $this->config,
            'employees' => $employees,
        ]);
    }
}
