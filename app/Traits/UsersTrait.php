<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait UsersTrait{

	// function to return an array of roles name //
	public function RoleName()
	{
		$role_name = array('1' =>'General Admin','2'=>'Sales','3'=>'Stock Manager');
		return $role_name;
	}

	//  function to display role name as text, dependet off role number in database//
	public function UserRole($data)
	{
		$role_array = $this->RoleName();
		foreach ($data as $key => $roles) {
			switch ($roles->role) {
				case '1':
					$role[$key] = $role_array[$roles->role];
					break;
					case '2':
					$role[$key] = $role_array[$roles->role];
					break;
					case '3':
					$role[$key] = $role_array[$roles->role];
					break;
				
				default:
					$role[$key] = "No role";
					break;
			}
		}
		return $role;
	}

	// function to  return the selected role of user on dropdown befor edit// 
	public function SelectedRole($role_number)
	{
		$role_array = $this->RoleName();
		foreach ($role_array as $key => $value) 
		{
			$selected[$key] = ( $key == $role_number ? 'selected' : '' );
		}

		return $selected;
	}
		
}
?>