<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Stocks;

use App\Interfaces\EmployeesRepositoriesInterface;


class Stock extends AbstractWidget
{

      private EmployeesRepositoriesInterface $employeesRepository;

     public function __construct(EmployeesRepositoriesInterface $employeesRepository) 
     {
        $this->employeesRepository = $employeesRepository;
     }


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

        $employees = $this->employeesRepository->getAllEmployees();
        $productsinstock = Stocks::Where('quantity','>',0)->get();
        return view('widgets.stock', [
            'config' => $this->config,
            'products'=>  $productsinstock,
            'employees'=>$employees,
        ]);
    }
}
