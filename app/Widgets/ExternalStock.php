<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Interfaces\ExternalStockRepositoriesInterface;

class ExternalStock extends AbstractWidget
{
    private ExternalStockRepositoriesInterface $externalstockRepository;
    public function __construct( ExternalStockRepositoriesInterface $externalstockRepository)
    {

        $this->externalstockRepository  = $externalstockRepository;
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
        $extstock = $this->externalstockRepository->getAllExternalStock();

        return view('widgets.external_stock', [
            'config' => $this->config,
            'extstock' => $extstock,
        ]);
    }
}
