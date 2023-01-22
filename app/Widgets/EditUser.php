<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;
use App\Traits\UsersTrait;


class EditUser extends AbstractWidget
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
        $user_id = request('id');

        $role_name = $this->RoleName();
        $users =  DB::table('users')->select('id','name','email','password','role')->where('id','=', $user_id)->get();
        $selected  = $this->SelectedRole($users[0]->role);

        return view('widgets.edit_user', [
            'config' => $this->config,
            'users' => $users,
            'role_name' =>  $role_name,
            'selected' =>$selected ,
        ]);
    }
}
