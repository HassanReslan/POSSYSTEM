<?php

namespace App\Interfaces;

interface EmployeesRepositoriesInterface 
{
    public function getAllEmployees();
    public function getEmployeesById($employeeID);
    public function deleteEmployees($employeeID);
    public function createEmployees(array $employeeDetails);
    public function updateEmployees($employeeID, array $newDetails);
    public function getFulfilledEmployees();
}