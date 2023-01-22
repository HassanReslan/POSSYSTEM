<?php

namespace App\Interfaces;

interface ExternalStockRepositoriesInterface 
{
    public function getAllExternalStock();
    public function getExternalStockById($externalstockID);
    public function deleteExternalStock($externalstockID);
    public function createExternalStock(array $externalstockDetails);
    public function createExternalStockContent(array $content);
    public function updateExternalStock($externalstockID, array $newDetails);
    public function getFulfilledExternalStock();
    public function updateExternalStockContent($productid,$quntity,$es_id);

    public function ShowExternalStockContent($stock_id);
    public function ReturnToStockRep(array $details,$stock_id);
}