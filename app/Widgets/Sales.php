<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Customers;
use App\Models\Invoices;
use Illuminate\Support\Facades\DB;

class Sales extends AbstractWidget
{
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

       
        if(isset($_POST['search']))
        {  
           
            if( $_POST['invoice_number'] == '' && $_POST['date'] == '' && $_POST['customer_id'] == 0 )
            { 
                $invoices = Invoices::orderBy('date','DESC')->get(['id','invoice_nb','total','date']);
            }
            elseif( $_POST['invoice_number'] !='' && $_POST['date'] == '' && $_POST['customer_id'] == 0 )
            { 
                $invoices = Invoices::where('invoice_nb','=',$_POST['invoice_number'])->get();
            }
            elseif( $_POST['invoice_number'] !='' && $_POST['date'] !=''  && $_POST['customer_id'] == 0 )
            { 
                $invoices = Invoices::where('invoice_nb','=',$_POST['invoice_number'])->where('date','=', $_POST['date'])->get();
            }
            elseif( $_POST['invoice_number'] !='' && $_POST['date'] !='' && $_POST['customer_id'] != 0 ){
               
                $invoices = Invoices::where('date','=', $_POST['date'])->where('customer_id','=',$_POST['customer_id'])->where('invoice_nb','=',$_POST['invoice_number'])->get();
            }
            elseif( $_POST['invoice_number'] =='' && $_POST['date'] !='' && $_POST['customer_id'] == 0)
            {
                $invoices = Invoices::where('date','=', $_POST['date'])->get();
            }
            elseif( $_POST['invoice_number'] =='' && $_POST['date'] =='' && $_POST['customer_id'] != 0)
            {
                $invoices = Invoices::where('customer_id','=', $_POST['customer_id'])->get();
            }
            elseif( $_POST['invoice_number'] !='' && $_POST['date'] =='' && $_POST['customer_id'] != 0)
            {
                $invoices = Invoices::where('invoice_nb','=', $_POST['invoice_number'])->where('customer_id','=', $_POST['customer_id'])->get();
            }
            elseif( $_POST['invoice_number'] =='' && $_POST['date'] !='' && $_POST['customer_id'] != 0)
            {
                $invoices = Invoices::where('date','=', $_POST['date'])->where('customer_id','=', $_POST['customer_id'])->get();
            }
        }
        else{
            
            $invoices = Invoices::orderBy('date','DESC')->get(['id','invoice_nb','total','date']);
        }

      
        $customer = Customers::All(['id','name']);
        
        return view('widgets.sales', [
            'config' => $this->config,
            'customers'=>$customer,
            'invoices'=>$invoices,
        ]);
    }
}
