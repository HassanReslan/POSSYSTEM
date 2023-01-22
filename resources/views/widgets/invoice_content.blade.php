<div class="container-fluid" >
    <div class="row p-3">
        <div class="col-12">  
        <img onclick="window.location.href='{{ url()->previous()}}'" alt="Back" src="{{asset('svg/arrow-left-solid.svg')}}" style="width:40px;height:40px;cursor:pointer;">
        </div>
    </div>
    <!-- invoice header>-->
    <div class="row">
        <div class="col-12" >
            <div class="container-fluid bg-white p-0 ">
                <div class="row  p-2 border border-dark m-0" style="height:50px">
                    <div class="col-2"></div>
                    <div class="col-8 text-center"><h5>Mohamad Msara Trading Company</h5></div>
                    <div class="col-2"></div>
                </div>
                <div class="row  p-2 border border-dark m-0" style="height:50px">
                    <div class="col-2"></div>
                    <div class="col-1 text-right p-0">Invoice-nb:</div>
                    <div class="col-1 text-left">{{$invoices_info[0]->invoice_nb}}</div>
                    <div class="col-1 text-right text-nowrap">Customer Name:</div>
                    <div class="col-1 text-nowrap">{{$invoices_info[0]->name}}</div>
                    <div class="col-1 text-right text-nowrap p-0">Total:</div>
                    <div class="col-1 text-left">{{$invoices_info[0]->total}} $</div>
                    <div class="col-1 text-right text-nowrap p-0">Date:</div>
                    <div class="col-1">{{$invoices_info[0]->date}}</div>
                    <div class="col-2"></div>
                </div>
                <!-- table-->
                <div class="row p-0 mt-3 ">
                    <div class="col-12" >
                        <table width="100%" class="" >
                            <thead>
                                <th class="border border-light" style="width:5%">#</th>
                                <th class="border border-light">Product Name</th>
                                <th class="border border-light">Product Code</th>
                                <th class="border border-light">Quantity</th>
                                <th class="border border-light">Price</th>
                            </thead>
                            <tbody>
                                @foreach($invoices_info as $key => $info)
                                    <tr>
                                        <td class="border border-light">{{$key + 1}}</td>
                                        <td class="border border-light">{{$info->product_name}}</td>
                                        <td class="border border-light">{{$info->product_code}}</td>
                                        <td class="border border-light">{{$info->quantity}}</td>
                                        <td class="border border-light">{{$info->price}}$</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <h4>Total:</h4>
                                    </td>
                                    <td >
                                        <h4>{{$invoices_info[0]->total}} $</h4>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
