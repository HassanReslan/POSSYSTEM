<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Employees;

class EditEmployees extends AbstractWidget
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
        $employee = Employees::find($id);

        return view('widgets.edit_employees', [
            'config' => $this->config,
            'employee' => $employee,
        ]);
    }
}
