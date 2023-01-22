
<ul class="invoice_list_ul invoice-list-shadow" style="">
    @if( count($invoices) == 0 )
        <li class="invoice_list border border-dark">
            <div class="row m-0 h-100">
                <div class="col-12   d-flex  align-items-center text-center inv_id ">
                   No Invoices Found
                </div>
            </div>
        </li>
    @else
        @foreach($invoices as $key => $invoice)
            <li class="invoice_list border border-dark" onclick="ShowInvoice({{$invoice->id}},'{{$invoice->invoice_nb}}',{{$invoice->total}},'{{$invoice->name}}')">
                <div class="row m-0 h-100">
                    <div class="col-3   d-flex  align-items-center text-center inv_id ">
                        #{{$key+1}}
                    </div>
                    <div class="col-5 d-flex  align-items-center text-center">
                        <div class="row " >
                            <div class="col-12 "><span>{{$invoice->date}}</span></div>
                            <div class="col-12"><span>{{$invoice->name}}</span></div>
                        </div>
                    </div>
                    <div class="col-4 d-flex  align-items-center text-center">
                        <span class=" price-style">{{$invoice->total}}$</span>
                    </div>
                </div>
            </li>
        @endforeach
    @endif
</ul>
