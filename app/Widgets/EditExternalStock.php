<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Interfaces\ExternalStockRepositoriesInterface;
use App\Interfaces\EmployeesRepositoriesInterface;

class EditExternalStock extends AbstractWidget
{

    private ExternalStockRepositoriesInterface $externalstockRepository;
    private EmployeesRepositoriesInterface $employeesRepository;

    public function __construct(ExternalStockRepositoriesInterface $externalstockRepository ,EmployeesRepositoriesInterface $employeesRepository) 
    {
       $this->externalstockRepository = $externalstockRepository;
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
        $stock_id  = request('id');
        $stock_info = $this->externalstockRepository->getExternalStockById($stock_id);
        $employees = $this->employeesRepository->getAllEmployees();
        
        return view('widgets.edit_external_stock', [
            'config' => $this->config,
            'stock_info'=>$stock_info,
            'employees'=>$employees,

        ]);
    }
}
