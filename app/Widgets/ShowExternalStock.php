<?php
namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Interfaces\ExternalStockRepositoriesInterface;

class ShowExternalStock extends AbstractWidget
{
    private ExternalStockRepositoriesInterface $externalstockRepository;

     public function __construct(ExternalStockRepositoriesInterface $externalstockRepository) 
    {
        $this->externalstockRepository = $externalstockRepository;
       
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
        $id = request('id');
        $info = $this->externalstockRepository->ShowExternalStockContent($id); 
        $count = count($info);
        $info = ($count == 0 ? 0 : $info);
       
        return view('widgets.show_external_stock', [
            'config' => $this->config,
            'info'=>(is_object( $info) ? $info : 0 ),
        ]);
    }
}