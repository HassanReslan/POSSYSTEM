<?php

namespace App\Repositories;

use App\Interfaces\ExternalStockRepositoriesInterface;
use App\Models\ExternalStock;
use App\Models\es_contents;

class ExternalStockRepository implements ExternalStockRepositoriesInterface 
{
    public function getAllExternalStock() 
    {
        //return ExternalStock::all();

        return  ExternalStock::leftJoin('employees',function($join){
            $join->on('external_stocks.employee_id','=','employees.id');
        })->get([
          'external_stocks.id as sid',
          'external_stocks.name as sname',
          'external_stocks.employee_id as eid',
          'employees.name as ename',
        ]);

       // echo "<pre>";print_r($a);exit;
    }
    

    public function getExternalStockById($externalstockID) 
    {

        return  ExternalStock::leftJoin('employees',function($join){
            $join->on('external_stocks.employee_id','=','employees.id');
        })->where('external_stocks.id','=',$externalstockID)->get([
            'external_stocks.id as sid',
            'external_stocks.name as sname',
            'external_stocks.employee_id as eid',
            'employees.name as ename',
        ]);
    }

    public function ShowExternalStockContent($externalstockID)
    {
        return  es_contents::leftJoin('external_stocks',function($join){
            $join->on('external_stocks.id','=','es_contents.es_id');
        })->leftJoin('employees',function($join){
            $join->on('employees.id','=','external_stocks.employee_id');
        })->where('es_contents.es_id','=',$externalstockID)->where('quantity','>',0)->get([
          
          'external_stocks.id as sid',
          'external_stocks.name as sname',
          'external_stocks.employee_id as eid',
          'employees.name as ename',
          'es_contents.id as rowid',
          'es_contents.product_id as product_id',
          'es_contents.product_name as product_name',
          'es_contents.product_code as product_code',
          'es_contents.quantity as quantity',
          'es_contents.sale_price as sale_price',
          'es_contents.purchasing_price as purchasing_price',
          
        ]);
    }

    public function deleteExternalStock($externalstockID)
    {
        return ExternalStock::destroy($externalstockID);
    }

    public function createExternalStock(array $externalstockDetails) 
    {
        return ExternalStock::create($externalstockDetails);
    }

    public function createExternalStockContent(array $content) 
    {
       
        return es_contents::create($content);
    }

    public function updateExternalStockContent($product_id,$quntity,$es_id)
    {
      
        return es_contents::where('product_id','=',$product_id)->where('es_id','=',$es_id)->update(array('quantity'=>$quntity));
    }

    public function updateExternalStock($externalstockID, array $newDetails)
    {   
       
        return ExternalStock::whereId($externalstockID)->update(array('name'=>$newDetails['name'],'employee_id'=>$newDetails['employee_id']));
    }

    public function getFulfilledExternalStock()
    {
        return ExternalStock::where('is_fulfilled', true);
    }

    public function ReturnToStockRep($details,$stock_id)
    {   
        
        $updated_qty = $details['totalqty'] - $details['quantity'];
        
        return es_contents::whereId($details['id'])->update(array('quantity'=>$updated_qty));
    }
}