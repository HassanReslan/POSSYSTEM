<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;
use App\Traits\UsersTrait;

class UsersList extends AbstractWidget
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
        $users = DB::table('users')->simplePaginate(5);

        $role = $this->UserRole($users);
       
  
        return view('widgets.users_list', [
            'config' => $this->config,
            'users' =>  $users,
            'role' =>  $role,
        ]);
    }
}
