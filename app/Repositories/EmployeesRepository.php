<?php

namespace App\Repositories;

use App\Interfaces\EmployeesRepositoriesInterface;
use App\Models\Employees;

class EmployeesRepository implements EmployeesRepositoriesInterface 
{
    public function getAllEmployees() 
    {
        return Employees::all();
    }

    public function getEmployeesById($employeeID) 
    {
        return Employees::findOrFail($externalstockID);
    }

    public function deleteEmployees($employeeID)
    {
        return Employees::destroy($employeeID);
    }

    public function createEmployees(array $employeeDetails)
    {
        return Employees::create($employeeDetails);
    }

    public function updateEmployees($employeeID, array $newDetails)
    {
        return Employees::whereId($employeeID)->update($newDetails);
    }

    public function getFulfilledEmployees()
    {
        return Employees::where('is_fulfilled', true);
    }
}