<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Traits\UsersTrait;


class CreateUsers extends AbstractWidget
{
    use UsersTrait;
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
         $role_name = $this->RoleName();

        return view('widgets.create_users', [
            'config' => $this->config,
             'role_name' =>  $role_name,
        ]);
    }
}
